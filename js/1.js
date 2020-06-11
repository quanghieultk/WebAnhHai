
document.addEventListener("DOMContentLoaded", function(){
	//dua tat ca cac photoListItem vao mang photolistItem
	var photolistItem = document.getElementsByClassName('photoListItem');
		console.log(photolistItem[0].offsetTop);
	var info = document.getElementsByClassName('info');
	var menudangnhap = document.querySelector('.page-login'); // lấy ra menudangnhap
	var nutdangnhap = document.querySelector('#login-button'); //lấy ra nút đăng nhập
	var mauden = document.querySelector('.black'); //lấy ra  mauden
	var mauden_signup = document.querySelector('.black-signup');
	var close = document.querySelector('.close');
	var close_signup = document.querySelector('.close-signup');
	var menudangki = document.querySelector('.page-signup');//lấy ra menudanngki
	var nutdangki = document.querySelector('#signup-button');
	console.log(mauden);
	//xử lí sự kiện ô đăng nhập
	nutdangnhap.onclick = function(){
		menudangnhap.classList.add('hienlen');
		
	}
	nutdangki.onclick = function(){
		menudangki.classList.add('hienlen');
	}
	mauden.onclick = function(){
		menudangnhap.classList.remove('hienlen');
	} 
	close.onclick = function(){
		console.log("toi da kich vao mauden");
		menudangnhap.classList.remove('hienlen');
		
	}	
	mauden_signup.onclick = function(){
		menudangki.classList.remove('hienlen');
	}
	 close_signup.onclick = function(){
	 	menudangki.classList.remove('hienlen');
	 }

	window.addEventListener('scroll',function(){
		var k = photolistItem.length-1;
			vitrichuot = window.pageYOffset;
			   	console.log(vitrichuot);
			if (window.pageYOffset < 100) {
			   		for (var i = 0; i < info.length; i++) {
		 				info[i].classList.remove('dixuong');
		 			}
			   }
			   	
		 	for (var vitri = 0; vitri < photolistItem.length-1; vitri++) {
		 			
		 		var m=photolistItem[vitri].offsetTop-50; console.log("m= "+m);
		 		var n=photolistItem[vitri].offsetTop+photolistItem[vitri].clientHeight; console.log("n= "+n);
		 		if ((window.pageYOffset > m)&&(window.pageYOffset < n)) { 
		 			
		 		
		 			for (var i = 0; i < info.length; i++) {
		 				info[i].classList.remove('dixuong');
		 			}
		 			var idd = photolistItem[vitri].dataset.id;   //lấy ra id của từng ảnh
		 			var anhbinhluan=document.getElementsByClassName(idd);
		 			anhbinhluan[1].classList.add('dixuong');
		 			console.log("đang ở vị trí "+vitri); 
		 			console.log(anhbinhluan[1]);		
		 			// if (window.pageYOffset<photolistItem[vitri].offsetTop) {
		 			// 	info[vitri].classList.remove('dixuong');
		 			// }					 				
			   	}
			   
			   	if (window.pageYOffset < 100) {
			   		for (var i = 0; i < info.length; i++) {
		 				info[i].classList.remove('dixuong');
		 			}

		 		
		 	
		 		}
		 		
		 	}
		 		if (window.pageYOffset > photolistItem[k].offsetTop){
		 			for (var i = 0; i < info.length; i++) {
		 				info[i].classList.remove('dixuong');
		 			}
		 			console.log("dang o vi tri "+ k);
		 			var idd = photolistItem[vitri].dataset.id;
		 			var anhbinhluan=document.getElementsByClassName(idd);
		 			anhbinhluan[1].classList.add('dixuong');
		 			
		 		}

	})

	
},false)