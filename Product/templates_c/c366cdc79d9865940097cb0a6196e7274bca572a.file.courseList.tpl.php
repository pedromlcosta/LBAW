<?php /* Smarty version Smarty-3.1.15, created on 2016-05-03 16:03:32
         compiled from "C:\xampp\htdocs\LBAW\Product\templates\course\courseList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:310725728afb4401726-93211706%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c366cdc79d9865940097cb0a6196e7274bca572a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\Product\\templates\\course\\courseList.tpl',
      1 => 1462197414,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '310725728afb4401726-93211706',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
    'activeCourses' => 0,
    'course' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5728afb4559373_83913384',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5728afb4559373_83913384')) {function content_5728afb4559373_83913384($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/books.jpg" class="img-responsive" alt="CourseBooks">
 
<link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/courseList.css" rel="stylesheet">

<table class="table table-striped">
  <thead>
    <tr class="head">
      <th class="text-center">Courses</th>
      <th class="text-center">Director</th>
      <th class="text-center">Creation Date</th>
      <th class="text-center">Duration (years)</th>
	    <th class="text-center">Academic Degree </th>
    </tr>
  </thead>
  <tbody class="courseListBody">

  <?php  $_smarty_tpl->tpl_vars['course'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['course']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['activeCourses']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['course']->key => $_smarty_tpl->tpl_vars['course']->value) {
$_smarty_tpl->tpl_vars['course']->_loop = true;
?>
     <tr>
      <th scope="row">
        <a href='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Course/coursePage.php?course=<?php echo $_smarty_tpl->tpl_vars['course']->value['code'];?>
'> <?php echo $_smarty_tpl->tpl_vars['course']->value['name'];?>

        </a>
      </th>
      <td>
        <a href='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/Person/personalPage.php?person=<?php echo $_smarty_tpl->tpl_vars['course']->value['directorusername'];?>
'><?php echo $_smarty_tpl->tpl_vars['course']->value['directorname'];?>
</a> 
      </td>
      <td><?php echo $_smarty_tpl->tpl_vars['course']->value['creationdate'];?>
</td>
      
     <?php if ($_smarty_tpl->tpl_vars['course']->value['coursetype']=='Masters') {?>
    	<td>5</td>
		<?php } elseif ($_smarty_tpl->tpl_vars['course']->value['coursetype']=='Bachelor') {?>
    		 <td>3</td>
		<?php } elseif ($_smarty_tpl->tpl_vars['course']->value['coursetype']=='PhD') {?>
   			 <td>5</td>
		<?php }?>
      
      <td><?php echo $_smarty_tpl->tpl_vars['course']->value['coursetype'];?>
</td>
    </tr>
   <?php } ?>
  
  
  </tbody>
</table>
<p>
	A course may take up to 3 years if it is a Bachelor or 5 years if it is a Master. Futhermore each course contains multiple curricular units grouped by year.
</p>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
