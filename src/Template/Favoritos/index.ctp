<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Favorito[]|\Cake\Collection\CollectionInterface $favoritos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Favorito'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Episodios'), ['controller' => 'Episodios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Episodio'), ['controller' => 'Episodios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="favoritos index large-9 medium-8 columns content">
    <h3><?= __('Favoritos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('episodio_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usuario_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($favoritos as $favorito): ?>
            <tr>
                <td><?= $this->Number->format($favorito->id) ?></td>
                <td><?= $favorito->has('episodio') ? $this->Html->link($favorito->episodio->id, ['controller' => 'Episodios', 'action' => 'view', $favorito->episodio->id]) : '' ?></td>
                <td><?= $favorito->has('usuario') ? $this->Html->link($favorito->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $favorito->usuario->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $favorito->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $favorito->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $favorito->id], ['confirm' => __('Are you sure you want to delete # {0}?', $favorito->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
