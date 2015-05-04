<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		// $this->load->library('cart');
	}

	public function adminIndex()
	{
		$products = $this->product->retrieveAll();
		$this->load->view('landing_page', array('products' => $products));
	}

	public function newProduct()
	{
		$this->load->view('new_review');
	}

	public function create()
	{
		$result = $this->product->create($this->input->post());
		if($result)
		{
			redirect('/');
		}
		else
		{
			echo "Network is not working!";
		}
	}

	public function destroyReview()
	{
		$id = $this->input->post('id');
		$product = $this->product->retrieveOne($id);
		$this->load->view('destroy_review', array('product' => $product));
	}

	public function destroy()
	{
		$this->product->destroy($this->input->post('id'));
		redirect('/');
	}

	public function showReview()
	{
		$id = $this->input->post('id');
		$product = $this->product->retrieveOne($id);
		$this->load->view('show_review', array('product' => $product));
	}

	public function editReview()
	{
		$id = $this->input->post('id');
		$product = $this->product->retrieveOne($id);
		$this->load->view('edit_review', array('product' => $product));
	}

	public function update()
	{
		$this->product->update($this->input->post());
		redirect('/');
	}

	//load product list
	public function index($index = 0)
	{
		// die('here');
		$data['listProduct'] = $this->product->findAll();
		$this->load->view('productList', $data);
	}
}
