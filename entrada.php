<?php
    require 'config.php';
    
    $lista = [];//Array para armazenar os itens

    //Selecionando e armazenando os itens no array
    $sql = $pdo->query("SELECT * FROM produtos");
    if($sql->rowCount() > 0){
        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
?>
<h1>Entrada de Produtos</h1>

<table border="1" width="100%">
    <tr>
        <th>Código</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th>Quantidade</th>
        <th>Data de Entrada</th>
    </tr>
    <?php foreach($lista as $produto): ?>
        <tr style="text-align: center;">
            <td><?php echo $produto['id']; ?></td>
            <td><?php echo $produto['nome']; ?></td>
            <td><?php echo $produto['descricao']; ?></td>
            <td>R$ <?php echo $produto['valor']; ?></td>
            <td><?php echo $produto['quantidade']; ?></td>
            <td><?php echo $produto['entrada'];?></td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="index.php">Voltar para a home</a>