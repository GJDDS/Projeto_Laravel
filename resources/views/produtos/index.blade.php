<h1>Lista de Produtos</h1>

@if(session('success')) <p style="color:green">{{ session('success') }}</p> @endif
@if($ultimoProduto) <p style="color:blue">Último cadastrado: {{ $ultimoProduto }}</p> @endif

<a href="{{ route('produtos.create') }}">Novo Produto</a> | 
<form action="{{ route('logout') }}" method="POST" style="display:inline">@csrf <button>Sair</button></form>

<table border="1" width="100%">
    <tr>
        <th>Imagem</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Ações</th>
    </tr>
    @foreach ($produtos as $p)
    <tr>
        <td>
            @if($p->imagem) <img src="{{ asset('storage/'.$p->imagem) }}" width="50"> @else Sem Foto @endif
        </td>
        <td>{{ $p->nome }}</td>
        <td>{{ $p->descricao }}</td>
        <td>
            <a href="{{ route('produtos.edit', $p->id) }}">Editar</a>
            <form action="{{ route('produtos.destroy', $p->id) }}" method="POST" style="display:inline">
                @csrf @method('DELETE')
                <button type="submit">Excluir</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>