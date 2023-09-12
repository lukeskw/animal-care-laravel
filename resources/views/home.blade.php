<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Home</title>

</head>

<body class="bg-gray-200">
    <div>
        <a id="back-to-top" href="#" class="hidden w-12 h-12 bg-green-500 p-2 fixed flex items-center justify-center right-6 bottom-6 rounded text-white z-30 hover:bg-green-600">
            <span class="material-symbols-outlined">
                arrow_upward
            </span>
        </a>
    </div>
    <header class="w-100 min-w-full fixed z-50">
        <div id="top-bar" class="bg-lime-600 text-white w-100 p-5 flex items-center justify-center transition-transform duration-300">
            <div class="container  mx-auto px-4 sm:px-6 lg:px-8 max-w-screen-xl">
                <div class="flex flex-row items-center gap-10 justify-between">
                    <div class="flex flex-row items-center gap-10 text-sm">
                        <div class="flex gap-2 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            "Estrada do teste, Volta Redonda, RJ"
                        </div>
                        <div class="flex gap-2 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            <a href="mailto:lucasporfirioa@gmail.com">lucasporfirioa@gmail.com</a>
                        </div>
                        <div class="flex gap-2 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smartphone">
                                <rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect>
                                <line x1="12" y1="18" x2="12.01" y2="18"></line>
                            </svg>
                            <a href="tel:(24)998824755">(24) 99882-4755</a>
                        </div>
                    </div>
                    <div class="md:flex md:flex-nowrap md:items-stretch md:w-auto md:max-w-full">
                        <div class="flex gap-10">
                            <a href="{{route('login')}}">Área Restrita </a>
                            <div class="flex gap-2">
                                <span>Redes Sociais </span>
                                <a target="_blank" href="https://www.facebook.com/lucas.porfirio.908">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook">
                                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                    </svg>
                                </a>
                                <a target="_blank" href="https://www.instagram.com/mr.porfirio/">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram">
                                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav id="nav-bar" class="bg-lime-600/50 text-slate-500 w-100 p-5 text-white flex items-center justify-center ">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-screen-xl">
                <div class="flex items-center justify-between mx-auto max-w-screen-x gap-2">
                    <div>
                        <img src="{{url('cuidar_files/logo.png')}}" alt="" height="20" class="max-w-xs ">
                    </div>
                    <div class="flex items-center content-center ">
                        <ul class="flex gap-10 text-lg font-bold items-start justify-center">
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Quem somos
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Adoção
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Serviços
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Contato
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <button class="p-4 px-6 bg-lime-500 rounded hover:brightness-105">CONHEÇA OS SERVIÇOS</button>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <section class="min-w-screen min-h-screen z-10">
        <div class="p-0 relative">
            <img src="{{url('cuidar_files/banner1.png')}}" class="min-w-full max-h-screen absolute top-0 left-0" />
            <div class="absolute flex flex-col z-10 left-[550px] top-64 gap-10">
                <h1 class="flex flex-col max-w-md text-white gap-10">
                    <span class="font-sans font-bold text-xl">Atendimento Médico Veterinário</span>
                    <span class="font-sans font-black text-6xl">Resgate, Tratamento e promoção da Adoção Responsável</span>
                </h1>
                <div class="flex text-white items-center gap-10 font-sans font-bold">
                    <a href="#" class="py-6 px-8 bg-green-700 uppercase flex flex-col items-center justify-center transition-all duration-250 hover:opacity-75 hover:transition-all hover:duration-250"><span>Fale </span><span>Conosco</span></a>
                    <span class="text-lg">(24)99882-4755</span>
                </div>

            </div>
        </div>
    </section>

    <main class="z-20">
        <section class="pt-[150px] pb-[250px]">
            <div class="container  mx-auto px-4 sm:px-6 lg:px-8 max-w-screen-xl">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div class="col-span-1">
                        <img src="{{url('cuidar_files/home_welcome.png')}}" alt="">
                    </div>
                    <div class="col-span-1 w-100">
                        <h1 class="text-4xl lg:text-5xl font-extrabold mb-4 flex flex-col font-sans gap-2">
                            <small class="text-sm text-black">Qualidade &amp; Experiência</small>
                            <span class="text-green-700">Bem vindo ao <span class="text-green-500">CUIDAR</span></span>
                        </h1>

                        <p class="mb-6 font-sans w-10/12 text-lg font-medium">
                            O CUIDAR nasceu com o objetivo de se tornar uma empresa sustentável e sólida para promover o cuidar a animais errantes e com pouca expectativa. Entendemos que esse caminho animais abandonados e/ou sem um tutor, possam agravar problemas de saúde pública e provocar diversos tipos de acidente. Por isso tivemos a iniciativa de fundar o CUIDAR e permitir que pessoas, empresas e órgãos públicos tenham com quem contar quando necessário.
                        </p>

                        <ul class="list-inside mb-6 text-lg font-semibold py-5">
                            <li class="my-3 flex items-center"><span class="material-symbols-outlined mr-3">pets</span>Possuímos área com mais de 3 mil metros quadrados</li>
                            <li class="my-3 flex items-center"><span class="material-symbols-outlined mr-3">pets</span>Estrutura física em constante evolução</li>
                            <li class="my-3 flex items-center"><span class="material-symbols-outlined mr-3">pets</span>Profissionais dedicados a cuidar 7 dias por semana</li>
                        </ul>

                        <a href="#" class="bg-lime-800 text-white py-4 px-8 rounded-full inline-block transition duration-300 hover:brightness-110">Faça contato conosco</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="pb-[100px] bg-lime-800">
            <div class="container  mx-auto px-4 sm:px-6 lg:px-8 max-w-screen-xl">
                <div class="mx-0 rounded ">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-0 relative -top-[150px]">
                        <div class="col-span-1 lg:col-span-1 ">
                            <div class="relative py-4 overflow-hidden">
                                <img src="{{url('cuidar_files/cuidamos.png')}}" alt="" class="flex w-full rounded-l">
                                <div class="text-white before:rounded-l gradient-bg-green font-bold flex flex-col items-center justify-end absolute text-center top-0 left-0 bottom-8 w-full h-full z-[1] text-white pb-6 before:absolute before:content-[''] before:left-0 before:top-0 before:h-full before:w-full before:-z-[1] before:w-full before:h-full before:object-contain">
                                    <span class="material-symbols-outlined mr-3">pets</span>
                                    <h3 class="text-4xl font-extrabold font-sans my-5">Nós cuidamos</h3>
                                    <div>Clínica popular para grandes e pequenos</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1 lg:col-span-1">
                            <div class="relative py-4 overflow-hidden">
                                <img src="{{url('cuidar_files/abrigamos.png')}}" alt="" class="flex w-full">
                                <div class="text-white gradient-bg-orange font-bold flex flex-col items-center justify-end absolute text-center top-0 left-0 bottom-8 w-full h-full z-[1] text-white pb-6 before:absolute before:content-[''] before:left-0 before:top-0 before:h-full before:w-full before:-z-[1] before:w-full before:h-full before:object-contain">
                                    <span class="material-symbols-outlined mr-3">pets</span>
                                    <h3 class="text-4xl font-extrabold font-sans my-5">Nós abrigamos</h3>
                                    <div>Abrigo particular com assistência veterinária</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1 lg:col-span-1">
                            <div class="relative py-4 overflow-hidden">
                                <img src="{{url('cuidar_files/adote.png')}}" alt="" class="flex w-full rounded-r">
                                <div class="text-white before:rounded-r gradient-bg-blue font-bold flex flex-col items-center justify-end absolute text-center top-0 left-0 bottom-8 w-full h-full z-[1] text-white pb-6 before:absolute before:content-[''] before:left-0 before:top-0 before:h-full before:w-full before:-z-[1] before:w-full before:h-full before:object-contain">
                                    <span class="material-symbols-outlined mr-3">pets</span>
                                    <h3 class="text-4xl font-extrabold font-sans my-5">Não compre! Adote!</h3>
                                    <div>Quando você adota o sentimento é mais forte</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center -mt-20 mx-20">
                    <div class="mx-auto text-center text-white text-xl">
                        <p>O Cuidar não recebe animais de forma gratuita. Todos os animais resgatados por nós são através de contatos estabelecidos com empresas e órgãos públicos que utilizam do nosso serviço para minimizar problemas de abandono e maus tratos.</p>
                        <div class="mt-20">
                            <a href="#" class="rounded-full border-white border-2 border-solid py-3 px-6 hover:opacity-75">ENTRE EM CONTATO</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-[150px]">
            <div class="container  mx-auto px-4 sm:px-6 lg:px-8 max-w-screen-xl flex flex-col items-center">
                <div class="">
                    <h1 class="text-4xl lg:text-5xl font-extrabold mb-4 flex flex-col font-sans gap-2 items-center justify-center">
                        <small class="text-sm text-black">O Que Nós Podemos Fazer Por Você?</small>
                        <span class="text-green-700">Atendimento <span class="text-green-500">Veterinário</span></span>
                    </h1>
                </div>
                <div class="grid grid-cols-1 xl:grid-cols-2 gap-8 mt-10">
                    <!-- Row 1 -->
                    <div class="bg-white px-16 py-12 rounded shadow-md">
                        <div class="flex items-center gap-4">
                            <img src="{{url('cuidar_files/serv-veterinario.png')}}" />
                            <div>
                                <h1 class="text-2xl text-green-500 font-sans font-bold">Atendimento médico veterinário</h1>
                                <p class="text-md font-sans font-semibold text-gray-600 ">Temos profissionais capacitados atendendo em período integral. Todo atendimento é realizado com extremo profissionalismo e possui valores populares.</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white px-16 py-12 rounded shadow-md">
                        <div class="flex items-center gap-4">
                            <img src="{{url('cuidar_files/serv-vacinacao.png')}}" />
                            <div>
                                <h1 class="text-2xl text-green-500 font-sans font-bold">Vacinação</h1>
                                <p class="text-md font-sans font-semibold text-gray-600 ">Nossos profissionais podem vacinar seu animal de estimação aqui na clínica ou em domicílio, conforme sua preferência.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Row 2 -->
                    <div class="bg-white px-16 py-12 rounded shadow-md">
                        <div class="flex items-center gap-4">
                            <img src="{{url('cuidar_files/serv-castracao.png')}}" />
                            <div>
                                <h1 class="text-2xl text-green-500 font-sans font-bold">Castração</h1>
                                <p class="text-md font-sans font-semibold text-gray-600 ">Realizamos castração de cães e gatos com valores populares para permitir que pessoas com menor poder aquisitivo também possam cuidar bem de seus pets.</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white px-16 py-12 rounded shadow-md">
                        <div class="flex items-center gap-4">
                            <img src="{{url('cuidar_files/serv-levatras.png')}}" />
                            <div>
                                <h1 class="text-2xl text-green-500 font-sans font-bold">Leva e Trás (Delivery)</h1>
                                <p class="text-md font-sans font-semibold text-gray-600 ">Possuímos veículo próprio para buscar seu pet para atendimento veterinário em nossa clínica, realizamos consulta e vacinação em domicílio. Consulte nossa equipe.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-20">
                    <a href="#" class="rounded-full text-green-700 font-semibold border-green-700 border-2 border-solid py-4 px-8 hover:bg-green-700 hover:text-white transition duration-200">VEJA TODOS SERVIÇOS</a>
                </div>
            </div>
        </section>
        <section class="py-[250px]">
            <div class="container  mx-auto px-4 sm:px-6 lg:px-8 max-w-screen-xl flex flex-col items-center">
                <div class="">
                    <h1 class="text-4xl lg:text-5xl font-extrabold mb-4 flex flex-col font-sans gap-2 items-center justify-center">
                        <small class="text-sm text-black">Equipe &amp; Parceiros</small>
                        <span class="text-green-700">Esses fazem a <span class="text-green-500">diferença</span></span>
                    </h1>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 mt-10">
                    <!-- Row 1 -->
                    <div class="bg-white px-8 py-12 rounded shadow-md">
                        <div class="flex flex-col justify-center items-center gap-4 ">
                            <img src="{{url('cuidar_files/equipe3.jpg')}}" class="rounded" />
                            <div class="flex flex-col items-center relative justify-center after:content-[''] after:absolute after:-bottom-4 after:left-[50%] after:h-[1px] after:w-10 after:bg-gray-300 after:transform after:translate-x-[-50%]">
                                <h1 class="text-2xl text-green-500 font-sans font-bold">Dr. Lucas</h1>
                                <p class="text-md font-sans font-semibold text-gray-600 ">Veterinário</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white px-8 py-12 rounded shadow-md">
                        <div class="flex flex-col justify-center items-center gap-4">
                            <img src="{{url('cuidar_files/equipe2.jpg')}}" class="rounded" />
                            <div class="flex flex-col items-center  relative justify-center after:content-[''] after:absolute after:-bottom-4 after:left-[50%] after:h-[1px] after:w-10 after:bg-gray-300 after:transform after:translate-x-[-50%]">
                                <h1 class="text-2xl text-green-500 font-sans font-bold">Dra. Lorem</h1>
                                <p class="text-md font-sans font-semibold text-gray-600 ">Veterinária</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white px-8 py-12 rounded shadow-md">
                        <div class="flex flex-col justify-center items-center gap-4">
                            <img src="{{url('cuidar_files/equipe6.jpg')}}" class="rounded" />
                            <div class="flex flex-col items-center  relative justify-center after:content-[''] after:absolute after:-bottom-4 after:left-[50%] after:h-[1px] after:w-10 after:bg-gray-300 after:transform after:translate-x-[-50%]">
                                <h1 class="text-2xl text-green-500 font-sans font-bold">Ipsum</h1>
                                <p class="text-md font-sans font-semibold text-gray-600 ">Cuidador</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="pt-[150px] pb-64 bg-lime-800 relative">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-screen-xl">
                <div class="mx-0 rounded">
                    <div class="flex w-full gap-2  relative -top-[250px] rounded bg-gray-100">
                        <div class="flex gap-5 items-center justify-center">
                            <img src="{{url('cuidar_files/entreemcontato.png')}}" alt="" class="rounded-l">
                            <div class="flex gap-5">
                                <div class="flex items-center justify-center bg-green-700 rounded-full text-white w-24 h-24 min-w-[96px] min-h-[96px]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-headphones">
                                        <path d="M3 18v-6a9 9 0 0 1 18 0v6"></path>
                                        <path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path>
                                    </svg>
                                </div>
                                <div class="flex flex-col gap-3 ml-3">
                                    <h1 class="text-3xl text-green-700 font-sans font-bold">Está precisando dos nossos serviços?<span class="text-green-500"> Ligue para nós: (24)99882-4755</span></h1>
                                    <p class="text-md font-sans font-semibold text-gray-600 ">Se precisar esclarecer algo sobre nossos serviços ou sobre a nossa atuação, estamos a inteira disposição para atender você. Conte com a gente.</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-20 -mt-[150px]">
                    <div class="col-span-1 lg:col-span-1">
                        <div class="flex flex-col ">
                            <h1 class="text-white font-sans font-bold text-2xl mb-8 relative after:absolute after:content-[''] after:-top-[20px] after:left-0 after:h-[1px] after:w-10 after:bg-gray-50">Sobre o CUIDAR</h1>
                            <p class="text-gray-100 font-sans font-medium text-lg">O CUIDAR é uma empresa com a finalidade de promover o bem estar social e animal através da prestação de serviços veterinários e da promoção da saúde com excelência e foco em clínica veterinária popular e animais errantes.</p>
                        </div>
                    </div>
                    <div class="col-span-1 lg:col-span-1">
                        <div class="flex flex-col ">
                            <h1 class="text-white font-sans font-bold text-2xl mb-8 relative after:absolute after:content-[''] after:-top-[20px] after:left-0 after:h-[1px] after:w-10 after:bg-gray-50">Menu</h1>
                            <div>
                                <ul class="text-gray-100 font-sans font-semibold flex flex-col gap-4">
                                    <li>
                                        <a href="#" class="flex items-center">
                                            <span class="material-symbols-outlined text-green-500">
                                                navigate_next
                                            </span>
                                            Quem somos
                                        </a>
                                    </li>
                                    <li>
                                        <a class="flex items-center" href="#">
                                            <span class="material-symbols-outlined text-green-500">
                                                navigate_next
                                            </span>
                                            Adoção
                                        </a>
                                    </li>
                                    <li>
                                        <a class="flex items-center" href="#">
                                            <span class="material-symbols-outlined text-green-500">
                                                navigate_next
                                            </span>
                                            Serviços
                                        </a>

                                    </li>
                                    <li>
                                        <a class="flex items-center" href="#">
                                            <span class="material-symbols-outlined text-green-500">
                                                navigate_next
                                            </span>
                                            Blog
                                        </a>

                                    </li>
                                    <li>
                                        <a class="flex items-center" href="#">
                                            <span class="material-symbols-outlined text-green-500">
                                                navigate_next
                                            </span>
                                            Contato
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 lg:col-span-1">
                        <div class="flex flex-col ">
                            <h1 class="text-white font-sans font-bold text-2xl mb-8 relative after:absolute after:content-[''] after:-top-[20px] after:left-0 after:h-[1px] after:w-10 after:bg-gray-50">Horário de atendimento</h1>
                            <p class="text-gray-100 font-sans font-medium text-lg">Recebemos emergências de clientes ativos 24h e o tratamento aos animais abrigados acontece 7 dias por semana. O atendimento ao público em geral funciona nos seguintes horários:</p>
                            <div>
                                <ul class="text-gray-100 mt-8">
                                    <li class="pb-3 flex items-center justify-between">
                                        <span class="text-green-500 font-bold">Seg - Sex:</span>
                                        <span class="border-b-2 border-dashed min-w-[135px] text-right">8h às 18h</span>
                                    </li>
                                    <li class="pb-3 flex items-center justify-between">
                                        <span class="text-green-500 font-bold">Sábado:</span>
                                        <span class="border-b-2 border-dashed min-w-[135px] text-right">8h às 12h</span>
                                    </li>
                                    <li class="pb-3 flex items-center justify-between">
                                        <span class="text-green-500 font-bold">Domingo:</span>
                                        <span class="border-b-2 border-dashed min-w-[135px] text-right">Fechado</span>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-20 text-white font-sans font-bold bg-lime-700 absolute bottom-0 w-full py-10">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-screen-xl">
                    <div class="relative">
                        <div class="doggo absolute bottom-2 z-[1] ">
                            <img src="{{url('cuidar_files/final_dog.png')}}" class="transform scale-150" />
                        </div>
                        <div class="pl-[300px] flex justify-between">
                            <div>
                                <span>Copyright 2023 <span class="text-green-500">CUIDAR</span> Todos direitos reservados.</span>
                            </div>
                            <div>
                                <span>Desenvolvido por <a href="https://porfiriodev.vercel.app" target="_blank" class="text-green-500">Porfírio Dev</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </main>
    <script>
        const topbar = document.getElementById("top-bar");
        const backToTopBtn = document.getElementById("back-to-top");
        window.addEventListener("scroll", function() {
            if (!topbar.classList.contains("hidden") && window.scrollY >= 80) {
                topbar.classList.add("hidden");
            } else if (topbar.classList.contains("hidden") && window.scrollY < 80) {
                topbar.classList.remove("hidden");
            }

            if (backToTopBtn.classList.contains("hidden") && window.scrollY >= 160) {
                backToTopBtn.classList.remove("hidden");
            } else if (!backToTopBtn.classList.contains("hidden") && window.scrollY < 160) {
                backToTopBtn.classList.add("hidden");
            }
        });
    </script>
</body>

</html>
