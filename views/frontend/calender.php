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

        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'ar,en,es,jv,ko,pa,pt,ru,zh-CN', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
            }
        </script>


        <?php  $user['user'] = $this->ion_auth->user()->row(); ?>
               <?php foreach($user as $u); 
                {   $user_id    = $u->id;
                    $first_name = $u->first_name;
                    $last_name  = $u->last_name;
                    $username  = $u->username;
                    $email      = $u->email;
                    $city       = $u->state;
                    $country    =$u->countrys;
                    $message    =$u->message;
                    $image      =$u->images;
                }
               ?>
                   
               <?php $teacher['teacher'] = Teacher::find_by_user_id($user_id);?>

                                 <?php //echo "<pre>";
                                // print_r($teacher);exit; ?>

                                <?php foreach($teacher as $u); 
                {
                              $fee             = $u->fee;
                              $lang1           = $u->lang1;
                              $subject         = $u->subject;
                              $teach1          = $u->teach1;
                              $mhri            = $u->mhri;
                              $mhrg            = $u->mhrg;
                              $mobile          = $u->mobile;
                              $education       = $u->education;
                              $university      = $u->university;
                              $city            = $u->city;
                              $country         = $u->country;
                              $skype           = $u->skype;
                              $age             = $u->age;
                              $experiance      = $u->experiance;
                              $certificates    = $u->certificates;
                              $specilization   = $u->specilization;
                              $pic              =$u->pic;
                              $vedio            =$u->vedio;
                        

}
               ?>
        




       

        <style type="text/css">
            #calendar {
                max-width: 60%;
                margin: 0 auto;
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
                                        
                                     <li class="youtube"><a href="https://www.youtube.com" target="_blank" style="margin: 0px"><i class="fa fa-youtube"></i></a></li>
                                      <li class="facebook"><a href="https://www.facebook.com/fb" target="_blank" style="margin: 0px"><i class="fa fa-facebook" ></i></a></li>
                                      <li class="skype"><a href="https://www.skype.com" target="_blank" style="margin: 0px"><i class="fa fa-skype"></i></a></li>
                                        
                                       
                                    </ul>
                                                                                             
                   <?php   $user = $this->ion_auth->user()->row();  ?>
                    <ul class="right-bar-side">
                     
                        <li id="moon1"> <a href="#."><i class="fa fa-phone"></i> + 91 888 777 5544 </a></li>
                        <li id="moon1"> <a href="#."><i class="fa fa-envelope"></i> support@demo.com </a></li>
                            <li><div class="btn-group" ><a href="#."><i class="fa fa-user"></i><?php if ($user->first_name == '') {
                echo $user->username;
            } else {
                echo $user->first_name;
            } ?> </a>
                                    <a href="#" class=" dropdown-toggle" data-toggle="dropdown" style="background-color: #647382;"><span class="caret"></span></a>
                                    <ul class="dropdown-menu" style="background-color: #647382; width: auto;">
                                        <li style="background-color: #647382; "> 
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
                                                echo anchor('frontend/auth_login/indiprofile', 'profile');
                                            } elseif ($currentGroups == 4) {

                                                echo anchor('frontend/auth_login/teacherprofile', 'profile');
                                            } elseif ($currentGroups == 5) {

                                                echo anchor('frontend/auth_login/instiprofile', 'profile');
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
                                            if ($currentGroups == 2) {
                                                echo " ";
                                            } elseif ($currentGroups == 3) {
                                                echo anchor('frontend/auth_login/editindiprofile', 'Edit');
                                            } elseif ($currentGroups == 4) {

                                                echo anchor('frontend/auth_login/edit_forign_fee_registration', 'Edit');
                                            } elseif ($currentGroups == 5) {

                                                echo anchor('frontend/auth_login/insti_edit_profile', 'Edit');
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
                                    <div class="logo"> <a href="#"> <span class="fa-stack"> <i class="fa logo-hex fa-stack-2x"></i> <i class="fa logo-fa fa-road fa-stack-1x"></i> </span> Demo  </a> </div>
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
                                                            echo anchor('frontend/auth_login/search_teacher_list/Computer Science', 'Computer Science
');
                                                        } elseif ($currentGroups == 3) {
                                                            echo anchor('frontend/auth_login/search_teacher_list/Computer Science', 'Computer Science');
                                                        } elseif ($currentGroups == 4) {

                                                            echo anchor('frontend/auth_login/teacherprofile', 'Computer Science');
                                                        } elseif ($currentGroups == 5) {

                                                            echo anchor('frontend/auth_login/search_teacher_list/Computer Science', 'Computer Science');
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
                        <div class="tittle">
                            <h3>Teacher Profile</h3>
                            
                            <hr>
                        </div>

            <!--======= CONTENT START =========-->



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
                                            </div>

                                            <div class="col-xs-12 col-sm-6 col-lg-8">

                                                <ul class="list-group">
                                                    <li class="list-group-item  text-muted" contenteditable="false"><h2><a href="#"><?php if($first_name == ''){ echo $username;}else{echo $first_name;}  ?></a></h2><h3><a href="#">Master</a></h3></li>

                                                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Teaching Subjects</strong></span><?php if($subject != ""){ echo $subject;}else{echo "&nbsp;";} ?></li>

                                                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Teaching Language</strong></span><?php if($lang1 != ""){ echo $lang1;}else{echo "&nbsp;";} ?></li>

                                                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Minimum Hourly Rate</strong></span> $<?php if($mhri != ""){ echo $mhri;}else{echo "&nbsp;";} ?></li>
                                                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Skype </strong></span><?php if($skype != ""){ echo $skype;}else{echo "&nbsp;";} ?></li>
                                                </ul>
                                            </div>
                                        </div>                                  
                                  </div>
                              </div>

                              
                            
                               <div class="col-md-5">
                                  <div class=" col-md-12">
                                      <center><h4><a href="">Video</a></h4></center><br>
                                       <div class="embed-responsive embed-responsive-16by9">
                                        <?php 

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
                                      <iframe autoplay="false" class="embed-responsive-item video" src="<?= base_url();?>uploads/video/<?= $vedio; ?> " ></iframe>
                                      </div>
                                  </div>
                              </div>
                           
                    </div>  

                    <div class="row">
                        <div class="col-md-7">
                            <ul class="nav nav-tabs">
                              <li class="active"><a href="#home" data-toggle="tab">About Me</a></li>
                              <li><a href="#profile" data-toggle="tab">More</a></li>
                              <li><a href="#profile1" data-toggle="tab">Class Details</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                  <div class="tab-pane fade active in" id="home">
                                    <div class="row">
                                    <div class="col-md-6" ><h3 ><a href="#"><i class="fa fa-wrench"></i> Experience</a></h3><span><a href="">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <?php if($experiance != ""){ echo $experiance;}else{echo "&nbsp;";} ?>&nbsp; Year</a></span></div>

                                    <div class="col-md-6"><h3><a href="#"><i class="fa fa-book"></i> Teaching Subject</a></h3> <span><a href=""> &nbsp &nbsp &nbsp  <?php if($subject != ""){ echo $subject;}else{echo "&nbsp;";} ?></a></span></div>

                                    <div class="col-md-6"><h3><a href="#"><i class="fa fa-map-marker"></i> Address</a></h3><span><a href=""> &nbsp &nbsp &nbsp <?php if($country != ""){ echo $country;}else{echo "&nbsp;";} ?></a></span></div>

                                    <div class="col-md-6"><h3><a href="#"><i class="fa fa-language"></i> Teaching Language</a></h3><span><a href=""> &nbsp &nbsp &nbsp <?php if($lang1 != ""){ echo $lang1;}else{echo "&nbsp;";} ?></a></span></div>
                                    </div>
                                  </div>
                                  <div class="tab-pane fade" id="profile">
                                   <div class="col-md-10"> <p><table class="table table-striped table-hover table-responsive ">
                                    <tr><th>Education:</th><td><?= $education;?></td></tr>
                                    <tr><th>University:</th><td><?= $university;?></td></tr>
                                    <tr><th>City:</th><td><?= $city;?></td></tr>
                                    <tr><th>Age:</th><td><?= $age;?></td></tr>
                                    <tr><th>Certificates:</th><td><?= $certificates;?></td></tr>
                                    <tr><th>Specilization:</th><td><?= $specilization;?></td></tr>
                                   </table></p></div>
                                  </div>
                        <?php $i=1; $dbs = Booking::find_by_sql('SELECT * from bookings b left join users u on b.teacher_id = u.id left join calendars c on b.cal_id = c.id   left join teachers t on b.teacher_id = t.user_id   where b.teacher_id ='.$user_id.' AND c.start > DATE_SUB(NOW(), INTERVAL 1 MONTH)'); ?>
                                  <div class="tab-pane fade" id="profile1">
                                   <div class="col-md-12"> <p><table id="example" class="display" width="100%" cellspacing="0">
                                          <thead>
                                              <tr>
                                                  <th>No.</th>
                                                  <th>Date</th>
                                                  <th>Name</th>
                                  
                                                 
                                              </tr>
                                          </thead>
                                          <?php foreach ($dbs as $v) :?>
                                   <tr>
                                                 <td><?= $i++;?></td>
                                                  <td><?= $v->start;?></td>
                                                  <td><?= $v->first_name;?></td>
                                                 
                                              </tr>
                                          <?php endforeach; ?>
                                          <?php $price = Fee::find_by_fee_id('1'); ?>
                                         
                                          <tr class="alert-warning"><th>Total Class</th><th><?= $i-1; ?></th></tr>
                                          <tr class="alert-info"><th>Total paid</th><th>$ <?= ($i-1)*( $price->class_price ); ?></th></tr>
                                      </table></p>

                                    </div>
                                  </div>
                        </div>

<script type="text/javascript" language="javascript" >
    $(document).ready(function() {
        var dataTable = $('#example').DataTable( {
            
            
        } );
    } );
</script>

                        

            
             


                        
                    </div>    
                    <div class="col-md-5">
                        <div style="margin-top: 100px;"></div>
                            <center>
                                <ul>
                                  <li class="btn btn-primary btn-block"><a href="<?= site_url('home/calender'); ?>" style="color: white;">Reserve a Trial</a></li>
                                </ul>
                          </center>

                            <center> 
                                <ul>
                                 <li class=" btn btn-primary btn-block"><a href="<?= site_url('home/calender'); ?>" style="color: white;">Book Now</a></li>
                               </ul>
                           </center>
                        </div>
                        </div>       
                         </section>

                       
                     

                    </div>
                </section>












            

            <!--======= INTRESTED =========-->
            <div class="container"> 
                <!--======= TITTLE =========-->
                <div class="tittle">
                    <h3>Time Table</h3>

                    <hr>
                </div>
            </div>




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

                        slotDuration: "00:60:00",

                        events: "<?= site_url() . 'calender/events'; ?>"

                        ,

                        selectable: true,

                        selectHelper: true,

                        // eventStartEditable: false,



                        select: function (start, end) {



                            end = $.fullCalendar.moment(start);
                            end.add(1, 'hours');
                            var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");

                            var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");


                            $.ajax({

                                url: '<?= base_url(); ?>calender/add_events',

                                data: '&start=' + start + '&end=' + end,

                                type: "POST",

                                success: function (json) {

                                    // alert('Added Successfully and refresh');
                                    document.innerHTML("Second Name is required");

                                }

                            });

                            calendar.fullCalendar('renderEvent',
                                    {

                                        start: start,

                                        end: end,

                                        allDay: false

                                    },
                                    true

                                    );



                            calendar.fullCalendar('unselect');

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

                                }

                            });

                        },

                        eventClick: function (event) {

                            var decision = confirm("Do you really want to delete that?");

                            if (decision) {

                                $.ajax({

                                    type: "POST",

                                    url: "<?= base_url(); ?>calender/delete_event",

                                    data: "&id=" + event.id,

                                    success: function (json) {

                                        $('#calendar').fullCalendar('removeEvents', event.id);

                                        alert("Updated Successfully");
                                    }

                                });

                            }

                        },

                    });



                });



            </script> 


            <div id='calendar'></div>
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






</body>
</html>
