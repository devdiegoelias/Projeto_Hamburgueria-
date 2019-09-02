<div class="login">
    <form class="form-signin" method="POST">
        <div class="text-center">
            <img class="mb-4" src="<?php echo BASE_URL."assets/image/logo.jpg"?>" alt="" width="270" height="270">
            <h1 class="h3 mb-3 font-weight-normal">Acesse a plataforma de pedidos</h1>
        </div>
        
        <label for="email">E-mail: </label>
        <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
        <label for="senha">Senha: </label>
        <input type="password" name="senha" class="form-control" placeholder="Password" required>

        <button class="btn btn-lg btn-success btn-personalizado btn-personalizado2" type="submit">Entrar</button>
        <a class="btn btn-lg btn-light btn-personalizado btn-personalizado2" href="<?php echo BASE_URL."login/cadastro"?>">Cadastrar<a>
    </form>
</div>