function showForm(type) {
    document.getElementById('form-usuario').classList.remove('active');
    document.getElementById('form-empresa').classList.remove('active');
    document.getElementById('usuarioBtn').classList.remove('active');
    document.getElementById('empresaBtn').classList.remove('active');

    if (type === 'usuario') {
        document.getElementById('form-usuario').classList.add('active');
        document.getElementById('usuarioBtn').classList.add('active');
    } else {
        document.getElementById('form-empresa').classList.add('active');
        document.getElementById('empresaBtn').classList.add('active');
    }
}