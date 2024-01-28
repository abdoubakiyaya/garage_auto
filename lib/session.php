<?php

session_set_cookie_params([
  'lifetime' => 600,
  'path' => '/',
  'domain' => _DOMAIN_,
  'httponly' => true
]);

session_start();




////////---------------------------------
function adminOnly()
{
  // Assurez-vous que la session a été démarrée
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  // Vérifiez si l'utilisateur n'est pas administrateur
  if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] !== 'admin') {
    // Générez du JavaScript pour afficher la fenêtre modale

    echo '
          <div class="container py-5">
              <div class="modal modal-sheet position-static d-block p-4 py-md-5" tabindex="-1" role="dialog" id="modalSheet">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content bg-body-secondary rounded-2 shadow">
                          <div class="modal-header border-bottom-0">
                              <h1 class="modal-title text-warning fs-5">Avertissement</h1>
                          </div>
                          <div class="modal-body py-0">
                              <p>Vous n\'avez pas les autorisations nécessaires pour accéder à cette page.</p>
                              <p>Cliquez <a href="' . htmlspecialchars("index.php") . '">ici</a> pour revenir à la page d\'accueil.</p>
                          </div>                       
                      </div>
                  </div>
              </div>
          </div>
      ';
    exit();
  }
}
