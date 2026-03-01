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
        if(isset($header) && is_array($header)) {
            foreach($header as $key => $header_item) { 
    ?>
    <section class="relative h-screen bg-cover bg-center text-white" style="background-image: url('<?= base_url('uploads/');?>images/headers/<?= $header_item->images;?>');">
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="relative container mx-auto px-6 h-full flex items-center">
            <div class="w-full md:w-1/2">
                <h1 class="text-5xl md:text-7xl font-extrabold leading-tight">
                    <?= $header_item->subtitle;?>
                </h1>
                <p class="mt-4 text-lg max-w-lg text-gray-200">
                    <?= $header_item->description;?>
                </p>
                <a href="#contact" class="blue-btn mt-8 inline-block">SHOP NOW!</a>
            </div>
        </div>
    </section>
    <?php
            }
        }
    ?>

    <!-- About Us Section (UPDATED) -->
    
    <section id="about" class="py-20 bg-blue-600 text-white">
        <div class="container mx-auto px-6 text-center">
            <p class="font-semibold text-blue-200">About Us</p>
            <?php 
                if(isset($about) && is_array($about)) {
                    foreach($about as $key => $about_item) { 
            ?>
            <h2 class="text-4xl font-extrabold mt-2"><?= $about_item->name;?></h2>
            <p class="mt-4 max-w-3xl mx-auto text-blue-100">
                <?= $about_item->description;?>
            </p>
            <?php
                    }
                }
            ?>
            <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-8 text-gray-800">
                <!-- Card 1 -->
                <?php 
                    if(isset($about_detail) && is_array($about_detail)) {
                        foreach($about_detail as $key => $detail) { 
                ?>
                <div class="bg-white rounded-full p-6 shadow-lg flex items-center space-x-6">
                    <div class="bg-blue-100 rounded-full p-3 flex-shrink-0">
                        <i data-feather="<?= $detail->icon;?>" class="h-10 w-10 text-blue-600"></i>
                    </div>
                    <div class="text-left">
                        <h3 class="text-lg font-bold"><?= $detail->title;?></h3>
                        <p class="text-sm text-gray-600"><?= $detail->subtitle;?></p>
                    </div>
                </div>
                <?php
                        }
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
                    if(isset($service) && is_array($service)) {
                        foreach($service as $key => $service_item) { 
                ?>
                <a href="<?= base_url();?>frontend/<?= $service_item->path;?>" class="block relative rounded-3xl overflow-hidden h-[600px] shadow-xl group text-white">
                    <img src="<?= base_url('uploads/');?>images/categories/<?= $service_item->images;?>" class="absolute w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 ease-in-out" alt="Water Treatment Plant">
                    <div class="absolute bottom-0 left-0 right-0 h-1/3 bg-gradient-to-t from-black/70 to-transparent"></div>
                    <div class="relative h-full flex flex-col justify-end p-8">
                        <h3 class="text-3xl font-bold"><?= $service_item->description;?></h3>
                    </div>
                </a>
                <?php
                        }
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
                    if(isset($news) && is_array($news)) {
                        foreach($news as $key => $news_item) { 
                ?>
                <div class="card overflow-hidden">
                    <img src="<?= base_url('uploads/');?>images/news/<?= $news_item->image_display;?>" alt="News 1" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2"><?= $news_item->title;?></h3>
                        <a href="<?= base_url();?>frontend/News/read/<?= $news_item->id;?>" class="text-blue-600 font-semibold hover:underline">Read more &rarr;</a>
                    </div>
                </div>
                <?php
                        }
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
                            if(isset($reviews) && is_array($reviews)) {
                                foreach($reviews as $key => $review) {
                        ?>
                        <div class="swiper-slide h-auto">
                            <div class="card p-8 h-full flex flex-col justify-between bg-gray-100">
                                <p class="text-gray-700 italic">"<?= $review->description;?>"</p>
                                <div>
                                    <p class="mt-4 font-semibold text-gray-800">- <?= $review->name;?></p>
                                    <div class="text-blue-500 mt-1 text-xl">
                                        <?php echo str_repeat('★', (int)$review->rate); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                                }
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
                <!-- LightWidget WIDGET --><script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="https://cdn.lightwidget.com/widgets/df18f224efc4582c8cc2b432040fea84.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>
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
                        <div class="stepper-item flex-1 text-center active" data-step-id="1">
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
                    <!-- MODIFICATION: Added 'consultation-form' class -->
                    <form id="consultation-form" class="consultation-form" action="<?= base_url("frontend/Index/simpan_ajax");?>" method="post">
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
                                <select id="masalah" name="masalah" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option value="Bad Taste or Smell">Bad Taste or Smell</option>
                                    <option value="Cloudiness or Discoloration">Cloudiness or Discoloration</option>
                                    <option value="Hard Water / Scale Buildup">Hard Water / Scale Buildup</option>
                                    <option value="Health Concerns (Bacteria, etc.)">Health Concerns (Bacteria, etc.)</option>
                                    <option value="Not Sure">Not Sure</option>
                                </select>
                                <label class="block text-sm font-medium text-gray-700">Which products are you interested in?</label>
                                    <div class="space-y-2">
                                        <label class="flex items-center"><input type="checkbox" id="wt" name="wt" value="2" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 mr-2">Water Treatment Plant</label>
                                        <label class="flex items-center"><input type="checkbox" id="ws" name="ws" value="3" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 mr-2">Water Softener</label>
                                        <label class="flex items-center"><input type="checkbox" id="dw" name="dw" value="4" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 mr-2">RO-Drinking Water</label>
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

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
    // Initialize Feather Icons
    if (typeof feather !== 'undefined') {
        feather.replace();
    }

    // Mobile Menu Toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    if(mobileMenuButton) {
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }


    // Testimonial Slider Initialization
    const testimonialSlider = document.querySelector('.testimonial-slider');
    if (testimonialSlider) {
        const swiper = new Swiper('.testimonial-slider', {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 20,
            breakpoints: {
                768: { slidesPerView: 2, spaceBetween: 30 },
                1024: { slidesPerView: 3, spaceBetween: 30 },
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    }


    // FAQ Accordion Logic
    const faqContainer = document.getElementById('faq-container');
    if (faqContainer) {
        const faqs = <?= isset($faq) ? json_encode($faq) : '[]' ?>;
        faqs.forEach(faq => {
            const faqItem = document.createElement('div');
            faqItem.className = 'border-b border-gray-200 py-4';
            faqItem.innerHTML = `
                <button class="faq-question w-full flex justify-between items-center text-left text-lg font-semibold text-gray-800 focus:outline-none">
                    <span>${faq.question}</span>
                    <span class="faq-arrow transform transition-transform duration-300">
                        <i data-feather="chevron-down" class="h-6 w-6 text-gray-500"></i>
                    </span>
                </button>
                <div class="faq-answer mt-2 text-gray-600">
                    <p class="p-2">${faq.answer}</p>
                </div>
            `;
            faqContainer.appendChild(faqItem);
        });

        document.querySelectorAll('.faq-question').forEach(button => {
            button.addEventListener('click', () => {
                const answer = button.nextElementSibling;
                button.classList.toggle('active');
                answer.style.maxHeight = answer.style.maxHeight ? null : answer.scrollHeight + 'px';
            });
        });
        if (typeof feather !== 'undefined') {
             feather.replace();
        }
    }

    // Consultation Form Stepper Logic
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('consultation-form');
        if (!form) return;

        const prevButton = document.getElementById('prev-step');
        const nextButton = document.getElementById('next-step');
        const submitButton = document.getElementById('submit-form');
        const formSteps = document.querySelectorAll('[data-step]');
        const stepperItems = document.querySelectorAll('.stepper-item');
        let currentStep = 1;

        const showStep = (stepNumber) => {
            formSteps.forEach(step => {
                step.classList.toggle('hidden', parseInt(step.dataset.step) !== stepNumber);
            });
            
            stepperItems.forEach((item, index) => {
                item.classList.toggle('active', (index + 1) <= stepNumber);
            });

            prevButton.classList.toggle('hidden', stepNumber === 1);
            nextButton.classList.toggle('hidden', stepNumber === formSteps.length);
            submitButton.classList.toggle('hidden', stepNumber !== formSteps.length);
        };
        
        nextButton.addEventListener('click', () => {
            const currentFormStep = document.querySelector(`[data-step="${currentStep}"]`);
            const inputs = currentFormStep.querySelectorAll('input[required]');
            let isValid = true;
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    input.classList.add('border-red-500');
                } else {
                    input.classList.remove('border-red-500');
                }
            });

            if (isValid && currentStep < formSteps.length) {
                currentStep++;
                if (currentStep === formSteps.length) {
                    const confirmationDetails = document.getElementById('confirmation-details');
                    const formData = new FormData(form);
                    let detailsHtml = '';
                    for(let [key, value] of formData.entries()) {
                        if(value && typeof value === 'string') {
                            detailsHtml += `<p><strong class="capitalize">${key.replace(/-/g, ' ')}:</strong> ${value}</p>`;
                        }
                    }
                    confirmationDetails.innerHTML = detailsHtml;
                }
                showStep(currentStep);
            }
        });

        prevButton.addEventListener('click', () => {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        });

        showStep(currentStep);
    });
</script>
