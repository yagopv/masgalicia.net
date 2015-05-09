$(function() {
	
	$(".entry-wrap").hover(
		function() {
            $(this).addClass("entry-wrap-hovered");
		}, function() {
            $(this).removeClass("entry-wrap-hovered");
		}
	);

    $(".entry-featured").each(function() {
       if ($(this).children().length == 2) {
           $(this).children().first().css({ position : "absolute" });
       }
    });

    $("article").on("click", function() {
        var newLocation = $(this).find("a").first().attr("href");
        if (newLocation) {
            location.href = newLocation;
        }
        return false;
    });
    
    $("#top.site").css({ "min-height": window.innerHeight });
    
    if ($("body").hasClass("blog")) {
	  $(".backstretch").empty();
	  $.backstretch([
	     "/wp-content/uploads/2015/04/carrusel-bici.jpg"
	  ], {duration: 3000, fade: 750});        
    }
    
    if ($("body").hasClass("category-ediciones")) {
    	  $(".backstretch").empty();
    	  $.backstretch([
              "/wp-content/uploads/2015/04/carrusel-news-SON.jpg",
              "/wp-content/uploads/2015/04/carrusel-news-981.jpg"
    	  ], {duration: 3000, fade: 750});            
    }
    
    if ($("body").hasClass("category-producciones")) {
    	  $(".backstretch").empty();
    	  $.backstretch([
    	      "/wp-content/uploads/2015/04/carrusel-news-981.jpg"
    	  ], {duration: 3000, fade: 750});            
    }
    
     if ($("body").hasClass("category-branding")) {
    	  $(".backstretch").empty();
    	  $.backstretch([
    	      "/wp-content/uploads/2015/04/carrusel-black-coupage2.jpg"
    	  ], {duration: 3000, fade: 750});            
    }
    
     if ($("body").hasClass("category-hosteleria")) {
    	  $(".backstretch").empty();
    	  $.backstretch([
    	      "/wp-content/uploads/2015/04/carrusel-1906-pgm3.jpg"
    	  ], {duration: 3000, fade: 750});            
     }           
});