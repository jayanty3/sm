
<!-- TABLE: LATEST ORDERS -->

<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3> <?php $teacher1  = Teacher::count(); ?> <?= $teacher1; ?></h3>

              <p>Teacher</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
           <a href="<?= site_url( 'backend/auth/teachers'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
        
          <div class="small-box bg-green">
            <div class="inner">
              <?php $stuu  = User::find_by_sql('SELECT * from users u left join users_groups ug on u.id = ug.user_id where ug.group_id=3' ); 
              $k= 0; 
                foreach ($stuu as $stt) {
                 $k++;
                }
              ?>
              <h3><?php echo $k; ?><sup style="font-size: 20px"></sup></h3>

              <p>Student</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?= site_url( 'backend/auth/students'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php $center1  = Center::count(); ?> <?= $center1; ?></h3>

              <p>Institute</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
                 <a href="<?= site_url( 'backend/auth/center'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

     <?php   $sub = Booking::find_by_sql('SELECT b.booking_id,b.teacher_id,b.indi_id,c.start,u.id,u.first_name,u.last_name,u.levels,o.price,b.date1 from bookings b 
        left join users u on b.indi_id = u.id 
        left join calendars c on b.cal_id = c.id 
        left join teachers t on t.user_id = b.teacher_id 
        left join order_details as o on o.cal_id = b.cal_id where  b.cancel=1'); ?>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php $cancel1  = count($sub); ?> <?= $cancel1; ?></h3>

              <p>Cancel Class By Teacher</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?= site_url( 'backend/Cancel_class/info1'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo lang('index_heading');?></h3>
              <div id="infoMessage"><h2 class="text-primary"><?php echo $message;?></h2></div>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th><?php echo lang('index_fname_th');?></th>
					<th><?php echo lang('index_lname_th');?></th>
					<th><?php echo lang('index_email_th');?></th>
					<th><?php echo lang('index_groups_th');?></th>
					<th><?php echo lang('index_status_th');?></th>
					<th><?php echo lang('index_action_th');?></th>
                  </tr>
                  </thead>

                  <tbody>
                  	<?php foreach ($users as $user):?>
						<tr>
                    

                    <?php $name = $user->first_name?$user->first_name:($user->email); ?>
				            <td><?php echo htmlspecialchars($name,ENT_QUOTES,'UTF-8');?></td>
				            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
				            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
							<td>
								<?php foreach ($user->groups as $group):?>
									<?php echo anchor("backend/auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
				                <?php endforeach?>
							</td>
							<td><?php echo ($user->active) ? anchor("backend/auth/deactivate/".$user->id, lang('index_active_link'),['class'=>'label label-success']) : anchor("backend/auth/activate/". $user->id, lang('index_inactive_link'),['class'=>'label label-danger']);?></td>
							<td><?php echo anchor("backend/auth/edit_user/".$user->id, 'Edit',['class'=>'btn btn-warning']) ;?>
								</td>

						</tr>
       				<?php endforeach;?>
                                   
                  </tbody>
                </table>
                <?php echo $links;?>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
         <!-- /.modal -->

        <div class="modal fade" id="modal-warning">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Are You Delete User</h4>
              </div>
              <div class="modal-body">
                <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th><?php echo lang('index_fname_th');?></th>
					<th><?php echo lang('index_lname_th');?></th>
					<th><?php echo lang('index_email_th');?></th>
					
					
                  </tr>
                  </thead>
                  <tbody>
                  	
						<tr>
				            <td><?php echo $user->first_name;?></td>
				            <td><?php echo $user->last_name;?></td>
				            <td><?php echo $user->email;?></td>
				        </tr>                  
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary  pull-left" data-dismiss="modal">No</button>
                <?php echo anchor("backend/auth/delete_user/".$user->id, 'Delete',['class'=>'btn btn-success']) ;?>
                </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

           
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        
        <!-- /.col -->
