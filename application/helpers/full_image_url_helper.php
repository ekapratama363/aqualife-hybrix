<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

if (! function_exists('full_image_url')) 
{
    function full_image_url($datas, $fields = []) 
    {   
        if (is_array($datas)) 
        {
            foreach($datas ?? [] as $key => $data) {
                foreach($fields as $field) {
                    $datas[$key]->{$field} = $data->{$field} ? base_url($data->{$field}) : null;
                }
            }
        } 
        else 
        {
            foreach($fields as $field) {
                $datas->{$field} = $datas->{$field} ? base_url($datas->{$field}) : null;
            }
        }

        return $datas;
    }
}