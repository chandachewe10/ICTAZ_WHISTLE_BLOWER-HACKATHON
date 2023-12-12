
@extends('adminlte::page')
@section('title', 'Charts')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@stop



@section('content_header')
    <h1>Chart View</h1>
@stop

@section('content')
<div class="container">

@if (Auth::check())
    <div class="card">
        <div class="card-header text-center text-uppercase">Crime Statistics</div>
        <div class="row m-0">
            <div class="col-md-3 card card-header  text-center">
                <div class="card card-heading bg-primary text-white text-uppercase">
                    TOTAL CRIME CATEGORIES
                </div>
                {{-- <a href="{{ route('category.index') }}"> --}}
                <div class="card card-body">
                    <h1>{{ $category_count }}</h1>
                </div>
                {{-- </a> --}}
            </div>

            <div class="col-md-3 card card-header  text-center">
                <div class="card card-heading bg-primary text-white text-uppercase">
                    Total Crimes Reported
                </div>
                {{-- <a href="{{ route('product.index') }}"> --}}
                <div class="card card-body">
                    <h1>{{ $total_reported_case }}</h1>
                </div>
                {{-- </a> --}}
            </div>

            <div class="col-md-3 card card-header  text-center">
                <div class="card card-heading bg-primary text-white text-uppercase">
                    Total Open Invistigation
                </div>
                {{-- <a href="{{ route('staff.index') }}"> --}}
                <div class="card card-body">
                    <h1>{{ $total_case_open }}</h1>
                </div>
                {{-- </a> --}}
            </div>

            <div class="col-md-3 card card-header  text-center">
                <div class="card card-heading bg-primary text-white text-uppercase">
                    Total Closed Invistigation
                </div>
                {{-- <a href="{{ route('staff.index') }}"> --}}
                <div class="card card-body">
                    <h1>{{ $total_case_close }}</h1>
                </div>
                {{-- </a> --}}
            </div>
        </div>
    </div>
@endif

<div class="card row">
    <div class="card-body col-md-12">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if (Auth::check())
            <div class="card-header text-center text-uppercase">Crime Statistics Graph</div>

            {{-- Render char --}}
            <div class="chart">
                {!! $chart->container() !!}

                {!! $chart->script() !!}
            </div>

        @endif


    </div>
</div>
</div>
@stop




@section('footer')
<div class="footer-content">
            <p>&copy; 2023 ICTAZ WHISTLE BLOWER HACKATHON. All rights reserved. Created and designed with ❤️ by Chanda Chewe.</p>
        </div> 
@stop



































































































































































































