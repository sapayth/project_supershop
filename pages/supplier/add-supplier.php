<div class="box box-primary">
    <div class="box-header with-border">
    	<h3 class="box-title">Add Supplier</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="#" method="post">
        <div class="box-body">
			<div class="row">
				<div class="col-xs-4">
					<div class="form-group">
						<label for="">Supplier Name</label>
						<input type="text" class="form-control" id="" name="txtSupplierName" placeholder="Enter Supplier Name">
					</div>
				</div>
				<div class="col-xs-4">
					<div class="form-group">
						  <label for="">Contact No</label>
						  <input type="email" class="form-control" id="" placeholder="Contact No">
					</div>
				</div>
				<div class="col-xs-4">
					<div class="form-group">
						  <label for="">Email address</label>
						  <input type="email" class="form-control" id="" placeholder="Enter email">
					</div>
				</div>				
			</div>
			<div class="row">
				<div class="col-xs-6">
					<div class="form-group">
						  <label for="">Address</label>
						  <textarea class="form-control" type="text"></textarea>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="form-group">
						  <label for="">Comment</label>
						  <textarea class="form-control" type="text"></textarea>
					</div>
				</div>
			</div>
		</div>
        <!-- /.box-body -->
        
        <div class="box-footer">
        <button type="submit" class="btn btn-primary" name="btnAddSupplier">Add Supplier</button>
        </div>
    </form>
</div>
<?php
	if(isset($_POST["btnAddSupplier"])){
		$supplier = $_POST["txtSupplierName"];
		$db->query("insert into suppliers(name) values('$supplier')");
	}
?>