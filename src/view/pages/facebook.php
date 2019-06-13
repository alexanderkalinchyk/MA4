<header class="fb-header">
  <img src="assets/img/fb.png">
  <h1>Share on Facebook</h1>
</header>
<main class="fb-main">
<section class="fb__section1">
  <select class="fb-select" name="" id="">
    <option value="" selected >Share in a Group</option>
  </select>
</section>
<section class="fb__section2">
  <div class="fb-group">Group:</div>
  <input type="text" value="Opera Ballet Vlaanderen">
</section>
<section class="fb__section3">
  <img class="fb-profilepic" src="assets/img/profilepic.jpg">
  <div class="fb-div">
    <span>Opera Ballet Vlaanderen</span>
    <textarea name="" id="" cols="50" rows="3" placeholder="Say something about this"></textarea>
</div>

</section>
<section class="fb__section4">
  <img src="assets/img/thumbnails/<?php echo $name; ?>.jpg" alt="<?php echo $name; ?>">
  <div class="clip-name">
    Jouw verhaal - <?php echo $name; ?>.mp4 <br>
    <span class="light">Deel jouw verhaal met duizenden andere mensen op onze facebook pagina!</span>
  </div>
  <div>
  </div>
</section>
<section class="fb__section5">
  <button class="cancel-btn">Cancel</button>
  <a href="index.php" class="post-btn">Post to Facebook</a>
</section>
</main>
