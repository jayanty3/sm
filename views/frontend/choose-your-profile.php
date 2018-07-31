
            <!--======= CONTENT START =========-->
            <div class="content"> 

                
                <section class="courses">
                    <div class="container"> 
                        <!--======= TITTLE =========-->
                        <div class="tittle">
                            <h3>Choose your profile</h3>
                            
                            <hr>
                        </div>
                       <p>&nbsp;</p>

                        <!--======= MONTH TITTLE =========-->
                      <?php
                                            $user = $this->ion_auth->user()->row();
                                            $groups = $this->ion_auth->groups()->result_array();
                                            $currentGroups = $this->ion_auth->get_users_groups()->result();
                                            foreach ($currentGroups as $key => $a) {

                                                $currentGroups = $a->id;
                                            }
                                            ?>
                         
                        <!--======= RODUCTS =========-->
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                        <section class="products"> 

                            <!--======= PRODUCTS ROW =========-->
                           
                            <ul class="row">

                       
                                <!--======= ITEM 1 =========-->
                                <li class="col-sm-6 col-md-4" style="background:(-45deg,#ccc,#fff);">
                                    <div class="prodct"> 

                                        <!--======= IMAGE =========--> 
                                        <center><a href="<?php
                                            if ($currentGroups == 2) 
                                                {

                                                echo site_url('signup-teachers');
                                                 }  
                                                else
                                                {
                                                   echo site_url('signup-teacher');
                                                }
                                            ?>"><img class="img-responsive img-thumbnail"  src="<?= base_url();?>assets/front/images/p3.png" alt=""></a> </center>
                                        
                                         <center>
                                            <div class="pro-info"> 
                                        
                                                A company or person looking for foreign teachers.
                                                <hr>
                                                <a href="

                                                    
                                            <?php
                                            if ($currentGroups == 2) 
                                                {

                                                echo site_url('signup-teachers');
                                                 }  
                                                else
                                                {
                                                   echo site_url('signup-teacher');
                                                }
                                            ?> " class="btn btn-primary">Foreign Teacher</a> 
                                            </div>
                                        </center>
                                </li>
								
								 <li class="col-sm-6 col-md-4">
                                    <div class="prodct"> 

                                        <!--======= IMAGE =========--> 
                                        <center><a href="<?php
                                            if ($currentGroups == 2) 
                                                {

                                                  echo site_url('signup-individuals');
                                                 }  
                                                else
                                                {
                                                  echo site_url('signup-individual');
                                                }
                                            ?>"><img class="img-responsive img-thumbnail " src="<?= base_url();?>assets/front/images/b3.jpg" alt=""></a> </center>
                                        <center>
                                            <div class="pro-info"> 
                                        
                                                Experienced in teaching and would like to teach online or onsite.
                                                <hr>
                                                <a href="<?php
                                            if ($currentGroups == 2) 
                                                {

                                                  echo site_url('signup-individuals');
                                                 }  
                                                else
                                                {
                                                  echo site_url('signup-individual');
                                                }
                                            ?>" class="btn btn-primary">Individual </a> 
    										</div>
                                        </center>
                                </li>
								
								
								 <li class="col-sm-6 col-md-4">
                                    <div class="prodct"> 

                                        <!--======= IMAGE =========--> 
                                        <center><a href="<?php
                                            if ($currentGroups == 2) 
                                                {

                                                echo site_url('signup-institutes');
                                                 }  
                                                else
                                                {
                                                    echo site_url('signup-institute');
                                                }
                                            ?>"><img class="img-responsive img-thumbnail" src="<?= base_url();?>assets/front/images/p22.jpg" alt=""></a> </center>
                                        <center>
                                            <div class="pro-info"> 
     
                                                Manage a number of teachers and could provide them for online classes.
                                                
                                                <hr>
                                                <a href="<?php
                                            if ($currentGroups == 2) 
                                                {

                                                echo site_url('signup-institutes');
                                                 }  
                                                else
                                                {
                                                    echo site_url('signup-institute');
                                                }
                                            ?>" class="btn btn-primary">Teacing Center </a>
    										</div>
                                        </center>
                                    
                                </li>

                              

                            </ul>

                        </section>

                       
                     

                    </div>
                </section>
                 </div>
               <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
