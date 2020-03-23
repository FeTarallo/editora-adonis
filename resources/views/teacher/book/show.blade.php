<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <style>
      @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');
      @import url('https://fonts.googleapis.com/css?family=Just+Another+Hand&display=swap');
      .box1 {
         height: 350px;
         margin-top: 30px;
         padding-top:50px;
         padding-left:50px;
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
         padding-left:50px;
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
         padding-left:50px;
      }
      .box4 {
         height: 200px;
         padding-left:50px;
      }
      .rodape-ficha {
         height:110px;
         margin-top: 20px;
      }
      .pagina-apresentacao {
         display: flex;
         flex-direction: column;
         align-items: center;
         justify-content: center;
         padding: 50px;
      }
      .card-apresentacao {
         width: 850px;
         height: 400px;
         background-color: #fff;
         border-radius: 30px;
         padding: 30px;
      }
      .espaco-card {
         margin-top: 50px;
      }
      .apresentacao {
         height:80px;
      }
      .apresentacao-writer{
         float:left;
      }
      .apresentacao-nome {
         float:right;
      }
      .texto-sobre {
         width: 70%;
         font-family: 'Roboto', sans-serif;
         font-size: 1.2em;
         text-align: justify;
         float:right;
         margin-top: 20px;
      }
      .titles {
         text-transform: uppercase;
         font-family: 'Just Another Hand', cursive;
         font-size: 2em;
      }
      .pag1 {
         background-color:#ADD9F1;
         width: 50%;
         float: left;
         height: 1076px;
      }
      .pagina-sinopse {
         padding: 100px;
      }
      .card-sinopse {
         background-color: #fff;
         width: 800px;
         height: 450px;
         border: 3px solid #3DB3E6;
         border-radius: 20px;
         margin-top: 230px;
      }
      .titulo-sinopse {
         text-transform: uppercase;
         font-family: 'Just Another Hand', cursive;
         font-size: 3em;
         text-align: center;
         margin-top: 5px;
      }
      .texto-sinopse {
         padding:30px;
         font-family: 'Roboto', sans-serif;
         font-size: 1.2em;
         text-align: justify;
      }
      .pag2 {
         background-color: #00A8C4;
         width: 50%;
         height: 1076px;
         float: right;
      }
      .pagina-capa {
         padding: 50px;
      }
      .card-capa {
         background-color: #fff;
         width: 905px;
         height: 980px;
         border-radius: 25px;
      }
      .titulo-capa {
         text-transform: uppercase;
         color: #F39D55;
         font-family: 'Just Another Hand', cursive;
         font-size: 2.5em;
         padding-left: 30px;
         padding-top: 30px;
      }
      .apresentacao-capa {
         height:110px;
         text-transform: uppercase;
         font-family: 'Just Another Hand', cursive;
         font-size: 2em;
         padding-left: 30px;
         padding-right: 30px;
      }
      .pag3 {
         width: 50%;
         float: left;
         height: 1076px;
      }
      .pag4 {
         background-color: #9BC43F;
         width: 50%;
         height: 1076px;
         float:right;
      }
      .pag-left {
         width: 50%;
         height: 1076px;
         float:left;
      }
      .card-pag {
         width: 905px;
         height: 950px;
         border: 3px #D4D4D4 solid;
         border-radius: 25px;
      }
      .pag-right {
         width: 50%;
         height: 1076px;
         float:right;
      }
      .num-pag-right {
         height: 30px;
         text-align: right;
      }
      .num-pag-left {
         height: 30px;
         text-align: left;
      }
      .imagem-capa {
         height: 520px;
         text-align:center;
      }
      .rodape-adoninha {
         height: 170px;
         text-align: right;
         margin-right: 80px;
      }
      .rodape-logo {
         height: 40px;
         margin-right: 50px;
         text-align: right;
      }
      .cover {
         display:inline-block;
         padding: 20px;
         max-height: 470px;
         max-width: 1600px;
      }
      .rotated {
         margin-top: 20px;
         width: 170px;
         height: 220px;
         -ms-transform: rotate(20deg); /* IE 9 */
         transform: rotate(20deg);
         border: 4px solid  #F39D55;
         border-radius: 15px;
         float: left;
      }
      .apresentacao-imagem {
         min-width: 170px;
         min-height: 220px;
         max-width: 170px;
         max-height: 220px;
         border-radius: 15px;
      }
      .apresentacao-texto {
         margin-top: 20px;
         float: right;
      }
      .apresentacao-writer {
         width: 30%;
      }
      .apresentacao-nome {
         width: 70%;
         text-align: left;
      }
      .text-pag {
         font-family: 'Roboto', sans-serif;
         font-size: 1.2em;
         min-height:400px;
         text-align: justify;
      }
      .image-pag {
         height:500px;
         text-align: center;
      }
      .container-pag {
         padding: 30px;
      }
      .image-pages {
         max-height: 450px;
      }
      .print{
         page-break-after: avoid;
      }
   </style>
