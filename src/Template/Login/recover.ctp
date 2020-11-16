<?php $this->layout = 'login'; ?>

<div class="row content-center">
    <span class="nameLogo">Recuperar senha</span>
</div>
<div class="card">
    <div class="row">
        <div class="card-body">
            <?= $this->Form->create() ?>

            <div class="row content-center mt-3">
                <span class="label-recover">Informe seu email de cadastro</span>
            </div>

            <div class="input-group">
                <input type="email" name="email" class="form-control" placeholder="email" id="email">
            </div>

            <div class="row mt-5 mb-3 mr-3 ml-3">
                <span class="label-recover">
                    Após enviar, verifique a senha temporária que foi enviada ao seu email
                </span>
            </div>
           
            <?= $this->Form->button('Enviar', ['class' => 'btn-confirm mt-4']) ?>
            <?= $this->Form->end() ?>

            <hr>
            <div class="row content-center">
                <?= $this->Html->link('Voltar para login', ['controller' => 'Login', 'action' => 'login'], ['class' => 'login-link']) ?>
            </div>
        </div>
    </div>
    <!-- /.login-card-body -->
</div>