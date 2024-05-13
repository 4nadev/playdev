<?php
include 'database.php';
 
    try {
       
            $id = $_GET['id'];
            
            $sql = 'DELETE FROM videos WHERE id = ?';
            $statement = $pdo->prepare($sql);
            $statement->bindValue(1, $id);
            // Executar a consulta e usar var_dump para verificar se a inserção foi bem-sucedida
            if($statement->execute()) {
                header('Location: /index.php?sucesso=1');
            } else {
                header('Location:/index.php?sucesso=0');
            }
 
    } catch (PDOException $e) {
        // Se houver algum erro na conexão ou na consulta
        echo "Erro: " . $e->getMessage();
    }
?>




