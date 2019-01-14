<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template.">
  <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>Viễn Đông</title>
  <link rel="icon" href="{{URL::asset('template/app-assets/images/ico/vd.png')}}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,400,500,700"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('template/app-assets/css/vendors.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::asset('template/app-assets/vendors/css/forms/icheck/icheck.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::asset('template/app-assets/vendors/css/forms/icheck/custom.css')}}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN ROBUST CSS-->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('template/app-assets/css/app.css')}}">
  <!-- END ROBUST CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('template/app-assets/css/core/menu/menu-types/horizontal-menu.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::asset('template/app-assets/css/core/colors/palette-gradient.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::asset('template/app-assets/css/pages/login-register.css')}}">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('template/assets/css/style.css')}}">
  <!-- END Custom CSS-->
</head>
<body class="horizontal-layout horizontal-menu horizontal-menu-padding 1-column  bg-full-screen-image menu-expanded blank-page blank-page"
data-open="hover" data-menu="horizontal-menu" data-col="1-column">
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content container center-layout mt-2">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
              <div class="card-header border-0">
                  <div class="card-title text-center">
                    <img src="{{URL::asset('template/app-assets/images/logo/logo.jpg')}}" alt="logo" class="login-logo">
                  </div>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>Đăng Nhập</span>
                  </h6>
                </div>                
                <div class="card-content">
                  <div class="card-body">
                    <!-- Login -->
                    <form class="form-horizontal" action="{{ route('login') }}" novalidate method="POST">
                        @csrf

                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                        @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="Mật Khẩu" required>
                        @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        <div class="form-control-position">
                          <i class="fa fa-key"></i>
                        </div>
                      </fieldset>
                      <div class="form-group row">
                        <div class="col-md-6 col-12 text-center text-sm-left">
                          <fieldset>
                            <input type="checkbox" id="remember" class="chk-remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember-me"> Nhớ đăng nhập</label>
                          </fieldset>
                        </div>
                        <div class="col-md-6 col-12 float-sm-left text-center text-sm-right"><a href="{{ route('password.request') }}" class="card-link">Quên mật khẩu?</a></div>
                      </div>
                      <button type="submit" class="btn btn-outline-info btn-block"><i class="ft-unlock"></i> Đăng Nhập</button>
                    </form>
                    <!-- End -->
                  </div>
                  <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
                    <span>Chưa có tài khoản ?</span>
                  </p>
                  <div class="card-body">
                    <a href="{{ route('register') }}" class="btn btn-outline-danger btn-block"><i class="ft-user"></i> Đăng Ký</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <!-- BEGIN VENDOR JS-->
  <script src="{{URL::asset('template/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script type="text/javascript" src="{{URL::asset('template/app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>
  <script src="{{URL::asset('template/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"
  type="text/javascript"></script>
  <script src="{{URL::asset('template/app-assets/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN ROBUST JS-->
  <script src="{{URL::asset('template/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
  <script src="{{URL::asset('template/app-assets/js/core/app.js')}}" type="text/javascript"></script>
  <!-- END ROBUST JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{URL::asset('template/app-assets/js/scripts/forms/form-login-register.js')}}" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>
