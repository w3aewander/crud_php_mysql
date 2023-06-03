<?php

include 'lib/conexao.php';

echo "<a href='index.php'>Inicio</a>";
echo "<hr>";


echo '<form>
<label for="id">ID</label>
<input type="text" name="id" id="id">

<label for="nome">Nome</label>
<input type="text" name="nome" id="nome">

<label for="id">Data inicio</label>
<input type="date" name="data_fim" id="data_inicio">

<label for="data_termino">Data inicio</label>
<input type="date" name="data_termino" id="data_termino">
<hr>
<button type="submit">Pesquisar</button>
<button type="reset">Limpar</button>
</form>';

echo '<hr>';


// Verificar conexão
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

$id = $_REQUEST['id'] ?? '';
$nome = $_REQUEST['nome'] ?? '';
$data_inicio = $_REQUEST['data_inicio'] ?? '';
$data_termino = $_REQUEST['data_termino'] ?? '';

// Preparar a consulta
$sql = "SELECT * FROM curso 
        WHERE id = ? 
        or nome like ? 
        or data_inicio = ? 
        or data_termino = ?";

// Preparar a instrução
$stmt = mysqli_prepare($conn, $sql);

// Verificar se a instrução foi preparada com sucesso
if ($stmt) {
    //$id = 1; // ID do registro que deseja pesquisar

    $nome = "%".$nome."%";
    // Vincular o parâmetro
    mysqli_stmt_bind_param($stmt, "ssss", $id, $nome, $data_inicio, $data_termino);

    // Executar a instrução
    if (mysqli_stmt_execute($stmt)) {
        // Obter os resultados
        $result = mysqli_stmt_get_result($stmt);

        // Verificar se existem resultados
        if (mysqli_num_rows($result) > 0) {
            // Iterar sobre os resultados e exibir os dados
            while ($row = mysqli_fetch_assoc($result)) {
                echo "ID: " . $row['id'] . "<br>";
                echo "Nome: " . $row['nome'] . "<br>";
                echo "Data inicio: " . $row['data_inicio'] . "<br><br>";
                echo "Data término: " . $row['data_termino'] . "<br><br>";

            }
        } else {
            echo "Nenhum registro encontrado.";
        }
    } else {
        echo "Erro ao executar a instrução: " . mysqli_error($conn);
    }
} else {
    echo "Erro na preparação da instrução: " . mysqli_error($conn);
}

// Fechar a instrução e a conexão
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
