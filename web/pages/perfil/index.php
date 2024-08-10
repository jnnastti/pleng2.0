<html>
<head>
    <?php include('../../assets/cmp/head/HeadPrincipal.php'); ?>
    <title> Pleng | Perfil </title>

</head>

<body>
    <div id="page-perfilusuario" class="container">

    <?php include('../../assets/cmp/menulateral/index.php'); ?>
    
        <header>
            <img src="../../assets/imgs/logo.svg" alt="logo pleng" />
        </header>

        <main>
            <div class="titulo">
                <h1> Editar perfil de usuário </h1>
            </div>

            <form method="POST" name="editarPerfil" action="../../../server/src/perfil/editarPerfil.php">
                <h3> Edite seus dados e matenha-os sempre atualizados </h3>
                <div class="field">
                    <label> Nome: </label>
                    <input type="text" name="nome" value="<?php echo $_SESSION['nomeUsuAtivo']; ?>" />
                </div>
                <div class="field">
                    <label> E-mail: </label>
                    <input type="email" name="email" value="<?php echo $_SESSION['emailUsuAtivo']; ?>"/>
                </div>
                <div class="field">
                    <label> Senha: </label>
                    <input type="password" name="senha" value="<?php echo $_SESSION['senhaUsuAtivo']; ?>"/>
                </div>

                <div class="grid-12">
                    <button type="submit" class="btnVerde btnSalvar"> Salvar </button>
                    <a href="index.php"><button type="button" class="btnBranco btnCancelar"> Cancelar </button></a>
                </div>
            
            </form>
        </main>
    </div>
</body>
</html>
