// // // // // // // // //
// VALIDAÇÕES FORMS APP //
// // // // // // // // //

function validaFormLoginAPP(form) {
  var blocoErro = document.querySelector('.bloco-erro');
  var msgErro = document.querySelector('.msg-erro');

  if (form.usuarioEmail.value == "" || form.usuarioEmail.value == null) {
    blocoErro.style.display = 'block';
    msgErro.textContent = 'Por favor, indique seu Usuário.';
    form.usuarioEmail.focus();
    form.usuarioEmail.classList.add('form-error');
    return false;
  } else {
    blocoErro.style.display = 'none';
    form.usuarioEmail.classList.remove('form-error');
  }

  if (form.usuarioSenha.value == "" || form.usuarioSenha.value == null) {
    blocoErro.style.display = 'block';
    msgErro.textContent = 'Por favor, Digite sua Senha';
    form.usuarioSenha.focus();
    form.usuarioSenha.classList.add('form-error');
    return false;
  } else {
    blocoErro.style.display = 'none';
    form.usuarioSenha.classList.remove('form-error');
  }

}

function validaFormCadastro(form) {
  var blocoErro = document.querySelector('.bloco-erro');
  var msgErro = document.querySelector('.msg-erro');

  if (form.nome.value == "" || form.nome.value == null) {
    blocoErro.style.display = 'block';
    msgErro.textContent = 'Digite seu Nome';
    form.nome.focus();
    form.nome.classList.add('form-error');
    return false;
  } else {
    blocoErro.style.display = 'none';
    form.nome.classList.remove('form-error');
  }

  if (form.sobrenome.value == "" || form.sobrenome.value == null) {
    blocoErro.style.display = 'block';
    msgErro.textContent = 'digite seu Sobrenome';
    form.sobrenome.focus();
    form.sobrenome.classList.add('form-error');
    return false;
  } else {
    blocoErro.style.display = 'none';
    form.sobrenome.classList.remove('form-error');
  }

  if (form.cpf.value == "" || form.cpf.value == null) {
    blocoErro.style.display = 'block';
    msgErro.textContent = 'Digite seu CPF';
    form.cpf.focus();
    form.cpf.classList.add('form-error');
    return false;
  } else {
    blocoErro.style.display = 'none';
    form.cpf.classList.remove('form-error');
  }

  if (form.email.value == "" || form.email.value == null) {
    blocoErro.style.display = 'block';
    msgErro.textContent = 'Digite seu Email';
    form.email.focus();
    form.email.classList.add('form-error');
    return false;
  } else {
    blocoErro.style.display = 'none';
    form.email.classList.remove('form-error');
  }

  if (form.senha.value == "" || form.senha.value == null) {
    blocoErro.style.display = 'block';
    msgErro.textContent = 'Digite sua senha';
    form.senha.focus();
    form.senha.classList.add('form-error');
    return false;
  } else {
    blocoErro.style.display = 'none';
    form.senha.classList.remove('form-error');
  }

  if (form.repetirSenha.value == "" || form.repetirSenha.value == null) {
    blocoErro.style.display = 'block';
    msgErro.textContent = 'Digite novamente sua Senha';
    form.repetirSenha.focus();
    form.repetirSenha.classList.add('form-error');
    return false;
  } else {
    form.repetirSenha.classList.remove('form-error');
  }

  if (form.senha.value != form.repetirSenha.value) {
    blocoErro.style.display = 'block';
    msgErro.textContent = 'As senhas não coincidem, digite novamente';
    form.senha.focus();
    form.senha.classList.add('form-error');
    form.repetirSenha.classList.add('form-error');
    return false;
  } else {
    blocoErro.style.display = 'none';
    form.senha.classList.remove('form-error');
    form.repetirSenha.classList.remove('form-error');
  }

}

