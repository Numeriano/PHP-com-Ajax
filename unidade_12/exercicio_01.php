<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP com AJAX</title>
    </head>

    <body>

        <script src="_js/jquery.js"></script>
        <script>
        //Consulta do Cep
        var cep = "80210-390";

        $.ajax({
            type: "GET",
            url: "https://viacep.com.br/ws/" + cep + "/json",
            async: false
        }).done (function (data) {
            console.log(data);
        }).fail(function (params) {
            console.log("Erro");
        })
        </script>
    </body>
</html>