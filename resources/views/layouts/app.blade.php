
<!DOCTYPE html>
<html lang="en">
  
@include('layouts.head')

  <body class="animated fadeIn">

    @include('layouts.nav')
    
    <!-- Begin page content -->
    <div class="container page-content">
      @include('layouts.alert')
      @yield('content')
    </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted"> Copyright &copy; ATLA Solutions - All rights reserved </p>
      </div>
    </footer>
      <script type="text/javascript">
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-49755460-1', 'auto', {'allowLinker': true});
          ga('require', 'linker');
          ga('linker:autoLink', ['bootdey.com','www.bootdey.com','demos.bootdey.com'] );
          ga('send', 'pageview');
      </script>
    <style>
      #bsaHolder{right:25px;position:absolute;top:0;width:345px;z-index:10}#bsa_closeAd{width:15px;height:15px;overflow:hidden;position:absolute;top:10px;right:11px;border:none!important;z-index:1;text-decoration:none!important;background:url(../../bootdey.com/img/x_icon.png) no-repeat}#carbonads,#carbonads span{overflow:hidden;display:block}#carbonads{border-radius:4px;background-color:#f9f9f9;line-height:1.5}.carbon-img{display:block;margin:0 auto 1em;text-align:center;float:left!important;margin-right:10px!important}.carbon-text{display:block;margin-bottom:1em;text-align:left;text-decoration:none;margin-top:15px;font-size:90%!important;line-height:130%!important;min-width:120px!important;color:#06c!important}.carbon-poweredby,.carbon-wrap,.carbon-wrap a{display:block!important}.carbon-wrap{background:#f1f1f1!important;padding:15px 15px 10px!important}.carbon-poweredby{color:#6e6e6e!important;text-decoration:underline!important;font-size:65%!important;font-style:italic!important;text-align:center!important;margin:8px 0 0!important}#carbonads{background:#fff!important;padding:0!important}    
    </style>

    <style type="text/css">
      .ui-menu{
       z-index: 2000;
      }

      .navbar .nav > li > a > .label {
          position: absolute;
          top: 2px;
          right: 4px;
          text-align: center;
          font-size: 9px;
          padding: 3px 3px;
          line-height: .9;
      }

      .label {
        display: inline;
        padding: .2em .6em .3em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25em;
      }

      .navbar-nav > .user-menu .user-image {
          float: left;
          width: 25px;
          height: 25px;
          border-radius: 50%;
          margin-right: 10px;
          margin-top: -2px;
      }

      #navBarSearchForm input[type="text"] {
          width: 500px !important;
          height: 40px;
          margin-top: 7px;
      }
    </style>
  </body>

<script src="{{ asset('/js/jQueryUI/jquery-ui.js') }}"></script>

<script type="text/javascript">

$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});

function markNotificationAsRead(count){
    if(count > 0){
        $.get('/markAsRead');
    }
    
}


$(document).ready(function() {
  $( "#autocomplete" ).autocomplete({
      source: "{!! route('search.data') !!}",
      minLength: 2,
      select: function( event, ui ) {
        window.location.href = ui.item.route
      }
  });
 
});

</script>

<!-- Mirrored from demos.bootdey.com/dayday/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Feb 2018 18:00:58 GMT -->
</html>