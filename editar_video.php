<?php
include 'database.php';
 
    try {
       
          
                
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            if ($id === false) {
                header('Location: /index.php?sucesso=0');
                exit();
            }

            $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
            if ($url === false) {
                header('Location: /index.php?sucesso=0');
                exit();
            }
            $titulo = filter_input(INPUT_POST, 'titulo');
            if ($titulo === false) {
                header('Location: /index.php?sucesso=0');
                exit();
            }
            $sql = 'UPDATE videos SET url = :url , title = :title WHERE id = :id;';
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':url', $url);
            $statement->bindValue(':title', $titulo);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            // Executar a consulta e usar var_dump para verificar se a inserção foi bem-sucedida
        
    } catch (PDOException $e) {
        // Se houver algum erro na conexão ou na consulta
        echo "Erro: " . $e->getMessage();
    }
?>




