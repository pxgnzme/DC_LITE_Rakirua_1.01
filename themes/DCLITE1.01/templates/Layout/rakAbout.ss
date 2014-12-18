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

<% if $isLoggedIn() %>
<div class ="row">

    <div class="small-$Column1Width columns">
        $Column1
    </div>

    <div class="small-$getColumn2Width($Column1Width) columns">
        $Column2
    </div>

</div>
<% end_if %>

<div class = "bio_wrapper row">
<!-- <div class = "bio_wrapper">-->

<ul class= "small-block-grid-1 medium-block-grid-2 large-block-grid-4">

<% if $members %>
    <% loop $members %>
    <!--<div class = "medium-3 small-3 columns">-->
    <!-- <div class = "member_item">-->
    <li>  
        <div class = "panel">

            <div class= "member_pic">
            $Image.CroppedImage(150,150)
            </div>

            <div class= "bio_link">

                <strong>$Name</strong><br />
                <a href= "mailto:$Email">Email</a>

            </div>

            <div class= "bio_content">

                $Bio

            </div>
        </div>
    </li>
    <!--</div>-->
    <% end_loop %>
<% end_if %>

</ul>
</div>

<% if $hasFooterGallery = "1"%>

<% include Footer %>

<% end_if %>
	
   