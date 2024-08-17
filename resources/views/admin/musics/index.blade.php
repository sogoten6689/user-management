@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                Danh Sách Bài Hát
            </div>
            @can('permission_create')
                <div class="float-end">
                    <a class="btn btn-success btn-sm text-white" href="{{ route("admin.musics.create") }}">
                        Thêm bài hát mới
                    </a>
                </div>
            @endcan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên bài</th>
                            <th>Tác giả</th>
                            <th>Người tạo</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($musics as $music)
                            <tr>
                                <td>{{ $music->id }}</td>
                                <td>{{ $music->song_name }}</td>
                                <td>{{ $music->author }}</td>

                            
                                <td>{{ $music->creator->name ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('admin.musics.show', $music->id) }}" class="btn btn-info">
                                        <span data-feather="eye" class="align-text-bottom"></span>
                                    </a>
                                    <a href="{{ route('admin.musics.edit', $music->id) }}" class="btn btn-warning">
                                        <span data-feather="edit" class="align-text-bottom"></span>
                                    </a>
                                    <form action="{{ route('admin.musics.destroy', $music->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <span data-feather="trash" class="align-text-bottom"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer clearfix">
            {{ $musics->links() }}
        </div>
    </div>
@endsection
