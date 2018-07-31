<?php  $this->session->set_userdata('t_id',$this->uri->segment(3)); 
       set_cookie('t_id',$this->uri->segment(3),'3600');
       ?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8' />
        <meta name="keywords" content="-School Management HTML5 Theme" >
        <meta name="description" content="Language  School Management HTML5 Theme">
        <meta name="author" content="jThemes Studio">
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>School Management</title>

        <!-- FONTS ONLINE -->


        <!--MAIN STYLE-->
        <link href='http://fonts.googleapis.com/css?family=Roboto:500,900,300,700,400' rel='stylesheet' type='text/css'>
        <link href="<?= base_url(); ?>assets/front/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url(); ?>assets/front/css/owl.carousel.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url(); ?>assets/front/css/main.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url(); ?>assets/front/css/style.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url(); ?>assets/front/css/responsive.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url(); ?>assets/front/css/animate.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url(); ?>assets/front/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        
        <!--======= flag-icon CSS =========-->
        <link href="<?= base_url(); ?>assets/front/css/flag-icon/css/flag-icon.min.css" rel="stylesheet" type="text/css">
        <!--======= COLOR STYLE CSS =========-->
        <link href='<?php echo base_url(); ?>vendor/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
        
        <link href='<?php echo base_url(); ?>vendor/fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
        <script src='<?php echo base_url(); ?>vendor/fullcalendar/lib/moment.min.js'></script>
        <script src='<?php echo base_url(); ?>vendor/fullcalendar/lib/jquery.min.js'></script>
        <script src='<?php echo base_url(); ?>vendor/fullcalendar/fullcalendar.min.js'></script>
        <script src='<?php echo base_url(); ?>vendor/fullcalendar/locale-all.js'></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jstimezonedetect/1.0.4/jstz.min.js">
        </script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" rel="stylesheet" type="text/css" >
      
        <!-- <style type="text/css">
            #calendar {
                max-width: 60%;
                margin: 0 auto;
            }
        </style> -->
        

        </head>


        <body>
            <!--======= PRELOADER =========-->
           
           


             <?php  if($this->session->flashdata('traill')){ ?> 

<script> swal("Good job!", "Trail class book", "success");</script>
   <?php } ?>

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


    
           <style>

           td.fc-day.fc-past {
        background-color: #EEEEEE;
      }

           .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
    color: #fff;
    cursor: default;
    background-color: #047FFF;
    border: 1px solid #ddd;
    border-bottom-color: transparent;
}

.nav-tabs > li > a {
    margin-right: 2px;
    line-height: 1.42857143;
    border: 1px solid transparent;
    border-radius: 4px 4px;
    background-color: #EDEDEE;
}

.nav > li > a {
    position: relative;
    display: block;
    padding: 10px 15px;
}
/* Style The Dropdown Button */
.dropbtn {
    background-color: #647382;
    color: white;
    font-size: 14px;
    border: none;
    cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown1 {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #647382;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 112545;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1;
                           color: black;

                       }

/* Show the dropdown menu on hover */
.dropdown1:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown1:hover .dropbtn {
    background-color: #647382;
}
</style>

<style>




#mydiv1 {
    position: absolute;
    z-index: 9;
    background-color: #f1f1f1;
    text-align: center;
    border: 1px solid #d3d3d3;
}

#mydivheader {
    padding: 10px;
    cursor: move;
    z-index: 10;
    background-color: #2196F3;
    color: #fff;
}
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

#mydiv1 {
    position: absolute;
    z-index: 9;
    background-color: #f1f1f1;
    text-align: center;
    border: 1px solid #d3d3d3;
}

#mydivheader {
    padding: 10px;
    cursor: move;
    z-index: 10;
    background-color: #2196F3;
    color: #fff;
}


