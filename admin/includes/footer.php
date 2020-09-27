	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
	<script type="text/javascript" src="../assets/js/dashboard.js"></script>
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!-- lokasi bootstrap validator untuk validasi form -->
    <script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.0/dist/bootstrap-validate.js" ></script>
    <script type="text/javascript">
    bootstrapValidate('#input_tambah_nama_kategori', 'required:Please fill out this field!');
    bootstrapValidate('#id', 'required:Please fill out this field!');
    bootstrapValidate('#input_edit_nama_kategori', 'required:Please fill out this field!');
    bootstrapValidate('#input_tambah_nama_kategori_berita', 'required:Please fill out this field!');
    bootstrapValidate('#input_tambah_judul_berita', 'required:Please fill out this field!');
    bootstrapValidate('#input_tambah_isi_berita', 'required:Please fill out this field!');
    bootstrapValidate('#input_edit_nama_kategori_berita', 'required:Please fill out this field!');
    bootstrapValidate('#input_edit_judul_berita', 'required:Please fill out this field!');
    bootstrapValidate('#input_edit_isi_berita', 'required:Please fill out this field!');
    bootstrapValidate('#qwqwqw', 'required:Please fill out this field!');


    </script>
<!--     <script type="text/javascript" src="./assets/js/jquery.js"></script>
 	<script type="text/javascript" src="./assets/js/popper.js"></script>
 	<script type="text/javascript" src="./assets/js/bootstrap.js"></script> -->
<script type="text/javascript">
  function validate(){
    
  }
</script>
 </body>
 <!--SCRIPT UNTUK MANAJEMEN USER-->
 <script type="text/javascript" src="../assets/js/jquery.js"></script>
  <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

 <script type="text/javascript">
 	function active_inactive_user(val,user_id){
 		$.ajax({
 			type: 'post',
 			url: 'change.php',
 			data: {val:val,user_id:user_id},
 			success: function(result){
 				if (result==1) {
 					$('#sts'+user_id).html('Active').css('color', 'green');
 				}
 				else {
 					$('#sts'+user_id).html('Inactive').css('color', 'red');
 				}
 			}
 		});
 	}
 </script>

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