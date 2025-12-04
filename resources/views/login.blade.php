<h1>Login</h1>
@if($errors->any()) <p style="color:red">{{ $errors->first() }}</p> @endif

<form action="/login" method="POST">
    @csrf
    Email: <input type="email" name="email" required> <br>
    Senha: <input type="password" name="password" required> <br>
    <button type="submit">Entrar</button>
</form>