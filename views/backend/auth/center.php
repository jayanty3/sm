<!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="messages"></div>
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo "Center";?></h3>
              <div id="infoMessage"><h2 class="text-primary"><?php echo $message;?></h2></div>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin" id="center-table">
                  <thead>
                  <tr>
                    <th><?php echo 'Institute Name';?></th>
          <th><?php echo 'Contact Name';?></th>
          
          <td><?php echo '<b>Skype</b>';  ?></td>
          <td><?php echo '<b>Website</b>';  ?></td>
          <th><?php echo lang('index_email_th');?></th>
          <th><?php echo lang('index_status_th');?></th>
          <th><?php echo lang('index_action_th');?></th>
                  </tr>
                  </thead>
                  <tbody>

<?php $users = User::find_by_sql('SELECT *   FROM centers    JOIN users  ON users.id= centers.user_id ORDER BY centers.id DESC'); 

 //echo "<pre>"; print_r($users); exit; 
 ?>

                    <?php foreach ($users as $user):?>

            <tr>
             <td><?php echo htmlspecialchars($user->institute_name,ENT_QUOTES,'UTF-8');?></td>
                    <td><?php echo htmlspecialchars($user->contact_name,ENT_QUOTES,'UTF-8');?></td>
                     <td><?php echo htmlspecialchars($user->skype_id,ENT_QUOTES,'UTF-8');?></td>
                     <td><?php echo htmlspecialchars($user->website,ENT_QUOTES,'UTF-8');?></td>
                    <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>

                  
              
              <td><?php echo ($user->active) ? anchor("backend/auth/deactivate/".$user->id, lang('index_active_link'),['class'=>'label label-success']) : anchor("backend/auth/activate/". $user->id, lang('index_inactive_link'),['class'=>'label label-danger']);?></td>
              <td>

                <button type="button" name="update" id='' onclick="editMember('<?= $user->id ?>')" class="btn btn-warning bbbt" data-toggle='modal' data-target= '#editMemberModal'>Edit</button>

               &nbsp &nbsp&nbsp


                <?php //echo anchor("backend/auth/user_by_id/".$user->id, 'Delete',['data-toggle'=>'modal','data-target'=>'#modal-warning','class'=>'btn btn-danger']); ?></td>

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
              <div class="modal-footer">
                <button type="button" class="btn btn-primary  pull-left" data-dismiss="modal">No</button>
                <?php echo anchor("backend/auth/delete_user1/".$user->id, 'Delete',['class'=>'btn btn-success']) ;?>
                </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        

 <div class="modal fade" tabindex="-1" role="dialog" id="editMemberModal">
   <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Member</h4>
      </div>
      <form method="post" action="<?php echo site_url('backend/auth/edit_center'); ?>" id="editForm">
       <div class="modal-body"> 




        <div class="form-group">
          <label for="email">Email * </label>
          <input type="text" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
          <label for="contact_name">Contact Name  </label>
          <input type="text" class="form-control" id="contact_name" name="contact_name" placeholder="Contact Name">
        </div>
        <div class="form-group">
          <label for="institute_name">Institute Name  *</label>
          <input type="text" class="form-control" id="institute_name" name="institute_name" placeholder="Institute Name">
        </div>
        <div class="form-group">
          <label for="email_id">Skype Id  </label>
          <input type="text" class="form-control" id="skype_id" name="skype_id" placeholder="Skype Id">
        </div>
        <div class="form-group">
          <label for="email_id">Mobile </label>
          <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile">
        </div>
        <div class="form-group">
          <label for="email_id">Website  </label>
          <input type="text" class="form-control" id="website" name="website" placeholder="Website">
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
      url: '<?php echo site_url('backend/auth/getSelectedMemberInfo/');?>'+id,
      type: 'post',
      dataType: 'json',
      success:function(response) {
        
        $("#email").val(response.email);
        $("#contact_name").val(response.contact_name);
        $("#institute_name").val(response.institute_name);
        $("#skype_id").val(response.skype_id);
        $("#mobile").val(response.mobile);
        $("#website").val(response.website);
       

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





        <!-- /.col -->
<script type="text/javascript">
$(document).ready(function() {
   var table = $('#center-table').DataTable({

    "ordering": false,

    "pagingType": "full", 

    "order": []
    

    
      
    });
});
</script>