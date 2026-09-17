<!-- ======= Clients Section ======= -->
<section id="technology" class="clients">
    <div class="container" data-aos="zoom-out">

        <div class="section-header">
                <h2>Technology</h2>
                <p>Membuat pengalaman digital yang nyaman dan mudah digunakan di berbagai platform.</p>
            </div>

        <div class="clients-slider swiper">
            <div class="swiper-wrapper align-items-center">

                @foreach($technology as $data)

                <div class="swiper-slide">
                       
                        {!! $data->icon !!}
                        
                       
                </div>

                @endforeach

              
              



            </div>
        </div>

    </div>
</section><!-- End Clients Section -->