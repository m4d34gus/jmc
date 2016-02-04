<div class="container">
	<div class="row">
    	<div class="col s12 m12 l6 offset-l3"><span class="flow-text">
      		<div class="card white">
	            <div class="card-content text-grey text-lighten-2  center-align">
	              User
	            </div>
	            <div class="card-action center-align">
	            	<div class="row">
	            		<form class="col s12" method="post" accept-charset="utf-8" action="<?php echo base_url('user/save') ?>"  id="login">
    						<div class="row">
						    	<div class="input-field col s12">
						    	  <?php if(is_admin()) { ?>
						          <input type="text" class="validate" name="username" <?php if($username){ ?> value="<?php echo $username; ?>" <?php } ?>>
						          <label for="username">Username</label>
						          <?php }else{ ?>
						          	<input type="hidden" class="validate" name="username" <?php if($username){ ?> value="<?php echo $username; ?>" <?php } ?>>
						          	<span><?php echo $username ?></span>
						          <?php } ?>
						        </div>
						    </div>
						    <div class="row">
						    	<div class="input-field col s12">
						          <input type="password" class="validate" name="password" id="password">
						          <label for="provinsi">Password</label>
						        </div>
						    </div>
						    <div class="input-field col s12 m12 l12">
						    	<?php if(is_admin()) { ?>
								    <select name="group" id="group">
								      <?php foreach ($groups as $group) { ?>
								      	<option value="<?php echo $group->id ?>" <?php if($group_id && $group_id==$group->id) { ?> selected <?php } ?>><?php echo $group->name ?></option>
								      <?php } ?>
								    </select>
								    <label>Group</label>
							    <?php }else{ ?>
							    	<input type="hidden" name="group" id="group" value="<?php if($group_id){ echo $group_id; }?> ">
							    <?php } ?>
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

<script type="text/javascript">
	$(document).ready(function() {
	   $('select').material_select();
	});
</script>