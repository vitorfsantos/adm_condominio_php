<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gerenciamento Condomínio</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Gerenciamento Condomínio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="?page=listar">Lista Apartamentos</a>
                <a class="nav-link" href="?page=listar_esta">Estacionamento</a>
            </div>
            </div>
        </div>
    </nav>
    

    <div class="container">
            <div class="col mt-5">
            <?php
            //chama o arquivo de conexão com o banco
            include("config.php");
            
                //seleciona a pagina a exibir
            switch(@$_REQUEST["page"]){
                //apartamentos
                case "novo":
                    include("apartamentos/novo_apt.php");
                break;
                case "listar":
                    print "<a aria-current='page' href='?page=novo'><i class='fa-solid fa-plus'>Novo Apartamento</i></a>";
                    include("apartamentos/listar_apts.php");
                break;
                case "salvar":
                    include("apartamentos/salvar_apt.php");
                break;
                case "editar":
                    include("apartamentos/editar_apt.php");
                break;
                //estacionamento
                case "novo_esta":
                    include("estacionamento/novo_esta.php");
                break;
                case "listar_esta":
                    print "<a aria-current='page' href='?page=novo_esta'><i class='fa-solid fa-plus'>Novo Veículo</i></a>";
                    include("estacionamento/listar_esta.php");
                break;
                case "salvar_esta":
                    include("estacionamento/salvar_esta.php");
                break;
                case "editar_esta":
                    include("estacionamento/editar_esta.php");
                break;
                default:
                    print "Bem vindo!";
            }
              ?>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>