<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Canai $canai
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $canai->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $canai->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Canais'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Episodios'), ['controller' => 'Episodios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Episodio'), ['controller' => 'Episodios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Estatisticas'), ['controller' => 'Estatisticas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Estatistica'), ['controller' => 'Estatisticas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="canais form large-9 medium-8 columns content">
    <?= $this->Form->create($canai) ?>
    <fieldset>
        <legend><?= __('Edit Canai') ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('descricao');
            echo $this->Form->control('imagem');
            echo $this->Form->control('usuario_id', ['options' => $usuarios]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
