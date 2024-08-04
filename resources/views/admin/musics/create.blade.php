@extends('layouts.master')
@section('content')

    <div class="card border-0 shadow-sm">
        <div class="card-header">
            Tải bài hát lên
        </div>
        <form action="{{ route("admin.musics.store")}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="mb-2">
                    <label for="title">Tên bài*</label>
                    <input type="text" id="title" name="name" class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name', isset($music) ? $music->name : '') }}" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="mp3file">Choose MP3 file</label>
                    <input type="file" class="form-control" name="mp3file" id="mp3file" required accept="audio/*">
                    @error('mp3file')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary me-2" type="submit">Lưu</button>
                <a class="btn btn-secondary" href="{{ route('admin.musics.index') }}">
                    Trở Lại
                </a>
            </div>
        </form>
    </div>
@endsection

