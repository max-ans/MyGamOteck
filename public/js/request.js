let request = {
    elements: {},

    loadGames: function () {
        // Tableau de configuration de notre requête AJAX
        let myInit = {
            method: 'GET',
            mode: 'cors',
            cache: 'no-cache'
        };

        fetch(' https://api.rawg.io/api/games', myInit)
            .then(function (response) {
                return response.json();
            }).then(function (data) {
                console.log(data.results);
                request.show(data.results);
            })


    },
    show: function (data = []) {

        for (let i = 0; i < data.length; i++) {
            console.log(data[i]);
            let game = document.querySelector('#game-template');

            let newGame = game.content.cloneNode(true);

            newGame.querySelector('.picture').setAttribute('src', data[i].background_image);

            newGame.querySelector('.game-title').textContent = data[i].slug;

            let parent = document.querySelector('.games-list');

            console.log(newGame);

            parent.appendChild(newGame);
        }
    }




}