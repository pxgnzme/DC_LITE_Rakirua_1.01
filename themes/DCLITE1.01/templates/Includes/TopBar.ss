<nav class="row">

    <div class = "large-12 columns">

		<div class = "logo_container">
		
			<!-- <a class="left-off-canvas-toggle" href="#" >Menu</a>--><a class = "site_logo" href="{$baseUrl}">$SiteConfig.siteLogo</a>
		
		</div>

		<div class = "nav_container">

			<ul class = "top-nav">

				<% loop Menu(1) %>

					<li class="<% if $LinkingMode == "current" || $LinkingMode == "section" %>active<% end_if %><% if $Children %> has-dropdown<% end_if %>">
						<a href="$Link" title="Go to the $Title.ATT">$MenuTitle</a><span class = "nav_in_wrapper"></span>
						<% if $Children %>
						<ul class="dropdown">
							<li><label>$MenuTitle</label></li>
							<% loop $Children %>
							<li class="<% if $LinkingMode == "current" || $LinkingMode == "section" %>active<% end_if %><% if $Children %> has-dropdown<% end_if %>">
								<a href="$Link" title="Go to the $Title.ATT">$MenuTitle</a>
								<% if $Children %>
								<ul class="dropdown">
									<% loop $Children %>
									<li class="<% if $LinkingMode == "current" || $LinkingMode == "section" %>active<% end_if %>"><a href="$Link" title="Go to the $Title.ATT">$MenuTitle</a></li>
									<% end_loop %>
								</ul>
								<% end_if %>
							</li>
							<% end_loop %>
							<li><a href="$Link">See all &rarr;</a></li>
						</ul>
						<% end_if %>
					</li>

				<% end_loop %>

			</ul>
		</div>

	</div>

</nav>
