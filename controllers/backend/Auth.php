<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth', 'form_validation'));
		$this->load->helper(array('url', 'language','download'));
		$this->load->model('Pagination_Model');

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
	}

	/**
	 * Redirect if needed, otherwise display the user list
	 */
	public function index()
	{

		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('backend/auth/login', 'refresh');
		}
		else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//list the users
			$this->data['users'] = $this->ion_auth->users()->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
            $this->template->load('backend/admin_front','backend/auth/index',$this->data);
			// $this->_render_page('backend/auth/index', $this->data);
		}
	}

	/**
	 * Log the user in
	 */
	public function login()
	{
		$this->data['title'] = $this->lang->line('login_heading');

		// validate form input
		$this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

		if ($this->form_validation->run() === TRUE)
		{ 	
			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool)$this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('backend/auth/page', 'refresh');
			}
			else
			{
				// if the login was un-successful
				// redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('backend/auth/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = array('name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
			);

			$this->_render_page('backend/auth/login', $this->data);
		}
	}

	/**
	 * Log the user out
	 */
	public function logout()
	{
		$this->data['title'] = "Logout";

		// log the user out
		$logout = $this->ion_auth->logout();

		// redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('backend/auth/login', 'refresh');
	}

	/**
	 * Change password
	 */
	public function change_password()
	{
		$this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
		$this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

		if (!$this->ion_auth->logged_in())
		{
			redirect('backend/auth/login', 'refresh');
		}

		$user = $this->ion_auth->user()->row();

		if ($this->form_validation->run() === FALSE)
		{
			// display the form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
			$this->data['old_password'] = array(
				'name' => 'old',
				'id' => 'old',
				'class'=>'form-control',
				'placeholder' => 'Old Password',
				'type' => 'password',
			);
			$this->data['new_password'] = array(
				'name' => 'new',
				'id' => 'new',
				'class'=>'form-control',
				'placeholder' => 'New Password',
				'type' => 'password',
				'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
			);
			$this->data['new_password_confirm'] = array(
				'name' => 'new_confirm',
				'id' => 'new_confirm',
				'class'=>'form-control',
				'placeholder' => 'Confirm Password',
				'type' => 'password',
				'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
			);
			$this->data['user_id'] = array(
				'name' => 'user_id',
				'id' => 'user_id',
				'class'=>'form-control',
				'placeholder' => 'User id',
				'type' => 'hidden',
				'value' => $user->id,
			);

			// render
			$this->template->load('backend/auth/change_password','backend/auth/change_password', $this->data);
			// $this->_render_page('backend/auth/change_password', $this->data);
		}
		else
		{
			$identity = $this->session->userdata('identity');

			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

			if ($change)
			{
				//if the password was successfully changed
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$this->logout();
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('backend/auth/change_password', 'refresh');
			}
		}
	}

	/**
	 * Forgot password
	 */
	public function forgot_password()
	{
		// setting validation rules by checking whether identity is username or email
		if ($this->config->item('identity', 'ion_auth') != 'email')
		{
			$this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
		}
		else
		{
			$this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
		}


		if ($this->form_validation->run() === FALSE)
		{
			$this->data['type'] = $this->config->item('identity', 'ion_auth');
			// setup the input
			$this->data['identity'] = array('name' => 'identity',
				'id' => 'identity',
				'class' => 'form-control',
				'placeholder' => 'Email',
			);

			if ($this->config->item('identity', 'ion_auth') != 'email')
			{
				$this->data['identity_label'] = $this->lang->line('forgot_password_identity_label');
			}
			else
			{
				$this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
			}

			// set any errors and display the form
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->template->load('backend/auth/forgot_password','backend/auth/forgot_password', $this->data);
		}
		else
		{
			$identity_column = $this->config->item('identity', 'ion_auth');
			$identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

			if (empty($identity))
			{

				if ($this->config->item('identity', 'ion_auth') != 'email')
				{
					$this->ion_auth->set_error('forgot_password_identity_not_found');
				}
				else
				{
					$this->ion_auth->set_error('forgot_password_email_not_found');
				}

				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("forgot-password", 'refresh');
			}

			// run the forgotten password method to email an activation code to the user
			//$forgotten = $this->ion_auth->forgotten_password($this->input->post('identity'));
			 $forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

			if ($forgotten)
			{
				// if there were no errors
				$this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("forgot-passwords", 'refresh');
				
				// redirect("backend/auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("forgot-password", 'refresh');
			}
		}
	}

	/**
	 * Reset password - final step for forgotten password
	 *
	 * @param string|null $code The reset code
	 */
	public function reset_password($code = NULL)
	{
		if (!$code)
		{
			show_404();
		}

		$user = $this->ion_auth->forgotten_password_check($code);

		if ($user)
		{
			// if the code is valid then display the password reset form

			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

			if ($this->form_validation->run() === FALSE)
			{
				// display the form

				// set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$this->data['new_password'] = array(
					'name' => 'new',
					'id' => 'new',
					'class'=>'form-control',
					'placeholder' => 'New Password',
					'type' => 'password',
					'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
				);
				$this->data['new_password_confirm'] = array(
					'name' => 'new_confirm',
					'id' => 'new_confirm',
					'class'=>'form-control',
					'placeholder' => 'New confirm password',
					'type' => 'password',
					'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
				);
				$this->data['user_id'] = array(
					'name' => 'user_id',
					'id' => 'user_id',
					'class'=>'form-control',
					'placeholder' => 'User Id',
					'type' => 'hidden',
					'value' => $user->id,
				);
				$this->data['csrf'] = $this->_get_csrf_nonce();
				$this->data['code'] = $code;

				// render
				
				$this->template->load('backend/auth/reset_password','backend/auth/reset_password', $this->data);
			}
			else
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id'))
				{

					// something fishy might be up
					$this->ion_auth->clear_forgotten_password_code($code);

					show_error($this->lang->line('error_csrf'));

				}
				else
				{
					// finally change the password
					$identity = $user->{$this->config->item('identity', 'ion_auth')};

					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

					if ($change)
					{
						// if the password was successfully changed
						$this->session->set_flashdata('reset11', $this->ion_auth->messages());
						redirect("home", 'refresh');
					}
					else
					{
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('reset-password/' . $code, 'refresh');
					}
				}
			}
		}
		else
		{
			// if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());

			//$this->session->set_flashdata('reset11', $this->ion_auth->errors());

			redirect("forgot-password", 'refresh');
		}
	}

	/**
	 * Activate the user
	 *
	 * @param int         $id   The user ID
	 * @param string|bool $code The activation code
	 */
	public function activate($id, $code = FALSE)
	{
		if ($code !== FALSE)
		{
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation)
		{
			// redirect them to the auth page
			$this->session->set_flashdata('message', $this->ion_auth->messages());

			$user = $this->ion_auth->user($id)->row();
			$user->email;

			require_once(APPPATH.'libraries/class.phpmailer.php');
        $mail             = new PHPMailer();
        // $body = $this->load->view('frontend/booking-invoice',$center, true);
        $body = "<h1 style='color:teal;'>Your account is active Now You can Login</h1> ";

        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->Host       = "mail.designermore.com"; // SMTP server
        $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
                                                   // 1 = errors and messages
                                                   // 2 = messages only
        $mail->SMTPAuth   = true;                  // enable SMTP authentication
        $mail->Host       = "sg2plcpnl0154.prod.sin2.secureserver.net"; // sets the SMTP server
        $mail->SMTPSecure = "tls"; 
        $mail->Port       = 587;      // set the SMTP port for the GMAIL server
        //$mail->protocol = 'mail';                  
        $mail->Username   = "contact-gfm@designermore.com"; // SMTP account username
        $mail->Password   = "a}+wP8RPD~Am";        // SMTP account password

        $mail->SetFrom('contact-gfm@gmail.com', 'Admin');

        $mail->Subject    = 'Your account active';

       

        $mail->MsgHTML($body);


        $mail->AddAddress($user->email);

        $mail->Send();




		redirect("backend/auth/page", 'refresh');
		}
		else
		{
			// redirect them to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("forgot-password", 'refresh');
		}
	}

	/**
	 * Deactivate the user
	 *
	 * @param int|string|null $id The user ID
	 */
	public function deactivate($id = NULL)
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}

		$id = (int)$id;

		$this->load->library('form_validation');
		$this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label'), 'required');
		$this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label'), 'required|alpha_numeric');

		if ($this->form_validation->run() === FALSE)
		{
			// insert csrf check
			$this->data['csrf'] = $this->_get_csrf_nonce();
			$this->data['user'] = $this->ion_auth->user($id)->row();

			$this->template->load('backend/admin_front','backend/auth/deactivate_user', $this->data);
		}
		else
		{
			// do we really want to deactivate?
			if ($this->input->post('confirm') == 'yes')
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
				{
					return show_error($this->lang->line('error_csrf'));
				}

				// do we have the right userlevel?
				if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
				{

					$user = $this->ion_auth->user($id)->row();
			      $user->email;

			require_once(APPPATH.'libraries/class.phpmailer.php');
        $mail             = new PHPMailer();
        // $body = $this->load->view('frontend/booking-invoice',$center, true);
        $body = "<h1 style='color:teal;'>Your account is deactive by Admin.  </h1> ";

        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->Host       = "mail.designermore.com"; // SMTP server
        $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
                                                   // 1 = errors and messages
                                                   // 2 = messages only
        $mail->SMTPAuth   = true;                  // enable SMTP authentication
        $mail->Host       = "sg2plcpnl0154.prod.sin2.secureserver.net"; // sets the SMTP server
        $mail->SMTPSecure = "tls"; 
        $mail->Port       = 587;      // set the SMTP port for the GMAIL server
        //$mail->protocol = 'mail';                  
        $mail->Username   = "contact-gfm@designermore.com"; // SMTP account username
        $mail->Password   = "a}+wP8RPD~Am";        // SMTP account password

        $mail->SetFrom('contact-gfm@gmail.com', 'Admin');

        $mail->Subject    = 'Your account deactive';

       

        $mail->MsgHTML($body);


        $mail->AddAddress($user->email);

        $mail->Send();


					$this->ion_auth->deactivate($id);
				}
			}

			// redirect them back to the auth page
			redirect('backend/auth/page', 'refresh');
		}
	}

	/**
	 * Create a new user
	 */
	public function create_user()
	{
		$this->data['title'] = $this->lang->line('create_user_heading');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('backend/auth/page', 'refresh');
		}

		$tables = $this->config->item('tables', 'ion_auth');
		$identity_column = $this->config->item('identity', 'ion_auth');
		$this->data['identity_column'] = $identity_column;

		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required');
		$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required');
		if ($identity_column !== 'email')
		{
			$this->form_validation->set_rules('identity', $this->lang->line('create_user_validation_identity_label'), 'required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email');
		}
		else
		{
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
		}
		$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
		$this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'trim');
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

		if ($this->form_validation->run() === TRUE)
		{
			$email = strtolower($this->input->post('email'));
			$identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
			$password = $this->input->post('password');

			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'company' => $this->input->post('company'),
				'phone' => $this->input->post('phone'),
			);
		}
		if ($this->form_validation->run() === TRUE && $this->ion_auth->register($identity, $password, $email, $additional_data))
		{
			// check to see if we are creating the user
			// redirect them back to the admin page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("backend/auth/page", 'refresh');
		}
		else
		{
			// display the create user form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['first_name'] = array(
				'name' => 'first_name',
				'id' => 'first_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('first_name'),
			);
			$this->data['last_name'] = array(
				'name' => 'last_name',
				'id' => 'last_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('last_name'),
			);
			$this->data['identity'] = array(
				'name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['email'] = array(
				'name' => 'email',
				'id' => 'email',
				'type' => 'text',
				'value' => $this->form_validation->set_value('email'),
			);
			$this->data['company'] = array(
				'name' => 'company',
				'id' => 'company',
				'type' => 'text',
				'value' => $this->form_validation->set_value('company'),
			);
			$this->data['phone'] = array(
				'name' => 'phone',
				'id' => 'phone',
				'type' => 'text',
				'value' => $this->form_validation->set_value('phone'),
			);
			$this->data['password'] = array(
				'name' => 'password',
				'id' => 'password',
				'type' => 'password',
				'value' => $this->form_validation->set_value('password'),
			);
			$this->data['password_confirm'] = array(
				'name' => 'password_confirm',
				'id' => 'password_confirm',
				'type' => 'password',
				'value' => $this->form_validation->set_value('password_confirm'),
			);

			// $this->_render_page('backend/auth/create_user', $this->data);
			$this->template->load('backend/admin_front','backend/auth/create_user',$this->data);
		}
	}
    

