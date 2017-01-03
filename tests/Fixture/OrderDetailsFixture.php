<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrderDetailsFixture
 *
 */
class OrderDetailsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'DatHangID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'SanPhamID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'SoLuong' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'DonGia' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ThanhTien' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_DatHangCT_SanPham' => ['type' => 'index', 'columns' => ['SanPhamID'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['DatHangID', 'SanPhamID'], 'length' => []],
            'FK_DatHangCT_DatHang' => ['type' => 'foreign', 'columns' => ['DatHangID'], 'references' => ['orders', 'DatHangID'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
            'FK_DatHangCT_SanPham' => ['type' => 'foreign', 'columns' => ['SanPhamID'], 'references' => ['products', 'SanphamID'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'DatHangID' => 1,
            'SanPhamID' => 1,
            'SoLuong' => 1,
            'DonGia' => 1,
            'ThanhTien' => 1
        ],
    ];
}
