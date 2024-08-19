@extends('layouts.master')
@section('content')

    <div class="card border-0 shadow-sm">
        <div class="card-header">
            Tải bài hát lên
        </div>
        <form action="{{ route("admin.musics.store")}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="song_name">Tên bài hát*</label>
                    <input type="text" class="form-control @error('song_name') is-invalid @enderror" id="song_name" name="song_name" value="{{ old('song_name') }}" required>
                    @error('song_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="author">Tác giả</label>
                    <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ old('author') }}">
                    @error('author')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="first_sentence">Câu đầu</label>
                    <input type="text" class="form-control @error('first_sentence') is-invalid @enderror" id="first_sentence" name="first_sentence" value="{{ old('first_sentence') }}">
                    @error('first_sentence')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="link_pdf">Link PDF</label>
                    <input type="text" class="form-control @error('link_pdf') is-invalid @enderror" id="link_pdf" name="link_pdf" value="{{ old('link_pdf') }}">
                    @error('link_pdf')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="link_content">Link Content</label>
                    <input type="text" class="form-control @error('link_content') is-invalid @enderror" id="link_content" name="link_content" value="{{ old('link_content') }}">
                    @error('link_content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category">Loại</label>
                    <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" value="{{ old('category') }}">
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="book">Sách</label>
                    <input type="text" class="form-control @error('book') is-invalid @enderror" id="book" name="book" value="{{ old('book') }}">
                    @error('book')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="notes">Ghi chú</label>
                    <input type="text" class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" value="{{ old('notes') }}">
                    @error('notes')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="public">Công khai</label>
                    <select class="form-control @error('public') is-invalid @enderror" id="public" name="public">
                        <option value="1" {{ old('public') == '1' ? 'selected' : '' }}>Có</option>
                        <option value="0" {{ old('public') == '0' ? 'selected' : '' }}>Không</option>
                    </select>
                    @error('public')
                        <div class="invalid-feedback">{{ $message }}</div>
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

