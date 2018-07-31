<style type="text/css">
    input[type=range] {
  -webkit-appearance: none;
  margin: 18px 0;
  width: 100%;
}
input[type=range]:focus {
  outline: none;
}
input[type=range]::-webkit-slider-runnable-track {
  width: 100%;
  height: 8.4px;
  cursor: pointer;
  animate: 0.2s;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  background: #047fff;
  border-radius: 1.3px;
  border: 0.2px solid #010101;
}
input[type=range]::-webkit-slider-thumb {
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  border: 1px solid #000000;
  height: 36px;
  width: 16px;
  border-radius: 3px;
  background: #ffffff;
  cursor: pointer;
  -webkit-appearance: none;
  margin-top: -14px;
}
input[type=range]:focus::-webkit-slider-runnable-track {
  background: #047fff;
}
input[type=range]::-moz-range-track {
  width: 100%;
  height: 8.4px;
  cursor: pointer;
  animate: 0.2s;
  
  background: #047fff;
  border-radius: 1.3px;
  border: 0.2px solid #010101;
}
input[type=range]::-moz-range-thumb {
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  border: 1px solid #000000;
  height: 36px;
  width: 16px;
  border-radius: 3px;
  background: #ffffff;
  cursor: pointer;
}
input[type=range]::-ms-track {
  width: 100%;
  height: 8.4px;
  cursor: pointer;
  animate: 0.2s;
  background: transparent;
  border-color: transparent;
  border-width: 16px 0;
  color: transparent;
}
input[type=range]::-ms-fill-lower {
  background: #047fff;
  border: 0.2px solid #010101;
  border-radius: 2.6px;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
}
input[type=range]::-ms-fill-upper {
  background: #047fff;
  border: 0.2px solid #010101;
  border-radius: 2.6px;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
}
input[type=range]::-ms-thumb {
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  border: 1px solid #000000;
  height: 36px;
  width: 16px;
  border-radius: 3px;
  background: #ffffff;
  cursor: pointer;
}
input[type=range]:focus::-ms-fill-lower {
  background: #047fff;
}
input[type=range]:focus::-ms-fill-upper {
  background: #047fff;
}
</style>

            <!--======= CONTENT START =========-->
            


<?php //echo $this->uri->segment(4); ?>

                <!--======= INTRESTED =========-->
                <section class="courses" style="padding: 15px 0;">
                    <div class="container"> 
                        <!--======= TITTLE =========-->
                        <div class="tittle">
                            <h3><?php if(($this->uri->segment(4) == "English") || (isset($_GET['teachlab']) && in_array('english', $_GET['teachlab']))){ echo "English";} 
                                      elseif(($this->uri->segment(4) == "Spanish") || (isset($_GET['teachlab']) && in_array('spanish', $_GET['teachlab']))){ echo "Spanish";}
                                      elseif(($this->uri->segment(4) == "French") || (isset($_GET['teachlab']) && in_array('french', $_GET['teachlab']))){ echo "French";}
                                      elseif(($this->uri->segment(4) == "Chinese") || (isset($_GET['teachlab']) && in_array('chinese', $_GET['teachlab']))){ echo "Chinese";}
                                      elseif(($this->uri->segment(4) == "Maths") ||isset($_GET['teachsub']) && in_array('maths', $_GET['teachsub'])){ echo "Maths";}
                                      elseif(($this->uri->segment(4) == "Physics") ||isset($_GET['teachsub']) && in_array('physics', $_GET['teachsub'])){ echo "Physics";}
                                      elseif(($this->uri->segment(4) == "Chemistry") ||isset($_GET['teachsub']) && in_array('chemistry', $_GET['teachsub'])){ echo "Chemistry";}
                                      elseif(($this->uri->segment(4) == "Computer") ||isset($_GET['teachsub']) && in_array('Computer Science', $_GET['teachsub'])){ echo "Computer";}
                                      else{ echo "Search";}
                                       ?> Teachers  </h3>
                            
                            <hr>
                        </div>
                       

                        <!--======= MONTH TITTLE =========-->
                      

                        <!--======= RODUCTS =========-->
                        <div class="container">
                            <!-- <h5 class="text-center">Total Number Of Teachers Registered Yesterday Is 0</h5> -->
                            
                            <h6 class="pull-right">Total Records- <?= $total_record;?>
                            </h6>
                        </div>
                <section class="inspectors" style="padding: 15px 0;"> 

                            <!--======= PRODUCTS ROW =========-->
                            
                          <div class="row">
                              <div class="col-md-4">
                                  <div class=" col-md-12">
                                    
                                        <div class="row">


                                            

                                            <div class="col-xs-12 col-sm-12  col-md-12">

                                                <ul class="list-group">


                                                    

                                                    <li class="row">
                                                        <div class="col-md-8">
                                                        <b style="font-size: large;">Search Box</b>
                                                        <hr style="height: 5px; background-color: #0096ff; margin-left: 0; margin-top: 1px;" >
                                                        </div>
                                                        <div class="col-md-12">
                                                            <?php echo form_open("frontend/auth_login/search_teacher_list");?>
                                                              <div class="input-group">
                                                                <input id="search" type="text" class="form-control" name="teachSearch" placeholder="Search">
                                                                <span class="input-group-addon"><button class="btn-link" type="submit"><i class="fa fa-search"></i></button></span>
                                                              </div>
                                                            </form> 
                                                        </div>


                                                    </li>
                                                    <hr style="width: 90%;">



                                                    <li class="row"><div class="col-md-8" id="slider16">
                                                        <b style="font-size: large;">Gender</b>
                                                        <hr style="height: 5px; background-color: #0096ff; margin-left: 0; margin-top: 1px;" >
                                                        </div>
                                                        <div class="col-md-12">
  <?php echo form_open('frontend/auth_login/search_teacher_list',array('id'=>'form1','method'=>'get'));?>

   

