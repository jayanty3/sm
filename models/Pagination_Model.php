<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagination_Model extends CI_Model {
function __construct() {
parent::__construct();
}
public function record_count() {
      return $this->db->count_all("teachers");
}

public function fetch_data($id) {
      $this->db->select('*');
      // $this->db->from('teachers');
      $this->db->where('teachers.user_id', $id);
      $this->db->join('users', 'teachers.user_id = users.id','inner');
      // if ($keyword)
      // {
      //    $where = "( teachers.lang1 LIKE '$keyword' OR teachers.teachmethod LIKE '$keyword' OR teachers.country LIKE '$keyword' OR teachers.mhri LIKE '$keyword' OR users.gender LIKE '$keyword')";
      //    $this->db->where($where);

      // }
      // $this->db->limit($limit);
      $query = $this->db->get('teachers');
      if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
      $data[] = $row;
      }

      return $data;
      }
      return false;
}

 function get_data($limit, $start, $st = NULL)
    {
        if ($st == "NIL") $st = "";
        // $sql = "select * from tbl_books where name like '%$st%' limit " . $start . ", " . $limit;
            $this->db->select('*');
      // $this->db->where('teachers.user_id', $id);
      $where = "( (teachers.lang1 LIKE '%$st%' OR teachers.subject LIKE '%$st%') AND (teachers.fee = 'appear home page ') AND (users.active = '1'))";
        $this->db->where($where);
      $this->db->join('users', 'teachers.user_id = users.id','inner');
      
      $this->db->limit($limit,$start);
      $query = $this->db->get('teachers');
//echo $this->db->last_query();die;
        
        return $query->result();
    }
    
    function get_data_count($st = NULL)
    {
        if ($st == "NIL") $st = "";
        $this->db->select('*');
      $where = "( (teachers.lang1 LIKE '%$st%' OR teachers.subject LIKE '%$st%') AND (teachers.fee = 'appear home page ') AND (users.active = '1'))";
        $this->db->where($where);
      $this->db->join('users', 'teachers.user_id = users.id','inner');
      $query = $this->db->get('teachers');
        return $query->num_rows();
    }



    function get_teacherdata($limit, $start, $st = NULL)
    {
       
    
          
       
        $this->db->select('*');

        $sql= " users.active = '1' "; 

        if ($st == "NIL") $st = ""; 

        else{

       $sql.=" AND (users.last_name LIKE '%$st%' OR users.first_name LIKE '%$st%' OR teachers.lang1 LIKE '%$st%' OR teachers.subject LIKE '%$st%'  OR teachers.country LIKE '%$st%' OR teachers.mhri LIKE '%$st%' OR  users.gender LIKE '%$st%' OR teachers.level LIKE '%$st%')";
    }

    
if(isset($_GET['gender']) && in_array('', $_GET['gender'])   )
          {
            $sql.=" AND users.gender != '' ";
          } 


    
        else
        {
               if(isset($_GET['gender']))
               {
                  $gender1 = $_GET['gender'];

                //print_r($country1);
                 //$country1 = $_GET['country[]'];
                  $gender =  implode('","', $gender1);
                  $sql.=' AND (users.gender IN ("'.$gender.'") )';
               }
                
           
        }



        if(isset($_GET['teachlab']) && in_array('', $_GET['teachlab'])   )
          {
            $sql.=" AND teachers.lang1 != '' ";
          } 


    
        else
        {
               if(isset($_GET['teachlab']))
               {
                  $teachlab1 = $_GET['teachlab'];

                //print_r($country1);
                 //$country1 = $_GET['country[]'];
                $teachlab =  implode('","', $teachlab1);

               // print_r($gender);


                $sql.=' AND (teachers.lang1 IN ("'.$teachlab.'") )';
               }
                
           
        }



         if(isset($_GET['teachsub']) && in_array('', $_GET['teachsub'])   )
          {
            $sql.=" AND teachers.subject != '' ";
          } 


    
        else
        {
               if(isset($_GET['teachsub']))
               {
                  $teachsub1 = $_GET['teachsub'];

                //print_r($country1);
                 //$country1 = $_GET['country[]'];
                $teachsub =  implode('","', $teachsub1);

               // print_r($gender);


                $sql.=' AND (teachers.subject IN ("'.$teachsub.'") )';
               }
                
           
        }


      
        if(isset($_GET['country']) && in_array('', $_GET['country']))
          {
               $sql.=" AND teachers.country != '' ";
          } 


    
        else
        {

            if(isset($_GET['country']))
               {
             
                $country1 = $_GET['country'];

                //print_r($country1);
                 //$country1 = $_GET['country[]'];
                $country =  implode('","', $country1);

               // print_r($country);


                $sql.=' AND (teachers.country IN ("'.$country.'") )';
             }
        }

   
   // if(isset($_GET['price']) && in_array('', $_GET['price'])   )
   //        {
   //          $sql.=" AND teachers.mhri != '' ";
   //        } 


    
   //      else
   //      {

   //          if(isset($_GET['price']))
   //             {
             
                
   //              $one = 1;

   //             // print_r($country);


   //              $sql.=' AND (teachers.mhri  BETWEEN "'.$one.'" AND "'.$_GET['price'].'")' ;
   //           }
   //      }
if(isset($_GET['price']) and $_GET['price'] !=''){
          

           
                 $_GET['price'];

                   $one = 1;

               // print_r($country);


                $sql.=' AND (teachers.mhri  BETWEEN "'.$one.'" AND "'.$_GET['price'].'")' ;
             
        }

         if(isset($_GET['level']) && in_array('', $_GET['level'])   )
          {
            $sql.=" AND teachers.level != '' ";
          } 


    
        else
        {

            if(isset($_GET['level']))
               {
             
                $level1 = $_GET['level'];
                $level =  implode(',', $level1);
                $sql.=' AND (teachers.level  LIKE "%'.$level.'%" )';
             }
        }


        $this->db->where($sql);
        $this->db->join('users', 'teachers.user_id = users.id','inner');
        $this->db->limit($limit,$start);
        $query = $this->db->get('teachers');
      
    //$sql.=" LIMIT $start,$limit";
      
      //$query1 =  $this->db->query($sql);

  //echo $this->db->last_query(); die;

 
        
         return $query->result();
        
    }
    
    function get_teacherdata_count($st = NULL)
    {
        $this->db->select('*');

        $sql= " users.active = '1' "; 

        if ($st == "NIL") $st = ""; 

        else{

       $sql.=" AND (users.last_name LIKE '%$st%' OR users.first_name LIKE '%$st%' OR teachers.lang1 LIKE '%$st%' OR teachers.subject LIKE '%$st%'  OR teachers.country LIKE '%$st%' OR teachers.mhri LIKE '%$st%' OR  users.gender LIKE '%$st%' OR  teachers.level LIKE '%$st%' )";
    }
   

    
if(isset($_GET['gender']) && in_array('', $_GET['gender'])   )
          {
            $sql.=" AND users.gender != '' ";
          } 


    
        else
        {
               if(isset($_GET['gender']))
               {
                  $gender1 = $_GET['gender'];

                //print_r($country1);
                 //$country1 = $_GET['country[]'];
                $gender =  implode('","', $gender1);

               // print_r($gender);


                $sql.=' AND (users.gender IN ("'.$gender.'") )';
               }
                
           
        }



        if(isset($_GET['teachlab']) && in_array('', $_GET['teachlab'])   )
          {
            $sql.=" AND teachers.lang1 != '' ";
          } 


    
        else
        {
               if(isset($_GET['teachlab']))
               {
                  $teachlab1 = $_GET['teachlab'];

                //print_r($country1);
                 //$country1 = $_GET['country[]'];
                $teachlab =  implode('","', $teachlab1);

               // print_r($gender);


                $sql.=' AND (teachers.lang1 IN ("'.$teachlab.'") )';
               }
                
           
        }



         if(isset($_GET['teachsub']) && in_array('', $_GET['teachsub'])   )
          {
            $sql.=" AND teachers.subject != '' ";
          } 


    
        else
        {
               if(isset($_GET['teachsub']))
               {
                  $teachsub1 = $_GET['teachsub'];

                //print_r($country1);
                 //$country1 = $_GET['country[]'];
                $teachsub =  implode('","', $teachsub1);

               // print_r($gender);


                $sql.=' AND (teachers.subject IN ("'.$teachsub.'") )';
               }
                
           
        }


      
        if(isset($_GET['country']) && in_array('', $_GET['country'])   )
          {
            $sql.=" AND teachers.country != '' ";
          } 


    
        else
        {

            if(isset($_GET['country']))
               {
             
                $country1 = $_GET['country'];

                //print_r($country1);
                 //$country1 = $_GET['country[]'];
                $country =  implode('","', $country1);

               // print_r($country);


                $sql.=' AND (teachers.country IN ("'.$country.'") )';
             }
        }

   
   if(isset($_GET['price']) and $_GET['price'] !=''){
          

           
                 $_GET['price'];

                   $one = 1;

               // print_r($country);


                $sql.=' AND (teachers.mhri  BETWEEN "'.$one.'" AND "'.$_GET['price'].'")' ;
             
        }


         if(isset($_GET['level']) && in_array('', $_GET['level'])   )
          {
            $sql.=" AND teachers.level != '' ";
          } 


    
        else
        {

            if(isset($_GET['level']))
               {
             
                $level1 = $_GET['level'];

                //print_r($country1);
                 //$country1 = $_GET['country[]'];
                $level =  implode(',', $level1);

               // print_r($country);

                $sql.=' AND (teachers.level  LIKE "%'.$level.'%" )';
                //$sql.=' AND (teachers.level  IN ("'.$level.'") )';
             }
        }

        
    



        $this->db->where($sql);
       $this->db->join('users', 'teachers.user_id = users.id','inner');
      
      // $this->db->limit($limit,$start);
       $query = $this->db->get('teachers');
        return $query->num_rows();
    }


