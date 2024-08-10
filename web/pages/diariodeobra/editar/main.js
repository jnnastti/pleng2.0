function selecionaMaterial() {
    var etapa = document.getElementById('etapa').value;
    var dados = JSON.stringify(etapa);

    $.ajax({
        url: '../../../../server/src/listas/listaMaterialEtapa.php',
        type: 'POST',
        data: {data: dados},
        success: function(response){
            // Retorno se tudo ocorreu normalmente
            $("#material").html(response);

            selecionaQtdeMaterial();
        },
        error: function(jqXHR, textStatus, errorThrown) {
        // Retorno caso algum erro ocorra
        }
    });
}

function selecionaEtapa() {
    var etapa = document.getElementById('etapa').value;
    var dados = JSON.stringify(etapa);

    $.ajax({
        url: '../../../../server/src/diariodeobra/selecionaEtapa.php',
        type: 'POST',
        data: {data: dados},
        success: function(response){
            // Retorno se tudo ocorreu normalmente
            $("#tamanhototal").val(response);

            selecionaMaterial();
        },
        error: function(jqXHR, textStatus, errorThrown) {
        // Retorno caso algum erro ocorra
        }
    });
}

function selecionaQtdeMaterial() {
    var infos =  {
        'material' : document.getElementById('material').value,
        'etapa' : document.getElementById('etapa').value,
    };
    var dados = JSON.stringify(infos);

    $.ajax({
        url: '../../../../server/src/diariodeobra/selecionaQtdeMaterial.php',
        type: 'POST',
        data: {data: dados},
        success: function(response){
            // Retorno se tudo ocorreu normalmente
            $("#qtdemattotal").val(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
        // Retorno caso algum erro ocorra
        }
    });
}

function excluirEtapa(idetapaproj) {
    var infos = {
        'id' : idetapaproj
    }
    var dados = JSON.stringify(infos);

    $.ajax({
        url: '../../../../server/src/diariodeobra/excluirEtapa.php',
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

function editarQtdeMaterial() {
    var infos =  {
        'material' : document.getElementById('material').value,
        'etapa' : document.getElementById('etapadiario').value,
        'grupo' : document.getElementById('grupo').value,
    };
    var dados = JSON.stringify(infos);

    $.ajax({
        url: '../../../../server/src/diariodeobra/editarQtdeMaterial.php',
        type: 'POST',
        data: {data: dados},
        success: function(response){
            // Retorno se tudo ocorreu normalmente
            $("#qtdemattotal").val(response[0]);
        },
        error: function(jqXHR, textStatus, errorThrown) {
        // Retorno caso algum erro ocorra
        }
    });
}