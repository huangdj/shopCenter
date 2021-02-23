/*
* jquery-toast by rsky
* git repository https://github.com/ccrsky/jquery-toast/blob/master/README.md
*/
;(function($) {
    $.extend({
        toast: function(txt, opt) {
            var toastEl = $('#mToast');
            option = $.extend({
                timeout: 3000,
                transitionTime: 800,
                cls:'mtoast'
            }, opt);
            if (toastEl.size() > 0) {
                clearTimeout(toastEl.data('timer'))
                toastEl.remove();
            }
            toastEl = $('<div id="mToast" class="'+ option.cls +'" style="position: fixed;bottom: 50px;left: 30px;right: 30px;text-align: center;"><span style="display: inline-block;box-sizing: border-box;background-color: rgba(0,0,0,.5);color: #fff;padding: 5px 8px;max-width: 100%;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">' + txt + '</span></div>');
            $('body').append(toastEl);
            toastEl.fadeIn(option.transitionTime);
            toastEl.data('timer', setTimeout(function() {
                toastEl.fadeOut(option.transitionTime, function() {
                    toastEl.remove();
                });
            }, option.timeout));
        }
    })
})(jQuery);
