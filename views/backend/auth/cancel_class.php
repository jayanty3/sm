
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo "Cancel class by Teacher";?></h3>
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
                      <th>Teacher Email</th>
                      <th>Teacher Name</th>
                      <th>Student Email</th>
                      <th>Student Name</th>
                      
                      <th>Price</th>
                      
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
    'ajax': '<?php echo site_url('backend/Cancel_class/fetch'); ?>',
    'orders': []
  }); 
});


</script>

