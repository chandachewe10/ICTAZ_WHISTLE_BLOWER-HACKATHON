
@extends('adminlte::page')
@section('title', 'Profile')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@stop



@section('content_header')
    <h1>Profile</h1>
@stop

@section('content')
<div class="card">
        <div class="card-header text-center">
            User Profile
        </div>

        <div class="card-body">
            <x-errors />



            <div class="row">
                <div class="col-md-12">
                    @if ($user)
                        Registered: {{ $user->created_at->format('M d,Y \a\t h:i a') }}
                        
                        @if (!Auth::guest() && Auth::user()->is_super_admin())

                            <button class="btn" style="float: right"><a href="{{ route('role.edit' , $user->id) }}">
                                    Edit user</a>
                            </button>
                        @endif
                    @else
                        Page does not exist
                    @endif
                </div>

                <div class="col-md-12">
                    <ul class="list-group">
                        <li class="list-group-item text-capitalize"><span class="text-primary">{{ __('Name') }}:
                            </span>{{ $user->name }}</li>

                        <li class="list-group-item text-capitalize"><span class="text-primary">{{ __('Email') }}:
                            </span>{{ $user->email }}</li>

                        <li class="list-group-item text-capitalize"><span class="text-primary">{{ __('Gender') }}:
                            </span>{{ $user->gender }}</li>

                        <li class="list-group-item text-capitalize"><span class="text-primary">{{ __('Phone') }}:
                            </span>{{ $user->phone }}</li>
                        <li class="list-group-item text-justify"><span class="text-primary">{{ __('Status') }}:
                            </span>
                            {{ $user->status }}</li>
                            <li class="list-group-item text-justify"><span class="text-primary">{{ __('Role') }}:
                            </span><br>
                            {{ $user->role }}</li>

                        <li class="list-group-item text-capitalize"><span class="text-primary">{{ __('Photo') }}:
                            </span><br>
                            {{-- {{ $user->photo }} --}}
                            @if (empty($user->photo))
                                No photo 
                            @else
                                <figure>
                                    <img src="{{ asset($user->photo) }}" class="img-fluid" alt="Profile" width="100" height="100">
                                </figure>
                            @endif

                        </li>

                    
                    </ul>

                </div>
            
            </div>

        </div>
    </div>

@stop




@section('footer')
<div class="footer-content">
            <p>&copy; 2023 ICTAZ WHISTLE BLOWER HACKATHON. All rights reserved. Created and designed with ❤️ by Chanda Chewe.</p>
        </div> 
@stop












































































































































































