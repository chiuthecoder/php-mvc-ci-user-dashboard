<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function create($content)
	{
		$query = "INSERT INTO products (name, description, price, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())";
		$result = $this->db->query( $query, array($content['name'],$content['description'],$content['price']));
		return $result;	
	}

	public function retrieveAll()
	{
		$query = "SELECT * FROM products";
		$products = $this->db->query( $query)->result_array();
		return $products;	
	}

	public function retrieveOne($id)
	{
		$query = "SELECT * FROM products WHERE id = $id";
		$product = $this->db->query( $query, array($id))->row_array();
		return $product;	
	}

	public function destroy($id)
	{
		$query = "DELETE FROM products WHERE id = $id";
		$result = $this->db->query( $query, array($id) );
		return $result;	
	}

	public function update($content)
	{
		$query = "UPDATE products SET name=?, description=?, price=? WHERE id = ?";
		$value = array($content['name'], $content['description'], $content['price'], $content['id'] );
		$result = $this->db->query( $query, $value);
		return $result;	
	}

	//find product list
	public function findAll()
	{
		return $this->db->get('products')->result();
	}

	public function find($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('products')->row();
	}
}
