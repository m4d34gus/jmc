<div class="container">
	<div class="row">
    	<div class="col s12 m12 l8 offset-l2">
    		<form>
    			  <div class="input-field col s12 m12 l6">
				    <select name="provinsi" id="provinsi">
				      <option value="" disabled selected>Pilih Provinsi</option>
				      <?php foreach ($provinsi as $prov) { ?>
				      <option value="<?php echo $prov->id ?>" <?php if($provinsi_id && $provinsi_id==$prov->id) { ?> selected <?php } ?>><?php echo $prov->name ?></option>
				      <?php } ?>
				    </select>
				    <label>Provinsi</label>
				  </div>
    		</form>
    	</div>
    </div>
	<div class="row">
    	<div class="col s12 m12 l8 offset-l2">
    		<table class="striped">
		        <thead>
		          <tr>
		              <th data-field="id">NO.</th>
		              <th data-field="name">Nama Kabupaten</th>
		              <th data-field="penduduk">Jumlah Penduduk</th>
		              <th data-field="action">Action</th>
		          </tr>
		        </thead>
		        <?php if(sizeof(($kabupaten))>0){ $no = 1; ?>
			        <tbody>
			       		<?php foreach ($kabupaten as $kab) { ?>
			       			<tr>
			       				<td><?php echo $no ;?></td>
			       				<td><?php echo $kab->name ;?></td>
			       				<td><?php echo $kab->penduduk ;?></td>
			       				<td>
			       					<a href="<?php echo base_url('kabupaten/edit/')."/".$kab->id; ?>">edit</a> | 
			       					<a href="#" onclick="del(<?php echo $kab->id; ?>)">delete</a>  
			       				</td>
			       			</tr>
			       		<?php $no++;  } ?>	

			        </tbody>
		        <?php } ?>
		    </table>
		    <a href="<?php echo base_url('kabupaten/create') ?>" class="waves-effect waves-light btn tambah">Tambah</a>
    	</div>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
	   $('select').material_select();
	});

	$("#provinsi").change(function(){
		window.location="<?php echo base_url('kabupaten/index/') ?>"+'/'+$('#provinsi').val();
	})

	function del(id){
		if(confirm("Anda yakin menghapus data ini?")){
			window.location="<?php echo base_url('kabupaten/delete') ?>"+'/'+id;
		}
	}
</script>