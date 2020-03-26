$("#confirm").click(function(){
  var bool=confirm("¿Está seguro de eliminar el registro?");
  if(bool){
    alert("Se elimino correctamente");
    return true;
  }else{
    alert("Solicitud cancelada");
    return false;
  }
});

