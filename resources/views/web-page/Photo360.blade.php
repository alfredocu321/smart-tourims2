<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>
</head>
<body>
    <a-scene vr-mode-ui="enabled: true">
        <!-- Cámara con controles -->
        <a-entity camera look-controls wasd-controls position="0 1.6 0">
            <a-entity oculus-touch-controls="hand: left"></a-entity>
            <a-entity oculus-touch-controls="hand: right"></a-entity>
        </a-entity>
  
        <!-- Entidad de cielo para mostrar la imagen 360 -->
        <a-sky src="https://vr360.gr/wp-content/uploads/2018/11/vr360-3D3.png"></a-sky>
    </a-scene>
</body>
</html>
