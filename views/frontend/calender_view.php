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
        
      
        <style type="text/css">
            #calendar {
                max-width: 60%;
                margin: 0 auto;
            }
        </style>
        

        </head>
        <body>
            <!--======= PRELOADER =========-->
           <!--  <div class="work-in-progress">
              <div id="preloader">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
              </div>
            </div>
            -->



       
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
        <!--======= PRELOADER =========-->
        <!-- <div class="work-in-progress">
            <div id="preloader">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div> -->

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
            <div class="top-bar">
                <div class="container">
                    <ul class="left-bar-side" >
                          <li> <a href="<?= site_url('home/faq');?>">FAQ </a> - </li>
                        </ul>
                        <ul class="left-bar-side social_icons " id="moon1">
                                        
                                     <li class="youtube"><a href="https://www.youtube.com" target="_blank" style="margin: 0px"><i class="fa fa-youtube"></i></a></li>
                                      <li class="facebook"><a href="https://www.facebook.com/fb" target="_blank" style="margin: 0px"><i class="fa fa-facebook" ></i></a></li>
                                      <li class="skype"><a href="https://www.skype.com" target="_blank" style="margin: 0px"><i class="fa fa-skype"></i></a></li>
                                        
                                       
                                    </ul>
                     <ul class="right-bar-side">
                     
                        <li id="moon1"> <a href="#."><i class="fa fa-phone"></i> + 91 888 777 5544 </a></li>
                        <li id="moon1"> <a href="#."><i class="fa fa-envelope"></i> support@demo.com </a></li>
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
                            <div class="col-md-9 col-sm-9">
                                <div class="collapse navbar-collapse" id="nav-res">
                                    <ul class="nav navbar-nav">                         
                                        <li class="<?php if ($this->uri->segment(3)=="main") {echo "active"; } else  {echo "";}?>"> <a href="<?= site_url('home'); ?>">Home </a></li>                                        
                                        <li class="<?php if ($this->uri->segment(2)=="about") {echo "active"; } else  {echo "";}?>"> <a href="<?= site_url('home/about'); ?>" >About </a></li>
                                        <li class="<?php if ($this->uri->segment(2)=="how_works") {echo "active"; } else  {echo "";}?>"> <a href="<?= site_url('home/how_works'); ?>">How It Works </a></li>
                                        
                    
                    <li class="dropdown <?php if ($this->uri->segment(3)=="student_list") {echo "active"; } else  {echo "";}?>"> <a href="#"  data-toggle="dropdown" class="dropdown-toggle">Language Teachers <b class="caret"></b></a>
                                            <ul class="dropdown-menu animated-half fadeInUp">
                                                <li><a href="<?= site_url('frontend/auth_login/student_list'); ?>" >English</a></li>
                                                <li><a href="<?= site_url('frontend/auth_login/student_list'); ?>">Spanish</a></li>
                                                <li><a href="<?= site_url('frontend/auth_login/student_list'); ?>">French</a></li>
                        <li><a href="<?= site_url('frontend/auth_login/student_list'); ?>">Portuges</a></li>
                                                <li><a href="<?= site_url('frontend/auth_login/student_list'); ?>">Chinese</a></li>
                                               
                                            </ul>
                                        </li>   
                    <li class="dropdown <?php if ($this->uri->segment(3)=="teacher_list") {echo "active"; } else  {echo "";}?>" > <a href="#"  data-toggle="dropdown" class="dropdown-toggle">Subject Teachers <b class="caret"></b></a>
                                            <ul class="dropdown-menu animated-half fadeInUp">
                                                <li><a href="<?= site_url('frontend/auth_login/teacher_list'); ?>">General English</a></li>
                                                <li><a href="<?= site_url('frontend/auth_login/teacher_list'); ?>">Pronunciation</a></li>
                                                <li><a href="<?= site_url('frontend/auth_login/teacher_list'); ?>">SSAT</a></li>
                                                <li><a href="<?= site_url('frontend/auth_login/teacher_list'); ?>">IELTS</a></li>
                                              
                                               
                                            </ul>
                                        </li>   
                                       
                                        <li class="<?php if ($this->uri->segment(2)=="faq") {echo "active"; } else  {echo "";}?>"> <a href="<?= site_url('home/faq'); ?>">FAQ </a></li>
                                        
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


            <div class="sub-banner">
                <div class="container">
                    <h2>Teachers</h2>
                    <ul class="links">
                        <li><a href="<?= site_url('frontend/auth_login/main');?>">Home</a>/</li>
                        <li><a href="#.">Teacher Profile</a></li>
                    </ul>
                </div>
            </div>
            <!--======= CONTENT START =========-->
            <!--======= INTRESTED =========-->
            <div class="container"> 
                <!--======= TITTLE =========-->
                <div class="tittle">
                    <h3>Time Table</h3>

                    <hr>
                </div>
            </div>
<?php
$st = $this->cart->contents();


foreach ($st as $s) {
     $cc[] = $s['id'];
    // print_r($cc);
    //$cc = explode(',', $cc);
   $ct= json_encode($cc); 
  }
?>


            

 <section class="products"> 
            

            <div class="container">    

<?php echo form_open(base_url("calenderview/update/")); ?>
                <table cellpadding="6" cellspacing="1" style="width:80%; margin-left: 10%; border="0" class="table table-bordered table-striped">
