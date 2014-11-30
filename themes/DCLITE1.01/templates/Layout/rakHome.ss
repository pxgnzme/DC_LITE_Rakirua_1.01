<% if $hasGallery = "1"%>

<div class = "gallery_wrapper">

    
    <!-- <div class="wide-container">-->
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
    <!-- </div> -->
   

</div>

<% end_if %>

<!-- <div class="<% if $Children || $Parent %>large-9 large-push-3<% else %>large-12<% end_if %> columns">-->

<% if $hasMission = "1"%>
<div class="mission_container">
    <div class ="row">
    
        <div class="large-12 columns">
            $MissonStatement
        </div>
    
    </div>
</div>
<% end_if %>

<% if $ShowTitle = "1"%>
<div class ="row">

    <div class="large-12 columns">
        <h2>$Title</h2>
    </div>

</div>
<% end_if %>

<!-- <div class ="row">

    <div class="large-$Column1Width columns">
        $Column1
    </div>

    <div class="large-$getColumn2Width($Column1Width) columns">
        $Column2
    </div>

</div> -->

<div class ="row">

    <div class="large-12 columns">
        $BodyContent
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
    
<!-- </div> -->