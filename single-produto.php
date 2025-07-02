<?php get_header(); ?>

<section class="container produto-single-page">
  <div class="produto-detalhes">
    <h1><?php the_title(); ?></h1>
    
    <div class="conteudo-principal-produto">
      <?php if (has_post_thumbnail()) : ?>
        <div class="produto-imagem">
          <?php the_post_thumbnail('large'); ?>
        </div>
      <?php endif; ?>

      <div class="produto-descricao-info">
        <div class="produto-descricao">
          <?php the_content(); ?>
        </div>

        <?php 
          $preco = get_field('preco');
          if ($preco) {
            echo '<p class="produto-preco-display">Preço: R$ ' . esc_html($preco) . '</p>';
          }
        ?>
      </div>
    </div>

    <a class="whatsapp-contato-single" href="https://wa.me/5521964531822?text=Olá! Tenho interesse no produto <?php echo urlencode(get_the_title()); ?>" target="_blank">
      Falar com o Vendedor no WhatsApp
    </a>
  </div>
</section>

<?php get_footer(); ?>