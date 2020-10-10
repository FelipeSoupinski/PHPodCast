function attVolume() {
    document.getElementById('jp_audio_0').volume =document.getElementById('volume-control').value;
}

function showTempoTotal() {
    var audio = document.getElementById("jp_audio_0");
    let data = new Date(null);
    data.setSeconds(audio.duration);
    let duracao = data.toISOString().substr(12, 7);
    document.getElementById('tempo-total').innerHTML = duracao;
}

function attTempoAtual() {
    var audio = document.getElementById("jp_audio_0");
    let data = new Date(null);
    data.setSeconds(audio.currentTime);
    let tempo_atual = data.toISOString().substr(12, 7);
    document.getElementById('tempo-atual').innerHTML = tempo_atual;
}

function play() {
    showTempoTotal();
    temporizador = setInterval(attTempoAtual, 1000);
}

function changeSpeed(speed){
    var audio = document.getElementById("jp_audio_0");
    audio.playbackRate = speed;
}

$(function(){

    $("#dropdown-speed").on('click', 'div', function(){
      $(".btn:first-child").text($(this).text());
      $(".btn:first-child").val($(this).text());
   });

});

function attImageFavoritos(){
    var favorito = document.getElementById("add-favoritos");
    if(favorito.getAttribute('src') == 'Assets/img/favorito.png'){
        favorito.setAttribute('src', 'Assets/img/favorito_2.png');
    } else {
        favorito.setAttribute('src', 'Assets/img/favorito.png');
    }
}