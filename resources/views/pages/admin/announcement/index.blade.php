@extends('adminlte::page')
@section('title', 'Announcement')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
@stop



@section('content_header')
    <h1>Added Announcements</h1>
@stop

@section('content')
<div class="container">
        <a href="{{ route('announcement.create') }}" class="btn btn-primary">Post Announcement</a>
        <div class="card">

            <div class="card-header text-center">Post announcement</div>
            <div class="card-body">
                <table class="js-table" id="announcements">
                    <thead>
                        @if (Auth::check() && (Auth::user()->is_super_admin() || Auth::user()->is_security_agency()))
                            <th scope="col">Title</th>
                            <th scope="col">Updated</th>
                            <th scope="col">Details</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        @endif
                    </thead>
                    <tbody>
                        @if ($announcements->count() > 0)

                            @foreach ($announcements as $announcement)
                                <tr>
                                    <td class="text-capitalize" data-label="Title">{!! Str::substr($announcement->title, 0, 30) !!}</td>
                                    <td class="text-capitalize" data-label="Posted">{{ $announcement->created_at->format('M d,Y') }}</td>


                                    @if (Auth::check() && (Auth::user()->is_super_admin() || Auth::user()->is_security_agency()))
                                        <td><a href="{{ route('announcement.show', $announcement->id) }}"
                                                class="btn btn-xs btn-primary">View</a>
                                        </td>
                                        <td><a href="{{ route('announcement.edit', $announcement->id) }}"
                                                class="btn btn-xs btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('announcement.destroy', $announcement->id) }}"
                                                method="POST">
                                                {{ csrf_field() }}

                                                {{ method_field('DELETE') }}

                                                <button class="btn btn-xs btn-danger"
                                                    onclick="return confirm('Do you really want to delete this announcement?')"
                                                    type="submit">Delete</button>
                                            </form>
                                        </td>
                                    @endif

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

@section('js')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script>


    $('#announcements').DataTable({
        "lengthChange": false,
        dom: 'Bfrtip',

        buttons: [{
            extend: 'pdfHtml5',
            className: 'btn btn-info btn-sm',
            title: 'Announcements',
        },
        {
            extend: 'csvHtml5',
            className: 'btn btn-success btn-sm',
            title: 'Announcements',
        },
        {
            extend: 'copyHtml5',
            className: 'btn btn-primary btn-sm',
            title: 'Announcements',
        },
        {
            extend: 'excelHtml5',
            className: 'btn btn-secondary btn-sm',
            title: 'Announcements',
        },


        ]
    });

</script>



@stop

@section('footer')
<div class="footer-content">
            <p>&copy; 2023 ICTAZ WHISTLE BLOWER HACKATHON. All rights reserved. Created and designed with ❤️ by Chanda Chewe.</p>
        </div> 
@stop






















































































