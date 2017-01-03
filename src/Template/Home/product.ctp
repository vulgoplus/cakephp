<!-- Product detail -->
<div class="products">
    <div class="cl">&nbsp;</div>
    <div class="product-detail-image">
        <?= $this->Html->image('upload/'.$detail['Hinh'],['width' => '230px', 'height' => '300px']) ?>
    </div>
    <div class="product-detail" >
        <h1>Chi tiết sản phẩm</h1>
        <br/>
        <h1 class="product-detail-name" ><?= $detail['TenSanPham'] ?></h1>
        <br/>
        <h4>MÃ SỐ: <?= $detail['SanphamID'] ?></h4>

        <strong class="price"><?= number_format($detail['DonGia']) ?> đồng</strong> 
        <br/>
        <h4>NGÀY CẬP NHẬT: <?= $detail['NgayCapNhat'] ?></h4>
        <br/>
        <div >  
            <?= $this->Html->link(
                $this->Html->image('cart.png'),
                ['controller' => 'home', 'action' => 'add', $detail['SanphamID']],
                ['escape' => false]
            ) ?>
        </div>
    </div>
</div>

<div style="clear: both">&nbsp;</div>
<div class="box">   
    <h2>Sản phẩm cùng nhóm <span></span></h2>
</div>
<div class="products">
    <div class="cl">&nbsp;</div>
    <ul>
        <?php foreach ($products as $product): ?>
            <li>
                <?= $this->Html->link(
                    $this->Html->image('upload/'.$product->Hinh, ['width' => '230px', 'height' => '300px']), [
                    'controller' => 'Home',
                    'action'     => 'product',
                    $product->BiDanh
                    ],
                    ['escape' => false]
                ) ?>
                <div class="product-info">
                    <h3><?= $product->TenSanPham ?> </h3>
                    <div class="product-desc">
                        <h4><?= $product->TenNhomsp ?></h4>

                        <strong class="price"><?= number_format($product->DonGia) ?></strong> </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
    <div class="cl">&nbsp;</div>
</div>
