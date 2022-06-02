<?php

include_once("controle.php");

if (!empty($_POST['form_submit'])) {
    cadastrar();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SisCadPF - Cadastrar Pessoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <div class="container py-4">
        <h1 class="">Cadastrar Pessoa Física</h1>

        <form class="form" method="post" action="viewCadastrar.php">

            <div class="container">

                <div class="row py-4">

                    <div class="col">
                        <button type="submit" class="btn btn-success col-12">
                            Confirmar Alteração&nbsp;
                        </button>
                    </div>
                    <div class="col">
                        <a href="viewMain.php" class="btn btn-warning text-white col-12">
                            Voltar - Não Alterar
                        </a>
                    </div>
                </div>


                <input type="hidden" name="form_submit" value="OK">
                <div class="row">
                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="cpf" placeholder="cpf" />
                            <label for="cpf">CPF</label>
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="nome" placeholder="Nome" />
                            <label for="nome">Nome</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="endereco" placeholder="endereco" />
                            <label for="endereco">Endereço</label>
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="form-floating mb-3">
                            <input type="number"  class="form-control" name="telefone" placeholder="telefone" />
                            <label for="telefone">Telefone</label>
                        </div>
                    </div>
                </div>

        </form>
    </div>
</body>

</html>