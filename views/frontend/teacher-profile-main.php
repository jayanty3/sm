<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8' />
        <meta name="keywords" content="-School Management HTML5 Theme" >
        <meta name="description" content="dignitech">
        <meta name="author" content="jThemes Studio">

        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


        <title>Calender Management</title>

        <!-- FONTS ONLINE -->


        <!--MAIN STYLE-->
        <link href="<?= base_url(); ?>assets/front/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
        <link href="<?= base_url(); ?>assets/front/css/owl.carousel.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url(); ?>assets/front/css/main.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url(); ?>assets/front/css/style.css" rel="stylesheet" type="text/css">       
        <link href="<?= base_url(); ?>assets/front/css/responsive.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url(); ?>assets/front/css/animate.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url(); ?>assets/front/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!--======= flag-icon CSS =========-->
        <link href="<?= base_url(); ?>assets/front/css/flag-icon/css/flag-icon.min.css" rel="stylesheet" type="text/css">
        <!--======= COLOR STYLE CSS =========-->
        <link rel="stylesheet" id="color" href="assets/front/css/color/default.css">
        <link href='<?php echo base_url(); ?>vendor/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
        <link href='<?php echo base_url(); ?>vendor/fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">


        <script src='<?php echo base_url(); ?>vendor/fullcalendar/lib/moment.min.js'></script>
        <script src='<?php echo base_url(); ?>vendor/fullcalendar/lib/jquery.min.js'></script>
        <script src='<?php echo base_url(); ?>vendor/fullcalendar/fullcalendar.min.js'></script>
        <script src='<?php echo base_url(); ?>vendor/fullcalendar/locale-all.js'></script>
        <script src="<?=base_url(); ?>/assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?=base_url(); ?>/assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

        <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" rel="stylesheet" type="text/css" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'ar,en,es,jv,ko,pa,pt,ru,zh-CN', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
            }
        </script>


       <?php  $user['user'] = $this->ion_auth->user()->row(); 

                               $user_id    = $user['user']->id;
                                $first_name = $user['user']->first_name;
                                $last_name  = $user['user']->last_name;
                                $username  = $user['user']->username;
                                $email      = $user['user']->email;
                                $city       = $user['user']->state;
                                $gender     = $user['user']->gender;
                                $country    =$user['user']->countrys;
                                $message    =$user['user']->message;
                                $image      =$user['user']->images;

                           ?>

                           <?php $teacher['teacher'] = Teacher::find_by_user_id($user_id);?>



                            <?php 

                                          $fee1             = $teacher['teacher']->fee;
                                          $lang1           = $teacher['teacher']->lang1;
                                          $subject         = $teacher['teacher']->subject;
                                          $teach1          = $teacher['teacher']->teach1;
                                          $mhri            = $teacher['teacher']->mhri;
                                          $mhrg            = $teacher['teacher']->mhrg;
                                          $about_us        = $teacher['teacher']->about_us;
                                          $mobile          = $teacher['teacher']->mobile;
                                          $education        = $teacher['teacher']->education;
                                          $university       = $teacher['teacher']->university;
                                          $city             = $teacher['teacher']->city;
                                          $country          = $teacher['teacher']->country;
                                          $skype            = $teacher['teacher']->skype;
                                          $age              = $teacher['teacher']->age;
                                          $experiance       = $teacher['teacher']->experiance;
                                          $certificates     = $teacher['teacher']->certificates;
                                          $specilization    = $teacher['teacher']->specilization;
                                          $pic              = $teacher['teacher']->pic;
                                          $vedio            = $teacher['teacher']->vedio;
                                          $facebook         = $teacher['teacher']->facebook;
                                          $whatsup            = $teacher['teacher']->whatsup;
                                          $level1           = $teacher['teacher']->level;
                                          $youtube_url       = $teacher['teacher']->youtube_url;

                                          $level =  explode(',',$level1);

                                          //print_r($level);
                                          
                                           $mhri1 =  ($mhri)*(100+10)/100;
                                           $mhrg1  =  ($mhrg)*(100+10)/100;

                           ?>  



                           <?php  $fee = Fee::find_by_fee_id(1); 
              