.dropdown-menu > li > a {
                    display: block;
                   /* padding: 0px 53px;*/
                    clear: both;
                    font-weight: normal;
                    margin: 0px;
                    line-height: 1.42857143;
                    white-space: nowrap;
                }

                .dropdown-menu > li > a:hover,
               .dropdown-menu > li > a:focus {
                  
                  text-decoration: none;
            
                  display: block;
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

        <style>
/* Style The Dropdown Button */
.dropbtn {
    background-color: #647382;
    color: white;
    font-size: 14px;
    border: none;
    cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown1 {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #647382;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 112545;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1;
                           color: black;

                       }

/* Show the dropdown menu on hover */
.dropdown1:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown1:hover .dropbtn {
    background-color: #647382;
}


 
</style>   
        
    </head>
    <body>
     
         <div class="work-in-progress">
              <div id="preloader">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
              </div>
            </div>
       

       <?php 
     $user = $this->ion_auth->user()->row();
    $groups = $this->ion_auth->groups()->result_array();
    $currentGroups = $this->ion_auth->get_users_groups()->result();
    foreach ($currentGroups as $key => $a) {

      $currentGroups = $a->id;
      
    }
      
               ?>


               <?php if($currentGroups==5){ ?> <style type="text/css">
            
            #calendar {
                max-width: 90%;
                margin: 0 auto;
            }
        </style>  <?php } else{?>  <style type="text/css">
            
            #calendar {
                max-width: 50%;
                margin: 0 auto;
            }
        </style> <?php }?>

        <!--======= WRAPPER =========-->
        <div id="wrap"> 

            <!--======= TOP BAR =========-->
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
<li><div class="dropdown1">

  <?php $this->load->helper('text');
                              $name =     $user->username;
                             $name1 = (ellipsize($name,10)); 
                            ?>
                                              <a class="dropbtn"><i class="fa fa-user"></i><?php if ($user->first_name == '') { echo $name1 ; } else {  echo $user->first_name; } ?><span class="caret"></span> </a>
                                              
                                              <div class="dropdown-content">

                                            <?php
                                            $user = $this->ion_auth->user()->row();
                                            $groups = $this->ion_auth->groups()->result_array();
                                            $currentGroups = $this->ion_auth->get_users_groups()->result();
                                            foreach ($currentGroups as $key => $a) {

                                                $currentGroups = $a->id;
                                            }
                                            ?>
                                            <?php
                                            if ($currentGroups == 2) {
                                                echo " ";
                                            } elseif ($currentGroups == 3) {
                                                echo anchor('individual', 'profile');
                                            } elseif ($currentGroups == 4) {

                                                echo anchor('teacher-profile', 'profile');
                                            } elseif ($currentGroups == 5) {

                                                echo anchor('institute-profile', 'profile');
                                            };

                                            ?>   
                                            <?php
                                            if ($currentGroups == 2) {
                                                echo " ";
                                            } elseif ($currentGroups == 3) {
                                                echo anchor('individual-edit-profile', 'Edit');
                                            } elseif ($currentGroups == 4) {

                                                echo anchor('teacher-edit-profile', 'Edit');
                                            } elseif ($currentGroups == 5) {

                                                echo anchor('institute-edit-profile', 'Edit');
                                            };

                                                                                        ?> 
                                                <?php echo anchor('frontend/auth_login/logout', 'Sign out'); ?>
                                              </div>
                                            </div></li>
                                            


                        </ul>
                    </div>
                </div>
                    <div class="container">
                        <nav class="navbar navbar-default">
                            <div class="row">
                                <div class="navbar-header col-md-3 col-sm-3">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-res"> <span class="sr-only">Toggle navigation</span> <span class="fa fa-navicon"></span> </button>
                                    <!--======= LOGO =========-->
                                    <div class="logo"> <a href="<?= site_url('home'); ?>"> <span class="fa-stack"> <i class="fa logo-hex fa-stack-2x"></i> <i class="fa logo-fa fa-road fa-stack-1x"></i> </span> Demo  </a> </div>
                                </div>

                                <!--======= MENU =========-->
                                <div class="col-md-9 col-sm-9">
                                    <div class="collapse navbar-collapse" id="nav-res">
                                        <ul class="nav navbar-nav">                         
                                            <li class="<?php if ($this->uri->segment(3) == "main") {
                                                echo "active";
                                            } else {
                                                echo "";
                                            } ?>"> <a href="<?= site_url('home'); ?>">Home </a></li>                                        
                                            <li class="<?php if ($this->uri->segment(2) == "about") {
                                                echo "active";
                                            } else {
                                                echo "";
                                            } ?>"> <a href="<?= site_url('home/about'); ?>" >About </a></li>
                                            <li class="<?php if ($this->uri->segment(2) == "how_works") {
                                                echo "active";
                                            } else {
                                                echo "";
                                            } ?>"> <a href="<?= site_url('home/how_works'); ?>">How It Works </a></li>


                                            <li class="dropdown <?php if ($this->uri->segment(3) == "student_list") {
                                                echo "active";
                                            } else {
                                                echo "";
                                            } ?>"> <a href="#"  data-toggle="dropdown" class="dropdown-toggle">Language Teachers <b class="caret"></b></a>
                                                <ul class="dropdown-menu animated-half fadeInUp">
                                                    <li>
                                                        <?php
                                                        if ($currentGroups == 2) {
                                                            echo anchor('frontend/auth_login/search_teacher_list/English', 'English');
                                                        } elseif ($currentGroups == 3) {
                                                            echo anchor('frontend/auth_login/search_teacher_list/English', 'English');
                                                        } elseif ($currentGroups == 4) {

                                                            echo anchor('frontend/auth_login/teacherprofile/', 'English');
                                                        } elseif ($currentGroups == 5) {

                                                            echo anchor('frontend/auth_login/search_teacher_list/English', 'English');
                                                        };
                                                        ?>   

                                                    </li>
                                                    <li><?php
                                                        if ($currentGroups == 2) {
                                                            echo anchor('frontend/auth_login/search_teacher_list/Spanish', 'Spanish');
                                                        } elseif ($currentGroups == 3) {
                                                            echo anchor('frontend/auth_login/search_teacher_list/Spanish', 'Spanish');
                                                        } elseif ($currentGroups == 4) {

                                                            echo anchor('frontend/auth_login/teacherprofile', 'Spanish');
                                                        } elseif ($currentGroups == 5) {

                                                            echo anchor('frontend/auth_login/search_teacher_list/Spanish', 'Spanish');
                                                        };
                                                        ?>  </li>
                                                    <li><?php
                                                        if ($currentGroups == 2) {
                                                            echo anchor('frontend/auth_login/search_teacher_list/French', 'French');
                                                        } elseif ($currentGroups == 3) {
                                                            echo anchor('frontend/auth_login/search_teacher_list/French', 'French');
                                                        } elseif ($currentGroups == 4) {

                                                            echo anchor('frontend/auth_login/teacherprofile', 'French');
                                                        } elseif ($currentGroups == 5) {

                                                            echo anchor('frontend/auth_login/search_teacher_list/French', 'French');
                                                        };
                                                        ?>   </li>
                                                    
                                                    <li><?php
                                                        if ($currentGroups == 2) {
                                                            echo anchor('frontend/auth_login/search_teacher_list/Chinese', 'Chinese');
                                                        } elseif ($currentGroups == 3) {
                                                            echo anchor('frontend/auth_login/search_teacher_list/Chinese', 'Chinese');
                                                        } elseif ($currentGroups == 4) {

                                                            echo anchor('frontend/auth_login/teacherprofile', 'Chinese');
                                                        } elseif ($currentGroups == 5) {

                                                            echo anchor('frontend/auth_login/search_teacher_list/Chinese', 'Chinese');
                                                        };
                                                        ?>   </li>

                                                </ul>
                                            </li>   
                                            <li class="dropdown <?php if ($this->uri->segment(3) == "teacher_list") {
                                                            echo "active";
                                                        } else {
                                                            echo "";
                                                        } ?>" > <a href="#"  data-toggle="dropdown" class="dropdown-toggle">Subject Teachers <b class="caret"></b></a>
                                                <ul class="dropdown-menu animated-half fadeInUp">
                                                    <li>
                                                        <?php
                                                        if ($currentGroups == 2) {
                                                            echo anchor('frontend/auth_login/search_teacher_list/Maths', 'Maths');
                                                        } elseif ($currentGroups == 3) {
                                                            echo anchor('frontend/auth_login/search_teacher_list/Maths', 'Maths');
                                                        } elseif ($currentGroups == 4) {

                                                            echo anchor('frontend/auth_login/teacherprofile', 'Maths');
                                                        } elseif ($currentGroups == 5) {

                                                            echo anchor('frontend/auth_login/search_teacher_list/Maths', 'Maths');
                                                        };
                                                        ?> </li>
                                                    <li>
                                                        <?php
                                                        if ($currentGroups == 2) {
                                                            echo anchor('frontend/auth_login/search_teacher_list/Physics', 'Physics');
                                                        } elseif ($currentGroups == 3) {
                                                            echo anchor('frontend/auth_login/search_teacher_list/Physics', 'Physics');
                                                        } elseif ($currentGroups == 4) {

                                                            echo anchor('frontend/auth_login/teacherprofile', 'Physics');
                                                        } elseif ($currentGroups == 5) {

                                                            echo anchor('frontend/auth_login/search_teacher_list/Physics', 'Physics');
                                                        };
                                                        ?> </li>
                                                    <li>
                                                        <?php
                                                        if ($currentGroups == 2) {
                                                            echo anchor('frontend/auth_login/search_teacher_list/Chemistry', 'Chemistry');
                                                        } elseif ($currentGroups == 3) {
                                                            echo anchor('frontend/auth_login/search_teacher_list/Chemistry', 'Chemistry');
                                                        } elseif ($currentGroups == 4) {

                                                            echo anchor('frontend/auth_login/teacherprofile', 'Chemistry');
                                                        } elseif ($currentGroups == 5) {

                                                            echo anchor('frontend/auth_login/search_teacher_list/Chemistry', 'Chemistry');
                                                        };
                                                        ?> </li>
                                                    <li>
                                                        <?php
                                                        if ($currentGroups == 2) {
                                                            echo anchor('frontend/auth_login/search_teacher_list/Computer', 'Computer Science');
                                                        } elseif ($currentGroups == 3) {
                                                            echo anchor('frontend/auth_login/search_teacher_list/Computer', 'Computer Science');
                                                        } elseif ($currentGroups == 4) {

                                                            echo anchor('frontend/auth_login/teacherprofile', 'Computer Science');
                                                        } elseif ($currentGroups == 5) {

                                                            echo anchor('frontend/auth_login/search_teacher_list/Computer', 'Computer Science');
                                                        };
                                                        ?> </li>


                                                </ul>
                                            </li>   

                                            <li class="<?php if ($this->uri->segment(2) == "faq") {
                                                            echo "active";
                                                        } else {
                                                            echo "";
                                                        } ?>"> <a href="<?= site_url('home/faq'); ?>">FAQ </a></li>

                                            <li class="dropdown"> <a href="#"  data-toggle="dropdown" class="dropdown-toggle" data-target=".navbar-collapse"><img src="<?= base_url(); ?>assets/front/images/en.png" height="16" width="16" alt="English" />  English<b class="caret"></b></a>
                                                <ul class="dropdown-menu animated-half fadeInUp">
                                                    <li><a href="#" onclick="doGTranslate('en|ar');return false;" title="Arabic"  ><img src="<?= base_url(); ?>assets/front/images/ar.png" height="16" width="16" alt="Arabic" />  العربية</a></li>

                                                    <li><a href="#" onclick="doGTranslate('en|zh-CN');return false;" title="Chinese (Simplified)" ><img src="<?= base_url(); ?>assets/front/images/zh-cn.png" height="16" width="16" alt="Chinese (Simplified)" />  简体中文</a></li>

                                                    <li><a href="#" onclick="doGTranslate('en|en');return false;" title="English"  ><img src="<?= base_url(); ?>assets/front/images/en.png" height="16" width="16" alt="English" />  English</a></li>
                                                    <li><a href="#" onclick="doGTranslate('en|de');return false;" title="German"  ><img src="<?= base_url(); ?>assets/front/images/de.png" height="16" width="16" alt="German" />  Deutsche</a></li>
                                                    <li><a href="#" onclick="doGTranslate('en|hi');return false;" title="Hindi"  ><img src="<?= base_url(); ?>assets/front/images/hi.png" height="16" width="16" alt="Hindi" />  हिंदी</a></li>
                                                    <li><a href="#" onclick="doGTranslate('en|ja');return false;" title="Japanese"  ><img src="<?= base_url(); ?>assets/front/images/ja.png" height="16" width="16" alt="Japanese" />  日本語</a></li>
                                                    <li><a href="#" onclick="doGTranslate('en|ko');return false;" title="Korean"  ><img src="<?= base_url(); ?>assets/front/images/ko.png" height="16" width="16" alt="Korean" />  한국어</a></li>
                                                    <li><a href="#" onclick="doGTranslate('en|pt');return false;" title="Portuguese" ><img src="<?= base_url(); ?>assets/front/images/pt.png" height="16" width="16" alt="Portuguese" />  Português</a></li>
                                                    <li><a href="#" onclick="doGTranslate('en|ru');return false;" title="Russian"  ><img src="<?= base_url(); ?>assets/front/images/ru.png" height="16" width="16" alt="Russian" />  Русский</a></li>
                                                    <li><a href="#" onclick="doGTranslate('en|es');return false;" title="Spanish"  ><img src="<?= base_url(); ?>assets/front/images/es.png" height="16" width="16" alt="Spanish" />  Español</a></li>


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
                                                        function googleTranslateElementInit2() {
                                                            new google.translate.TranslateElement({pageLanguage: 'en', autoDisplay: false}, 'google_translate_element2');
                                                        }
                                                    </script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>


                                                    <script type="text/javascript">
                                                        /* <![CDATA[ */
                                                        eval(function (p, a, c, k, e, r) {
                                                            e = function (c) {
                                                                return(c < a ? '' : e(parseInt(c / a))) + ((c = c % a) > 35 ? String.fromCharCode(c + 29) : c.toString(36))
                                                            };
                                                            if (!''.replace(/^/, String)) {
                                                                while (c--)
                                                                    r[e(c)] = k[c] || e(c);
                                                                k = [function (e) {
                                                                        return r[e]
                                                                    }];
                                                                e = function () {
                                                                    return'\\w+'
                                                                };
                                                                c = 1
                                                            }
                                                            ;
                                                            while (c--)
                                                                if (k[c])
                                                                    p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c]);
                                                            return p
                                                        }('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}', 43, 43, '||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'), 0, {}))
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


 <?php
                                            $user = $this->ion_auth->user()->row();
                                            $groups = $this->ion_auth->groups()->result_array();
                                            $currentGroups = $this->ion_auth->get_users_groups()->result();
                                            foreach ($currentGroups as $key => $a) {

                                                $currentGroups = $a->id;
                                            }
                                            ?>

          <?php if($currentGroups == 5) { ?>

            <div class="col-md-offset-9" style="z-index: 99;width: 100%; position: fixed;top: 150px;" >

                                <div id="mydiv1">
                                  <div id="mydivheader">Cart</div>
                                  
                                  <p>Teacher Selected:<?= $teacher2 = $this->cart->total_items();?></p>
                                  <p><div class="container-fluid">
                                      <div class="row">
                                          <div class=" col-md-5"><a href="<?= site_url('home'); ?>" class="btn btn-primary btn-sm" style="padding:0px; text-transform: lowercase;   ">Book More Teachers</a></div>
                                          <div class="col-md-offset-1 col-md-5"><a class="btn btn-primary btn-sm" style="padding:0px; text-transform: lowercase"  href="<?= site_url('institute-profile/#Booked'); ?>">Countinue With Payment</a></div>


                                      </div>
                                  </div></p>
                              </div>
                          </div>
                                                
                                         <?php   } ?>
           
            <!--======= CONTENT START =========-->

