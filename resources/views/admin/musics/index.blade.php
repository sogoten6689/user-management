@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12 col-sm-6 col-xxl-3 d-flex mb-4">
            <div class="card illustration flex-fill">
                <div class="card-body p-0 d-flex flex-fill">
                    <div class="row g-0 w-100">
                        <div class="col-6">
                            <div class="illustration-text p-3 m-1">
                                <h4 class="illustration-text">Welcome Back, {{ auth()->user()->name }}!</h4>
                                @php
                                    $roles = auth()->user()->getRoleNames()->toArray();
                                @endphp
                                <p class="mb-0">{{ implode(" ", $roles) }}</p>
                            </div>
                        </div>
                        <div class="col-6 align-self-end text-end">
                            <img src="{{ asset('images/admin/customer-support.png') }}" alt="Customer Support"
                                 class="img-fluid illustration-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
