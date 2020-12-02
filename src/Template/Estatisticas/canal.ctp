<?php $this->layout = 'site' ?>

<?= $this->Html->css('estatisticas.css')?>

<script>
    ouvintes = <?= $estatistica->total_ouvintes?> ;
    favoritos = <?= $favoritos ?> ;
</script>

<main>

    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js') ?>
    <div class="row content-dropdown">
        <span class="ubuntu txt-normal fs26 mr-3">Selecione o mês</span>
        <div class="dropdown">
            <button class="btn btn-mes dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Janeiro
            </button>
            <div id="dropdown-menu-mes" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Janeiro</a>
                <a class="dropdown-item" href="#">Fevereiro</a>
                <a class="dropdown-item" href="#">Março</a>
                <a class="dropdown-item" href="#">Abril</a>
                <a class="dropdown-item" href="#">Maio</a>
                <a class="dropdown-item" href="#">Junho</a>
                <a class="dropdown-item" href="#">Julho</a>
                <a class="dropdown-item" href="#">Agosto</a>
                <a class="dropdown-item" href="#">Setembro</a>
                <a class="dropdown-item" href="#">Outubro</a>
                <a class="dropdown-item" href="#">Novembro</a>
                <a class="dropdown-item" href="#">Dezembro</a>
            </div>
        </div>
    </div>

    <div class="grafico">
        <canvas id="lineChart"
            style="position: relative; height:50vh; width:60vw; display: block; margin-left: auto; margin-right: auto; margin-top: 25px">
            <?= $this->Html->script('grafico.js') ?>
            </script>
        </canvas>
    </div>

    <div class="row txt-footer-img">
        <span class="ubuntu txt-normal fs22 mr-3">Total de ouvintes: <?= $estatistica->total_ouvintes?></span>
    </div>

    <div class="row txt-footer-img">
        <span class="ubuntu txt-normal fs22 mr-3">Horas reproduzidas: <?= $estatistica->horas_reproduzidas?></span>
    </div>

</main>