<html lang="en" ng-app="app">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Click Admin</title>

	@if(Config::get('app.debug'))
		{{--		<link href="{{ asset('build/css/components.css') }}" rel="stylesheet">--}}
		{{--		<link href="{{ asset('build/css/flaticon.css') }}" rel="stylesheet">--}}
		<link href="{{ asset('build/css/vendor/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('build/css/font-awesome.css') }}" rel="stylesheet">
		<link href="{{ asset('build/css/custom.css') }}" rel="stylesheet">
		{{--<link href="{{ asset('build/css/vendor/nprogress.css') }}" rel="stylesheet">--}}
		<link href="{{ asset('build/css/app.css') }}" rel="stylesheet">
		<link href="{{ asset('build/css/style.css') }}" rel="stylesheet">
		{{--<link href="{{ asset('build/css/vendor/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet">--}}
	@else
		<link href="{{ elixir('css/all.css')}}" rel="stylesheet">
	@endif

</head>

<body class="nav-md">
	<div class="container body">
	<div class="main_container">
		<div class="col-md-3 left_col">
			<div class="left_col scroll-view">
				<div class="navbar nav_title" style="border: 0;">
					<a href="index.html" class="site_title"><i class="fa fa-terminal"></i> <span>Click Admin!</span></a>
				</div>

				<div class="clearfix"></div>

				<!-- menu profile quick info -->
				<div class="profile">
					<div class="profile_pic">
						<img src="build/images/img.jpg" alt="..." class="img-circle profile_img">
					</div>
					<div class="profile_info">
						<span>Bem Vindo,</span>
						<h2>Usuário</h2>
					</div>
				</div>
				<!-- /menu profile quick info -->

				<br />

				<!-- sidebar menu -->
				<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
					<div class="menu_section">
						<h3>  Admin</h3>
						<ul class="nav side-menu">
							<li><a href="#/home"><i class="fa fa-home"></i> Home </span></a></li>
							<li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu">
									<li><a ng-href="#/clients">Clients</a></li>
									<li><a ng-href="#/project">Projects</a></li>
								</ul>
							</li>
							<li><a href="#/logout"><i class="fa fa-edit"></i> Logout</span></a>
							</li>
						</ul>
					</div>

				</div>
				<!-- /sidebar menu -->

			</div>
		</div>

		<!-- top navigation -->
		<div class="top_nav">
			<div class="nav_menu">
				<nav class="" role="navigation">
					<div class="nav toggle">
						<a id="menu_toggle"><i class="fa fa-bars"></i></a>
					</div>

					<ul class="nav navbar-nav navbar-right">
						<li class="">
							<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<img src="build/images/img.jpg" alt="">Usuário
							</a>
						</li>

					</ul>
				</nav>
			</div>
		</div>
		<!-- /top navigation -->

		<!-- page content -->
		<div ng-view></div>
		<!-- /page content -->

		<!-- footer content -->
		<footer class="footer-down">
			<div class="">
				ClickVi Admin Panel <a href="https://clickvi.com.br">ClickVi</a>
			</div>
			<div class="clearfix"></div>
		</footer>
		<!-- /footer content -->
	</div>
</div>


	<!-- Scripts -->
	@if(Config::get('app.debug'))
		<script src="{{asset('build/js/vendor/jquery.min.js')}}" ></script>
		<script src="{{asset('build/js/vendor/bootstrap.min.js')}}" ></script>
		<script src="{{asset('build/js/vendor/custom.min.js')}}" ></script>
		<script src="{{asset('build/js/vendor/angular.min.js')}}" ></script>
		<script src="{{asset('build/js/vendor/angular-route.min.js')}}" ></script>
		<script src="{{asset('build/js/vendor/angular-resource.min.js')}}" ></script>
		<script src="{{asset('build/js/vendor/angular-animate.min.js')}}" ></script>
		<script src="{{asset('build/js/vendor/angular-messages.min.js')}}" ></script>
		<script src="{{asset('build/js/vendor/ui-bootstrap-tpls.min.js')}}" ></script>
		<script src="{{asset('build/js/vendor/navbar.min.js')}}" ></script>
		<script src="{{asset('build/js/vendor/angular-cookies.js')}}" ></script>
		<script src="{{asset('build/js/vendor/query-string.js')}}" ></script>
		<script src="{{asset('build/js/vendor/angular-oauth2.js')}}" ></script>

		<script src="{{asset('build/js/app.js')}}" ></script>

		<!-- CONTROLLERS !-->
		<script src="{{asset('build/js/controllers/login.js')}}" ></script>
		<script src="{{asset('build/js/controllers/home.js')}}" ></script>
		<script src="{{asset('build/js/controllers/dashboard.js')}}" ></script>

		<script src="{{asset('build/js/controllers/client/clientList.js')}}" ></script>
		<script src="{{asset('build/js/controllers/client/clientNew.js')}}" ></script>
		<script src="{{asset('build/js/controllers/client/clientEdit.js')}}" ></script>
		<script src="{{asset('build/js/controllers/client/clientRemove.js')}}" ></script>

		<script src="{{asset('build/js/controllers/project/projectList.js')}}" ></script>
		<script src="{{asset('build/js/controllers/project/projectNew.js')}}" ></script>
		<script src="{{asset('build/js/controllers/project/projectEdit.js')}}" ></script>
		<script src="{{asset('build/js/controllers/project/projectRemove.js')}}" ></script>

		<script src="{{asset('build/js/controllers/project-note/projectNoteList.js')}}" ></script>
		<script src="{{asset('build/js/controllers/project-note/projectNoteShow.js')}}" ></script>
		<script src="{{asset('build/js/controllers/project-note/projectNoteNew.js')}}" ></script>
		<script src="{{asset('build/js/controllers/project-note/projectNoteEdit.js')}}" ></script>
		<script src="{{asset('build/js/controllers/project-note/projectNoteRemove.js')}}" ></script>

		<!-- SERVICES !-->
		<script src="{{asset('build/js/services/url.js')}}" ></script>
		<script src="{{asset('build/js/services/oauthFixInterceptor.js')}}" ></script>
		<script src="{{asset('build/js/services/client.js')}}" ></script>
		<script src="{{asset('build/js/services/project.js')}}" ></script>
		<script src="{{asset('build/js/services/projectNote.js')}}" ></script>
		<script src="{{asset('build/js/services/user.js')}}" ></script>

		<!--FILTERS !-->

		<script src="{{asset('build/js/filters/date-br.js')}}" ></script>


	@else
		<script src="{{elixir('js/all.js')}}" ></script>
	@endif
</body>
</html>
