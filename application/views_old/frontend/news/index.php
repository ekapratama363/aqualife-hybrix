<!-- Swiper.js for slider -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<style>
    /* Custom styles to match the PDF design */
    body {
        font-family: 'Inter', sans-serif;
        background-color: #FFFFFF; /* Light gray background */
    }
</style>

<main>
    <!-- Banner Section (MODIFIED) -->
    <section class="relative h-[100vh] bg-cover bg-center text-white flex items-center justify-center" style="background-image: url('assets/PICTURE VIEW ALL TRENDINGS NEWS 1/A.png');">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/50"></div>
        <!-- Content -->
        <div class="relative z-10 text-center px-4">
            <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight">Trending News</h1>
            <p class="mt-4 text-lg md:text-xl">Regarding Clean Water • Regarding Clean Water • Regarding Clean Water</p>
        </div>
    </section>

    <!-- News Grid Section -->
    <div class="container mx-auto px-6 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- News Card -->
             <?php 
                foreach($list_news as $key => $list_news) 
                { 
            ?>
            <div class="flex flex-col bg-white rounded-lg shadow-md overflow-hidden">
                <img src="<?= base_url('uploads/');?>images/news/<?= $list_news->image_display;?>" alt="News 1" class="w-full h-48 object-cover">
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-xl font-bold text-gray-800 mb-2"><?= $list_news->title;?></h3>
                    <p class="text-gray-600 text-sm flex-grow"><font style="font-size:14px;color:grey;"><?= $list_news->substr;?>...</font></p>
                    <a href="<?= base_url();?>frontend/News/read/<?= $list_news->id;?>" class="mt-4 text-blue-600 hover:underline font-semibold self-start">Read More</a>
                </div>
            </div>
            <?php
                }
            ?>
        </div>

        <div class="flex justify-center mt-16">
            <a href="index.html" class="bg-blue-600 text-white font-semibold py-3 px-8 rounded-lg hover:bg-blue-700 transition-colors">
                BACK HOME
            </a>
        </div>
    </div>
</main>