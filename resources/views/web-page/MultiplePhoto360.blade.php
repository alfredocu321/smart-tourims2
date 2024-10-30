<html>
  <head>
    <title>360° Image Browser</title>
    <script src="https://aframe.io/releases/1.5.0/aframe.min.js"></script>
    <script src="https://unpkg.com/aframe-template-component@3.x.x/dist/aframe-template-component.min.js"></script>
    <script src="https://unpkg.com/aframe-layout-component@4.x.x/dist/aframe-layout-component.min.js"></script>
    <script src="https://unpkg.com/aframe-event-set-component@5.x.x/dist/aframe-event-set-component.min.js"></script>
     <script src="https://unpkg.com/aframe-proxy-event-component@2.1.0/dist/aframe-proxy-event-component.min.jss"></script>
    <!-- Image link template to be reused. -->
    <script id="link" type="text/html">
      <a-entity class="link"
        geometry="primitive: plane; height: 1; width: 1"
        material="shader: flat; src: ${thumb}"
        sound="on: click; src: #click-sound"
        event-set__mouseenter="scale: 1.2 1.2 1"
        event-set__mouseleave="scale: 1 1 1"
        event-set__click="_target: #image-360; _delay: 300; material.src: ${src}"
        proxy-event="event: click; to: #image-360; as: fade"></a-entity>
    </script>
  </head>
  <body>
    <a-scene>
      <a-assets>
        @foreach ($photos360 as $photo360)

        <img id="{{$photo360->id}}" crossorigin="anonymous" src="{{$photo360->image360->photo360}}">
 
        <img id="c{{$photo360->id}}-thumb" crossorigin="anonymous" src="https://cdn.aframe.io/360-image-gallery-boilerplate/img/thumb-city.jpg">

        @endforeach
        
      </a-assets>

      <!-- 360-degree image. -->
      <a-sky id="image-360" radius="10" src="#{{$photo360->id}}"
             animation__fade="property: components.material.material.color; type: color; from: #FFF; to: #000; dur: 300; startEvents: fade"
             animation__fadeback="property: components.material.material.color; type: color; from: #000; to: #FFF; dur: 300; startEvents: animationcomplete__fade"></a-sky>


      <!-- Image links. -->
      <a-entity id="links" layout="type: line; margin: 1.5" position="-1.5 -1 -4">
        @foreach ($photos360 as $photo360)
        <a-entity template="src: #link" data-src="#{{$photo360->id}}" data-thumb="#{{$photo360->id}}-thumb"></a-entity>
        @endforeach
      </a-entity>

      <!-- Camera + cursor. -->
      <a-entity camera look-controls>
        <a-cursor
          id="cursor"
          animation__click="property: scale; startEvents: click; from: 0.1 0.1 0.1; to: 1 1 1; dur: 150"
          animation__fusing="property: fusing; startEvents: fusing; from: 1 1 1; to: 0.1 0.1 0.1; dur: 1500"
          event-set__mouseenter="_event: mouseenter; color: springgreen"
          event-set__mouseleave="_event: mouseleave; color: black"
          raycaster="objects: .link"></a-cursor>
      </a-entity>
    </a-scene>
  </body>
</html>