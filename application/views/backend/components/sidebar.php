<?php 
    $seg2 = $this->uri->segment(2);
    $seg3 = $this->uri->segment(3);
    $seg4 = $this->uri->segment(4);
    
    $CI =& get_instance();
    $CI->load->model('Category_model');
    
    $menu_with_subcategories = ['water_treatment_plant', 'water_softener', 'ro_drinking_water'];
    $subcategories_by_slug = [];
    try {
        foreach ($menu_with_subcategories as $slug) {
            $parent = $CI->Category_model->get_by_slug($slug);
            $subcategories_by_slug[$slug] = ($parent && method_exists($CI->Category_model, 'get_children')) 
                ? $CI->Category_model->get_children($parent->id) : [];
        }
    } catch (Throwable $e) {
        $subcategories_by_slug = array_fill_keys($menu_with_subcategories, []);
    }
    
    $is_parent_expanded = function($slug, $subs) use ($seg2) {
        if ($seg2 === $slug) return true;
        foreach ($subs as $s) {
            if ($seg2 === $s->slug) return true;
        }
        return false;
    };
?>

<div id="scrollbar">
    <div class="container-fluid">

        <div id="two-column-menu">
        </div>
        <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Menu</span></li>

            <!-- HOME -->
            <li class="nav-item">
                <a class="nav-link menu-link collapsed <?= $seg2 == 'home' ? 'active' : '' ?>" 
                    href="#home" 
                    data-bs-toggle="collapse"
                    role="button" 
                    aria-expanded="false"
                    aria-controls="home">
                    <i class="bi bi-radioactive"></i> <span data-key="home">Home</span>
                </a>
                <div class="collapse menu-dropdown mega-dropdown-menu <?= $seg2 == 'home' ? 'show' : '' ?>" id="home">
                    <div class="row">
                        <div class="col-lg-4">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/home/banner_header') ?>" 
                                        class="nav-link <?= $seg2 == 'home' && $seg3 == 'banner_header' ? 'active' : '' ?>">Banner Header</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/home/about') ?>" 
                                        class="nav-link <?= $seg2 == 'home' && $seg3 == 'about' ? 'active' : '' ?>">About</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/home/our_service') ?>" 
                                        class="nav-link <?= $seg2 == 'home' && $seg3 == 'our_service' ? 'active' : '' ?>">Our Service</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/home/review') ?>" 
                                        class="nav-link <?= $seg2 == 'home' && $seg3 == 'review' ? 'active' : '' ?>">Review</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/home/faqs') ?>" 
                                        class="nav-link <?= $seg2 == 'home' && $seg3 == 'faqs' ? 'active' : '' ?>">Faqs</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/home/consultation') ?>" 
                                        class="nav-link <?= $seg2 == 'home' && $seg3 == 'consultation' ? 'active' : '' ?>">Consultation</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/home/subscribe') ?>" 
                                        class="nav-link <?= $seg2 == 'home' && $seg3 == 'subscribe' ? 'active' : '' ?>">Subscribed</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>

            <!-- NEWS -->
            <li class="nav-item">
                <a class="nav-link menu-link collapsed <?= $seg2 == 'news' ? 'active' : '' ?>" 
                    href="#news" 
                    data-bs-toggle="collapse"
                    role="button" 
                    aria-expanded="false"
                    aria-controls="news">
                    <i class="bi bi-radioactive"></i> <span data-key="News">News</span>
                </a>
                <div class="collapse menu-dropdown mega-dropdown-menu <?= $seg2 == 'news' ? 'show' : '' ?>" id="news">
                    <div class="row">
                        <div class="col-lg-4">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/news/banner_header') ?>" 
                                        class="nav-link <?= $seg2 == 'news' && $seg3 == 'banner_header' ? 'active' : '' ?>">Banner Header</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/news/news') ?>" 
                                        class="nav-link <?= $seg2 == 'news' && $seg3 == 'news' ? 'active' : '' ?>">Post News</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>

            <!-- WATER TREATMENT PLANT -->
            <?php 
            $wtp_subs     = $subcategories_by_slug['water_treatment_plant'] ?? [];
            $wtp_expanded = $is_parent_expanded('water_treatment_plant', $wtp_subs);
            ?>
            <li class="nav-item">
                <a class="nav-link menu-link collapsed <?= $wtp_expanded ? 'active' : '' ?>" 
                    href="#water_treatment_plant" 
                    data-bs-toggle="collapse" 
                    role="button" 
                    aria-expanded="<?= $wtp_expanded ? 'true' : 'false' ?>" 
                    aria-controls="water_treatment_plant">
                    <i class="bi bi-radioactive"></i> <span data-key="water_treatment_plant">Water Treatment Plant</span>
                </a>
                <div class="collapse menu-dropdown mega-dropdown-menu <?= $wtp_expanded ? 'show' : '' ?>" id="water_treatment_plant">
                    <div class="row">
                        <div class="col-lg-4">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/water_treatment_plant/banner_header') ?>" 
                                        class="nav-link <?= $seg2 == 'water_treatment_plant' && $seg3 == 'banner_header' ? 'active' : '' ?>">Banner Header</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/water_treatment_plant/overview') ?>" 
                                        class="nav-link <?= $seg2 == 'water_treatment_plant' && $seg3 == 'overview' ? 'active' : '' ?>">Overview</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/water_treatment_plant/did_you_know') ?>" 
                                        class="nav-link <?= $seg2 == 'water_treatment_plant' && $seg3 == 'did_you_know' ? 'active' : '' ?>">Did you know</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/water_treatment_plant/did_you_know_point') ?>" 
                                        class="nav-link <?= $seg2 == 'water_treatment_plant' && $seg3 == 'did_you_know_point' ? 'active' : '' ?>">Did you know point</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/water_treatment_plant/benefit') ?>" 
                                        class="nav-link <?= $seg2 == 'water_treatment_plant' && $seg3 == 'benefit' ? 'active' : '' ?>">Benefit</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/water_treatment_plant/adventage') ?>" 
                                        class="nav-link <?= $seg2 == 'water_treatment_plant' && $seg3 == 'adventage' ? 'active' : '' ?>">Our adventage</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/water_treatment_plant/our_service') ?>" 
                                        class="nav-link <?= $seg2 == 'water_treatment_plant' && $seg3 == 'our_service' ? 'active' : '' ?>">Our Service</a>
                                </li>
                                <?php foreach ($wtp_subs as $sub) : ?>
                                <li class="nav-item submenu-item">
                                    <a class="nav-link collapsed <?= $seg2 == $sub->slug ? 'active' : '' ?>" 
                                        href="#water_treatment_plant_<?= $sub->id ?>" 
                                        data-bs-toggle="collapse" 
                                        role="button" 
                                        aria-expanded="<?= $seg2 == $sub->slug ? 'true' : 'false' ?>" 
                                        aria-controls="water_treatment_plant_<?= $sub->id ?>">
                                        <i class="ri-arrow-right-s-line me-1"></i> <?= htmlspecialchars($sub->name) ?>
                                    </a>
                                    <div class="collapse menu-dropdown submenu-dropdown <?= $seg2 == $sub->slug ? 'show' : '' ?>" id="water_treatment_plant_<?= $sub->id ?>">
                                        <ul class="nav nav-sm flex-column ms-3">
                                            <li class="nav-item">
                                                <a href="<?= base_url('backend/'.$sub->slug.'/product') ?>" 
                                                    class="nav-link <?= $seg2 == $sub->slug && $seg3 == 'product' ? 'active' : '' ?>">Product</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/water_treatment_plant/product') ?>" 
                                        class="nav-link <?= $seg2 == 'water_treatment_plant' && $seg3 == 'product' ? 'active' : '' ?>">Product</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>

            <!-- WATER SOFTENER -->
            <?php 
            $ws_subs     = $subcategories_by_slug['water_softener'] ?? [];
            $ws_expanded = $is_parent_expanded('water_softener', $ws_subs);
            ?>
            <li class="nav-item">
                <a class="nav-link menu-link collapsed <?= $ws_expanded ? 'active' : '' ?>" 
                    href="#water_softener" 
                    data-bs-toggle="collapse" 
                    role="button" 
                    aria-expanded="<?= $ws_expanded ? 'true' : 'false' ?>" 
                    aria-controls="water_softener">
                    <i class="bi bi-radioactive"></i> <span data-key="water_softener">Water Softener</span>
                </a>
                <div class="collapse menu-dropdown mega-dropdown-menu <?= $ws_expanded ? 'show' : '' ?>" id="water_softener">
                    <div class="row">
                        <div class="col-lg-4">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/water_softener/banner_header') ?>" 
                                        class="nav-link <?= $seg2 == 'water_softener' && $seg3 == 'banner_header' ? 'active' : '' ?>">Banner Header</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/water_softener/overview') ?>" 
                                        class="nav-link <?= $seg2 == 'water_softener' && $seg3 == 'overview' ? 'active' : '' ?>">Overview</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/water_softener/did_you_know') ?>" 
                                        class="nav-link <?= $seg2 == 'water_softener' && $seg3 == 'did_you_know' ? 'active' : '' ?>">Did you know</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/water_softener/benefit') ?>" 
                                        class="nav-link <?= $seg2 == 'water_softener' && $seg3 == 'benefit' ? 'active' : '' ?>">Benefit</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/water_softener/adventage') ?>" 
                                        class="nav-link <?= $seg2 == 'water_softener' && $seg3 == 'adventage' ? 'active' : '' ?>">Our adventage</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/water_softener/why_choose_us') ?>" 
                                        class="nav-link <?= $seg2 == 'water_softener' && $seg3 == 'why_choose_us' ? 'active' : '' ?>">Why choose us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/water_softener/our_service') ?>" 
                                        class="nav-link <?= $seg2 == 'water_softener' && $seg3 == 'our_service' ? 'active' : '' ?>">Our Service</a>
                                </li>
                                <?php foreach ($ws_subs as $sub) : ?>
                                <li class="nav-item submenu-item">
                                    <a class="nav-link collapsed <?= $seg2 == $sub->slug ? 'active' : '' ?>" 
                                        href="#water_softener_<?= $sub->id ?>" 
                                        data-bs-toggle="collapse" 
                                        role="button" 
                                        aria-expanded="<?= $seg2 == $sub->slug ? 'true' : 'false' ?>" 
                                        aria-controls="water_softener_<?= $sub->id ?>">
                                        <i class="ri-arrow-right-s-line me-1"></i> <?= htmlspecialchars($sub->name) ?>
                                    </a>
                                    <div class="collapse menu-dropdown submenu-dropdown <?= $seg2 == $sub->slug ? 'show' : '' ?>" id="water_softener_<?= $sub->id ?>">
                                        <ul class="nav nav-sm flex-column ms-3">
                                            <li class="nav-item">
                                                <a href="<?= base_url('backend/'.$sub->slug.'/product') ?>" 
                                                    class="nav-link <?= $seg2 == $sub->slug && $seg3 == 'product' ? 'active' : '' ?>">Product</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/water_softener/product') ?>" 
                                        class="nav-link <?= $seg2 == 'water_softener' && $seg3 == 'product' ? 'active' : '' ?>">Product</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>

            <!-- RO-DRINKING WATER -->
            <?php 
            $rodw_subs     = $subcategories_by_slug['ro_drinking_water'] ?? [];
            $rodw_expanded = $is_parent_expanded('ro_drinking_water', $rodw_subs);
            ?>
            <li class="nav-item">
                <a class="nav-link menu-link collapsed <?= $rodw_expanded ? 'active' : '' ?>" 
                    href="#ro_drinking_water" 
                    data-bs-toggle="collapse" 
                    role="button" 
                    aria-expanded="<?= $rodw_expanded ? 'true' : 'false' ?>" 
                    aria-controls="ro_drinking_water">
                    <i class="bi bi-radioactive"></i> <span data-key="ro_drinking_water">RO-Drinking Water</span>
                </a>
                <div class="collapse menu-dropdown mega-dropdown-menu <?= $rodw_expanded ? 'show' : '' ?>" id="ro_drinking_water">
                    <div class="row">
                        <div class="col-lg-4">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/ro_drinking_water/banner_header') ?>" 
                                        class="nav-link <?= $seg2 == 'ro_drinking_water' && $seg3 == 'banner_header' ? 'active' : '' ?>">Banner Header</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/ro_drinking_water/overview') ?>" 
                                        class="nav-link <?= $seg2 == 'ro_drinking_water' && $seg3 == 'overview' ? 'active' : '' ?>">Overview</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/ro_drinking_water/did_you_know') ?>" 
                                        class="nav-link <?= $seg2 == 'ro_drinking_water' && $seg3 == 'did_you_know' ? 'active' : '' ?>">Did you know</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/ro_drinking_water/did_you_know_point') ?>" 
                                        class="nav-link <?= $seg2 == 'ro_drinking_water' && $seg3 == 'did_you_know_point' ? 'active' : '' ?>">Did you know point</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/ro_drinking_water/benefit') ?>" 
                                        class="nav-link <?= $seg2 == 'ro_drinking_water' && $seg3 == 'benefit' ? 'active' : '' ?>">Benefit</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/ro_drinking_water/adventage') ?>" 
                                        class="nav-link <?= $seg2 == 'ro_drinking_water' && $seg3 == 'adventage' ? 'active' : '' ?>">Our adventage</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#sidebarProdDesc" class="nav-link <?= $seg2 == 'ro_drinking_water' && $seg3 == 'product_description' ? 'active' : '' ?>" 
                                        data-bs-toggle="collapse" role="button" 
                                        aria-expanded="<?= $seg2 == 'ro_drinking_water' && $seg3 == 'product_description' ? 'true' : 'false' ?>" 
                                        aria-controls="sidebarProdDesc">
                                        Product description
                                    </a>
                                    <div class="collapse menu-dropdown <?= $seg2 == 'ro_drinking_water' && $seg3 == 'product_description' ? 'show' : '' ?>" id="sidebarProdDesc">
                                        <ul class="nav nav-sm flex-column">
                                            <?php for ($i = 1; $i <= 8; $i++) : ?>
                                            <li class="nav-item">
                                                <a href="<?= base_url("backend/ro_drinking_water/product_description/$i") ?>" 
                                                    class="nav-link <?= $seg2 == 'ro_drinking_water' && $seg3 == 'product_description' && $seg4 == $i ? 'active' : '' ?>">
                                                    Description <?= $i ?></a>
                                            </li>
                                            <?php endfor; ?>
                                            <li class="nav-item">
                                                <a href="<?= base_url('backend/ro_drinking_water/product_description/9') ?>" 
                                                    class="nav-link <?= $seg2 == 'ro_drinking_water' && $seg3 == 'product_description' && $seg4 == '9' ? 'active' : '' ?>">
                                                    Contact us image</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <?php $catDescActive = $seg2 == 'ro_drinking_water' && in_array($seg3, ['category_description', 'product_image']); ?>
                                <li class="nav-item">
                                    <a href="#sidebarCatDesc" class="nav-link <?= $catDescActive ? 'active' : '' ?>" 
                                        data-bs-toggle="collapse" role="button" 
                                        aria-expanded="<?= $catDescActive ? 'true' : 'false' ?>" 
                                        aria-controls="sidebarCatDesc">
                                        Category description
                                    </a>
                                    <div class="collapse menu-dropdown <?= $catDescActive ? 'show' : '' ?>" id="sidebarCatDesc">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="<?= base_url('backend/ro_drinking_water/product_image') ?>" 
                                                    class="nav-link <?= $seg2 == 'ro_drinking_water' && $seg3 == 'product_image' ? 'active' : '' ?>">
                                                    Product image</a>
                                            </li>
                                            <?php for ($i = 1; $i <= 9; $i++) : ?>
                                            <li class="nav-item">
                                                <a href="<?= base_url("backend/ro_drinking_water/category_description/$i") ?>" 
                                                    class="nav-link <?= $seg2 == 'ro_drinking_water' && $seg3 == 'category_description' && $seg4 == $i ? 'active' : '' ?>">
                                                    Description <?= $i ?></a>
                                            </li>
                                            <?php endfor; ?>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/ro_drinking_water/why_choose_us') ?>" 
                                        class="nav-link <?= $seg2 == 'ro_drinking_water' && $seg3 == 'why_choose_us' ? 'active' : '' ?>">Why choose us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/ro_drinking_water/our_service') ?>" 
                                        class="nav-link <?= $seg2 == 'ro_drinking_water' && $seg3 == 'our_service' ? 'active' : '' ?>">Our Service</a>
                                </li>
                                <?php foreach ($rodw_subs as $sub) : ?>
                                <li class="nav-item submenu-item">
                                    <a class="nav-link collapsed <?= $seg2 == $sub->slug ? 'active' : '' ?>" 
                                        href="#ro_drinking_water_<?= $sub->id ?>" 
                                        data-bs-toggle="collapse" 
                                        role="button" 
                                        aria-expanded="<?= $seg2 == $sub->slug ? 'true' : 'false' ?>" 
                                        aria-controls="ro_drinking_water_<?= $sub->id ?>">
                                        <i class="ri-arrow-right-s-line me-1"></i> <?= htmlspecialchars($sub->name) ?>
                                    </a>
                                    <div class="collapse menu-dropdown submenu-dropdown <?= $seg2 == $sub->slug ? 'show' : '' ?>" id="ro_drinking_water_<?= $sub->id ?>">
                                        <ul class="nav nav-sm flex-column ms-3">
                                            <li class="nav-item">
                                                <a href="<?= base_url('backend/'.$sub->slug.'/product') ?>" 
                                                    class="nav-link <?= $seg2 == $sub->slug && $seg3 == 'product' ? 'active' : '' ?>">Product</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="<?= base_url('backend/'.$sub->slug.'/product_image') ?>" 
                                                    class="nav-link <?= $seg2 == $sub->slug && $seg3 == 'product_image' ? 'active' : '' ?>">Product image</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/ro_drinking_water/product') ?>" 
                                        class="nav-link <?= $seg2 == 'ro_drinking_water' && $seg3 == 'product' ? 'active' : '' ?>">Product</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>

            <!-- USER -->
            <li class="nav-item">
                <a class="nav-link menu-link <?= $seg2 == 'user' ? 'active' : '' ?>" href="<?= base_url('backend/user') ?>">
                    <i class="bi bi-person"></i> <span data-key="t-user">User</span>
                </a>
            </li>

        </ul>
    </div>
    <!-- Sidebar -->
</div>
