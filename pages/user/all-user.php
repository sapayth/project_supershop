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
            	$table = $db->query("select u.name, r.role_name, u.email from users u, user_role r where u.role_id = r.role_id");
				
				while( list($_name, $_role_id, $_email) = $table->fetch_row() ) {
					echo "<tr>";
					echo "<td>$_name</td><td>$_role_id</td><td>$_email</td>";
					echo "</tr>";
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