
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

</style>

<?php  if($this->session->flashdata('payment11')){ 
                                ?> 

<script> //swal("Good job!", "Payment Successful! Please Check Your Mail", "success");




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
   <?php
               
               $array_items =  [

                       'Total'             => '',
                       'Subtotal'          => '',
                       'Tax'               => '',
                       'PaymentMethod'     => '',
                       'PayerStatus'       => '',
                       'PayerMail'         => '',
                       'saleId'            => '',
                       'CreateTime'        => '',  
                       'UpdateTime'        => '',
                       'State'             => '',
                       'cust_id'           => '', 
                       'payment_id'        => ''
                           ];
                    $this->session->unset_userdata($array_items);                
                                 
                
                                } ?>

<section class="courses">
                    <div class="container"> 

                     
                        <!--======= TITTLE =========-->
                        <div class="tittle">
                            
                            <center> <a class=" btn btn-primary" href="#" data-toggle="tab"><b>Institute Profile</b></a></center>
                            <hr>
                        </div>
                       

                        <!--======= MONTH TITTLE =========-->
                      
<?php  $user['user'] = $this->ion_auth->user()->row(); ?>
               <?php foreach($user as $u); 

                {   
                    $user       = $u->id;
                    $user_id    = $u->id;
                    $username   = $u->username;
                    $email      = $u->email;
                    $pic        =$u->images;
                }
               ?>
                   
               <?php $center['center'] = Center::find_by_user_id($user_id);?>

                                 <?php //echo "<pre>";
                                // print_r($teacher);exit; ?>

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
        



                        <!--======= RODUCTS =========-->
                        <section class="products"> 
 <!-- <h3><?= $this->session->flashdata('succ'); ?></h3> -->

                            <!--======= PRODUCTS ROW =========-->
                            
                          <div class="row">
                              <div class="col-md-12">
                                  <div class=" col-md-12">
                                    
                                        <div class="row flex">
                                            <div class=" col-xs-6 col-lg-4">
                                                       <div style="margin-top: 20px;"></div>        


                                                 <ul class="list-group">

                                                  <?php 

                                                                    if($pic != "")
                                                                        {
                                                                        //show picture from database
                                                                        $pic;
                                                                        }
                                                                        else
                                                                        {
                                                                        //show generic picture
                                                                        $pic = "demo1.png";
                                                                        }
                                                                     ?>
                                                    <li class="list-group-item" contenteditable="false"><img class="" src="<?= base_url();?>uploads/images/<?= $pic; ?> " width="100%" height="200" alt=""></li>
                                                </ul>
                                            </div>

                                            <div class="col-xs-12 col-sm-6 col-lg-6">

                                                <ul class="list-group">
                                                    <li class="list-group-item  text-muted" contenteditable="false"><h2><a href="#"> </a></h2><h3><a href="#">Institute Details</a></h3></li>

                                                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Institute Name</strong></span><?php if($institute_name != ""){ echo $institute_name;}else{echo "&nbsp;";} ?></li>
                                                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Website</strong></span><?php if($website != ""){ echo $website;}else{echo "&nbsp;";} ?></li>
                                                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Email</strong></span><?php if($email != ""){ echo $email;}else{echo "&nbsp;";} ?></li>
                                                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Name</strong></span><?php if($contact_name != ""){ echo $contact_name;}else{echo "&nbsp;";} ?><?= $contact_name; ?></li>
                                                    <!-- <li class="list-group-item text-right"><span class="pull-left"><strong class="">Fee</strong></span><?php if($fee != ""){ echo $fee;}else{echo "&nbsp;";} ?></li> -->
                                                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Mobile</strong></span><?php if($mobile != ""){ echo $mobile;}else{echo "&nbsp;";} ?></li>
                                                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Skype Id</strong></span><?php if($skype_id != ""){ echo $skype_id;}else{echo "&nbsp;";} ?></li>

                                                </ul>
                                            </div>
                                        </div>                                  
                                  </div>
                              </div>

                              
                           
                              
                            
                              <!--  <div class="col-md-5">
                                  <div class=" col-md-12">
                                      <center><h4><a href="">Video</a></h4></center><br>
                                       <div class="embed-responsive embed-responsive-16by9">
                                        <php 

                                                                    if($vedio != "")
                                                                        {
                                                                        //show picture from database
                                                                        $vedio;
                                                                        }
                                                                        else
                                                                        {
                                                                        //show generic picture
                                                                        $vedio = "demo.mp4";
                                                                        }
                                                                     ?>
                                      <iframe class="embed-responsive-item video" src="<= base_url();?>uploads/video/<= $vedio; ?> " ></iframe>
                                      </div>
                                  </div>
                              </div> -->
                           
                    </div>  

                    <div class="row">
                        <!-- <div class="col-md-7">
                            <ul class="nav nav-tabs">
                              <li class="active"><a href="#home" data-toggle="tab">About Me</a></li>
                              <li><a href="#profile" data-toggle="tab">More</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                  <div class="tab-pane fade active in" id="home">
                                    <div class="row">
                                    <div class="col-md-6" ><h3 ><a href="#"><i class="fa fa-wrench"></i> Experience</a></h3><span><a href="">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <= $exp; ?>&nbsp; Year</a></span></div>
                                    <div class="col-md-6"><h3><a href="#"><i class="fa fa-book"></i> Teaching Method</a></h3> <span><a href=""> &nbsp &nbsp &nbsp  <= $teach; ?></a></span></div>
                                    <div class="col-md-6"><h3><a href="#"><i class="fa fa-map-marker"></i> Address</a></h3><span><a href=""> &nbsp &nbsp &nbsp <= $country; ?></a></span></div>
                                    <div class="col-md-6"><h3><a href="#"><i class="fa fa-language"></i> Experience</a></h3><span><a href=""> &nbsp &nbsp &nbsp <= $teach1; ?></a></span></div>
                                    </div>
                                  </div>
                                  <div class="tab-pane fade" id="profile">
                                   <div class="col-md-10"> <p></p></div>
                                  </div>
                        </div>
                        
                    </div>   -->  
                   <!--  <div class="col-md-5">
                        <div style="margin-top: 100px;"></div>
                            <center>
                                <ul>
                                  <li class=" btn btn-primary btn-block">Reserve a Trail</li>
                                </ul>
                          </center>

                            <center> 
                                <ul>
                                 <li class=" btn btn-primary btn-block">Book Now</li>
                               </ul>
                           </center>
                        </div> -->
    <div class="col-md-offset-5 col-md-2"> <a class=" btn btn-primary" href="<?= site_url('frontend/auth_login/insti_edit_profile'); ?>" ><b>Edit Profile</b></a></div>
    <div class="col-md-5" id="Booked"> <a class=" btn btn-primary booked" href="#profile" data-toggle="tab"><b>My Booked Teachers</b></a></div>
   <p>&nbsp;</p>
                        </div>  



                         <center> </center>
                            <centr>








        
        <div class="row">
              <div class="col-md-offset-2">
                <div class="text-danger">
                  <?php
                  $cart_check = $this->cart->contents();
                   //If cart is empty, this will show below message.
                  if (empty($cart_check)) {
                    
                  }
                  ?> 
                </div>
              </div>
            </div> 


                            <div id="myTabContent" class="tab-content">
                                  <div class="tab-pane fade active in" id="home">
                                  
                                  </div>
                                  <div class="tab-pane fade" id="profile">
                                    <?php $i = 1; $book = Booking::find_by_sql('SELECT * from bookings b left join users u on b.teacher_id = u.id  left join teachers t on b.teacher_id = t.user_id where b.indi_id ='.$user); 
                                   
                                    ?>
                                    <div class="row">

                                     <div class="col-md-11 col-md-offset-1"> <p>
                                      <table class="table table-striped table-bordered display" style="width:100%" id="invo1">
                                        <thead>
                                      <tr>
                                        <th>No</th>
                                        
                                        <th>Teacher Name</th>
                                        <th>Date</th>

                                        <th>Language</th>
                                        <th>Email_Id</th>
                                        <th>Skype</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach ($book as  $b):  ?>
                                        <tr>
                                          <td><?= $i++;?></td>
                                         
                                          <td><?= $b->first_name; ?></td>
                                           <td><?= date_format($b->date1,'d M Y h:i:a') ?></td>
                                          <td><?php if($b->lang1){ echo $b->lang1; }else{echo $b->subject;} ?></td>
                                          <td><?= $b->email; ?></td>
                                          <td><?= $b->skype; ?></td>
                                        </tr>
                                      <?php endforeach; ?>
                                      <tbody>
                                    </table>
                                   </p>
                                   </div>
                                  </div>
                                </div>
                     </centr>     
                         </section>

                       
                     

                    </div>
                </section>

              <div class="row">    
              <div class="col-md-12" id="remove21">
                <?php echo form_open(base_url("calenderview/removes")); ?>
                <table cellpadding="6" cellspacing="1" style="width:80%; margin-left: 10%;" border="0" class="table table-bordered table-striped">
                  <?php
                  $user = $this->ion_auth->user()->row();
                  $name = $user->first_name . " " . $user->first_name;
                 // All values of cart store in "$cart". 
                  ?>
                  <?php if ($this->cart->contents()): 
                     // print_r($this->cart->contents());
                  ?>
                    <tr >
                      <th>Select</th>
                      <th>Serial</th>
                      <th>Teacher Name</th>
                      <th>Language</th>
                      <th>Booked Date</th>
                      <th style="text-align:right">Amount</th>
                      <th style="text-align:right">Sub-Total</th>
                    </tr>
                    <?php $i = 1; ?>
                    <?php $j = 1; ?>
                    <?php //  echo "<pre>"; print_r($this->cart->contents());   ?>
                      <?php foreach ($this->cart->contents() as $items): ?>
                        <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
                        <input title="id" name="id1" type="hidden" value="<?= $this->uri->segment(3); ?>">

                        <tr>
                          <td>
                            <input type="checkbox" class="del" name="del[]" value="<?php echo $items['rowid']; ?>">
                          </td>
                          <td>
                            <?php echo $j++; ?>
                          </td>
                          
                          <td>
                            <?php echo $items['teacher_name']; ?>

                          </td>
                          <td>
                            <?php echo $items['lang']; ?>
                            <!-- <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
                              <p>
                                <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
                                  <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />
                                <?php endforeach; ?>
                              </p>
                            <?php endif; ?> -->
                          </td>
                          <td>
                            <?php $date = new DateTime($items['date']); echo date_format($date, 'd-m-Y H:i:s'); ?>

                          </td>
                          <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                          <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                        </tr>
                        <?php $i++; ?>
                      <?php endforeach; ?>
                      <tr>
                        <td colspan="7">&nbsp;</td>
                      </tr>
                      <tr>

                        <!-- <td colspan="2"> </td> -->
                        <td colspan="5"> </td>
                        <td style="text-align:right"><strong>Total</strong></td>
                        <td style="text-align:right"><strong>$<?php echo $this->cart->format_number($this->cart->total()); ?></strong></td>
                      </tr>
                      
                      <tr>
                        <td colspan="7"> <p style="width:80%; margin-left: 10%;">

                        <!-- <//php eho anchor('calenderview/removes/' . $items['rowid'] . '/' . $this->uri->segment(3), 'Remove', ['class' => 'btn btn-primary ']); ?> -->
                        <div class="row">
                        <div class="col-md-offset-2 col-md-4">
                        
                        <?= form_submit('Remove', 'Remove',['class' => 'btn btn-primary btn-sm ','style'=>'height:25px;width:150px;text-align: center; line-height: 7px;background: #009cde;','id'=>'remove_id']);?></div>
                        <div class="col-md-offset-2 col-md-4">
                        <div class='pay'>
                       <div id="paypal-button-container"></div>
                      </div>
                      </div>
                       </div>
                      </p></td>
                      </tr>
                    <?php endif; ?>
                  </table>
                 
                  <?php echo form_close(); //print_r($this->session->all_userdata());?>
                </div>
              </div>



 <script type="text/javascript">
                // To conform clear all data in cart.
                function clear_cart() {
                    var result = confirm('Are you sure want to clear all bookings?');
                    if (result) {
                        window.location = "<?php echo base_url(); ?>insti_book/removes";
                    } else {
                        return false; // cancel button
                    }
                }
            </script>

