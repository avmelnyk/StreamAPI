<!DOCTYPE html>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0" />
<style>
body {
  margin:0;
}
#player {
  width: 100vw;
  max-width: 800px;
  max-height: 600px;
  margin:0 auto;
}
</style>

<div>
<button onclick="player.toggleFullscreen();">fullscreen</button>
</div>

<video id="player" controls>
browser doesn't support embedded videos
</video>

<script src="index.js"></script>
