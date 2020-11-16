<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Episodio[]|\Cake\Collection\CollectionInterface $episodios
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Episodio'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Canais'), ['controller' => 'Canais', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Canai'), ['controller' => 'Canais', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Favoritos'), ['controller' => 'Favoritos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Favorito'), ['controller' => 'Favoritos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="episodios index large-9 medium-8 columns content">
    <h3><?= __('Episodios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titulo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descricao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('canai_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data') ?></th>
                <th scope="col"><?= $this->Paginator->sort('arquivo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($episodios as $episodio): ?>
            <tr>
                <td><?= $this->Number->format($episodio->id) ?></td>
                <td><?= h($episodio->titulo) ?></td>
                <td><?= h($episodio->descricao) ?></td>
                <td><?= $episodio->has('canai') ? $this->Html->link($episodio->canai->id, ['controller' => 'Canais', 'action' => 'view', $episodio->canai->id]) : '' ?></td>
                <td><?= h($episodio->data) ?></td>
                <td><?= h($episodio->arquivo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $episodio->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $episodio->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $episodio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $episodio->id)]) ?>
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
