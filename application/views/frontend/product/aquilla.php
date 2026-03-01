<style>
    body {
        font-family: 'Inter', sans-serif;
        background-color: #FFFFFF;
        overflow-x: hidden;
    }
    .outline-btn {
        background-color: transparent;
        color: #3B82F6;
        border: 2px solid #3B82F6;
        padding: 0.75rem 2rem;
        border-radius: 8px; 
        font-weight: 600;
        transition: all 0.3s ease;
        text-align: center;
    }
    .outline-btn:hover {
        background-color: #3B82F6;
        color: white;
    }
    .solid-btn {
        background-color: #3B82F6;
        color: white;
        padding: 0.75rem 2rem;
        border-radius: 8px;
        font-weight: 600;
        transition: background-color 0.3s ease;
        text-align: center;
    }
    .solid-btn:hover {
        background-color: #2563EB;
    }

    /* -- STYLES UNTUK HORIZONTAL SCROLL -- */
    .features-wrapper {
        position: relative;
        background-color: #fff;
    }
    .sticky-container {
        position: sticky;
        top: 0;
        height: 100vh;
        width: 100%;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    
    .horizontal-scroll {
        display: flex;
        height: auto;
        align-items: center;
        width: max-content;
        gap: 2.5rem; /* Jarak antar kartu */
        padding: 0 5vw; /* Padding di awal dan akhir scroll */
    }
    .feature-card {
        flex-shrink: 0;
        width: 80vw;
        max-width: 1000px;
        height: auto;
        position: relative; /* Diperlukan untuk memposisikan teks */
    }
    .faucet-card {
        flex-shrink: 0;
        width: 60vw; /* Lebar kartu lebih kecil */
        max-width: 700px; /* Batas lebar maksimum */
        height: auto;
        position: relative;
    }
    .lifestyle-card {
        flex-shrink: 0;
        width: auto;
        height: 65vh; /* Menyesuaikan tinggi kartu */
        max-width: 1000px;
    }
</style>

<main>
    <!-- Banner Section (Full Page) -->
    <section class="min-h-screen flex flex-col justify-center bg-white py-12">
        <div class="container mx-auto px-6">
            <?php 
                if (isset($description1) && !empty($description1)) {
                    foreach($description1 as $key => $desc_item) { 
            ?>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <div class="text-center lg:text-left">
                    <h1 class="text-4xl md:text-5xl font-extrabold text-gray-800 tracking-tight"><?= strtoupper($desc_item->title);?></h1>
                    <p class="mt-4 text-lg text-gray-600 max-w-md mx-auto lg:mx-0">
                        <?= $desc_item->description;?>
                    </p>
                    <div class="mt-8">
                        <a href="#features-wrapper" class="outline-btn !rounded-full inline-block">Explore <?= $desc_item->title;?>!</a>
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <img src="<?= base_url('uploads/');?>images/products/all_products/<?= $desc_item->images;?>" alt="Onyx Water Dispenser" class="max-w-sm md:max-w-md lg:max-w-full">
                </div>
            </div>
            <?php
                    }
                }
            ?>
        </div>
    </section>

   <!-- Features Section (Horizontal Scroll) -->
    <section id="features-wrapper">
        <div class="sticky-container">
            <h2 class="text-4xl font-bold text-center text-gray-800 px-6 pb-10">Catch the highlight.</h2>
            
            <div class="horizontal-scroll">
                <?php 
                    if (isset($image) && !empty($image)) {
                        foreach($image as $key => $img_item) { 
                ?>
                <div class="feature-card">
                    <!-- PERUBAHAN: Menambahkan flexbox untuk perataan vertikal -->
                    <div class="absolute top-<?= $img_item->padding_top;?> <?= $img_item->position2;?> -translate-<?= $img_item->translate;?>-1/2 text-<?= $img_item->position;?> w-2/5 z-10">
                        <h3 class="text-3xl md:text-4xl font-bold text-gray-800"><?= $img_item->title;?></h3>
                        <p class="mt-4 text-md md:text-lg text-gray-600"><?= $img_item->description;?></p>
                    </div>
                    <img src="<?= base_url('uploads/');?>images/products/all_products/<?= $img_item->images;?>" alt="Smart LED & TDS Display" class="rounded-2xl w-full h-auto">
                </div>
                <?php
                        }
                    }
                ?>
            </div>
            <!-- Progress Bar -->
            <div class="absolute bottom-10 left-1/2 -translate-x-1/2 w-1/3 max-w-xs h-1.5 bg-gray-300 rounded-full">
                <div id="progress-bar" class="h-full bg-gray-800 rounded-full transition-all duration-100 ease-linear"></div>
            </div>
        </div>
    </section>

    <!-- Aquilla 500G Second to None Section -->
    <?php 
        if (isset($description3) && !empty($description3)) {
            foreach($description3 as $key => $desc_item) { 
    ?>
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6 text-center">
            <div class="bg-gray-100 rounded-2xl p-8 md:p-12 max-w-5xl mx-auto flex flex-col justify-between min-h-[70vh] overflow-hidden">
                <div class="text-center pt-8">
                    <h2 class="text-5xl font-bold text-gray-800"><?= $desc_item->title;?></h2>
                    <p class="mt-2 text-2xl text-gray-600"><?= $desc_item->subtitle;?></p>
                </div>
                <div class="flex-grow flex items-end justify-center -mb-8">
                    <img src="<?= base_url('uploads/');?>images/products/all_products/<?= $desc_item->images;?>" alt="Aquilla 500G Unit" class="max-w-md lg:max-w-lg mx-auto transform scale-110">
                </div>
            </div>
                <p class="max-w-3xl mx-auto text-gray-600 mt-8"><?= $desc_item->description;?></p>
        </div>
    </section>
    <?php
            }
        }
    ?>

    <!-- Flexible Faucet Section (Horizontal Scroll) -->
    <section id="features-wrapper-2" class="features-wrapper">
        <div class="sticky-container">
            <h2 class="text-4xl font-bold text-center text-gray-800 px-6 pb-4">Flexible, Easy to Use, Durable Material</h2>
            <p class="text-lg text-center text-gray-600 px-6 mb-8">Modern Faucet Solutions for Your Daily Needs and Innovative Designs that Make Every Kitchen Activity Easier</p>
            <div class="horizontal-scroll">
                 <?php 
                    if (isset($description4) && !empty($description4)) {
                        foreach($description4 as $key => $desc_item) { 
                ?>
                <div class="faucet-card relative">
                    <p class="absolute top-6 left-6 text-lg font-semibold text-gray-700"><?= $desc_item->title ;?></p>
                    <img src="<?= base_url('uploads/');?>images/products/all_products/<?= $desc_item->images;?>" alt="<?= $desc_item->description ;?>" class="rounded-2xl w-full h-auto">
                </div>
                <?php
                        }
                    }
                ?>
            </div>
            <!-- Progress Bar 2 -->
            <div class="absolute bottom-10 left-1/2 -translate-x-1/2 w-1/3 max-w-xs h-1.5 bg-gray-300 rounded-full">
                <div id="progress-bar-2" class="h-full bg-gray-800 rounded-full transition-all duration-100 ease-linear"></div>
            </div>
        </div>
    </section>

    <!-- 6 Stages Filtration Section -->
    <?php 
        if (isset($description5) && !empty($description5)) {
            foreach($description5 as $key => $desc_item) { 
    ?>
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold text-gray-800"><?= $desc_item->title;?></h2>
            <p class="mt-4 max-w-3xl mx-auto text-gray-600"><?= $desc_item->description;?></p>
            <img src="<?= base_url('uploads/');?>images/products/all_products/<?= $desc_item->images;?>" alt="Diagram 6 tahap filtrasi" class="w-full max-w-5xl mx-auto mt-8">
        </div>
    </section>
    <?php
            }
        }
    ?>

    <!-- Compact & Stylish Section -->
    <?php 
        if (isset($description6) && !empty($description6)) {
            foreach($description6 as $key => $desc_item) { 
    ?>
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold text-gray-800"><?= $desc_item->title;?></h2>
            <p class="mt-2 text-2xl text-gray-600 mb-12"><?= $desc_item->subtitle;?></p>
            <div class="bg-gray-100 rounded-2xl p-8 md:p-12 max-w-6xl mx-auto">
                <img src="<?= base_url('uploads/');?>images/products/all_products/<?= $desc_item->images;?>" alt="Aquilla 500G dari berbagai sudut" class="w-full h-auto">
            </div>
            <p class="max-w-3xl mx-auto text-gray-600 mt-8"><?= $desc_item->description;?></p>
        </div>
    </section>
    <?php
            }
        }
    ?>

    <!-- Anytime to get clean water Section (Horizontal Scroll) -->
    <section id="features-wrapper-3" class="features-wrapper">
         <div class="sticky-container">
            <h2 class="text-4xl font-bold text-center text-gray-800 px-6 pb-10">Anytime to get clean water</h2>
            <div class="horizontal-scroll">
                <?php 
                    if (isset($description7) && !empty($description7)) {
                        foreach($description7 as $key => $desc_item) { 
                ?>
                <div class="lifestyle-card">
                    <img src="<?= base_url('uploads/');?>images/products/all_products/<?= $desc_item->images;?>" alt="<?= $desc_item->description;?>" class="rounded-2xl w-full h-full object-cover">
                </div>
                <?php
                        }
                    }
                ?>
            </div>
            <!-- Progress Bar 3 -->
            <div class="absolute bottom-10 left-1/2 -translate-x-1/2 w-1/3 max-w-xs h-1.5 bg-gray-300 rounded-full">
                <div id="progress-bar-3" class="h-full bg-gray-800 rounded-full transition-all duration-100 ease-linear"></div>
            </div>
        </div>
    </section>

    <!-- Trust in Every Drop Section -->
    <?php 
        if (isset($description8) && !empty($description8)) {
            foreach($description8 as $key => $desc_item) { 
    ?>
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="md:w-1/2">
                    <img src="<?= base_url('uploads/');?>images/products/all_products/<?= $desc_item->images;?>" alt="Keluarga bahagia dengan air bersih" class="rounded-2xl w-full">
                </div>
                <div class="md:w-1/2 text-left">
                    <h2 class="text-4xl font-bold text-gray-800"><?= $desc_item->title;?></h2>
                    <h3 class="mt-4 text-xl font-semibold text-gray-700"><?= $desc_item->subtitle;?></h3>
                    <div><?= htmlspecialchars_decode($desc_item->description);?></div>
                    
                    <div class="mt-8">
                        <a href="<?= $desc_item->link ?>" target="_blank" class="outline-btn inline-block">Purchase Aquilla 500G</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
            }
        }
    ?>

    <!-- Contact Us Section -->
    <section id="contact-us" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <?php 
                    if (isset($description9) && !empty($description9)) {
                        foreach($description9 as $key => $desc_item) { 
                ?>
                <div class="md:w-1/2">
                    <img src="<?= base_url('uploads/');?>images/products/all_products/<?= $desc_item->images;?>" alt="Onyx dispenser on a counter" class="rounded-2xl shadow-xl w-full">
                </div>
                <div class="md:w-1/2 text-left">
                    <h2 class="text-4xl font-bold text-gray-800"><?= $desc_item->title;?></h2>
                    <p class="mt-4 text-gray-600"><?= $desc_item->description;?></p>
                <?php
                        }
                    }
                ?>
                    <form class="mt-8 space-y-4" id="consultation-form" action="<?= base_url("frontend/DrinkingWater/simpan_contact");?>" method="post">
                        <div>
                            <label for="name" class="sr-only">Name</label>
                            <input type="text" name="name" id="name" placeholder="Name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <input hidden name="link" id="link" readonly value="aquilla">
                        </div>
                         <div>
                            <label for="phone" class="sr-only">Phone</label>
                            <input type="tel" name="phone" id="phone" placeholder="Phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)">
                        </div>
                         <div>
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" placeholder="Email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <button type="submit" class="solid-btn w-full">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Memuat GSAP & ScrollTrigger untuk animasi -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script>
    // Initialize Feather Icons
    if (typeof feather !== 'undefined') {
        feather.replace();
    }
    
    // Mobile Menu Toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu'); 
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // --- LOGIC UNTUK HORIZONTAL SCROLL ---
    gsap.registerPlugin(ScrollTrigger);

    function setupHorizontalScroll(wrapperId, progressBarId) {
        const featuresSection = document.querySelector(wrapperId);
        if (!featuresSection) return;

        const scrollContainer = featuresSection.querySelector('.horizontal-scroll');
        const progressBar = featuresSection.querySelector(progressBarId);
        
        if (scrollContainer) {
            gsap.to(scrollContainer, {
                x: () => -(scrollContainer.scrollWidth - document.documentElement.clientWidth),
                ease: "none",
                scrollTrigger: {
                    trigger: featuresSection,
                    start: "top top",
                    end: () => "+=" + (scrollContainer.scrollWidth - document.documentElement.clientWidth),
                    scrub: 1,
                    pin: true,
                    anticipatePin: 1,
                    invalidateOnRefresh: true,
                    onUpdate: (self) => {
                        if(progressBar) {
                            progressBar.style.width = `${self.progress * 100}%`;
                        }
                    }
                }
            });
        }
    }

    setupHorizontalScroll('#features-wrapper', '#progress-bar');
    setupHorizontalScroll('#features-wrapper-2', '#progress-bar-2');
    setupHorizontalScroll('#features-wrapper-3', '#progress-bar-3');
</script>

