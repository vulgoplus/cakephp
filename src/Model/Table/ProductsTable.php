<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, callable $callback = null)
 */
class ProductsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('products');
        $this->displayField('SanphamID');
        $this->primaryKey('SanphamID');
        $this->belongsTo('Subcategories', [
            'className' => 'Subcategories',
            'foreignKey' => 'NhomspID'
        ]);

        $this->addBehavior('Utils.Uploadable', [
          'Hinh' => [
            'field' => 'SanphamID',
            'path' => '{ROOT}{DS}{WEBROOT}{DS}uploads{DS}',
            'fileName' => '{field}.{extension}'
            ],
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {

        $validator
            ->requirePresence('TenSanPham', 'create')
            ->notEmpty('TenSanPham');

        $validator
            ->allowEmpty('MoTa');

        $validator
            ->integer('DonGia')
            ->requirePresence('DonGia', 'create')
            ->notEmpty('DonGia');

        $validator
            ->allowEmpty('Hinh');

        $validator
            ->integer('NhomspID')
            ->requirePresence('NhomspID', 'create')
            ->notEmpty('NhomspID');


        $validator
            ->allowEmpty('BiDanh');

        return $validator;
    }

}
