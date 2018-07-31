<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Paypal1 extends CI_Controller
{
   public $live = "https://api.paypal.com/v1/";

   public  $sandbox ="https://api.sandbox.paypal.com/v1/";

    function  __construct()
    {
        parent::__construct();
        $this->load->model('paypal_model', 'paypal');
        $this->load->library(array('ion_auth',  'session','cart'));
        $this->load->helper(array('url', 'language','file','cookie'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        // paypal credentials
        $this->config->load('paypal');


   }


   public function index(){

        $data  = array('success'=> false,'message' =>array());

      
        
        


             $user = $this->ion_auth->user()->row();
              
             $indi =      $user->id;

                    $points =  json_decode($this->input->post('points'));

                    
           
       
                       $Total           = $points->data->transactions[0]->amount->total;
                       $Subtotal        = $points->data->transactions[0]->related_resources[0]->sale->amount->details->subtotal;
                       $Tax             = "0";
                       $PaymentMethod   = $points->data->payer->payment_method;
                       $PayerStatus     = $points->data->payer->status;
                       $PayerMail       = $points->data->payer->payer_info->email;
                       $saleId          = $points->data->transactions[0]->related_resources[0]->sale->id;
                       $CreateTime      = $points->data->create_time;  
                       $UpdateTime      = $points->data->transactions[0]->related_resources[0]->sale->update_time;
                       $State           = $points->data->transactions[0]->related_resources[0]->sale->state;
                       $cust_id         = $user->id; 
                       $payment_id      = $points->data->id;

                       $arraydata =  [

                       'Total'             => $points->data->transactions[0]->amount->total,
                       'Subtotal'          => $points->data->transactions[0]->related_resources[0]->sale->amount->details->subtotal,
                       'Tax'               => "0",
                       'PaymentMethod'     => $points->data->payer->payment_method,
                       'PayerStatus'       => $points->data->payer->status,
                       'PayerMail'         => $points->data->payer->payer_info->email,
                       'saleId'            => $points->data->transactions[0]->related_resources[0]->sale->id,
                       'CreateTime'        => $points->data->create_time,  
                       'UpdateTime'        => $points->data->transactions[0]->related_resources[0]->sale->update_time,
                       'State'             => $points->data->transactions[0]->related_resources[0]->sale->state,
                       'cust_id'           => $user->id, 
                       'payment_id'        => $points->data->id
                           ];

                       $this->session->set_userdata($arraydata);

                     
                       
                       // $Total             = $points->data->transactions[0]->amount->total;
                       // $Subtotal           = $points->data->transactions[0]->related_resources[0]->sale->amount->details->subtotal;
                       // $Tax                = "0";
                       // $PaymentMethod      = $points->data->payer->payment_method;
                       // $PayerStatus        = $points->data->payer->status;
                       // $PayerMail          = $points->data->payer->payer_info->email;
                       // $saleId             = $points->data->transactions[0]->related_resources[0]->sale->id;
                       // $CreateTime         = $points->data->create_time ; 
                       // $UpdateTime         = $points->data->transactions[0]->related_resources[0]->sale->update_time;
                       // $State              = $points->data->transactions[0]->related_resources[0]->sale->state;
                       // $cust_id            = $user->id; 
                       // $payment_id         = $points->data->id;
                        
                        
                      
                       set_cookie('t_id',$this->uri->segment(3),time()+3600);


                      
                       set_cookie('Total',$Total,time()+40);
                       set_cookie('Subtotal',$Subtotal,time()+40);
                       set_cookie('Tax',$Tax,time()+40);
                       set_cookie('PaymentMethod',$PaymentMethod,time()+40);
                       set_cookie('PayerStatus',$PayerStatus,time()+40);
                       set_cookie('PayerMail',$PayerMail,time()+40);
                       set_cookie('saleId',$saleId,time()+40);
                       set_cookie('CreateTime',$CreateTime,time()+40);
                       set_cookie('UpdateTime',$UpdateTime,time()+40);
                       set_cookie('State',$State,time()+40);
                       set_cookie('cust_id',$cust_id,time()+40);
                       set_cookie('payment_id',$payment_id,time()+40);

                               
                   
                       
                      
          $point =      $this->paypal->create($Total,$Subtotal,$Tax,$PaymentMethod,$PayerStatus,$PayerMail,$saleId,$CreateTime,$UpdateTime,$State,$cust_id,$payment_id);

            // $updat =  $this->db->insert('certificates',$data);

            if ($point ==TRUE) 
            {
               
                 

                
                 $data['success'] = true;
                 $data['session'] = $arraydata;
                 
                  

                   
                   

                     
                   // $this->session->unset_userdata($array_items);

            } 
            else 
            {

                $data['success'] = "failed to update";
            }
            
         

        
         echo json_encode($data);    

    }

    
}

 
    
          