<label class="checkbox-inline" style="background-color: transparent;"><input type="checkbox" name="gender[]"   value="" class="checkbox1" <?php if(isset($_GET['gender']) && in_array('', $_GET['gender'])   ){echo "checked";} ?>>All</label>
<label class="checkbox-inline" style="background-color: transparent;"><input type="checkbox" name="gender[]" value="male" class="checkbox1" <?php if(isset($_GET['gender']) && in_array('male', $_GET['gender'])   ){echo "checked";} ?>>Male</label>
<label class="checkbox-inline" style="background-color: transparent;"><input type="checkbox" name="gender[]" value="female" class="checkbox1" <?php if(isset($_GET['gender']) && in_array('female', $_GET['gender'])   ){echo "checked";} ?>>Female</label>
 

                                                        </div></li>
                                                    <hr style="width: 90%;">


                                                    <li class="row"><div class="col-md-8" id="slider15">
                                                        <b style="font-size: large;">Subject</b>
                                                        <hr style="height: 5px; background-color: #0096ff; margin-left: 0; margin-top: 1px;" >
                                                        </div>
                                                        <div class="col-md-12">
  

   
<div class="checkbox"><label  style="background-color: transparent;"><input type="checkbox" name="teachsub[]"   value="maths" class="checkbox1" <?php if(($this->uri->segment(4) == "Maths") || isset($_GET['teachsub']) && in_array('maths', $_GET['teachsub'])   ){echo "checked";} ?>>Maths</label></div>
<div class="checkbox"><label  style="background-color: transparent;"><input type="checkbox" name="teachsub[]"   value="physics" class="checkbox1" <?php if(($this->uri->segment(4) == "Physics") || isset($_GET['teachsub']) && in_array('physics', $_GET['teachsub'])   ){echo "checked";} ?>>Physics</label></div>
<div class="checkbox"><label  style="background-color: transparent;"><input type="checkbox" name="teachsub[]"   value="chemistry" class="checkbox1" <?php if(($this->uri->segment(4) == "Chemistry") || isset($_GET['teachsub']) && in_array('chemistry', $_GET['teachsub'])   ){echo "checked";} ?>>Chemistry</label></div>
<div class="checkbox"><label  style="background-color: transparent;"><input type="checkbox" name="teachsub[]"   value="Computer Science" class="checkbox1" <?php if(($this->uri->segment(4) == "Computer") || isset($_GET['teachsub']) && in_array('Computer Science', $_GET['teachsub'])   ){echo "checked";} ?>>Computer Science</label></div>

 

                                                        </div></li>
                                                    <hr style="width: 90%;">

                                                    <li class="row"><div class="col-md-8" id="slider14">
                                                        <b style="font-size: large;">Language</b>
                                                        <hr style="height: 5px; background-color: #0096ff; margin-left: 0; margin-top: 1px;" >
                                                        </div>
                                                        <div class="col-md-12" >
  

   
