
document.getElementById('pizzas').addEventListener('click', function() {
    document.getElementById('alimentos').style.display = 'block';
    document.getElementById('salgadas').style.display = 'block';
    document.getElementById('doces').style.display = 'none';
    document.getElementById('drink').style.display = 'none';
    document.getElementById('alimentos2').style.display = 'none';

});


document.getElementById('esfiha').addEventListener('click', function() {
    document.getElementById('alimentos2').style.display = 'block';
    document.getElementById('salgada').style.display = 'block';
    document.getElementById('doce').style.display = 'none';  
    document.getElementById('alimentos').style.display = 'none';
    document.getElementById('drink').style.display = 'none';
 
});

document.getElementById('bebidas').addEventListener('click', function() {
    document.getElementById('drink').style.display = 'block';
    document.getElementById('btrefri').style.display = 'block';
    document.getElementById('alimentos2').style.display = 'none';
    document.getElementById('alimentos').style.display = 'none';
   
});





