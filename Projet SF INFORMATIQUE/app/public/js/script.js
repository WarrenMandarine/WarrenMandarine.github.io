document.addEventListener('DOMContentLoaded', function () {
  // Sélectionner tous les liens dans la page
  var navLinks = document.querySelectorAll('nav a');

  // Pour chaque lien de navigation, ajouter un addListen pour le clic
  navLinks.forEach(function (link) {
    link.addEventListener('click', function (event) {
      // Supprimer la classe "active" de tous les autres liens
      navLinks.forEach(function (navLink) {
        navLink.classList.remove('active');
      });
      // Ajouter la classe "active" au lien cliqué
      this.classList.add('active');
    });
  });

  // Récupérer le nom de la page actuelle
  var currentPage = window.location.pathname.split("/").pop();

  // Trouver l'élément de navigation correspondant à la page actuelle et ajouter la classe "active"
  var currentNavLink = document.querySelector('nav a[href*="' + currentPage + '"]');
  if (currentNavLink) {
    currentNavLink.classList.add('active');
  }
  // Trouver l'élément de navigation pour le lien "Nouveau client" et ajouter la classe "active"
  var nouveauNavLink = document.querySelector('nav a#nouveau');
  if (nouveauNavLink && !currentNavLink) {
    nouveauNavLink.classList.add('active');
  }
});

function expandCard(clientId) {
  // Récupérer l'élément de carte avec l'ID spécifié
  var card = document.getElementById(clientId);
  // Basculer la classe "expanded" de la carte
  card.classList.toggle("expanded");
}

// Sélectionner tous les noms de client qui ont un ID commençant par "client"
var clientNames = document.querySelectorAll('[id^="client"]');
clientNames.forEach(function (clientName) {
  clientName.addEventListener('click', function () {
    // Remplacer "client" par "card" dans l'ID du client pour obtenir l'ID de la carte correspondante
    var clientId = this.id.replace('client', 'card');
    // Récupérer l'élément de carte avec l'ID correspondant et ajouter la classe "expanded"
    var card = document.getElementById(clientId);
    card.classList.add("expanded");
  });
});

document.addEventListener('DOMContentLoaded', function () {
  // Récupérer l'élément de recherche
  var searchInput = document.getElementById('searchInput');
  // Sélectionner toutes les lignes de clients dans le tableau
  var clientRows = document.querySelectorAll('table tr');

  // Ajouter un addList pour l'événement "input" de l'entrée de recherche
  searchInput.addEventListener('input', function () {
    // Convertir le terme de recherche en minuscules
    var searchTerm = searchInput.value.toLowerCase();

    // Pour chaque ligne de client, vérifier si le nom du client contient le terme de recherche
    clientRows.forEach(function (clientRow) {
      // Récupérer le nom du client dans la ligne
      var clientName = clientRow.querySelector('td[id^="client"]');
      if (clientName) {
        // Convertir le texte du nom du client en minuscules
        var clientText = clientName.textContent.toLowerCase();
        // Afficher la ligne de client si le terme de recherche est inclus dans le nom du client, sinon la masquer
        if (clientText.includes(searchTerm)) {
          clientRow.style.display = 'table-row';
        } else {
          clientRow.style.display = 'none';
        }
      }
    });
  });
});
