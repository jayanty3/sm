


<div class="row">
        <!-- left column -->
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo lang('edit_group_heading');?></h3>
              <p><?php echo lang('edit_group_subheading');?></p>
              <div id="infoMessage"><?php echo $message;?></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             <?php echo form_open(current_url());?>

              <div class="box-body">
                <div class="form-group">
                  <?php echo lang('edit_group_name_label', 'group_name');?>
                  <?php echo form_input($group_name);?>
                </div>
                <div class="form-group">
                  <?php echo lang('edit_group_desc_label', 'description');?>  <br />
                  <?php echo form_input($group_description);?>
                </div>
                      
                
                
              </div>
                 <div class="box-footer">
              <?php echo form_submit('submit', lang('edit_group_submit_btn'),['class'=>'btn btn-flat btn-primary']);?>
              </div>
            </form>
          </div>
         </div>