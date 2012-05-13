jQuery(document).ready(function() {
    jQuery('.car-popular, .car-new').jcarousel({
        wrap: 'circular',
		scroll:1,
		itemFallbackDimension:180
    });
});
function change(a){if  (a.value=="Поиск") a.value="";}
function doDefault(a){if (a.value=="") a.value="Поиск";}