<div class="container" ng-app="ticketApp">    
    <div style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" ng-controller="TicketController" >                    
		<div class="panel panel-info" >
			<div class="panel-heading">
			    <div class="panel-title">Edit Ticket</div>			    
			</div>     

	    	<div style="padding-top:30px" class="panel-body" >

	        	<form id="ticketForm" class="form-horizontal" role="form" ng-submit="editForm()">                                    
					<div style="margin-bottom: 25px" class="input-group">
						<input required type="text" class="form-control" ng-model='title' value="title}}" placeholder="Title">
					</div>
                                
					<div style="margin-bottom: 25px" class="input-group">
						<textarea required ng-model='comment'></textarea>
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
						<input  name="status" id="new" type="radio" class="form-control" ng-model='status' ng-value=1><label for='new'>New</label>
						<input  name="status" id="attended" type="radio" class="form-control" ng-model='status' ng-value=0><label for='attended'>Attended</label>
					</div>
                    <div style="margin-top:10px" class="form-group">
                        <!-- Button -->

                        <div class="col-sm-12 controls">
                          <button type="submit" class="btn btn-primary">Update</button> 
                          <a class="btn btn-success" data-toggle="modal" data-target="#escalate">Escalate</a>                              
                    	</div>
                    </div> 
                                        
				</form>
				  
            </div>                     
        </div>
        <!-- Create Modal -->
		<div class="modal fade" id="escalate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		    <div class="modal-dialog" role="document">
		        <div class="modal-content">
		            <form method="POST" name="addItem" role="form" ng-submit="saveEscalate()">
	            
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			                <h4 class="modal-title" id="myModalLabel">Choose the department</h4>
			            </div>
			            <div class="modal-body">
			                <div class="container">
			                    <div class="row">
			                        <div class="col-xs-12 col-sm-6 col-md-6">
			                            <div class="form-group">
			                                <input id='marketing' name='escalate' checked ng-model="escalate" type="radio" class="form-control"  value=1><label for='marketing'>Marketing</label>
			                                <input id='sales' name='escalate' ng-model="escalate" type="radio" class="form-control" value=2><label for='sales'>Sales</label>
			                            </div>
			                        </div>
			                        
			                    </div>
			                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			                    <button type="submit" class="btn btn-primary">Submit</button>
			                </div>
			            </div>
		            </form>
		        </div>
		    </div>
		</div>          
    </div>
    
</div>
    