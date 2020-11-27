<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PodCast Play</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:wght@500&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <?= $this->Html->css('owl.carousel.min.css') ?>
    <?= $this->Html->css('player.css') ?>
    <?= $this->Html->css('index.css') ?>
</head>
<body>
    <header class="header-est">
        <?= $this->Html->link(
            $this->Html->image('contents/logo-sem-fundo.png', ['class' => 'logo', 'alt' => 'logo PHPodCast']),
            ['controller' => '/'],
            ['escape' => false]
        ) ?>
        <?php
            echo $this->Form->create(null, [
                'url' => ['controller' => 'Pesquisa', 'action' => 'search'],
                'type' => 'post',
                'class' => 'search-form'
            ]);
            echo $this->Form->control('pesquisa', ['type' => 'search', 'class' => 'search-bar', 'placeholder' => 'Pesquise um Podcast', 'minlength' => 2, 'required' => true, 'label' => false]);
            echo $this->Form->submit('', ['class' => 'btn-pesquisa', 'alt' => 'pesquisar']);
            echo $this->Form->end();
        ?>
        <a class="dropdown-toggle user-toggle" id="dropdownMenuPerfil" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?= $this->Html->image('contents/user.png', ['class' => 'user-img', 'alt' => 'foto do perfil do usuário']) ?>
        </a>
        <div class="dropdown-menu mr-3" aria-labelledby="dropdownMenuPerfil">
            <?= $this->Html->link(__('Configurações'), ['controller' => 'Usuarios', 'action' => 'configuracoes'], ['class' => 'dropdown-item']) ?>
            <?= $this->Html->link(__('Meu canal'), ['controller' => 'Canais', 'action' => 'meucanal'], ['class' => 'dropdown-item']) ?>
            <?= $this->Html->link(__('Sair'), ['controller' => 'Login', 'action' => 'logout'], ['class' => 'dropdown-item']) ?>
        </div>
    </header>
    <main>
        <div class="row content mt-3">
            <span class="mr-2">
                <?= $this->Html->image('destaque.svg', ['alt' => 'ícone destaques']) ?>
            </span>
            <span class="ubuntu txt-normal fs22 pt-3">Destaques</span> 
            <hr/>

            <div class="owl-carousel owl-theme">
                <?php foreach($canais as $canal) { ?>
                    <div class="item">
                        <?= $this->Html->link(
                            $this->Html->image('../files/canais/'.$canal->id.'/'.$canal->imagem, ['alt' => 'logo do canal '.$canal->nome]),
                            ['controller' => 'episodios', 'action' => 'lista', $canal->id],
                            ['escape' => false]
                        ) ?>
                    </div>
                <?php } ?>
            </div>

        </div>
        <div class="row content mt-3">
            <span class="mr-2">
                <?= $this->Html->image('novidades.svg', ['alt' => 'ícone novidades']) ?>
            </span>
            <span class="ubuntu txt-normal fs22 pt-3">Novidades</span> 
            <hr/>

            <div class="owl-carousel owl-theme">
                <?php foreach($canais as $canal) { ?>
                    <div class="item">
                        <?= $this->Html->link(
                            $this->Html->image('../files/canais/'.$canal->id.'/'.$canal->imagem, ['alt' => 'logo do canal '.$canal->nome]),
                            ['controller' => 'episodios', 'action' => 'lista', $canal->id],
                            ['escape' => false]
                        ) ?>
                    </div>
                <?php } ?>
            </div>

        </div>
        <div class="row content mt-3 mb-5">
            <span class="mr-2">
                <?= $this->Html->image('favoritos.svg', ['alt' => 'ícone favoritos']) ?>
            </span>
            <span class="ubuntu txt-normal fs22 pt-3">Favoritos</span> 
            <hr/>

            <div class="owl-carousel owl-theme">
                <?php foreach($canais as $canal) { ?>
                    <div class="item">
                        <?= $this->Html->link(
                            $this->Html->image('../files/canais/'.$canal->id.'/'.$canal->imagem, ['alt' => 'logo do canal '.$canal->nome]),
                            ['controller' => 'episodios', 'action' => 'lista', $canal->id],
                            ['escape' => false]
                        ) ?>
                    </div>
                <?php } ?>
            </div>
        </div>

    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
    <?= $this->Html->script('owl.carousel.min.js') ?>
    <?= $this->Html->script('jplayer/jquery.jplayer.min.js') ?>
    <?= $this->Html->script('index.js') ?>
    
    <script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:4
                }
            }
        })
    </script>
</body>
</html>