<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
        <title> School Management</title>
        <meta name="keywords" content="-School Management HTML5 " >
        <meta name="description" content="Language  School Management HTML5">
        <meta name="author" content="jThemes Studio">

        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- FONTS ONLINE -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:500,900,300,700,400' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-formhelpers/2.3.0/css/bootstrap-formhelpers.css" />

        <!--MAIN STYLE-->
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
        <link href="<?= base_url(); ?>assets/front/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url(); ?>assets/front/css/owl.carousel.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url(); ?>assets/front/css/main.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url(); ?>assets/front/css/style.css" rel="stylesheet" type="text/css">       
        <link href="<?= base_url(); ?>assets/front/css/responsive.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url(); ?>assets/front/css/animate.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url(); ?>assets/front/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

        <!--======= flag-icon CSS =========-->
        <link href="<?= base_url(); ?>assets/front/css/flag-icon/css/flag-icon.min.css" rel="stylesheet" type="text/css">
        <script src="<?= base_url(); ?>assets/front/js/jquery-2.2.4.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" rel="stylesheet" type="text/css" >
        <script src="<?=base_url(); ?>/assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?=base_url(); ?>/assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

          <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>


<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>



        <!--======= COLOR STYLE CSS =========-->


        <style>
               .signal {
    border: 5px solid #333;
    border-radius: 30px;
    height: 30px;
    left: 50%;
    margin: -15px 0 0 -15px;
    opacity: 0;
    position: absolute;
    /*top: 50%;*/
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

                .dropdown-menu  { min-width: 50px; }

                 .dropdown-menu > li > a {
                    display: block;
                    padding: 0px 30px;
                    clear: both;
                    font-weight: normal;
                   

                    line-height: 1.42857143;
                    white-space: nowrap;
                }

                
            #calendar {
                max-width: 50%;
                margin: 0 auto;
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
            .nav-pills > li.active > a, .nav-pills > li.active > a:focus {
                color: white;
                background-color: #0096ff;
            }

            .nav-pills > li.active > a:hover {
                color: white;
                background-color: #0096ff;
            }
        </style>


        <style>
.slidecontainer {
    width: 100%;
}

.slider {
    -webkit-appearance: none;
    width: 100%;
    height: 15px;
    border-radius: 5px;
    background: #d3d3d3;
    outline: none;
    opacity: 0.7;
    -webkit-transition: .2s;
    transition: opacity .2s;
}

.slider:hover {
    opacity: 1;
}

.slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background: #4CAF50;
    cursor: pointer;
}

.slider::-moz-range-thumb {
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background: #4CAF50;
    cursor: pointer;
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
        <div class="ajax_response_result">
            <!--======= PRELOADER =========-->
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

            <!--======= WRAPPER =========-->
            <div id="wrap"> 

                <!--======= TOP BAR =========-->
              

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

                                                            echo anchor('teacher-profile', 'English');
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

                                                            echo anchor('teacher-profile', 'Spanish');
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

                                                            echo anchor('teacher-profile', 'French');
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

                                                            echo anchor('teacher-profile', 'Chinese');
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

                                                            echo anchor('teacher-profile', 'Maths');
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

                                                            echo anchor('teacher-profile', 'Physics');
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

                                                            echo anchor('teacher-profile', 'Chemistry');
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

                                                            echo anchor('teacher-profile', 'Computer Science');
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
                                          <div class="col-md-offset-1 col-md-5"><a class="btn btn-primary btn-sm booked1" style="padding:0px; text-transform: lowercase"  href="<?= site_url('institute-profile/#Booked'); ?>">Countinue With Payment</a></div>
                                      </div>
                                  </div></p>
                              </div>
                          </div>
                                                
                                         <?php   } ?>


<?= $contents; ?>


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
        <script src="<?= base_url(); ?>assets/front/js/printout.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
       
        <script src='https://www.google.com/recaptcha/api.js'></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('.alert1').delay(200).addClass('in').fadeOut(3200);
            });
        </script>




        <script>
  $.validate({
    lang: 'es'
  });
</script>

<script type="text/javascript">
   
    $('.booked1').click(function(){
        $('.booked').click();

    });

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
<!-- 
        <script type="text/javascript">

            $('.signal').show();

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
                        
                $('#the-message11').html('<div class="alert alert-success alert-dismissible text-center"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> successfully Subscribed ! </div>');
                 setTimeout(function() {
                                        $('#the-message11').fadeOut("slow");
                                      }, 2000 );
         
         

                } 
                else
              {
                
                $('#the-message11').html('<div class="alert alert-danger alert-dismissible text-center"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> This email id already subscribed!  </div>');
                setTimeout(function() {
                                        $('#the-message11').fadeOut("slow");
                                      }, 2000 );

              }

              }



     });

  });



});
</script> -->



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


<script type="text/javascript">
   $(document).ready( function() {
    var chkToken=$('#onload').val();
            if(chkToken=='1'){
              $('#asds').modal('show');
            }

          });
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



    <div id="asds" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Payments</h4>
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


   

</html>


