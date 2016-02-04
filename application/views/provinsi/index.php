<div class="container">
	<div class="row">
    	<div class="col s12 m12 l8 offset-l2">
    		<table class="striped">
		        <thead>
		          <tr>
		              <th data-field="id">NO.</th>
		              <th data-field="name">Nama Provinsi</th>
		              <th data-field="action">Action</th>
		          </tr>
		        </thead>
		        <?php if(sizeof(($provinsi))>0){ $no = 1; ?>
			        <tbody>
			       		<?php foreach ($provinsi as $prov) { ?>
				        	<tr>
				        		<td><?php echo $no; ?></td>
				        		<td><?php echo $prov->name; ?></td>
				        		<td>
				        			<a href="<?php echo base_url('provinsi/edit')."/".$prov->id; ?>">edit</a> |
				        			<a href="#" onclick="del(<?php echo $prov->id; ?>)">delete</a>
				        		</td>
				        	</tr>
				        <?php $no++; } ?>	
			        </tbody>
		        <?php } ?>
		    </table>
		    <a href="provinsi/create" class="waves-effect waves-light btn tambah">Tambah</a>
    	</div>
    </div>
</div>

<script type="text/javascript">
	function del(id){
		if(confirm("Anda yakin menghapus data ini?")){
			window.location="<?php echo base_url('provinsi/delete') ?>"+'/'+id;
		}
	}
</script>