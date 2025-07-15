<style>
    body {
      background-color: #f4f4f4;
      background-image: url('assets/img/403-art.jpg'); /* Coloque uma imagem artística suave e opaca */
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      font-family: 'Helvetica Neue', sans-serif;
    }

    .overlay {
      background-color: rgba(255, 255, 255, 0.92);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem;
      text-align: center;
      flex-direction: column;
    }

    .code {
      font-size: 6rem;
      font-weight: bold;
      color: #222;
    }

    .message {
      font-size: 1.5rem;
      color: #444;
      max-width: 600px;
      margin: 1rem auto;
    }

    .home-button {
      margin-top: 2rem;
    }

    @media (max-width: 640px) {
      .code {
        font-size: 4rem;
      }

      .message {
        font-size: 1.2rem;
      }
    }
</style>

<section>
    <div class="overlay">
        <div class="code">401</div>
        <div class="message">
        <p><strong>Acesso Negado.</strong></p>
        <p>Você não tem permissão para visualizar esta página. Por favor, verifique suas credenciais ou volte à página inicial.</p>
        </div>
        <div class="home-button">
        <a href="index.php" class="uk-button uk-button-default uk-button-large">Voltar ao Início</a>
        </div>
    </div>

</section>