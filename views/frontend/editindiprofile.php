

            <!--======= BANNER =========-->
            

            <!--======= CONTENT START =========-->
            <div class="content"> 

                <!--======= INTRESTED =========-->
                <section class="courses">
                    <div class="container"> 
                        <!--======= TITTLE =========-->
                        <div class="tittle">
                            <h3>Edit Individuals</h3>
                              <div class="pull-right"><?php echo anchor('individual', 'Back',["class"=>"btn btn-primary"]); ?></div>
                                 </div>
                            <hr>
                        </div>
                       
                       <?php echo $this->session->flashdata('succ'); ?>
                       <?php echo $this->session->flashdata('fail'); ?>
                        <!--======= MONTH TITTLE =========-->
          <?php  $user['user'] = $this->ion_auth->user()->row(); 

               
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
                          <div class="col-md-6 col-md-offset-3">    
                              <h3 class="text-danger"><?= $this->session->flashdata('fail'); ?></h3>
                             
                                <?php echo form_open_multipart('frontend/auth_login/editprofile'); ?>

                                       <div class="form-group">
                                          
                                          <div class="form-group">
                                            <label class="sr-only" for="exampleInputAmount">First Name</label>
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                              <input type="text" class="form-control" id="exampleInputAmount" placeholder="First Name" name="first_name" value="<?php echo set_value('first_name',$first_name);?>">
                                              
                                              
                                            </div>
                                            <?= form_error('first_name'); ?>
                                          </div>
                                        </div>

                                        
                                        <div class="form-group">
                                          
                                          <div class="form-group">
                                            <label class="sr-only" for="exampleInputAmount">Last Name</label>
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                              <input type="text" class="form-control" id="exampleInputAmount" placeholder="Last Name" name="last_name" value="<?php echo set_value('last_name',$last_name);?>">
                                            </div>
                                            <?= form_error('last_name'); ?>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          
                                          <div class="form-group">
                                            <label class="sr-only" for="exampleInputAmount">Email</label>
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                              <input type="text" class="form-control" id="exampleInputAmount" placeholder="Email" name="email" value="<?php echo set_value('email',$email);?>">
                                            </div>
                                            <?= form_error('email'); ?>
                                          </div>
                                        </div>


                                        <div class="form-group">
                                          
                                          <div class="form-group">
                                            <label class="sr-only" for="exampleInputAmount">Skype</label>
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="fa fa-skype"></i></div>
                                              <input type="text" class="form-control" id="exampleInputAmount" placeholder="Skype" name="skype" value="<?php echo set_value('skype',$skype);?>">
                                            </div>
                                            <?= form_error('skype'); ?>
                                          </div>
                                        </div>


                                      <div class="form-group">
                                          
                                          <div class="form-group">
                                            <label class="sr-only" for="exampleInputAmount">Facebook</label>
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="fa fa-facebook"></i></div>
                                              <input type="text" class="form-control" id="exampleInputAmount" placeholder="Facebook" name="facebook" value="<?php echo set_value('facebook',$facebook);?>">
                                            </div>
                                            <?= form_error('facebook'); ?>
                                          </div>
                                        </div>



                                        <div class="form-group">
                                          <div class="input-group">
                                              <div class="input-group-addon "><i class="fa fa-venus-mars"></i></div>
                                              <select type="text" class="form-control" id="exampleInputAmount" placeholder="Gender" name="gender">
                                                <option value="" disabled selected hidden>Choose Your Gender...</option>
                                                <option value="male" <?php if ($gender ==  "male") {echo "selected";} ?>>Male</option>
                                                <option value="female" <?php if ($gender ==  "female") {echo "selected";} ?>>Female</option>
                                                
                                              </select>
                                              </div>
                                            <?= form_error('gender'); ?>
                                        </div>
                                        <?php $contr = Countr::find('all'); ?>

                                        <div class="form-group">
                                          <div class="input-group">
                                              <div class="input-group-addon "><i class="fa fa-globe"></i></div>
                                              <select type="text" class="form-control" id="exampleInputAmount"  name="country">
                                                <option value="" disabled selected hidden>Choose Your country...</option>
                                                <?php foreach ($contr as $uni):?>
                                                <option value='<?= $uni->country_name;?>' <?php if ($country ==  $uni->country_name) {echo "selected";} ?>><?= $uni->country_name;?></option>
                                                <?php endforeach; ?>
                                              </select>
                                              </div>
                                            <?= form_error('country'); ?>
                                        </div>

                                                                               

                                        <div class="form-group">
                                          
                                          <div class="form-group">
                                           
                                            <div class="input-group">
                                              <div class="input-group-addon "><i class="fa fa-globe"></i></div>

                                              <input type="text" class="form-control" id="exampleInputAmount" placeholder="City" name="city" value="<?php echo set_value('city',$city);?>">
                                              
                                            </div>
                                            <?= form_error('city'); ?>
                                          </div>
                                        </div>


                                        <div class="form-group row">
                                          <div class="col-md-12 well well-sm">
                                             <label class="col-md-6" for="fee">
                                             <input type="checkbox" name="levels[]"  value="Beginner"    <?php if(in_array("Beginner", $level) == 'Beginner') {echo "checked";} ?>>
                                             &nbsp;&nbsp;&nbsp;Beginner
                                             </label>
                                             <label class="col-md-6" for="fee">
                                             <input type="checkbox" name="levels[]"  value="Upper Beginner"    <?php if(in_array("Upper Beginner", $level) == 'Upper Beginner') {echo "checked";} ?>>
                                             &nbsp;&nbsp;&nbsp;Upper Beginner
                                             </label>
                                             <label class="col-md-6" for="fee">
                                             <input type="checkbox" name="levels[]"  value="Intermediate"    <?php if(in_array("Intermediate", $level) == 'Intermediate') {echo "checked";} ?>>
                                             &nbsp;&nbsp;&nbsp;Intermediate
                                             </label>
                                             <label class="col-md-6" for="fee">
                                             <input type="checkbox" name="levels[]"  value="Upper Intermediate"    <?php if(in_array("Upper Intermediate", $level) == 'Upper Intermediate') {echo "checked";} ?>>
                                             &nbsp;&nbsp;&nbsp;Upper Intermediate
                                             </label>
                                             <label class="col-md-6" for="fee">
                                             <input type="checkbox" name="level[]"  value="Advanced"   <?php     if(in_array("Advanced", $level) == 'Advanced') {echo "checked";} ?> >
                                             &nbsp;&nbsp;&nbsp;Advanced
                                             </label>
                                             <label class="col-md-6" for="fee">
                                             <input type="checkbox" name="levels[]"  value="Upper Advanced"    <?php if(in_array("Upper Advanced", $level) == 'Upper Advanced') {echo "checked";} ?>>
                                             &nbsp;&nbsp;&nbsp;Upper Advanced
                                             </label>
                                             <label class="col-md-6" for="fee">
                                             <input type="checkbox" name="levels[]"  value="Business"    <?php if(in_array("Business", $level) == 'Business') {echo "checked";} ?>>
                                             &nbsp;&nbsp;&nbsp;Business
                                             </label>
                                             <label class="col-md-6" for="fee">
                                             <input type="checkbox" name="levels[]"  value="International Certificate"    <?php if(in_array("International Certificate", $level) == ' International Certificate') {echo "checked";} ?>>
                                             &nbsp;&nbsp;&nbsp;International Certificate
                                             </label>
                                             <center><?= form_error('levels');?></center>
                                             <p>&nbsp;</p>
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
                                            <div class=" col-md-offset-5">
                                           <input type="submit" name="submit" value="submit" class=" btn btn-primary" >
                                           </div>
                                        </div>
                                        </div>
                                        </form>

                                        </div>
                                    </section>

                       
                     

                    </div>
                </section>

                <!--======= QUOTE =========-->
               