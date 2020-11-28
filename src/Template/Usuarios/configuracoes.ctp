<?php $this->layout = 'site'; ?>

<?= $this->Html->css('configuracoes.css') ?>

<main>
    <div class="m-2 mt-4">
        <h1 class="titleScreen">Configurações</h1>
    </div>
    <div class="row justify-content-center mb-5">
        <div class="col-xs-6">
            <div id="updateDataPt1">
                
                <?= $this->Form->create($usuario) ?>
                    <h2 class="pt-3" id="tituloAtualizarDados">Atualizar dados cadastrais</h2>
                    <h3 class="pt-4" id="textoAlterar">Alterar e-mail</h3>

                    <input class="mt-2" type="input" id="newemail" name="email" placeholder="Novo e-mail"><br>
                    <input class="mt-3" type="password" id="password" name="password" placeholder="Senha atual">
                    <button class="row mt-3 botao">
                        <h5>Alterar e-mail</h5>
                    </button>

                    <h3 id="textoAlterar" class="mt-3">Alterar senha</h3>
                    <input type="password" id="NewPassword" name="NewPassword" placeholder="Digite sua nova senha"><br>
                    <input class="mt-3" type="password" id="OldPassword" name="OldPassword" placeholder="Digite sua senha atual">
                    <button class="row mt-3 botao">
                        <h5>Alterar senha</h5>
                    </button>
                <?= $this->Form->end() ?>
                
            </div>
        </div>
        <div class="col-xs-6">
            <div id="updateDataPt2">

                <?= $this->Form->create($usuario, ['type' => 'file']) ?>

                    <?php
                        if($usuario->imagem == null or $usuario->imagem == ''){
                            echo $this->Html->image('contents/user.png', ['alt' => 'Foto pessoal', 'id' => 'img', 'class' => 'mt-3']);
                        } else {
                            echo $this->Html->image('../files/usuarios/'.$usuario->id.'/'.$usuario->imagem, ['alt' => 'Foto pessoal', 'id' => 'img', 'class' => 'mt-3']);
                        }
                    ?>
                    
                    <input type="file" name="imagem" id="imagem" class="form-control" />

                    <button class="row mt-2 mt-4 botao" type="submit">
                        <h5>Alterar imagem</h5>
                    </button>
            
                <?= $this->Form->end() ?>

                    <?= $this->Html->link(
                        '<button class="row mt-5 botao"><h5>Criar canal</h5></button>',
                        ['controller' => 'Canais', 'action' => 'add'],
                        ['escape' => false]) 
                    ?>

                <!-- Colocar paginal para cadastro de canal no href -->
                
                <?= $this->Html->link(
                    '<button class="row mt-3 botao"><h5>Gerenciar canal</h5></button>',
                    ['controller' => 'Canais', 'action' => 'meucanal'],
                    ['escape' => false]) 
                ?>

            </div>

        </div>
    </div>
</main>