function payment_data($limit, $start,$st = NULL)
    {
        // $sql = "select * from tbl_books where name like '%$st%' limit " . $start . ", " . $limit;
        if ($st == "NIL") $st = "";
            $this->db->select('*');
      // $this->db->where('teachers.user_id', $id);
      $where = "( users.id  AND students.cust_id )";
        $this->db->where($where);
      $this->db->join('payments', 'users.id = payments.cust_id','inner');
      
      $this->db->limit($limit,$start);
      $query = $this->db->get('users');

        
        return $query->result();
    }




     public function pd()
     {
          $this->db->select('*');
      $where = "( users.id  AND payments.cust_id )";
      
        $this->db->where($where);
      $this->db->join('payments', 'users.id = payments.cust_id','inner');
      
      // $this->db->limit($limit,$start);
      $query = $this->db->get('users');
      

          return $query->result();
     }

      public function pdedit($pay_id)
     {
          $this->db->select('*');
      $where = "( payments.pay_id = $pay_id )";
        $this->db->where($where);
      $this->db->join('payments', 'users.id = payments.cust_id','inner');
      

      $query = $this->db->get('users');
          // echo $this->db->last_query(); die;

      
          return $query->result();
     }

      public function studentdata()
     {
          $this->db->select('*');
      $where = "( users.id  AND users_groups.group_id = '3' )";
        $this->db->where($where);
      $this->db->join('users_groups', 'users.id = users_groups.group_id','inner');
      
      // $this->db->limit($limit,$start);
      $query = $this->db->get('users');
          return $query->result();
     }






}





?>