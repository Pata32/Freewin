<!DOCTYPE html>
<html>
<head>
  <title>Pop-up vidéo</title>
  <style>
   
  </style>
</head>
<body>
  <button id="openPopup">Lancer la vidéo</button>

  <div id="popup">
    <div id="videoContainer">
      <video id="videoPlayer" autoplay="true" controls>
        <source src="Pub-Freewin/1_musique/30.mp4" type="video/mp4">
      </video>
    </div>
  </div>
    
  <script>
    document.getElementById('openPopup').addEventListener('click', function() {
        document.getElementById('popup').style.display = 'flex';
        document.getElementById('videoPlayer').controls = false;
        document.getElementById('videoPlayer').play();  
        
        videoPlayer.addEventListener('ended', function() {
            document.getElementById('popup').style.display = 'none';
            document.getElementById('videoPlayer').pause();
            document.getElementById('videoPlayer').src = '';
        });
    });
  </script>
</body>
</html>
