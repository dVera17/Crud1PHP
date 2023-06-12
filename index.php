<?php

if (isset($_POST['agregar'])) postData();

function postData()
{
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

if (isset($_POST['delete'])) {
    $userData = getUser();
    if ($userData) {
        deleteUser($userData['id']);
    }
}

function getUser()
{
    $cc = $_POST['cc'];
    $url = 'https://6480f4aaf061e6ec4d4a1e08.mockapi.io/user?cc=' . $cc;

    $options = [
        'http' => [
            'method' => 'GET',
            'header' => 'Content-Type: application/json'
        ]
    ];

    $config = stream_context_create($options);
    $response = file_get_contents($url, false, $config);
    $data = json_decode($response, true);

    if (!empty($data)) {
        return $data[0];
    } else {
        return null;
    }
}

function deleteUser($id)
{
    $url = 'https://6480f4aaf061e6ec4d4a1e08.mockapi.io/user/' . $id;

    $options = [
        'http' => [
            'method' => 'DELETE',
            'header' => 'Content-Type: application/json'
        ]
    ];

    $config = stream_context_create($options);
    $data = file_get_contents($url, false, $config);
}

if (isset($_POST['subirData'])) $data = cargarInfo();

function cargarInfo()
{
    $data = getUser();
    return $user = [
        'nombre' => $data['nombre'],
        'apellido' => $data['apellido'],
        'direccion' => $data['direccion'],
        'edad' => intval($data['edad']),
        'email' => $data['email'],
        'horarioEntrada' => $data['horarioEntrada'],
        'team' => $data['team'],
        'trainer' => $data['trainer'],
        'cc' => intval($data['cc']),
        'id' => $data['id']
    ];
}

if (isset($_POST['editar'])) {
    putUser();
}

function putUser()
{
    $userData = getUser();
    $userId = $userData['id']; // Obtener el ID del usuario
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
            'method' => 'PUT',
            'header' => 'Content-Type: application/json',
            'content' => json_encode($data)
        ]
    ];

    $url = 'https://6480f4aaf061e6ec4d4a1e08.mockapi.io/user/' . $userId;

    $config = stream_context_create($options);
    $_DATA = file_get_contents($url, false, $config);
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit;
}

if (isset($_POST['search'])) {
    $data = cargarInfo();
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
                    <input class="inp-info" type="text" name="nombre" placeholder="Nombre" value="<?php echo isset($data['nombre']) ? $data['nombre'] : ''; ?>">
                    <input class="inp-info" type="text" name="apellido" placeholder="Apellidos" value="<?php echo isset($data['apellido']) ? $data['apellido'] : ''; ?>">
                    <input class="inp-info" type="text" name="direccion" placeholder="Dirección" value="<?php echo isset($data['direccion']) ? $data['direccion'] : ''; ?>">
                </div>
                <div class="right-box">
                    <span>Campuslands</span>
                    <input class="inp-info" type="number" name="edad" placeholder="Edad" value="<?php echo isset($data['edad']) ? $data['edad'] : ''; ?>">
                    <input class="inp-info" type="email" name="email" placeholder="Email" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>">
                </div>
            </div>
            <div class="second-box">
                <div class="left-box">
                    <label for="horarioEntrada">Horario de entrada</label>
                    <input class="inp-info" type="time" name="horarioEntrada" value="<?php echo isset($data['horarioEntrada']) ? $data['horarioEntrada'] : ''; ?>">
                    <input class="inp-info" type="text" name="team" placeholder="Team" maxlength="2" value="<?php echo isset($data['team']) ? $data['team'] : ''; ?>">
                    <input class="inp-info" type="text" name="trainer" placeholder="Trainer" value="<?php echo isset($data['trainer']) ? $data['trainer'] : ''; ?>">
                </div>
                <div class="right-box">
                    <div class="cuadricula">
                        <div class="left-cuadricula">
                            <button type="submit" name="agregar">Add</button>
                            <input type="submit" name="editar" value="Edit">
                        </div>
                        <div class="right-cuadricula">
                            <input type="submit" name="delete" value="delete">
                            <input type="submit" name="search" value="Search">
                        </div>
                    </div>
                    <input class="inp-info" type="number" name="cc" placeholder="Documento de identidad" required value="<?php echo isset($data['cc']) ? $data['cc'] : ''; ?>">
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

            function getDataAll()
            {
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

            foreach ($users as $user) {
                echo '
                        <tr>
                            <td>' . $user['nombre'] . '</td>
                            <td>' . $user['apellido'] . '</td>
                            <td>' . $user['direccion'] . '</td>
                            <td>' . $user['edad'] . '</td>
                            <td>' . $user['email'] . '</td>
                            <td>' . $user['horarioEntrada'] . '</td>
                            <td>' . $user['team'] . '</td>
                            <td>' . $user['trainer'] . '</td>
                            <td>
                                <form method="POST">
                                    <input type="hidden" name="cc" value="' . $user['cc'] . '">
                                    <button type="submit" name="subirData">Info</button>
                                </form>
                            </td>
                        </tr>
                    ';
            };
            ?>
        </table>
    </div>
</body>

</html>