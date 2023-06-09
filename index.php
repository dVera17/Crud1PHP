<?php

    if(isset($_POST['agregar'])) postData();

    function postData(){
        $data = [
            'nombre' => $_POST['nombre'],
            'apellido' => $_POST['apellido'],
            'direccion' => $_POST['direccion'],
            'edad' => intval($_POST['edad']),
            'email' => $_POST['email'],
            'horarioEntrada' => $_POST['horarioEntrada'],
            'team' => $_POST['team'],
            'trainer' => $_POST['trainer'],
            'cc' => intval($_POST['cc'])
        ];
    
        $options = [
            'http' => [
                'method' => 'POST',
                'header' => 'Content-Type: application/json',
                'content' => json_encode($data)
            ]
        ];
    
        $config = stream_context_create($options);
        $_DATA = file_get_contents('https://6480f4aaf061e6ec4d4a1e08.mockapi.io/user', false, $config);
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit;
    };

    if(isset($_POST['delete'])) deleteUser();

    function deleteUser(){
        $options = [
            'http' => [
                'method' => 'DELETE',
                'header' => 'Content-Type: application/json'
            ]
        ];

        $users = getDataAll();
        var_dump($users);
        $id = null;
        foreach($users as $user){
            if($user == $_POST['cc']){
                $id = $user['id'];
            }
        }
        
        $config = stream_context_create($options);
        return json_decode(file_get_contents('https://6480f4aaf061e6ec4d4a1e08.mockapi.io/user/'.$id, false, $config), true);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campuslands</title>

    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="content">
        <form method="POST" class="form">
            <div class="first-box">
                <div class="left-box">
                    <input class="inp-info" type="text" name="nombre" placeholder="Nombre">
                    <input class="inp-info" type="text" name="apellido" placeholder="Apellidos">
                    <input class="inp-info" type="text" name="direccion" placeholder="Dirección">
                </div>
                <div class="right-box">
                    <span>Campuslands</span>
                    <input class="inp-info" type="number" name="edad" placeholder="Edad">
                    <input class="inp-info" type="email" name="email" placeholder="Email">
                </div>
            </div>
            <div class="second-box">
                <div class="left-box">
                    <label for="horarioEntrada">Horario de entrada</label>
                    <input class="inp-info" type="time" name="horarioEntrada">
                    <input class="inp-info" type="text" name="team" placeholder="Team" maxlength="2">
                    <input class="inp-info" type="text" name="trainer" placeholder="Trainer">
                </div>
                <div class="right-box">
                    <div class="cuadricula">
                        <div class="left-cuadricula">
                            <button type="submit" name="agregar">Add</button>
                            <input type="submit" value="Edit">
                        </div>
                        <div class="right-cuadricula">
                            <input type="submit" value="delete">
                            <input type="submit" value="Search">
                        </div>
                    </div>
                    <input class="inp-info" type="number" name="cc" placeholder="Documento de identidad" required>
                </div>
            </div>
        </form>

        <table>
            <tr>
                <th>NOMBRES</th>
                <th>APELLIDOS</th>
                <th>DIRECCION</th>
                <th>EDAD</th>
                <th>EMAIL</th>
                <th>ENTRADA</th>
                <th>TEAM</th>
                <th>TRAINER</th>
                <th>GESTION</th>
            </tr>

            <?php
                
                function getDataAll(){
                    $options = [
                        'http' => [
                            'method' => 'GET',
                            'header' => 'Content-Type: application/json'
                        ]
                    ];
                
                    $config = stream_context_create($options);
                    return json_decode(file_get_contents('https://6480f4aaf061e6ec4d4a1e08.mockapi.io/user', false, $config), true);
                }; 

                $users = getDataAll();
                
                foreach($users as $user){                    
                    echo '
                        <tr>
                            <td>' .$user['nombre']. '</td>
                            <td>' .$user['apellido']. '</td>
                            <td>' .$user['direccion']. '</td>
                            <td>' .$user['edad']. '</td>
                            <td>' .$user['email']. '</td>
                            <td>' .$user['horarioEntrada']. '</td>
                            <td>' .$user['team']. '</td>
                            <td>' .$user['trainer']. '</td>
                            <td>PRUEBA</td>
                        </tr>
                    ';
                };
            ?>
        </table>
    </div>
</body>
</html>