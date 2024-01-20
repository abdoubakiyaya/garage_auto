<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/lib/article.php";
require_once __DIR__ . "/lib/config.php";
require_once __DIR__ . "/lib/pdo.php";

?>


<div class="container">
  <div class="row">
    <br />
    <h2 class="py-5" align="center">Voitutrs d'occasions</h2>
    <br />

    <div class="col-md-3">

      <div class="list-group">
        <h3>Price</h3>
        <input type="hidden" id="hidden_minimum_price" value="0" />
        <input type="hidden" id="hidden_maximum_price" value="65000" />
        <p id="price_show">1000 - 65000</p>
        <div class="bg-success" id="price_range"></div>
      </div>




    </div>

    <div class="col-md-9 ">
      <br />

      <div class="row row-cols-1 row-cols-md-3 g-4 py-5 filter_data bg-info">

      </div>

    </div>

  </div>

</div>



<?php
require_once __DIR__ . "/templates/footer.php";
?>