<section class="courses">
    <div class="container">
                            <div class="col-md-offset-9">

                            

                                
                          </div>  
                                                <!--======= TITTLE =========-->
                        <div class="tittle">
                            <h3>Teacher Profile</h3>
                            <h4 class="text-danger"> <?php $this->session->flashdata('cancel1'); ?></h4>
                            <hr>
                        </div>
                       

                        <!--======= MONTH TITTLE =========-->
<?php  

$id = $this->uri->segment(3);
$user = $this->ion_auth->user($id)->row(); 

// echo "<pre>";
// print_r($user['user']);exit;

                    $user_id    = $user->id;
                    $first_name = $user->first_name;
                    $last_name  = $user->last_name;
                    $email      = $user->email;
                    $city       = $user->state;
                    $country    = $user->countrys;
                    $message    = $user->message;
                    $image      = $user->images;
                    $gender      = $user->gender;
                
               ?>
                   
               <?php  $teacher['teacher'] = Teacher::find_by_user_id($user_id);?>

                                  <?php // echo "<pre>";
                                 // print_r($teacher);exit; 

                                
                                          $tec_id          = $teacher['teacher']->user_id;
                                          $fee1            = $teacher['teacher']->fee;
                                          $lang1           = $teacher['teacher']->lang1;
                                          $subject         = $teacher['teacher']->subject;
                                          $teach1          = $teacher['teacher']->teach1;
                                          $mhri            = $teacher['teacher']->mhri;
                                          $mhrg            = $teacher['teacher']->mhrg;
                                          $about_us        = $teacher['teacher']->about_us;
                                          $mobile          = $teacher['teacher']->mobile;
                                          $education       = $teacher['teacher']->education;
                                          $university      = $teacher['teacher']->university;
                                          $city            = $teacher['teacher']->city;
                                          $country         = $teacher['teacher']->country;
                                          $skype           = $teacher['teacher']->skype;
                                          $age             = $teacher['teacher']->age;
                                          $experiance      = $teacher['teacher']->experiance;
                                          $certificates    = $teacher['teacher']->certificates;
                                          $specilization   = $teacher['teacher']->specilization;
                                          $pic             = $teacher['teacher']->pic;
                                          $vedio           = $teacher['teacher']->vedio;
                                          $facebook        = $teacher['teacher']->facebook;
                                          $whatsup         = $teacher['teacher']->whatsup;
                                          $level1          = $teacher['teacher']->level;
                                          $youtube_url     = $teacher['teacher']->youtube_url;

                                          $level =  explode(',',$level1);

                                          //print_r($level);
                                          
                                           $mhri1 =  ($mhri)*(100+10)/100;
                                           $mhrg1  =  ($mhrg)*(100+10)/100;
                        
                        


               ?>
        



                        <!--======= RODUCTS =========-->
                        <section class="products"> 
 <h3><?= $this->session->flashdata('succ'); ?></h3>

                            <!--======= PRODUCTS ROW =========-->
                            
                          <div class="row">
                              <div class="col-md-7">
                                  <div class=" col-md-12">
                                    
                                        <div class="row">
                                            <div class=" col-xs-6 col-lg-4">
                                                       <div style="margin-top: 20px;"></div>                   
                                                 <ul class="list-group">
                                                    <li class="list-group-item" contenteditable="false"><img class="" src="
                                                                    <?php 

                                                                    if($pic != "")
                                                                        {
                                                                        //show picture from database
                                                                        $pic;
                                                                        }
                                                                        else
                                                                        {
                                                                        //show generic picture
                                                                        $pic = "demo.jpg";
                                                                        }
                                                                     ?>



                                                      <?= base_url();?>uploads/images/<?= $pic; ?> " width="100%" height="200" alt=""></li>
                                                </ul>
                                                
                                                <?php
    

     if ($currentGroups==2) {
          echo " ";
      } 
      elseif ($currentGroups==3) { ?>
             
             <ul class="stars list-group" style="margin-left: 45px;" >
                                                  <h3><a href="javascript:void(0)">Ratting</a></h3>
                                                 <?php  
                                                   $ratting = Ratting::find_by_sql("SELECT AVG(ratings) AS total FROM `rattings` WHERE teacher_id = {$user_id}");
                                                                 
                                                       $ratting = $ratting[0]->total;      //$ratting =    $ratting->ratings;

                                                                    

                                                         ?>                  <?php if($ratting){

                                                for($i=0; $i<$ratting; $i++){?>
                                                <li style="display: inline; color: #FFB502;"><i class="fa fa-star"></i></li>
                                                <?php }} 
                                                else{ ?>

                                                <li style="display: inline;color:#6302ff30; class="no-rate"><i class="fa fa-star"></i></li>
                                                <li style="display: inline;color:#6302ff30; class="no-rate"><i class="fa fa-star"></i></li>
                                                <li style="display: inline;color:#6302ff30; class="no-rate"><i class="fa fa-star"></i></li>
                                                <li style="display: inline;color:#6302ff30; class="no-rate"><i class="fa fa-star"></i></li>
                                                <li style="display: inline;color:#6302ff30; class="no-rate"><i class="fa fa-star"></i></li>
                                            
                                           <?php } ?>
                                            <br>&nbsp;&nbsp;&nbsp;<button class="label label-primary" data-toggle="modal" data-target="#conf1" style="border-radius: .25em;    border: none;">Ratting</button>
                                               </ul>


    <?php  }
      elseif ($currentGroups==4) {
       
      echo " ";
      }
      elseif ($currentGroups==5) { ?>

         <ul class="stars list-group" style="margin-left: 45px;" >
                                                  <h3><a href="javascript:void(0)">Ratting</a></h3>
                                                 <?php  
                                                   $ratting = Ratting::find_by_sql("SELECT AVG(ratings) AS total FROM `rattings` WHERE teacher_id = {$user_id}");
                                                                 
                                                       $ratting = $ratting[0]->total;      //$ratting =    $ratting->ratings;

                                                                    

                                                         ?>                  <?php if($ratting){

                                                for($i=0; $i<$ratting; $i++){?>
                                                <li style="display: inline; color: #FFB502;"><i class="fa fa-star"></i></li>
                                                <?php }} 
                                                else{ ?>

                                                <li style="display: inline;color:#6302ff30; class="no-rate"><i class="fa fa-star"></i></li>
                                                <li style="display: inline;color:#6302ff30; class="no-rate"><i class="fa fa-star"></i></li>
                                                <li style="display: inline;color:#6302ff30; class="no-rate"><i class="fa fa-star"></i></li>
                                                <li style="display: inline;color:#6302ff30; class="no-rate"><i class="fa fa-star"></i></li>
                                                <li style="display: inline;color:#6302ff30; class="no-rate"><i class="fa fa-star"></i></li>
                                            
                                           <?php } ?>
                                            <br>&nbsp;&nbsp;&nbsp;<button class="label label-primary" data-toggle="modal" data-target="#conf1" style="border-radius: .25em;    border: none;">Ratting</button>
                                               </ul>
  
     
    <?php  }
      ?>     

                                               


                                            </div>

                                            <div class="col-xs-12 col-sm-6 col-lg-8">

                                               <ul class="list-group">
                                                     <li class="list-group-item  text-muted" contenteditable="false"><h2><?php if($first_name == ''){ echo $username;}else{echo $first_name;}  ?></h2><h3></h3></li>

                                                   <?php 

                                                                                if($subject != "")
                                                                                    { ?>
                                                                                    
                                                                                   <li class="list-group-item text-right"><span class="pull-left"><strong class="">Teaching Subjects</strong></span><?php if($subject != ""){ echo $subject;}else{echo "&nbsp;";} ?></li>

                                                                                   <?php  }
                                                                                    else
                                                                                    { ?>
                                                                                    
                                                                                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Teaching Language</strong></span><?php if($lang1 != ""){ echo $lang1;}else{echo "&nbsp;";} ?></li>
                                                                                  <?php  }
                                                                                 ?>

                                                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Minimum Hourly Rate</strong></span> $<?php if($mhri1 != ""){ echo $mhri1;}else{echo "&nbsp;";} ?></li>
                                                                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Group Hourly Rate</strong></span> $<?php if($mhrg1 != ""){ echo $mhrg1;}else{echo "&nbsp;";} ?></li>
                                                                
                                                    
                                                
                                                    <li class="list-group-item text-right">
                                                    <?php
    

     if ($currentGroups==2) {
          echo " ";
      } 
      elseif ($currentGroups==3) {
       echo " ";
      }
      elseif ($currentGroups==4) {
       
      echo " ";
      }
      elseif ($currentGroups==5) {
  
      // echo  '<span class="pull-left"><strong class="">Skype </strong></span>'.$skype;
      }; 