/**
	 * display user by id
	 *
	 * 
	 */

    public function user_by_id($id)
    {
    	$this->data['title'] = 'user by id';

		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('backend/auth/page', 'refresh');
		}

		$user = $this->ion_auth->user($id)->row();
		$groups = $this->ion_auth->groups()->result_array();
		$currentGroups = $this->ion_auth->get_users_groups($id)->result();

		$this->template->load('backend/admin_front','backend/auth', $this->data);

    }



	/**
	 * Edit a user
	 *
	 * @param int|string $id
	 */
	public function edit_user($id)
	{
		$this->data['title'] = $this->lang->line('edit_user_heading');

		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('backend/auth/page', 'refresh');
		}

		$user = $this->ion_auth->user($id)->row();
		$groups = $this->ion_auth->groups()->result_array();
		$currentGroups = $this->ion_auth->get_users_groups($id)->result();

		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required');
		// $this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required');
		// $this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'required');

		if (isset($_POST) && !empty($_POST))
		{
			// do we have a valid request?
			if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
			{
				show_error($this->lang->line('error_csrf'));
			}

			// update the password if it was posted
			// if ($this->input->post('password'))
			// {
			// 	$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
			// 	$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
			// }

			if ($this->form_validation->run() === TRUE)
			{
				$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					// 'company' => $this->input->post('company'),
					// 'phone' => $this->input->post('phone'),
				);

				// update the password if it was posted
				if ($this->input->post('password'))
				{
					$data['password'] = $this->input->post('password');
				}

				// Only allow updating groups if user is admin
				// if ($this->ion_auth->is_admin())
				// {
				// 	// Update the groups user belongs to
				// 	$groupData = $this->input->post('groups');

				// 	if (isset($groupData) && !empty($groupData))
				// 	{

				// 		$this->ion_auth->remove_from_group('', $id);

				// 		foreach ($groupData as $grp)
				// 		{
				// 			$this->ion_auth->add_to_group($grp, $id);
				// 		}

				// 	}
				// }

				// check to see if we are updating the user
				if ($this->ion_auth->update($user->id, $data))
				{
					// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					if ($this->ion_auth->is_admin())
					{

							require_once(APPPATH.'libraries/class.phpmailer.php');
            $mail             = new PHPMailer();

             $body= /*-----------email body starts-----------*/

             '<table width="100%" cellpadding="0" cellspacing="0">
             <tbody>
             <tr>
             <td valign="top">
             <table width="100%" cellpadding="0" cellspacing="0">
             <tbody>
             <tr>
             <td valign="top">
             <table width="100%" cellpadding="30">
             <tbody>
             <tr>
             <td align="center">
             <table width="600" bgcolor="#FFFFFF" cellpadding="15" cellspacing="0" id="nzInnerTable" border="0" style="border: 1px solid #FFFFFF;">
             <tbody>
             <tr>
             <td>
             <table width="100%" cellspacing="0" cellpadding="0" style="padding: 0px; padding-top: 0px; padding-bottom: 15px;">
             <tbody>
             <tr>
             <td>
             <table width="100%" cellpadding="10" cellspacing="0" style="">
             <tbody>
             <tr>
             <td bgcolor="">
             <div id="txtHolder-2" class="txtEditorClass" style="color: #1de81a; font-size: 22px; font-family: "Helvetica"; text-align: Left">
             <font style="font-size: -webkit-xxx-large; font-family: &quot;Trebuchet MS&quot;; color: rgb(0, 153, 0);">Thanks for signing up, '.$_POST['first_name'].'</font>
             </div>
             </td>
             </tr>
             </tbody>
             </table>
             </td>
             </tr>
             </tbody>
             </table>
             </div>
             <table width="100%" cellspacing="0" cellpadding="0" style="padding: 2px; padding-top: 0px; padding-bottom: 15px;">
             <tbody>
             <tr>
             <td>
             <table width="100%" cellpadding="10" cellspacing="0" style="">
             <tbody>
             <tr>
             <td bgcolor="">
             <font style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);">Your account has been updated by Admin .&nbsp;</font>
             </div>
             <div style="">
             <font style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);">
             <br>
             </font>
             </div>
             <div style="">
             <span style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);"></span>
             </div>
             </div>
             </td>
             </tr>
             </tbody>
             </table>
             </td>
             </tr>
             </tbody>
             </table>
             <table width="100%" cellspacing="0" cellpadding="0" style="padding-bottom: 15px;">
             <tbody>
             <tr>
             <td>
             <table cellpadding="0" cellspacing="0" width="100%">
             <tbody>
             <tr>
             <td bgcolor="#ffffff">
             <table cellpadding="10" cellspacing="0" align="Center" style="" id="nzpButt">
             <tbody>
             <tr>
             
             </tr>
             </tbody>
             </table>
             </td>
             </tr>
             </tbody>
             </table>
             </td>
             </tr>
             </tbody>
             </table>';

                


            
            

            $mail->IsSMTP(); // telling the class to use SMTP
            $mail->Host       = "mail.designermore.com"; // SMTP server
            $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
                                                       // 1 = errors and messages
                                                       // 2 = messages only
            $mail->SMTPAuth   = true;                  // enable SMTP authentication
            $mail->Host       = "sg2plcpnl0154.prod.sin2.secureserver.net"; // sets the SMTP server
            $mail->SMTPSecure = "tls"; 
            $mail->Port       = 587;      // set the SMTP port for the GMAIL server
            //$mail->protocol = 'mail';                  
            $mail->Username   = "contact-gfm@designermore.com"; // SMTP account username
            $mail->Password   = "a}+wP8RPD~Am";        // SMTP account password

            $mail->SetFrom('contact-gfm@gmail.com', 'Admin');

            $mail->Subject    = 'Admin - account Updated By Admin';

           

            $mail->MsgHTML($body);


            $mail->AddAddress($user->email);

            $mail->Send();

						redirect('backend/auth/page', 'refresh');
					}
					else
					{
						redirect('backend/', 'refresh');
					}

				}
				else
				{
					// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('message', $this->ion_auth->errors());
					if ($this->ion_auth->is_admin())
					{
						redirect('backend/auth/page', 'refresh');
					}
					else
					{
						redirect('backend/', 'refresh');
					}

				}

			}
		}

		// display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['user'] = $user;
		$this->data['groups'] = $groups;
		$this->data['currentGroups'] = $currentGroups;

		$this->data['first_name'] = array(
			'name'  => 'first_name',
			'id'    => 'first_name',
			'class' =>'form-control',
			'placeholder' =>'First Name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('first_name', $user->first_name),
		);
		$this->data['last_name'] = array(
			'name'  => 'last_name',
			'id'    => 'last_name',
			'class' =>'form-control',
			'placeholder' =>'Last Name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('last_name', $user->last_name),
		);
		$this->data['company'] = array(
			'name'  => 'company',
			'id'    => 'company',
			'class' =>'form-control',
			'placeholder' =>'Company',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('company', $user->company),
		);
		$this->data['phone'] = array(
			'name'  => 'phone',
			'id'    => 'phone',
			'class' =>'form-control',
			'placeholder' =>'Phone',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('phone', $user->phone),
		);
		$this->data['password'] = array(
			'name' => 'password',
			'id'   => 'password',
			'class' =>'form-control',
			'placeholder' =>'Password',
			'type' => 'password'
		);
		$this->data['password_confirm'] = array(
			'name' => 'password_confirm',
			'id'   => 'password_confirm',
			'class' =>'form-control',
			'placeholder' =>'Password Confirm',
			'type' => 'password'
		);

		$this->template->load('backend/admin_front','backend/auth/edit_user', $this->data);
	}



