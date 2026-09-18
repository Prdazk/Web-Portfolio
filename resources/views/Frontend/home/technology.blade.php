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

                            @if ($data->category)
                                <div class="tech-card__category">{{ $data->category }}</div>
                            @endif

                            <h3 class="tech-card__title">{{ $data->name }}</h3>

                            <p class="tech-card__desc">{{ \Illuminate\Support\Str::limit($data->description, 90) }}</p>

                            @if ($data->stack_id)
                                <div class="tech-card__stack">
                                    @foreach (array_filter(array_map('trim', explode(',', $data->stack_id))) as $techName)
                                        <span class="tech-card__stack-tag">{{ $techName }}</span>
                                    @endforeach
                                </div>
                            @endif

                           @php
                                $galleryImages = collect();
                                if ($data->screenshot) {
                                    $galleryImages->push(asset('upload/' . $data->screenshot));
                                }
                                if ($data->images && $data->images->count()) {
                                    foreach ($data->images as $img) {
                                        $galleryImages->push(asset('upload/' . $img->image));
                                    }
                                }
                            @endphp

                            @if ($data->github_link || $data->demo_link || $galleryImages->count())
                            <div class="tech-card__links">
                                @if ($data->github_link)
                                    <a href="{{ $data->github_link }}" target="_blank" rel="noopener" class="tech-card__link tech-card__link--github">
                                        <i class="bi bi-github"></i> Kode
                                    </a>
                                @endif

                               @if ($galleryImages->count())
                                    <button type="button"
                                            class="tech-card__link tech-card__link--view"
                                            data-images="{{ $galleryImages->toJson() }}"
                                            data-title="{{ $data->name }}"
                                            data-stack="{{ $data->stack_id }}"
                                            onclick="openTechPreview(this)">
                                        <i class="bi bi-eye-fill"></i> Lihat @if($galleryImages->count() > 1)({{ $galleryImages->count() }})@endif
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

        <button type="button" class="tech-preview-fullscreen" id="techPreviewFullscreenBtn" onclick="toggleTechPreviewFullscreen()" aria-label="Layar penuh">
            <i class="bi bi-arrows-fullscreen"></i>
        </button>

        <button type="button" class="tech-preview-close" onclick="closeTechPreview(event)" aria-label="Tutup">
            <i class="bi bi-x-lg"></i>
        </button>

        <div class="tech-preview-stage">
            <button type="button" class="tech-preview-nav tech-preview-nav--prev" onclick="changeTechPreview(-1)" aria-label="Sebelumnya">
                <i class="bi bi-chevron-left"></i>
            </button>

            <div class="tech-preview-imgwrap">
                <img src="" alt="" id="techPreviewImage">
            </div>

            <button type="button" class="tech-preview-nav tech-preview-nav--next" onclick="changeTechPreview(1)" aria-label="Berikutnya">
                <i class="bi bi-chevron-right"></i>
            </button>
        </div>

        <div class="tech-preview-footer">
            <div class="tech-preview-stackchips" id="techPreviewStackChips"></div>
        </div>

    </div>
</div>

