@extends('adminlte::page')
@section('title', 'Agent')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
@stop



@section('content_header')
<h1>Added Agents</h1>
@stop

@section('content')
<div class="container">
    <a href="{{ route('agency.create') }}" class="btn btn-primary">Create Agent Profile</a>
    <div class="card">

        <div class="card-header text-center">Create Agent Profile</div>
        <div class="card-body">
            <table class="js-table" id="agents-table">
                <thead>
                    @if ((Auth::user()->is_super_admin() || Auth::user()->is_other_agency()))
                    <th scope="col">Agent Name</th>
                    <th scope="col">Agency</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Details</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    @endif
                    @if (Auth::user()->is_security_agency())
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
                    @if ((Auth::user()->is_super_admin() || Auth::user()->is_other_agency()))
                        <td data-label="Agent Name" scope="row">{{ $agency->agent->name }}</td>
                        <td class="text-capitalize" data-label="Agency Name">{{ $agency->agency_name }}</td>
                        <td class="text-capitalize" data-label="Phone">{{ $agency->phone }}</td>                       
                        <td><a href="{{ route('agency.show', $agency->id) }}" class="btn btn-xs btn-primary">View</a></td>
                        <td><a href="{{ route('agency.edit', $agency->id) }}" class="btn btn-xs btn-primary">Edit</a></td>
                        <td>
                            <form action="{{ route('agency.destroy', $agency->id) }}" method="POST">
                                {{ csrf_field() }}

                                {{ method_field('DELETE') }}

                                <button class="btn btn-xs btn-danger"
                                    onclick="return confirm('Do you really want to delete this agency?')"
                                    type="submit">Delete</button>
                            </form>
                        </td>
@endif
                        @if((Auth::user()->is_security_agency()))
                        <td data-label="Agent Name" scope="row">{{ $agency->agent->name }}</td>
                        <td class="text-capitalize" data-label="Agency Name">{{ $agency->agency_name }}</td>
                        <td class="text-capitalize" data-label="Phone">{{ $agency->phone }}</td>  
                        <td><a href="{{ route('agency.show', $agency->id) }}" class="btn btn-xs btn-primary">View</a></td>
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


@section('js')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script>


    $('#agents-table').DataTable({
        "lengthChange": false,
        dom: 'Bfrtip',

        buttons: [{
            extend: 'pdfHtml5',
            className: 'btn btn-info btn-sm',
            title: 'List of Agents',
        },
        {
            extend: 'csvHtml5',
            className: 'btn btn-success btn-sm',
            title: 'List of Agents',
        },
        {
            extend: 'copyHtml5',
            className: 'btn btn-primary btn-sm',
            title: 'List of Agents',
        },
        {
            extend: 'excelHtml5',
            className: 'btn btn-secondary btn-sm',
            title: 'List of Agents',
        },


        ]
    });

</script>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            includedLanguages: 'en,ha,ig,fr',
            // layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');

        // jQuery('.goog-logo-link').css('display', 'none');
        // jQuery('.goog-te-gadget').css('font-size', '0');
    }

</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
</script>


@stop


@section('footer')
<div class="footer-content">
    <p>&copy; 2023 ICTAZ WHISTLE BLOWER HACKATHON. All rights reserved. Created and designed with ❤️ by Chanda Chewe.
    </p>
</div>
@stop