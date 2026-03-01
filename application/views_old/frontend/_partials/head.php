<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aqualife - Pure Water, Healthier Life</title>
    <link rel="shortcut icon" href="<?= base_url('uploads/');?>images/profiles/bbbb.png">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Feather Icons for UI elements -->
    <script src="<?= base_url() ?>assets/hybrix/js/feather.min.js"></script>
    <!-- bootstrap icons init -->
    <script src="<?= base_url() ?>assets/hybrix/js/pages/bootstrap-icons.init.js"></script>
</head>
<body class="bg-gray-50">
    <!-- Header Section -->
    <header class="bg-white/80 backdrop-blur-md shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <a href="<?= base_url();?>frontend/Index">
                    <!-- LOGO UPDATED -->
                    <img src="<?= base_url('uploads/');?>images/profiles/png5.png" alt="Aqualife Logo" class="h-12 w-auto">
                </a>
                <nav class="hidden md:flex items-center space-x-8">
                    <?php 
                        foreach($categories as $key => $categories) 
                        { 
                    ?>
                    <a href="<?= base_url();?>frontend/<?= $categories->path;?>" class="text-gray-600 hover:text-blue-600 font-medium"><?= $categories->name;?></a>
                    <?php
                        }
                    ?>
                </nav>
                <div class="hidden md:flex items-center">
                    <div class="relative">
                        <input type="text" placeholder="Search" class="bg-gray-100 border border-gray-300 rounded-full py-2 pl-4 pr-10 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <button class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <i data-feather="search" class="h-5 w-5 text-gray-400"></i>
                        </button>
                    </div>
                </div>
                 <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-600 hover:text-blue-600 focus:outline-none">
                        <i data-feather="menu" class="h-6 w-6"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden mt-4">
                <a href="#services" class="block py-2 px-4 text-sm text-gray-600 hover:bg-gray-200 rounded">Water Treatment Plant</a>
                <a href="#services" class="block py-2 px-4 text-sm text-gray-600 hover:bg-gray-200 rounded">Water Softener</a>
                <a href="#services" class="block py-2 px-4 text-sm text-gray-600 hover:bg-gray-200 rounded">RO-Drinking Water</a>
                <div class="mt-2 relative">
                    <input type="text" placeholder="Search" class="w-full bg-gray-100 border border-gray-300 rounded-full py-2 pl-4 pr-10 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button class="absolute inset-y-0 right-0 flex items-center pr-3">
                        <i data-feather="search" class="h-5 w-5 text-gray-400"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>