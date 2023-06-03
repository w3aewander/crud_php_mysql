<h1>Atualizar Curso</h1>
<hr>

<a href="index.php">Voltar</a>


<form action="#" method="POST">

    <label for="nome">Nome do curso</label><br>
    <input type="text" name="nome" id="nome" size="50" value='<?= $row->nome ?>'><br><br>

    <label for="data_inicio">Data inicio</label><br>
    <input type="date" name="data_inicio" id="data_inicio" value='<?= $row->data_inicio ?>'><br><br>

    <label for="data_termino">Data término</label><br>
    <input type="date" name="data_termino" id="data_termino" value='<?= $row->data_termino ?>'><br><br>

    <label for="carga_horaria">Carga horário</label><br>
    <input type="number" name="carga_horaria" id="carga_horaria"><br><br>

    <hr>

    <button type="submit">Atualizar</button>
    <button type="reset">Limpar</button>

</form>