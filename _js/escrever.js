

function limite_textarea(valor) {
    quant = 250;
    total = valor.length;
    if(total <= quant) {
        resto = quant - total;
        document.getElementById('cont').innerHTML = resto;
    } else {
        document.getElementById('texto').value = valor.substr(0,quant);
    }
}
function validar(){
    var titulo = document.getElementById("titulo").value;
    var resumo = document.getElementById("resumo").value;

    if(titulo.length > 60){
        swal("Titulo deve ser menor ou igual que 60 caracteres!","","error");
        return false;
    }
    if(resumo > 250){
        swal("Resumo deve ser menor ou igual que 200 caracteres!","","error");
        return false;
    }
    return true;
}