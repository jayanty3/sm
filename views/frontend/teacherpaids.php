<div class="sub-banner">
  <div class="container">
    <h2>Register</h2>
    <ul class="links">
      <li><a href="<?= site_url('frontend/auth_login/main'); ?>">Home</a>/</li>
      <li><a href="#">Foreign Register</a></li>
      
    </ul>
  </div>
</div>
<?php  $user['user'] = $this->ion_auth->user()->row(); ?>

 <//?php $user['user'] = User::find_by_id($user->id);?>


 <?php foreach($user as $u); 
                {  $user_id    = $u->id;
                    $username   = $u->username;
                    $email      = $u->email;
                    $first_name =  $u->first_name;
                    $gender     = $u->gender;
                }
                
               ?>
                
               <?php $teacher['teacher'] = Teacher::find_by_user_id($user_id);?>

                                 <?php //echo "<pre>";
                                //  print_r($center);exit; ?>

                                <?php foreach($teacher as $u)
                {
                              
                              $fee             = $u->fee;
                              $lang1           = $u->lang1;
                              $subject         = $u->subject;
                              $teach1          = $u->teach1;
                              $mhri            = $u->mhri;
                              $mhrg            = $u->mhrg;
                              $mobile          = $u->mobile;
                              $education       = $u->education;
                              $university      = $u->university;
                              $city            = $u->city;
                              $country         = $u->country;
                              $skype           = $u->skype;
                              $age             = $u->age;
                              $experiance      = $u->experiance;
                              $certificates    = $u->certificates;
                              $specilization   = $u->specilization;
}
               ?>




