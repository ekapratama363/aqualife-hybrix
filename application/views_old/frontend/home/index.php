<!-- Swiper.js for slider -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<style>
    /* Custom styles to match the PDF design */
    body {
        font-family: 'Inter', sans-serif;
        background-color: #F9FAFB; /* Light gray background */
    }
    .hero-bg {
        background-image: url('<?= base_url('uploads/');?>images/home/home.png');
        background-size: cover;
        background-position: center;
    }
    .hero-overlay {
        background-color: rgba(0, 0, 0, 0.3);
    }
    .section-title {
        font-size: 2.25rem; /* 36px */
        font-weight: 800;
        color: #111827; /* Dark Gray */
    }
    .section-subtitle {
        font-size: 1.125rem; /* 18px */
        color: #4B5563; /* Medium Gray */
        max-width: 800px;
        margin: 1rem auto 0;
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
    .card {
        background-color: white;
        border-radius: 0.75rem;
        box-shadow: 0 4px_6px_-1px_rgb(0 0 0/0.1), 0 2px_4px_-2px_rgb(0 0 0/0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px_15px_-3px_rgb(0 0 0/0.1), 0 4px_6px_-4px_rgb(0 0 0/0.1);
    }
    /* FAQ Accordion Styles */
    .faq-question.active .faq-arrow {
        transform: rotate(180deg);
    }
    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.5s ease-in-out;
    }
    /* Swiper Navigation Button Styles */
    .swiper-button-next, .swiper-button-prev {
        color: #111827; /* Dark gray for arrows */
        background-color: white;
        border-radius: 9999px;
        width: 40px;
        height: 40px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.15);
    }
    .swiper-button-next:after, .swiper-button-prev:after {
        font-size: 16px;
        font-weight: bold;
    }
    /* Stepper Styles */
    .stepper-item.active .stepper-circle {
        background-color: #3B82F6;
        color: white;
    }
        .stepper-item.active .stepper-title {
        color: #3B82F6;
    }
    .stepper-item .stepper-circle {
        background-color: #E5E7EB;
        color: #6B7280;
    }
    .stepper-item .stepper-line {
        width: 100%;
        height: 2px;
        background-color: #E5E7EB;
    }
    .stepper-item.active .stepper-line {
            background-color: #3B82F6;
    }
</style>

