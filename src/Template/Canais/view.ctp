<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Canai $canai
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Canai'), ['action' => 'edit', $canai->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Canai'), ['action' => 'delete', $canai->id], ['confirm' => __('Are you sure you want to delete # {0}?', $canai->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Canais'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Canai'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Episodios'), ['controller' => 'Episodios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Episodio'), ['controller' => 'Episodios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Estatisticas'), ['controller' => 'Estatisticas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Estatistica'), ['controller' => 'Estatisticas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="canais view large-9 medium-8 columns content">
    <h3><?= h($canai->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($canai->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($canai->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Imagem') ?></th>
            <td><?= h($canai->imagem) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usuario') ?></th>
            <td><?= $canai->has('usuario') ? $this->Html->link($canai->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $canai->usuario->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($canai->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($canai->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($canai->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Episodios') ?></h4>
        <?php if (!empty($canai->episodios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Titulo') ?></th>
                <th scope="col"><?= __('Descricao') ?></th>
                <th scope="col"><?= __('Canai Id') ?></th>
                <th scope="col"><?= __('Data') ?></th>
                <th scope="col"><?= __('Arquivo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($canai->episodios as $episodios): ?>
            <tr>
                <td><?= h($episodios->id) ?></td>
                <td><?= h($episodios->titulo) ?></td>
                <td><?= h($episodios->descricao) ?></td>
                <td><?= h($episodios->canai_id) ?></td>
                <td><?= h($episodios->data) ?></td>
                <td><?= h($episodios->arquivo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Episodios', 'action' => 'view', $episodios->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Episodios', 'action' => 'edit', $episodios->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Episodios', 'action' => 'delete', $episodios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $episodios->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Estatisticas') ?></h4>
        <?php if (!empty($canai->estatisticas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nome') ?></th>
                <th scope="col"><?= __('Data') ?></th>
                <th scope="col"><?= __('Canai Id') ?></th>
                <th scope="col"><?= __('Total Ouvintes') ?></th>
                <th scope="col"><?= __('Horas Reproduzidas') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($canai->estatisticas as $estatisticas): ?>
            <tr>
                <td><?= h($estatisticas->id) ?></td>
                <td><?= h($estatisticas->nome) ?></td>
                <td><?= h($estatisticas->data) ?></td>
                <td><?= h($estatisticas->canai_id) ?></td>
                <td><?= h($estatisticas->total_ouvintes) ?></td>
                <td><?= h($estatisticas->horas_reproduzidas) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Estatisticas', 'action' => 'view', $estatisticas->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Estatisticas', 'action' => 'edit', $estatisticas->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Estatisticas', 'action' => 'delete', $estatisticas->], ['confirm' => __('Are you sure you want to delete # {0}?', $estatisticas->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
