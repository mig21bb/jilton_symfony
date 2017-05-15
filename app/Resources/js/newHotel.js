//newHotel.js

var distribution = [];

$(document).ready(function() {

	$(".range").each(function(){
		distribution.push(parseInt($(this).val()));
	});
	updateValues();
	console.log("newHotel.js loaded!!");

	$( ".range" ).each(function( index ) {  		
  		
  		$(this).change(function(){
  			console.log(distribution);
  			
  			updateRanges(index,$(this).val());
  			updateValues();
  		})
  		$(this).prev().text($(this).val());
	});	


});

function updateValues(){
	$( ".range" ).each(function( index ) {  
		$(this).prev().text($(this).val());
	} );
}

function updateRanges(index,value){
	// console.log("index="+index);
	// console.log("value="+value);

	distribution[index]=parseInt(value);
	if(addValues(distribution) > 100){
		 console.log("delta+addValues(distribution)");
		 console.log(value-parseInt(distribution[index])+addValues(distribution));
		var delta=addValues(distribution)-100;
		do{
			descontado=0;
			for (var i = distribution.length - 1; i >= 0; i--) {
				if(index != i && distribution[i]>0){
					if((distribution[i]-Math.ceil((delta/(distribution.length-1))))>0){
						distribution[i]-=Math.ceil(delta/(distribution.length-1));
						descontado+=Math.ceil(delta/(distribution.length-1));
						// console.log(descontado);
					}else{
						descontado+=distribution[i];
						distribution[i]=0;
						// console.log(descontado);
						console.log(distribution);
					}
				}
			}
			
				delta=delta-descontado;
			
			
			console.log("descontado="+descontado);
			console.log("delta="+delta);

		}while(delta>0);
		console.log("addValues(distribution)");
		console.log(addValues(distribution));

	}
	
	console.log(distribution);
	$( ".range" ).each(function( index ) {
		$(this).val(distribution[index]);
	});
}

function addValues(vector){

	var sum = 0;
	for(i=0;i<vector.length;i++){
		sum+=parseInt(vector[i]);
	}

	return sum;

}

