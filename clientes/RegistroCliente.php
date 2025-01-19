<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Cliente</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/registro-cliente.css">
</head>

<body>

    <div class="contenedor-registro">
        <h1>Regístrate</h1>

        <form action="ProcesarRegistroCliente.php" method="POST">
            <div class="fila-formulario">
                <div class="grupo-formulario">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required placeholder="Ingresa tu nombre">
                </div>

                <div class="grupo-formulario">
                    <label for="apellidoPaterno">Apellido Paterno:</label>
                    <input type="text" id="apellidoPaterno" name="apellidoPaterno" required placeholder="Ingresa tu apellido paterno">
                </div>
            </div>

            <div class="fila-formulario">
                <div class="grupo-formulario">
                    <label for="apellidoMaterno">Apellido Materno:</label>
                    <input type="text" id="apellidoMaterno" name="apellidoMaterno" required placeholder="Ingresa tu apellido materno">
                </div>

                <div class="grupo-formulario">
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" required placeholder="Dirección">
                </div>
            </div>

            <div class="fila-formulario">
                <div class="grupo-formulario">
                    <label for="ciudad">Ciudad:</label>
                    <input type="text" id="ciudad" name="ciudad" required placeholder="Ciudad">
                </div>

                <div class="grupo-formulario">
                    <label for="estado">Estado:</label>
                    <select id="estado" name="estado" required>
                        <option value="">Selecciona un estado</option>
                        <option value="Aguascalientes">Aguascalientes</option>
                        <option value="Baja California">Baja California</option>
                        <option value="Baja California Sur">Baja California Sur</option>
                        <option value="Campeche">Campeche</option>
                        <option value="Chiapas">Chiapas</option>
                        <option value="Chihuahua">Chihuahua</option>
                        <option value="Coahuila">Coahuila</option>
                        <option value="Colima">Colima</option>
                        <option value="Durango">Durango</option>
                        <option value="Guanajuato">Guanajuato</option>
                        <option value="Guerrero">Guerrero</option>
                        <option value="Hidalgo">Hidalgo</option>
                        <option value="Jalisco">Jalisco</option>
                        <option value="Estado de México">Estado de México</option>
                        <option value="Michoacán">Michoacán</option>
                        <option value="Morelos">Morelos</option>
                        <option value="Nayarit">Nayarit</option>
                        <option value="Nuevo León">Nuevo León</option>
                        <option value="Oaxaca">Oaxaca</option>
                        <option value="Puebla">Puebla</option>
                        <option value="Querétaro">Querétaro</option>
                        <option value="Quintana Roo">Quintana Roo</option>
                        <option value="San Luis Potosí">San Luis Potosí</option>
                        <option value="Sinaloa">Sinaloa</option>
                        <option value="Sonora">Sonora</option>
                        <option value="Tabasco">Tabasco</option>
                        <option value="Tamaulipas">Tamaulipas</option>
                        <option value="Tlaxcala">Tlaxcala</option>
                        <option value="Veracruz">Veracruz</option>
                        <option value="Yucatán">Yucatán</option>
                        <option value="Zacatecas">Zacatecas</option>
                    </select>
                </div>
            </div>

            <div class="fila-formulario">
                <div class="grupo-formulario">
                    <label for="cp">Código Postal:</label>
                    <input type="text" id="cp" name="cp" required placeholder="Ingresa tu código postal">
                </div>

                <div class="grupo-formulario">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" required placeholder="Ingresa tu email">
                </div>
            </div>

            <div class="fila-formulario">
                <div class="grupo-formulario">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono" required placeholder="Ingresa tu número de teléfono">
                </div>

                <div class="grupo-formulario">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required placeholder="Ingresa tu password">
                </div>
            </div>

            <button type="submit">Registrarse</button>
        </form>
    </div>

</body>

</html>
