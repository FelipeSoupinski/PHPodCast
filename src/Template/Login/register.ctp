<?php $this->layout = 'login'; ?>

<div class="row content-center">
    <span class="nameLogo">Cadastro</span>
</div>
<div class="card">
    <div class="row">
        <div class="card-body">
            <?= $this->Form->create($usuario) ?>
            <div class="input-group">
                <input type="email" name="email" class="form-control" placeholder="email" id="email">
            </div>
            <div class="input-group">
                <input type="password" name="senha" class="form-control" placeholder="senha" id="senha">
            </div>
            <div class="input-group">
                <input type="text" name="nome" class="form-control" placeholder="nome completo" id="nome">
            </div>
            <div class="input-group">
                <input type="date" name="nascimento" class="form-control" placeholder="data de nascimento" id="nascimento">
            </div>      

            <div class="row content-center">
                <input type="checkbox" class="mr-2 mt-1" required>
                li e concordo com os termos
            </div>

            <div class="row content-center">
                <input type="checkbox" class="mr-2 mt-1">
                desejo receber emails da aplicação
            </div>
           
            <?= $this->Form->button('Registrar', ['class' => 'btn-confirm mt-4']) ?>
            <?= $this->Form->end() ?>

            <hr>
            <div class="row content-center">
                <?= $this->Html->link('Já possuo uma conta', ['controller' => 'Login', 'action' => 'login'], ['class' => 'login-link']) ?>
            </div>
        </div>
    </div>
    <!-- /.login-card-body -->
</div>