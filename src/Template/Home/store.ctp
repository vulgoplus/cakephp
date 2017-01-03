<div class="box"><h2> <?= $this->Paginator->counter('Danh sách sản phẩm ({{count}} sản phẩm)') ?> </h2></div>
<!-- Products -->
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
<div class="pagination">
    <?= $this->Paginator->first('Trang đầu') ?>
    <?= $this->Paginator->numbers() ?>
    <?= $this->Paginator->last('Trang cuối') ?>
</div>