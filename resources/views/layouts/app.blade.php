<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DevisApp')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Styles généraux */
        body {
            font-size: 16px;
        }

        /* Styles pour les petits écrans */
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
            
            .table-responsive {
                font-size: 14px;
            }

            .btn {
                width: 100%;
                margin-bottom: 10px;
            }

            .navbar-brand {
                font-size: 1.2rem;
            }

            footer {
                text-align: center;
            }

            footer ul.nav {
                justify-content: center !important;
                margin-top: 1rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container">
            <a class="navbar-brand text-white" href="#">DevisApp</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="{{route('home')}}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('factures.index')}}">Factures</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('divers.index')}}">Devis</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <div class="container">
        <footer class="py-3 my-4">
            <div class="row">
                <div class="col-12 col-md-4 text-center text-md-start mb-3 mb-md-0">
                    <p class="mb-0">© 2024 GESdevis</p>
                </div>
                <div class="col-12 col-md-8">
                    <ul class="nav justify-content-center justify-content-md-end">
                        <li class="nav-item"><a href="" class="nav-link px-2 text-muted">Accueil</a></li>
                        <li class="nav-item"><a href="" class="nav-link px-2 text-muted">Devis</a></li>
                        <li class="nav-item"><a href="" class="nav-link px-2 text-muted">Factures</a></li>
                        <li class="nav-item"><a href="" class="nav-link px-2 text-muted">À propos</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>