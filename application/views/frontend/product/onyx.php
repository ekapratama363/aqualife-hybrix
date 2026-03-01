<style>
    body {
        font-family: 'Inter', sans-serif;
        background-color: #FFFFFF;
        /* Mencegah scroll horizontal yang tidak diinginkan pada body */
        overflow-x: hidden;
    }
    .outline-btn {
        background-color: transparent;
        color: #3B82F6;
        border: 2px solid #3B82F6;
        padding: 0.75rem 2rem;
        border-radius: 9999px; /* Pill shape */
        font-weight: 600;
        transition: all 0.3s ease;
        text-align: center;
    }
    .outline-btn:hover {
        background-color: #3B82F6;
        color: white;
    }
    
    /* -- STYLES UNTUK HORIZONTAL SCROLL -- */
    #features-wrapper {
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

    /* Styling untuk setiap kartu fitur (MODIFIED) */
    .feature-card {
        flex-shrink: 0;
        width: 80vw;
        max-width: 1000px;
        height: auto; /* Tinggi kartu akan menyesuaikan gambar */
        position: relative;
    }
</style>

<main>
    <!-- Banner Section (Full Page) -->
    <section class="min-h-screen flex flex-col justify-center bg-white py-12">
        <div class="container mx-auto px-6">
            <!-- Breadcrumb dipindahkan ke sini -->

            <?php 
                foreach($description1 as $key => $description1) 
                { 
            ?>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <div class="text-center lg:text-left">
                    <h1 class="text-4xl md:text-5xl font-extrabold text-gray-800 tracking-tight"><?= strtoupper($description1->title);?></h1>
                    <p class="mt-4 text-lg text-gray-600 max-w-md mx-auto lg:mx-0">
                        <?= $description1->description;?>
                    </p>
                    <div class="mt-8">
                        <a href="<?= $description1->link ?>" target="_blank" class="outline-btn !rounded-full inline-block">Explore <?= $description1->title;?>!</a>
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <img src="<?= base_url('uploads/');?>images/products/all_products/<?= $description1->images;?>" alt="Onyx Water Dispenser" class="max-w-sm md:max-w-md lg:max-w-full">
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </section>

   
    <!-- Features Section (Horizontal Scroll) (MODIFIED) -->
    <section id="features-wrapper">
        <div class="sticky-container">
            <h2 class="text-4xl font-bold text-center text-gray-800 px-6 pb-10">Catch the highlight.</h2>
            
            <div class="horizontal-scroll">
                <!-- Slide: Smart LED -->
                  <?php 
                    foreach($image as $key => $image) 
                    { 
                ?>
                <div class="feature-card">
                    <div class="absolute z-10 top-1/2 -translate-y-1/2 <?= $image->position;?>-8 md:<?= $image->position;?>-12 lg:<?= $image->position;?>-16 w-full max-w-sm text-<?= $image->position;?>">
                        <h3 class="text-3xl md:text-4xl font-bold text-gray-800"><?= $image->title;?></h3>
                        <p class="mt-4 text-md md:text-lg text-gray-600"><?= $image->description;?></p>
                    </div>
                    <img src="<?= base_url('uploads/');?>images/products/all_products/<?= $image->images;?>" alt="Smart LED & TDS Display" class="rounded-2xl w-full h-auto">
                </div>
                <?php
                    }
                ?>
            </div>
            <!-- Progress Bar -->
            <div class="absolute bottom-10 left-1/2 -translate-x-1/2 w-1/3 max-w-xs h-1.5 bg-gray-300 rounded-full">
                <div id="progress-bar" class="h-full bg-gray-800 rounded-full transition-all duration-100 ease-linear"></div>
            </div>
        </div>
    </section>

    

    <!-- Testimonials Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php 
                    foreach($description2 as $key => $description2) 
                    { 
                ?>
                <!-- Testimonial 1 -->
                <div class="bg-gray-800 text-white p-8 rounded-2xl text-center shadow-lg">
                    <p class="text-lg"><?= $description2->description;?></p>
                    <p class="mt-6 font-bold text-xl">- <?= $description2->title;?></p>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </section>

    <!-- 5 Stage Filtration Section -->
    <?php 
        foreach($description3 as $key => $description3) 
        { 
    ?>
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="text-left">
                    <h2 class="text-4xl font-bold text-gray-800"><?= $description3->title;?></h2>
                    <p class="mt-4 text-gray-600"><?= $description3->description;?></p>
                </div>
                <div>
                    <img src="<?= base_url('uploads/');?>images/products/all_products/<?= $description3->images;?>" alt="5 Stage Filtration Diagram" class="rounded-lg shadow-lg">
                </div>
            </div>
        </div>
    </section>
    <?php
        }
    ?>

    <!-- UV Sterilization Section -->
    <?php 
        foreach($description4 as $key => $description4) 
        { 
    ?>
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <img src="<?= base_url('uploads/');?>images/products/all_products/<?= $description4->images;?>" alt="UV Sterilization in action" class="rounded-lg shadow-lg">
                </div>
                <div class="text-left">
                    <h2 class="text-4xl font-bold text-gray-800"><?= $description4->title;?></h2>
                    <p class="mt-4 text-gray-600"><?= $description4->description;?></p>
                    <!-- <p class="mt-4 text-sm text-blue-600">*Built in UV-C lamp for 24h disinfection and sterilization of the water and tank</p> -->
                </div>
            </div>
        </div>
    </section>
    <?php
        }
    ?>

    <!-- 4 Temperature Options Section (Revised Layout) -->
    <?php 
        foreach($description5 as $key => $description5) 
        { 
    ?>
    <!-- 4 Temperature Options Section (Revised Layout) -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center">
                <h2 class="text-4xl font-bold text-gray-800 mb-12">Just click, you get it</h2>
            </div>
            <!-- Container utama dengan posisi relatif -->
            <div class="relative rounded-2xl shadow-xl overflow-hidden">
                <!-- Gambar sebagai elemen utama -->
                <img src="<?= base_url('uploads/');?>images/products/all_products/<?= $description5->images;?>" alt="Onyx dispenser panel" class="w-full h-auto">
                
                <!-- Kontainer teks dengan posisi absolut -->
                <div class="absolute top-0 right-0 h-full w-full md:w-1/2 flex flex-col justify-center items-start text-left p-8 md:p-16">
                    <h3 class="text-3xl md:text-4xl font-bold text-gray-800"><?= $description5->title;?></h3>
                    <p class="text-gray-600 mt-4 text-lg font-bold">
                        <?= $description5->subtitle;?>
                    </p>
                    <p class="text-gray-500 mt-2"><?= $description5->description;?></p>
                </div>
            </div>
        </div>
    </section>

    <?php
        }
    ?>

    <!-- Child Lock Section -->
    <?php 
        foreach($description6 as $key => $description6) 
        { 
    ?>
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold text-gray-800"><?= $description6->title;?></h2>
            <h3 class="text-2xl font-semibold text-gray-600 mt-2"><?= $description6->subtitle;?></h3>
            <div class="flex justify-center my-8">
                <!-- Ukuran gambar diperbesar -->
                <img src="<?= base_url('uploads/');?>images/products/all_products/<?= $description6->images;?>" alt="Child Lock Shield" class="h-72">
            </div>
            <p class="max-w-3xl mx-auto text-gray-600"><?= $description6->description;?></p>
        </div>
    </section>
    <?php
        }
    ?>

    <!-- Instant Hydration Section -->
    <?php 
        foreach($description7 as $key => $description7) 
        { 
    ?>
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold text-gray-800"><?= $description7->title;?></h2>
            <h3 class="text-2xl font-semibold text-gray-600 mt-2 mb-8"><?= $description7->subtitle;?></h3></h3>
            <!-- Ukuran gambar dibatasi dengan max-w-5xl -->
            <img src="<?= base_url('uploads/');?>images/products/all_products/<?= $description7->images;?>" alt="Onyx in a kitchen" class="rounded-2xl shadow-xl max-w-5xl mx-auto">
            <p class="max-w-3xl mx-auto text-gray-600 mt-8"><?= $description7->description;?></p>
        </div>
    </section>
    <?php
        }
    ?>

    <!-- Ready to Embrace Section -->
    <?php 
        foreach($description8 as $key => $description8) 
        { 
    ?>
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="md:w-1/2">
                    <img src="<?= base_url('uploads/');?>images/products/all_products/<?= $description8->images;?>" alt="Couple enjoying water" class="rounded-2xl shadow-xl w-full">
                </div>
                <div class="md:w-1/2 text-left">
                    <h2 class="text-4xl font-bold text-gray-800"><?= $description8->title;?></h2>
                    <p class="mt-6 text-gray-600"><?= $description8->description;?></p>
                    <div class="mt-8">
                        <a href="<?= $description8->link ?>" target="_blank" class="outline-btn inline-block">Purchase Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
        }
    ?>

    <!-- Contact Us Section -->
   
    
        <section class="py-20 bg-gray-50">
            <div class="container mx-auto px-6">
                <div class="flex flex-col md:flex-row items-center gap-12">
                     <?php 
                        foreach($description9 as $key => $description9) 
                        { 
                    ?>
                    <div class="md:w-1/2">
                        <img src="<?= base_url('uploads/');?>images/products/all_products/<?= $description9->images;?>" alt="Onyx dispenser on a counter" class="rounded-2xl shadow-xl w-full">
                    </div>
                    <div class="md:w-1/2 text-left">
                        <h2 class="text-4xl font-bold text-gray-800"><?= $description9->title;?></h2>
                        <p class="mt-4 text-gray-600"><?= $description9->description;?></p>
                    <?php
                        }
                    ?>
                        <form class="mt-8 space-y-4" id="consultation-form" action="<?= base_url("frontend/DrinkingWater/simpan_contact");?>" method="post">
                            <div>
                                <label for="name" class="sr-only">Name</label>
                                <input type="text" name="name" id="name" placeholder="Name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <input hidden name="link" id="link" readonly value="onyx">
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
        feather.replace();

        // Mobile Menu Toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // --- LOGIC UNTUK HORIZONTAL SCROLL ---
        gsap.registerPlugin(ScrollTrigger);

        const featuresSection = document.querySelector('#features-wrapper');
        const scrollContainer = document.querySelector('.horizontal-scroll');
        const progressBar = document.getElementById('progress-bar');
        
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
    </script>
