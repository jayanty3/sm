 <div class="sub-banner">
                <div class="container">
                    <h2>Registration</h2>
                    <ul class="links">
                        <li><a href="#.">Home</a>/</li>
                        <li><a href="#.">Registration</a></li>
                    </ul>
                </div>
            </div>

        

              <?php $user['user'] = User::find_by_id($this->session->userdata('user_id'));?>

               <?php foreach($user as $u); 
                {  $user_id    = $u->id;
                    $username   = $u->username;
                    $email      = $u->email;
                    
                }
                
               ?>
                  <?php $password = 12345678 ; ?>
               <?php $center['center'] = Center::find_by_user_id($user_id);?>

                                 <?php //echo "<pre>";
                                //  print_r($center);exit; ?>

                                <?php foreach($center as $u) 
                {
                        $fee             = $u->fee_insti;
                        $mobile          = $u->mobile;
                        $skype_id        = $u->skype_id;
                        $contact_name    = $u->contact_name;
                        $institute_name  = $u->institute_name;
                        $website         = $u->website;

}
               ?>




    

            <div class="content"> 

                <!--======= INTRESTED =========-->
                <section class="courses">
                    <div class="container"> 
                        <!--======= TITTLE =========-->
                        <div class="tittle">
                            <h3> Registration</h3>

                            <h4 class=" text-danger"><?=$this->session->flashdata('fail');?></h4>
                            <h4 class=" text-danger">
 <input type="hidden" name="onload" id="onload" value="<?php  if($this->session->flashdata('succ1') == TRUE)
                            {
                                echo '1';
                            } else { echo '0';}   ?>">

                              <?php 
                            if($this->session->flashdata('succ') == TRUE)
                            { //echo 'hi';die;
                                //echo '<script> $("#onload").val("1");</script>';
                            }


                            ?>
                            
                            <hr>
                        </div>


                       
<center><?php echo validation_errors(); ?></center>
                        <!--======= MONTH TITTLE =========-->
                      

                        <!--======= RODUCTS =========-->
                        <section class="products"> 

                            <!--======= PRODUCTS ROW =========-->
                            
                          
                           <!--  <form class="form-horizontal"> -->
    <?=  form_open_multipart('frontend/auth_login/centerpaid',['class'=>'form-horizontal','id'=>'form1']); ?>
  <fieldset>
    <legend><center><button class=" btn btn-primary " >Foreign Teacher</button></center>
        <br>
         <h3><?= $this->session->flashdata('fail'); ?></h3></legend>


    <div class="form-group">
      <label for="inputEmail" class="col-lg-3 control-label"> Institute Name<b>*</b></label>
      <div class="col-lg-9">
        <input type="text" class="form-control"  placeholder="Enter Your Institute Name" name="institute_name" value="<?= set_value('institute_name',$institute_name)?>">
      </div>
       <center><?= form_error('institute_name'); ?></center>
    </div>

   <div class="form-group">
      <label for="inputEmail" class="col-lg-3 control-label"> Contact Name<b></b></label>
      <div class="col-lg-9">
        <input type="text" class="form-control"  placeholder="Enter Your Contact Name" name="contact_name" value="<?= set_value('contact_name',$contact_name)?>">
      </div>
       <center><?= form_error('contact_name'); ?></center>
    </div>

    <div class="form-group">
      <label for="inputEmail" class="col-lg-3 control-label"> Email Id<b>*</b></label>
      <div class="col-lg-9">
        <input type="text" class="form-control"  placeholder="Enter Your Email Id" name="email" value="<?= set_value('email',$email)?>">
      </div>
       <center><?= form_error('email'); ?></center>
    </div>

    <div class="form-group">
      <label for="inputEmail" class="col-lg-3 control-label"> Skype Id<b></b></label>
      <div class="col-lg-9">
        <input type="text" class="form-control"  placeholder="Enter Your Skype Id" name="skype_id" value="<?= set_value('skype_id', $skype_id)?>">
      </div>
       <center><?= form_error('skype_id'); ?></center>
    </div>

     <div class="form-group">
      <label for="inputEmail" class="col-lg-3 control-label">Mobile Number</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="inputEmail" placeholder="0125486555" name="mobile" value="<?= set_value('mobile',$mobile)?>">
              </div>
              <center><?= form_error('mobile'); ?></center>
     </div>


     <div class="form-group">
      <label for="inputEmail" class="col-lg-3 control-label"> Website<b></b></label>
      <div class="col-lg-9">
        <input type="text" class="form-control"  placeholder="Enter Your Website" name="website" value="<?= set_value('website',$website)?>">
      </div>
       <center><?= form_error('website'); ?></center>
    </div>
   
     <div class="form-group">
      <label for="inputEmail" class="col-lg-3 control-label"> Password<b></b></label>
        <div class="col-lg-9">
        <input type="password" class="form-control" id="exampleInputAmount" placeholder="Password" name="cpass" value="<?= set_value('cpass',$password)?>">
        </div>
      <center><?= form_error('cpass'); ?></center>
  </div>
  <div class="form-group">
      <label for="inputEmail" class="col-lg-3 control-label">Confirm Password<b></b></label>
        <div class="col-lg-9">
        <input type="password" class="form-control" id="exampleInputAmount1" placeholder="Password Confirm" name="password_confirm" value="<?= set_value('password_confirm',$password)?>">
        </div>
      <center><?= form_error('password_confirm'); ?></center>
  </div>

