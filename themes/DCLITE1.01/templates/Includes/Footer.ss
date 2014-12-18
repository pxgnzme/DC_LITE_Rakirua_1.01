<div class = "footer_gallery_wrapper">

    <div class="row footer_gallery_container collapse">

        <% if $items %>
            <% loop $items.Limit(6) %>
            <div class = "medium-2 small-6 columns">
                $Image.SetWidth(600).CroppedImage(400,400)
            </div>
            <% end_loop %>
        <% end_if %>

    </div>

</div>

			
			
