
<div class="row">
        <!-- left column -->
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo lang('create_group_heading');?></h3>
              <p><?php echo lang('create_group_subheading');?></p>
              <div id="infoMessage"><?php echo $message;?></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             <?php echo form_open("backend/auth/create_group");?>

              <div class="box-body">
                <div class="form-group">
                  <?php echo lang('create_group_name_label', 'group_name');?> <br />
                  <input type="email" class="form-control" name="group_name" id="exampleInputEmail1" placeholder="Group Name">
                </div>
                <div class="form-group">
                  <?php echo lang('create_group_desc_label', 'description');?>  <br />
                  <input type="text" class="form-control" name="description" id="exampleInputPassword1" placeholder="Description ">
                </div>
                      
                
                
              </div>
                 <div class="box-footer">
              <?php echo form_submit('submit', lang('create_group_submit_btn'),['class'=>'btn btn-flat btn-primary']);?>
              </div>
            </form>
          </div>
         </div>