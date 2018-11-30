<table id="itemsTable" class="table table-bordered table-striped text-center" ng-table="tableParams" show-filter="true">
	<tbody>
		<tr ng-repeat="item in $data">
			<td data-title="'Name'" data-filter="{name: 'text'}" data-sortable="'name'">{{item.name}}</td>
			<td data-title="'Quantity'" data-filter="{quantity: 'assets/view/fromto.html'}"
			 data-sortable="'quantity'">{{item.quantity}}</td>
			<td data-title="'Actions'" data-filter = "{actions : 'assets/view/exportbutton.html'}">
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
							<input type="number" class="form-control btn-sm" id="editQuantity" placeholder="Edit Quantity" required ng-model="edititem.quantity">
						</div>
						<div class="form-group col-md-3">
							<button type="submit" class="btn btn-primary btn-sm faa-parent animated-hover"><i class="fa fa-wrench faa-pulse faa-fast"></i>
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
							<input type="text" class="form-control btn-sm" id="inputItem" placeholder="Enter New Item Name" required ng-model="item.name">
						</div>
						<div class="form-group col-md-3">
							<button type="submit" class="btn btn-primary btn-sm faa-parent animated-hover"><i class="fa fa-plus faa-pulse faa-fast"></i>
								New Item</button>
						</div>
					</div>
				</form>
			</th>
		</tr>
	</tbody>
</table>
