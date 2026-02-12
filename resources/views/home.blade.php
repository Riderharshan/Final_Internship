@extends('layout.app')

@section('content')


<!-- ✅ LOAD LOTTIE ONCE -->
<script
  src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.11/dist/dotlottie-wc.js"
  type="module">
</script>

<!-- BRAND LOGO / HERO -->
<section class="brand-hero reveal delay-1">
    <img src="{{ asset('images/web-logo.png') }}" alt="Rider's Den Logo">
    <h1>Rider’s Den</h1>
    <p>Built for Riders. Trusted for Performance.</p>
</section>
<div class="divider reveal delay-2"></div>
<!-- ================= BLOG HERO ================= -->
<section class="blog-section blog-hero reveal">
    <div class="blog-row">

        <div class="blog-hero-text">
            <h1>Stories From the Road</h1>
            <p>
    Tips, builds, maintenance guides, and real rider experiences curated by Rider’s Den
    for the riding community. This space is built for riders who want to understand
    their machines better, make informed upgrade decisions, and ride with confidence.
    From beginner-friendly advice to insights shared by experienced enthusiasts,
    we cover everything from daily maintenance and safety practices to performance
    enhancements and long-distance riding tips. Every journey has a story, every
    machine has a personality, and every upgrade has a purpose — and this is where
    those stories come together.
</p>

        </div>

        <div class="blog-animation">
            <dotlottie-wc
              src="https://lottie.host/d6eeed10-5069-4711-8578-acb4bed5241b/dkTvK6cKaD.lottie"
              autoplay loop>
            </dotlottie-wc>
        </div>

    </div>
</section>

<div class="divider"></div>

<!-- ================= FEATURED BLOG ================= -->
<section class="blog-section featured-blog reveal delay-1">
    <div class="blog-row reverse">

        <!-- ✅ TEXT FIRST -->
        <div class="featured-content">
            <h1 class="section-title">Beginner’s Guide to Bike Modifications</h1>
            
            <p>
    Modifying your motorcycle isn’t just about looks or sound — it’s about
    improving control, enhancing safety, and creating a machine that truly
    matches your riding style and daily needs. The right modifications can
    increase comfort, boost handling, and make long rides more enjoyable
    without compromising reliability. This guide walks beginners through
    smart and practical upgrades, explains which modifications offer real
    performance benefits, highlights common mistakes to avoid, and helps
    riders build confidence step by step while keeping their bike safe,
    legal, and road-ready.
</p>

        </div>

        <!-- ✅ LOTTIE SECOND -->
        <div class="blog-animation">
           <dotlottie-wc src="https://lottie.host/d8af41ac-654c-4199-b98e-cb1b39ea8db3/4aBhMaz812.lottie" autoplay loop> </dotlottie-wc>
        </div>

    </div>
</section>

<div class="divider"></div>

<!-- ================= BLOG LIST ================= -->
<section class="blog-section blog-list reveal delay-2">

    <div class="blog-row">

        <div class="blog-text">
            <h1>How to Choose the Right Bike Accessories</h1>
            <p>
    Choosing the right accessories can completely change the way your motorcycle
    feels on the road, improving both comfort and confidence while you ride.
    From essential safety gear and protective add-ons to comfort-focused upgrades
    designed for long journeys, the right choices make a real difference.
    We explain how to select accessories based on your riding style, daily usage,
    and road conditions, helping you invest in upgrades that enhance performance,
    reduce fatigue, and make every ride safer, smoother, and more enjoyable.
</p>

           
        </div>

        <div class="blog-animation">
            <dotlottie-wc
              src="https://lottie.host/52ca7d17-ef6b-4804-9036-40e2a4b3c623/KV9F2Flpc9.lottie"
              autoplay loop>
            </dotlottie-wc>
        </div>

    </div>

    <div class="divider"></div>

    <div class="blog-row reverse">

        <!-- ✅ TEXT FIRST -->
        <div class="blog-text">
            <h1>Chain Maintenance Every Rider Must Know</h1>
            <p>
    A clean and well-maintained chain plays a major role in improving mileage,
    power delivery, and overall riding smoothness. Regular chain care reduces
    wear on sprockets, prevents unnecessary power loss, and helps your motorcycle
    respond more predictably on the road. Learn simple, effective maintenance
    routines such as proper cleaning, lubrication, and tension adjustment that
    extend chain life, reduce long-term repair costs, and keep your ride smooth,
    responsive, and reliable in both daily commuting and long-distance riding.
