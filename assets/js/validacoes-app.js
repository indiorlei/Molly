// // // // // // // // //
// VALIDAÇÕES FORMS APP //
// // // // // // // // //

function validaFormNovoPedido(form) {
  if (form.enderecoRetirada.value == "" || form.enderecoRetirada.value == null) {
    alert("Por favor, indique o Endereço de Retirada.");
    form.enderecoRetirada.focus();
    form.enderecoRetirada.classList.add('form-error');
    return false;
  } else {
    form.enderecoRetirada.classList.remove('form-error');
  }

  if (form.enderecoDestino.value == "" || form.enderecoDestino.value == null) {
    alert("Por favor, indique o Endereço de Destino.");
    form.enderecoDestino.focus();
    form.enderecoDestino.classList.add('form-error');
    return false;
  } else {
    form.enderecoDestino.classList.remove('form-error');
  }

}

// APP PERFIL - VALIDAR SENHA
function validaFormPerfilSenha(form) {
  if (form.senha.value == "" || form.senha.value == null) {
    alert("Por favor, digite a nova senha.");
    form.senha.focus();
    form.senha.classList.add('form-error');
    return false;
  } else {
    form.senha.classList.remove('form-error');
  }

  if (form.repetirSenha.value == "" || form.repetirSenha.value == null) {
    alert("Por favor, repita a senha");
    form.repetirSenha.focus();
    form.repetirSenha.classList.add('form-error');
    return false;
  } else {
    form.repetirSenha.classList.remove('form-error');
  }

  if (form.senha.value != form.repetirSenha.value) {
    alert("as senhas nao coincidem, digite novamente");
    form.repetirSenha.focus();
    form.repetirSenha.classList.add('form-error');
    return false;
  } else {
    form.repetirSenha.classList.remove('form-error');
  }

}