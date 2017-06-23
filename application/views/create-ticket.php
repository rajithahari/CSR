<div class="container" ng-app="myApp">    
    <div style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
		<div class="panel panel-info" >
			<div class="panel-heading">
			    <div class="panel-title">Create Ticket</div>			    
			</div>     

	    	<div style="padding-top:30px" class="panel-body" >

	        	<form id="ticketForm" class="form-horizontal" role="form" ng-controller="TicketController" ng-submit="submitForm()">
                                    
					<div style="margin-bottom: 25px" class="input-group">
						<input required type="text" class="form-control" ng-model='title' value="" placeholder="Title">
					</div>
                                
					<div style="margin-bottom: 25px" class="input-group">
						<textarea required ng-model='comment'>Write your comment here</textarea>
					</div>
					<div style="margin-bottom: 25px" class="input-group">
						<input required type="text" class="form-control" ng-model='name' value="" placeholder="Customer Name">
					</div>
					<div style="margin-bottom: 25px" class="input-group">
						<input required type="email" class="form-control" ng-model='email' value="" placeholder="Customer Email">
					</div>
					<div style="margin-bottom: 25px" class="input-group">
						<input required type="text" class="form-control" ng-model='phone' value="" placeholder="Customer Contact Number" pattern="^\d{10,12}">
					</div>
					<div style="margin-bottom: 25px" class="input-group">
						<input checked name="status" id="new" type="radio" class="form-control" ng-model='status' value=1><label for='new'>New</label>
						<input name="status" id="attended" type="radio" class="form-control" ng-model='status' value=0><label for='attended'>Attended</label>
					</div>
                    <div style="margin-top:10px" class="form-group">
                        <!-- Button -->

                        <div class="col-sm-12 controls">
                          <button type="submit" class="btn btn-primary">Create</button>
                          <button class="btn btn-submit">Escalate</button>      
                    	</div>
                    </div>                                
				</form>
            </div>                     
        </div>  
    </div>
</div>
    