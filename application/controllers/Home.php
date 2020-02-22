<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct() {

        parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		header("Access-Control-Allow-Origin: *");
		$this->load->library('session');
    }


	public function index()
	{

		$this->load->view('index');


		// if(!$this->session->userdata('is_logged_in')){

		// 	redirect('login','refresh');

		// }else if(!$this->session->userdata('current_position')){	

		// 	redirect('location','refresh');

		// }else{

		// 	$this->load->view('index');
		// }
	}


	public function login()
	{

		if($this->session->userdata('is_logged_in')){

			redirect('location','refresh');

		}else{


			// echo "calling login view";
			// exit();

			$this->load->view('login');
		}

	}

	public function location(){

		if($this->session->userdata('current_position')){



			redirect('','refresh');

		}else{

			$this->load->view('location');
		}
			
	}

	public function set_position(){

		$current_position = $this->input->post('current_position');

		$this->session->set_userdata('current_position',$current_position);		

		$data['status'] = "success";
		echo json_encode($data);
	}

	public function show_session(){

		echo "<pre>";
		print_r($this->session->all_userdata());
		echo "<pre>";

	}

	public function remove_session(){

		$this->session->sess_destroy();
	}


	public function checklogin()
	{
		$session_data = array(

	        'place_id' => $this->input->post('place_id'),
	        'position' => $this->input->post('position'),
	        'location' => $this->input->post('location')
		);

		$this->session->set_userdata($session_data);

		if($this->session->userdata('is_loggedin')){

			$arr = array(

	    		'status' => 'success',
	    		'name' => $this->session->userdata('name'),
	    		'profile_url' => $this->session->userdata('profile_url')
	    	);

		}else{

			$arr = array(
	    		'status' => 'failed',
	    	);
		}

    	echo json_encode($arr);
    	exit();

	}


	public function getCurrentPosition(){

		$arr = array(

    		'status' => 'success',
    		'position' => $this->session->userdata('position')
    	);

    	echo json_encode($arr);
    	exit();

	}


	
	public function signup(){

		$ipaddress = '';
	    if (getenv('HTTP_CLIENT_IP'))
	        $ipaddress = getenv('HTTP_CLIENT_IP');
	    else if(getenv('HTTP_X_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	    else if(getenv('HTTP_X_FORWARDED'))
	        $ipaddress = getenv('HTTP_X_FORWARDED');
	    else if(getenv('HTTP_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_FORWARDED_FOR');
	    else if(getenv('HTTP_FORWARDED'))
	       $ipaddress = getenv('HTTP_FORWARDED');
	    else if(getenv('REMOTE_ADDR'))
	        $ipaddress = getenv('REMOTE_ADDR');
	    else
	        $ipaddress = 'UNKNOWN';

		$ip  = $ipaddress;
	    $name = $this->input->post('name');
	    $mobile = $this->input->post('mobile');
	    $email = $this->input->post('email');
	    $password = $this->input->post('password');

	    $place_id =  $this->session->userdata('place_id');
	    $location =  $this->session->userdata('location');

	    $created_date = Date('Y/m/d H:i:s');


	    $loggedin_from = "signup";
	   	$profile_url = base_url('assets/website_assets/img/user.png');



	   	$sql = "SELECT `user_id` FROM `tbl_user` WHERE `email`='$email'";
		$query = $this->db->query($sql);

		if($query->num_rows()>0){

			$arr = array(
	    		'status' => 'failed',
	    		'msg'=> 'emailexist'
	    	);

	    	echo json_encode($arr);
	    	exit();

		}


	    $sql = "INSERT INTO `tbl_user`(`ip`, `loggedin_from`, `profile_url`, `name`, `mobile`, `email`, `password`, `current_place_id`, `current_location`, `created_date`) VALUES ('$ip','$loggedin_from','$profile_url','$name','$mobile','$email','$password','$place_id','$location','$created_date')";
	    
	    if($this->db->query($sql)){

	    	$session_data = array(

	    		'is_loggedin' => true,
		        'user_id' => $this->db->insert_id(),
		        'name' => $name,
		        'profile_url' => $profile_url

			);

			$this->session->set_userdata($session_data);
	    
	    	$arr = array(
	    		'status' => 'success',
	    		'name' => $name,
		    	'profile_url' => $this->session->userdata('profile_url')
	    	);

	    }else{

	    	$arr = array(
	    		'status' => 'failed',
	    	);
	    }

	    echo json_encode($arr);
	    exit();

	}


	public function social_signup(){

		$ipaddress = '';
	    if (getenv('HTTP_CLIENT_IP'))
	        $ipaddress = getenv('HTTP_CLIENT_IP');
	    else if(getenv('HTTP_X_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	    else if(getenv('HTTP_X_FORWARDED'))
	        $ipaddress = getenv('HTTP_X_FORWARDED');
	    else if(getenv('HTTP_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_FORWARDED_FOR');
	    else if(getenv('HTTP_FORWARDED'))
	       $ipaddress = getenv('HTTP_FORWARDED');
	    else if(getenv('REMOTE_ADDR'))
	        $ipaddress = getenv('REMOTE_ADDR');
	    else
	        $ipaddress = 'UNKNOWN';

		$ip  = $ipaddress;

	    $social_id = $this->input->post('social_id');
	    $name = $this->input->post('name');
	    $email = $this->input->post('email');
	    $loggedin_from = $this->input->post('loggedin_from');
	   	$profile_url = $this->input->post('profile_url');

	    $created_date = Date('Y/m/d H:i:s');

	    $checkuser = "SELECT `user_id`,`name`,`profile_url` FROM `tbl_user` WHERE `social_id` = '$social_id'";

	    $query = $this->db->query($checkuser);
	    
	    if($query->num_rows()>0){

    		$session_data = array(

	    		'is_logged_in' => true,
		        'user_id' => $query->row()->user_id,
		        'name' => $query->row()->name,
		        'profile_url' => $query->row()->profile_url

			);

			$this->session->set_userdata($session_data);
	    
	    	$arr = array(
	    		'status' => 'success',
	    		// 'name' => $this->session->userdata('name'),
		    	// 'profile_url' => $this->session->userdata('profile_url')
	    	);
	    	

	    }else{

	    	$sql = "INSERT INTO `tbl_user`(`ip`, `loggedin_from`,`social_id`,`profile_url`,`name`, `email`, `created_date`) VALUES ('$ip','$loggedin_from','$social_id','$profile_url','$name','$email','$created_date')";
	    
		    if($this->db->query($sql)){

		    	$session_data = array(

		    		'is_logged_in' => true,
			        'user_id' => $this->db->insert_id(),
			        'name' => $name,
		        	'profile_url' => $profile_url
				);

				$this->session->set_userdata($session_data);
		    
		    	$arr = array(
		    		'status' => 'success',
		    		// 'name' => $this->session->userdata('name'),
			    	// 'profile_url' => $this->session->userdata('profile_url')
		    	);


		    }else{

		    	$arr = array(
		    		'status' => 'failed',
		    	);

		    }


	    }

		echo json_encode($arr);
		exit();

	}


	public function old_login(){

	    $email = $this->input->post('email');
	    $password = $this->input->post('password');

	    $sql = "SELECT `user_id`,`name`,`email`,`profile_url` FROM `tbl_user` WHERE `email`='$email' and `password`='$password'";

		$query = $this->db->query($sql);

	    if($query->num_rows()>0){

	    	$session_data = array(

	    		'is_loggedin' => true,
		        'user_id' => $query->row()->user_id,
		        'name' => $query->row()->name,
		        'profile_url' => $query->row()->profile_url

			);

			$this->session->set_userdata($session_data);
	    
	    	$arr = array(
	    		'status' => 'success',
		    	'name' => $query->row()->name,
		    	'profile_url' => $query->row()->profile_url

	    	);

	    }else{

	    	$arr = array(
	    		'status' => 'failed',
	    	);

	    }

	    echo json_encode($arr);
	    exit();

	}

	public function logout(){

		$this->session->unset_userdata('is_logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('profile_url');

		redirect('login', 'refresh');

	}


	public function insertJourney(){

	    $user_id = $this->session->userdata('user_id');
	    $location = $this->session->userdata('current_position');
	    $looking_for = $this->input->post('looking_for');

	    $created_date = Date('Y/m/d H:i:s');

	    $sql = "INSERT INTO `tbl_user_journey`(`user_id`, `location`, `looking_for`, `created_date`) VALUES ('$user_id','$location','$looking_for','$created_date')";

	    if($this->db->query($sql)){
	    
	    	$arr = array(
	    		'status' => 'success',
	    	);

	    }else{

	    	$arr = array(
	    		'status' => 'failed',
	    	);

	    }

	    echo json_encode($arr);
	    exit();

	}



	public function insertShare(){

	    $user_id = $this->session->userdata('user_id');
	    $created_date = Date('Y/m/d H:i:s');

	    $sql = "INSERT INTO `tbl_share`(`user_id`, `created_date`) VALUES ('$user_id','$created_date')";

	    if($this->db->query($sql)){
	    
	    	$arr = array(
	    		'status' => 'success',
	    	);

	    }else{

	    	$arr = array(
	    		'status' => 'failed',
	    	);

	    }

	    echo json_encode($arr);
	    exit();

	}


	public function insertLimit(){

	    $created_date = Date('Y/m/d H:i:s');

	    $sql = "INSERT INTO `tbl_usage_limit`(`status`, `created_date`) VALUES ('limit reached','$created_date')";

	    if($this->db->query($sql)){
	    
	    	$arr = array(
	    		'status' => 'success',
	    	);

	    }else{

	    	$arr = array(
	    		'status' => 'failed',
	    	);

	    }

	    echo json_encode($arr);
	    exit();

	}

	

	public function sendemail(){

		 	require_once 'ElasticEmailClient.php';

		 	$email = $this->input->post('email');

		 	$sql = "SELECT `password` FROM `tbl_user` WHERE `email`='$email'";
			$query = $this->db->query($sql);

			if($row = $query->row()){

				$password = $row->password;

				if($password!=""){

					ElasticEmailClient\ApiClient::SetApiKey("a77a6eb4-0cba-464a-910e-7c89478d73a8");
		    
				    function SendEmail($recipients, $subject, $from, $fromName, $text, $html) {	
				        $EEemail = new ElasticEmailClient\Email();
				        try
				        {
				            $response = $EEemail->Send($subject, $from, $fromName, null, null, null, null, null, null, $recipients, array(), array(), array(), array(), array(), null, null, $html, $text);		
				        }
				        catch (Exception $e)
				        {
				            echo 'Something went wrong: ', $e->getMessage(), '\n';
				            return;
				        }		
				    }
				    
				    $recipients = [$email];
				    $subject = "Find anything anywhere password ";
				    $fromEmail = "noreply@findanythinganywhere.com";
				    $fromName = "Find anything anywhere";
				    $bodyText = "";
				    $bodyHtml = "<p>Your password is </b>".$password."</b></p><br><br><br><br>";
				    
				    SendEmail($recipients, $subject, $fromEmail, $fromName, $bodyText, $bodyHtml);

					$arr = array(
			    		'status' => 'success',
				    );

				}else{
				
					$arr = array(
			    		'status' => 'failed',
				    );
				}

			}else{

				$arr = array(
					
		    		'status' => 'failed',
			    );
			}

			echo json_encode($arr);
			exit();
	}


	public function artiziya_sendemail(){

		 	require_once 'ElasticEmailClient.php';

		 	$name = $this->input->post('name');
			$email = $this->input->post('email');
			$number = $this->input->post('number');
			$subject = $this->input->post('subject');
			$message = $this->input->post('message');

			$body = "<table border='1'>".
				"<tr>".
					"<td>Name</td>".
					"<td>".$name."</td>".
				"</tr>".
				"<tr>".
				"</tr>".
				"<tr>".
					"<td>Email</td>".
					"<td>".$email."</td>".
				"</tr>".
				"<tr>".
				"</tr>".
				"<tr>".
					"<td>Number</td>".
					"<td>".$number."</td>".
				"</tr>".
				"<tr>".
				"</tr>".
				"<tr>".
					"<td>Subject</td>".
					"<td>".$subject."</td>".
				"</tr>".
				"<tr>".
				"</tr>".
				"<tr>".
					"<td>Message</td>".
					"<td>".$message."</td>".
				"</tr>".
			"</table>";


			ElasticEmailClient\ApiClient::SetApiKey("a77a6eb4-0cba-464a-910e-7c89478d73a8");
    
		    function SendEmail($recipients, $subject, $from, $fromName, $text, $html) {	

		        $EEemail = new ElasticEmailClient\Email();
		        try
		        {
		            $response = $EEemail->Send($subject, $from, $fromName, null, null, null, null, null, null, $recipients, array(), array(), array(), array(), array(), null, null, $html, $text);		
		        }
		        catch (Exception $e)
		        {
		            echo 'Something went wrong: ', $e->getMessage(), '\n';
		            return;
		        }		
		    }
		    
		    $recipients = ['azharshaikh46@gmail.com','azhar@artiziya.com','aniq.makrani@gmail.com'];
		    $subject = "Website Enquiry";
		    $fromEmail = 'azhar.artiziya@gmail.com';
		    $fromName = "Artiziya Enquiry";
		    $bodyText = "";
		    $bodyHtml = $body;
		    
		    SendEmail($recipients, $subject, $fromEmail, $fromName, $bodyText, $bodyHtml);

			$arr = array(
	    		'status' => 'success',
		    );

			echo json_encode($arr);
			exit();
	}

	public function atm(){

		if(!$this->session->userdata('is_logged_in')){
			redirect('login','refresh');
		}else{

			$this->load->view('atm');

		}
	}


	public function restaurant(){

		if(!$this->session->userdata('is_logged_in')){
			redirect('login','refresh');
		}else{

			$this->load->view('restaurant');

		}
	}
	

	public function hotels(){

		if(!$this->session->userdata('is_logged_in')){
			redirect('login','refresh');
		}else{

			$this->load->view('hotels');

		}
	}

	public function medical(){

		if(!$this->session->userdata('is_logged_in')){
			redirect('login','refresh');
		}else{

			$this->load->view('medical');

		}
	}

	public function hardware_store(){

		if(!$this->session->userdata('is_logged_in')){
			redirect('login','refresh');
		}else{

			$this->load->view('hardware_store');

		}
	}

	public function movie_theater(){

		if(!$this->session->userdata('is_logged_in')){
			redirect('login','refresh');
		}else{

			$this->load->view('movie_theater');

		}
	}

	public function petrol_pump(){

		if(!$this->session->userdata('is_logged_in')){
			redirect('login','refresh');
		}else{

			$this->load->view('petrol_pump');

		}
	}

	public function railway_station(){

		if(!$this->session->userdata('is_logged_in')){
			redirect('login','refresh');
		}else{

			$this->load->view('railway_station');

		}
	}

	public function doctor(){

		if(!$this->session->userdata('is_logged_in')){
			redirect('login','refresh');
		}else{

			$this->load->view('doctor');

		}
	}

	public function parking(){

		if(!$this->session->userdata('is_logged_in')){
			redirect('login','refresh');
		}else{

			$this->load->view('parking');

		}
	}

	public function animal_store(){

		if(!$this->session->userdata('is_logged_in')){
			redirect('login','refresh');
		}else{

			$this->load->view('animal_store');

		}
	}

	public function animal_hospital(){

		if(!$this->session->userdata('is_logged_in')){
			redirect('login','refresh');
		}else{

			$this->load->view('animal_hospital');

		}
	}


	public function insertFeedback(){

	    $user_id = $this->session->userdata('user_id');

	    $description = $this->input->post('description');

	    $created_date = Date('Y/m/d H:i:s');

	    $sql = "INSERT INTO `tbl_feedback`(`user_id`, `description`, `created_date`) VALUES ('$user_id','$description','$created_date')";

	    if($this->db->query($sql)){
	    
	    	$arr = array(
	    		'status' => 'success',
	    	);

	    }else{

	    	$arr = array(
	    		'status' => 'failed',
	    	);

	    }

		echo json_encode($arr);
		exit();
	}
}
