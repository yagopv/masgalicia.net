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
	     "/wp-content/uploads/2015/07/carrusel-coronet-londres.jpg"
	  ], {duration: 3000, fade: 750});        
    }
    
    if ($("body").hasClass("category-ediciones")) {
    	  $(".backstretch").empty();
    	  $.backstretch([
              "/wp-content/uploads/2015/07/carrusel-rbc.jpg"
    	  ], {duration: 3000, fade: 750});            
    }
    
    if ($("body").hasClass("category-producciones")) {
    	  $(".backstretch").empty();
    	  $.backstretch([
    	      "/wp-content/uploads/2015/07/carrusel-teatro-lara.jpg"
    	  ], {duration: 3000, fade: 750});            
    }
    
     if ($("body").hasClass("category-branding")) {
    	  $(".backstretch").empty();
    	  $.backstretch([
    	      "/wp-content/uploads/2015/07/carrusel-xoel-y-pepe.jpg"
    	  ], {duration: 3000, fade: 750});            
    }
    
     /*if ($("body").hasClass("category-hosteleria")) {
    	  $(".backstretch").empty();
    	  $.backstretch([
    	      "/wp-content/uploads/2015/04/carrusel-1906-pgm3.jpg"
    	  ], {duration: 3000, fade: 750});            
     } */
});