<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script type="text/javascript">
  
              paypal.Button.render({

              env: 'sandbox', // sandbox | production

                      style: {
                size: 'small',
                color: 'blue',
                shape: 'rect',
                label: 'pay',
                tagline:'false',
            },

            // PayPal Client IDs - replace with your own
            // Create a PayPal app: https://developer.paypal.com/developer/applications/create
            client: {
                sandbox:    'AYSq3RDGsmBLJE-otTkBtM-jBRd1TCQwFf9RGfwddNXWz0uFU9ztymylOhRS',
                production: '<insert production client id>'
            },

            // Show the buyer a 'Pay Now' button in the checkout flow
            commit: true,

            // payment() is called when the button is clicked
            payment: function(data, actions) {

                // Make a call to the REST api to create the payment
                return actions.payment.create({

                   
                    payment: {
                        transactions: [
                            {
                                amount: { total: '<?php echo $this->cart->format_number($this->cart->total()); ?>', currency: 'USD' }
                            }
                        ]
                    }
                });
            },

            // onAuthorize() is called when the buyer approves the payment
            onAuthorize: function(data, actions) {

                // Make a call to the REST api to execute the payment
                return actions.payment.execute().then(function(payment) {

                    // $('#asds').modal('show');
                    // $('#print11').click();

                   var ourObj = {};

                       ourObj.data = payment;

                    jQuery.ajax({
                    type: "POST",
                    url: "<?= site_url('Paypal'); ?>",
                    data: {"points" : JSON.stringify(ourObj)},
                     success: function(data){ 


                      $('.work-in-progress').show();
                       setTimeout(function(){ window.location = "<?php echo base_url('insti_book/save_order'); ?>"; }, 500);
                           

           }



         });

                   

                    
                });
            }

        }, '#paypal-button-container');

    
