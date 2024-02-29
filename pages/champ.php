<?php
$champ_id = $_GET['champ_name'];

$ch = curl_init('https://ddragon.leagueoflegends.com/cdn/14.4.1/data/pt_BR/champion/' . $champ_id . '.json');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$result = curl_exec($ch);

if ($result !== false) {
    $json = json_decode($result, true);

    if ($json !== null) {
        foreach ($json['data'] as $champ) {
            $champ_id = $champ['id'];
            $champ_name = $champ['name'];
            $champ_title = $champ['title'];
            $champ_image = 'https://ddragon.leagueoflegends.com/cdn/14.4.1/img/champion/' . $champ['image']['full'];
            $champ_loading = 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/' . $champ_name . '_0.jpg';
            $champ_tags = implode(", ", $champ['tags']);
            $champ_history = $champ['lore'];

            // Dicas
            $champ_tips_ally = $champ['allytips'];
            $champ_tips_enemy = $champ['enemytips'];

            // Infos
            $champ_attack = $champ['info']['attack'];
            $champ_defense = $champ['info']['defense'];
            $champ_magic = $champ['info']['magic'];
            $champ_difficulty = $champ['info']['difficulty'];

            // Estatísticas
            $champ_hp = $champ['stats']['hp'];
            $champ_hpperlevel = $champ['stats']['hpperlevel'];
            $champ_mp = $champ['stats']['mp'];
            $champ_mpperlevel = $champ['stats']['mpperlevel'];
            $champ_movespeed = $champ['stats']['movespeed'];
            $champ_armor = $champ['stats']['armor'];
            $champ_armorperlevel = $champ['stats']['armorperlevel'];
            $champ_spellblock = $champ['stats']['spellblock'];
            $champ_spellblockperlevel = $champ['stats']['spellblockperlevel'];
            $champ_attackrange = $champ['stats']['attackrange'];
            $champ_hpregen = $champ['stats']['hpregen'];
            $champ_hpregenperlevel = $champ['stats']['hpregenperlevel'];
            $champ_mpregen = $champ['stats']['mpregen'];
            $champ_mpregenperlevel = $champ['stats']['mpregenperlevel'];
            $champ_crit = $champ['stats']['crit'];
            $champ_critperlevel = $champ['stats']['critperlevel'];
            $champ_attackdamage = $champ['stats']['attackdamage'];
            $champ_attackdamageperlevel = $champ['stats']['attackdamageperlevel'];
            $champ_attackspeedperlevel = $champ['stats']['attackspeedperlevel'];
            $champ_attackspeed = $champ['stats']['attackspeed'];

            // Skins
            $champ_skins = $champ['skins'];

            // Habilidades
            $champ_spell_0 = $champ['spells'][0];
            $champ_spell_1 = $champ['spells'][1];
            $champ_spell_2 = $champ['spells'][2];
            $champ_spell_3 = $champ['spells'][3];

            // Passiva
            $champ_passive_name = $champ['passive']['name'];
            $champ_passive_description = $champ['passive']['description'];
            $champ_passive_image = 'https://ddragon.leagueoflegends.com/cdn/14.4.1/img/passive/' . $champ['passive']['image']['full'];
        }
    } else {
        echo "Campeão não encontrado!";
        exit;
    }
} else {
    echo "Erro na requisição";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info League | Infos do Campeão</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="../css/champ.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">
                <img src="https://logosmarcas.net/wp-content/uploads/2020/11/League-of-Legends-Logo.png" height="100" class="d-inline-block align-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item fs-4 font-monospace">
                        <a class="nav-link text-white active" aria-current="page" href="#">Infos do Campeão</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <h1 class="mt-3 text-white text-center">
        <?php echo $champ_name; ?>
        <small class="text-secondary">- <?php echo $champ_title; ?></small>
    </h1>

    <div class="container mt-5 bg-dark mw-75 p-3 h-100">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex gap-3">
                    <div class="card champ-card">
                        <div class="champ-header">
                            <img src="<?php echo $champ_image; ?>" class="card-img-top champ-image" alt="<?php echo $champ_name; ?>">
                        </div>
                    </div>

                    <div>
                        <h1 class="text-white">Sobre:</h1>

                        <p class="text-white"><?php echo $champ_history; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 bg-dark mw-75 p-3 h-100">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex gap-3">
                    <div class="card champ-card" style="width: 14%;">
                        <div class="champ-tips">
                            <img src="../img/dicas.png" class="card-img-top champ-image" alt="<?php echo $champ_name; ?>" width="50">
                        </div>
                    </div>

                    <div>
                        <h1 class="text-white">Dicas:</h1>
                        <small class="text-white"><b>Aliadas:</b></small>
                        <?php
                        for ($i = 0; $i < count($champ_tips_ally); $i++) {
                            echo "<p class='text-white'><b>$i)</b> $champ_tips_ally[$i]</p>";
                        }
                        ?>

                        <small class="text-white"><b>Inimigas:</b></small>
                        <?php
                        for ($i = 0; $i < count($champ_tips_enemy); $i++) {
                            echo "<p class='text-white'><b>$i)</b> $champ_tips_enemy[$i]</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 bg-dark mw-75 p-3 h-100">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex gap-3">
                    <div class="card champ-card" style="width: 14%;">
                        <div class="champ-tips">
                            <img src="../img/estatistica.png" class="card-img-top champ-image" alt="<?php echo $champ_name; ?>" width="50">
                        </div>
                    </div>

                    <div>
                        <h1 class="text-white">Informações & Estatísticas:</h1>
                        <small class="text-white"><b>Informações (<code>Level: 1</code>):</b></small>

                        <div>
                            <p class="text-white"><b>Ataque:</b> <code><?php echo $champ_attack; ?></code><br><b>Defesa:</b> <code><?php echo $champ_defense; ?></code><br><b>Magia:</b> <code><?php echo $champ_magic; ?></code><br><b>Dificuldade:</b> <code><?php echo $champ_difficulty; ?></code></p>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered" style="width: 100%;">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Valor</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <tr>
                                <th scope="row">Vida</th>
                                <td><code><?php echo $champ_hp; ?></code></td>
                                <th scope="row">Armadura</th>
                                <td><code><?php echo $champ_hpperlevel; ?></code></td>
                                <th scope="row">Regeneração de Vida</th>
                                <td><code><?php echo $champ_hpregen; ?></code></td>
                                <th scope="row">Crítico por Level</th>
                                <td><code><?php echo $champ_critperlevel; ?></code></td>
                            <tr>
                            <tr>
                                <th scope="row">Vida por Level</th>
                                <td><code><?php echo $champ_hpperlevel; ?></code></td>
                                <th scope="row">Armadura por Level</th>
                                <td><code><?php echo $champ_hpperlevel; ?></code></td>
                                <th scope="row">Regeneração de Vida por Level</th>
                                <td><code><?php echo $champ_hpregenperlevel; ?></code></td>
                                <th scope="row">Dano de Ataque</th>
                                <td><code><?php echo $champ_attackdamage; ?></code></td>
                            <tr>
                            <tr>
                                <th scope="row">Mana</th>
                                <td><code><?php echo $champ_hpperlevel; ?></code></td>
                                <th scope="row">Resistência Mágica</th>
                                <td><code><?php echo $champ_spellblock; ?></code></td>
                                <th scope="row">Regeneração de Mana</th>
                                <td><code><?php echo $champ_mpregen; ?></code></td>
                                <th scope="row">Dano de Ataque por Level</th>
                                <td><code><?php echo $champ_attackdamageperlevel; ?></code></td>
                            <tr>
                            <tr>
                                <th scope="row">Mana por Level</th>
                                <td><code><?php echo $champ_hpperlevel; ?></code></td>
                                <th scope="row">Resistência Mágica por Level</th>
                                <td><code><?php echo $champ_spellblockperlevel; ?></code></td>
                                <th scope="row">Regeneração de Mana por Level</th>
                                <td><code><?php echo $champ_mpregenperlevel; ?></code></td>
                                <th scope="row">Velocidade de Ataque por Level</th>
                                <td><code><?php echo $champ_attackspeedperlevel; ?></code></td>
                            <tr>
                            <tr>
                                <th scope="row">Velocidade de Movimento</th>
                                <td><code><?php echo $champ_hpperlevel; ?></code></td>
                                <th scope="row">Range de Ataque</th>
                                <td><code><?php echo $champ_attackrange; ?></code></td>
                                <th scope="row">Crítico</th>
                                <td><code><?php echo $champ_crit; ?></code></td>
                                <th scope="row">Velocidade de Ataque</th>
                                <td><code><?php echo $champ_attackspeed; ?></code></td>
                            <tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 bg-dark mw-75 p-3 h-100">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center text-white">Skins</h1>
            </div>
        </div>

        <div class="row mt-3 justify-content-center">
            <?php
            for ($i = 0; $i < count($champ_skins); $i++) {
                $champ_skins[$i]['name'] == 'default' ? $champ_skins[$i]['name'] = 'Padrão' : $champ_skins[$i]['name'];
            ?>
                <div class="col-md-2 mb-4">
                    <a class="a_skins" data-skin="https://ddragon.leagueoflegends.com/cdn/img/champion/splash/<?php echo $champ_id; ?>_<?php echo $champ_skins[$i]['num']; ?>.jpg" data-name-skin="<?php echo $champ_skins[$i]['name']; ?>" data-loading="<?php echo $champ_loading; ?>">
                        <div class="card champ-card-skins shadow-lg bg-secondary text-white" style="width: 100%; height: 100%;">
                            <div class="card-header champ-header">
                                <img src="https://ddragon.leagueoflegends.com/cdn/img/champion/splash/<?php echo $champ_id; ?>_<?php echo $champ_skins[$i]['num']; ?>.jpg" class="card-img-top champ-image" alt="<?php echo $champ_name; ?>">
                            </div>

                            <div class="card-body champ-body">
                                <div class="text-center">
                                    <button class="btn btn-primary m-3 btn_skins" data-skin="https://ddragon.leagueoflegends.com/cdn/img/champion/splash/<?php echo $champ_id; ?>_<?php echo $champ_skins[$i]['num']; ?>.jpg" data-name-skin="<?php echo $champ_skins[$i]['name']; ?>" data-loading="<?php echo $champ_loading; ?>">Visualizar</button>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="container mt-5 bg-dark mw-75 p-3 h-100">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center text-white">Habilidades</h1>
            </div>
        </div>

        <div class="row mt-3 justify-content-center">
            <div class="col-md-2 mb-4">
                <a class="a_spells" data-spell="https://ddragon.leagueoflegends.com/cdn/14.4.1/img/spell/<?php echo $champ_spell_0['image']['full']; ?>" data-name-spell="<?php echo $champ_spell_0['name']; ?>" data-description-spell="<?php echo $champ_spell_0['description']; ?>">
                    <div class="card champ-card-spells shadow-lg bg-secondary text-white" style="width: 100%; height: 100%;">
                        <div class="card-header champ-header">
                            <img src="https://ddragon.leagueoflegends.com/cdn/14.4.1/img/spell/<?php echo $champ_spell_0['image']['full']; ?>" class="card-img-top champ-image" alt="<?php echo $champ_name; ?>">
                        </div>

                        <div class="card-body champ-body">
                            <h1 class="card-title text-center">Q</h1>

                            <hr class="m-0 p-0">

                            <div class="text-center">
                                <button class="btn btn-primary m-3 btn_spells" data-spell="https://ddragon.leagueoflegends.com/cdn/14.4.1/img/spell/<?php echo $champ_spell_0['image']['full']; ?>" data-name-spell="<?php echo $champ_spell_0['name']; ?>" data-description-spell="<?php echo $champ_spell_0['description']; ?>">Visualizar</button>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-2 mb-4">
                <a class="a_spells" data-spell="https://ddragon.leagueoflegends.com/cdn/14.4.1/img/spell/<?php echo $champ_spell_1['image']['full']; ?>" data-name-spell="<?php echo $champ_spell_1['name']; ?>" data-description-spell="<?php echo $champ_spell_1['description']; ?>">
                    <div class="card champ-card-spells shadow-lg bg-secondary text-white" style="width: 100%; height: 100%;">
                        <div class="card-header champ-header">
                            <img src="https://ddragon.leagueoflegends.com/cdn/14.4.1/img/spell/<?php echo $champ_spell_1['image']['full']; ?>" class="card-img-top champ-image" alt="<?php echo $champ_name; ?>">
                        </div>

                        <div class="card-body champ-body">
                            <h1 class="card-title text-center">W</h1>

                            <hr class="m-0 p-0">

                            <div class="text-center">
                                <button class="btn btn-primary m-3 btn_spells" data-spell="https://ddragon.leagueoflegends.com/cdn/14.4.1/img/spell/<?php echo $champ_spell_1['image']['full']; ?>" data-name-spell="<?php echo $champ_spell_1['name']; ?>" data-description-spell="<?php echo $champ_spell_1['description']; ?>">Visualizar</button>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-2 mb-4">
                <a class="a_spells" data-spell="https://ddragon.leagueoflegends.com/cdn/14.4.1/img/spell/<?php echo $champ_spell_1['image']['full']; ?>" data-name-spell="<?php echo $champ_spell_1['name']; ?>" data-description-spell="<?php echo $champ_spell_1['description']; ?>">
                    <div class="card champ-card-spells shadow-lg bg-secondary text-white" style="width: 100%; height: 100%;">
                        <div class="card-header champ-header">
                            <img src="https://ddragon.leagueoflegends.com/cdn/14.4.1/img/spell/<?php echo $champ_spell_2['image']['full']; ?>" class="card-img-top champ-image" alt="<?php echo $champ_name; ?>">
                        </div>

                        <div class="card-body champ-body">
                            <h1 class="card-title text-center">E</h1>

                            <hr class="m-0 p-0">

                            <div class="text-center">
                                <button class="btn btn-primary m-3 btn_spells" data-spell="https://ddragon.leagueoflegends.com/cdn/14.4.1/img/spell/<?php echo $champ_spell_2['image']['full']; ?>" data-name-spell="<?php echo $champ_spell_2['name']; ?>" data-description-spell="<?php echo $champ_spell_2['description']; ?>">Visualizar</button>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-2 mb-4">
                <a class="a_spells" data-spell="https://ddragon.leagueoflegends.com/cdn/14.4.1/img/spell/<?php echo $champ_spell_3['image']['full']; ?>" data-name-spell="<?php echo $champ_spell_3['name']; ?>" data-description-spell="<?php echo $champ_spell_3['description']; ?>">
                    <div class="card champ-card-spells shadow-lg bg-secondary text-white" style="width: 100%; height: 100%;">
                        <div class="card-header champ-header">
                            <img src="https://ddragon.leagueoflegends.com/cdn/14.4.1/img/spell/<?php echo $champ_spell_3['image']['full']; ?>" class="card-img-top champ-image" alt="<?php echo $champ_name; ?>">
                        </div>

                        <div class="card-body champ-body">
                            <h1 class="card-title text-center">R</h1>

                            <hr class="m-0 p-0">

                            <div class="text-center">
                                <button class="btn btn-primary m-3 btn_spells" data-spell="https://ddragon.leagueoflegends.com/cdn/14.4.1/img/spell/<?php echo $champ_spell_3['image']['full']; ?>" data-name-spell="<?php echo $champ_spell_3['name']; ?>" data-description-spell="<?php echo $champ_spell_3['description']; ?>">Visualizar</button>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5 bg-dark mw-75 p-3 h-100">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center text-white">Passiva</h1>
            </div>
        </div>

        <div class="row mt-3 justify-content-center">
            <div class="col-md-3 mb-4">
                <div class="card champ-card-passive shadow-lg bg-secondary text-white" style="width: 100%;">
                    <div class="card-header champ-header">
                        <img src="<?php echo $champ_passive_image; ?>" class="card-img-top champ-image" alt="<?php echo $champ_passive_name; ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="text-center text-white">
                    <p><?php echo $champ_passive_description; ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <script src="../js/procedures.js"></script>
    <script src="../node_modules/node-vibrant/dist/vibrant.js"></script>
    <script src="../node_modules/node-vibrant/dist/vibrant.min.js"></script>
    <script>
        var imgPath = '<?php echo $champ_image; ?>';

        Vibrant.from(imgPath).getPalette((err, palette) => {
            if (err) throw err;
            var dominantColor = palette.Vibrant.hex;

            var elementos = document.getElementsByClassName('champ-header');

            for (var i = 0; i < elementos.length; i++) {
                elementos[i].style.backgroundColor = dominantColor;
            }
        });
    </script>
</body>

</html>