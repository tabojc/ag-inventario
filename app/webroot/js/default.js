	$(function() {
        $("#overlay").css({
          opacity : 0.5,
          top     : $("div#container").offset().top,
          width   : $("div#container").outerWidth(),
          height  : $("div#container").outerHeight(),
        });

        $("#img-load").css({
          top  : $("div#container").height() / 2,
          left : $("div#container").width() / 2
        });
	});
