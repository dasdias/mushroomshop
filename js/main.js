var img = document.querySelectorAll('.img-animate');
		// console.log(img.outerHTML);
	img = Array.from(img);
		console.log(img);
	// for (var i = 0; i < img.length; i++) {
	// 	console.log(img[i].outerHTML);
	// }

function clickBtn(atr) {
	event.preventDefault();
	var btn = atr.getAttribute('data-click');
	// console.log(btn);
	for (var i = 0; i < img.length; i++) {
		var imgClass = img[i].tagName;
		var out = img[i].outerHTML;
		var res = img[i].getAttribute('data-img-animate');
		if (res == btn) {
			var imgId = document.getElementById(res);
			// var insOut = imgId.appendChild(out);
			var ww = document.createElement("div");

			console.log(out);
			// console.log(imgClass[0]);
			// var ww = this.innerHTML(out);
			// var imgclone = document.createElement('div');
			// imgclone.innerHTML = out;
			// res.appendChild(out);
			// var imgcopy = this.

		} 
		// console.log(res);
		// console.log(img[NodeList]);

	};
	// var btn = this.attr('data-click');
	// console.log(dd.getAttribute('data-click'));

}



// $(document).ready(function() {



	/*$('.buttonclick').on('click', function(event) {
		event.preventDefault();
		console.log('Click');
		// var imgToAnimate = this.parents();
		// .attr('data-price');
		// var cart = $('cart-anim');
		// var widthImgToAnimate = imgToAnimate.width();
		// console.log(imgToAnimate);
		
		
		imgToAnimate.clone().css({
			'width' : widthImgToAnimate,
			'position' : 'absolute',
			'z-index' : '999',
			'top' : imgToAnimate.offset()['top'],
			'left' : imgToAnimate.offset()['left']
		}).appendTo('body').animate({
			opacity: 0.1,
			left: cart.offset()['left'],
			top: cart.offset()['top'],
			width: 50
		}, 2000, function(){
			$(this).remove();
		})
	});*/
// });