
var app = angular.module('myApp', ['ui.bootstrap']);
app.controller('TicketController',TicketController);
function TicketController($scope, $http) {

	$scope.title = undefined;
	$scope.comment = undefined;
	$scope.name = undefined;		
	$scope.email = undefined;
	$scope.phone = undefined;
	$scope.status = 1;
	$scope.id = null;
	$scope.submitForm = function ()
	{

		console.log("posting data....");
		$http({
			method: 'POST',
			url: 'add',
			headers: {'Content-Type': 'application/json'},
			data: JSON.stringify({
					title : $scope.title,
					comment : $scope.comment,
					name : $scope.name,
					email : $scope.email,
					phone : $scope.phone,
					status : $scope.status
				})
		}).success(function (data) {
			if(data.status){
				if(noty({
		           text: 'Ticket Created successfully.',
		           layout: 'topCenter',
		           timeout: 3000,
		           theme: "relax",
		           type: 'success'
				})){
					$scope.id = data.status;
					window.location = 'view?id='+$scope.id
				}
			}else{
				noty({
		           text: 'Please try again, Some error occured',
		           layout: 'topCenter',
		           timeout: 3000,
		           theme: "relax",
		           type: 'error'
				});
			}
		});
	}
	$scope.getTicket = function ()
	{
		$scope.id = $scope.getParameterByName('id');
		if($scope.id != null){
			$http({
				method: 'POST',
				url: 'getTicket',
				headers: {'Content-Type': 'application/json'},
				data: JSON.stringify({
						id : $scope.id
					})
			}).success(function (data) {
				if(data.ticket){
					$scope.ticket = data;
				}else{
					noty({
			           text: 'TIcket Does not Exist.',
			           layout: 'topCenter',
			           timeout: 3000,
			           theme: "relax",
			           type: 'error'
					});
					window.location = 'back';
				}
				
			});
		}

	}
	$scope.getParameterByName = function(name, url) {
	    if (!url) url = window.location.href;
	    name = name.replace(/[\[\]]/g, "\\$&");
	    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
	        results = regex.exec(url);
	    if (!results) return null;
	    if (!results[2]) return '';
	    return decodeURIComponent(results[2].replace(/\+/g, " "));
	}
	$scope.getTicket();

	// Get all the tickets
	$scope.getList = function(){
		$http({
				method: 'POST',
				url: 'getList',
				headers: {'Content-Type': 'application/json'},
				data: JSON.stringify({
						id : $scope.id
					})
			}).success(function (data) {
				if(data.tickets){
					$scope.tickets = data;
				}else{
					noty({
			           text: 'No Tickets Available.',
			           layout: 'topCenter',
			           timeout: 3000,
			           theme: "relax",
			           type: 'error'
					});
				}
				
			});
	}
}