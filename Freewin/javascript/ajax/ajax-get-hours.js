function changeHour() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "test.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
        // Traitement des données reçues du fichier PHP
        var reponse = xhr.responseText;
        compteARebours(reponse);
        }
    };
    xhr.send();
}
function compteARebours(dateFinString) {
    var dateFin = new Date(dateFinString);
    
    var compteARebours = setInterval(function() {
      var maintenant = new Date().getTime();
      var tempsRestant = dateFin - maintenant;
  
      var heures = Math.floor((tempsRestant % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((tempsRestant % (1000 * 60 * 60)) / (1000 * 60));
      var secondes = Math.floor((tempsRestant % (1000 * 60)) / 1000);
  
      document.getElementById('timer_1').innerText = heures+"h " + minutes + "m " + secondes + "s";
  
      if (tempsRestant < 0) {
        clearInterval(compteARebours);
        document.getElementById('timer_1').hidden = true;
        document.getElementById('button_play').hidden = false;
      }
    }, 1000);
  }