<?php

echo
"<div class='card mt-3'>
<div class='card-header'>
  <a>$titulo</a>
  <a class='id-livro'>ID: $id</a>
</div>
<div class='card-body'>
<img src='../images/book-example.jpg' class='img-livro mr-3 img-thumbnail rounded float-left'>
  <blockquote class='blockquote mb-0'>
    <a style='font-size:30px;'>Titulo: </a><a class='title-livro mb-2'>$titulo</a>
    <br>
    <div class='row'>

      <div class='col-sm'>
        <a style='font-size:20px;'>Autor: </a><cite class='autor-livro mb-2'>$autor</cite>
        <br>
        <a style='font-size:18px;'>Tipo: </a><a class='tipo-livro mb-2'>$tipo</a>
        <br>
        <form action='livro.php' method='get'>
        <button value='$id' name='livro' class='btn btn-danger mt-5'>Ver Mais</button>
      </div>

      <div class='col-sm-6'>
        <a class='descricao-livro'> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation...</a>
      </div>

  </blockquote>
</div>
</div>";
