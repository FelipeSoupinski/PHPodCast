<?php $this->layout = 'site' ?>

<?= $this->Html->css('meucanal.css') ?>

<main>
    <div class="center">
        <h2 class="centralizer">Meu canal</h2>
        <div class="underline-mc"></div>

        <div class="description">
            <div class="text-description">
                <h2><?= $canai->nome ?></h2>
                <div class="underline-dc"></div>
                <p><?= $canai->descricao ?></p>
                <?= $this->Html->link(
                    $this->Html->image('edit-icon.png', ['class' => 'control-icon','alt' => 'Editar canal']).'<p>Editar canal</p>',
                    ['controller' => 'Canais', 'action' => 'edit', $canai->id],
                    [ 'class' => 'control-link-container text-center', 'escape' => false]
                ); ?>
                <?= $this->Form->postLink(
                    $this->Html->image('del-icon.png', ['class' => 'control-icon','alt' => 'Excluir canal']).'<p>Excluir canal</p>',
                    ['action' => 'delete', $canai->id], 
                    ['class' => 'control-link-container text-center', 'escape' => false, 'confirm' => __('Você realmente deseja apagar este canal?')]) 
                ?>
            </div>

            <?= $this->Html->image('../files/canais/'.$canai->id.'/'.$canai->imagem, ['alt' => 'logo-podcast']) ?>
        </div>

        <div class="group-links">

            <?= $this->Html->link(
                $this->Html->image('contents/icon-mais.webp', ['alt' => 'adicionar-podcast']).'<span>Add novo Podcast</span>',
                ['controller' => 'Episodios', 'action' => 'add'],
                ['class' => 'img-p-btn', 'escape' => false]
            ); ?>

            <?= $this->Html->link(
                $this->Html->image('contents/view.png', ['alt' => 'ver-estatisticas']).'<span>Ver estatísticas</span>',
                ['controller' => 'Estatisticas', 'action' => 'canal', $canai->id],
                ['class' => 'img-p-btn right', 'escape' => false]
            ); ?>

        </div>

        <h2>Meus envios</h2>

        <?php foreach($episodios as $episodio){ ?>
            <div class="envio">
                <p>Postado em <?= date_format($episodio->data, 'd/m/Y') ?></p>
                <p><?= $episodio->titulo ?></p>
                <p><?= $episodio->descricao ?></p>
                <?= $this->Html->link(
                    $this->Html->image('edit-icon.png', ['class' => 'control-icon','alt' => 'Editar envio']).'<p>Editar envio</p>',
                    ['controller' => 'Episodios', 'action' => 'edit', $episodio->id],
                    [ 'class' => 'control-link-container text-center', 'escape' => false]
                ); ?>
                <?= $this->Form->postLink(
                    $this->Html->image('del-icon.png', ['class' => 'control-icon','alt' => 'Excluir envio']).'<p>Excluir envio</p>',
                    ['action' => 'delete', $episodio->id],
                    ['class' => 'control-link-container text-center', 'escape' => false]
                ); ?>
            </div>
        <?php } ?>
        
        <div class="mb-5"></div>

    </div>
</main>