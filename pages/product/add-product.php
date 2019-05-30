<?php
	if(isset($_POST["btnSubmit"])){	 
		$code = $_POST["txtCode"];
		$sku = $_POST["txtSku"];
		$name = $_POST["txtName"];
		$brand_id = $_POST["cmbBrands"];
		$supplier_id = $_POST["cmbSuppliers"];
		$category_id = $_POST["cmbCategories"];		
		$net_weight = $_POST["txtNetW"];
		$gross_weight = $_POST["txtGrossW"];
		$sales_price = $_POST["txtSalesPrice"];		
		$purchase_cost = $_POST["txtPurchaseCost"];
		$stock = $_POST["txtStock"];		
		$uom = $_POST["cmbUom"];
		$comments = $_POST["txtareaComments"];
		
		$adding_query = "insert into
		products(code, sku, name, fk_brand_id, fk_supplier_id, fk_category_id, net_weight, gross_weight, sales_price, purchase_cost, stock_level, fk_uom_id, comments)
		values('$code', '$sku', '$name', '$brand_id', '$supplier_id', '$category_id', '$net_weight', '$gross_weight', '$sales_price', '$purchase_cost', '$stock', '$uom', '$comments')";
				
		if($db->query($adding_query)){
						
		} else {
			printf("Errormessage: %s\n", $db->error);
		}
		
	}
?>
<div class="box box-primary">
    <div class="box-header with-border">
    	<h3 class="box-title">Add Product</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="#" method="post">
        <div class="box-body">
            <div class="row">
				<div class="col-xs-6">
					<div class="form-group">
						<label>Code</label>
						<input type="text" name="txtCode" class="form-control" placeholder="Code">
					</div>
				</div>
				<div class="col-xs-6">
					<div class="form-group">
						<label>SKU</label>
						<input type="text" name="txtSku" class="form-control" placeholder="SKU">
					</div>
				</div>
            </div>
        </div>
        
        <div class="box-body">			
			<div class="row">
				<div class="col-xs-4">					
					<div class="form-group">
						<label>Product Name</label>
						<input type="text" name="txtName" class="form-control" placeholder="Product Name" required="required">
					</div>
				</div>
				<div class="col-xs-4">
					<div class="form-group">
						<label>Brand</label>
						<select class="form-control" name="cmbBrands">
							<?php
								$brands = $db->query("select id, name from brands");
                            	while(list($id, $name) = $brands->fetch_row()){
									echo "<option value='$id'>$name</option>";
								}
							?>
						</select>
					</div>
				</div>
				<div class="col-xs-4">
					<div class="form-group">
						<label>Supplier</label>
						<select class="form-control" name="cmbSuppliers">
							<?php
								$suppliers = $db->query("select id, name from suppliers");
                            	while(list($id, $name) = $suppliers->fetch_row()){
									echo "<option value='$id'>$name</option>";
								}
							?>
						</select>                 
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4">
					<div class="form-group">
						<label>Category</label>
						<select class="form-control" name="cmbCategories">
							<?php
								$categories = $db->query("select id, name from product_category");
                            	while(list($id, $name) = $categories->fetch_row()){
									echo "<option value='$id'>$name</option>";
								}
							?>
						</select>                  
					</div>
				</div>
				<div class="col-xs-4">
					<div class="form-group">
						<label>Net Weight</label>
						<input type="text" name="txtNetW" class="form-control" placeholder="Net Weight">
					</div>
				</div>
				<div class="col-xs-4">
					<div class="form-group">
						<label>Gross Weight</label>
						<input type="text" name="txtGrossW" class="form-control" placeholder="Gross Weight">
					</div>
				</div>
			</div>
        </div>
		<div class="box-body">			
			<div class="row">
				<div class="col-xs-3">
					<label>Sales Price</label>
					<input type="text" name="txtSalesPrice" class="form-control" placeholder="Sales Price">
				</div>
				<div class="col-xs-3">
					<label>Purchase Cost</label>
					<input type="text" name="txtPurchaseCost" class="form-control" placeholder="Purchase Cost">
				</div>
				<div class="col-xs-3">
					<label>Stock Level</label>
					<input type="text" name="txtStock" class="form-control" placeholder="Stock Level">
				</div>
				<div class="col-xs-3">
					<div class="form-group">
						<label>Unit of Measure</label>
						<select class="form-control" name="cmbUom">
							<?php
								$uom = $db->query("select id, name from uom");
                            	while(list($id, $name) = $uom->fetch_row()){
									echo "<option value='$id'>$name</option>";
								}
							?>
						</select>
					</div>
				</div>
			</div>
        </div>
		<div class="box-body">			
			<div class="row">
				<div class="col-xs-12">
					<div class="form-group">
						<label>Comments</label>
						<textarea class="form-control" name="txtareaComments" rows="3" placeholder="Comments"></textarea>
					</div>
				</div>
			</div>
        </div>
        <div class="box-footer">
            <button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<script>
	function successMsg(){
		alert("asdfsdf");	
	}
</script>