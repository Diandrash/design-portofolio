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

