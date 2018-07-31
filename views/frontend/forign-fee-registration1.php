
<?php  $user['user'] = $this->ion_auth->user()->row(); ?>
<!--======= CONTENT START =========-->
<div class="content">
  <!--======= INTRESTED =========-->
  <section class="courses">
    <div class="container">
      <!--======= TITTLE =========-->
      <div class="tittle">
        <h3>Registration</h3>
        
        <hr>
      </div>
      
      <!--======= MONTH TITTLE =========-->
      
      <!--======= RODUCTS =========-->
      <section class="products">
        <!--======= PRODUCTS ROW =========-->
        <center><a href="javascript:void(0)" class=" btn btn-primary ">Foreign Teacher</a></center>
        
        <!--  <form class="form-horizontal"> -->
        <?=  form_open_multipart('register-teachers',['class'=>'form-horizontal','id'=>'form1',"name" => "form1",'role'=>'form']); ?>
        
        <!-- <form enctype="multipart/form-data" id="reg_form" class="form-horizontal"> -->
        <fieldset>
          <legend><center></center>
          <br></legend>
          
          <div class="form-group">
            <center>
            <label class="radio-inline" for="fee">
              <input type="radio" name="teach1"  value="Language Teacher" checked  class="link1" <?php echo set_radio('teach1', 'Language Teacher'); ?>>
              Language Teacher
            </label>
            <label class="radio-inline" for="appear">
              <input type="radio" name="teach1"  value="Subject Teacher"   class="link2" <?php echo set_radio('teach1', 'Subject Teacher'); ?>>
              Subject Teacher
            </label>
            
            <center><?= form_error('teach1');?></center>
            
            </center>
          </div>
          
          <div class="form-group">
            <label class="col-lg-3 control-label" for="Mother">Name<b>*</b></label>
            <div class="col-lg-3">
              <input type="text" class="form-control" id="min1 placeholder="Name" name="first_name" value="<?= set_value('first_name')?>" data-validation="required">
              
              <?= form_error('first_name');?>
            </div>
            </div>
            
          
          <div class="form-group">
            <label class="col-lg-3 control-label" for="Mother">Mobile Number</label>
            <div class="col-lg-3">
              <input type="text" class="form-control" id="min3" placeholder="Mobile Number" name="mobile" value="<?= set_value('mobile')?>">
              
              
            </div>
            
            <label class="col-lg-2 control-label" for="Mother">SkpeId<b>*</b></label>
            <div class="col-lg-3">
              <input type="text" class="form-control" id="min4" placeholder="Skype Id" name="skype" value="<?= set_value('skype')?>" data-validation="required">
              
              <?= form_error('skype');?>
            </div>
          </div>
          <div class="form-group">
            <label for="select" class="col-lg-3 control-label">Gender<b>*</b></label>
            <div class="col-lg-3">
              <select class="form-control" id="select" name="gender" data-validation="required">
                <option value="" disabled selected hidden>Select Gender</option>
                <option value="male" <?php echo set_select('gender', 'male'); ?>>male</option>
                <option value="female" <?php echo set_select('gender', 'female'); ?>>female</option>
              </select>
              
              <?= form_error('gender');?>
            </div>
            <label class="col-lg-2 control-label" for="Mother">Age</label>
            <div class="col-lg-3">
              <input type="text" class="form-control" id="min" placeholder="Age" name="age" value="<?= set_value('age')?>" data-validation="number" data-validation-allowing="range[15;100]" data-validation-optional="true">
              
              <?= form_error('age');?>
            </div>
          </div>
          
          <?php $contr = Countr::find('all'); ?>
          <div class="form-group">
            <label class="col-lg-3 control-label" for="Mother">Country<b>*</b></label>
            <div class="col-lg-3">
              <select class="form-control" id="select" name="country" data-validation="required">
                <option value="" disabled selected hidden>Select your country</option>
                <?php foreach ($contr as $uni):?>
                
                
                <option value="<?= $uni->country_name;?>" <?php echo set_select('country',$uni->country_name); ?>><?= $uni->country_name;?></option>
                
                <?php endforeach; ?>
                
                
              </select>
              
              <?= form_error('country'); ?>
            </div>
            
            <label class="col-lg-2 control-label" for="Mother">City<b>*</b></label>
            <div class="col-lg-3">
              <input type="text" class="form-control" id="min" placeholder="City" name="city" value="<?= set_value('city')?>" data-validation="required">
              
              <?= form_error('city');?>
            </div>
          </div>
          <div class="form-group">
            
            <label for="select" class="col-lg-3 control-label">Educational Background<b>*</b></label>
            
            <div class="col-lg-3">
              <select class="form-control" id="select" name="education" data-validation="required">
                <option value="" disabled selected hidden>Highest Education Level</option>
                <option value="MBA" <?php echo set_select('education', 'MBA'); ?>>MBA</option>
                <option value="M.TECH" <?php echo set_select('education', 'M.TECH'); ?>>M.TECH</option>
                <option value="BCA" <?php echo set_select('education', 'BCA'); ?>>BCA</option>
                <option value="PHD" <?php echo set_select('education', 'PHD'); ?>>PHD</option>
                
              </select>
              
              <?= form_error('education');?>
            </div>
          
             <label for="select" class="col-lg-2 control-label">University<b>*</b></label>

            <div class="col-lg-3">
              
                
                <input type="text" class="form-control" id="min" placeholder="University" name="university" value="<?= set_value('university')?>" data-validation="required">
                
                
                
                
                
            
              
              <?= form_error('university');?>
            </div>
            
            
          </div>
          <div class="form-group">
            <div class="div123">
              <label for="select" class="col-lg-3 control-label">Languages<b>*</b></label>
              
              <div class="col-lg-3">
                <select class="form-control" id="select123" name="lang1" data-validation="required">
                  <option value="" disabled selected hidden>Select Languages</option>
                  <option value="english" <?php echo set_select('lang1', 'english'); ?>>English</option>
                  <option value="chinese" <?php echo set_select('lang1', 'chinese'); ?>>Chinese (Mandarin)</option>
                  <option value="french" <?php echo set_select('lang1', 'french'); ?>>French</option>
                  <option value="spanish" <?php echo set_select('lang1', 'spanish'); ?>>Spanish</option>
                  
                </select>
                
                <?= form_error('lang1');?>
              </div>
            </div>
            <div class="div124">
              <label for="select" class="col-lg-3 control-label">Subjects<b>*</b></label>
              
              <div class="col-lg-3">
                <select class="form-control" id="select124" name="subject" data-validation="required">
                  <option value="" disabled selected hidden>Select Subjects</option>
                  <option value="Maths" <?php echo set_select('subject', 'Maths'); ?>>Maths</option>
                  <option value="Physics" <?php echo set_select('subject', 'Physics'); ?>>Physics</option>
                  <option value="Chemistry" <?php echo set_select('subject', 'Chemistry'); ?>>Chemistry</option>
                  <option value="Computer science" <?php echo set_select('subject', 'Computer science'); ?>>Computer science</option>
                  
                </select>
                
                <?= form_error('subject');?>
              </div>
            </div>
            
            <label for="select" class="col-lg-2 control-label">Years of Experience<b>*</b></label>
            <div class="col-lg-3">
              <select class="form-control" id="select" name="experiance" data-validation="required">
                <option value="" disabled selected hidden>Select Year </option>
                <option value="0yrs - 2yrs" <?php echo set_select('experiance', '0yrs - 2yrs'); ?>>0yrs - 2yrs</option>
                <option value="3yrs - 5yrs" <?php echo set_select('experiance', '3yrs - 5yrs'); ?>>3yrs - 5yrs</option>
                <option value="6yrs - 10yrs" <?php echo set_select('experiance', '6yrs - 10yrs'); ?>>6yrs - 10yrs</option>
                <option value="11yrs - Above" <?php echo set_select('experiance', '11yrs - Above'); ?>>11yrs - Above</option>
              </select>
              
              <?= form_error('experiance');?>
            </div>
          </div>
          
          
         

                  <div class="form-group">
                    <label for="textArea" class="col-lg-3 control-label"></label>
                    <div class=" col-lg-offset-1 col-lg-6">
                      <label class="checkbox">
                        <input type="checkbox" name="agree1" value='1' id="tt2">&nbsp;I have read and agree to the <b style="color: #00BEFF;cursor: pointer;"><strong> Consulting Agreeement</strong></b> 
                      </label>
                      <?= form_error('agree1');?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="textArea" class="col-lg-3 control-label"></label>
                    <div class=" col-lg-offset-1 col-lg-6">
                      <label class="checkbox">
                        <input type="checkbox" name="agree" value='1' id="tt1">&nbsp;I have read and agree to the <b style="color: #00BEFF;cursor: pointer;"><strong>Terms and Conditions</strong></b> and <b style="color: #00BEFF;cursor: pointer;"><strong>Privacy Policy</strong></b>
                      </label>
                      <?= form_error('agree');?>
                    </div>
                    
                  </div>
                  
                  
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <div class="row">
                        <div class="col-md-5 ">
                          <?= anchor('signup', 'Cancel',['class'=>'btn btn-info pull-right']);?>
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
          <?php $enb = $this->session->userdata('saleId'); if($enb == NULL){ $st1 = 0;} else { $st1 = 1;} ?>


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
           $('#select124').prop('disabled',true);
            $('#select123').prop('disabled',false);
          }
          if($('.link2').is(':checked'))
          {
          
          $('.div124').show();
        
          }
          });
          </script>


