<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!--importanto o ajax-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!--Importando biblioteca para o filtro dentro dos select do html-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Document</title>
</head>
    <body>

<!-- Dropdown Structure -->
<ul id="cadastros" class="dropdown-content ">
  <li><a href="adicionarEntidades.php">Entidades</a></li>
  <li><a href="#!">Produtos</a></li>
</ul>

<ul id="lancamentos" class="dropdown-content ">
  <li><a href="#!">Compras</a></li>
  <li><a href="#!">Vendas</a></li>
  <li class="divider"></li>
  <li><a href="#!">Despesas</a></li>
</ul>

<ul id="relatorios" class="dropdown-content ">
  <li><a href="#!">Vendas</a></li>
  <li><a href="#!">Clientes</a></li>
  <li class="divider"></li>
  <li><a href="#!">D.R.E</a></li>
</ul>

<nav>
  <div class="nav-wrapper background-color: blue">

    <a href="#!" class="brand-logo"> Oh Day Concept! </a>
    <ul class="right hide-on-med-and-down">
      <!-- Dropdown Trigger -->
      <li><a class="dropdown-trigger" href="#!" data-target="cadastros">Cadastros<i class="material-icons right">arrow_drop_down</i></a></li>

      <li><a class="dropdown-trigger" href="#!" data-target="lancamentos">Lançamentos<i class="material-icons right">arrow_drop_down</i></a></li>

      <li><a class="dropdown-trigger" href="#!" data-target="relatorios">Relatórios<i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>
  </div>
</nav>

