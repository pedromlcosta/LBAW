<?php
include_once('../../config/init.php');
include_once($BASE_DIR . 'database/unit.php');

$areas = getAreas();

if(!isset($_GET['unit'])){
	$_SESSION['error_messages'][] = 'unit not especified!';
	header("Location: " . $BASE_URL . "index.php");
	exit;
}

$unit = getUnit($_GET['unit']);
if(!$unit){
	$_SESSION['error_messages'][] = 'unit not found!';
	header("Location: " . $BASE_URL . "index.php");
	exit;
}

$formValues = array('unit_id' => $unit['curricularid'], 'unit_name' => $unit['name'], 'unit_area' => $unit['area'], 'unit_credits' => $unit['credits']);

$smarty->assign('FORM_VALUES', $formValues);
$smarty->assign('areas', $areas);
$smarty->display('curricularUnit/updateUnit.tpl');
?>