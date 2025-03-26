<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <img src="" width="50%" alt="logo" title="shift2go">
        </div>
        <div class="card-body">
            <p class="login-box-msg"><strong>Welcome Back</strong><br>Please sign in to continue</p>
            <form action="{{ route('admin.adminlogin') }}" method="post">
                @csrf
                @if (session('error'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('error') }}
                    </div>
                @endif
                
                @if (session('success'))
                    <div class="alert {{ Session::has('password-update-success') ? 'flash' : '' }} alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->has('email'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <input type="hidden" name="timezone" id="timezone">
                <div class="input-group mb-3">
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                
                
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-block btn-primary">Login</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.14/moment-timezone-with-data-2012-2022.min.js"></script>
<script type="text/javascript">
    document.getElementById('timezone').value = moment.tz.guess();
    $("div.flash").fadeTo(3000, 500).slideUp(500, function(){
        $("div.flash").slideUp(500);
    });
</script>

</body>
</html>