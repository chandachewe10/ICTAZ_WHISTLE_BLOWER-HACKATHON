@extends('adminlte::page')
@section('title', 'Incidents')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
@stop



@section('content_header')
<h1>Incidents</h1>
@stop

@section('content')
<div class="container">
    <a href="{{ route('report') }}" class="btn btn-primary">Report Crime incident</a>
    <div class="card">

        <div class="card-header text-center">Reported Crime incident</div>
        <div class="card-body">

            {{-- Seach form --}}
            <table class="js-table">
                <tbody>
                    <tr>
                        <td scope="row" data-label="Search">
                            <form method="GET" action="{{route('incident.search')}}" class="form-inline my-2 my-lg-0">
                                <input name="search" class="form-control mr-sm-2" type="search"
                                    placeholder="Address, Lusaka" aria-label="search">
                                <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </td>
                    </tr>
                </tbody>

            </table>
            <br>


            <table class="js-table" id="incident-table">
                <thead>
                    <tr>
                        <th scope="col">Reporter</th>
                        <th scope="col">Category</th>
                        <th scope="col">Reported Date</th>
                        @if ((Auth::user()->is_security_agency() || Auth::user()->is_super_admin()))
                        <th colspan="col">Action</th>
                        @endif
                        @if(Auth::user()->is_other_agency())
                        <th scope="col">Details</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @if ($incidents->count() > 0)

                    @foreach ($incidents as $incident)
                    <tr>
                        <td scope="row" data-label="Reporter">{{ $incident->reporter->name }}</td>
                        <td class="text-capitalize" scope="row" data-label="Crime Category">{{ $incident->crimecategory->category_name }}</td>
                        
                        <td scope="row" data-label="Date Reported">{{ $incident->created_at->format('M d,Y \a\t h:i a') }}</td>
                        

                        @if ((Auth::user()->is_security_agency() || Auth::user()->is_super_admin()))
                        <td>
                            <a href="{{ route('incident.show', $incident->id) }}"
                                class="btn btn-xs btn-primary">View</a>
                       
                            <a href="{{ route('incident.edit', $incident->id) }}"
                                class="btn btn-xs btn-primary">Edit</a>
                        
                            <form action="{{ route('incident.destroy', $incident->id) }}" method="POST">
                                {{ csrf_field() }}

                                {{ method_field('DELETE') }}

                                <button class="btn btn-xs btn-danger"
                                    onclick="return confirm('Do you really want to delete this incident?')"
                                    type="submit">Delete</button>
                            </form>
                        </td>
@endif
                        @if(Auth::check() && Auth::user()->is_other_agency())
                        <td><a href="{{ route('incident.show', $incident->id) }}"
                                class="btn btn-xs btn-primary">View</a>
                        </td>
                        @endif

                    </tr>
                    @endforeach

                    @else
                    <tr>
                        <td colspan="5" class="text-center">No Crime incident yet</td>
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


    $('#incident-table').DataTable({
        "lengthChange": false,
        dom: 'Bfrtip',

        buttons: [{
            extend: 'pdfHtml5',
            className: 'btn btn-info btn-sm',
            title: 'Incident Report',
        },
        {
            extend: 'csvHtml5',
            className: 'btn btn-success btn-sm',
            title: 'Incident Report',
        },
        {
            extend: 'copyHtml5',
            className: 'btn btn-primary btn-sm',
            title: 'Incident Report',
        },
        {
            extend: 'excelHtml5',
            className: 'btn btn-secondary btn-sm',
            title: 'Incident Report',
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