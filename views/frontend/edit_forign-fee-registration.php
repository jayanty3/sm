 

            <!--======= CONTENT START =========-->
<?php  $user['user'] = $this->ion_auth->user()->row(); ?>
               <?php foreach($user as $u) 
                {   $user_id    =  $u->id;
                    $first_name = $u->first_name;
                    $last_name  = $u->last_name;
                    $email      = $u->email;
                    $city       = $u->state;
                    $gender     = $u->gender;
                    $message    =$u->message;
                    $image      =$u->images;
                }
               ?>
                   
               <?php $teacher['teacher'] = Teacher::find_by_user_id($user_id);?>

                                <?php //echo "<pre>";
                                // print_r($teacher);exit; ?>

                                <?php foreach($teacher as $u) 
                {

                             
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
                              $pic              =$u->pic;
                              $userfile        = $u->userfile;
                              $vedio           = $u->vedio;
                        

}
               ?>





            <div class="content"> 

                <!--======= INTRESTED =========-->
                <section class="courses">
                    <div class="container"> 
                        <!--======= TITTLE =========-->
                        <div class="tittle">
                            <h3>Edit Registration</h3>
                            
                            <hr>
                        </div>
                       
<center><?php echo validation_errors(); ?></center>



                        <!--======= MONTH TITTLE =========-->
                      

                        <!--======= RODUCTS =========-->
                        <section class="products"> 

                            <!--======= PRODUCTS ROW =========-->
                            
                          
                           <!--  <form class="form-horizontal"> -->
    <?=  form_open_multipart('frontend/auth_login/edit_forign_registration',['class'=>'form-horizontal']); ?>
 
    

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
               <option value="MBA" <?php if($education == 'MBA') {echo "selected";} ?>>MBA</option>
                  <option value="M.TECH" <?php if($education == 'M.TECH') {echo "selected";} ?>>M.TECH</option>
                  <option value="BCA" <?php if($education == 'BCA') {echo "selected";} ?>>BCA</option>
                  <option value="PHD" <?php if($education == 'PHD') {echo "selected";} ?>>PHD</option>
                
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
                  <option value="english" <?php if($lang1 == 'english') {echo "selected";} ?>>English</option>
                  <option value="chinese" <?php if($lang1 == 'chinese') {echo "selected";} ?>>Chinese (Mandarin)</option>
                  <option value="french" <?php if($lang1 == 'french') {echo "selected";} ?>>French</option>
                  <option value="spanish" <?php if($lang1 == 'spanish') {echo "selected";} ?>>Spanish</option>
                  
                </select>
                
                <?= form_error('lang1');?>
              </div>
            </div>
            <div class="div124">
              <label for="select" class="col-lg-3 control-label">Subjects<b>*</b></label>
              
              <div class="col-lg-3">
                <select class="form-control" id="select124" name="subject">
                  <option value="" disabled selected hidden>Select Subjects</option>
                  <option value="Maths" <?php if($subject == 'Maths') {echo "selected";} ?>>Maths</option>
                  <option value="Physics" <?php if($subject == 'Physics') {echo "selected";} ?>>Physics</option>
                  <option value="Chemistry" <?php if($subject == 'Chemistry') {echo "selected";} ?>>Chemistry</option>
                  <option value="Computer science" <?php if($subject == 'Computer science') {echo "selected";} ?>>Computer science</option>
                  
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
              <label for="textArea" class="col-lg-3 control-label">Upload Photos<b>*</b></label>
              <div class="col-lg-3">
                <div class="btn-file-input">
                  <button class="btn-file-input" >Upload File</button>
                  <input type="file" id="file-upload" name="files" <?= set_value('files');?>>
                  </div><span class="help-block">png,jpeg,jpg -300 kb max</span>
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
                  
                 
                  <?php $user = $this->ion_auth->user()->row();
                  $groups = $this->ion_auth->groups()->result_array();
                  // $name = $user->first_name." ".$user->last_name;
                  //$name1 = $user->username;
                  
                  ?>
            
                  
                  
                  
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <div class="row">
                        <div class="col-md-5 ">
                          <?= anchor('frontend/auth_login/main', 'Cancel',['class'=>'btn btn-info pull-right']);?>
                        </div>
                        <div class=" col-md-2">
                          <input type="submit" class="btn btn-primary pull-left bcd" name="Submit" id="dis" value="Update" >
                        </div>
                      </div>
                    </div>
                  </div>
                </fieldset>
                <?= form_close();?>
              </section>
            </div>
          </section>

                <!--======= QUOTE =========-->
                <p>&nbsp;</p>
                <p>&nbsp;</p>

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
         