<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">


    <title><?=$title?></title>
</head>
<body>
<nav class=" navbar-expand-lg navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        <i class="fas fa-graduation-cap" width="30" height="30" class="d-inline-block align-top" alt=""></i>
          Список студентов
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Главная</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Кабинет</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Выход</a>
            </li>
        </ul>
        <form action="?" method="get" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Поиск" aria-label="Search">
            <input class="btn btn-outline-success my-2 my-sm-0" value="Искать" type="submit"></input>
        </form>
    </div>
</nav>
