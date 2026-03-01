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
                <a href="<?= base_url();?>frontend/<?= $service->path;?>" class="block relative rounded-3xl overflow-hidden h-[600px] shadow-xl group text-white">
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
    
   
</main>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
    // Initialize Feather Icons
    feather.replace();

    // Mobile Menu Toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Testimonial Slider Initialization
    const swiper = new Swiper('.testimonial-slider', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 20,
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    // FAQ Data
    const faqs = <?= json_encode($faq) ?>;

    // FAQ Accordion Logic
    const faqContainer = document.getElementById('faq-container');
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

            if (answer.style.maxHeight) {
                answer.style.maxHeight = null;
            } else {
                answer.style.maxHeight = answer.scrollHeight + 'px';
            }
        });
    });

    // Consultation Form Stepper Logic
    document.addEventListener('DOMContentLoaded', () => {
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
                // Simple validation
            const currentFormStep = document.querySelector(`[data-step="${currentStep}"]`);
            const inputs = currentFormStep.querySelectorAll('input[required]');
            let isValid = true;
            inputs.forEach(input => {
                if (!input.value) {
                    isValid = false;
                    input.classList.add('border-red-500');
                } else {
                    input.classList.remove('border-red-500');
                }
            });

            if (isValid && currentStep < formSteps.length) {
                currentStep++;
                if (currentStep === formSteps.length) {
                    // Populate confirmation details
                    const confirmationDetails = document.getElementById('confirmation-details');
                    const formData = new FormData(document.getElementById('consultation-form'));
                    let detailsHtml = '';
                    for(let [key, value] of formData.entries()) {
                        if(value) {
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
    
    // Re-run feather.replace() after dynamic content is added
    feather.replace();
</script>