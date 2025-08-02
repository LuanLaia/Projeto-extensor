<footer>
    <div class="footer-text">
        &copy; 2025 Emprega Muriaé. Todos os direitos reservados.
    </div>
    <div class="social-links">
        <a href="#">Instagram</a>
        <a href="#">LinkedIn</a>
        <a href="#">Twitter</a>
    </div>
</footer>
<Style>

/* --- Rodapé --- */
footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 1.5rem 5%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: rgba(0, 0, 0, 0.4);
    /* Efeito de vidro para navegadores modernos */
    -webkit-backdrop-filter: blur(5px);
    backdrop-filter: blur(5px); 
    z-index: 10;
}

.footer-text {
    font-size: 0.9rem;
    color: #ccc;
}

.social-links a {
    color: #ccc;
    text-decoration: none;
    margin-left: 1.5rem;
    font-weight: 400;
    transition: color 0.3s ease, transform 0.3s ease;
}

.social-links a:hover {
    color: #fff;
    transform: scale(1.1);
}
</Style>