
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title') | {{ config('app.name') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('frontendhelpdesk/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('frontendhelpdesk/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('frontendhelpdesk/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontendhelpdesk/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('frontendhelpdesk/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontendhelpdesk/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('frontendhelpdesk/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('frontendhelpdesk/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('frontendhelpdesk/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('frontendhelpdesk/assets/css/style.css') }}" rel="stylesheet">

    @yield('styles')
    @stack('styles')
    
  <link href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" rel="stylesheet">

  <style>
    @font-face{
            font-family: "Kalpurush, Nikosh";
            src: url('asset(/fonts/kalpurush.ttf)');
            src: url('asset(/fonts/Nikosh.ttf)');

        }
      .kalpurush-font{
        font-family: Kalpurush;
        font-size: 20px;
      }        
      .nikosh-font{
        font-family: Nikosh;
        font-size: 20px;
      }

</style>

</head>
