
<!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo "Students";?></h3>
              <div id="infoMessage"><h2 class="text-primary"><?//php echo $message;?></h2></div>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin" id="stu-table">
                  <thead>
                  <tr>
                    <th><?php echo lang('index_fname_th');?></th>
					<th><?php echo lang('index_lname_th');?></th>
					<th><?php echo lang('index_email_th');?></th>
					
					<th><?php echo lang('index_status_th');?></th>
					<th><?php echo lang('index_action_th');?></th>
                  </tr>
                  </thead>
                  <tbody>


                  	<?php foreach ($user as $user):?>
						<tr>
				            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
				            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
				            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
							
							<td><?php echo ($user->active) ? anchor("backend/auth/deactivate/".$user->id, lang('index_active_link'),['class'=>'label label-success']) : anchor("backend/auth/activate/". $user->id, lang('index_inactive_link'),['class'=>'label label-danger']);?></td>
							<td><?php echo anchor("backend/auth/edit_user/".$user->id, 'Edit',['class'=>'btn btn-warning']) ;?>&nbsp &nbsp&nbsp
								<?php //echo anchor("backend/auth/user_by_id/".$user->id, 'Delete',['data-toggle'=>'modal','data-target'=>'#modal-warning','class'=>'btn btn-danger']); ?></td>

						</tr>
       				<?php endforeach;?>
                                   
                  </tbody>
                </table>
                <?//php echo $links;?>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
         <!-- /.modal -->

        <div class="modal fade" id="modal-warning">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Are You Delete User</h4>
              </div>
              <div class="modal-body">
                <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th><?php echo lang('index_fname_th');?></th>
					<th><?php echo lang('index_lname_th');?></th>
					<th><?php echo lang('index_email_th');?></th>
					
					
                  </tr>
                  </thead>
                  <tbody>
                  	
						<tr>
				            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
				            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
				            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
				        </tr>                  
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary  pull-left" data-dismiss="modal">No</button>
                <?php echo anchor("backend/auth/delete_user/".$user->id, 'Delete',['class'=>'btn btn-success']) ;?>
                </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

            
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        
        <!-- /.col -->
<script type="text/javascript">
$(document).ready(function() {
    $('#stu-table').DataTable({

        

        

        "order": []
    
      
         // "ajax": {
         //     url : "<?//php echo site_url("backend/auth/student") ?>",
         //    type : 'GET'
         // },
    });
});
</script>