<?php $enb = $this->session->userdata('saleId');
        if($enb == NULL)
        {
            $st1 = 0;
        }
        else
        {
          $st1 = 1;
        }

        ?>
    <script type="text/javascript">
      $(document).ready(function(){

         $("#link1").click(function(){
          $('#dis').prop('disabled', true);
              
        });
          $("#link2").click(function(){
          $('#dis').prop('disabled', true);
              
        });

        if($('#link1').is(':checked'))
        {
          if((<?= $st1?>)== 1)
          {
             $('#dis').prop('disabled', false);
              
          }
          else
          {
            $('#dis').prop('disabled', true);
              
          }
        }

        if($('#link2').is(':checked'))
        {
          if((<?= $st1?>)== 1)
          {
             $('#dis').prop('disabled', false);
              
          }
          else
          {
            $('#dis').prop('disabled', true);
              
          }
        }
        
          
      });


    </script>


          
    </div>
  <br>
        <p>&nbsp;</p>
        <div class="form-group">
        <center>
            <label class="radio-inline" for="Radios_Apple">
                      <input type="radio" name="fee" id="link2" value="Monthly Plan" class="link1"  <?php 
    echo set_radio('fee'); ?>  <?php if($fee == 'Monthly Plan') { echo 'checked'; } ?>>
                      Monthly Plan
                    </label>
                    <label class="radio-inline" for="Radios_Orange">
                      <input type="radio" name="fee" id="link1" value="Yearly Plan" class="link2"  <?php 
    echo set_radio('fee'); ?> <?php if($fee == 'Yearly Plan') { echo 'checked'; } ?>>
                      Yearly Plan
                    </label>

                    <?php $validi = validation_errors();
                          if($validi == NULL)
                        {
                            echo "<script>alert('All field are filled corrected now you can pay now!'); </script>";
                        }
                        

           ?>

<script type="text/javascript">$(function () {

    $(".div1,.div2").hide();
    
    $(".link1, .link2").bind("click", function () {

      $(".div1, .div2").hide();        
        
      if ($(this).attr("class") == "link1")
      {
        $(".div1").show();
      }
      else 
      { 
        $(".div2").show();
      }
    });

});</script>


