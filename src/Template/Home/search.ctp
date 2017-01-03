<div class="box">
    <h2>Kết quả tìm kiếm</h2>
    <?= $this->request->here ?>
</div>
<div class="search-result">
    <br />
        <?php if(count($products) > 0 ) { ?>
            <ul id="MainContent_lstResult_itemPlaceholderContainer" style="font-family: Verdana, Arial, Helvetica, sans-serif; list-style-type:none">
            <?php foreach($products as $item): ?>    
            <li style="background-color: #DCDCDC;color: #000000; width:720px;overflow:auto">
                <div style="width:200px;float:left">
                    <?= $this->Html->link(
                        $this->Html->image('upload/'.$item->Hinh, ['width' => '170px', 'height' => '200px']), [
                        'controller' => 'Home',
                        'action'     => 'product',
                        $item->BiDanh
                        ],
                        ['escape' => false]
                    ) ?>
                </div>
                <div style="width:500px;float:right; font-size:1.2em; line-height:2;">
                Mã sản phẩm:
                <span id="MainContent_lstResult_MaSanPhamLabel_0"><?= $item->SanPhamID ?></span>
                <br />
                Tên sản phẩm:
                    <?= $this->Html->link($item->TenSanPham, [
                        'controller' => 'Home',
                        'action'     => 'product',
                        $item->BiDanh
                    ]) ?>
                <br />
                Nhóm sản phẩm:
                <span id="MainContent_lstResult_NhomSanPhamIDLabel_0"><?= $item->subcategories['TenNhomsp'] ?></span>
                <br />
               
                Đơn giá:
                <span id="MainContent_lstResult_DonGiaLabel_0" style="color:#FF3300;font-weight:bold;font-style:italic;"><?= number_format($item->DonGia) ?> đồng</span>
                <br />
                Ngày cập nhật:
                <span id="MainContent_lstResult_NgayCapNhatLabel_0"><?= $item->NgayCapNhat ?></span>
                <br />
                </div>
               
            </li>         
            <br/>
            <?php endforeach; ?>
        
            </ul>
        <?php } ?>
        <?php if(count($products) == 0) { ?>
    <p>Không có dữ liệu thỏa yêu cầu.</p>
        <?php } ?>
</div>