</p>

            
        </div>

        <!-- ✅ LOTTIE SECOND -->
        <div class="blog-animation">
            <dotlottie-wc
              src="https://lottie.host/e48a3193-ae7e-420d-93d5-ebadeaf7aa1a/JhzPvZwuag.lottie"
              autoplay loop>
            </dotlottie-wc>
        </div>

    </div>

</section>

<div class="divider"></div>

<!-- ================= RIDER TIPS ================= -->
<section class="blog-section rider-tips reveal delay-3">
    <div class="blog-row">

        <div class="tips-text">
            <h1 class="section-title">Rider Knowledge Hub</h1>
            <p>
    Safety should always come first, no matter the distance or riding experience.
    From reliable braking systems and well-maintained tires to certified riding
    gear and protective accessories, the right choices play a critical role in
    reducing risk on the road. Proper safety upgrades not only protect your
    motorcycle from damage but also safeguard your life, improve reaction time,
    and provide confidence in unpredictable traffic and weather conditions,
    ensuring every ride is as safe and controlled as possible.
</p>

        </div>

        <div class="blog-animation">
            <dotlottie-wc
              src="https://lottie.host/2487bb64-735a-40e8-8e86-8a3319c32674/FrZTAlAfHF.lottie"
              autoplay loop>
            </dotlottie-wc>
        </div>

    </div>
</section>

<div class="divider"></div>

<!-- ================= COMMUNITY STORIES ================= -->
<section class="blog-section community reveal delay-4">
    <div class="blog-row reverse">

        <!-- ✅ TEXT FIRST -->
        <div class="community-text">
            <h1>Built by Riders, For Riders</h1>
            <p>
    Every build has a story behind it, shaped by the rider’s passion, goals,
    and experiences on the road. At Rider’s Den, we support a growing community
    of riders who value craftsmanship, safety, and individuality in every
    modification they make. From first-time modifiers learning the basics to
    experienced enthusiasts refining performance and style, we stand with
    riders at every stage of their journey—offering guidance, trusted products,
    and shared knowledge that helps each build reflect the rider behind it.
</p>

        </div>

        <!-- ✅ LOTTIE SECOND -->
        <div class="blog-animation">
            <dotlottie-wc
              src="https://lottie.host/0144da47-7453-48c5-9971-ff2ac6894348/xQvtwWPU9Z.lottie"
              autoplay loop>
            </dotlottie-wc>
        </div>

    </div>
</section>

<div class="divider"></div>

<!-- ================= JOURNEY ================= -->
<section class="blog-section journey reveal">
    <div class="blog-row">

        <div class="journey-text">
            <h1 class="section-title">Our Journey</h1>
            <ul class="journey-list">
    <li>2022 – Rider’s Den was founded with a passion for bikes</li>
    <li>2023 – Supported over 100 rider modifications and upgrades</li>
    <li>2024 – Built a trusted rider-focused community</li>
    <li>2026 – Evolved into a reliable bike accessories hub</li>
</ul>
 <div class="community-text">
<p>
    What started as a shared passion for motorcycles has grown into a platform
    driven by real rider needs and experiences. Over the years, Rider’s Den has
    focused on learning from the community, improving product quality, and
    offering reliable guidance to riders at every level. Each milestone reflects
    our commitment to growing responsibly, staying rider-first, and continuing
    to support safer, smarter, and more personalized riding journeys.
</p>
</div>
        </div>

        <div class="blog-animation">
            <dotlottie-wc
              src="https://lottie.host/bede5368-adfb-4eb5-ac2c-aca8ac6929d5/DORBwWYd5x.lottie"
              autoplay loop>
            </dotlottie-wc>
        </div>

    </div>
</section>

<div class="divider"></div>

