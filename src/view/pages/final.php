<header class="site-header container">
    <nav>
        <ul>
            <li><a href="index.php?page=clips&amp;genre=<?php echo $genre; ?>&amp;song=<?php echo $audio; ?>">terug</a></li>
            <li>
                <h1>Wat ga je vertellen?</h1>
            </li>
            <li><a href="?page=home">terug naar start</a></li>
        </ul>
    </nav>
</header>
<main>
  <section class="clip__preview">
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

  </section>
  <section>
      <video poster="" id="bestaande_verhaal" controls class="video-player" src="assets/vids/<?php echo $bestaandeClip["clip_name"]; ?>.mp4" ></video>
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
    const player2 = new Plyr('#bestaande_verhaal');

    const $vidPlayer = document.querySelector(`.video-player`);
    const myVids = [];

    const $vids = document.querySelectorAll(`.vids`);
    $vids.forEach(video => {
        myVids.push(video.value);
    });
    let activeVideo = 0;

    document.querySelector(`.plyr--video`).addEventListener(`click`, handleClickPlayer);
    document.querySelector(`.plyr__progress__container`).classList.add(`hidden`);

    $vidPlayer.onended = function(e) {
      activeVideo = (++activeVideo) % myVids.length;
      $vidPlayer.setAttribute(`src`, myVids[activeVideo]);
      $vidPlayer.play();
    };

  };
  init();
}
</script>