public function edit_center($id = null) 
	{
		$validator = array('success' => false, 'messages' => array());
		
		$this->form_validation->set_rules('institute_name', 'Institute Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|regex_match[/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/]|required|valid_email');
        
       
        if ($this->form_validation->run()  === true) {


        	$data = [

                'contact_name'    =>$this->input->post('contact_name'),
                'institute_name'  =>$this->input->post('institute_name'),
                'skype_id'        =>$this->input->post('skype_id'),
                'mobile'          =>$this->input->post('mobile'),
                'website'         =>$this->input->post('website')
                
            ];
         

            $center = Center::find_by_user_id($id);
            //               echo "<pre>";
            // print_r($center);exit;
            if ($center->update_attributes($data)) {
                $post1 = User::find_by_id($id);
                
              $post2 =  $post1->update_attributes(array('email' => $this->input->post('email')));
                
		                if($post2 === true) {
							$validator['success'] = true;
							$validator['messages'] = "Successfully updated";


							require_once(APPPATH.'libraries/class.phpmailer.php');
            $mail             = new PHPMailer();

             $body= /*-----------email body starts-----------*/

             '<table width="100%" cellpadding="0" cellspacing="0">
             <tbody>
             <tr>
             <td valign="top">
             <table width="100%" cellpadding="0" cellspacing="0">
             <tbody>
             <tr>
             <td valign="top">
             <table width="100%" cellpadding="30">
             <tbody>
             <tr>
             <td align="center">
             <table width="600" bgcolor="#FFFFFF" cellpadding="15" cellspacing="0" id="nzInnerTable" border="0" style="border: 1px solid #FFFFFF;">
             <tbody>
             <tr>
             <td>
             <table width="100%" cellspacing="0" cellpadding="0" style="padding: 0px; padding-top: 0px; padding-bottom: 15px;">
             <tbody>
             <tr>
             <td>
             <table width="100%" cellpadding="10" cellspacing="0" style="">
             <tbody>
             <tr>
             <td bgcolor="">
             <div id="txtHolder-2" class="txtEditorClass" style="color: #1de81a; font-size: 22px; font-family: "Helvetica"; text-align: Left">
             <font style="font-size: -webkit-xxx-large; font-family: &quot;Trebuchet MS&quot;; color: rgb(0, 153, 0);">Thanks for signing up, '.$_POST['first_name'].'</font>
             </div>
             </td>
             </tr>
             </tbody>
             </table>
             </td>
             </tr>
             </tbody>
             </table>
             </div>
             <table width="100%" cellspacing="0" cellpadding="0" style="padding: 2px; padding-top: 0px; padding-bottom: 15px;">
             <tbody>
             <tr>
             <td>
             <table width="100%" cellpadding="10" cellspacing="0" style="">
             <tbody>
             <tr>
             <td bgcolor="">
             <font style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);">Your account has been updated by Admin .&nbsp;</font>
             </div>
             <div style="">
             <font style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);">
             <br>
             </font>
             </div>
             <div style="">
             <span style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);"></span>
             </div>
             </div>
             </td>
             </tr>
             </tbody>
             </table>
             </td>
             </tr>
             </tbody>
             </table>
             <table width="100%" cellspacing="0" cellpadding="0" style="padding-bottom: 15px;">
             <tbody>
             <tr>
             <td>
             <table cellpadding="0" cellspacing="0" width="100%">
             <tbody>
             <tr>
             <td bgcolor="#ffffff">
             <table cellpadding="10" cellspacing="0" align="Center" style="" id="nzpButt">
             <tbody>
             <tr>
             
             </tr>
             </tbody>
             </table>
             </td>
             </tr>
             </tbody>
             </table>
             </td>
             </tr>
             </tbody>
             </table>';

                


            
            

            $mail->IsSMTP(); // telling the class to use SMTP
            $mail->Host       = "mail.designermore.com"; // SMTP server
            $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
                                                       // 1 = errors and messages
                                                       // 2 = messages only
            $mail->SMTPAuth   = true;                  // enable SMTP authentication
            $mail->Host       = "sg2plcpnl0154.prod.sin2.secureserver.net"; // sets the SMTP server
            $mail->SMTPSecure = "tls"; 
            $mail->Port       = 587;      // set the SMTP port for the GMAIL server
            //$mail->protocol = 'mail';                  
            $mail->Username   = "contact-gfm@designermore.com"; // SMTP account username
            $mail->Password   = "a}+wP8RPD~Am";        // SMTP account password

            $mail->SetFrom('contact-gfm@gmail.com', 'Admin');

            $mail->Subject    = 'Admin - account Updated by admin';

           

            $mail->MsgHTML($body);


            $mail->AddAddress($post1->email);

            $mail->Send();
						} else {
							$validator['success'] = false;
							$validator['messages'] = "Error while updating the infromation";
						}			
			} 

			else{
					$validator['success'] = false;
					$validator['messages'] = "Error while updating the infromation";
				}		
            
        } 



          
            
			else {
				$validator['success'] = false;
				foreach ($_POST as $key => $value) {
					$validator['messages'][$key] = form_error($key);	
				}			
			}

			echo json_encode($validator);
             

}


