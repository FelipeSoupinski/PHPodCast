<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PodCast Play</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:wght@500&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <?= $this->Html->css('plugins/toastr/toastr.css') ?>
    <?= $this->Html->css('login.css') ?>
</head>

<body>
    <div class="centro">
        <div class="login-box">

            <?= $this->fetch('content') ?>

        </div>
    </div>


    <?= $this->Html->script('jquery-3.5.1.min.js') ?>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <?= $this->Html->script('owl.carousel.min.js') ?>
    <?= $this->Html->script('jplayer/jquery.jplayer.min.js') ?>
    <?= $this->Html->script('player.js') ?>
    <?= $this->Html->script('index.js') ?>

    <!-- jQuery -->
    <?= $this->Html->script('plugins/jquery/jquery.min.js') ?>
    <!-- Toastr -->
    <?= $this->Html->script('plugins/toastr/toastr.min.js') ?>
    <!-- Flash render -->
    <?= $this->Flash->render() ?>

</body>

</html>