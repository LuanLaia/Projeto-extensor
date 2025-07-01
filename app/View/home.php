<?php 
    use Core\Library\Session;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Descubra Muriaé - Vagas de Emprego</title>
  <link rel="stylesheet" href="<?= baseUrl() ?>assets/css/stylehome.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
</head>
<body>


  <section class="hero">
    <div class="hero-content">
      <h2>Conectando talentos com oportunidades em Muriaé</h2>
      <p>Descubra vagas, aprenda, cresça e encontre seu lugar no mercado.</p>
      <?php if (Session::get("userId")): ?>
        <a class="btn" href="<?= baseUrl() ?>Vagas">Buscar Vagas</a>
      <?php else: ?>
        <a class="btn" href="<?= baseUrl() ?>Login">Buscar Vagas</a>
      <?php endif; ?>
      <div class="mensagem-incentivo">
        <h3>🚀 Encontre o seu próximo desafio!</h3>
        <p>Explore novas oportunidades, descubra seu potencial e conquiste sua carreira dos sonhos com o Descubra Muriaé.</p>
      </div>
    </div>
  </section>


  <section class="artigos">
    <div class="container">
      <h2 class="titulo-secao">🧠 Artigos sobre Bem-Estar no Trabalho</h2>
      <div class="cards">
        <div class="card">
          <h3>💡 A Importância do Bem-Estar no Trabalho</h3>
          <p>Colaboradores felizes são mais produtivos. Incentivar pausas, escuta ativa e ambiente saudável reduz o estresse e melhora o desempenho.</p>
        </div>
        <div class="card">
          <h3>🧘‍♂️ Alongamentos Durante Longas Jornadas</h3>
          <p>Levantar, alongar pescoço, costas e punhos a cada 1 hora evita dores e aumenta a circulação. Seu corpo agradece!</p>
        </div>
        <div class="card">
          <h3>🧘‍♀️ Saúde Mental e Produtividade</h3>
          <p>Reconhecer limites, cuidar da mente e ter equilíbrio emocional ajudam a manter foco e energia durante o expediente.</p>
        </div>
      </div>
    </div>
  </section>


  <section class="avaliacoes">
    <div class="container">
      <h2 class="titulo-secao">📈 Avaliações de Empresas no Descubra Muriaé</h2>
      <div class="avaliacao-conteudo">
        <div class="avaliacao-texto">
          <h3>O Descubra Muriaé te ajuda a encontrar um emprego melhor</h3>
          <p>Veja o que os colaboradores opinam sobre uma empresa.</p>
          <p>Acesse mais de 14 milhões de opiniões e avaliações de empresas compartilhadas pelos próprios colaboradores e ex-colaboradores.</p>
          <p>Prepare-se com segurança para as entrevistas: veja as perguntas que podem ser feitas e analise as avaliações realizadas por participantes de processos seletivos anteriores.</p>
        </div>
        <div class="avaliacao-imagem">
          <img src="<?= baseUrl() ?>assets/img/avaliacao.jpeg" alt="Sistema de Avaliação" />
        </div>
      </div>
    </div>
  </section>

</body>
</html>
