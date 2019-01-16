<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template.">
  <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>Đăng Ký</title>
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
                <div class="card-header border-0 pb-0">
                  <div class="card-title text-center">
                    <img src="{{URL::asset('template/app-assets/images/logo/logo.jpg')}}" alt="logo" class="login-logo">
                </div>
                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>Đăng Ký</span>
                </h6>
            </div>
            <div class="card-content">                  
              <div class="card-body">
                <form class="form-horizontal" action="{{ route('register') }}" novalidate method="POST">
                    @csrf
                    <!-- Mã Nhân Viên -->
                    <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" class="form-control{{ $errors->has('manv') ? ' is-invalid' : '' }}" id="name" placeholder="Mã Nhân Viên" name="manv" value="{{ old('manv') }}" required autofocus>
                        @if ($errors->has('manv'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('manv') }}</strong>
                        </span>
                        @endif
                        <div class="form-control-position">
                            <i class="fa fa-id-card-o"></i>
                      </div>
                  </fieldset>
                  <!-- Tên -->
                  <fieldset class="form-group position-relative has-icon-left">
                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Họ Tên" value="{{ old('name') }}" name="name" required>                    
                    @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                    <div class="form-control-position">
                      <i class="ft-user"></i>
                  </div>
              </fieldset>
              <!-- Email -->
              <fieldset class="form-group position-relative has-icon-left">
                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
                <div class="form-control-position">
                  <i class="ft-mail"></i>
              </div>
          </fieldset>
          <!-- Mật Khẩu -->
          <fieldset class="form-group position-relative has-icon-left">
            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="Mật Khẩu" required>
            @if ($errors->has('password'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
            <div class="form-control-position">
              <i class="fa fa-key"></i>
          </div>
      </fieldset>
      <!-- Xác Nhận -->
      <fieldset class="form-group position-relative has-icon-left">
        <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Nhập lại mật khẩu"
        required>
        <div class="form-control-position">
          <i class="fa fa-check-square"></i>
      </div>
  </fieldset>
  <button type="submit" class="btn btn-outline-info btn-block"><i class="ft-user"></i> Đăng Ký</button>
</form>
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
