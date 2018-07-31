
<!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo "Activate Users";?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin" id="active-table">
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
                    <?php $users = User::find_by_sql('select u.id entity_id ,u.*,c.institute_name from users_groups ug left join users u on ug.user_id=u.id left join teachers t on u.id=t.user_id left join centers c on u.id=c.user_id where ug.group_id in (4,5) and u.active=0'); ?>
                  <?php  //echo "<pre>"; print_r($users);exit; ?>
                   
 
                    <?php foreach ($users as $user):?>
            <tr>
                    <?php $name = $user->first_name?$user->first_name:$user->institute_name; ?>
                    <td><?php echo htmlspecialchars($name,ENT_QUOTES,'UTF-8');?></td>
                    <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
                    <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
              
              <td><?php echo ($user->active) ? anchor("backend/auth/deactivate/".$user->id, lang('index_active_link'),['class'=>'label label-success']) : anchor("backend/price/acti/". $user->entity_id, lang('index_inactive_link'),['class'=>'label label-danger']);?></td>
              <td><?php echo anchor("backend/auth/edit_user/".$user->entity_id, 'Edit',['class'=>'btn btn-warning']) ;?>
                </td>

            </tr>
              <?php endforeach;?>
                                   
                  </tbody>
                </table>
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
    $('#active-table').DataTable({
      
    });
});
</script>