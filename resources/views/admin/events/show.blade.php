@extends('layouts.master')
@section('content')

    <div class="card border-0 shadow-sm">
        <div class="card-header">
            {{ $event->name }}
        </div>
        <form action="{{ route("admin.events.store")}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="mb-2">
                    <label for="name">Tên Chương Trình*</label>
                    <div> {{ isset($event) ? $event->name : '' }}</div>
                </div>
                <div class="mb-2">
                    <label for="address">Ngày Hoạt động*</label>
                    <div> {{ isset($event) ? $event->address : '' }}</div>
                </div>

                <h3>Chi tiết chương trình</h3>
                @if($event->eventItems->isEmpty())
                    <p>Chi tiết chương trình không có.</p>
                @else
                    <ul class="list-group">
                        @foreach($event->eventItems as $key => $item)
                            <li class="list-group-item">
                                <strong>#:</strong> {{ $key +1 }}<br>
                                <strong>Loại:</strong> {{ $item->item_type }}<br>
                                @if($item->music)
                                    <strong>Bài hát:</strong> <a href="{{ route('admin.musics.show', $item->music->id) }}">{{ $item->music->song_name }}</a><br>
                                @endif
                                @if($item->note)
                                    <strong>Ghi Chú:</strong> {{ $item->note }}<br>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="card-footer">
                <a class="btn btn-secondary" href="{{ route('admin.events.index') }}">
                    Trở Lại
                </a>
            </div>
        </form>
    </div>
@endsection

