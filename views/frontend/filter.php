<?php 

//$content_per_page = 3;	
//$group_no  = strtolower(trim(str_replace("/","",$_REQUEST['group_no'])));
//$start = ceil($group_no * $content_per_page);

$sql= "SELECT distinct * FROM `teachers` INNER JOIN users ON users.id=teachers.user_id WHERE users.active = '1'";

    if(isset($_GET['gender']) && $_GET['gender']!="") :
        $gender = $_GET['gender'];
        $sql.=" AND users.gender IN ('".implode("','",(array)$gender)."')";
    endif;
    if(isset($_GET['gender1']) && $_GET['gender1']!="") :
        $gender = $_GET['gender1'];
        $sql.=" AND users.gender IN ('".implode("','",(array)$gender)."')";
    endif;
    if(isset($_GET['gender2']) && $_GET['gender2']!="") :
        $gender = $_GET['gender2'];
        $sql.=" AND users.gender IN ('".implode("','",(array)$gender)."')";
    endif;

    if(isset($_GET['country']) && $_GET['country']!="") :
        $country = $_GET['country'];
        $sql.=" AND teachers.country IN ('".implode("','",(array)$country)."')";
    endif;
    if(isset($_GET['country1']) && $_GET['country1']!="") :
        $country = $_GET['country1'];
        $sql.=" AND teachers.country IN ('".implode("','",(array)$country)."')";
    endif;
    if(isset($_GET['country2']) && $_GET['country2']!="") :
        $country = $_GET['country2'];
        $sql.=" AND teachers.country IN ('".implode("','",(array)$country)."')";
    endif;

    if(isset($_GET['teachmethod']) && $_GET['teachmethod']!="") :
        $teachmethod = $_GET['teachmethod'];
        $sql.=" AND teachers.teachmethod (".implode(',',(array)$teachmethod).")";
    endif;
    if(isset($_GET['teachmethod1']) && $_GET['teachmethod1']!="") :
        $teachmethod = $_GET['teachmethod1'];
        $sql.=" AND teachers.teachmethod (".implode(',',(array)$teachmethod).")";
    endif;
    if(isset($_GET['teachmethod2']) && $_GET['teachmethod2']!="") :
        $teachmethod = $_GET['teachmethod2'];
        $sql.=" AND teachers.teachmethod (".implode(',',(array)$teachmethod).")";
    endif;
    
    if(isset($_GET['mhr']) && $_GET['mhr']!="") :
        $mhr = $_GET['mhr'];
        $sql.=" AND teachers.mhr <= (".implode(',',(array)$mhr).")";
    endif;

    if(isset($_GET['mhr1']) && $_GET['mhr1']!="") :
        $mhr = $_GET['mhr1'];
        $sql.=" AND teachers.mhr <= (".implode(',',(array)$mhr).")";
    endif;

    if(isset($_GET['mhr2']) && $_GET['mhr2']!="") :
        $mhr = $_GET['mhr2'];
        $sql.=" AND teachers.mhr <= (".implode(',',(array)$mhr).")";
    endif;

    if(isset($_GET['mhr3']) && $_GET['mhr3']!="") :
        $mhr = $_GET['mhr3'];
        $sql.=" AND teachers.mhr <= (".implode(',',(array)$mhr).")";
    endif;

    if(isset($_GET['mhr4']) && $_GET['mhr4']!="") :
        $mhr = $_GET['mhr4'];
        $sql.=" AND teachers.mhr <= (".implode(',',(array)$mhr).")";
    endif;

	
	$sta = Teacher::find_by_sql($sql);
    //$rowcount=mysqli_num_rows($all_product);
	// echo $sql; exit;

    function url_clean($String)
    {
    	return str_replace('_',' ',$String); 
    }
?>

<!-- listing -->
       <div class="col-md-8">
                                  
                                    <ul class="row">

                                         <div id="result"></div> 

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
                                        <!--======= INSPECTORS TEACHER =========-->
                                         <li class="col-sm-12 col-md-4">
                                            <div class="teach">
                                                <div class="img-sec"> <img class="img-responsive" src="<?= base_url();?>uploads/images/<?= $a->pic; ?>" alt="" style="height: 210px" >  

                                                    <!--=======  TEACHER HOVER =========-->
                                                     <div class="teach-over"> <a href="<?= site_url('frontend/auth_login/teacherprofiless/'.$a->id);  ?>"><i class="fa fa-plus"></i></a> </div> 
                                                 </div>
                                                <h6><?= $a->first_name; ?></h6>
                                                <p><span> Teacher</span></p>
                                                <p><b>Nationalty:</b> <?= $a->country; ?><br>
                                                <b>ClassRoom:</b><?= $a->teachmethod; ?><br>
                                                <b>Online:</b> <?= $a->mhr; ?>/Hr Base rate.
                                                </p> 

                                                <!--======= SOCIAL ICON =========-->
                                                
                                             </div> 
                                        </li> 
                                        <?php endforeach; ?>
                                        
                                    </ul>
                                    
                                </div>
       <!-- <div class="container" id="pagination"> -->
              <?php //echo $pagination; ?>
<!-- <div id="postData"></div> -->
             
                  
                                </div> 
                              </div>
                              