<style>
   .technology-showcase {
        --tech-ink: #251c33;
        --tech-accent: #8b5cf6;
        --tech-accent-deep: #6d28d9;
        --tech-accent-soft: #f2ecfe;
        --tech-accent-glow: rgba(139, 92, 246, .35);
        --tech-muted: #8b83a1;
        --tech-line: #e7defc;
        --tech-card-bg: #faf7ff;
        padding: 30px 0;
    }

    /* ===== Kartu ===== */
    .tech-card {
    position: relative;
    height: 100%;
    width: 90%;
    margin: 0 auto;

    background: linear-gradient(180deg, #ffffff, var(--tech-card-bg));
    border: 1px solid var(--tech-line);
    border-radius: 16px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    box-shadow: 0 2px 6px rgba(109, 40, 217, .05);
    transition: transform .35s cubic-bezier(.2, .8, .2, 1),
                box-shadow .35s ease,
                border-color .35s ease;
    }

    .tech-card::before {
        content: "";
        position: absolute;
        inset: 0;
        padding: 1px;
        border-radius: 16px;
        background: linear-gradient(135deg, var(--tech-accent), transparent 40%);
        -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        -webkit-mask-composite: xor;
        mask-composite: exclude;
        opacity: 0;
        transition: opacity .35s ease;
        pointer-events: none;
    }

    .tech-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 24px 40px -18px var(--tech-accent-glow);
        border-color: transparent;
    }

    .tech-card:hover::before {
        opacity: 1;
    }

    /* ===== Gambar & Tombol View ===== */
    .tech-card__image {
        position: relative;
        width: 100%;
        aspect-ratio: 16 / 9;
        overflow: hidden;
        background: linear-gradient(135deg, var(--tech-accent-soft), #ece3fd);
    }

    .tech-card__image::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, transparent 55%, rgba(37, 28, 51, .55) 100%);
        opacity: 0;
        transition: opacity .35s ease;
    }

    .tech-card:hover .tech-card__image::after {
        opacity: 1;
    }

    .tech-card__image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .5s cubic-bezier(.2, .8, .2, 1);
    }

    .tech-card:hover .tech-card__image img {
        transform: scale(1.08);
    }

    .tech-card__image-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .tech-card__diamond {
        width: 22px;
        height: 22px;
        background: linear-gradient(135deg, var(--tech-accent), var(--tech-accent-deep));
        transform: rotate(45deg);
        display: inline-block;
        border-radius: 4px;
        box-shadow: 0 8px 18px -6px var(--tech-accent-glow);
    }

    /* ===== Body Kartu ===== */
    .tech-card__body {
        padding: .7rem .9rem .75rem;
        text-align: center;
        display: flex;
        flex-direction: column;
    }

    /* ===== Kategori ===== */
    .tech-card__category {
        margin-bottom: .4rem;
    }

    /* ===== Judul ===== */
    .tech-card__title {
        font-size: .96rem;
        line-height: 1.3;
        margin: 0 0 .35rem;
    }

    /* ===== Deskripsi ===== */
    .tech-card__desc {
        font-size: .8rem;
        line-height: 1.5;
        color: #5c5468;
        margin: 0 0 .5rem;
    }

    /* ===== Teknologi ===== */
    .tech-card__stack {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        gap: .3rem;
        margin-bottom: .55rem;
    }

    /* ===== Tombol ===== */
    .tech-card__links {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        gap: .5rem;
        padding-top: 0;
    }

    .tech-card__link {
        display: inline-flex;
        align-items: center;
        gap: .4rem;
        font-size: .74rem;
        font-weight: 700;
        text-decoration: none;
        padding: .45rem .85rem;
        border-radius: 999px;
        transition: all .25s ease;
        border: 1px solid transparent;
    }

    .tech-card__link--github {
        color: var(--tech-ink);
        background: #f4f1fa;
        border-color: #e9e3f7;
    }

    .tech-card__link--github:hover {
        background: var(--tech-ink);
        color: #fff;
        transform: translateY(-2px);
    }

    .tech-card__link--view {
        background: linear-gradient(135deg, var(--tech-accent-soft), #ece2fe);
        border-color: var(--tech-line);
        color: var(--tech-accent-deep);
        cursor: pointer;
        font-family: inherit;
    }

    .tech-card__link--view:hover {
        background: linear-gradient(135deg, var(--tech-accent), var(--tech-accent-deep));
        color: #fff;
        border-color: transparent;
        transform: translateY(-2px);
        box-shadow: 0 10px 20px -8px var(--tech-accent-glow);
    }

    .tech-card__link--demo {
        background: linear-gradient(135deg, var(--tech-accent), var(--tech-accent-deep));
        color: #fff;
        box-shadow: 0 8px 18px -8px var(--tech-accent-glow);
    }

    .tech-card__link--demo:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 24px -8px var(--tech-accent-glow);
        color: #fff;
    }

    .tech-preview-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(15, 12, 20, .82);
        -webkit-backdrop-filter: blur(5px);
        backdrop-filter: blur(5px);
        z-index: 9999;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        opacity: 0;
        transition: opacity .4s cubic-bezier(.4, 0, .2, 1);
    }

    .tech-preview-overlay.active {
        display: flex;
        opacity: 1;
    }

    .tech-preview-box {
        position: relative;
        max-width: 900px;
        width: 100%;
        background: #1c1620;
        border: 1px solid rgba(255, 255, 255, .08);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 30px 60px -20px rgba(0, 0, 0, .55);
        transform: scale(.96) translateY(10px);
        transition: transform .4s cubic-bezier(.34, 1.1, .4, 1), opacity .4s ease;
        opacity: 0;
    }

    .tech-preview-overlay.active .tech-preview-box {
        transform: scale(1) translateY(0);
        opacity: 1;
    }
        .tech-preview-stage {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #0f0b14;
    }

    .tech-preview-imgwrap {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .tech-preview-imgwrap img {
        width: 100%;
        max-height: 70vh;
        object-fit: contain;
        display: block;
        opacity: 0;
        transform: scale(.97);
        transition: opacity .3s ease, transform .3s ease;
    }

    .tech-preview-imgwrap img.is-visible {
        opacity: 1;
        transform: scale(1);
    }

    .tech-preview-footer {
        padding: 1.1rem 1.4rem 1.8rem;
        text-align: center;
    }

        .tech-preview-footer p {
        margin: 0 0 .55rem;
        font-size: .95rem;
        font-weight: 800;
        color: #fdfcff;
        letter-spacing: .01em;
    }

    .tech-preview-stackchips {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        gap: .4rem;
        margin-bottom: .9rem;
    }

    .tech-preview-stackchips span {
        display: inline-flex;
        align-items: center;
        font-size: .62rem;
        font-weight: 600;
        color: #e4defc;
        background: rgba(139, 92, 246, .18);
        border: 1px solid rgba(139, 92, 246, .3);
        padding: .18rem .55rem;
        border-radius: 999px;
        letter-spacing: .01em;
    }

    .tech-preview-dots {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: .45rem;
    }

    .tech-preview-dots span {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: rgba(255, 255, 255, .25);
        cursor: pointer;
        transition: all .25s ease;
    }

    .tech-preview-dots span:hover {
        background: rgba(255, 255, 255, .55);
    }

    .tech-preview-dots span.is-active {
        background: linear-gradient(135deg, var(--tech-accent), #a78bfa);
        width: 22px;
        border-radius: 4px;
    }

    .tech-preview-fullscreen {
        position: absolute;
        top: 1rem;
        right: 4.2rem;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        border: 1px solid rgba(255, 255, 255, .18);
        background: rgba(255, 255, 255, .08);
        -webkit-backdrop-filter: blur(6px);
        backdrop-filter: blur(6px);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: .85rem;
        z-index: 3;
        transition: background .25s ease, transform .3s ease;
    }

    .tech-preview-fullscreen:hover {
        background: var(--tech-accent-deep);
        transform: scale(1.08);
    }

    .tech-preview-box.is-fullscreen {
        position: fixed;
        inset: 0;
        max-width: 100vw;
        width: 100vw;
        height: 100vh;
        margin: 0;
        border-radius: 0;
        display: flex;
        flex-direction: column;
        transform: none !important;
    }

    .tech-preview-box.is-fullscreen .tech-preview-stage {
        flex: 1;
        min-height: 0;
    }

    .tech-preview-box.is-fullscreen .tech-preview-imgwrap {
        height: 100%;
    }

    .tech-preview-box.is-fullscreen .tech-preview-imgwrap img {
        max-height: 100%;
        max-width: 100%;
        width: auto;
    }
    .tech-preview-close {
        position: absolute;
        top: 1rem;
        right: 1rem;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        border: 1px solid rgba(255, 255, 255, .18);
        background: rgba(255, 255, 255, .08);
        -webkit-backdrop-filter: blur(6px);
        backdrop-filter: blur(6px);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: .9rem;
        z-index: 3;
        transition: background .25s ease, transform .3s ease;
    }

    .tech-preview-close:hover {
        background: var(--tech-accent-deep);
        transform: rotate(90deg);
    }
    .tech-preview-nav {
        position: relative;
        flex: 0 0 auto;
        width: 46px;
        height: 46px;
        margin: 0 .7rem;
        border-radius: 50%;
        border: 1px solid rgba(255, 255, 255, .18);
        background: rgba(255, 255, 255, .08);
        -webkit-backdrop-filter: blur(6px);
        backdrop-filter: blur(6px);
        color: #fff;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 1.15rem;
        display: none;
        z-index: 3;
        transition: background .25s ease, transform .2s ease, box-shadow .25s ease;
    }

    .tech-preview-nav:hover {
        background: linear-gradient(135deg, var(--tech-accent), var(--tech-accent-deep));
        transform: scale(1.1);
        box-shadow: 0 10px 22px -8px var(--tech-accent-glow);
    }

    .tech-preview-nav:active {
        transform: scale(.94);
    }

    @media (max-width: 576px) {
        .tech-preview-nav {
            width: 38px;
            height: 38px;
            margin: 0 .35rem;
        }

        .tech-preview-box {
            border-radius: 18px;
        }
    }
</style>

<script>
    let techPreviewImages = [];
    let techPreviewIndex = 0;

        function openTechPreview(btn) {
        const overlay = document.getElementById('techPreviewOverlay');
        const chipsWrap = document.getElementById('techPreviewStackChips');

        techPreviewImages = JSON.parse(btn.dataset.images || '[]');
        techPreviewIndex = 0;

        chipsWrap.innerHTML = '';
        const stackText = btn.dataset.stack || '';
        stackText.split(',')
            .map(s => s.trim())
            .filter(Boolean)
            .forEach(techName => {
                const chip = document.createElement('span');
                chip.textContent = techName;
                chipsWrap.appendChild(chip);
            });

        renderTechPreviewImage();
        renderTechPreviewDots();
        updateTechPreviewNav();

        overlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function changeTechPreview(direction) {
        if (techPreviewImages.length < 2) return;

        techPreviewIndex += direction;
        if (techPreviewIndex < 0) techPreviewIndex = techPreviewImages.length - 1;
        if (techPreviewIndex >= techPreviewImages.length) techPreviewIndex = 0;

        renderTechPreviewImage();
        renderTechPreviewDots();
    }

    function goToTechPreview(index) {
        techPreviewIndex = index;
        renderTechPreviewImage();
        renderTechPreviewDots();
    }

    function renderTechPreviewImage() {
        const img = document.getElementById('techPreviewImage');
        img.classList.remove('is-visible');

        setTimeout(() => {
            img.src = techPreviewImages[techPreviewIndex] || '';
            img.onload = () => img.classList.add('is-visible');
        }, 120);
    }

    function renderTechPreviewDots() {
        // Dots dihapus dari tampilan
    }

    function updateTechPreviewNav() {
        const navBtns = document.querySelectorAll('.tech-preview-nav');
        const show = techPreviewImages.length > 1;
        navBtns.forEach(b => b.style.display = show ? 'flex' : 'none');
    }

       function toggleTechPreviewFullscreen() {
        const box = document.querySelector('.tech-preview-box');
        const btn = document.getElementById('techPreviewFullscreenBtn');
        const icon = btn.querySelector('i');

        box.classList.toggle('is-fullscreen');

        if (box.classList.contains('is-fullscreen')) {
            icon.classList.remove('bi-arrows-fullscreen');
            icon.classList.add('bi-fullscreen-exit');
            btn.setAttribute('aria-label', 'Keluar layar penuh');
        } else {
            icon.classList.remove('bi-fullscreen-exit');
            icon.classList.add('bi-arrows-fullscreen');
            btn.setAttribute('aria-label', 'Layar penuh');
        }
    }

    function closeTechPreview(e) {
        if (e.target.id === 'techPreviewOverlay' || e.target.closest('.tech-preview-close')) {
            document.getElementById('techPreviewOverlay').classList.remove('active');
            document.body.style.overflow = '';

            const box = document.querySelector('.tech-preview-box');
            const btn = document.getElementById('techPreviewFullscreenBtn');
            box.classList.remove('is-fullscreen');
            btn.querySelector('i').classList.remove('bi-fullscreen-exit');
            btn.querySelector('i').classList.add('bi-arrows-fullscreen');
        }
    }

    document.addEventListener('keydown', function (e) {
        const overlay = document.getElementById('techPreviewOverlay');
        if (!overlay.classList.contains('active')) return;

        if (e.key === 'Escape') {
            overlay.classList.remove('active');
            document.body.style.overflow = '';
        } else if (e.key === 'ArrowRight') {
            changeTechPreview(1);
        } else if (e.key === 'ArrowLeft') {
            changeTechPreview(-1);
        }
    });
</script>