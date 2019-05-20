<?php
	if( isset($_POST["btnDelete"]) ) {
		$id = $_POST["hdnEditId"];
		if($db->query("delete from users where id = '$id'")) {
			echo "Deleted";
		}
	}
	
	if( isset($_POST["btnSave"]) ) {
		$edit_id = $_POST["hdnSaveId"];
		$name = $_POST["txtName"];
		$email = $_POST["txtEmail"];
		$role_id = $_POST["cmbRole"];
		$query = "update users set name='$name', email='$email', role_id=$role_id where id=$edit_id";
		if($db->query($query)) {
			echo "Updated";
		} else {
			echo "Problem updating user";
		}
	}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    User List
    <small>Our Users</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Name</th>
              <th>Role</th>
              <th>Email</th>
            </tr>
            </thead>
            <tbody>
            <?php
            	$table = $db->query("select u.id, u.name, r.role_name, r.role_id, email from users u, user_role r where u.role_id = r.role_id");
				
				
				while( list($_id, $_name, $_role_name, $_role_id, $_email) = $table->fetch_row() ) {
					if( isset($_POST["btnEdit"]) && $_POST["hdnEditId"] == $_id) {
						echo "<form action='#' method='post'>";
							echo "<tr>";
							echo "<td><input type='text' value='$_name' name='txtName' /></td>";
							echo "<td><select class='form-control select2 select2-hidden-accessible' style='width: 100%;' aria-hidden='true' name='cmbRole'>";
							$roles = $db->query("select role_id, role_name from user_role");
							while( list($_temp_role_id, $_role) = $roles->fetch_row() ) {					
								if($_role_id == $_temp_role_id){
									echo "<option value='$_temp_role_id' selected='selected'>$_role</option>";
								} else {
									echo "<option value='$_temp_role_id'>$_role</option>";
								}
							}					
	        				echo "</select></td>";
							echo "<td><input type='text' value='$_email' name='txtEmail' /></td>";
													
							echo "<td>";
							echo "<input type='hidden' value='$_id' name='hdnSaveId' />";
							echo "<button type='submit' name='btnSave' class='btn btn-primary'><i class='fa fa-save'></i> Save</button>&nbsp;&nbsp;";
							echo "<button type='submit' name='btnDelete' class='btn btn-danger'><i class='fa fa-trash'></i> Delete</button>";
							echo "</td>";
							echo "</tr>";
						echo "</form>";
					} else {
						echo "<form action='#' method='post'>";
							echo "<tr>";
							echo "<td>$_name</td><td>$_role_name</td><td>$_email</td>";
							echo "<td>";
							echo "<input type='hidden' value='$_id' name='hdnEditId' />";
							echo "<button type='submit' name='btnEdit' class='btn btn-primary'><i class='fa fa-edit'></i> Edit</button>&nbsp;&nbsp;";
							echo "<button type='submit' name='btnDelete' class='btn btn-danger'><i class='fa fa-trash'></i> Delete</button>";
							echo "</td>";
							echo "</tr>";
						echo "</form>";
					}
				}
			?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>