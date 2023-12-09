<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="https://kit.fontawesome.com/db163c922e.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('toastr/toastr.min.css') }}" rel="stylesheet">
    <script src="{{ asset('toastr/jquery-3.3.1.min.js') }}"></script>
    <!--Data-tables-->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

  <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
</head>

<body>

     {{-- <div id="google_translate_element" style="display: none;"></div> --}}
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
    
    <div id="app">
        {{-- Customer navbar --}}
        <div class="js-header">
            <x-admin-nav />
        </div>


        {{-- <main class="py-4">
            @yield('content')
        </main> --}}

        <div class="container py-4 navbar-space">
            <div class="row">
                {{-- @if (Auth::check() && Auth::user()->role) --}}
                <div class="col-md-3">
                  <x-sidebar />
              </div>
                <div class="col-md-9">
                    @yield('content')
                </div>

               
                {{-- @else
                    <div class="col-md-12">
                        @yield('content')
                    </div>
                @endif --}}


            </div>
        </div>
       
    </div>


    <!-- Loader -->
  <div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>

  <!-- end loader -->

  <script>
    // Loader

    document.onreadystatechange = function () {
      if (document.readyState !== "complete") {
        document.querySelector(
          "#app").style.visibility = "hidden";
        document.querySelector(
          "#loader-wrapper").style.visibility = "visible";
      } else {
        document.querySelector(
          "#loader-wrapper").style.display = "none";
        document.querySelector(
          "#app").style.visibility = "visible";
      }
    };



// Loader
  </script>

   
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/echarts.min.js') }}"></script>

    <x-notifications />
</body>

</html>
