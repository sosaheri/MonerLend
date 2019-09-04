<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'MonerLend') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Fonts and icons     -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
 
    <!-- Material Kit CSS -->
    <link href="{{ asset('dashboard/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/css/now-ui-dashboard.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/demo/demo.css') }}" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/monerlend.css') }}" rel="stylesheet">
    
    <!-- código para recapcha -->
    {!! NoCaptcha::renderJs() !!}

    <!-- rangeslider -->
    <link href="{{ asset('rangeslider/rangeslider.css') }}" rel="stylesheet">  
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.2/rangeslider.css" rel="stylesheet"> -->


</head>


       
            @yield('content')
        
 

            <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.js" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" defer></script>

      <!--      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        
        
         Core JS Files   -->
      
  <script src="{{ asset('dashboard/js/core/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('dashboard/js/core/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('dashboard/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('dashboard/js/plugins/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>


  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('dashboard/js/now-ui-dashboard.js') }}" type="text/javascript"></script>
  <!-- Chart JS -->
  <script src="{{ asset('dashboard/js/plugins/chartjs.min.js') }}"></script>
  <!--  Notifications Plugin    -->
   <script src=" {{ asset('dashboard/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! 
  <script src=" {{ asset('dashboard/demo/demo.js') }}"></script>-->
  <!-- share links -->
  <script src="{{ asset('js/share.js') }}"></script>
<!-- copyclipboard -->  
  <script src="{{ asset('clipboard/dist/clipboard.min.js') }} "></script>

<!-- rangeslider -->
<!--<script src=" {{ asset('rangeslider/rangeslider.js') }}"></script>-->


<script src="https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.2/rangeslider.js"></script>
<script>

$( document ).ready(function() {
  var clipboard = new ClipboardJS('.clipboard');

  clipboard.on('success', function(e) {
     setTooltip('Copiado!');
     hideTooltip();
 
});

clipboard.on('error', function(e) {
    setTooltip('Intenta Nuevamente!');
    hideTooltip();
  
});

});

$('#copy').tooltip({
  trigger: 'click',
  placement: 'bottom'
});

function setTooltip(message) {
  $('#copy').tooltip('hide')
    .attr('data-original-title', message)
    .tooltip('show');
}

function hideTooltip() {
  setTimeout(function() {
    $('#copy').tooltip('hide');
  }, 1000);
}



</script>


  <script>


                  
$('input[type="range"]').rangeslider({
  // Feature detection the default is `true`.
    // Set this to `false` if you want to use
    // the polyfill also in Browsers which support
    // the native <input type="range"> element.
    polyfill: false,

    // Default CSS classes
    rangeClass: 'rangeslider',
    disabledClass: 'rangeslider--disabled',
    horizontalClass: 'rangeslider--horizontal',
    fillClass: 'rangeslider__fill',
    handleClass: 'rangeslider__handle',

    // Callback function
    onInit: function() {
      $rangeEl = this.$range;
      // add value label to handle
      var $handle = $rangeEl.find('.rangeslider__handle');
      var handleValue = '<div class="rangeslider__handle__value">' + this.value + '</div>';
      $handle.append(handleValue);
      
      // get range index labels 
      var rangeLabels = this.$element.attr('labels');
      rangeLabels = rangeLabels.split(', ');
      
      // add labels
      $rangeEl.append('<div class="rangeslider__labels"></div>');
      $(rangeLabels).each(function(index, value) {
        $rangeEl.find('.rangeslider__labels').append('<span class="rangeslider__labels__label">' + value + '</span>');
      })
    },

    // Callback function
    onSlide: function(position, value) {
      var $handle = this.$range.find('.rangeslider__handle__value');
      $handle.text(this.value);
    },

    // Callback function
    onSlideEnd: function(position, value) {}
});

</script>

<script>


$(document).ready(function(){

  function we_are_hiring() {
        lines = [
            "====================================================================================",
            "    \                          \ \        /    |         ___|                       ",
            "   _ \    __| _ \ __ \   _` |   \ \  \   / _ \ __ \     |      __| _ \  |   | __ \  ",
            "  ___ \  |    __/ |   | (   |    \ \  \ /  __/ |   |    |   | |   (   | |   | |   | ",
            "_/    _\_|  \___| .__/ \__,_|     \_/\_/ \___|_.__/     \____|_|  \___/ \__,_| .__/ ",
            "                 _|                                                          _|     ",
            "====================================================================================",
            "  You opened the console! Know some code, do you? Want to work or contract     ",
            "  an awesome company    https://www.larepaweb.com.ve                           ",
            "====================================================================================="
        ]
        for (i = 0; i < lines.length; i ++) {
            console.log(lines[i]);
        }
    }

    if ($('body').hasClass('monerlend')) {
        setTimeout(we_are_hiring, 5000);
    }


  




   
 

  
                 
   
            

 
 



 }

);


</script>


  <!-- <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script> -->

</body>

</html>
 



