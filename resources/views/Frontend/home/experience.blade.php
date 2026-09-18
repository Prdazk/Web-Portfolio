<!-- ======= Bagian Pengalaman Kerja ======= -->
<section id="experience" class="services sections-bg experience-section">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Pengalaman Kerja</h2>
        </div>

        <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">

            @forelse($experience_data as $item)

                @php
                    // Format rentang tanggal: "2024-04-16 to 2024-04-25" -> "Apr 2024 – Apr 2025"
                    $dateRange = explode(' to ', $item->date);
                    $start = \Carbon\Carbon::parse($dateRange[0])->translatedFormat('M Y');
                    $end = \Carbon\Carbon::parse($dateRange[1] ?? $dateRange[0])->translatedFormat('M Y');
                @endphp

                <div class="col-lg-4 col-md-6">
                    <div class="experience-card">
                        <div class="experience-card__top">
                            <div class="experience-card__icon">
                                <i class="bi bi-briefcase-fill"></i>
                            </div>
                            <div class="experience-card__period">{{ $start }} &ndash; {{ $end }}</div>
                        </div>

                        <h3 class="experience-card__company">{{ $item->company_name }}</h3>
                        <p class="experience-card__role">{{ $item->designation }}</p>

                        <hr class="experience-card__divider">

                        <p class="experience-card__label">Tanggung Jawab</p>
                        <div class="experience-card__body">
                            {!! $item->responsiblity !!}
                        </div>
                    </div>
                </div><!-- Akhir Item Pengalaman -->

            @empty
                <div class="col-12">
                    <p class="text-center">Belum ada pengalaman kerja untuk ditampilkan.</p>
                </div>
            @endforelse

        </div>

    </div>
</section><!-- Akhir Bagian Pengalaman Kerja -->

<style>
    .experience-section {
        --exp-ink: #2b1f28;
        --exp-accent: #8a4b6b;
        --exp-accent-deep: #6b3552;
        --exp-muted: #7a6a76;
        --exp-line: #ecdfe5;
        --exp-card-bg: #fffbfd;
    }

    .experience-card {
        height: 100%;
        background: var(--exp-card-bg);
        border: 1px solid var(--exp-line);
        border-left: 4px solid var(--exp-accent);
        border-radius: 6px;
        padding: 1.35rem 1.25rem;
        display: flex;
        flex-direction: column;
        transition: transform .2s ease, box-shadow .2s ease;
    }

    .experience-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 24px -16px rgba(107, 53, 82, .35);
    }

    .experience-card__top {
        display: flex;
        align-items: center;
        gap: .75rem;
        margin-bottom: 1rem;
    }

    .experience-card__icon {
        flex-shrink: 0;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: rgba(138, 75, 107, .12);
        color: var(--exp-accent-deep);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
    }

    .experience-card__period {
        font-size: .76rem;
        font-weight: 600;
        letter-spacing: .02em;
        color: var(--exp-accent-deep);
        background: rgba(138, 75, 107, .1);
        padding: .28rem .65rem;
        border-radius: 100px;
        white-space: nowrap;
    }

    .experience-card__company {
        font-size: 1.05rem;
        font-weight: 700;
        color: var(--exp-ink);
        line-height: 1.35;
        margin: 0 0 .15rem;
    }

    .experience-card__role {
        font-size: .88rem;
        color: var(--exp-muted);
        margin: 0;
    }

    .experience-card__divider {
        border: none;
        border-top: 1px solid var(--exp-line);
        margin: 1rem 0;
        opacity: 1;
    }

    .experience-card__label {
        font-size: .74rem;
        font-weight: 700;
        letter-spacing: .03em;
        color: var(--exp-ink);
        margin: 0 0 .4rem;
    }

    .experience-card__body {
        font-size: .88rem;
        line-height: 1.6;
        color: #4a4139;
    }

    .experience-card__body p:last-child {
        margin-bottom: 0;
    }

    .experience-card__body ul,
    .experience-card__body ol {
        padding-left: 1.1rem;
        margin-bottom: 0;
    }
</style>