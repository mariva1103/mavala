document.addEventListener('DOMContentLoaded', function () {
    const contactForm = document.getElementById('contactForm');
    const responseDiv = document.getElementById('response');

    contactForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(contactForm);

        fetch(contactForm.action, {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            responseDiv.innerHTML = data.message;
            contactForm.reset();
        })
        .catch(error => {
            responseDiv.innerHTML = 'Hubo un error al enviar el mensaje.';
        });
    });
});
