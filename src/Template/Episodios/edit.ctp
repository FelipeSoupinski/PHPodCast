<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Episodio $episodio
 */
    $this->layout = 'site';
    echo $this->Html->css('editarepisodio.css');
?>
<div class="episodios form large-9 medium-8 columns content">
    <?= $this->Form->create($episodio, ['class' => 'form-edit']) ?>
    <fieldset>
        <legend><?= __('Editar episodio') ?></legend>
        <?php
            echo $this->Form->control('titulo', ['class' => 'input-text']);
            echo $this->Form->control('descricao', ['class' => 'input-description']);
            echo $this->Form->control('arquivo', ['type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'submit-form']) ?>
    <?= $this->Form->end() ?>
</div>
