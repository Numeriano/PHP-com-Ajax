<?php
    // Criar objeto de conexao
    $conecta = mysqli_connect("localhost","root","","php_ajax");
    if ( mysqli_connect_errno()  ) {
        die("Conexao falhou: " . mysqli_connect_errno());
    }

    // tabela de transportadoras
    $tr = "SELECT * FROM transportadoras ";
    $consulta_tr = mysqli_query($conecta, $tr);
    if(!$consulta_tr) {
        die("erro no banco");
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP INTEGRACAO</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
    </head>

    <body>        
        <main>  
            <div id="janela_transportadoras">
                <?php
                    while($linha = mysqli_fetch_assoc($consulta_tr)) {
                ?>
                <ul>
                    <li><?php echo utf8_encode($linha["nometransportadora"]) ?></li>
                    <li><?php echo utf8_encode($linha["cidade"]) ?></li>
                    <li><a href="" class="excluir" title="<?php echo $linha['transportadoraID']?>">Excluir</a></li>
                </ul>
                <?php
                    }
                ?>
            </div>
        </main>

        
        <script src="jquery.js"></script>
        <script>
            $('#janela_transportadoras ul li a.excluir').click(function (e) {
                e.preventDefault();
                var id = $(this).attr("title");
                 //.parent() sobe uma tag para referencia
                var elemento = $(this).parent().parent()

                $.ajax({
                    type: "POST",
                    url: "exclusao.php",
                    data: "transportadoraID=" + id,
                    async: false
                }).done(function (data) {
                    sucesso = $.parseJSON(data)["sucesso"];

                    if(sucesso){
                        //.fadeOut() faz o efeito de exclusão na página
                       $(elemento).fadeOut();
                    }else{
                        console.log("Erro na exclusão");
                    }
                }).fail(function () {
                    consloe.log("Erro no sistema");
                })
            });

        </script>
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>