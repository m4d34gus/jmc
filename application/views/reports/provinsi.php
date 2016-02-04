<div class="container">
	<div class="row">
		<div class="col s12 m12 l8 offset-l2">
			<h4 class="center-align">Jumlah penduduk per provinsi</h4>
		</div>
	</div>
	<div class="row">
		<div class="col s12 m12 l12">
        	<table class="striped">
		        <thead>
		          <tr>
		              <th data-field="id">NO.</th>
		              <th data-field="name">Nama Provinsi</th>
		              <th data-field="jumlah">Jumlah Penduduk</th>
		          </tr>
		        </thead>
		        <?php if(!empty($provinsi)) { $no=1;?>
		        <tbody>
		        	<?php foreach ($provinsi as $prov) { ?>
		        		<tr>
		        			<td><?php echo $no; ?></td>
		        			<td><?php echo $prov->name; ?></td>
		        			<td><?php echo $prov->jumlah; ?></td>
		        		</tr>
		        	<?php $no++; } ?>
		        </tbody>
		        <?php } ?>
		    </table>
		</div>
    </div>
</div>

