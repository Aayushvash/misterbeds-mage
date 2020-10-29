/* custom js */
require(["jquery","customScript1","customScript2"], function($){ 
$(document).ready(function(){
	//
	 $('.slider-for').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: true,
	  fade: true,
	  asNavFor: '.slider-nav'
	});
	
	$('.slider-nav').slick({
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  asNavFor: '.slider-for',
	  dots: true,
	  centerMode: true,
	  focusOnSelect: true
	});
	//
	$('.owl-carousel').owlCarousel({
		loop:true,
		margin:20,
		responsiveClass:true,
		autoWidth:true,
		nav:true,
		responsive:{
			0:{
				items:1,
			},
			600:{
				items:3,
			},
			1000:{
				items:5,
				loop:false
			}
		}
	});
	
	//selectDrpdwn
	function selectDrpdwn(){
		$('.selectDrpdwn .selectValue').click(function(){
			$(this).parents('.selectDrpdwn').find('.UlSelect').slideToggle();
			$(this).parents('.selectDrpdwn').toggleClass('active');
		});
		$('.selectDrpdwn .UlSelect').find('li').click(function(){
			$(this).parents('.UlSelect').slideUp();
			var getv1 = $(this).find('img').attr('src');
			var getv2 = $(this).find('em').text();
			$(this).parents('.selectDrpdwn').find('.selectValue img').attr('src', getv1);
			$(this).parents('.selectDrpdwn').find('.selectValue em').text(getv2);
			$(this).parents('.selectDrpdwn').removeClass('active');
		});
	}
	selectDrpdwn();
	//
	$(".login-cart-panel ul li.addtocart").click(function(){
	  $(".shopping-cart-block").slideToggle();
	});
   $('.ct1').show();
   $('.ct2').hide();
   $('.ct3').hide();
   $('.slider').on('afterChange', function (event, slick, currentSlide) {
   if(currentSlide=='0')
   {
   $('.ct1').show();
   $('.ct2').hide();
    $('.ct3').hide();
   }
   if(currentSlide=='1')
   {
   $('.ct1').hide();
   $('.ct2').show();
   $('.ct3').hide();
   }
   if(currentSlide=='2')
   {
   $('.ct1').hide();
   $('.ct2').hide();
   $('.ct3').show();
   }
   });
   /*$(".divs div").each(function(e) {
        if (e != 0)
            $(this).hide();
    });

    $(".slick-next").click(function(){
        if ($(".divs div:visible").next().length != 0)
            $(".divs div:visible").next().show().prev().hide();
        else {
            $(".divs div:visible").hide();
            $(".divs div:first").show();
        }
        return false;
    });

    $(".slick-prev").click(function(){
        if ($(".divs div:visible").prev().length != 0)
            $(".divs div:visible").prev().show().next().hide();
        else {
            $(".divs div:visible").hide();
            $(".divs div:last").show();
        }
        return false;
    });*/
   /*close custom js*/
   var coll = document.getElementsByClassName("collapse-btn");
	var i;

	for (i = 0; i < coll.length; i++) {
	  coll[i].addEventListener("click", function() {
	    this.classList.toggle("active");
	    var content = this.nextElementSibling;
	    if (content.style.display === "block") {
	      content.style.display = "none";
	    } else {
	      content.style.display = "block";
	    }
	  });
	}
	/*start js*/
	var coll1 = document.getElementsByClassName("collapsible");
	var i1;

	for (i1 = 0; i1 < coll1.length; i1++) {
	  coll1[i1].addEventListener("click", function() {
	    this.classList.toggle("active");
	    var content1 = this.nextElementSibling;
	    if (content1.style.display === "block") {
	      content1.style.display = "none";
	    } else {
	      content1.style.display = "block";
	    }
	  });
	}
	/*close js*/
	
});
jQuery(".increaseqty").click(function(e){
        e.preventDefault();
        var qty = jQuery(this).closest("div.control").find("input");
        var newqty = parseInt(qty.val())+parseInt(1);
        qty.val(newqty);
        var val = qty.val();
        var changeQty = parseInt(val);
        qtyLabel = jQuery(this).closest("div.control").find("span");
        jQuery(qtyLabel).text(changeQty);
        return false;
    });

    jQuery(".decreaseqty").click(function(){
        var qty = jQuery(this).closest("div.control").find("input");
        var newqty = parseInt(qty.val())-parseInt(1);
        if(newqty < 1){
            return false;
        }
        qty.val(newqty);
        var val = qty.val();
        var changeQty = parseInt(val);
        qtyLabel = jQuery(this).closest("div.control").find("span");
        jQuery(qtyLabel).text(changeQty);
        return false;

    });
     //$(".mark .title").removeClass("title");
});
