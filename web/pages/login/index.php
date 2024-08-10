<html>
<head>
    <!---- https://coolors.co/022b3a-1f7a8c-bfdbf7-e1e5f2-f5f5f5 -->

    <?php include('../../assets/cmp/head/HeadPrincipal.php'); ?>
    <title> Pleng | O futuro da engenharia está aqui </title>

</head>

<body>
    <div id="page-login" class="container">

        <header>
            <img src="../../assets/imgs/logo.svg" alt="logo pleng" />
        </header>

        <main class="login">
            <div class="grid-6 esquerdo">
                <form method="POST" name="login" action="../../../server/src/login/Login.php">
                    <h2> Faça login para ter acesso ao <b>PLENG</b> </h2>
                    <img src="../../assets/imgs/logo.svg" />
                    <div class="field">
                        <label> Seu e-mail: </label>
                        <input type="email" name="email" required autofocus />
                    </div>
                    <div class="field">
                        <label> Sua senha: </label>
                        <input type="password" name="senha" required />
                    </div>

                    <button type="submit" class="grid-12 btnVerde"> Entrar </button>
                </form>
            </div>

            <div class="grid-6 direito">
                <div class="cont">
                    <div class="grid-12">
                        <div class="grid-3">
                            <img src="../../assets/imgs/iconlogin1.svg" />
                        </div>
                        <div class="grid-9">
                            <h2> Práticidade de uso </h2>
                            <p> 
                                Com poucos cliques você tem acesso a inúmeras funções do nosso sistema,
                                podendo ir desde a criação de um novo projeto até a emissão de seu relatório final.
                            </p>
                        </div>
                    </div>

                    <div class="grid-12">
                        <div class="grid-3">
                            <img src="../../assets/imgs/iconlogin2.svg" />
                        </div>
                        <div class="grid-9">
                            <h2> Flexivel </h2>
                            <p> 
                                Além dos dados já pré-cadastrados, você também pode criar seu próprio controle
                                de valores, unidades e quantidades para diferentes registros.
                            </p>
                        </div>
                    </div>

                    <div class="grid-12">
                        <div class="grid-3">
                            <img src="../../assets/imgs/iconlogin3.svg" />
                        </div>
                        <div class="grid-9">
                            <h2> Previsão de gastos e materiais </h2>
                            <p>
                                Para auxiliar e facilitar ainda mais o seu controle em ombras, o pleng contém
                                calculos prontos, poupando seu tempo na hora de finalizar seu projeto. 
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
</body>

</html>