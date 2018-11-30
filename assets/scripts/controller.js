'use strict';
app.controller('myController', ['$scope', 'NgTableParams', 'itemsFactory', 'toastr', '$timeout', 'Excel', 
function ($scope, NgTableParams, itemsFactory, toastr, $timeout, Excel) {

	// Export Table As Excel
	$scope.exportToExcel=function(tableId){ 
		// ex: '#my-table'
        var exportHref = Excel.tableToExcel(tableId,'WireWorkbenchDataExport');
        $timeout(function(){location.href=exportHref;},100); // trigger download
	}
	
	var tabledata = 0;
	var tdata = {};
	var pagenum = 1;
	var pagecount = 5;

	$scope.ranges = [{
			title: 'All',
			value: '0-9999'
		},
		{
			title: '0-5',
			value: '0-5'
		},
		{
			title: '5-10',
			value: '5-10'
		},
		{
			title: '10-15',
			value: '10-15'
		},
		{
			title: '15-20',
			value: '15-20'
		}
	]

	$scope.fromto = $scope.ranges[0];

	$scope.populateTable = function (pagenum, pagecount, fromto) {
		$scope.fromto = fromto;
		tdata = itemsFactory.getAll(fromto.value);
		tdata.$promise.then(function (response) {
			for (let i = 0; i < tdata.length; i++) {
				tdata[i].quantity = Number(tdata[i].quantity);
			}
			$scope.tableParams = new NgTableParams({
				page: pagenum,
				count: pagecount
			}, {
				counts: [5, 10, 20, 50],
				dataset: response
			});
		}, function (reason) {
			console.log(reason);
		});
		tabledata = tdata;
	}

	$scope.populateTable(pagenum, pagecount, $scope.fromto);
	$scope.docTitle = 'Basic Item Inventory'
	$scope.myForm = {};
	$scope.item = {};
	$scope.edititem = {};
	$scope.addShow = true;
	$scope.editShow = false;
	var ogValue = '';

	$scope.addItem = function () {
		$scope.editShow ? ($scope.editShow = false) : $scope.editShow;
		var exists = tabledata.some(function (o) {
			return Object.keys(o).some(function (k) {
				return o[k] === $scope.item.name;
			});
		});
		if (exists) {
			toastr.error('Please Increase Count Instead', 'Item ' + $scope.item.name + ' Already Exists!');
			$scope.item.name = '';
		} else {
			tdata = itemsFactory.insertItem($scope.item.name);
			tdata.$promise.then(function () {
				$scope.populateTable(Math.ceil(($scope.tableParams.total() + 1) / $scope.tableParams.count()), $scope.tableParams.count(), $scope.fromto);
				toastr.success('Item ' + $scope.item.name + ' Added Successfully');
				$scope.item.name = '';
			}, function (reason) {
				console.log(reason);
			});
		}
	}

	$scope.delItem = function (itemname) {
		$scope.editShow ? ($scope.editShow = false) : $scope.editShow;
		tdata = itemsFactory.deleteItem(itemname);
		tdata.$promise.then(function () {
			let a = Math.ceil($scope.tableParams.total() - 1);
			let b = Math.ceil($scope.tableParams.count());
			let c = Math.ceil($scope.tableParams.page());
			if ((a / b) - c) {
				$scope.populateTable(Math.ceil(($scope.tableParams.total() - 1) / $scope.tableParams.count()), $scope.tableParams.count(), $scope.fromto);
			} else {
				$scope.populateTable(Math.ceil($scope.tableParams.page()), $scope.tableParams.count(), $scope.fromto);
			}
			toastr.success('Item ' + itemname + ' Removed Successfully');
		}, function (reason) {
			console.log(reason);
		});
	}

	$scope.decItem = function (itemname, itemquantity) {
		$scope.editShow ? ($scope.editShow = false) : $scope.editShow;
		if (itemquantity <= 1) {
			$scope.delItem(itemname);
		} else {
			tdata = itemsFactory.decrementItem(itemname);
			tdata.$promise.then(function () {
				$scope.populateTable($scope.tableParams.page(), $scope.tableParams.count(), $scope.fromto);
				toastr.success('Item ' + itemname + ' Decremented Successfully');
			}, function (reason) {
				console.log(reason);
			});
		}
	}

	$scope.incItem = function (itemname) {
		$scope.editShow ? ($scope.editShow = false) : $scope.editShow;
		tdata = itemsFactory.incrementItem(itemname);
		tdata.$promise.then(function () {
			$scope.populateTable($scope.tableParams.page(), $scope.tableParams.count(), $scope.fromto);
			toastr.success('Item ' + itemname + ' Incremented Successfully');
		}, function (reason) {
			console.log(reason);
		});
	}

	$scope.editItem = function (item) {
		$scope.editShow = true;
		$scope.edititem.id = item.id;
		$scope.edititem.name = item.name;
		$scope.edititem.quantity = item.quantity;
		ogValue = item;
	}

	$scope.editThisItem = function (item) {
		var exists = tabledata.some(function (o) {
			return Object.keys(o).some(function (k) {
				return o[k] === $scope.edititem.name;
			});
		});
		if ((exists) && (ogValue.name != $scope.edititem.name)) {
			toastr.error('Item ' + $scope.edititem.name + ' Already Exists!', 'Error!');
			$scope.edititem.name = '';
			$scope.edititem.quantity = '';
		} else {
			item.id = Number(item.id);
			
			tdata = itemsFactory.editItem(item);
			tdata.$promise.then(function (response) {
				$scope.populateTable($scope.tableParams.page(), $scope.tableParams.count(), $scope.fromto);
				toastr.success('Item ' + item.name + ' Edited Successfully');
				$scope.editShow = false;
			}, function (reason) {
				console.log(reason);
			});
		}
	}

}]);
