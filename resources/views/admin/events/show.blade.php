@extends('layouts.master')
@section('content')

    <div class="card border-0 shadow-sm">
        <div class="card-header">
            {{ $event->name }}
        </div>
        <form action="{{ route("admin.events.store")}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <label for="name" class="form-label text-bold">
                            <b>
                            Tên Chương Trình*
                            </b>
                        </label>
                        <div> {{ isset($event) ? $event->name : '' }}</div>
                    </div>
                    <div class="col-6">
                        <label for="date"  class="form-label text-bold">
                            <b>Ngày Hoạt động*</b>
                        </label>
                        <div> {{ isset($event) ? $event->date->format('d/m/Y') : '' }}</div>
                    </div>
                </div>

                <h3>Chi tiết chương trình</h3>
                @if($event->eventItems->isEmpty())
                    <p>Chi tiết chương trình không có.</p>
                @else
                    <ul class="list-group">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Loại</th>
                                <th>Bài hát</th>
                                <th>Sách</th>
                                <th>Tệp bài hát</th>
                                <th>Ghi Chú</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($event->eventItems as $key => $item)
                                 <tr>
                                    <td>{{ $key +1 }}</td>
                                    <td>{{ $item->item_type }}</td>
                                    @if($item->music)
                                        <td><a href="{{ route('admin.musics.show', $item->music->id) }}">{{ $item->music->song_name }}</a></td>
                                        <td>
                                            @if(is_array($item->music->link_pdf))
                                                @foreach($item->music->link_pdf as $link)
                                                    <a href="{{ $link }}" target="_blank">{{ $link }}</a>@if(!$loop->last), @endif
                                                @endforeach
                                            @else
                                                <a href="{{ $item->music->link_pdf  }}" target="_blank">{{ $item->music->link_pdf  }}</a>
                                            @endif
                                        </td>
                                        <td>

                                            @if(is_array($item->music->link_content))
                                                @foreach($item->music->link_content as $link)
                                                    <a href="{{ $link }}" target="_blank">{{ $link }}</a>@if(!$loop->last), @endif
                                                @endforeach
                                            @else
                                                <a href="{{ $item->music->link_content  }}" target="_blank">{{ $item->music->link_content  }}</a>
                                            @endif
                                        </td>

                                    @else
                                        <td>--</td>
                                        <td>--</td>
                                        <td>--</td>
                                    @endif
                                    <td>{{ $item->note }}</td>
                                 </tr>
                                @endforeach
                            </tbody>
                        </table>
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

