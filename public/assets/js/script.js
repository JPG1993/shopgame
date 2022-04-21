$(document).on('ready', function() {
    var slide = $('.slider-single');
    var slideTotal = slide.length - 1;
    var slideCurrent = -1;
    var _intervalRight;
  
    function slideInitial() {
      slide.addClass('proactivede');
      slideRight();
    }
    function slideRight() {
      clearInterval(_intervalRight);
      _intervalRight = setInterval(slideRight, 4500);
      if (slideCurrent < slideTotal) {
        slideCurrent++;
      } else {
        slideCurrent = 0;
      }
  
      if (slideCurrent > 0) {
        var preactiveSlide = slide.eq(slideCurrent - 1);
      } else {
        var preactiveSlide = slide.eq(slideTotal);
      }
      var activeSlide = slide.eq(slideCurrent);
      if (slideCurrent < slideTotal) {
        var proactiveSlide = slide.eq(slideCurrent + 1);
      } else {
        var proactiveSlide = slide.eq(0);
  
      }
  
      slide.each(function() {
        var thisSlide = $(this);
        if (thisSlide.hasClass('preactivede')) {
          thisSlide.removeClass('preactivede preactive active proactive').addClass('proactivede');
        }
        if (thisSlide.hasClass('preactive')) {
          thisSlide.removeClass('preactive active proactive proactivede').addClass('preactivede');
        }
      });
      preactiveSlide.removeClass('preactivede active proactive proactivede').addClass('preactive');
      activeSlide.removeClass('preactivede preactive proactive proactivede').addClass('active');
      proactiveSlide.removeClass('preactivede preactive active proactivede').addClass('proactive');
    }
  
    function slideLeft() {
      clearInterval(_intervalRight);
      _intervalRight = setInterval(slideRight, 4500);
      if (slideCurrent > 0) {
        slideCurrent--;
      } else {
        slideCurrent = slideTotal;
      }
  
      if (slideCurrent < slideTotal) {
        var proactiveSlide = slide.eq(slideCurrent + 1);
      } else {
        var proactiveSlide = slide.eq(0);
      }
      var activeSlide = slide.eq(slideCurrent);
      if (slideCurrent > 0) {
        var preactiveSlide = slide.eq(slideCurrent - 1);
      } else {
        var preactiveSlide = slide.eq(slideTotal);
      }
      slide.each(function() {
        var thisSlide = $(this);
        if (thisSlide.hasClass('proactivede')) {
          thisSlide.removeClass('preactive active proactive proactivede').addClass('preactivede');
        }
        if (thisSlide.hasClass('proactive')) {
          thisSlide.removeClass('preactivede preactive active proactive').addClass('proactivede');
        }
      });
      preactiveSlide.removeClass('preactivede active proactive proactivede').addClass('preactive');
      activeSlide.removeClass('preactivede preactive proactive proactivede').addClass('active');
      proactiveSlide.removeClass('preactivede preactive active proactivede').addClass('proactive');
    }
    var left = $('.slider-left');
    var right = $('.slider-right');
    left.on('click', function() {
      slideLeft();
    });
    right.on('click', function() {
      slideRight();
    });
    slideInitial();
    var _isOpen = false;
    $(".dropbtn").on('click', function(e) {
      if (_isOpen) {
        $("#myDropdown").slideUp(100);
        _isOpen = false;
      }
      else {
        $("#myDropdown").slideDown(100);
        _isOpen = true;
      }
      e.stopPropagation();
    });

    $(window).on('click', function() {
      $("#myDropdown").hide();
      _isOpen = false;
    });

    
    $(".dropbtnbir").on('click', function(e) {
      if (_isOpen) {
        $("#myDropdownbir").slideUp(300);
        _isOpen = false;
      }
      else {
        $("#myDropdownbir").slideDown(300);
        _isOpen = true;
      }
      e.stopPropagation();
    });
    
  }); 

  