<div class="checkbox"><label  style="background-color: transparent;"><input type="checkbox" name="teachlab[]"   value="english" class="checkbox1" <?php if(($this->uri->segment(4) == "English") ||  isset($_GET['teachlab']) && in_array('english', $_GET['teachlab'])   ){echo "checked";} ?>>English</label></div>
<div class="checkbox"><label  style="background-color: transparent;"><input type="checkbox" name="teachlab[]"   value="spanish" class="checkbox1" <?php if(($this->uri->segment(4) == "Spanish") || isset($_GET['teachlab']) && in_array('spanish', $_GET['teachlab'])   ){echo "checked";} ?>>Spanish</label></div>
<div class="checkbox"><label  style="background-color: transparent;"><input type="checkbox" name="teachlab[]"   value="french" class="checkbox1" <?php if(  ($this->uri->segment(4) == "French") || isset($_GET['teachlab']) && in_array('french', $_GET['teachlab'])   ){echo "checked";} ?>>French</label></div>
<div class="checkbox"><label  style="background-color: transparent;"><input type="checkbox" name="teachlab[]"   value="chinese" class="checkbox1" <?php if( ($this->uri->segment(4) == "Chinese") || isset($_GET['teachlab']) && in_array('chinese', $_GET['teachlab'])   ){echo "checked";} ?>>Chinese</label></div>



                                                        </div></li>
                                                    <hr style="width: 90%;">

                                                    <li class="row"><div class="col-md-8" id="slider13">
                                                        <b style="font-size: large;">Nationalty</b>
                                                        <hr style="height: 5px; background-color: #0096ff; margin-left: 0; margin-top: 1px;" >
                                                        </div>

                                                        <div class="col-md-11" style="height: 300px; overflow: scroll;overflow-x: hidden">




<div class="checkbox" ><label  style="background-color: transparent;"><input type="checkbox" name="country[]" value="" class="checkbox1" <?php if(isset($_GET['country']) && in_array('', $_GET['country'])   ){echo "checked";} ?>>All </label></div>

 <?php $country = Countr::all();?>
 <?php foreach($country as $c): ?>

   
<div class="checkbox" ><label  style="background-color: transparent;"><input type="checkbox" name="country[]" value="<?= $c->country_name?>" class="checkbox1" <?php if(isset($_GET['country']) && in_array($c->country_name, $_GET['country'])   ){echo "checked";} ?>><?= $c->country_name?></label></div>

<? endforeach ; ?>





 <!-- <script type="text/javascript">  
        $(function(){
         $('.checkbox3').on('change',function(){
            $('#form3').submit();
            });
        });
    </script>    -->                                                       
    <?//php  form_close(); ?>                                                     </div></li>
                                                    <hr style="width: 90%;">



                                                    <li class="row"><div class="col-md-8">
                                                        <b style="font-size: large;">Level</b>
                                                        <hr style="height: 5px; background-color: #0096ff; margin-left: 0; margin-top: 1px;" >
                                                        </div>
                                                        <div class="col-md-12" id="slider12">
  
   

