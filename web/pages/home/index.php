<html>
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow:wght@600&family=Archivo:wght@200&display=swap" rel="stylesheet">
        <meta charset="utf-8"/>

        <link href="../../assets/styles/grid.css" rel="stylesheet" />
        <link href="../../assets/styles/formulario.css" rel="stylesheet" />
        <link href="../../assets/styles/carrossel.css" rel="stylesheet" />
        <link href="../../assets/styles/padrao.css" rel="stylesheet" />
        <link href="../../assets/styles/headerHome.css" rel="stylesheet" />

        <link href="./style.css" rel="stylesheet" />



        <title> PLENG | Planejamento de Engenharia </title>
    </head>
    <body>
        <header>
            <nav class="navMenu">
                <a href="#"> Início </a>
                <a href="#"> Fórum </a>
                <a hrf="#"><img src="../../assets/imgs/logo.svg" /></a>
                <a href="#"> Contato </a>
                <a href="../login/login.php"> Login </a>
            </nav>
        </header>

        <main class="container">
            <section class="ini">
                <div class="msg grid-8">
                    <h1> Tudo que você precisa para o acompanhamento adequado de seus projetos </h1>

                    <p> 
                        O PLENG (Planejamento de Engenharia) foi desenvolvido para auxiliar aqueles que 
                        desejam acompanhar melhor seus projetos e ter acesso a demais informações sobre 
                        o mesmo, podendo cadastrar as informações necessárias para que a analise seja 
                        efetuada corretamente e libere inúmeras funções, desde a criação de um novo 
                        projeto até a emissão de seu relatório final.
                    </p>

                    <button> Acessar </button>
                </div>
            </section>

            <section class="conteudo">
                <div class="grid-4 texto">
                    <img src="../../assets/imgs/logo.svg" />
                    <p>
                        O PLENG conta com diversas funções para auxiliar no desenvolvimento de 
                        seu projeto, tornando ainda mais fácil sua execução e seu acompanhamento. 
                        Com ele, você pode cadastrar diversas informações e aperfeiçoar ainda mais 
                        o sistema, deixando-o do seu gosto para a produção de novos projetos.
                    </p>
                    <p>
                        <ul>
                            <li> Dados pré-cadastrados </li>
                            <li> Emissão de relatórios </li>
                            <li> Acompanhamento em tempo real </li>
                            <li> Atendimento ao cliente </li>
                        </ul>
                    </p>
                </div>
                <div class="grid-6">
                    <h1> Conheça mais do nosso sistema </h1>
                    <div class="pleng">
                        <input type="radio" class="hidden" id="input1" name="inputs">
                        <label class="entry" for="input1">
                            <div class="circle"></div>
                        </label>
                        <input type="radio" class="hidden" id="input2" name="inputs">
                        <label class="entry" for="input2">
                            <div class="circle"></div>
                        </label>
                        <input type="radio" class="hidden" id="input3" name="inputs" checked>
                        <label class="entry" for="input3">
                            <div class="circle"></div>
                        </label>
                        <input type="radio" class="hidden" id="input4" name="inputs">
                        <label class="entry" for="input4">
                            <div class="circle"></div>
                        </label>
                        <input type="radio" class="hidden" id="input5" name="inputs">
                        <label class="entry" for="input5">
                            <div class="circle"></div>
                        </label>
                        
                        <div class="highlight"></div>
                        <div id="carousel" class="grid-12">
                            <div class="item">
                                <img src="" />
                                <p>
                                    Cadastre e acompanhe seus projetos de uma maneira mais simples e rápida, 
                                    deixando a parte dificil para nós.
                                </p>
                            </div>
                            <div class="item">
                                <img src="" />
                                <p>
                                    Altere as informações registradas a qualquer momento e aproveite da 
                                    flexibilidade de nosso sistema.
                                </p>
                            </div>
                            <div class="item">
                                <img src="" />
                                <p>
                                    Torne o sistema único com informações que adaptam-se ao seu trabalho e 
                                    veja seus gráficos cada vez mais precisos.
                                </p>
                            </div>
                            <div class="item">
                                <img src="" />
                                <p>
                                    Emita relatórios para ter acesso a suas informações sempre que necessário 
                                    e verificar o progresso de seu projeto.
                                </p>
                            </div>
                            <div class="item">
                                <img src="" />
                                <p>
                                    Mantenha seu trabalho ainda mais organizado e planejado de uma maneira 
                                    mais rápida e prática.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="grid-12">
                <h1> Garanta seu acesso agora mesmo e aproveite o melhor do PLENG </h1>

                <form>
                    <fieldset>
                        <label> Seu nome: </label>
                        <input type="text" name="nome" placeholder="Jannaina Sangaletti"/>
                    </fieldset>
                    <fieldset>
                        <label> Motivo do contato: </label>
                        <input type="text" name="motivo" placeholder="Desejo obter o PLENG"/>
                    </fieldset>
                    <fieldset>
                        <label> Sua mensagem: </label>
                        <textarea name="mensagem"></textarea>
                    </fieldset>

                    <button type="submit"> Enviar </button>
                </form>
            </section>
        </main>
    </body>
</html>