@extends('layouts.master')
@section('content')

    <div class="card border-0 shadow-sm">
        <div class="card-header">
            Tạo Đội Nhóm
        </div>
        <form action="{{ route("admin.groups.store")}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="mb-2">
                    <label for="title">Tên Nhóm*</label>
                    <input type="text" id="title" name="name" class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name', isset($group) ? $group->name : '') }}" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="description">Mô tả*</label>
                    <input type="text" id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                           value="{{ old('description', isset($group) ? $group->description : '') }}" required>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="address">Địa chỉ*</label>
                    <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror"
                           value="{{ old('address', isset($group) ? $group->address : '') }}" required>
                    @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary me-2" type="submit">Save</button>
                <a class="btn btn-secondary" href="{{ route('admin.groups.index') }}">
                    Back to list
                </a>
            </div>
        </form>
    </div>
@endsection

