<?php /* Smarty version Smarty-3.1.15, created on 2016-06-08 13:58:20
         compiled from "C:\xampp\htdocs\LBAW\final\templates\home\homepage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:171785757feec292027-11439418%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e955f744a7ed26856ba1d973c7efd29c8721f4a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\final\\templates\\home\\homepage.tpl',
      1 => 1465386850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171785757feec292027-11439418',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5757feec5168d7_10151081',
  'variables' => 
  array (
    'ACCOUNT_TYPE' => 0,
    'evaluations' => 0,
    'BASE_URL' => 0,
    'evaluation' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5757feec5168d7_10151081')) {function content_5757feec5168d7_10151081($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('images/slide_one.jpg');"></div>
                <div class="carousel-caption">
                    <h2>A home for students, with everything to offer</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('images/slide_two.jpg');"></div>
                <div class="carousel-caption">
                    <h2>A place to move forward, surrounded by bright minds</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('images/slide_three.jpg');"></div>
                <div class="carousel-caption">
                    <h2>A calm environment where you can work in peace</h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

     <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

    <!-- Page Content -->
    <div class="container">

        <!-- Evaluation Section -->
        <?php if ($_smarty_tpl->tpl_vars['ACCOUNT_TYPE']->value=='Student') {?>
         <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Upcoming Evaluations
                </h1>
            </div>

            <?php  $_smarty_tpl->tpl_vars['evaluation'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['evaluation']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['evaluations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['evaluation']->key => $_smarty_tpl->tpl_vars['evaluation']->value) {
$_smarty_tpl->tpl_vars['evaluation']->_loop = true;
?>
            <div class="col-md-4">
                <div class="panel panel-default">
                	<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/pages/CurricularUnit/viewUnitOccurrence.php?uc=<?php echo $_smarty_tpl->tpl_vars['evaluation']->value['cuoccurrenceid'];?>
">
                    	<div class="panel-heading text-center btn-header">
                        	<h3> <b><?php echo $_smarty_tpl->tpl_vars['evaluation']->value['name'];?>
</b></h3>
                    	</div>
                	</a>
                    <div class="panel-body">
                        	<h4>Type: <?php echo $_smarty_tpl->tpl_vars['evaluation']->value['evaluationtype'];?>
 </h4>
                        
                        	<h4>Date: <?php echo $_smarty_tpl->tpl_vars['evaluation']->value['evaluationdate'];?>
</h4>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php }?>
        <!-- /.row -->
    </div>
    <!-- /.container -->

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
