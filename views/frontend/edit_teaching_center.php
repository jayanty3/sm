

            <!--======= CONTENT START =========-->
<?php  $user['user'] = $this->ion_auth->user()->row(); ?>
               <?php foreach($user as $u); 
                {   $user_id    = $u->id;
                    $username   = $u->username;
                    $email      = $u->email;
                    $image      =$u->images;
                }
               ?>
                   
               <?php $center['center'] = Center::find_by_user_id($user_id);?>

                                 <?php //echo "<pre>";
                                //  print_r($center);exit; ?>

                                <?php foreach($center as $u); 
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
                            <h3>Edit Registration</h3>
                            
                            <hr>
                        </div>
                      <center> <?php echo validation_errors(); ?></center>

                        <!--======= MONTH TITTLE =========-->
                      

                        <!--======= RODUCTS =========-->
                        <section class="products"> 

                            <!--======= PRODUCTS ROW =========-->
                            
                           <?=  form_open_multipart('frontend/auth_login/insti_edit_profile',['class'=>'form-horizontal','id'=>'form1']); ?>
  <fieldset>
    <legend><center> <a class=" btn btn-primary" href="#" data-toggle="tab"><b>Institute Profile</b></a></center>
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
      <div class="col-lg-10 col-lg-offset-2">
        <div class="row">
          <div class="col-md-5 ">
<?= anchor('institute-profile', 'Cancel',['class'=>'btn btn-info pull-right']);?> 
          </div>
          <div class=" col-md-2">
          <input type="submit" class="btn btn-primary pull-left" name="Submit" id="dis"  value="Upadte">
          </div>
        </div>
      </div>
    </div>
  </fieldset>
<?= form_close();?>
                            

                                        
                         </section>
  
    </div>
  </section>
</div>

     


  


           
                     






