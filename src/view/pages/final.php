<header class="site-header container">
<nav class="site-header">
      <a class="active"><span>Welkom</span></a>
      <a class="active"><span>Genre</span></a>
      <a class="active"><span>Emotie</span></a>
      <a class="active"><span>Verhaal</span></a>
      <a class="active"><span>Vertel</span></a>
      <div class="line"></div>
      <div class="line2"></div>
    </nav>
</header>
<main class="main final-result__main">
<a class="resetbtn" href="?page=home">Terug naar start</a>
  <section class="clip__preview final-result__section">
    <div>
      <input type="hidden" class="vids" name="clip1" value="<?php echo $clip1; ?>">
      <input type="hidden" class="vids" name="clip2" value="<?php echo $clip2; ?>">
      <input type="hidden" class="vids" name="clip3" value="<?php echo $clip3; ?>">

      <div class="gap-example hidden">
            <audio class="audio-player" controls loop>
                <source src="assets/audio/<?php echo $audio; ?>.mp3" type="audio/mp3">
                Your browser does not support the audio element.
            </audio>
      </div>

      <video poster="" id="jouw_verhaal" controls class="video-player" src="<?php echo $clip1; ?>" ></video>
    </div>
    <div class="page__box page2__box">
          <div class="page__textbox">
            <h2 class="page__textbox--titel">Deel je verhaal met<br>ons en vele anderen</h2>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
            <a class="page__box--btn page__box--btn2" href="index.php?page=facebook" onclick="window.open('index.php?page=facebook',
                          'newwindow',
                          'width=500,height=800');
                return false;">Deel je verhaal met ons</a>
          </div>
        </div>
  </section>
  <br>
  <section class="final-result__section">
  <div>
      <video poster="" id="bestaande_verhaal" controls class="video-player" src="assets/vids/<?php echo $bestaandeClip["clip_name"]; ?>.mp4" ></video>
      <div>
      <h2 class="page_title">Meer gelijkend dan je denkt...</h2>
        <p><?php echo $bestaandeClip["tekst"]; ?></p>
      </div>
  </div>
  </section>
</main>
<script src="https://cdn.plyr.io/3.5.4/plyr.js"></script>
<script>
{
  const handleClickPlayer = e =>{
      $audioPlayer = document.querySelector(`.audio-player`);
      $vidPlayer = document.querySelector(`.video-player`);
      if(!$vidPlayer.paused){
          $audioPlayer.play();
      }
      else{
        $audioPlayer.pause();
      }

  };
  const init = () =>{
    const player = new Plyr('#jouw_verhaal');
    const $player = document.querySelector('#jouw_verhaal');
    const player2 = new Plyr('#bestaande_verhaal');
    const $player2 = document.querySelector('#bestaande_verhaal');

    $player.parentElement.parentElement.classList.add(`final-clip1`);
    $player2.parentElement.parentElement.classList.add(`final-clip2`);

    const $vidPlayer = document.querySelector(`.video-player`);
    const myVids = [];

    const $vids = document.querySelectorAll(`.vids`);
    $vids.forEach(video => {
        myVids.push(video.value);
    });
    let activeVideo = 0;

    document.querySelector(`.plyr--video`).addEventListener(`click`, handleClickPlayer);
    $controls = document.querySelectorAll(`.plyr__controls__item`);
    $controls.forEach(control => {
      control.classList.add(`hidden`);
    });

    $vidPlayer.onended = function(e) {
      activeVideo = (++activeVideo) % myVids.length;
      $vidPlayer.setAttribute(`src`, myVids[activeVideo]);
      $vidPlayer.play();
    };

  };
  init();
}
</script>
