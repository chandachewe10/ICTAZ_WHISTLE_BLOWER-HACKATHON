@extends('adminlte::page')
@section('title', 'News')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@stop



@section('content_header')
    <h1>News & Information </h1>
@stop

@section('content')
<div class="container">
        <div class="card">

            <div class="card-header text-center">News/Announcement</div>
            <div class="card-body">
                <table class="js-table">
                    <thead>
                        <th scope="col" class="text-left">Heading</th>
                        <th scope="col" class="text-left">Updated</th>
                        <th scope="col" class="text-center">Action</th>
                    </thead>
                    <tbody>
                        @if ($announcements->count() > 0)

                            @foreach ($announcements as $announcement)
                                <tr>
                                    <td class="text-capitalize" data-label="Title">
                                        <a href="{{route('news.show', $announcement->id)}}">{!! Str::substr($announcement->title, 0, 30) !!}</a>
                                      
                                    </td>
                                    <td class="text-capitalize" data-label="Posted">
                                        {{ $announcement->created_at->format('M d,Y \a\t h:i a') }}
                                    </td>
                                    <td class="text-capitalize text-center">
                                        <a href="{{route('news.show', $announcement->id)}}" class="btn btn-success btn-sm text-white">Read </a>
                                    </td>
                                </tr>
                            @endforeach

                        @else
                            <tr>
                                <td colspan="5" class="text-center">No Announcement yet</td>
                            </tr>
                        @endif
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@stop




@section('footer')
<div class="footer-content">
            <p>&copy; 2023 ICTAZ WHISTLE BLOWER HACKATHON. All rights reserved. Created and designed with ❤️ by Chanda Chewe.</p>
        </div> 
@stop



























































































































































































































































