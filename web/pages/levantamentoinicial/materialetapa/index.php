<html>
<head>
    <?php include('../../../assets/cmp/head/HeadSecundario.php'); ?>
    <title> Pleng | Materiais </title>

    <link href="../../../assets/styles/radioButton.css" rel="stylesheet" />
</head>

<body>
    <div id="page-materialetapa" class="container">

    <?php include('../../../assets/cmp/menulateralsecundario/index.php'); ?>

        <header>
            <img src="../../../assets/imgs/logo.svg" alt="logo pleng" />
        </header>
        
        <main>
            <div class="titulo">
                <h1> Quantidade de material por etapa </h1>
            </div>
            <div class="grid-10">
                <p> 
                    Antes de finalizar, verifique aqui a quantidade de material utilizada em cada etapa. No 
                    final da página é possivel encontrar uma lista geral da quantidade total de cada material. 
                    Você também pode alterar os materiais e suas medições na aba "Dados pré-cadastrados", adaptando 
                    da melhor forma ao seus projetos. Essa lista estará disponivel em "Dashboard" posteriormente.
                </p>
            </div>

            <?php include('../../../../server/src/levantamentoinicial/materialEtapa.php'); ?>

            <div class="grid-10">
                <div class="titulo">
                    <h1> Lista geral de materiais </h1>
                </div>

                <?php include('../../../../server/src/levantamentoinicial/materialProjeto.php'); ?>

            </div>

        </main>
    </div>
</body>
</html>