<?php
//configurações gerais
//Essa linha significa que qualquer domínio pode consultar este arquivo.
header('Access-Control-Allow-Origin:*');
//Abrir conexão
$conecta= mysqli_connect("localhost","root","","php_ajax");

//Esse comando é utilizado para mostrar seus dados do banco com acentos na tela do navegador
mysqli_set_charset($conecta, 'utf8');

$selecao = "select nomeproduto, precorevenda, imagempequena from produtos";
$produtos = mysqli_query($conecta,$selecao);

$retorno = array();
while($linha = mysqli_fetch_object($produtos)){
    $retorno[] = $linha;
}

// Esse comando que cria um arquivo JSON dinâmico com as informações do banco 
echo json_encode($retorno);

//Fechar conexão
mysqli_close($conecta);
?>