<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{url('assets/css/styleInicio.css')}}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <nav>
            <div class="logo">
                <a href="index.html"><img src="{{url('assets/img/logo.png')}}" width="100%"></a>
            </div>

            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="#">Sobre Diabetes</a></li>
                <li><a href="#">Contact</a></li>
                <li class="lg"><a href="{{'login'}}">Login</a></li>
            </ul>

            <div class="menu-icon">
                <img src="{{url('assets/img/logo.png')}}">Menu
            </div>
        </nav>

        <main>
            
            <div class="main_text">
                <h1><b>Diabetes!</b> <strong>Tudo sobre Diabetes</strong></h1>
                <p>
                    É uma doença crônica caracterizada por <b>falta ou  <br>
                    má absorção de insulina,</b>hormônio responsavel <br>
                    por metabolizar a glicose para a produção de energia. <br>
                    Por consequência, ocorre um aumento do açucar<br> 
                    no sangue.
                </p>
                <button>Saber mais</button>
            </div>
            <div class="main_img">
                <img src="{{url('assets/img/Global-warming.gif')}}">
            </div>
        </main>
    </div>

    <script>
        var menu = document.querySelector('nav ul');
        var menuIcon = document.querySelector('nav .menu-icon');
        var menuIconImg = document.querySelector('nav .menu-icon img');

        menuIcon.addEventListener('click',()=>{
            menu.classList.toggle('activo');
        })
    </script>
</body>

</html>