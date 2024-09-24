<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
  <script src="https://cdn.tailwindcss.com"></script>
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
        
        <script>
            function openModal(imageSrc, imageName) {
                const modal = document.getElementById('imageModal');
                const modalContent = document.getElementById('modalContent');
            
                // Set image and name
                modalContent.innerHTML = `
                    <img src="${imageSrc}" class="w-full h-auto" alt="${imageName}">
                    <p class="mt-2 text-center text-lg font-semibold">${imageName}</p>
                `;
            
                // Show modal
                modal.classList.remove('hidden');
            }
            
            function closeModal(event) {
                // Check if the click target is the modal overlay
                if (event) {
                    if (event.target.id === 'imageModal' || event.target.tagName === 'BUTTON') {
                        document.getElementById('imageModal').classList.add('hidden');
                    }
                } else {
                    // Close modal if called directly (e.g., from button)
                    document.getElementById('imageModal').classList.add('hidden');
                }
            }
            
            window.addEventListener('scroll', function() {
                const navbar = document.getElementById('navbar');
                if (window.scrollY > 50) {
                    navbar.classList.add('navbar-scrolled');
                } else {
                    navbar.classList.remove('navbar-scrolled');
                }
            });
            
                // Function to open the Edit Modal
                function openEditModal(fileId, fileName) {
                    document.getElementById('editFileId').value = fileId;
                    document.getElementById('editFileName').value = fileName;
                    document.getElementById('editModal').classList.remove('hidden');
                }
            
                // Function to close the Edit Modal
                function closeEditModal(event) {
                    if (!event || event.target === document.getElementById('editModal')) {
                        document.getElementById('editModal').classList.add('hidden');
                    }
                }
            
                // Function to open the Delete Modal
                function deleteFile(fileId) {
                    document.getElementById('deleteFileId').value = fileId;
                    document.getElementById('deleteModal').classList.remove('hidden');
                }
            
                // Function to close the Delete Modal
                function closeDeleteModal(event) {
                    if (!event || event.target === document.getElementById('deleteModal')) {
                        document.getElementById('deleteModal').classList.add('hidden');
                    }
                }
            
            
                const menuButton = document.getElementById('menuButton');
                const menuList = document.getElementById('menuList');
            
                menuButton.addEventListener('click', () => {
                    if (menuList.classList.contains('hidden')) {
                        menuList.classList.remove('hidden');
                        setTimeout(() => {
                            menuList.classList.remove('opacity-0', '-translate-y-4');
                        }, 10); // slight delay for smooth transition
                    } else {
                        menuList.classList.add('opacity-0', '-translate-y-4');
                        setTimeout(() => {
                            menuList.classList.add('hidden');
                        }, 300); // match with transition duration
                    }
                });
            

        </script>
</body>
</html>
