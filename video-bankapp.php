<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Dialog - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  
</head>
<body>
  <style>
    body{
      background: black;
      height: 100vh;
      display: grid;
      place-items: center;
    }
    .video-container{
      border: solid red;
      padding: 40px;
      width: 80%;
    }
    @media (min-width:700px){
   .video-container{
    width: 50%;
   }
  }
  </style>
 
  <div class="video-container">
    <video  width="200px" height="300px"  autoplay>
      <source src="media/video/buhsBankApp.mp4" type="video/mp4">
    </video>
  </div>
</body>
</html>