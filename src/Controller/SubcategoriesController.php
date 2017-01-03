<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Subcategories Controller
 *
 * @property \App\Model\Table\SubcategoriesTable $Subcategories
 */
class SubcategoriesController extends AppController
{

    public $paginate = [
        'limit' => 5
    ];

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->layout('admin');
        $subCategories = $this->paginate($this->Subcategories->find()->order(['NhomspID' => 'DESC']));

        $this->set(compact('subCategories'));
        $this->set('_serialize', ['subCategories']);
    }

    /**
     * View method
     *
     * @param string|null $id Subcategory id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $subcategory = $this->Subcategories->get($id, [
            'contain' => []
        ]);

        $this->set('subcategory', $subcategory);
        $this->set('_serialize', ['subcategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('admin');
        $this->loadComponent('Convert');
        $subcategory = $this->Subcategories->newEntity();
        if ($this->request->is('post')) {
            $subcategory = $this->Subcategories->patchEntity($subcategory, $this->request->data);
            $subcategory->BiDanh = $this->Convert->toUrl($subcategory->TenNhomsp);
            if ($this->Subcategories->save($subcategory)) {

                //Update alias for categories
                $subcategory->BiDanh = $subcategory->BiDanh.'-'.$subcategory->NhomspID;
                $this->Subcategories->save($subcategory);
                $this->Flash->success(__('The subcategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The subcategory could not be saved. Please, try again.'));
            }
        }
        $categoryTable = TableRegistry::get('categories');
        $categories     = $categoryTable->find('all');
        $this->set(compact('categories'));
        $this->set(compact('subcategory'));
        $this->set('_serialize', ['subcategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Subcategory id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('admin');
        $this->loadComponent('Convert');
        $subcategory = $this->Subcategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subcategory = $this->Subcategories->patchEntity($subcategory, $this->request->data);
            $subcategory->BiDanh = $this->Convert->toUrl($subcategory->TenNhomsp).'-'.$subcategory->NhomspID;
            if ($this->Subcategories->save($subcategory)) {
                $this->Flash->success(__('The subcategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The subcategory could not be saved. Please, try again.'));
            }
        }
        $categoryTable = TableRegistry::get('categories');
        $categories     = $categoryTable->find('all');
        $this->set(compact('categories'));
        $this->set(compact('subcategory'));
        $this->set('_serialize', ['subcategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Subcategory id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $subcategory = $this->Subcategories->get($id);
        if ($this->Subcategories->delete($subcategory)) {
            $this->Flash->success(__('The subcategory has been deleted.'));
        } else {
            $this->Flash->error(__('The subcategory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function multiDelete(){
        $ids = $this->request->data('ids');
        $this->Subcategories->deleteAll(['NhomspID IN' => $ids]);
        $this->autoRender = false;
    }
}