// echo "<pre>";
//     print_r($currentGroups==4);
//     exit;
      ?>     




                                                      </li>

                                                      <li class="list-group-item text-right">
                                                    <?php
    

     if ($currentGroups==2) {
          echo " ";
      } 
      elseif ($currentGroups==3) {
       echo " ";
      }
      elseif ($currentGroups==4) {
       
      echo " ";
      }
      elseif ($currentGroups==5) {
  
      // echo  '<span class="pull-left"><strong class="">Email </strong></span>'.$email;
      }; 
// echo "<pre>";
//     print_r($currentGroups==4);
//     exit;
      ?>     




                                                      </li>

                                                      <li class="list-group-item text-right">
                                                    <?php if ($currentGroups==2) { echo " "; } elseif ($currentGroups==3) {echo " "; }elseif ($currentGroups==4) {echo " ";} elseif ($currentGroups==5) 
                                                    {
                                                        // echo  '<span class="pull-left"><strong class="">Contact No: </strong></span>'.$mobile;
                                                    } ?>     



                                                    

                                                      </li>



                                                      <?php
                                                        if ($currentGroups == 2) {
                                                            
                                                        } elseif ($currentGroups == 3) { ?>

                                                            <?php  
                                                                    $users = $this->ion_auth->user()->row(); 
                                                                       $book = Booking::find_all_by_indi_id($users->id);


                                                                             foreach ($book as $s) {
                                                                                   $cc[] = $s->teacher_id;
                                                                                  // print_r($cc);
                                                                                  //$cc = explode(',', $cc);
                                                                                 $ct= json_encode($cc); 
                                                                                
                                                                               
                                                                                  }


                                                                      
                                                                      // echo $this->uri->segment(3);
                                                                       // echo $book->teacher_id;

                                                  if(!$book == null)
                                                  {
                                                    if(in_array($this->uri->segment(3), $cc))
                                                    {
                                                     echo "";
                                                    }
                                                    else{ ?>

                                                       <a href="" data-toggle="modal" data-target="#caa111" style="color: white;" class=" btn btn-primary btn-block">Reserve a Trial</a>

                                                <?php } }else { ?> 

                                                    <a href="" data-toggle="modal" data-target="#caa111" style="color: white;" class=" btn btn-primary btn-block">Reserve a Trial</a>

                                                    <?php } ?>
                                                                   
                                                                    
                                                                    <!-- <li class=" btn btn-primary btn-block"><a href="<= //site_url('calenderview/teachersdetail/'.$user->id); ?>" style="color: white;">Reserve a Trial</a></li> -->

                                                               <?// site_url('calenderview/teachersdetail/'.$user->id); ?>     

                                                                   
                                                            
                                                            

                                                      <li class=" btn btn-primary btn-block"><a href="#downn" style="color: white;">Book Now</a></li>

                                                     <?php   }  elseif ($currentGroups == 5) { ?>

                                                            <li >

                                                              <?php $tec = $this->cart->contents();


                                                              foreach ($tec as $tts) {
                                                                   $cc2[] = $tts['teacher_id'];
                                                          
                                                                    
                                                                
                                                               
                                                                  } ?>
                                                              
                                                              

                                                           <?php echo form_open(site_url("Insti_book/add_eventss"), array("class" => "form-horizontal","id"=>"conff11")) ?>
                        
                                                             <?php   $id1 = $this->uri->segment(3)?>
                                                              
                                                             
                                                                

                                                          

                                                            <input type="hidden" class="form-control" name="id" value="<?= $id1; ?>">
                                                             <input type="submit" value="book teacher" class=" btn btn-primary btn-block"   <?php if (!$tec == null) {if(in_array($id1, $cc2)){ echo "disabled"; } } ?>>
                                                            
                                                              </li>
                                                              <?php echo form_close(); ?>
                                                      <?php  } ?>
                                                        
                                                      

                                                </ul>
                                                
                                            </div>
                                        </div>                                  
                                  </div>
                              </div>

                              
                            
                              
                               <div class="col-md-5">
                                  <div class=" col-md-12">
                                      <center><h4><a href="javascript:void(0)">Video</a></h4></center><br>
                                       <div class="embed-responsive embed-responsive-16by9">
                                        <?php 
                                                       


                                         if($youtube_url != "")
                                             {
                                             //show picture from database
                                             $vedio = $youtube_url;
                                             }
                                             else
                                             {
                                             //show generic picture
                                             $vedio = "LH57BAO9K88";
                                             }
                                        
                               
                                      ?>
                             <iframe autoplay="false" class="embed-responsive-item video" src="https://www.youtube.com/embed/<?= stripslashes($vedio); ?>" allowfullscreen></iframe>

                                          
                                      </div>
                                  </div>
                              </div>
                           
                    </div>  
                 <?php  
           $ratting = Ratting::find_by_sql("SELECT AVG(ratings) AS total FROM `rattings` WHERE teacher_id = {$user_id}");
                         
               $ratting = $ratting[0]->total;      //$ratting =    $ratting->ratings;

                            

                 ?>
                    
                    <div class="row">
                        <div class="col-md-10">
                            <ul class="nav nav-tabs">
                              <li class="active"><a href="#home" data-toggle="tab">About Me</a></li>
                              <li><a href="#profile" data-toggle="tab">Basic Details</a></li>
                              <li><a href="#profile2" data-toggle="tab">C.V</a></li>
                              <li><a href="#profile3" data-toggle="tab">Proficiency Level</a></li>
                              <li><a href="#profile4" data-toggle="tab">Certificates</a></li>
                              

                            </ul>
                            <div id="myTabContent" class="tab-content">
                                  <div class="tab-pane fade active in" id="home">
                                    <div class="row">
                                    
                                        <div class="col-md-offset-1">
                                      <h3><center>About Me</center></h3>
                                                    
                                                     <?php 
                                                              $this->load->helper('text');


                                                     if($about_us != "") {  ?>
                                                             <div class="well" id="text1">
                                                         <?php  //$pos=strpos($about_us, ' ', 10); $pos1=    substr($about_us,0,$pos );  
                                                         $pos1 = ellipsize($about_us, 50);
                                                          
                                                          echo $pos1; ?>
                                                          </div>
                                                     <?php  } ?>
                                                    


                                                     <div id="demo" class="collapse">
                                                         <div class="well"> 
                                                        <?php echo  $about_us; ?>
                                                        </div>
                                                      </div>
                                                    
                                                  
                                                      <a  id="view1" data-toggle="collapse" data-target="#demo"><b style="cursor: pointer;">Read More</b></a>
                                                        

                                                      <a  id="view2" data-toggle="collapse" data-target="#demo"><b style="cursor: pointer;">Read Less</b></a>
                                        
                                      </div>
                                   

                                   

                                    
                                    </div>
                                  </div>


                                  <div class="tab-pane fade" id="profile">
                                   <div class="col-md-10"> <p>
                                      <div class="well">
                                          <p><div class="col-md-6"><strong>Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> </div><?= $first_name ?></p>

                                            <?php if ($currentGroups==2) 
                                            { echo " "; } 
                                            elseif ($currentGroups==3) 
                                                {echo " "; }
                                            elseif ($currentGroups==4) 
                                                {echo " ";} 
                                            elseif ($currentGroups==5) 
                                                {?> <p><div class="col-md-6"><strong>SkpeId:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div> <?= $skype ?></p>
                                               <?php } ?>


                                            <?php if ($currentGroups==2) 
                                            { echo " "; } 
                                            elseif ($currentGroups==3) 
                                                {echo " "; }
                                            elseif ($currentGroups==4) 
                                                {echo " ";} 
                                            elseif ($currentGroups==5) 
                                                {?> <p><div class="col-md-6"><strong>Contact:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div> <?= $mobile ?></p>
                                               <?php } ?>

                                          



                                          
                                         <div id="detail"> 
                                        <p><div class="col-md-6"><strong>Gender:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div> <?php if($gender){ echo $gender ;}else{ echo "&nbsp;";}  ?></p>

                                        <p><div class="col-md-6"><strong>Age:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div> <?php if($age){echo $age;}else{ echo "&nbsp;";}  ?></p>

                                        <p><div class="col-md-6"><strong>Country:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div> <?php if($country){ echo $country;}else{ echo "&nbsp;";}  ?></p>

                                        <p><div class="col-md-6"><strong>City:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> </div><?php if($city){echo $city;}else{ echo "&nbsp;";}  ?></p>

                                        <p><div class="col-md-6"><strong>Education:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div> <?php if($education){ echo $education;}else{ echo "&nbsp;";}  ?></p>

                                        <p><div class="col-md-6"><strong>University:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div> <?php if($university){ echo $university;}else{ echo "&nbsp;";}  ?></p>
                                        <?php
                                        if($lang1)
                                        {
                                            ?>
                                            <p><div class="col-md-6"><strong>Language:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div> <?php if($lang1){ echo $lang1;}else{ echo "&nbsp;";}  ?></p>
                                        <?php }
                                        else
                                        {
                                            ?>
                                            <p><div class="col-md-6"><strong>Subject:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div> <?php if($subject){ echo $subject;}else{ echo "&nbsp;";}  ?></p>
                                        <?php }

                                        ?>
                                        
                                        <?php if($experiance){ ?>
                                        <p><div class="col-md-6"><strong>Experiance:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div> <?php if($experiance){ echo $experiance;}else{ echo "&nbsp;";}  ?></p>

                                       <?php }

                                        ?>
                                        

                                         <?php if ($currentGroups==2) 
                                            { echo " "; } 
                                            elseif ($currentGroups==3) 
                                                {echo " "; }
                                            elseif ($currentGroups==4) 
                                                {echo " ";} 
                                            elseif ($currentGroups==5) 
                                                {?>  <p><div class="col-md-6"><strong>Whatsup:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div> <?php if($whatsup){echo $whatsup;}else{ echo "&nbsp;";}  ?></p>
                                               <?php } ?>


                                       

                                         <?php if($specilization){ ?>

                                        <p><div class="col-md-6"><strong>Specilization:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div> <?php if($specilization){echo $specilization;}else{ echo "&nbsp;";}  ?></p>

                                        <?php }

                                        ?>

                                        </div>


                                      </div>
                                         <a  id="detail1" data-toggle="collapse" data-target="#demo"><b style="cursor: pointer;">Read More</b></a>
                                                        

                                                      <a  id="detail2" data-toggle="collapse" data-target="#demo"><b style="cursor: pointer?php if(){}else{ echo "&nbsp;";}>Read Less</b></a>
                                   </div>

                                  
                                  </div>



                                  <div class="tab-pane fade" id="profile1">
                                     <div class="col-md-12">  
                                      <p>
                                          <div class="well">
                                          <p><div class="col-md-6"><strong>Minimum Hourly Rate(USD $) - Individual Classes:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> </div><?= $mhri1 ?></p>
                                          <p><div class="col-md-6"><strong>Minimum Hourly Rate(USD $) - Group Classes:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div> <?= $mhrg1 ?></p>
                                      </div>
                                      </p>
                                     </div>
                                  </div>
                                   <?php $cv = Cvs::find_all_by_user_id($user_id);
                                           // print_r($cv);
                                   ?>
                                <div class="tab-pane fade" id="profile2">
                                    <div class="col-md-10">
                                    <?php foreach($cv as $c): ?> 
                                       <p>
                                          <div class="well">
                                            <p><strong> Year</strong> &nbsp; <?= $c->year ?></p>
                                            <p><strong>Institution</strong> &nbsp;<?= $c->company ?></p>
                                            <p><strong>Experience </strong>&nbsp;<?= $c->exp ?></p>
                                          </div>
                                      </p>
                                  <?php endforeach;?>
                                   </div>
                                  </div>
                                  
                                  <div class="tab-pane fade" id="profile3">
                                   <div class="col-md-10">
                                   <?php foreach($level as $l): ?> 
                                        <p>
                                           <div class="alert alert-info col-md-offset-2 col-md-4">
                                                    <strong><?= $l ?></strong> <br>Nisi magna sint amet mollit voluptate.
                                                  </div>
                                       </p>
                                   <?php endforeach ?>
                                   </div>
                                  </div>
                                    
                                    <?php $cv = Certificate::find_all_by_user_id($user_id);
                                           // print_r($cv);
                                   ?>
                                  <div class="tab-pane fade" id="profile4">
                                   <div class="col-md-10"> 
                                     <?php foreach($cv as $c): ?> 
                                       <p>
                                          <div class="well">
                                            <p><strong> Year</strong> &nbsp; <?= $c->year ?></p>
                                            <p><strong>Certificate</strong> &nbsp;<?= $c->cert ?></p>
                                            
                                          </div>
                                      </p>
                                  <?php endforeach;?>
                                   </div>
                                  </div>

                                  
                         
                                    

                                  
                        </div>

                    </div>

                    
                        </div>       
                         </section>
                         <?php  if($this->session->flashdata('fail')){ ?> 

<script> swal("Oops...!", "You have already Ratted! .", "error");</script>
   <?php } ?>

   <?php  if($this->session->flashdata('success')){ ?> 

<script> swal("Good Job", " Successful", "success");</script>
   <?php } ?>
                       
                       
                       
                     

                    </div>
                </section>

             



