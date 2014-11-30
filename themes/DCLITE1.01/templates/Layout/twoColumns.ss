<div class="<% if $Children || $Parent %>large-9 large-push-3<% else %>large-12<% end_if %> columns">
	<article>
    
        <div class="row">

            <div class= "large-12 columns">

                <div class= "gallery_frame">
                <% control Photos %>
                    <% control Image %>
                        <div>
                            <img src="$URL" alt="$Filename"/>
                        </div>
                    <% end_control %>
                <% end_control %>
                </div>

            </div>

        </div>

        <% if $ShowTitle = "1"%>
        <div class ="row">
        
            <div class="large-12 columns">
                <h2>$Title</h2>
            </div>
        
        </div>
        <% end_if %>
        
        <div class ="row">
        
            <div class="large-$Column1Width columns">
                $Column1
            </div>
		
            <div class="large-$getColumn2Width($Column1Width) columns">
                $Column2
            </div>
        
        </div>
	
    </article>
</div>