<!-- ================= CTA ================= -->
<!-- ================= CTA WITH CENTERED TEXT & SLIDER ================= -->
<section class="blog-section blog-cta reveal">

    <div class="cta-centered">
        <h1>Ride Smarter. Ride Stronger.</h1>

        <p>
            Learn from real rider experiences, make informed upgrades,
            and ride with confidence. Rider’s Den is more than a store —
            it’s a space where riders grow, learn, and build better machines.
        </p>
    </div>

    <!-- IMAGE SLIDER -->
    <div class="build-slider flip-slider">
        <img
            id="buildSliderImage"
            src="{{ asset('images/build-1.jpg') }}"
            alt="Modified Bike Build">
    </div>

</section>
{{-- 🏍 BIKE COMPANIES SECTION --}}

<div class="divider reveal delay-1"></div>

<h4 class="brands-title reveal delay-4">Bike Brands We Work With</h4>

<div class="brands-viewport">
    <div class="brands-track" id="homeBrandsTrack">

        <!-- Bike brand logos -->
        <div class="brand-slide"><img src="/images/bikes/honda.png" alt="Honda"></div>
        <div class="brand-slide"><img src="/images/bikes/yamaha.png" alt="Yamaha"></div>
        <div class="brand-slide"><img src="/images/bikes/ktm.png" alt="KTM"></div>
        <div class="brand-slide"><img src="/images/bikes/royal-enfield.png" alt="Royal Enfield"></div>
        <div class="brand-slide"><img src="/images/bikes/bajaj.png" alt="Bajaj"></div>
        <div class="brand-slide"><img src="/images/bikes/suzuki.png" alt="Suzuki"></div>
        <div class="brand-slide"><img src="/images/bikes/tvs.png" alt="TVS"></div>
        <div class="brand-slide"><img src="/images/bikes/kawasaki.png" alt="Kawasaki"></div>
        <div class="brand-slide"><img src="/images/bikes/hero.png" alt="Hero"></div>
        <div class="brand-slide"><img src="/images/bikes/ducati.png" alt="Ducati"></div>
        <div class="brand-slide"><img src="/images/bikes/aprilia.png" alt="Aprilia"></div>

    </div>
</div>

<script>
const homeTrack = document.getElementById('homeBrandsTrack');
const homeSlides = homeTrack.querySelectorAll('.brand-slide');
const homeViewport = homeTrack.parentElement;

let homeIndex = 0;

function moveHomeBrands() {

    homeSlides.forEach(slide => slide.classList.remove('active'));

    const activeSlide = homeSlides[homeIndex];
    activeSlide.classList.add('active');

    const viewportWidth = homeViewport.offsetWidth;
    const slideCenter =
        activeSlide.offsetLeft -
        viewportWidth / 2 +
        activeSlide.offsetWidth / 2;

    homeTrack.style.transition = 'transform 0.6s ease';
    homeTrack.style.transform = `translateX(-${slideCenter}px)`;

    homeIndex++;

    if (homeIndex >= homeSlides.length) {
        setTimeout(() => {
            homeTrack.style.transition = 'none';
            homeTrack.style.transform = 'translateX(0px)';

            homeSlides.forEach(slide => slide.classList.remove('active'));
            homeSlides[0].classList.add('active');

            homeIndex = 1;
        }, 700);
    }
}

moveHomeBrands();
setInterval(moveHomeBrands, 2200);
</script>


<script>
    const images = [
        "{{ asset('images/build-1.jpg') }}",
        "{{ asset('images/build-2.jpg') }}",
        "{{ asset('images/build-3.jpg') }}",
        "{{ asset('images/build-4.jpg') }}",
        "{{ asset('images/build-5.jpg') }}",
        "{{ asset('images/build-6.jpg') }}"
    ];

    let index = 0;
    let rotation = 0;

    const sliderImage = document.getElementById('buildSliderImage');

    setInterval(() => {
        rotation += 360;

        /* Start full rotation */
        sliderImage.style.transform = `rotateY(${rotation}deg)`;

        /* Change image exactly at half flip */
        setTimeout(() => {
            index = (index + 1) % images.length;
            sliderImage.src = images[index];
        }, 500);

    }, 3000);
</script>



@endsection
