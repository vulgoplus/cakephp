<!--The title-->
<div class="title">
    <h2>Sản phẩm</h2>
    <span>Quản lý sản phẩm</span>
    <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index']) ?>" class="grad-btn"><div class="icon"><i class="fa fa-list"></i></div><div>Danh sách sản phẩm</div></a>
</div><!--End title-->

<!--Panel-->
<div class="panel panel-info">
    <div class="panel-heading">
        <i class="fa fa-plus"></i> Thêm sản phẩm
    </div>
    <div class="panel-body">
        <!--Begin form-->
            <?= $this->Form->create($product,['type' => 'file', 'id' => 'product-form', 'class' => 'form-horizontal form-add']) ?>
            <!--Product name-->
            <div class="form-group">
                <label class="control-label col-sm-2">Tên SP <span class="red">*</span>: </label>
                <div class="col-sm-10">
                <?= $this->Form->input('TenSanPham', ['class' => 'form-control input-90', 'placeholder' => 'Nhập tên sản phẩm', 'label' => false]) ?>
                </div>
            </div><!--Product name-->

            <!--Short description-->
            <div class="form-group">
                <label class="control-label col-sm-2">Mô tả ngắn <span class="red">*</span>: </label>
                <div class="col-sm-10">
                    <?= $this->Form->input('MoTa', ['class' => 'form-control input-90', 'placeholder' => 'Nhập mô tả', 'id' => 'MoTa', 'label' => false]) ?>
                </div>
            </div><!--End short description-->


            <!--Begin image-->
            <div class="form-group">
                <label class="control-label col-sm-2">Ảnh đại diện <span class="red">*</span>: </label>
                <div class="col-sm-10">
                    <div class="input-60">
                        <span class="hoder">Chưa chọn ảnh nào!</span>
                        <input type="file" name="Hinh" class="image">
                        <div class="browser">
                            <i class="fa fa-plus"></i>
                        </div>
                    </div>
                    <label id="image-error" class="error" for="image"></label>
                    <span style="color:#999">(*) Kích thước ảnh khuyên dùng: 230 x 300</span>
                </div>
            </div><!--End image-->


            <!--Price-->
            <div class="form-group">
                <label class="control-label col-sm-2">Giá (đ) <span class="red">*</span>:</label>
                <div class="col-sm-10">
                    <?= $this->form->input('DonGia', ['class' => 'form-control', 'style' => 'width:150px', 'label' => false]) ?>
                </div>
            </div><!--End price-->

            <!--Sale-->
            <div class="form-group">
                <label class="control-label col-sm-2">Giá KM (đ):</label>
                <div class="col-sm-10">
                <?= $this->form->input('GiaKM', ['class' => 'form-control', 'style' => 'width:150px', 'label' => false]) ?>
                </div>
            </div><!--End Sale-->


            <!--Cate category-->
            <div class="form-group">
                <label class="control-label col-sm-2">Danh mục:</label>
                <div class="col-sm-10">
                    <select class="form-control" style="width:auto" name="NhomspID">
                        <?php foreach($subcategories as $subcategory): ?>
                            <option value="<?= $subcategory->NhomspID ?>"><?= $subcategory->TenNhomsp ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div><!--End Category-->

            <!--Submit button-->
            <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <input class="btn btn-primary btn-lg" type="submit" value="THÊM" name="ok">
                </div>
            </div><!--End submit-->

        </form><!--End form-->
    </div>
</div><!--End panel-->
(<span class="red">*</span>) Những trường này là bắt buộc!
<hr>
<?= $this->Html->script('tinymce/tinymce.min') ?>
<?= $this->Html->script('jquery.validate.min') ?>
<?= $this->Html->script('validation') ?>
<script type="text/javascript">
    tinymce.init({ selector:'textarea#MoTa' });
</script>
