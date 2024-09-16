import './bootstrap';

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