?> 




       

        <style type="text/css">
            #calendar {
                max-width: 90%;
                margin: 5% auto;
            }

            #calendar1 {
                max-width: 90%;
                margin: 5% auto;
            }


        </style>

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

.form-control {
    
    
    height: 16px;
    }


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

            .hide1 {
                display: none ;
            }


            hr.fc-divider {
                height: 0;
                margin: 0;
                padding: 0 0 2px;
                border-width: 1px 0;
                width: 100%; }


        </style>

           <style>




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

    </head>
    <body>
      
        <!--======= PRELOADER =========-->
        <div class="work-in-progress">
            <div id="preloader">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
       

    
<?php  if($this->session->flashdata('montly_sub')){ 
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


        <!--======= WRAPPER =========-->
        <div id="wrap"> 
             <?php 
     $user = $this->ion_auth->user()->row();
    $groups = $this->ion_auth->groups()->result_array();
    $currentGroups = $this->ion_auth->get_users_groups()->result();
    foreach ($currentGroups as $key => $a) {

      $currentGroups = $a->id;
      
    }
      
               ?>


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
                                                                                             
                   <?php   $user = $this->ion_auth->user()->row();  ?>
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
                                                echo anchor('institute-profile', 'profile');
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
                                            } ?>"> <a href="<?= site_url('frontend/auth_login/main'); ?>">Home </a></li>                                        
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
                                                            echo anchor('frontend/auth_login/search_teacher_list/Computer', 'Computer Science
');
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
           <section class="courses">
                    <div class="container"> 
                        <!--======= TITTLE =========-->
                        <div class="pull pull-right">
                         <?php   echo anchor('teacher-edit-profile', 'Edit Profile',['class'=>'btn btn-primary']); ?>
                            
                            
                        </div>
                        <div class="tittle">
                            <h3>Teacher Profile</h3>
                            
                            <hr>
                        </div>
                        

            <!--======= CONTENT START =========-->



<section class="products"> 
 <!-- <h3><= $this->session->flashdata('succ'); ></h3> -->

                            <!--======= PRODUCTS ROW =========-->
                            
                          <div class="row">
                              <div class="col-md-7"> <div class=" col-md-12">

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
                                                                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Skype </strong></span><?php if($skype != ""){ echo $skype;}else{echo "&nbsp;";} ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>                                  
                                              </div></div>

                              
                            
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
                                        
                               
                                     //$vedio = $youtube_url; ?>
                             <iframe autoplay="false" class="embed-responsive-item video" src="https://www.youtube.com/embed/<?= stripslashes($vedio); ?>" allowfullscreen></iframe>

                                                     

                                                        
                                                                    
                                                                     ?>
                                                                      
                                    
                                      </div>
                                  </div>
                              </div>
                           
                    </div>  
<p>&nbsp;</p>
                    <div class="row">
                        <div class="col-md-10">
                            <ul class="nav nav-tabs">
                              <li class="active"><a href="#home" data-toggle="tab">About Me</a></li>
                              <li><a href="#profile" data-toggle="tab">Basic Details</a></li>
                              <li><a href="#profile1" data-toggle="tab">Hourly Rate</a></li>
                              <li><a href="#profile2" data-toggle="tab">C.V</a></li>
                              <li><a href="#profile3" data-toggle="tab">Proficiency Level</a></li>
                              <li><a href="#profile4" data-toggle="tab">Certificates</a></li>
                              <li><a href="#profile5" data-toggle="tab">Time Table</a></li>
                              <li><a href="#profile6" data-toggle="tab">Contact</a></li>
                              <li><a href="#profile7" data-toggle="tab">Booked Class</a></li>

                            </ul>
                            <div id="myTabContent" class="tab-content">
                                  <div class="tab-pane fade active in" id="home">
                                    <div class="row">
                                    
                                        <div class="col-md-offset-1 ">
                                      <h3><center>About Me</center></h3>
                                                    
                                                     <?php 

                                                        $this->load->helper('text');

                                                     if($about_us != "") {  ?>
                                                             <div class="well" id="text1">
                                                         <?php //  $pos=strpos($about_us, ' ', 400); $pos1=    substr($about_us,0,$pos );  
                                                         $pos1 = ellipsize($about_us, 50);
                                                          echo $pos1; ?>
                                                          </div>
                                                     <?php  } ?>
                                                    


                                                     <div id="demo" class="collapse">
                                                         <div class="well" style="word-wrap: break-word;"> 
                                                        <?php  echo  $about_us; ?>
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
                                          <p><div class="col-md-6"><strong>Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> </div><?php if($first_name){echo $first_name;}else{echo "&nbsp;";} ?></p>
                                          <p><div class="col-md-6"><strong>SkpeId:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div> <?php if($skype){ echo $skype;}else{echo "&nbsp;";} ?></p>
                                          <p><div class="col-md-6"><strong>Contact:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div> <?php if($mobile){ echo $mobile;}else{echo "&nbsp;";} ?></p>
                                         <div id="detail"> 
                                        <p><div class="col-md-6"><strong>Gender:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div> <?php if($gender){ echo $gender;}else{echo "&nbsp;";} ?></p>

                                        <p><div class="col-md-6"><strong>Age:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div> <?php if($age){ echo $age;}else{echo "&nbsp;";} ?></p>

                                        <p><div class="col-md-6"><strong>Country:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div> <?php if($country){ echo $country;}else{echo "&nbsp;";} ?></p>

                                        <p><div class="col-md-6"><strong>City:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> </div><?php if($city){ echo $city;}else{echo "&nbsp;";} ?></p>

                                        <p><div class="col-md-6"><strong>Education:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div> <?php if($education){echo $education;}else{echo "&nbsp;";} ?></p>

                                        <p><div class="col-md-6"><strong>University:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div> <?php if($university){echo $university;}else{echo "&nbsp;";} ?></p>
                                        <?php
                                        if($lang1)
                                        {
                                            ?>
                                            <p><div class="col-md-6"><strong>Language:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div> <?= $lang1 ?></p>
                                        <?php }
                                        else
                                        {
                                            ?>
                                            <p><div class="col-md-6"><strong>Subject:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div> <?= $subject ?></p>
                                        <?php }

                                        ?>
                                        
                                        <?php if($experiance){ ?>
                                        <p><div class="col-md-6"><strong>Experiance:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div> <?= $experiance ?></p>

                                       <?php }

                                        ?>
                                        

                                        <p><div class="col-md-6"><strong>SkpeId:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div> <?= $skype ?></p>

                                         <?php if($specilization){ ?>

                                        <p><div class="col-md-6"><strong>Specilization:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div> <?= $specilization ?></p>

                                        <?php }

                                        ?>

                                        </div>


                                      </div>
                                         <a  id="detail1" data-toggle="collapse" data-target="#demo"><b style="cursor: pointer;">Read More</b></a>
                                                        

                                                      <a  id="detail2" data-toggle="collapse" data-target="#demo"><b style="cursor: pointer;">Read Less</b></a>
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

                                  <div class="tab-pane fade" id="profile5">

                                   <div class="container"> 



                                    <!--======= TITTLE =========-->
                                    <div class="tittle" id="pan5">
                                      <h3>Time Table</h3>

                                      <hr>
<style type="text/css">
                                         .dot {
                                        height: 25px;
                                        width: 25px;
                                        background-color: #bbb;
                                        border-radius: 50%;
                                        display: block;
                                        margin-bottom: 10px;
                                        margin-left: 25px;
                                      }
                                       </style>         
                                      <table width="20%" style="margin-left: 5%;">
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
                                               <span class="dot"  style="background-color:#B2FFCC"> </span>
                                          </td>
                                           <td style="text-align:left;">
                                             <strong> Free Class </strong>
                                          </td>
                                        </tr>
                                      </table>

                                      <div  id="calendar"></div>


                                    </div>

                                    <!-- <div id='calendar'></div> -->
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                  </div>
                                </div>


                              

                         
                                    <?php 
                                          $cont = User::find_by_id($user_id);
                                          $teach = Teacher::find_by_user_id($user_id); 
                                    ?>
                                  <div class="tab-pane fade" id="profile6">
                                   <div class="col-md-8">
                                <?php   if($cont->email) 
                                   { ?>
                                    <p>
                                          <div class="well">
                                            <p><strong> Email:</strong> &nbsp; <?= $cont->email ?></p>
                                          </div>
                                      </p>
                                     
                                   <?php     } ?>
 
                                  <?php   if($teach->skype) 
                                   { ?>
                                                                                                                               
                                        <p>                                                                                       
                                          <div class="well">
                                            <p><strong> Skype:</strong> &nbsp; <?= $teach->skype ?></p>
                                            
                                          </div>
                                      </p>

                                      <div id="cont">
                                    <?php     } ?>
                                       
 
                                  <?php   if($teach->facebook) 
                                   { ?>
                                      <p>
                                          <div class="well">
                                            <p><strong> Facebook:</strong> &nbsp; <?= $teach->facebook ?></p>
                                            
                                          </div>
                                      </p>
                                    <?php     } ?>
                                    <?php   if($teach->whatsup) 
                                   { ?>

                                      <p>
                                          <div class="well">
                                            <p><strong> Whatsup:</strong> &nbsp; <?= $teach->whatsup ?></p>
                                            
                                          </div>
                                      </p>
                                    <?php     } ?>

 
                                  <?php   if($teach->mobile) 
                                   { ?>
                                      <p>
                                          <div class="well">
                                            <p><strong> Mobile</strong> &nbsp; <?= $teach->mobile ?></p>
                                            
                                          </div>
                                      </p>
                                    <?php     } ?>

                                </div>

                                        <a  id="cont1" data-toggle="collapse" data-target="#demo"><b style="cursor: pointer;">Read More</b></a>
                                                        

                                                      <a  id="cont2" data-toggle="collapse" data-target="#demo"><b style="cursor: pointer;">Read Less</b></a>
                                   </div>
                                  </div>

                                  <div class="tab-pane fade" id="profile7">
                                     <?php $bookings = User::find_by_sql('
                                     SELECT b.booking_id,b.teacher_id,b.indi_id,c.start,u.id,u.first_name,u.last_name,u.levels,o.price 
                                        from bookings b left join 
                                        users u on b.indi_id = u.id left join 
                                        calendars c on b.cal_id = c.id left join 
                                        teachers t on t.user_id = b.teacher_id left join
                                        order_details as o on o.cal_id = b.cal_id where b.teacher_id ='.$user->id.' and c.start >= DATE_SUB(NOW(), INTERVAL 1 MONTH)'); 
                                     
                                   ?>
                                   <div class="col-md-12"> <p><table class="table table-striped table-bordered display" style="width:100%" id="invo">
                                    <thead>
                                    <tr>
                                        <th>year</th>
                                        <th>Month</th>
                                        <th>Student Name</th>
                                        <th>Student Level</th>
                                        <th>Booked Date</th>
                                        <th>Booked Time</th>
                                        <th>Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                                <?php foreach ($bookings as $v) { ?>
                                                    


                                                <tr>
                                                    <td> <?= date_format( new DateTime($v->start),"Y"); ?></td>
                                                    <td><?= date_format( new DateTime($v->start),"M"); ?></td>
                                                    <td><?= $v->first_name.' '.$v->last_name ?></td>
                                                    <td><?= $v->levels ?></td>
                                                    <td><?= date_format( new DateTime($v->start),"d/m/Y"); ?></td>
                                                    <td><?= date_format( new DateTime($v->start)," H:i:s"); ?></td>
                                                    <td><?= $v->price ?></td>
                                                </tr>
                                                <?php  } ?>
                                              </tbody> </table></p></div>
                                  </div>

                        </div>

                    </div>

                    <div class="col-md-2">
                       
                                        <form>
                                         
                                            <div class="radio">
                                              <label   class="radio-inline">
                                                    <input type="radio" name="fee"  value="appear home page" id="fe" <?php if ($fee1 == 'appear home page'){ ?> disabled <?php   } ?>  >
                                                    Appear On Home Page
                                                  </label>
                                            </div>
                                               
                                             <div class="form-group">
                                               
                                                <div   class="col-md-12" >
                                                    
                                                  <div class='pay'>
                                                   <!--  <a href="<= site_url('Paypal_teacher/paypalCheck');?>"  class="btn btn-primary btn-sm"> Pay Now </a> -->
                                                   <div id="paypal-button-container"></div>
                                                  </div>
                                                </div>
                                              </div>   
                                                 
                                             
                                             
                                        </form>
                                    </div>    
                          
                         </section>

                    </div>
                </section>


            <footer>


                <!--======= RIGHTS =========-->
                <div class="rights">
                        <div class="container">
                            <ul class="row">
                                <li class="col-md-8">
                                    <p>All Rights Reserved © Demo |<a href="<?= site_url('home/policys')?>">Privacy Policy </a>   <a href="<?= site_url('home/termss')?>" >Terms and Conditions</a></p>
                                </li>
                                <!--======= SOCIAL ICON =========-->
                                <li class="col-md-4">
                                    <ul class="social_icons">
                                      <li class="youtube"><a href="https://www.youtube.com/youtube" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                      <li class="facebook"><a href="https://www.facebook.com/fb"  target="_blank"><i class="fa fa-facebook"></i></a></li>
                                      <li class="skype"><a href="https://www.skype.com"><i class="fa fa-skype" target="_blank"></i></a></li>
                                        
                                        
                                        
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
    <script src="<?= base_url(); ?>assets/front/op/js/mig.js"></script>
     <script src="<?= base_url(); ?>assets/front/js/printout.js"></script>

     <?php
$st = $this->cart->contents();


foreach ($st as $s) {
     $cc[] = $s['id'];
    // print_r($cc);
    //$cc = explode(',', $cc);
   $ct= json_encode($cc); 
  
 
    }



// foreach ($st as $s) {
//   echo  $cc = $s['id'];
//     $cc = explode(',', $cc);
// }
?>
<?php ?>


<script>



                 $(document).ready(function () {

                    var date = new Date();

                    var d = date.getDate();

                    var m = date.getMonth();

                    var y = date.getFullYear();

                    var calendar = $('#calendar').fullCalendar({

                        editable: true,

                        header: {

                            left: 'today,next',

                            center: 'title',

                            right: 'agendaWeek'

                        },

                        defaultView: 'agendaWeek',

                        slotDuration: "00:30:00",
                        
                        displayEventTime:false,

                        events: "<?= site_url() . 'calender/events1'; ?>"

                        ,

                       // selectable: true,
                        selectOverlap: false,

                       timezone: 'UTC',
                        // eventStartEditable: false,

                       
                        slotEventOverlap:false,



            //             select: function (start, end) {
         
                      
            //          end = $.fullCalendar.moment(start);
            //          end.add(30, 'minutes');
            //         var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
         
            //         var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
            //        var selectionStart = moment(start); 
            //        var today = moment(); // passing moment nothing defaults to today

            // if (selectionStart < today) { 
            //     $('#calendar').fullCalendar('unselect');
            // }
            // else {
           
         
            //         $.ajax({
         
            //             url: '<?= base_url(); ?>calender/add_events',
         
            //             data: '&start=' + start + '&end=' + end,
         
            //             type: "POST",
         
            //            // success: function (json) {
         
            //                 success:function()
            //                    {
            //                     calendar.fullCalendar('refetchEvents');
            //                     // alert("Added Successfully");


            //                    }
         
         
            //         })
           
            // }


                            

            //             },

                        // editable: true,


                       

                        // eventDrop: function (event, delta) {

                        //     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");

                        //     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");

                        //     $.ajax({

                        //         url: '<?= base_url(); ?>calender/update_events',

                        //         data: '&start=' + start + '&end=' + end + '&id=' + event.id,

                        //         type: "POST",

                        //         success: function (json) {

                        //             alert("Updated Successfully");
                        //             return false;

                        //         }

                        //     });

                        // },

                        // eventClick: function (event) {

                        //     var decision = $.confirm({
                        //                                 title: 'Confirm!',
                        //                                 content: 'Simple confirm!',
                        //                                 buttons: {
                        //                                     confirm: function () {
                        //                                         $.alert('Confirmed!');
                        //                                     },
                        //                                     cancel: function () {
                        //                                         $.alert('Canceled!');
                        //                                     }
                                                           
                        //                                     }
                                                        
                        //                             });



                        //     //confirm("Do you really want to delete that?");

                        //     if (decision) {

                        //         $.ajax({

                        //             type: "POST",

                        //             url: "<?= base_url(); ?>calender/delete_event",

                        //             data: "&id=" + event.id,

                        //             success: function (json) {

                        //                 $('#calendar').fullCalendar('removeEvents', event.id);

                        //                // alert("Updated Successfully");

                        //                return false;
                        //             }

                        //         });

                        //     }

                        // },

                    });




                 });



            </script> 

<script type="text/javascript">



$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    // TODO: check href of e.target to detect your tab
    $('#calendar').fullCalendar('render');
})




    
</script>

