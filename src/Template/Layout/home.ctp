<?php
    $segment = explode('/', $this->request->here);
    $store = $home = $contact = '';
    $segment[3] = isset($segment[3])?$segment[3]:'';
    switch ($segment[3]) {
        case 'store':
            $store = 'active';
            break;
        case 'contact':
            $contact = 'active';
            break;
        case '':
            $home = 'active';
            break;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Shop Around</title>
        <meta charset="utf-8"/>
        <?= $this->Html->css('style') ?>
        <?= $this->Html->css('table') ?>
        <!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
        <?= $this->Html->script('jquery-1.4.1.min.js') ?>
        <?= $this->Html->script('jquery.jcarousel.pack.js') ?>
        <?= $this->Html->script('jquery-func.js') ?>
        <script>
            $(function () {
                $(".products li:eq(2)").addClass("last");
                $(".products li:eq(5)").addClass("last");
                $(".products li:eq(8)").addClass("last");
            })
        </script>
    </head>
    <body>
        <!-- Shell -->
        <div class="shell">
            <!-- Header -->
            <div id="header">
                 <h1 id="logo"><?= $this->Html->link('shoparound', ['controller' => 'Home', 'action' => 'index']) ?></h1>
                <!-- Cart -->
                <div id="cart"> 
                    <?= $this->Html->link('Giỏ hàng', ['controller' => 'Home', 'action' => 'cart'], ['class' => 'cart-link']) ?>
                    <div class="cl">&nbsp;</div>
                    <span>Tổng số lượng: <strong><?= $this->Cart->total() ?></strong></span> &nbsp;&nbsp; <span> Tổng đơn giá: <strong><?= number_format($this->Cart->totalAmount()) ?> đ</strong></span> </div>
                <!-- End Cart -->
                <!-- Navigation -->
                <div id="navigation">
                    <ul>
                        <li><?= $this->Html->link('Trang chủ',['controller' => 'Home', 'action' => 'index'], ['class' => $home]) ?></li>
                        <li><?= $this->Html->link('Cửa hàng', ['controller' => 'Home', 'action' => 'store'], ['class' => $store]) ?></li>
                        <li><?= $this->Html->link('Liên hệ', ['controller' => 'Home', 'action' => 'contact'], ['class' => $contact]) ?></li>
                    </ul>
                </div>
                <!-- End Navigation -->
            </div>
            <!-- End Header -->
            <!-- Main -->
            <div id="main">
                <div class="cl">&nbsp;</div>
                <!-- Content -->
                <div id="content">

                    <!--||||||||||||||||||||||||||||||-->
                    <?= $this->fetch('content') ?>
                    <!--||||||||||||||||||||||||||||||-->

                </div>
                <!-- End Content -->
                <!-- Sidebar -->
                <div id="sidebar">
                    <!-- Search -->
                    <div class="box search">
                        <h2>Tìm kiếm theo <span></span></h2>
                        <div class="box-content">
                            <form action="<?= $this->URL->build(['controller' => 'Home', 'action' => 'search']) ?>" method="get">
                                <label>Từ khóa</label>
                                <input type="text" name="keyword" class="field" placeholder="Nhập từ khóa cần tìm" />
                                <input type="submit" class="search-submit" value="Tìm kiếm" />
                            </form>
                        </div>
                    </div>
                    <!-- End Search -->
                    <!-- Categories -->
                   <div class="box categories">
                        <h2>Phân loại / Nhóm sản phẩm <span></span></h2>
                            <div class="box-content">
                                <ul class="menu">
                                    <?php foreach ($categories as $category): ?>
                                        <li>
                                            <a href="#" ><?= $category->TenPhanLoai; ?></a>
                                            <ul class="subMenu">
                                                <?php foreach ($subcategories as $key => $subcategory): ?>
                                                    <?php if ($subcategory->PhanLoaiID == $category->PhanLoaiID): ?>
                                                        <li><?= $this->Html->link($subcategory->TenNhomsp,['controller' => 'Home', 'action' => 'category', $subcategory->BiDanh]) ?></a></li>
                                                        <?php unset($subcategories->$key) ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </ul>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                   </div>
                    <!-- End Categories -->
                </div>
                <!-- End Sidebar -->
                <div class="cl">&nbsp;</div>
            </div>
            <!-- End Main -->
            <!-- Side Full -->
            <div class="side-full">
                <!-- More Products -->
                <div class="more-products">
                    <div class="more-products-holder">
                        <ul>
                            <li><a href="#"><?= $this->Html->image('small1.jpg') ?></a></li>
                            <li><a href="#"><?= $this->Html->image('small2.jpg') ?></a></li>
                            <li><a href="#"><?= $this->Html->image('small3.jpg') ?></a></li>
                            <li><a href="#"><?= $this->Html->image('small4.jpg') ?></a></li>
                            <li><a href="#"><?= $this->Html->image('small5.jpg') ?></a></li>
                            <li><a href="#"><?= $this->Html->image('small6.jpg') ?></a></li>
                            <li><a href="#"><?= $this->Html->image('small7.jpg') ?></a></li>
                            <li><a href="#"><?= $this->Html->image('small1.jpg') ?></a></li>
                            <li><a href="#"><?= $this->Html->image('small2.jpg') ?></a></li>
                            <li><a href="#"><?= $this->Html->image('small3.jpg') ?></a></li>
                            <li><a href="#"><?= $this->Html->image('small4.jpg') ?></a></li>
                            <li><a href="#"><?= $this->Html->image('small5.jpg') ?></a></li>
                            <li><a href="#"><?= $this->Html->image('small6.jpg') ?></a></li>
                            <li><a href="#"><?= $this->Html->image('small7.jpg') ?></a></li>
                            <li><a href="#"><?= $this->Html->image('small1.jpg') ?></a></li>
                            <li><a href="#"><?= $this->Html->image('small2.jpg') ?></a></li>
                            <li><a href="#"><?= $this->Html->image('small3.jpg') ?></a></li>
                            <li><a href="#"><?= $this->Html->image('small4.jpg') ?></a></li>
                            <li><a href="#"><?= $this->Html->image('small5.jpg') ?></a></li>
                            <li><a href="#"><?= $this->Html->image('small6.jpg') ?></a></li>
                            <li class="last"><a href="#"><?= $this->Html->image('small7.jpg') ?></a></li>
                        </ul>
                    </div>
                    <div class="more-nav"> <a href="#" class="prev">previous</a> <a href="#" class="next">next</a> </div>
                </div>
                <!-- End More Products -->
                <!-- Text Cols -->
                <div class="cols">
                    <div class="cl">&nbsp;</div>
                    <div class="col">
                        <h3 class="ico ico1">Giao hàng qua nước ngoài</h3>
                        <p>Chúng tôi có hỗ trợ giao hàng qua nước ngoài với chi phí ship phù hợp với mọi loại đối tượng.</p>
                    </div>
                    <div class="col">
                        <h3 class="ico ico2">Hỗ trợ tư vấn</h3>
                        <p>Hỗ trợ tư vấn nhiệt tình 24/7. Giúp quý khách giải tỏa thắc mắc.</p>

                    </div>
                    <div class="col">
                        <h3 class="ico ico3">Quà tặng khuyến mãi</h3>
                        <p>Chúng tôi thường tổ chức các chương trình khuyến mãi vào dịp lễ tết.</p>
                    </div>
                    <div class="col col-last">
                        <h3 class="ico ico4">Đảm bảo </h3>
                        <p>Chúng tôi cam đoan sẽ giao hàng cho bạn trong vòng 48h đồng hồ kể từ khi xác nhận đơn đặt hàng của bạn.</p>
                    </div>
                    <div class="cl">&nbsp;</div>
                </div>
                <!-- End Text Cols -->
            </div>
            <!-- End Side Full -->
            <!-- Footer -->
            <div id="footer">
                <p class="left"> <a href="../home/index.html">Trang chủ</a> <span>|</span> <a href="../product/store.html">Cửa hàng</a> <span>|</span> <a href="../home/contact.html">Liên hệ</a> </p>
                <p class="right"> &copy; 2010 Shop Around. Design by <a target='_blank' href="https://www.facebook.com/vuongemperor">Emperor Company</a> </p>
            </div>
            <!-- End Footer -->
        </div>
        <!-- End Shell -->
    </body>
</html>
