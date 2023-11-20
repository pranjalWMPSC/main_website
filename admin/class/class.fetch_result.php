<?php

class fetch_result
{	
	public function userlist()
	{
		$qry = "SELECT user_id,state_id,city_id,firm_name,contat_name,contact_number,user_type,user_status FROM user_master";
		$rst = mysqli_query($mysqli,$qry);
//$userlist=array();	
		while($arruser=mysqli_fetch_array($rst))
		{
			$uid=$arruser['user_id'];
			$contat_name=$arruser['contat_name'];
			$firm_name=$arruser['firm_name'];
			$contact_number=$arruser['contact_number'];
			$user_type=$arruser['user_type'];
			$isdeleted=$arruser['user_status'];
			$userlist[]=array ("uid"=>$uid,"contat_name"=>$contat_name,"contact_number"=>$contact_number,"isdel"=>$isdeleted,"user_type"=>$user_type,"firm_name"=>$firm_name);
		}
		

			return $userlist;
		//header('Content-type: application/json');
		//echo json_encode($json);
	}
	
	public function product_type()
	{
		$qry = "SELECT * FROM product_type where isdeleted=0";
		$rst = mysqli_query($mysqli,$qry);
	
		while($arrprotype=mysqli_fetch_array($rst))
		{
			$protype_id=$arrprotype['product_type_id'];
			$protype_name=$arrprotype['product_type'];
			$isdeleted=$arrprotype['isdeleted'];
			$product_type[]=array ("protype_id"=>$protype_id,"protype_name"=>$protype_name,"isdel"=>$isdeleted);
		}
		

			return $product_type;
		
	}
	
	
	public function state_list()
	{
		$qry = "SELECT * FROM states ORDER BY id ASC";
		$rst = mysqli_query($mysqli,$qry);
	
		while($arrprotype=mysqli_fetch_array($rst))
		{
			$id=$arrprotype['id'];
			$name=$arrprotype['name'];
			$states[]=array ("id"=>$id,"name"=>$name);
		}
		

			return $states;
		
	}
	
	public function firmname()
	{
		$qry = "SELECT * FROM user_master ORDER BY user_id ASC";
		$rst = mysqli_query($mysqli,$qry);
	
		while($arrfirm=mysqli_fetch_array($rst))
		{
			$id=$arrfirm['user_id'];
			$firm=$arrfirm['firm_name'];
			$firm_name[]=array($id,$firm);
		}
		

			return $firm_name;
		
	}
	
	
	public function response_list()
	{
		
		$sql="select * from generate_quotation_demand order by generate_quotation_demand_id desc";
		$exe=mysqli_query($mysqli,$sql);
		$cnt=0;
		while($arrres=mysqli_fetch_array($exe))
		{
			$qid=$arrres['generate_quotation_demand_id'];
			$quotation_id=$arrres['quotation_id'];
			$user_id=$arrres['user_id'];
			$product_id=$arrres['product_id'];
			$plant_id=$arrres['plant_id'];
			$qty=$arrres['qty'];
			$exp_rate=$arrres['exp_rate'];
			$exp_date=$arrres['exp_date'];
			$cv=$arrres['cv'];
			$moisture=$arrres['moisture'];
			$ash=$arrres['ash'];
			$other_info=$arrres['other_info'];
			$requirement_type=$arrres['requirement_type'];
			$requirement_frequency=$arrres['requirement_frequency'];
			$quotation_date_time=$arrres['quotation_date_time'];
			$quotation_status=$arrres['quotation_status'];
			
				$uqry="select * from user_master where user_id=$user_id";
				$uexe=mysqli_query($mysqli,$uqry);
				$arru = mysqli_fetch_assoc($uexe);
				$contat_name=$arru['contat_name'];
				$firm_name=$arru['firm_name'];
			
			
				$pqry="select pm.product_name,pm.product_type_id,pt.product_type,pt.product_type_id from product_master as pm inner join product_type as pt on pm.product_type_id=pt.product_type_id where pm.product_id=$product_id";
				
				$pexe=mysqli_query($mysqli,$pqry);
				$arrp = mysqli_fetch_assoc($pexe);
				$product_name=$arrp['product_name'];
				$product_type=$arrp['product_type'];
				
			
				$plqry="select p.plant_name,p.city_id,p.state_id,s.id,s.name,c.id,c.city_name from plants as p inner join states as s on p.state_id=s.id inner join cities as c on p.city_id=c.id where p.plant_id=$plant_id";
				
				$plexe=mysqli_query($mysqli,$plqry);
				$arrAdmin = mysqli_fetch_assoc($plexe);
				$plant_name=$arrAdmin['plant_name'];
				$name=$arrAdmin['name'];
				$city_name=$arrAdmin['city_name'];
			
			$response_list[]=array("qid"=>$qid,"quotation_id"=>$quotation_id,"user_id"=>$user_id,"product_id"=>$product_id,"product_name"=>$product_name,"product_type"=>$product_type,"qty"=>$qty,"exp_rate"=>$exp_rate,"exp_date"=>$exp_date,"cv"=>$cv,"moisture"=>$moisture,"ash"=>$ash,"requirement_type"=>$requirement_type,"requirement_frequency"=>$requirement_frequency,"quotation_date_time"=>$quotation_date_time,"plant_name"=>$plant_name,"name"=>$name,"city_name"=>$city_name,"other_info"=>$other_info,"contat_name"=>$contat_name,"firm_name"=>$firm_name,"quotation_status"=>$quotation_status);
		}
		return $response_list;
		//header('Content-type: application/json');
		//echo json_encode($json);
	}
	
	public function show_plants()
	{
		$qry = "SELECT * FROM plants as p inner join user_master as um on p.user_id=um.user_id"; 
		$rst = mysqli_query($mysqli,$qry);
//$product_master=array();	
		while($arrpla=mysqli_fetch_array($rst))
		{
			$plant_id=$arrpla['plant_id'];
			$plant_name=$arrpla['plant_name'];
			$added_date=$arrpla['added_date'];
			$firm_name=$arrpla['firm_name'];
			$datetime=date("d-m-Y H:i:s", strtotime($arrpla['added_date']));
			
			$product_master[]=array ("plant_id"=>$plant_id,"plant_name"=>$plant_name,"firm_name"=>$firm_name,"datetime"=>$datetime);
		}
		

			return $product_master;
		//header('Content-type: application/json');
		//echo json_encode($json);
	}
	
	
}
	
	
?>