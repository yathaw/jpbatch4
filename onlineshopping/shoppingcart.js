$(document).ready(function(){

	cartNoti();
	showTable();

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

		cartNoti();

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

			$('.cartTotal').html(totalAmount+' Ks');


		}

		else{

			$('.cartNoti').html(0);
			$('.cartAmount').html(0+' Ks');

			$('.cartTotal').html(0+' Ks');


		}
	}

	function showTable(){
		var cart = localStorage.getItem('cart');

		if (cart) {
			$('.shoppingcart_div').show();
			$('.noneshoppingcart_div').hide();

			var cartArray = JSON.parse(cart);
			var shoppingcartData='';


			if (cartArray.length > 0) {
				var total = 0;
				$.each(cartArray, function(i,v){
					var id = v.id;
					var codeno = v.codeno;
					var name = v.name;
					var unitprice = v.price;
					var discount = v.discount;
					var photo = v.photo;
					var qty = v.qty;

					if (discount) {
						var price = discount;
					}
					else{
						var price = unitprice;
					}
					var subtotal = price * qty;

					shoppingcartData += `<tr> 
											<td> 
												<button class="btn btn-outline-danger remove_btn btn-sm" data-id="${i}" style="border-radius: 50%"> 
													<i class="icofont-close-line"></i> 
												</button>
											</td>
											<td> 
												<img src="${photo}" class="cartImg">
											</td>
											<td>
												<p> ${name} </p>
												<p> ${codeno} </p>
											</td>
											<td>
												<button class="btn btn-outline-secondary plus_btn" data-id="${i}"> 
													<i class="icofont-plus"></i> 
												</button>
											</td>
											<td>
												<p> ${qty} </p>
											</td>
											<td>
												<button class="btn btn-outline-secondary minus_btn" data-id="${i}"> 
													<i class="icofont-minus"></i>
												</button>
											</td>
											<td>`; 
					if (discount > 0) {
						shoppingcartData += `<p class="text-danger"> 
												${discount} Ks
											</p>
											<p class="font-weight-lighter">
												<del> ${unitprice} Ks </del>
											</p>
											`;
					}
					else{
						shoppingcartData += `<p class="text-danger"> 
												${unitprice} Ks
											</p>`;
					}

					shoppingcartData+=`</td>
										<td> 
											<p> ${subtotal} Ks </p> 
										</td>
									</tr>`;
					total += subtotal ++;
				});

				$('#shoppingcart_table').html(shoppingcartData);

			}
			else{
				$('.shoppingcart_div').hide();
				$('.noneshoppingcart_div').show();
			}
		}
		else{
			$('.shoppingcart_div').hide();
			$('.noneshoppingcart_div').show();
		}
	}

	$('.checkoutbtn').on('click',function(){
		var cart = localStorage.getItem('cart');
		var cartArray = JSON.parse(cart);

		var notes = $('#notes').val();
		var totalAmount=0;

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
		});

		console.log(totalAmount);

		$.post('storeorder.php', {
			value1:cartArray,
			value2:notes,
			value3:totalAmount
		},function(response){
			localStorage.clear();
			location.href = "ordersuccess.php";
		});


















	});

});