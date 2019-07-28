<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP com AJAX</title>
    </head>

    <body>

 
        <div id="nome"></div>
        <div id="mensagem"></div>

        <script src="jquery.js"></script>

        <script>
        //Método DONE para carregador um arquivo de fora
        $.ajax({
            url:'nome.php'
        }).done(function(valor) {
            $('div#nome').html(valor);
        }).fail(function() {
            $('div#nome').htlm("Falha no carregamento");
        }).always(function() {
            $('div#mensagem').htlm("Qualquer coisa");
        })
        
        </script>
    </body>
</html>
