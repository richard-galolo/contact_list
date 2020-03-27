<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin_dashboard/img/favicon.png')}}">
    <title>Contacts List System | @yield('title')</title>
    <!-- Custom CSS -->
    <link href="{{ asset('admin_dashboard/assets/extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_dashboard/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_dashboard/dist/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_dashboard/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_dashboard/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">

    @yield('styles')

</head>

<body>
    
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
   
    <div id="main-wrapper">
        
        @include('dashboard.partials.nav')
        @include('dashboard.partials.sidebar')
        
        @yield('content')
        
    </div>
    
    <script src="{{ asset('admin_dashboard/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('admin_dashboard/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- apps -->
    <script src="{{ asset('admin_dashboard/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard/dist/js/app.init.js') }}"></script>
    <script src="{{ asset('admin_dashboard/dist/js/app-style-switcher.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('admin_dashboard/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard/assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('admin_dashboard/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('admin_dashboard/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('admin_dashboard/dist/js/custom.js') }}"></script>
   
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

    <script src="{{ asset('admin_dashboard/assets/extra-libs/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard/dist/js/pages/datatable/datatable-basic.init.js') }} "></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready( function(){
            $('.dropify').dropify({
                messages: {
                    'default': 'Drag and drop a file here to upload',
                    'replace': 'Drag and drop or click to replace',
                    'remove':  'Remove',
                    'error':   'Ooops, something wrong happended.'
                }
            });
        });
    </script>

    @if(session()->has('success'))
        <script type="text/javascript">
            swal({
                title: "Good job!",
                text: "{!! session('success') !!}",
                icon: "success",
                button: false,
                timer: 1500
            });
        </script>            
    @endif

    <?php Session::forget('sweet_alert'); ?>

    @stack('scripts')
    
</body>
</html>