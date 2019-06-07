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
    <?php foreach($audio as $audioItem){ ?>
    <article class="song__article">
        <div class="song__container">
            <span> <?php echo $audioItem['audio_name']; ?></span>
            <button class="play-song">Play</button>
            <div id="waveform"></div>
            <button class="bekijk">Bekijk</button>
        </div>
        <a href="#">Ik neem deze</a>
    </article>
    <?php
  }
    ?>
</main>
<script src="https://unpkg.com/wavesurfer.js"></script>
<script src="js/audio.js"></script>