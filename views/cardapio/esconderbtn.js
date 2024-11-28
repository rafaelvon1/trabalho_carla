const btRefri = document.getElementById('btrefri');
const btSuco = document.getElementById('btsuco');
const btCerva = document.getElementById('btcerva');
const btAgua = document.getElementById('btagua');
const btSalgada = document.getElementById('btsalgada');
const btDoce = document.getElementById('btdoce');

function escondersd() {
    btRefri.style.display = 'block';
    btSuco.style.display = 'block';
    btCerva.style.display = 'block';
    btAgua.style.display = 'block';
    btSalgada.style.display = 'none';
    btDoce.style.display = 'none';
}

function esconderrsca() {
    btRefri.style.display = 'none';
    btSuco.style.display = 'none';
    btCerva.style.display = 'none';
    btAgua.style.display = 'none';
    btSalgada.style.display = 'block';
    btDoce.style.display = 'block';
}