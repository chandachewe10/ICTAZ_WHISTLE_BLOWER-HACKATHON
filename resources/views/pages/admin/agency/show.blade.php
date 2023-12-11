

@extends('adminlte::page')
@section('title', 'Agent')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@stop



@section('content_header')
    <h1>Edit Agent</h1>
@stop

@section('content')
<div class="card">
        <div class="card-header text-center text-uppercase">
           <h4> {{ $agency->agency_name }}</h4>
        </div>

        <div class="card-body">
            <x-errors />



            <div class="row">
                <div class="col-md-12">
                    @if ($agency)
                        Created: {{ $agency->created_at->format('M d,Y \a\t h:i a') }} By
                        {{ $agency->agent->name }}
                        @if ((!Auth::guest() && Auth::user()->is_security_agency()) || Auth::user()->is_super_admin())

                            <button class="btn" style="float: right"><a href="{{ route('agency.edit', $agency->id) }}">
                                    Edit Agency Profile</a>
                            </button>
                        @endif
                    @else
                        Page does not exist
                    @endif
                </div>

                <div class="col-md-12">
                    <ul class="list-group">
                        <li class="list-group-item text-capitalize"><span class="text-primary">Agency Name:
                            </span>{{ $agency->agency_name }}</li>

                        <li class="list-group-item text-capitalize"><span class="text-primary">Phone:
                            </span>{{ $agency->phone }}</li>

                        <li class="list-group-item text-capitalize"><span class="text-primary">Website:
                            </span>{{ $agency->website }}</li>

                        <li class="list-group-item text-capitalize"><span class="text-primary">Email:
                            </span>{{ $agency->email }}</li>
                        <li class="list-group-item text-justify"><span class="text-primary">About:
                            </span><br>
                            {{ $agency->about }}</li>
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


















































