<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Interview') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/pace.green.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/ladda.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">

    <!-- Scripts -->
    <script>window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?></script>
</head>
<body class="ash">

    <div id="wait" style="display:none;width:69px;height:89px;position:absolute;top:50%;left:45%;padding:2px;font-weight:bold;color:black;"><img src="{{asset('img/demo_wait.gif')}}" width="64" height="64"><br></div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  <strong><i class="fa fa-warning"></i> Whoops!</strong> You need to fix the following errors:<br><br>
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form class="login" method="POST" action="{{ url('/login') }}">

                <h3>Interview Login</h3>

                {{ csrf_field() }}
                <label class="control-label" for="email">E-mail</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" autocomplete="off" value="">

                <label class="control-label" for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="">

                <label>
                    <input type="checkbox" name="remember" id="remember"> Remember me
                </label>

                <button class="btn btn-success" type="submit" id="signin" name="submit">  Log In  </button>
            </form>
        </div>
    </div>
    <footer>
    <p>Copyright &copy; 2016. All Rights Reserved.</p>
    </footer>
</div>

<script type="text/javascript" src="{{asset('js/jquery-1.11.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
<script type="text/javascript" data-pace-options='{ "ajax": true }' src="{{asset('js/pace.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/spin.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/ladda.min.js')}}"></script>
<script type="text/javascript">
    $(function() {
        $("#submit").click(function() {
            $(".btn").css("display", "block");     
        });
    });
</script>
</body>
</html>