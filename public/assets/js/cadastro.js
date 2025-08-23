function showForm(tipo) {
  const usuarioForm = document.getElementById('form-usuario');
  const empresaForm = document.getElementById('form-empresa');
  const usuarioBtn = document.getElementById('usuarioBtn');
  const empresaBtn = document.getElementById('empresaBtn');

  // Remove classes de active
  usuarioForm.classList.remove('active');
  empresaForm.classList.remove('active');
  usuarioBtn.classList.remove('active');
  empresaBtn.classList.remove('active');

  // Força reflow (para que o browser reconheça a troca antes de aplicar o novo active)
  void usuarioForm.offsetWidth;

  if (tipo === 'usuario') {
    usuarioForm.classList.add('active');
    usuarioBtn.classList.add('active');
  } else {
    empresaForm.classList.add('active');
    empresaBtn.classList.add('active');
  }
}
