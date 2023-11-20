<?php

	class db{
		
		public static function insert($arrData,$strTable){
			$strColumn = "";
			$strValues = "";
			$count = 0;
			if(!is_array($arrData)){
				die("Invalid Data");
			}
			$count = count($arrData);
			$counter = 1;
			$comma = ",";
			foreach($arrData as $key => $value){
				if($counter == $count)
					$comma = "";
				$strColumn .= $key . $comma;
				$strValues .= "'" . $value . "'" . $comma;
				
				$counter ++;
			}
			
			$qryInsert = "INSERT INTO $strTable($strColumn)VALUES($strValues)";
			
			$rstInsert = mysqli_query($mysqli,$qryInsert) or die(mysqli_error($mysqli)); 
			
			return mysqli_insert_id($mysqli);
			
		}
		
		
		public static function update($arrData,$strTable,$where = null){
			$strColumn = "";
			$count = 0;
			if(!is_array($arrData)){
				die("Invalid Data");
			}
			$count = count($arrData);
			$counter = 1;
			$comma = ",";
			foreach($arrData as $key => $value){
				if($counter == $count)
					$comma = "";
				$strColumn .= "$key = '$value' $comma";				
				
				$counter ++;
			}
			
			$strWhere = " 1";
			if(!is_null($where)){
				$strWhere = "";
				$count = count($where);
				$counter = 1;
				foreach($where as $key => $value){
					if($counter == $count)
						$comma = "";
					$strWhere .= " $key = '$value' $comma";				
					
					$counter ++;
				}	
			}
			
			$qryUpdate = "UPDATE $strTable SET $strColumn WHERE $strWhere";
			mysqli_query($mysqli,$qryUpdate) or die(mysqli_error($mysqli));
			
		}


	

	public static function fetchRecords($strTableName, $arrFields, $order_id)
	{
		$sqlselect = "select $arrFields from $strTableName order by $order_id desc";
		$sqlselectE = mysqli_query($mysqli,$sqlselect);

		return $sqlselectE;
	}


	public static function fetchRecords_where($strTableName, $arrFields, $wheredata)
	{
		$sqlselect = "select $arrFields from $strTableName where $wheredata";
		$sqlselectE = mysqli_query($mysqli,$sqlselect);
		if(mysqli_num_rows($sqlselectE) <= 0){
			return 0;
		}
		else
		{
			return 1;
		}
	}


	public static function fetchRecords_where_dataget($strTableName, $arrFields, $wheredata)
	{
		$sqlselect = "select $arrFields from $strTableName where $wheredata";
		$sqlselectE = mysqli_query($mysqli,$sqlselect);
		return $sqlselectE;
	}


	public static function fetchRecords_innerJoin($strTableName, $jointable, $tablefield, $joinfield, $arrFields, $wheredata)
	{
		$sqlselect = "select $arrFields from $strTableName ST inner join $jointable JT ON JT.$tablefield = ST.$joinfield where $wheredata";
		$sqlselectE = mysqli_query($mysqli,$sqlselect);
		return $sqlselectE;
	}


	public static function delete($strTableName, $wheredata)
	{
		$sqlselect = "delete from $strTableName where $wheredata";
		$sqlselectE = mysqli_query($mysqli,$sqlselect);
		
	}



		
		
	}
?>