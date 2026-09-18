<!-- ======= Bagian Portofolio ======= -->
<section id="portfolio" class="portfolio sections-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Portofolio</h2>
        </div>

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
            data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">

            <div>
                <ul class="portfolio-flters">

                @foreach ($stack as $data)
                    <li data-filter=".filter-{{ $data->id }}" title="{{ $data->name }}">
                        @if ($data->logo)
                            <span class="portfolio-flter__icon">
                                <img src="{{ asset('upload/' . $data->logo) }}" alt="{{ $data->name }}"
                                    loading="lazy">
                            </span>
                            <span class="portfolio-flter__label">{{ $data->name }}</span>
                        @else
                            <span class="portfolio-flter__label portfolio-flter__label--only">{{ $data->name }}</span>
                        @endif
                    </li>
                @endforeach

            </ul><!-- Akhir Filter Portofolio -->
            </div>

            <div class="row gy-4 portfolio-container">

                @forelse ($product as $data)
                    <div class="col-xl-4 col-md-6 portfolio-item filter-{{ $data->stack_id }}">
                        <div class="portfolio-wrap">

                            <a href="{{ asset('upload/' . $data->avatar) }}"
                                data-gallery="portfolio-gallery-app-{{ $data->stack_id }}" class="glightbox">
                                <img src="{{ asset('upload/' . $data->avatar) }}" class="img-fluid"
                                    alt="Tangkapan layar proyek {{ $data->name }}" style="height: 300px">
                            </a>

                            <div class="portfolio-info">
                                <h4><a href="{{ $data->link }}" target="_blank" rel="noopener" title="Lihat Selengkapnya">{{ $data->name }}</a></h4>
                                <p style="text-transform: capitalize">{{ $data->title }}</p>
                            </div>

                        </div>
                    </div><!-- Akhir Item Portofolio -->
                @empty
                @endforelse

            </div><!-- Akhir Kontainer Portofolio -->

        </div>

    </div>
</section><!-- Akhir Bagian Portofolio -->

<style>
    .portfolio .portfolio-flters {
        display: flex;
        flex-wrap: wrap;
        align-items: flex-start;
        justify-content: center;
        gap: 1.4rem 1.8rem;
        padding: 0;
        margin: 0 0 2rem;
        list-style: none;
    }

    .portfolio .portfolio-flters li {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: .5rem;
        cursor: pointer;
        opacity: .55;
        transition: opacity .3s cubic-bezier(.25,.8,.25,1), transform .3s cubic-bezier(.25,.8,.25,1);
    }

    .portfolio .portfolio-flters li:hover {
        opacity: 1;
        transform: translateY(-2px);
    }

    .portfolio .portfolio-flters li.filter-active {
        opacity: 1;
    }

    .portfolio-flter__icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 72px;
        height: 72px;
        background: #fff;
        border: 1px solid #e6e6e6;
        border-radius: 10px;
        overflow: hidden;
        transition: border-color .3s ease, box-shadow .3s ease;
    }

    .portfolio .portfolio-flters li.filter-active .portfolio-flter__icon,
    .portfolio .portfolio-flters li:hover .portfolio-flter__icon {
        border-color: #0f7c6c;
        box-shadow: 0 6px 16px -8px rgba(15, 124, 108, .4);
    }

    .portfolio-flter__icon img {
        width: 60%;
        height: 60%;
        object-fit: contain;
        /* Hindari resize ganda (atribut width/height di <img> + CSS) yang bikin logo blur */
        image-rendering: -webkit-optimize-contrast;
        image-rendering: crisp-edges;
        backface-visibility: hidden;
        transform: translateZ(0);
    }

    .portfolio-flter__label {
        font-size: .78rem;
        font-weight: 600;
        color: #2e2438;
        text-align: center;
        line-height: 1.3;
        max-width: 90px;
    }

    .portfolio-flter__label--only {
        padding: .5rem 1rem;
        border: 1px solid #e6e6e6;
        border-radius: 8px;
    }
</style>