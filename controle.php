<?php

include_once("modelo.php");

function rotas($url)
{

	$dados = explode("/", $url);

	// CADASTRAR
	if (strcmp($dados[0], "cadastrar") == 0) {
		echo "<script> window.location='viewCadastrar.php' </script>";
	}
	// ALTERAR
	else if (strcmp($dados[0], "alterar") == 0) {
		// Obtem dados do curso escolhido para alteração
		$curso = select_where(trim($dados[1]));

		if ($curso == null) {
			echo "<script> alert('Código do curso NÃO ENCONTRADO!') </script>";
		} else {
			$url = "viewAlterar.php?id=" . trim($dados[1]) . "&nome=" . $curso[0] . "&sigla=" . $curso[1] . "&tempo=" . trim($curso[2]);
			echo "<script> window.location='" . $url . "' </script>";
		}
	}
	// REMOVER
	else if (strcmp($dados[0], "remover") == 0) {
		echo "<script> window.location='viewRemover.php?cpf=" . $dados[1] . "' </script>";
	}
}

function cadastrar()
{

	// Monta o array
	$dados = array(
		$_POST['id'] => array(
			"nome" => $_POST['nome'],
			"sigla" => $_POST['sigla'],
			"tempo" => $_POST['tempo']
		)
	);

	insert($dados);
	echo "<script> window.location='viewMain.php' </script>";
}

function alterar()
{

	// Monta o array
	$dados = array(
		$_POST['id'] => array(
			"nome" => $_POST['nome'],
			"sigla" => $_POST['sigla'],
			"tempo" => $_POST['tempo']
		)
	);

	update($dados, $_POST['id']);
	echo "<script> window.location='viewMain.php' </script>";
}

function loadPessoas()
{

	$pessoas = select();

	foreach ($pessoas as $id => $dados) {

		if (!empty($dados)) {
			echo "<tr>";
			echo "<td class='d-none d-md-table-cell'>" . $id . "</td>";

			$cont = 0;
			foreach ($dados as $valor) {
				if ($cont == 0)
					echo "<td>" . $valor . "</td>";
				else
					echo "<td class='d-none d-md-table-cell'>" . $valor . "</td>";

				$cont++;
			}


			echo "<td>";
			echo "<button type='submit' name='acao' value='alterar/" . $id . "' class='btn btn-success'>";
			echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>";
			echo "<path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/>
			";
			echo "</svg>";
			echo "</button>";
			echo "&nbsp";
			echo "<button type='submit' name='acao' value='remover/" . $id . "' class='btn btn-danger'>";
			echo "<svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill='#FFF' class='bi bi-trash-fill' viewBox='0 0 16 16'>";
			echo "<path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>";
			echo "</svg>";
			echo "</button>";
			echo "</td>";
			echo "</tr>";
		}
	}
}
