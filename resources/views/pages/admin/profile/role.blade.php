@extends('adminlte::page')
@section('title', 'Roles')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@stop



@section('content_header')
    <h1>Role</h1>
@stop

@section('content')
<div class="container">
        <div class="card">


            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @if (Auth::check())
                    <div class="card-header text-center text-uppercase">Statistics</div>
                    <div class="chart has-fixed-height" id="bars_basic"></div>
                @endif
            </div>
        </div>
    </div>


    {{-- @foreach ($categories as $category)
        @php
            $cat = $category->category_name 
        @endphp
        <ul>
            <li>
                {{ $cat}} : 
                {{ $category->incidents->count() }}
            </li>
        </ul>



    @endforeach --}}

    {{-- {{ $var }} --}}

    
@stop




@section('footer')
<div class="footer-content">
            <p>&copy; 2023 ICTAZ WHISTLE BLOWER HACKATHON. All rights reserved. Created and designed with ❤️ by Chanda Chewe.</p>
        </div> 
@stop




























































































































































