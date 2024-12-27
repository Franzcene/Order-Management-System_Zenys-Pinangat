<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite(['resources/css/landing.css', 'resources/js/landing.js'])
</head>
<body class="index-page">
    <x-landing-header></x-landing-header>
    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section light-background">

            <div class="container">
                <div class="row gy-4 justify-content-center justify-content-lg-between">
                <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Pinangat <br>Perfection Awaits!</h1>
                    <p data-aos="fade-up" data-aos-delay="100">Serving you the finest pinangat, lovingly prepared to delight your taste buds. At Zeny's Pinangat, we bring the rich culinary heritage of Bicol straight to your table.<span id="dots">..</span><span id="more" style="display: none;"> Made from the freshest locally sourced ingredients, each bite of Pinangat is as experience of the authentic taste passed down through generations. Whether you love it spicy, savory, or creamy, our Pinangat will transport you to the heart of Bicol.</span> <a href="javascript:void(0);" onclick="readMore()" id="readMoreLink">read more</a></p>
                    <script>
                    function readMore() {
                        var dots = document.getElementById("dots");
                        var moreText = document.getElementById("more");
                        var linkText = document.getElementById("readMoreLink");

                        if (dots.style.display === "none") {
                            dots.style.display = "inline";
                            linkText.innerHTML = "read more";
                            moreText.style.display = "none";
                        } else {
                            dots.style.display = "none";
                            linkText.innerHTML = "read less";
                            moreText.style.display = "inline";
                        }
                    }
                    </script>
                    <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                    <a href="/customer/products" class="btn-get-started">Order Now</a>
                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                    <img src="{{ asset('images/hero-img.jpg')}}" class="img-fluid animated rounded" alt="">
                </div>
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- Menu Section -->
        <section id="menu" class="menu section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Our Menu</h2>
                <p><span>Check Our</span> <span class="description-title">Yummy Menu</span></p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

                    <div class="tab-pane fade active show" id="menu-starters">

                    <div class="tab-header text-center">
                        <p>Menu</p>
                        <h3>Starters</h3>
                    </div>

                    <div class="row gy-5">
                        <div class="col-lg-6 menu-item">
                            <a href="#" class="glightbox"><img src="{{ asset('images/classic-pinangat.jpg') }}" class="menu-img img-fluid" alt=""></a>
                            <h4>Classic Pinangat</h4>
                            <p class="ingredients">classic Bicolano dish made from taro leaves, coconut milk, and chili. </p>
                            <p class="price"> ₱50 </p>
                            <a href="/customer/products" class="btn-get-started">Order Now</a>
                        </div><!-- Menu Item -->

                        <div class="col-lg-6 menu-item">
                            <a href="#" class="glightbox"><img src="{{ asset('images/spicy-pinangat.jpg') }}" class="menu-img img-fluid" alt=""></a>
                            <h4>Spicy Pinangat</h4>
                            <p class="ingredients"> spicier version of the classic Bicolano dish made from taro leaves, coconut milk, and chili. </p>
                            <p class="price"> ₱55 </p>
                            <a href="/customer/products" class="btn-get-started">Order Now</a>
                        </div><!-- Menu Item -->
                    </div>
                    </div><!-- End Starter Menu Content -->
                </div>
            </div>
        </section><!-- /Menu Section -->

         <!-- Gallery Section -->
    <section id="gallery" class="gallery section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Gallery</h2>
          <p><span>Check</span> <span class="description-title">Our Gallery</span></p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

          <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
              {
                "loop": true,
                "speed": 600,
                "autoplay": {
                  "delay": 5000
                },
                "slidesPerView": "auto",
                "centeredSlides": true,
                "pagination": {
                  "el": ".swiper-pagination",
                  "type": "bullets",
                  "clickable": true
                },
                "breakpoints": {
                  "320": {
                    "slidesPerView": 1,
                    "spaceBetween": 0
                  },
                  "768": {
                    "slidesPerView": 3,
                    "spaceBetween": 20
                  },
                  "1200": {
                    "slidesPerView": 5,
                    "spaceBetween": 20
                  }
                }
              }
            </script>
            <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal1.jpg') }}"><img src="{{ asset('gallery/gal1.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal2.jpg') }}"><img src="{{ asset('gallery/gal2.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal3.jpg') }}"><img src="{{ asset('gallery/gal3.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal4.jpg') }}"><img src="{{ asset('gallery/gal4.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal5.jpg') }}"><img src="{{ asset('gallery/gal5.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal6.jpg') }}"><img src="{{ asset('gallery/gal6.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal7.jpg') }}"><img src="{{ asset('gallery/gal7.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal8.jpg') }}"><img src="{{ asset('gallery/gal8.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal9.jpg') }}"><img src="{{ asset('gallery/gal9.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal10.jpg') }}"><img src="{{ asset('gallery/gal10.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal11.jpg') }}"><img src="{{ asset('gallery/gal11.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal12.jpg') }}"><img src="{{ asset('gallery/gal12.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal13.jpg') }}"><img src="{{ asset('gallery/gal13.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal14.jpg') }}"><img src="{{ asset('gallery/gal14.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal15.jpg') }}"><img src="{{ asset('gallery/gal15.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal16.jpg') }}"><img src="{{ asset('gallery/gal16.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal17.jpg') }}"><img src="{{ asset('gallery/gal17.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal18.jpg') }}"><img src="{{ asset('gallery/gal18.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal19.jpg') }}"><img src="{{ asset('gallery/gal19.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal20.jpg') }}"><img src="{{ asset('gallery/gal20.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal21.jpg') }}"><img src="{{ asset('gallery/gal21.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal22.jpg') }}"><img src="{{ asset('gallery/gal22.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal23.jpg') }}"><img src="{{ asset('gallery/gal23.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal24.jpg') }}"><img src="{{ asset('gallery/gal24.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal25.jpg') }}"><img src="{{ asset('gallery/gal25.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal26.jpg') }}"><img src="{{ asset('gallery/gal26.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal27.jpg') }}"><img src="{{ asset('gallery/gal27.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal28.jpg') }}"><img src="{{ asset('gallery/gal28.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal29.jpg') }}"><img src="{{ asset('gallery/gal29.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal30.jpg') }}"><img src="{{ asset('gallery/gal30.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal31.jpg') }}"><img src="{{ asset('gallery/gal31.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal32.jpg') }}"><img src="{{ asset('gallery/gal32.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal33.jpg') }}"><img src="{{ asset('gallery/gal33.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal34.jpg') }}"><img src="{{ asset('gallery/gal34.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal35.jpg') }}"><img src="{{ asset('gallery/gal35.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal36.jpg') }}"><img src="{{ asset('gallery/gal36.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal37.jpg') }}"><img src="{{ asset('gallery/gal37.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal38.jpg') }}"><img src="{{ asset('gallery/gal38.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal39.jpg') }}"><img src="{{ asset('gallery/gal39.jpg') }}" class="img-fluid" alt=""></a></div>
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{ asset('gallery/gal40.jpg') }}"><img src="{{ asset('gallery/gal40.jpg') }}" class="img-fluid" alt=""></a></div>
            </div>
            <div class="swiper-pagination"></div>
          </div>

        </div>

      </section><!-- /Gallery Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Contact</h2>
                <p><span>Need Help?</span> <span class="description-title">Contact Us</span></p>
            </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="mb-5">
                <iframe style="width: 100%; height: 400px;" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1464.9849955155553!2d123.6609002891442!3d13.183281023410833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfil!2sph!4v1732259983449!5m2!1sfil!2sph" frameborder="0" allowfullscreen=""></iframe>
            </div><!-- End Google Maps -->

            <div class="row gy-4">

                <div class="col-md-6">
                    <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
                        <i class="icon bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                        <h3>Address</h3>
                        <p>Upper Gapo, Camalig, Albay PH</p>
                        </div>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-md-6">
                    <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
                        <i class="icon bi bi-telephone flex-shrink-0"></i>
                        <div>
                        <h3>Call Us</h3>
                        <p>0916-288-5491</p>
                        </div>
                    </div>
                </div><!-- End Info Item -->

                <!-- <div class="col-md-4">
                    <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
                        <i class="icon bi bi-envelope flex-shrink-0"></i>
                        <div>
                        <h3>Email Us</h3>
                        <p>test@test.com</p>
                        </div>
                    </div>
                </div>End Info Item -->

            </div>

            <form action="{{ route('contact.submit') }} " method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="600">
                @csrf
                <div class="row gy-4">

                <div class="col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                </div>

                <div class="col-md-6 ">
                    <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                </div>

                <div class="col-md-12">
                    <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                </div>

                <div class="col-md-12">
                    <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>

                    <button type="submit">Send Message</button>
                </div>

                </div>
            </form><!-- End Contact Form -->

        </div>

        </section><!-- /Contact Section -->

    </main>


    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
         function initSwiper() {
    console.log('initSwiper');
    document.querySelectorAll(".init-swiper").forEach(function(swiperElement) {
      let config = JSON.parse(
        swiperElement.querySelector(".swiper-config").innerHTML.trim()
      );

      if (swiperElement.classList.contains("swiper-tab")) {
        initSwiperWithCustomPagination(swiperElement, config);
      } else {
        new Swiper(swiperElement, config);
      }
    });
  }

  window.addEventListener("load", initSwiper);
    </script>

    <x-landing-footer></x-landing-footer>
</body>
</html>
