<?php

class insert_data
{	

	public function product_type($producttype)
	{
		
		$qryProductType = "INSERT INTO product_type(product_type,isdeleted, date_added)";
		$qryProductType .= "VALUES('{$producttype['product_type']}',0,now())";
		
		//echo $qryProduct;
		$rstProductType = mysqli_query($mysqli,$qryProductType) or die(mysqli_error($mysqli));
		
		if(mysqli_insert_id($mysqli) > 0){
			return 1;
		}
		
		return 0;
	}
	
	
}
	
	
?>