<script type="text/javascript">
     $(document).ready(function(){
    if($('#link1').is(':checked'))
    {
      $('.div2').show();
    }
    if($('#link2').is(':checked'))
    {
      $('.div1').show();
    }
  });
  </script>


       
        </center>

        <center><?= form_error('fee'); ?></center> 
    </div>
    <div   class=" col-md-offset-9 col-lg-3 " >
            <div class='div1' >
            <!-- <button type="button"  class="btn btn-primary  pull-left" >Pay Now</button> -->
           

            <a href="#." data-toggle="modal" data-target="#pay2" class="btn btn-primary abc"><b class="checkbox4"> Pay Now</b> </a>
            </div>
           </div>

           <div   class="col-md-offset-9 col-lg-3 " >
            <div class='div2' >
            <!-- <button type="button"  class="btn btn-primary  pull-left" >Pay Now</button> -->
            
            <a href="#." data-toggle="modal" data-target="#pay3" class="btn btn-primary abc"><b class="checkbox4"> Pay Now</b> </a>

            </div>
           </div>


   

     
                                              <div >
                                                    <label class="col-md-offset-4">
                                                    <input type="checkbox" name="agree" id="terms" value='1' checked>&nbsp;I have read and agree to the Terms and Conditions and Privacy Policy
                                                    </label>

                                              </div>
                                              <center><?= form_error('agree'); ?></center>
                                        



  
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <div class="row">
          <div class="col-md-5 ">
<?= anchor('frontend/auth_login/main', 'Cancel',['class'=>'btn btn-info pull-right']);?> 
          </div>
          <div class=" col-md-2">
          <input type="submit" class="btn btn-primary pull-left" name="Submit" id="dis"  value="upload">
          </div>
        </div>
      </div>
    </div>
  </fieldset>
<?= form_close();?>
                            

                                        
                         </section>
  
    
     


  


        <?php $user['user'] = User::find_by_id($this->session->userdata('user_id'));?>

               <?php foreach($user as $u); 
                {  $user_id    = $u->id;
                    $name   = $u->username;
                    $name1      = $u->email;
                    
                }
                
               ?>




                                        
                         </section>

           
                     






