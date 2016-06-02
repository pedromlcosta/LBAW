<?php
include_once('../config/init.php');

/*
$account_type = $_SESSION['account_type'];
if(!$account_type && $account_type != 'Admin' && $account_type != 'Teacher'){
	$_SESSION['error_messages'][] = 'Unauthorized Access';
 	header("Location: " . $BASE_URL . "index.php");
 	exit;
}
*/

if(isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

	include_once($BASE_DIR . 'database/class.php');

	$data = array();

	if(!isset($_POST['action'])){
		$_SESSION['error_messages'][] = 'Action not especified';
		exit;
	}

	if($_POST['action']=='list'){

		if(!isset($_POST['itemsPerPage']))
			$itemsPerPage = 10;
		else
			$itemsPerPage = intval($_POST['itemsPerPage']);

		if(isset($_POST['page']))
			$pageNumber = intval($_POST['page']);
		else
			$pageNumber = 1;

		if($itemsPerPage == 0 || $pageNumber == 0){ //intval return 0 if failed
			$_SESSION['error_messages'][] = 'Arguments of page and items per page expected to be integer > 0';
			exit;
		}

		if($_POST['unit']){
			$data['nbClasses'] = intval(countUCOClass($_POST['unit'])['total']);

			if(isset($_POST['nbClasses'])){
				if(intval($_POST['nbClasses']) != $data['nbClasses']){
					$nbPages = ceil($data['nbClasses'] / $itemsPerPage);
					$pageNumber = max(min($nbPages,$pageNumber),1);
				}
			}

			$offset = ($pageNumber - 1) * $itemsPerPage;
			$data['classes'] = getUCOClasses($_POST['unit'],$itemsPerPage,$offset);
		}
		else if ($_POST['teacher']){
			$data['nbClasses'] = intval(countTeacherClass($_POST['teacher'])['total']);

			if(isset($_POST['nbClasses'])){
				if(intval($_POST['nbClasses']) != $data['nbClasses']){
					$nbPages = ceil($data['nbClasses'] / $itemsPerPage);
					$pageNumber = max(min($nbPages,$pageNumber),1);
				}
			}

			$offset = ($pageNumber - 1) * $itemsPerPage;
			$data['classes'] = getTeacherClasses($_POST['teacher'],$itemsPerPage,$offset);
		}
		else{
			$data['nbClasses'] = intval(countClass()['total']);

			if(isset($_POST['nbClasses'])){
				if(intval($_POST['nbClasses']) != $data['nbClasses']){
					$nbPages = ceil($data['nbClasses'] / $itemsPerPage);
					$pageNumber = max(min($nbPages,$pageNumber),1);
				}
			}

			$offset = ($pageNumber - 1) * $itemsPerPage;
			$data['classes'] = getClasses($itemsPerPage,$offset);
		}

		if(!isset($_POST['unit'])){
			foreach ($data['classes'] as &$class)
				$class['unit'] = $class['unit'] . ' : ' .$class['calendaryear'] . '/' . ($class['calendaryear'] + 1);
			unset($class);
		}

		$smarty->clearAssign('classes');
		$data['page'] = $pageNumber;
		echo json_encode($data);
	}

	else if($_POST['action']=='delete'){

		$inputs = array();
		$inputs['id'] = 'ID on delete not especified!';
		$inputs['page'] = 'Page where delete happens not specified';
		$inputs['itemsPerPage'] = 'Items per page not specified';
 		if(!checkInputs($_POST, $inputs)){
 			//SEASION ERRORS inside checkInputs  
			exit;
		}

		$itemsPerPage = $_POST['itemsPerPage'];

		if($id = intval($_POST['id']) == 0){
			$_SESSION['error_messages'][] = 'Class provided not valid';
			exit;
		}

		$data['success'] = deleteClass($_POST['id']);
		if($data['success'] == 'Success'){

			$page = intval($_POST['page']);

			if(isset($_POST['unit'])){
				$data['nbClasses'] = intval(countUCOClass($_POST['unit'])['total']);

				$nbPages = ceil($data['nbUnits'] / $_POST['itemsPerPage']);
				if($page > $nbPages)
					$data['page'] = max($page - 1,1);
				else
					$data['page'] = $page;

				$offset = ($data['page'] - 1) * $itemsPerPage;
				$data['classes'] = getUCOClasses($_POST['unit'],$itemsPerPage,$offset);
			}
			else if(isset($_POST['teacher'])){
				$data['nbClasses'] = intval(countTeacherClass($_POST['teacher'])['total']);

				$nbPages = ceil($data['nbUnits'] / $_POST['itemsPerPage']);
				if($page > $nbPages)
					$data['page'] = max($page - 1,1);
				else
					$data['page'] = $page;

				$offset = ($data['page'] - 1) * $itemsPerPage;
				$data['classes'] = getTeacherClasses($_POST['teacher'],$itemsPerPage,$offset);
			}
			else{
				$data['nbClasses'] = intval(countClass()['total']);

				$nbPages = ceil($data['nbUnits'] / $_POST['itemsPerPage']);
				if($page > $nbPages)
					$data['page'] = max($page - 1,1);
				else
					$data['page'] = $page;

				$offset = ($data['page'] - 1) * $itemsPerPage;
				$data['classes'] = getClasses($itemsPerPage,$offset);
			}
		}

		if(!isset($_POST['unit'])){
			foreach ($data['classes'] as &$class)
				$class['unit'] = $class['unit'] . ' : ' .$class['calendaryear'] . '/' . ($class['calendaryear'] + 1);
			unset($class);
		}

		$smarty->clearAssign('classes');
		echo json_encode($data);
	}
	else{
		$_SESSION['error_messages'][] = 'Unknow Action';      
		exit;
	}
}
?>

<?php
function checkInputs($post, $inputs){
  $result = true;
  foreach($inputs as $key => $value)
    if(!isset($post[$key])){
      $_SESSION['error_messages'][] = $value;
      $result = false;
    }

  return $result;
}
?>