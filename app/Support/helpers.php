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
// <editor-fold defaultstate="collapsed" desc="Data Tables">

function datatables_bs_url($url) {
    return url("bower_components/datatables.net-bs/{$url}");
}

function datatables_url($url) {
    return url("bower_components/datatables.net/{$url}");
}

// </editor-fold>