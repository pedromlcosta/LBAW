 <?php
  include_once('../../config/init.php');
 include_once($BASE_DIR . 'database/person.php');
 include_once($BASE_DIR . 'database/request.php');
 // Get requests from the currently logged in user: if admin, requests he answered
 //                                                  if user, requests he submitted

 // VERIFICATIONS

 if($_SESSION['account_type'] != 'Student'){
     header('Location: ' . $BASE_URL .  'index.php');
     exit;
 }



 // Getting the important information to display
 $smarty->assign(account,  $_SESSION['account_type']);
 $smarty->assign(userID, $_SESSION['userID'] );

  $smarty->display('request/requestListPage.tpl')
?>