(function($) {
    $.entwine(function($) {
        
    	$('#tab-Root_Gallery').entwine({

	        onmatch: function() {

	            //alert('hello!');

	            if($('.hasGallery').is(":checked")) {
		            //this.hide();
		            //lert("gallery is checked");
		        
		        }else{

		        	//alert("gallery is not checked");

		        	this.hide();

		        }

	            //

        		this._super();

	        }

        });

        $('#hasGallery .checkbox').on('change',function(){

        	//alert("gallery switch");

        	if($(this).is(":checked")){

        		$('#tab-Root_Gallery').show();

        	}else{

        		$('#tab-Root_Gallery').hide();

        	}

        });

        $('#MissonStatement').entwine({

            onmatch: function() {

                //alert('hello!');

                if($('.hasMission').is(":checked")) {
                    //this.hide();
                    //lert("gallery is checked");
                
                }else{

                    //alert("gallery is not checked");

                    this.hide();

                }

                //

                this._super();

            }

        });

        $('#hasMission .checkbox').on('change',function(){

            //alert("gallery switch");

            if($(this).is(":checked")){

                $('#MissonStatement').show();

            }else{

                $('#MissonStatement').hide();

            }

        });

    });
})(jQuery);

