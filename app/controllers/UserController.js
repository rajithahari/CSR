
var app = angular.module('myApp', ['ui.bootstrap']);
app.controller('UserController',UserController);
function UserController($scope, $http) {

	$scope.username = undefined;
	$scope.password = undefined;
	$scope.submitForm = function ()
	{

		console.log("posting data....");
		$http({
			method: 'POST',
			url: 'user/login',
			headers: {'Content-Type': 'application/json'},
			data: JSON.stringify({username: $scope.username,password:$scope.password})
		}).success(function (data) {
			if(data.status){
				if(noty({
		           text: 'Logged in successfully.',
		           layout: 'topCenter',
		           timeout: 3000,
		           theme: "relax",
		           type: 'success'
				})){
					window.location = 'user/dashboard'
				}
			}else{
				noty({
		           text: 'Please try again with correct credentials',
		           layout: 'topCenter',
		           timeout: 3000,
		           theme: "relax",
		           type: 'error'
				});
			}
		});
	}
}