<!--======= CONTENT START =========-->
<div class="content">
  <!--======= INTRESTED =========-->
  <section class="courses">
    <div class="container">
      <!--======= TITTLE =========-->
      <div class="tittle">
        <h3>Registration</h3>
         <h4 class=" text-danger"><?=$this->session->flashdata('fail');?></h4>
                            <h4 class=" text-danger">
 <input type="hidden" name="onload" id="onload" value="<?php  if($this->session->flashdata('succ2') == TRUE)
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
        <?=  form_open_multipart('frontend/auth_login/teacherpaids',['class'=>'form-horizontal','id'=>'form1',"name" => "form1",'role'=>'form']); ?>
        
        <!-- <form enctype="multipart/form-data" id="reg_form" class="form-horizontal"> -->
        <fieldset>
          <legend><center><button class=" btn btn-primary ">Foreign Teacher</button></center>
          <br></legend>
          
          <div class="form-group">
            <center>
            <label class="radio-inline" for="fee">
              <input type="radio" name="teach1"  value="Language Teacher"   class="link1" <?php if($teach1 == 'Language Teacher') {echo "checked";}?>>
              Language Teacher
            </label>
            <label class="radio-inline" for="appear">
              <input type="radio" name="teach1"  value="Subject Teacher"   class="link2" <?php if($teach1 == 'Subject Teacher') {echo "checked";}?>>
              Subject Teacher
            </label>
            
            <center><?= form_error('teach1');?></center>
            
            </center>
          </div>
          
          <div class="form-group">
            <label class="col-lg-3 control-label" for="Mother">Name<b>*</b></label>
            <div class="col-lg-3">
              <input type="text" class="form-control" id="min1 placeholder="Name" name="first_name" value="<?= set_value('first_name',$first_name)?>">
              
              <?= form_error('first_name');?>
            </div>
            
            
          </div>
          
          <div class="form-group">
            <label class="col-lg-3 control-label" for="Mother">Mobile Number</label>
            <div class="col-lg-3">
              <input type="text" class="form-control" id="min3" placeholder="Mobile Number" name="mobile" value="<?= set_value('mobile',$mobile)?>">
              
              
            </div>
            
            <label class="col-lg-2 control-label" for="Mother">SkpeId<b>*</b></label>
            <div class="col-lg-3">
              <input type="text" class="form-control" id="min4" placeholder="Skype Id" name="skype" value="<?= set_value('skype',$skype)?>">
              
              <?= form_error('skype');?>
            </div>
          </div>
          <div class="form-group">
            <label for="select" class="col-lg-3 control-label">Gender<b>*</b></label>
            <div class="col-lg-3">
              <select class="form-control" id="select" name="gender">
                <option value="" disabled selected hidden>Select Gender</option>
                <option value="male" <?php if($gender == 'male') {echo "selected";}?>>male</option>
                <option value="female" <?php if($gender == 'female') {echo "selected";} ?>>female</option>
              </select>
              
              <?= form_error('gender');?>
            </div>
            <label class="col-lg-2 control-label" for="Mother">Age</label>
            <div class="col-lg-3">
              <input type="text" class="form-control" id="min5" placeholder="Age" name="age" value="<?= set_value('age',$age)?>">
              
              <?= form_error('age');?>
            </div>
          </div>
          
          <?php $contr = Countr::find('all'); ?>
          <div class="form-group">
            <label class="col-lg-3 control-label" for="Mother">Country<b>*</b></label>
            <div class="col-lg-3">
              <select class="form-control" id="select" name="country">
                <option value="" disabled selected hidden>Select your country</option>
                <?php foreach ($contr as $uni):?>
                
                
                <option value="<?= $uni->country_name;?>" <?php if ($country ==  $uni->country_name) {echo "selected";} ?>><?= $uni->country_name;?></option>
                
                <?php endforeach; ?>
                
                
              </select>
              
              <?= form_error('country'); ?>
            </div>
            
            <label class="col-lg-2 control-label" for="Mother">City<b>*</b></label>
            <div class="col-lg-3">
              <input type="text" class="form-control" id="min6" placeholder="City" name="city" value="<?= set_value('city',$city)?>">
              
              <?= form_error('city');?>
            </div>
          </div>
          <div class="form-group">
            
            <label for="select" class="col-lg-3 control-label">Educational Background<b>*</b></label>
            
            <div class="col-lg-3">
              <select class="form-control" id="select1" name="education">
                <option value="" disabled selected hidden>Highest Education Level</option>
               <option value="MBA" <?php if ($education == 'MBA') {echo "selected";} ?>>MBA</option>
                  <option value="M.TECH" <?php if ($education == 'M.TECH') {echo "selected";} ?>>M.TECH</option>
                  <option value="BCA" <?php if ($education == 'BCA') {echo "selected";} ?>>BCA</option>
                  <option value="PHD" <?php if ($education == 'PHD') {echo "selected";} ?>>PHD</option>
                
              </select>
              
              <?= form_error('education');?>
            </div>
            <?php $univ = Universitie::find('all'); ?>
            <label for="select" class="col-lg-2 control-label">University<b>*</b></label>
            <div class="col-lg-3">
              <select class="form-control" id="select" name="university">
                <option value="" disabled selected hidden>University Pass</option>
                <?php foreach ($univ as $uni):?>
                
                
                <option value="<?= $uni->name;?>" <?php if ($university ==  $uni->name) {echo "selected";} ?> style="text-overflow: hidden;"><?= htmlspecialchars($uni->name,ENT_SUBSTITUTE,'ISO-8859-1');?></option>
                
                <?php endforeach; ?>
                
                
              </select>
              
              <?= form_error('university');?>
            </div>
            
            
          </div>
          <div class="form-group">
            <div class="div123">
              <label for="select" class="col-lg-3 control-label">Languages<b>*</b></label>
              
              <div class="col-lg-3">
                <select class="form-control" id="select123" name="lang1">
                  <option value="" disabled selected hidden>Select Languages</option>
                  <option value="english" <?php if ($lang1 == 'english') {echo "selected";} ?>>English</option>
                  <option value="chinese" <?php if ($lang1 == 'chinese') {echo "selected";} ?>>Chinese (Mandarin)</option>
                  <option value="french" <?php if ($lang1 == 'french') {echo "selected";} ?>>French</option>
                  <option value="spanish" <?php if ($lang1 == 'spanish') {echo "selected";} ?>>Spanish</option>
                  
                </select>
                
                <?= form_error('lang1');?>
              </div>
            </div>
            <div class="div124">
              <label for="select" class="col-lg-3 control-label">Subjects<b>*</b></label>
              
              <div class="col-lg-3">
                <select class="form-control" id="select124" name="subject">
                  <option value="" disabled selected hidden>Select Subjects</option>
                  <option value="Maths" <?php if ($subject == 'Maths') {echo "selected";} ?>>Maths</option>
                  <option value="Physics" <?php if ($subject == 'Physics') {echo "selected";} ?>>Physics</option>
                  <option value="Chemistry" <?php if ($subject == 'Chemistry') {echo "selected";} ?>>Chemistry</option>
                  <option value="Computer science" <?php if ($subject == 'Computer science') {echo "selected";} ?>>Computer science</option>
                  
                </select>
                
                <?= form_error('subject');?>
              </div>
            </div>
            
            <label for="select" class="col-lg-2 control-label">Years of Experience<b>*</b></label>
            <div class="col-lg-3">
              <select class="form-control" id="select2" name="experiance">
                <option value="" disabled selected hidden>Select Year </option>
                <option value="0yrs - 2yrs" <?php if($experiance == '0yrs - 2yrs') {echo "selected";} ?>>0yrs - 2yrs</option>
                <option value="3yrs - 5yrs" <?php if($experiance == '3yrs - 5yrs') {echo "selected";} ?>>3yrs - 5yrs</option>
                <option value="6yrs - 10yrs" <?php if($experiance == '6yrs - 10yrs') {echo "selected";} ?>>6yrs - 10yrs</option>
                <option value="11yrs - Above" <?php if($experiance == '11yrs - Above') {echo "selected";} ?>>11yrs - Above</option>
              </select>
              
              <?= form_error('experiance');?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label" for="Mother">Certificates</label>
            <div class="col-lg-3">
              <input type="text" class="form-control" id="min7" placeholder="Certificates" name="certificates" value="<?= set_value('certificates',$certificates)?>">
              
              <?= form_error('certificates');?>
            </div>
            
            <label class="col-lg-2 control-label" for="Mother">Specilization</label>
            <div class="col-lg-3">
              <input type="text" class="form-control" id="min8" placeholder="Specilization" name="specilization" value="<?= set_value('specilization',$specilization)?>">
              
              <?= form_error('specilization');?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-offset-1 col-lg-2 control-label" for="Mother">Minimum Hourly<b>*</b> Rate(USD $) - Individual Classes </label>
            <div class="col-lg-3">
              <input type="text" class="form-control" id="min9" placeholder="Minimum Hourly Rate(USD $) - Individual Classes" name="mhri" value="<?= set_value('mhri',$mhri)?>">
              <?= form_error('mhri');?>
            </div>
            
            <label class="col-lg-2 control-label" for="Mother">Minimum Hourly<b>*</b> Rate(USD $) - Group Classes</label>
            <div class="col-lg-3">
              <input type="text" class="form-control" id="min10" placeholder="Minimum Hourly Rate(USD $) - Group Classes" name="mhrg" value="<?= set_value('mhrg',$mhrg)?>">
              
              <?= form_error('mhrg');?>
            </div>
          </div>
        
          <div class="form-group">
            
            <div class="col-lg-offset-5 col-lg-4">
              <label class="radio-inline" for="fee">
                <input type="radio" name="fee"  value="free" checked class="link3"  <?php if($fee == 'free') {echo "checked";}?>>
                Free Registration: xxxxxxxxx
              </label>
            </div>
            <div class="col-lg-offset-5 col-lg-4">
              <label class="radio-inline" for="appear">
                <input type="radio" name="fee"  value="appear home page"  class="link4"  <?php if($fee == 'appear home page') {echo "checked";}?>>
                Appear On Home Page: xxxx
              </label></div>
            </div>
            <div class="form-group">
              <label for="textArea" class="col-lg-3 control-label">Upload Resume<b>*</b></label>
              <div class="col-lg-3">
                <div class="btn-file-input">
                  <button class="btn-file-input" >Upload File</button>
                  <input type="file" id="file-upload" name="files" <?= set_value('files');?>>
                  </div><span class="help-block">doc,docx,rtf,pdf -300 kb max</span>
                  <center><div id="errfiles"></center>
                    <?= form_error('files');?>
                  </div>
                  
                  
                  
                  <label for="textArea" class="col-lg-2 control-label">Upload Video<b>*</b></label>
                  <div class="col-lg-3">
                    <div class="btn-file-input">
                      <button class="btn-file-input" >Upload Video</button>
                      <input type="file" id="file-upload" name="files1" <?= set_value('files1');?>>
                      </div><span class="help-block">AVI,MP4 -5 Mb max</span>
                      
                      <?= form_error('files1');?>
                    </div>
                    
                    
                  </div>
                  </center>
                  
                  <div class="form-group">
                   <div class="col-lg-9"></div>
                    <div   class="col-lg-3 " >
                      <div class='pay1'>
                        <a href="#." data-toggle="modal" data-target="#pay1" class="btn btn-primary abc"> Pay Now </a>
                      </div>
                    </div>
                  </div>
                  <?php $user = $this->ion_auth->user()->row();
                  $groups = $this->ion_auth->groups()->result_array();
                  // $name = $user->first_name." ".$user->last_name;
                  //$name1 = $user->username;
                  
                  ?>
                  <div class="form-group">
                    <label for="textArea" class="col-lg-3 control-label"></label>
                    <div class=" col-lg-offset-1 col-lg-6">
                      <label class="checkbox">
                        <input type="checkbox" name="agree" checked value='1'>I have read and agree to the Terms and Conditions and Privacy Policy.
                      </label>
                      <?= form_error('agree');?>
                    </div>
                    
                  </div>


                  <?php $validi = validation_errors();
                          if($validi == NULL)
                        {
                            echo "<script>alert('All field are filled corrected now you can pay now!'); </script>";
                        }
                        

           ?>

                  
                  
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <div class="row">
                        <div class="col-md-5 ">
                          <?= anchor('frontend/auth_login/main', 'Cancel',['class'=>'btn btn-info pull-right']);?>
                        </div>
                        <div class=" col-md-2">
                          <input type="submit" class="btn btn-primary pull-left bcd" name="Submit" id="dis" value="upload" >
                        </div>
                      </div>
                    </div>
                  </div>
                </fieldset>
                <?= form_close();?>
              </section>
            </div>
          </section>
          


          <script type="text/javascript">$(function () {
          $(".pay1").hide();
          
          $(".link3, .link4").bind("click", function () {
          $(".pay1").hide();
          
          if ($(this).attr("class") == "link4")
          {
          $(".pay1").show();
          }
          else
          {
          $(".pay1").hide();
          }
          });
          });</script>

          <script type="text/javascript">
          $(document).ready(function(){
          if($('.link4').is(':checked'))
          {
          $('.pay1').show();
          }
          
          });
          </script>




          
          <script type="text/javascript">$(function () {
            $(".div123,.div124").hide();
            
            $(".link1, .link2").bind("click", function () {
            $(".div123, .div124").hide();
            
            if ($(this).attr("class") == "link1")
            {

            $(".div123").show();
            $('#select124').prop('disabled',true);
            $('#select123').prop('disabled',false);
            }
            else
            {
            
            $(".div124").show();
            $('#select123').prop('disabled',true);
            $('#select124').prop('disabled',false);
            }
            });
            });
        </script>



        <script type="text/javascript">
          $(document).ready(function(){
          if($('.link1').is(':checked'))
          {
          
          $('.div123').show();
          
          }
          if($('.link2').is(':checked'))
          {
          
          $('.div124').show();
        
          }
          });
          </script>


