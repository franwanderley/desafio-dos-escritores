function isNumber(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}

function validar(){
    var nome = document.getElementById("nome").value;
    var email = document.getElementById("email").value;
   var senha = document.getElementById("senha").value;
    if(isNumber(nome)){
        swal("Nome não pode ser numero!","","error");
        return false;
    }

    if(email.indexOf("@") == -1 || email.indexOf(".") == -1){
		swal("email incorreto","","error");
		return false;
	}

    if(senha.length < 8){
        swal("Senha tem que ser maior que oito letras!","","error");
        return false;
    }
    if(senha.length > 20){
        swal("Senha tem que ser menor que 20 letras!","","error");
        return false;
    }
    if(nome.length < 8){
        swal("Nome tem que ser maior que oito caracteres","","error");
    }
    return true;
}