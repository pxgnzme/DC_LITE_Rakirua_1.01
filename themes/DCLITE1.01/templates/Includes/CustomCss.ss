body{

	background-color: #$SiteConfig.BgColor;

}

header{

	background-color: #$SiteConfig.navBgColor;

}

nav.row{
	max-width:$SiteConfig.navInnerWidth;
}

.main{
	background-color: #$SiteConfig.bodyBgColor;
}

.main .row{

	max-width:$SiteConfig.bodyInnerWidth;

}

footer .row{
	max-width:$SiteConfig.footerInnerWidth;
}

h2{
	color:#$SiteConfig.h2Color;
}

h4{
	color:#$SiteConfig.h4Color;
	font-size:$SiteConfig.h4Size;
}

p, .video_des, li{
	color:#$SiteConfig.pColor;
	font-size:$SiteConfig.pSize;
}

table tr td{
	color:#$SiteConfig.pColor;
	font-size:$SiteConfig.pSize;	
}

.video_des{
	color:#$SiteConfig.h2Color;
	font-size:$SiteConfig.pSize;
}

p a, p a:hover, p a:visited, .panel a:visited, .panel a:hover, .panel a{
	color:#$SiteConfig.pColor;
	text-decoration: underline;
}

.slides-pagination a{
	border-color: #$SiteConfig.pColor;
}

.slides-pagination a.current{
	background-color: #$SiteConfig.pColor;
}

nav a{
	color:#$SiteConfig.navColor;
	border-color:#$SiteConfig.navColor !important;
}

.mission_container p{
	color:#$SiteConfig.navColor;
}