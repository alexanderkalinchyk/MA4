<header class="site-header container">
    <nav>
        <ul>
            <li><a href="?page=genres">terug</a></li>
            <li>
                <h1>Kies jouw emotie</h1>
            </li>
            <li><a href="?page=home">terug naar start</a></li>
        </ul>
    </nav>
</header>
<main>
    <?php
    $i = -1;
    foreach($audio as $audioItem){
    $i++
     ?>
    <article class="song__article">
        <div class="song__container">
            <input class="audio-name" value="<?php echo $audioItem['audio_name']; ?>" type="hidden">
            <button class="play-song">Play</button>
                <audio controls>
              <source src="assets/audio/test1.mp3" type="audio/mp3">
            Your browser does not support the audio element.
            </audio>
            <div id="waveform<?php echo $i; ?>"></div>
            <button class="bekijk">Bekijk</button>
            <div class="page1__video">
                <video poster="assets/img/test.jpg" id="player<?php echo $i; ?>" playsinline controls loop>
                    <source src="assets/vids/<?php echo $audioItem['audio_name']; ?>.mp4" type="video/mp4" />
                </video>
            </div>
        </div>
        <a href="index.php?page=clips&amp;genre=<?php echo $genre; ?>&amp;song=<?php echo $audioItem['audio_name']; ?>">Ik
            neem deze</a>
    </article>
    <?php
  }
    ?>
</main>
<script src="https://unpkg.com/wavesurfer.js"></script>
<script src="https://cdn.plyr.io/3.5.4/plyr.js"></script>
<script>
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
  };
  init();
}
</script>
