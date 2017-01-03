
<!--The title-->
<div class="title">
	<h2>Người dùng</h2>
	<span>Quản lý người dùng</span>
	<a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'add']) ?>" class="grad-btn"><div class="icon"><i class="fa fa-plus"></i></div><div>Thêm tài khoản</div></a>
</div><!--End title-->

<div class="panel panel-info">
	<div class="panel-heading">
		<i class="fa fa-users"></i> Danh sách người dùng
	</div>
	<div class="panel-body">
		<table class="table table-striped">
			<tr>
				<th class="check-box"><input type="checkbox" name="all" id="checkAll"></th>
				<th>Tài khoản</th>
				<th class="td-email">Email</th>
				<th class="table-status-show">Tình trạng</th>
				<th class="table-action-show">Hành động</th>
			</tr>
			<?php foreach($users as $user): ?>
				<tr>
					<!--CheckBox-->
					<td class="check-box"><input type="checkbox" class="select" value="<?= $user->id ?>"></td>
					<!--Category name-->
					<td class="middle">
						<b><?= $user->username ?></b><br>
					</td>

					<!--Group-->
					<td class="middle td-email">
						<?= $user->email ?>
					</td><!--End group-->
					<!--Status-->
					<td class="table-status-show">
						<label class="switch">
						  <input class="input-status" type="checkbox" <?= $user->status==1?'checked':'' ?> value="<?= $this->Url->build(['controller' => 'Users', 'action' => 'changeStatus', $user->id]) ?>">
						  <div class="slider"></div>
						</label>
					</td>
					<!--Action-->
					<td class="table-action-show">
						<a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'edit', $user->id]) ?>"><i class="fa fa-wrench"></i></a> 
						<a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'delete', $user->id]) ?>" class="delete"><i class="fa fa-remove"></i></a>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
		<!--Delete Selected Rows-->
		<div class="delete-all">
			<button class="btn" id="delAll">Xóa mục đã chọn</button>
			<input type="hidden" name="hidden" id="multi_delete" value="<?= $this->Url->build(['controller' => 'Users', 'action' => 'multiDelete']) ?>">
		</div>
	</div>
	<div class="panel-footer">
		<!--Place pagination link here-->
	</div>
</div>

<!--Confirm dialog-->
<div id="dialog-confirm" title="Bạn có chắc chắn?">
	<p>Việc xóa danh mục này đồng nghĩa với việc tất cả các sản phẩm trong danh mục sẽ được chuyển về mục chưa được phân loại!</p>
</div>
<?= $this->Html->script('jquery-ui.min') ?>
<?= $this->Html->script('confirm') ?>