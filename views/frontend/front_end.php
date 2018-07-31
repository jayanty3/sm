<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
        <title>School Management</title>
        <meta name="keywords" content="-School Management HTML5 Theme" >
        <meta name="description" content="Language  School Management HTML5 Theme">
        <meta name="author" content="jThemes Studio">

        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- FONTS ONLINE -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:500,900,300,700,400' rel='stylesheet' type='text/css'>

        <!--MAIN STYLE-->
        <link href="<?= base_url();?>assets/front/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url();?>assets/front/css/owl.carousel.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url();?>assets/front/css/main.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url();?>assets/front/css/style.css" rel="stylesheet" type="text/css">       
        <link href="<?= base_url();?>assets/front/css/responsive.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url();?>assets/front/css/animate.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url();?>assets/front/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        
        
        <script src="<?= base_url(); ?>assets/front/js/jquery-2.2.4.min.js"></script> 

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" rel="stylesheet" type="text/css" >
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

         <!--======= flag-icon CSS =========-->
          <link href="<?= base_url();?>assets/front/css/flag-icon/css/flag-icon.min.css" rel="stylesheet" type="text/css">
          
       
        <style>

                  .modal-footer {
                                     padding: 0px; 
                                    text-align: right;
                                    border-top: 0px solid #e5e5e5; 
                                }

                  .modal-header {
                      min-height: 16.42857143px;
                      padding: 15px;
                      border-bottom: 0px solid #e5e5e5; 
                  }
                
                .alert-danger {
                 color:red;
                 background-color: #07abed;
                 border-color: #C3E0FF;
                 }

                 .alert-success {
                 color: white;
                 background-color: #07abed;
                 border-color: #C3E0FF;
                 }
                  #calendar {
                    max-width: 50%;
                    margin: 0 auto;
                  }
                @media screen {
                  #printSection {
                      display: none;
                  }
                }

                @media print {
                  body * {
                    visibility:hidden;
                  }
                  #printSection, #printSection * {
                    visibility:visible;
                  }
                  #printSection {
                    position:absolute;
                    left:0;
                    top:0;
                  }
                }
.signal {
    border: 5px solid #333;
    border-radius: 30px;
    height: 30px;
    left: 50%;
    margin: -15px 0 0 -15px;
    opacity: 0;
    position: absolute;
    top: 50%;
    width: 30px;
 
    animation: pulsate 1s ease-out;
    animation-iteration-count: infinite;
}

@keyframes pulsate {
    0% {
      transform: scale(.1);
      opacity: 0.0;
    }
    50% {
      opacity: 1;
    }
    100% {
      transform: scale(1.2);
      opacity: 0;
    }
}


.signal1 {
    border: 5px solid #333;
    border-radius: 30px;
    height: 30px;
    left: 50%;
    margin: -15px 0 0 -15px;
    opacity: 0;
    position: absolute;
   
    width: 30px;
 
    animation: pulsate 1s ease-out;
    animation-iteration-count: infinite;
}

@keyframes pulsate {
    0% {
      transform: scale(.1);
      opacity: 0.0;
    }
    50% {
      opacity: 1;
    }
    100% {
      transform: scale(1.2);
      opacity: 0;
    }
}
</style>






<style>
#myCarousel .nav a small {
    display:block;
}
#myCarousel .nav {
  background:#eee;
}
#myCarousel .nav a {
    border-radius:0px;
}
.courses {
    padding: 20px 0 !important;
}

.nav-pills > li > a{

 background-color: lightgrey;

}
    .nav-pills > li.active > a, .nav-pills > li.active > a:focus {
        color: white;
        background-color: #0096ff;
    }

        .nav-pills > li.active > a:hover {
            color: white;
        background-color: #0096ff;
        }

.nav-pills.nav-justified > li.active > a,.nav-justified > li.active > a:focus{
color: white;
        background-color: #0096ff;
}
.nav-justified > li.active > a:hover {
            color: white;
        background-color: #0096ff;
        }


