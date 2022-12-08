<!-- footer -->
<div class="card-footer bg-dark text-light">
   <br>
   <div class="container">
      <div class="row">
         <div class="col">
            <h6 class="content-title">Contact</h6>
            <hr>
            <p><i class="bi bi-building"></i> Gedung J sayap kiri lt. 3, Kampus 2 Universitas Muhammadiyah Surakarta, Jl. A. Yani, Mendungan, Pabelan, Kec. Kartasura, Kabupaten Sukoharjo, Jawa Tengah 57102</p>
            <p><i class="bi bi-telephone"></i> telp. / Whatapps : 082220574927</p>
            <p>
               <a href="mailto:immadammalik@gmail.com"><i class="bi bi-envelope" style="font-size: 2rem; color: #fff "></i></a> &nbsp; &nbsp;
               <a href="https://immadammalikfki.wordpress.com/" target="blank"><i class="bi bi-wordpress" style="font-size: 2rem; color: #fff "></i></a> &nbsp; &nbsp;
               <a href="https://www.instagram.com/immadammalikfki/" target="blank"><i class="bi bi-instagram" style="font-size: 2rem; color: #fff "></i></a> &nbsp; &nbsp;
               <a href="https://www.youtube.com/channel/UC_wTug-mCJp7lR3dJIjqqcA" target="blank"><i class="bi bi-youtube" style="font-size: 2rem; color: #fff "></i></a> &nbsp; &nbsp;
               <a href="https://twitter.com/IMMAdamMalikFKI" target="blank"><i class="bi bi-twitter" style="font-size: 2rem; color: #fff "></i></a> &nbsp; &nbsp;
               <a href="https://www.facebook.com/immadammalik" target="blank"><i class="bi bi-facebook" style="font-size: 2rem; color: #fff "></i></a>
            </p>
         </div>
         <div class="col">
            <h6 class="content-title">Location</h6>
            <hr>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.1673948016687!2d110.7688253143239!3d-7.556719576713711!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a145b690b9273%3A0x7b6de030da758cb2!2sFaculty%20of%20Communication%20and%20Information!5e0!3m2!1sen!2sid!4v1661176582804!5m2!1sen!2sid" width="350" height="170" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
         </div>
      </div>
      <div>
         <hr>
         <footer id="page-bottom" align="center">
            <div class="card-footer pb-3">
               <a>Copyright © Perpustakaan Warna Aksara. All Rights Reserved</a>
            </div>
         </footer>
      </div>
   </div>
</div>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="<?= base_url(); ?>/js/bootstrap.bundle.min.js"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<script src="<?= base_url(); ?>/js/popper.min.js"></script>
<script src="<?= base_url(); ?>/js/bootstrap.min.js"></script>

<!-- my js -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
<script src="<?= base_url(); ?>/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>/js/bootstrap.js"></script>
<script src="<?= base_url(); ?>/js/script.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>/js/jquery.easing.min.js"></script>

<!-- Preview Image -->
<script>
   function previewImg() {
      const sampul = document.querySelector('#sampul');
      const sampulLabel = document.querySelector('.custom-file-label');
      const imgPreview = document.querySelector('.img-preview');

      sampulLabel.textContent = sampul.files[0].name;

      const fileSampul = new FileReader();
      fileSampul.readAsDataURL(sampul.files[0]);

      fileSampul.onload = function(e) {
         imgPreview.src = e.target.result;
      }
   }
</script>

<!-- owl carousel -->
<script src="<?= base_url(); ?>/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>/js/owl.carousel.min.js"></script>
<script>
   $('.owl-carousel').owlCarousel({
      autoplay: true,
      autoplayhoverpause: true,
      autoplayTimeout: 2000,
      items: 4,
      nav: true,
      loop: true,
      lazyLoad: true,
      margin: 0,
      padding: 0,
      stagePadding: 0,
      responsive: {
         0: {
            items: 2,
            dots: false
         },
         485: {
            items: 3,
            dots: false
         },
         728: {
            items: 4,
            dots: false
         },
         960: {
            items: 5,
            dots: true
         },
         1200: {
            items: 7,
            dots: true
         }
      }
   })
</script>

<!-- dataTables Javascript -->
<script src="<?= base_url(); ?>/js/jquery-3.5.1.js"></script>
<script src="<?= base_url(); ?>/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/js/dataTables.bootstrap5.min.js"></script>
<script>
   $(document).ready(function() {
      $('#example').DataTable();
   });
</script>

<!-- detail pop up bukuindex -->
<!-- <script>
   $(document).ready(function() {
      $(document).on('click', '#detail', function() {
         var id = $(this).data('id');
         var judul = $(this).data('judul');
         var isbn = $(this).data('isbn');
         var genre = $(this).data('genre');
         var penulis = $(this).data('penulis');
         var penerbit = $(this).data('penerbit');
         var tahun = $(this).data('tahun');
         var halaman = $(this).data('halaman');
         var jumlah = $(this).data('jumlah');
         var eksemplar = $(this).data('eksemplar');
         var username = $(this).data('username');
         var tglpinjam = $(this).data('tglpinjam');
         var tglkembali = $(this).data('tglkembali');
         var sampul = $(this).data('sampul');
         $('#id_judul').text(id);
         $('#judul_buku').text(judul);
         $('#isbn').text(isbn);
         $('#genre').text(genre);
         $('#penulis').text(penulis);
         $('#penerbit').text(penerbit);
         $('#tahun').text(tahun);
         $('#halaman').text(halaman);
         $('#jumlah').text(jumlah);
         $('#eksemplar').text(eksemplar);
         $('#username').text(username);
         $('#tglpinjam').text(tglpinjam);
         $('#tglkembali').text(tglkembali);
         $('#sampull').prop('src', '/img/' + sampul);
      })
   })
</script> -->


</body>

</html>