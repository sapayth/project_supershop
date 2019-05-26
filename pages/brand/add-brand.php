<div class="box box-primary">
    <div class="box-header with-border">
    	<h3 class="box-title">Add Brand</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="#" method="post">
        <div class="box-body">
            <div class="form-group">
            	<label for="exampleInputEmail1">Brand Name</label>
            	<input type="text" class="form-control" id="txtBrandName" name="txtBrandName" placeholder="Enter Brand Name">
            </div>
        </div>
        <!-- /.box-body -->
        
        <div class="box-footer">
        <button type="submit" class="btn btn-primary" name="btnAddBrand">Add Brand</button>
        </div>
    </form>
</div>
<?php
	if(isset($_POST["btnAddBrand"])){
		$brand = $_POST["txtBrandName"];
		$db->query("insert into brands(name) values('$brand')");
	}
?>