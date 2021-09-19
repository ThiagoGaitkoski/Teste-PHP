<?php
    require 'config.php';

    //Recebimento das informações
    $id = filter_input(INPUT_POST, 'id');
    $name = filter_input(INPUT_POST, 'nome_produto');
    $descricao = filter_input(INPUT_POST, 'descricao');
    $valor = filter_input(INPUT_POST, 'preco');
    $quantidade = filter_input(INPUT_POST, 'quantidade');

    //Verificação das informações
    if($id && $name && $descricao && $valor && $quantidade){
        $sql = $pdo->prepare(
            "UPDATE produtos SET 
            nome = :name,
            descricao = :descricao, 
            valor = :valor, 
            quantidade = :quantidade 
            WHERE id = :id");

            $sql->bindValue(':name', $name);
            $sql->bindValue(':descricao', $descricao);
            $sql->bindValue(':valor', $valor);
            $sql->bindValue(':quantidade', $quantidade);
            $sql->bindValue(':id', $id);
            $sql->execute();

            header("Location: index.php");
            exit;
    }else{
        header("Location: adicionar.php");
        exit;
    }
?>