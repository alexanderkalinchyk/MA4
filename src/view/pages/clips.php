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
<main class="flex">
    <section class="clip__list">
        <?php foreach($clip as $clipThumbnail){ ?>
        <article class="clip__thumbnail">
            <img class="thumbnail__image" src="assets/img/<?php echo $clipThumbnail['clip_name']; ?>.jpg">
            <input type="hidden" class="clip-name" value="assets/vids/<?php echo $clipThumbnail['clip_name']; ?>.mp4">
            <span class="thumbnail__counter">+</span>
        </article>
        <?php } ?>
    </section>
    <section class="clip__preview">
        <video poster="assets/img/test.jpg" id="clip_preview" playsinline controls loop>
            <source src="" type="video/mp4" />
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
    <section class="clip__title">
        <label>titel</label>
        <input type="text">
    </section>

</main>
<script src="https://cdn.jsdelivr.net/gh/greghub/green-audio-player/dist/js/green-audio-player.min.js"></script>
<script src="https://cdn.plyr.io/3.5.4/plyr.js"></script>
<script>
{
    let thumbnailCounter = [];
    let iCounter = 0;

    const handleClickThumbnail = (e, i, selectedBoolean) => {
        $counterLabel = e.currentTarget.parentElement.querySelector(`.thumbnail__counter`);
        $video = document.querySelector(`#clip_preview`);

        if (!e.currentTarget.classList.contains(`border`)) {
            if (iCounter < 3) {
                e.currentTarget.classList.add(`border`);
                iCounter++;
                if (thumbnailCounter.length == 3) {
                    thumbnailCounter.sort();
                }
                if (thumbnailCounter.length != 0) {
                    $counterLabel.textContent = thumbnailCounter[0];
                    thumbnailCounter.shift();
                } else {
                    $counterLabel.textContent = iCounter;
                }
                $video.setAttribute(`src`, e.currentTarget.parentElement.querySelector(`.clip-name`).value);
            }
        } else {
            e.currentTarget.classList.remove(`border`);
            thumbnailCounter.push($counterLabel.textContent);
            $counterLabel.textContent = "+";
            iCounter--;
        }

    };
    const init = () => {
        const player = new Plyr('#clip_preview');
        const audioPlayer = new GreenAudioPlayer(`.gap-example`);
        const $thumbnails = document.querySelectorAll(`.thumbnail__image`);
        $thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener(`click`, handleClickThumbnail);
        });
    };
    init();
}
</script>