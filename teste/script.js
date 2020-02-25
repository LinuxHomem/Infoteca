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
					dataPublicacao: retornaData(volume.publishedDate),
					autores: volume.authors,
					imgUrl: imgCaminho.thumbnail
				}

				let div = criaLivro(livro);

				divLivros.appendChild(div);
			}
		})
		.catch(function (erro) {
			console.warn(erro);
		})
});

function retornaData(data)
{
	if (typeof data === "undefined"){
		return "?";
	} else {
		let index = data.indexOf("-");

		if (index == -1){
			return data;
		} else {
			let dataArray = data.split("-");
			return dataArray[0];
		}
	}
}

function criaLivro(livro)
{	
	// Criando a div
	let div = document.createElement("div");
	div.classList.add("livro");

	// Titulo
	let h2 = document.createElement("h2");
	h2.classList.add("titulo");
	let textoH2 = document.createTextNode(livro.titulo);
	h2.appendChild(textoH2);
	div.appendChild(h2);

	// Imagem
	let img = document.createElement("img");
	img.classList.add("imagem-livro");
	img.src = livro.imgUrl;
	div.appendChild(img);
	
	// Descrição
	let descricao = document.createElement("p");
	descricao.classList.add("descricao");
	let textoDescricao = document.createTextNode(livro.descricao);
	descricao.appendChild(textoDescricao);
	div.appendChild(descricao);

	// Autores (esse é mais complexo)
	let autoresT = document.createElement("p");
	autoresT.classList.add("autores-titulo");
	let textoAutoresT = document.createTextNode("Escrito por:");
	let strongAutores = document.createElement("strong");
	strongAutores.appendChild(textoAutoresT);
	autoresT.appendChild(strongAutores);
	div.appendChild(autoresT);

	let divAutores = document.createElement("div");
	divAutores.classList.add("autores");
	for (let i = 0; i < livro.autores.length; i++) {
		let autorP = document.createElement("p");
		let textoAutor = document.createTextNode(livro.autores[i]);
		autorP.appendChild(textoAutor);
		divAutores.appendChild(autorP);
	}
	div.appendChild(divAutores);

	// Data
	let data = document.createElement("p");
	data.classList.add("data");
	let textoData = document.createTextNode(livro.dataPublicacao);
	data.appendChild(textoData);

	let dataT = document.createElement("p");
	let tituloData = document.createTextNode("Publicado em:");
	let strongData = document.createElement("strong");
	strongData.appendChild(tituloData);

	div.appendChild(strongData);
	div.appendChild(data);

	return div;
}