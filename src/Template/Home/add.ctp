<h1>Thêm thành công vào giỏ hàng</h1>
<p></p>
<p>Bạn vừa thêm thành công sản phẩm <?= $product['TenSanPham'] ?>có giá <?= number_format($product['DonGia']) ?> vào giỏ hàng.</p>
<p></p>
<p>
	Bạn có thể kiểm tra giỏ hàng của mình <?= $this->Html->link('tại đây', ['controller' => 'home', 'action' => 'cart']) ?>
	hoặc <?= $this->Html->link('Về trang chủ', ['controller' => 'home', 'action' => 'index']) ?>
</p>