@extends('layouts.master')
@section('content')

    <div class="card border-0 shadow-sm">
        <div class="card-header">
            Tải bài hát lên
        </div>
        <form action="{{ route('admin.musics.update', $music->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="song_name">Song Name</label>
                    <input type="text" class="form-control @error('song_name') is-invalid @enderror" id="song_name" name="song_name" value="{{ old('song_name', $music->song_name) }}" required>
                    @error('song_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ old('author', $music->author) }}">
                    @error('author')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="first_sentence">First Sentence</label>
                    <input type="text" class="form-control @error('first_sentence') is-invalid @enderror" id="first_sentence" name="first_sentence" value="{{ old('first_sentence', $music->first_sentence) }}">
                    @error('first_sentence')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="link_pdf">Link PDF</label>
                    <input type="text" class="form-control @error('link_pdf') is-invalid @enderror" id="link_pdf" name="link_pdf" value="{{ old('link_pdf', implode(', ', $music->link_pdf)) }}">
                    @error('link_pdf')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="link_content">Link Content</label>
                    <input type="text" class="form-control @error('link_content') is-invalid @enderror" id="link_content" name="link_content" value="{{ old('link_content', implode(', ', $music->link_content)) }}">
                    @error('link_content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" value="{{ old('category', $music->category) }}">
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="book">Book</label>
                    <input type="text" class="form-control @error('book') is-invalid @enderror" id="book" name="book" value="{{ old('book', $music->book) }}">
                    @error('book')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="notes">Notes</label>
                    <input type="text" class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" value="{{ old('notes', $music->notes) }}">
                    @error('notes')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="public">Public</label>
                    <select class="form-control @error('public') is-invalid @enderror" id="public" name="public">
                        <option value="1" {{ old('public', $music->public) == '1' ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ old('public', $music->public) == '0' ? 'selected' : '' }}>No</option>
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

