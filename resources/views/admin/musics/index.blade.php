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

            @can('permission_create')
                <form action="{{ route('admin.musics.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="file" class="form-label">Upload Excel File</label>
                        <input type="file" name="file" class="form-control" required>
                        @error('file')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <a target="_blank" href="https://docs.google.com/spreadsheets/d/1GXaUZ5W8YFnwcdV2dgEtw2yRznTs1olrvEumxZCLCZA/edit?gid=0#gid=0" class="btn btn-info btn-sm text-white">Sample</a>
                    <button type="submit" class="btn btn-primary btn-sm">Import</button>
                </form>
            @endcan
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <form action="{{ route('admin.musics.index') }}" method="GET" class="form-inline float-right">
                        <div class="input-group">
                            <input type="search" name="search"  class="form-control rounded" placeholder="Tìm kiếm tên bài hát hoặc tác giả ..." aria-label="Search" aria-describedby="search-addon" value="{{ request('search') }}"/>
                            <button type="submit" class="btn btn-outline-success">Tìm kiếm</button>
                        </div>
                    </form>
                </div>
            </div>


            @if($musics->isEmpty())
                <div class="text-center mt-3">
                    <p>Không tìm thấy kết quả nào.</p>
                </div>
            @else
                <div class="table mt-3">
                    <table class="table table-hover table-responsive table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Tên bài</th>
                                <th scope="col">Tác giả</th>
                                <th scope="col">Người tạo</th>
                                <th scope="col">Thao Tác</th>
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
                                        <a href="{{ route('admin.musics.show', $music->id) }}" class="btn btn-info btn-sm">
                                            <span data-feather="eye" class="align-text-bottom"></span>
                                        </a>
                                        <a href="{{ route('admin.musics.edit', $music->id) }}" class="btn btn-warning btn-sm">
                                            <span data-feather="edit" class="align-text-bottom"></span>
                                        </a>
                                        <form action="{{ route('admin.musics.destroy', $music->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <span data-feather="trash" class="align-text-bottom"></span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
        <div class="card-footer clearfix">
            {{ $musics->links() }}
        </div>
    </div>
@endsection
