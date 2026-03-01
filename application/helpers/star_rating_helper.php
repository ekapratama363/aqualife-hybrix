<?php

function getStarRating($rating, $maxStars = 5) {
    $fullStar = '<i class="fa fa-star text-warning"></i>';
    $halfStar = '<i class="fa fa-star-half-o text-warning"></i>'; // pakai ini untuk FA 4
    $emptyStar = '<i class="fa fa-star text-secondary"></i>';

    $output = '';

    for ($i = 1; $i <= floor($rating); $i++) {
        $output .= $fullStar;
    }

    if ($rating - floor($rating) >= 0.5) {
        $output .= $halfStar;
        $i++;
    }

    for ($x = $i; $x <= $maxStars; $x++) {
        $output .= $emptyStar;
    }

    return $output;
}