function validaFormNovoPedido(form) {
  var blocoErro = document.querySelector('.bloco-erro');
  var msgErro = document.querySelector('.msg-erro');

  if (form.enderecoRetirada.value == "" || form.enderecoRetirada.value == null) {
    blocoErro.style.display = 'block';
    msgErro.textContent = 'Indique o Endereço de Retirada.';
    form.enderecoRetirada.focus();
    form.enderecoRetirada.classList.add('form-error');
    return false;
  } else {
    blocoErro.style.display = 'none';
    form.enderecoRetirada.classList.remove('form-error');
  }

  if (form.enderecoDestino.value == "" || form.enderecoDestino.value == null) {
    blocoErro.style.display = 'block';
    msgErro.textContent = 'Indique o Endereço de Destino.';
    form.enderecoDestino.focus();
    form.enderecoDestino.classList.add('form-error');
    return false;
  } else {
    blocoErro.style.display = 'none';
    form.enderecoDestino.classList.remove('form-error');
  }

}

// APP PERFIL - VALIDAR SENHA
function validaFormPerfilInfo(form) {
  var blocoErro = document.querySelector('.bloco-erro');
  var msgErro = document.querySelector('.msg-erro');
  var blocoSuccess = document.querySelector('.bloco-success');

  if (form.nome.value == "" || form.nome.value == null) {
    blocoErro.style.display = 'block';
    blocoSuccess.style.display = 'none';
    msgErro.textContent = 'Digite seu Nome';
    form.nome.focus();
    form.nome.classList.add('form-error');
    return false;
  } else {
    blocoErro.style.display = 'none';
    form.nome.classList.remove('form-error');
  }

  if (form.sobrenome.value == "" || form.sobrenome.value == null) {
    blocoErro.style.display = 'block';
    blocoSuccess.style.display = 'none';
    msgErro.textContent = 'digite seu Sobrenome';
    form.sobrenome.focus();
    form.sobrenome.classList.add('form-error');
    return false;
  } else {
    blocoErro.style.display = 'none';
    form.sobrenome.classList.remove('form-error');
  }

  if (form.cpf.value == "" || form.cpf.value == null) {
    blocoErro.style.display = 'block';
    blocoSuccess.style.display = 'none';
    msgErro.textContent = 'Digite seu CPF';
    form.cpf.focus();
    form.cpf.classList.add('form-error');
    return false;
  } else {
    blocoErro.style.display = 'none';
    form.cpf.classList.remove('form-error');
  }

  if (form.email.value == "" || form.email.value == null) {
    blocoErro.style.display = 'block';
    blocoSuccess.style.display = 'none';
    msgErro.textContent = 'Digite seu Email';
    form.email.focus();
    form.email.classList.add('form-error');
    return false;
  } else {
    blocoErro.style.display = 'none';
    form.email.classList.remove('form-error');
  }

}

function validaFormPerfilSenha(form) {
  var blocoErro = document.querySelector('.bloco-erro__senha');
  var msgErro = document.querySelector('.msg-erro__senha');

  if (form.senha.value == "" || form.senha.value == null) {
    blocoErro.style.display = 'block';
    msgErro.textContent = 'Digite a nova senha';
    form.senha.focus();
    form.senha.classList.add('form-error');
    return false;
  } else {
    blocoErro.style.display = 'none';
    form.senha.classList.remove('form-error');
  }

  if (form.repetirSenha.value == "" || form.repetirSenha.value == null) {
    blocoErro.style.display = 'block';
    msgErro.textContent = 'Digite novamente sua nova Senha';
    form.repetirSenha.focus();
    form.repetirSenha.classList.add('form-error');
    return false;
  } else {
    blocoErro.style.display = 'none';
    form.repetirSenha.classList.remove('form-error');
  }

  if (form.senha.value != form.repetirSenha.value) {
    blocoErro.style.display = 'block';
    msgErro.textContent = 'As senhas não coincidem, digite novamente';
    form.senha.focus();
    form.senha.classList.add('form-error');
    form.repetirSenha.classList.add('form-error');
    return false;
  } else {
    blocoErro.style.display = 'none';
    form.senha.classList.remove('form-error');
    form.repetirSenha.classList.remove('form-error');
  }

}