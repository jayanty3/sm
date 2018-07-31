
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo "Booked Class By Student";?></h3>
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
                      
                     
                      <th>Student Email</th>
                      <th>Student Name</th>
                       <th>Teacher Name</th>
                        <th>Booked Date</th>
                       <th>Class Date</th>
                      
                      <th>Price</th>
                      
                    </tr>
                  </thead>
                </table>
              </div>

            </div>

           

          </div>
          
        


    

   


  




<script type="text/javascript">
  
  var manageMemberTable;

$(document).ready(function() {
  manageMemberTable = $("#manageMemberTable").DataTable({
    'ajax': '<?php echo site_url('backend/Cancel_class/fetch1'); ?>',
    'orders': []
  }); 
});


</script>

