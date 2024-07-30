@extends('layouts.master')
@section('content')

    <div class="card border-0 shadow-sm">
        <div class="card-header">
            {{ $group->name }}
        </div>
        <form action="{{ route("admin.groups.store")}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="mb-2">
                    <label for="name">Tên Nhóm*</label>
                    <div> {{ isset($group) ? $group->name : '' }}</div>
                </div>
                <div class="mb-2">
                    <label for="description">Mô tả*</label>
                    <div> {{ isset($group) ? $group->description : '' }}</div>
                </div>
                <div class="mb-2">
                    <label for="address">Địa chỉ*</label>
                    <div> {{ isset($group) ? $group->address : '' }}</div>
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-secondary" href="{{ route('admin.groups.index') }}">
                    Trở Lại
                </a>
            </div>
        </form>
    </div>
@endsection

