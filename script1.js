const links = document.querySelectorAll('a[data-target]');
const images = document.querySelectorAll('.photos img');

links.forEach((link) => {
    link.addEventListener('click', (event) => {
        event.preventDefault();

        const targetId = link.getAttribute('data-target');
        const targetImg = document.getElementById(targetId);

        if (targetImg.style.display === 'block') {
            targetImg.style.display = 'none';
        } else {
            images.forEach((img) => {
                img.style.display = 'none';
            });

            targetImg.style.display = 'block';
        }
    });
});



document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('userForm');
    const buttonName = document.getElementById('buttonName');
    const collapseText = document.getElementById('collapseText');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const data = {
            name: buttonName.value.trim(),
            text: collapseText.value.trim(),
        };

        if (data.name && data.text) {
            const response = await fetch('/save-data.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            });

            if (response.ok) {
                alert('Saved successfully');
            } else {
                alert('Failed to save data. Please try again.');
            }
        }
    });
});