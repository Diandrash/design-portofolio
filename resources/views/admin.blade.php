<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Admin Page | Shadev Design</title>
</head>
<body class="bg-[#041628]">


    {{-- START NAVBAR --}}
    <nav class="flex justify-between items-center fixed py-5 px-10 text-white bg-[#041628] w-full">
        <h1 class="uppercase font-semibold text-xl">Shadev. Design</h1>
        <ul class="list-area flex font-medium gap-16 text-lg pr-10">
           <li><a href="#design">Manage Design</a></li> 
           <li><a href="#contact">Contact</a></li> 
        </ul>
    </nav>
    {{-- END NAVBAR --}}


    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->has('file'))
    <div class="alert alert-danger">
        {{ $errors->first('file') }}
    </div>
@endif

    {{-- START DESIGN SECTION --}}
    <section id="design" class="py-20 bg-[#041628] flex flex-col gap-8 w-full items-center">
        <h3 class="text-center text-white text-3xl font-semibold">Manage Portofolio Design</h3>

        <div class="designs-container w-11/12 flex flex-wrap gap-5 ">
            <div id="input-new-design" class="w-[330px] h-[330px] shadow-sm text-white border-2 border-dashed border-white flex justify-center items-center hover:bg-blue-950 cursor-pointer">
                <h1 class="text-xl font-semibold">Add Design</h1>
            </div>
            @foreach ($files as $file)
                <img src="{{ $file->path }}" class="w-[330px] h-[330px] shadow-sm text-white" alt="{{ $file->name }}">                
            @endforeach
        </div>

        <button class="py-2 px-10 bg-white hover:bg-slate-200 rounded-md text-black font-bold text-lg">Show More</button>
    </section>
    {{-- END DESIGN SECTION --}}

    {{-- START ABOUT SECTION --}}
    <section id="about" class="py-20 flex flex-col gap-16 w-full items-center bg-[#041628] text-white">
        <h3 class="text-center text-white text-3xl font-semibold">About Us</h3>

        <div class="about-section flex w-9/12 gap-10">
            <img src="{{ asset('img/logo.png') }}" class="w-[400px] h-[400px] border-2 border-white" alt="logo" >
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
        <div class="head-section flex flex-col gap-2">
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




    {{-- START ADD DESIGN MODAL --}}
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold mb-4 text-[#041628]">Upload File</h2>
            <form action={{ route('file.store') }} method="POST" enctype="multipart/form-data">
                @csrf
                <!-- File Input -->
                <div class="mb-4">
                    <label for="file" class="block text-gray-700 font-semibold mb-2">File</label>
                    <input 
                        type="file" 
                        id="file" 
                        name="file" 
                        class="w-full p-2 border border-gray-300 rounded-md"
                    >
                </div>

                <!-- Name Input -->
                <div class="mb-6">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        required 
                        class="w-full p-2 border border-gray-300 rounded-md"
                    >
                </div>

                <!-- Buttons -->
                <div class="flex justify-end space-x-2">
                    <button 
                        type="button" 
                        id="close-modal" 
                        class="bg-gray-300 text-gray-800 p-2 rounded-md hover:bg-gray-400"
                    >
                        Close
                    </button>
                    <button 
                        type="submit" 
                        class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600"
                    >
                        Upload
                    </button>
                </div>
            </form>
        </div>
    </div>
    {{-- END ADD DESIGN MODAL --}}

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        document.getElementById('input-new-design').addEventListener('click', function() {
            document.getElementById('modal').classList.remove('hidden');
        });

        document.getElementById('close-modal').addEventListener('click', function() {
            document.getElementById('modal').classList.add('hidden');
        });
    </script>
</body>
</html>