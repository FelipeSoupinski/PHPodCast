<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Usuario'), ['action' => 'edit', $usuario->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Usuario'), ['action' => 'delete', $usuario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuario->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Canais'), ['controller' => 'Canais', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Canai'), ['controller' => 'Canais', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Favoritos'), ['controller' => 'Favoritos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Favorito'), ['controller' => 'Favoritos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usuarios view large-9 medium-8 columns content">
    <h3><?= h($usuario->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($usuario->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($usuario->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Senha') ?></th>
            <td><?= h($usuario->senha) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Imagem') ?></th>
            <td><?= h($usuario->imagem) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($usuario->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($usuario->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($usuario->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Canais') ?></h4>
        <?php if (!empty($usuario->canais)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nome') ?></th>
                <th scope="col"><?= __('Descricao') ?></th>
                <th scope="col"><?= __('Imagem') ?></th>
                <th scope="col"><?= __('Usuario Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($usuario->canais as $canais): ?>
            <tr>
                <td><?= h($canais->id) ?></td>
                <td><?= h($canais->nome) ?></td>
                <td><?= h($canais->descricao) ?></td>
                <td><?= h($canais->imagem) ?></td>
                <td><?= h($canais->usuario_id) ?></td>
                <td><?= h($canais->created) ?></td>
                <td><?= h($canais->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Canais', 'action' => 'view', $canais->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Canais', 'action' => 'edit', $canais->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Canais', 'action' => 'delete', $canais->id], ['confirm' => __('Are you sure you want to delete # {0}?', $canais->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Favoritos') ?></h4>
        <?php if (!empty($usuario->favoritos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Episodio Id') ?></th>
                <th scope="col"><?= __('Usuario Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($usuario->favoritos as $favoritos): ?>
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
