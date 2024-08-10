var cont1 = document.getElementById('parte1');
var cont2 = document.getElementById('parte2');
var cont3 = document.getElementById('parte3');

var titulo1 = document.getElementById('titulo1');
var titulo2 = document.getElementById('titulo2');
var titulo3 = document.getElementById('titulo3');

var btnSalvar = document.getElementById('btnSalvar');
var btnEditar = document.getElementById('btnEditar');

var contClick = 0;

function onClickAvancar() {
    
    switch(contClick) {
        case 0: {
            contClick+=1;
            ativaCont2();
            break;
        }
        case 1: {
            contClick+=1;
            ativaCont3();
            break;
        }
        default: {
            break;
        }
    }
}

function onClickVoltar() {
    
    switch(contClick) {
        case 1: {
            contClick-=1;
            ativaCont1();
            break;
        }
        case 2: {
            contClick-=1;
            ativaCont2();
            break;
        }
        default: {
            break;
        }
    }
}

function ativaCont1() {
    cont1.classList.remove('isHidden');
    cont2.classList.add('isHidden');
    cont3.classList.add('isHidden');

    titulo1.classList.add('isActive');
    titulo2.classList.remove('isActive');
    titulo3.classList.remove('isActive');

    btnEditar.classList.remove('isHidden');
    btnSalvar.classList.add('isHidden');
}

function ativaCont2() {
    cont2.classList.remove('isHidden');
    cont1.classList.add('isHidden');
    cont3.classList.add('isHidden');

    titulo2.classList.add('isActive');
    titulo1.classList.remove('isActive');
    titulo3.classList.remove('isActive');

    btnEditar.classList.remove('isHidden');
    btnSalvar.classList.add('isHidden');
}

function ativaCont3() {
    cont3.classList.remove('isHidden');
    cont2.classList.add('isHidden');
    cont1.classList.add('isHidden');

    titulo3.classList.add('isActive');
    titulo2.classList.remove('isActive');
    titulo1.classList.remove('isActive');

    btnEditar.classList.add('isHidden');
    btnSalvar.classList.remove('isHidden');
}

function calculaDias() {
    var now = new Date();
    var past =  new Date(document.getElementById('dataIni').value);

    if(past > now) {
        document.getElementById('qtdeDias').value = 0;
    } else {
        var diff = Math.abs(now.getTime() - past.getTime());
        var days = Math.ceil(diff / (1000 * 60 * 60 * 24));

        document.getElementById('qtdeDias').value = days;
    }  
}
