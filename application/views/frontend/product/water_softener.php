<!-- Swiper.js for slider -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<style>
    html {
        scroll-behavior: smooth;
    }
    body {
        font-family: 'Inter', sans-serif;
        background-color: #FFFFFF;
    }
    .section-title {
        font-size: 2.25rem;
        font-weight: 800;
        color: #111827;
    }
    .blue-btn {
            background-color: #3B82F6;
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: background-color 0.3s ease;
    }
    .blue-btn:hover {
        background-color: #2563EB;
    }
    .outline-btn {
            background-color: white;
            color: #3B82F6;
            border: 1px solid #3B82F6;
            padding: 0.75rem 2rem;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: background-color 0.3s ease, color 0.3s ease;
    }
    .outline-btn:hover {
            background-color: #EFF6FF;
    }
    .tab-nav a {
        transition: all 0.3s ease;
        color: #6B7280;
    }
    .tab-nav a.active {
        background-color: #3B82F6;
        color: white;
        box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
    }
    .sticky-tabs-container {
        position: -webkit-sticky;
        position: sticky;
        top: 80px; 
        background: transparent;
        z-index: 40;
    }

    .product-slider-container {
        position: relative;
        padding: 0 60px;
    }
    .product-slider {
        padding-bottom: 60px;
    }
    
    .swiper-button-next, .swiper-button-prev {
        color: #9CA3AF;
        background-color: transparent;
        border: none;
        box-shadow: none;
        width: 44px;
        height: 44px;
        top: 50%;
        transform: translateY(-calc(50% + 30px));
        transition: color 0.3s ease;
    }

    .swiper-button-next:hover, .swiper-button-prev:hover {
        color: #3B82F6; 
    }

    .swiper-button-prev {
        left: 10px; 
    }
    .swiper-button-next {
        right: 10px;
    }

    .swiper-button-next:after, .swiper-button-prev:after {
        font-size: 2rem; 
        font-weight: 800;
    }

    .swiper-pagination-bullet-active {
        background: #3B82F6 !important;
    }
    .swiper-slide {
        height: auto;
        display: flex;
        flex-direction: column;
    }
    .product-card {
        display: flex;
        flex-direction: column;
        height: 100%;
    }
</style>

