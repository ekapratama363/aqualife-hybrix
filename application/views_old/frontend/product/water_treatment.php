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
    /* CSS for the sticky navigation tabs */
    .sticky-tabs-container {
        position: -webkit-sticky; /* For Safari compatibility */
        position: sticky;
        /* The 'top' value will be set by JavaScript */
        top: 80px; 
        background: transparent;
        z-index: 40;
        /* Add a subtle shadow when it's sticky */
        /*box-shadow: 0 2px 4px rgba(0,0,0,0.05);*/
    }
</style>

<main>
    <!-- Hero Section -->
    <?php 
        foreach($header as $key => $header) 
        { 
    ?>
    <section class="relative h-screen bg-cover bg-center" style="background-image: url('<?= base_url('uploads/');?>images/headers/<?= $header->images;?>');">
        <div class="absolute inset-0 bg-gradient-to-r from-white via-white/95 to-transparent"></div>
        <div class="relative container mx-auto px-6 h-full flex flex-col justify-center">
            <div class="w-full lg:w-1/2">
                <h3 class="text-sm font-bold tracking-wider uppercase text-blue-600"><?= $header->title;?></h3>
                <h1 class="text-4xl lg:text-5xl font-extrabold mt-2 leading-tight text-blue-600"><?= $header->subtitle;?></h1>
                <p class="mt-4 text-lg text-gray-700 max-w-xl">
                    <?= $header->description;?>
                </p>
            </div>
        </div>
    </section>
    <?php
        }
    ?>

    <!-- Sticky Tabs Container -->
    <div class="sticky-tabs-container">
        <div class="container mx-auto px-6 py-3">
            <div class="bg-white rounded-full shadow-lg p-2 inline-flex items-center space-x-1 tab-nav">
                <a href="#overview-section" class="tab active py-2 px-6 rounded-full font-medium">Overview</a>
                <a href="#benefits-section" class="tab py-2 px-6 rounded-full font-medium">Benefits</a>
                <a href="#our-treatment-system" class="tab py-2 px-6 rounded-full font-medium">Our Treatment System</a>
            </div>
        </div>
    </div>
    
    <!-- Overview Section -->
    <?php 
        foreach($overviews as $key => $overviews) 
        { 
    ?>
    <section id="overview-section" class="container mx-auto px-6 pt-20">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h3 class="text-2xl font-bold text-gray-800"><?= $overviews->title;?></h3>
                <h2 class="text-4xl font-extrabold text-gray-900 mt-2"><?= $overviews->subtitle;?></h2>
                <p class="mt-4 text-gray-600"><?= $overviews->description;?></p>
            </div>
            <div>
                <img src="<?= base_url('uploads/');?>images/products/wtp/<?= $overviews->images;?>" class="rounded-lg shadow-lg" alt="Wanita melihat segelas air keruh">
            </div>
        </div>
    </section>
    <?php
        }
    ?>

    <!-- Did You Know Section -->
    <?php 
        foreach($did_you_know as $key => $did_you_know) 
        { 
    ?>
    <section class="container mx-auto px-6 py-20 text-center">
        <h3 class="text-4xl font-bold text-blue-600"><?= $did_you_know->title;?></h3>
        <p class="mt-4 max-w-4xl mx-auto text-gray-700"><?= $did_you_know->description;?></p>
        <div class="mt-8 flex justify-center px-4">
            <img src="<?= base_url('uploads/');?>images/products/wtp/<?= $did_you_know->images;?>" alt="Peta Indonesia" class="rounded-lg w-full max-w-3xl">
        </div>
        <div class="mt-12 grid md:grid-cols-2 gap-x-12 gap-y-8 max-w-5xl mx-auto text-left">
            <?php 
                foreach($did_you_know2 as $key => $did_you_know2) 
                { 
            ?>
            <div>
                <h4 class="text-xl font-bold text-gray-900"><?= $did_you_know2->title;?></h4>
                <p class="mt-2 text-gray-600"><?= $did_you_know2->description;?></p>
            </div>
            <?php
                }
            ?>
        </div>
    </section>
    <?php
        }
    ?>

    <!-- Benefits Section -->
    <section id="benefits-section" class="container mx-auto px-6 pb-20 pt-20">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-blue-600">Benefits of Using a Water Treatment System</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8 text-center">
            <?php 
                foreach($benefit as $key => $benefit) 
                { 
            ?>
            <div class="flex flex-col items-center">
                <img src="<?= base_url('uploads/');?>images/products/wtp/<?= $benefit->images;?>" alt="Cleaner and Safer Water" class="rounded-full w-32 h-32 object-cover shadow-lg">
                <h3 class="font-bold text-lg mt-4"><?= $benefit->title;?></h3>
                <p class="text-gray-600 text-sm mt-1"><?= $benefit->description;?></p>
            </div>
            <?php
                }
            ?>
        </div>
    </section>

    <!-- Our Treatment System Section -->
    <?php 
        foreach($advantages as $key => $advantages) 
        { 
    ?>
    <section class="py-20 bg-gray-50 pt-20">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl font-bold text-blue-600"><?= $advantages->title;?></h2>
                    <p class="mt-2 text-gray-600"><?= $advantages->description;?></p>
                </div>
                <div>
                    <img src="<?= base_url('uploads/');?>images/products/wtp/<?= $advantages->images;?>" alt="Perbandingan Sebelum & Sesudah Aqualife" class="rounded-2xl w-full shadow-xl">
                </div>
            </div>
        </div>
    </section>
    <?php
        }
    ?>
    
    <!-- Products Section -->
    <section id="our-treatment-system" class="py-20">
        <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-blue-600">Find the Best Water Treatment System for Your Needs</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="border border-gray-200 rounded-2xl p-6 text-center flex flex-col">
                    <img src="assets/WTP PNG/4.png" alt="Water Treatment Plant 1" class="mx-auto mb-4 h-48 object-contain">
                    <h3 class="text-xl font-bold">Water Treatment Plant</h3>
                    <a href="#" class="text-sm text-blue-600 hover:underline mb-4">Spesification</a>
                    <div class="space-y-3 text-sm flex-grow">
                        <div class="flex justify-between border-b pb-2">
                            <span class="text-gray-600" style="text-align:left;">Flow Rate</span>
                            <span class="font-semibold">5-9 GPM (1.14-2.04 m³/hour)</span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <span class="text-gray-600" style="text-align:left;">Recommended Use</span>
                            <span class="font-semibold">1-3 Bathrooms</span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <span class="text-gray-600" style="text-align:left;">Water Quality Improvement</span>
                            <span class="font-semibold" style="text-align:right;">Removes chlorine sediment & odor</span>
                        </div>
                            <div class="flex justify-between border-b pb-2">
                            <span class="text-gray-600" style="text-align:left;">Iron & Sulfur Removal</span>
                            <span class="font-semibold" style="text-align:right;">Optional upgrade available</span>
                        </div>
                            <div class="flex justify-between border-b pb-2">
                            <span class="text-gray-600" style="text-align:left;">Inlet/Outlet Size</span>
                            <span class="font-semibold" style="text-align:right;">1 inch</span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <span class="text-gray-600" style="text-align:left;">Dimensions</span>
                            <span class="font-semibold" style="text-align:right;">30 cm x 30 cm x 150 cm</span>
                        </div>
                            <div class="flex justify-between border-b pb-2">
                            <span class="text-gray-600" style="text-align:left;">Maintenance</span>
                            <span class="font-semibold" style="text-align:right;">-</span>
                        </div>
                            <div class="flex justify-between pb-2">
                            <span class="text-gray-600" style="text-align:left;">Warranty</span>
                            <span class="font-semibold style="text-align:right;"">-</span>
                        </div>
                    </div>
                    <button class="blue-btn mt-6 w-full">SHOP NOW</button>
                </div>
                
            </div>
        </div>
    </section>
</main>