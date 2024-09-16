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
        <h1 class="uppercase font-semibold text-xl">Shadev. Design</h1>
        <ul class="list-area flex font-medium gap-16 text-lg pr-10">
           <li><a href="#hero">Home</a></li> 
           <li><a href="#design">Design</a></li> 
           <li><a href="#about">About</a></li> 
           <li><a href="#contact">Contact</a></li> 
        </ul>
    </nav>
    {{-- END NAVBAR --}}


    {{-- START DESIGN SECTION --}}
    <section id="design" class="py-20 bg-[#041628] flex flex-col gap-8 w-full items-center">
        <h3 class="text-center text-white text-3xl font-semibold">All Design</h3>

        <div class="designs-container w-11/12 flex flex-wrap gap-5 ">
            @foreach ($files as $file)
                <img src="{{ $file->path }}" class="w-[330px] h-[330px] shadow-sm text-white cursor-pointer" alt="{{ $file->name }}" onclick="openModal('{{ $file->path }}', '{{ $file->name }}')">                
            @endforeach
        </div>

        <button class="py-2 px-10 bg-white hover:bg-slate-200 rounded-md text-black font-bold text-lg" onclick="location.href='/'">Back to Home</button>
    </section>
    {{-- END DESIGN SECTION --}}



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