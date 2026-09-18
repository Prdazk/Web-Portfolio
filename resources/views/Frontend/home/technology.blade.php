<!-- ======= Bagian Technology / Proyek ======= -->
<section id="technology" class="technology-showcase">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Proyek & Teknologi</h2>
        </div>

        <div class="row gy-3" data-aos="fade-up" data-aos-delay="100">

            @forelse ($technology as $data)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="tech-card">

                        <div class="tech-card__image">
                            @if ($data->screenshot)
                                <img src="{{ asset('upload/' . $data->screenshot) }}" alt="{{ $data->name }}" loading="lazy">
                            @else
                                <div class="tech-card__image-placeholder">
                                    <span class="tech-card__diamond"></span>
                                </div>
                            @endif
                        </div>

                        <div class="tech-card__body">

                            @if ($data->stack)
                                <div class="tech-card__category">{{ $data->stack->name }}</div>
                            @endif

                            <h3 class="tech-card__title">{{ $data->name }}</h3>

                            <p class="tech-card__desc">{{ \Illuminate\Support\Str::limit($data->description, 90) }}</p>

                         @if ($data->github_link || $data->demo_link || $data->screenshot)
                        <div class="tech-card__links">
                            @if ($data->github_link)
                                <a href="{{ $data->github_link }}" target="_blank" rel="noopener" class="tech-card__link tech-card__link--github">
                                    <i class="bi bi-github"></i> Kode
                                </a>
                            @endif

                            @if ($data->screenshot)
                                <button type="button"
                                        class="tech-card__link tech-card__link--view"
                                        data-img="{{ asset('upload/' . $data->screenshot) }}"
                                        data-title="{{ $data->name }}"
                                        onclick="openTechPreview(this)">
                                    <i class="bi bi-eye-fill"></i> Lihat 
                                </button>
                            @endif

                            @if ($data->demo_link)
                                <a href="{{ $data->demo_link }}" target="_blank" rel="noopener" class="tech-card__link tech-card__link--demo">
                                    <i class="bi bi-box-arrow-up-right"></i> Demo
                                </a>
                            @endif
                        </div>
                    @endif

                        </div>

                    </div>
                </div><!-- Akhir Kartu Proyek -->
            @empty
                <div class="col-12">
                    <p class="text-center">Belum ada proyek untuk ditampilkan.</p>
                </div>
            @endforelse

        </div>

    </div>
</section><!-- Akhir Bagian Technology / Proyek -->

<!-- Modal Preview Screenshot -->
<div class="tech-preview-overlay" id="techPreviewOverlay" onclick="closeTechPreview(event)">
    <div class="tech-preview-box">
        <button type="button" class="tech-preview-close" onclick="closeTechPreview(event)">
            <i class="bi bi-x-lg"></i>
        </button>
        <img src="" alt="" id="techPreviewImage">
        <p id="techPreviewTitle"></p>
    </div>
</div>

