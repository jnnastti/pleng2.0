function selecionaDiario(iddiario) {
    var dados = JSON.stringify(iddiario);

    $.ajax({
        url: '../../../../server/src/diariodeobra/selecionaDiario.php',
        type: 'POST',
        data: {data: dados},
        success: function(response){
            // Retorno se tudo ocorreu normalmente
            window.location.href = "../editar";
        },
        error: function(jqXHR, textStatus, errorThrown) {
        // Retorno caso algum erro ocorra
        }
    });

}