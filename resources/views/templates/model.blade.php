@php

    $pricingPlans = [
        [
            'title' => 'Paket Portofolio',
            'subtitle' => 'Desain (Ekonomis)',
            'price' => 'Rp3.500.000 / Proyek',
            'features' => [
                'Durasi kerja maks. 4 jam (setelah hari kerja)',
                '10 foto final yang sudah diedit rapi',
                'Hanya untuk 1 client (hanya 1 model atau tema)',
            ],
        ],
        [
            'title' => 'Paket Residential',
            'subtitle' => 'Komersial (Mengengah)',
            'price' => 'Rp7.500.000 / Proyek',
            'features' => [
                'Durasi kerja 8-10 jam (sehari penuh, menerima gagal 1-2 jam jika dibutuhkan)',
                '25 foto final (gabungan indoor & exterior)',
                'Teknik edit exposure blending manual',
                'Hak guna komersial untuk promosi website, brosur dan cetak',
            ],
        ],
        [
            'title' => 'Paket Korpora &',
            'subtitle' => 'High-Rise (Premium)',
            'price' => 'Rp18.000.000 / Proyek',
            'features' => [
                'Waktu pemotretan 1-2 hari fleksibel (menyesuaikan cuaca)',
                '50+ foto final resolusi ultra tinggi',
                'Penggunaan lensa khusus untuk detail, True-Shi ft agar gedung tidak terlihat miring',
                'Temusak foto udara dengan drone',
            ],
        ],
    ];
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portfolio Template</title>
    <style>
        :root {
            --bg: #3f5547;
            --bg-2: #4c6657;
            --text: #f4efe9;
            --muted: rgba(255, 255, 255, 0.78);
            --card: #f2f0ee;
            --card-text: #2f2f2f;
            --line: rgba(255,255,255,0.35);
            --soft-border: rgba(255,255,255,0.18);
            --shadow: rgba(0,0,0,0.14);
            --purple: #b27fc9;
            --green: #7bc58b;
            --blue: #7ab7d8;
        }

        * { box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, sans-serif;
            background: var(--bg);
            color: var(--text);
        }

        .page {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px 32px 50px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0 20px;
        }

        .menu {
            display: flex;
            gap: 38px;
            font-size: 1.02rem;
            font-weight: 500;
            letter-spacing: 0.02em;
            color: rgba(255,255,255,0.95);
        }

        .menu a {
            color: inherit;
            text-decoration: none;
        }

        .section-title {
            margin: 0 0 22px;
            text-align: center;
            font-size: clamp(2rem, 3vw, 3.1rem);
            font-weight: 500;
            letter-spacing: 0.01em;
            color: rgba(255,255,255,0.96);
        }

        .about-wrap {
            display: grid;
            grid-template-columns: 340px 1fr;
            gap: 36px;
            align-items: center;
            padding: 20px 0 18px;
            border-top: 1px solid var(--line);
            border-bottom: 1px solid var(--line);
            margin-bottom: 30px;
        }

        .portrait-frame {
            width: min(100%, 300px);
            height: 255px;
            margin: 0 auto;
            border-radius: 30px 30px 30px 30px;
            overflow: hidden;
            border: 4px solid rgba(255,255,255,0.12);
            box-shadow: 0 18px 26px rgba(0,0,0,0.12);
            background: #d9d7d2;
        }

        .portrait-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .about-copy {
            max-width: 520px;
            font-size: 1.05rem;
            line-height: 1.7;
            color: rgba(255,255,255,0.76);
        }

        .profile-name {
            margin: 0 0 10px;
            font-size: clamp(2rem, 3vw, 2.7rem);
            line-height: 1.2;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: 0.02em;
        }

        .about-copy p {
            margin: 0 0 14px;
        }

        .gallery {
            padding-top: 8px;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(180px, 1fr));
            gap: 16px 22px;
            justify-items: center;
            margin-top: 20px;
        }

        .gallery-item {
            width: 100%;
            max-width: 250px;
            aspect-ratio: 1 / 1;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 8px 16px rgba(0,0,0,0.15);
            background-size: cover;
            background-position: center;
        }

        .pricing {
            padding-top: 24px;
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(210px, 1fr));
            gap: 22px;
            margin-top: 30px;
        }

        .price-card {
            background: rgba(255,255,255,0.9);
            color: var(--card-text);
            border-radius: 18px;
            padding: 18px 18px 16px;
            box-shadow: 0 8px 18px var(--shadow);
            min-height: 330px;
        }

        .price-card h4 {
            margin: 0 0 4px;
            font-size: 1.02rem;
            font-weight: 700;
            line-height: 1.4;
        }

        .price-card .subtitle {
            font-size: 0.9rem;
            color: rgba(0,0,0,0.75);
            margin: 0 0 8px;
        }

        .price-card .price {
            font-size: 1.08rem;
            font-weight: 700;
            color: #1d1d1d;
            margin: 0 0 14px;
        }

        .price-card ul {
            margin: 0;
            padding-left: 18px;
            font-size: 0.92rem;
            line-height: 1.6;
            color: rgba(18,18,18,0.8);
        }

        li + li { margin-top: 4px; }

        .contact {
            padding-top: 28px;
        }

        .contact-wrap {
            display: grid;
            grid-template-columns: 1.4fr 0.8fr;
            gap: 18px;
            align-items: end;
            margin-top: 20px;
        }

        .contact-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .social-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            min-height: 64px;
            border-radius: 16px;
            text-decoration: none;
            font-size: clamp(1.1rem, 2vw, 2.2rem);
            font-weight: 700;
            color: white;
            box-shadow: 0 8px 18px rgba(0,0,0,0.08);
            transition: transform 0.2s ease;
        }

        .social-link:hover { transform: translateY(-2px); }

        .ig { background: linear-gradient(135deg, #b57adc, #9d67c5); }
        .wa { background: linear-gradient(135deg, #7ecf9a, #5ec28d); }
        .fb { background: linear-gradient(135deg, #84bce9, #5a8fd0); }

        .contact-portrait {
            width: min(100%, 280px);
            height: 280px;
            margin-left: auto;
            border-radius: 50% 50% 40% 40%;
            overflow: hidden;
            border: 6px solid rgba(255,255,255,0.16);
            background: #ddd;
            box-shadow: 0 18px 28px rgba(0,0,0,0.12);
        }

        .contact-portrait img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .footer-copy {
            margin-top: 24px;
            color: rgba(255,255,255,0.78);
            line-height: 1.75;
            font-size: 1rem;
            max-width: 760px;
        }

        @media (max-width: 820px) {
            .page { padding-left: 22px; padding-right: 22px; }
            .about-wrap,
            .contact-wrap,
            .pricing-grid {
                grid-template-columns: 1fr;
            }

            .gallery-grid {
                grid-template-columns: repeat(2, minmax(150px, 1fr));
            }

            .contact-portrait {
                margin: 0 auto;
            }
        }

        @media (max-width: 520px) {
            .menu {
                gap: 18px;
                font-size: 0.9rem;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
            }

            .section-title { font-size: 2.3rem; }
        }

    </style>
</head>
<body>
    <div class="page">
        <header class="topbar">
            <nav class="menu" aria-label="Navigasi utama">
                <a href="#">Home</a>
                <a href="#">Gallery</a>
                <a href="#">Contact</a>
            </nav>
        </header>

        <section aria-labelledby="about-title">
            <h1 id="about-title" class="section-title">Tentang saya</h1>
            <div class="about-wrap">
                <div class="portrait-frame">
                <img src="{{ $websites->logo ? asset('storage/' . $websites->logo) : 'https://images.unsplash.com/photo-1517849845537-4d257902454a?auto=format&fit=crop&w=900&q=80' }}" alt="Potret profil cat" />                </div>
                <div class="about-copy">
                    <h2 class="profile-name">{{ $websites -> nama_website }}</h2>
                    <p>{{ $websites -> bio }}</p>
                </div>
            </div>
        </section>

        @php
            $galleryImages = $websites->gallery ?? [];

            if (is_string($galleryImages)) {
                $galleryImages = json_decode($galleryImages, true) ?? [];
            }

            if (!is_array($galleryImages)) {
                $galleryImages = [];
            }
        @endphp

        <section class="gallery" aria-labelledby="gallery-title">
            <h2 id="gallery-title" class="section-title" style="font-size: clamp(1.9rem, 2.5vw, 2.5rem);">Gallery</h2>
            <div class="gallery-grid">
                @foreach ($galleryImages as $image)
                    <div class="gallery-item" style="background-image: url('{{ asset('storage/' . $image) }}');"></div>
                @endforeach
            </div>
        </section>

        <section class="pricing" aria-labelledby="pricing-title">
            <h2 id="pricing-title" class="section-title" style="font-size: clamp(1.9rem, 2.5vw, 2.5rem);">Pricing</h2>
            <div class="pricing-grid">
                @foreach ($pricingPlans as $plan)
                    <article class="price-card">
                        <h4>{{ $plan['title'] }}</h4>
                        <p class="subtitle">{{ $plan['subtitle'] }}</p>
                        <p class="price">{{ $plan['price'] }}</p>
                        <ul>
                            @foreach ($plan['features'] as $feature)
                                <li>{{ $feature }}</li>
                            @endforeach
                        </ul>
                    </article>
                @endforeach
            </div>
        </section>

        <section class="contact" aria-labelledby="contact-title">
            <h2 id="contact-title" class="section-title" style="font-size: clamp(1.9rem, 2.5vw, 2.5rem);">Contact</h2>
            <div class="contact-wrap">
                <div class="contact-list">
                    <a href="#" class="social-link ig">Instagram</a>
                    <a href="#" class="social-link wa">Whatsapp</a>
                </div>

                
            </div>
            <p class="footer-copy">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
        </section>
    </div>
</body>
</html>
