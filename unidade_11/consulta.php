<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP com AJAX</title>
        <link href="_css/estilo.css" rel="stylesheet">
    </head>

    <body>
        <main>
            <div id="janela_formulario">
                <form id="pesquisarProdutos">
                    <label for="categorias">Categorias</label>
                    <select id="categorias">
                    </select>

                    <label for="produtos">Produtos</label>
                    <select id="produtos">
                    </select>
                </form>
            </div>
          
        </main>
        
    
        <script src="_js/jquery.js"></script>
        <script>
            function retornarCategorias(valor) {
                var categorias = "";
                
                $.each(valor, function (chave, data) { 
                     categorias += '<option value="' + data.categoriaID + '">' + data.nomecategoria + '</option>'; 
                });
                $('#categorias').html(categorias);
            }

            //change serve para mudar o seletor do select
            $('#categorias').change(function (e) { 
             var categoriaID = $(this).val();

             $.ajax({
                 type: "GET",
                 url: "http://localhost/php_ajax/unidade_11/retornar_produtos.php",
                 data: "categoriaID=" + categoriaID,
                 async:false
             }).done(function (data) {
                 var lista = "";

                 $.each($.parseJSON(data), function (chave, valor) {
                   lista += '<option value= "'+ valor.produtoID + '">' + valor.nomeproduto + '</option>'; 
                 });

                 $('#produtos').html(lista);
             })
            });
        </script>
        <script src="http://localhost/php_ajax/unidade_11/retornar_categorias.php?callback=retornarCategorias"></script>
     
    </body>
</html>