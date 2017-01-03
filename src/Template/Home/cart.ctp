    <div class="box">
        <h2>Giỏ hàng của bạn<span></span></h2> 
    </div>
    <?php if($this->Cart->total() == 0) { ?> 
    <div style="text-align:center">
        <?= $this->Html->image('empty_cart.png') ?>
        <h3>Giỏ hàng của bạn rỗng. Hãy chọn sản phẩm và đặt vào giỏ ngay.</h3>
    </div>
    <?php } ?>
    <?php if($this->Cart->total() > 0 ) { ?>
    <div class="pull-left">
        <?= $this->Html->image('cart.png') ?>
    </div>
    <div class="shoppingcart-info" >
          <h2>Tổng số lượng: <?= $this->Cart->total() ?> sản phẩm</h2>
          <h2>Tổng đơn giá: <?= number_format($this->Cart->totalAmount()) ?> đồng</h2>
    </div>
    <div class="wrapper">
        <form class="table" method="post" action="<?= $this->Url->build(['controller' => 'Home', 'action'  => 'update']) ?>">  
            <div class="row header">
                <div class="cell">
                    
                </div>
                <div class="cell">
                    Tên sản phẩm
                </div>
                <div class="cell">
                    Đơn giá
                </div>
                <div class="cell">
                    Số lượng
                </div>
                <div class="cell">
                    Thành tiền
                </div>
                <div class="cell">
                    
                </div>
            </div>
            
            <?php foreach($this->Cart->cart() as $key => $item): ?>
            <div class="row">
                <div class="cell">
                    <?= $this->Html->image('upload/'.$item['image'],['width' => '70px', 'height' => '70px']) ?>
                </div>
                <div class="cell" >
                    <?= $item['name'] ?>
                </div>
                <div class="cell">
                    <?= number_format($item['price']); ?> đ
                </div>
                <div class="cell">
                    <input type="number" name="<?= $key ?>" value="<?= $item['qty'] ?>" style="width: 40px; padding: 5px">
                </div>
                <div class="cell">
                    <?= $item['amount']; ?> đ
                </div>
                 <div class="cell">
                    <?= $this->Html->link('Xóa', ['controller' => 'Home', 'action' => 'delete', $key], ['class' => 'btn btn-default', 'style' => 'text-decoration: none', 'confirm' => 'Bạn có chắc muốn xóa?']) ?>
                </div>
            </div>
            <?php endforeach; ?>
            <button class="btn btn-default" style="text-decoration: none" >Cập nhật</a>
        </form>

    </div>
    <a href="../../controler/product/store.php">Mua tiếp</a>
    <br/><br/>
    <div id="order" >
        <div class="box">
            <h2>Form Đặt hàng <span></span></h2>
        </div>
        <p>Nhập các thông tin bên dưới để thực hiện đặt hàng online. Chúng tôi sẽ liên lạc với bạn qua SĐT hoặc Email mà
            bạn cung cấp khi nhận được đơn hàng để thực hiện xác nhận việc đặt hàng.</p>
        <form action="<?= $this->URL->build(['controller' => 'Home', 'action' => 'order']) ?>" method="post">
            <table class="table-order">
                <tr>
                    <td>Họ đệm: </td>
                    <td colspan="3"><input type="text" name="Hoten" style="width: 100%"/></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><input type="text" name="Email" /></td>
                    <td>SĐT: </td>
                    <td><input type="text" name="DienThoai" /></td>
                </tr>
                 <tr>
                    <td>Địa chỉ: </td>
                    <td colspan="3"><input style="width:100%" type="text" name="DiaChi" /></td>
                </tr>
                <tr>
                    <td>Giới tính: </td>
                    <td>
                        <input type="radio" checked="checked" name="GioiTinh" value="0" /> Nam
                        <input type="radio" name="GioiTinh" value="1" /> Nữ
                    </td>
                </tr>
                <tr>
                    <td> </td>
                    <td colspan="3">
                        <input type="submit" name="submit" style="background:#8b0000" class="buy-submit" value="Xác nhận" />
                    </td>
                </tr>
            </table>
        </form>
     </div>
    <?php } ?>