<?php
$user = $this->ion_auth->user()->row();
$name = $user->first_name . " " . $user->first_name;
// All values of cart store in "$cart". 
?>
<?php if ($this->cart->contents()): ?>
                        <tr>
                            <th>Serial</th>
                            <th>No of Class</th>
                            <th>Name</th>
                            <th style="text-align:right">Amount</th>
                            <th style="text-align:right">Sub-Total</th>
                        </tr>
    <?php $i = 1; ?>
    <?php $j = 1; ?>
    <?php //  echo "<pre>"; print_r($this->cart->contents());   ?>
    <?php foreach ($this->cart->contents() as $items): ?>
        <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
                            <input title="id" name="id" type="hidden" value="<?= $this->uri->segment(3); ?>">

                            <tr>
                                <td>
        <?php echo $j++; ?>
                                </td>
                                <td>
                        <?php echo $items['qty']; ?>

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
                            <td colspan="5">&nbsp;</td>
                        </tr>
                        <tr>

    <!-- <td colspan="2"> </td> -->
                            <td colspan="3"> </td>
                            <td style="text-align:right"><strong>Total</strong></td>
                            <td style="text-align:right"><strong>$<?php echo $this->cart->format_number($this->cart->total()); ?></strong></td>
                        </tr>
                    
                   <p style="width:80%; margin-left: 10%;">

                                <?php echo anchor('calenderview/remove/' . $items['rowid'] . '/' . $this->uri->segment(3), 'Remove', ['class' => 'btn btn-primary']); ?>
                        <a href="#." data-toggle="modal" data-target="#indipay" class="btn btn-primary"> Pay Now </a>
                    </p>
                                <?php endif; ?>
                                </table>
                                <?php echo form_close(); ?>
            </div>
</section>

           
            <div class="row">
                <div class="col-md-offset-2">
                    <div class="text-danger"> 
<?php
$cart_check = $this->cart->contents();
//If cart is empty, this will show below message.
if (empty($cart_check)) {
    echo 'Book your class on green cell showing on calendar "Add to class" Button';
}
?> 
                    </div>
                </div>
            </div>            


             </div> 
             </div> 
            <p>&nbsp;</p>
            <div id='calendar'></div>
            <p>&nbsp;</p>
            <p>&nbsp;</p>


</div>
    </div>
            <footer >

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


    <script type="text/javascript">
                // To conform clear all data in cart.
                function clear_cart() {
                    var result = confirm('Are you sure want to clear all bookings?');
                    if (result) {
                        window.location = "<?php echo base_url(); ?>calenderview/remove";
                    } else {
                        return false; // cancel button
                    }
                }
            </script>


            <script>
                $(document).ready(function () {
                    var isValidEvent = function (start, end) {
                        return $("#calendar").fullCalendar('clientEvents', function (event) {
                            return (event.rendering === "background" && //Add more conditions here if you only want to check against certain events
                                    (start.isAfter(event.start) || start.isSame(event.start, 'minute')) &&
                                    (end.isBefore(event.end) || end.isSame(event.end, 'minute')));
                        }).length > 0;
                    };

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
                        slotDuration: "00:60:00",
                        allDaySlot: false,
                        events:
                                [
                                    <?php foreach ($calc as $c):?>

                                        {
                                            id:<?= $c->id; ?>,
                                            title: '',
                                            start: '<?= $c->start; ?>',
                                            end: '<?= $c->end; ?>',
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
                                            url: '<?= site_url(); ?>calenderview/events/<?= $c->id; ?>',

                                                                        rendering: '<?php
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
                                              ?>',

                                                                    },

              <?php endforeach; ?>
                                                                          ]
                                                                  ,
                                                              selectable: true,

                                                });

                                            });
            </script>















             <div class="modal" id="indipay" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><img src="<?= base_url(); ?>assets/front/images/cut.png" width="20px" height="20px"></button>


                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <!--======= CONTACT FORM =========-->
<?php $p = Fee::find_by_fee_id(1); ?>
                                <div class="col-md-12">
                                    <div class="contact-form">
                                        <p class="notice error"><?= $this->session->flashdata('error_msg') ?></p><br/>
                                        <p class="notice error"><?= $this->session->flashdata('success_msg') ?></p><br/>
                                        <form method="post" class="form-horizontal" role="form" action="<?= base_url() ?>paypal/create_payment_with_paypal">
                                            <fieldset>
                                                <input title="item_name" name="item_name" type="hidden" value="<?= $name ?>">
                                                <input title="item_number" name="item_number" type="hidden" value="<?php echo $this->cart->format_number($this->cart->total_items()); ?>">
                                                <input title="item_description" name="item_description" type="hidden" value="Online class learning">
                                                <input title="item_tax" name="item_tax" type="hidden" value="1">
                                                <input title="item_price" name="item_price" type="hidden" value="<?php echo $this->cart->format_number($this->cart->total()); ?>">
                                                <input title="details_tax" name="details_tax" type="hidden" value="0">
                                                <input title="details_subtotal" name="details_subtotal" type="hidden" value="<?php echo $this->cart->format_number($this->cart->total()); ?>">
                                                <div class="form-group">
                                                    <div class="col-sm-offset-2">
                                                        <button  type="submit"  ><img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png" alt="Check out with PayPal" /></button>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
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




</body>
</html>