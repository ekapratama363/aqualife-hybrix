<style>
    body {
        font-family: 'Inter', sans-serif;
        background-color: #FFFFFF;
    }
    .article-content h2 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-top: 2rem;
        margin-bottom: 1rem;
    }
    .article-content p {
        margin-bottom: 1.5rem;
        line-height: 1.75;
        color: #4B5563; /* gray-600 */
    }
    .article-content blockquote {
        border-left: 4px solid #3B82F6;
        padding-left: 1rem;
        margin-left: 0;
        font-style: italic;
        color: #6B7280;
    }
</style>

<main>
    <?php 
        foreach($detail_news as $key => $detail_news) 
        { 
    ?>
    <!-- Full-width Banner Section -->
    <section class="w-full h-[70vh]">
        <img src="<?= base_url('uploads/');?>images/news/<?= $detail_news->image_header;?>" class="w-full h-full object-cover">
    </section>

    <!-- Article Section -->
    <div class="container mx-auto px-6 py-12">
        <article class="max-w-4xl mx-auto">
            <!-- Article Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight"><?= $detail_news->title;?></h1>
                <p class="mt-4 text-gray-500">Aqualife.com - <?= $detail_news->created_at;?></p>
            </div>

            <!-- Article Content -->
            <div class="prose lg:prose-xl max-w-none mx-auto article-content">
                <?php if (!empty($detail_news->description)) : ?>
                <p><?= $detail_news->description;?></p>
                <?php endif; ?>

                <img src="<?= base_url('uploads/');?>images/news/<?= $detail_news->images;?>" class="w-full h-auto rounded-2xl shadow-lg my-8">

                <?php if (!empty($detail_news->description2)) : ?>
                <p><?= $detail_news->description2;?></p>
                <?php endif; ?>
            </div>

            <!-- Back Button -->
            <div class="text-center mt-16">
                <a href="<?= base_url();?>frontend/News/index" class="bg-blue-600 text-white font-semibold py-3 px-8 rounded-lg hover:bg-blue-700 transition-colors">
                    BACK NEWS
                </a>
            </div>
        </article>
    </div>
    <?php
        }
    ?>
</main>