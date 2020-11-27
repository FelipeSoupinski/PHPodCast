<?php $this->layout = 'site' ?>

<?= $this->Html->css('addpodcast.css') ?>
<?= $this->Html->css('cadastrarcanal.css') ?>

<main>
    <div class="title-add">Editar Canal</div>
    <div class="linha-horizontal"></div>

    <?= $this->Form->create($canai, ['type' => 'file']) ?>

        <div class="row mt-4">
            <div class="col-sm-4">
                <span class="legend"> Nome do Canal</span>
            </div>
            <div class="col-sm-8">
                <input type="text" class="input-text" name="nome" value="<?= $canai->nome ?>" />
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-sm-4">
                <span class="legend"> Categoria </span>
            </div>
            <div class="col-sm-8">
                <input type="text" class="input-text" name="categoria" value="<?= $canai->categoria ?>" />
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-sm-4">
                <span class="legend"> Descrição do canal </span>
            </div>
            <div class="col-sm-8">
                <input type="text" class="input-description" name="descricao" value="<?= $canai->descricao ?>" />
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-sm-4">
                <span class="legend"> Imagem </span>
            </div>
            <div class="col-sm-5">
                <input type="file" class="input-imagem form-control" name="imagem"/>
            </div>
            <div class="col-sm-3 mt-">
                <?= $this->Html->image('contents/podcast-img-4.jpg', ['class' => 'img-cadastrarcanal']) ?>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-sm text-center">
                <?= $this->Form->button(__('Confirmar'), ['class' => 'btn-confirm mb-5']) ?>
            </div>
        </div>

    <?= $this->Form->end() ?>
</main>
