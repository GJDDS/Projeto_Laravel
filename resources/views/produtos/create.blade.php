<h1>Novo Produto</h1>
<form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    Nome: <input type="text" name="nome"> <br>
    Descrição: <textarea name="descricao"></textarea> <br>
    Imagem: <input type="file" name="imagem"> <br>
    <button type="submit">Salvar</button>
</form>