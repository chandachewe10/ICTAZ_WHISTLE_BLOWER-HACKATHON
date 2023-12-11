


@extends('adminlte::page')
@section('title', 'Categories')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@stop



@section('content_header')
    <h1>Crime Category</h1>
@stop

@section('content')
<div class="card">
        <div class="card-header text-center">
            Add Crime Category
        </div>
        <div class="card-body">
            <x-errors />

            <form action="{{ route('crime-category.store') }}" method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="category_name" id="category_name" class="form-control" required placeholder="category Name"
                        value="{{ old('category_name') }}">
                </div>

               
                <div class="form-group">
                    <button class="btn btn-primary pull-right" type="submit">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('footer')
<div class="footer-content">
            <p>&copy; 2023 ICTAZ WHISTLE BLOWER HACKATHON. All rights reserved. Created and designed with ❤️ by Chanda Chewe.</p>
        </div> 
@stop



































































