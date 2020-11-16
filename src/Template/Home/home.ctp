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
        <a href="index.html">
            <?= $this->Html->image('contents/logo-sem-fundo.png', ['class' => 'logo', 'alt' => 'logo PHPodCast']) ?>
        </a>
        <input type="search" class="search-bar" placeholder="Pesquise um PodCast"/>
        <a href="pesquisa.html">
            <?= $this->Html->image('contents/lupa.png', ['class' => 'btn-pesquisa', 'alt' => 'pesquisar']) ?>
        </a>
        <a class="dropdown-toggle user-toggle" id="dropdownMenuPerfil" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?= $this->Html->image('contents/user.png', ['class' => 'user-img', 'alt' => 'foto do perfil do usuário']) ?>
        </a>
        <div class="dropdown-menu mr-3" aria-labelledby="dropdownMenuPerfil">
            <a class="dropdown-item" href="#">Configurações</a>
            <a class="dropdown-item" href="meucanal.html">Meu canal</a>
            <a class="dropdown-item" href="#">Sair</a>
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
                <div class="item">
                    <?= $this->Html->image('logo-podcasts/hangar18.webp', ['alt' => 'logo hangar18']) ?>
                </div>
                <div class="item">
                    <a href="listaPodcast.html">
                        <?= $this->Html->image('logo-podcasts/nerdcast.jpg', ['alt' => 'logo jovem nerd']) ?>
                    </a>
                </div>
                <div class="item">
                    <?= $this->Html->image('logo-podcasts/flow.png', ['alt' => 'logo flow']) ?>
                </div>
                <div class="item">
                    <?= $this->Html->image('logo-podcasts/fala-parceiro.jpg', ['alt' => 'logo fala parceiro']) ?>
                </div>
            </div>

        </div>
        <div class="row content mt-3">
            <span class="mr-2">
                <?= $this->Html->image('novidades.svg', ['alt' => 'ícone novidades']) ?>
            </span>
            <span class="ubuntu txt-normal fs22 pt-3">Novidades</span> 
            <hr/>

            <div class="owl-carousel owl-theme">
                <div class="item">
                    <?= $this->Html->image('logo-podcasts/canaltech.jpg', ['alt' => 'logo Canaltech']) ?>
                </div>
                <div class="item">
                    <?= $this->Html->image('logo-podcasts/tecnocast.jpg', ['alt' => 'logo Tecnocast']) ?>
                </div>
                <div class="item">
                    <?= $this->Html->image('logo-podcasts/panico.webp', ['alt' => 'logo Pânico']) ?>
                </div>
                <div class="item">
                    <?= $this->Html->image('logo-podcasts/poucas.jpg', ['alt' => 'logo Poucas']) ?>
                </div>
            </div>

        </div>
        <div class="row content mt-3 mb-5">
            <span class="mr-2">
                <?= $this->Html->image('favoritos.svg', ['alt' => 'ícone favoritos']) ?>
            </span>
            <span class="ubuntu txt-normal fs22 pt-3">Favoritos</span> 
            <hr/>

            <div class="owl-carousel owl-theme">
                <div class="item">
                    <?= $this->Html->image('logo-podcasts/nao-ouvo.jpeg', ['alt' => 'logo não ouvo']) ?>
                </div>
                <div class="item">
                    <?= $this->Html->image('logo-podcasts/resumocast.png', ['alt' => 'logo resumocast']) ?>
                </div>
                <div class="item">
                    <?= $this->Html->image('logo-podcasts/loop-matinal.jpeg', ['alt' => 'logo loop matinal']) ?>
                </div>
                <div class="item">
                    <?= $this->Html->image('logo-podcasts/indo-e-voltando.jpg', ['alt' => 'logo indo e voltando']) ?>
                </div>
            </div>
        </div>

        <div class="space"></div>

        <div class="row bot-bar">
            <div class="player-timeline">
                <div class="player-timeline-control"></div>
            </div>
            <div class="col-sm-1">
                <?= $this->Html->image('logo-podcasts/nerdcast.jpg', ['class' => 'logo-player', 'alt' => 'logo jovem nerd']) ?>
            </div>
            <div class="col-sm-3">
                <div class="player-display">
                    <span class="player-current-track"></span>
                </div>
                <div class="tempo-atual">
                    <span id="tempo-atual"></span>
                </div>
            </div>

            <div class="col-sm-4 mt-3">
                <div class="player-controls">

                    <?= $this->Html->image('favorito.png', ['id' => 'add-favoritos', 'class' => 'img-favorito', 'alt' => 'imagem de adicionar aos favoritos', 'onclick' => 'attImageFavoritos()']) ?>

                    <span class="player-prev">
                        <?= $this->Html->image('double-arrows-prev.svg', ['class' => 'btn-prev', 'alt' => 'botão de recuar']) ?>
                    </span>
                    <span class="player-play">
                        <?= $this->Html->image('play.svg', ['class' => 'btn-play', 'alt' => 'botão de play', 'onclick' => 'play()']) ?>
                    </span>
                    <span class="player-pause">
                        <?= $this->Html->image('pause.svg', ['class' => 'btn-pause', 'alt' => 'botão de pause']) ?>
                    </span>
                    <span class="player-next">
                        <?= $this->Html->image('double-arrows2.svg', ['class' => 'btn-next', 'alt' => 'botão de avançar']) ?>
                    </span>
                    <!-- <span class="player-stop">Stop</span> -->

                    <a class="dropdown-toggle user-toggle" id="dropdownMenuVelocidade" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <button class="btn btn-speed">1.00x</button>
                    </a>
                    <div id="dropdown-speed" class="dropdown-menu mr-3" aria-labelledby="dropdownMenuVelocidade">
                        <div class="dropdown-item" onclick="changeSpeed(3.00)">3.00x</div>
                        <div class="dropdown-item" onclick="changeSpeed(2.50)">2.50x</div>
                        <div class="dropdown-item" onclick="changeSpeed(2.00)">2.00x</div>
                        <div class="dropdown-item" onclick="changeSpeed(1.75)">1.75x</div>
                        <div class="dropdown-item" onclick="changeSpeed(1.50)">1.50x</div>
                        <div class="dropdown-item" onclick="changeSpeed(1.25)">1.25x</div>
                        <div class="dropdown-item" onclick="changeSpeed(1.00)">1.00x</div>
                        <div class="dropdown-item" onclick="changeSpeed(0.75)">0.75x</div>
                        <div class="dropdown-item" onclick="changeSpeed(0.50)">0.50x</div>
                    </div>

                </div>
            </div>

            <div class="col-sm-1">
                <?= $this->Html->image('btn-volume.svg', ['class' => 'btn-volume', 'alt' => 'botão de controle de volume']) ?>
            </div>

            <div class="col-sm-2">
                <input id="volume-control" class="volume-control" type="range" id="weight" min="0" value="0.6" max="1" step="0.1" onchange="attVolume()">
            </div>

            <div class="col-sm-1">
                <div class="tempo-total">
                    <span id="tempo-total"></span>
                </div>
            </div>

            <div class="player"></div>
        </div>

    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
    <?= $this->Html->script('owl.carousel.min.js') ?>
    <?= $this->Html->script('jplayer/jquery.jplayer.min.js') ?>
    <?= $this->Html->script('player.js') ?>
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