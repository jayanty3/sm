<div class="row">
        <!-- left column -->
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo lang('deactivate_heading');?></h3>
              <p><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></p>
              
            </div>



<?php echo form_open("backend/auth/deactivate/".$user->id);?>

     <div class="box-body">
                <div class="form-group ">
  	<?php echo lang('deactivate_confirm_y_label', 'confirm');?>
    <input type="radio" name="confirm" value="yes" checked="checked" class="radio radio-inline" />
    <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
    <input type="radio" name="confirm" value="no" class=" radio radio-inline" />
  </div>

  <?php echo form_hidden($csrf); ?>
  <?php echo form_hidden(array('id'=>$user->id)); ?>
 </div>

<div class="box-footer">
  <p><?php echo form_submit('submit', lang('deactivate_submit_btn'),['class'=>'btn btn-flat btn-primary']);?></p>

<?php echo form_close();?>
</div>
</div>
         </div>