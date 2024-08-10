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