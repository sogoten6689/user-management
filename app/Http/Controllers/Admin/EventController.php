<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventItem;
use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(Gate::denies('event_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $events = Event::orderBy('date', 'desc')->paginate(15);

        return view('admin.events.index', compact('events'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(Gate::denies('event_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $musics = Music::all();

        return view('admin.events.create', compact('musics'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        //
        $validatedData = $request->validate([
            // 'name' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:255',
            'name' => 'required',
            'date' => 'required',
            'event_items.*.item_type' => 'required|string|max:255',
            'event_items.*.music_id' => 'nullable|exists:music,id',
            'event_items.*.note' => 'nullable|string|max:255',
        ]);

        $event = new Event();
        $user = Auth::user();

        $event->name = $request->name;
        $event->date = $request->date;
        $event->created_by = $user->id;

        if ($event->save()) {

            foreach ($validatedData['event_items'] as $item) {
                $event->eventItems()->create($item);
            }
            flash()->addSuccess('Tạo Chương Trình Thành Công!');
            return redirect()->route('admin.events.index');
        }
        flash()->addError('Tạo Chương Trình không thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event  $event)
    {
        abort_if(Gate::denies('event_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.events.show', compact('event'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event  $event)
    {
        abort_if(Gate::denies('event_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $musics = Music::all();
        return view('admin.events.edit', compact('event', 'musics'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event  $event)
    {
        //
        //
        $validatedData = $request->validate([
            // 'name' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:255',
            'name' => 'required',
            'date' => 'required',
            'event_items.*.item_type' => 'required|string|max:255',
            'event_items.*.music_id' => 'nullable|exists:music,id',
            'event_items.*.note' => 'nullable|string|max:255',
        ]);


        DB::beginTransaction();
        
        try {
            // Update event details
            $event->name = $request->input('name');
            $event->date = $request->input('date');
            $event->save();

            // Retrieve existing event item IDs for deletion
            $existingEventItemIds = $event->eventItems->pluck('id')->toArray();
            
            // Update or create event items
            $eventItems = $request->input('event_items', []);
            $newEventItemIds = [];

            foreach ($eventItems as $index => $item) {
                $itemId = $item['id'] ?? null;
                $itemData = [
                    'item_type' => $item['item_type'],
                    'music_id' => $item['music_id'] ?? null,
                    'note' => $item['note'] ?? null,
                ];

                if ($itemId) {
                    // Update existing item
                    $eventItem = EventItem::find($itemId);
                    if ($eventItem) {
                        $eventItem->update($itemData);
                        $newEventItemIds[] = $eventItem->id;
                    }
                } else {
                    // Create new item
                    $eventItem = $event->eventItems()->create($itemData);
                    $newEventItemIds[] = $eventItem->id;
                }
            }

            // Delete event items that are no longer in the request
            $itemsToDelete = array_diff($existingEventItemIds, $newEventItemIds);
            if ($itemsToDelete) {
                EventItem::whereIn('id', $itemsToDelete)->delete();
            }

            DB::commit();

            return redirect()->route('events.index')->with('success', 'Chương trình đã được cập nhật.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating event: '.$e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Có lỗi xảy ra trong quá trình cập nhật.']);
        }

        // $event->name = $request->name;
        // $event->date = $request->date;

        // if ($event->save()) {
        //     flash()->addSuccess('Cập nhật Chương Trình Thành Công!');
        //     return redirect()->route('admin.events.index');
        // }
        // flash()->addError('Cập nhật Chương Trình không thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event  $event)
    {
        abort_if(Gate::denies('event_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($event->delete()) {
            flash()->addSuccess('Xóa Chương Trình Thành Công!');
            return redirect()->route('admin.events.index');
        }
        flash()->addError('Xóa  Chương Trình Thất bại!');
        return redirect()->route('admin.events.index');
    }
}
