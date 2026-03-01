<style>
    html {
        scroll-behavior: smooth;
    }
    body {
        font-family: 'Inter', sans-serif;
        background-color: #FFFFFF;
    }
    .section-title {
        font-size: 2.25rem; /* 36px */
        font-weight: 800;
        color: #111827; /* Dark Gray */
    }
    .blue-btn {
            background-color: #3B82F6; /* Blue-500 */
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: background-color 0.3s ease;
    }
    .blue-btn:hover {
        background-color: #2563EB; /* Blue-600 */
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
            background-color: #EFF6FF; /* Blue-50 */
    }
    
    .tab-nav a {
        transition: all 0.3s ease;
        color: #6B7280; /* gray-500 */
    }
    .tab-nav a.active {
        background-color: #3B82F6; /* blue-500 */
        color: white;
        box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
    }
    
    .sticky-tabs-container {
        position: -webkit-sticky;
        position: sticky;
        top: 80px; 
        z-index: 40;
        margin-top: -4rem;
        height: 80px;
    }

    /* --- PERUBAHAN UNTUK BUG FIX --- */
    .product-card {
        display: flex;
        flex-direction: column;
        height: 100%; /* Pastikan card mengisi tinggi slide */
    }
    .product-card .flex-grow {
        flex-grow: 1; /* Biarkan bagian ini mengisi ruang kosong */
    }
    /* --- AKHIR PERUBAHAN --- */

</style>