<div class="checkbox" ><label  style="background-color: transparent;"><input type="checkbox" name="level[]"   value="" class="checkbox1" <?php if(isset($_GET['level']) && in_array('', $_GET['level'])   ){echo "checked";} ?>>All</label></div>
<div class="checkbox"><label  style="background-color: transparent;"><input type="checkbox" name="level[]" value="Beginner" class="checkbox1" <?php if(isset($_GET['level']) && in_array('Beginner', $_GET['level'])   ){echo "checked";} ?>>Beginner</label></div>
<div class="checkbox"><label  style="background-color: transparent;"><input type="checkbox" name="level[]" value="Upper Beginner" class="checkbox1" <?php if(isset($_GET['level']) && in_array('Upper Beginner', $_GET['level'])   ){echo "checked";} ?>>Upper Beginner</label></div>
<div class="checkbox"><label  style="background-color: transparent;"><input type="checkbox" name="level[]" value="Intermediate" class="checkbox1" <?php if(isset($_GET['level']) && in_array('Intermediate', $_GET['level'])   ){echo "checked";} ?>>Intermediate</label></div>
<div class="checkbox"><label  style="background-color: transparent;"><input type="checkbox" name="level[]" value="Upper Intermediate" class="checkbox1" <?php if(isset($_GET['level']) && in_array('Upper Intermediate', $_GET['level'])   ){echo "checked";} ?>>Upper Intermediate</label></div>
<div class="checkbox"><label  style="background-color: transparent;"><input type="checkbox" name="level[]" value="Advanced" class="checkbox1" <?php if(isset($_GET['level']) && in_array('Advanced', $_GET['level'])   ){echo "checked";} ?>>Advanced</label></div>
<div class="checkbox"><label  style="background-color: transparent;"><input type="checkbox" name="level[]" value="Upper Advanced" class="checkbox1" <?php if(isset($_GET['level']) && in_array('Upper Advanced', $_GET['level'])   ){echo "checked";} ?>>Upper Advanced</label></div>
<div class="checkbox"><label  style="background-color: transparent;"><input type="checkbox" name="level[]" value="Business" class="checkbox1" <?php if(isset($_GET['level']) && in_array('Business', $_GET['level'])   ){echo "checked";} ?>>Business</label></div>
<div class="checkbox"><label  style="background-color: transparent;"><input type="checkbox" name="level[]" value="International Certificate" class="checkbox1" <?php if(isset($_GET['level']) && in_array('International Certificate', $_GET['level'])   ){echo "checked";} ?>>International Certificate</label></div>


 

                                                        </div></li>

                                                    <li class="row"><div class="col-md-8">
                                                        <b style="font-size: large;">Hourly Rate</b>
                                                        <hr style="height: 5px; background-color: #0096ff; margin-left: 0; margin-top: 1px;" >
                                                        </div>
                                                        <div class="col-md-12">

<div class="checkbox" id="slider11"><label  style="background-color: transparent;">

<!-- 
  <input autocomplete="off" type="range" min="1" max="100"  value="100 " name="price"  class="checkbox1"  id="myRange" class="slider" ></label> -->


 <div class="radio"><label  style="background-color: transparent;"> <input type="radio" name="price" value="" class="checkbox1"> All</label></div>
  <div class="radio"><label  style="background-color: transparent;"><input type="radio" name="price" value="10" class="checkbox1" <?php if(isset($_GET['price']) && ( $_GET['price'] == 10 )   ){echo "checked";} ?>>Under  10</label></div>
  <div class="radio"><label  style="background-color: transparent;"><input type="radio" name="price" value="20" class="checkbox1"<?php if(isset($_GET['price']) && ( $_GET['price'] == 20 )   ){echo "checked";} ?>>Under  20</label></div>
  <div class="radio"><label  style="background-color: transparent;"><input type="radio" name="price" value="30" class="checkbox1"<?php if(isset($_GET['price']) && ( $_GET['price'] == 30 )   ){echo "checked";} ?>>Under  30</label></div>
  <div class="radio"><label  style="background-color: transparent;"><input type="radio" name="price" value="40" class="checkbox1"<?php if(isset($_GET['price']) && ( $_GET['price'] == 40 )   ){echo "checked";} ?>>Under  40</label></div>
  <div class="radio"><label  style="background-color: transparent;"><input type="radio" name="price" value="50" class="checkbox1"<?php if(isset($_GET['price']) && ( $_GET['price'] == 50 )   ){echo "checked";} ?>>Under  50</label></div>
  






