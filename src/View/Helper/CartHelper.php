<?php

namespace App\View\Helper;

use Cake\View\Helper;

/**
* 
*/
class CartHelper extends Helper
{


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

	/**
	* Get cart
	*/

	public function cart(){
		return $this->request->session()->read('Shop');
	}
	
}