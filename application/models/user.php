<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	//insert data
  public function create($content)
	{
    $query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at) 
    VALUES (?,?,?,?,?,?)";
    $values = array( $content['first_name'],$content['last_name'],$content['email'],md5($content['password']), date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s") );
    $id = $this->db->insert_id($this->db->query($query, $values));
    return $id;
	}

  //process form validation in model
  public function validate($post)
  {
    $config = array(
      array(
        'field'   => 'first_name',
        'label'   => 'first name',
        'rules'   => 'trim|required'
        ),
      array(
        'field'   => 'last_name',
        'label'   => 'last name',
        'rules'   => 'trim|required'
        ),
      array(
        'field'   => 'email',
        'label'   => 'email',
        'rules'   => 'trim|required|valid_email|is_unique[users.email]'
        ),
      array(
        'field'   => 'password',
        'label'   => 'password',
        'rules'   => 'trim|required|min_length[2]|matches[password_confirmation]'
        ),
      array(
        'field'   => 'password_confirmation',
        'label'   => 'password confirmation',
        'rules'   => 'trim|required'
        )
      );

    $this->form_validation->set_rules($config);

    if($this->form_validation->run())
    {
      return "valid";
    }
    else
    {
      return array(validation_errors());
    }
  }

  //retrieve email, passed from controller
  public function retrieveByEmail($email)
  {
    $query = "SELECT * FROM users WHERE email = ?";
    $value = $this->db->query($query, array($email))->row_array();
    return $value;
  }


}

