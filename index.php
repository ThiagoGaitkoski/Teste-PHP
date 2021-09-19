<?php
    require  'config.php';//Adição ao banco

    $lista = [];//Array para armazenar os itens

    //Selecionando e armazenando os itens no array
    $sql = $pdo->query("SELECT * FROM produtos");
    if($sql->rowCount() > 0){
        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
?>

<table border="1" width="100%">
    <tr>
        <th>Código</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th>Quantidade</th>
        <th>Ações</th>
    </tr>
    <!--Varre o array e busca os resultados-->
    <?php foreach($lista as $produto): ?>
        <tr style="text-align: center;">
            <td><?php echo $produto['id']; ?></td>
            <td><?php echo $produto['nome']; ?></td>
            <td><?php echo $produto['descricao']; ?></td>
            <td>R$ <?php echo $produto['valor']; ?></td>
            <td><?php echo $produto['quantidade']; ?></td>
            <td>
                <a href="editar.php?id=<?php echo $produto['id'];?>">[ Editar ]</a>
                <a href="excluir.php?id=<?php echo $produto['id'];?>" onclick="return confirm('Deseja realmente excluir?');">[ Excluir ]</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="adicionar.php" style="display: block;">ADICIONAR PRODUTO</a>
<a href="entrada.php?id=<?php echo $produto['id'];?>" style="display: block;">[ Entrada de Produtos]</a>