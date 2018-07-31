
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo "Deleted Student";?></h3>
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

                

                <br /> <br />

                <table class="table table-bordered" id="manageMemberTable">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>Name</th>
                      <th>Email</th>
                      
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                </table>
              </div>

            </div>

           

          </div>
          
        


    

   


  

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
    'ajax': '<?php echo site_url('backend/Del_student/fetch'); ?>',
    'orders': []
  }); 
});







function removeMember(id = null) 
{
  if(id) {
    $("#removeMemberBtn").unbind('click').bind('click', function() {
      $.ajax({
        url: '<?php echo site_url('backend/Del_student/remove'); ?>' + '/' + id,
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

