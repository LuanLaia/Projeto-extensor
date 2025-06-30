function showForm(type) {
    // Remove a classe "active" dos dois formulários
    document.getElementById("form-usuario").classList.remove("active");
    document.getElementById("form-empresa").classList.remove("active");

    // Remove a classe "active" dos dois botões
    document.getElementById("usuarioBtn").classList.remove("active");
    document.getElementById("empresaBtn").classList.remove("active");

    // Verifica se o tipo é "usuario"
    if (type === "usuario") {
        // Ativa o formulário e o botão do usuário
        document.getElementById("form-usuario").classList.add("active");
        document.getElementById("usuarioBtn").classList.add("active");
    } else {
        // Ativa o formulário e o botão da empresa
        document.getElementById("form-empresa").classList.add("active");
        document.getElementById("empresaBtn").classList.add("active");
    }
}