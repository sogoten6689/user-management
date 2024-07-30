@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                Danh Sách Đội Nhóm
            </div>
            @can('permission_create')
                <div class="float-end">
                    <a class="btn btn-success btn-sm text-white" href="{{ route("admin.groups.create") }}">
                        Thêm nhóm mới
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
                            Tên Nhóm
                        </th>
                        <th>
                            Mô tả
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
                    @foreach($groups as $key => $group)
                        <tr data-entry-id="{{ $group->id }}">
                            <td>
                                {{ $group->id ?? '' }}
                            </td>
                            <td>
                                {{ $group->name ?? '' }}
                            </td>
                            <td>
                                {{ $group->description ?? '' }}
                            </td>
                            <td>
                                {{ $group->created_at->format('Y-m-d') ?? '' }}
                            </td>
                            <td>
                                <a href="{{ route('admin.groups.show', $group->id) }}" class="badge bg-info">
                                    <span data-feather="eye" class="align-text-bottom"></span>
                                </a> 
                                <a href="{{ route('admin.groups.edit', $group->id) }}" class="badge bg-warning">
                                    <span data-feather="edit" class="align-text-bottom"></span>
                                </a> 
                                <form id="delete-form-{{ $group->id }}" method="post"
                                      action="{{ route('admin.groups.destroy', $group->id) }}"
                                      style="display: none">
                                    {{csrf_field()}}
                                    {{ method_field('DELETE') }}
                                </form>
                                <a href="javascript:void(0)" class="badge bg-danger text-white" onclick="
                                    if(confirm('Bạn có chắc muốn xoá nhóm?'))
                                    {
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $group->id }}').submit();
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
            {{ $groups->links() }}
        </div>
    </div>
@endsection
