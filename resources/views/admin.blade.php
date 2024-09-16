<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
  <script src="https://cdn.tailwindcss.com"></script>
    
    <title>Admin Page | Shadev Design</title>
</head>
<body class="bg-[#041628]">


    {{-- START NAVBAR --}}
    <nav id="navbar" class="flex justify-between items-center fixed py-5 px-10 text-white bg-[#041628] w-full">
        <h1 class="uppercase font-semibold text-xl">Shadev. Design</h1>
        <ul class="list-area flex font-medium gap-16 text-lg pr-10">
            @auth
            Welcome {{ auth()->user()->name }}
           @endauth
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

            <div id="input-new-design" class="w-[330px] h-auto h-min-[330px] shadow-sm text-white border-2 border-dashed border-white flex justify-center items-center hover:bg-blue-950 cursor-pointer">
                <h1 class="text-xl font-semibold">Add Design</h1>
            </div>

            @foreach ($files as $file)
                <div class="image-container flex flex-col">
                    <img src="{{ $file->path }}" class="w-[330px] h-[330px] shadow-sm text-white cursor-pointer" alt="{{ $file->name }}" onclick="openModal('{{ $file->path }}', '{{ $file->name }}')">                
                    <h1 class="w-full bg-white text-black py-2 text-center font-semibold text-md">{{ $file->name }}</h1>
                    <div class="action-area flex w-full">
                        <button class="w-6/12 bg-amber-300 text-black font-semibold text-md py-3"  onclick="openEditModal('{{ $file->id }}', '{{ $file->name }}')">Edit Text</button>
                        <button class="w-6/12 bg-red-800 text-white font-semibold text-md py-3" onclick="deleteFile('{{ $file->id }}')">Delete</button>
                    </div>
                </div>
            @endforeach
        </div>

    </section>
    {{-- END DESIGN SECTION --}}


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


    {{-- START DETAIL DESIGN MODAL --}}
        <div id="imageModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-gray-900 bg-opacity-50" onclick="closeModal(event)">
            <div class="bg-white p-4 rounded-lg shadow-lg max-w-lg w-full" onclick="event.stopPropagation()">
                <button class="absolute top-2 right-2 text-gray-700 hover:text-gray-900" onclick="closeModal()">×</button>
                <div id="modalContent">
                    <!-- Image and name will be inserted here -->
                </div>
            </div>
        </div>
    {{-- END DETAIL DESIGN MODAL --}}

    {{-- START EDIT DESIGN MODAL --}}
        <div id="editModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-gray-900 bg-opacity-50" onclick="closeEditModal(event)">
            <div class="bg-white p-6 rounded-lg shadow-lg max-w-lg w-full" onclick="event.stopPropagation()">
                <button class="absolute top-2 right-2 text-gray-700 hover:text-gray-900" onclick="closeEditModal()">×</button>
                <h2 class="text-2xl font-bold mb-4">Edit Image Details</h2>
                <form id="editForm" action="{{ route('file.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="file_id" id="editFileId">
                    <div class="mb-4">
                        <label for="editFileName" class="block text-sm font-medium text-gray-700">Image Name</label>
                        <input type="text" name="name" id="editFileName" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                    <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-700">Save Changes</button>
                </form>
            </div>
        </div>
    {{-- END EDIT DESIGN MODAL --}}

    {{-- START DELETE CONFIRMATION MODAL --}}
        <div id="deleteModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-gray-900 bg-opacity-50" onclick="closeDeleteModal(event)">
            <div class="bg-white p-6 rounded-lg shadow-lg max-w-lg w-full" onclick="event.stopPropagation()">
                <button class="absolute top-2 right-2 text-gray-700 hover:text-gray-900" onclick="closeDeleteModal()">×</button>
                <h2 class="text-xl font-bold mb-4">Are you sure you want to delete this file?</h2>
                <form id="deleteForm" action="{{ route('file.destroy') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="file_id" id="deleteFileId">
                    <button type="submit" class="bg-red-500 text-white p-2 rounded hover:bg-red-700">Yes, Delete</button>
                    <button type="button" class="bg-gray-500 text-white p-2 rounded hover:bg-gray-700" onclick="closeDeleteModal()">Cancel</button>
                </form>
            </div>
        </div>
{{-- END DELETE CONFIRMATION MODAL --}}


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

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>