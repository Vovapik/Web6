const links = document.querySelectorAll('a[data-target]');
const images = document.querySelectorAll('.photos img');

links.forEach((link) => {
    link.addEventListener('click', (event) => {
        event.preventDefault(); // Prevent default anchor behavior

        const targetId = link.getAttribute('data-target');
        const targetImg = document.getElementById(targetId);

        if (targetImg.style.display === 'block') {
            targetImg.style.display = 'none'; // Hide the image
        } else {
            images.forEach((img) => {
                img.style.display = 'none';
            });

            targetImg.style.display = 'block';
        }
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.getElementById('toggleButton');
    const collapseContent = document.getElementById('collapseContent');

    toggleButton.addEventListener('click', () => {
        if (collapseContent.classList.contains('show')) {
            collapseContent.classList.remove('show');
        } else {
            collapseContent.classList.add('show');
        }
    });
});

