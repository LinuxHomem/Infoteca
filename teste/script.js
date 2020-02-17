const key = "AIzaSyA9bmUVTuY0jMbF6CCimfl1T2FjxkbNk08";

var input = document.querySelector("#campo-busca");
var botao = document.querySelector("#botao");

botao.addEventListener("click", function () {
    var pesquisa = input.value;
    let url = "https://www.googleapis.com/books/v1/volumes?q=" + pesquisa + "&key=" + key;

    axios.get(url)
        .then(function (response){
            let data = response.data;

            for (let i = 0; i <= 9; i++) {
                
                let items = data.items[i];
                let volume = items.volumeInfo;
                
                let title = volume.title;
                let desc = volume.description;
                let publish = volume.publishedDate;

                let img = volume.imageLinks;
                let imgurl = img.thumbnail;

                console.log(imgurl);
            }
        })
        .catch(function (erro) {
            console.warn(erro);
        })
});