function verificarCPF(c){
	c = c.replace(/[^\d]+/g,'');
	if (c != "") {
	if (c.length != 11 || 
	        c == "00000000000" || 
	        c == "11111111111" || 
	        c == "22222222222" || 
	        c == "33333333333" || 
	        c == "44444444444" || 
	        c == "55555555555" || 
	        c == "66666666666" || 
	        c == "77777777777" || 
	        c == "88888888888" || 
	        c == "99999999999"){
				document.getElementById('cpf').value='';
				alert("CPF invalido")
	            return false;
	}
    var i;
    s = c;
    var c = s.substr(0,9);
    var dv = s.substr(9,2);
    var d1 = 0;
    var v = false;
 
    for (i = 0; i < 9; i++){
        d1 += c.charAt(i)*(10-i);
    }
    if (d1 == 0){
    	document.getElementById('cpf').value='';
        alert("CPF Inválido")
        v = true;
        return false;
    }
    d1 = 11 - (d1 % 11);
    if (d1 > 9) d1 = 0;
    if (dv.charAt(0) != d1){
    	document.getElementById('cpf').value='';
        alert("CPF Inválido")
        v = true;
        return false;
    }
 
    d1 *= 2;
    for (i = 0; i < 9; i++){
        d1 += c.charAt(i)*(11-i);
    }
    d1 = 11 - (d1 % 11);
    if (d1 > 9) d1 = 0;
    if (dv.charAt(1) != d1){
    	document.getElementById('cpf').value='';
        alert("CPF Inválido")
        v = true;
        return false;
    }
    if (!v) {
       // alert(c + "nCPF Válido")
    }
}
}