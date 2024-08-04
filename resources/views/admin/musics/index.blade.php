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
                        <th>
                            ID
                        </th>
                        <th>
                            Tên bài
                        </th>
                        <th>
                            link
                        </th>
                        <th>
                            Ngày tạo
                        </th>
                        <th>
                            Thao tác
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($musics as $key => $music)
                        <tr data-entry-id="{{ $music->id }}">
                            <td>
                                {{ $music->id ?? '' }}
                            </td>
                            <td>
                                {{ $music->name ?? '' }}
                            </td>
                            <td>
                                {{ $music->description ?? '' }}
                            </td>
                            <td>
                                {{ $music->created_at->format('Y-m-d') ?? '' }}
                            </td>
                            <td>
                                <a href="{{ route('admin.musics.show', $music->id) }}" class="badge bg-info">
                                    <span data-feather="eye" class="align-text-bottom"></span>
                                </a> 
                                <a href="{{ route('admin.musics.edit', $music->id) }}" class="badge bg-warning">
                                    <span data-feather="edit" class="align-text-bottom"></span>
                                </a> 
                                <form id="delete-form-{{ $music->id }}" method="post"
                                      action="{{ route('admin.musics.destroy', $music->id) }}"
                                      style="display: none">
                                    {{csrf_field()}}
                                    {{ method_field('DELETE') }}
                                </form>
                                <a href="javascript:void(0)" class="badge bg-danger text-white" onclick="
                                    if(confirm('Bạn có chắc muốn xoá bài hát?'))
                                    {
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $music->id }}').submit();
                                    }">
                                    <span data-feather="trash-2" class="align-text-bottom"></span>
                                    
                                </a>
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
