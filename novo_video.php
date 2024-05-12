<?php
include 'database.php';
 
    try {
        if(isset($_POST['url']) && isset($_POST['titulo'])) {
            $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
            if($url === false){
                header('Location:/index.php?sucesso=0');
                exit();
            }
            $titulo = filter_input(INPUT_POST, 'titulo');

            // Preparar a consulta para inserir os dados
            $sql = 'INSERT INTO videos (url, title) VALUES (?, ?)';
            $statement = $pdo->prepare($sql);
            $statement->bindValue(1, $url);
            $statement->bindValue(2, $titulo);

           
            // Executar a consulta e usar var_dump para verificar se a inserção foi bem-sucedida
            if($statement->execute()) {
                header('Location: /index.php?sucesso=1');
            } else {
                header('Location:/index.php?sucesso=0');
            }
        } else {
            echo "URL e/ou título não foram fornecidos via POST.";
        }
    } catch (PDOException $e) {
        // Se houver algum erro na conexão ou na consulta
        echo "Erro: " . $e->getMessage();
    }
?>




