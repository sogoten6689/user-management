@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                Danh Sách Chương Trình
            </div>
            @can('permission_create')
                <div class="float-end">
                    <a class="btn btn-success btn-sm text-white" href="{{ route("admin.events.create") }}">
                        Thêm Chương TRình
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
                            Tên Chương Trình
                        </th>
                        <th>
                            Ngày hoạt động
                        </th>
                        <th>
                            Người tạo
                        <th>
                            Ngày tạo
                        </th>
                        <th>
                            Thao tác
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($events as $key => $event)
                        <tr data-entry-id="{{ $event->id }}">
                            <td>
                                {{ $event->id ?? '' }}
                            </td>
                            <td>
                                {{ $event->name ?? '' }}
                            </td>
                            <td>
                                {{ $event->date->format('Y-m-d') ?? '' }}
                            </td>
                            <td>{{ $event->creator->name ?? 'N/A' }}</td>
                            <td>
                                {{ $event->created_at->format('Y-m-d') ?? '' }}
                            </td>
                            <td>
                                <a href="{{ route('admin.events.show', $event->id) }}" class="badge bg-info">
                                    <span data-feather="eye" class="align-text-bottom"></span>
                                </a> 
                                <a href="{{ route('admin.events.edit', $event->id) }}" class="badge bg-warning">
                                    <span data-feather="edit" class="align-text-bottom"></span>
                                </a> 
                                <form id="delete-form-{{ $event->id }}" method="post"
                                      action="{{ route('admin.events.destroy', $event->id) }}"
                                      style="display: none">
                                    {{csrf_field()}}
                                    {{ method_field('DELETE') }}
                                </form>
                                <a href="javascript:void(0)" class="badge bg-danger text-white" onclick="
                                    if(confirm('Bạn có chắc muốn xoá nhóm?'))
                                    {
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $event->id }}').submit();
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
            {{ $events->links() }}
        </div>
    </div>
@endsection
