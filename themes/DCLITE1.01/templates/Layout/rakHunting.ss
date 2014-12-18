<% if $hasGallery = "1"%>

<div class = "gallery_wrapper">

    <div id="slides">
        <ul class="slides-container">

            <% control Photos %>
                <% control Image %>
                    <li>
                        <img src="$URL" alt="$Filename"/>
                    </li>
                <% end_control %>
            <% end_control %>
        </ul>

    </div>

</div>

<% else %>

<div class = "nav_spacer"></div>

<% end_if %>

<% if $ShowTitle = "1"%>
<div class ="row">

    <div class="large-12 columns">
        <h2>$Title</h2>
    </div>

</div>
<% end_if %>

<div class ="row">

    <div class="small-$Column1Width columns">
        
        $Column1
    </div>

    <div class="small-$getColumn2Width($Column1Width) columns">
        $Column2
    </div>

</div>

<% if $hasFooterGallery = "1"%>

<% include Footer %>

<% end_if %>
	
   