<div id="pay2" class="modal fade" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top: 100px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><img src="<?=base_url(); ?>assets/front/images/cut.png" width="20px" height="20px"></button>
        <p>
          
        </div>
        <?php $fee = Fee::find_by_fee_id(1); ?>

        <div class="modal-body">
          <div class="row">
            <!--======= CONTACT FORM =========-->
            
            <div class="col-md-12">
              <div class="contact-form">
                <p class="notice error"><?= $this->session->flashdata('error_msg') ?></p><br/>
                <p class="notice error"><?= $this->session->flashdata('success_msg') ?></p><br/>
                <form method="post" class="form-horizontal" role="form" action="<?= base_url() ?>Paypal_center/create_payment_with_paypal">
                  <fieldset>
                    <table class="table table-striped table-responsive">
                      <tr>
                        <th>Name:</th>
                        <td><?php if($name === ' '){echo $name1;}else{echo $name;};?></td>
                      </tr>
                      <tr>
                        <th>Payments:</th>
                        <td><?=$fee->monthly_price;?></td>
                      </tr>
                    </table>
                    <input title="item_name" name="item_name" type="hidden" value="Teachers Payments">
                    <input title="item_number" name="item_number" type="hidden" value="1">
                    <input title="item_description" name="item_description" type="hidden" value="Portal for Teachers">
                    <input title="item_tax" name="item_tax" type="hidden" value="1">
                    <input title="item_price" name="item_price" type="hidden" value="<?=$fee->monthly_price;?>">
                    <input title="details_tax" name="details_tax" type="hidden" value="0">
                    <input title="details_subtotal" name="details_subtotal" type="hidden" value="<?=$fee->monthly_price;?>">
                    <div class="form-group">
                                  <div class="col-md-12">
                                   <center> <button  type="submit" class="btn btn-primary" >Pay with Paypal</button></center>
                                 </div>
                               </div>
                        
                  </fieldset>
                </form>
              </div>
            </div>
            
            
          </div>
          <!--======= CONTACT =========-->
        </div>
        


        <div class="modal-footer">
          
          <button type="button" class=" btn-danger btn-xs" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>







  <div id="pay3" class="modal fade" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top: 100px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><img src="<?=base_url(); ?>assets/front/images/cut.png" width="20px" height="20px"></button>
        <p>
          
        </div>
        <?php $fee = Fee::find_by_fee_id(1); ?>

        <div class="modal-body">
          <div class="row">
            <!--======= CONTACT FORM =========-->
            
            <div class="col-md-12">
              <div class="contact-form">
                <p class="notice error"><?= $this->session->flashdata('error_msg') ?></p><br/>
                <p class="notice error"><?= $this->session->flashdata('success_msg') ?></p><br/>
                <form method="post" class="form-horizontal" role="form" action="<?= base_url() ?>Paypal_center/create_payment_with_paypal">
                  <fieldset>
                    <table class="table table-striped table-responsive">
                      <tr>
                        <th>Name:</th>
                        <td><?php if($name === ' '){echo $name1;}else{echo $name;};?></td>
                      </tr>
                      <tr>
                        <th>Payments:</th>
                        <td><?=$fee->yearly_price;?></td>
                      </tr>
                    </table>
                    <input title="item_name" name="item_name" type="hidden" value="Teachers Payments">
                    <input title="item_number" name="item_number" type="hidden" value="1">
                    <input title="item_description" name="item_description" type="hidden" value="Portal for Teachers">
                    <input title="item_tax" name="item_tax" type="hidden" value="1">
                    <input title="item_price" name="item_price" type="hidden" value="<?=$fee->yearly_price;?>">
                    <input title="details_tax" name="details_tax" type="hidden" value="0">
                    <input title="details_subtotal" name="details_subtotal" type="hidden" value="<?=$fee->yearly_price;?>">
                    <div class="form-group">
                       <div class="form-group">
                                  <div class="col-md-12">
                                   <center> <button  type="submit" class="btn btn-primary" >Pay with Paypal</button></center>
                                 </div>
                               </div>
                    </div>
                        
                  </fieldset>
                </form>
              </div>
            </div>
            
            
          </div>
          <!--======= CONTACT =========-->
        </div>
        


        <div class="modal-footer">
          
          <button type="button" class=" btn-danger btn-xs" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>






     <div class="modal fade bs-example-modal-lg" tabindex="-1" data-backdrop="false" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"  id="asds" style="margin-top: 110px;">
     

    <div class="modal-dialog">

      
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          
        </div>
        <div class="modal-body">
          <div class="mailchimp">
                    <div id="mc_embed_signup">
           <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            
            <th>Email</th>
            <th>Payer Mail</th>
            <th>Product</th>
            <th>Invoice #</th>
            
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            
            <td><?= $this->session->userdata('email');?></td>
            <td><?= $this->session->userdata('PayerMail');?></td>
            <td>Online class</td>
            <td><?= $this->session->userdata('saleId');?></td>
            <td><?= $this->session->userdata('Subtotal');?></td>
          </tr>
          
          </tbody>
        </table>
      </div>
      
    </div> 
   

    <div class="row">
       <!-- accepted payments column -->
       <div class="col-xs-6">
        <p class="lead">Payment Methods:</p>
       
        <img src="<?= base_url();?>assets/admin/dist/img/credit/paypal2.png" alt="Paypal">

        
      </div> 
      
       <div class="col-xs-6">
        <p class="lead">Amount Due </p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td><?= $this->session->userdata('Subtotal');?></td>
            </tr>
             
            
             <tr>
              <th>Total:</th>
              <td><?= $this->session->userdata('Total');?></td>
            </tr>
          </table> 
  
        </div>
        <div class="modal-footer">
         
          <button type="button" class="btn btn-danger" data-dismiss="modal">close</button>
        </div>
      </div>
</div>
    </div>
</div>
</div>
</div>
</div>
</div>
  



                <!--======= QUOTE =========-->
                <p>&nbsp;</p>
                <p>&nbsp;</p>


              