
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo "Subscription";?></h3>
              <div id="infoMessage"><h2 class="text-primary"></h2></div>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">

                <div class="messages"></div>

                <button class="btn btn-default pull pull-right" data-toggle="modal" data-target="#addMember" onclick="addMemberModel()">
                  Add Member
                </button>

                <br /> <br />

                <table class="table table-bordered" id="manageMemberTable">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>Email</th>
                      <th>Date</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                </table>
              </div>

            </div>

           

          </div>
          
        


    

   

  <!-- add member -->
   <div class="modal fade" tabindex="-1" role="dialog" id="addMember">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Add Member</h4>
        </div>
        <form method="post" action="<?php echo site_url('backend/sub_list/create'); ?>" id="createForm">
          <div class="modal-body">        
            <div class="form-group">
              <label for="email_id">Email * </label>
              <input type="text" class="form-control" id="email_id" name="email_id" placeholder="Email">
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  <!-- /add mmebers -->

  <!-- edit member -->
  <div class="modal fade" tabindex="-1" role="dialog" id="editMemberModal">
   <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Member</h4>
      </div>
      <form method="post" action="<?php echo site_url('backend/sub_list/edit'); ?>" id="editForm">
       <div class="modal-body">        
        <div class="form-group">
          <label for="email_id">Email * </label>
          <input type="text" class="form-control" id="email_id1" name="email_id1" placeholder="Email">
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
  <!-- /edit mmebers -->

<!-- removeMember -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>Do you really want to remove ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="removeMemberBtn" class="btn btn-primary">Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
</div>

<!-- /.modal -->
  <!-- removeMember -->


<script type="text/javascript">
  
  var manageMemberTable;

$(document).ready(function() {
  manageMemberTable = $("#manageMemberTable").DataTable({
    'ajax': '<?php echo site_url('backend/sub_list/fetch'); ?>',
    'orders': []
  }); 
});

function addMemberModel() 
{
  $("#createForm")[0].reset();

  //remove textdanger
  $(".text-danger").remove();
  // remove form-group
  $(".form-group").removeClass('has-error').removeClass('has-success');

  $("#createForm").unbind('submit').bind('submit', function() {
    var form = $(this);

    // remove the text-danger
    $(".text-danger").remove();

    $.ajax({
      url: form.attr('action'),
      type: form.attr('method'),
      data: form.serialize(), // /converting the form data into array and sending it to server
      dataType: 'json',
      success:function(response) {
        if(response.success === true) {
          $(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
            '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
          '</div>');

          // hide the modal
          $("#addMember").modal('hide');

          // update the manageMemberTable
          manageMemberTable.ajax.reload(null, false); 

        } else {
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
      }
    }); 

    return false;
  });

}

function editMember(id = null) 
{
  if(id) {

    

    $("#editForm")[0].reset();
    $('.form-group').removeClass('has-error').removeClass('has-success');
    $('.text-danger').remove();

    $.ajax({
      url: '<?php echo site_url('backend/sub_list/getSelectedMemberInfo/');?>'+id,
      type: 'post',
      dataType: 'json',
      success:function(response) {
        
        $("#email_id1").val(response.email_id);
       

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
                manageMemberTable.ajax.reload(null, false); 

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



function removeMember(id = null) 
{
  if(id) {
    $("#removeMemberBtn").unbind('click').bind('click', function() {
      $.ajax({
        url: '<?php echo site_url('backend/sub_list/remove'); ?>' + '/' + id,
        type: 'post',       
        dataType: 'json',
        success:function(response) {
          if(response.success === true) {
            $(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
            '</div>');

            // hide the modal
            $("#removeMemberModal").modal('hide');

            // update the manageMemberTable
            manageMemberTable.ajax.reload(null, false); 

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
    });
  }
}
</script>

