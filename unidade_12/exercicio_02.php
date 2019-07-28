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
                
                <form id="formulario_transportadora">
                    <label for="nometransportadora">Nome da Transportadora</label>
                    <input type="text" value="" name="nometransportadora" id="nometransportadora">
                    
                    <label for="cep">CEP (ex: 58000-100)</label>
                    <input type="text" value="" name="cep" id="cep" maxlength="9">
                    
                    <label for="endereco">Endereço</label>
                    <input type="text" value="" name="endereco" id="endereco">

                    <label for="cidade">Cidade</label>
                    <input type="text" value="" name="cidade" id="cidade">

                    <label for="estado">Estado</label>
                    <input type="text" value="" name="estado" id="estado">

                    <label for="bairro">Bairro</label>
                    <input type="text" value="" name="bairro" id="bairro">
                    
                    <input type="submit" value="Confirmar alteração">  
                    
                    <div id="mensagem">
                        <p></p>
                    </div>
                </form> 
                
            </div>
        </main>
        
        <script src="_js/jquery.js"></script>
        <script>
        //blur(): sai da caixa de texto;
        //val(): pega o valor digitado no campo;

        $('#cep').blur(function (e) { 
           var cep=$('#cep').val();
           var url = "https://viacep.com.br/ws/" + cep + "/json";
           var validacep=/^[0-9]{5}-?[0-9]{3}$/;

           if (validacep.test(cep)) {
               $('#mensagem').hide();
               retornarCep(url);
           }
           else{
                $('#mensagem').show();
                $('#mensagem p').html("Cep Inválido");
           }
        });

       function retornarCep(data){
            $.ajax({
                type:"GET",
                url: data,
                async:false
            }).done(function (valor) {
                //console.log(valor);
                $('#bairro').val(valor.bairro);
                $('#endereco').val(valor.logradouro);
                $('#cidade').val(valor.localidade);
                $('#estado').val(valor.uf);
            }).fail(function () {
                console.log("erro");
            })
        }

        </script>
    </body>
</html>