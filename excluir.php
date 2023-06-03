<?php

include 'lib/conexao.php';

// Verificar se o formulário foi submetido



// Preparar a consulta
$sql = "DELETE FROM curso WHERE id = ?";

// Preparar a instrução
$stmt = mysqli_prepare($conn, $sql);

// Verificar se a instrução foi preparada com sucesso
if ($stmt) {
    
    $id = $_REQUEST['id']; // ID do registro que deseja excluir

    // Vincular o parâmetro
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Executar a instrução
    if (mysqli_stmt_execute($stmt)) {
        echo "Registro excluído com sucesso.";
    } else {
        echo "Erro ao excluir registro: " . mysqli_error($conn);
    }
} else {
    echo "Erro na preparação da instrução: " . mysqli_error($conn);
}

// Fechar a instrução e a conexão
mysqli_stmt_close($stmt);
mysqli_close($conn);

header('refresh: 2, ./listar.php');