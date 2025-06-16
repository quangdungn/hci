<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CoStudy</title>
  <style>
    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
      background-color: #1e2560;
      font-family: sans-serif;
      color: white;
      display: flex;
      flex-direction: column;
    }
    .fullscreen-header {
      height: 60px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 24px;
      font-weight: bold;
      flex-shrink: 0;
    }
    .close-button {
      position: absolute;
      top: 20px;
      right: 20px;
      color: white;
      font-size: 24px;
      cursor: pointer;
    }
    .grid-container {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px 30px 30px;
      box-sizing: border-box;
    }
    .grid {
      width: 100%;
      max-width: 1500px;
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 20px;
    }
    .grid img {
      width: 100%;
      aspect-ratio: 4 / 3;
      object-fit: cover;
      border-radius: 12px;
    }
    @media (max-width: 768px) {
      .grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }
  </style>
</head>
<body>
  <div class="fullscreen-header">CoStudy</div>
  <div class="close-button" onclick="window.location.href='/room';">&times;</div>

  <div class="grid-container">
    <div class="grid">
      @for ($i = 1; $i <= 12; $i++)
        <img src="{{ asset('images/camera/cam.jpg') }}" alt="avatar">
      @endfor
    </div>
  </div>
</body>
</html>
