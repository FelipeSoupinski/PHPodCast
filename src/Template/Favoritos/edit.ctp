<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Favorito $favorito
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $favorito->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $favorito->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Favoritos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Episodios'), ['controller' => 'Episodios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Episodio'), ['controller' => 'Episodios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="favoritos form large-9 medium-8 columns content">
    <?= $this->Form->create($favorito) ?>
    <fieldset>
        <legend><?= __('Edit Favorito') ?></legend>
        <?php
            echo $this->Form->control('episodio_id', ['options' => $episodios]);
            echo $this->Form->control('usuario_id', ['options' => $usuarios]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
