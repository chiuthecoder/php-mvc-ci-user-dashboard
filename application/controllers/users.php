<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	// public $display;
	public function __construct(){
		parent::__construct();
		// $user['username'] = $this->session->set_userdata('username');
		// $user['is_logged_in'] = $this->session->set_userdata('is_logged_in');
		// $user['user_id'] = $this->session->set_userdata('user_id');
		$this->load->view('partials/header');
	}

	//load login/Registration view
	public function index()
	{
		$this->load->view('login');
	}
	public function login_view()
	{
		$this->load->view('login_view');
	}

	public function register_view()
	{
		$this->load->view('register_view');
	}
	public function dashboard_view()
	{
		$this->load->view('dashboard');
	}
	//process registration, vaildation message
	public function create()
	{
		$result = $this->user->validate($this->input->post());

		if($result == "valid")
		{
			$this->user->create($this->input->post());
			$success[] = 'Welcome! Registration was successful!';
			$this->session->set_flashdata('success', $success);
			redirect('/users');
		}
		else
		{
			$errors = array(validation_errors());
			$this->session->set_flashdata('errors', $errors);
			redirect('/users');
		}
	}

	//process user login
	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$result = $this->user->retrieveByEmail($email);
		if($result && $result['password']=$password)
		{
			$user = array(
				'user_id' => $result['id'],
				'user_email' => $result['email'],
				'first_name' => $result['first_name'],
				'last_name' => $result['last_name'],
				'username' => $result['first_name'] ." ". $result['last_name'],
				'is_logged_in' => true
				);
			$this->session->set_userdata($user);
			redirect('/users/profile');
			// redirect('/users/dashboard_view');
			// $this->load->view('dashboard', $user);
		}
		else
		{
			$this->session->set_flashdata("login_error", "<p>Invalid email or password!</p>");
			redirect('/users/index');
		}
	}

	//simple profile view of a user
	public function profile()
	{
		if($this->session->userdata('is_logged_in') === true)
		{
	 		// redirect('/users/dashboard_view');
	 		// $this->load->view('dashboard', $user);
	 		echo 'You have sucessfully login. Click <a href="/users/logout">here</a> to logout.';
		}
		else
		{
		  redirect('/users/index');
		}
 
  }

  	//logout the user
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/users/index');
	}

}
