function changeHour() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "php/php_ajax_get_time.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Traitement des données reçues du fichier PHP
            var reponse = xhr.responseText;
            console.log(reponse);
            var json = JSON.parse(reponse);
            compteARebours(json);
        }
    };
    xhr.send();
}

function changeHourRoul(id) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "php/php_ajax_change_time.php?roul=roul_"+id, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {  
        }
    };
    xhr.send();
    location.reload();
}

function compteARebours(json) {
    console.log(json);
    var dateFin1 = new Date(json.roul_1);
    var dateFin2 = new Date(json.roul_2);
    var dateFin3 = new Date(json.roul_3);
    
    timer(dateFin1,1);
    timer(dateFin2,2);
    timer(dateFin3,3);
    
}

function timer(dateFin,id){
    var compteARebours = setInterval(function() {
        var maintenant = getUTCDate();
        var tempsRestant = dateFin - maintenant;
    
        var heures = Math.floor((tempsRestant % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((tempsRestant % (1000 * 60 * 60)) / (1000 * 60));
        var secondes = Math.floor((tempsRestant % (1000 * 60)) / 1000);
    
        document.getElementById('timer_'+id).innerText = heures+"h " + minutes + "m " + secondes + "s";
    
        if (tempsRestant < 0) {
          clearInterval(compteARebours);
          document.getElementById('timer_'+id).hidden = true;
          document.getElementById('btn_spin_'+id).hidden = false;
        }
    }, 1000);
}

function getUTCDate() {
    var currentDate = new Date();
    var utcDate = new Date(
      currentDate.getUTCFullYear(),
      currentDate.getUTCMonth(),
      currentDate.getUTCDate(),
      currentDate.getUTCHours(),
      currentDate.getUTCMinutes(),
      currentDate.getUTCSeconds()
    );
    
    return utcDate;
}