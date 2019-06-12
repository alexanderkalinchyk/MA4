<main>
    <aside class="sidebar">
      <br>
      <h1 class="logo"><span>videOpera</span></h1>
    </aside>
    <div class="page1 flex">
        <div class="page1__video">
            <video poster="assets/img/test.jpg" id="player" playsinline controls loop>
                <source src="assets/vids/test.mp4" type="video/mp4" />
            </video>
        </div>
        <div class="page1__box">
          <div class="page1__textbox">
            <h2>Opera & Ballet<br>zie je meer dan je denkt</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
          </div>
        </div>
        <a href="?page=genres">Creer jouw verhaal</a>

    </div>
</main>
<script src="https://cdn.plyr.io/3.5.4/plyr.js"></script>
<script>
const player = new Plyr('#player');
</script>
