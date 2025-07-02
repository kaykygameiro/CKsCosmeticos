<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php bloginfo('name'); ?> | <?php wp_title(); ?></title>
  <?php wp_head(); ?>
  <!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>


<header>
  <div class="container">
    <h1>CKS Cosméticos</h1>
    <nav class="menu-site">
      <?php
        wp_nav_menu(array(
          'theme_location' => 'menu-principal',
          'container' => false,
          'menu_class' => 'menu-principal'
        ));
      ?>
    </nav>
  </div>
</header>



