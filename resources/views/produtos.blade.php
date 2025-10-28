<h1>Produtos</h1>

<form action="/produtos" method="POST"> @csrf <label>Nome do Produto:</label>
    <input type="text" name="nome">
    <button type="submit">Salvar</button>
</form>

<hr>

<h2>Lista de Produtos</h2>
<ul>
    @foreach ($produtos as $produto)
        <li>{{ $produto->nome }}</li>
    @endforeach
</ul>