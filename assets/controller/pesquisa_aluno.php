<?php 
require_once '../model/funcoes.php';

$func = new Funcoes();

$cone = $func->Conectar();

$query_1 = "SELECT * FROM usuario";
$resulta = mysqli_query($cone,$query_1);
$result = mysqli_fetch_assoc($resulta);

$total_row = mysqli_num_rows($resulta);

$output = '
<table style="overflow: scroll;" class="table table-striped table-bordered">
	<tr>
		<th>Nome</th>
		<th>Sobrenome</th>
		<th>Motivo</th>
        <th>Celular</th>
        <th>E-mail</th>
	</tr>
';
if($total_row > 0)
{
	foreach($resulta as $row)
	{
		$output .= '
		<tr>
			<td width="40%">'.$row["nome"].'</td>
            <td width="40%">'.$row["sobrenome"].'</td>
            <td width="40%">'.$row["motivo"].'</td>
            <td width="40%">'.$row["celular"].'</td>
            <td width="40%">'.$row["email"].'</td>
			
			<td width="10%">
				<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id"].'">Excluir</button>
			</td>
		</tr>
		';
	}
}
else
{
	$output .= '
	<tr>
		<td colspan="4" align="center">Nenhuma lista para exibir</td>
	</tr>
	';
}
$output .= '</table>';
echo $output;


$aluno = $_POST['campo_de_filtro'];

if($aluno != '' || $aluno != null){
    
}





?>