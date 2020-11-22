<?php $this->layout = 'site' ?>

<?= $this->Html->css('addpodcast.css') ?>

<main id="main-add">
    <div class="title-add">Adicionar Podcast</div>
    <div class="linha-horizontal"></div>

    <?= $this->Form->create($episodio, ['type' => 'file']) ?>

        <div class="row mt-4">
            <div class="col-sm-4">
                <span class="legend"> Título </span>
            </div>
            <div class="col-sm-8">
                <input type="text" name="titulo" id="input-titulo" required />
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-sm-4">
                <span class="legend"> Descrição </span>
            </div>
            <div class="col-sm-8">
                <input type="text" name="descricao" id="input-descricao" required />
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-sm-4">
                <span class="legend"> Arquivo de áudio </span>
            </div>
            <div class="col-sm-8">
                <input type="file" name="arquivo" id="input-arquivo" class="form-control" required />
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-sm text-center">
                <?= $this->Form->button(__('Confirmar'), ['class' => 'btn-confirm']) ?>
            </div>
        </div>

    <?= $this->Form->end() ?>

</main>
