<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<{include file="common/title.inc.tpl"}>
	<meta name="csrf-token" content="<{csrf_token()}>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="renderer" content="webkit">
	<{include file="common/icons.inc.tpl"}>
	<{include file="admin/common/styles.inc.tpl"}>
	<{include file="admin/common/scripts.inc.tpl"}>
	<{include file="common/validate.inc.tpl"}>
</head>

<body>
	<!-- Login Alternative Row -->
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-md-offset-1">

			</div>
			<div class="col-md-5">
				<!-- Login Container -->
				<div id="login-container">
					<!-- Login Title -->
					<div class="login-title text-center">
						<h1><strong>登录</strong></h1>
					</div>
					<!-- END Login Title -->

					<!-- Login Block -->
					<div class="block push-bit">
						<!-- Login Form -->
						<form action="<{'auth/authenticate-query'|url}>" method="post" id="form" class="form-horizontal">
							<input type="hidden" name="_token" value="<{csrf_token()}>">
							<div class="form-group">
								<div class="col-xs-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="gi gi-user"></i></span>
										<input type="text" id="username" name="username" class="form-control input-lg" placeholder="用户名">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
										<input type="password" id="password" name="password" class="form-control input-lg" placeholder="密码">
									</div>
								</div>
							</div>
							<div class="form-group form-actions">
								<div class="col-xs-4">
									<label class="switch switch-primary" data-toggle="tooltip" title="记住我">
										<input type="checkbox" id="remember" name="remember" checked="checked">
										<span></span>
									</label>
								</div>
								<div class="col-xs-8 text-right">
									<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> <span id="submit-text">登录</span></button>
								</div>
							</div>
						</form>
						<!-- END Login Form -->
					</div>
					<!-- END Login Block -->
				</div>
				<!-- END Login Container -->
			</div>
		</div>
	</div>
	<!-- END Login Alternative Row -->
<script>
(function($){
$().ready(function(){
	$('#remember').on('click', function(){
		$('#submit-text').text(this.checked ? '登录(并记住我)' : '登录');
	}).triggerHandler('click');
	<{call validate selector='#form'}>
});
})(jQuery);
</script>
</body>
</html>
