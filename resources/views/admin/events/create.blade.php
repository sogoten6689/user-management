@extends('layouts.master')
@section('content')

    <div class="card border-0 shadow-sm">
        <div class="card-header">
            Tạo Chương Trình
        </div>
        <form action="{{ route("admin.events.store")}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6  mb-4">
                        <div class="mb-2">
                            <label for="title">Tên Chương Trình*</label>
                            <input type="text" id="title" name="name" class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', isset($event) ? $event->name : '') }}" required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-sm-6  mb-4">

                        <div class="mb-2">
                            <label for="date">Ngày Chương Trình*</label>
                            <input type="date" id="date" name="date" class="form-control @error('date') is-invalid @enderror"
                                value="{{ old('date', isset($event) ? $event->date : '') }}" required>
                            @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>



                <h4>Chi tiết</h4>
                <div id="event-items">
                    <div class="event-item mb-3">
                        <div class="row">
                            <div class="col-1">
                                <label for="number">#</label>
                                <input type="text" name="event_items[0][number]" class="form-control item-number" value="1" readonly>
                            </div>
                            <div class="col-2">
                                <label for="item_type">Loại*</label>
                                <select name="event_items[0][item_type]" class="form-control @error('event_items.0.item_type') is-invalid @enderror" required>
                                    <option value="">Chọn loại</option>
                                    @foreach(App\Models\EventItem::getItemTypes() as $type)
                                        <option value="{{ $type }}" {{ old('event_items.0.item_type') == $type ? 'selected' : '' }}>
                                            {{ $type }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-3">
                                <label for="music_id">Bài hát </label>
                                <select name="event_items[0][music_id]" class="form-control @error('event_items.0.music_id') is-invalid @enderror">
                                    <option value="">Chọn bài hát</option>
                                    @foreach($musics as $music)
                                        <option value="{{ $music->id }}">{{ $music->song_name }}</option>
                                    @endforeach
                                </select>
                                @error('event_items.0.music_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                            <div class="col-4">
                                <label for="note">Ghi Chú</label>
                                <textarea name="event_items[0][note]" class="form-control @error('event_items.0.note') is-invalid @enderror">{{ old('event_items.0.note') }}</textarea>
                                @error('event_items.0.note')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-2">
                                <button type="button" class="btn btn-danger mt-2 remove-item">
                                    x
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

                <button type="button" class="btn btn-primary" id="add-item">
                    <span data-feather="plus" class="align-text-bottom"></span>
                </button>

                
            </div>
            <div class="card-footer">
                <button class="btn btn-primary me-2" type="submit">Lưu</button>
                <a class="btn btn-secondary" href="{{ route('admin.events.index') }}">
                    Trở Lại
                </a>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
<script>
    let itemIndex = 1;

    document.getElementById('add-item').addEventListener('click', function() {
        const eventItems = document.getElementById('event-items');
        const newItem = document.createElement('div');
        newItem.classList.add('event-item', 'mb-3');

        const types = @json(App\Models\EventItem::getItemTypes());

        let options = '<option value="">Chọn loại</option>';
        types.forEach(function(type) {
            options += `<option value="${type}">${type}</option>`;
        });

        newItem.innerHTML = `
            <div class="row">
                <div class="col-1">
                    <input type="text" name="event_items[${itemIndex}][number]" class="form-control item-number" value="${itemIndex + 1}" readonly>
                </div>
                <div class="col-2">
                    <select name="event_items[${itemIndex}][item_type]" class="form-control" required>
                        ${options}
                    </select>
                </div>
                <div class="col-3">
                    <select name="event_items[${itemIndex}][music_id]" class="form-control">
                        <option value="">Chọn bài hát</option>
                        @foreach($musics as $music)
                            <option value="{{ $music->id }}">{{ $music->song_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <textarea name="event_items[${itemIndex}][note]" class="form-control"></textarea>
                </div>
                <div class="col-1">
                    <button type="button" class="btn btn-danger remove-item">
                        x
                    </button>
                </div>
            </div>
        `;

        eventItems.appendChild(newItem);
        itemIndex++;
        updateItemNumbers();
    });

    document.getElementById('event-items').addEventListener('click', function(e) {
        if (e.target.closest('.remove-item')) {
            e.target.closest('.event-item').remove();
            updateItemNumbers();
        }
    });

    function updateItemNumbers() {
        const itemNumbers = document.querySelectorAll('.item-number');
        itemNumbers.forEach((input, index) => {
            input.value = index + 1;
        });
    }
</script>
@endsection