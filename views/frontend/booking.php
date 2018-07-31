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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-formhelpers/2.3.0/css/bootstrap-formhelpers.css" />

        <!--MAIN STYLE-->
        <link href="<?= base_url();?>assets/front/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url();?>assets/front/css/owl.carousel.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url();?>assets/front/css/main.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url();?>assets/front/css/style.css" rel="stylesheet" type="text/css">       
        <link href="<?= base_url();?>assets/front/css/responsive.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url();?>assets/front/css/animate.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url();?>assets/front/css/font-awesome.min.css" rel="stylesheet" type="text/css">
         <!--======= flag-icon CSS =========-->
          <link href="<?= base_url();?>assets/front/css/flag-icon/css/flag-icon.min.css" rel="stylesheet" type="text/css">
          
        <!--======= COLOR STYLE CSS =========-->
        <link rel="stylesheet" id="color" href="assets/front/css/color/default.css">

       <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

        <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'ar,en,es,jv,ko,pa,pt,ru,zh-CN', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
}
</script>



        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

        <![endif]-->
        <style>

  

  #calendar {
    max-width: 50%;
    margin: 0 auto;
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
.scale-anm {
  transform: scale(1);
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

.hide1 {
  display: none ;
}
        </style>
        
    </head>
    <body>
        <!--======= PRELOADER =========-->
      

       

        <!--======= WRAPPER =========-->
        <div id="wrap"> 

            <!--======= TOP BAR =========-->
            <div class="top-bar">
                <div class="container">
                    <ul class="left-bar-side">
                        
                        
                        <li> <a href="#.">FAQ </a> - </li>
                        <li> <a href="#."><i class="fa fa-facebook"></i></a> - </li>
                        <li> <a href="#."><i class="fa fa-skype"></i></a></li>
                        
                    </ul>
                    <ul class="right-bar-side">
                       
                        <li> <a href="#."><i class="fa fa-phone"></i> + 91 888 777 5544 </a></li>
                        <li> <a href="#."><i class="fa fa-envelope"></i> support@demo.com </a></li>
                        <li><div class="btn-group" ><a href="#."><i class="fa fa-user"></i>Profile </a>
  <a href="#" class=" dropdown-toggle" data-toggle="dropdown" style="background-color: #647382;"><span class="caret"></span></a>
  <ul class="dropdown-menu" style="background-color: #647382;">
    <li style="background-color: #647382;"> 
      <?php 
    // $user = $this->ion_auth->user()->row();
    $groups = $this->ion_auth->groups()->result_array();
    $currentGroups = $this->ion_auth->get_users_groups()->result();
    foreach ($currentGroups as $key => $a) {

      $currentGroups = $a->id;
      
    }
      
               ?>
<?php
    

     if ($currentGroups==2) {
          echo " ";
      } 
      elseif ($currentGroups==3) {
       echo  anchor('frontend/auth_login/indiprofile', 'profile');
      }
      elseif ($currentGroups==4) {
       
      echo  anchor('frontend/auth_login/teacherprofile', 'profile');
      }
      elseif ($currentGroups==5) {
  
      echo  anchor('frontend/auth_login/instiprofile', 'profile');
      }; 
// echo "<pre>";
//     print_r($currentGroups==4);
//     exit;
      ?>             



     </li>
      <li style="background-color: #647382;"> 
      <?php 
    // $user = $this->ion_auth->user()->row();
    $groups = $this->ion_auth->groups()->result_array();
    $currentGroups = $this->ion_auth->get_users_groups()->result();
    foreach ($currentGroups as $key => $a) {

      $currentGroups = $a->id;
      
    }
      
               ?>
<?php
    

     if ($currentGroups==2) {
          echo " ";
      } 
      elseif ($currentGroups==3) {
       echo  anchor('frontend/auth_login/editindiprofile', 'Edit');
      }
      elseif ($currentGroups==4) {
       
      echo  anchor('frontend/auth_login/edit_forign_fee_registration', 'Edit');
      }
      elseif ($currentGroups==5) {
  
      echo  anchor('frontend/auth_login/insti_edit_profile', 'Edit');
      }; 
// echo "<pre>";
//     print_r($currentGroups==4);
//     exit;
      ?>             



     </li>
    
    <li class="divider"></li>
    <li style="background-color: #647382; "><?php echo anchor('frontend/auth_login/logout', 'Sign out'); ?></li>
  </ul>
</div>
                          </li>
                        


                <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><img src="<?=base_url(); ?>assets/front/images/cut.png" width="20px" height="20px"></button>
          <p>
         <center> <a href="#" class="btn btn-primary" style="font-size: 21px; text-transform: capitalize;"><i class="fa fa-facebook"> | Login With Facebook</i>
                                 
                                 </a></center></p>
        </div>
      <div class="modal-body">
         <div class="row"> 

                                <!--======= CONTACT FORM =========-->
                                
                                <div class="col-md-12">
                                    <h3>Login Now</h3>
                                     <h4>Registered Teachers Please Login Here</h4><br>
                                    
                                      <?php echo form_open("frontend/auth_login/login",array('role'=>'form'));?>
                                        <ul class="row">
                                           
                                            <li class="col-md-12 ">
                                                <input type="text" class="form-control"
                                                       name="identity" id="identity" placeholder="Enter Email" value="<?= $this->form_validation->set_value('identity'); ?>" 
                                                       data-toggle="tooltip" title="Email is required"
                                                       ><br>
                                            </li>
                                            
                                            
                                            <li class="col-md-12 ">
                                                <input type="password" class="form-control"
                                                       name="password" id="password" placeholder=" Password"
                                                       ><br>
                                            </li>
                                            
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="" class="text-warning"><strong>Forget Password</strong></a><br><br>
                                            
                                           </ul>
                                           <ul class="row">
                                            <li class="col-md-6 ">
                                                <button type="submit" value="submit" class="btn btn-primary btn-block" id="btn_submit">Logout</button>
                                                
                                            </li>    
                                            </li>
                                        </ul>
                                    <?php echo form_close();?>
                                </div>
                                <!--======= CONTACT =========-->
                            </div>
      </div>
      <div class="modal-footer">
        
        <button type="button" class=" btn-danger btn-xs" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><img src="<?=base_url(); ?>assets/front/images/cut.png" width="20px" height="20px"></button>
          <p>
         <center> <a href="#" class="btn btn-primary" style="font-size: 21px; text-transform: capitalize;"><i class="fa fa-facebook"> | Signup With Facebook</i>
                                 
                                 </a></center></p>
        </div>
      <div class="modal-body">
            <div class="row"> 

                                <!--======= CONTACT FORM =========-->
                                
                                <div class="col-md-12">
                                    <h3>Login Now</h3>
                                     <h4>Registered Teachers Please Login Here</h4>
                                    <form role="form"  method="post">
                                        <ul class="row">
                                           
                                            <li class="col-md-12">
                                                <input type="text" class="form-control"
                                                       name="name" id="name" placeholder="Enter Name" 
                                                       ><br>
                                            </li>
                                            <li class="col-md-12">
                                                <input type="text" class="form-control"
                                                       name="email" id="email" placeholder="Enter Email"><br>
                                            </li>
                                            <li class="col-md-12">
                                                <input type="text" class="form-control"
                                                       name="company" id="company" placeholder="Enter Phone"
                                                       ><br>
                                            </li>
                                            <li class="col-md-12">
                                                <input type="password" class="form-control"
                                                       name="website" id="pass" placeholder="Password"
                                                       ><br>
                                            </li>
                                            
                                            <li class="col-md-12">
                                                <input type="password" class="form-control"
                                                       name="website" id="cpass" placeholder="Confirm Password"
                                                       ><br><br>
                                            </li>
                                            <li class="col-md-6 ">
                                                <button type="submit" value="submit" class="btn btn-primary btn-block" id="btn_submit">Signup</button>
                                                
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                                <!--======= CONTACT =========-->
                            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class=" btn-danger btn-xs" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

                    </ul>
                </div>
            </div>

            <!--======= HEADER =========-->
            <header class="sticky">
                <div class="container">
                    <nav class="navbar navbar-default">
                        <div class="row">
                            <div class="navbar-header col-md-3 col-sm-3">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-res"> <span class="sr-only">Toggle navigation</span> <span class="fa fa-navicon"></span> </button>
                                <!--======= LOGO =========-->
                                <div class="logo"> <a href="#"> <span class="fa-stack"> <i class="fa logo-hex fa-stack-2x"></i> <i class="fa logo-fa fa-road fa-stack-1x"></i> </span> Demo  </a> </div>
                            </div>

                            <!--======= MENU =========-->
                            <div class="col-md-8 col-sm-8">
                                <div class="collapse navbar-collapse" id="nav-res">
                                    <ul class="nav navbar-nav">                         
                                        <li class="active"> <a href="<?= site_url('frontend/auth_login/main'); ?>">Home </a></li>                                        
                                        <li> <a href="<?= site_url('home/about'); ?>" >About </a></li>
                                        <li> <a href="<?= site_url('home/how_works'); ?>">How It Works </a></li>
                                        
                    
                    <li class="dropdown"> <a href="#"  data-toggle="dropdown" class="dropdown-toggle">Language Teachers <b class="caret"></b></a>
                                            <ul class="dropdown-menu animated-half fadeInUp">
                                                <li><a href="<?= site_url('frontend/auth_login/teacher'); ?>" >English</a></li>
                                                <li><a href="<?= site_url('frontend/auth_login/teacher'); ?>">Spanish</a></li>
                                                <li><a href="<?= site_url('frontend/auth_login/teacher'); ?>">French</a></li>
                        <li><a href="<?= site_url('frontend/auth_login/teacher'); ?>">Portuges</a></li>
                                                <li><a href="<?= site_url('frontend/auth_login/teacher'); ?>">Chinese</a></li>
                                               
                                            </ul>
                                        </li>   
                    <li class="dropdown"> <a href="#"  data-toggle="dropdown" class="dropdown-toggle">Subject Teachers <b class="caret"></b></a>
                                            <ul class="dropdown-menu animated-half fadeInUp">
                                                <li><a href="<?= site_url('frontend/auth_login/subject'); ?>">Physics</a></li>
                                                <li><a href="<?= site_url('frontend/auth_login/subject'); ?>">Maths</a></li>
                                                <li><a href="<?= site_url('frontend/auth_login/subject'); ?>">History</a></li>
                                                <li><a href="<?= site_url('frontend/auth_login/subject'); ?>">Chemsitry</a></li>
                                              
                                               
                                            </ul>
                                        </li>   
                                       
                                        <li> <a href="<?= site_url('home/faq'); ?>">FAQ </a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                            <div  class="col-md-1 pull-right .goog-te-menu-value .goog-te-gadget-simple" id="nav-res" > <div id="google_translate_element" ></div></div>
                        </div>
                    </nav>
                </div>
            </header>

<p>&nbsp;</p>
<p>&nbsp;</p>

<div class="col-md-6 col-md-offset-4">



  <div class="panel panel-primary">
  
  <div class="panel-body">




      <?php echo form_open(site_url("calenderview/add_events"), array("class" => "form-horizontal")) ?>
      <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">Confirm Booking?</label>
                <div class="col-md-8 ui-front">

          <?php  $id = $this->uri->segment(3)?>

                  
              <input type="hidden" class="form-control" name="id" value="<?= $id;?>">
                </div>
        </div>
        
        
      
    
        <button type="button" class="btn btn-default" >No</button>
        <input type="submit" class="btn btn-primary" value="Yes">
        <?php echo form_close() ?>
  </div>
</div>

   </div>
    </div>

        
      
   
 <p>&nbsp;</p>
<p>&nbsp;</p>   
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<footer>
                   

                    <!--======= RIGHTS =========-->
                    <div class="rights">
                        <div class="container">
                            <ul class="row">
                                <li class="col-md-8">
                                    <p>All Rights Reserved © Demo | Designed & Developed By Dignitech Media Works </p>
                                </li>
                                <!--======= SOCIAL ICON =========-->
                                <li class="col-md-4">
                                    <ul class="social_icons">
                                        <li class="facebook"><a href="#."><i class="fa fa-facebook"></i></a></li>
                                        <li class="googleplus"><a href="#."><i class="fa fa-google-plus"></i></a></li>
                                        <li class="twitter"><a href="#."><i class="fa fa-twitter"></i></a></li>
                                        <li class="pinterest"><a href="#."><i class="fa fa-pinterest"></i></a></li>
                                        <li class="vimeo"><a href="#."><i class="fa fa-vimeo-square"></i></a></li>
                                        <li class="linkedin"><a href="#."><i class="fa fa-linkedin"></i></a></li>
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
        <script src="<?= base_url();?>assets/front/js/main.js"></script>
        <script src="<?= base_url();?>assets/front/js/custom.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-formhelpers/2.3.0/js/bootstrap-formhelpers.min.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
                <script type="text/javascript">
            $(document).ready( function() {
    $('#myCarousel').carousel({
        interval:   4000
    });
    
    var clickEvent = false;
    $('#myCarousel').on('click', '.nav a', function() {
            clickEvent = true;
            $('.nav li').removeClass('active');
            $(this).parent().addClass('active');        
    }).on('slid.bs.carousel', function(e) {
        if(!clickEvent) {
            var count = $('.nav').children().length -1;
            var current = $('.nav li.active');
            current.removeClass('active').next().addClass('active');
            var id = parseInt(current.data('slide-to'));
            if(count == id) {
                $('.nav li').first().addClass('active');    
            }
        }
        clickEvent = false;
    });
});
        </script>
    </body>

</html>