<h1>Adicionar Produto</h1>

<!--Form para adição do produto-->
<form method="POST" action="adicionar_action.php">
    <label>
        Nome Produto:
        <input type="text" name="nome_produto">
    </label><br>

    <label>
        Descrição:
        <textarea style="resize: none;" name="descricao"></textarea>
    </label><br>

    <label>
        Preço(un.):
        <input type="number" step="0.01" min="0.01" name="preco">
    </label><br>

    <label>
        Quantidade:
        <input type="number" name="quantidade">
    </label><br>

    <input type="submit" value="Adicionar">
</form>