<?php
$st = $this->cart->contents();


foreach ($st as $s) {
     $cc[] = $s['id'];
    // print_r($cc);
    //$cc = explode(',', $cc);
   $ct= json_encode($cc); 
  
 
    }

foreach ($calc as $c){
$UTC = new DateTimeZone("UTC");
$newTZ = new DateTimeZone("America/New_York");
$start = new DateTime( $c->start, $UTC );
$start->setTimezone( $newTZ );
//echo $start->format('Y-m-d H:i:s'); echo "<br>";
$end = new DateTime( $c->end, $UTC );
$end->setTimezone( $newTZ );
//echo $end->format('Y-m-d H:i:s'); echo "<br>";

// foreach ($st as $s) {
//   echo  $cc = $s['id'];
//     $cc = explode(',', $cc);
// }

}
?>

<script type="text/javascript">
  
  var tz = jstz.determine(); // Determines the time zone of the browser client
    var timezone = tz.name(); //'Asia/Kolhata' for Indian Time.
 
  </script>
 <?php $timezone = "<script>document.write(timezone)</script>"; 
   
  // echo $timezone;
 ?>






            <script>
                $(document).ready(function () {
                  
                    
   

                    var date = new Date();
                    var d = date.getDate();
                    var m = date.getMonth();
                    var y = date.getFullYear();



                    var calendar = $('#calendar').fullCalendar({

                        header: {
                            left: 'today,next',
                            center: 'title',
                            right: 'agendaWeek'

                                    },
                                    defaultView: 'agendaWeek',
                                    slotDuration: "00:30:00",
                                    allDaySlot: false,
                                    displayEventTime:false,
                                     selectable: true,
                                    events:
                                            [
            <?php foreach ($calc as $c):

// $UTC = new DateTimeZone("UTC");
// $newTZ = new DateTimeZone("America/New_York");
// $start = new DateTime( $c->start, $UTC );
// $start->setTimezone( $newTZ );
// $start->format('Y-m-d H:i:s'); 
// $end = new DateTime( $c->end, $UTC );
// $end->setTimezone( $newTZ );
// $end->format('Y-m-d H:i:s'); 
                ?>

                                        {
                                            id:<?= $c->id; ?>,
                                            title: '',
                                            start: '<?= $c->start ; ?>',
                                            end: '<?= $c->end ; ?>',
                                            color: '<?php
                                                    if ($c->status == 0) {
                                                        if (!$st == null) {
                                                            if (in_array($c->id, $cc)) {
                                                                echo "#6c2df4";
                                                            } else {
                                                                echo "#2DEE5A";
                                                            }
                                                        } else {
                                                            echo "#2DEE5A";
                                                        }
                                                    } else {
                                                        echo "#F42D2D";
                                                    }
                                                    ?>',
                                             url: '#',

                                                rendering: 
                                                '<?php
                                                            if ($c->status == 0) {
                                                                if (!$st == null) {
                                                                    if (in_array($c->id, $cc)) {
                                                                        echo "background";
                                                                    } else {
                                                                        echo "";
                                                                    }
                                                                } else {
                                                                    echo "";
                                                                }
                                                            } else {
                                                                echo "background";
                                                            }
                                                            ?>'
                                                ,

                                            },

                                                      <?php endforeach; ?>
                                    ]
                                                    ,

                                                    timezone: 'UTC', 

                                                        
   
                      



                                                    eventClick: function(event, jsEvent, view) {

                                                        var startTime = moment(event.start, "Y-MM-DD HH:mm:ss");
                                                        var endTime = moment(event.end, "Y-MM-DD HH:mm:ss");
                                                        var duration = moment.duration(endTime.diff(startTime));
                                                        var hours = parseInt(duration.asHours());
                                                        var minutes = parseInt(duration.asMinutes())-hours*60;
                                                        var selectionStart = moment(event.start); 
                                                        var today = moment(); // passing moment nothing defaults to today

                                                        
                                                       
                                                       
                                                        if (selectionStart < today) 
                                                          { 
                                                            swal('Not allowed'); 
                                                          }
                                                        else{

                                                          if (minutes == 30 ) {





                                                            var insti = '<?php $currentGroups==5 ?>';
                                                            if(insti){

                                                              $('#dateid').val(event.start);
                                                              $('#event_id').val(event.id);
                                                              $('#conff').submit();

                                                            }
                                                            else{

                                                              $('#dateid').val(event.start);
                                                              $('#event_id').val(event.id);
                                                              $('#conff').submit();

                                                            }
                                                          }

                                                        }

                                                    
                                                    
                                                       },

                                                       
                                                   

                                                });

                                            });
            </script>



            <script type="text/javascript">
                // To conform clear all data in cart.
                function clear_cart() {
                    var result = confirm('Are you sure want to clear all bookings?');
                    if (result) {
                        window.location = "<?php echo base_url(); ?>calenderview/removes";
                    } else {
                        return false; // cancel button
                    }
                }
            </script>





            <!-- </div> -->
            <!-- </div>  -->
            <p>&nbsp;</p>
            <div class="container">

                <?php  if($currentGroups==5){?>
               <div class="col-md-12"> 
               <?php } else{?> <div class="col-md-7"> <?php }?>
                <!--======= TITTLE =========-->
                <div class="tittle">
                  <?php  if($currentGroups==5){?>

                        <!-- <div id='calendar' class="col-md-12"></div>
 -->

            <?php    } else{?> 

                    <h3 id="downn">Time Table</h3>

                    <hr>
                    <style type="text/css">
                                         .dot {
                                        height: 18px;
                                        width: 18px;
                                        background-color: #bbb;
                                        border-radius: 50%;
                                        display: block;
                                        margin-bottom: 10px;
                                        margin-left: 25px;
                                      }
                                       </style>         
                                      <table width="30%" style="margin-left: 5%;">
                                        <tr>
                                           <td style="text-align:left;">
                                               <span class="dot" style="background-color: #FFB2B2"></span>
                                          </td>
                                          <td style="text-align:left;">
                                               <strong>Booked Class</strong>
                                          </td>
                                        </tr>
                                        <tr>
                                             <td style="text-align:left;">
                                               <span class="dot"  style="background-color:#3FFF81"> </span>
                                          </td>
                                           <td style="text-align:left;">
                                             <strong> Free Class </strong>
                                          </td>
                                        </tr>
                                        <tr>
                                             <td style="text-align:left;">
                                               <span class="dot"  style="background-color:#DAB2FD"> </span>
                                          </td>
                                           <td style="text-align:left;">
                                             <strong> Ready to Book </strong>
                                          </td>
                                        </tr>
                                      </table>

                  <?php } ?>
                </div>
            </div>
            <div class="row">

                <?php  if($currentGroups==5){?>

                        <!-- <div id='calendar' class="col-md-12"></div>
 -->

            <?php    } else{?> 
                <div id='calendar' class="col-md-7"></div>
                <div class="col-md-5"> 
                <!--======= TITTLE =========-->
                <div class="tittle" id="cac">
                    <h3 id="p1">Payment</h3>

                    <hr>
                </div>  
            







    <div class="row">    
              <div class="col-md-12">
                <?php echo form_open(base_url("calenderview/removes/#p1")); ?>
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
                      <th>Date</th>
                      <th>Name</th>
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
                            <input type="checkbox" name="del[]" class="del" value="<?php echo $items['rowid']; ?>">
                          </td>
                          <td>
                            <?php echo $j++; ?>
                          </td>
                          <td>
                            <?php $date = new DateTime($items['date']); echo date_format($date, 'd-m-Y H:i:s'); ?>

                          </td>
                          <td>
                            <?php echo $items['name']; ?>
                            <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
                              <p>
                                <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
                                  <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />
                                <?php endforeach; ?>
                              </p>
                            <?php endif; ?>
                          </td>
                          <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                          <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                        </tr>
                        <?php $i++; ?>
                      <?php endforeach; ?>
                      <tr>
                        <td colspan="6">&nbsp;</td>
                      </tr>
                      <tr>

                        <!-- <td colspan="2"> </td> -->
                        <td colspan="4"> </td>
                        <td style="text-align:right"><strong>Total</strong></td>
                        <td style="text-align:right"><strong>$<?php echo $this->cart->format_number($this->cart->total()); ?></strong></td>
                      </tr>
                      
                      <tr>
                        <td colspan="6"> <p style="width:80%; margin-left: 10%;">

                        <!-- <//php eho anchor('calenderview/removes/' . $items['rowid'] . '/' . $this->uri->segment(3), 'Remove', ['class' => 'btn btn-primary ']); ?> -->
                        <div class="row">
                        <div class="col-md-6">
                        
                        <?= form_submit('Remove', 'Remove',['class' => 'btn btn-primary btn-sm','style'=>'height:25px;width:150px;text-align: center; line-height: 7px;background: #009cde;','id'=>'remove_id']);?></div>
                        <div class="col-md-6">
                        <div class='pay'>
                       <div id="paypal-button-container"></div>
                      </div>
                      </div>
                       </div>
                      </p></td>
                      </tr>
                    <?php endif; ?>
                  </table>
                 
                  <?php echo form_close(); ?>
                </div>
              </div>

<?php }?>

           
<style type="text/css">
    .mailchimp {
    background: #cbdff2;
   
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffaf4b', endColorstr='#ff920a',GradientType=0 );
    border: none;
    padding: 6px;
    text-align: center;
    border-radius: 8px;
    margin: 0 auto;
    padding: 2% 4%;
    max-width: 300px;
}

