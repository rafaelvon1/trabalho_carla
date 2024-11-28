const btnSalgada = document.getElementById('btsalgada');
const btnDoce = document.getElementById('btdoce');
const btnRefri = document.getElementById('btrefri');
const btnSuco = document.getElementById('btsuco');
const btnCerva = document.getElementById('btcerva');
const btnAgua = document.getElementById('btagua');

const sectionSalgadas = document.getElementById('salgadas');
const sectionDoces = document.getElementById('doces');
const sectionSalgada = document.getElementById('salgada');
const sectionDoce = document.getElementById('doce');
const sectionRefri = document.getElementById('refri');
const sectionSuco = document.getElementById('suco');
const sectionCerva = document.getElementById('cerva');
const sectionAgua = document.getElementById('agua');

btnSalgada.addEventListener('click', function () {
    sectionSalgadas.style.display = 'block';
    sectionDoces.style.display = 'none';
});

btnDoce.addEventListener('click', function () {
    sectionDoces.style.display = 'block';
    sectionSalgadas.style.display = 'none';
});

btnSalgada.addEventListener('click', function () {
    sectionSalgada.style.display = 'block';
    sectionDoce.style.display = 'none';
});

btnDoce.addEventListener('click', function () {
    sectionDoce.style.display = 'block';
    sectionSalgada.style.display = 'none';
});

btnRefri.addEventListener('click', function () {
    sectionRefri.style.display = 'block';
    sectionSuco.style.display = 'none';
    sectionCerva.style.display = 'none';
    sectionAgua.style.display = 'none';
});

btnSuco.addEventListener('click', function () {
    sectionSuco.style.display = 'block';
    sectionRefri.style.display = 'none';
    sectionCerva.style.display = 'none';
    sectionAgua.style.display = 'none';
});

btnCerva.addEventListener('click', function () {
    sectionCerva.style.display = 'block';
    sectionSuco.style.display = 'none';
    sectionRefri.style.display = 'none';
    sectionAgua.style.display = 'none';
});

btnAgua.addEventListener('click', function () {
    sectionAgua.style.display = 'block';
    sectionSuco.style.display = 'none';
    sectionCerva.style.display = 'none';
    sectionRefri.style.display = 'none';
});