<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <style>
      @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');
      .box1 {
         height: 350px;
         margin-top: 30px;
      }
      .container {
         height: 100px;
      }
      .font-style {
         font-family: 'Roboto', sans-serif;
         font-size: 1em;
      }
      .font-title {
         font-weight: bold;
         font-size: 1em;
      }
      .linhas-iniciais {
         border-bottom: 1px solid black;
         width: 450px;
      }
      .box2 {
         height: 400px;
      }
      .container-ficha-catalografica {
         border: 1px solid black;
         border-radius: 30px;
         height: 400px;
         width: 800px;
      }
      .container-ficha-catalografica-conteudo {
         padding: 30px;
      }
      .ficha-informacao {
         height: 30px;
      }
      .box3 {
         height: 100px;
      }
      .box4 {
         height: 100px;
      }
      .page-break{
         page-break-after: always;
      }
      .pagina-apresentacao {
         display: flex;
         flex-direction: column;
         align-items: center;
         justify-content: center;
         background-color: #9BC43F;
         height: 980px;
         padding: 50px;
      }
      .card-apresentacao {
         width: 630px;
         height: 400px;
         background-color: #fff;
         border-radius: 30px;
         padding: 30px;
      }
      .espaco-card {
         margin-top: 50px;
      }
      .foto-escritor {
         height: 100px;
         width: 150px;
         background-color: yellow;
      }
      .pag1 {
         width: 50%;
         float: left;
      }
      .pag2 {
         background-color: yellow;
         width: 50%;
         height: 250px;
         float:right;
      }
      .row {
         background-color: pink;
      }
   </style>
</head>
<body>
   <div class="row">
      <div class="pag1">
         <div class="box1">
            <div class="container">
               <label class="font-style font-title">COPYRIGHT © 2019</label>
               <div class="linhas-iniciais">
                  <p class="font-style">{{$data["ficha"]->writer_name}} {{$data["ficha"]->writer_lastname}}</p>
               </div>
            </div>
            <div class="container">
               <label class="font-style font-title">ILUSTRAÇÕES</label>
               <div class="linhas-iniciais">
                  <p class="font-style">{{$data["ficha"]->illustrator_name}} {{$data["ficha"]->illustrator_lastname}}</p>
               </div>
            </div>
            <div class="container">
               <label class="font-style font-title">REVISÃO</label>
               <div class="linhas-iniciais">
                  <p class="font-style">{{$data["ficha"]->reviewer_name}} {{$data["ficha"]->reviewer_lastname}}</p>
               </div>
            </div>
         </div>
         <div class="box2">
            <div class="container-ficha-catalografica">
               <div class="container-ficha-catalografica-conteudo">
                  <label class="font-style font-title">FICHA CATALOGRÁFICA</label>
                  <p class="font-style ficha-informacao">{{$data["ficha"]->writer_lastname}}, {{$data["ficha"]->writer_name}}</p>
                  <p class="font-style ficha-informacao">{{$data["book"]->name}}</p>
                  <p class="font-style ficha-informacao">{{$data["ficha"]->writer_name}} {{$data["ficha"]->writer_lastname}} e {{$data["ficha"]->illustrator_name}} {{$data["ficha"]->illustrator_lastname}}</p>
                  <p class="font-style">1ª ED. - AMERICANA (SP): EDITORA ADONIS, 2020.</p>
                  <p class="font-style">16 P.: IL.; 20x20 cm.</p>
                  <p class="font-style">ISBN __________</p>
                  <p class="font-style ficha-informacao">1. CONTOS. 2. LITERATURA INFANTIL. I. {{$data["ficha"]->writer_lastname}}, {{$data["ficha"]->writer_name}}. II. {{$data["ficha"]->illustrator_lastname}}, {{$data["ficha"]->illustrator_name}}.</p>
                  <p class="font-style ficha-informacao">___/___/___</p>
               </div>
            </div>
         </div>
         <div class="box3">
            <p class="font-style">Todos os direitos reservados à Editora Adonis. Este livro é parte integrante do projeto "Como nasce um livro?".</p>
            <p class="font-style">Não pode ser vendido separadamente</p>
            <p class="font-style">R. José Bonifácio, 174 - Americana/SP, CEP 13478-040</p>
         </div>
         <div class="box4">
            Imagem de rodapé
         </div>
      </div>
      <div class="pag2">
         Página 2
      </div>
   </div>
   <div class="page-break"></div>
</body>
</html>