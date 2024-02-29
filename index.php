<?php
$ch = curl_init('https://ddragon.leagueoflegends.com/cdn/14.4.1/data/pt_BR/champion.json');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$result = curl_exec($ch);

$json = json_decode($result, true);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info League | Página Inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="https://logosmarcas.net/wp-content/uploads/2020/11/League-of-Legends-Logo.png" height="100" class="d-inline-block align-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item fs-4 font-monospace">
                        <a class="nav-link text-white active" aria-current="page" href="index.php">Página Inicial</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <h1 class="mt-3 mb-3 text-center text-white font-monospace text-decoration-underline">Lista de Campeões</h1>

    <div class="container bg-dark mw-75 p-3 h-100">
        <div class="row justify-content-center">
            <?php
            foreach ($json['data'] as $champ) {
                $champ_id = $champ['id'];
                $champ_name = $champ['name'];
                $champ_title = $champ['title'];
                $champ_image = 'https://ddragon.leagueoflegends.com/cdn/14.4.1/img/champion/' . $champ['image']['full'];
                $champ_loading = 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/' . $champ_name . '_0.jpg';
                $champ_tags = implode(", ", $champ['tags']);
            ?>
                <div class="col-md-2 mb-4">
                    <a href="pages/champ.php?champ_name=<?php echo $champ_id; ?>" class="a_detalhes" data-loading="<?php echo $champ_loading; ?>">
                        <div class="card champ-card shadow-lg bg-secondary text-white">
                            <div class="card-header champ-header">
                                <img src="<?php echo $champ_image; ?>" class="card-img-top champ-image" alt="<?php echo $champ_name; ?>">
                            </div>
                            <div class="card-body champ-body">
                                <h3 class="card-title text-center"><?php echo $champ_name; ?></h3>

                                <hr class="m-0 p-0">

                                <div class="text-center">
                                    <a href="pages/champ.php?champ_name=<?php echo $champ_id; ?>" class="btn btn-primary m-3 btn_detalhes" data-loading="<?php echo $champ_loading; ?>">Detalhes</a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <script src="js/procedures.js"></script>
</body>

</html>