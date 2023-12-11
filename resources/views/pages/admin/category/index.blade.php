


@extends('adminlte::page')
@section('title', 'Categories')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@stop



@section('content_header')
    <h1>Crime Category</h1>
@stop

@section('content')
<div class="container">
        {{-- <a href="{{ route('crime-category.create') }}" class="btn btn-primary">Add Crime Category</a> --}}
        <div class="card">

            <div class="card-header text-center">Crime category</div>
            <div class="card-body">
                <table class="js-table">
                    <thead>
                        <th scope="col">Crime Category</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </thead>
                    <tbody>
                        @if ($categories->count() > 0)

                            @foreach ($categories as $category)
                                <tr>
                                    <td scope="row" data-label="Category">{{ $category->category_name }}</td>

                                    <td class="text-center"><a href="{{ route('crime-category.edit', $category->id) }}"
                                            class="btn btn-xs btn-primary">Edit</a>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('crime-category.destroy', $category->id) }}" method="POST">
                                            {{ csrf_field() }}

                                            {{ method_field('DELETE') }}

                                            <button class="btn btn-xs btn-danger"
                                                onclick="return confirm('Do you really want to delete this category?')"
                                                type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        @else
                            <tr>
                                <td colspan="5" class="text-center">No Crime category yet</td>
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






















































































