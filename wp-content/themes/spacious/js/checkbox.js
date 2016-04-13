jQuery(document).ready(function($) {
    $("input[name='has_link']").bind("change", function(){
        $("#kodeklubb_link_label").toggle();
        $("#kodeklubb_link_field").toggle();
    });

    $("input[name='has_facebook_link']").bind("change", function(){
        $("#kodeklubb_facebook_link_label").toggle();
        $("#kodeklubb_facebook_link_field").toggle();
    });

    $("input[name='has_meetup_link']").bind("change", function(){
        $("#kodeklubb_meetup_link_label").toggle();
        $("#kodeklubb_meetup_link_field").toggle();
    });

    $("input[name='has_truegroups_link']").bind("change", function(){
        $("#kodeklubb_truegroups_link_label").toggle();
        $("#kodeklubb_truegroups_link_field").toggle();
    });
});
