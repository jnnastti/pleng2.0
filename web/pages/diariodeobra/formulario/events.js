qs("#obs2").addEventListener('input', function (e) {
    var selectMaterialEtapa = document.querySelector('input[id="obs2"]');
    var texto = selectMaterialEtapa.value;

    var dados = {
        isDiario: true,
        etapa: texto.substr(0, texto.indexOf('-')).trim()
    };

    var selectMaterial = document.querySelector('.material');

    selectMaterial.innerHTML = "";
    
    $.ajax({
        url: '../../../../server/src/MaterialEtapa.php',
        type: 'POST',
        data: {data: JSON.stringify(dados)},
        success: function(response){
            // Retorno se tudo ocorreu normalmente

            JSON.parse(response).forEach(function(item) {
                var option = this.criarOptionMaterial(item.nome, item.idmatetapa);

                selectMaterial.append(option);
            })

        },
        error: function(jqXHR, textStatus, errorThrown) {
            // Retorno caso algum erro ocorra
            console.log("DEU ERRO!!! " + errorThrown)
        }
    });
 });


var timerDataList = {};//Para usar com multiplos datalist

function qs(query, context) {
     return (context || document).querySelector(query);
  }
  function qsa(query, context) {
     return (context || document).querySelectorAll(query);
  }
    
qs("#obs").addEventListener('input', function (e) {
     var listAttr = e.target.getAttribute('list');
       
     if (timerDataList[listAttr]) 
         clearTimeout(timerDataList[listAttr]);
    
     timerDataList[listAttr] = setTimeout(executeCheckin, 100, e.target, listAttr);
});