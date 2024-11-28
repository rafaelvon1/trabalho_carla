const pizzasBtn = document.getElementById('pizzas');
const esfihaBtn = document.getElementById('esfiha');
const bebidasBtn = document.getElementById('bebidas');

const alimentos = document.getElementById('alimentos');
const salgadas = document.getElementById('salgadas');
const doces = document.getElementById('doces');
const drink = document.getElementById('drink');
const alimentos2 = document.getElementById('alimentos2');
const salgada = document.getElementById('salgada');
const doce = document.getElementById('doce');
const refri = document.getElementById('refri');
const suco = document.getElementById('suco');
const cerva = document.getElementById('cerva');
const agua = document.getElementById('agua');

pizzasBtn.addEventListener('click', function () {
    alimentos.style.display = 'block';
    salgadas.style.display = 'block';
    doces.style.display = 'none';
    drink.style.display = 'none';
    alimentos2.style.display = 'none';
    salgada.style.display = 'none';
    doce.style.display = 'none';
});

esfihaBtn.addEventListener('click', function () {
    alimentos2.style.display = 'block';
    salgada.style.display = 'block';
    doce.style.display = 'none';
    alimentos.style.display = 'none';
    drink.style.display = 'none';
    salgadas.style.display = 'none';
    doces.style.display = 'none';
});

bebidasBtn.addEventListener('click', function () {
    drink.style.display = 'block';
    refri.style.display = 'block';
    alimentos2.style.display = 'none';
    alimentos.style.display = 'none';
    suco.style.display = 'none';
    cerva.style.display = 'none';
    agua.style.display = 'none';
});