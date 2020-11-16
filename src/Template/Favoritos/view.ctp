<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Favorito $favorito
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Favorito'), ['action' => 'edit', $favorito->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Favorito'), ['action' => 'delete', $favorito->id], ['confirm' => __('Are you sure you want to delete # {0}?', $favorito->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Favoritos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Favorito'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Episodios'), ['controller' => 'Episodios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Episodio'), ['controller' => 'Episodios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="favoritos view large-9 medium-8 columns content">
    <h3><?= h($favorito->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Episodio') ?></th>
            <td><?= $favorito->has('episodio') ? $this->Html->link($favorito->episodio->id, ['controller' => 'Episodios', 'action' => 'view', $favorito->episodio->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usuario') ?></th>
            <td><?= $favorito->has('usuario') ? $this->Html->link($favorito->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $favorito->usuario->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($favorito->id) ?></td>
        </tr>
    </table>
</div>
