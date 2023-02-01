function confirmarEliminar(){
  var confirmar = confirm('¿Esta seguro que desea eliminar el libro?');
  if(confirmar){
    return true
  }
  else{
    return false;
  }
}

function confirmarModificar(){
  var confirmar = confirm('¿Esta seguro que desea modificar el libro?');
  if(confirmar){
    return true
  }
  else{
    return false;
  }
}
