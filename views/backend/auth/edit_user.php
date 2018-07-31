
<div class="row">
        <!-- left column -->
        <div class="col-md-3"></div>
        <div class="col-md-7">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo lang('edit_user_heading');?></h3>
              <p><?php echo lang('edit_user_subheading');?></p>
              <div id="infoMessage"><?php echo $message;?></div>
            </div>



<?php echo form_open(uri_string());?>
     
     <div class="box-body">

      <div class="form-group">
            <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
      </div>

      <div class="form-group">
            <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
      </div>

      <!-- <div class="form-group">
            <?php echo lang('edit_user_company_label', 'company');?> <br />
            <?php echo form_input($company);?>
      </div>

      <div class="form-group">
            <?php echo lang('edit_user_phone_label', 'phone');?> <br />
            <?php echo form_input($phone);?>
      </div> -->

      <div class="form-group">
            <?php echo lang('edit_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
      </div>

      <div class="form-group">
            <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
            <?php echo form_input($password_confirm);?>
      </div>
    
    
      <!-- <?php if ($this->ion_auth->is_admin()): ?>

          <h3><?php echo lang('edit_user_groups_heading');?></h3>
         <div class="col-md-3">
          <?php foreach ($groups as $group):?>
              <label class="checkbox">


              <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                  }
              ?>
            <div class="checkbox-inline">  <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
              <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
            </div>
              </label>
          <?php endforeach?>

      <?php endif ?> -->

      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>
    </div>
      </div>
    
    <div class="box-footer">
      <?php echo form_submit('submit', lang('edit_user_submit_btn'),['class'=>'btn btn-flat btn-primary']);?>
    </div>

<?php echo form_close();?>
