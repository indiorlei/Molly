// // // // // // // // // //
// VALIDAÇÕES FORMS ADMIN /// 
// // // // // // // // // //

function validaFormMotofretistas(form) {
  if (form.nome.value == "" || form.nome.value == null) {
    alert("Por favor, indique o Nome.");
    form.nome.focus();
    form.nome.classList.add('form-error');
    return false;
  } else {
    form.nome.classList.remove('form-error');
  }

  if (form.cpf.value == "" || form.cpf.value == null) {
    alert("Por favor, indique o CPF.");
    form.cpf.focus();
    form.cpf.classList.add('form-error');
    return false;
  } else {
    form.cpf.classList.remove('form-error');
  }

  // validar CPF

  if (form.placa.value == "" || form.placa.value == null) {
    alert("Por favor, indique o placa.");
    form.placa.focus();
    form.placa.classList.add('form-error');
    return false;
  } else {
    form.placa.classList.remove('form-error');
  }

  if (form.bauleto.value == "" || form.bauleto.value == null || form.bauleto.value == 0) {
    alert("Por favor, indique o bauleto.");
    form.bauleto.focus();
    form.bauleto.classList.add('form-error');
    return false;
  } else {
    form.bauleto.classList.remove('form-error');
  }

}

function validaFormBauletos(form) {
  if (form.modelo.value == "" || form.modelo.value == null) {
    alert("Por favor, indique o modelo.");
    form.modelo.focus();
    form.modelo.classList.add('form-error');
    return false;
  } else {
    form.modelo.classList.remove('form-error');
  }

  if (form.volume.value == "" || form.volume.value == null) {
    alert("Por favor, indique o volume.");
    form.volume.focus();
    form.volume.classList.add('form-error');
    return false;
  } else {
    form.volume.classList.remove('form-error');
  }

  if (form.altura.value == "" || form.altura.value == null) {
    alert("Por favor, indique a altura.");
    form.altura.focus();
    form.altura.classList.add('form-error');
    return false;
  } else {
    form.altura.classList.remove('form-error');
  }

  if (form.largura.value == "" || form.largura.value == null) {
    alert("Por favor, indique a largura.");
    form.largura.focus();
    form.largura.classList.add('form-error');
    return false;
  } else {
    form.largura.classList.remove('form-error');
  }

  if (form.profundidade.value == "" || form.profundidade.value == null) {
    alert("Por favor, indique a profundidade.");
    form.profundidade.focus();
    form.profundidade.classList.add('form-error');
    return false;
  } else {
    form.profundidade.classList.remove('form-error');
  }

}

function validaFormStatus(form) {
  if (form.status.value == "" || form.status.value == null) {
    alert("Por favor, indique o Status.");
    form.status.focus();
    form.status.classList.add('form-error');
    return false;
  } else {
    form.status.classList.remove('form-error');
  }
}