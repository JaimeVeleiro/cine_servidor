<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comprar entrada</title>
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

    <?php if ($movie->tickets > 0) { ?>
        <form action="<?=htmlspecialchars("/movie/buyTickets/$movie->idMovie")?>" method="POST">
            <label for="ticketsToBuy"><?= "Hay $movie->tickets butacas libres de la película $movie->name, ¿Cuántas quiere?"?></label>
            <select name="ticketsToBuy" id="ticketsToBuy">
                <?php for($x = 0; $x < $movie->tickets; $x++){?>
                    <option value="<?= $x + 1?>"><?= $x + 1?></option>
                <?php } ?>
            </select>

            <br>

            <input type="submit" value="Comprar Entrada">
        </form>
    <?php } else {?>
        <h2><?= "Lo siento, la película de $movie->name no tiene tickets disponibles, lo siento mucho"?></h2>
    <?php }?>

</div>
</body>
</html>