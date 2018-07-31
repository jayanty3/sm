<style type="text/css">
  
        .pagination a {
    height: 30px; 
    width: auto; 
    line-height: 0px;
    text-align: center;
    font-size: 16px; 
}

.pagination > li > a, .pagination > li > span {
    padding: 3px;
    line-height: 30px;
    color: #647382;
    background: #f8f8f8;
    border: none;
    margin-right: 10px;
    border-radius: 4px;
}

@media (max-width: 768px) {
    .row .col-md-6 > .pull-right {
        float: none !important;
    }
}

@media (max-width: 768px) {
    .row .col-md-6 > .pull-left {
        float: none !important;
    }
}

</style>

<section class="courses">
                    <div class="container"> 
                        <!--======= TITTLE =========-->
                        <div class="tittle" style="margin-top: -20px;">
                            <h3> Student Profile</h3>
                            
                            <hr>
                             <div class="row">
                              <div class="col-md-12">
                                <div class="pull-right"><?php echo anchor('frontend/auth_login/editindiprofile', 'Edit',["class"=>"btn btn-primary"]); ?></div>
                                 </div>
                               </div>
                  <p>&nbsp;</p>
                             <div class="row">
                              <div class="col-md-12">
                             <div class="pull-right"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Modal_Delete2" >Delete Profile</button></div>
                           </div>
                         </div>
                        </div>

             <?php  if($this->session->flashdata('traill')){ ?> 

<script> swal("Good job!", "Trail class book", "success");</script>
   <?php } ?>


