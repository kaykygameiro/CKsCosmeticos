<?php get_header(); ?>

<!-- Hero Section -->
<section id="inicio" class="hero">
  <h2>Beleza começa com cuidados</h2>
  <p>Produtos profissionais para todos os tipos de cabelo</p>
</section>

<!-- Sobre a Empresa -->
<section id="sobre">
  <div class="container">
    <h2>Sobre a CKS</h2>
    <p>Somos uma empresa especializada em produtos capilares que promovem beleza, saúde e confiança. Nosso compromisso é com a qualidade e a satisfação dos nossos clientes.</p>
  </div>
</section>

<!-- Lista de Produtos -->
<section id="produtos">
  <div class="container">
    <h2>Nossos Produtos</h2>
    <div class="produtos-grid">

      <?php
      $query = new WP_Query(array(
        'post_type' => 'produto',
        'posts_per_page' => 9
      ));

      if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>
        
 <div class="produto">
            <a href="<?php the_permalink(); ?>">
              <?php if (has_post_thumbnail()) : ?>
                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
              <?php endif; ?>
            </a>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php if (get_field('preco')) : ?>
              <p class="produto-preco">Preço: R$ <?php the_field('preco'); ?></p>
            <?php else : ?>
              <p class="produto-preco">Preço sob consulta</p>
            <?php endif; ?>
          </div>

        <?php endwhile;
        wp_reset_postdata();
      else :
        echo '<p>Não há produtos cadastrados ainda.</p>';
      endif;
      ?>

    </div>
  </div>
</section>

<!-- Redes Sociais -->
<div class="redes-sociais">
  <a href="https://wa.me/5521964531822" target="_blank" class="whatsapp">
    <i class="fab fa-whatsapp"></i> WhatsApp
  </a>
  <a href="https://instagram.com/seuusuario" target="_blank" class="instagram">
    <i class="fab fa-instagram"></i> Instagram
  </a>
</div>

<?php get_footer(); ?>