#mc_embed_signup label {
    color: #215E7B;
    font-family: 'Sonsie One', Arial, san-serif;
    font-size: 25px;
    padding-top: 10px;
    display: block;
}
</style>


            <div class="row">
              <div class="col-md-offset-2 col-md-8">
                <div class="text-danger">
                    <p>&nbsp;</p>
                  <?php
                  $cart_check = $this->cart->contents();
                   //If cart is empty, this will show below message.

                    if($currentGroups==5){

                        

              } else{
                    
                  if (empty($cart_check)) {
                    echo 'Book your class on green cell showing on calendar "Add to class" Button';
                  }
    
                  }

                  ?> 
                </div>
              </div>
            </div> 








            </div>
            </div>
            </div>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
<div class="modal fade" id="conf" role="dialog">
    <div class="modal-dialog">
        
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirm Booking?</h4>
            </div>
            <div class="modal-body">
                <p> <div class="row">
                    <!--======= CONTACT FORM =========-->
                    


                    
                    <div class="col-md-8 col-md-offset-4">
                        <?php echo form_open(site_url("calenderview/add_eventss/#p1"), array("class" => "form-horizontal","id"=>"conff")) ?>
                        <div class="form-group">
                            <label for="p-in" class="col-md-12 label-heading">Confirm Booking?</label>
                            <div class="col-md-8 ui-front">
                                <?php  $id = $this->uri->segment(3)?>
                                <input type="hidden" class="form-control" name="id" value="<?= $id;?>">
                                <input type="hidden" name="event_id" id="event_id" value="event_id">
                                <input type="hidden" name="dateid" id="dateid" value="dateid">
                            </div>
                        </div>
                        <button type="button" class="btn btn-default" >No</button>
                        <input type="submit" class="btn btn-primary"  value="Yes">
                        <?php echo form_close() ?>
                        
                    </div></p>
                </div>
                <div class="modal-footer" style="padding: 2px;
                    margin-top: 45px;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    
