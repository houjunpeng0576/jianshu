<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>Login page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="/adminlab/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/adminlab/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="/adminlab/css/style.css" rel="stylesheet" />
    <link href="/adminlab/css/style_responsive.css" rel="stylesheet" />
    <link href="/adminlab/css/style_default.css" rel="stylesheet" id="style_color" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body id="login-body">
<div class="login-header">
    <!-- BEGIN LOGO -->
    <div id="logo" class="center">
        <img src="/adminlab/img/logo.png" alt="logo" class="center" />
    </div>
    <!-- END LOGO -->
</div>

<!-- BEGIN LOGIN -->
<div id="login">
    <!-- BEGIN LOGIN FORM -->
    <form id="loginform" class="form-vertical no-padding no-margin" action="/admin/login" method="POST">
        {{csrf_field()}}
        <div class="lock">
            <i class="icon-lock"></i>
        </div>
        <div class="control-wrap">
            <h4>User Login</h4>
            <div class="control-group">
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-user"></i></span><input id="input-username" type="text" placeholder="Username" name="username"/>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-key"></i></span><input id="input-password" type="password" placeholder="Password" name="password"/>
                    </div>
                    <div class="mtop10">
                        <div class="block-hint pull-left small">
                            <input type="checkbox" id="" name="is_remember"> Remember Me
                        </div>
                        <div class="block-hint pull-right">
                            <a href="javascript:;" class="" id="forget-password">Forgot Password?</a>
                        </div>
                    </div>

                    <div class="clearfix space5"></div>
                </div>

            </div>
        </div>
        @include('layout.error')

        <input type="submit" id="login-btn" class="btn btn-block login-btn" value="Login" />
    </form>
    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form id="forgotform" class="form-vertical no-padding no-margin hide" action="index.html">
        <p class="center">Enter your e-mail address below to reset your password.</p>
        <div class="control-group">
            <div class="controls">
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-envelope"></i></span><input id="input-email" type="text" placeholder="Email"  />
                </div>
            </div>
            <div class="space20"></div>
        </div>
        <input type="button" id="forget-btn" class="btn btn-block login-btn" value="Submit" />
    </form>
    <!-- END FORGOT PASSWORD FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div id="login-copyright">
    2013 &copy; Admin Lab Dashboard. 更多模板：<a href="http://www.mycodes.net/" target="_blank">源码之家</a>
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS -->
<script src="/adminlab/js/jquery-1.8.3.min.js"></script>
<script src="/adminlab/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/adminlab/js/jquery.blockui.js"></script>
<script src="/adminlab/js/scripts.js"></script>
<script>
    jQuery(document).ready(function() {
        App.initLogin();
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>