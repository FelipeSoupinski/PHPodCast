<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Episodio $episodio
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Episodio'), ['action' => 'edit', $episodio->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Episodio'), ['action' => 'delete', $episodio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $episodio->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Episodios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Episodio'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Canais'), ['controller' => 'Canais', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Canai'), ['controller' => 'Canais', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Favoritos'), ['controller' => 'Favoritos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Favorito'), ['controller' => 'Favoritos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="episodios view large-9 medium-8 columns content">
    <h3><?= h($episodio->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Titulo') ?></th>
            <td><?= h($episodio->titulo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($episodio->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Canai') ?></th>
            <td><?= $episodio->has('canai') ? $this->Html->link($episodio->canai->id, ['controller' => 'Canais', 'action' => 'view', $episodio->canai->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Arquivo') ?></th>
            <td><?= h($episodio->arquivo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($episodio->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data') ?></th>
            <td><?= h($episodio->data) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Favoritos') ?></h4>
        <?php if (!empty($episodio->favoritos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Episodio Id') ?></th>
                <th scope="col"><?= __('Usuario Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($episodio->favoritos as $favoritos): ?>
            <tr>
                <td><?= h($favoritos->id) ?></td>
                <td><?= h($favoritos->episodio_id) ?></td>
                <td><?= h($favoritos->usuario_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Favoritos', 'action' => 'view', $favoritos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Favoritos', 'action' => 'edit', $favoritos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Favoritos', 'action' => 'delete', $favoritos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $favoritos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
