<main>
    <h1>videOpera</h1>
    <div class="page1">
        <div class="page1__video">
            <video poster="assets/img/test.jpg" id="player" playsinline controls loop>
                <source src="assets/vids/test.mp4" type="video/mp4" />
            </video>
        </div>
        <a href="?page=genres">Creer jouw verhaal</a>

    </div>
</main>
<script src="https://cdn.plyr.io/3.5.4/plyr.js"></script>
<script>
const player = new Plyr('#player');
</script>