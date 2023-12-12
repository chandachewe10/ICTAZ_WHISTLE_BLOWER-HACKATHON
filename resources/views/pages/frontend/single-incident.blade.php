@extends('adminlte::page')
@section('title', 'Reports')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@stop



@section('content_header')
    <h1>Single Incident</h1>
@stop

@section('content')
<div class="card">
        <div class="card-header text-center">
            Reported Incident Full Details
        </div>

        <div class="card-body">
            <x-errors />



            <div class="row">
                <div class="col-md-12">
                    @if ($incident)
                        Reported: {{ $incident->created_at->format('M d,Y \a\t h:i a') }}
                    @else
                        Page does not exist
                    @endif
                </div>

                <div class="col-md-12">
                    <ul class="list-group">
                        <li class="list-group-item text-capitalize"><span class="text-primary">Crime Category:
                            </span>{{ $incident->crimecategory->category_name }}</li>

                        <li class="list-group-item text-capitalize"><span class="text-primary">Status:
                            </span>{{ $incident->status }}</li>

                        <li class="list-group-item text-capitalize"><span class="text-primary">LGA of Incident:
                            </span>{{ $incident->lga }}</li>

                        <li class="list-group-item text-capitalize"><span class="text-primary">Address of Incident:
                            </span>{{ $incident->address }}</li>
                        <li class="list-group-item text-justify"><span class="text-primary">Description/Statement:
                            </span><br>
                            {{ $incident->description }}</li>

                        <li class="list-group-item text-capitalize"><span class="text-primary">Photo Evidence:
                            </span><br>
                            {{-- {{ $incident->photo }} --}}
                            @if (empty($incident->photo))
                                No photo evidence
                            @else
                                <figure>
                                    <img src="{{ asset($incident->photo) }}" class="img-fluid" alt="">
                                </figure>
                            @endif

                        </li>

                        <li class="list-group-item text-capitalize"><span class="text-primary">Video Evidence:
                            </span><br>

                            @if (empty($incident->video))
                                {{ 'No video evidence' }}
                            @else
                                <div class="embed-responsive embed-responsive-16by9">
                                    <video class="embed-responsive-item" controls>
                                        <source src="{{ URL::asset($incident->video) }}" type="video/mp4">
                                        Your browser does not support the video.
                                    </video>

                                </div>
                            @endif

                        </li>
                    </ul>

                </div>

                <div class="col-md-12">


                    @if ($feedbacks)
                        <div class="col-md-12 pt-3">
                            <h3 class="text-center text-uppercase">Feedback/Progress</h3>

                            @if ($feedbacks->count() > 0)
                                <ul style="list-style: none; padding: 0">
                                    @foreach ($feedbacks as $feedback)
                                        <li class="panel-body">
                                            <div class="list-group">
                                                <div class="card-header">
                                                    {{ $feedback->reporter->name }}
                                                    {{ $feedback->created_at->format('M d,Y \a\t h:i a') }}

                                                </div>
                                                <div class="list-group-item">
                                                    {{ $feedback->body }}
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <hr>
                                <p>No Feedback yet</p>
                            @endif

                        </div>
                    @endif
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


























































































































































































































































