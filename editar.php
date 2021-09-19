<?php
    require 'config.php';
    $info = []; //Array para armazenar as informações do banco

    //Varredura com parâmetro ID, para pegar as informações certas
    $id = filter_input(INPUT_GET, 'id');
    if($id){
        $sql = $pdo->prepare("SELECT * FROM produtos WHERE id = :id");
        $sql->bindValue(':id',$id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $info = $sql->fetch(PDO::FETCH_ASSOC);
            $info['nome'];

        }else{
            header("Location: index.php");
            exit;
        }
    }else{
        header("Location: index.php");
        exit;
    }
?>

<h1>Editar Produto</h1>

<form method="POST" action="editar_action.php">
    <input type="hidden" name="id" value="<?php echo $info['id']; ?>"/>

    <label>
        Nome Produto:
        <input type="text" name="nome_produto" value="<?php echo $info['nome'];?>">
    </label><br>

    <label>
        Descrição:
        <input type="text" name="descricao" value="<?php echo $info['descricao'];?>">
    </label><br>

    <label>
        Preço(un.):
        <input type="number" step="0.01" min="0.01" name="preco" value="<?php echo $info['valor'];?>">
    </label><br>

    <label>
        Quantidade:
        <input type="number" name="quantidade" value="<?php echo $info['quantidade'];?>">
    </label><br>

    <input type="submit" value="Salvar">
</form>