jQuery(document).ready(function($) {
    $("input[name='has_link']").bind("change", function(){
        $("#kodeklubb_link_label").toggle();
        $("#kodeklubb_link_field").toggle();
    });
});
