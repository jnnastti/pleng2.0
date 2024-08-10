function onMostrarMateriais(idetapa) {
    var materiais = document.querySelector(`#collapse${idetapa}`);

    if(materiais.style.height !== "0px" && materiais.style.height !== "" && materiais.style.height !== null) {
        materiais.style.height = '0'
        materiais.style.padding = '0'
        materiais.style.overflowy = 'hidden'
    } else {
        materiais.style.height = 'auto'
        materiais.style.padding = '10px 0px 10px 10px'
        materiais.style.overflowY = 'auto'
    }
}

function onCalculaValorFaltanteEdit() {
    var dados = {
        levantamento: document.getElementById('idlevantamento').value,
        material: document.getElementById('idmat').value
    };

    $.ajax({
        url: '../../../server/src/Orcamento.php',
        type: 'POST',
        data: {dataOrc: JSON.stringify(dados)},
        success: function(response){
            let qtdeFaltante = document.getElementById('qtde_faltante');
            let qtdeComprada = document.getElementById('qtde_comprada');
            // Retorno se tudo ocorreu normalmente
            
            qtdeFaltante.value = (response - qtdeComprada.value).toFixed(2);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // Retorno caso algum erro ocorra
            console.log("DEU ERRO!!! " + errorThrown)
        }
    });
}
function onCalculaQtdeFaltanteCad() {
    var dados = {
        levantamento: document.getElementById('levcad').value,
        material: document.getElementById('material').value
    };

    $.ajax({
        url: '../../../server/src/Orcamento.php',
        type: 'POST',
        data: {dataOrc: JSON.stringify(dados)},
        success: function(response){
            let qtdeFaltante = document.getElementById('qtdefcad');
            let qtdeComprada = document.getElementById('qtdeccad');
            // Retorno se tudo ocorreu normalmente
            var infos = JSON.parse(response);

            console.log(infos)
            qtdeFaltante.value = ((infos.qtdetotal - infos.qtdecomprada) - qtdeComprada.value).toFixed(2);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // Retorno caso algum erro ocorra
            console.log("DEU ERRO!!! " + errorThrown)
        }
    });
}