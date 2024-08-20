document.addEventListener('DOMContentLoaded', () => {
    const titleContacto = Array.from(document.querySelectorAll('.contacto__title'));
    //console.log(titleContacto);

    titleContacto.forEach(contacto => {
        contacto.addEventListener('click', () => {
            const answer = contacto.nextElementSibling;
            const addPadding = contacto.closest('.contact__item');

            addPadding.classList.toggle('contact__item--add');
            contacto.querySelector('.contacto__arrow').classList.toggle('contacto__arrow--rotate');

            answer.style.height = answer.clientHeight === 0 ? `${answer.scrollHeight}px` : '0'; //mininum height of the element
        });
    });
});