<main>
    <!-- Hero Section (UPDATED) -->
    <?php 
        foreach($header as $key => $header) 
        { 
    ?>
    <section class="relative h-screen bg-cover bg-center text-white" style="background-image: url('<?= base_url('uploads/');?>images/headers/<?= $header->images;?>');">
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="relative container mx-auto px-6 h-full flex items-center">
            <div class="w-full md:w-1/2">
                <h1 class="text-5xl md:text-7xl font-extrabold leading-tight">
                    <?= $header->subtitle;?>
                </h1>
                <p class="mt-4 text-lg max-w-lg text-gray-200">
                    <?= $header->description;?>
                </p>
                <a href="#contact" class="blue-btn mt-8 inline-block">SHOP NOW!</a>
            </div>
        </div>
    </section>
    <?php
        }
    ?>

    <!-- About Us Section (UPDATED) -->
    
    <section id="about" class="py-20 bg-blue-600 text-white">
        <div class="container mx-auto px-6 text-center">
            <p class="font-semibold text-blue-200">About Us</p>
            <?php 
                foreach($about as $key => $about) 
                { 
            ?>
            <h2 class="text-4xl font-extrabold mt-2"><?= $about->name;?></h2>
            <p class="mt-4 max-w-3xl mx-auto text-blue-100">
                <?= $about->description;?>
            </p>
            <?php
                }
            ?>
            <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-8 text-gray-800">
                <!-- Card 1 -->
                <?php 
                    foreach($about_detail as $key => $about_detail) 
                    { 
                ?>
                <div class="bg-white rounded-full p-6 shadow-lg flex items-center space-x-6">
                    <div class="bg-blue-100 rounded-full p-3 flex-shrink-0">
                        <i data-feather="<?= $about_detail->icon;?>" class="h-10 w-10 text-blue-600"></i>
                    </div>
                    <div class="text-left">
                        <h3 class="text-lg font-bold"><?= $about_detail->title;?></h3>
                        <p class="text-sm text-gray-600"><?= $about_detail->subtitle;?></p>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </section>
    

    <!-- Our Service Section (UPDATED) -->
    <section id="services" class="py-20">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="section-title">Our Service</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service Card -->
                <?php 
                    foreach($service as $key => $service) 
                    { 
                ?>
                <a href="water-treatment.html" class="block relative rounded-3xl overflow-hidden h-[600px] shadow-xl group text-white">
                    <img src="<?= base_url('uploads/');?>images/categories/<?= $service->images;?>" class="absolute w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 ease-in-out" alt="Water Treatment Plant">
                    <div class="absolute bottom-0 left-0 right-0 h-1/3 bg-gradient-to-t from-black/70 to-transparent"></div>
                    <div class="relative h-full flex flex-col justify-end p-8">
                        <h3 class="text-3xl font-bold"><?= $service->description;?></h3>
                    </div>
                </a>
                <?php
                    }
                ?>
            </div>
        </div>
    </section>

    <!-- Trending News Section (UPDATED) -->
    <section id="news" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="section-title">Trending News</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php 
                    foreach($news as $key => $news) 
                    { 
                ?>
                <div class="card overflow-hidden">
                    <img src="<?= base_url('uploads/');?>images/news/<?= $news->image_display;?>" alt="News 1" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2"><?= $news->title;?></h3>
                        <a href="<?= base_url();?>frontend/News/read/<?= $news->id;?>" class="text-blue-600 font-semibold hover:underline">Read more &rarr;</a>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
            <div class="text-center mt-12">
                <a href="<?= base_url();?>frontend/News/index" class="blue-btn">View All</a>
            </div>
        </div>
    </section>

    <!-- Testimonials & Social Media Section -->
    <section id="testimonials" class="py-20">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="section-title">Unmatched Quality. Unforgettable Service.</h2>
            </div>

            <!-- Swiper Slider -->
            <div class="relative px-12">
                <div class="swiper testimonial-slider">
                    <div class="swiper-wrapper pb-10">
                        <!-- Slide 1 -->
                        <?php 
                            foreach($reviews as $key => $reviews) 
                            { 
                        ?>
                        <div class="swiper-slide h-auto">
                            <div class="card p-8 h-full flex flex-col justify-between bg-gray-100">
                                <p class="text-gray-700 italic">"<?= $reviews->description;?>"</p>
                                <div>
                                    <p class="mt-4 font-semibold text-gray-800">- <?= $reviews->name;?></p>
                                    <div class="text-blue-500 mt-1 text-xl">
                                        <?php
                                            if($reviews->rate == '1')
                                            {
                                                echo '★';
                                            }
                                            if($reviews->rate == '2')
                                            {
                                                echo '★★';
                                            }
                                            if($reviews->rate == '3')
                                            {
                                                echo '★★★';
                                            }
                                            if($reviews->rate == '4')
                                            {
                                                echo '★★★★';
                                            }
                                            if($reviews->rate == '5')
                                            {
                                                echo '★★★★★';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <!-- Navigation Buttons -->
                <div class="swiper-button-prev -left-0"></div>
                <div class="swiper-button-next -right-0"></div>
            </div>

            <!-- Social Media Section -->
            <div class="mt-20">
                <h2 class="section-title text-center mb-12">Social Media</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                    <a href="#" class="block group"><div class="rounded-lg overflow-hidden shadow-lg aspect-w-1 aspect-h-1"><img src="<?= base_url('uploads/');?>images/home/G.jpg" alt="Social Media Post 1" class="w-full h-full object-cover group-hover:opacity-80 transition-opacity"></div></a>
                    <a href="#" class="block group"><div class="rounded-lg overflow-hidden shadow-lg aspect-w-1 aspect-h-1"><img src="<?= base_url('uploads/');?>images/home/H.jpg" alt="Social Media Post 2" class="w-full h-full object-cover group-hover:opacity-80 transition-opacity"></div></a>
                    <a href="#" class="block group"><div class="rounded-lg overflow-hidden shadow-lg aspect-w-1 aspect-h-1"><img src="<?= base_url('uploads/');?>images/home/I.jpg" alt="Social Media Post 3" class="w-full h-full object-cover group-hover:opacity-80 transition-opacity"></div></a>
                    <a href="#" class="block group"><div class="rounded-lg overflow-hidden shadow-lg aspect-w-1 aspect-h-1"><img src="<?= base_url('uploads/');?>images/home/J.jpg" alt="Social Media Post 4" class="w-full h-full object-cover group-hover:opacity-80 transition-opacity"></div></a>
                    <a href="#" class="block group"><div class="rounded-lg overflow-hidden shadow-lg aspect-w-1 aspect-h-1"><img src="<?= base_url('uploads/');?>images/home/K.jpg" alt="Social Media Post 5" class="w-full h-full object-cover group-hover:opacity-80 transition-opacity"></div></a>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="section-title">Frequently Asked Questions</h2>
            </div>
            <div class="max-w-3xl mx-auto" id="faq-container">
                <!-- FAQ items will be dynamically inserted here by JS -->
            </div>
        </div>
    </section>
    
    <!-- Consultation Form Section (UPDATED) -->
    <section id="contact" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-3 gap-12 items-start">
                <!-- Left Column -->
                <div class="lg:col-span-1">
                    <h2 class="text-4xl lg:text-5xl font-extrabold text-gray-900 leading-tight">Schedulle Your Water Problem Consultation</h2>
                    <p class="mt-4 text-gray-600">Our Aqualife water experts are ready to assist you in finding the ideal solution tailored to your needs. Fill out the form below to schedule a consultation and let us help you improve your water quality today.</p>
                </div>
                <!-- Right Column -->
                <div class="lg:col-span-2">
                    <!-- Stepper -->
                    <div class="flex items-center mb-8">
                        <div class="stepper-item flex-1 text-center" data-step-id="1">
                            <div class="relative flex items-center justify-center">
                                <div class="stepper-circle w-8 h-8 rounded-full flex items-center justify-center font-bold transition-colors">1</div>
                                <div class="stepper-line absolute top-1/2 left-full transform -translate-y-1/2"></div>
                            </div>
                            <p class="stepper-title text-sm font-semibold mt-2 transition-colors">Information</p>
                        </div>
                        <div class="stepper-item flex-1 text-center" data-step-id="2">
                            <div class="relative flex items-center justify-center">
                                <div class="stepper-line absolute top-1/2 right-full transform -translate-y-1/2"></div>
                                <div class="stepper-circle w-8 h-8 rounded-full flex items-center justify-center font-bold transition-colors">2</div>
                                <div class="stepper-line absolute top-1/2 left-full transform -translate-y-1/2"></div>
                            </div>
                            <p class="stepper-title text-sm font-semibold mt-2 text-gray-500 transition-colors">Options</p>
                        </div>
                            <div class="stepper-item flex-1 text-center" data-step-id="3">
                            <div class="relative flex items-center justify-center">
                                <div class="stepper-line absolute top-1/2 right-full transform -translate-y-1/2"></div>
                                <div class="stepper-circle w-8 h-8 rounded-full flex items-center justify-center font-bold transition-colors">3</div>
                            </div>
                            <p class="stepper-title text-sm font-semibold mt-2 text-gray-500 transition-colors">Confirmations</p>
                        </div>
                    </div>

                    <!-- Form Steps -->
                    <form id="consultation-form">
                        <!-- Step 1: Information -->
                        <div data-step="1">
                            <h3 class="text-2xl font-bold text-gray-800 mb-1">Enter Your Information</h3>
                            <p class="text-sm text-gray-500 mb-6">Fields marked * are required fields.</p>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="your-name" class="block text-sm font-medium text-gray-700">Your Name *</label>
                                    <input type="text" name="your-name" id="your-name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label for="last-name" class="block text-sm font-medium text-gray-700">Last Name *</label>
                                    <input type="text" name="last-name" id="last-name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label for="address" class="block text-sm font-medium text-gray-700">Address *</label>
                                    <input type="text" name="address" id="address" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label for="city" class="block text-sm font-medium text-gray-700">City *</label>
                                    <input type="text" name="city" id="city" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label for="state-province" class="block text-sm font-medium text-gray-700">State/Province *</label>
                                    <input type="text" name="state-province" id="state-province" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address *</label>
                                    <input type="email" name="email" id="email" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label for="phone-number" class="block text-sm font-medium text-gray-700">Phone Number *</label>
                                    <input type="tel" name="phone-number" id="phone-number" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label for="consultation-time" class="block text-sm font-medium text-gray-700">Preferred Consultation Date & Time (optional)</label>
                                    <input type="datetime-local" name="consultation-time" id="consultation-time" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>
                            </div>
                        </div>
                        <!-- Step 2: Options -->
                        <div data-step="2" class="hidden">
                            <h3 class="text-2xl font-bold text-gray-800 mb-6">Choose Your Options</h3>
                            <div class="space-y-4">
                                <label class="block text-sm font-medium text-gray-700">What is the primary issue with your water?</label>
                                <select class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option>Bad Taste or Smell</option>
                                    <option>Cloudiness or Discoloration</option>
                                    <option>Hard Water / Scale Buildup</option>
                                    <option>Health Concerns (Bacteria, etc.)</option>
                                    <option>Not Sure</option>
                                </select>
                                <label class="block text-sm font-medium text-gray-700">Which products are you interested in?</label>
                                    <div class="space-y-2">
                                    <label class="flex items-center"><input type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 mr-2">Water Treatment Plant</label>
                                    <label class="flex items-center"><input type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 mr-2">Water Softener</label>
                                    <label class="flex items-center"><input type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 mr-2">RO-Drinking Water</label>
                                    </div>
                            </div>
                        </div>
                            <!-- Step 3: Confirmation -->
                            <div data-step="3" class="hidden">
                                <h3 class="text-2xl font-bold text-gray-800 mb-6">Confirmation</h3>
                                <p class="text-gray-700">Please review your information below. If everything is correct, please submit your request.</p>
                                <div id="confirmation-details" class="mt-4 space-y-2 p-4 bg-gray-100 rounded-md">
                                    <!-- Confirmation details will be populated here by JS -->
                                </div>
                            </div>

                        <!-- Navigation Buttons -->
                        <div class="mt-8 flex justify-end space-x-4">
                            <button type="button" id="prev-step" class="py-2 px-6 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 hidden">Previous</button>
                            <button type="button" id="next-step" class="blue-btn">Next Step</button>
                            <button type="submit" id="submit-form" class="blue-btn hidden">Submit Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</main>