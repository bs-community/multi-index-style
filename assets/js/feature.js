$.getJSON(
    'index-style/feature',
    function (data) {
        $('#feature-1-title').text(data.feature_1_title);
        $('#feature-1-text').text(data.feature_1_text);
        $('.fa-users').removeClass('fa-users').addClass(data.feature_1_fa);
        $('#feature-2-title').text(data.feature_2_title);
        $('#feature-2-text').text(data.feature_2_text);
        $('.fa-share-alt').removeClass('fa-share-alt').addClass(data.feature_2_fa);
        $('#feature-3-title').text(data.feature_3_title);
        $('#feature-3-text').text(data.feature_3_text);
        $('.fa-cloud').removeClass('fa-cloud').addClass(data.feature_3_fa);
        $('#footer-introduction').text(data.introdution_text);
        $('#btn-register').text(data.start_button_text);
    });
