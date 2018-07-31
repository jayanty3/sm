 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		
		parent::__construct();

        $this->load->config('ion_auth', true);
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation', 'upload', 'pagination', 'session','cart'));
        $this->load->helper(array('url', 'language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');

        
	}

	public function index()
	{
		
		if (!$this->ion_auth->logged_in())
    	 {
			$this->data['title']= 'Home';
			
			 redirect('home', 'refresh');
		 }
		else
		{
			$this->data['title']= 'Home';
			
			redirect('home', 'refresh');
		}
		
		
	}


public function policy()
	{
		$this->data['title']= 'Home|Privacy Policy';
		
		$this->template->load('frontend/front_end','frontend/policy',$this->data);
	}

	public function terms()
	{
		$this->data['title']= 'Home|Terms';
		
		$this->template->load('frontend/front_end','frontend/terms',$this->data);
	}
	

	
	

	public function policys()
	{
		$this->data['title']= 'Home|Privacy Policy';
		
		$this->template->load('frontend/front_login_user_end','frontend/policy',$this->data);
	}

	public function termss()
	{
		$this->data['title']= 'Home|Terms';
		
		$this->template->load('frontend/front_login_user_end','frontend/terms',$this->data);
	}
	
    
    public function page()
	{
		$this->data['title']= 'Home|Login';
		
		$this->template->load('frontend/front_end','frontend/before_login_teacher-list',$this->data);
	}
	public function register()
	{
		$this->data['title']= 'Home|Register';
		
		$this->template->load('frontend/front_end','frontend/register',$this->data);
	}
	public function become_teacher()
	{
		$this->data['title']= 'Home|Become Teacher';
		
		$this->template->load('frontend/front_end','frontend/become_teacher',$this->data);
	}
	public function contact()
	{

		if (!$this->ion_auth->logged_in())
    	 {
    			$this->data['title']= 'Home|contact';
		
		        $this->template->load('frontend/front_end','frontend/contact',$this->data);
    	 }
    	else
	    	{
	    		
    	 
    			$this->data['title']= 'Home|contact';
		
		        $this->template->load('frontend/front_login_user_end','frontend/contact',$this->data);
    	 
	    	}
		
	}
public function about()
	{
		if (!$this->ion_auth->logged_in())
    	 {
			$this->data['title']= 'Home|about';
			
			$this->template->load('frontend/front_end','frontend/about_us',$this->data);
		}
		else
	    	{
	    		
    	 
    			$this->data['title']= 'Home|about';
		
		        $this->template->load('frontend/front_login_user_end','frontend/about_us',$this->data);
    	 
	    	}
	}

	public function faq()
	{
		if (!$this->ion_auth->logged_in())
    	 {
			$this->data['title']= 'Home|FAQ';
			
			$this->template->load('frontend/front_end','frontend/faq',$this->data);
		 }
		else
		{
			$this->data['title']= 'Home|FAQ';
			
			$this->template->load('frontend/front_login_user_end','frontend/faq',$this->data);
		}
	}

	public function how_works()
	{
		if (!$this->ion_auth->logged_in())
    	 {
			$this->data['title']= 'Home|Works';
			
			$this->template->load('frontend/front_end','frontend/how-it-work',$this->data);
		 }
		else
		{
			$this->data['title']= 'Home|Works';
			
			$this->template->load('frontend/front_login_user_end','frontend/how-it-work',$this->data);
		}
	}

public function price()
	{
		if (!$this->ion_auth->logged_in())
    	 {
			$this->data['title']= 'Home|Works';
			
			$this->template->load('frontend/front_end','frontend/pricing-indi',$this->data);
		 }
		else
		{
			$this->data['title']= 'Home|Works';
			
			$this->template->load('frontend/front_login_user_end','frontend/pricing-indi',$this->data);
		}
	}


public function teachers()
	{
		$this->data['title']= 'Home|Teachers';
		
		$this->template->load('frontend/front_login_user_end','frontend/calendar',$this->data);
	}

public function students()
	{
		$this->data['title']= 'Home|students';
		
		$this->template->load('frontend/front_end','frontend/student',$this->data);
	}


public function calender()
{
    if (!$this->ion_auth->logged_in())
    	 {
			$this->data['title']= 'Home|FAQ';
			
			$this->template->load('frontend/front_end','frontend/home',$this->data);
		 }

		else
		
	    {
		$this->data['title']= 'Home|calender';

		 redirect('calender','refresh');

		}

}

}

?>