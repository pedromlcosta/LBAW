<?php

  include_once('../config/init.php');
  
 
  if (!$_POST['template'] || !$_POST['units']) {
    echo "<span><br> No occurrences were found.</span>";
    exit;
  }

  $units = $_POST['units'];

  if($_POST['template'] == 'peopleTable'){

    $smarty->assign('people', $units);
    $smarty->display('person/personListBody.tpl');
    
  }else if($_POST['template'] == 'courseTable'){

    $smarty->assign('activeCourses', $units);
    $smarty->display('course/courseListBody.tpl');
  }
  else if($_POST['template'] == 'requests'){
    
    $smarty->assign('requests', $units);
    $smarty->display('request/requestListBody.tpl');
  }else if($_POST['template'] == 'modal'){
    $smarty->assign('request', $units);
    $smarty->display('request/viewModalRequest.tpl');
  }else if($_POST['template'] == 'unitContents'){
    $smarty->assign('contents', $units);
    $smarty->display('curricularUnit/viewUnitContentBody.tpl');
  }



?>