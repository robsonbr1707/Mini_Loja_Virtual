<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
    <style>

        body{
            background:rgb(65, 65, 65);
        }

        .form{
            margin: auto;
            width: 50%;
        }

        .d-flex{
            margin: 30px;
        }

        input[type=search]{
            width: 50%;
            padding: 10px;
        }

        #carousel-box{
            width: 95%;
            margin:20px auto;
            background: rgb(34, 29, 29);
            padding: 10px;
            border-radius: 5px;
        }

        #carouselExampleControls{
            width: 90%;
            margin:20px auto;
            background: rgb(255, 255, 255);
            padding: 15px;
        }
        #carouselExampleControls img{
            height: 400px;
        }

        .carousel-control-next{
            background:rgb(156, 156, 156);
        }

        .carousel-control-prev{
            background:rgb(156, 156, 156);
        }

        .carousel-inner{
            width:50%;
            margin: auto;
        }
       
        .section {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            margin: auto;
            width: 85%;
        }

        .color_green{
            color: rgb(26, 197, 26)
        }

        .section .card{
            background:rgb(65, 65, 65);
            border: 2px solid rgb(75, 75, 75);
            margin: 10px;
        }

        .section .card img{
            width: 70%;
            height: 200px;
            margin:5px auto;
            background: rgb(247, 247, 247);

        }

        .table{
            width: 80%;
            margin:20px auto;
        }

        .table img{
            width: 80px;
            height: 70px;
        }
 
    </style>
</head>
<body>

    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <div class="container-fluid">
            <a href="/" class="navbar-brand">Inicio</a>
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    @guest
                        <a href="/register" class="nav-link">Cadastrar</a>
                        <a href="/login" class="nav-link">Login</a>
                    @endguest
                    @auth
                        <a href="{{ route('index.create')}}" class="nav-link">Criar Registro</a>
                        <a href="{{ route('index.dashboard')}}" class="nav-link">Meus Produtos</a>
                        <a href="{{ route('index.cart')}}" class="nav-link">Carrinho</a>
                        <form action="/logout" method="POST">
                            @csrf
                            <a href="/logout" class="nav-link" onclick="event.preventDefault();this.closest('form').submit()">Sair</a>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

      @yield('content')

    <footer class="text-center text-white" style="padding: 20px;">
        <p>&copy; Robson Luiz</p>
    </footer>
</body>
</html>