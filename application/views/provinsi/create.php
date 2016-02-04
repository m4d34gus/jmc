<div class="container">
	<div class="row">
    	<div class="col s12 m12 l6 offset-l3"><span class="flow-text">
      		<div class="card white">
	            <div class="card-content text-grey text-lighten-2  center-align">
	              Porvinsi
	            </div>
	            <div class="card-action center-align">
	            	<div class="row">
	            		<form class="col s12" method="post" accept-charset="utf-8" action="<?php echo base_url('provinsi/save') ?>"  id="login">
    						<div class="row">
						    	<div class="input-field col s12">
						          <input id="provinsi" type="text" class="validate" name="provinsi" <?php if($name){ ?> value="<?php echo $name; ?>" <?php } ?>>
						          <label for="provinsi">Provinsi</label>
						        </div>
						    </div>
						    <?php if($id){ ?>
						    	<input type="hidden" name="id" value="<?php echo $id; ?>">
						    <?php } ?>
						    <input type="hidden" name="action" value="<?php echo $action; ?>">
	              			<input type="submit" class="waves-effect waves-light btn" value="Save">
	              		</form>
	              	</div>
	            </div>
          </div>
    	</span></div>
    </div>
</div>