<?php
    require 'config.php';

    //Recebimento das informações
    $name = filter_input(INPUT_POST, 'nome_produto');
    $descricao = filter_input(INPUT_POST, 'descricao');
    $valor = filter_input(INPUT_POST, 'preco');
    $quantidade = filter_input(INPUT_POST, 'quantidade');

    //Verificação das informações
    if($name && $descricao && $valor && $quantidade){

        //Verifica se o produto adicionado consta no banco
        $sql = $pdo->prepare("SELECT * FROM produtos WHERE nome = :nome");
        $sql->bindValue(':nome',$name);
        $sql->execute();

        //Caso não, adiciona ao banco
        if($sql->rowCount() === 0){
            $sql = $pdo->prepare("INSERT INTO produtos (nome, descricao, valor, quantidade) 
            VALUES (:name, :descricao, :valor, :quantidade)");
            
            $sql->bindValue(':name', $name);
            $sql->bindValue(':descricao', $descricao);
            $sql->bindValue(':valor', $valor);
            $sql->bindValue(':quantidade', $quantidade);
            $sql->execute();

            header("Location: index.php");
            exit;
        }else{
            header("Location: adicionar.php");
            exit;
        }
    }else{
        header("Location: adicionar.php");
        exit;
    }
?>