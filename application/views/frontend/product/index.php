 <main>
    <!-- Hero Section -->
     <?php 
        foreach($header as $key => $header) 
        { 
    ?>
    <section class="relative h-screen bg-cover bg-center" style="background-image: url('<?= base_url('uploads/');?>images/home/<?= $header->images;?>');">
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
    <section id="overview-section" class="container mx-auto px-6 pt-20">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h3 class="text-2xl font-bold text-gray-800">WHAT IS WATER TREATMENT</h3>
                <h2 class="text-4xl font-extrabold text-gray-900 mt-2">Why Do I Need a Water Treatment System?</h2>
                <p class="mt-4 text-gray-600">Our Aqualife Luma water treatment systems eliminate harmful substances such as chlorine, heavy metals, sediment, bacteria, iron, manganese, and unpleasant odors, ensuring your water is clean and safe for drinking, cooking, and bathing. With CleanFlow, you protect your health, improve water quality, and extend the lifespan of your plumbing and household appliances.</p>
            </div>
            <div>
                    <img src="assets/PICTURE WTP PAGE/B.png" class="rounded-lg shadow-lg" alt="Wanita melihat segelas air keruh">
            </div>
        </div>
    </section>

    <!-- Did You Know Section -->
    <section class="container mx-auto px-6 py-20 text-center">
        <h3 class="text-4xl font-bold text-blue-600">Did You Know ?</h3>
        <p class="mt-4 max-w-4xl mx-auto text-gray-700">Di Indonesia, lebih dari 50% air bersih yang digunakan oleh masyarakat sebenarnya terkontaminasi bakteri dan zat berbahaya! Fakta ini menunjukkan bahwa air yang terlihat jernih belum tentu aman untuk diminum. Tanpa penyaringan yang tepat, air dapat mengandung bakteri, virus, dan bahan kimia berbahaya yang dapat menyebabkan berbagai penyakit.</p>
        <div class="mt-8 flex justify-center px-4">
                <img src="assets/PICTURE WTP PAGE/J.png" alt="Peta Indonesia" class="rounded-lg w-full max-w-3xl">
        </div>
        <div class="mt-12 grid md:grid-cols-2 gap-x-12 gap-y-8 max-w-5xl mx-auto text-left">
            <div>
                <h4 class="text-xl font-bold text-gray-900">The 2020 Household Drinking Water Quality Study</h4>
                <p class="mt-2 text-gray-600">menemukan bahwa 7 dari 10 rumah tangga di Indonesia mengonsumsi air minum yang terkontaminasi bakteri Escherichia coli (E. coli).</p>
            </div>
            <div>
                    <h4 class="text-xl font-bold text-gray-900">Many Refill Drinking Water Depots do not Disclose The</h4>
                    <p class="mt-2 text-gray-600">sumber air yang mereka gunakan. Kurangnya transparansi ini meningkatkan risiko kontaminasi dari limbah atau zat berbahaya lainnya.</p>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section id="benefits-section" class="container mx-auto px-6 pb-20 pt-20">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-blue-600">Benefits of Using a Water Treatment System</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8 text-center">
            <div class="flex flex-col items-center">
                <img src="assets/PICTURE WTP PAGE/C.png" alt="Cleaner and Safer Water" class="rounded-full w-32 h-32 object-cover shadow-lg">
                <h3 class="font-bold text-lg mt-4">Cleaner and Safer Water</h3>
                <p class="text-gray-600 text-sm mt-1">Removes bacteria, viruses, iron, manganese, sediments, and harmful contaminants, providing safer and healthier water for your family.</p>
            </div>
            <div class="flex flex-col items-center">
                <img src="assets/PICTURE WTP PAGE/D.png" alt="Improving Water Quality" class="rounded-full w-32 h-32 object-cover shadow-lg">
                <h3 class="font-bold text-lg mt-4">Improving Water Quality</h3>
                <p class="text-gray-600 text-sm mt-1">Eliminates unpleasant odors (such as chlorine and rotten egg smell), discoloration, and harmful chemicals, giving your water a clean, fresh taste.</p>
            </div>
            <div class="flex flex-col items-center">
                <img src="assets/PICTURE WTP PAGE/E.jpg" alt="Efficient and Cost Effective" class="rounded-full w-32 h-32 object-cover shadow-lg">
                <h3 class="font-bold text-lg mt-4">Efficient and Cost Effective</h3>
                <p class="text-gray-600 text-sm mt-1">Saves money by reducing your reliance on bottled water, providing a cost-effective long-term solution.</p>
            </div>
            <div class="flex flex-col items-center">
                <img src="assets/PICTURE WTP PAGE/F.jpg" alt="Reliable and Durable System" class="rounded-full w-32 h-32 object-cover shadow-lg">
                <h3 class="font-bold text-lg mt-4">Reliable and Durable System</h3>
                <p class="text-gray-600 text-sm mt-1">Built with advanced, reliable technology ensuring long-lasting performance and fewer maintenance concerns.</p>
            </div>
            <div class="flex flex-col items-center">
                <img src="assets/PICTURE WTP PAGE/G.jpg" alt="Environmentally Friendly" class="rounded-full w-32 h-32 object-cover shadow-lg">
                <h3 class="font-bold text-lg mt-4">Environmentally Friendly</h3>
                <p class="text-gray-600 text-sm mt-1">Minimizes plastic waste by eliminating the need for disposable water bottles, helping protect the environment.</p>
            </div>
            <div class="flex flex-col items-center">
                <img src="assets/PICTURE WTP PAGE/H.png" alt="Trusted Technical Support" class="rounded-full w-32 h-32 object-cover shadow-lg">
                <h3 class="font-bold text-lg mt-4">Trusted Technical Support</h3>
                <p class="text-gray-600 text-sm mt-1">Our responsive, expert after-sales support ensures your water treatment system operates flawlessly at all times.</p>
            </div>
        </div>
    </section>

    <!-- Our Treatment System Section -->
    <section class="py-20 bg-gray-50 pt-20">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl font-bold text-blue-600">See the Aqualife Luma Difference</h2>
                    <h3 class="mt-4 text-xl font-bold text-gray-800">Prevent Scale, Rust, and Odor—Protect Your Health and Appliances</h3>
                    <p class="mt-2 text-gray-600">Untreated water often contains minerals, iron, and other impurities that lead to scale buildup, rust, and stains on household appliances. With Aqualife CleanFlow, your water is purified leaving your faucets, showers, and fixtures clean, rust-free, and longer-lasting. Protect your family's health and your appliances with every drop.</p>
                </div>
                <div>
                    <img src="assets/PICTURE WTP PAGE/I.jpg" alt="Perbandingan Sebelum & Sesudah Aqualife" class="rounded-2xl w-full shadow-xl">
                </div>
            </div>
        </div>
    </section>
    
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
                <div class="border-2 border-blue-500 rounded-2xl p-6 text-center flex flex-col">
                    <img src="assets/WTP PNG/5.png" alt="Water Treatment Plant 2" class="mx-auto mb-4 h-48 object-contain">
                    <h3 class="text-xl font-bold">Water Treatment Plant</h3>
                    <a href="#" class="text-sm text-blue-600 hover:underline mb-4">Spesification</a>
                        <div class="space-y-3 text-sm flex-grow">
                        <div class="flex justify-between border-b pb-2">
                            <span class="text-gray-600" style="text-align:left;">Flow Rate</span>
                            <span class="font-semibold">5-9 GPM (1.14-2.04 m³/hour)</span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <span class="text-gray-600" style="text-align:left;">Recommended Use</span>
                            <span class="font-semibold" style="text-align:right;">1-3 Bathrooms</span>
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
                            <span class="font-semibold" style="text-align:right;">Every 18-24 months</span>
                        </div>
                            <div class="flex justify-between pb-2">
                            <span class="text-gray-600" style="text-align:left;">Warranty</span>
                            <span class="font-semibold" style="text-align:right;">-</span>
                        </div>
                    </div>
                    <button class="outline-btn mt-6 w-full">SHOP NOW</button>
                </div>
                <div class="border border-gray-200 rounded-2xl p-6 text-center flex flex-col">
                    <img src="assets/WTP PNG/6.png" alt="Water Treatment Plant 3" class="mx-auto mb-4 h-48 object-contain">
                    <h3 class="text-xl font-bold">Water Treatment Plant</h3>
                    <a href="#" class="text-sm text-blue-600 hover:underline mb-4">Spesification</a>
                        <div class="space-y-3 text-sm flex-grow">
                        <div class="flex justify-between border-b pb-2">
                            <span class="text-gray-600" style="text-align:left;">Flow Rate</span>
                            <span class="font-semibold" style="text-align:right;">5-9 GPM (1.14-2.04 m³/hour)</span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <span class="text-gray-600" style="text-align:left;">Recommended Use</span>
                            <span class="font-semibold" style="text-align:right;">1-3 Bathrooms</span>
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
                            <span class="font-semibold" style="text-align:right;">Every 18-24 months</span>
                        </div>
                            <div class="flex justify-between pb-2">
                            <span class="text-gray-600" style="text-align:left;">Warranty</span>
                            <span class="font-semibold" style="text-align:right;">-</span>
                        </div>
                    </div>
                    <button class="outline-btn mt-6 w-full">SHOP NOW</button>
                </div>
            </div>
        </div>
    </section>
</main>