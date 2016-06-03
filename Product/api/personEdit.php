<?php
include_once('../config/init.php');
include_once($BASE_DIR . 'database/person.php');

checkArgs()
$username=$_POST['username'];
unset($_POST['username']);
echo createUpdateQuery($_POST,$username,"username");

    function checkArgs(){
    	$phonePattern= '/^[0-9]*$/';
    	$nifPatter = '/^\d{9}$/'; 
    	$erroToken=false;
    	//Username
    	if(!isset($_POST['username'])|| empty($_POST['username']) || !is_numeric($_POST['username'])){
    		echo  $erroToken." invalid user";
    	} //Name
    	else if(!isset($_POST['name'])|| empty($_POST['name']) ){
    		echo  $erroToken." please fill the Name";

    	}  //Addr
    	else if(!isset($_POST['address'])|| empty($_POST['address']) ){
    		echo $erroToken." please fill the Address";

    	} //Nationality
    	else if(!isset($_POST['nationality'])|| empty($_POST['nationality']) ){
    		echo $erroToken." please fill the Nationality";

    	}//PhoneNumber
    	else if(!isset($_POST['phonenumber'])|| empty($_POST['phonenumber']) || !preg_match($phonePattern, $_POST['phonenumber'])){
    		echo $erroToken." please check the PhoneNumber";

    	} //NIF
   		 else if(!isset($_POST['nif'])|| empty($_POST['nif']) || !preg_match($nifPattern, $_POST['nif'])) {
   		 	echo $erroToken." please check NIF";

    	} //BirthDate
   		 else if(!isset($_POST['nif'])|| empty($_POST['nif'])) {
   		 	echo $erroToken." please check the BirthDate";

    	}  //Password
   
    } 
?>
