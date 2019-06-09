<header class="site-header container">
    <nav>
        <ul>
            <li><a href="index.php?page=emotie&amp;genre=<?php echo $genre; ?>">terug</a></li>
            <li>
                <h1>Wat ga je vertellen?</h1>
            </li>
            <li><a href="?page=home">terug naar start</a></li>
        </ul>
    </nav>
</header>
<main>
    <section class="clip__list">
        <?php foreach($clip as $clipThumbnail){ ?>
        <article class="clip__thumbnail">
            <img class="thumbnail__image" src="assets/img/<?php echo $clipThumbnail['clip_name']; ?>.jpg">
            <button class="thumbnail__add">+</button>
        </article>
        <?php } ?>
    </section>
    <section class="clip__preview">
        <video poster="assets/img/test.jpg" id="clip_preview" playsinline controls loop>
            <source src="assets/vids/test1.mp4" type="video/mp4" />
        </video>
    </section>
    <section class="clip__song">
        <div class="gap-example">
            <audio>
                <source src="assets/audio/<?php echo $song; ?>.mp3" type="audio/mp3">
                Your browser does not support the audio element.
            </audio>
        </div>
    </section>
    <section class="clip__selection"></section>
    <section class="clip__title"></section>

</main>
<script src="https://cdn.jsdelivr.net/gh/greghub/green-audio-player/dist/js/green-audio-player.min.js"></script>
<script src="https://cdn.plyr.io/3.5.4/plyr.js"></script>
<script>
const player = new Plyr('#clip_preview');
const audioPlayer = new GreenAudioPlayer(`.gap-example`);
</script>