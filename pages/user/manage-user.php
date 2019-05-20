<?php
	if( isset($_POST["btnDelete"]) ) {
		$id = $_POST["hdnId"];
		if($db->query("delete from users where id = '$id'")) {
			echo "Deleted";
		}
	}
	
	if( isset($_POST["btnSave"]) ) {
		$edit_id = $_POST["hdnEditId"];
		$name = $_POST["txtName"];
		$email = $_POST["txtEmail"];		
	}
	
	if( isset($_POST["btnEdit"]) ) {
		$edit_id = $_POST["hdnEditId"];
		
		echo "$edit_id";
		
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
            	$table = $db->query("select u.id, u.name, r.role_name, email from users u, user_role r where u.role_id = r.role_id");
				
				echo "<form action='#' method='post'>";
				while( list($_id, $_name, $_role_id, $_email) = $table->fetch_row() ) {
					if( isset($_POST["btnEdit"]) && $_POST["hdnEditId"] == $_id) {
						echo "<tr>";
						echo "<td><input type='text' value='$_name' name='txtName' /></td>";
						echo "<td><select class='form-control select2 select2-hidden-accessible' style='width: 100%;' tabindex='-1' aria-hidden='true' name='cmbRole'>";
				
        echo "</select></td>";
						echo "<td><input type='text' value='$_email' name='txtEmail' /></td>";
												
						echo "<td>";
						echo "<input type='hidden' value='$_id' name='hdnSaveId' />";
						echo "<button type='submit' name='btnSave' class='btn btn-primary'><i class='fa fa-edit'></i> Save</button>&nbsp;&nbsp;";
						echo "<button type='submit' name='btnDelete' class='btn btn-danger'><i class='fa fa-trash'></i> Delete</button>";
						echo "</td>";
						echo "</tr>";
					} else {
						echo "<tr>";
						echo "<td>$_name</td><td>$_role_id</td><td>$_email</td>";
						echo "<td>";
						echo "<input type='hidden' value='$_id' name='hdnEditId' />";
						echo "<button type='submit' name='btnEdit' class='btn btn-primary'><i class='fa fa-edit'></i> Edit</button>&nbsp;&nbsp;";
						echo "<button type='submit' name='btnDelete' class='btn btn-danger'><i class='fa fa-trash'></i> Delete</button>";
						echo "</td>";
						echo "</tr>";
					}
				}
				echo "</form>";
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