</style>
        <style type="text/css">

        .goog-te-gadget-simple{
          padding-top: 40px;
          background-color: #fff;
          border-left: 0px solid #d5d5d5;
          border-top: 0px solid #9b9b9b;
          border-bottom: 0px solid #e8e8e8;
          border-right: 0px solid #d5d5d5;
          font-size: 10pt;
          display: inline-block;
          
          padding: 45px 10px;
          padding-bottom: 40px;
          
          cursor: pointer;
          zoom: 1;
        }

        .goog-te-gadget-icon{
          width: 0px;
          height: 0px;
        }

        .goog-te-menu-value span{
          color: #777;
          font-size: 15px;
          line-height: 20px;
        }

            .image {
                      opacity: 1;
                      transition: .5s ease;
                      backface-visibility: hidden;
                    }

            .middle {
              transition: .5s ease;
              opacity: 0;
              position: absolute;
              top: 50%;
              left: 50%;
              transform: translate(-50%, -50%);
              -ms-transform: translate(-50%, -50%)
            }

div.image:hover .image {
  opacity: 0.3;
}

div:hover .middle {
  opacity: 1;
}

.text {
  background-color: #4CAF50;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
}
.fa.facebook:hover{
    display: block;
    width: 30px;
    height: 30px;
    color: #fff;
    background-color: #3b5a9b;
    text-decoration: none;
    border-radius: 4px;
    text-align: center;
   
}

div#OR {
    height: 30px;
    width: 30px;
    border: 1px solid #C2C2C2;
    border-radius: 50%;
    font-weight: bold;
    line-height: 28px;
    text-align: center;
    font-size: 12px;
    float: right;
    position: absolute;
    right: 282px;
    top: 66%;
    z-index: 1;
    background: #DFDFDF;
}



        </style>
        
    </head>
    <body>
        <!--======= PRELOADER =========-->
        <!-- <div class="work-in-progress">
            <div id="preloader">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div> -->

       

        <!--======= WRAPPER =========-->
        <div id="wrap"> 

         <div class="modal" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
          <div class="modal-dialog" style="border: 0px;">
            <div class="modal-content" >
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><img src="<?=base_url(); ?>assets/front/images/cut1.png" width="20px" height="20px"></button>
                  <p>&nbsp;</p>
                  <p>
                   
                    <div class="row">
                         <div class="col-md-2"></div>

                         <div class="col-md-8">

                          <center> <a href="<?=getFacebookLoginUrl('frontend/auth_login/fb_login')?>" class="btn btn-primary btn-block" style="font-size: 18px; text-transform: capitalize; background-color: #3b5998; padding: 10px 15px;"><span class="fa fa-facebook pull  pull-left" style="padding-top: 4px;"></span>
                            
                           <span  style="font-size: 16px;">Sign in with Facebook</span> </a></center>
                                           
                                           
                          <li class="col-md-offset-3 col-md-6">
                            <center> -----OR-----</center></li>
                                            <br>
                                           
                          <button id="loginbtn" type="button" class="btn btn-primary btn-block" data-toggle="collapse" data-target="#demo">Login</button></div><div class="col-md-3"></div>
                         
                    </div>
                    

              <div id="demo" class="collapse">

               </p>
                
              <div class="modal-body" style="padding-left: 34px;">
                 <div class="row"> 

                                        <!--======= CONTACT FORM =========-->
                                        
                                        <div class="col-md-12">
                                         
                                            <div style="padding-top: 30px;
                                                        padding-bottom: 20px;">
                                              <div class="signal1" ></div>

                                               </div>
                                             <!-- <p class="login-box-msg"><div id="infoMessage" class="text-danger"> </div></p>  -->
                                              <div id="the-message"></div>

                                            <?php $attributes = array( "id" => "contact_form",'role'=>'form');?>

                                              <?php echo form_open("frontend/auth_login/login",$attributes);?>
                                                <ul class="row">
                                                   
                                                    <li class="col-md-12 form-group">
                                                        <input type="email" class="form-control"
                                                               name="identity" id="identity" placeholder="Enter Email"  value="<?= $this->form_validation->set_value('identity'); ?>" 
                                                               data-toggle="tooltip" title="Email is required"
                                                                data-validation="email"><br>
                                                               
                                                    </li>
                                                    
                                                    
                                                    <li class="col-md-12 form-group">
                                                        <input type="password" class="form-control"
                                                               name="password" id="password" placeholder=" Password" 
                                                                data-validation="required">
                                                               
                                                    </li>
                                                    
                                                      <center><a href="<?= site_url('forgot-password

                                                        ');?>"><strong><?php echo lang('login_forgot_password');?></strong></a></center>
                                                    
                                                   </ul>
                                                   <ul class="row">
                                                    <li class="col-md-offset-2 col-md-8">
                                                        
                                                        <button type="submit"  class="btn btn-primary btn-block" style="height: 40px;" >Log In</button>
                                                        
                                                    </li>

                                                </ul>
                                            <?php echo form_close();?>
                                        </div>
                                        <!--======= CONTACT =========-->
                                    </div>
              </div>
               <hr>
            </div>

             <ul class="row">
                                                   
                              <li class="col-md-offset-3 col-md-6"><center> <p>&nbsp;</p></center></li>
                                                    <li class="col-md-offset-2 col-md-8" >
                                                     <a style="line-height: 20px;" class="btn btn-primary btn-block btn-next" href="<?php echo site_url('signup'); ?>">Signup</a>

                                                       </li> 
                                                      
                                                        
                                                   
                                                </ul>
              <div class="modal-footer">
                
                <button type="button" class=" btn-primary btn-xs" data-dismiss="modal">Close</button>
              </div>
              </div>
            </div>
          </div>
        </div>

