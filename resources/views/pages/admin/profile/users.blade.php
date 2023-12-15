@extends('adminlte::page')
@section('title', 'Users')
@section('plugins.Datatables', true)
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
@stop



@section('content_header')
<h1>Users</h1>
@stop

@section('content')
<div class="container">

    <div class="card">

        <div class="card-header text-center">Users</div>
        <div class="card-body">
            <table class="js-table" id="users">
            <thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Registered On</th>
        @if (Auth::check() && Auth::user()->is_super_admin())
            <th>Action</th>
        @endif
    </tr>
</thead>

<tbody>
    @if ($users->count() > 0)
        @foreach ($users as $user)
            <tr>
                <td scope="row" data-label="Name">{{ $user->name }}</td>
                <td scope="row" data-label="Registered On">{{ $user->created_at->format('M d,Y \a\t h:i a') }}</td>
                
                @if (Auth::check() && Auth::user()->is_super_admin())
                    <td>
                        <a href="{{ route('user.show', $user->id) }}" class="btn btn-xs btn-primary">View</a>
                        <a href="{{ route('role.edit', $user->id) }}" class="btn btn-xs btn-primary">Edit</a>
                        <a href="{{ route('user.destroy', $user->id) }}" class="btn btn-xs btn-danger"
                            onclick="return confirm('Do you really want to delete this user?')"
                            type="submit">Delete</a>
                    </td>
                @elseif(Auth::check() && Auth::user()->is_security_agency())
                    <td>
                        <a href="{{ route('user.show', $user->id) }}" class="btn btn-xs btn-primary">View</a>
                    </td>
                @endif
            </tr>
        @endforeach
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


    $('#users').DataTable({
        "lengthChange": false,
        dom: 'Bfrtip',

        buttons: [{
            extend: 'pdfHtml5',
            className: 'btn btn-info btn-sm',
            title: 'All Users',
        },
        {
            extend: 'csvHtml5',
            className: 'btn btn-success btn-sm',
            title: 'All Users',
        },
        {
            extend: 'copyHtml5',
            className: 'btn btn-primary btn-sm',
            title: 'All Users',
        },
        {
            extend: 'excelHtml5',
            className: 'btn btn-secondary btn-sm',
            title: 'All Users',
        },


        ]
    });

</script>



@stop


@section('footer')
<div class="footer-content">
    <p>&copy; 2023 ICTAZ WHISTLE BLOWER HACKATHON. All rights reserved. Created and designed with ❤️ by Chanda Chewe.
    </p>
</div>
@stop