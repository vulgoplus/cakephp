<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
* Home Controller
*/
class HomeController extends AppController
{

	public $paginate = [
		'limit' => 9
	];

	public function initialize(){
		parent::initialize();
		$this->loadComponent('Paginator');
		$this->loadComponent('Cart');
	}
	
	/**
	* Index function
	*/
	public function index(){
		$this->viewBuilder()->layout('home');
		$product = TableRegistry::get('products');
		

		$query = $product->find('all')
			->select(['SanphamID', 'TenSanPham', 'DonGia', 'Hinh', 'products.BiDanh', 'subcategories.TenNhomsp'])
			->join([
				'table' => 'subcategories',
				'conditions' => 'products.NhomspID = subcategories.NhomspID'
			])
			->limit(9)
			->order(['SanPhamId' => 'DESC']);
		
		$categories    = $this->getCategory();
		$subcategories = $this->getSubcategory();

		$this->set(compact('categories'));
		$this->set(compact('subcategories'));
		$this->set('products', $query);
	}

	/**
	* Category action
	*/
	public function category($alias){
		$this->viewBuilder()->layout('home');
		$product  = TableRegistry::get('products');
		
		$products = $product->find('all')
			->join([
				'table'      => 'subcategories',
				'conditions' => 'products.NhomspID = subcategories.NhomspID'
			])
			->where(['subcategories.BiDanh' => $alias]);

		$categories    = $this->getCategory();
		$subcategories = $this->getSubcategory();

		$this->set(compact('categories'));
		$this->set(compact('subcategories'));
		$this->set('products', $this->paginate($products));
	}

	/**
	* Product action
	*/
	public function product($alias){
		$this->viewBuilder()->layout('home');
		$product = TableRegistry::get('products');

		$result = $product->find('all')
			->where(['BiDanh' => $alias]);

		$detail = $result->first();

		$products = $product->find('all')
			->join([
				'table'      => 'subcategories',
				'conditions' => 'products.NhomspID = subcategories.NhomspID'
			])
			->where(['products.NhomspID' => $detail->NhomspID])
			->limit(9)
			->order('rand()');

		$categories    = $this->getCategory();
		$subcategories = $this->getSubcategory();

		$this->set(compact('categories'));
		$this->set(compact('subcategories'));
		$this->set(compact('detail'));
		$this->set('products', $products);
	}

	/**
	* Add to cart
	*/
	public function add($id){
		$this->viewBuilder()->layout('home');
		$product = TableRegistry::get('products');

		$item = $product->get($id);
		$product = $this->Cart->insert($id);
		$categories    = $this->getCategory();
		$subcategories = $this->getSubcategory();

		$this->set(compact('categories'));
		$this->set(compact('subcategories'));
		$this->set(compact('product'));
	}

	/**
	* Display Cart
	*/
	public function cart(){
		$this->viewBuilder()->layout('Home');

		$categories    = $this->getCategory();
		$subcategories = $this->getSubcategory();

		$this->set(compact('categories'));
		$this->set(compact('subcategories'));

	}

	/**
	* Destroy Cart
	*/
	public function destroy(){
		$this->viewBuilder()->layout('Home');
		$this->Cart->destroy();

		$categories    = $this->getCategory();
		$subcategories = $this->getSubcategory();

		$this->set(compact('categories'));
		$this->set(compact('subcategories'));

	}

	/**
	* Update cart
	*/
	public function update(){
		$this->Cart->update($this->request->data);
		$this->autoRender = false;
		$this->redirect(['action' => 'cart']);
	}

	/**
	* Delete item
	*/
	public function delete($id){
		$this->Cart->delete($id);
		$this->autoRender = false;
		$this->redirect(['action' => 'cart']);
	}

	/**
	* Search
	*/
	public function search(){
		$keyword   = $this->request->query('keyword');
		$product   = TableRegistry::get('products');
		$products  = $product->find('all')
			->select(['SanphamID', 'TenSanPham', 'DonGia', 'Hinh', 'products.BiDanh', 'subcategories.TenNhomsp'])
			->join([
				'table' => 'subcategories',
				'conditions' => 'products.NhomspID = subcategories.NhomspID'
			])
			->where(['TenSanPham LIKE' => '%'.$keyword.'%']);

		$categories    = $this->getCategory();
		$subcategories = $this->getSubcategory();

		$this->set(compact('categories'));
		$this->set(compact('subcategories'));
		$this->set(compact('products'));
		$this->viewBuilder()->layout('home');
	}

	/**
	* Store request
	*/
	public function store(){
		$product = TableRegistry::get('products');
		$query = $product->find('all')
			->select(['SanphamID', 'TenSanPham', 'DonGia', 'Hinh', 'products.BiDanh', 'subcategories.TenNhomsp'])
			->join([
				'table' => 'subcategories',
				'conditions' => 'products.NhomspID = subcategories.NhomspID'
			])
			->order(['SanPhamId' => 'DESC']);

		$categories    = $this->getCategory();
		$subcategories = $this->getSubcategory();

		$this->set(compact('categories'));
		$this->set(compact('subcategories'));
		$this->set('products',$this->paginate($query));
		$this->viewBuilder()->layout('home');
	}

	/**
	* contact request
	*/
	public function contact(){
		$this->viewBuilder()->layout('home');

		$categories    = $this->getCategory();
		$subcategories = $this->getSubcategory();

		$this->set(compact('categories'));
		$this->set(compact('subcategories'));
	}

	/**
	* Order
	*/
	public function order(){
		$this->viewBuilder()->layout('home');
		$this->loadModel('Orders');
		$orderDetails = TableRegistry::get('order_details');
		$data = $this->request->data;
		$data['TriGia'] = $this->Cart->totalAmount();

		$order = $this->Orders->newEntity();
		if($this->request->is('post')){
			$order = $this->Orders->patchEntity($order, $data);
			$result = $this->Orders->save($order);
			if($result){
				foreach ($this->Cart->cart() as $key => $value) {
					$item = $orderDetails->newEntity();
					$item->DatHangID = $result->DatHangID;
					$item->SanPhamID = $key;
					$item->SoLuong   = $value['qty'];
					$item->DonGia    = $value['amount'];
					$item->ThanhTien = $value['qty'] * $value['amount'];

					$orderDetails->save($item);
					$this->Cart->destroy();
				}
			}
		}

		$categories    = $this->getCategory();
		$subcategories = $this->getSubcategory();

		$this->set(compact('categories'));
		$this->set(compact('subcategories'));
		$this->set(compact('error'));
		
	}

	/**
	* Get all categories
	* @return Object: Category list
	*/
	public function getCategory(){
		$category    = TableRegistry::get('categories');
		$categories    = $category->find('all');
		return $categories;
	}



	/**
	* Get all Subcategories
	* @return Object: Subcategories list
	*/
	public function getSubcategory(){
		$subcategory = TableRegistry::get('subcategories');
		$subcategories = $subcategory->find('all');
		return $subcategories;
	}

	
}