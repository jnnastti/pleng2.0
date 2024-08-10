<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charSet="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PLENG | Planner da Engenharia</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="css/tailwind.css">

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>



</head>
<body class="relative h-screen bg-white font-sans antialiased dark:bg-black dark:text-white/50">
    <!-- home section -->
    <section class="bg-gray-100 font-sans antialiased dark:bg-gray-950/95 mb-20 md:mb-52 xl:mb-80">
        <div class="container mx-auto ">
            <header class="flex-wrap lg:flex items-center py-14 xl:relative z-10">
                <div class="flex items-center justify-between mb-10 lg:mb-0">
                    <img src="imgs/logo.svg" alt="Logo img" class="w-32">
                </div>

                <ul class="lg:flex flex-col lg:flex-row lg:items-center lg:mx-auto lg:space-x-8 xl:space-x-16">
                    <li class="font-semibold text-gray-900 text-lg hover:text-blue-500 transition ease-in-out duration-300 mb-5 lg:mb-0">
                        <a href="#">Home</a>
                    </li>
                    <li class="font-semibold text-gray-900 text-lg hover:text-blue-500 transition ease-in-out duration-300 mb-5 lg:mb-0">
                        <a href="#">Sobre</a>
                    </li>
                    <li class="font-semibold text-gray-900 text-lg hover:text-blue-500 transition ease-in-out duration-300 mb-5 lg:mb-0">
                        <a href="#">Comentários</a>
                    </li>
                    <li class="font-semibold text-gray-900 text-lg hover:text-blue-500 transition ease-in-out duration-300 mb-5 lg:mb-0">
                        <a href="#">Contatos</a>
                    </li>
                </ul>


            @if (Route::has('login'))
                        @auth
                            <button class="px-5 py-2 lg:block border-2 border-blue-500 rounded-lg font-semibold text-blue-500 text-lg hover:border-b-blue-500 hover:bg-blue-200 transition ease-linear duration-500" :class="{'hidden':!navbarOpen,'flex':navbarOpen}">
                                <a href="{{ url('/projects') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                >
                                    Projetos
                                </a>
                            </button>
                        @else
                            <button class="px-5 py-2 lg:block border-0 border-gray-400 rounded-lg font-semibold text-gray-700 text-lg hover:text-blue-500 transition ease-linear duration-500" :class="{'hidden':!navbarOpen,'flex':navbarOpen}">
                                <a
                                    href="{{ route('login') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-blue-500 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                >
                                    Acessar
                                </a>
                            </button>
                            @if (Route::has('register'))
                                <button class="px-5 py-2 lg:block border-2 border-blue-500 rounded-lg font-semibold text-blue-500 text-lg hover:border-b-blue-500 hover:bg-blue-200 transition ease-linear duration-500" :class="{'hidden':!navbarOpen,'flex':navbarOpen}">
                                    <a
                                        href="{{ route('register') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Registrar
                                    </a>
                                </button>
                            @endif
                        @endauth
                @endif
            </header>

            <div class="flex items-center justify-center xl:justify-start">
                <div class="mt-28 xl:text-leff">
                    <h1 class="font-semibold text-4xl md:text-6xl lg:text-7xl text-gray-900 dark:text-gray-100 leading-normal mb-6">Planejamento preciso para <br> Obras de sucesso.</h1>

                    <p class="font-normal text-xl text-gray-400 dark:text-gray-400 leading-relaxed mb-12">Sua parceira confiável na construção de sonhos, do conceito à conclusão.</p>

                    <button class="px-6 py-4 bg-blue-500 dark:bg-blue-300 text-white dark:text-gray-900 font-semibold text-lg rounded-xl hover:bg-blue-900 dark:hover:bg-green-700 transition ease-in-out duration-500">Começar</button>
                </div>

                <div class="hidden xl:block xl:absolute z-0 -right-0 overflow-hidden w-1/3 max-h-900">
                    <img src="imgs/welcome.png" alt="Home img" class="">
                </div>
            </div>
        </div>
    </section>

    <!-- feature section -->
    <section class="bg-white py-10 md:py-16 xl:relative">

        <div class="container max-w-screen-xl mx-auto px-4">

            <div class="flex flex-col xl:flex-row justify-end">

                <div class="hidden xl:block xl:absolute left-0 bottom-0 w-1/3">
                    <img src="imgs/welcome2.png" alt="Feature img">
                </div>

                <div class="">

                    <h1 class="font-semibold text-gray-900 text-xl md:text-4xl text-center leading-normal mb-6">Descubra o futuro da <br>gestão de projetos</h1>

                    <p class="font-normal text-gray-400 text-md md:text-xl text-center mb-16">Explore um conjunto completo de ferramentas para planejar, <br>gerenciar e executar seus projetos de obra com precisão e eficiência</p>

                    <div class="flex flex-col md:flex-row justify-center xl:justify-start space-x-4 mb-20">
                        <div class="px-8 h-20 mx-auto md:mx-0 bg-gray-200 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                            <i data-feather="check-circle" class=" text-green-900"></i>
                        </div>

                        <div class="text-center md:text-left">
                            <h4 class="font-semibold text-gray-900 text-2xl mb-2">Planejamento inicial</h4>
                            <p class="font-normal text-gray-400 text-xl leading-relaxed">Transforme ideias em realidade com nosso planejamento <br> inicial detalhado e preciso.</p>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row justify-center xl:justify-start space-x-4 mb-20">
                        <div class="px-8 h-20 mx-auto md:mx-0 bg-gray-200 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                            <i data-feather="lock" class=" text-green-900"></i>
                        </div>

                        <div class="text-center md:text-left">
                            <h4 class="font-semibold text-gray-900 text-2xl mb-2">Diário de obra</h4>
                            <p class="font-normal text-gray-400 text-xl leading-relaxed">Registre cada passo do seu projeto com facilidade <br/> e precisão usando nosso diário de obra digital.</p>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row justify-center xl:justify-start space-x-4">
                        <div class="px-8 h-20 mx-auto md:mx-0 bg-gray-200 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                            <i data-feather="credit-card" class=" text-green-900"></i>
                        </div>

                        <div class="text-center md:text-left">
                            <h4 class="font-semibold text-gray-900 text-2xl mb-2">Orçamento final</h4>
                            <p class="font-normal text-gray-400 text-xl leading-relaxed">Controle seus custos e maximize seus recursos com <br> nossa ferramenta de orçamento intuitiva e eficiente.</p>
                        </div>
                    </div>

                </div>

            </div>

        </div> <!-- container.// -->

    </section>
    <!-- feature section //end -->

    <!-- testimoni section -->
    <section class="bg-white py-10 md:py-16">

        <div class="container max-w-screen-xl mx-auto px-4 xl:relative">

            <p class="font-normal text-gray-400 text-lg md:text-xl text-center uppercase mb-6">Comentários</p>

            <h1 class="font-semibold text-gray-900 text-2xl md:text-4xl text-center leading-normal mb-14">O que as pessoas falam <br>sobre o PLENG</h1>

            <div class="flex flex-col md:flex-row md:items-center justify-center md:space-x-8 lg:space-x-12 mb-10 md:mb-20">

                <div class="bg-gray-100 rounded-lg mb-10 md:mb-0">
                    <div class="flex items-center gap-5 mx-8 p-4 justify-center">
                        <i data-feather="star" class="text-yellow-500"></i>
                        <i data-feather="star" class="text-yellow-500"></i>
                        <i data-feather="star" class="text-yellow-500"></i>
                        <i data-feather="star" class="text-yellow-500"></i>
                        <i data-feather="star" class="text-yellow-500"></i>
                    </div>

                    <p class="font-normal text-sm lg:text-md text-gray-400 mx-8 my-8">I recommend anyone to buy house on <br> D’house. I received great customer service <br> from the specialists who helped me.</p>

                    <h4 class="font-semibold text-gray-900 text-xl md:text-2xl lg:text-3xl mx-8 mb-8">Brooklyn Simmons</h4>
                </div>

                <div class="bg-gray-100 rounded-lg">

                    <div class="flex items-center gap-5 mx-8 p-4 justify-center">
                        <i data-feather="star" class="text-yellow-500"></i>
                        <i data-feather="star" class="text-yellow-500"></i>
                        <i data-feather="star" class="text-yellow-500"></i>
                        <i data-feather="star" class="text-yellow-500"></i>
                        <i data-feather="star" class="text-yellow-500"></i>
                    </div>

                    <p class="font-normal text-sm lg:text-md text-gray-400 mx-8 my-8">D’house is the best property agent in the <br> world. I received great customer service <br> from the D’house agent</p>

                    <h4 class="font-semibold text-gray-900 text-xl md:text-2xl lg:text-3xl mx-8 mb-8">Ralph Edwards</h4>
                </div>

            </div>

        </div> <!-- container.// -->

    </section>
    <!-- testimoni section //end -->

    <!-- book section -->
    <section class="bg-white py-10 md:py-16">

        <div class="container max-w-screen-xl mx-auto px-4 xl:relative">

            <div class="bg-blue-400 flex flex-col lg:flex-row items-center justify-evenly py-14 rounded-3xl p-10">

                <div class="text-center lg:text-left mb-10 lg:mb-0">
                    <h1 class="font-semibold text-white text-4xl md:text-5xl lg:text-7xl leading-normal mb-4">Fale conosco</h1>

                    <p class="font-normal text-white text-md md:text-xl">Precisa de mais tempo para discutir? Não se preocupe, <br>estamos prontos para ajudar você. Você pode preencher a <br>coluna à direita para agendar uma reunião conosco. <br>Totalmente gratuito.</p>
                </div>

                <div class="hidden md:block bg-white xl:relative px-6 py-3 rounded-3xl">
                    <div class="py-3">
                        <h3 class="font-semibold text-gray-900 text-3xl">Marcar reunião</h3>
                    </div>

                    <div class="py-3">
                        <input type="text" placeholder="Full Name" class="px-4 py-4 w-96 bg-gray-100 placeholder-gray-400 rounded-xl outline-none">
                    </div>

                    <div class="py-3">
                        <input type="text" placeholder="Email" class="px-4 py-4 w-96 bg-gray-100 placeholder-gray-400 rounded-xl outline-none">
                    </div>

                    <div class="py-3 relative">
                        <input type="text" placeholder="Date" class="px-4 py-4 w-96 bg-gray-100 font-normal text-lg placeholder-gray-400 rounded-xl outline-none">

                        <div class="absolute inset-y-0 left-80 ml-6 flex items-center text-xl text-gray-600">
                            <i data-feather="calendar"></i>
                        </div>
                    </div>

                    <div class="py-3 relative">
                        <input type="text" placeholder="Virtual Meeting" class="px-4 py-4 w-96 bg-gray-100 placeholder-gray-400 rounded-xl outline-none">

                        <div class="absolute inset-y-0 left-80 ml-6 flex items-center text-xl text-gray-600">
                            <i data-feather="chevron-down"></i>
                        </div>
                    </div>

                    <div class="py-3">
                        <button class="w-full py-4 font-semibold text-lg text-white bg-blue-500 dark:bg-blue-300 font-semibold rounded-xl hover:bg-blue-900 transition ease-in-out duration-500">Agendar</button>
                    </div>
                </div>

            </div>

        </div> <!-- container.// -->

    </section>
    <!-- book section //end -->

    <!-- footer -->
    <footer class="bg-white py-10 md:py-16">

        <div class="container max-w-screen-xl mx-auto px-4">

            <div class="flex flex-col lg:flex-row justify-between">
                <img src="imgs/logo.svg" alt="Logo img" class="w-32">

                <div class="flex items-center justify-center lg:justify-start space-x-5">
                    <a href="#" class="px-3 py-3 bg-gray-200 text-gray-700 rounded-full hover:bg-blue-800 hover:text-white transition ease-in-out duration-500">
                        <i data-feather="facebook"></i>
                    </a>

                    <a href="#" class="px-3 py-3 bg-gray-200 text-gray-700 rounded-full hover:bg-blue-800 hover:text-white transition ease-in-out duration-500">
                        <i data-feather="twitter"></i>
                    </a>

                    <a href="#" class="px-3 py-3 bg-gray-200 text-gray-700 rounded-full hover:bg-blue-800 hover:text-white transition ease-in-out duration-500">
                        <i data-feather="linkedin"></i>
                    </a>
                </div>
            </div>

        </div> <!-- container.// -->

    </footer>
    <!-- footer //end -->

    <script>
        feather.replace()
    </script>
</body>
</html>
