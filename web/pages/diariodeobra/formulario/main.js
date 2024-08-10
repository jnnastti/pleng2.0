// -----------------

function executeCheckin(target, listAttr) {
    var options = qsa( 'option', qs('#' + listAttr) ),
        values = [];
     
    [].forEach.call(options, function (option) {
        values.push(option.value)
    });

    var currentValue = target.value;
        currentValue = currentValue.substr(0, currentValue.indexOf('-')).trim()
    var inValorTotal = document.querySelector('#tamTotal');
    
    if (values.indexOf(target.value) !== -1) {
        var valorTotal = document.getElementById(currentValue).textContent;
        
        inValorTotal.value = valorTotal.substr(valorTotal.indexOf('-') + 2).trim();

    } else {
        inValorTotal.value = "";
    }
}

function criarOptionMaterial(nome, id) {
    var option = document.createElement('option');

    option.value = id;
    option.textContent = nome;

    return option;
}

//////////////////////////

var listaMateriais = [];
var materiaisArray = [];

function onClickSalvarMaterial() {
    var select = document.querySelector('select[name="material"]'),
        id = select.value,
        nome = select.children[select.selectedIndex].textContent,
        qtdeUsada = document.querySelector('input[name="qtdeMatUsada"]').value,
        etapa = document.querySelector('#obs2').value;
    
    etapa = etapa.substr(0, etapa.indexOf('-')).trim();
    
    var material = {
        id: id,
        nome: nome,
        qtdeUsada: qtdeUsada,
        etapa: etapa
    };

    listaMateriais.push(material);

    this.onAtualizarListaMaterial();
   
}

function criarCabecalhoMaterial() {
    var div = document.createElement('div'),
        labelNome = document.createElement('label'),
        bNome = document.createElement('b'),
        labelQtdeUsada = document.createElement('label'),
        bQtdeUsada = document.createElement('b'),
        labelEtapa = document.createElement('label'),
        bEtapa = document.createElement('b'),
        labelExcluir = document.createElement('label'),
        bExcluir = document.createElement('b');

    div.classList.add('itemlista');

    labelNome.innerText = "Nome do material";
    labelQtdeUsada.innerText = "Qtde usada";
    labelEtapa.innerText = "Etapa";
    labelExcluir.innerText = "X";

    bNome.appendChild(labelNome);
    bQtdeUsada.appendChild(labelQtdeUsada);
    bEtapa.appendChild(labelEtapa);
    bExcluir.appendChild(labelExcluir);
    
    div.appendChild(bNome);
    div.appendChild(bQtdeUsada);
    div.appendChild(bEtapa);
    div.appendChild(bExcluir);

    return div;
}

function criarBtnExcluir(id) {
    var label = document.createElement('label'),
        a = document.createElement('a'),
        b = document.createElement('b');
    
    a.href = `#deletar&id=${id}`;
    a.title = 'Excluir',
    a.innerText = 'X';

    b.appendChild(a);

    label.appendChild(b);

    return label;
}

function onDeletarMaterial(id) {

    listaMateriais.forEach(function(record, index) {
        if(record.id === id) {
            listaMateriais.splice(index, 1)

            this.onAtualizarListaMaterial()

            return
        }
    })
}

function onAtualizarListaMaterial() {
    var lista = document.querySelector('#listaMaterial'),
        cabecalho = this.criarCabecalhoMaterial(),
        materiaisInput = document.querySelector('#matValue');

    lista.innerHTML = "";

    materiaisArray = [];
    materiaisInput.value = null;

    lista.appendChild(cabecalho);

    if(listaMateriais.length > 0) {
        listaMateriais.forEach(function(record) {
            var div = document.createElement('div'),
                labelNome = document.createElement('label'),
                labelQtdeUsada = document.createElement('label'),
                labelEtapa = document.createElement('label');


            div.classList.add('itemlista');

            labelNome.innerText = record.nome;
            labelQtdeUsada.innerText = record.qtdeUsada;
            labelEtapa.innerText = record.etapa;

            div.appendChild(labelNome);
            div.appendChild(labelQtdeUsada);
            div.appendChild(labelEtapa);

            var btnExcluir = this.criarBtnExcluir(record.id)
            
            btnExcluir.addEventListener("click", () => {
               this.onDeletarMaterial(record.id)
            })

            div.appendChild(btnExcluir);

            lista.appendChild(div);

            materiaisArray.push(JSON.stringify(record))

        });

        materiaisInput.value = materiaisArray.toString().replaceAll('},', '}\\');

    }

    setTimeout(() => {
        this.limpaRota();
    }, 100);
}

