

			

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

				<li class= "login_nav">

				<% if $isLoggedIn() %>

				<a href="Security/logout" class = "logout_btn">LOGOUT <% control isLoggedIn %> $FirstName <% end_control %> <i class="fi-torso"></i></a>

				<% else %>

				<a href="" class = "login_btn">LOGIN <i class="fi-torso"></i></a><a href="" class = "close_login"><i class="fi-x"></i> CLOSE</a>

				<% end_if %>

				</li>

			
			
