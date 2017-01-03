<!--The title-->
<div class="title">
    <h2>Sản phẩm</h2>
    <span>Quản lý sản phẩm</span>
    <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'add']) ?>" class="grad-btn"><div class="icon"><i class="fa fa-plus"></i></div><div>Thêm sản phẩm</div></a>
</div><!--End title-->

<!--Panel error-->
<div class="alert alert-danger" id="connect-error">
  <strong><i class="fa fa-info-circle"></i> Lỗi!</strong> Mất kết nối!
</div><!--End panel error-->

<!--The list-->
<div class="panel panel-info">
    <div class="panel-heading">
        <i class="fa fa-product-hunt"></i> Danh sách sản phẩm
    </div>
    <div class="panel-body">

        <!--Search form-->
        <form class="filter" method="POST" action="#">
            <!--Session pagination-->
            <!--Product name input-->
            <div class="col-sm-5 name-filter">
                <input class="form-control" type="text" name="p_name" placeholder="Tên sản phẩm...." value="">
            </div><!--End product name input-->

            <!--Category List-->
            <div class="col-sm-5 cate-filter">
                <select name="cate" class="form-control">
                    <option value="0">Tất cả danh mục</option>
                    <?php foreach ($subcategories as $subcategory): ?>
                        <option value="<?= $subcategory->NhomspID ?>"><?= $subcategory->TenNhomsp ?></option>
                    <?php endforeach ?>
                </select>
            </div><!--End category list-->

            <!--Search button-->
            <div class="col-sm-2">
                <input type="submit" name="ok" value="Lọc" class="btn btn-info">
            </div><br clear="all"><!--End search button-->

        </form><!--End search form-->

        <!--Table-->
        <table class="table table-striped ">

            <!--Table title-->
            <tr>
                <th class="check-box"><input type="checkbox" name="checkAll" id="checkAll"></th>
                <th>Tên Sản Phẩm</th>
                <th class="table-price">Giá</th>
                <th class="table-status">T. Trạng</th>
                <th class="table-action">Hành động</th>
            </tr><!--End table title-->

            <!--Record list-->
            <?php foreach($products as $product): ?>
                <tr>
                    <!--Checkbox-->
                    <td class="check-box"><input type="checkbox" class="select" value="<?= $product->NhomspID ?>"></td>
                    <!--Product name-->
                    <td class="table-product">
                        <!--Product images-->
                        <?= $this->Html->image("upload/".$product->Hinh, ['class' => 'td-image', 'width' => '50px', 'height' => '50px']) ?>
                        <!--End product image-->
                        
                        <!--Product info-->
                        <div class="td-product-name">
                            <!--Product name-->
                            <b><?= $product->TenSanPham ?></b><br>

                            <!--Details-->
                        </div><br clear="all">                        
                    </td>
                    <!--Price-->

                    <!--Product price-->
                    <td class="table-price td-price">
                        <b>
                            <?= $product->GiaKM == 0 ? number_format($product->DonGia).' đ': number_format($product->GiaKM).' đ' ?> 
                        </b><br>
                        <span class="td-old-price"><?= $product->GiaKM != 0 ? number_format($product->DonGia).' đ':'' ?></span>
                    </td><!--End product price-->

                    <!--Status-->
                    <td class="table-status">
                        <label class="switch">
                          <input type="checkbox" class="input-status" <?= $product->NgungBan == 0?'checked':'' ?> value="<?= $this->Url->build(['controller' => 'Products', 'action' => 'status', $product->NhomspID]) ?>">
                          <div class="slider"></div>
                        </label>
                    </td>
                    <!--Action-->
                    <td class="table-action">
                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'edit', $product->NhomspID]) ?>"><i class="fa fa-wrench"></i></a> 
                        <a class="delete-product" href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'delete', $product->NhomspID]) ?>"><i class="fa fa-remove"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <!--End record list-->

        </table><!--End table-->

        <!--Delete Selected Rows-->
        <div class="delete-all">
            <button class="btn" id="delete-items">Xóa mục đã chọn</button>
            <input type="hidden" name="hidden" id="multi_delete" value="<?= $this->Url->build(['controller' => 'Products', 'action' => 'multiDelete']) ?>">
        </div>
    </div>
    <div class="panel-footer">
        <?= $this->Paginator->first('Trang đầu') ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->last('Trang cuối') ?>
    </div>
</div><!--End list-->

<!--Delete confirm dialog-->
<div id="delete-product-confirm" title="Bạn có chắc chắn?">
</div>
<?= $this->Html->script('jquery-ui.min') ?>
<?= $this->Html->script('confirm') ?>