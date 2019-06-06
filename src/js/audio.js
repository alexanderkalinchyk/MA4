{
  const wavesurfer = WaveSurfer.create({
    container: '#waveform'
  });
  let toggle = 'pause';
  const handleClickPlaybtn = e => {
    const $btn = e.currentTarget;
    if (toggle === 'pause') {
      wavesurfer.play();
      toggle = 'play';
      $btn.textContent = 'Pause';
    } else {
      wavesurfer.pause();
      toggle = 'pause';
      $btn.textContent = 'Play';
    }
  };
  const init = () => {
    const $play = document.querySelector(`.play-song`);
    //load song name from php to text, then read value into js to load
    wavesurfer.load('assets/audio/test.mp3');
    wavesurfer.on('ready', function() {
      $play.addEventListener(`click`, handleClickPlaybtn);
    });
  };
  init();
}
