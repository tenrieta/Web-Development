
//RESIZING WINDOW

$(function() {
	menu = $('nav ul');

	$('#toggle-btn').on('click', function(e) {
		e.preventDefault();
		menu.slideToggle();
	});
	
	$(window).resize(function() {
		var w = $(this).width();
		if(w > 580 && menu.is(':hidden')) {
			menu.RemoveAttr('style');
		}
	});
	
	$('nav li').on('click', function(e) {
		var w = $(window).width();
		if(w < 580) {
			menu.slideToggle();
		}
	});
	
});

//SCROLABLE MENU

// Select all links with hashes
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });
  
//SLIDER IMAGES

var slideIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("slides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none"; 
  }
  slideIndex++;
  if (slideIndex > x.length) {
	  slideIndex = 1;
  } 
  x[slideIndex-1].style.display = "block"; 
  setTimeout(carousel, 2000); // Change image every 2 seconds
}  

//MAKE VIEW MORE BUTTON

function myFunction() {
  var x = document.getElementById("more");
  var btnText = document.getElementById("moreBtn");
  if (x.style.display === "block") { 
	btnText.innerHTML = "View more";
	x.style.display = "none";	
  } else {
	x.style.display = "block";
	btnText.innerHTML = "View less"; 
  }
}
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  