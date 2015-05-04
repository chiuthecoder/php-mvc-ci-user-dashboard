<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboards extends CI_Controller {

	//load login/Registration view
	public function index()
	{
		$this->load->view('landing_page');
	}

	public function signin()
	{
		$this->load->view('signin');
	}

	public function register()
	{
		$this->load->view('register');
	}

	public function new_user()
	{
		$this->load->view('new_user');
	}

	public function edit_user()
	{
		$user = $this->dashboard->retrieveUserProfile($this->input->post('id'));
		$this->load->view('edit_user', array('user' => $user));
	}

	public function createNewUser()
	{
		
		$result = $this->dashboard->validate($this->input->post());

		if($result == "valid")
		{
			$this->dashboard->createNewUser($this->input->post());
			$this->session->set_flashdata("success", "Registration successed. Please sign in to access the dashboard.");
			redirect('signin');
		}
		else
		{
			$errors = array(validation_errors());
			$this->session->set_flashdata('errors', $errors);
			redirect('register');
		}
	}

	public function retrieveOneUser()
	{
		$postData = $this->input->post();
		$user = $this->dashboard->retrieveOneUser($postData);
		if($user) 
		{
			$this->session->set_userdata('logged_in', TRUE);
			$this->session->set_userdata('username', $user['first_name']." ".$user['last_name']);
			$this->session->set_userdata('first_name', $user['first_name']);
			$this->session->set_userdata('last_name', $user['last_name']);
			$this->session->set_userdata('email', $user['email']);
			$this->session->set_userdata('user_level', $user['user_level']);
			$this->session->set_userdata('user_id', $user['id']);
			$this->session->set_userdata('description', $user['description']);
			redirect('dashboard');
		}
		else
		{
			// $this->session->set_flashdata("error", "Something went wrong. Invalid email or password.");
			$this->session->set_flashdata("error", "<p>Invalid email or password!</p>");
			redirect('signin');
		}
	}

	public function dashboard()
	{
		if($this->session->userdata('user_level') == 'admin')
		{
			$users = $this->dashboard->retrieveAllUsers();
			$this->load->view('admin_dashboard', array('users' => $users));
		}
		else if ($this->session->userdata('user_level') == 'normal')
		{
			$users = $this->dashboard->retrieveAllUsers();
			$this->load->view('user_dashboard', array('users' => $users));
		}
		else {
			redirect('/');
		}
	}

	public function profile()
	{
		if($this->session->userdata('logged_in') == TRUE)
		{			
			if($this->session->userdata('recipient_id'))
			{
				$user = $this->dashboard->retrieveUserProfile($this->session->userdata('recipient_id'));
				
				$messages = $this->dashboard->retrieveAllMessages($this->session->userdata('recipient_id'));
				$this->session->unset_userdata('recipient_id');
				$this->load->view('user_information', array('user' => $user, 'messages' => $messages));
			}
			else
			{
				$user = $this->dashboard->retrieveUserProfile($this->input->post('id'));
				$messages = $this->dashboard->retrieveAllMessages($this->input->post('id'));
				$this->load->view('user_information', array('user' => $user, 'messages' => $messages));
			}
		}
		else
		{
			redirect('/');
		}
	}

	public function edit_profile()
	{
		$user = $this->dashboard->retrieveUserProfile($this->input->post('id'));
		$this->load->view('edit_profile', array('user' => $user));
	}

	public function updateUserProfile()
	{
		$postData = $this->input->post();
		$this->session->set_userdata('username', $postData['first_name']." ".$postData['last_name']);
		$this->session->set_userdata('first_name', $postData['first_name']);
		$this->session->set_userdata('last_name', $postData['last_name']);
		$this->session->set_userdata('email', $postData['email']);
		$result = $this->dashboard->updateUserProfile($postData);
		if($result)
		{
			$this->session->set_flashdata("success", "Profile successfully updated!");
			redirect('edit_profile');
		}
		else
		{
			$this->session->set_flashdata("error", "Something went wrong! Please try again later...");
			redirect('edit_profile');
		}
	}

	public function updateUser()
	{
		$postData = $this->input->post();
		$result = $this->dashboard->updateUser($postData);
		if($result)
		{
			$this->session->set_flashdata("success", "User successfully updated!");
			redirect('dashboard');
		}
		else
		{
			$this->session->set_flashdata("error", "Something went wrong! Please try again later...");
			redirect('dashboard');
		}
	}

	public function updatePassword()
	{
		$postData = $this->input->post();
		$result = $this->dashboard->updatePassword($postData);
		if($result)
		{
			$this->session->set_flashdata("success", "Password successfully updated!");
			redirect('dashboard');
		}
		else
		{
			$this->session->set_flashdata("error", "Something went wrong! We couldn't update password. Please try again later...");
			redirect('dashboard');
		}
	}

	public function updateDescription()
	{
		$postData = $this->input->post();
		$this->session->set_userdata('description', $postData['description']);
		$result = $this->dashboard->updateDescription($postData);
		if($result)
		{
			$this->session->set_flashdata("success", "Description successfully updated!");
			redirect('edit_profile');
		}
		else
		{
			$this->session->set_flashdata("error", "Something went wrong! We couldn't update your description. Please try again later...");
			redirect('edit_profile');
		}
	}

	public function destroyUser()
	{
		if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('user_level') == 'admin')
		{			
			$result = $this->dashboard->destroyUser($this->input->post('id'));
			if($result)
			{
				$this->session->set_flashdata("success", "User successfully deleted!");
				redirect('dashboard');
			}
			else
			{
				$this->session->set_flashdata("error", "Sorry, we couldn't delete that user now. Please try again later.");
				redirect('dashboard');
			}
		}
		else
		{
			redirect('/');
		}
	}

	public function createMessage()
	{
		$postData = $this->input->post();
		$result = $this->dashboard->createMessage($postData);
		if($result)
			{
				$this->session->set_flashdata("success", "Message successfully posted!");
				$this->session->set_userdata('recipient_id', $postData['recipient_id']);
				redirect('profile');
			}
			else
			{
				$this->session->set_flashdata("error", "Sorry, we couldn't post your message right now. Please try again later.");
				redirect('profile');
			}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

}