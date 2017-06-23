<div class="container" ng-app="ticketApp">    
    <div  class="mainbox col-md-10" ng-controller="TicketController">                    
		<div class="panel panel-info" >
			<div class="panel-heading">
			    <div class="panel-title">Tickets</div>
			</div>
    		<div  class="panel-body" >

    			<div class="col-md-8 pull-right">
				  	<form class="navbar-form" role="search" ng-submit="getList()">
					    <div class="input-group">
					      <input class="form-control" placeholder="Search by email or phone" ng-model="search" id="srch-term" type="text" required>
					      <div class="input-group-btn">
					        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
					      </div>
					    </div>
				  	</form>		    
				</div> 
				<table class="table" ng-if=tickets >
				    <thead>
				      <tr>
				        <th>Title</th>
				        <th>Comment</th>
				        <th>Email</th>
				        <th>Phone</th>
				        <th>Department</th>
				        <th>Status</th>
				        <th>Action</th>
				      </tr>
				    </thead>
				    <tbody ng-repeat='t in tickets'>
				    	<tr>
					      	<td>{{t.title}}</td>
					        <td>{{t.comment}}</td>
					        <td>{{t.email}}</td>
					        <td>{{t.phone}}</td>
					        <td><span ng-if='t.department'>{{t.department}}</span></td>
					        <td><span ng-if='t.status == 1'>New</span><span ng-if='t.status == 0'>Attended</span></td>
					        <td>
					        	<button ng-if='t.status!=0' ng-click="action(t.id,'edit')" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
        						</button>
            					<button ng-if='t.status!=0' ng-click="action(t.id,'delete')" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        						</button>
            					<button ng-click="action(t.id,'view')" class="btn btn-submit"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
        						</button>
            				</td>
				      	</tr>
				    </tbody>
				  </table> 
	        	<!-- <fieldset ng-show=ticket id="ticketForm" class="form-horizontal" role="form"  >
	        		<p><span>Title</span> : {{ticket.ticket.title}}</p>
	        		<p><span>Comment</span> : {{ticket.ticket.comment}}</p>
	        		<p><span>Customer</span> : {{ticket.ticket.name}}</p>
	        		<p><span>Email</span> : {{ticket.ticket.email}}</p>
	        		<p><span>Phone</span> : {{ticket.ticket.phone}}</p>
	        		<p><span>Status</span> : <span ng-if='ticket.ticket.status == 1'>New</span><span ng-if='ticket.ticket.status == 0'>Attended</span></p>
	        		<p><span>Created</span> : {{ticket.ticket.created | date}}</p>
	        	</fieldset> -->
        	</div>
	    </div>
	</div>
</div>