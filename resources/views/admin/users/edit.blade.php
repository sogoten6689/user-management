@extends('layouts.master')
@section('content')

    <div class="card border-0 shadow-sm">
        <div class="card-header">
            Chỉnh Sửa
        </div>
        <form action="{{ route("admin.users.update", $user->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="mb-2">
                    <label for="title">Tên*</label>
                    <input type="text" id="title" name="name" class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name', isset($user) ? $user->name : '') }}" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                {{-- <div class="mb-2">
                    <label for="title">Email*</label>
                    <input type="email" id="email" name="email" class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('email', isset($email) ? $user->email : '') }}" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                 --}}
                <div class="form-group">
                    <label for="role">Vai Trò</label>
                    <select class="form-control @error('role') is-invalid @enderror" id="role" name="role" required>
                        @foreach($roles as $role)
                            <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary me-2" type="submit">Save</button>
                <a class="btn btn-secondary" href="{{ route('admin.users.index') }}">
                    Back to list
                </a>
            </div>
        </form>
    </div>
@endsection

