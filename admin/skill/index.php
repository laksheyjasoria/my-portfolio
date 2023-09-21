<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary new_skill" href="javascript:void(0)"><i class="fa fa-plus"></i> Add New</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered table-compact" id="list">
				<colgroup>
					<col width="10%">
					<col width="50%">
					<col width="25%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Name</th>
						<th>Value(%)</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM `skills` ");
					while($row= $qry->fetch_assoc()):
						
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b class="truncate-1"><?php echo ucwords($row['Name']) ?></b></td>
						<td><b class="truncate-1"><?php echo ucwords($row['Value']) ?></b></td>
		                  <td>  <div class="btn-group">
		                        <a href="javascript:void(0)" data-id='<?php echo $row['id'] ?>' class="btn btn-primary btn-flat btn-sm manage_skill">
		                          <i class="fas fa-edit"></i>
		                        </a>
		                        <button type="button" class="btn btn-danger btn-sm btn-flat delete_skill" data-id="<?php echo $row['id'] ?>">
		                          <i class="fas fa-trash"></i>
		                        </button>
	                      </div>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>

	$(document).ready(function(){
		$('.new_skill').click(function(){
			location.href = _base_url_+"admin/?page=skill/manage";
		})
		$('.manage_skill').click(function(){
			location.href = _base_url_+"admin/?page=skill/manage&id="+$(this).attr('data-id')
		})
		$('.delete_skill').click(function(){
		_conf("Are you sure to delete this detail?","delete_skill",[$(this).attr('data-id')])
		})
		$('#list').dataTable()
	})
	function delete_skill($id){
		start_loader()
		$.ajax({
			url:_base_url_+'classes/Content.php?f=skill_delete',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				
					location.reload()
				
			}
		})
	}
</script>