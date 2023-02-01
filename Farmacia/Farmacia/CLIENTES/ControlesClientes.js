function controlLetras(e){
    
        var key = e.keyCode || e.which,
          tecla = String.fromCharCode(key).toLowerCase(),
          letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
          especiales = [8, 37, 39, 46],
          tecla_especial = false;
    
        for (var i in especiales) {
          if (key == especiales[i]) {
            tecla_especial = true;
            break;
          }
        }
    
        if (letras.indexOf(tecla) == -1 && !tecla_especial) {
          return false;
        }
    }


function controlNumeros(){
    
}

function controlVacio(){
    document.getElementById("btnguardar").disabled = !document.getElementById("cedula").value.length;
   



}



function validarcedula()
{
	var ced = document.getElementById('cedula').value;
    let [suma, mul, index] = [0, 1, ced.length];
    while (index--) {
      let num = ced[index] * mul;
      suma += num - (num > 9) * 9;
      mul = 1 << index % 2;
    }

if ((suma % 10 === 0) && (suma > 0)) {
	alert("Cedula valida !!");
} else {
	alert("Cedula No valida !!");
    document.getElementById("cedula").value = "";
    document.getElementById("cedula").focus();
	
}

}



