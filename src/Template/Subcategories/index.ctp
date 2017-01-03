
<!--The title-->
<div class="title">
    <h2>Danh mục</h2>
    <span>Quản lý danh mục sản phẩm</span>
    <a href="<?= $this->Url->build(['controller' => 'Subcategories', 'action' => 'add']) ?>" class="grad-btn"><div class="icon"><i class="fa fa-plus"></i></div><div>Thêm danh mục</div></a>
</div><!--End title-->

<!--Panel error-->
<div class="alert alert-danger" id="connect-error">
  <strong><i class="fa fa-info-circle"></i> Lỗi!</strong> Mất kết nối!
</div><!--End panel error-->

<div class="panel panel-info">
    <div class="panel-heading">
        <i class="fa fa-list"></i> Danh sách danh mục
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <tr>
                <th class="check-box"><input type="checkbox" name="all" id="checkAll"></th>
                <th>Tên danh mục</th>
                <th class="table-action-show">Hành động</th>
            </tr>
            <?php foreach($subCategories as $subCategory): ?>
                <tr>
                    <!--CheckBox-->
                    <td class="check-box"><input type="checkbox" class="select" value="<?= $subCategory->NhomspID ?>"></td>
                    <!--Category name-->
                    <td>
                        <div class="td-product-name">
                            <b><?= $subCategory->TenNhomsp ?></b><br>
                        </div><br clear="all">
                    </td>
                    <!--Action-->
                    <td class="table-action-show">
                        <?= $this->Html->link('<i class="fa fa-wrench"></i>',[
                            'controller' => 'Subcategories',
                            'action'     => 'edit',
                            $subCategory->NhomspID
                            ],
                            ['escape' => false]) ?>
                        <?= $this->Html->link('<i class="fa fa-remove"></i>', [
                            'controller' => 'Subcategories',
                            'action'     => 'delete',
                            $subCategory->NhomspID,
                            ],
                            ['confirm' => 'Bạn có chắc muốn xóa mục này?',
                            'escape' => false]
                        ) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <!--Delete Selected Rows-->
        <div class="delete-all">
            <button class="btn" id="delAll">Xóa mục đã chọn</button>
            <input type="hidden" name="hidden" id="multi_delete" value="<?= $this->Url->build(['controller' => 'Subcategories', 'action' => 'multiDelete']) ?>">
        </div>
    </div>
    <div class="panel-footer">
        <?= $this->Paginator->first('Trang đầu') ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->last('Trang cuối') ?>
    </div>
</div>

<!--Confirm dialog-->
<div id="dialog-confirm" title="Bạn có chắc chắn?">
    <p>Việc xóa danh mục này đồng nghĩa với việc tất cả các sản phẩm trong danh mục sẽ được chuyển về mục chưa được phân loại!</p>
</div>
<?= $this->Html->script('jquery-ui.min') ?>
<?= $this->Html->script('confirm') ?>
