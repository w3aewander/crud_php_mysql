<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inclusão</title>
</head>

<body>

    <?php

    include "lib/conexao.php";

    //Qual foi o método recebido na requisição?
    $metodo = $_SERVER["REQUEST_METHOD"];

    //die($metodo);
    if ($metodo == "GET") {
        include "form_incluir.php";
    } else {

        //echo "Rotinas para inclusão de curso";

        // Verificar se o formulário foi submetido

        $nome = $_POST['nome'];
        $data_inicio = $_POST['data_inicio'];
        $data_termino = $_POST['data_termino'];

        // Preparar a consulta
        $sql = "INSERT INTO curso (nome, data_inicio, data_termino) 
                VALUES ('$nome', '$data_inicio', '$data_termino')";

        // Executar a consulta
        if (mysqli_query($conn, $sql)) {
            echo "Registro criado com sucesso.";
        } else {
            echo "Erro ao criar registro: " . mysqli_error($conn);
        }

        echo "<br>Redirencionando para a listagem da tabela.<br>";
        header('refresh: 2, listar.php');
    }


    ?>

</body>

</html>