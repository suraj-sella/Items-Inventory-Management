<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en" ng-app='myApp' ng-controller='myController'>

<head>
	<title>{{ docTitle }}</title>
	<link rel="shortcut icon" href="assets/img/favicon.png" />
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
	 crossorigin="anonymous">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ng-table/1.0.0/ng-table.min.css' />
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/angular-toastr/2.1.1/angular-toastr.min.css' />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel='stylesheet' href='assets/css/font-awesome-animation.min.css' />
	<link rel='stylesheet' href='assets/css/styles.css' />
</head>

<body>
	<div class="container mt-5">
		<div class="row">
			<div class="col"></div>
			<div class="col-6" is-draggable>
				<ng-view></ng-view>
			</div>
			<div class="col"></div>
		</div>
	</div>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"></script>
	<!--Angular-->
	<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.10/angular.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.10/angular-route.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.10/angular-animate.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.10/angular-resource.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/ng-table/1.0.0/ng-table.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/angular-toastr/2.1.1/angular-toastr.tpls.min.js'></script>
	<script src='assets/scripts/app.js'></script>
	<script src='assets/scripts/constants.js'></script>
	<script src='assets/scripts/config.js'></script>
	<script src='assets/scripts/controller.js'></script>
	<script src='assets/scripts/services.js'></script>
    <script src='assets/scripts/directives.js'></script>
	<!-- Optional JavaScript -->
</body>

</html>
