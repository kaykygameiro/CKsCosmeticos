console.log("CKS Cosméticos - site carregado!");
fetch("http://ckscosmeticos.local/wp-json/wp/v2/posts")
  .then(res => res.json())
  .then(posts => {
    const container = document.querySelector(".produtos-grid");

    posts.forEach(post => {
      const card = document.createElement("div");
      card.className = "produto";

      // Criar o título
      const titulo = document.createElement("h3");
      titulo.textContent = post.title.rendered;

      // Criar o conteúdo
      const descricao = document.createElement("p");
      descricao.innerHTML = post.excerpt.rendered;

      // Criar imagem destacada (precisa outra requisição)
      fetch(`http://ckscosmeticos.local/wp-json/wp/v2/media/${post.featured_media}`)
        .then(res => res.json())
        .then(imagem => {
          const img = document.createElement("img");
          img.src = imagem.source_url;
          img.alt = post.title.rendered;

          // Adicionar tudo no card
          card.appendChild(img);
          card.appendChild(titulo);
          card.appendChild(descricao);
          container.appendChild(card);
        });
    });
  });