public function edit_teacher($id = null) 
	{
		$validator = array('success' => false, 'messages' => array());
		
		$this->form_validation->set_rules('first_name', ' Name', 'required');
        $this->form_validation->set_rules('skype', 'Skype Id', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|regex_match[/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/]|required|valid_email');
        
       
        if ($this->form_validation->run()  === true) {


        	$data = [
   
                                'mobile' => $this->input->post('mobile'),
                                'skype' => $this->input->post('skype'),
                                'specilization' => $this->input->post('specilization')
                
            ];
             
           

            // $teacher =   Teacher::find_by_sql('SELECT * FROM teachers LEFT OUTER JOIN users
            //                       ON teachers.user_id = users.id');
            //     foreach($teacher as $g) 
            //       {
            //             $id  = $g->id;
            //       }
            $teach = Teacher::find_by_user_id($id);

            if ($teach->update_attributes($data)) {
                $post1 = User::find_by_id($id);
                
                

                
              $post2 =  $post1->update_attributes(array('email' => $this->input->post('email'),'first_name' => $this->input->post('first_name')));
                
		                if($post2 === true) {
							$validator['success'] = true;
							$validator['messages'] = "Successfully updated";

							require_once(APPPATH.'libraries/class.phpmailer.php');
            $mail             = new PHPMailer();

             $body= /*-----------email body starts-----------*/

             '<table width="100%" cellpadding="0" cellspacing="0">
             <tbody>
             <tr>
             <td valign="top">
             <table width="100%" cellpadding="0" cellspacing="0">
             <tbody>
             <tr>
             <td valign="top">
             <table width="100%" cellpadding="30">
             <tbody>
             <tr>
             <td align="center">
             <table width="600" bgcolor="#FFFFFF" cellpadding="15" cellspacing="0" id="nzInnerTable" border="0" style="border: 1px solid #FFFFFF;">
             <tbody>
             <tr>
             <td>
             <table width="100%" cellspacing="0" cellpadding="0" style="padding: 0px; padding-top: 0px; padding-bottom: 15px;">
             <tbody>
             <tr>
             <td>
             <table width="100%" cellpadding="10" cellspacing="0" style="">
             <tbody>
             <tr>
             <td bgcolor="">
             <div id="txtHolder-2" class="txtEditorClass" style="color: #1de81a; font-size: 22px; font-family: "Helvetica"; text-align: Left">
             <font style="font-size: -webkit-xxx-large; font-family: &quot;Trebuchet MS&quot;; color: rgb(0, 153, 0);">Thanks for signing up, '.$_POST['first_name'].'</font>
             </div>
             </td>
             </tr>
             </tbody>
             </table>
             </td>
             </tr>
             </tbody>
             </table>
             </div>
             <table width="100%" cellspacing="0" cellpadding="0" style="padding: 2px; padding-top: 0px; padding-bottom: 15px;">
             <tbody>
             <tr>
             <td>
             <table width="100%" cellpadding="10" cellspacing="0" style="">
             <tbody>
             <tr>
             <td bgcolor="">
             <font style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);">Your account has been updated by Admin .&nbsp;</font>
             </div>
             <div style="">
             <font style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);">
             <br>
             </font>
             </div>
             <div style="">
             <span style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);"></span>
             </div>
             </div>
             </td>
             </tr>
             </tbody>
             </table>
             </td>
             </tr>
             </tbody>
             </table>
             <table width="100%" cellspacing="0" cellpadding="0" style="padding-bottom: 15px;">
             <tbody>
             <tr>
             <td>
             <table cellpadding="0" cellspacing="0" width="100%">
             <tbody>
             <tr>
             <td bgcolor="#ffffff">
             <table cellpadding="10" cellspacing="0" align="Center" style="" id="nzpButt">
             <tbody>
             <tr>
             
             </tr>
             </tbody>
             </table>
             </td>
             </tr>
             </tbody>
             </table>
             </td>
             </tr>
             </tbody>
             </table>';

                


            
            

            $mail->IsSMTP(); // telling the class to use SMTP
            $mail->Host       = "mail.designermore.com"; // SMTP server
            $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
                                                       // 1 = errors and messages
                                                       // 2 = messages only
            $mail->SMTPAuth   = true;                  // enable SMTP authentication
            $mail->Host       = "sg2plcpnl0154.prod.sin2.secureserver.net"; // sets the SMTP server
            $mail->SMTPSecure = "tls"; 
            $mail->Port       = 587;      // set the SMTP port for the GMAIL server
            //$mail->protocol = 'mail';                  
            $mail->Username   = "contact-gfm@designermore.com"; // SMTP account username
            $mail->Password   = "a}+wP8RPD~Am";        // SMTP account password

            $mail->SetFrom('contact-gfm@gmail.com', 'Admin');

            $mail->Subject    = 'Admin - account Updated By Admin';

           

            $mail->MsgHTML($body);


            $mail->AddAddress($post1->email);

            $mail->Send();
            



						} else {
							$validator['success'] = false;
							$validator['messages'] = "Error while updating the infromation";
						}			
			} 

			else{
					$validator['success'] = false;
					$validator['messages'] = "Error while updating the infromation";
				}		
            
        } 



          
            
			else {
				$validator['success'] = false;
				foreach ($_POST as $key => $value) {
					$validator['messages'][$key] = form_error($key);	
				}			
			}

			echo json_encode($validator);
             

}
			
	

	public function getSelectedMemberInfo($id) 
	{


		if($id) {
			$sql = "SELECT c.*, u.id as u_id ,u.email FROM centers c JOIN users u ON u.id= c.user_id WHERE u.id = ? ORDER BY c.id DESC";

			$query = $this->db->query($sql, array($id));
			$data =  $query->row_array();
			echo json_encode($data); 
		}

		
	
		
	}

	public function getSelectedMemberInfo1($id) 
	{


		if($id) {
			$sql = "SELECT t.*, u.id as u_id ,u.email, u.first_name FROM teachers t JOIN users u ON u.id= t.user_id WHERE u.id = ? ORDER BY t.id DESC";

			$query = $this->db->query($sql, array($id));
			$data =  $query->row_array();
			echo json_encode($data); 
		}

		
	
		
	}

