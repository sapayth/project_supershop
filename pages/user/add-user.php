<?php
	if( isset($_POST["btnSubmit"]) ) {
		$name = $_POST["txtName"];
		$role = $_POST["cmbRole"];
		$email = $_POST["txtEmail"];
		$pass = $_POST["txtPassword"];
		$rePass = $_POST["txtRePassword"];
		
		if($pass == $rePass) {
			$query = "insert into users(name, email, password, role_id) values('$name', '$email', '$pass', '$role')";
			if(!$db->query($query)){
				printf("Error: %s\n", $db->error);
				} else {
				echo "Successfully created";
			}
		} else {
			echo "Password didn't match";
		}
	}
?>
<div class="register-box-body">
    <p class="login-box-msg">Register a new User</p>
    <form action="#" method="post">
      <div class="form-group">
      	<label>Full name</label>
        <input type="text" class="form-control" placeholder="Full name" name="txtName">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group">
        <label>User Role</label>
        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="cmbRole">
        	<?php
				$table = $db->query("select role_id, role_name from user_role");
				while( list($_id, $_role) = $table->fetch_row() ) {					
					echo "<option value='$_id'>$_role</option>";	
				}
				
			?>
        </select>
      </div>
      <div class="form-group has-feedback">
      	<label>Email</label>
        <input type="email" class="form-control" placeholder="Email" name="txtEmail">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
      	<label>Password</label>
        <input type="password" class="form-control" placeholder="Password" name="txtPassword">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
      	<label>Retype Password</label>
        <input type="password" class="form-control" placeholder="Retype password" name="txtRePassword">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block btn-flat" value="Register" name="btnSubmit">Register</button>
      </div>
    </form>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->