<?php  if($this->session->flashdata('failedd')){ ?> 

<script> 

swal({ 
  title: "Oh Opps!",
   text: "This Class Recently Booked! Contact Admin For Class or Refund money",
    type: "error" 
  },
  function(){
    $('#asds').modal('show');
    $('#print11').click();


});

</script>
   <?php } ?>

   

 <?php  if($this->session->flashdata('payment11')){ 
                                ?> 

<script> //swal("Good job!", "Payment Successful! Please Check Your Mail", "warnn");




swal({ 
  title: "Good job",
   text: "Payment Successful! Please Check Your Mail",
    type: "success" 
  },
  function(){
    $('#asds').modal('show');
    $('#print11').click();


});

 //$('#print11').click();


</script>

 <?php } ?>






                         <script type="text/javascript">
            $(document).ready(function () {
                //$('#succc1').delay(200).addClass('in').fadeOut(3200);
            });
        </script>

                       <div> <h3 class="text-success" id="succc1"></h3></div>
                       <?php if($this->session->flashdata('succ')){?>  
<script> swal("ok", "Updated", "success");</script>
<?php } ?>
                            <!--======= MONTH TITTLE =========-->

                    
                    <?php  $user['user'] = $this->ion_auth->user()->row(); 

                    $user1        = $user['user']->id;
                    $first_name   = $user['user']->first_name;
                    $last_name    = $user['user']->last_name;
                    $email        = $user['user']->email;
                    $city         = $user['user']->state;
                    $country      = $user['user']->countrys;
                    $message      = $user['user']->message;
                    $image        = $user['user']->images;
                    $gender       = $user['user']->gender;
                    $facebook     = $user['user']->facebook;
                    $skype        = $user['user']->skype;
                    $levels       = $user['user']->levels;
                    $level        = explode(",", $levels);
                
               ?>
                        <!--======= RODUCTS =========-->
                        <section class="products"> 

                            <!--======= PRODUCTS ROW =========-->
                            
                          <div class="row">
                              <div class="col-md-12">
                                  <div class=" col-md-10">
                                    
                                        <div class="row">
                                            <div class=" col-xs-6 col-lg-4">
                                                       <div style="margin-top: 20px;"></div>                   
                                                 <ul class="">
                                                    <li class="list-group-item" contenteditable="false">
                                                                      <?php 

                                                                    if($image != "")
                                                                        {
                                                                        //show picture from database
                                                                        $image;
                                                                        }
                                                                        else
                                                                        {
                                                                        //show generic picture
                                                                        $image = "demo.jpg";
                                                                        }
                                                                     ?>
                                                      <img class="" src="<?= base_url();?>uploads/images/<?= $image; ?>" width="100%" height="200" alt=""></li>
                                                </ul>
                                            </div>
                                            
                                            <div class="col-xs-12 col-sm-6 col-lg-8">

                                                <ul class="list-group">
                                                    <li class="list-group-item text-right"><span class="pull-left"><strong class=""><h3>Full Name</h3></strong></span><h3><a href="#"><?= $first_name." ".$last_name ?></a></h3></li>
                                                    
                                                    <?php if($email){ ?>
                                                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Email</strong></span> <?= $email;?></li>
                                                    <?php }?>

                                                    <?php if($skype){ ?>
                                                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Skype</strong></span> <?= $skype; ?></li>
                                                    <?php }?>
                                                    
                                                    <?php if($facebook){ ?>
                                                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Facebook</strong></span> <?= $facebook; ?></li>
                                                    <?php }?>
                                                      
                                                      <?php if($country){ ?>
                                                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Country</strong></span> <?= $country; ?></li>
                                                    <?php }?>
                                                    
                                                    <?php if($city){ ?>
                                                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">City</strong></span> <?= $city; ?></li>
                                                    <?php }?>
                                                    
                                                  
                                                </ul>


                                            </div>
                                        </div> 
                                        <div class="tittle"><center><h3>Your Level</h3></center></div>
                                        <hr>
                                        <?php foreach($level as $l): ?> 
                                        <p>
                                           <div class="alert alert-info col-md-offset-1 col-md-5">
                                                    <strong><?= $l ?></strong> <br>Nisi magna sint amet mollit voluptate.
                                                  </div>
                                       </p>
                                   <?php endforeach ?>                                 
                                  </div>
                              </div>                          
                    </div>  

                     
                    <div class="row">
                     <div  class="col-md-6" style="margin-bottom: 10px;"> 
                          <div class=" pull-right">
                            <a class=" btn btn-primary" href="#profile" data-toggle="tab"><b>Booked class Details</b></a>
                          </div>
                       
                     </div>
                    
                     <div  class="col-md-6 ">
                      <div class="pull-left"><?php echo anchor('home', 'Book a Teacher',["class"=>"btn btn-primary"]); ?></div>
                      </div>
                   </div>
                            <div id="myTabContent" class="tab-content">
                                  <div class="tab-pane fade active in" id="home">
                                  
                                  </div>
                                  <div class="tab-pane fade" id="profile">
                                    <?php $i = 1; $book = Booking::find_by_sql('SELECT * from bookings b left join users u on b.teacher_id = u.id left join calendars c on b.cal_id = c.id left join teachers t on b.teacher_id = t.user_id where b.indi_id ='.$user1); ?>
                                   <div class="row">

                                   <div class="col-md-11 col-md-offset-1"> <p>
                                    <table class="table table-striped table-bordered display" style="width:100%" id="invo2">
                                      <thead>
                                    <tr><th>Year</th><th>Date</th><th>Teacher Name</th><th>Level</th><th>Booked Date</th><th>Booked Time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($book as  $b):  ?>
                                    <tr><td><?= date("Y",strtotime($b->start)); ?></td>
                                      <td><?= date_format($b->date1,'d M Y h:i:a') ?></td>
                                      <td><?= $b->first_name; ?></td>
                                      <td><?= $b->level ; ?></td>
                                      <td><?= date("d-M-Y",strtotime($b->start)); ?>
                                        
                                      </td><td><?= date("H:i",strtotime($b->start)); ?>
                                    </td></tr>
                                    <?php endforeach; ?>
                                   </tbody></table></p></div>
                                  </div>
                        </div>
                     </center>
                    
                       
                         </section>

                       
                     

                    </div>
                </section>

                <!--======= QUOTE =========-->
                <section id="feature">
                   
               </section>
               <p>&nbsp;</p>

               <form method="post" action="<?= site_url('Delete_indi/delete'); ?>">
                <div class="modal fade" id="Modal_Delete2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <strong>Are you sure to delete this Profile?</strong>
                      </div>
                      <div class="modal-footer">
                        
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <input type="submit" name="submit"  value="Yes" class="btn btn-primary">
                      </div>
                    </div>
                  </div>
                </div>
              </form>

              <script type="text/javascript">
$(document).ready(function() {
    $('#invo2').DataTable({

         dom: 'Bfrtip',
        buttons: [
             'excel', 'pdf', 'print'
        ],
        "pagingType": "full",
      

        
    });
});
</script>
