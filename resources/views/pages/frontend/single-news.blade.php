@extends('adminlte::page')
@section('title', 'News')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@stop



@section('content_header')
    <h1>Single-News</h1>
@stop

@section('content')
<div class="card">
        <div class="card-header text-center text-uppercase">
            <h4> {{ $announcement->title }}</h4>
        </div>

        <div class="card-body">
            <x-errors />



            <div class="row">
                <div class="col-md-12">
                    @if ($announcement)
                        Posted: {{ $announcement->created_at->format('M d,Y \a\t h:i a') }}                        
                    @else
                        Page does not exist
                    @endif
                </div>

                <div class="col-md-12">
                    <ul class="list-group">
                        <li class="list-group-item text-capitalize"><span class="text-primary">Heading:
                            </span><br>{{ $announcement->title }}</li>

                        <li class="list-group-item text-capitalize text-justify"><span class="text-primary">News/Announcement:
                                <br>
                            </span>{{ $announcement->description }}</li>
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



































































































































































































































































