 <div class="content"> 

  <?php  if($this->session->flashdata('succ11')){ ?> 

<script>swal("Good job!","Your Account is Created Activated within 2 Days", "success");</script>
   <?php } ?>

  

   <?php  if($this->session->flashdata('acc1')){ ?> 

<script> swal("Good job!", "Your Account is Created! .Please check your email for Email varfication", "success");</script>
   <?php } ?>
   

    <?php  if($this->session->flashdata('verify1')){ ?> 

<script> swal("Good job!", "Your Account is Active! .Now You can Login", "success");</script>
   <?php } ?>

   <?php  if($this->session->flashdata('verifyfail1')){ ?> 

<script> swal("Oops...!", "this link is expired! .Please contact admin", "error");</script>
   <?php } ?>

<?php  if($this->session->flashdata('delete1')){ ?> 

<script> swal("Good job!", "Your Account is Deleted! .", "success");</script>
   <?php } ?>

<?php  if($this->session->flashdata('mess12')){ ?> 

<script> swal("Oops...!", "your Confirmation is confirm! class is Cancel .", "success");</script>
   <?php } ?>

<?php  if($this->session->flashdata('mess11')){ ?> 

<script> swal("Good job!", "your Confirmation is confirm! class is confirm .", "success");</script>
   <?php } ?>

   <?php  if($this->session->flashdata('reset11')){ ?> 

<script> swal("Good job!", "your Password is Changed Now You Can Login .", "success");</script>
   <?php } ?>
   

   
  
               <!--======= BANNER =========-->
            <div id="banner">
                <div class="flexslider">
                    <ul class="slides">

                        <!--======= SLIDE 1 =========-->
                        <li> <img src="<?=base_url(); ?>assets/front/images/slide-1.jpg" alt="">
                            <div class="container">
                                <div class="text-slider">
                                    <div class="col-sm-6">
                                        
                                        <!-- <p></p> -->
                                        <p style="background: transparent;">&nbsp;</p>
                                        <p style="background: transparent;">&nbsp;</p>
                                      
                                        <p style="background: transparent;">&nbsp;</p>
                                        <a href="<?= site_url('signup');?>"  class="btn">Free Registration</a>
                                        <!-- <a class="btn" href="#">Free Registration</a> --> 
                                        <a class="btn " href="<?= site_url('home/contact');?>">Courses Price</a> 
                                        <!-- <a class="btn get-form" href="#">Get A Code</a>  -->

                                    </div>
                                   <!-- <p style="background: transparent;">&nbsp;</p>
                                   <p style="background: transparent;">&nbsp;</p> -->
                                   
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!--======= CONTENT START =========-->
           <style type="text/css">
             .ann{
              margin-right: 0px;
              font-size: 14px;
              color: #647382; 
              font-weight: 400;
              display: inline-block;
              text-decoration: none;
              border-radius: 4px;
              padding: 5px 20px;
              background-color: lightgrey;
              border: 1px solid #dee1e4;
             }
           .active1,.ann:hover { 
                    background-color: #0096FF; 
                    color: white;
                }
                
         .btn-link1{
           background-color: transparent;
           border: none;
           /*color: #647382;*/
         }


         .active1,.btn-link1:hover{
             background-color: #0096FF; 
                    color: white;
         }   


        

           </style>

            <script>
                      ;(function($){
                      
                        
                        $.fn.scrollPosReaload = function(){
                            if (localStorage) {
                                var posReader = localStorage["posStorage"];
                                if (posReader) {
                                    $(window).scrollTop(posReader);
                                    localStorage.removeItem("posStorage");
                                }

                                $('#pagee1').click(function(e) {
                                    localStorage["posStorage"] = $(window).scrollTop();
                                });
                                $(this).click(function(e) {
                                    localStorage["posStorage"] = $(window).scrollTop();
                                });
                                 

                                return true;
                            }

                            return false;
                        }
                        
                      

                        $(document).ready(function() {
                            // Feel free to set it for any element who trigger the reload
                            $('#tabbb1').scrollPosReaload();

                           

                          
                                          
                        });
                      
                    }(jQuery)); 

           </script> 




           <?php  if($this->uri->segment('2'))
                     {


                        echo "<script>

                        
                            
                            $(function(){

                              $(document).scrollTop(200);

                              
                                
                                
                              });

                              
                             
                        </script>";
                        
                     } 
           ?>
           
           

              <section  class="products" id="#pag">
                    <div class="container" id="#pagee1" > 
                      <p style="background: transparent;">&nbsp;</p>
                        <!--======= TITTLE =========-->
                        <div class="tittle" id="tabbb2">
                                <h3>Teachers </h3>
                                <p>See our Photos and enoying times</p>
                                <hr>
                            </div>

                        <ul class="filter" id="tabbb1">
                          
                          
                         <?php  $test = isset($_GET['teachSearch']) ? $_GET['teachSearch'] : ''; ?>
                                     
                  <li class="ann <?php if( $test == 'English'){echo 'active1';}?>" style="cursor: pointer" id="aa1" >  <?php echo form_open("home-search",['method'=>'get']);?>
                            <input type="hidden" name="teachSearch" value="English" />
                            <input id="btn_search"  type="submit" class="btn-link1"  style="text-decoration: none;" value="English"  />                                                 
                    <?php echo form_close(); ?></li>


                <li class="ann <?php if( $test == 'French'){echo 'active1';}?> " > <?php echo form_open("home-search",['method'=>'get']);?>
                            <input type="hidden" name="teachSearch" value="French" />
                            <input id="btn_search1"  type="submit" class="btn-link1" style="text-decoration: none; " value="French" />
                  <?php echo form_close(); ?></li>

               <li class="ann <?php if( $test == 'Spanish'){echo 'active1';}?>">   <?php echo form_open("home-search",['method'=>'get']);?>
                            <input type="hidden" name="teachSearch" value="Spanish" />
                            <input id="btn_search2"  type="submit" class="btn-link1" style="text-decoration: none;" value="Spanish" />
                  <?php echo form_close(); ?></li>
               <li class="ann <?php if( $test == 'Portugese'){echo 'active1';}?>">   <?php echo form_open("home-search",['method'=>'get']);?>
                            <input type="hidden" name="teachSearch" value="Portugese" />
                            <input id="btn_search3"  type="submit" class="btn-link1" style="text-decoration: none;" value="Portugese" />
                  <?php echo form_close(); ?></li>
                    
                     <li class="ann <?php if( $test =='Maths'){echo 'active1';}?>">  <?php echo form_open("home-search",['method'=>'get']);?>
                            <input type="hidden" name="teachSearch" value="Maths" />
                            <input id="btn_search4"  type="submit" class=" btn-link1"  style="text-decoration: none;" value="Maths"  />                                                 
                    <?php echo form_close(); ?></li>

                <li class="ann <?php if($test =='Chemistry'){echo 'active1';}?>"> <?php echo form_open("home-search",['method'=>'get']);?>
                            <input type="hidden" name="teachSearch" value="Chemistry" />
                            <input id="btn_search5"  type="submit" class="btn-link1" style="text-decoration: none; " value="Chemistry" />
                  <?php echo form_close(); ?></li>

               <li class="ann <?php if($test =='Physics'){echo 'active1';}?>">   <?php echo form_open("home-search",['method'=>'get']);?>
                            <input type="hidden" name="teachSearch" value="Physics" />
                            <input id="btn_search6"  type="submit" class="btn-link1" style="text-decoration: none;" value="Physics" />
                  <?php echo form_close(); ?></li>
               <li class="ann <?php if($test =='History'){echo 'active1';}?>">   <?php echo form_open("home-search",['method'=>'get']);?>
                            <input type="hidden" name="teachSearch" value="History" />
                            <input id="btn_search7"  type="submit" class="btn-link1" style="text-decoration: none;" value="History" />
                  <?php echo form_close(); ?></li>               

                                </ul>

                               

                        <!--======= PRODUCTS ROW =========-->

                        <ul class="row items">
                                    
                            

                                    
                            <li class="col-xs-6 col-sm-4 col-md-2 item course student  meeting">

                                <div class="port-over "> 

                                    <!--======= IMAGE =========--> 
                                    <img class="img-responsive" src="<?=base_url(); ?>assets/front/images/avatar-1.jpg" alt="" style="height: 163px">
                                    <div class="pro-info"> 
                                    <div class="cate-name" >
                                     <span class="pull-left">Teacher name</span><br>
                                            <ul class="stars pull-left">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li class="no-rate"><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                        </div>
                                    <div class="over-info" style="opacity: 1;">
                                                <p style="margin-top: 20px;"><strong style="font-size: medium;">
                                                Language: Spanish</strong><br>
                                                Country: USA<br>
                                                Name: Rachel<br>
                                                Certificate: TOEFL<br>
                                                Experience: 10yrs<br>
                                                <!--======= POP UP IMAGE =========-->
                                                
                                                <!--======= HEART =========--> 
                                                <a href="#" data-toggle="modal" data-target="#myModal1" class="btn btn-danger btn-xs" style="opacity: 1;">detail</a>
                                    </div>     
                                </div>
                            </li>
                             
                                        
                                     <?php foreach($sta as $a): ?> 
                                <?php 

                                                                    if($a->pic != "")
                                                                        {
                                                                        //show picture from database
                                                                        $a->pic;
                                                                        }
                                                                        else
                                                                        {
                                                                        //show generic picture
                                                                        $a->pic = "demo.jpg";
                                                                        }
                                                                     ?>




                            <li class="col-xs-6 col-sm-4 col-md-2 item course student  meeting">
                                
                                <div class="port-over"> 

                                    <!--======= IMAGE =========--> 
                                    <img class="img-responsive" src="<?= base_url();?>uploads/images/<?= $a->pic; ?>" alt="" style="height: 163px">
                                    <div class="pro-info"> 
                                    <div class="cate-name" >
                                     <span class="pull-left"><?php if($a->first_name == ''){ echo $a->username;}else{echo $a->first_name." ".$a->last_name;}  ?></span><br>
                                            <ul class="stars pull-left">
                                               <?php  
           $ratting = Ratting::find_by_sql("SELECT AVG(ratings) AS total FROM `rattings` WHERE teacher_id = {$a->user_id}");
                         
               $ratting = $ratting[0]->total;      

                            

                 ?>                             <?php if($ratting){

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
                                                
                                            </ul>
                                        </div>
                                        </div>
                                    <div class="over-info">
                                                <p style="margin-top: 20px;"><strong style="font-size: medium;"><?php if($a->lang1){$arr = explode(',',trim($a->lang1));echo 'Language:'. $arr[0]."\n" ; }else{ $arr = explode(',',trim($a->subject));echo 'Subject:'.$arr[0]."\n" ;} ?></strong><br>

                                                 
                                                Country: <?= $a->country;?><br>
                                                Name: <?= $a->first_name." ".$a->last_name;?><br>
                                                Certificate: TOEFL<br>
                                                Experience: <?= $a->experiance; ?><br>
                                                <!--======= POP UP IMAGE =========-->
                                                
                                                <!--======= HEART =========--> 
                                                <a href="" data-toggle="modal" data-target="#myModal1" class="btn btn-danger btn-xs">detail</a>
                                    </div>     
                                </div>
                            </li>
                                        <?php endforeach; ?>

                            
                            
                            
                        </ul>

                        <!-- <div class="text-center margin-t-40"> <a href="#." class="btn"> See All Course</a> </div> -->
                    </div>
                   <div class="container"><?php echo $pagination; ?></div> 
                </section>
               

                <!--======= FEATURE =========-->
                <section id="feature">
                    <div class="container"> 

                        <!--======= TITTLE =========-->
                        <div class="tittle">
                            <h3>Our Community</h3>
                            <p>Giving Best Options For You</p>
                            <hr>
                        </div>
                        <!--======= FEATURE =========-->
                        <ul class="row">

                            <!--======= SERVICES 1 =========-->
                            <li class="col-sm-6 col-md-3">
                                <div class="inner">
                                    <div class="hexagon"><span> </span></div>
                                    <div class="icon"> <i class="fa fa-life-ring"></i> </div>
                                    <h5>24 Hours Support</h5>
                                    <hr>
                                    <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.</p> 
                                   </div>  
                            </li>

                            <!--======= SERVICES 1 =========-->
                            <li class="col-sm-6 col-md-3">
                                <div class="inner">
                                    <div class="hexagon"><span> </span></div>
                                    <div class="icon"> <i class="fa  fa-comments"></i> </div>
                                    <h5>Online Help</h5>
                                    <hr>
                                    <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.</p>
                                   </div>
                            </li>

                            <!--======= SERVICES 3 =========-->
                            <li class="col-sm-6 col-md-3">
                                <div class="inner">
                                    <div class="hexagon"><span> </span></div>
                                    <div class="icon"> <i class="fa  fa-paypal"></i> </div>
                                    <h5>Online Payment</h5>
                                    <hr>
                                    <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.</p>
                                     </div>
                            </li>

                            <!--======= SERVICES 4 =========-->
                            <li class="col-sm-6 col-md-3">
                                <div class="inner">
                                    <div class="hexagon"><span> </span></div>
                                    <div class="icon"> <i class="fa fa-phone"></i> </div>
                                    <h5>Call</h5>
                                    <hr>
                                    <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.</p>
                                    </div>
                            </li>
                        </ul>
                    </div>
                </section>

               <p>&nbsp;</p>
               <section class="parallax layer-overlay overlay-theme-colored-9">
      <div class="container">
        <div class="tittle">
                            <h3><center>Some Facts</center></h3>
                            
                            <hr>
                        </div>
        <h2></h2>
        <div class="row text-center">
          <div class="col-xs-12 col-sm-6 col-md-4 mb-md-50">
            <div class="funfact">
              <i class="fa fa-users text-theme-colored2 font-48 mb-20"></i>
              <h2 data-animation-duration="200" data-value="118" class="animate-number font-42 font-weight-600 mt-0 mb-15"><span class="count">118</span> </h2>
              <h5 class="text-uppercase"> Teachers </h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4 mb-md-50">
            <div class="funfact">
              <i class="fa fa-graduation-cap text-theme-colored2 font-48 mb-20"></i>
              <h2 data-animation-duration="200" data-value="3450" class="animate-number font-42 font-weight-600 mt-0 mb-15"><span class="count">3450</span></h2>
              <h5 class="text-uppercase">Students</h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4 mb-md-50">
            <div class="funfact">
              <i class="fa fa-trophy text-theme-colored2 font-48 mb-20"></i>
              <h2 data-animation-duration="200" data-value="7" class="animate-number font-42 font-weight-600 mt-0 mb-15"><span class="count">7</span></h2>
              <h5 class="text-uppercase">Year of Experience</h5>
            </div>
          </div>
        </div>
      </div>
    </section>
    <p>&nbsp;</p>
<section class="parallax layer-overlay overlay-theme-colored-9">
  <div class="container">
    <div class="row">
      <div class="span12">

        <div class=" center text-center">
          <div class="tittle">
            <h3><center>Subscription/Newsletter sign up</center></h3>
            
            <hr>
            
          </div>

          <div style="padding-top: 30px;">
          <div class="signal" ></div>

           </div>



          
          <div id="the-message11"></div>

          <?php $attributes = array( "id" => "contact_form2",'role'=>'form','class'=>'form-inline');?>

          <?php echo form_open("subscription/sub1",$attributes);?>

          
          <div class="form-group ">
            <input type="email" class="form-control" name="email1" id="email1" placeholder="yourmail@domain.com" required>
            <button type="submit"  class="btn btn-primary btn-sm" >Submit</button>
          </div>
          
        </form>

      </div>    
    </div>
  </div>
</div>
</section>             <p>&nbsp;</p>
<p>&nbsp;</p>


     
<!-- Page specific script -->

   
  