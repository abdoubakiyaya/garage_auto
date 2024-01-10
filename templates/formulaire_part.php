<div class="container mt-5">
  <h2 class="mb-4">Prendre rendez-vous</h2>
  <form method="post" action="traitement.php"> <!-- Assurez-vous d'ajouter un attribut "method" et "action" au formulaire -->
    <div class="form-row">
      <div class="form-group col-md-6 my-2">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez votre nom" required>
      </div>
      <div class="form-group col-md-6 my-2">
        <label for="prenom">Prénom</label>
        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez votre prénom" required>
      </div>
    </div>
    <div class="form-group my-2">
      <label for="email">Adresse e-mail</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre adresse e-mail" required>
    </div>
    <div class="form-group my-2">
      <label for="telephone">Numéro de téléphone</label>
      <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Entrez votre numéro de téléphone" required>
    </div>
    <div class="form-group my-2">
      <label for="date">Date du rendez-vous</label>
      <input type="date" class="form-control" id="date" name="date_rendezvous" required>
    </div>
    <div class="form-group my-2">
      <label for="heure">Heure du rendez-vous</label>
      <input type="time" class="form-control" id="heure" name="heure_rendezvous" required>
    </div>
    <div class="form-group my-2">
      <label for="message">Message (facultatif)</label>
      <textarea class="form-control" id="message" name="message" rows="4" placeholder="Entrez votre message"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Prendre rendez-vous</button>
  </form>
</div>