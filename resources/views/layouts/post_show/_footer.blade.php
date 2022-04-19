<!-- Footer -->

<footer class="container">
    <div class="footer__content">
        <div class="footer__logo">
          <img src="{{ asset('assets/img/logo.png') }}" alt="logo">
          <h1>Bring Ha Noi to you!</h1>
        </div>
        <div class="footer__contact">
          <h3>Contact</h3>
          <h3>0123456789</h3>
          <h3>reviewhanoi@gmail.com</h3>
        </div>
        <div class="footer__socials">
          <h3>Follow us</h3>
          <div class="socials">
            <a href="#"><img src="{{ asset('assets/img/facebook.png') }}" alt="facebook"></a>
            <a href="#"><img src="{{ asset('assets/img/instagram.png') }}" alt="instagram"></a>
            <a href="#"><img src="{{ asset('assets/img/tik-tok.png') }}" alt="tiktok"></a>
          </div>
        </div>
    </div>
    <div class="footer__info">
      <h3>Copyright &copy; 2020-2021. All right reserved by <span>ReviewHanoi</span></h3>
      <a href="#"><i class="fa-solid fa-circle-arrow-up"></i></i></a>
    </div>
</footer>

<script src="{{ asset('js/slider.js') }}"></script>
<!-- Swipper Slider JS -->
<script src="{{ asset('js/swiper.min.js') }}"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 3,
            slidesPerGroup: 3,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
    <script>
        if ($('.image-link').length) {
            $('.image-link').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        }
        if ($('.image-link2').length) {
            $('.image-link2').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        }
    </script>
   



</body>
</html>