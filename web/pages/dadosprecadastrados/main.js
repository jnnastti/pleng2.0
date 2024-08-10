function deletarDados(id, idcolumn, tabela, pagina) {
    var infos =  {
        'id': id,
        'idcolumn': idcolumn,
        'tabela': tabela,
        'pagina': pagina
        
    };

    var dados = JSON.stringify(infos);

    $.ajax({
        url: '../../../../server/src/dadosprecadastrados/deletar.php',
        type: 'POST',
        data: {data: dados},
        success: function(response){
            // Retorno se tudo ocorreu normalmente
            window.location.href = response
        },
        error: function(jqXHR, textStatus, errorThrown) {
        // Retorno caso algum erro ocorra
        }
    });
};

function deletarMaterialEtapa(etapa, material) {
    var infos =  {
        'Material': material,
        'Etapa': etapa
        
    };

    var dados = JSON.stringify(infos);

    $.ajax({
        url: '../../../../server/src/dadosprecadastrados/deletarMaterialEtapa.php',
        type: 'POST',
        data: {data: dados},
        success: function(response){
            // Retorno se tudo ocorreu normalmente
            window.location.href = response
        },
        error: function(jqXHR, textStatus, errorThrown) {
        // Retorno caso algum erro ocorra
        }
    });
};

function deletarMaterialGrupo(grupo, material) {
    var infos =  {
        'Material': material,
        'Grupo': grupo
        
    };

    var dados = JSON.stringify(infos);

    $.ajax({
        url: '../../../../server/src/dadosprecadastrados/deletarMaterialGrupo.php',
        type: 'POST',
        data: {data: dados},
        success: function(response){
            // Retorno se tudo ocorreu normalmente
            window.location.href = response
        },
        error: function(jqXHR, textStatus, errorThrown) {
        // Retorno caso algum erro ocorra
        }
    });
};