document.getElementById('pizzas').addEventListener('click', function() {
    document.getElementById('alimentos').style.display = 'block';
    document.getElementById('alimentos2').style.display = 'none';
    document.getElementById('drink').style.display = 'none';
    document.getElementById('all').style.display = 'none';
});
document.getElementById('esfiha').addEventListener('click', function() {
    document.getElementById('alimentos2').style.display = 'block';
    document.getElementById('alimentos').style.display = 'none';
    document.getElementById('drink').style.display = 'none';
    document.getElementById('mostratudo').style.display = 'none';
});
document.getElementById('bebidas').addEventListener('click', function() {
    document.getElementById('drink').style.display = 'block';
    document.getElementById('alimentos2').style.display = 'none';
    document.getElementById('all').style.display = 'none';
    document.getElementById('alimentos1').style.display = 'none';
});
document.getElementById('mostrartudo').addEventListener('click', function() {
    document.getElementById('all').style.display = 'block';
    document.getElementById('alimentos').style.display = 'none';
    document.getElementById('drink').style.display = 'none';
    document.getElementById('alimentos2').style.display = 'none';
});