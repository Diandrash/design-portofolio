<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Shadev Design Portofolio</title>
</head>
<body class="bg-[#041628]">

    {{-- START NAVBAR --}}
    <nav id="navbar" class="flex justify-between items-center fixed py-5 px-10 text-white bg-[#041628] w-full">
        <h1 class="uppercase font-semibold text-md lg:text-xl">Shadev. Design</h1>
        
        <!-- Hamburger Menu Button (visible on mobile) -->
        <div class="mobile-nav">
            <div class="lg:hidden">
                <button id="menuButton" class="text-white focus:outline-none">
                    <!-- Icon Hamburger -->
                    <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        
            <!-- Menu List (visible on desktop, hidden on mobile) -->
            <ul id="menuList" class="list-area hidden flex flex-col lg:flex-row absolute h-screen bottom-0 lg:bottom-auto lg:h-auto lg:static lg:flex font-medium gap-16 text-lg pr-0 lg:pr-10 bg-white top-16 lg:top-auto justify-evenly lg:justify-normal w-8/12 lg:w-auto text-center right-0 lg:right-auto text-blue-950 lg:text-white ">
                <li><a href="#hero">Home</a></li> 
                <li><a href="#design">Design</a></li> 
                <li><a href="#about">About</a></li> 
                <li><a href="#contact">Contact</a></li> 
            </ul>
        </div>
    </nav>
    
    {{-- END NAVBAR --}}

    {{-- START HERO SECTION --}}
    <section id="hero" class="flex flex-wrap w-full justify-center lg:justify-evenly items-center py-36 gap-10 lg:gap-0">
        <h1 class="text-white font-semibold text-3xl lg:text-5xl w-9/12 lg:w-auto ">
            Your Vision My Design <br>
            Let's bring it to life!
        </h1>
        <img src="{{ asset('img/logo.png') }}" alt="hero" class="w-9/12 lg:w-[300px] h-auto lg:h-[300px] border-white border-2">
    </section>
    {{-- END HERO SECTION --}}

    {{-- START DESIGN SECTION --}}
    <section id="design" class="py-20 bg-[#041628] flex flex-col gap-8 w-full items-center">
        <h3 class="text-center text-white text-3xl font-semibold">Portofolio Design</h3>

        <div class="designs-container w-9/12 flex flex-wrap gap-5 ">
            @foreach ($files as $file)
                <img src="{{ $file->path }}" class="w-[330px] h-[330px] shadow-sm text-white cursor-pointer" alt="{{ $file->name }}" onclick="openModal('{{ $file->path }}', '{{ $file->name }}')">                
            @endforeach
        </div>

        <button class="py-2 px-10 bg-white hover:bg-slate-200 rounded-md text-black font-bold text-lg" onclick="location.href='/all'">Show More</button>
    </section>
    {{-- END DESIGN SECTION --}}

    {{-- START ABOUT SECTION --}}
    <section id="about" class="py-20 flex flex-wrap flex-col gap-16 w-full items-center bg-[#041628] text-white">
        <h3 class="text-center text-white text-3xl font-semibold">About Us</h3>

        <div class="about-section flex flex-wrap w-9/12 gap-10 justify-center lg:justify-normal">
            <img src="{{ asset('img/logo.png') }}" class="w-9/12 lg:w-[400px] h-auto lg:h-[400px] border-2 border-white" alt="logo" >
            <p class="text-lg text-justify">
                Hi, I’m Shadeva, a passionate graphic designer with a love for sports, especially football. With 2 of experience, I specialize in creating dynamic, eye-catching designs that capture the energy and excitement of the beautiful game. <br>

                From club logos to matchday graphics, promotional materials, and social media content, I bring a deep understanding of both design principles and the unique demands of sports branding. My goal is to help teams, athletes, and sports organizations stand out by delivering designs that not only look great but also tell a story and connect with their audience. <br>
                
                I’ve had the privilege of working with a variety of sports teams, clubs, and athletes, helping them to elevate their branding and stand out in a competitive field. <br>

                Whether you're looking for fresh, innovative ideas or need help bringing your vision to life, I’m here to collaborate and make it happen. Let’s create something exceptional together!
            </p>
        </div>
    </section>
    {{-- END ABOUT SECTION --}}

    {{-- START CONTACT SECTION --}}
    <section id="contact" class="py-20 flex flex-col gap-16 w-full bg-[#041628] text-white items-center">
        <div class="head-section flex flex-col gap-2 w-9/12">
            <h3 class="text-center text-white text-3xl font-semibold">Contact Us</h3>
            <p class="text-center text-white text-lg">Got a project in mind? Let’s make it happen!</p>
        </div>

        <div class="icons-container flex flex-wrap justify-center w-10/12 gap-10">
            
            <div class="fiverr contact-detail w-[280px] flex flex-col gap-16 items-center pt-3 pb-7 px-3 border-2 border-white rounded-md group hover:bg-gray-800 cursor-pointer hover:shadow-md transition-all duration-300 hover:shadow-white" onclick="location.href='https://www.fiverr.com/diandrafs'">
                <div
                    class="w-[130px] h-[130px] mt-2 bg-cover bg-no-repeat transition-all duration-300"
                    style="background-image: url('{{ asset('icons/icons8-fiverr.svg') }}')"
                >
                </div>
            
                <h1 class="text-white font-semibold text-lg group-hover:text-green-500 transition-all duration-300">diandrafs</h1>
            </div>

            <div class="whatsapp contact-detail w-[280px] flex flex-col gap-16 justify-between items-center pt-3 pb-7 px-3 border-2 border-white rounded-md group hover:bg-gray-800 cursor-pointer hover:shadow-md transition-all duration-300 hover:shadow-white" onclick="location.href='https://wa.me/6285771835343'">
                <ion-icon name="logo-whatsapp" class="w-[100px] h-[100px] mt-4"></ion-icon>
            
                <h1 class="text-white font-semibold text-lg group-hover:text-[#25D366] transition-all duration-300">+62 8577 1835 343</h1>
            </div>
            
            <div class="instagram contact-detail w-[280px] flex flex-col gap-16 justify-between items-center pt-3 pb-7 px-3 border-2 border-white rounded-md group hover:bg-gray-800 cursor-pointer hover:shadow-md transition-all duration-300 hover:shadow-white" onclick="location.href='https://www.instagram.com/shadev.design'">
                <ion-icon name="logo-instagram" class="w-[100px] h-[100px] mt-4"></ion-icon>
            
                <h1 class="text-white font-semibold text-lg group-hover:text-[#ec0075] transition-all duration-300">@shadev.design</h1>
            </div>
            
            <div class="email contact-detail w-[280px] flex flex-col gap-16 justify-between items-center pt-3 group pb-7 px-3 border-2 border-white rounded-md group hover:bg-gray-800 cursor-pointer hover:shadow-md transition-all duration-300 hover:shadow-white" onclick="location.href='mailto:shadevaf@gmail.com?subject=Your Subject&body=Your Message">
                <ion-icon name="mail-outline" class="w-[100px] h-[100px] mt-4"></ion-icon>
            
                <h1 class="text-white font-semibold text-lg group-hover:text-[#3e65cf] transition-all duration-300">shadevaf@gmail.com</h1>
            </div>
            
        </div>

    </section>
    {{-- END CONTACT SECTION --}}



    {{-- START MODAL DETAIL IMAGE --}}
        <div id="imageModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-gray-900 bg-opacity-50" onclick="closeModal(event)">
            <div class="bg-white p-4 rounded-lg shadow-lg max-w-lg w-full" onclick="event.stopPropagation()">
                <button class="absolute top-2 right-2 text-gray-700 hover:text-gray-900" onclick="closeModal()">×</button>
                <div id="modalContent">
                    <!-- Image and name will be inserted here -->
                </div>
            </div>
        </div>
    {{-- END MODAL DETAIL IMAGE --}}



        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        
        <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>