</div>


<div class="modal fade" id="" role="dialog">
    <div class="modal-dialog">
        
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirm Booking?</h4>
            </div>
            <div class="modal-body">
                <p> <div class="row">
                    <!--======= CONTACT FORM =========-->
                    


                    
                    <div class="col-md-8 col-md-offset-4">
                        <?php echo form_open(site_url("calenderview/add_eventss1"), array("class" => "form-horizontal","id"=>"conff1")) ?>
                        <div class="form-group">
                            <label for="p-in" class="col-md-12 label-heading">Confirm Booking?</label>
                            <div class="col-md-8 ui-front">
                                <?php  $id = $this->uri->segment(3)?>
                                <input type="hidden" class="form-control" name="id" value="<?= $id;?>">
                                <input type="hidden" name="event_id" id="event_id1" value="event_id">
                                <input type="hidden" name="dateid" id="dateid1" value="dateid">
                            </div>
                        </div>
                        <button type="button" class="btn btn-default" >No</button>
                        <input type="submit" class="btn btn-primary"  value="Yes">
                        <?php echo form_close() ?>
                        
                    </div></p>
                </div>
                <div class="modal-footer" style="padding: 2px;
                    margin-top: 45px;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    
</div>

<div class="container">
  
  <div class="modal fade" id="conf1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Give Rating</h4>
        </div>
        <div class="modal-body">
          <p> <div class="row">
                        <!--======= CONTACT FORM =========-->
                        <div class="col-xs-12 col-md-12">
                          <?php echo form_open(site_url("frontend/auth_login/rating"), array("class" => "form-horizontal",'id' => 'contact_form4')) ?>
                    
                        <div class=" col-md-offset-2 col-md-6">
                            <div class="form-group">
                                <label> How do you rate this Teacher? </label>
                                <div class="rating-here"> 
                                <?php  $id = $this->uri->segment(3);
                                $user->id;?>                               
                                    <input type="number" name="ratings" min="1" max="5" class="form-control" value="" placeholder="please rate 0 to 5">
                                    
                                       <input type="hidden" name="teacher_id"  value="<?= $id ?>">
                                        <input type="hidden" name="users_id"  value="<?= $user->id?>">
                                </div>
                            </div>
                            <div class="form-group">
                               <input type="submit" class="btn btn-info" value="Submit">
                            </div>
                        </div>
                        
                    </form>
                </div>
                          
                         </div></p>
        </div>
        <div class="modal-footer" style="padding: 2px;
    margin-top: 45px;">
          <button type="button" class="btn btn-default " data-dismiss="modal" style="
    margin-right: 45px;">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

            <footer>

                <!--======= RIGHTS =========-->
                <div class="rights">
                    <div class="container-fluid">
                        <ul class="row">
                            <li class="col-md-8">
                                <p>All Rights Reserved © Demo |<a href="<?= site_url('home/policys')?>">Privacy Policy </a>   <a href="<?= site_url('home/termss')?>" >Terms and Conditions</a></p>
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
    <script src="<?= base_url(); ?>assets/front/js/wow.min.js"></script>
    <script src="<?= base_url(); ?>assets/front/js/bootstrap.js"></script>
    <script src="<?= base_url(); ?>assets/front/js/drive-me-plugin.js"></script>
    <script src="<?= base_url(); ?>assets/front/js/jquery.cookie.js"></script>
    <script src="<?= base_url(); ?>assets/front/js/jquery.isotope.min.js"></script>
    <script src="<?= base_url(); ?>assets/front/js/jquery.flexslider-min.js"></script>
    <script src="<?= base_url(); ?>assets/front/js/mapmarker.js"></script>
    <script src="<?= base_url(); ?>assets/front/js/color-switcher.js"></script>
    <script src="<?= base_url(); ?>assets/front/js/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url(); ?>assets/front/js/owl.carousel.min.js"></script>
    <script src="<?= base_url(); ?>assets/front/js/main.js"></script>
    <script src="<?= base_url(); ?>assets/front/js/custom.js"></script>
    






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

                    //$('#asds').modal('show');
                   


                   var ourObj = {};

                       ourObj.data = payment;

                    jQuery.ajax({
                    type: "POST",
                    url: "<?= site_url('Paypal'); ?>",
                    data: {"points" : JSON.stringify(ourObj)},
                     success: function(data){ 

                         
                       $('.work-in-progress').show();
                       setTimeout(function(){ window.location = "<?php echo base_url('calenderview/save_order'); ?>"; }, 100);
                      
                           

           }



         });

                   

                    
                });
            }

        }, '#paypal-button-container');

    
</script>
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
                                amount: { total: 0.1, currency: 'USD' }
                            }
                        ]
                    }
                });
            },

            // onAuthorize() is called when the buyer approves the payment
            onAuthorize: function(data, actions) {

                // Make a call to the REST api to execute the payment
                return actions.payment.execute().then(function(payment) {

                    //$('#asds').modal('show');
                   


                   var ourObj = {};

                       ourObj.data = payment;

                    jQuery.ajax({
                    type: "POST",
                    url: "<?= site_url('Paypal'); ?>",
                    data: {"points" : JSON.stringify(ourObj)},
                     success: function(data){ 

                         
                      $('.work-in-progress').show();

                       setTimeout(function(){ 
                        window.location = "<?php echo base_url('calenderview/save_order1'); ?>"; 
                        }, 100);
                       
                           

           }



         });

                   

                    
                });
            }

        }, '#paypal-button-container1');

    
</script>




