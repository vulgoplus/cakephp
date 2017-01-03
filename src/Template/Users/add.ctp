<!--The title-->
<div class="title">
    <h2>Người dùng</h2>
    <span>Quản lý người dùng</span>
    <a href="#" class="grad-btn"><div class="icon"><i class="fa fa-list"></i></div><div>Danh sách</div></a>
</div><!--End title-->

<!--Panel error-->
<div class="alert alert-danger" id="connect-error">
  <strong><i class="fa fa-info-circle"></i> Lỗi!</strong> Mất kết nối!
</div><!--End panel error-->

<!--Panel-->
<div class="panel panel-info">
    <div class="panel-heading">
        <i class="fa fa-plus"></i> Thêm tài khoản
    </div>
    <div class="panel-body">
        
        <!--Begin form-->
        <?= $this->Form->create($user, ['id' => 'user-form', 'class' => 'form-horizontal form-add']) ?>

            <!--Username-->
            <div class="form-group">
                <label class="control-label col-sm-2">Tài khoản <span class="red">*</span>: </label>
                <div class="col-sm-10">
                    <?= $this->Form->input('username',['class' => 'form-control input-90', 'placeholder' => 'Tên người dùng', 'label' => false]) ?>
                </div>
            </div><!--End Username-->

            <!--Password-->
            <div class="form-group">
                <label class="control-label col-sm-2">Mật khẩu <span class="red">*</span>: </label>
                <div class="col-sm-10">
                    <?= $this->Form->input('password', ['class' => 'form-control input-90', 'placeholder' => 'Mật khẩu', 'label' => false]) ?>
                </div>
            </div><!--END password-->

            <!--Retype Password-->
            <div class="form-group">
                <label class="control-label col-sm-2">Nhập lại MK <span class="red">*</span>: </label>
                <div class="col-sm-10">
                    <input type="password" name="re_password" class="form-control input-90" placeholder="Nhập lại Mật khẩu">
                </div>
            </div><!--Product Retype password-->

            <!--Retype Password-->
            <div class="form-group">
                <label class="control-label col-sm-2">Email <span class="red">*</span>: </label>
                <div class="col-sm-10">
                    <?= $this->Form->input('email', ['class' => 'form-control input-90', 'placeholder' => 'Email', 'label' => false]) ?>
                </div>
            </div><!--End Retype password-->

            <!--Submit button-->
            <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <?= $this->Form->button(__('THÊM TÀI KHOẢN'), ['class' => 'btn btn-primary btn-lg']) ?>
                </div>
            </div><!--End submit-->

        <?= $this->Form->end() ?>
    </div>
</div><!--End panel-->
(<span class="red">*</span>) Những trường này là bắt buộc!
<hr>
<!--Echo check link here-->
<input type="hidden" name="check_url" value="#">

