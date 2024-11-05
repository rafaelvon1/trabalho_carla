document.getElementById('btsalgada').addEventListener('click', function() {
    document.getElementById('salgadas').style.display = 'block';
    document.getElementById('doces').style.display = 'none';  
});

document.getElementById('btdoce').addEventListener('click', function() {
    document.getElementById('doces').style.display = 'block';
    document.getElementById('salgadas').style.display = 'none';
});
document.getElementById('btsalgada').addEventListener('click', function() {
    document.getElementById('salgada').style.display = 'block';
    document.getElementById('doce').style.display = 'none';  
});

document.getElementById('btdoce').addEventListener('click', function() {
    document.getElementById('doce').style.display = 'block';
    document.getElementById('salgada').style.display = 'none';
});
