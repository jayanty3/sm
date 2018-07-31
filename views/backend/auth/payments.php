
<!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo "Payments";?></h3>
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


                <table class="table table-responsive table-bordered" id="book-table">
                  <thead>
                  <tr>
                    
					<th>Name</th>
					<th>Email</th>
					
					<th>Payment</th>
          <th>Txn Id</th>
					<th>Date Payments</th>
          <th>Download</th>
                  </tr>
                  </thead>
                  <tbody>

        
 

                	
						<tr>
				            
				            <td></td>
				            <td></td>
							
							<td></td>
							<td></td>
              <td></td>

						</tr>
       		
                                   
                  </tbody>
                </table>
               
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
         <!-- /.modal -->

        
        <!-- /.modal -->

            
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        
        <!-- /.col -->


<script type="text/javascript">
$(document).ready(function() {
    $('#book-table').DataTable({

      "ordering": true,

    

    "order": [[0, 'desc']],
      
        "ajax": {
            url : "<?php echo site_url("backend/payments/payment") ?>",
            type : 'GET'
        },
    });
});
</script>