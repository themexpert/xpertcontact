/**
 * @package Xpert Contact
 * @version ##VERSION##
 * @author ThemeXpert http://www.themexpert.com
 * @copyright Copyright (C) 2009 - 2011 ThemeXpert
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 */

(function($) {

    $(document).ready(function() {
        $('#xcon-form').submit(function() {
            var value = $(this).serializeArray();
            $.ajax({
                type: 'POST',
                data: value,
                beforeSend: function() {
                    $('#xcon-submit').addClass('loading');
                },
                error: function(response) {
                    console.log(response);
                },
                success: function(response) {
                    $('#xcon-msg').fadeOut().html(response).fadeIn().delay(2000);
                    $('#xcon-submit').removeClass('loading');
                    $('#xcon-form').find("input[type=text], input[type=email], textarea").val("");
                }
            });
            return false;
        });
    });

})(jQuery);
