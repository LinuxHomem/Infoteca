const key = "AIzaSyA9bmUVTuY0jMbF6CCimfl1T2FjxkbNk08";

var input = document.querySelector("#campo-busca");
var botao = document.querySelector("#botao");
var divLivros = document.querySelector(".lista-livros");

botao.addEventListener("click", function () {
    var pesquisa = input.value;
    let url = "https://www.googleapis.com/books/v1/volumes?q=" + pesquisa + "&key=" + key;

    axios.get(url)
        .then(function (response){
            let data = response.data;
            divLivros.innerHTML = "";

            for (let i = 0; i <= 9; i++) {
                
                let items = data.items[i];
                let volume = items.volumeInfo;
                let imgCaminho = volume.imageLinks;

                let livro = {
                    titulo: volume.title,
                    descricao: volume.description,
                    dataPublicacao: volume.publishedDate,
                    imgUrl: imgCaminho.thumbnail
                }

                // Inserindo livros
                let div = document.createElement("div");
                div.classList.add("livro");

                // Titulo
                let h1 = document.createElement("h1");
                let textoH1 = document.createTextNode(livro.titulo);
                h1.appendChild(textoH1);
                div.appendChild(h1);

                // Imagem
                let img = document.createElement("img");
                img.src = livro.imgUrl;
                div.appendChild(img);

                divLivros.appendChild(div);
            }
        })
        .catch(function (erro) {
            console.warn(erro);
        })
});