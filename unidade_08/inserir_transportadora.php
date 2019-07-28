  <?php
    $conecta = mysqli_connect("localhost","root","","php_ajax");
    if ( mysqli_connect_errno()  ) {
        die("Conexao falhou: " . mysqli_connect_errno());
    }

    if(isset($_POST["nometransportadora"])) {
        $nome       = utf8_decode($_POST["nometransportadora"]);
        $endereco   = utf8_decode($_POST["endereco"]);
        $cidade     = utf8_decode($_POST["cidade"]);
        $estado     = $_POST["estados"];
        
        $inserir    = "INSERT INTO transportadoras ";
        $inserir    .= "(nometransportadora,endereco,cidade,estadoID) ";
        $inserir    .= "VALUES ";
        $inserir    .= "('$nome','$endereco','$cidade', $estado)";      
        
        $retorno = array();
        
        $operacao_inserir = mysqli_query($conecta, $inserir);

        if($operacao_inserir){
            $retorno["sucesso"] = true;
            $retorno["mensagem"] = "Transportadora inserida com sucesso";
        }
        else{
            $retorno["sucesso"] = false;
            $retorno["mensagem"] = "Falha no sistema, tente mais tarde";
        }

        //json_encode — Retorna a representação JSON de um valor
        echo json_encode($retorno);
    }
?>
