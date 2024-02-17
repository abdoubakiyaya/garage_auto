<?php
require_once __DIR__ . "/../espace_employe/templates/header.php";
?>


<div class="container py-5">
  <section>
    <div class="row row-cols-1 row-cols-md-2 g-4">
      <div class="col">
        <div class="card bg-transparent border-danger bg-info-subtle">
          <div class="card-body">
            <h5 class="card-title">Modération des commentaires</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start py-3">
              <a href="/espace_employe/commentaires.php" class="btn btn-sm btn-success btn-lg px-4">Modérer les commentaires</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card bg-transparent border-danger bg-info-subtle">
          <div class="card-body">
            <h5 class="card-title">Gestion des Articles</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start py-3">
              <a href="/espace_employe/articles.php" class="btn btn-sm btn-success btn-lg px-4">Gerer les voitures</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php
require_once __DIR__ . "/../admin/templates/footer.php";

?>