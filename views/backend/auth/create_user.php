 <div class="row">
        <!-- left column -->
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo lang('create_user_heading');?></h3>
              <p><?php echo lang('create_user_subheading');?></p>
              <div id="infoMessage"><?php echo $message;?></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open("backend/auth/create_user");?>
              <div class="box-body">
                <div class="form-group">
                  <?php echo lang('create_user_fname_label', 'first_name');?> <br />
                  <input type="text" class="form-control" name="first_name" id="exampleInputEmail1" placeholder="First Name">
                </div>
                <div class="form-group">
                  <?php echo lang('create_user_lname_label', 'last_name');?> <br />
                  <input type="text" class="form-control" name="last_name" id="exampleInputPassword1" placeholder="Last Name ">
                </div>
                                <?php
                      if($identity_column!=='email') {
                          echo '<p>';
                          echo lang('create_user_identity_label', 'identity');
                          echo '<br />';
                          echo form_error('identity');
                          echo form_input($identity);
                          echo '</p>';
                      }
                      ?>
                <div class="form-group">
                 <?php echo lang('create_user_company_label', 'company');?>

                  <input type="text" class="form-control" name="company" id="exampleInputPassword1" placeholder="Company">
                </div>
                <div class="form-group">
                  <?php echo lang('create_user_email_label', 'email');?> <br />
                  <input type="email" class="form-control" name="email" id="exampleInputPassword1" placeholder="Email">
                </div>
                <div class="form-group">
                  <?php echo lang('create_user_phone_label', 'phone');?> <br />
                  <input type="text" class="form-control" name="phone" id="exampleInputPassword1" placeholder="phone">
                </div>
                <div class="form-group">
                  <?php echo lang('create_user_password_label', 'password');?> <br />
                  <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                  <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
                  <input type="password" class="form-control" name="password_confirm" id="exampleInputPassword1" placeholder="Password Confirm">
                </div>
                
                
              </div>
                 <div class="box-footer">          
               
                <?php echo form_submit('submit', lang('create_user_submit_btn'),['class'=>'btn btn-flat btn-primary']);?>
              </div>
            </form>
          </div>

