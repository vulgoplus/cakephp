<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orders Model
 *
 * @method \App\Model\Entity\Order get($primaryKey, $options = [])
 * @method \App\Model\Entity\Order newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Order[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Order|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Order patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Order[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Order findOrCreate($search, callable $callback = null)
 */
class OrdersTable extends Table
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

        $this->table('orders');
        $this->displayField('DatHangID');
        $this->primaryKey('DatHangID');
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
            ->integer('KhachHangID')
            ->allowEmpty('KhachHangID');

        $validator
            ->requirePresence('Hoten', 'create')
            ->notEmpty('Hoten');

        $validator
            ->requirePresence('DienThoai', 'create')
            ->notEmpty('DienThoai');

        $validator
            ->allowEmpty('DiaChi');

        $validator
            ->requirePresence('Email', 'create')
            ->notEmpty('Email');

        $validator
            ->dateTime('NgayDat')
            ->allowEmpty('NgayDat');

        $validator
            ->integer('TriGia')
            ->allowEmpty('TriGia');

        $validator
            ->boolean('DaGiao')
            ->allowEmpty('DaGiao');

        $validator
            ->dateTime('NgayGiao')
            ->allowEmpty('NgayGiao');

        $validator
            ->allowEmpty('GhiChu');

        $validator
            ->allowEmpty('GioiTinh');

        return $validator;
    }
}
