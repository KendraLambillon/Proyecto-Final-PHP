document.addEventListener('DOMContentLoaded', () => {
    const openButton = document.querySelector('.nav__menu');
    const menu = document.querySelector('.nav__link');
    const closeMenu = document.querySelector('.nav__close');

    openButton.addEventListener('click', () => {
        //alert('Ouch, me diste!');
        menu.classList.add('nav__link--show');
    });

    closeMenu.addEventListener('click', () => {
        menu.classList.remove('nav__link--show');
    });
});
