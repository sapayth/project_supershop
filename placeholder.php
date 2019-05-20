<?php
	if(isset($_GET["page"])) {
		$page = $_GET["page"];
		
		switch($page) {
			case "reports" :
				include("pages/reports.php");
				break;
			case "all-user" :
				include("pages/user/all-user.php");
				break;
			case "add-user" :
				include("pages/user/add-user.php");
				break;
			case "manage-user" :
				include("pages/user/manage-user.php");
				break;
			case "add-product" :
				include("pages/product/add-product.php");
				break;
			case "all-products" :
				include("pages/product/all-products.php");
				break;
			case "manage-product" :
				include("pages/product/manage-product.php");
				break;
				
			default :
				include("pages/welcome.php");
		}
	}
?>