</div>

                                                            

  <script type="text/javascript">  
        $(function(){
         $('.checkbox1').on('change',function(){
            $('#form1').submit();
            });
        });
    </script> 

<script type="text/javascript">
  

;(function($){
  
    /**
     * Store scroll position for and set it after reload
     *
     * @return {boolean} [loacalStorage is available]
     */
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
        $('#slider11').scrollPosReaload();
        $('#slider12').scrollPosReaload();
        $('#slider13').scrollPosReaload();
        $('#slider14').scrollPosReaload();
        $('#slider15').scrollPosReaload();
        $('#slider16').scrollPosReaload();
    });
  
}(jQuery));  





</script>

    <script type="text/javascript">
      
var slider = document.getElementById("myRange");
var output = document.getElementById("demo123");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}



    </script>

   
<!--  </form>  --><? echo form_close(); ?>                                                           
                                                        </div></li>
                                                </ul>
                                            </div>
                                        </div>                                  
                                  </div>
                              </div>

                              
                            
                               <div class="col-md-8">

                                 <ul class="row items">


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


                    <li class="col-xs-6 col-sm-4 col-md-3 item course student  meeting" >

                      <div class="port-over" style="height: 233px"> 

                        <!--======= IMAGE =========--> 
                        <img class="img-responsive" src="<?= base_url();?>uploads/images/<?= $a->pic; ?>" alt="" style="height: 163px">
                        <div class="pro-info"> 
                          <div class="cate-name" >
                           <span class="pull-left" style="padding-left: 10px;"><?php if($a->first_name == ''){ echo $a->username;}else{echo $a->first_name;}  ?></span><br>
                           <ul class="stars pull-left" style="padding-left: 10px;">
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
                          Name: <?php if($a->first_name == ''){ echo $a->username;}else{echo $a->first_name;}  ?><br>
                          Experience: <?= $a->experiance; ?><br>
                          Nationalty: <?= $a->country; ?><br>
                          Online: <?= $a->mhri; ?>/Hr Base rate.<br>
                          <!--======= POP UP IMAGE =========-->

                          <!--======= HEART =========--> 
                          <a href="<?= site_url('calenderview/teachersdetail/'.$a->id);  ?>" class="btn btn-danger btn-xs">detail</a>
                        </div>     
                      </div>
                    </li>
                  <?php endforeach; ?>


                                 </ul>
     
                                    
                                </div>
    
              <?php echo $pagination; ?>

             
                  
                                </div> 
                              </div>

                  
                 </section>

             </div>
         </section>









                <!--======= QUOTE =========-->
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>


                <script type="text/javascript">

    $(document).ready(function () {

        $( "input[type=checkbox]" ).on( 'click', function(){




            //console.log($(this).serialize());

            //var values = $('#form1').serialize();
            var values = $('form').serialize();

            


            $.ajax({
                type: "POST",
                url: '<php echo base_url(); ?>frontend/auth_login/search_teacher_list_ajax',
                data: values,
                complete: function (data) {
                    //alert(data.responseText);
                    $('#result').empty().html(data.responseText)
                    //console.log(data.responseText);
                }
            });


        } );


        $('#gender,#city').on('change', function () {
            //var values = $('#form1').serialize();
            var values = $('form').serialize();

        

            //console.log(myurl);

            $.ajax({
                type: "POST",
                url: '<php echo base_url(); ?>frontend/auth_login/search_teacher_list_ajax',
                data: values,
                complete: function (data) {
                   //alert(data.responseText);
                    $('#result').empty().html(data.responseText)
                }
            });
        })
    });
</script>


  <script type="text/javascript">

        $( "input[type=checkbox]" ).on( 'click', function(){

    alert('test');
    var values = $('#formfilter').serialize();
    alert(values);

     $.ajax({
        type:"post",
        url:'<= site_url('frontend/auth_login/teacher_list'); ?>',
        data:values,
         dataType:'html',
        success:function(data){
           //alert(data);
           $("#show").html(data);
        },
    }); 
 });
  </script>