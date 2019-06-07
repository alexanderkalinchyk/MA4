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
<script src="js/audio.js"></script>