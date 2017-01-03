<!--The title-->
<div class="title">
    <h2>Danh mục</h2>
    <span>Quản lý danh mục sản phẩm</span>
    <a href="<?= $this->Url->build(['controller' => 'Subcategories', 'action' => 'index']) ?>" class="grad-btn"><div class="icon"><i class="fa fa-list"></i></div><div>Danh sách Danh mục</div></a>
</div><!--End title-->

<!--Panel-->
<div class="panel panel-info">
    <div class="panel-heading">
        <i class="fa fa-plus"></i> Xóa danh mục sản phẩm
    </div>
    <div class="panel-body">
        
        <!--Begin form-->
        <?= $this->Form->create($subcategory, ['id' => 'edit-form', 'class' => 'form-horizontal form-add']) ?>
            <!--Category name-->
            <div class="form-group">
                <label class="control-label col-sm-2">Tên danh mục <span class="red">*</span>: </label>
                <div class="col-sm-10">
                    <?= $this->Form->input('TenNhomsp', ['class' => 'form-control input-90 highlight', 'placeholder' => 'Nhập tên danh mục', 'label' => false]) ?>
                </div>
            </div><!--END category name-->

            <div class="form-group">
                <label class="control-label col-sm-2">Danh mục cha <span class="red">*</span>: </label>
                <div class="col-sm-10">
                    <select name="PhanLoaiID" class="form-control">
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category->PhanLoaiID ?>"><?= $category->TenPhanLoai ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div><!--END category name-->

            <!--Submit button-->
            <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <input type="submit" name="ok" class="btn btn-warning btn-lg" value="CẬP NHẬT">
                </div>
            </div><!--End submit-->

        </form><!--End form-->
    </div>
</div><!--End panel-->
(<span class="red">*</span>) Những trường này là bắt buộc!
<hr>
<?= $this->Html->script('jquery.validate.min') ?>
<?= $this->Html->script('validation') ?>
