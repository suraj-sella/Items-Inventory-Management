<!doctype html>
<html lang="en" ng-app='myApp' ng-controller='myController'>

<head>
	<title ng-bind='title'></title>
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
				<table class="table table-bordered table-striped text-center" ng-table="tableParams" show-filter="true">
					<tbody>
						<tr ng-repeat="item in $data">
							<td data-title="'Name'" data-filter="{name: 'text'}" data-sortable="'name'">{{item.name}}</td>
							<td data-title="'Quantity'" data-filter="{quantity: '/project/assets/view/fromto.html'}" data-sortable="'quantity'">{{item.quantity}}</td>
							<td data-title="'Actions'">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm button-block faa-parent animated-hover" ng-click='editItem(item)'><i
										 class="fa fa-wrench faa-vertical"></i></button>
									<button type="button" class="btn btn-success btn-sm button-block faa-parent animated-hover" ng-click='incItem(item.name)'><i
										 class="fa fa-plus faa-vertical"></i></button>
									<button type="button" class="btn btn-dark btn-sm button-block faa-parent animated-hover" ng-click='decItem(item.name, item.quantity)'><i
										 class="fa fa-minus faa-horizontal"></i></button>
									<button type="button" class="btn btn-danger btn-sm button-block faa-parent animated-hover" ng-click='delItem(item.name)'><i
										 class="fa fa-trash faa-ring"></i></button>
								</div>
							</td>
						</tr>
						<tr ng-show='editShow'>
							<th scope="row" colspan='4'>
								<form ng-submit="editThisItem(edititem)">
									<div class="form-row">
										<div class="form-group col-md-6">
											<input type="text" class="form-control" id="editItem" placeholder="Edit Item" required ng-model="edititem.name">
										</div>
										<div class="form-group col-md-2">
											<input type="number" class="form-control" id="editQuantity" placeholder="Edit Quantity" required ng-model="edititem.quantity">
										</div>
										<div class="form-group col-md-3">
											<button type="submit" class="btn btn-primary faa-parent animated-hover"><i class="fa fa-wrench faa-pulse faa-fast"></i>
												Update Item</button>
										</div>
									</div>
								</form>
							</th>
						</tr>
						<tr ng-show='addShow'>
							<th scope="row" colspan='4'>
								<form ng-submit="addItem()">
									<div class="form-row">
										<div class="form-group col-md-9">
											<input type="text" class="form-control" id="inputItem" placeholder="Enter New Item Name" required ng-model="item.name">
										</div>
										<div class="form-group col-md-3">
											<button type="submit" class="btn btn-primary faa-parent animated-hover"><i class="fa fa-plus faa-pulse faa-fast"></i>
												New Item</button>
										</div>
									</div>
								</form>
							</th>
						</tr>
					</tbody>
				</table>
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
	<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.10/angular-animate.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.10/angular-resource.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/ng-table/1.0.0/ng-table.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/angular-toastr/2.1.1/angular-toastr.tpls.min.js'></script>
	<script src='assets/scripts/app.js'></script>
	<script src='assets/scripts/controller.js'></script>
	<script src='assets/scripts/services.js'></script>
    <script src='assets/scripts/directives.js'></script>
	<!-- Optional JavaScript -->
</body>

</html>
