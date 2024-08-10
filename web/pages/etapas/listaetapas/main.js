function deletarEtapa(idetapaproj) {
    var dados = JSON.stringify(idetapaproj);

    $.ajax({
        url: '../../../../server/src/etapas/deletarEtapa.php',
        type: 'POST',
        data: {data: dados},
        success: function(response){
            // Retorno se tudo ocorreu normalmente
            location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown) {
        // Retorno caso algum erro ocorra
        }
    });
}