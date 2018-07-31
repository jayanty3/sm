  <?php

require_once(APPPATH.'libraries/class.phpmailer.php');

//PHPMailer Object
$mail = new PHPMailer(true);

 if (isset($_POST['submit'])) {
       
$name                 = $_REQUEST['name'];
$email                = $_REQUEST['email'];
$website              = $_REQUEST['website'];
$message              = $_REQUEST['message'];
$Company              = $_REQUEST['Company'];


        

        //$to      = "jayant.yadav@dignitech.com";
        $email_subject = "hi My is $name and i have some query.";
            $message  =  "My name is $name, I need more information about this website.\n"."Here is the detail:\n"."
            <table>
           <tr><td> Name:</td><td>       $name</td></tr> 
           <tr><td> Email Id:</td><td>   $email</td></tr> 
           <tr><td> Website:</td><td>    $website</td></tr> 
           <tr><td> Message:</td><td>    $message</td></tr> 
           <tr><td> Company:</td><td>    $Company</td></tr> 
            </table>
                            ";
        $email_body = "Dear Sir/Madam,\n"."\n $message";
        $headers = "";

        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->Host       = "mail.designermore.com"; // SMTP server
        $mail->SMTPDebug  = 1;              // enables SMTP debug information (fortesting)                                        
        $mail->SMTPAuth   = true;                  // enable SMTP authentication
        $mail->Host       = "sg2plcpnl0154.prod.sin2.secureserver.net"; // sets the SMTP server
        $mail->SMTPSecure = "tls"; 
        $mail->Port       = 587;      // set the SMTP port for the GMAIL server               
        $mail->Username   = "contact-gfm@designermore.com"; // SMTP account username
        $mail->Password   = "a}+wP8RPD~Am";  
        $mail->SetFrom('contact-gfm@gmail.com', 'Admin');

     //$mail->FromName = "Admin";



     $mail->addAddress("jayant.yadav@dignitech.com"); //Recipient name is optional




//Send HTML or Plain Text email
     $mail->isHTML(true);  
 
     $mail->Subject = $email_subject;
     $mail->Body = "<i>$email_body</i>";

                  if($mail->send())
                  {
            header("location:contact?success");


                   }
                  else
                  {
                
            header("location:contact?fail");
                 } 
   }     
?>
 
 
            <!--======= CONTENT START =========-->
            <div class="content"> 

                <!--======= CONTACT =========-->
                <section class="contact"> 

                    <!--======= MAP =========-->
                   
                    <div class="container"> 
                                           <?php if (isset($_GET['success'])) {?>
                                            

                                <script>swal("Good job!","Your mail has been sent successfully!", "success");</script>

                                            <?php }?> 

                                            <?php if (isset($_GET['fail'])) { ?>

                          <script> swal("Oops...!", "Unable to send! .Please Try Again Later", "error"); </script>
                                            
                                          <?php }?> 

                        <!--======= CONTACT INFORMATION =========-->
                        <div class="contact-info">
                            <div class="row"> 

                                <!--======= CONTACT FORM =========-->
                                <div class="col-sm-6">
                                    <h3>get in touch</h3>
                                   



                                    <p class="margin-b-40">Hello we are comre. We are here to provide you the best offers through our 
                                        coupons. Hello we are comre.</p>
                                    <div id="contact_message" class="success-msg"> <i class="fa fa-paper-plane-o"></i>Thank You. Your Message has been Submitted</div>
                                    <form   method="post" action="#" >
                                        <div class="row">
                                            <div class="col-md-6">
                                                
                                                <input type="text" class="form-control"
                                                       name="name"  placeholder="Name"
                                                        title="Name is required" required
                                                       ><p>&nbsp;</p>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                       name="email"  placeholder="Email"
                                                        title="Email is required" required
                                                       ><p>&nbsp;</p>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                       name="company"  placeholder="Company" 
                                                       ><p>&nbsp;</p>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                       name="website"  placeholder="Website" 



                                                       ><p>&nbsp;</p>
                                            </div>
                                            <div class="col-md-12">
                                                <textarea class="form-control"
                                                          name="message" placeholder="Message" rows="5" cols="30"  required
                                                            
                                                          style="padding-left: 11px;"></textarea><p>&nbsp;</p>
                                            </div>
                                            <div>
                                                <!-- <button type="submit" value="submit" name="submit" class="btn" id="btn_submit">SEND MESSAGE</button> -->

                                            </div>
                                        </div>
                                        <input type="submit" name="submit" value="SEND MESSAGE" class="btn btn-primary pull-right" >
                                    </form>
                                </div>
                                <!--======= CONTACT =========-->
                                <div class="col-sm-6">
                                    <h3>Contact Info</h3>
                                    <p class="margin-b-40">Hello we are comre. We are here to provide you the best offers through our 
                                        coupons. Hello we are comre.</p>
                                    <ul class="con-det">

                                        <!--======= ADDRESS =========-->
                                        <li> <i class="fa fa-map-marker"></i>
                                            <h6>Address</h6>
                                            <p>121 King St, Melbourne VIC 3000,<br>
                                                Australia </p>
                                        </li>

                                        <!--======= EMAIL =========-->
                                        <li> <i class="fa fa-envelope"></i>
                                            <h6>email</h6>
                                            <p>name@site.com</p>
                                            <p>name@site.com</p>
                                        </li>

                                        <!--======= ADDRESS =========-->
                                        <li> <i class="fa fa-phone"></i>
                                            <h6>our phone</h6>
                                            <p>(123) 45678 964</p>
                                            <p>(123) 45678 964</p>
                                        </li>
                                    </ul>

                                    <!--======= SOCIAL ICON =========-->
                                    <ul class="social_icons">
                                        

                                      <li class="youtube"><a href="https://www.youtube.com/channel/UCcVhddWE4WiHk2J5LFKD_mg" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                        <li class="facebook"><a href="https://www.facebook.com/Langbee-382964022192428/"  target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        <li class="skype"><a href="info@langbee.com"><i class="fa fa-skype" target="_blank"></i></a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                 

                                          