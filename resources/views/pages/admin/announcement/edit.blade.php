@extends('adminlte::page')
@section('title', 'Announcement')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@stop



@section('content_header')
    <h1>Edit Announcement</h1>
@stop

@section('content')
<div class="card">
        <div class="card-header text-center">
            {{ $title }}
        </div>

        <div class="card-body">
            <x-errors />

            <form action="{{ route('announcement.update', $announcement->id) }}" method="POST">
                {{ csrf_field() }}

                {{-- When using resource method we introduce put --}}
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label for="title"><span class="text-danger">*</span>Title</label>
                    <input type="text" name="title" id="title" class="form-control" required placeholder="Title"
                        value="{{ $announcement->title }}">
                </div>

                <div class="form-group">
                    <label for="about"><span class="text-danger">*</span>Announcment</label>

                    <textarea name="description" id="description" cols="30" rows="10"
                        class="form-control">{{ $announcement->title  }}</textarea>
                </div>

                <div class="form-group">
                    <label for="status"><span class="text-danger">*</span>Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="" selected disabled>Select Status</option>
                        <option value="published" @if ($announcement->status == 'published') selected @endif>{{'Publish'}}</option>
                        <option value="unpublished" @if ($announcement->status == 'unpublished') selected @endif>{{'Draft'}}</option>
                    </select>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary pull-right" type="submit">
                        Submit
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














































































