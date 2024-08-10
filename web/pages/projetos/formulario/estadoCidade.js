// Lista de estados
async function getState() {
    try {
        const responseState = await fetch('https://servicodados.ibge.gov.br/api/v1/localidades/estados')
        const dataState = await responseState.json()
        showState(dataState)

    } catch (error) {
        console.log(error)
    }
}

// mostrar estados
function showState(states) {
    let outputState = '<option>Selecionar um estado</option>'
    
    for( let state of states ) {
        outputState += `<option value="${state.sigla}">${state.nome}</option>`
        //console.log(id);
    }

    document.getElementById('state').innerHTML = outputState
}

getState();

// identificar estado selecionado
var stateId;
function selectedState() {
    var selectState = document.getElementById('state');

    stateId = selectState.options[selectState.selectedIndex].value;  
    
    // Lista de cidades
    async function getCity() {
        try {
            const responseCity = await fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${stateId}/municipios`)
            const dataCity = await responseCity.json()
            showCity(dataCity)

        } catch (error) {
            console.log(error)
        }
    }

    // mostrar cidades
    function showCity(cities) {
        let outputCity = ''
        
        for( let city of cities ) {
            outputCity += `<option value="${city.nome}">${city.nome}</option>`
            
        }

        document.getElementById('city').innerHTML = outputCity
    }

    getCity();
}