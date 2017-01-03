<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $DatHangID
 * @property int $KhachHangID
 * @property string $Hoten
 * @property string $DienThoai
 * @property string $DiaChi
 * @property string $Email
 * @property \Cake\I18n\Time $NgayDat
 * @property int $TriGia
 * @property bool $DaGiao
 * @property \Cake\I18n\Time $NgayGiao
 * @property string $GhiChu
 * @property string $GioiTinh
 */
class Order extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'DatHangID' => false
    ];
}
