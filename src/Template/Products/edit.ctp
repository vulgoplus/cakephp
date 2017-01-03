<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $product->SanphamID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $product->SanphamID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="products form large-9 medium-8 columns content">
    <?= $this->Form->create($product) ?>
    <fieldset>
        <legend><?= __('Edit Product') ?></legend>
        <?php
            echo $this->Form->input('TenSanPham');
            echo $this->Form->input('MoTa');
            echo $this->Form->input('DonGia');
            echo $this->Form->input('GiaKM');
            echo $this->Form->input('Hinh');
            echo $this->Form->input('NhomspID');
            echo $this->Form->input('NgayCapNhat');
            echo $this->Form->input('NgungBan');
            echo $this->Form->input('BiDanh');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