<script type="text/javascript">

                                       $('#teacher').hide();
                                       
                                        $('.pay').hide();
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
                                amount: { total: '<?= $fee->teachers_price; ?>', currency: 'USD' }
                            }
                        ]
                    }
                });
            },

            // onAuthorize() is called when the buyer approves the payment
            onAuthorize: function(data, actions) {

                // Make a call to the REST api to execute the payment
                return actions.payment.execute().then(function(payment) {

                


                   var ourObj = {};

                       ourObj.data = payment;

                    jQuery.ajax({
                    type: "POST",
                    url: "<?= site_url('Paypal_teacher'); ?>",
                   data: {"points" : JSON.stringify(ourObj)},
                     success: function(data){ 

                      $('.work-in-progress').show();
                       
                       setTimeout(function(){ window.location = "<?php echo base_url('frontend/auth_login/teacherprofile1'); ?> "; }, 10);

                           //swal("Good job!", "Payment Successful! Please Check Your Mail", "success");
                              //$('#asds').modal('show');
                            //  $('#print11').click();
                             

           }



         });

                   

                    
                });
            }

        }, '#paypal-button-container');

    
</script>

<script type="text/javascript">

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

       $('.work-in-progress').show();
       
    }
};


 
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#invo').DataTable({

         dom: 'Bfrtip',
        buttons: [
             'excel', 'pdf', 'print'
        ],
        "pagingType": "full",
      

        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 6 ).footer() ).html(
                '$'+pageTotal +' ( $'+ total +' total)'
            );
        },

        
        
    });
});
</script>


<!-- <div class="modal fade bs-example-modal-lg" tabindex="-1" data-backdrop="false" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"  id="asds" style="margin-top: 110px;">
     

    <div class="modal-dialog modal-lg">


      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          
      </div>
     <div id="payy_paypal"></div>
</div>
</div>
</div> -->

<script type="text/javascript">

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

       $('.work-in-progress').show();
       
    }
};


 
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
        
    </body>




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
                                                                        
                                                                       
                                                                        <th>Payer Mail</th>
                                                                        <th>Product</th>
                                                                        <th>Invoice #</th>
                                                                        
                                                                        <th>Subtotal</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                  <tr>
                                                                    
                                                                   
                                                                    <td><?= $this->session->userdata('PayerMail',true);?></td>
                                                                    <td>Online class</td>
                                                                    <td><?= $this->session->userdata('saleId',true);?></td>
                                                                    <td><?= $this->session->userdata('Subtotal',true);?></td>
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
                                                                   <td><?= $this->session->userdata('Subtotal',true);?></td>
                                                               </tr>
                                                                  
                                                                  
                                                               <tr>
                                                                   <th>Total:</th>
                                                                   <td><?= $this->session->userdata('Total',true);?></td>
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


