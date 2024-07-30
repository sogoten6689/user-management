<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(Gate::denies('group_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $groups = Group::latest()->paginate(15);

        return view('admin.groups.index', compact('groups'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(Gate::denies('group_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.groups.create');
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
            'description' => 'required',
            'address' => 'required',
        ]);

        $group = new Group();
        $user = Auth::user();

        $group->name = $request->name;
        $group->description = $request->description;
        $group->address = $request->address;
        $group->create_by = $user->id;

        if ($group->save()) {
            flash()->addSuccess('Tạo Nhóm Thành Công!');
            return redirect()->route('admin.groups.index');
        }
        flash()->addError('Tạo Nhóm không thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group  $group)
    {
        abort_if(Gate::denies('group_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.groups.show', compact('group'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group  $group)
    {
        abort_if(Gate::denies('group_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group  $group)
    {
        //
        //
        $validatedData = $request->validate([
            // 'name' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:255',
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
        ]);


        $group->name = $request->name;
        $group->description = $request->description;
        $group->address = $request->address;

        if ($group->save()) {
            flash()->addSuccess('Cập nhật Nhóm Thành Công!');
            return redirect()->route('admin.groups.index');
        }
        flash()->addError('Cập nhật Nhóm không thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group  $group)
    {
        abort_if(Gate::denies('group_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($group->delete()) {
            flash()->addSuccess('Xóa Nhóm Thành Công!');
            return redirect()->route('admin.groups.index');
        }
        flash()->addError('Xóa Nhóm Thất bại!');
        return redirect()->route('admin.groups.index');
    }
}