<!-- Button trigger modal -->


<!-- Modal -->
<!--  <div class="modal" id="myModal2" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content"> 
              <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><img src="<=base_url(); ?>assets/front/images/cut.png" width="20px" height="20px"></button>
                    <p>
                   <center> <a href="<=getFacebookLoginUrl('frontend/auth_login/fb_login')?>" class="btn btn-primary" style="font-size: 21px; text-transform: capitalize;"><i class="fa fa-facebook"> | Signup With Facebook</i>
                                           
                                           </a></center></p>
            </div>
      <div class="modal-body" style="padding-left: 34px;">
                <div class="row">   
                             <div class="col-md-12">
                                    <h3>Signup Now</h3>
                                   
                                     <h4>New Users Please Signup Here</h4>
                                      <div id="the-message1"></div>
                                     <?php $attributes = array( 'id' =>'contact_form1','role'=>'form');?>
                                      <?php echo form_open("frontend/register",$attributes);?>
                                        <ul class="row">
                                               <li class="col-md-12 form-group">     
                                                    <input type="text" class="form-control"
                                                             name="first_name" id="first_name" placeholder="Enter First Name" 
                                                             value="<= set_value('first_name'); ?>"><br>
                                                              
                                                </li>
                                                <li class="col-md-12 form-group">                                             
                                                      <input type="text" class="form-control"
                                                             name="last_name" id="last_name" placeholder="Enter Last Name" 
                                                             value="<= set_value('last_name'); ?>"><br>
                                                               
                                                  </li>
                                                  <li class="col-md-12 form-group">    
                                                       <input type="email" class="form-control"
                                                             name="email" id="email"  placeholder="Enter Email" value="<= set_value('email'); ?>"><br>
                                                  </li>
                                                  
                                                  <li class="col-md-12 form-group">
                                                       <input type="password" class="form-control"
                                                             name="pass" id="pass"  placeholder=" Min 8 Character Password"
                                                             ><br>
                                                              
                                                  </li>
                                                  
                                                  <li class="col-md-12 form-group">
                                                       <input type="password" class="form-control"
                                                             name="password_confirm" id="password_confirm"  placeholder="Confirm Password"
                                                             ><br><br>
                                                             
                                                  </li>
                                                  <li class="col-md-6 ">
                                                      <button type="submit"  class="btn btn-primary btn-block"  >Signup</button> 
                                                  </li>  
                                                  
                                        </ul>
                                      <?= form_close(); ?>
                            </div> 
                                <!--======= CONTACT =========-->
                                                  </div>
                                             </div> 
                              <!-- <div class="modal-footer">
                                
                                <li class=" btn-sm btn-danger pull-left" style="padding: 7px px; border-radius: 2px; "> <a href="#." data-toggle="modal" data-target="#myModal1" style="line-height:0px;">&nbsp;Back</a></li>
                                <li  class=" btn-sm btn-danger " data-dismiss="modal" style="padding: 7px px; border-radius: 2px; "><a href="" style="line-height:0px;">Close</a></li>
                              </div> 
                             </div>
                          </div>
                        </div> --> 

                 




            <!--======= HEADER =========-->
            <header class="sticky">

              <div class="top-bar">
                <div class="container">
                    
                        <ul class="left-bar-side" >
                          <!-- <li> <a href="<= site_url('home/faq');?>">FAQ </a> - </li> -->
                        </ul>

                        <ul class="left-bar-side social_icons " id="moon1">
                                      
                                       <li class="youtube"><a href="https://www.youtube.com/channel/UCcVhddWE4WiHk2J5LFKD_mg" target="_blank" style="margin: 0px"><i class="fa fa-youtube"></i></a></li>
                                 <li class="facebook"><a href="https://www.facebook.com/Langbee-382964022192428/" target="_blank" style="margin: 0px"><i class="fa fa-facebook" ></i></a></li>
                                <li class="skype"><a href="info@langbee.com" target="_blank" style="margin: 0px"><i class="fa fa-skype"></i></a></li>
                                        
                                       
                                    </ul>
                                                                                             
                   
                    <ul class="right-bar-side">
                     
                        <li id="moon1"> <i class="fa fa-phone"></i> + 91 888 777 5544 </li>
                        <li id="moon1"> <i class="fa fa-envelope"></i> support@demo.com </li>
                        <li> <a href="#." data-toggle="modal" data-target="#myModal1" id="login_formm"><i class="fa fa-user" ></i> Login/Register </a></li>

                         </ul>
                </div>
            </div>
                <div class="container">
                    <nav class="navbar navbar-default">
                        <div class="row">
                            <div class="navbar-header col-md-3 col-sm-3">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-res"> <span class="sr-only">Toggle navigation</span> <span class="fa fa-navicon"></span> </button>
                                <!--======= LOGO =========-->
                                <div class="logo"> <a href="<?= site_url('home');?>"> <span class="fa-stack"> <i class="fa logo-hex fa-stack-2x"></i> <i class="fa logo-fa fa-road fa-stack-1x"></i> </span> Demo  </a> </div>
                            </div>



                            <!--======= MENU =========-->
                            <div class="col-md-9 col-sm-9">
                                <div class="collapse navbar-collapse" id="nav-res">
                                    <ul class="nav navbar-nav">                         
                                        <li class="<?php if ($this->uri->segment(3)=="main") {echo "active"; } else  {echo "";}?>"> <a href="<?= site_url('home');?>">Home </a></li>                                        
                                        <li class="<?php if ($this->uri->segment(2)=="about") {echo "active"; } else  {echo "";}?>"> <a href="<?= site_url('home/about'); ?>" >About </a></li>
                                        <li class="<?php if ($this->uri->segment(2)=="how_works") {echo "active"; } else  {echo "";}?>"> <a href="<?= site_url('home/how_works'); ?>">How It Works </a></li>
                                        
                    
                    <li class="dropdown"> <a href="#"  data-toggle="dropdown" class="dropdown-toggle">Language Teachers <b class="caret"></b></a>
                                            <ul class="dropdown-menu animated-half fadeInUp">
                                                <li><a href="" data-toggle="modal" data-target="#myModal1">English</a></li>
                                                <li><a href="" data-toggle="modal" data-target="#myModal1">Spanish</a></li>
                                                <li><a href="" data-toggle="modal" data-target="#myModal1">French</a></li>
                                               
                                                <li><a href="" data-toggle="modal" data-target="#myModal1">Chinese</a></li>
                                               
                                            </ul>
                                        </li>   
                    <li class="dropdown"> <a href="#"  data-toggle="dropdown" class="dropdown-toggle">Subject Teachers <b class="caret"></b></a>
                                            <ul class="dropdown-menu animated-half fadeInUp">
                                                <li><a href="" data-toggle="modal" data-target="#myModal1">Maths</a></li>
                                                <li><a href="" data-toggle="modal" data-target="#myModal1">Physics</a></li>
                                                <li><a href="" data-toggle="modal" data-target="#myModal1">Chemistry</a></li>
                                                <li><a href="" data-toggle="modal" data-target="#myModal1">Computer Science
