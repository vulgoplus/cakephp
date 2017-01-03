<!-- Content Slider -->
<div id="slider" class="box">
    <div id="slider-holder">
        <ul>

            <li><a href="#"><?= $this->Html->image('slide1.jpg') ?></a></li>
            <li><a href="#"><?= $this->Html->image('slide2.jpg') ?></a></li>
            <li><a href="#"><?= $this->Html->image('slide3.jpg') ?></a></li>
            <li><a href="#"><?= $this->Html->image('slide4.jpg') ?></a></li>
        </ul>
    </div>
    <div id="slider-nav"> <a href="#" class="active">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> </div>
</div>
<!--End Content Slider -->
<!-- Products -->
<div class="products">
    <div class="cl">&nbsp;</div>
    <ul>
        <?php foreach ($products as $product): ?>
            <li > 
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
                        <h4><?= $product->subcategories['TenNhomsp'] ?></h4>

                        <strong class="price"><?= number_format($product->DonGia) ?></strong> </div>
                </div>
            </li>
        <?php endforeach; ?>
      </ul>
    <div class="cl">&nbsp;</div>
</div>
<!-- End Products -->