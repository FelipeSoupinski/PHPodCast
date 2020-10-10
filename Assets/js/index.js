var temporizador = null;

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
    if(temporizador == null){
        temporizador = setInterval(attTempoAtual, 1000);
    }
}