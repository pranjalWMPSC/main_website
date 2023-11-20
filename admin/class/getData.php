<?php
include "../connection/connect.php";
session_start();

if(isset($_REQUEST['get'])){
	switch($_REQUEST['get']){
		case "states":
			$countryId = isset($_REQUEST['countryId'])?trim($_REQUEST['countryId']):0;
			include "class.state.php";
			
			$rstStates = countryStateCity::getStatesByCountryId($countryId);
			$strStates = "<option value=''>---Select State---</option>";
			while($arrStates = mysqli_fetch_array($rstStates)){
				$strStates .= "<option value='{$arrStates['stateID']}'>{$arrStates['stateName']}</option>";
			}
			
			echo $strStates;
			
			die;
			break;
		
		case "cities":
			$stateId = isset($_REQUEST['stateId'])?trim($_REQUEST['stateId']):0;
			include "class.cityMaster.php";
			
			$rstCities = cityMaster::getCitiesByState($stateId);
			$strCities = "<option value=''>---Select City---</option>";
			while($arrCities = mysqli_fetch_array($rstCities)){
				$strCities .= "<option value='{$arrCities['cityID']}'>{$arrCities['cityName']}</option>";
			}
			
			echo $strCities;
			
			die;
			break;	
		
		
					
	}
}



?>