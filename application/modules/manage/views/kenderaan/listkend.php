<?php 
    //$ENABLE_ADD     = has_permission('menu.Add');
    //$ENABLE_MANAGE  = has_permission('menu.Manage');
    //$ENABLE_DELETE  = has_permission('menu.Delete');
    $ENABLE_ADD  = TRUE;
    $ENABLE_MANAGE  = TRUE;
    $ENABLE_DELETE  = TRUE;

	echo"bilangan data" , $data->num_rows();
?>
<?= form_open($this->uri->uri_string(),array('id'=>'frm_menu','name'=>'frm_menu')) ?>	

<a class="btn btn-primary" href="<?php echo module_url("kenderaan/formadd")?>">Add Form</a>
	
<div class="card">
	
        <div class="card-header">Senarai Permohonan Tuntutan  Benchfee
		
		</div>
		
	<div class="card-body ">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th width="50">No.</th>
						<th>Kod Kenderaan</th>
						<th>No PLAT</th>
						<th>Nama Kenderaan</th>
						<th>Jenama</th>
						<th>Varian</th>
						<th>Delete</th>
						<th>Edit</th>
						
						
						
<!-- <th><?=lang('cov_bank_kod')?> (RM)</th> -->



                        
                    </tr>
                </thead>
                <tbody>
<?php $i=0; foreach($data->result() as $row) {?> 
					<tr>
					    
						<td><?php echo ++$i ?></td>
						<td><?php echo $row->T01_KOD_KENDERAAN ?></td>
						<td><?php echo $row->T01_PLAT ?></td>
						<td><?php echo $row->T01_NAMA_KENDERAAN ?></td>
						<td><?php echo $row->T01_JENAMA ?></td>
						<td><?php echo $row->T01_VARIAN ?></td>
						
						<!-- <td>100.00</td> -->
						<td><a class="btn btn-flat btn-danger" href="<?php echo module_url("kenderaan/delete/".$row->T01_ID)?>">Delete</a></td>
						<td><a class="btn btn-flat btn-warning" href="<?php echo module_url("kenderaan/formedit/".$row->T01_ID)?>">Edit</a></td>

                    </tr>
<?php } ?>
					
                </tbody>
	  </table>
	  
	  <?php if(!$ENABLE_DELETE) { ?>
		<input type="button" name="delete1" class="btn btn-danger" id="delete-me" value="Hapus" onclick="confirm_delete(this.form) ">
		<input type="hidden" name="delete" id="isdelete">
	  <?php } ?>
	  
	</div><!-- /.box-body -->
	<div class="box-footer clearfix">
		<?php
		// echo $this->pagination->create_links(); 
		?>
	</div>
	
	
	
</div><!-- /.box --> <?php form_close(); ?>

<script>
function confirm_delete(myform)
{
	if (confirm('<?= (lang('ccc_delete_confirm')); ?>'))
	{
		$("#isdelete").val(1);
		myform.submit();
	}
	
	return false;
}
</script>