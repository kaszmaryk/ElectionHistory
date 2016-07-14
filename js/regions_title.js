$(document).ready(function(){
    $('.ed').on('click', function(){
        $('.ed').removeClass('fil4');
        var $eldistr = $(this);
        $eldistr.addClass('fil4');
        $('.p-selector-title').remove();
        $('#regions-title').before("<div class='p-selector-title'>" +
        "<span class='party-el-title p-red'></span>" +
        "<span class='party-el-title p-orange'></span>" +
        "<span class='party-el-title p-blue'></span>" +
        "<span class='party-el-title p-purple'></span>" +
        "</div)");
        $('.party-el-title').on('click', function () {
            var partyClass = $(this).attr('class');
            switch (partyClass) {
                case 'party-el-title p-red':
                    $eldistr.attr('class', 'ed red');
                    changeSeats();
                    break;
                case 'party-el-title p-orange':
                    $eldistr.attr('class', 'ed orange');
                    changeSeats();
                    break;
                case 'party-el-title p-blue':
                    $eldistr.attr('class', 'ed blue');
                    changeSeats();
                    break;
                case 'party-el-title p-purple':
                    $eldistr.attr('class', 'ed purple');
                    changeSeats();
                    break;
            }
        });

        function changeSeats() {
            var redSeats = $('.ed.red').length;
            var orangeSeats = $('.ed.orange').length;
            var blueSeats = $('.ed.blue').length;
            var purpleSeats = $('.ed.purple').length;
            var f = 0;
            var $pseats = $('.ed').length;
            var $seat;

            for(var i = 1; i <= redSeats; i++) {
                f++;
                $seat = $('.seat'+f);
                $seat.removeClass('red orange blue purple');
                $seat.addClass('red');
            }

            for(var i = 1; i <= orangeSeats; i++) {
                f++;
                $seat = $('.seat'+f);
                $seat.removeClass('orange red blue purple');
                $seat.addClass('orange');
            }

            for(var i = 1; i <= blueSeats; i++) {
                f++;
                $seat = $('.seat'+f);
                $seat.removeClass('blue orange red purple');
                $seat.addClass('blue');
            }

            for(var i = 0; i <= purpleSeats; i++) {
                f++;
                $seat = $('.seat'+f);
                $seat.removeClass('purple orange blue red');
                $seat.addClass('purple');
            }
        }
    });
});
