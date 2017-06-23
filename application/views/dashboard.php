<div class="container" ng-app="myApp">    
    <div style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
		<div class="panel panel-info" >
			<div class="panel-heading">
			    <div class="panel-title">List Ticket</div>			    
			</div>     

	    	<div style="padding-top:30px" class="panel-body" ng-controller="TicketController">

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