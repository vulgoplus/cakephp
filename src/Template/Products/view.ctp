<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->SanphamID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->SanphamID], ['confirm' => __('Are you sure you want to delete # {0}?', $product->SanphamID)]) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="products view large-9 medium-8 columns content">
    <h3><?= h($product->SanphamID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('TenSanPham') ?></th>
            <td><?= h($product->TenSanPham) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hinh') ?></th>
            <td><?= h($product->Hinh) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('BiDanh') ?></th>
            <td><?= h($product->BiDanh) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SanphamID') ?></th>
            <td><?= $this->Number->format($product->SanphamID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DonGia') ?></th>
            <td><?= $this->Number->format($product->DonGia) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('GiaKM') ?></th>
            <td><?= $this->Number->format($product->GiaKM) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NhomspID') ?></th>
            <td><?= $this->Number->format($product->NhomspID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NgayCapNhat') ?></th>
            <td><?= h($product->NgayCapNhat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NgungBan') ?></th>
            <td><?= $product->NgungBan ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('MoTa') ?></h4>
        <?= $this->Text->autoParagraph(h($product->MoTa)); ?>
    </div>
</div>
