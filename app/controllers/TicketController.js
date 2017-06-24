
var app = angular.module('ticketApp', ['ui.bootstrap']);
app.controller('TicketController',TicketController);
function TicketController($scope, $http) {

	$scope.title = undefined;
	$scope.comment = undefined;
	$scope.name = undefined;		
	$scope.email = undefined;
	$scope.phone = undefined;
	$scope.status = 1;
	$scope.id = null;
	$scope.search = undefined;
	$scope.escalate = 1;
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

					var str = window.location.href; 
					var res = str.match(/edit/g);

					if(res){

						$scope.title = $scope.ticket.ticket.title;
						$scope.comment = $scope.ticket.ticket.comment;
						$scope.name = $scope.ticket.ticket.name;
						$scope.email = $scope.ticket.ticket.email;
						$scope.phone = $scope.ticket.ticket.phone;
						$scope.status = $scope.ticket.ticket.status;
						if($scope.status == 0){
							noty({
					           text: 'You cannot update the ticket',
					           layout: 'topCenter',
					           timeout: 3000,
					           theme: "relax",
					           type: 'error'
							});
							window.location = 'view?id='+$scope.id;
						}
					}


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
				url: '/CSR/ticket/getList',
				headers: {'Content-Type': 'application/json'},
				data: JSON.stringify({
					search : $scope.search
				})
			}).success(function (data) {
				if(data.tickets && data.tickets.length){
					$scope.tickets = data.tickets;
				}else{
					noty({
			           text: 'No Tickets Available.',
			           layout: 'topCenter',
			           timeout: 3000,
			           theme: "relax",
			           type: 'error'
					});
					$scope.tickets = [];
				}
				
			});
	}
	$scope.getList();

	$scope.action = function(id,action){
		$scope.id = id;
		if(action == 'view'){
			window.location = '/CSR/ticket/view?id='+$scope.id;
		}else if(action == 'delete'){
			if(confirm('Are you sure you want to delete this item?')){
				$http({
					method: 'POST',
					url: '/CSR/ticket/delete',
					headers: {'Content-Type': 'application/json'},
					data: JSON.stringify({
							id : $scope.id
						})
				}).success(function (data) {
					if(data.status){
						noty({
				           text: 'Ticket Deleted successfully.',
				           layout: 'topCenter',
				           timeout: 3000,
				           theme: "relax",
				           type: 'success'
						});
						$scope.getList();
					}else{
						noty({
				           text: 'Some error occured, Please try again.',
				           layout: 'topCenter',
				           timeout: 3000,
				           theme: "relax",
				           type: 'error'
						});
					}
							
				});
			}
			
		}else {
			window.location = '/CSR/ticket/edit?id='+$scope.id;
		}


	}

	$scope.editForm = function (){
		console.log("posting data....");
		$http({
			method: 'POST',
			url: 'update',
			headers: {'Content-Type': 'application/json'},
			data: JSON.stringify({
					id : $scope.id,
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
		           text: 'Ticket Updated successfully.',
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
	$scope.saveEscalate = function(){
		$http({
			method: 'POST',
			url: 'escalate',
			headers: {'Content-Type': 'application/json'},
			data: JSON.stringify({
					id : $scope.id,
					department_id : $scope.escalate,
					status : $scope.status
				})
		}).success(function (data) {
			if(data.status){
				if(noty({
		           text: 'Ticket escalated successfully.',
		           layout: 'topCenter',
		           timeout: 3000,
		           theme: "relax",
		           type: 'success'
				})){
					$scope.id = data.status;
					if($scope.status == 0){
						window.location = 'view?id='+$scope.id
					}
					
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
}