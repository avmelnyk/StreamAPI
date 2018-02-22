document.body.addEventListener('click', function (e) {
  switch (e.target.className) {
  case 'switch':
    document.getElementById('player').setAttribute('src', e.target.dataset.file);
    break;
  case 'play':
  }
  e.preventDefault();
}, false);

var player = {
  _domNode: null,

  init: function () {
    console.log('initializing HTML5 player');
    this._domNode = document.getElementById('player');
    this._domNode.controls = false;
    // this._domNode.autoplay = true;
  },
  load: function (url) {
    var that = this;
    console.log('loading url:', url);

    this._domNode.setAttribute('src', url);

    return new Promise(function (resolve, reject) {
      function onEnded () {
        that._domNode.removeEventListener('ended', onEnded);
        resolve();
      }
      that._domNode.addEventListener('ended', onEnded);
    });
  },
  seek: function (time) {
    console.log('seeking to (seconds)', time);
    this.pause();
    this._domNode.currentTime = time;
    return this.play();
  },
  toggleFullscreen: function () {
    if (null === document.webkitFullscreenElement) {
      this._domNode.webkitRequestFullscreen();
    } else {
      document.webkitExitFullscreen();
    }
  },

  play: function () {
    return this._domNode.play();
  },
  pause: function () {
    return this._domNode.pause();
  }
};

var api = {
  current: function (offset) {
    return fetch('streams')
      .then(function (r) {
        return r.json();
      });
  }
};

var app = {
  init: function () {
    player.init();
    this.next();
  },

  next: function () {
    var that = this;
    console.log('starting next stream');

    api.current().then(function (stream) {
      player.load(stream.url)
        .then(that.next.bind(that));
      player.seek(stream.time);
    });
  },

  stopAfterCurrent: function () {
    this.next = new Function();
  }
};

app.init();

