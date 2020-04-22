var SB = SB || {};
SB.core = function () {
    var self = {
        load: function () {
            jQuery(document).ready(self.ready);
        },
        ready: function () {

        }
    };
    return self;
}();
SB.core.load();