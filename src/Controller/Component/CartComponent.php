<?php

namespace App\Controller\Component;

use Cake\controller\Component;
use Cake\ORM\TableRegistry;

class CartComponent extends Component{

	//////////////////////////////////

	public $maxQty = 99;

	//////////////////////////////////

	/**
	* Insert product to cart
	* @param $id  int: Product ID
	* @param $qty int: Product Qty
	*/
	public function insert($id, $qty = null) {

		$qty = is_numeric($qty)?$qty:1;
		$qty = abs($qty);
		$qty = $qty > $this->maxQty?$this->maxQty:$qty;

		if($qty == 0) {
			$this->delete($id);
		}

		$query = TableRegistry::get('Products');
		$product = $query->get($id);

		if(empty($product)) {
			return false;
		}

		$session = $this->request->session();

		if(!$session->check('Shop.'.$id)){

			$info = array(
				'name'   => $product['TenSanPham'],
				'price'  => $product['DonGia'],
				'qty'    => $qty,
				'amount' => $qty * $product['DonGia'],
				'image'  => $product['Hinh']
			);

			$session->write('Shop.'.$id, $info);

		}else{

			$info           = $session->read('Shop.'.$id);
			$info['qty']    += $qty;
			$info['amount'] = $info['qty']*$info['price'];

		}

		return $product;

	}

	////////////////////////////////


	/**
	* Update Cart
	* @param $data array: An array include quantity of products
	*/
	public function update($data) {
		$session = $this->request->session();
		foreach($session->read('Shop') as $id => $item){
			if($data[$id] == 0){
				$session->delete('Shop.'.$id);
			}else{
				$session->write('Shop.'.$id.'.qty', $data[$id]);
				$amount = $session->read('Shop.'.$id.'.amount');
				$session->write('Shop.'.$id.'.amount', $data[$id] * $amount);
			}
		}
	}


	/**
	* Delete Cart
	* @param $id int: Product ID
	*/
	public function delete($id) {
		$session = $this->request->session();
		$session->delete('Shop.'.$id);
	}

	///////////////////////////////

	/**
	* Destroy Cart
	*/
	public function destroy() {
		$this->request->session()->delete('Shop');
	}

	/**
	* Count number product
	* @return int: total product in cart
	*/
	public function total(){
		$session = $this->request->session();
		if(!$session->check('Shop')){
			return 0;
		}

		return count($session->read('Shop'));
	}


	/**
	* Total Amount
	* @return INT toal amount
	*/
	public function totalAmount(){
		$session = $this->request->session();
		if(!$session->check('Shop')){
			return 0;
		}

		$amount = 0;
		foreach($session->read('Shop') as $value){
			$amount += $value['amount'];
		}

		return $amount;
	}

	public function cart(){
		return $this->request->session()->read('Shop');
	}
}