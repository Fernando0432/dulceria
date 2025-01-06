<?php include 'logica.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Dulcería</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Poppins', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f3e9;
            color: #333;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            overflow: hidden;
            background: #ffffff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #D84315;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        /* Form Section */
        .form-section {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            align-items: center;
            margin-bottom: 30px;
        }

        .form-section img {
            max-width: 300px;
            border-radius: 8px;
        }

        form {
            flex: 1;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        form input, form button {
            padding: 10px;
            font-size: 1rem;
            border-radius: 5px;
            border: 1px solid #ccc;
            outline: none;
        }

        form input:focus {
            border-color: #D84315;
        }

        form button {
            background-color: #D84315;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form button:hover {
            background-color: #bf360c;
        }

        /* Table Section */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: #D84315;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #fdf3ef;
        }

        tr:hover {
            background-color: #ffebd9;
        }

        /* Actions Section */
        .actions form {
            display: inline-block;
        }

        .actions form button {
            padding: 8px 10px;
            font-size: 0.9rem;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Inventario de Dulcería</h1>

        <!-- Formulario y Imagen -->
        <div class="form-section">
            <!-- Imagen decorativa -->
            <img src="dulceria.png" alt="Imagen de Dulcería">
            
            <!-- Formulario -->
            <form method="POST">
                <input type="text" name="nombre" placeholder="Nombre del dulce" required>
                <input type="number" step="0.01" name="precio" placeholder="Precio" required>
                <input type="number" name="cantidad" placeholder="Cantidad" required>
                <button type="submit" name="create">Agregar Dulce</button>
            </form>
        </div>

        <!-- Tabla de dulces -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td>$<?php echo number_format($row['precio'], 2); ?></td>
                        <td><?php echo $row['cantidad']; ?></td>
                        <td class="actions">
                            <!-- Actualizar -->
                            <form method="POST" style="display: inline-block;">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre']; ?>">
                                <input type="number" step="0.01" name="precio" value="<?php echo $row['precio']; ?>">
                                <input type="number" name="cantidad" value="<?php echo $row['cantidad']; ?>">
                                <button type="submit" name="update">Actualizar</button>
                            </form>
                            <!-- Eliminar -->
                            <form method="POST" style="display: inline-block;">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="delete">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
