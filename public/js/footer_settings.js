function msOwner() {
    document.getElementById('derechos').classList.add('text-dark');
    document.getElementById('derechos').innerHTML = 'Creado por: Mauricio Serrano';
    setTimeout(() => {
        document.getElementById('derechos').classList.remove('text-dark');
        document.getElementById('derechos').innerHTML = 'Todos los derechos reservados';
    }, 5000);


}