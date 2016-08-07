if(window.screen.width >= 992){
	$(document).ready(function(){
		$(".container").fadeIn(1000);
	    $(".puzzle").click(function(event){
	       	var form = document.getElementById("form_name");
	        var clicks = $(this).data('clicks');
	        var getId = $(this).attr("id"); 
			if (clicks) {
			     
		        $("#foodFrame").animate({
		            top:'20%',
		            left: '5%'
		        });
					$("#housingFrame").animate({
		            top:'0%',
					left:'40%'
		        });

		        $("#transportationFrame").animate({       
					top:'70%',
					left:'60%'	
		        });
		        $("#educationFrame").animate({       
					top:'75%',
					left:'25%'
		        });
		         $("#entertainmentFrame").animate({       
					top:'30%',
					left:'70%'
		        });        

		        $(".puzzle").fadeIn(500);
		        $("#lifeFrame").fadeIn(500);
		        $(".video_url").fadeOut(500);

			} else {
			     $(this).animate({
	            	left: '40%',
	            	top: '30%'

		        });
			    $(".puzzle").not(this).fadeOut(500);
			    $("#lifeFrame").fadeOut(500);

			    switch( getId ) {
			    	case "foodFrame": 
			    		$("#food_video").fadeIn(500);		
			    		break;
			    	case "housingFrame":
			    		$("#housing_video").fadeIn(500);		 
			    		break;
			    	case "transportationFrame": 
			    		$("#transportation_video").fadeIn(500);		 
			    		break;
			    	case "educationFrame":
			    		$("#education_video").fadeIn(500);		
			    		break;
			    	case "entertainmentFrame": 
			    		$("#entertainment_video").fadeIn(500);		
			    		break;
			    }
			    

			 }
			 $(this).data("clicks", !clicks);
	   
	    });
	    
	});

	$(".newTitle").keypress(function (event) {
	    if (event.which === 13){
	        $(".submit-title").click();
	    }
	});
}

if(window.screen.width < 992){
	$(document).ready(function(){
		$(".container").fadeIn(1000);
	    $(".puzzle").click(function(event){
	       	var form = document.getElementById("form_name");
	        var clicks = $(this).data('clicks');
	        var getId = $(this).attr("id"); 
			if (clicks) {
			     
		        $("#foodFrame").animate({
		            top:'0%',
		            left:'0%',
		        });
					$("#housingFrame").animate({
		            top:'20%',
		            left:'0%',
		        });

		        $("#transportationFrame").animate({       
					top:'40%',
					left:'0%',
		        });
		        $("#educationFrame").animate({       
					top:'60%',
					left:'0%',
		        });
		         $("#entertainmentFrame").animate({       
					top:'80%',
					left:'0%',
		        });        

		        $(".puzzle").fadeIn(500);
		        $("#lifeFrame").fadeIn(500);
		        $(".video_url").fadeOut(500);

			} else {
			     $(this).animate({
	            	left: '35%',
	            	top: '0%'

		        });

			 
			    $(".puzzle").not(this).fadeOut(500);
			    $("#lifeFrame").fadeOut(500);
			    switch( getId ) {
			    	case "foodFrame": 
			    		$("#food_video").fadeIn(500);		
			    		break;
			    	case "housingFrame":
			    		$("#housing_video").fadeIn(500);		 
			    		break;
			    	case "transportationFrame": 
			    		$("#transportation_video").fadeIn(500);		 
			    		break;
			    	case "educationFrame":
			    		$("#education_video").fadeIn(500);		
			    		break;
			    	case "entertainmentFrame": 
			    		$("#entertainment_video").fadeIn(500);		
			    		break;
			    }

		  }
		  $(this).data("clicks", !clicks);
	   
	    });
	    
	});

	$(".newTitle").keypress(function (event) {
	    if (event.which === 13){
	        $(".submit-title").click();
	    }
	});
}
