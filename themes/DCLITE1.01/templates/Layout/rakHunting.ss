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

<div class= "row">

<% loop $ContentGallerys %>
    Gallery: $Title<br>
    Number of Images in this Gallery: $ContentImages.Count<br>
    <ul>
        <% loop $ContentImages %>
            <li>Image caption: $Caption</li>
        <% end_loop %>
    </ul>
<% end_loop %>

</div>

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

<div class = "footer_gallery_wrapper">

    <div class="row footer_gallery_container collapse">

        <% if $items %>
            <% loop $items.Limit(6) %>
            <div class = "medium-2 small-12 columns">
                $Image.SetWidth(600).CroppedImage(400,400)
            </div>
            <% end_loop %>
        <% end_if %>

    </div>

</div>

<% end_if %>
	
   