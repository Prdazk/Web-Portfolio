 <!-- ======= Hero Section ======= -->
 <section id="hero" class="hero">
     <div class="container position-relative">
         <div class="row gy-5" data-aos="fade-in">
             <div
                 class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                 <h2>Hi there! I'm<span> Laduni Prada</span></h2>
                 <p style="font-size : 20px">
                    {{ $hero?->description ?? '' }}
                 </p>
                 <div class="d-flex cv-button justify-content-center justify-content-lg-start">
                     <a href="{{ asset('Frontend/assets/cv/CV_Laduni_Prada.pdf') }}"
                        class="btn-get-started"
                        download>

                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-download">

                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="7 10 12 15 17 10"></polyline>
                                <line x1="12" y1="15" x2="12" y2="3"></line>

                            </svg>

                            Download CV
                        </a>

                     <a style="margin-left: 15px" href="https://github.com/Prdazk"
                         class="btn-get-started">

                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-github">
                             <path
                                 d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                             </path>
                         </svg>
                         Check Github

                     </a>

                     <!--<a href="https://www.youtube.com/watch?v=LXb3EKWsInQ"
                         class="glightbox btn-watch-video d-flex align-items-center"><i
                             class="bi bi-play-circle"></i><span>Watch Video</span></a> -->
                 </div>
             </div>
             <div class="col-lg-6  order-1 order-lg-2 ">
                <img src="{{ asset('Frontend/assets/img/Profil.png') }}"
                style="width: 400px; height: 450px; object-fit: cover; border-radius: 0; -webkit-mask-image: linear-gradient(to bottom, black 60%, transparent 100%), linear-gradient(to right, transparent 0%, black 15%, black 85%, transparent 100%); -webkit-mask-composite: source-in; mask-image: linear-gradient(to bottom, black 60%, transparent 100%), linear-gradient(to right, transparent 0%, black 15%, black 85%, transparent 100%); mask-composite: intersect;" 
                class="img-fluid personal-avatar" alt="Laduni Prada"
                    data-aos="zoom-out" data-aos-delay="100">
            </div>
         </div>
     </div>

     <div class="icon-boxes position-relative">
         <div class="container position-relative">
             <div class="row gy-4 mt-5">

                 @foreach ($icon_data as $data)
                     <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                         <div class="icon-box">
                             <div class="icon">

                                 {!! $data->icon !!}

                             </div>
                             <h4 class="title"><a href="#" class="stretched-link">{{ $data->title }}</a>
                             </h4>
                         </div>
                     </div><!--End Icon Box -->
                 @endforeach

             </div>
         </div>
     </div>

     </div>
 </section>
 <!-- End Hero Section -->
