
<!DOCTYPE html>
<html lang="en">
   <head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Q1RYVTKEN7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Q1RYVTKEN7');
</script>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Addictive Voice Recognition Technique® (AVRT®) | Register</title>
      {!! SEO::metaTags()  !!}

      <!-- links  start Here -->
      @include('navs.nav-links')
      <!-- links ENDS Here -->
      <style>
            .sidebar .logo {
        width:100% !important;
        height:100px !important;
    }
      </style>
   </head>
   <body>

      <!-- Header start Here -->
      @include('navs.header')
      <!-- Header ENDS Here -->



      @yield('content')
      <!-- End #main -->

      <!--Footer start Here -->
      @include('navs.footer')
      <!-- Footer end Here -->
      @yield('customScript')
   </body>
</html>
