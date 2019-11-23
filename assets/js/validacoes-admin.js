// // // // // // // // // //
// VALIDAÇÕES FORMS ADMIN /// 
// // // // // // // // // //

function validaForm(form) {
  if (form.enderecoRetirada.value == "" || form.enderecoRetirada.value == null) {
    alert("Por favor, indique o Endereço de Retirada.");
    form.enderecoRetirada.focus();
    return false;
  }
}