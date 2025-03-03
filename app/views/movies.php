<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movies</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        .nav-bar {
            display: flex;
            margin: 1.5rem;
        }

        .content {
            margin: 1.5rem;
        }
        th, td {
            border: solid black 1px;
            text-align: center;
            padding: 0.5rem 2rem;
        }
        table {
            border: solid black 1px;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<div class="nav-bar">
    <h3><?= "Usuario: " . $_SESSION['user']?></h3>
    <form action="/purchase/index">
        <input type="submit" value="Mis Entradas">
    </form>

    <form action="/cinema/index">
        <input type="submit" value="Cines">
    </form>

    <form action="/customer/logout">
        <input type="submit" value="Cerrar Sesión">
    </form>
</div>

<div class="content">
    <table>
        <tr>
            <th>Nombre</th>
            <th>Año</th>
            <th>Nacionalidad</th>
            <th>Butacas Libres</th>
            <th>Poster</th>
            <th>Compra</th>
        </tr>

        <?php foreach ($movies as $movie){?>

        <tr>
            <th><?= $movie->name?></th>
            <th><?= $movie->year?></th>
            <th><?= $movie->nationality?></th>
            <th><?= $movie->tickets?></th>
            <th><img width="140" height="210" src="<?=$movie->cover?>" alt="poster"></th>
            <th>
                <form action="<?=htmlspecialchars("/movie/purchase/$movie->idMovie")?>" method="POST">
                    <input type="submit" value="Comprar Entradas">
                </form>
            </th>
            
        </tr>

        <?php }?>
    </table>
</div>

</body>
</html>