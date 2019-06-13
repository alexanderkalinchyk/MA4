<header class="site-header container">
  <nav class="site-header">
      <a class="active"><span>Welkom</span></a>
      <a class="active"><span>Genre</span></a>
      <a class="active"><span>Emotie</span></a>
      <a><span>Verhaal</span></a>
      <a><span>Vertel</span></a>
      <div class="line"></div>
      <div class="line2"></div>
    </nav>
</header>
<main class="flex">
<aside class="sidebar sidebar2">
    <ul>
      <li><a class="sidebar2--backbtn" href="?page=genres">⟵ Vorige</a></li>
      <br>
      <li><a href="?page=home">Begin opnieuw</a></li>
    </ul>
    <br>
    <h1 class=" logo logo2"><span>videOpera</span></h1>
</aside>
<div class="emotie__container">
  <section class="emotie__header">
    <div class="header__content">
    <h2 class="page_title">Kies jouw emotie</h2>
      <div class="header__img-container">
        <img src="assets/img/<?php echo $genre; ?>.png" alt="genre image">
        <div class="header__title">
          <h3 class="emotie__genre"><?php echo $genre; ?></h3>
          <p class="song-name"></p>
      </div>
      </div>
    </div>
    <div class="empty-space"></div>
  </section>
  <section class="emotie__clips">
    <?php
    $i = -1;
    foreach($audio as $audioItem){
    $i++
     ?>
    <article class="song__article">
        <div class="song__container">
          <div>
            <div class="gap-example<?php echo $i; ?>">
                <span class="song__title"><?php echo $audioItem['audio_title']; ?></span>
                <audio>
                    <source src="assets/audio/<?php echo $audioItem['audio_name']; ?>.mp3" type="audio/mp3">
                    Your browser does not support the audio element.
                </audio>
                <button class="bekijk">Video</button>
            </div>
                <a
                    href="index.php?page=clips&amp;genre=<?php echo $genre; ?>&amp;song=<?php echo $audioItem['audio_name']; ?>">Ik
                    neem deze
                </a>
            </div>
            <div class="collapsible-content">
                <video poster="assets/img/thumbnails/<?php echo $audioItem['audio_name']; ?>.jpg" id="player<?php echo $i; ?>" playsinline controls loop>
                    <source src="assets/vids/<?php echo $audioItem['audio_name']; ?>.mp4" type="video/mp4" />
                </video>
            </div>
        </div>
    </article>
    <?php
  }
    ?>
    </section>
   </div>
</main>
<script src="https://cdn.jsdelivr.net/gh/greghub/green-audio-player/dist/js/green-audio-player.min.js"></script>
<script src="https://cdn.plyr.io/3.5.4/plyr.js"></script>
<script>
{
    const btn = [];
    const vidPlayer = [];
    const audioPlayer = [];
    const toggle = [];

    const handleClickPlaybtn = (e, i) => {
        const $btn = e.currentTarget;
        $btnParent = $btn.parentElement
        const $currentPlayer = $btnParent.querySelector(`audio`);
        const $song_name = $btnParent.querySelector(`.song__title`).textContent;
        document.querySelector(`.song-name`).textContent = $song_name;

        const $currentIcon = $btnParent.querySelector(`.play-pause-btn__icon`);
        if (toggle[i] === 'pause') {
            for (let j = 0; j < toggle.length; j++) {
                if (j !== i) {
                    toggle[j] = 'pause';
                    const $otherPlayers = document.querySelectorAll(`audio`);
                    $otherPlayers.forEach(player => {
                        $icon = player.parentElement.querySelector(`.play-pause-btn__icon`);
                        $icon.setAttribute(`d`, "M18 12L0 24V0");
                       // console.log($icon);
                        if (player.paused == false) {
                            player.pause();
                        }
                    });
                    $currentPlayer.play();
                    $currentIcon.setAttribute(`d`, "M0 0h6v24H0zM12 0h6v24h-6z");
                }
            }
            toggle[i] = 'play';
        } else {
            toggle[i] = 'pause';
        }
    };

    const init = () => {

        const $play = document.querySelectorAll(`.play-song`);
        const $article = document.querySelectorAll(`.song__article`);
        for (let i = 0; i < $article.length; i++) {
            audioPlayer[i] = new GreenAudioPlayer(`.gap-example${i}`);

            btn[i] = $article[i].querySelector(`.play-pause-btn`);

            btn[i].addEventListener(
                `click`,
                function() {
                    handleClickPlaybtn(event, i);
                },
                false
            );

            toggle[i] = 'pause';
            vidPlayer[i] = new Plyr(`#player${i}`);
        }
    };
    init();
}
</script>
