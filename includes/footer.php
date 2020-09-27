<aside class="col-md-4 blog-sidebar">
      <div class="p-4 mb-3 bg-light rounded">
        <h4 class="font-italic">About</h4>
        <p class="mb-0">Portal Berita <em>Lokal dan Luar Negeri</em> Berdasarkan sumber yang benar-benar valid dan terpercaya bukan Hoax. Beritax Company telah berdiri sejak tahun 2000</p>
      </div>

      <div class="p-4">
        <h4 class="font-italic">Archives</h4>
        <ol class="list-unstyled mb-0">
          <?php 
    $sql12b = "SELECT DISTINCT DATE_FORMAT(tgl_input, '%M %Y') AS tgl FROM berita ORDER BY tgl_input DESC LIMIT 12";
    $result12b = mysqli_query($conn, $sql12b);
    //associative array
    while($row12b = mysqli_fetch_assoc($result12b)){
    ?>
          <li><a href="#"><?=$row12b['tgl'];?></a></li>
        <?php } ?>
        </ol>
      </div>

      <div class="p-4">
        <h4 class="font-italic">Elsewhere</h4>
        <ol class="list-unstyled">
          <li><a href="https://github.com/yogafolio">GitHub</a></li>
          <!-- <li><a href="#">Twitter</a></li>
          <li><a href="#">Facebook</a></li> -->
        </ol>
      </div>
    </aside><!-- /.blog-sidebar -->

  </div><!-- /.row -->

</main><!-- /.container -->

<footer class="blog-footer">
  <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
  <p>
    <a href="#">Back to top</a>
  </p>
</footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<!--     <script type="text/javascript" src="./assets/js/jquery.js"></script>
 	<script type="text/javascript" src="./assets/js/popper.js"></script>
 	<script type="text/javascript" src="./assets/js/bootstrap.js"></script> -->
  </body>
  <script type="text/javascript">
      $(document).ready(function(){
        $("#register_hide").click(function(){
          $('#signup').hide(1000);
        })
        $("#register_show").click(function(){
          $("#signup").show(1000);
        })
      });
    </script>
</html>