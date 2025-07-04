<?php
/*
Template Name: Todos os Produtos
*/
get_header(); ?>

<!-- Breadcrumb -->
<section class="breadcrumb-section">
  <div class="container">
    <div class="breadcrumb">
      <a href="<?php echo home_url(); ?>">Início</a>
      <span class="breadcrumb-separator">/</span>
      <span class="breadcrumb-current">Todos os Produtos</span>
    </div>
  </div>
</section>

<!-- Hero Section da Página de Produtos -->
<section class="hero-produtos">
  <div class="container">
    <h1>Todos os Nossos Produtos</h1>
    <p>Descubra nossa linha completa de produtos profissionais para cuidados capilares</p>
  </div>
</section>

<!-- Filtros de Produtos -->
<section class="produtos-filtros">
  <div class="container">
    <div class="filtros-header">
      <h3>Filtrar Produtos</h3>
      <div class="filtros-controles">
        <select id="filtro-categoria" class="filtro-select">
          <option value="">Todas as Categorias</option>
          <option value="shampoo">Shampoos</option>
          <option value="condicionador">Condicionadores</option>
          <option value="mascara">Máscaras</option>
          <option value="tratamento">Tratamentos</option>
          <option value="finalizador">Finalizadores</option>
        </select>
        
        <select id="filtro-preco" class="filtro-select">
          <option value="">Todos os Preços</option>
          <option value="0-50">R$ 0 - R$ 50</option>
          <option value="50-100">R$ 50 - R$ 100</option>
          <option value="100-200">R$ 100 - R$ 200</option>
          <option value="200+">Acima de R$ 200</option>
        </select>
        
        <button id="limpar-filtros" class="btn-limpar">Limpar Filtros</button>
      </div>
    </div>
  </div>
</section>

