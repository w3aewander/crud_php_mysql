<?php

include 'lib/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_REQUEST['id'];
    $nome = $_REQUEST['nome'];
    $data_inicio = $_REQUEST['data_inicio'];
    $data_termino = $_REQUEST['data_termino'];

    // Preparar a consulta
    $sql = "UPDATE curso 
        SET nome = ?, data_inicio = ?, data_termino = ?  
        WHERE id = ?";

    // Preparar a instrução
    $stmt = mysqli_prepare($conn, $sql);

    // Verificar se a instrução foi preparada com sucesso
    if ($stmt) {

        // Vincular os parâmetros
        mysqli_stmt_bind_param($stmt, "sssi", $nome, $data_inicio, $data_termino, $id);

        // Executar a instrução
        if (mysqli_stmt_execute($stmt)) {
            echo "Registro atualizado com sucesso.";
        } else {
            echo "Erro ao atualizar registro: " . mysqli_error($conn);
        }
    } else {
        echo "Erro na preparação da instrução: " . mysqli_error($conn);
    }

    // Fechar a instrução e a conexão
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    header('refresh: 2; listar.php');
} else {

    $sql = "SELECT * FROM curso where id = ? ";

    // Preparar a instrução
    $stmt = mysqli_prepare($conn, $sql);

    // Verificar se a instrução foi preparada com sucesso
    if ($stmt) {
        $id = $_REQUEST['id']; // ID do registro que deseja pesquisar

        // Vincular o parâmetro
        mysqli_stmt_bind_param($stmt, "i", $id);

        // Executar a instrução
        mysqli_stmt_execute($stmt);

        // Obter os resultados
        $result = mysqli_stmt_get_result($stmt);

        // Verificar se existem resultados
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_object($result)) {

                include 'form_atualizar.php';
            }
        } else {
            echo "Nenhum registro encontrado.";
        }
    } else {
        echo "Erro na preparação da instrução: " . mysqli_error($conn);
    }

    // Fechar a instrução e a conexão
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
