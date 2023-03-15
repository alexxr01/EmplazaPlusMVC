function formularioValidacion() {
  let x = document.forms["formulario"]["usuario"].value;
  if (x == "") {
    alert("El nombre no puede estar vacio.");
    return false;
  }
}