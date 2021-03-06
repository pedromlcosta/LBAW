<?php /* Smarty version Smarty-3.1.15, created on 2016-06-08 13:58:20
         compiled from "C:\xampp\htdocs\LBAW\final\templates\common\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:118515757feec61e3a6-76776602%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04b5498b13ef5385712eca5c86327cf1a6f3d761' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\final\\templates\\common\\header.tpl',
      1 => 1465386849,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118515757feec61e3a6-76776602',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5757feec7089b7_32270381',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'USERNAME' => 0,
    'ACCOUNT_TYPE' => 0,
    'STUDENT_COURSE' => 0,
    'USERID' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5757feec7089b7_32270381')) {function content_5757feec7089b7_32270381($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Bootstrap -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/modern-business.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/unitPage.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/custom_style.css" rel="stylesheet">
    <Title>AcademicManagement Page</Title>
    <!-- Custom Fonts -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header navbar-right">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#CollapsibleMenu">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <?php if (!isset($_SESSION['username'])) {?>

            <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Person/login.php" id="login_btn" class="btn navbar-btn">Login </a>

            <?php } else { ?>
            <ul class="nav navbar-nav navbar-left" style="max-width:160px;">
                <li class="dropdown">
                    <a href="#" id="user_dropdown" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_smarty_tpl->tpl_vars['USERNAME']->value;?>
 (<?php echo $_smarty_tpl->tpl_vars['ACCOUNT_TYPE']->value;?>
) <b
                            class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Person/personalPage.php?person=<?php echo $_smarty_tpl->tpl_vars['USERNAME']->value;?>
">Profile</a>
                        </li>
                        <?php if ($_smarty_tpl->tpl_vars['ACCOUNT_TYPE']->value=='Admin') {?>
                        <li>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Admin/admin.php">Admin Area</a>
                        </li>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['ACCOUNT_TYPE']->value!='Teacher') {?>
                        <li>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Request/requestList.php">Requests</a>
                        </li>
                        <?php }?>
                        <li>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/logout.php">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <?php }?>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="CollapsibleMenu">
            <ul class="nav navbar-nav navbar-left">

                <li class="nav-brand">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
index.php">Home</a>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Explore <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Course/courseList.php">Courses</a>
                        </li>
                        <li>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Person/personList.php">People</a>
                        </li>
                    </ul>
                </li>

                <!-- this should show for students and regent of a course -->
                <?php if ($_smarty_tpl->tpl_vars['ACCOUNT_TYPE']->value=='Student') {?>
                <li class="nav-brand">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Course/coursePage.php?course=<?php echo $_smarty_tpl->tpl_vars['STUDENT_COURSE']->value;?>
">My Course</a>
                </li>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['ACCOUNT_TYPE']->value=='Student') {?>
                <li class="nav-brand">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Evaluation/evaluations.php?student=<?php echo $_smarty_tpl->tpl_vars['USERID']->value;?>
">Evaluations</a>
                </li>
                <?php }?>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- jQuery -->
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
js/jquery.js"></script>
<!-- Other Scripts -->
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
js/scripts.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
js/bootstrap.min.js"></script>
<?php }} ?>
