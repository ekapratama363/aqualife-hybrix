<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

function get_pagination_data($total_pages, $current_page)
{
    $pagination = [];

    if ($total_pages <= 5) {
        // Show all pages if total pages are 5 or less
        for ($i = 1; $i <= $total_pages; $i++) {
            $pagination[] = $i;
        }
    } else {
        // Always show first page
        $pagination[] = 1;

        if ($current_page > 3) {
            $pagination[] = '...';
        }

        // Show middle pages (previous, current, next)
        $start = max(2, $current_page - 1);
        $end = min($total_pages - 1, $current_page + 1);

        for ($i = $start; $i <= $end; $i++) {
            $pagination[] = $i;
        }

        if ($current_page < $total_pages - 2) {
            $pagination[] = '...';
        }

        // Always show last page
        $pagination[] = $total_pages;
    }

    return $pagination;
}

function pagination($config)
{
    // start css pagination
    $config['first_link']       = 'First';
    $config['last_link']        = 'Last';
    $config['next_link']        = 'Next';
    $config['prev_link']        = 'Prev';
    $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
    $config['full_tag_close']   = '</ul></nav></div>';
    $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close']    = '</span></li>';
    $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
    $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
    $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['prev_tagl_close']  = '</span>Next</li>';
    $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
    $config['first_tagl_close'] = '</span></li>';
    $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['last_tagl_close']  = '</span></li>';
    // end css pagination

    return $config;
}