

@extends('adminlte::page')
@section('title', 'Agent')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@stop



@section('content_header')
    <h1>Added Agents</h1>
@stop

@section('content')
<div class="container">
        <a href="{{ route('agency.create') }}" class="btn btn-primary">Create Agency Profile</a>
        <div class="card">

            <div class="card-header text-center">Create Agency Profile</div>
            <div class="card-body">
                <table class="js-table">
                    <thead>
                        @if (Auth::check() && (Auth::user()->is_super_admin() || Auth::user()->is_other_agency()))
                            <th scope="col">Agent Name</th>
                            <th scope="col">Agency</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Details</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>

                        @elseif (Auth::check() && Auth::user()->is_security_agency())
                            <th scope="col">Agent Name</th>
                            <th scope="col">Agency</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Details</th>
                        @endif
                    </thead>
                    <tbody>
                        @if ($agencies->count() > 0)

                            @foreach ($agencies as $agency)
                                <tr>
                                    <td data-label="Agent Name" scope="row">
                                        {{ $agency->agent->name }}
                                    </td>
                                    <td class="text-capitalize" data-label="Agency Name">{{ $agency->agency_name }}</td>
                                    <td class="text-capitalize" data-label="Phone">{{ $agency->phone }}</td>


                                    @if (Auth::check() && (Auth::user()->is_super_admin() || Auth::user()->is_other_agency()))
                                        <td><a href="{{ route('agency.show', $agency->id) }}"
                                                class="btn btn-xs btn-primary">View</a>
                                        </td>
                                        <td><a href="{{ route('agency.edit', $agency->id) }}"
                                                class="btn btn-xs btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('agency.destroy', $agency->id) }}" method="POST">
                                                {{ csrf_field() }}

                                                {{ method_field('DELETE') }}

                                                <button class="btn btn-xs btn-danger"
                                                    onclick="return confirm('Do you really want to delete this agency?')"
                                                    type="submit">Delete</button>
                                            </form>
                                        </td>

                                    @elseif(Auth::check() && (Auth::user()->is_security_agency()))
                                        <td><a href="{{ route('agency.show', $agency->id) }}"
                                                class="btn btn-xs btn-primary">View</a>
                                        </td>
                                    @endif

                                </tr>
                            @endforeach

                        @else
                            <tr>
                                <td colspan="5" class="text-center">No Crime agency yet</td>
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






































