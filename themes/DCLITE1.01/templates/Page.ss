<!doctype html>
<html class="no-js" lang="$ContentLocale.ATT" dir="$i18nScriptDirection.ATT">
<head>
	<% base_tag %>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> - $SiteConfig.Title</title>
	<meta name="description" content="$MetaDescription.ATT" />
	<%--http://ogp.me/--%>
	<meta property="og:site_name" content="$SiteConfig.Title.ATT" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="$Title.ATT" />
	<meta property="og:description" content="$MetaDescription.ATT" />
	<meta property="og:url" content="$AbsoluteLink.ATT" />
	<% if $Image %>
	<meta property="og:image" content="<% with $Image.SetSize(500,500) %>$AbsoluteURL.ATT<% end_with %>" />
	<% end_if %>
	<link rel="icon" type="image/png" href="$ThemeDir/favicon.ico" />
	<%--See [Requirements](http://doc.silverstripe.org/framework/en/reference/requirements) for loading from controller--%>
	<link rel="stylesheet" href="$ThemeDir/fonts/foundation-icons.css" />
	<link rel="stylesheet" href="$ThemeDir/css/superslides.css">
	<link rel="stylesheet" href="$ThemeDir/css/screen.css?1" />
	<script src="$ThemeDir/js/modernizr.js"></script>

	<style>
	<% include CustomCss %>
	</style>

</head>
<body class="Page">

	<div class="off-canvas-wrap" data-offcanvas>

		<div class="inner-wrap">

			<!-- Off Canvas Menu -->
		    <aside class="left-off-canvas-menu">
		        <!-- whatever you want goes here -->
		        <ul>
		          <li><a href="#">Item 1</a></li>
		          <li><a href="#">Item 2</a></li>
		          <li><a href="#">Item 3</a></li>
		          <li><a href="#">Item 4</a></li>
		        </ul>
		    </aside>

			<header>
				
				<% include TopBar %>
				
			</header>

			<div class="main typography" role="main">
				
				$Layout
				
			</div>

			<footer class="footer" role="contentinfo">

				<% if $aslinks %>
				<div class="row">
					<div class="large-12 columns footer_links_wrapper">

						<h4>Associated Organisations</h4>

			            <ul class = "asoc_links_container">
			            <% loop $aslinks %>
			            	<li>
				            	<a href="$ExternalURL" target="_blank" class = "asoc_links">
				                	$Image.SetHeight(80)
				                </a>
			            	</li>
			            <% end_loop %>
			            </ul>
			        </div>
		        </div>
		        <% end_if %>

				<div class="row">
					<div class="large-12 columns">
						<p>&copy; $Now.Year $SiteConfig.Title</p>
						<p><strong>Disclaimer</strong><br />

While every effort has been made to ensure the accuracy of this website, it has been written, edited, published, and made available strictly on the basis that its authors, editors, and publishers are excluded from any liability for anything done or omitted to be done by any person in reliance, whether wholly or partially, on the contents of this publication.</p>
					</div>
				</div>
			</footer>

			<!-- close the off-canvas menu -->
 			<a class="exit-off-canvas"></a>

		</div>

	</div>

	<!--<div id="video_modal" class="reveal-modal" data-reveal>

		<div id= "youtube_container">[YOUTUBE VIDEO EMBED HERE]</div>

		<a class="close-reveal-modal">&#215;</a>    

	</div>-->

	<div id="page_modal" class="reveal-modal" data-reveal>

		<div id= "modal_container"></div>

		<a class="close-reveal-modal">&#215;</a>    

	</div>

	<%--See [Requirements](http://doc.silverstripe.org/framework/en/reference/requirements) for loading from controller--%>
	<script src="$ThemeDir/js/jquery.min.js"></script>
	<script src="$ThemeDir/js/jquery.easing.1.3.js"></script>
 	<script src="$ThemeDir/js/jquery.animate-enhanced.min.js"></script>
	<script src="$ThemeDir/js/foundation.min.js"></script>
    <script src="$ThemeDir/js/foundation.offcanvas.js"></script>
    <script src="$ThemeDir/js/jquery.superslides.js" type="text/javascript" charset="utf-8"></script>
    <script src="$ThemeDir/js/slick.js?1"></script>
	<script src="$ThemeDir/js/custom.js?1"></script>
    <script>
    $(document).foundation();
    </script>
</body>
</html>
