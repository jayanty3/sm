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
        <script src='<?php echo base_url(); ?>vendor/fullcalendar/lib/moment.min.js'></script>
        <script src='<?php echo base_url(); ?>vendor/fullcalendar/lib/jquery.min.js'></script>
        <script src='<?php echo base_url(); ?>vendor/fullcalendar/fullcalendar.min.js'></script>
        <script src='<?php echo base_url(); ?>vendor/fullcalendar/locale-all.js'></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jstimezonedetect/1.0.4/jstz.min.js">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.20/moment-timezone.min.js"></script>
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
        <script type="text/javascript">
           function googleTranslateElementInit() {
               new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'ar,en,es,jv,ko,pa,pt,ru,zh-CN', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
           }
        </script>
        <?php  $user['user'] = $this->ion_auth->user()->row(); 
           $user_id     = $user['user']->id;
            $first_name = $user['user']->first_name;
            $last_name  = $user['user']->last_name;
            $username   = $user['user']->username;
            $email      = $user['user']->email;
            $city       = $user['user']->state;
            $gender     = $user['user']->gender;
            $country    =$user['user']->countrys;
            $message    =$user['user']->message;
            $image      =$user['user']->images;
           
           ?>
        <?php $teacher['teacher'] = Teacher::find_by_user_id($user_id);?>
        <?php 
           $fee             = $teacher['teacher']->fee;
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
           $pic              =$teacher['teacher']->pic;
           $vedio            =$teacher['teacher']->vedio;
           $facebook         =$teacher['teacher']->facebook;
           $whatsup            =$teacher['teacher']->whatsup;
           $level1           =$teacher['teacher']->level;
           $youtube_url       =$teacher['teacher']->youtube_url;
           $userfile       =$teacher['teacher']->userfile;
           
           $level =  explode(',',$level1);
           
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

            td.fc-day.fc-past {
          background-color: #EEEEEE;
      }
  
        </style>
        <style type="text/css">




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
           .progress { position:relative; width:400px; border: 1px solid #ddd; padding: 1px; border-radius: 3px; }
           .bar { background-color: #B4F5B4; width:0%; height:20px; border-radius: 3px; }
           .percent { position:absolute; display:inline-block; top:3px; left:48%; }
           hr.fc-divider {
           height: 0;
           margin: 0;
           padding: 0 0 2px;
           border-width: 1px 0;
           width: 100%; }
           input[type="radio"]{
           -webkit-appearance: radio;
           -moz-appearance: radio;
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
           </div>
           -->
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
                    
                    <!-- Button trigger modal -->
                    <!-- Modal -->
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
                       } ?>">
                       <a href="#"  data-toggle="dropdown" class="dropdown-toggle">Language Teachers <b class="caret"></b></a>
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
                       } ?>" >
                       <a href="#"  data-toggle="dropdown" class="dropdown-toggle">Subject Teachers <b class="caret"></b></a>
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
                                ?> 
                          </li>
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
                                ?> 
                          </li>
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
                                ?> 
                          </li>
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
                                ?> 
                          </li>
                       </ul>
                    </li>
                    <li class="<?php if ($this->uri->segment(2) == "faq") {
                       echo "active";
                       } else {
                       echo "";
                       } ?>"> <a href="<?= site_url('home/faq'); ?>">FAQ </a></li>
                    <li class="dropdown">
                       <a href="#"  data-toggle="dropdown" class="dropdown-toggle" data-target=".navbar-collapse"><img src="<?= base_url(); ?>assets/front/images/en.png" height="16" width="16" alt="English" />  English<b class="caret"></b></a>
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
                 <?php   echo anchor('teacher-profile', 'Profile',['class'=>'btn btn-primary']); ?>
              </div>
              <div class="tittle">
                 <h3>Teacher Profile</h3>
                 <hr>
              </div>
              <!--======= CONTENT START =========-->
              <section class="products">
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
                                     <center> <a href="javascript:void(0);" class="btn btn-sm" data-toggle="modal" data-target="#Modal_vid3" style="padding: 3px;">Change Pic</a></center>
                                  
                                </ul>
                             </div>
                             <div class="col-xs-12 col-sm-6 col-lg-8">
                                <ul class="list-group">
                                   <li class="list-group-item  text-muted" contenteditable="false">
                                      <h2><?php if($first_name == ''){ echo $username;}else{echo $first_name;}  ?></h2>
                                      <h3></h3>
                                   </li>
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
                       </div>
                    </div>
                    <div class="col-md-5">
                       <div class=" col-md-12">
                          <button data-toggle="modal" data-target="#Modal_vid" class=" btn btn-default btn-sm pull pull-right" id="vidd">Edit Video</button>
                          <center>
                             <h4><a href="javascript:void(0)">Video</a></h4>
                          </center>
                          <br>
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
                             
                          </div>
                       </div>
                    </div>
                 </div>


                <!--  <script>
                       $(document).ready(function(){
                        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
                          localStorage.setItem('activeTab', $(e.target).attr('href'));
                        });
                        var activeTab = localStorage.getItem('activeTab');
                        if(activeTab){
                          $('#tabbb a[href="' + activeTab + '"]').tab('show');
                        }
                      });             
                 </script> -->


  <script>
    ;(function($){
    
      
      $.fn.scrollPosReaload = function(){
          if (localStorage) {
              var posReader = localStorage["posStorage"];
              if (posReader) {
                  $(window).scrollTop(posReader);
                  localStorage.removeItem("posStorage");
              }
              $(this).click(function(e) {
                  localStorage["posStorage"] = $(window).scrollTop();
              });

              return true;
          }

          return false;
      }
      
      /* ================================================== */

      $(document).ready(function() {
          // Feel free to set it for any element who trigger the reload
          $('#tabbb1').scrollPosReaload();

          $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
                          localStorage.setItem('activeTab', $(e.target).attr('href'));
                        });
                        var activeTab = localStorage.getItem('activeTab');
                        if(activeTab){
                          $('#tabbb a[href="' + activeTab + '"]').tab('show');
                        }
      });
    
  }(jQuery)); 



   </script>
   <p>&nbsp;</p>
                 <div class="row">
                    <div class="col-md-10" id="tabbb1">
                       <ul class="nav nav-tabs" id="tabbb">
                          <li class="active"><a href="#home" data-toggle="tab" id="about">About Me</a></li>
                          <li ><a href="#profile" data-toggle="tab" id="basic">Basic Details</a></li>
                          <li ><a href="#profile1" data-toggle="tab" id="hrate">Hourly Rate</a></li>
                          <li ><a href="#profile2" data-toggle="tab" id="cv1">C.V</a></li>
                          <li ><a href="#profile3" data-toggle="tab" id="proficiency">Proficiency Level</a></li>
                          <li ><a href="#profile4" data-toggle="tab" id="certificates">Certificates</a></li>
                          
                          <li ><a href="#profile5" data-toggle="tab" id="contact">Contact</a></li>
                          <li ><a href="#profile6" data-toggle="tab" id="time">Time Table</a></li>
                          <!-- <li><a href="#profile7" data-toggle="tab">Booked Class</a></li> -->
                       </ul>
                       <div id="myTabContent" class="tab-content">
                          <div class="tab-pane fade active in" id="home">
                             <form method="post" action="<?= site_url('update_teacher/about_us/#about'); ?>">
                                <div class="form-group">
                                   <label for="comment">About Me:</label>
                                   <P id="text1"> 
                                       <?php 
                                        $this->load->helper('text');
                                        if($about_us ==''){$about_us = '&nbsp; ';} ?>
                                      <?php // $pos=strpos($about_us,' ',300); $pos1=    substr($about_us,0,$pos ); 

                                        $pos1 = ellipsize($about_us, 50);
                                         echo $pos1; ?>
                                   </P>
                                   <div id="demo" class="collapse">
                                      <textarea class="form-control" name="about_us" rows="5" id="editor1" placeholder="My name ......"><?php echo set_value('about_us',$about_us)?></textarea>
                                   </div>
                                   <?php if($pos1!= "") {?>
                                   <a  id="view1" data-toggle="collapse" data-target="#demo"><b style="cursor: pointer;">Read More</b></a>
                                   <?php  } else {?>
                                   <a  id="view1" data-toggle="collapse" data-target="#demo"><b style="cursor: pointer;">Add</b></a>
                                   <?php  } ?>
                                   <a  id="view2" data-toggle="collapse" data-target="#demo"><b style="cursor: pointer;">Read Less</b></a>
                                   <?= form_error('about_us');?>
                                </div>
                                <input type="submit" name="submit" value="Update" id="subbb1"class="btn btn-primary pull pull-right ">
                             </form>
                          </div>
                          <div class="tab-pane fade" id="profile">
                             <div class="col-md-10">
                                <center><?php echo validation_errors(); ?></center>
                                <section class="products">
                                   <!--  <form class="form-horizontal"> -->
                                   <?=  form_open_multipart('frontend/auth_login/edit_forign_registration/#basic',['class'=>'form-horizontal','id'=>'registration-form']); ?>
                                   <fieldset>
                                      <div class="form-group" id="teacher">
                                         <center>
                                            <label class="radio-inline" for="fee">
                                            <input type="radio" name="teach1"  value="Language Teacher"   class="link1" <?php if($teach1 == 'Language Teacher') {echo "checked";}?>>
                                            Language Teacher
                                            </label>
                                            <label class="radio-inline" for="appear">
                                            <input type="radio" name="teach1"  value="Subject Teacher"   class="link2" <?php if($teach1 == 'Subject Teacher') {echo "checked";}?>>
                                            Subject Teacher
                                            </label>
                                            <center><?= form_error('teach1');?></center>
                                         </center>
                                      </div>
                                      <div class="form-group">
                                         <label class="col-lg-3 control-label" for="Mother">Name<b>*</b></label>
                                         <div class="col-lg-3">
                                            <input type="text" class="form-control" id="min1 placeholder="Name" name="first_name" value="<?= set_value('first_name',$first_name)?>">
                                            <?= form_error('first_name');?>
                                         </div>
                                         <label class="col-lg-2 control-label" for="Mother">SkpeId<b>*</b></label>
                                         <div class="col-lg-3">
                                            <input type="text" class="form-control" id="min4" placeholder="Skype Id" name="skype" value="<?= set_value('skype',$skype)?>">
                                            <?= form_error('skype');?>
                                         </div>
                                      </div>
                                      <div class="form-group">
                                         <label class="col-lg-3 control-label" for="Mother">Mobile Number</label>
                                         <div class="col-lg-3">
                                            <input type="text" class="form-control" id="min3" placeholder="Mobile Number" name="mobile" value="<?= set_value('mobile',$mobile)?>">
                                         </div>
                                         <label for="select" class="col-lg-2 control-label">Gender<b>*</b></label>
                                         <div class="col-lg-3">
                                            <select class="form-control" id="select" name="gender">
                                               <option value="" disabled selected hidden>Select Gender</option>
                                               <option value="male" <?php if($gender == 'male') {echo "selected";}?>>male</option>
                                               <option value="female" <?php if($gender == 'female') {echo "selected";} ?>>female</option>
                                            </select>
                                            <?= form_error('gender');?>
                                         </div>
                                      </div>
                                      <?php $contr = Countr::find('all'); ?>
                                      <div class="form-group">
                                         <label class="col-lg-3 control-label" for="Mother">Age</label>
                                         <div class="col-lg-3">
                                            <input type="text" class="form-control" id="min5" placeholder="Age" name="age" value="<?= set_value('age',$age)?>">
                                            <?= form_error('age');?>
                                         </div>
                                         <label class="col-lg-2 control-label" for="Mother">Country<b>*</b></label>
                                         <div class="col-lg-3">
                                            <select class="form-control" id="select" name="country">
                                               <option value="" disabled selected hidden>Select your country</option>
                                               <?php foreach ($contr as $uni):?>
                                               <option value="<?= $uni->country_name;?>" <?php if ($country ==  $uni->country_name) {echo "selected";} ?>><?= $uni->country_name;?></option>
                                               <?php endforeach; ?>
                                            </select>
                                            <?= form_error('country'); ?>
                                         </div>
                                      </div>
                                      <div class="form-group">
                                         <label class="col-lg-3 control-label" for="Mother">City<b>*</b></label>
                                         <div class="col-lg-3">
                                            <input type="text" class="form-control" id="min6" placeholder="City" name="city" value="<?= set_value('city',$city)?>">
                                            <?= form_error('city');?>
                                         </div>
                                         <label for="select" class="col-lg-2 control-label">Educational Background<b>*</b></label>
                                         <div class="col-lg-3">
                                            <select class="form-control" id="select1" name="education">
                                               <option value="" disabled selected hidden>Highest Education Level</option>
                                               <option value="MBA" <?php if($education == 'MBA') {echo "selected";} ?>>MBA</option>
                                               <option value="M.TECH" <?php if($education == 'M.TECH') {echo "selected";} ?>>M.TECH</option>
                                               <option value="BCA" <?php if($education == 'BCA') {echo "selected";} ?>>BCA</option>
                                               <option value="PHD" <?php if($education == 'PHD') {echo "selected";} ?>>PHD</option>
                                            </select>
                                            <?= form_error('education');?>
                                         </div>
                                      </div>
                                      <div class="form-group">
                                         
                                         <label for="select" class="col-lg-3 control-label">University<b>*</b></label>
                                         <div class="col-lg-3">
                                          <input type="text" class="form-control" id="min6" placeholder="University Pass" name="university" value="<?= set_value('university',$university)?>">

                                            
                                            <?= form_error('university');?>
                                         </div>
                                         <div class="div123">
                                            <label for="select" class="col-lg-2 control-label">Languages<b>*</b></label>
                                            <div class="col-lg-3">
                                               <select class="form-control" id="select123" name="lang1">
                                                  <option value="" disabled selected hidden>Select Languages</option>
                                                  <option value="english" <?php if($lang1 == 'english') {echo "selected";} ?>>English</option>
                                                  <option value="chinese" <?php if($lang1 == 'chinese') {echo "selected";} ?>>Chinese (Mandarin)</option>
                                                  <option value="french" <?php if($lang1 == 'french') {echo "selected";} ?>>French</option>
                                                  <option value="spanish" <?php if($lang1 == 'spanish') {echo "selected";} ?>>Spanish</option>
                                               </select>
                                               <?= form_error('lang1');?>
                                            </div>
                                         </div>
                                         <div class="div124">
                                            <label for="select" class="col-lg-2 control-label">Subjects<b>*</b></label>
                                            <div class="col-lg-3">
                                               <select class="form-control" id="select124" name="subject">
                                                  <option value="" disabled selected hidden>Select Subjects</option>
                                                  <option value="Maths" <?php if($subject == 'Maths') {echo "selected";} ?>>Maths</option>
                                                  <option value="Physics" <?php if($subject == 'Physics') {echo "selected";} ?>>Physics</option>
                                                  <option value="Chemistry" <?php if($subject == 'Chemistry') {echo "selected";} ?>>Chemistry</option>
                                                  <option value="Computer science" <?php if($subject == 'Computer science') {echo "selected";} ?>>Computer science</option>
                                               </select>
                                               <?= form_error('subject');?>
                                            </div>
                                         </div>
                                         <div class="form-group">
                                         </div>
                                         <label for="select" class="col-lg-3 control-label">Years of Experience<b>*</b></label>
                                         <div class="col-lg-3">
                                            <select class="form-control" id="select2" name="experiance">
                                               <option value="" disabled selected hidden>Select Year </option>
                                               <option value="0yrs - 2yrs" <?php if($experiance == '0yrs - 2yrs') {echo "selected";} ?>>0yrs - 2yrs</option>
                                               <option value="3yrs - 5yrs" <?php if($experiance == '3yrs - 5yrs') {echo "selected";} ?>>3yrs - 5yrs</option>
                                               <option value="6yrs - 10yrs" <?php if($experiance == '6yrs - 10yrs') {echo "selected";} ?>>6yrs - 10yrs</option>
                                               <option value="11yrs - Above" <?php if($experiance == '11yrs - Above') {echo "selected";} ?>>11yrs - Above</option>
                                            </select>
                                            <?= form_error('experiance');?>
                                         </div>
                                         <label class="col-lg-2 control-label" for="Mother">Specilization</label>
                                         <div class="col-lg-3">
                                            <input type="text" class="form-control" id="min8" placeholder="Specilization" name="specilization" value="<?= set_value('specilization',$specilization)?>">
                                            <?= form_error('specilization');?>
                                         </div>
                                         
                                      </div>
                                      <div class="form-group">
                                         
                                      
                                         <label for="textArea" class="col-lg-3 control-label">Upload Resume<b>*</b></label>
                                         <div class="col-lg-3">
                                            <div class="">
                                              <?php if($userfile){?>

                                              <input type="file" id="file-upload" name="files" <?= set_value('files');?>  data-validation="mime size " data-validation-allowing="doc, docx,rtf,pdf" data-validation-max-size="300kb" data-validation-error-msg-required="No file selected"> <span class="badge badge-primary"><?php echo $userfile; ?></span>

                                              <?php }else{?>
                                               <input type="file" id="file-upload" name="files" <?= set_value('files');?>  data-validation="mime size required" data-validation-allowing="doc, docx,rtf,pdf" data-validation-max-size="300kb" data-validation-error-msg-required="No file selected">

                                                <?php } ?>
                                            </div>
                                            <span class="help-block">doc,docx,rtf,pdf -300 kb max</span>
                                            
                                            <?= form_error('files');?>
                                            </div>
                                        </div>
                                            <div class="form-group">
                                               <div class="col-lg-10 col-lg-offset-2">
                                                  <div class="row">
                                                     <div class="col-md-7 ">
                                                     </div>
                                                     <div class=" col-md-2" id="subbb2">
                                                        <input type="submit" class="btn btn-primary pull-left bcd " name="Submit" id="dis" value="Update" >
                                                     </div>
                                                  </div>
                                               </div>
                                            </div>
                                   </fieldset>
                                   <?= form_close();?>
                                </section>
                                </div>
                                </div>
                                <div class="tab-pane fade" id="profile1">
                                   <div class="col-md-12">
                                      <form method="post" action="<?= site_url('update_teacher/price/#hrate'); ?>" class="form-horizontal toggle-disabled" id="formm3" >
                                         <div class="form-group">
                                            <label class=" col-md-6 control-label" for="Mother">Minimum Hourly<b>*</b> Rate(USD $) - Individual Classes </label>
                                            <div class="col-md-6">
                                               <input type="text" class="form-control required" id="min9" placeholder="Minimum Hourly Rate(USD $) - Individual Classes" name="mhri" value="<?= set_value('mhri',$mhri)?>" data-validation="number" data-validation-allowing="range[1;100]">
                                               <?= form_error('mhri');?>
                                            </div>
                                         </div>
                                         <div class="form-group">
                                            <label class="col-md-6 control-label " for="Mother">Minimum Hourly<b>*</b> Rate(USD $) - Group Classes</label>
                                            <div class="col-md-6">
                                               <input type="text" class="form-control required" id="min10" placeholder="Minimum Hourly Rate(USD $) - Group Classes" name="mhrg" value="<?= set_value('mhrg',$mhrg)?>" data-validation="number" data-validation-allowing="range[1;1000]">
                                               <?= form_error('mhrg');?>
                                            </div>
                                         </div>
                                         <div class="form-group">
                                            <div class="col-md-4 pull pull-right">
                                               <input type="submit" name="submit" value="Update" class="btn btn-primary pull pull-right " id="subbb3">
                                            </div>
                                         </div>
                                      </form>
                                   </div>
                                </div>
                                <div class="tab-pane fade" id="profile2">
                                   <div class="col-md-10">
                                      <div id="cv_view"></div>

                                      <div id="cvhide">
                                         <div class="row"  id="cv1">
                                            <h2>Add Your Details</h2>
                                            <form id="form_submit" name="form_submit">
                                               <div class="well" id="cv">
                                               </div>
                                                 <input type="button" name="submit" id="submit" class="btn btn-info btn-sm " value="Submit" />

                                            </form>
                                            <div class="col-md-3"></div>
                                         </div>
                                      </div>
                                      <button class="btn btn-info btn-sm " id="cvadd"><i ></i> ADD</button>
                                      <button   class="btn btn-primary pull pull-right subbb4" id="subbb4">Update</button>
                                   </div>
                                </div>
                                <div class="tab-pane fade" id="profile3">
                                   <div class="col-md-12">
                                      <form method="post" action="<?= site_url('update_teacher/level'); ?>" class="toggle-disabled">
                                         <h4>Proficiency Level</h4>
                                         <p>&nbsp;</p>
                                         <div class="form-group row">
                                            <div class="col-md-10 well well-sm">
                                               <label class="col-md-6" for="fee">
                                               <input type="checkbox" name="level[]"  value="Beginner"    <?php if(in_array("Beginner", $level) == 'Beginner') {echo "checked";} ?> data-validation="checkbox_group" data-validation-qty="min1">
                                               &nbsp;&nbsp;&nbsp;Beginner
                                               </label>
                                               <label class="col-md-6" for="fee">
                                               <input type="checkbox" name="level[]"  value="Upper Beginner"    <?php if(in_array("Upper Beginner", $level) == 'Upper Beginner') {echo "checked";} ?> data-validation="checkbox_group" data-validation-qty="min1">
                                               &nbsp;&nbsp;&nbsp;Upper Beginner
                                               </label>
                                               <label class="col-md-6" for="fee">
                                               <input type="checkbox" name="level[]"  value="Intermediate"    <?php if(in_array("Intermediate", $level) == 'Intermediate') {echo "checked";} ?> data-validation="checkbox_group" data-validation-qty="min1">
                                               &nbsp;&nbsp;&nbsp;Intermediate
                                               </label>
                                               <label class="col-md-6" for="fee">
                                               <input type="checkbox" name="level[]"  value="Upper Intermediate"    <?php if(in_array("Upper Intermediate", $level) == 'Upper Intermediate') {echo "checked";} ?> data-validation="checkbox_group" data-validation-qty="min1">
                                               &nbsp;&nbsp;&nbsp;Upper Intermediate
                                               </label>
                                               <label class="col-md-6" for="fee">
                                               <input type="checkbox" name="level[]"  value="Advanced"   <?php     if(in_array("Advanced", $level) == 'Advanced') {echo "checked";} ?> data-validation="checkbox_group" data-validation-qty="min1">
                                               &nbsp;&nbsp;&nbsp;Advanced
                                               </label>
                                               <label class="col-md-6" for="fee">
                                               <input type="checkbox" name="level[]"  value="Upper Advanced"    <?php if(in_array("Upper Advanced", $level) == 'Upper Advanced') {echo "checked";} ?> data-validation="checkbox_group" data-validation-qty="min1">
                                               &nbsp;&nbsp;&nbsp;Upper Advanced
                                               </label>
                                               <label class="col-md-6" for="fee">
                                               <input type="checkbox" name="level[]"  value="Business"    <?php if(in_array("Business", $level) == 'Business') {echo "checked";} ?> data-validation="checkbox_group" data-validation-qty="min1">
                                               &nbsp;&nbsp;&nbsp;Business
                                               </label>
                                               <label class="col-md-6" for="fee">
                                               <input type="checkbox" name="level[]"  value="International Certificate"    <?php if(in_array("International Certificate", $level) == 'International Certificate') {echo "checked";} ?> data-validation="checkbox_group" data-validation-qty="min1">
                                               &nbsp;&nbsp;&nbsp;International Certificate
                                               </label>
                                               <center><?= form_error('level');?></center>
                                               <p>&nbsp;</p>
                                               <input type="submit" name="submit" value="Update" class="btn btn-primary btn-sm pull pull-left " id="subbb5">     
                                            </div>
                                      </form>
                                      </div>
                                   </div>
                                   <div class="col-md-12  " >
                                      <div class="row">
                                         <div class="alert alert-info col-md-4">
                                            <strong>Beginner</strong> <br>Nisi magna sint amet mollit voluptate.
                                         </div>
                                         <div class="alert alert-info col-md-offset-2 col-md-4">
                                            <strong>Upper Beginner</strong> <br>Nisi magna sint amet mollit voluptate.
                                         </div>
                                         <div class="alert alert-info col-md-4">
                                            <strong>Intermediate</strong> <br>Nisi magna sint amet mollit voluptate.
                                         </div>
                                         <div class="alert alert-info col-md-offset-2 col-md-4">
                                            <strong>Upper Intermediate</strong> <br>Nisi magna sint amet mollit voluptate.
                                         </div>
                                         <div class="alert alert-info col-md-4">
                                            <strong>Advanced</strong> <br>Nisi magna sint amet mollit voluptate.
                                         </div>
                                         <div class="alert alert-info col-md-offset-2 col-md-4">
                                            <strong>Upper Advanced</strong> <br>Nisi magna sint amet mollit voluptate.
                                         </div>
                                         <div class="alert alert-info col-md-4">
                                            <strong>Business</strong> <br>Nisi magna sint amet mollit voluptate.
                                         </div>
                                         <div class="alert alert-info col-md-offset-2 col-md-4">
                                            <strong>International Certificate</strong> <br>Nisi magna sint amet mollit voluptate.
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="tab-pane fade" id="profile4">
                                   <div class="col-md-10">
                                      <div id="cert_view"></div>
                                      <div id="certhide">
                                         <div class="row">
                                            <h2>Add Your  Certificate</h2>
                                            <form id="form_submit1" name="form_submit1">
                                               <div class="well" id="cert1">
                                               </div>
                                               <input type="button" name="submit" id="submit1" class="btn btn-info btn-sm " value="Submit" />  
                                            </form>
                                            <div class="col-md-3"></div>
                                         </div>
                                      </div>
                                      <button class="btn btn-info btn-sm " id="certadd"><i ></i> ADD</button>
                                      <input type="button" name="submit" value="Update" id="subbb6" class="btn btn-primary pull pull-right subbb6" >
                                   </div>
                                </div>
                                 <div class="tab-pane fade" id="profile6">
                                   <div class="container">
                                    
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
                                          <div class="col-md-offset-9 ">
                                           <?php   echo anchor('teacher-profile', 'Update',['class'=>'btn btn-primary btn-sm']); ?>
                                        </div>        
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
                                                 <span class="dot"  style="background-color:#3FFF81"> </span>
                                            </td>
                                             <td style="text-align:left;">
                                               <strong> Free Class </strong>
                                            </td>
                                          </tr>
                                        </table>


                                         <div id='calendar'></div>
                                         <p>&nbsp;</p>
                                         <p>&nbsp;</p>
                                      </div>
                                   </div>
                                </div> 
                                <div class="tab-pane fade" id="profile5">
                                   <div class="col-md-10">
                                      <form method="post" class="form-horizontal" action="<?= site_url('update_teacher/contact'); ?>">
                                         <h4>Contacts</h4>
                                         <p>&nbsp;</p>
                                         <div class="form-group row">
                                            <div class="col-md-10 well well-sm">
                                               <div class="form-group">
                                                  <label class=" col-md-2 control-label" for="Mother">Email<b>*</b></label>
                                                  <div class="col-md-10">
                                                     <input type="text" class="form-control" id="" placeholder="
                                                        Email" name="email" value="<?= set_value('email',$email)?>">
                                                     <?= form_error('email');?>
                                                  </div>
                                               </div>
                                               <div class="form-group">
                                                  <label class=" col-md-2 control-label" for="Mother">Skype<b>*</b></label>
                                                  <div class="col-md-10">
                                                     <input type="text" class="form-control" id="" placeholder="Skype" name="skype" value="<?= set_value('skype',$skype)?>">
                                                     <?= form_error('skype');?>
                                                  </div>
                                               </div>
                                               <div class="form-group">
                                                  <label class=" col-md-2 control-label" for="Mother">Facebook</label>
                                                  <div class="col-md-10">
                                                     <input type="text" class="form-control" id="" placeholder="facebook" name="facebook" value="<?= set_value('facebook',$facebook)?>">
                                                     <?= form_error('facebook');?>
                                                  </div>
                                               </div>
                                               <div class="form-group">
                                                  <label class=" col-md-2 control-label" for="Mother">whatsapp</label>
                                                  <div class="col-md-10">
                                                     <input type="text" class="form-control" id="" placeholder="whatsapp" name="whatsup" value="<?= set_value('whatsup',$whatsup)?>">
                                                     <?= form_error('whatsup');?>
                                                  </div>
                                               </div>
                                               <div class="form-group">
                                                  <label class=" col-md-2 control-label" for="Mother">Phone no</label>
                                                  <div class="col-md-10">
                                                     <input type="text" class="form-control" id="" placeholder="Phone no" name="mobile" value="<?= set_value('mobile',$mobile)?>">
                                                     <?= form_error('phone');?>
                                                  </div>
                                               </div>
                                               <p>&nbsp;</p>
                                               <input type="submit" name="submit" value="Update" class="btn btn-primary btn-sm pull pull-left <input type="submit" name="submit" value="Update" class="btn btn-primary pull pull-right "  id="subbb7">     
                                            </div>
                                      </form>
                                      </div>
                                   </div>
                                </div>
                                
                             </div>
                          </div>
                          <div class="col-md-2">
                             <form>
                                <div class="form-group">
                                </div>
                             </form>
                          </div>
                          <!--  </div> -->   
              </section>
              </div>
        </section>
        </div>
        </div>
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
        <li class="youtube"><a href="https://www.youtube.com/channel/UCcVhddWE4WiHk2J5LFKD_mg" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                        <li class="facebook"><a href="https://www.facebook.com/Langbee-382964022192428/"  target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        <li class="skype"><a href="info@langbee.com"><i class="fa fa-skype" target="_blank"></i></a></li>
        </ul>
        </li>
        </ul>
        </div>
        </div>
        </footer>
        <form>
        <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><center>Edit CV<center></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <div class="form-group row">
        <div class="col-md-10">
        <input type="hidden" name="cv_id" id="cv_id" class="form-control">
        </div>
        </div>
        <div class="form-group row">
        <label class="col-md-2 col-form-label">Year</label>
        <div class="col-md-10">
        <input type="text" name="year" id="year" class="form-control" placeholder="Year">
        </div>
        </div>
        <div class="form-group row">
        <label class="col-md-2 col-form-label">Company</label>
        <div class="col-md-10">
        <input type="text" name="company" id="company" class="form-control" placeholder="Price">
        </div>
        </div>
        <div class="form-group row">
        <label class="col-md-2 col-form-label">Experience</label>
        <div class="col-md-10">
        <input type="text" name="exp" id="exp" class="form-control" placeholder="Experience">
        </div>
        </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
        </div>
        </div>
        </div>
        </div>
        </form>
        <!--END MODAL EDIT-->
        <!--MODAL DELETE-->
        <form>
        <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <strong>Are you sure to delete this record?</strong>
        </div>
        <div class="modal-footer">
        <input type="hidden" name="cv_id_delete" id="cv_id_delete" class="form-control">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
        </div>
        </div>
        </div>
        </div>
        </form>
        <!--END MODAL DELETE-->
        <form>
        <div class="modal fade" id="Modal_Edit1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><center>Edit Certificates<center></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <div class="form-group row">
        <div class="col-md-10">
        <input type="hidden" name="cert_id" id="cert_id" class="form-control">
        </div>
        </div>
        <div class="form-group row">
        <label class="col-md-2 col-form-label">Year</label>
        <div class="col-md-10">
        <input type="text" name="year" id="year1" class="form-control" placeholder="Year">
        </div>
        </div>
        <div class="form-group row">
        <label class="col-md-2 col-form-label">Certificates</label>
        <div class="col-md-10">
        <input type="text" name="cert" id="cert" class="form-control" placeholder="Certificates">
        </div>
        </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" type="submit" id="btn_update1" class="btn btn-primary">Update</button>
        </div>
        </div>
        </div>
        </div>
        </form>
        <!--END MODAL EDIT-->
        <!--MODAL DELETE-->
        <form>
        <div class="modal fade" id="Modal_Delete1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <strong>Are you sure to delete this record?</strong>
        </div>
        <div class="modal-footer">
        <input type="hidden" name="cert_id_delete" id="cert_id_delete" class="form-control">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" type="submit" id="btn_delete1" class="btn btn-primary">Yes</button>
        </div>
        </div>
        </div>
        </div>
        </form>
        <div class="modal fade" id="Modal_vid" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 10%;">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <p>&nbsp;</p>
                </button>
                 <h5 class="modal-title" id="exampleModalLabel"><center>Upload Video<center></h5>

                
              </div>
              <div class="modal-body">
                <div class="container">
                  <div class="row">
                    <div class="col-md-offset-2 col-md-3">
                      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Modal_vid1"><i class="fa fa-youtube-play"></i> Youtube</button>
                    </div>
                    
                 </div>
                </div>
               
             </div>
          <div class="modal-footer">
          <a href="javascript:void(0)" data-dismiss="modal"><span  class="label label-primary" >Close</span></a>
        </div>
        </div>
        
        </div>
        </div>

    <!-- start youtube link -->


    <div class="modal fade" id="Modal_vid1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 10%;">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <p>&nbsp;</p>
                </button>
                 <h5 class="modal-title" id="exampleModalLabel"><center>Upload Youtube Video<center></h5>

              </div>
              <div class="modal-body">
                <center><strong>Please insert Youtube link</strong></center>
                <p>&nbsp;</p>
                <form method="post" enctype="multipart/form-data" action="<?= site_url('update_teacher/youtube'); ?>" id="uploadForm" class="form-horizontal">
                                   
                               <?php     $youtube_urls = $youtube_url  ?>
                        <div class="form-group" style="margin-right: 15px; margin-left: 15px">
                          <label for="comment" class="col-md-3 control-label">Youtube:</label>
                          <div class="col-md-9">
                          <input class="form-control" name="youtube_url" type="text" id="youtube_url" placeholder="Insert youtube Link" value="<?= set_value('youtube_url',$youtube_urls)?>"  data-validation="url">
                          <?= form_error('youtube_url');?>
                         </div>
                      </div>
                    
                      
                  <div class="col-md-offset-2"><input type="submit" id="btnSubmit" value="Submit" class="btnSubmit btn" /></div>
                  <!--  <input type="submit" name="submit" value="Update" id="vidup" class="btn-info btn-sm"> -->
                </form>
                <p>&nbsp;</p>
              
          </div>
          <div class="modal-footer">
          <a href="javascript:void(0)" data-dismiss="modal"><span  class="label label-primary" >Close</span></a>
        </div>
        </div>
        
        </div>
        </div>



    <!-- end youtube link -->



    <!-- start video upload -->

      <div class="modal fade" id="Modal_vid2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 10%;">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <p>&nbsp;</p>
                </button>
                 <h5 class="modal-title" id="exampleModalLabel"><center>Upload Video<center></h5>

              </div>
              <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="<?= site_url('update_teacher/youtube'); ?>" >
                  
                  <script type="text/javascript">
                  

                                       function _(el){
                                                        return document.getElementById(el);
                                                    }

                    function uploadFile1() {
                      // 
                      var file = _("vid").files[0];
                      // alert(file.name+" | "+file.size+" | "+file.type);
                      var formdata = new FormData();
                      formdata.append("vid", file);
                      var ajax = new XMLHttpRequest();
                      ajax.upload.addEventListener("progress", progressHandler, false);
                      ajax.addEventListener("load", completeHandler, false);
                      ajax.addEventListener("error", errorHandler, false);
                      ajax.addEventListener("abort", abortHandler, false);
                      ajax.open("POST", "<?= site_url('update_teacher/youtube'); ?>");
                      ajax.send(formdata);

                      
                    }

                    function progressHandler(event) {
                      _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
                      var percent = (event.loaded / event.total) * 100;
                      _("progressBar").value = Math.round(percent);
                      _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
                    }

                    function completeHandler(event) {
                      _("status").innerHTML = event.target.responseText;
                      _("progressBar").value = 0;
                     //  location.reload();
                    }

                    function errorHandler(event) {
                      _("status").innerHTML = "Upload Failed";
                    }

                    function abortHandler(event) {
                      _("status").innerHTML = "Upload Aborted";
                    }




                  </script>
                    <p>&nbsp;</p>
                      <p>&nbsp;</p>
                  <div style="background-color: #ccc;">
                  <div   >
                    <div class="col-md-8">
                    <input  type="file" name="vid"  id="vid"    data-validation="size" 
       data-validation-allowing="mp4,avi" 
       data-validation-max-size="6M"><small>Note*- <i> Format only mp4,avi and not more 5MB Size</i></small>
                   <!--  <span id="lblError" style="color: red;"></span> -->
                    <br />
                    <?= form_error('vid');?>
                     </div>
                  </div>
                </div>

                <input type="button" value="Upload File" onclick="uploadFile1()" 
  class="btnSubmit11 btn btn-primary btn-xs" style="padding: 2px 3px;"> <br> <p>&nbsp;</p>
               <center> <progress id="progressBar" value="0" max="100" style="width:300px;"></progress></center>
                <h3 id="status"></h3>
                <p id="loaded_n_total"></p>
                  <!-- <div class="col-md-offset-1"><input type="submit" id="btnSubmit" value="Submit" class="btnSubmit btn" /></div> -->
                  <!--  <input type="submit" name="submit" value="Update" id="vidup" class="btn-info btn-sm"> -->
                </form>
                <p>&nbsp;</p>
                
            
          </div>
          <div class="modal-footer">
          <a href="javascript:void(0)" data-dismiss="modal"><span  class="label label-primary" >Close</span></a>
        </div>
        </div>
        
        </div>
        </div>

    <!-- end video upload -->

  <!-- start pic upload -->

      <div class="modal fade" id="Modal_vid3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 10%;">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <p>&nbsp;</p>
                </button>
                 <h5 class="modal-title" id="exampleModalLabel"><center>Upload Image<center></h5>

              </div>
              <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="<?= site_url('update_teacher/img'); ?>" >

                   
                  
                  <script type="text/javascript">
                  
                                    function _(el) {
                      return document.getElementById(el);
                    }

                    function uploadFile2() {
                      var file = _("image").files[0];
                      // alert(file.name+" | "+file.size+" | "+file.type);
                      var formdata = new FormData();
                      formdata.append("image", file);
                      var ajax = new XMLHttpRequest();
                      ajax.upload.addEventListener("progress", progressHandler, false);
                      ajax.addEventListener("load", completeHandler, false);
                      ajax.addEventListener("error", errorHandler, false);
                      ajax.addEventListener("abort", abortHandler, false);
                      ajax.open("POST", "<?= site_url('update_teacher/img'); ?>");
                      ajax.send(formdata);
                    }

                    function progressHandler(event) {
                      _("loaded_n_total1").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
                      var percent = (event.loaded / event.total) * 100;
                      _("progressBar1").value = Math.round(percent);
                      _("status1").innerHTML = Math.round(percent) + "% uploaded... please wait";
                    }

                    function completeHandler(event) {
                      _("status1").innerHTML = event.target.responseText;
                      _("progressBar1").value = 0;
                       // location.reload();
                    }

                    function errorHandler(event) {
                      _("status1").innerHTML = "Upload Failed";
                    }

                    function abortHandler(event) {
                      _("status1").innerHTML = "Upload Aborted";
                    }




                  </script>
                    <p>&nbsp;</p>
                      <p>&nbsp;</p>
                  <div style="background-color: #ccc;">
                  <div  id="" >
                    <div class="col-md-8">
                    <input  name="image" type="file" id="image" data-validation="required extension size"  data-validation="size" data-validation-allowing="png, jpeg,jpg" data-validation-max-size="300kb"><small>Note*- <i> png,jpeg,jpg -300 kb max</i></small>
                    <span id="lblError" style="color: red;"></span>
                    <br />
                    <?= form_error('image');?>
                     </div>
                  </div>
                </div>




                <input type="submit" value="Upload File" class="btnSubmit btn btn-primary btn-xs" style="padding: 2px 3px;"> <br> <p>&nbsp;</p>
               <center> <progress id="progressBar1" value="0" max="100" style="width:300px;"></progress></center>
                <h3 id="status1"></h3>
                <p id="loaded_n_total1"></p>
                 
                </form>
                <p>&nbsp;</p>
                
            
          </div>
          <div class="modal-footer">
          <a href="javascript:void(0)" data-dismiss="modal"><span  class="label label-primary" >Close</span></a>
        </div>
        </div>
        
        </div>
        </div>

    <!-- end pic upload -->






        </div>
        <!--END MODAL DELETE-->
        <script src="<?= base_url(); ?>assets/front/js/wow.min.js"></script> 
        <script src="<?= base_url(); ?>assets/front/js/bootstrap.js"></script> 
        <script src="<?= base_url(); ?>assets/front/js/drive-me-plugin.js"></script> 
        <script src="<?= base_url(); ?>assets/front/js/jquery.cookie.js"></script> 
        <script src="<?= base_url(); ?>assets/front/js/jquery.isotope.min.js"></script> 
        <script src="<?= base_url(); ?>assets/front/js/jquery.flexslider-min.js"></script> 
        <script src="<?= base_url(); ?>assets/front/js/mapmarker.js"></script> 
        <script src="<?= base_url(); ?>assets/front/js/color-switcher.js"></script> 
        <script src="<?= base_url(); ?>assets/front/js/jquery.magnific-popup.min.js"></script> <script src="<?= base_url(); ?>assets/admin/bower_components/ckeditor/ckeditor.js">  </script>
        <script src="<?= base_url(); ?>assets/front/js/owl.carousel.min.js"></script>
        <script src="<?= base_url(); ?>assets/front/js/main.js"></script>
        <script src="<?= base_url(); ?>assets/front/js/custom.js"></script>
        <script src="<?= base_url(); ?>assets/front/op/js/mig.js"></script>
        <script src="<?= base_url(); ?>assets/front/js/printout.js"></script>



        <script type="text/javascript">
           $('#teacher').hide();
           
            $('.pay').hide();
           $('#cvhide').hide();
           $('#certhide').hide();
           $('#view2').hide();
           
           
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
           
        </script>
        <!-- certificates start here -->
        <script type="text/javascript">
          $('.subbb6').prop('disabled', true);
           $(document).ready(function(){  
           
           show_cert();
           
             var postURL = "<?= site_url('update_teacher/cert'); ?>";
             var i=1;  
           
           
           
                $('#submit1').click(function(){ 
                    $('#certadd').show(); 
                     $('#certhide').hide();
                     $('.subbb6').prop('disabled', false);
                });
           
                $('#certadd').click(function(){  
                  $('#certhide').show();
                  $('#certadd').hide();
                     i++;  
                     $('#cert1').append(`                 <div id="row`+i+`" class="dynamic-added">

                                                         <div class="form-group ">
                                                       <button type="button" name="remove" id="`+i+`" class="close btn_remove1 ">&times</button>
                                                 </div>
                                                 <p>&nbsp;</p>


                                                <div class="form-group">   
                                                <input type="text" name="year" id="year" placeholder="Year" class="form-control">
                                                  </div>
                                                 <div class="form-group">
                                                       <input type="text" name="cert" id="cert" placeholder="Certificates" class="form-control">
                                                 </div>
                                                 
           
                                                 </div>
                                                 </div>`);  
                                               });
           
           
                                            $(document).on('click', '.btn_remove1', function(){  
                                               var button_id = $(this).attr("id");   
                                               $('#row'+button_id+'').remove();
                                                    $('#certadd').show(); 
                                                    $('#certhide').hide();
           
                                                 });  
           
           
                                            $('#submit1').click(function(){            
                                               $.ajax({  
                                                  url:postURL,  
                                                  method:"POST",  
                                                  //data:{year:$('#year').val(),cert:$('#cert').val()},
                                                  data:$('#form_submit1').serialize(),
                                                  type:'json',
                                                  success:function(data)  
                                                  {
           
           
                                                   i=1;
                                                   $('.dynamic-added').remove();
                                                   $('#form_submit1')[0].reset();
                                                                              //alert('Record Inserted Successfully.');
           
                                                                              show_cert();
           
                                                      },
           
                                                  });  
                                           });
           
           
           });  
           
           
           
           //function show all product
           function show_cert(){
              $.ajax({
                  type  : 'ajax',
                  url   : '<?php echo site_url('update_teacher/cert_view')?>',
                  async : false,
                  dataType : 'json',
                  success : function(data){
                      var html = '';
                      var i;
                      for(i=0; i<data.length; i++){
                          html += '<div class="well">'+
                                  '<p> Year: &nbsp;'+data[i].year+'</p>'+
                                  '<p>Certificates: &nbsp;'+data[i].cert+'</p>'+
                                  '<p style="text-align:right;">'+
                                          '<a href="javascript:void(0);" class="badge badge-info item_edit1" data-cert_id="'+data[i].cert_id+'" data-year="'+data[i].year+'" data-cert="'+data[i].cert+         '">Edit</a>'+
                                          '<a href="javascript:void(0);" class="badge badge-danger item_delete1" data-cert_id="'+data[i].cert_id+'">Delete</a>'+
                                  '</p>'+
                                  '</div>';
           
                      }
                      $('#cert_view').html(html);
                  }
           
              });
           }
           
           
           //delete record
           
           //get data for delete record
           $('#cert_view').on('click','.item_delete1',function(){
              var cert_id = $(this).data('cert_id');
           
              $('#Modal_Delete1').modal('show');
              $('[name="cert_id_delete"]').val(cert_id);
           });
           
           $('#btn_delete1').on('click',function(){
              var cert_id = $('#cert_id_delete').val();
              $.ajax({
                  type : "POST",
                  url  : "<?php echo site_url('update_teacher/cert_delete')?>",
                  dataType : "JSON",
                  data : {cert_id:cert_id},
                  success: function(data){
           
                      $('[name="cert_id_delete"]').val("");
                      $('#Modal_Delete1').modal('hide');
                      show_cert();
                  }
              });
              return false;
           });
           
           
           ////get data for update record
           $('#cert_view').on('click','.item_edit1',function(){
              var cert_id          = $(this).data('cert_id');
              var year           = $(this).data('year');
              var cert        = $(this).data('cert');
           
           
           
              $('#Modal_Edit1').modal('show');
              $('[name="cert_id"]').val(cert_id);
              $('[name="year"]').val(year);
              $('[name="cert"]').val(cert);
           
           });
           
           //update record to database
           $('#btn_update1').on('click',function(){
           
              var cert_id          = $('#cert_id').val();
              var year           = $('#year1').val();
              var cert        = $('#cert').val();
           
           
              $.ajax({
                  type : "POST",
                  url  : "<?php echo site_url('update_teacher/cert_update')?>",
                  dataType : "JSON",
                  data : {cert_id:cert_id , year:year, cert:cert},
                  success: function(data){
           
                      $('[name="cert_id"]').val("");
                      $('[name="year"]').val("");
                      $('[name="cert"]').val("");
                      $('#Modal_Edit1').modal('hide');
                      show_cert();
                  }
              });
              return false;
           });
           
           
        </script>
        <!-- certificates start here -->
        <!-- cv start here -->
        <script type="text/javascript">

          $('.subbb4').prop('disabled', true);
           $(document).ready(function(){  
           
           show_cv();
           
             var postURL = "<?= site_url('update_teacher/cv'); ?>";
             var i=1;  
           
           
           
                $('#submit').click(function(){ 
                    $('#cvadd').show(); 
                     $('#cvhide').hide();
                     $('.subbb4').prop('disabled', false);
                });
           
                $('#cvadd').click(function(){  
                  $('#cvhide').show();
                  $('#cvadd').hide();
                     i++;  
                     $('#cv').append(`                 <div id="row`+i+`" class="dynamic-added">

                                                 <div class="form-group ">
                                                       <button type="button" name="remove" id="`+i+`" class="close btn_remove " >&times</button>
                                                 </div>
                                                 <p>&nbsp;</p>

                                                <div class="form-group">   
                                                <input type="text" name="year" id="year" placeholder="Year" class="form-control">
                                                  </div>
                                                 <div class="form-group">
                                                       <input type="text" name="company" id="company" placeholder="Institution" class="form-control">
                                                 </div>
                                                 <div class="form-group">
                                                       <input type="text" name="exp" id="exp" placeholder="Experience" class="form-control">
                                                 </div>
                                                 
                                                  
                                                 
                                                
                                                 
           
                                                 </div>
                                                 </div>`);  
           });
           
           
                    $(document).on('click', '.btn_remove', function(){  
                         var button_id = $(this).attr("id");   
                         $('#row'+button_id+'').remove();
                         $('#cvadd').show(); 
                         $('#cvhide').hide(); 
           
                    });  
           
           
           $('#submit').click(function(){            
             $.ajax({  
                  url:postURL,  
                  method:"POST",  
           //data:{year:$('#year').val(),company:$('#company').val(),exp:$('#exp').val()},
                  data:$('#form_submit').serialize(),
                  type:'json',
                  success:function(data)  
                  {
                         //alert(data);
           
           
                          i=1;
                          $('.dynamic-added').remove();
                          $('#form_submit')[0].reset();
                              //alert('Record Inserted Successfully.');
           
                         show_cv();
           
                  },
           
             });  
           });
           
           
           });  
           
           
           
           //function show all product
           function show_cv(){
              $.ajax({
                  type  : 'ajax',
                  url   : '<?php echo site_url('update_teacher/cv_view')?>',
                  async : false,
                  dataType : 'json',
                  success : function(data){
                      var html = '';
                      var i;
                      for(i=0; i<data.length; i++){
                          html += '<div class="well">'+
                                  '<p> Year: &nbsp;'+data[i].year+'</p>'+
                                  '<p>Institution: &nbsp;'+data[i].company+'</p>'+
                                  '<p>Experience: &nbsp;'+data[i].exp+'</p>'+
                                  '<p style="text-align:right;">'+
                                      '<a href="javascript:void(0);" class="badge badge-info item_edit" data-cv_id="'+data[i].cv_id+'" data-year="'+data[i].year+'" data-company="'+data[i].company+'" data-exp="'+data[i].exp+'">Edit</a>'+
                                      '<a href="javascript:void(0);" class="badge badge-danger item_delete" data-cv_id="'+data[i].cv_id+'">Delete</a>'+
                                  '</p>'+
                                  '</div>';
           
                      }
                      $('#cv_view').html(html);
                  }
           
              });
           }
           
           
           //delete record
           
           //get data for delete record
           $('#cv_view').on('click','.item_delete',function(){
              var cv_id = $(this).data('cv_id');
           
              $('#Modal_Delete').modal('show');
              $('[name="cv_id_delete"]').val(cv_id);
           });
           
           $('#btn_delete').on('click',function(){
              var cv_id = $('#cv_id_delete').val();
              $.ajax({
                  type : "POST",
                  url  : "<?php echo site_url('update_teacher/cv_delete')?>",
                  dataType : "JSON",
                  data : {cv_id:cv_id},
                  success: function(data){
                      $('[name="cv_id_delete"]').val("");
                      $('#Modal_Delete').modal('hide');
                      show_cv();
                  }
              });
              return false;
           });
           
           
           ////get data for update record
           $('#cv_view').on('click','.item_edit',function(){
              var cv_id          = $(this).data('cv_id');
              var year           = $(this).data('year');
              var company        = $(this).data('company');
              var exp            = $(this).data('exp');
           
              $('#Modal_Edit').modal('show');
              $('[name="cv_id"]').val(cv_id);
              $('[name="year"]').val(year);
              $('[name="company"]').val(company);
              $('[name="exp"]').val(exp);
           });
           
           //update record to database
           $('#btn_update').on('click',function(){
           
              var cv_id          = $('#cv_id').val();;
              var year           = $('#year').val();
              var company        = $('#company').val();
              var exp            = $('#exp').val();
           
              $.ajax({
                  type : "POST",
                  url  : "<?php echo site_url('update_teacher/cv_update')?>",
                  dataType : "JSON",
                  data : {cv_id:cv_id , year:year, company:company,exp:exp},
                  success: function(data){
                      $('[name="cv_id"]').val("");
                      $('[name="year"]').val("");
                      $('[name="company"]').val("");
                      $('[name="exp"]').val("");
                      $('#Modal_Edit').modal('hide');
                      show_cv();
                  }
              });
              return false;
           });
           
           
        </script>
        <!-- cv end here -->
        <script type="text/javascript">$(function () {
           $(".div123,.div124").hide();
           
           $(".link1, .link2").bind("click", function () {
           $(".div123, .div124").hide();
           
           if ($(this).attr("class") == "link1")
           {
           
           $(".div123").show();
           $('#select124').prop('disabled',true);
           $('#select123').prop('disabled',false);
           }
           else
           {
           
           $(".div124").show();
           $('#select123').prop('disabled',true);
           $('#select124').prop('disabled',false);
           }
           });
           });
        </script>
        <script type="text/javascript">
           $(document).ready(function(){
           if($('.link1').is(':checked'))
           {
           
           $('.div123').show();
           
           }
           if($('.link2').is(':checked'))
           {
           
           $('.div124').show();
           
           }
           });
        </script>
        <script>
           $(document).ready(function () {

            var tz1 = jstz.determine(); // Determines the time zone of the browser client
            var timezone1 = tz1.name();

           
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
                  timezone:'UTC',
                  
                  slotDuration: "00:30:00",
                  displayEventTime:false,
           
                  events: "<?= site_url() . 'calender/events'; ?>",
    //                                                ,

                  
                  selectable: true,
                  selectOverlap: false,
           
                  selectHelper: true,
           
                  // eventStartEditable: false,
          
           
                  select: function (start, end) {

                    // end = $.fullCalendar.moment.tz(start, timezone1).format();
                    //    end.add(30, 'minutes');
                    //   var start = $.fullCalendar.moment.tz(start, timezone1).format();
           
                    //   var end = $.fullCalendar.moment.tz(end, timezone1).format();
                    //  va9r selectionStart = moment(start); 
                    //  var today = moment(); // passing moment nothing defaults to today
                    
                     // alert(start);
                     // alert(timezone1); exit;
                        
                       end = $.fullCalendar.moment(start);
                       end.add(30, 'minutes');
                      var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
           
                      var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                     var selectionStart = moment(start); 
                     var today = moment(); // passing moment nothing defaults to today

                     alert(selectionStart); exit;

              if (selectionStart < today) { 
                  $('#calendar').fullCalendar('unselect');
              }
              else {
             
           
                      $.ajax({
           
                          url: '<?= base_url(); ?>calender/add_events',
           
                          data: '&start=' + start + '&end=' + end,
           
                          type: "POST",
           
                         // success: function (json) {
           
                              success:function()
                                 {
                                  calendar.fullCalendar('refetchEvents');
                                  // alert("Added Successfully");


                                 }
           
           
                      })
             // do stuff
              }
                      // calendar.fullCalendar('renderEvent',
                      //         {
           
                      //             start: start,
           
                      //             end: end,
           
                      //             allDay: false
           
                      //         },
                      //         true
           
                      //         );
           
           
           
                      // calendar.fullCalendar('unselect');
           
                  },
           
                  editable: true,
           
                  eventDrop: function (event, delta) {


           
                      var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
           
                      var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
           
                      $.ajax({
           
                          url: '<?= base_url(); ?>calender/update_events',
           
                          data: '&start=' + start + '&end=' + end + '&id=' + event.id,
           
                          type: "POST",
           
                          success: function (json) {
           
                              alert("Updated Successfully");
                              return false;
           
                          }
           
                      });
           
                  },
           
                  eventClick: function (event) {
           
                      var decision = 
                        $.confirm({
                                                    title: 'Confirm!',
                                                    content: 'Are you COnfirm to Delete!',
                                                    buttons: {
                                                        confirm: function () {
                                                            $.ajax({
     
                                                                    type: "POST",
                                                 
                                                                    url: "<?= base_url(); ?>calender/delete_event",
                                                 
                                                                    data: "&id=" + event.id,
                                                 
                                                                    success: function (json) {
                                                 
                                                                        $('#calendar').fullCalendar('removeEvents', event.id);
                                                 
                                                                       // alert("Updated Successfully");
                                                 
                                                                       return false;
                                                                    }
                                                 
                                                                  });
                                                        },
                                                              cancel: function () {
                                                                  
                                                              }
                                                             
                                                              }
                                                          
                                                      });

           
                      
                  },
           
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

  $('#tabbb a[href="#home"]').tab('show');

  $(document).ready(function () {
     
  $('#subbb1').on('click', function () {
     $('#tabbb a[href="#profile"]').tab('show');
  });

  $('#subbb2').on('click', function () {

    
          $('#tabbb a[href="#profile1"]').tab('show');
   
  });

  $('#subbb3').on('click', function () {

       $('#tabbb a[href="#profile2"]').tab('show');
  });

  $('#subbb4').on('click', function () {
    
       $('#tabbb a[href="#profile3"]').tab('show');
  });

  $('#subbb5').on('click', function () {
       $('#tabbb a[href="#profile4"]').tab('show');
  });

  $('#subbb6').on('click', function () {
       $('#tabbb a[href="#profile5"]').tab('show');
  });

  $('#subbb7').on('click', function () {
       $('#tabbb a[href="#profile6"]').tab('show');
  });

});


   </script>











        <script>
  $.validate({
    modules : 'file,toggleDisabled',
    disabledFormFilter : 'form.toggle-disabled',
    showErrorDialogs : false
  });
  </script>


        <script>
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('editor1')
      //bootstrap WYSIHTML5 - text editor
      $('.textarea').wysihtml5()
    })
  </script>
     </body>
  </html>