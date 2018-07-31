
<!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
                        <div class="messages"></div>

            <div class="box-header with-border">
              <h3 class="box-title"><?php echo "Teachers";?></h3>
              <div id="infoMessage"><h2 class="text-primary"><?php echo $message;?></h2></div>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <?php $users = User::find_by_sql('SELECT *   FROM teachers    JOIN users  ON users.id= teachers.user_id ORDER BY teachers.id DESC'); ?> 
            
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin" id="teach-table">
                  <thead>
                  <tr>
          <th><?php echo 'Full Name';?></th>
					
					<th><?php echo lang('index_email_th');?></th>
          <th><?php echo 'Image';?></th>
          <th><?php echo 'Video';?></th>
					<td><?php echo '<b>Resume</b>';  ?></td>
					<th><?php echo lang('index_status_th');?></th>
					<th><?php echo lang('index_action_th');?></th>
                  </tr>
                  </thead>
                  <tbody>


                  	<?php foreach ($users as $user):  


                      if($user->pic != ''){

                             $pic = $user->pic;
                    }else{

                         $pic = "demo.jpg";
                    }  

                  ?>

                      
						<tr>
				            <td><?php echo htmlspecialchars($user->first_name.' '.$user->last_name,ENT_QUOTES,'UTF-8');?></td>
				            
				            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
                    <td><image src="<?php echo base_url('uploads/images/').$pic; ?>" width="50px" height="50px"></td>
                      <td>
                                        <?php      $vedio = $user->youtube_url; ?>

                                            <a href="https://www.youtube.com/watch?v=<?= $vedio; ?>" target="_blank"> Video</a>

                                                     

                                                        
                                      </td>
							     <td>
                    
                    <a href="<?php echo base_url('uploads/').$user->userfile; ?>" target="_blank">Resume </a></td>
							<td><?php echo ($user->active) ? anchor("backend/auth/deactivate/".$user->id, lang('index_active_link'),['class'=>'label label-success']) : anchor("backend/auth/activate/". $user->id, lang('index_inactive_link'),['class'=>'label label-danger']);?></td>
							<td>
                   <button type="button" name="update" id='' onclick="editMember('<?= $user->id ?>')" class="btn btn-warning  bbbt" data-toggle='modal' data-target= '#editMemberModal'>Edit</button>&nbsp 
								</td>

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
                <?php echo anchor("backend/auth/delete_user2/".$user->id, 'Delete',['class'=>'btn btn-success']) ;?>
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

        

 <div class="modal fade" tabindex="-1" role="dialog" id="editMemberModal">
   <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Member</h4>
      </div>
      <form method="post" action="<?php echo site_url('backend/auth/edit_teacher'); ?>" id="editForm">
       <div class="modal-body"> 

        <div class="form-group">
          <label for="contact_name">First Name *  </label>
          <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
        </div>

        <div class="form-group">
          <label for="email">Email * </label>
          <input type="text" class="form-control" id="email" name="email" placeholder="Email">
        </div>
       
        <div class="form-group">
          <label for="institute_name">Skype Id  *</label>
          <input type="text" class="form-control" id="skype" name="skype" placeholder="skype">
        </div>
        <div class="form-group">
          <label for="mobile">Mobile  </label>
          <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile">
        </div>
        <div class="form-group">
          <label for="specilization">Specilization *</label>
          <input type="text" class="form-control" id="specilization" name="specilization" placeholder="Specilization">
        </div>
        





       </div>
        
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>



<script type="text/javascript">
  
  
 // var id = $(".bbbt").attr('id');
         
          //Do whatever the edit function should do with the id     

function editMember(id) 
{


  if(id) {

 

    $("#editForm")[0].reset();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    $('.text-danger').remove();

    $.ajax({
      url: '<?php echo site_url('backend/auth/getSelectedMemberInfo1/');?>'+id,
      type: 'post',
      dataType: 'json',
      success:function(response) {

         $("#first_name").val(response.first_name);
        $("#email").val(response.email);
        $("#skype").val(response.skype);
        $("#mobile").val(response.mobile);
        $("#specilization").val(response.specilization);
       

        $("#editForm").unbind('submit').bind('submit', function() {
          
          var form = $(this);

          $.ajax({
            url: form.attr('action') + '/' + id,
            type: 'post',
            data: form.serialize(),
            dataType: 'json',
            success:function(response) {

              
              if(response.success === true) {


                $(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
                '</div>');

                // hide the modal
                $("#editMemberModal").modal('hide');

                // update the manageMemberTable
               

              } else {
                $('.text-danger').remove()
                if(response.messages instanceof Object) {
                  $.each(response.messages, function(index, value) {
                    var id = $("#"+index);

                    id
                    .closest('.form-group')
                    .removeClass('has-error')
                    .removeClass('has-success')
                    .addClass(value.length > 0 ? 'has-error' : 'has-success')                   
                    .after(value);                    

                  });
                } else {
                  $(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                    '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                  '</div>');
                }
              }
            } // /succes
          }); // /ajax

          return false;
        });
        
      }
    });
  }
  else {
    alert('error');
  }
}




</script>












<script type="text/javascript">
$(document).ready(function() {
    $('#teach-table').DataTable({
      

    

    "order": []
        
    });
});
</script>