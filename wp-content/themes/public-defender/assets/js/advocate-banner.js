/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery(document).ready(function($) {
    $('#advocates-slider div.slide-image').hover(function() {
        $(".slide-info", this).stop().animate({bottom: 0});
        $('#advocates-slider div.slide-image').not(this).stop().fadeTo(500, 0.5);
    }, function() {
        $(".slide-info", this).stop().animate({bottom: '-100%'});
        $('#advocates-slider div.slide-image').not(this).stop().fadeTo(500, 1);
    });
});