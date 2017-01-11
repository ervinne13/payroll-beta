<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//
/* * ************************************************************************* */
// <editor-fold defaultstate="collapsed" desc="BSB">

function bsb_url($url) {
    return url("bower_components/adminbsb-materialdesign/{$url}");
}

function bsb_css_url($url) {
    return url("bower_components/adminbsb-materialdesign/css/{$url}");
}

function bsb_js_url($url) {
    return url("bower_components/adminbsb-materialdesign/js/{$url}");
}

function bsb_images_url($url) {
    return url("bower_components/adminbsb-materialdesign/images/{$url}");
}

function bsb_plugins_url($url) {
    return url("bower_components/adminbsb-materialdesign/plugins/{$url}");
}

// </editor-fold>

/* * ************************************************************************* */
// <editor-fold defaultstate="collapsed" desc="Gentelella">

function gentelella_vendors_url($url) {
    return url("bower_components/gentelella/vendors/{$url}");
}

function gentelella_production_url($url) {
    return url("bower_components/gentelella/production/{$url}");
}

function gentelella_build_url($url) {
    return url("bower_components/gentelella/build/{$url}");
}

function gentelella_images_url($url) {
    return url("bower_components/gentelella/production/images/{$url}");
}

// </editor-fold>
