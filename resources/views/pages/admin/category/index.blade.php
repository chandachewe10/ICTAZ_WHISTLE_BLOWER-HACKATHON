@extends('adminlte::page')
@section('title', 'Categories')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
@stop



@section('content_header')
<h1>Crime Category</h1>

@stop



@section('content')
<div class="container">
    <a href="{{ route('crime-category.create') }}" class="btn btn-primary">Add Crime Category</a>
    <div class="card">

        <div class="card-header text-center">Crime category</div>
        <div class="card-body">
            <table class="js-table" id="crime-table">
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

@section('js')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script>
               
                  
                    $('#crime-table').DataTable({
                        "lengthChange": false,
                        dom: 'Bfrtip',
                       
                        buttons: [{
                                extend: 'pdfHtml5',
                                className: 'btn btn-info btn-sm',
                                title: 'Crimes Report',
                            },
                            {
                                extend: 'csvHtml5',
                                className: 'btn btn-success btn-sm',
                                title: 'Crimes Report',
                            },
                            {
                                extend: 'copyHtml5',
                                className: 'btn btn-primary btn-sm',
                                title: 'Crimes Report',
                            },
                            {
                                extend: 'excelHtml5',
                                className: 'btn btn-secondary btn-sm',
                                title: 'Crimes Report',
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