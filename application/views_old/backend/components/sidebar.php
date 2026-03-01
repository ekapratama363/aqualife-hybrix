<?php 
    $seg2 = $this->uri->segment(2);
    $seg3 = $this->uri->segment(3);
?>

<div id="scrollbar">
    <div class="container-fluid">

        <div id="two-column-menu">
        </div>
        <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Menu</span></li>

            <li class="nav-item">
                <a class="nav-link menu-link collapsed <?= $seg2 == 'home' ? 'active' : '' ?>" 
                    href="#home" 
                    data-bs-toggle="collapse"
                    role="button" 
                    aria-expanded="false"
                    aria-controls="home">
                    
                    <i class="bi bi-radioactive"></i> <span data-key="home">Home</span>
                </a>
                <div class="collapse menu-dropdown mega-dropdown-menu  <?= $seg2 == 'home' ? 'show' : '' ?>" id="home">
                    <div class="row">
                        <div class="col-lg-4">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/home/banner_header') ?>" 
                                        class="nav-link <?= $seg2 == 'home' && $seg3 == 'banner_header' ? 'active' : '' ?>" 
                                        data-key="t-alerts">Banner Header</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/home/about') ?>" 
                                        class="nav-link <?= $seg2 == 'home' && $seg3 == 'about' ? 'active' : '' ?>" 
                                        data-key="t-alerts">About</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/home/our_service') ?>" 
                                        class="nav-link <?= $seg2 == 'home' && $seg3 == 'our_service' ? 'active' : '' ?>" 
                                        data-key="t-alerts">Our Service</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/home/news') ?>" 
                                        class="nav-link <?= $seg2 == 'home' && $seg3 == 'news' ? 'active' : '' ?>" 
                                        data-key="t-alerts">News</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/home/review') ?>" 
                                        class="nav-link <?= $seg2 == 'home' && $seg3 == 'review' ? 'active' : '' ?>" 
                                        data-key="t-alerts">Review</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/home/faqs') ?>" 
                                        class="nav-link <?= $seg2 == 'home' && $seg3 == 'faqs' ? 'active' : '' ?>" 
                                        data-key="t-alerts">Faqs</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/home/consultation') ?>" 
                                        class="nav-link <?= $seg2 == 'home' && $seg3 == 'consultation' ? 'active' : '' ?>" 
                                        data-key="t-alerts">Consultation</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/home/subscribe') ?>" 
                                        class="nav-link <?= $seg2 == 'home' && $seg3 == 'subscribe' ? 'active' : '' ?>" 
                                        data-key="t-alerts">Subscribed</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link collapsed <?= $seg2 == 'water_treatment_plant' ? 'active' : '' ?>" 
                    href="#water_treatment_plant" 
                    data-bs-toggle="collapse" 
                    role="button" 
                    aria-expanded="false" 
                    aria-controls="water_treatment_plant">
                    <i class="bi bi-radioactive"></i> <span data-key="water_treatment_plant">Water Treatment Plant</span>
                </a>
                <div class="collapse menu-dropdown mega-dropdown-menu  <?= $seg2 == 'water_treatment_plant' ? 'show' : '' ?>" id="water_treatment_plant">
                    <div class="row">
                        <div class="col-lg-4">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/water_treatment_plant/banner_header') ?>" 
                                        class="nav-link <?= $seg2 == 'water_treatment_plant' && $seg3 == 'banner_header' ? 'active' : '' ?>" 
                                        data-key="t-alerts">Banner Header</a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('backend/water_treatment_plant/overview') ?>" 
                                        class="nav-link <?= $seg2 == 'water_treatment_plant' && $seg3 == 'overview' ? 'active' : '' ?>" 
                                        data-key="t-alerts">Overview</a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('backend/water_treatment_plant/did_you_know') ?>" 
                                        class="nav-link <?= $seg2 == 'water_treatment_plant' && $seg3 == 'did_you_know' ? 'active' : '' ?>" 
                                        data-key="t-alerts">Did you know</a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('backend/water_treatment_plant/did_you_know_point') ?>" 
                                        class="nav-link <?= $seg2 == 'water_treatment_plant' && $seg3 == 'did_you_know_point' ? 'active' : '' ?>" 
                                        data-key="t-alerts">Did you know point</a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('backend/water_treatment_plant/benefit') ?>" 
                                        class="nav-link <?= $seg2 == 'water_treatment_plant' && $seg3 == 'benefit' ? 'active' : '' ?>" 
                                        data-key="t-alerts">Benefit</a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('backend/water_treatment_plant/adventage') ?>" 
                                        class="nav-link <?= $seg2 == 'water_treatment_plant' && $seg3 == 'adventage' ? 'active' : '' ?>" 
                                        data-key="t-alerts">Our adventage</a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('backend/water_treatment_plant/product') ?>" 
                                        class="nav-link <?= $seg2 == 'water_treatment_plant' && $seg3 == 'product' ? 'active' : '' ?>" 
                                        data-key="t-alerts">Product</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link collapsed <?= $seg2 == 'water_softener' ? 'active' : '' ?>" 
                    href="#water_softener" 
                    data-bs-toggle="collapse" 
                    role="button" 
                    aria-expanded="false" 
                    aria-controls="water_softener">
                    <i class="bi bi-radioactive"></i> <span data-key="water_softener">Water Softener</span>
                </a>
                <div class="collapse menu-dropdown mega-dropdown-menu  <?= $seg2 == 'water_softener' ? 'show' : '' ?>" id="water_softener">
                    <div class="row">
                        <div class="col-lg-4">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/water_softener/banner_header') ?>" 
                                        class="nav-link <?= $seg2 == 'water_softener' && $seg3 == 'banner_header' ? 'active' : '' ?>" 
                                        data-key="t-alerts">Banner Header</a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('backend/water_softener/overview') ?>" 
                                        class="nav-link <?= $seg2 == 'water_softener' && $seg3 == 'overview' ? 'active' : '' ?>" 
                                        data-key="t-alerts">Overview</a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('backend/water_softener/did_you_know') ?>" 
                                        class="nav-link <?= $seg2 == 'water_softener' && $seg3 == 'did_you_know' ? 'active' : '' ?>" 
                                        data-key="t-alerts">Did you know</a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('backend/water_softener/benefit') ?>" 
                                        class="nav-link <?= $seg2 == 'water_softener' && $seg3 == 'benefit' ? 'active' : '' ?>" 
                                        data-key="t-alerts">Benefit</a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('backend/water_softener/adventage') ?>" 
                                        class="nav-link <?= $seg2 == 'water_softener' && $seg3 == 'adventage' ? 'active' : '' ?>" 
                                        data-key="t-alerts">Our adventage</a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('backend/water_softener/why_choose_us') ?>" 
                                        class="nav-link <?= $seg2 == 'water_softener' && $seg3 == 'why_choose_us' ? 'active' : '' ?>" 
                                        data-key="t-alerts">Why choose us</a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('backend/water_softener/product') ?>" 
                                        class="nav-link <?= $seg2 == 'water_softener' && $seg3 == 'product' ? 'active' : '' ?>" 
                                        data-key="t-alerts">Product</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link collapsed <?= $seg2 == 'ro_drinking_water' ? 'active' : '' ?>" 
                    href="#ro_drinking_water" 
                    data-bs-toggle="collapse" 
                    role="button" 
                    aria-expanded="false" 
                    aria-controls="ro_drinking_water">
                    <i class="bi bi-radioactive"></i> <span data-key="ro_drinking_water">RO-Drinking Water</span>
                </a>
                <div class="collapse menu-dropdown mega-dropdown-menu  <?= $seg2 == 'ro_drinking_water' ? 'show' : '' ?>" id="ro_drinking_water">
                    <div class="row">
                        <div class="col-lg-4">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?= base_url('backend/ro_drinking_water/banner_header') ?>" 
                                        class="nav-link <?= $seg2 == 'ro_drinking_water' && $seg3 == 'banner_header' ? 'active' : '' ?>" 
                                        data-key="t-alerts">Banner Header</a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('backend/ro_drinking_water/overview') ?>" 
                                        class="nav-link <?= $seg2 == 'ro_drinking_water' && $seg3 == 'overview' ? 'active' : '' ?>" 
                                        data-key="t-alerts">Overview</a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('backend/ro_drinking_water/did_you_know') ?>" 
                                        class="nav-link <?= $seg2 == 'ro_drinking_water' && $seg3 == 'did_you_know' ? 'active' : '' ?>" 
                                        data-key="t-alerts">Did you know</a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('backend/ro_drinking_water/benefit') ?>" 
                                        class="nav-link <?= $seg2 == 'ro_drinking_water' && $seg3 == 'benefit' ? 'active' : '' ?>" 
                                        data-key="t-alerts">Benefit</a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('backend/ro_drinking_water/product_image') ?>" 
                                        class="nav-link <?= $seg2 == 'ro_drinking_water' && $seg3 == 'product_image' ? 'active' : '' ?>" 
                                        data-key="t-alerts">Product image</a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('backend/ro_drinking_water/why_choose_us') ?>" 
                                        class="nav-link <?= $seg2 == 'ro_drinking_water' && $seg3 == 'why_choose_us' ? 'active' : '' ?>" 
                                        data-key="t-alerts">Why choose us</a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('backend/ro_drinking_water/product') ?>" 
                                        class="nav-link <?= $seg2 == 'ro_drinking_water' && $seg3 == 'product' ? 'active' : '' ?>" 
                                        data-key="t-alerts">Product</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>

        </ul>
    </div>
    <!-- Sidebar -->
</div>