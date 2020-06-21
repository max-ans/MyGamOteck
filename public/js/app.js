let app = {
    elements: {},

    init: function () {
        console.log('app init');

        app.elements.button = document.querySelector('.launch-button')
        app.elements.sideBar = document.querySelector('.sidebar')
        app.elements.arrow = document.querySelector('.return')

        app.starListening();
    },
    starListening: function () {
        app.elements.button.addEventListener('click', app.handleClickButton);
        app.elements.arrow.addEventListener('click', app.handleClickButton);
    },
    handleClickButton: function (event) {
        event.preventDefault();
        app.elements.sideBar.classList.toggle('hidden');
        console.log('hidden')
    }
}

document.addEventListener('DOMContentLoaded', app.init);


