<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shoppingcart extends CI_Controller {

	function isExit($id)
	{
		foreach( $this->cart->contents() as $items)
		{
			if($items['id'] == $id)
			{
				return $items['rowid'];
			}
			return -1;
		}
	}

	function getQuantity($id)
	{
		$i = 0;
		foreach ($this->cart->contents() as $items)
		{
			if($items['id'] == $id)
			{
				$i += $items['qty'];
			}
			return $i;
		}

	}
	//load login/Registration view
	public function buy($id)
	{
		
		$product = $this->product->find($id);
		$data = array(
               'id'      => $product->id,
               'qty'     => 1,
               'price'   => $product->price,
               'name'    => $product->name
            );


		$this->cart->insert($data);
		$this->load->view('cart');
		
	}

	function delete($rowid)
	{
		$this->cart->update( array('rowid' => $rowid, 'qty' => 0 ) );
		$this->load->view('cart');
	}

	function viewcart()
	{
		$this->load->view('cart');
	}

	function update()
	{
		$i = 1;
		foreach ($this->cart->contents() as $items)
		{
			$this->cart->update( array('rowid' => $items['rowid'], 'qty' => $_POST['qty'.$i]) );
			$i++;
		}
		$this->load->view('cart');

	}



}
