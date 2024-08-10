<nav class="main-menu">
    <ul>
        <li class="nome">
            <h2> 
                Seja bem-vindo, <?= $_SESSION['nomeUsuario'] ?>
            </h2>
        </li>  

        <li>                                   
            <a href="../../configurar/perfil/index.php">
                <i class="fa gg-profile"></i>
                <span class="nav-text"> Perfil </span>
            </a>
        </li>   

        <li>                                 
            <a href="../../configurar/projeto/index.php">
                <i class="fa gg-toolbox"></i>
                <span class="nav-text"> Projeto ativo: <?= $_SESSION['nomeProjeto'] ?></span>
            </a>
        </li>    

        <li class="darkerlishadow">
            <a href="">
                <i class="fa gg-trello"></i>
                <span class="nav-text">Dashboards</span>
            </a>
        </li>
        
        <li class="darkerli">
            <a href="../../relatorio/index.php">
                <i class="fa gg-file"></i>
                <span class="nav-text">Relatórios</span>
            </a>
        </li>

        
        <li class="darkerli">
            <a href="">
                <i class="fa gg-calculator"></i>
                <span class="nav-text">Orçamento</span>
            </a>
        </li>

        <li class="darkerli">
            <a href="../../levantamentoinicial/index.php">
                <i class="fa gg-album"></i>
                <span class="nav-text">Levantamento inicial</span>
            </a>
        </li>

        <li class="darkerli">
            <a href="../../diariodeobra/index.php">
                <i class="fa gg-list"></i>
                <span class="nav-text">Diário de obras</span>
            </a>
        </li>

        <li class="darkerli">
            <a href="">
                <i class="fa gg-calendar-today"></i>
                <span class="nav-text">Cronograma</span>
            </a>
        </li>

        <li class="darkerli">
            <a href="../../galeria/index.php">
                <i class="fa gg-image"></i>
                <span class="nav-text">Galeria</span>
            </a>
        </li>

        <li class="darkerlishadowdown">
            <a href="../../dadosprecadastrados/index.php">
                <i class="fa gg-terminal"></i>
                <span class="nav-text">Dados pré-cadastrados</span>
            </a>
        </li>

        <li>                                  
            <a href="../../projetos/index.php">
                <i class="fa gg-organisation"></i>
                <span class="nav-text">Todos os projetos</span>
            </a>
        </li>
    </ul>
</nav>