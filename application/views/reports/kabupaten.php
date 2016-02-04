<div class="container">
	<div class="row">
		<div class="col s12 m12 l8 offset-l2">
			<h4 class="center-align">Jumlah penduduk per kabupaten</h4>
		</div>
	</div>
	<div class="row">
		<div class="col s12 m12 l8 offset-l2">
			<form>
			  <div class="input-field col s12 m12 l6">
			    <select name="provinsi" id="provinsi">
			      <option value="" disabled selected>Pilih Provinsi</option>
			      <?php foreach ($provinsi as $prov) { ?>
			      <option value="<?php echo $prov->id ?>" <?php if($prov_id && $prov_id==$prov->id ) {?> selected <?php } ?>><?php echo $prov->name ?></option>
			      <?php } ?>
			    </select>
			    <label>Provinsi</label>
			  </div>
    		</form>
		</div>
	</div>
	<div class="row">
		<div class="col s12 m12 l12">
        	<table class="striped">
		        <thead>
		          <tr>
		              <th data-field="id">NO.</th>
		              <th data-field="name">Nama Provinsi</th>
		              <th data-field="name">Nama Kabupaten</th>
		              <th data-field="jumlah">Jumlah Penduduk</th>
		          </tr>
		        </thead>
		        <?php if(!empty($kabupaten)) { $no=1;?>
			        <tbody>
			        	<?php foreach ($kabupaten as $kab) { ?>

			        		<tr>
			        			<td><?php echo $no ;?></td>
			        			<td><?php echo $kab['name']; ?></td>
			        			<td>&nbsp;</td>
			        			<td>&nbsp;</td>
			        		</tr>
			        		<?php foreach ($kab['kabupaten'] as $item) { ?>
			        			<tr>
			        				<td>&nbsp;</td>
			        				<td>&nbsp;</td>
			        				<td><?php echo $item['kab_name']; ?></td>
			        				<td><?php echo $item['jumlah']; ?></td>
			        			</tr>
			        		<?php } ?>
			        	<?php $no++; } ?>
			        </tbody>
		        <?php } ?>
		    </table>
		</div>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
	   $('select').material_select();
	});

	$("#provinsi").change(function(){
		window.location="<?php echo base_url('reports/kabupaten/') ?>"+'/'+$('#provinsi').val();
	})
</script>