/**
	 * Delete the users
	 */

	public function delete_user($id)
	{
		$this->data['title'] = 'Delete|users';
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('backend/auth/page', 'refresh');
		}
		 else{

		 								require_once(APPPATH.'libraries/class.phpmailer.php');
            $mail             = new PHPMailer();

             $body= /*-----------email body starts-----------*/

             '<table width="100%" cellpadding="0" cellspacing="0">
             <tbody>
             <tr>
             <td valign="top">
             <table width="100%" cellpadding="0" cellspacing="0">
             <tbody>
             <tr>
             <td valign="top">
             <table width="100%" cellpadding="30">
             <tbody>
             <tr>
             <td align="center">
             <table width="600" bgcolor="#FFFFFF" cellpadding="15" cellspacing="0" id="nzInnerTable" border="0" style="border: 1px solid #FFFFFF;">
             <tbody>
             <tr>
             <td>
             <table width="100%" cellspacing="0" cellpadding="0" style="padding: 0px; padding-top: 0px; padding-bottom: 15px;">
             <tbody>
             <tr>
             <td>
             <table width="100%" cellpadding="10" cellspacing="0" style="">
             <tbody>
             <tr>
             <td bgcolor="">
             <div id="txtHolder-2" class="txtEditorClass" style="color: #1de81a; font-size: 22px; font-family: "Helvetica"; text-align: Left">
             <font style="font-size: -webkit-xxx-large; font-family: &quot;Trebuchet MS&quot;; color: rgb(0, 153, 0);">Your Account deleted by admin</font>
             </div>
             </td>
             </tr>
             </tbody>
             </table>
             </td>
             </tr>
             </tbody>
             </table>
             </div>
             <table width="100%" cellspacing="0" cellpadding="0" style="padding: 2px; padding-top: 0px; padding-bottom: 15px;">
             <tbody>
             <tr>
             <td>
             <table width="100%" cellpadding="10" cellspacing="0" style="">
             <tbody>
             <tr>
             <td bgcolor="">
             <font style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);">Your account has been updated by Admin .&nbsp;</font>
             </div>
             <div style="">
             <font style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);">
             <br>
             </font>
             </div>
             <div style="">
             <span style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);"></span>
             </div>
             </div>
             </td>
             </tr>
             </tbody>
             </table>
             </td>
             </tr>
             </tbody>
             </table>
             <table width="100%" cellspacing="0" cellpadding="0" style="padding-bottom: 15px;">
             <tbody>
             <tr>
             <td>
             <table cellpadding="0" cellspacing="0" width="100%">
             <tbody>
             <tr>
             <td bgcolor="#ffffff">
             <table cellpadding="10" cellspacing="0" align="Center" style="" id="nzpButt">
             <tbody>
             <tr>
             
             </tr>
             </tbody>
             </table>
             </td>
             </tr>
             </tbody>
             </table>
             </td>
             </tr>
             </tbody>
             </table>';

                


            
            $post1 = User::find_by_id($id);

            $mail->IsSMTP(); // telling the class to use SMTP
            $mail->Host       = "mail.designermore.com"; // SMTP server
            $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
                                                       // 1 = errors and messages
                                                       // 2 = messages only
            $mail->SMTPAuth   = true;                  // enable SMTP authentication
            $mail->Host       = "sg2plcpnl0154.prod.sin2.secureserver.net"; // sets the SMTP server
            $mail->SMTPSecure = "tls"; 
            $mail->Port       = 587;      // set the SMTP port for the GMAIL server
            //$mail->protocol = 'mail';                  
            $mail->Username   = "contact-gfm@designermore.com"; // SMTP account username
            $mail->Password   = "a}+wP8RPD~Am";        // SMTP account password

            $mail->SetFrom('contact-gfm@gmail.com', 'Admin');

            $mail->Subject    = 'Admin -   Your Account Deleted';

           

            $mail->MsgHTML($body);


            $mail->AddAddress($post1->email);

            $mail->Send();
           $this->ion_auth->delete_user($id);
           $this->session->set_flashdata('message', 'successfully delete');
		  redirect('backend/auth/page', 'refresh');
	    	}
	}


	public function delete_user1($id)
	{
		$this->data['title'] = 'Delete|users';
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('backend/auth/page', 'refresh');
		}
		 else{

           $this->ion_auth->delete_user($id);
           $del = Center::find_by_user_id($id);
           $del->delete();
           $this->session->set_flashdata('message', 'successfully delete');
		  redirect('backend/auth/page', 'refresh');
	    	}
	}


	public function delete_user2($id)
	{
		$this->data['title'] = 'Delete|users';
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('backend/auth/page', 'refresh');
		}
		 else{

           $this->ion_auth->delete_user($id);
           $del = Teacher::find_by_user_id($id);
           $del->delete();
           $this->session->set_flashdata('message', 'successfully delete');
		  redirect('backend/auth/page', 'refresh');
	    	}
	}

	/**
	 * Create a new group
	 */
	public function create_group()
	{
		$this->data['title'] = $this->lang->line('create_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('backend/auth', 'refresh');
		}

		// validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label'), 'required|alpha_dash');

		if ($this->form_validation->run() === TRUE)
		{
			$new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('description'));
			if ($new_group_id)
			{
				// check to see if we are creating the group
				// redirect them back to the admin page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("backend/auth/page", 'refresh');
			}
		}
		else
		{
			// display the create group form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['group_name'] = array(
				'name'  => 'group_name',
				'id'    => 'group_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('group_name'),
			);
			$this->data['description'] = array(
				'name'  => 'description',
				'id'    => 'description',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('description'),
			);

			// $this->_render_page('backend/auth/create_group', $this->data);
			$this->template->load('backend/admin_front','backend/auth/create_group',$this->data);
		}
	}

	/**
	 * Edit a group
	 *
	 * @param int|string $id
	 */
	public function edit_group($id)
	{
		// bail if no group id given
		if (!$id || empty($id))
		{
			redirect('backend/auth/page', 'refresh');
		}

		$this->data['title'] = $this->lang->line('edit_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('backend/auth/page', 'refresh');
		}

		$group = $this->ion_auth->group($id)->row();

		// validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'required|alpha_dash');

		if (isset($_POST) && !empty($_POST))
		{
			if ($this->form_validation->run() === TRUE)
			{
				$group_update = $this->ion_auth->update_group($id, $_POST['group_name'], $_POST['group_description']);

				if ($group_update)
				{
					$this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));
				}
				else
				{
					$this->session->set_flashdata('message', $this->ion_auth->errors());
				}
				redirect("backend/auth/page", 'refresh');
			}
		}

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['group'] = $group;

		$readonly = $this->config->item('admin_group', 'ion_auth') === $group->name ? 'readonly' : '';

		$this->data['group_name'] = array(
			'name'    => 'group_name',
			'id'      => 'group_name',
			'class' =>'form-control',
			'placeholder' =>'Group Name',
			'type'    => 'text',
			'value'   => $this->form_validation->set_value('group_name', $group->name),
			$readonly => $readonly,
		);
		$this->data['group_description'] = array(
			'name'  => 'group_description',
			'id'    => 'group_description',
			'class' =>'form-control',
			'placeholder' =>'Description',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('group_description', $group->description),
		);

		// $this->_render_page('backend/auth/edit_group', $this->data);
		$this->template->load('backend/admin_front','backend/auth/edit_group', $this->data);
	}

	/**
	 * @return array A CSRF key-value pair
	 */
	public function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	/**
	 * @return bool Whether the posted CSRF token matches
	 */
	public function _valid_csrf_nonce()
	{
		$csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
		if ($csrfkey && $csrfkey === $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	/**
	 * @param string     $view
	 * @param array|null $data
	 * @param bool       $returnhtml
	 *
	 * @return mixed
	 */
	public function _render_page($view, $data = NULL, $returnhtml = FALSE)//I think this makes more sense
	{

		$this->viewdata = (empty($data)) ? $this->data : $data;

		$view_html = $this->load->view($view, $this->viewdata, $returnhtml);

		// This will return html on 3rd argument being true
		if ($returnhtml)
		{
			return $view_html;
		}
	}


public function center(){

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
  {
          redirect('backend/auth/login', 'refresh');
  }

      
 
  //list the users

  // $this->data['users'] = $this->ion_auth->users()->result();

 
  // foreach ($this->data['users'] as $k => $user)
  // {
  //  $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
  //     $group_id = 5; 
  //     $this->data['user'] = $this->ion_auth->users($group_id)->result();
            
		
  // }
 
  

 
  //set the flash data error message if there is one
  $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
 
      $this->template->load('backend/admin_front','backend/auth/center',$this->data);
	}

	public function students(){

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
  {
          redirect('backend/auth/login', 'refresh');
  }

   $this->data['users'] = $this->ion_auth->users()->result();
 
  foreach ($this->data['users'] as $k => $user)
 {
    $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
       $group_id = 3; 
      $this->data['user'] = $this->ion_auth->users($group_id)->result();
            
		
  }
 
  
      $this->template->load('backend/admin_front','backend/auth/students',$this->data);
	}


	

public function mailling(){

		$this->load->view('backend/auth/mail');
	}

	public function teachers(){

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
  {
          redirect('backend/auth/login', 'refresh');
  }

      
 
  //list the users
  $this->data['users'] = $this->ion_auth->users()->result();
 
  foreach ($this->data['users'] as $k => $user)
  {
   $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
      $group_id = 4; 
      $this->data['user'] = $this->ion_auth->users($group_id)->result();
            
		
  }
 
  

 
  //set the flash data error message if there is one
  $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
 
      $this->template->load('backend/admin_front','backend/auth/teachers',$this->data);
	}


	public function page()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
  {
   redirect('home', 'refresh');
  }
 
  $this->load->library('pagination');
  $config = array();
  $config["base_url"] = site_url() . "backend/auth/page/";
  $config['total_rows'] = $this->ion_auth->users()->num_rows();
  $config['per_page'] = '10';

 
 
  //pagination customization using bootstrap styles
  $config['full_tag_open'] = ' <ul class="pagination pull-right">';
  $config['full_tag_close'] = '</ul><!--pagination-->';
  $config['first_link'] = '« First';
  $config['first_tag_open'] = '<li class="prev page">';
  $config['first_tag_close'] = '</li>';
 
  $config['last_link'] = 'Last »';
  $config['last_tag_open'] = '<li class="next page">';
  $config['last_tag_close'] = '</li>';
 
  $config['next_link'] = 'Next →';
  $config['next_tag_open'] = '<li class="next page">';
  $config['next_tag_close'] = '</li>';
 
  $config['prev_link'] = '← Previous';
  $config['prev_tag_open'] = '<li class="prev page">';
  $config['prev_tag_close'] = '</li>';
 
  $config['cur_tag_open'] = '<li class="active"><a href="">';
  $config['cur_tag_close'] = '</a></li>';
 
  $config['num_tag_open'] = '<li class="page">';
  $config['num_tag_close'] = '</li>';
 
 
  $this->pagination->initialize($config);
 
   $the_uri_segment = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
   // print_r($the_uri_segment);exit;
   $config['uri_segment'] = $the_uri_segment;
 
 
  //list the users
  $this->data['users'] = $this->ion_auth->offset($the_uri_segment)->limit($config['per_page'])->users()->result();
 
  foreach ($this->data['users'] as $k => $user)
  {
   $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
  }
 
  $this->data['links'] = $this->pagination->create_links();

 
  //set the flash data error message if there is one
  $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
 
 
   $this->data['include'] = 'backend/auth/page/';
 // print_r($this->data['links']);exit;
  $this->template->load('backend/admin_front','backend/auth/index',$this->data);
  // $this->_render_page('auth/template', $this->data);
	}


	

}
