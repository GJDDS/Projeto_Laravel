<!--
Este é o arquivo 'categorias.blade.php'.
Note que mudei todos os textos e variáveis de "produto" para "categoria".
-->

<h1>Categorias</h1>

<!-- O 'action' do formulário agora aponta para '/categorias' -->
<form action="/categorias" method="POST"> 
    @csrf 
    <label>Nome da Categoria:</label>
    <input type="text" name="nome">
    <button type="submit">Salvar</button>
</form>

<hr>

<h2>Lista de Categorias</h2>
<ul>
    <!-- A variável do loop agora é $categorias (enviada pelo Controller) -->
    @foreach ($categorias as $categoria)
        <li>{{ $categoria->nome }}</li>
    @endforeach
</ul>
