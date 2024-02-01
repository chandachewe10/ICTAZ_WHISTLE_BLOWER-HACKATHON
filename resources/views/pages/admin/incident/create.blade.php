@extends('adminlte::page')
@section('title', 'Incidents')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@stop



@section('content_header')
<h1>Create Incident</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header text-center">
        Report New Incident
    </div>
    <i class="pl-3">Fields with * are compulsory</i>
    <div class="card-body">
        <x-errors />

        <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name"><span class="text-danger">*</span>Reporters Phone</label>
                <input type="tel" name="phone" id="phone" class="form-control" required {{-- <input type="text"
                    name="phone" pattern="^[0-9]*$" id="phone" class="form-control" required --}}
                    placeholder="Contact Phone" value="{{ old('phone') }}">
            </div>


            <div class="form-group">
                <label for="complainant"><span class="text-danger"></span>Complainant Name</label>
                <input type="text" name="complainant_name" id="complainant_name" class="form-control"
                    placeholder="Complainant Name" value="{{ old('complainant_name') }}">
            </div>

            <div class="form-group">
                <label for="witness"><span class="text-danger"></span>Witness Name</label>
                <input type="text" name="witness_name" id="witness_name" class="form-control" placeholder="Witness Name"
                    value="{{ old('witness_name') }}">
            </div>


            <div class="form-group">
                <label for="lga"><span class="text-danger">*</span>Incident Location (Province)</label>
                <input type="text" name="lga" id="lga" class="form-control" required
                    placeholder="Incident Location (Province)" value="{{ old('lga') }}">
            </div>

            <div class="form-group">
                <label for="name"><span class="text-danger">*</span>Incident Location (Address)</label>
                <input type="text" name="address" id="address" class="form-control" required
                    placeholder="Incident Location (Address)" value="{{ old('address') }}">
            </div>

            <div class="form-group">
                <label for="category"><span class="text-danger">*</span>Crime Category (<span><a
                            href="{{route('crime.types')}}">Click for info
                            on crime category</a></span>)</label>
                <select name="crime_category_id" id="crime_category" class="form-control">
                    <option value="" selected disabled>Select a category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="description"><span class="text-danger">*</span>Description/Statement</label>

                <textarea name="description" id="description" cols="30" rows="10"
                    class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="photo">Photo Edvince (If available)</label>
                <input type="file" name="photo" id="photo" class="form-control" value="{{ old('photo') }}">
            </div>

            <div class="form-group">
                <label for="name">Video Edvince (If available)</label>
                <input type="file" name="video" id="video" class="form-control" value="{{ old('video') }}">
            </div>


            <div class="form-group">
                <button class="btn btn-primary pull-right" type="submit">
                    Report
                </button>
            </div>
        </form>
    </div>
</div>
@stop

@section('footer')
<div class="footer-content">
    <p>&copy; 2023 ICTAZ WHISTLE BLOWER HACKATHON. All rights reserved. Created and designed with ❤️ by Chanda Chewe.
    </p>
</div>
@stop