<script type="text/javascript">
  // $(document).ready(function(){
  //         $(".link4").click(function(){
  //         $('#dis').prop('disabled', true);
          
  //         });
  //         });

  // $(document).ready(function(){
  //         $(".link3").click(function(){
  //         $('#dis').prop('disabled', false);
          
  //         });
  //         });


// $(document).ready(function(){
//           if($('.link3').is(':checked'))
//           {
          
//           $('#dis').prop('disabled', false);
          
//           }
//           if($('.link4').is(':checked'))
//           {
          
//           $('#dis').prop('disabled', true);
        
//           }
//           });


</script>

        

<?php $enb = $this->session->userdata('saleId'); if($enb == NULL){ $st1 = 0;} else { $st1 = 1;} ?>


          <script type="text/javascript">
          $(document).ready(function(){

         
          $(".link4").click(function(){
          $('#dis').prop('disabled', true);
              
        });

       
        if($('.link4').is(':checked'))
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
         




<?php $user = User::find_by_id($user->id);?>

               <?php  
                   $user_id    = $user->id;
                    $name   = $user->username;
                    $name1      = $user->email;
  
                
               ?>


         
          
          <div id="pay1" class="modal fade" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top: 60px;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><img src="<?=base_url(); ?>assets/front/images/cut.png" width="20px" height="20px"></button>
                  <p>
                    
                  </div>
                  <?php $fee = Fee::find_by_fee_id(1); ?>
                  <div class="modal-body">
                    <div class="mailchimp">
                    <div id="mc_embed_signup">
                    <div class="row">
                      <!--======= CONTACT FORM =========-->
                      
                      <div class="col-md-12">
                        <div class="contact-form">
                          <p class="notice error"><?= $this->session->flashdata('error_msg') ?></p><br/>
                          <p class="notice error"><?= $this->session->flashdata('success_msg') ?></p><br/>
                          
                          <form method="post" class="form-horizontal" role="form" action="<?= base_url() ?>Paypal_teacher/create_payment_with_paypal">
                            <fieldset>
                              <table class="table table-striped table-responsive">
                                <tr>
                                  <th>Name:</th>
                                  <td><?php if($name === ' '){echo $name1;}else{echo $name;};?></td>
                                </tr>
                                <tr>
                                  <th>Payments:</th>
                                  <td><?=$fee->teachers_price;?></td>
                                </tr>
                              </table>
                              <input title="item_name" name="item_name" type="hidden" value="Teachers Payments">
                              <input title="item_number" name="item_number" type="hidden" value="1">
                              <input title="item_description" name="item_description" type="hidden" value="Portal for Teachers">
                              <input title="item_tax" name="item_tax" type="hidden" value="1">
                              <input title="item_price" name="item_price" type="hidden" value="<?=$fee->teachers_price;?>">
                              <input title="details_tax" name="details_tax" type="hidden" value="0">
                              <input title="details_subtotal" name="details_subtotal" type="hidden" value="<?=$fee->teachers_price;?>">
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
                  </div>
                      <!-- <script type="text/javascript">
                      $('.abc').click(function(){
                      $('#form1').submit();
                      });
                      </script> -->
                      
                    </div>
                    <!--======= CONTACT =========-->
                  </div>
                  
                  <div class="modal-footer">
                    
                    <button type="button" class=" btn-danger btn-xs" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <div id="alert-msg"></div>

            <div class="modal fade bs-example-modal-lg" tabindex="-1" data-backdrop="false" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"  id="asds" style="margin-top: 110px;">
     

    <div class="modal-dialog">

      
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          
        </div>
        <div class="modal-body">
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
            <!--======= QUOTE =========-->
            <p>&nbsp;</p>
            <p>&nbsp;</p>