</script>

<!-- <script type="text/javascript">
   $('.booked').click();
</script> -->
               
<script>

  $('#remove_id').attr('disabled', 'disabled');

  $('.del').on("click",function () {
    
    if($('.del:checked').length > 0)
{      
        $('#remove_id').removeAttr('disabled');
     
}else{
  
  $('#remove_id').attr('disabled', 'disabled');
}
  })
  

</script>




<script type="text/javascript">
$(document).ready(function() {
    $('#invo1').DataTable({

         dom: 'Bfrtip',
        buttons: [
             'excel', 'pdf', 'print'
        ],
        "pagingType": "full",
      

        
        
    });
});
</script>




<script type="text/javascript">

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

       $('.work-in-progress').show();
       
    }
};


 
</script>


 <script>
                      ;(function($){
                      
                        
                        $.fn.scrollPosReaload = function(){
                            if (localStorage) {
                                var posReader = localStorage["posStorage"];
                                if (posReader) {
                                    $(window).scrollTop(posReader);
                                    localStorage.removeItem("posStorage");
                                }

                                $('#remove_id').click(function(e) {
                                    localStorage["posStorage"] = $(window).scrollTop();
                                });
                               

                                return true;
                            }

                            return false;
                        }
                        
                        /* ================================================== */

                        $(document).ready(function() {
                            // Feel free to set it for any element who trigger the reload
                            $('#remove_id').scrollPosReaload();

                            //$('#pagee1').scrollPosReaload();

                          
                                          
                        });
                      
                    }(jQuery)); 

           </script>
