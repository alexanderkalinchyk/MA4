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
            <p class="page__textbox--finaltext">Een ongedeeld verhaal is zonde. Deel jouw creatie via onze facebook pagina met de wereld, en wie weet inspireer je één van onze volgende producties.</p>
            <a class="page__box--btn page__box--btn2" href="index.php?page=facebook&amp;name=<?php echo $audio; ?>" onclick="window.open('index.php?page=facebook&name=<?php echo $audio; ?>',
                          'newwindow',
                          'width=500,height=800');
                return false;">Deel je verhaal met ons</a>
          </div>
        </div>
        <div class='icon-scroll'><div/>
  </section>
  <br>
  <section class="final-result__section final-result__section2">
    <div class="page__textbox final-extra-content">
      <h3 class="page__textbox--titel bigger-titel">Opera & Film</h3>
      <br>
      <hr>
      <br>
      <p>Opera dompeld je net als film onder in een andere wereld. met dezelfde thema’s en emoties zijn ze meer gelijkend dan je denkt. Kom eens kijken en ontdek deze nieuwe werelden</p>
</div>
  <div class="final-result__extra-vid">
      <h2 class="page_title">Meer gelijkend dan je denkt...</h2>
      <video poster="" id="bestaande_verhaal" controls class="video-player" src="assets/vids/<?php echo $bestaandeClip["clip_name"]; ?>.mp4" ></video>
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
