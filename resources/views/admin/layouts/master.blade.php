<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>General Dashboard &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('stisla/assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('stisla/assets/modules/fontawesome/css/all.min.css')}}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('stisla/assets/modules/jqvmap/dist/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{asset('stisla/assets/modules/weather-icon/css/weather-icons.min.css')}}">
  <link rel="stylesheet" href="{{asset('stisla/assets/modules/weather-icon/css/weather-icons-wind.min.css')}}">
  <link rel="stylesheet" href="{{asset('stisla/assets/modules/summernote/summernote-bs4.css')}}">
  <link rel="stylesheet" href="{{asset('stisla/assets/modules/prism/prism.css')}}">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('stisla/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('stisla/assets/css/components.css')}}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      {{-- navbar --}}
      @include('admin.layouts.navbar')
      {{-- sidebar --}}
      @include('admin.layouts.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{asset('stisla/assets/modules/jquery.min.js')}}"></script>
  <script src="{{asset('stisla/assets/modules/popper.js')}}"></script>
  <script src="{{asset('stisla/assets/modules/tooltip.js')}}"></script>
  <script src="{{asset('stisla/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('stisla/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('stisla/assets/modules/moment.min.js')}}"></script>
  <script src="{{asset('stisla/assets/js/stisla.js')}}"></script>
  
  <!-- JS Libraies -->
  <script src="{{asset('stisla/assets/modules/simple-weather/jquery.simpleWeather.min.js')}}"></script>
  <script src="{{asset('stisla/assets/modules/chart.min.js')}}"></script>
  <script src="{{asset('stisla/assets/modules/jqvmap/dist/jquery.vmap.min.js')}}"></script>
  <script src="{{asset('stisla/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
  <script src="{{asset('stisla/assets/modules/summernote/summernote-bs4.js')}}"></script>
  <script src="{{asset('stisla/assets/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>
  <script src="{{asset('stisla/assets/modules/prism/prism.js')}}"></script>
  <script src="{{asset('stisla/assets/modules/cleave-js/dist/cleave.min.js')}}"></script>
  <script src="{{asset('stisla/assets/modules/cleave-js/dist/addons/cleave-phone.us.js')}}"></script>
  <script src="{{asset('stisla/assets/modules/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
  <script src="{{asset('stisla/assets/modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
  <script src="{{asset('stisla/assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
  <script src="{{asset('stisla/assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
  <script src="{{asset('stisla/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
  <script src="{{asset('stisla/assets/modules/select2/dist/js/select2.full.min.js')}}"></script>
  <script src="{{asset('stisla/assets/modules/jquery-selectric/jquery.selectric.min.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{asset('stisla/assets/js/page/index-0.js')}}"></script>
  <script src="{{asset('stisla/assets/js/page/bootstrap-modal.js')}}"></script>
  <script src="{{asset('stisla/assets/js/page/modules-ion-icons.js')}}"></script>
  <script src="{{asset('stisla/assets/js/page/forms-advanced-forms.js')}}"></script>
  
  <!-- Template JS File -->
  <script src="{{asset('stisla/assets/js/scripts.js')}}"></script>
  <script src="{{asset('stisla/assets/js/custom.js')}}"></script>

  <!-- Toastr JS File -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        
        toastr.error("{{$error}}")

      @endforeach
    @endif
  </script>
  
</body>
</html>