/////////////////////

var listaEtapas = [];
var etapasArray = [];

function onClickSalvarEtapa() {
    var input = document.querySelector('input[name="obs"]'),
        id = input.value.substr(0, input.value.indexOf('-')).trim(),
        nome = input.value,
        tamConcluido = document.querySelector('input[name="tamconc"]').value,
        tamTotal = document.querySelector('input[name="tamtotal"]').value;
    
    var etapa = {
        id: id,
        nome: nome,
        tamConcluido: tamConcluido,
        tamTotal: tamTotal
    };

    listaEtapas.push(etapa);

    this.onAtualizarListaEtapa();
   
}

function criarCabecalhoEtapa() {
    var div = document.createElement('div'),
        labelNome = document.createElement('label'),
        bNome = document.createElement('b'),
        labelTamanhoConcluido = document.createElement('label'),
        bTamanhoConcluido = document.createElement('b'),
        labelTamanhoTotal = document.createElement('label'),
        bTamanhoTotal = document.createElement('b'),
        labelExcluir = document.createElement('label'),
        bExcluir = document.createElement('b');

    div.classList.add('itemlista');

    labelNome.innerText = "Nome da etapa";
    labelTamanhoConcluido.innerText = "Tamanho concluido";
    labelTamanhoTotal.innerText = "Tamanho total";
    labelExcluir.innerText = "X";

    bNome.appendChild(labelNome);
    bTamanhoConcluido.appendChild(labelTamanhoConcluido);
    bTamanhoTotal.appendChild(labelTamanhoTotal);
    bExcluir.appendChild(labelExcluir);
    
    div.appendChild(bNome);
    div.appendChild(bTamanhoConcluido);
    div.appendChild(bTamanhoTotal);
    div.appendChild(bExcluir);

    return div;
}

function onDeletarEtapa(id) {

    listaEtapas.forEach(function(record, index) {
        if(record.id === id) {
            listaEtapas.splice(index, 1)

            this.onAtualizarListaEtapa()

            return
        }
    })
}


function onAtualizarListaEtapa() {
    var lista = document.querySelector('#listaEtapa'),
        cabecalho = this.criarCabecalhoEtapa(),
        etapasInput = document.querySelector('#etpValue');

    lista.innerHTML = "";

    etapasArray = [];
    etapasInput.value = null;

    lista.appendChild(cabecalho);

    if(listaEtapas.length > 0) {
        listaEtapas.forEach(function(record) {
            var div = document.createElement('div'),
                labelNome = document.createElement('label'),
                labelTamConcluido = document.createElement('label'),
                labelTamTotal = document.createElement('label');

            div.classList.add('itemlista');

            labelNome.innerText = record.nome;
            labelTamConcluido.innerText = record.tamConcluido;
            labelTamTotal.innerText = record.tamTotal;

            div.appendChild(labelNome);
            div.appendChild(labelTamConcluido);
            div.appendChild(labelTamTotal);

            var btnExcluir = this.criarBtnExcluir(record.id)
            
            btnExcluir.addEventListener("click", () => {
               this.onDeletarEtapa(record.id)
            })

            div.appendChild(btnExcluir);

            lista.appendChild(div);

            etapasArray.push(JSON.stringify(record))

        });

        etapasInput.value = etapasArray.toString().replaceAll('},', '}\\');

    }

    setTimeout(() => {
        this.limpaRota();
    }, 100);
}

function limpaRota() {
    if(window.location.search.indexOf('id') !== -1) {
        var iddiario = document.querySelector('input[name="iddiario"]').value;

        window.history.pushState({}, document.title, window.location.pathname + '?id=' + iddiario);
    } else {
        window.history.pushState({}, document.title, window.location.pathname);
    }
}