<!-- Lista de Produtos -->
<section id="produtos-page" class="produtos-archive">
  <div class="container">
    <!-- Contador de Produtos -->
    <div class="produtos-info">
      <div class="produtos-count">
        <?php
        $query = new WP_Query(array(
          'post_type' => 'produto',
          'posts_per_page' => -1
        ));
        $total = $query->found_posts;
        wp_reset_postdata();
        echo '<span id="produtos-encontrados">' . $total . '</span> ' . ($total == 1 ? 'produto encontrado' : 'produtos encontrados');
        ?>
      </div>
      
      <div class="produtos-ordenacao">
        <select id="ordenar-produtos" class="ordenar-select">
          <option value="date">Mais Recentes</option>
          <option value="title">Nome A-Z</option>
          <option value="title-desc">Nome Z-A</option>
          <option value="price">Menor Preço</option>
          <option value="price-desc">Maior Preço</option>
        </select>
      </div>
    </div>
    
    <!-- Grid de Produtos -->
    <div class="produtos-grid" id="produtos-grid">
      <?php
      $produtos_query = new WP_Query(array(
        'post_type' => 'produto',
        'posts_per_page' => 12,
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1
      ));

      if ($produtos_query->have_posts()) :
        while ($produtos_query->have_posts()) : $produtos_query->the_post(); ?>
        
        <div class="produto" data-categoria="<?php echo get_post_meta(get_the_ID(), 'categoria', true); ?>" data-preco="<?php echo get_field('preco') ? get_field('preco') : 0; ?>">
          <div class="produto-badge">
            <?php if (get_post_meta(get_the_ID(), 'promocao', true)) : ?>
              <span class="badge-promocao">Promoção</span>
            <?php else : ?>
              <span class="badge-disponivel">Disponível</span>
            <?php endif; ?>
          </div>
          
          <div class="produto-favorito">
            <button class="btn-favorito" data-produto="<?php the_ID(); ?>">
              <i class="far fa-heart"></i>
            </button>
          </div>
          
          <a href="<?php the_permalink(); ?>" class="produto-link">
            <?php if (has_post_thumbnail()) : ?>
              <div class="produto-imagem">
                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
              </div>
            <?php else : ?>
              <div class="produto-sem-imagem">
                <i class="fas fa-image"></i>
                <span>Sem imagem</span>
              </div>
            <?php endif; ?>
          </a>
          
          <div class="produto-info">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            
            <?php if (get_the_excerpt()) : ?>
              <p class="produto-resumo"><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
            <?php endif; ?>
            
            <div class="produto-preco-container">
              <?php if (get_field('preco')) : ?>
                <?php if (get_post_meta(get_the_ID(), 'preco_antigo', true)) : ?>
                  <span class="preco-antigo">R$ <?php echo get_post_meta(get_the_ID(), 'preco_antigo', true); ?></span>
                <?php endif; ?>
                <span class="produto-preco">R$ <?php the_field('preco'); ?></span>
              <?php else : ?>
                <span class="produto-preco">Preço sob consulta</span>
              <?php endif; ?>
            </div>
            
            <div class="produto-acoes">
              <a href="<?php the_permalink(); ?>" class="btn-ver-produto">Ver Produto</a>
              <a href="https://wa.me/5521964531822?text=Olá! Tenho interesse no produto: <?php the_title(); ?>" target="_blank" class="btn-whatsapp-produto">
                <i class="fab fa-whatsapp"></i>
              </a>
            </div>
          </div>
        </div>

        <?php endwhile; ?>
        
        <!-- Paginação -->
        <div class="produtos-paginacao">
          <?php
          echo paginate_links(array(
            'total' => $produtos_query->max_num_pages,
            'current' => max(1, get_query_var('paged')),
            'prev_text' => '<i class="fas fa-chevron-left"></i> Anterior',
            'next_text' => 'Próxima <i class="fas fa-chevron-right"></i>',
            'type' => 'list'
          ));
          ?>
        </div>
        
        <?php wp_reset_postdata();
      else : ?>
        <div class="nenhum-produto">
          <i class="fas fa-search"></i>
          <h3>Nenhum produto encontrado</h3>
          <p>Não há produtos cadastrados no momento ou que correspondam aos filtros selecionados.</p>
          <a href="<?php echo home_url(); ?>" class="btn-voltar">Voltar ao Início</a>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- Call to Action -->
<section class="cta-produtos">
  <div class="container">
    <div class="cta-content">
      <h2>Não encontrou o que procura?</h2>
      <p>Entre em contato conosco! Temos uma equipe especializada pronta para ajudar você a encontrar o produto ideal.</p>
      <div class="cta-buttons">
        <a href="https://wa.me/5521964531822?text=Olá! Preciso de ajuda para encontrar um produto." target="_blank" class="btn-cta-whatsapp">
          <i class="fab fa-whatsapp"></i> Falar no WhatsApp
        </a>
        <a href="<?php echo home_url('/contato'); ?>" class="btn-cta-contato">
          <i class="fas fa-envelope"></i> Página de Contato
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Newsletter -->
<section class="newsletter-section">
  <div class="container">
    <div class="newsletter-content">
      <h3>Receba nossas ofertas exclusivas</h3>
      <p>Cadastre-se e seja a primeira a saber sobre novos produtos e promoções!</p>
      <form class="newsletter-form" id="newsletter-form">
        <input type="email" placeholder="Seu melhor e-mail" required>
        <button type="submit">Cadastrar</button>
      </form>
    </div>
  </div>
</section>

<!-- Botão Flutuante do WhatsApp -->
<div class="whatsapp-float">
  <a href="https://wa.me/5521964531822?text=Olá! Tenho interesse nos produtos da CKS Cosméticos." target="_blank" class="whatsapp-button">
    <img src="<?php echo get_template_directory_uri(); ?>/img/whatsapp.png" alt="WhatsApp">
  </a>
  <div class="whatsapp-tooltip">Olá! Você tem alguma pergunta ou precisa de ajuda?</div>
</div>

<?php get_footer(); ?>
