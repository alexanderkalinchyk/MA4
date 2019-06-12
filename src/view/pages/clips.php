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
        <video poster="" id="clip_preview" playsinline controls>
            <source src="" type="video/mp4" />
        </video>
    </section>
    <section class="clip__song">
        <div class="gap-example hidden">
            <audio controls loop autoplay>
                <source src="assets/audio/<?php echo $song; ?>.mp3" type="audio/mp3">
                Your browser does not support the audio element.
            </audio>
        </div>
    </section>
    <section class="clip__selection">

    </section>
    <form class="form" method="post" action="?page=final">
        <input type="hidden" value="" name="clip1" id="clip1">
        <input type="hidden" value="" name="clip2" id="clip2">
        <input type="hidden" value="" name="clip3" id="clip3">
        <input type="hidden" value="<?php echo $song; ?>" id="audio1" name="audio">
        <input type="hidden" value="<?php echo $genre; ?>" id="genre" name="genre">
        <button disabled class="submit-btn">Toon mijn resultaat</button>
    </form>

</main>
<script src="https://cdn.plyr.io/3.5.4/plyr.js"></script>
<script>
{
    let thumbnailCounter = [];
    let iCounter = 0;

    const addSelectedThumbnail = (imgSrc, id) => {
        $article = document.createElement(`article`);
        $article.classList.add(`selected-thumbnail`);
        $img = document.createElement(`img`);
        $img.classList.add(`selected-thumbnail__img`);
        $img.classList.add(id);
        $img.setAttribute('src', imgSrc);
        $img.addEventListener(
                `click`,
                function() {
                  handleClickSelectedThumbnail(event, id);
                },
                false
            );
        $article.appendChild($img);
        $clipSelection = document.querySelector(`.clip__selection`);

        const $div = document.createElement(`div`);
        $div.classList.add(`thumbnail-plus`);
        const $span = document.createElement(`span`);
        $span.textContent = "+";

        $div.appendChild($span);

        $clipSelection.appendChild($article);
        $article.appendChild($div);

        const $plusCounter = document.querySelectorAll(`.thumbnail-plus`);
        if($plusCounter.length == 3){
            const lastPlus = $plusCounter[$plusCounter.length - 1];
            lastPlus.classList.add(`hidden`);
            if($clipSelection.querySelectorAll(`.hidden`).length > 1){
                $clipSelection.querySelector(`.hidden`).classList.remove(`hidden`);
            }
            document.querySelector(`.submit-btn`).disabled = false;
        }
        else{
          document.querySelector(`.submit-btn`).disabled = true;
        }
    };

    const handleClickSelectedThumbnail = (e, id) => {
        $img = e.currentTarget.getAttribute(`src`);
        $section = document.querySelector(`.clip__selection`);
        $section.querySelector(`.${id}`);
        $section.removeChild($section.querySelector(`.${id}`).parentElement);

        $articleCount = document.querySelectorAll(`.selected-thumbnail`).length;
        $plusCount = document.querySelectorAll(`.thumbnail-plus`);

        if($articleCount == 1 && document.querySelector(`.thumbnail-plus`).classList.contains(`hidden`)){
            $article = document.querySelector(`.selected-thumbnail`);
            document.querySelector(`.thumbnail-plus`).classList.remove(`hidden`);
        }
        if($articleCount < 3){
          document.querySelector(`.submit-btn`).disabled = true;
        }
        else{
          document.querySelector(`.submit-btn`).disabled = false;
        }
        document.querySelector(`.${id}`).click();
    };

    const handleClickThumbnail = e => {
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
                e.currentTarget.classList.add(`thumbnail${$counterLabel.textContent}`);
                const $imgSrc = e.currentTarget.getAttribute(`src`);
                addSelectedThumbnail($imgSrc, `thumbnail${$counterLabel.textContent}`) ;
                $video.setAttribute(`src`, e.currentTarget.parentElement.querySelector(`.clip-name`).value);
            }
        } else {

            $section = document.querySelector(`.clip__selection`);
            if($section.querySelector(`.thumbnail${$counterLabel.textContent}`)){
              $section.removeChild($section.querySelector(`.thumbnail${$counterLabel.textContent}`).parentElement);
            }

            e.currentTarget.classList.remove(`border`);
            e.currentTarget.classList.remove(e.currentTarget.className.split(' ').pop());
            thumbnailCounter.push($counterLabel.textContent);
            $counterLabel.textContent = "+";
            iCounter--;
            document.querySelector(`.submit-btn`).disabled = true;
        }

    };
    const handleSubmitForm = e =>{
        e.preventDefault();


        document.querySelector(`#clip1`).value = document.querySelector(`.thumbnail1`).parentElement.querySelector(`.clip-name`).value;
        document.querySelector(`#clip2`).value = document.querySelector(`.thumbnail2`).parentElement.querySelector(`.clip-name`).value;
        document.querySelector(`#clip3`).value = document.querySelector(`.thumbnail3`).parentElement.querySelector(`.clip-name`).value;

        document.querySelector(`.form`).submit();

    };
    const init = () => {
        const player = new Plyr('#clip_preview');
        const $thumbnails = document.querySelectorAll(`.thumbnail__image`);
        $thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener(`click`, handleClickThumbnail);
        });
        const $submit = document.querySelector(`.submit-btn`);
        $submit.addEventListener('click', handleSubmitForm);
    };
    init();
}
</script>
