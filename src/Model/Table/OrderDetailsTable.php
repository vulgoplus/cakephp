<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrderDetails Model
 *
 * @method \App\Model\Entity\OrderDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\OrderDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OrderDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrderDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrderDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OrderDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrderDetail findOrCreate($search, callable $callback = null)
 */
class OrderDetailsTable extends Table
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

        $this->table('order_details');
        $this->displayField('DatHangID');
        $this->primaryKey(['DatHangID', 'SanPhamID']);
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
            ->integer('DatHangID')
            ->allowEmpty('DatHangID', 'create');

        $validator
            ->integer('SanPhamID')
            ->allowEmpty('SanPhamID', 'create');

        $validator
            ->integer('SoLuong')
            ->requirePresence('SoLuong', 'create')
            ->notEmpty('SoLuong');

        $validator
            ->integer('DonGia')
            ->requirePresence('DonGia', 'create')
            ->notEmpty('DonGia');

        $validator
            ->integer('ThanhTien')
            ->requirePresence('ThanhTien', 'create')
            ->notEmpty('ThanhTien');

        return $validator;
    }
}
