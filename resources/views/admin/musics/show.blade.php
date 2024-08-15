@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12 col-sm-6 col-xxl-3 d-flex mb-4">
            <div class="card illustration flex-fill">
                <div class="card-body p-0 d-flex flex-fill">
                    <div class="row g-0 w-100">
                        <div class="col-12">

                            @section('content')
                                <h1>{{ $music->song_name }}</h1>
                                <p><strong>Author:</strong> {{ $music->author }}</p>
                                <p><strong>First Sentence:</strong> {{ $music->first_sentence }}</p>

                                <p><strong>Link PDF:</strong>
                                    @if(is_array($music->link_pdf))
                                        @foreach($music->link_pdf as $link)
                                            <a href="{{ $link }}" target="_blank">{{ $link }}</a>@if(!$loop->last), @endif
                                        @endforeach
                                    @else
                                        <span>{{ $music->link_pdf }}</span>
                                    @endif
                                </p>
                                <p><strong>Link Content:</strong>
                                    @if(is_array($music->link_content))
                                        @foreach($music->link_content as $link)
                                            <a href="{{ $link }}" target="_blank">{{ $link }}</a>@if(!$loop->last), @endif
                                        @endforeach
                                    @else
                                        <span>{{ $music->link_content }}</span>
                                    @endif
                                </p>
                                
                                <p><strong>Category:</strong> {{ $music->category }}</p>
                                <p><strong>Book:</strong> {{ $music->book }}</p>
                                <p><strong>Notes:</strong> {{ $music->notes }}</p>
                                <p><strong>Public:</strong> {{ $music->public ? 'Yes' : 'No' }}</p>
                                <a href="{{ route('admin.musics.index') }}" class="btn btn-secondary">Back to List</a>
                            @endsection
                            
                        </div>
                        <div class="col-6 align-self-end text-end">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