<style>
    .technology-showcase {
        --tech-ink: #2e2438;
        --tech-accent: #8a6fd4;
        --tech-accent-deep: #6c4fc7;
        --tech-accent-soft: #f1ecfb;
        --tech-muted: #8579a0;
        --tech-line: #e6def7;
        --tech-card-bg: #fdfcff;
        padding: 20px 0;
    }

    /* ===== Kartu ===== */
    .tech-card {
        height: 100%;
        background: var(--tech-card-bg);
        border: 1px solid var(--tech-line);
        border-radius: 10px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        box-shadow: 0 1px 2px rgba(46, 36, 56, .04);
        transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
    }

    .tech-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 16px 30px -16px rgba(108, 79, 199, .35);
        border-color: var(--tech-accent);
    }

    /* ===== Gambar & Tombol View ===== */
    .tech-card__image {
        position: relative;
        width: 100%;
        aspect-ratio: 16 / 9;
        overflow: hidden;
        background: var(--tech-accent-soft);
    }

    .tech-card__image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .35s ease, filter .35s ease;
    }

    .tech-card:hover .tech-card__image img {
        transform: scale(1.06);
        filter: brightness(.75);
    }

    .tech-card__image-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .tech-card__diamond {
        width: 20px;
        height: 20px;
        background: var(--tech-accent);
        transform: rotate(45deg);
        display: inline-block;
    }

        .tech-card__link--view {
        background: transparent;
        border: 1px solid var(--tech-accent);
        color: var(--tech-accent-deep);
        font-family: inherit;
        cursor: pointer;
    }

    .tech-card__link--view:hover {
        background: var(--tech-accent);
        color: #fff;
        transform: translateY(-1px);
    }

    /* ===== Body — rata tengah, seperti referensi ===== */
    .tech-card__body {
        padding: 1.1rem 1rem 1.2rem;
        text-align: center;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .tech-card__category {
        font-size: .66rem;
        font-weight: 700;
        letter-spacing: .1em;
        text-transform: uppercase;
        color: var(--tech-muted);
        margin-bottom: .4rem;
    }

    .tech-card__title {
        font-size: .92rem;
        font-weight: 700;
        color: var(--tech-ink);
        line-height: 1.35;
        margin: 0 0 .5rem;
    }

    .tech-card__desc {
        font-size: .78rem;
        line-height: 1.55;
        color: #4a4152;
        margin: 0 0 .9rem;
        flex-grow: 1;
    }

    .tech-card__divider {
        border: none;
        border-top: 1px solid var(--tech-line);
        margin: 0 0 .8rem;
        width: 100%;
        opacity: 1;
    }

    /* ===== Link Demo & Kode — sejajar tengah seperti referensi ===== */
    .tech-card__links {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1.2rem;
        margin-top: auto;
    }

    .tech-card__link {
        display: inline-flex;
        align-items: center;
        gap: .35rem;
        font-size: .74rem;
        font-weight: 600;
        color: var(--tech-accent-deep);
        text-decoration: none;
        transition: color .2s ease;
    }

    .tech-card__link:hover {
        color: var(--tech-ink);
    }

    .tech-card__link--github {
        color: var(--tech-muted);
    }

    .tech-card__link--github:hover {
        color: var(--tech-ink);
    }

    /* ===== Modal Preview ===== */
    .tech-preview-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(46, 36, 56, .75);
        z-index: 9999;
        align-items: center;
        justify-content: center;
        padding: 2rem 1rem;
    }

    .tech-preview-overlay.active {
        display: flex;
    }

    .tech-preview-box {
        position: relative;
        max-width: 800px;
        width: 100%;
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 20px 50px rgba(0, 0, 0, .3);
    }

    .tech-preview-box img {
        width: 100%;
        max-height: 70vh;
        object-fit: contain;
        display: block;
        background: var(--tech-accent-soft);
    }

    .tech-preview-box p {
        margin: 0;
        padding: .8rem 1rem;
        font-size: .85rem;
        font-weight: 600;
        color: var(--tech-ink);
        text-align: center;
    }

    .tech-preview-close {
        position: absolute;
        top: .6rem;
        right: .6rem;
        width: 34px;
        height: 34px;
        border-radius: 50%;
        border: none;
        background: rgba(0, 0, 0, .55);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background .2s ease;
    }

    .tech-preview-close:hover {
        background: var(--tech-accent-deep);
    }
</style>

<script>
    function openTechPreview(btn) {
        const overlay = document.getElementById('techPreviewOverlay');
        const img = document.getElementById('techPreviewImage');
        const title = document.getElementById('techPreviewTitle');

        img.src = btn.dataset.img;
        img.alt = btn.dataset.title;
        title.textContent = btn.dataset.title;

        overlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeTechPreview(e) {
        if (e.target.id === 'techPreviewOverlay' || e.target.closest('.tech-preview-close')) {
            document.getElementById('techPreviewOverlay').classList.remove('active');
            document.body.style.overflow = '';
        }
    }
</script>