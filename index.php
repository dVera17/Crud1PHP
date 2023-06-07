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
                    <input class="inp-info" type="text" name="team" placeholder="Team">
                    <input class="inp-info" type="text" name="trainer" placeholder="Trainer">
                </div>
                <div class="right-box">
                    <div class="cuadricula">
                        <div class="left-cuadricula">
                            <input type="submit" value="✓">
                            <input type="submit" value="Edit">
                        </div>
                        <div class="right-cuadricula">
                            <input type="submit" value="X">
                            <input type="submit" value="Search">
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="show-data">
            <table class="table">
                <thead class="menu-busqueda">
                    <tr>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">APELLIDOS</th>
                        <th scope="col">DIRECCION</th>
                        <th scope="col">EDAD</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">ENTRADA</th>
                        <th scope="col">TEAM</th>
                        <th scope="col">TRAINER</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">         
                    <tr>
                        <td>NOMBRE</td>
                        <td>APELLIDOS</td>
                        <td>DIRECCION</td>
                        <td>EDAD</td>
                        <td>EMAIL</td>
                        <td>ENTRADA</td>
                        <td>TEAM</td>
                        <td>TRAINER</td>
                    </tr>
                    <tr>
                        <td>NOMBRE</td>
                        <td>APELLIDOS</td>
                        <td>DIRECCION</td>
                        <td>EDAD</td>
                        <td>EMAIL</td>
                        <td>ENTRADA</td>
                        <td>TEAM</td>
                        <td>TRAINER</td>
                    </tr>
                    <tr>
                        <td>NOMBRE</td>
                        <td>APELLIDOS</td>
                        <td>DIRECCION</td>
                        <td>EDAD</td>
                        <td>EMAIL</td>
                        <td>ENTRADA</td>
                        <td>TEAM</td>
                        <td>TRAINER</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>