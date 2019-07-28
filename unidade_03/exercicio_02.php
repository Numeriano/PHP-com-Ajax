<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP com AJAX</title>
    </head>

    <body>


        <div id="nome"></div>

        <script src="jquery.js"></script>
        <script>
        //Método THEM para carregador um arquivo de fora
        $.ajax({
            url:"nome.php"
        }).then(sucesso,falha);

        function sucesso(valor){
            $('div#nome').html(valor);
        }

        function falha (){
            $('#nome').html("Falha no carregamento");
        }
        </script>
    </body>
</html>