</a></li>
                                                                                                                  
                                            </ul>
                                        </li>   
                                      
                                        <li class="<?php if ($this->uri->segment(2)=="faq") {echo "active"; } else  {echo "";}?>"> <a href="<?= site_url('home/faq');?>">FAQ </a></li>

                                        <li class="dropdown"> <a href="#"  data-toggle="dropdown" class="dropdown-toggle"><img src="<?= base_url();?>assets/front/images/en.png" height="16" width="16" alt="English" />  English<b class="caret"></b></a>
                                            <ul class="dropdown-menu animated-half fadeInUp">
                                                <li><a href="#" onclick="doGTranslate('en|ar');return false;" title="Arabic"  ><img src="<?= base_url();?>assets/front/images/ar.png" height="16" width="16" alt="Arabic" />  العربية</a></li>

                                                <li><a href="#" onclick="doGTranslate('en|zh-CN');return false;" title="Chinese (Simplified)" ><img src="<?= base_url();?>assets/front/images/zh-cn.png" height="16" width="16" alt="Chinese (Simplified)" />  简体中文</a></li>

                                                <li><a href="#" onclick="doGTranslate('en|en');return false;" title="English"  ><img src="<?= base_url();?>assets/front/images/en.png" height="16" width="16" alt="English" />  English</a></li>
                                                <li><a href="#" onclick="doGTranslate('en|de');return false;" title="German"  ><img src="<?= base_url();?>assets/front/images/de.png" height="16" width="16" alt="German" />  Deutsche</a></li>
                                                <li><a href="#" onclick="doGTranslate('en|hi');return false;" title="Hindi"  ><img src="<?= base_url();?>assets/front/images/hi.png" height="16" width="16" alt="Hindi" />  हिंदी</a></li>
                                                <li><a href="#" onclick="doGTranslate('en|ja');return false;" title="Japanese"  ><img src="<?= base_url();?>assets/front/images/ja.png" height="16" width="16" alt="Japanese" />  日本語</a></li>
                                                <li><a href="#" onclick="doGTranslate('en|ko');return false;" title="Korean"  ><img src="<?= base_url();?>assets/front/images/ko.png" height="16" width="16" alt="Korean" />  한국어</a></li>
                                                <li><a href="#" onclick="doGTranslate('en|pt');return false;" title="Portuguese" ><img src="<?= base_url();?>assets/front/images/pt.png" height="16" width="16" alt="Portuguese" />  Português</a></li>
                                                <li><a href="#" onclick="doGTranslate('en|ru');return false;" title="Russian"  ><img src="<?= base_url();?>assets/front/images/ru.png" height="16" width="16" alt="Russian" />  Русский</a></li>
                                                <li><a href="#" onclick="doGTranslate('en|es');return false;" title="Spanish"  ><img src="<?= base_url();?>assets/front/images/es.png" height="16" width="16" alt="Spanish" />  Español</a></li>
                                              
                                               
                                                <!-- <div id="google_translate_element" ></div> -->
                                
                                <!-- GTranslate: https://gtranslate.io/ -->

