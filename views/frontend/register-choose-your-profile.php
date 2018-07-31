<!-- <script>
 function disableSubmit() {
  document.getElementById("submit").disabled = true;
 }

  function activateButton(element) {

      if(element.checked) {
        document.getElementById("submit").disabled = false;
       }
       else  {
        document.getElementById("submit").disabled = true;
      }

  }
</script> -->


            <!--======= BANNER =========-->
           

            <!--======= CONTENT START =========-->
            <div class="content"> 

                <!--======= INTRESTED =========-->
                <section class="courses">
                    <div class="container"> 
                        <!--======= TITTLE =========-->
                        <div class="tittle">
                            <h3>Registration</h3>
                            
                            <hr>
                            <?php if($this->session->flashdata('mess')){ echo $this->session->flashdata('mess'); 

                            header( "refresh:3; url='".base_url()."frontend/auth_login/main" ); }?>
                        </div>
                      
                        <section class="products"> 
    <center><a href="javascript:void(0)" class=" btn btn-primary ">Register Individuals</a></center>
                            <!--======= PRODUCTS ROW =========-->
                            <div class="row">
                              <legend>
          <br></legend>
                          <div class="col-md-6 col-md-offset-3" ">    
                                <?php echo form_open('register-individual');  ?>

                                       <div class="form-group">
                                          
                                          <div class="form-group">
                                            <label class="sr-only" for="exampleInputAmount">First Name</label>
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                              <input type="text" class="form-control" id="exampleInputAmount" placeholder="First Name" name="first_name" value="<?php echo set_value('first_name');?>" data-validation="required">
                                              
                                              
                                            </div>
                                            <?= form_error('first_name'); ?>
                                          </div>
                                        </div>

                                        
                                        <div class="form-group">
                                          
                                          <div class="form-group">
                                            <label class="sr-only" for="exampleInputAmount">Last Name</label>
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                              <input type="text" class="form-control" id="exampleInputAmount" placeholder="Last Name" name="last_name" value="<?php echo set_value('last_name');?>" data-validation="required">
                                            </div>
                                            <?= form_error('last_name'); ?>
                                          </div>
                                        </div>


                                        <div class="form-group">
                                          
                                          <div class="form-group">
                                            <label class="sr-only" for="exampleInputAmount">email</label>
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                              <input type="text" class="form-control" id="exampleInputAmount"  name="email" placeholder="Email " value="<?php echo set_value('email');?>" data-validation="email">
                                              
                                            </div>
                                            <?= form_error('email'); ?>
                                          </div>
                                        </div>

                                         <div class="form-group">
                                          
                                          <div class="form-group">
                                            <label class="sr-only" for="exampleInputAmount">Skype</label>
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="fa fa-skype"></i></div>
                                              <input type="text" class="form-control" id="exampleInputAmount"  name="skype" placeholder="Skype " value="<?php echo set_value('skype');?>" data-validation="required">
                                              
                                            </div>
                                            <?= form_error('skype'); ?>
                                          </div>
                                        </div>
                                        
                                         <div class="form-group">
                                          
                                          <div class="form-group">
                                            <label class="sr-only" for="exampleInputAmount">Facebook</label>
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="fa fa-facebook"></i></div>
                                              <input type="text" class="form-control" id="exampleInputAmount"  name="facebook" placeholder="Facebook " value="<?php echo set_value('facebook');?>" >
                                              
                                            </div>
                                            <?= form_error('facebook'); ?>
                                          </div>
                                        </div>


                                        
                                        

                                        <div class="form-group">
                                          <div class="input-group">
                                              <div class="input-group-addon "><i class="fa fa-venus-mars"></i></div>
                                              <select type="text" class="form-control" id="exampleInputAmount" placeholder="Gender" name="gender" data-validation="required">
                                                <option value="" disabled selected hidden>Choose Your Gender...</option>
                                                <option value="male" <?php echo set_select('gender', 'male'); ?>>Male</option>
                                                <option value="female" <?php echo set_select('gender', 'female'); ?>>Female</option>
                                                
                                              </select>
                                              </div>
                                            <?= form_error('gender'); ?>
                                        </div>
                                        <?php $contr = Countr::find('all'); ?>

                                        <div class="form-group">
                                          <div class="input-group">
                                              <div class="input-group-addon "><i class="fa fa-globe"></i></div>
                                              <select type="text" class="form-control" id="exampleInputAmount"  name="country" data-validation="required">
                                                <option value="" disabled selected hidden>Choose Your country...</option>
                                                <?php foreach ($contr as $uni):?>
                                                <option value='<?= $uni->country_name;?>' <?php echo set_select('country',  $uni->country_name); ?>><?= $uni->country_name;?></option>
                                                <?php endforeach; ?>
                                              </select>
                                              </div>
                                            <?= form_error('country'); ?>
                                        </div>

                                        <div class="form-group">
                                          <div class="input-group">
                                              <div class="input-group-addon "><i class="fa fa-globe"></i></div>
                                              <input type="text" class="form-control" id="exampleInputAmount" placeholder="City" name="city" value="<?php echo set_value('city');?>" data-validation="required">
                                              </div>
                                            <?= form_error('city'); ?>
                                        </div>

                                        <div class="form-group">
                                          <div class="input-group">
                                              <div class="input-group-addon "><i class="fa fa-key"></i></div>
                                              <input type="password" class="form-control" id="exampleInputAmount" placeholder="Password" name="cpass" data-validation="required">
                                              </div>
                                            <?= form_error('cpass'); ?>
                                        </div>
                                        <div class="form-group">
                                          <div class="input-group">
                                              <div class="input-group-addon "><i class="fa fa-key"></i></div>
                                              <input type="password" class="form-control" id="exampleInputAmount" placeholder="Password Confirm" name="password_confirm" data-validation="required">
                                              </div>
                                            <?= form_error('password_confirm'); ?>
                                        </div>
                                          
                                           <div class="form-group">
                                              <div class="form-group row">
                                            <div class="col-md-12 well ">
                                             <label class="col-md-6" for="fee">
                                             <input type="checkbox" name="levels[]"  value="Beginner" <?php echo set_checkbox('levels[]', 'Beginner'); ?>   data-validation="checkbox_group" data-validation-qty="min1">
                                             &nbsp;&nbsp;&nbsp;Beginner
                                             </label>
                                             <label class="col-md-6" for="fee">
                                             <input type="checkbox" name="levels[]"  value="Upper Beginner"  <?php echo set_checkbox('levels[]', 'Upper Beginner'); ?>  data-validation="checkbox_group" data-validation-qty="min1">
                                             &nbsp;&nbsp;&nbsp;Upper Beginner
                                             </label>
                                             <label class="col-md-6" for="fee">
                                             <input type="checkbox" name="levels[]"  value="Intermediate" <?php echo set_checkbox('levels[]', 'Intermediate'); ?> data-validation="checkbox_group" data-validation-qty="min1" data-validation="checkbox_group" data-validation-qty="min1">
                                             &nbsp;&nbsp;&nbsp;Intermediate
                                             </label>
                                             <label class="col-md-6" for="fee">
                                             <input type="checkbox" name="levels[]"  value="Upper Intermediate" <?php echo set_checkbox('levels[]', 'Upper Intermediate'); ?>  data-validation="checkbox_group" data-validation-qty="min1" >
                                             &nbsp;&nbsp;&nbsp;Upper Intermediate
                                             </label>
                                             <label class="col-md-6" for="fee">
                                             <input type="checkbox" name="levels[]"  value="Advanced"  <?php echo set_checkbox('levels[]', 'Advanced'); ?> data-validation="checkbox_group" data-validation-qty="min1">
                                             &nbsp;&nbsp;&nbsp;Advanced
                                             </label>
                                             <label class="col-md-6" for="fee">
                                             <input type="checkbox" name="levels[]"  value="Upper Advanced" <?php echo set_checkbox('levels[]', 'Upper Advanced'); ?> data-validation="checkbox_group" data-validation-qty="min1">
                                             &nbsp;&nbsp;&nbsp;Upper Advanced
                                             </label>
                                             <label class="col-md-6" for="fee">
                                             <input type="checkbox" name="levels[]"  value="Business"  <?php echo set_checkbox('levels[]', 'Business'); ?> data-validation="checkbox_group" data-validation-qty="min1" >
                                             &nbsp;&nbsp;&nbsp;Business
                                             </label>
                                             <label class="col-md-6" for="fee">
                                             <input type="checkbox" name="levels[]"  value="International Certificate" <?php echo set_checkbox('levels[]', 'International Certificate'); ?> data-validation="checkbox_group" data-validation-qty="min1"  >
                                             &nbsp;&nbsp;&nbsp;International Certificate
                                             </label>
                                             
                                             <p>&nbsp;</p>
                                           </div>
                                             <center> <?= form_error('levels[]');?></center>
                                           </div>
                                           </div>

                                          <div class="form-group">
                                              <div class="form-group row">
                                               <div class="col-md-12 well ">
                                                 <div class="alert alert-info  col-md-5">
                                          <strong>Beginner</strong> <br>Nisi magna sint amet mollit voluptate.
                                       </div>
                                       <div class="alert alert-info col-md-offset-2 col-md-5">
                                          <strong>Upper Beginner</strong> <br>Nisi magna sint amet mollit voluptate.
                                       </div>
                                       <div class="alert alert-info  col-md-5">
                                          <strong>Intermediate</strong> <br>Nisi magna sint amet mollit voluptate.
                                       </div>
                                      <div class="alert alert-info col-md-offset-2 col-md-5">
                                          <strong>Upper Intermediate</strong> <br>Nisi magna sint amet mollit voluptate.
                                       </div>
                                      <div class="alert alert-info  col-md-5">
                                          <strong>Advanced</strong> <br>Nisi magna sint amet mollit voluptate.
                                       </div>
                                      <div class="alert alert-info col-md-offset-2 col-md-5">
                                          <strong>Upper Advanced</strong> <br>Nisi magna sint amet mollit voluptate.
                                       </div>
                                       <div class="alert alert-info  col-md-5">
                                          <strong>Business</strong> <br>Nisi magna sint amet mollit voluptate.
                                       </div>
                                       <div class="alert alert-info col-md-offset-2 col-md-5">
                                          <strong>International Certificate</strong> <br>Nisi magna sint amet mollit voluptate.
                                       </div>
                                               </div>
                                              </div>
                                          </div>

                                        
                                        <div class="form-group">
                                              <div class="col-md-offset-1">
                                                    <label class="checkbox" >
                                                    <input type="checkbox" name="agree" id="terms"  class="term" onchange="activateButton(this)" value='1'>&nbsp;I have read and agree to the <b style="color: #00BEFF;cursor: pointer;"><strong>Terms and Conditions</strong></b> and <b style="color: #00BEFF;cursor: pointer;"><strong>Privacy Policy</strong></b>
                                                    </label>

                                              </div>
                                              <center><?= form_error('agree'); ?> </center>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                              <div class="col-md-5 ">
                                                <?= anchor('signup', 'Cancel',['class'=>'btn btn-info pull-right']);?> 
                                               </div>
                                               <div class=" col-md-2">
                                               <input type="submit" value="submit" id="submit" class="btn btn-primary">
                                              </div>
                                           </div>
                                        </div>
                                        </div>
                                        </form>

                                        </div>
                                    </section>

                       
                     

                    </div>
                </section>
<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
                

                <!-- Terms and conditions modal -->
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

            <div class="modal-footer" >
                <button type="button" class="btn btn-primary btn-sm" id="agreeButton" name="button" data-dismiss="modal"  style="margin: 20px;">Agree</button>
                
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

  $(document).ready(function(){

  $('#terms').click(function(){

        if (this.checked) {
            
            $('#termsModal').appendTo("body").modal('show');
            $('#agreeButton').click(function() {
            $('#terms').prop('checked', true);
          })
        }

        if(this.checked){
              $('#terms').prop('checked', false);
        }

    });

  });
</script>

<script>
$.validate({
  modules : 'location, date, security, file',
});
</script>