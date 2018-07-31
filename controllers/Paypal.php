<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Paypal extends CI_Controller
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

 
    
          