<main>
    <!-- Hero Section -->
    <?php 
        if(isset($header) && !empty($header)) {
            foreach($header as $key => $header_item) { 
    ?>
    <section class="relative h-screen bg-cover bg-center" style="background-image: url('<?= base_url('uploads/');?>images/headers/<?= $header_item->images;?>');">
        <div class="absolute inset-0 bg-gradient-to-r from-white via-white/95 to-transparent"></div>
        <div class="relative container mx-auto px-6 h-full flex flex-col justify-center">
            <div class="w-full lg:w-1/2">
                <h3 class="text-sm font-bold tracking-wider uppercase text-blue-600"><?= $header_item->title;?></h3>
                <h1 class="text-4xl lg:text-5xl font-extrabold mt-2 leading-tight text-blue-600"><?= $header_item->subtitle;?></h1>
                <p class="mt-4 text-lg text-gray-700 max-w-xl">
                    <?= $header_item->description;?>
                </p>
            </div>
        </div>
    </section>
    <?php
            }
        }
    ?>

    <!-- Sticky Tabs Container -->
    <div class="sticky-tabs-container">
        <div class="container mx-auto px-6 py-3">
            <div class="bg-white rounded-full shadow-lg p-2 inline-flex items-center space-x-1 tab-nav">
                <a href="#overview-section" class="tab active py-2 px-6 rounded-full font-medium">Overview</a>
                <a href="#benefits-section" class="tab py-2 px-6 rounded-full font-medium">Benefits</a>
                <a href="#our-treatment-system" class="tab py-2 px-6 rounded-full font-medium">Specification Product</a>
            </div>
        </div>
    </div>
    
    <!-- Overview Section -->
    <?php 
        if(isset($overviews) && !empty($overviews)) {
            foreach($overviews as $key => $overview) { 
    ?>
    <section id="overview-section" class="container mx-auto px-6 pt-20">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h3 class="text-2xl font-bold text-gray-800"><?= $overview->title;?></h3>
                <h2 class="text-4xl font-extrabold text-gray-900 mt-2"><?= $overview->subtitle;?></h2>
                <p class="mt-4 text-gray-600"><?= $overview->description;?></p>
            </div>
            <div>
                <img src="<?= base_url('uploads/');?>images/products/overview/<?= $overview->images;?>" class="rounded-lg shadow-lg" alt="Wanita melihat segelas air keruh">
            </div>
        </div>
    </section>
    <?php
            }
        }
    ?>

    <!-- Did You Know Section -->
    <?php 
        if(isset($did_you_know) && !empty($did_you_know)) {
            foreach($did_you_know as $key => $dyk) { 
    ?>
    <section class="container mx-auto px-6 py-20 text-center">
        <h3 class="text-4xl font-bold text-blue-600"><?= $dyk->title;?></h3>
        <p class="mt-4 max-w-4xl mx-auto text-gray-700"><?= $dyk->description;?></p>
        <div class="mt-8 flex justify-center px-4">
            <img src="<?= base_url('uploads/');?>images/products/did_you_know/<?= $dyk->images;?>" alt="Peta Indonesia" class="rounded-lg w-full max-w-3xl">
        </div>
    </section>
    <?php
            }
        }
    ?>

    <!-- Benefits Section -->
    <section id="benefits-section" class="container mx-auto px-6 pb-20 pt-20">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-blue-600">Benefits of Using a Water Softener System</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8 text-center">
            <?php 
                if(isset($benefit) && !empty($benefit)) {
                    foreach($benefit as $key => $benefit_item) { 
            ?>
            <div class="flex flex-col items-center">
                <img src="<?= base_url('uploads/');?>images/products/benefit/<?= $benefit_item->images;?>" alt="Cleaner and Safer Water" class="rounded-full w-32 h-32 object-cover shadow-lg">
                <h3 class="font-bold text-lg mt-4"><?= $benefit_item->title;?></h3>
                <p class="text-gray-600 text-sm mt-1"><?= $benefit_item->description;?></p>
            </div>
            <?php
                    }
                }
            ?>
        </div>
    </section>

    <!-- Our Treatment System Section -->
    <?php 
        if(isset($advantages) && !empty($advantages)) {
            foreach($advantages as $key => $advantage) { 
    ?>
    <section class="container mx-auto px-6 py-20">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800"><?= $advantage->title;?></h2>
        </div>
        <div class="flex justify-center">
            <img src="<?= base_url('uploads/');?>images/products/advantage/<?= $advantage->images;?>" onerror="this.onerror=null;this.src='https://placehold.co/1000x500/FEE2E2/B91C1C?text=Before+%26+After+Comparison';" alt="Before and After Comparison" class="rounded-lg shadow-md max-w-4xl w-full h-full object-cover">
        </div>
    </section>
    <?php
            }
        }
    ?>

    <!-- Why Choose Section -->
    <?php 
        if(isset($did_you_know2) && !empty($did_you_know2)) {
            foreach($did_you_know2 as $key => $dyk2) { 
    ?>
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6 text-center">
            <h2 class="section-title"><?= $dyk2->title;?></h2>
            <h3 class="mt-2 text-2xl font-semibold text-gray-800">Fresh Water, Long Lasting Equipment</h3>
            <p class="mt-4 max-w-3xl mx-auto text-gray-600"><?= $dyk2->description;?></p>
        </div>
    </section>
    <?php
            }
        }
    ?>
    
    <section id="our-treatment-system" class="py-20">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-blue-600">Find the Best Water Treatment System for Your Needs</h2>
            </div>

            <div class="product-slider-container">
                <div class="swiper product-slider">
                    <div class="swiper-wrapper">

                        <?php if(isset($products) && !empty($products)) : foreach($products as $product) : ?>
                        <div class="swiper-slide">
                            <div class="product-card border border-gray-200 rounded-2xl p-6">
                                <img src="<?= base_url("uploads/images/products/all_products/$product->images") ?>" alt="Water Softener 1" class="mx-auto mb-4 h-48 object-contain">
                                <h3 class="text-xl font-bold text-left"><?= $product->name; ?></h3>

                                <a href="#" class="text-sm text-blue-600 hover:underline mb-4 block text-left">Spesification</a>

                                <div class="space-y-3 text-sm flex-grow">
                                    <?php if(isset($product->details) && !empty($product->details)) : foreach($product->details as $detail) : ?>
                                        <div class="flex justify-between border-b pb-2">
                                            <span class="text-gray-600"><?= $detail->key_field ?></span>
                                            <span class="font-semibold text-right"><?= $detail->value_field ?></span>
                                        </div>
                                    <?php endforeach; endif; ?>
                                </div>
                                
                                <div class="text-center">
                                    <a href="<?= $product->link ?>" class="blue-btn mt-6 inline-block" target="_blank">CONTACT US</a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; endif; ?>

                    </div>

                    <div class="swiper-pagination"></div>
                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>
</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Initialize Feather Icons
        if (typeof feather !== 'undefined') {
            feather.replace();
        }

        // Mobile Menu Toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenuButton) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
        
        // Sticky tabs logic
        const header = document.querySelector('header');
        const tabsContainer = document.querySelector('.sticky-tabs-container');
        const tabs = document.querySelectorAll('.tab-nav a');
        const sections = document.querySelectorAll('main > section[id]');

        if (header && tabsContainer && tabs.length > 0 && sections.length > 0) {
            const headerHeight = header.offsetHeight;
            tabsContainer.style.top = `${headerHeight}px`;
            
            const stickyNavHeight = tabsContainer.offsetHeight;
            const scrollOffset = headerHeight + stickyNavHeight;

            tabs.forEach(tab => {
                tab.addEventListener('click', function (e) {
                    e.preventDefault();
                    tabs.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                    const targetId = this.getAttribute('href');
                    const targetSection = document.querySelector(targetId);
                    if (targetSection) {
                        const targetPosition = targetSection.getBoundingClientRect().top + window.pageYOffset - scrollOffset;
                        window.scrollTo({ top: targetPosition, behavior: 'smooth' });
                    }
                });
            });

            const onScroll = () => {
                const scrollPosition = window.scrollY;
                sections.forEach(sec => {
                    if (sec.offsetTop - scrollOffset <= scrollPosition && sec.offsetTop + sec.offsetHeight - scrollOffset > scrollPosition) {
                        tabs.forEach(t => t.classList.remove('active'));
                        const correspondingTab = document.querySelector(`.tab-nav a[href="#${sec.id}"]`);
                        if (correspondingTab) {
                            correspondingTab.classList.add('active');
                        }
                    }
                });
            };
            window.addEventListener('scroll', onScroll);
        }

        // Swiper slider initialization
        const swiper = new Swiper('.product-slider', {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 32,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                    spaceBetween: 32
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 32
                }
            },
        });
    });
</script>

