<?php get_header(); ?>

<div class="container mt-5 mb-5"> <h2 class="text-center mb-5" style="color: #a020f0;">Todos os Nossos Produtos</h2> <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4"> <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="col mb-4"> <div class="produto h-100"> <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('medium'); ?>
          </a>
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <?php 
            $preco = get_field('preco'); // Supondo que 'preco' é um campo personalizado
            if ($preco) : ?>
              <p class="produto-preco">Preço: R$ <?php echo esc_html($preco); ?></p>
          <?php else : ?>
              <p class="produto-preco">Preço sob consulta</p>
          <?php endif; ?>
        </div>
      </div>
    <?php endwhile; else : ?>
      <p class="col-12 text-center">Não há produtos cadastrados ainda.</p>
    <?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>