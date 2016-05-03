{include file='common/header.tpl'}

<div class="modal-body">
<div class="container">
  <div class="row">
  	<div class="col-lg-12">
  		<h2 class="page-header">Create Curricular Unit</h2>
  	</div>
  </div>

  <form class="well form-horizontal" action="{$BASE_URL}actions/units/createUnit.php" method="post" id="unitCreation_form">
  	
  	<div class="row">
	  	<div class="form-group">
	  		<label class="col-md-2 control-label">Name</label>
	  		<div class="col-md-9 inputGroupContainer">
	  			<div class="input-group">
	  				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
	  				<input name="unit_name" placeholder="Curricular Unit Name" value="{$FORM_VALUES.unit_name}" class="form-control" type="text" required>
	  			</div>
	  		</div>
	  	</div>
	  	<div class="form-group">
	  		<label class="col-md-2 control-label">Area</label>  
	  		<div class="col-md-9 inputGroupContainer">
	  			<div class="input-group">
	  				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
	  				<input name="unit_area" placeholder="Curricular Unit Area" value="{$FORM_VALUES.unit_area}" list="areas" class="form-control" type="text" required>
	  				<datalist id="areas">
	  					{foreach $areas as $area}
	  					<option value="{$area.area}"></option>
	  					{/foreach}
	  				</datalist>
	  			</div>
	  		</div>
	  	</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Credits</label>  
			<div class="col-md-9 inputGroupContainer">
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
					<input name="unit_credits" placeholder="0" value="{$FORM_VALUES.unit_credits}" class="form-control" type="number" min="1" max="10" required>
				</div>
			</div>
	    </div>
	  	<div class="form-group">
	  		<div class="col-md-4 col-md-offset-4">
	  			<button type="submit" name="unitSubmit" class="btn btn-primary">Create New Curricular Unit</button>
	  		</div>
	  	</div>
	  </div>
  </form>
</div>
</div>

{include file='common/footer.tpl'}