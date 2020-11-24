$(document).ready(function(){

	cartNoti();

	$('.addtocartBtn').on('click', function(){
		var id = $(this).data('id');
		var name = $(this).data('name');
		var price = $(this).data('price');
		var discount = $(this).data('discount');
		var photo = $(this).data('photo');
		var codeno = $(this).data('codeno');
		var qty = 1;

		var mylist ={
			id:id, name:name, codeno:codeno,
			qty:qty, price:price, discount:discount,
			photo:photo
		}

		var cart = localStorage.getItem('cart');
		var cartArray;

		if (cart == null) {
			cartArray = Array();
		}else{
			cartArray = JSON.parse(cart);
		}

		var status = false;


		$.each(cartArray, function(i,v){
			if (id == v.id) {
				v.qty++;
				status = true;
			}
		})


		if (!status) {
			cartArray.push(mylist);
		}



		var cartData = JSON.stringify(cartArray);
		localStorage.setItem('cart',cartData);



	});

	function cartNoti(){
		var cart = localStorage.getItem('cart');

		if (cart) {
			var cartArray = JSON.parse(cart);

			var totalAmount=0;
			var notiCount=0;

			$.each(cartArray, function(i,v){
				var unitprice = v.price;
				var discount = v.discount;
				var qty = v.qty;

				if (discount) {
					var price = discount * qty;
				}else{
					var price = unitprice * qty;
				}

				totalAmount += price++;
				notiCount += qty++;
			})

			$('.cartNoti').html(notiCount);
			$('.cartAmount').html(totalAmount+' Ks');

		}

		else{

			$('.cartNoti').html(0);
			$('.cartAmount').html(0+' Ks');

		}








	}

});