<?php
/* Template Name: Página de Contato */
get_header();
?>

<section class="contato-exclusivo">
  <div class="container-contato">
    <div class="formulario-contato">
      <h2>Fale Conosco</h2>
      <form>
        <input type="text" placeholder="Nome" required>
        <input type="email" placeholder="E-mail" required>
        <input type="tel" placeholder="Telefone">
        <input type="text" placeholder="Nº do pedido">
        <textarea placeholder="Mensagem" required></textarea>
        <button type="submit">Enviar</button>
      </form>
    </div>

    <div class="info-contato">
      <h3>Fantasia CKS Cosmeticos</h3>
      <p><strong>CNPJ:</strong> 22181136000188</p>
      <p><strong>Telefone:</strong> (21) 96453-1822</p>
      <p><strong>Whatsapp:</strong> <a href="https://wa.me/5521964531822" target="_blank">(21) 96453-1822</a></p>
      <p><strong>Endereço:</strong> Realengo</p>
      <p><strong>Email:</strong> algumemail</p>

      <div class="redes-sociais">
        <a href="https://wa.me/5521964531822" target="_blank" class="whatsapp">
          <i class="fab fa-whatsapp"></i> WhatsApp
        </a>
        <a href="https://instagram.com/seuusuario" target="_blank" class="instagram">
          <i class="fab fa-instagram"></i> Instagram
        </a>
      </div>

      <!-- Google Maps -->
      <div class="mapa">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3675.899420047181!2d-43.4197431!3d-22.8801736!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9961fd1d0b1387%3A0x9adab99f6d9cd9ce!2sCKS%20Cosm%C3%A9ticos!5e0!3m2!1spt-BR!2sbr!4v1751073926272!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
      
          width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