<script type="text/javascript">

                                       $('#teacher').hide();
                                       
                                        
                                       $('#cvhide').hide();
                                       $('#certhide').hide();
                                       $('#view2').hide();
                                        $('#detail').hide();
                                         $('#detail2').hide();
                                        $('#cont').hide();
                                         $('#cont2').hide();

                                       
                                       $("#vidd").click(function(){
                                              $('#vid1').show();

                                        });

                                       // $("#vidup").click(function(){
                                       //        $('#vid1').hide();

                                       //  });

                                        $("#fe").click(function(){
                                             $('.pay').show();

                                        });
                                       $("#view1").click(function(){
                                            $('#view2').show();
                                            $('#text1').hide();
                                            $('#view1').hide();
                                        });

                                       $("#view2").click(function(){
                                            $('#view1').show();
                                            $('#view2').hide();
                                           $('#text1').show();
                                        });
    
                                    $("#detail1").click(function(){
                                            $('#detail').show();
                                            $('#detail2').show();
                                            $('#detail1').hide();
                                        });

                                       $("#detail2").click(function(){
                                            $('#detail1').show();
                                            $('#detail2').hide();
                                           $('#detail').hide();
                                        })
    $("#cont1").click(function(){
                                            $('#cont').show();
                                            $('#cont2').show();
                                            $('#cont1').hide();
                                        });

                                       $("#cont2").click(function(){
                                            $('#cont1').show();
                                            $('#cont2').hide();
                                           $('#cont').hide();
                                        })

                                         // $('#event_id1').click(function(){
                                         //    $('#paypal-button-container1').trigger(click);

                                         //       })

                </script>


                <script type="text/javascript">
                    

                    dragElement(document.getElementById(("mydiv1")));

function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "header")) {
    /* if present, the header is where you move the DIV from:*/
    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
  } else {
    /* otherwise, move the DIV from anywhere inside the DIV:*/
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    /* stop moving when mouse button is released:*/
    document.onmouseup = null;
    document.onmousemove = null;
  }
}
                </script>
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
    function printDiv()
    {
        var divToPrint=document.getElementById('DivIdToPrint');
        var newWin=window.open('','Print-Window');
        newWin.document.open();
        newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
        newWin.document.close();
        setTimeout(function(){newWin.close();},10);
    }
</script>


<script type="text/javascript">

$(document).ready(function () {

  $('#caa111').on('shown.bs.modal', function () {
   $("#calendar1").fullCalendar('render');
})

                    

                    var date = new Date();
                    var d = date.getDate();
                    var m = date.getMonth();
                    var y = date.getFullYear();


                    var calendar1 = $('#calendar1').fullCalendar({

                        header: {
                            left: 'today,next',
                            center: 'title',
                            right: 'agendaWeek'

                                    },
                                    defaultView: 'agendaWeek',
                                    slotDuration: "00:30:00",
                                    allDaySlot: false,
                                    displayEventTime:false,
                                     selectable: true,
                                    events:
                                            [
            <?php foreach ($calc as $c):


                ?>

                                        {
                                            id:<?= $c->id; ?>,
                                            title: '',
                                            start: '<?= $c->start; ?>',
                                            end: '<?= $c->end ; ?>',
                                            color: '<?php
                                                    if ($c->status == 0) {
                                                        if (!$st == null) {
                                                            if (in_array($c->id, $cc)) {
                                                                echo "#6c2df4";
                                                            } else {
                                                                echo "#2DEE5A";
                                                            }
                                                        } else {
                                                            echo "#2DEE5A";
                                                        }
                                                    } else {
                                                        echo "#F42D2D";
                                                    }
                                                    ?>',
                                             url: '#',

                                                rendering: 
                                                '<?php
                                                            if ($c->status == 0) {
                                                                if (!$st == null) {
                                                                    if (in_array($c->id, $cc)) {
                                                                        echo "background";
                                                                    } else {
                                                                        echo "";
                                                                    }
                                                                } else {
                                                                    echo "";
                                                                }
                                                            } else {
                                                                echo "background";
                                                            }
                                                            ?>'
                                                ,

                                            },

                                                      <?php endforeach; ?>
                                    ]
                                                    ,

                                                    timezone: 'UTC', 
   



                                                    eventClick: function(event, jsEvent, view) {

                                                       var startTime = moment(event.start, "Y-MM-DD HH:mm:ss");
                                                        var endTime = moment(event.end, "Y-MM-DD HH:mm:ss");
                                                        var duration = moment.duration(endTime.diff(startTime));
                                                        var hours = parseInt(duration.asHours());
                                                        var minutes = parseInt(duration.asMinutes())-hours*60;

                                                       
                                                       var selectionStart = moment(event.start); 
                                                        var today = moment(); // passing moment nothing defaults to today

                                                        
                                                       
                                                       
                                                        if (selectionStart < today) {

                                                          swal('Not Allowed');
                                                        }
                                                          else{

                                                            if (minutes == 30 ) {

                                                      var insti = '<?php $currentGroups==5 ?>';
                                                        if(insti){

                                                            $('#dateid1').val(event.start);
                                                            $('#event_id1').val(event.id);
                                                            $('#conff1').submit();
                                                            $('#caa111').modal('hide');

                                                        }
                                                        else{

                                                            $('#dateid1').val(event.start);
                                                            $('#event_id1').val(event.id);
                                                            $('#conff1').submit();
                                                            $('#caa111').modal('hide');




                                                    }

                                                       
                                                         // $('#paypal-button-container1').trigger('click');;

                                                    }
                                                          }

                                                      
                                                    
                                                    
                                                       },

                                                       
                                                   

                                                });

                                            });
            </script>





          
      

</body>
</html>






<div id="asds" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body" id="DivIdToPrint">
                                                <div class="row">                                   
                                                    <div class="col-md-12 table-responsive">


                                                                <table class="table table-striped">
                                                                  <thead>
                                                                      <tr>
                                                                        
                                                                        <th>Email</th>
                                                                        <th>Payer Mail</th>
                                                                        <th>Product</th>
                                                                        <th>Invoice #</th>
                                                                        
                                                                        <th>Subtotal</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                  <tr>
                                                                    
                                                                    <td><?= $this->session->userdata('email');?></td>
                                                                    <td><?= $this->session->userdata('PayerMail');?></td>
                                                                    <td>Online class</td>
                                                                    <td><?= $this->session->userdata('saleId');?></td>
                                                                    <td><?= $this->session->userdata('Subtotal');?></td>
                                                                </tr>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                     <!-- accepted payments column -->
                                                     <div class="container">
                                                        <p class="lead">Payment Methods:
                                                        
                                                        <img src="<?= base_url();?>assets/admin/dist/img/credit/paypal2.png" alt="Paypal"></p>
                                                    </div>

                                                        
                                                 </div>
                                                 <div class="container">
                                                    <div class=" col-md-6">
                                                     <p class="lead">Amount Due </p>

                                                        <div>
                                                               <table class="table table-responsive">
                                                                 <tr>
                                                                   <th >Subtotal:</th>
                                                                   <td><?= $this->session->userdata('Subtotal');?></td>
                                                               </tr>
                                                                  
                                                                  
                                                               <tr>
                                                                   <th>Total:</th>
                                                                   <td><?= $this->session->userdata('Total');?></td>
                                                               </tr>
                                                           </table> 
                                                              
                                                         </div>
                                                    </div>

                                                         

                                                 </div>



      </div>
      <div class="modal-footer">
        <div class="container" >
            <div class="row">
                <div class="col-md-2">
                    <button type="button" onclick="printDiv();" class="btn btn-info" id="print11">Print</button>
                </div>

                <div class="col-md-6">                                              
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
      </div>
    </div>

  </div>
</div>


<div id="caa111" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Trail Class</h4>
      </div>
      <div class="modal-body">
       <div class="row">
        <style type="text/css">
                                         .dot {
                                        height: 18px;
                                        width: 18px;
                                        background-color: #bbb;
                                        border-radius: 50%;
                                        display: block;
                                        margin-bottom: 10px;
                                        margin-left: 25px;
                                      }
                                       </style>         
                                      <table width="30%" style="margin-left: 5%;">
                                        <tr>
                                           <td style="text-align:left;">
                                               <span class="dot" style="background-color: #FFB2B2"></span>
                                          </td>
                                          <td style="text-align:left;">
                                               <strong>Booked Class</strong>
                                          </td>
                                        </tr>
                                        <tr>
                                             <td style="text-align:left;">
                                               <span class="dot"  style="background-color:#3FFF81"> </span>
                                          </td>
                                           <td style="text-align:left;">
                                             <strong> Free Class </strong>
                                          </td>
                                        </tr>
                                        
                                      </table>
                      <div id='calendar1' class="col-md-12">
                        
                      </div>
                      
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

       $('.work-in-progress').show();
       
    }
};


 
</script>
