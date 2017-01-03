<!DOCTYPE html>
<html>
<head>
	<title>Bảng điểu khiển</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<?= $this->Html->css('bootstrap.min') ?>
	<?= $this->Html->css('jquery-ui.min') ?>
	<?= $this->Html->css('font-awesome.min') ?>
	<?= $this->Html->css('jquery.simplecolorpicker') ?>
	<?= $this->Html->css('jquery.simplecolorpicker-regularfont') ?>
	<?= $this->Html->css('admin_style') ?>
	<?= $this->Html->script('jquery-2.0.0.min') ?>
	<?= $this->Html->script('admin') ?>
</head>
<body>
	<!--|||||||||||||||||||| Screen |||||||||||||||||||||||||||-->

	<div id="screen">
		<div class="lazy-loading">
			<i class="fa fa-spinner fa-pulse fa-4x"></i>
		</div>
		<div class="popup" style="display:none">
			<div class="order-item">
				<span class="popup-close"><i class="fa fa-remove fa-2x"></i></span>
				<div class="col-sm-6">
					<h2>Thông tin khách hàng</h2>
					<b>Đơn hàng số: </b><span id="id"></span><br>
					<b>Tên khách hàng: </b><span id="cus_name"></span><br>
					<b>Số điện thoại: </b><span id="cus_phone"></span><br>
					<b>Email: </b> <span id="cus_mail"></span><br>
					<b>Ghi chú: </b><span id="note"></span><br>
					<b>Phương thức thanh toán: </b><span id="payment"></span><br>
					<b>Ngày tạo: </b><span id="created"></span>
				</div>
				<div class="col-sm-6">
					<h2>Chi tiết đơn hàng</h2>
					<h4>Danh sách sản phẩm: </h3>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Mã SP</th>
								<th>Tên SP</th>
								<th>Cỡ</th>
								<th>Tổng cộng</th>
							</tr>
						</thead>
						<tbody id="product-list">
						</tbody>
						<tfoot>
							<tr>
								<td colspan="3">
									<b>Tổng tiền</b>
								</td>
								<td id="total-amount">
									
								</td>
							</tr>
						</tfoot>
					</table>
					<p>
						<b>Tình trạng thanh toán:</b> <span id="payment_status"></span>
					</p>
					<p>
						<b>Tình trạng gửi hàng:</b> <span id="status"></span>
					</p>
					<div id="action">
						<form action="#" method="POST">
							<input type="hidden" name="order_id" class="order_id">
							<input type="hidden" name="payment" id="payment_type">
							<button class="btn btn-success">Xác nhận giao hàng</button>
						</form>
						<form action="#" method="POST" style="margin-top: 10px;">
							<input type="hidden" name="order_id" class="order_id">
							<button class="btn btn-danger">Hủy giao hàng</button>
						</form>
					</div>
				</div>
				<br clear="all">
			</div>
		</div>
	</div>


	<!--|||||||||||||||||||||| End Screen |||||||||||||||||||||-->
	<div class="admin-container">

		<!--The header-->
		<header>

			<!--Logo-->
			<button class="sm-show admin-menu-toggle"><i class="fa fa-bars fa-2x"></i></button>
			<a class="header-title sm-hide" href="#">Bảng Điểu Khiển</a>
			<!--End logo-->

			<div class="header-right">

				<!--The greeting-->
				<div class="hi">
					<span class="sm-hide">Xin chào</span><a href="#">Đăng xuất</a>
				</div><!--End greeting-->

				<!--Visit page-->
				<div class="see">
					<a target="_blank" href="#"><i class="fa fa-eye"></i>&nbsp;<span>Xem trang</span></a>
				</div><!--Visit Page-->

			</div>
		</header><!--End Header-->

		<!--The navigation-->
		<?php 
			$dashboard = $product = $category = $order = $banner = $feedback = $user = ''; 
			$segment = explode('/', $this->request->here);
			$store = $home = $contact = '';
			switch ($segment[2]) {
				case 'products':
					$product = 'left-bar-active';
					break;
				case 'categories':
					$category = 'left-bar-active';
					break;
				case 'orders':
					$order = 'left-bar-active';
					break;
				case 'banners':
					$banner = 'left-bar-active';
					break;
				case 'feedbacks':
					$feedback = 'left-bar-active';
					break;
				case 'users':
					$user = 'left-bar-active';
					break;
				default:
					$dashboard = 'left-bar-active';
					break;
			}
		?>
		<!--The navigation-->
		<div class="left-bar">
			<a href="#" class="<?php echo $dashboard ?>"><i class="fa fa-dashboard"></i> Bảng tin</a>
			<a href="#" class="<?php echo $product ?>"><i class="fa fa-product-hunt"></i> Sản phẩm</a>
			<a href="#" class="<?php echo $category ?>"><i class="fa fa-list-ul"></i> Danh mục</a>
			<a href="#" class="<?php echo $order ?>"><i class="fa fa-list-alt"></i> Đơn hàng</a>
			<a href="#" class="<?php echo $banner ?>"><i class="fa fa-camera-retro"></i> Banner</a>
			<a href="#" class="<?php echo $feedback ?>"><i class="fa fa-comments"></i> Phản hồi</a>
			<a href="#" class="<?php echo $user ?>"><i class="fa fa-users"></i> Người dùng</a>

		</div><!--End navigation-->

		<div class="main">
			<?= $this->fetch('content') ?>
		</div>
	</div>
	
</body>
</html>