<!DOCTYPE html>
<html class="menu">
<html>

<head>
<meta charset="utf-8"/>

<link href='https://css.gg/profile.css' rel='stylesheet'>
<link href='https://css.gg/toolbox.css' rel='stylesheet'>
<link href='https://css.gg/trello.css' rel='stylesheet'>
<link href='https://css.gg/file.css' rel='stylesheet'>
<link href='https://css.gg/calculator.css' rel='stylesheet'>
<link href='https://css.gg/album.css' rel='stylesheet'>
<link href='https://css.gg/calendar-today.css' rel='stylesheet'>
<link href='https://css.gg/image.css' rel='stylesheet'>
<link href='https://css.gg/terminal.css' rel='stylesheet'>
<link href='https://css.gg/organisation.css' rel='stylesheet'>
<link href='https://css.gg/list.css' rel='stylesheet'>

</head>
<body>

<nav class="main-menu">
    <ul>
        <li class="logo">
            <h2> PLENG </h2>
        </li> 

        <li class="nome">
            <h2> 
                <?php 
                    session_start();
                    echo $_SESSION['nomeUsuAtivo']; 
                ?> 
            </h2>
        </li>  

        <li>                                   
            <a href="../../../server/src/perfil/selecionaPerfil.php">
                <i class="fa gg-profile"></i>
                <span class="nav-text"> Perfil </span>
            </a>
        </li>   
   
        <li>                                 
            <a href="../../../server/src/projetos/selecionarProjeto.php">
                <i class="fa gg-toolbox"></i>
                <span class="nav-text"> Projeto: 
                    <?php
                        session_start();
                        echo $_SESSION['nomeProjAtivo'];
                    ?> 
                </span>
            </a>
        </li>    

        <li class="darkerlishadow">
            <a href="">
                <i class="fa gg-trello"></i>
                <span class="nav-text">Dashboards</span>
            </a>
        </li>
        
        <li class="darkerli">
            <a href="">
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
            <a href="../medicoes/index.php">
                <i class="fa gg-album"></i>
                <span class="nav-text">Medições</span>
            </a>
        </li>

        <li class="darkerli">
            <a href="../etapas/listaetapas">
                <i class="fa gg-list"></i>
                <span class="nav-text">Etapas</span>
            </a>
        </li>

        <li class="darkerli">
            <a href="">
                <i class="fa gg-calendar-today"></i>
                <span class="nav-text">Cronograma</span>
            </a>
        </li>

        <li class="darkerli">
            <a href="">
                <i class="fa gg-image"></i>
                <span class="nav-text">Galeria</span>
            </a>
        </li>

        <li class="darkerlishadowdown">
            <a href="../dadosprecadastrados/index.php">
                <i class="fa gg-terminal"></i>
                <span class="nav-text">Dados pré-cadastrados</span>
            </a>
        </li>
 
        <li>                                  
            <a href="../home/index.php">
                <i class="fa gg-organisation"></i>
                <span class="nav-text">Todos os projetos</span>
            </a>
        </li>
    </ul>

</nav>

</body>
</html>