<script type="text/javascript">
  $(document).ready(function(){
          $(".link4").click(function(){
          $('#dis').prop('disabled', true);
          
          });
          });

  $(document).ready(function(){
          $(".link3").click(function(){
          $('#dis').prop('disabled', false);
          
          });
          });


$(document).ready(function(){
          if($('.link3').is(':checked'))
          {
          
          $('#dis').prop('disabled', false);
          
          }
          if($('.link4').is(':checked'))
          {
          
          $('#dis').prop('disabled', true);
        
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
                      <script type="text/javascript">
                      $('.abc').click(function(){
                      $('#form1').submit();
                      });
                      </script>
                      
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
            <div id="alert-msg"></div>
            <!--======= QUOTE =========-->
            <p>&nbsp;</p>
            <p>&nbsp;</p>


            
            <div class="modal fade" id="termsModal"  tabindex="-1" role="dialog" aria-labelledby="Terms and conditions" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Terms and conditions</h3>
            </div>

            <div class="modal-body">
                <p>Lorem ipsum dolor sit amet, veniam numquam has te. No suas nonumes recusabo mea, est ut graeci definitiones. His ne melius vituperata scriptorem, cum paulo copiosae conclusionemque at. Facer inermis ius in, ad brute nominati referrentur vis. Dicat erant sit ex. Phaedrum imperdiet scribentur vix no, ad latine similique forensibus vel.</p>
                <p>Dolore populo vivendum vis eu, mei quaestio liberavisse ex. Electram necessitatibus ut vel, quo at probatus oportere, molestie conclusionemque pri cu. Brute augue tincidunt vim id, ne munere fierent rationibus mei. Ut pro volutpat praesent qualisque, an iisque scripta intellegebat eam.</p>
                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="agreeButton" data-dismiss="modal"  style="margin: 20px;">Agree</button>
                
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="termsModal1"  tabindex="-1" role="dialog" aria-labelledby="Terms and conditions" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Consulting Agreeement</h3>
            </div>

            <div class="modal-body">
                <p>Lorem ipsum dolor sit amet, veniam numquam has te. No suas nonumes recusabo mea, est ut graeci definitiones. His ne melius vituperata scriptorem, cum paulo copiosae conclusionemque at. Facer inermis ius in, ad brute nominati referrentur vis. Dicat erant sit ex. Phaedrum imperdiet scribentur vix no, ad latine similique forensibus vel.</p>
                <p>Dolore populo vivendum vis eu, mei quaestio liberavisse ex. Electram necessitatibus ut vel, quo at probatus oportere, molestie conclusionemque pri cu. Brute augue tincidunt vim id, ne munere fierent rationibus mei. Ut pro volutpat praesent qualisque, an iisque scripta intellegebat eam.</p>
                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="agreeButton1" data-dismiss="modal"  style="margin: 20px;">Agree</button>
                
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

  $(document).ready(function(){

  $('#tt1').click(function(){

        if (this.checked) {
            
            $('#termsModal').appendTo("body").modal('show');
            $('#agreeButton').click(function() {
            $('#tt1').prop('checked', true);
          })
        }

        if(this.checked){
              $('#tt1').prop('checked', false);
        }

    });


  $('#tt2').click(function(){

        if (this.checked) {
            
            $('#termsModal1').appendTo("body").modal('show');
            $('#agreeButton1').click(function() {
            $('#tt2').prop('checked', true);
          })
        }

        if(this.checked){
              $('#tt2').prop('checked', false);
        }

    });

  });
</script>

<script>
$.validate({
  modules : 'location, date, security, file',
});
</script>

<!-- <script type="text/javascript">


  
  $(document).ready(function(){


    

  $('#tt1:input[type=checkbox]').change(
    function(){
        if (this.checked) {
            
            $('#termsModal').appendTo("body").modal('show');
        }
    });

  $('#tt2:input[type=checkbox]').change(
    function(){
        if (this.checked) {
            
            $('#termsModal1').appendTo("body").modal('show');
        }
    });


  });
</script> -->