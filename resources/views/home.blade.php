<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Lockscreen</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition lockscreen">
  <!-- Automatic element centering -->
  <div class="lockscreen-wrapper">
    <div class="lockscreen-logo">
      <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>
    <!-- User name -->
    <div class="lockscreen-name">{{ config('app.name','laravel') }}</div>

    <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">
      <!-- lockscreen image -->
      <div class="lockscreen-image">
        <img src="{{ asset('adminlte/dist/img/user1-128x128.jpg') }}" alt="User Image">
      </div>
      <!-- /.lockscreen-image -->

      <!-- lockscreen credentials (contains the form) -->
      <form class="lockscreen-credentials">
        <div class="input-group">
          <label class="form-control">{{ Auth::user()->name }}</label>

          <div class="input-group-append">
            <button type="button" onclick="window" .location='{{ url("pegawai") }}' class="btn">
              <i class="fas fa-arrow-right text-muted"></i>
            </button>



          </div>
        </div>
      </form>
      <!-- /.lockscreen credentials -->

    </div>
    <!-- /.lockscreen-item -->
    <div class="help-block text-center">
      @if (session('status'))
      <div class="alert alert-succes" role="alert">
        {{ session('status') }}
      </div>
      @endif
      You Are Log in!
    </div>
    <div class="text-center">
      Click <a href="{{ route('logout') }}" onclick="event.preventDefault();
    document.getElementsById('logout-form').submit();">{{ __('Logout') }}</a> to sign in as a different user
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
        @csrf
      </form>
    </div>
    <div class="lockscreen-footer text-center">
      Copyright &copy; 2014-2021 <b><a href="{{ url("welcome") }}" class="text-black">AdminLTE.io</a></b><br>
      All rights reserved
    </div>
  </div>
  <!-- /.center -->

  <!-- jQuery -->
  <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Code injected by live-server -->
  <script type="text/javascript">
    // <![CDATA[  <-- For SVG support
    if ('WebSocket' in window) {
      (function() {
        function refreshCSS() {
          var sheets = [].slice.call(document.getElementsByTagName("link"));
          var head = document.getElementsByTagName("head")[0];
          for (var i = 0; i < sheets.length; ++i) {
            var elem = sheets[i];
            var parent = elem.parentElement || head;
            parent.removeChild(elem);
            var rel = elem.rel;
            if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
              var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
              elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
            }
            parent.appendChild(elem);
          }
        }
        var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
        var address = protocol + window.location.host + window.location.pathname + '/ws';
        var socket = new WebSocket(address);
        socket.onmessage = function(msg) {
          if (msg.data == 'reload') window.location.reload();
          else if (msg.data == 'refreshcss') refreshCSS();
        };
        if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
          console.log('Live reload enabled.');
          sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
        }
      })();
    } else {
      console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
    }
    // ]]>
  </script>
</body>

</html>