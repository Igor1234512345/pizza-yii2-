/*price range*/

 $('#sl2').slider();

   $('.catalog').dcAccordion({speed:200});


   function showCart(cart)
   {
      $('#cart .modal-body').html(cart);
      $('#cart').modal();
   }

  function getCart()
  {
      $.ajax({
          url: '/cart/show',
          type: 'GET',
          success: function (res) {
              if(!res) alert('Ошибка!');
              showCart(res);
          },
          error: function () {
              alert('Error!');
          }
      });
  }


   $('#cart .modal-body').on('click', '.del-item', function () {
	  var id = $(this).data('id');
       $.ajax({
           url: '/cart/del-item',
		   data: {id: id},
           type: 'GET',
           success: function (res) {
               if(!res) alert('Ошибка!');
               showCart(res);
           },
           error: function () {
               alert('Error!');
           }
       });
   });
   
   function clearCart()
   {
       $.ajax({
           url: '/cart/clear',
           type: 'GET',
           success: function (res) {
               if(!res) alert('Ошибка!');
               showCart(res);
           },
           error: function () {
               alert('Error!');
           }
       });
   }


   $('.action-button').on('click', function (e) {
	   e.preventDefault();
	   var id = $(this).data('id'),
	   qty = $('#qty').val();
	   $.ajax({
		   url: '/cart/add',
		   data: {id: id, qty: qty},
		   type: 'GET',
		   success: function (res) {
		   	   if(!res) alert('Ошибка!');
		   	   showCart(res);
           },
		   error: function () {
			   alert('Error!');
           }
	   });
   });

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});

/*********************************************Скрип на QTY  ******************************************/
$(function () {
    $('.add').on('click',function(){
        var $qty=$(this).closest('p').find('.qty');
        var currentVal = parseInt($qty.val());
        if (!isNaN(currentVal) && currentVal < 100) {console.log(currentVal);
            $qty.val(currentVal + 1);
            if(currentVal === 100){

                $('.centerbox').css('border-bottom','3px solid red');
                $('.qty').css('color','red');
            }

        }
    });
    $('.minus').on('click',function(){
        var $qty=$(this).closest('p').find('.qty');
        var currentVal = parseInt($qty.val());
        if (!isNaN(currentVal) && currentVal > 1) {console.log(currentVal);
            $qty.val(currentVal - 1);
            if(currentVal <= 10){

                $('.centerbox').css('border-bottom','1px solid #009688');
                $('.qty').css('color','black');
            }
        }
    });
});

/************************************** End Скрип на QTY  ******************************************/



// Show/Hide menu
jQuery(document).ready(function() {

    try{
        if(jQuery( ".panel2" ).length){

            // Open/Close menu event
            jQuery('.menu-button').click(function() {

                var pannel = jQuery('.panel2'),
                    hidden = pannel.data('hidden'),
                    speed = pannel.attr('data-df-animation-speed'),
                    offset = pannel.attr('data-df-offset');

                if(hidden) jQuery('.panel2').animate({ left: offset },speed);
                else  jQuery('.panel2').animate({ left: '0'},speed);

                jQuery('.panel2').data("hidden", !hidden);

            });

            //Rotate arrow
            //Rotate arrow
            jQuery('#menulink').click(function () { jQuery('#icon-arrow').toggleClass('open'); });

            // Select button
            jQuery("ul.models li a").click(function (e) {

                e.preventDefault();
                jQuery("ul.models li a.active").removeClass("active");
                jQuery(this).addClass("active");

            });

            // Select button
            jQuery("ul.models li a").click(function ( e ) {

                e.preventDefault();
                jQuery("ul.models li a.active").removeClass("active");
                jQuery(this).addClass("active");

            });

        }}catch(e){console.log(e);}

});












