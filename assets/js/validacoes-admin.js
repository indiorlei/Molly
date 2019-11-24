// // // // // // // // // //
// VALIDAÇÕES FORMS ADMIN /// 
// // // // // // // // // //

function validaFormLoginAdmin(form) {
  var blocoErro = document.querySelector('.bloco-erro');
  var msgErro = document.querySelector('.msg-erro');

  if (form.adminLoginUsuario.value == "" || form.adminLoginUsuario.value == null) {
    blocoErro.style.display = 'block';
    msgErro.textContent = 'Por favor, indique o Usuário.';
    form.adminLoginUsuario.focus();
    form.adminLoginUsuario.classList.add('form-error');
    return false;
  } else {
    blocoErro.style.display = 'none';
    form.adminLoginUsuario.classList.remove('form-error');
  }

  if (form.adminLoginSenha.value == "" || form.adminLoginSenha.value == null) {
    blocoErro.style.display = 'block';
    msgErro.textContent = 'Por favor, indique a Senha.';
    form.adminLoginSenha.focus();
    form.adminLoginSenha.classList.add('form-error');
    return false;
  } else {
    blocoErro.style.display = 'none';
    form.adminLoginSenha.classList.remove('form-error');
  }

}

function validaFormMotofretistas(form) {
  var blocoErro = document.querySelector('.bloco-erro');
  var msgErro = document.querySelector('.msg-erro');

  if (form.nome.value == "" || form.nome.value == null) {
    blocoErro.style.display = 'block';
    msgErro.textContent = 'Por favor, indique o Nome.';
    form.nome.focus();
    form.nome.classList.add('form-error');
    return false;
  } else {
    blocoErro.style.display = 'none';
    form.nome.classList.remove('form-error');
  }

  if (form.cpf.value == "" || form.cpf.value == null) {
    blocoErro.style.display = 'block';
    msgErro.textContent = 'Por favor, indique o CPF.';
    form.cpf.focus();
    form.cpf.classList.add('form-error');
    return false;
  } else {
    blocoErro.style.display = 'none';
    form.cpf.classList.remove('form-error');
  }


  //
  // validar CPF
  //


  if (form.placa.value == "" || form.placa.value == null) {
    blocoErro.style.display = 'block';
    msgErro.textContent = 'Por favor, indique o Placa.';
    form.placa.focus();
    form.placa.classList.add('form-error');
    return false;
  } else {
    blocoErro.style.display = 'none';
    form.placa.classList.remove('form-error');
  }

  if (form.bauleto.value == "" || form.bauleto.value == null || form.bauleto.value == 0) {
    blocoErro.style.display = 'block';
    msgErro.textContent = 'Por favor, indique o Bauleto.';
    form.bauleto.focus();
    form.bauleto.classList.add('form-error');
    return false;
  } else {
    blocoErro.style.display = 'none';
    form.bauleto.classList.remove('form-error');
  }

}

function validaFormBauletos(form) {
  var blocoErro = document.querySelector('.bloco-erro');
  var msgErro = document.querySelector('.msg-erro');

  if (form.modelo.value == "" || form.modelo.value == null) {
    blocoErro.style.display = 'block';
    msgErro.textContent = 'Por favor, indique o Modelo.';
    form.modelo.focus();
    form.modelo.classList.add('form-error');
    return false;
  } else {
    blocoErro.style.display = 'none';
    form.modelo.classList.remove('form-error');
  }

  if (form.volume.value == "" || form.volume.value == null) {
    blocoErro.style.display = 'block';
    msgErro.textContent = 'Por favor, indique o Volume.';
    form.volume.focus();
    form.volume.classList.add('form-error');
    return false;
  } else {
    blocoErro.style.display = 'none';
    form.volume.classList.remove('form-error');
  }

  if (form.altura.value == "" || form.altura.value == null) {
    blocoErro.style.display = 'block';
    msgErro.textContent = 'Por favor, indique o Altura.';
    form.altura.focus();
    form.altura.classList.add('form-error');
    return false;
  } else {
    blocoErro.style.display = 'none';
    form.altura.classList.remove('form-error');
  }

  if (form.largura.value == "" || form.largura.value == null) {
    blocoErro.style.display = 'block';
    msgErro.textContent = 'Por favor, indique o Largura.';
    form.largura.focus();
    form.largura.classList.add('form-error');
    return false;
  } else {
    blocoErro.style.display = 'none';
    form.largura.classList.remove('form-error');
  }

  if (form.profundidade.value == "" || form.profundidade.value == null) {
    blocoErro.style.display = 'block';
    msgErro.textContent = 'Por favor, indique o Profundidade.';
    form.profundidade.focus();
    form.profundidade.classList.add('form-error');
    return false;
  } else {
    blocoErro.style.display = 'none';
    form.profundidade.classList.remove('form-error');
  }

}

function validaFormStatus(form) {
  var blocoErro = document.querySelector('.bloco-erro');
  var msgErro = document.querySelector('.msg-erro');

  if (form.status.value == "" || form.status.value == null) {
    blocoErro.style.display = 'block';
    msgErro.textContent = 'Por favor, indique o Status.';
    form.status.focus();
    form.status.classList.add('form-error');
    return false;
  } else {
    blocoErro.style.display = 'none';
    form.status.classList.remove('form-error');
  }

}