<main>
    <!-- Hero Section -->
    <?php 
        if (isset($header) && !empty($header)) {
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
        <div class="container mx-auto px-6">
            <div class="bg-white rounded-full shadow-lg p-2 inline-flex items-center space-x-1 tab-nav">
                <a href="#overview-section" class="tab active py-2 px-6 rounded-full font-medium">Overview</a>
                <a href="#product-section" class="tab py-2 px-6 rounded-full font-medium">Our Product</a>
                <a href="#benefits-section" class="tab py-2 px-6 rounded-full font-medium">Benefits</a>
                <a href="#our-treatment-system" class="tab py-2 px-6 rounded-full font-medium">Our Treatment System</a>
            </div>
        </div>
    </div>
    
    <!-- Overview Section -->
    <?php 
        if (isset($overviews) && !empty($overviews)) {
            foreach($overviews as $key => $overview) { 
    ?>
    <section id="overview-section" class="container mx-auto px-6 pt-20">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h3 class="text-2xl font-bold text-gray-800"><?= $overview->subtitle;?></h3>
                <p class="mt-4 text-gray-600"><?= $overview->description;?></p>
            </div>
            <div>
                <img src="<?= base_url('uploads/');?>images/products/overview/<?= $overview->images;?>" class="rounded-lg shadow-lg" alt="Wanita melihat segelas air keruh">
            </div>
        </div>
        <?php 
            if (isset($did_you_know) && !empty($did_you_know)) {
                foreach($did_you_know as $key => $dyk) { 
        ?>
        <div class="text-center mt-20">
            <h2 class="text-4xl font-bold text-blue-600"><?= $dyk->title;?></h2>
            <img src="<?= base_url('uploads/');?>images/products/did_you_know/<?= $dyk->images;?>" onerror="this.onerror=null;this.src='https://placehold.co/1200x500/F3F4F6/9CA3AF?text=RO+Process+Diagram';" alt="Reverse Osmosis Process Diagram" class="mx-auto mt-8 rounded-lg shadow-md">
            <p class="mt-8 max-w-4xl mx-auto text-gray-600">
                <?= $dyk->description;?>
            </p>
        </div>
        <?php
                }
            }
        ?>
    </section>
    <?php
            }
        }
    ?>

    <!-- Our Products Section -->
    <section id="product-section" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800">Not just water filtration, but a healthier future.</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <?php 
                    if (isset($did_you_know2) && !empty($did_you_know2)) {
                        foreach($did_you_know2 as $key => $product_highlight) { 
                ?>
                <a href="<?= base_url();?>frontend/DrinkingWater/product/<?= $product_highlight->id;?>" class="block relative rounded-2xl overflow-hidden h-[700px] shadow-xl group text-white">
                    <img src="<?= base_url('uploads/');?>images/products/all_products/<?= $product_highlight->images;?>" class="absolute w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 ease-in-out" alt="<?= $product_highlight->name;?>">
                    <div class="absolute bottom-0 left-0 right-0 h-3/5 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <div class="relative h-full flex flex-col justify-end items-center text-center p-8">
                        <h3 class="text-3xl font-bold"><?= $product_highlight->name;?></h3>
                        <p class="mt-2 text-sm max-w-md"><?= $product_highlight->description;?></p>
                    </div>
                </a>
                <?php
                        }
                    }
                ?>
            </div>
        </div>
    </section>
 

    <!-- Benefits Section -->
    <section id="benefits-section" class="container mx-auto px-6 pb-20 pt-20">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-blue-600">Benefits of Using a Water Treatment System</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8 text-center">
            <?php 
                if (isset($benefit) && !empty($benefit)) {
                    foreach($benefit as $key => $benefit_item) { 
            ?>
            <div class="flex flex-col items-center">
                <img src="<?= base_url('uploads/');?>images/products/benefit/<?= $benefit_item->images;?>" alt="<?= $benefit_item->title;?>" class="rounded-full w-32 h-32 object-cover shadow-lg">
                <h3 class="font-bold text-lg mt-4"><?= $benefit_item->title;?></h3>
                <p class="text-gray-600 text-sm mt-1"><?= $benefit_item->description;?></p>
            </div>
            <?php
                    }
                }
            ?>
        </div>

        
        <div class="mt-20 grid md:grid-cols-2 gap-8">
            <?php 
                if (isset($advantages) && !empty($advantages)) {
                    foreach($advantages as $key => $advantage) { 
            ?>
            <div class="relative rounded-2xl overflow-hidden shadow-lg">
                <img src="<?= base_url('uploads/');?>images/products/advantage/<?= $advantage->images;?>" alt="<?= $advantage->title;?>" class="w-full h-full object-cover">
                <div class="absolute top-4 left-4">
                    <h4 class="bg-blue-600 text-white text-sm font-bold py-2 px-4 rounded-md"><?= $advantage->title;?></h4>
                </div>
            </div>
            <?php
                    }
                }
            ?>
        </div>
        
    </section>
    
    <!-- Why Choose Section / Our Treatment System (MODIFIED) -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-blue-600">Why Choose Aqualife RO for Drinking Water?</h2>
            </div>
            <div class="flex justify-center">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-x-8 lg:gap-x-16 gap-y-12 text-center max-w-5xl">
                    <?php 
                        if (isset($wcu) && !empty($wcu)) {
                            foreach($wcu as $key => $wcu_item) { 
                    ?>
                    <div class="flex flex-col items-center">
                        <img src="<?= base_url('uploads/');?>images/products/why_choose_us/<?= $wcu_item->images;?>" alt="On Demand Purity" class="rounded-full w-48 h-48 object-cover shadow-lg mb-6">
                        <h3 class="font-bold text-xl mb-2"><?= $wcu_item->title;?></h3>
                        <p class="text-gray-600 text-sm max-w-xs"><?= $wcu_item->description;?></p>
                    </div>
                    <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Find Product Section -->
    <section id="our-treatment-system" class="py-20 bg-gray-50">
            <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-blue-600">Find the Best RO Drinking Water for Your Needs</h2>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                
                <?php if (isset($products) && !empty($products)) : foreach($products as $product) : ?>
                    <!-- TIDAK PERLU .swiper-slide DI SINI KARENA BUKAN SLIDER -->
                    <div class="product-card border border-gray-200 rounded-2xl p-6 text-center">
                        <img src="<?= base_url("uploads/images/products/all_products/$product->images") ?>" alt="Product Image" class="mx-auto mb-4 h-48 object-contain">
                        <h3 class="text-xl font-bold"><?= $product->name; ?></h3>
                        <a href="#" class="text-sm text-blue-600 hover:underline mb-4">Spesification</a>
                        
                        <!-- DIBUNGKUS DENGAN flex-grow -->
                        <div class="space-y-3 text-sm flex-grow">
                            <?php if (isset($product->details) && !empty($product->details)) : foreach($product->details as $detail) : ?>
                                <div class="flex justify-between border-b pb-2">
                                    <span class="text-gray-600"><?= $detail->key_field ?></span>
                                    <span class="font-semibold"><?= $detail->value_field ?></span>
                                </div>
                            <?php endforeach; endif; ?>
                        </div>
                        
                        <!-- Tombol diletakkan setelah div flex-grow -->
                        <div class="mt-6">
                            <a href="<?= $product->link ?>" class="blue-btn w-full" target="_blank">SHOP NOW</a>
                        </div>
                    </div>
                <?php endforeach; endif; ?>
            </div>
        </div>
    </section>
</main>

<script>
    // Initialize Feather Icons
    if (typeof feather !== 'undefined') {
        feather.replace();
    }
    
    // Mobile Menu Toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    if (mobileMenuButton) {
        const mobileMenu = document.querySelector('header nav');
        mobileMenuButton.addEventListener('click', () => {
            if(mobileMenu) mobileMenu.classList.toggle('hidden');
        });
    }
    
    // --- Sticky Tabs & Smooth Scrolling Logic ---
    document.addEventListener('DOMContentLoaded', () => {
        const header = document.querySelector('header');
        const tabsContainer = document.querySelector('.sticky-tabs-container');
        const tabs = document.querySelectorAll('.tab-nav a');
        const sections = document.querySelectorAll('main > section[id]');

        if (!header || !tabsContainer || tabs.length === 0 || sections.length === 0) {
            console.error('Required elements for sticky navigation not found.');
            return;
        }

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
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        const onScroll = () => {
            const scrollPosition = window.scrollY;
            sections.forEach(sec => {
                if (sec.offsetTop - scrollOffset <= scrollPosition && 
                    sec.offsetTop + sec.offsetHeight - scrollOffset > scrollPosition) {
                    tabs.forEach(t => t.classList.remove('active'));
                    const correspondingTab = document.querySelector(`.tab-nav a[href="#${sec.id}"]`);
                    if (correspondingTab) {
                        correspondingTab.classList.add('active');
                    }
                }
            });
        };
        window.addEventListener('scroll', onScroll);
    });
</script>
