var cont1 = document.getElementById('parte1');
var cont2 = document.getElementById('parte2');

var form = document.getElementById('form1');

var contClick = 0;

function onClickAvancar() {
    
    switch(contClick) {
        case 0: {
            contClick+=1;
            ativaCont2();
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
        default: {
            break;
        }
    }
}

function ativaCont1() {
    cont1.classList.remove('isHidden');
    form.classList.remove('isHidden');
    cont2.classList.add('isHidden');
}

function ativaCont2() {
    cont2.classList.remove('isHidden');
    form.classList.remove('isHidden');
    cont1.classList.add('isHidden');
}



