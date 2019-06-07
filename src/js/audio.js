{
  const wavesurfer = [];
  const player = [];
  const toggle = [];

  const handleClickPlaybtn = (e, i) => {
    const $btn = e.currentTarget;
    if (toggle[i] === 'pause') {
      for (let j = 0;j < toggle.length;j ++) {
        if (j !== i) {
          toggle[j] = 'pause';
          wavesurfer[j].pause();
          const $otherBtn = document.querySelectorAll(`.play-song`);
          $otherBtn.forEach(btn => {
            btn.textContent = 'Play';
          });
          $btn.textContent = 'Pause';
        }
      }
      wavesurfer[i].play();
      toggle[i] = 'play';
    } else {
      wavesurfer[i].pause();
      toggle[i] = 'pause';
      $btn.textContent = 'Play';
    }
  };
  const init = () => {
    const $play = document.querySelectorAll(`.play-song`);
    const $article = document.querySelectorAll(`.song__article`);
    for (let i = 0;i < $article.length;i ++) {
      console.log(`#waveform${i}`);
      wavesurfer[i] = WaveSurfer.create({
        container: `#waveform${i}`
      });
      const $song = $article[i].querySelector(`.audio-name`).value;
      wavesurfer[i].load(`assets/audio/${$song}.mp3`);
      wavesurfer[i].on('ready', function() {
        $play[i].addEventListener(
          `click`,
          function() {
            handleClickPlaybtn(event, i);
          },
          false
        );
      });
      toggle[i] = 'pause';
      player[i] = new Plyr(`#player${i}`);
    }
    //load song name from php to text, then read value into js to load
  };
  init();
}
