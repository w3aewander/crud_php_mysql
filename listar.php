<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>


</head>

<body>

    <h1>Listando cursos</h1>

    <?php

    include 'lib/conexao.php';

    // Preparar a consulta
    $sql = "SELECT * FROM curso";

    $resultado = mysqli_query($conn, $sql);

    echo "<table width='80%' cellpadding='4' cellspacing='4' border='1'>";
    echo "<thead>";
    echo "<tr><th>ID</th><th>Nome do curso</th><th>Data Inicio</th><th>Data término</th><th>Operação</th></tr>";
    echo "</thead>";

    echo "<tbody>";

    // Verificar se existem resultados
    if (mysqli_num_rows($resultado) > 0) {
        // Iterar sobre os resultados e exibir os dados
        while ($row = mysqli_fetch_object($resultado)) {
            echo "<tr>
                <td>{$row->id}</td>
                <td>{$row->nome}</td>
                <td>{$row->data_inicio}</td>
                <td>{$row->data_termino}</td>
                <td>
                   <a href='atualizar.php?id={$row->id}'>Atualizar</a>
                   <a id='ancora-exclusao' href='excluir.php?id={$row->id}'>Excluir</a>
                </td>
              </tr>";
        }
    } else {
        echo "<tr><th colspan='5'>Nenhum registro encontrado.</th></tr>";
    }

    echo "</tbody>";
    echo "</table>";

    ?>

    <br>
    <a href="index.php">Voltar</a>



    <script>
        document.addEventListener('DOMContentLoaded', function(evt) {

            let ancora = document.querySelector('#ancora-exclusao');

                
                ancora.addEventListener('click', function(x){
                    x.preventDefault();
                    if ( confirm('Deseja realmente apagar este registro?')){
                        alert('apagando o registro...');
                        location.href=x.target;
                    } else {
                       alert('Exclusão cancelada'); 
                       return false;
                    }
                })
            });
    </script>
</body>

</html>