</head>
<body>
   <div class="row">
      <div class="pag1">
         <div class="pagina-sinopse">
            <div class="card-sinopse">
               <div class="titulo-sinopse">sinopse</div>
               <div class="texto-sinopse"><span>{{$data["book"]->sinopse}}</span></div>
            </div>
         </div>
      </div>
      <div class="pag2">
         <div class="pagina-capa">
            <div class="card-capa">
               <div class="titulo-capa">{{$data["book"]->name}}</div>
               <div class="apresentacao-capa">
                  <p>escritor(a): {{$data["ficha"]->writer_name}} {{$data["ficha"]->writer_lastname}}</p>
                  <p>ilustrador(a): {{$data["ficha"]->illustrator_name}} {{$data["ficha"]->illustrator_lastname}}</p>
               </div>
               <div class="imagem-capa">
                  <img class="cover" src="{{public_path('storage/images/'.$data['book']->cover)}}">
               </div>
               <div class="rodape-adoninha">
                  <img src="{{public_path('storage/images/adoninha.png')}}" height="160px" width="90px">
               </div>
               <div class="rodape-logo">
                  <img src="{{public_path('storage/images/logo.png')}}" height="40px" width="160px">
               </div>
            </div>
         </div>
      </div>
   </div>
   @foreach($data["pairs"] as $pair)
      <div class="row">
         <div class="pag-left">
            <div class="pagina-capa">
               <div class="card-pag">
                  <div class="container-pag">
                     <div class="text-pag">
                        {!!html_entity_decode($pair['pageLeft']->text)!!}
                     </div>
                     <div class="image-pag">
                        <img class="image-pages" src="{{public_path('storage/images/'.$pair['pageLeft']->image)}}">
                     </div>
                  </div>
               </div>
               <div class="num-pag-left">
                  <span> {{$pair['pageLeft']->id}} </span>
               </div>
            </div>
         </div>
         <div class="pag-right">
            <div class="pagina-capa">
               <div class="card-pag">
                  <div class="container-pag">
                     <div class="text-pag">
                        {!!html_entity_decode($pair['pageRight']->text)!!}
                     </div>
                     <div class="image-pag">
                        <img class="image-pages" src="{{public_path('storage/images/'.$pair['pageRight']->image)}}">
                     </div>
                  </div>
               </div>
               <div class="num-pag-right">
                  <span> {{$pair['pageRight']->id}} </span>
               </div>
            </div>
         </div>
      </div>
   @endforeach
   <div class="row">
      <div class="pag3">
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
            <img src="{{ public_path('storage/images/rodape_ficha.png') }}" alt="logo" class="rodape-ficha"/>
         </div>
      </div>
      <div class="pag4">
         <div class="pagina-apresentacao">
            <div class="card-apresentacao">
               <div class="apresentacao">
                  <div class="apresentacao-writer titles">quem escreveu <img src="{{public_path('storage/images/flecha.png')}}" height="30px" width="30px"/></div> 
                  <div class="apresentacao-nome titles"> {{$data["introduction"]->writer_name}}</div>
               </div>
               <div class="apresentacao-about">
                  <div class="rotated">
                     <img class="apresentacao-imagem" src="{{public_path('storage/images/'.$data['introduction']->writer_image)}}"/>
                  </div>
                  <div class="texto-sobre"><span>{{$data["introduction"]->writer_about}}<span></div>
               </div>
            </div>
            <div class="card-apresentacao espaco-card">
               <div class="apresentacao">
                  <div class="apresentacao-writer titles">quem ilustrou <img src="{{public_path('storage/images/flecha.png')}}" height="30px" width="30px"/></div>
                  <div class="apresentacao-nome titles"> {{$data["introduction"]->illustrator_name}}</div>
               </div>
               <div class="apresentacao-about">
                  <div class="rotated">
                  <img class="apresentacao-imagem" src="{{public_path('storage/images/'.$data['introduction']->illustrator_image)}}">
                  </div>
                  <div class="texto-sobre"><span>{{$data["introduction"]->illustrator_about}}<span></div>
               </div>
            </div>
         </div>
      </div>
   </div> 
   <div class="print"></div> 
</body>
</html>