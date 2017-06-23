<div class="container" ng-app="myApp">    
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
		<div class="panel panel-info" >
			<div class="panel-heading">
			    <div class="panel-title">Sign In</div>			    
			</div>     

	    	<div style="padding-top:30px" class="panel-body" >

	        	<form id="loginform" class="form-horizontal" role="form" ng-controller="UserController" ng-submit="submitForm()">
                                    
					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input required id="login-username" type="email" class="form-control" ng-model='username' value="" placeholder="username">                                        
					</div>
                                
					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input required id="login-password" type="password" class="form-control" ng-model="password" placeholder="password">
					</div>
                    <div style="margin-top:10px" class="form-group">
                        <!-- Button -->

                        <div class="col-sm-12 controls">
                          <button type="submit" class="btn btn-primary">Sign In</button>      
                    	</div>
                    </div>                                
				</form>
            </div>                     
        </div>  
    </div>
</div>
    