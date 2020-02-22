<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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

	function __construct()
	{
		parent::__construct();		
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}
		// elseif (!$this->ion_auth->is_admin())
		// {	
		// 	return show_error('You must be an administrator to view this page.');
		// }
	}

	public function index()
	{
		$this->load->view('admin/dashboard');
	}

	function _example_output($output = null)
	{
		$this->load->view('admin/dashboard',$output);    
	}
	 
	// function users()
	// {
	// 	$output = $this->grocery_crud->render();
	// 	$this->_example_output($output);

	// }

	function users()
	{	
		$this->grocery_crud->set_table('tbl_user');
		$this->grocery_crud->unset_add();
		
		$this->grocery_crud->order_by('created_date','desc');

		$output = $this->grocery_crud->render();
		$this->_example_output($output);

	}

	function feedback()
	{	
		$this->grocery_crud->set_table('tbl_feedback');
		$this->grocery_crud->set_relation('user_id','tbl_user','name');

		$this->grocery_crud->unset_columns('image');
		$this->grocery_crud->unset_fields('image');


		$this->grocery_crud->unset_add();

		$this->grocery_crud->order_by('created_date','desc');


		$output = $this->grocery_crud->render();
		$this->_example_output($output);

	}

	function share()
	{	
		$this->grocery_crud->set_table('tbl_share');
		$this->grocery_crud->set_relation('user_id','tbl_user','name');
		$this->grocery_crud->unset_add();

		$this->grocery_crud->order_by('created_date','desc');

		$output = $this->grocery_crud->render();
		$this->_example_output($output);

	}

	function limit()
	{	
		$this->grocery_crud->set_table('tbl_usage_limit');
		$this->grocery_crud->unset_add();
		$this->grocery_crud->order_by('created_date','desc');

		$output = $this->grocery_crud->render();
		$this->_example_output($output);

	}

	function journey()
	{	
		$this->grocery_crud->set_table('tbl_user_journey');
		$this->grocery_crud->set_relation('user_id','tbl_user','name');
		$this->grocery_crud->unset_add();

		$this->grocery_crud->order_by('created_date','desc');
		

		$output = $this->grocery_crud->render();
		$this->_example_output($output);

	}

}
