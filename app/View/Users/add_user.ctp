<div style="text-align:center;">
	<h3> Add User</h3>
</div>




<form role="form" name="User" action="" method="post">
	<div class="row">
		<!-- <div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name">
			    					</div>
			    				</div> -->
		<div class="col-xs-6 col-sm-6 col-md-6">
			<div class="form-group">
				<input type="text" name="User[username]" id="username" class="form-control input-sm" placeholder="username">
			</div>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6">
			<div class="form-group">
				<input type="email" name="User[email]" id="email" class="form-control input-sm" placeholder="Email Address">
			</div>
		</div>

	</div>



	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6">
			<div class="form-group">
				<input type="password" name="User[password]" id="password" class="form-control input-sm" placeholder="Password">
			</div>
		</div>
		<!-- <div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
			    					</div>
			    				</div> -->
	</div>

	<input type="submit" value="Register" class="btn btn-info btn-block">

</form>