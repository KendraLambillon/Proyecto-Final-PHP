document.addEventListener('DOMContentLoaded', () => {
    const sliders = Array.from(document.querySelectorAll('.profile__body'));
    //Instead of being a node [...] allows to convert to an array
    //const sliders = [...document.querySelectorAll('.profile_body')];
    const buttonNext = document.querySelector('#next');
    const buttonPrevious = document.querySelector('#previous');
    let value;

    buttonNext.addEventListener('click', () => {
        changePosition(1);
    });

    buttonPrevious.addEventListener('click', () => {
        changePosition(-1);
    });

    const changePosition = (add) => {
        //console.log(add)
        const currentProfile = document.querySelector('.profile__body--show').dataset.id;
        //console.log(currentProfile);
        value = Number(currentProfile) + add;
        //console.log(value);

        sliders[Number(currentProfile) - 1].classList.remove('profile__body--show');

        if (value > sliders.length) {
            value = 1;
        } else if (value < 1) {
            value = sliders.length;
        }
        //console.log(value);

        sliders[value - 1].classList.add('profile__body--show');
    };
});
