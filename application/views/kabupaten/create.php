<div class="container">
	<div class="row">
    	<div class="col s12 m12 l6 offset-l3"><span class="flow-text">
      		<div class="card white">
	            <div class="card-content text-grey text-lighten-2  center-align">
	              Kabupaen
	            </div>
	            <div class="card-action center-align">
	            	<div class="row">
	            		<form class="col s12" method="post" accept-charset="utf-8" action="<?php echo base_url('kabupaten/save') ?>"  id="login">
	            			<div class="row">
						    	<div class="input-field col s12 m12 l12">
								    <select name="provinsi_id" id="provinsi_id">
								      <option value="" disabled selected>Pilih Provinsi</option>
								      <?php foreach ($provinsi as $prov) { ?>
								      <option value="<?php echo $prov->id ?>" <?php if($provinsi_id == $prov->id) { ?> selected <?php } ?>><?php echo $prov->name ?></option>
								      <?php } ?>
								    </select>
								    <label>Provinsi</label>
								 </div>
						    </div>
    						<div class="row">
						    	<div class="input-field col s12">
						          <input id="provinsi" type="text" class="validate" name="name" <?php if($name){ ?> value="<?php echo $name; ?>" <?php } ?>>
						          <label for="provinsi">Kabupaten</label>
						        </div>
						    </div>
						    <div class="row">
						    	<div class="input-field col s12">
						          <input id="provinsi" type="text" class="validate" name="penduduk" <?php if($penduduk){ ?> value="<?php echo $penduduk; ?>" <?php } ?>>
						          <label for="provinsi">Jumlah Penduduk</label>
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

<script type="text/javascript">
	$(document).ready(function() {
	   $('select').material_select();
	});
</script>