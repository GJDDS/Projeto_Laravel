<h1>Editar Produto</h1>
<form action="{{ route('produtos.update', $produto->id) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    Nome: <input type="text" name="nome" value="{{ $produto->nome }}"> <br>
    Descrição: <textarea name="descricao">{{ $produto->descricao }}</textarea> <br>
    Imagem Atual: @if($produto->imagem) <img src="{{ asset('storage/'.$produto->imagem) }}" width="50"> @endif <br>
    Trocar Imagem: <input type="file" name="imagem"> <br>
    <button type="submit">Atualizar</button>
</form>