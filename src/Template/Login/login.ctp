<?php $this->layout = 'login'; ?>

<div class="row content-center">
    <span class="nameLogo">Podcast Play</span>
</div>
<div class="card">
    <div class="row">
        <div class="card-body">
            <?= $this->Html->image('usuario.png', ['class' => 'user-logo']) ?>
            <?= $this->Form->create() ?>
            <div class="input-group">
                <input type="email" name="email" class="form-control" placeholder="email" id="email">
            </div>
            <div class="input-group">
                <input type="password" name="senha" class="form-control" placeholder="senha" id="senha">
            </div>
            <?= $this->Form->button('Entrar', ['class' => 'btn-confirm']) ?>
            <?= $this->Form->end() ?>

            <hr>
            <p class="mb-0">
                <div class="row content-center">
                    <?= $this->Html->link('Esqueci minha senha', ['controller' => 'Login', 'action' => 'recover'], ['class' => 'login-link']) ?>
                </div>
                <div class="row content-center">
                    <?= $this->Html->link('Criar conta', ['controller' => 'Login', 'action' => 'register'], ['class' => 'login-link']) ?>
                </div>
            </p>
        </div>
    </div>
    <!-- /.login-card-body -->
</div>