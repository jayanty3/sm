<script>
 function disableSubmit() {
  document.getElementById("dis1").disabled = true;
 }

  function activateButton(element) {

      if(element.checked) {
        document.getElementById("dis1").disabled = false;
       }
       else  {
        document.getElementById("dis1").disabled = true;
      }

  }
</script>


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

                            header( "refresh:3; url=http://localhost/projects/sm/frontend/auth_login/main" ); }?>
                        </div>
                       

                        <!--======= MONTH TITTLE =========-->
                      

                        <!--======= RODUCTS =========-->
                        <section class="products"> 
                          <center><a href="javascript:void(0)" class=" btn btn-primary ">Teaching Center</a></center>

                            <!--======= PRODUCTS ROW =========-->
                            
                          
                            <!-- <form class="form-horizontal"> -->
                              <?=  form_open_multipart('register-institute',['class'=>'form-horizontal','id'=>'form1']); ?>
  
  <fieldset>
    <legend>
               <h3><?= $this->session->flashdata('fail'); ?></h3>
      
      </legend>


 
   

<div class="form-group">
      <label for="inputEmail" class="col-lg-3 control-label"> Institute Name<b>*</b></label>
      <div class="col-lg-7">
        <input type="text" class="form-control"  placeholder="Enter Your Institute Name" name="institute_name" value="<?= set_value('institute_name')?>" data-validation="required">
         <i><?= form_error('institute_name'); ?></i>
      </div>
      
    </div>

   <div class="form-group">
      <label for="inputEmail" class="col-lg-3 control-label"> Contact Name<b></b></label>
      <div class="col-lg-7">
        <input type="text" class="form-control"  placeholder="Enter Your Contact Name" name="contact_name" value="<?= set_value('contact_name')?>">
        <i><?= form_error('contact_name'); ?></i>
      </div>
       
    </div>

    <div class="form-group">
      <label for="inputEmail" class="col-lg-3 control-label"> Email Id<b>*</b></label>
      <div class="col-lg-7">
        <input type="text" class="form-control"  placeholder="Enter Your Email Id" name="email" value="<?= set_value('email')?>" data-validation="email">
        <i><?= form_error('email'); ?></i>
      </div>
       
    </div>

    <div class="form-group">
      <label for="inputEmail" class="col-lg-3 control-label"> Skype Id<b></b></label>
      <div class="col-lg-7">
        <input type="text" class="form-control"  placeholder="Enter Your Skype Id" name="skype_id" value="<?= set_value('skype_id')?>">
        <i><?= form_error('skype_id'); ?></i>
      </div>
       
    </div>

     <div class="form-group">
      <label for="inputEmail" class="col-lg-3 control-label">Mobile Number</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" id="inputEmail" placeholder="0125486555" name="mobile" value="<?= set_value('mobile')?>">
                <i><?= form_error('mobile'); ?></i>
              </div>
              
     </div>


     <div class="form-group">
      <label for="inputEmail" class="col-lg-3 control-label"> Website<b></b></label>
      <div class="col-lg-7">
        <input type="text" class="form-control"  placeholder="Enter Your Website" name="website" value="<?= set_value('website')?>" >
         <i><?= form_error('website'); ?></i>
      </div>
      
    </div>
   
     <div class="form-group">
      <label for="inputEmail" class="col-lg-3 control-label"> Password<b></b></label>
        <div class="col-lg-7">
        <input type="password" class="form-control" id="exampleInputAmount" placeholder="Password" name="cpass" data-validation="required">
        <i><?= form_error('cpass'); ?></i>
        </div>
      
  </div>
  <div class="form-group">
      <label for="inputEmail" class="col-lg-3 control-label">Confirm Password<b></b></label>
        <div class="col-lg-7">
        <input type="password" class="form-control" id="exampleInputAmount" placeholder="Password Confirm" name="password_confirm" data-validation="required">
        <i><?= form_error('password_confirm'); ?></i>
        </div>
      
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

                                                 
     
                                              <div >
                                                    <label class="col-md-offset-4">
                                                    <input type="checkbox" name="agree" id="terms" value='1'>&nbsp;I have read and agree to the <b style="color: #00BEFF;cursor: pointer;"><strong>Terms and Conditions</strong></b> and <b style="color: #00BEFF;cursor: pointer;"><strong>Privacy Policy</strong></b>
                                                    </label>
                                                    <center><i><?= form_error('agree'); ?></i></center>

                                              </div>
                                          
                                        



  
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <div class="row">
          <div class="col-md-5 ">
<?= anchor('signup', 'Cancel',['class'=>'btn btn-info pull-right']);?> 
          </div>
          <div class=" col-md-2">
          <input type="submit" class="btn btn-primary pull-left" name="Submit" id="dis"  value="Submit">
          </div>
        </div>
      </div>
    </div>
  </fieldset>
<?= form_close();?>
                            

                                        
                         </section>

                       
       <?php $user = $this->ion_auth->user()->row();
        $groups = $this->ion_auth->groups()->result_array(); 
    $name = $this->input->post('contact_name');
    $name1 = $this->input->post('contact_name');

    
        ?>              

                    </div>
                </section>


<div id="pay2" class="modal fade" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top: 60px;">
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







  <div id="pay3" class="modal fade" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top: 60px;">
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
          </div>
          <!--======= CONTACT =========-->
        </div>
        


        <div class="modal-footer">
          
          <button type="button" class=" btn-danger btn-xs" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
              $('.abc').click(function(){
                $('#form1').submit();

});
            </script>



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