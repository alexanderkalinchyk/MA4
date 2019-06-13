<header class="site-header container">
  <nav class="site-header">
      <a class="active"><span>Welkom</span></a>
      <a><span>Genre</span></a>
      <a><span>Emotie</span></a>
      <a><span>Verhaal</span></a>
      <a><span>Vertel</span></a>
      <div class="line"></div>
      <div class="line2"></div>
    </nav>
</header>
<main>
    <aside class="sidebar">
      <br>
      <h1 class="logo"><span>videOpera</span></h1>
    </aside>
    <div class="page1 flex">
        <div class="page1__video">
            <video poster="assets/img/thumbnails/demo.jpg" id="player" playsinline controls loop>
                <source src="assets/vids/demo.mp4" type="video/mp4" />
            </video>
        </div>
        <div class="page__box page1__box">
          <div class="page__textbox">
            <h2 class="page__textbox--titel">Opera & Ballet<br>zie je meer dan je denkt</h2>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
            <a class="page__box--btn" href="?page=genres">Creëer jouw verhaal ⟶</a>
          </div>
        </div>

    </div>
</main>
<script src="https://cdn.plyr.io/3.5.4/plyr.js"></script>
<script>
const player = new Plyr('#player');
</script>
