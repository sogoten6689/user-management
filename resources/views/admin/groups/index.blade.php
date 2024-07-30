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
                                <a href="{{ route('admin.groups.show', $group->id) }}" class="badge bg-info">Xem</a> 
                                <a href="{{ route('admin.groups.edit', $group->id) }}" class="badge bg-info">Sửa</a> 
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
