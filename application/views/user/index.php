<div class="container">
	<div class="row">
    	<div class="col s12 m12 l8 offset-l2">
    		<table class="striped">
		        <thead>
		          <tr>
		              <th data-field="id">NO.</th>
		              <th data-field="name">Username</th>
		              <th data-field="action">Action</th>
		          </tr>
		        </thead>
		        <?php if(sizeof(($users))>0){ $no = 1; ?>
			        <tbody>
			       		<?php foreach ($users as $user) { ?>
				        	<tr>
				        		<td><?php echo $no; ?></td>
				        		<td><?php echo $user->username; ?></td>
				        		<td>
				        			<a href="<?php echo base_url('user/edit')."/".$user->id; ?>">edit</a> |
				        			<a href="#" onclick="del(<?php echo $user->id; ?>)">delete</a>
				        		</td>
				        	</tr>
				        <?php $no++; } ?>	
			        </tbody>
		        <?php } ?>
		    </table>
		    <a href="user/create" class="waves-effect waves-light btn tambah">Tambah</a>
    	</div>
    </div>
</div>

<script type="text/javascript">
	function del(id){
		if(confirm("Anda yakin menghapus user ini?")){
			window.location="<?php echo base_url('user/delete') ?>"+'/'+id;
		}
	}
</script>