<style type="text/css">
<!--
a.gflag {vertical-align:middle;font-size:16px;padding:1px 0;background-repeat:no-repeat;background-image:url(//gtranslate.net/flags/16.png);}
a.gflag img {border:0;}
a.gflag:hover {background-image:url(//gtranslate.net/flags/16a.png);}
#goog-gt-tt {display:none !important;}
.goog-te-banner-frame {display:none !important;}
.goog-te-menu-value:hover {text-decoration:none !important;}
body {top:0 !important;}
#google_translate_element2 {display:none!important;}

</style>

<div id="google_translate_element2"></div>
<script type="text/javascript">
function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
</script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>


<script type="text/javascript">
/* <![CDATA[ */
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
/* ]]> */
</script>

                                            </ul>
                                        </li>   
                                        
                                        
                                    </ul>

                                    
                                </div>
                            </div>
                            <!-- <div  class="col-md-1 pull-right .goog-te-menu-value .goog-te-gadget-simple" id="nav-res" > 


                             


                              </div> -->
                        </div>
                    </nav>
                </div>
            </header>

<?=$contents; ?>


             <footer>
                   

                    <!--======= RIGHTS =========-->
                    <div class="rights">
                        <div class="container">
                            <ul class="row">
                                <li class="col-md-8">
                                    <p>All Rights Reserved © Demo |<a href="<?= site_url('home/policy')?>">Privacy Policy </a>   <a href="<?= site_url('home/terms')?>" >Terms and Conditions</a></p>
                                </li>
                                <!--======= SOCIAL ICON =========-->
                                <li class="col-md-4">
                                    <ul class="social_icons">
                                      <li class="youtube"><a href="https://www.youtube.com/channel/UCcVhddWE4WiHk2J5LFKD_mg" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                        <li class="facebook"><a href="https://www.facebook.com/Langbee-382964022192428/"  target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        <li class="skype"><a href="info@langbee.com"><i class="fa fa-skype" target="_blank"></i></a></li>
                                        
                                        
                                        
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="<?= base_url();?>assets/front/js/jquery-2.2.4.min.js"></script> 
        <script src="<?= base_url();?>assets/front/js/wow.min.js"></script> 
        <script src="<?= base_url();?>assets/front/js/bootstrap.js"></script> 
        <script src="<?= base_url();?>assets/front/js/drive-me-plugin.js"></script> 
        <script src="<?= base_url();?>assets/front/js/jquery.cookie.js"></script> 
        <script src="<?= base_url();?>assets/front/js/jquery.isotope.min.js"></script> 
        <script src="<?= base_url();?>assets/front/js/jquery.flexslider-min.js"></script> 
        <script src="<?= base_url();?>assets/front/js/mapmarker.js"></script> 
        <script src="<?= base_url();?>assets/front/js/color-switcher.js"></script> 
        <script src="<?= base_url();?>assets/front/js/jquery.magnific-popup.min.js"></script> 
        <script src="<?= base_url();?>assets/front/js/owl.carousel.min.js"></script>
        <script src="<?= base_url();?>vendors/slimscroll/js/jquery.slimscroll.min.js"></script>
        <script src="<?= base_url();?>assets/front/js/main.js"></script>
        <script src="<?= base_url();?>assets/front/js/custom.js"></script>
        
         <script src='https://www.google.com/recaptcha/api.js'></script>
        


         


<script type="text/javascript">
  $(document).ready(function(){                                                
   $('.alert1').delay(200).addClass('in').fadeOut(3200);
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){                                                
   
  });
</script>


<script type="text/javascript">

  $('.signal1').hide();
 $(document).ready(function(){

$("#login_formm").click(function(){
    $('.has-error .form-control').css({'border-color': '#ebebeb','box-shadow': 'inset 0 1px 1px rgba(0, 0, 0, .075)'});
    $('.text-danger').remove(0);
    $("#contact_form")[0].reset();


});


$('#myModal1').on('hidden.bs.modal', function () {
     $('#the-message').empty();

})


  $('#contact_form').submit(function(e){

    
    e.preventDefault();
     var me = $(this);

     $.ajax({
              url: me.attr('action'),
              type:'post',
              data:me.serialize(),
              dataType:'json',
              beforeSend:function(){                                                                                         
                $('.signal1').show();                                                                                
            },                                                                                                             
            complete:function(){                                                                                           
                $('.signal1').hide();                                                                    
            },
              success:function(response){
                var error_message = response.error
                if(response.success == true)
                {
                        
                $('#the-message').empty().html('<div class="alert alert-success text-center">Login  successfully!</div>');

                
                 window.setTimeout(function () {
                          location.href= "<?= site_url('frontend/Auth_login');?>";
                  }, 1000);
         
         

                } 
                else if (typeof error_message !== "undefined")
                        {
                           
                       $('#the-message').empty().html('<div class="alert alert-danger text-center">'+error_message+'</div>');
                      
                       
                          
                        }
                else
              {
                $.each(response.message,function(key, value){
                      var element = $('#'+ key);
                      element.closest('li.form-group')
                      .removeClass('has-error')
                      .addClass(value.length > 0 ? 'has-error' : 'has-success')
                      .find('.text-danger').remove();
                      element.after(value);

                  });
              }

              }



     });

  });



});
</script>


<script type="text/javascript">
  $(document).ready(function()
{
    

    // codes works on all bootstrap modal windows in application
    $('.modal').on('hidden.bs.modal', function(e)
    { 
        $(this).removeData();
    }) ;

   
});
</script>


<script type="text/javascript">
 $(document).ready(function(){
  $('#contact_form1').submit(function(e){
    e.preventDefault();
     var me = $(this);

     $.ajax({
              url: me.attr('action'),
              type:'post',
              data:me.serialize(),
              dataType:'json',
              success:function(response){
                 
              
               
                if(response.status === 'succuss')
                {
                        
                $('#the-message1').html('<div class="alert alert-success text-center">Your Account is  successfully created! now you can login</div>');
                 setTimeout(function() {
                                          $('#the-message1').fadeOut('fast');
                                      }, 2000);
                 window.setTimeout(function () {
                          location.href= "<?= site_url('frontend/Auth_login/main');?>";
                  }, 1000);
         
         

                } 
                else
              {
                
                $.each(response.message,function(key, value){
                      var element = $('#'+ key);
                      element.closest('li.form-group')
                      .removeClass('has-error')
                      .addClass(value.length > 0 ? 'has-error' : 'has-success')
                      .find('.text-danger').remove();
                      element.after(value);
                  });

              }

              }



     });

  });



});
</script>




<script type="text/javascript">

$('.signal').hide();



  $(document).ready(function(){
  $('#contact_form2').submit(function(e){
    e.preventDefault();



     var me = $(this);
     $.ajax({
              url: me.attr('action'),
              type:'post',
              data:me.serialize(),
              dataType:'json',
              beforeSend:function(){                                                                                         
                $('.signal').show();                                                                                
            },                                                                                                             
            complete:function(){                                                                                           
                $('.signal').hide();                                                                    
            },
              success:function(response){

                if(response.success == true)
                {
                    
                $('#the-message11').fadeIn().html('<div class="alert alert-success alert-dismissible text-center"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Successfully Subscribed ! </div>');
                setTimeout(function() {
                                        $('#the-message11').fadeOut("slow");
                                      }, 2000 );


                // $('#the-message11').delay(2000).fadeOut(300);
                                    
                 
                } 
                else
              {
                 $("#contact_form2")[0].reset();
                
                $('#the-message11').fadeIn().html('<div class="alert alert-danger alert-dismissible text-center"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> This email id already subscribed!  </div>');
                 setTimeout(function() {
                                        $('#the-message11').fadeOut("slow");
                                      }, 2000 );

               
                

              }

              }



     });

  });



});
</script>







        </script>

        <script type="text/javascript">
            $(document).ready( function() {
    $('#myCarousel').carousel({
        interval:   15000
    });

var myCarousel = $('#myCarousel');
var myNav = myCarousel.prev();

myNav.find('li > a').click(function() {
  var newIndex = $(this).parent().index();
  myCarousel.carousel( newIndex );
});

myCarousel.on('slid.bs.carousel', function () {
  var newIndex = $(this).find('.carousel-inner>.active').index();
  var newLI = myNav.children().eq( newIndex );
  if ( !newLI.hasClass('active') ) {
    myNav.find('li.active').removeClass('active');
    newLI.addClass('active');
  }
});


});
        </script>

<script type="text/javascript">
   $(document).ready( function() {
    var chkToken=$('#onload').val();
            if(chkToken=='1'){
              $('#asds').modal('show');
            }

          });
</script>
<script type="text/javascript">
  $('#printButton').on('click', function () {
    if ($('.modal').is(':visible')) {
        var modalId = $(event.target).closest('.modal').attr('id');
        $('body').css('visibility', 'hidden');
        $("#" + modalId).css('visibility', 'visible');
        $('#' + modalId).removeClass('modal');
        window.print();
        $('body').css('visibility', 'visible');
        $('#' + modalId).addClass('modal');
    } else {
        window.print();
    }
});



$('#loginbtn').on('click',function(){

  $('#loginbtn').hide();

});

</script>

<script>
$.validate({
  modules : 'location, date, security, file',
});
</script>

    </body>

</html>

