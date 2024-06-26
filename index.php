<?php
include 'database.php'; // Inclua o arquivo de conexão com o banco de dados

try {
    // Consulta SQL para selecionar todos os vídeos
    $sql = 'SELECT * FROM videos';
    $statement = $pdo->query($sql);
    
    // Recupera todos os vídeos como uma matriz associativa
    $videoList = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Se houver algum erro na conexão ou na consulta
    echo "Erro: " . $e->getMessage();
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="stylesheet" href="./css/flexbox.css">
    <title>Play Dev</title>
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
</head>

<body>

    <header>

        <nav class="cabecalho">
            <a class="logo" href="/"></a>

            <div class="cabecalho__icones">
                <a href="./pages/enviar-video.html" class="cabecalho__videos"></a>
                <a href="./pages/login.html" class="cabecalho__sair">Sair</a>
            </div>
        </nav>

    </header>

    <ul class="videos__container">
    <?php foreach ($videoList as $video): ?>
            <li class="videos__item">
                <iframe width="100%" height="72%" src="<?= $video['url']; ?>"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                <div class="descricao-video">
                    <h3><?php echo $video['title']; ?></h3>
                    <div class="acoes-video">
                        <a href="./formulario.php?id=<?= $video['id']; ?>">Editar</a>
                        <a href="./remover_video.php?id=<?= $video['id']; ?>">Excluir</a>
                    </div>
                </div>
            </li>
       
    <?php endforeach; ?>
</ul>

</body>

</html>