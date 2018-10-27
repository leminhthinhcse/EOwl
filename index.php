<?php
session_start();
if ( isset( $_SESSION[ 'user_name' ] ) ) {
	header( "Location: home.php" );
}
?>

<!DOCTYPE html>
<html class="nojs html css_verticalspacer" lang="en-US">
<head>

	<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
	<meta name="generator" content="2018.1.0.386"/>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<script type="text/javascript">
		// Update the 'nojs'/'js' class on the html node
		document.documentElement.className = document.documentElement.className.replace( /\bnojs\b/g, 'js' );

		// Check that all required assets are uploaded and up-to-date
		if ( typeof Muse == "undefined" ) window.Muse = {};
		window.Muse.assets = {
			"required": [ "museutils.js", "museconfig.js", "webpro.js", "musewpslideshow.js", "jquery.museoverlay.js", "touchswipe.js", "jquery.musepolyfill.bgsize.js", "jquery.watch.js", "jquery.musemenu.js", "require.js", "index.css" ],
			"outOfDate": []
		};
	</script>

	<title>Đăng nhập</title>
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="css/site_global.css?crc=444006867"/>
	<link rel="stylesheet" type="text/css" href="css/master_a-master-no-dang-nhap.css?crc=3829596743"/>
	<link rel="stylesheet" type="text/css" href="css/index.css?crc=475380663" id="pagesheet"/>
	<!-- JS includes -->
	<!--[if lt IE 9]>
  <script src="scripts/html5shiv.js?crc=4241844378" type="text/javascript"></script>
  <![endif]-->
	<!--/*

*/
-->
</head>

<body class="museBGSize">



	<div class="clearfix" id="page">
		<!-- group -->
		<div class="clearfix grpelem" id="ppslideshowu10393">
			<!-- column -->
			<div class="clearfix colelem" id="pslideshowu10393">
				<!-- group -->
				<div class="SlideShowWidget clearfix HeroFillFrame grpelem" id="slideshowu10393">
					<!-- none box -->
					<div class="popup_anchor" id="u10408popup">
						<div class="SlideShowContentPanel clearfix" id="u10408">
							<!-- stack box -->
							<div class="SSSlide clip_frame grpelem" id="u10413">
								<!-- image -->
								<img class="ImageInclude" id="u10413_img" data-src="images/cactus.jpg?crc=491424337" src="images/blank.gif?crc=4208392903" alt="" data-width="1024" data-height="768"/>
							</div>
							<div class="SSSlide invi clip_frame grpelem" id="u10411">
								<!-- image -->
								<img class="ImageInclude" id="u10411_img" data-src="images/road.jpg?crc=180693847" src="images/blank.gif?crc=4208392903" alt="" data-width="1024" data-height="768"/>
							</div>
							<div class="SSSlide invi clip_frame grpelem" id="u10409">
								<!-- image -->
								<img class="ImageInclude" id="u10409_img" data-src="images/trees.jpg?crc=4071309946" src="images/blank.gif?crc=4208392903" alt="" data-width="1024" data-height="768"/>
							</div>
						</div>
					</div>
				</div>
				<div class="browser_width grpelem" id="u10359-bw">
					<div class="museBGSize" id="u10359">
						<!-- group -->
						<div class="clearfix" id="u10359_align_to_page">
							<nav class="MenuBar clearfix grpelem" id="menuu10364">
								<!-- horizontal box -->
								<div class="MenuItemContainer clearfix grpelem" id="u10379">
									<!-- vertical box -->
									<a class="nonblock nontext MenuItem MenuItemWithSubMenu rounded-corners clearfix colelem" id="u10380" href="home.php">
										<!-- horizontal box --><img class="MenuItemLabel NoWrap grpelem" id="u10382" alt="Trang chủ" src="images/blank.gif?crc=4208392903"/>
										<!-- state-based BG images -->
									</a>
								</div>
								<div class="MenuItemContainer clearfix grpelem" id="u10365">
									<!-- vertical box -->
									<a class="nonblock nontext MenuItem MenuItemWithSubMenu rounded-corners clearfix colelem" id="u10366" href="contest.php">
										<!-- horizontal box --><img class="MenuItemLabel NoWrap grpelem" id="u10367" alt="Thi thử" src="images/blank.gif?crc=4208392903"/>
										<!-- state-based BG images -->
									</a>
								</div>
								<div class="MenuItemContainer clearfix grpelem" id="u10386">
									<!-- vertical box -->
									<a class="nonblock nontext MenuItem MenuItemWithSubMenu rounded-corners clearfix colelem" id="u10387" href="news.php">
										<!-- horizontal box --><img class="MenuItemLabel NoWrap grpelem" id="u10389" alt="Tin tức" src="images/blank.gif?crc=4208392903"/>
										<!-- state-based BG images -->
									</a>
								</div>
							</nav>
						</div>
					</div>
				</div>
				<div class="clearfix grpelem" id="u12989">
					<!-- group -->
					<div class="clip_frame grpelem" id="u10353">
						<!-- image -->
						<img class="block" id="u10353_img" src="images/home-ellipse%201c.png?crc=482178746" alt="" width="13" height="13"/>
					</div>
					<div class="clip_frame grpelem" id="u10351">
						<!-- image -->
						<img class="block" id="u10351_img" src="images/home-ellipse%201c2.png?crc=3764376119" alt="" width="13" height="13"/>
					</div>
					<div class="clip_frame grpelem" id="u10355">
						<!-- image -->
						<img class="block" id="u10355_img" src="images/home-ellipse%201c3.png?crc=482178746" alt="" width="13" height="13"/>
					</div>
				</div>
				<div class="clip_frame grpelem" id="u10438">
					<!-- image -->
					<img class="block" id="u10438_img" src="images/home-vector%20smart%20objectc.png?crc=4228036174" alt="" width="163" height="157"/>
				</div>
				<div class="clip_frame grpelem" id="u10436">
					<!-- image -->
					<img class="block" id="u10436_img" src="images/home-logo-01c.png?crc=3806784294" alt="" width="75" height="87"/>
				</div>
				<div class="clearfix grpelem" id="u12986">
					<!-- group -->
					<div class="clearfix grpelem" id="u10419">
						<!-- group -->
						<div class="clip_frame grpelem" id="u10434">
							<!-- image -->
							<img class="block" id="u10434_img" src="images/home-vector%20smart%20objectc2.png?crc=420441850" alt="" width="360" height="97"/>
						</div>
					</div>
					<a class="nonblock nontext MuseLinkActive clearfix grpelem" id="u10503-4" href="index.php">
						<!-- content -->
						<p>ĐĂNG NHẬP / ĐĂNG KÝ THÀNH VIÊN</p>
					</a>
					<a class="nonblock nontext MuseLinkActive clearfix grpelem" id="u10509-4" href="index.php">
						<!-- content -->
						<p>Hoặc đăng nhập bằng:</p>
					</a>
					<a class="nonblock nontext MuseLinkActive museBGSize grpelem" id="u10512" href="index.php">
						<!-- simple frame -->
					</a>
					<a class="nonblock nontext MuseLinkActive museBGSize grpelem" id="u10523" href="./login-with-google/">
						<!-- simple frame -->
					</a>
				</div>
			</div>
			<div class="clearfix colelem" id="ppu10811">
				<!-- group -->
				<div class="clearfix grpelem" id="pu10811">
					<!-- group -->
					<form action="home.php" method="post" id="dangky">
						<div class="rgba-background rounded-corners clearfix grpelem" id="u10811">
							<!-- column -->
							<div class="clearfix colelem" id="u10813-4">
								<!-- content -->
								<p>Đăng Ký</p>
							</div>
							<div class="clearfix colelem" id="pu10814">
								<!-- group -->
								<div class="rounded-corners clearfix grpelem" id="u10814">
									<!-- group -->
									<div class="museBGSize grpelem" id="u10815">
										<!-- simple frame -->
									</div>
									<div class="grpelem" id="u11633">
										<!-- custom html -->
										<input name="name" type="text" placeholder="Họ và tên" required>
									</div>
								</div>
								<div class="rounded-corners clearfix grpelem" id="u10940">
									<!-- group -->
									<div class="museBGSize grpelem" id="u10941">
										<!-- simple frame -->
									</div>
									<div class="grpelem" id="u11638">
										<!-- custom html -->
										<input id="email" onchange="checkemail()" name="email" type="text" placeholder="Email" required>
									</div>
								</div>
							</div>
							<div class="clearfix colelem" id="pu10957">
								<!-- group -->
								<div class="rounded-corners clearfix grpelem" id="u10957">
									<!-- group -->
									<div class="museBGSize grpelem" id="u10958">
										<!-- simple frame -->
									</div>
									<div class="grpelem" id="u11643">
										<!-- custom html -->
										<input name="school" type="text" placeholder="Trường" required>
									</div>
								</div>
								<div class="rounded-corners clearfix grpelem" id="u10966">
									<!-- group -->
									<div class="museBGSize grpelem" id="u10967">
										<!-- simple frame -->
									</div>
									<div class="grpelem" id="u11648">
										<!-- custom html -->
										<input name="address" type="text" placeholder="Địa chỉ" required>
									</div>
								</div>
							</div>
							<div class="clearfix colelem" id="pu10816">
								<!-- group -->
								<div class="rounded-corners clearfix grpelem" id="u10816">
									<!-- group -->
									<div class="museBGSize grpelem" id="u10817">
										<!-- simple frame -->
									</div>
									<div class="grpelem" id="u11653">
										<!-- custom html -->
										<input id="pas" name="password" type="password" placeholder="Mật khẩu" required>
									</div>
								</div>
								<div class="rounded-corners clearfix grpelem" id="u10847">
									<!-- group -->
									<div class="museBGSize grpelem" id="u10848">
										<!-- simple frame -->
									</div>
									<div class="grpelem" id="u11658">
										<!-- custom html -->
										<input onchange="checkpass()" id="repas" name="repassword" type="password" placeholder="Nhập lại mật khẩu" required>
									</div>
								</div>
							</div>
							<div class="rounded-corners clearfix colelem" id="u14430">
								<!-- group -->
								<div class="clip_frame grpelem" id="u14463">
									<!-- image -->
									<img class="block" id="u14463_img" src="images/file-picture-o-512.png?crc=249962637" alt="" width="35" height="35"/>
								</div>
								<div class="grpelem" id="u14432">
									<input type="file" name="fileUpload" id="fileUpload">
								</div>
							</div>
							<div class="clearfix colelem" id="pu14423">
								<!-- group -->
								<div class="clearfix grpelem" id="u14423">
									<!-- group -->
									<div class="grpelem" id="u11698">
										<!-- custom html -->
										<input type="checkbox" name="dieukhoan" required>
									</div>
									<div class="clearfix grpelem" id="u11002-4">
										<!-- content -->
										<p>Tôi đã đọc và đồng ý với các nội quy sử dụng.</p>
									</div>
								</div>
								<div class="clearfix grpelem" id="u14420">
									<!-- group -->
									<button type="submit" class="pointer_cursor rounded-corners clearfix grpelem" id="u10820">
										<!-- group -->
										<a class="nonblock nontext clearfix grpelem" id="u10821-4" href="#">
											<!-- content -->
											<p>Đăng Ký</p>
										</a>
									</button>
								</div>
							</div>
						</div>
					</form>


					<div class="museBGSize rounded-corners grpelem" id="u10812">
						<!-- content -->
					</div>
				</div>
				<form action="news.php" method="post" id="dangnhap">
					<div class="rgba-background rounded-corners clearfix grpelem" id="u10552">
						<!-- column -->
						<div class="clearfix colelem" id="u10671-4">
							<!-- content -->
							<p>Đăng Nhập</p>
						</div>
						<div class="rounded-corners clearfix colelem" id="u10678">
							<!-- group -->
							<div class="museBGSize grpelem" id="u10684">
								<!-- simple frame -->
							</div>
							<div class="grpelem" id="u11621">
								<!-- custom html -->
								<input name="username" type="text" placeholder="Email đăng nhập" required>
							</div>
						</div>
						<div class="rounded-corners clearfix colelem" id="u10695">
							<!-- group -->
							<div class="museBGSize grpelem" id="u10696">
								<!-- simple frame -->
							</div>
							<div class="grpelem" id="u11626">
								<!-- custom html -->
								<input name="password" type="password" placeholder="Mật khẩu" required>
							</div>
						</div>
						<button type="submit" class="pointer_cursor rounded-corners clearfix colelem" id="u10718">
							<!-- group -->

							<a class="nonblock nontext clearfix grpelem" id="u10721-4" href="#">
								<!-- content -->
								<p>Đăng nhập</p>
							</a>
						</button>
						<div class="clearfix colelem" id="u10724-4">
							<!-- content -->
							<p>Quên mật khẩu?</p>
						</div>
					</div>
				</form>

				<div class="museBGSize rounded-corners grpelem" id="u10655">
					<!-- content -->
				</div>
			</div>
		</div>
		<div class="verticalspacer" data-offset-top="775" data-content-above-spacer="775" data-content-below-spacer="241"></div>
		<div class="clearfix grpelem" id="pu10463">
			<!-- column -->
			<div class="browser_width colelem" id="u10463-bw">
				<div class="museBGSize" id="u10463">
					<!-- group -->
					<div class="clearfix" id="u10463_align_to_page">
						<div class="clip_frame grpelem" id="u10459">
							<!-- image -->
							<img class="block" id="u10459_img" src="images/home-logo-01c2.png?crc=197566691" alt="" width="134" height="155"/>
						</div>
						<div class="clearfix grpelem" id="pu10467-4">
							<!-- column -->
							<div class="clearfix colelem" id="u10467-4">
								<!-- content -->
								<p>VỀ CHÚNG TÔI</p>
							</div>
							<div class="clearfix colelem" id="u10461-10">
								<!-- content -->
								<p>NHÓM 43 - TPCNPM - HCMUT</p>
								<p>Hào . Lĩnh . Dũ . Thịnh</p>
								<p>Điện thoại: 0964 483 xxx</p>
								<p>Email: info@eowl.esy.es</p>
							</div>
						</div>
						<div class="clearfix grpelem" id="pu10466-4">
							<!-- column -->
							<div class="clearfix colelem" id="u10466-4">
								<!-- content -->
								<p>THEO DÕI CHÚNG TÔI</p>
							</div>
							<div class="clearfix colelem" id="pu10457">
								<!-- group -->
								<div class="clip_frame grpelem" id="u10457">
									<!-- image -->
									<img class="block" id="u10457_img" src="images/home-vector%20smart%20objectc6.png?crc=4272345823" alt="" width="33" height="33"/>
								</div>
								<div class="clip_frame grpelem" id="u10455">
									<!-- image -->
									<img class="block" id="u10455_img" src="images/home-vector%20smart%20objectc7.png?crc=4245374907" alt="" width="32" height="32"/>
								</div>
								<div class="clip_frame grpelem" id="u10453">
									<!-- image -->
									<img class="block" id="u10453_img" src="images/home-vector%20smart%20objectc8.png?crc=3928955246" alt="" width="32" height="32"/>
								</div>
								<div class="clip_frame grpelem" id="u10468">
									<!-- image -->
									<img class="block" id="u10468_img" src="images/home-vector%20smart%20objectc9.png?crc=3843344365" alt="" width="32" height="32"/>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="browser_width colelem" id="u10462-bw">
				<div id="u10462">
					<!-- group -->
					<div class="clearfix" id="u10462_align_to_page">
						<div class="clearfix grpelem" id="u10465-4">
							<!-- content -->
							<p>Copyright © 2018. All rights reserved.</p>
						</div>
						<div class="clearfix grpelem" id="u10464-4">
							<!-- content -->
							<p><a class='nonblock nontext clearfix grpelem' style="color: white" href="home.php">TRANG CHỦ :-: </a>  <a class='nonblock nontext clearfix grpelem' style="color: white" href="contest.php?subject=0"> PHÒNG THI :-: </a>  <a class='nonblock nontext clearfix grpelem' style="color: white" href="news.php"> TIN TỨC</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="preload_images">
		<img class="preload" src="images/u10382-a.png?crc=3897199472" alt=""/>
		<img class="preload" src="images/u10367-a.png?crc=257017696" alt=""/>
		<img class="preload" src="images/u10389-a.png?crc=513485193" alt=""/>
	</div>
	<!-- Other scripts -->
	<script type="text/javascript">
		// Decide whether to suppress missing file error or not based on preference setting
		var suppressMissingFileError = false
	</script>
	<script type="text/javascript">
		window.Muse.assets.check = function ( c ) {
			if ( !window.Muse.assets.checked ) {
				window.Muse.assets.checked = !0;
				var b = {},
					d = function ( a, b ) {
						if ( window.getComputedStyle ) {
							var c = window.getComputedStyle( a, null );
							return c && c.getPropertyValue( b ) || c && c[ b ] || ""
						}
						if ( document.documentElement.currentStyle ) return ( c = a.currentStyle ) && c[ b ] || a.style && a.style[ b ] || "";
						return ""
					},
					a = function ( a ) {
						if ( a.match( /^rgb/ ) ) return a = a.replace( /\s+/g, "" ).match( /([\d\,]+)/gi )[ 0 ].split( "," ), ( parseInt( a[ 0 ] ) << 16 ) + ( parseInt( a[ 1 ] ) << 8 ) + parseInt( a[ 2 ] );
						if ( a.match( /^\#/ ) ) return parseInt( a.substr( 1 ),
							16 );
						return 0
					},
					f = function ( f ) {
						for ( var g = document.getElementsByTagName( "link" ), j = 0; j < g.length; j++ )
							if ( "text/css" == g[ j ].type ) {
								var l = ( g[ j ].href || "" ).match( /\/?css\/([\w\-]+\.css)\?crc=(\d+)/ );
								if ( !l || !l[ 1 ] || !l[ 2 ] ) break;
								b[ l[ 1 ] ] = l[ 2 ]
							}
						g = document.createElement( "div" );
						g.className = "version";
						g.style.cssText = "display:none; width:1px; height:1px;";
						document.getElementsByTagName( "body" )[ 0 ].appendChild( g );
						for ( j = 0; j < Muse.assets.required.length; ) {
							var l = Muse.assets.required[ j ],
								k = l.match( /([\w\-\.]+)\.(\w+)$/ ),
								i = k && k[ 1 ] ?
								k[ 1 ] : null,
								k = k && k[ 2 ] ? k[ 2 ] : null;
							switch ( k.toLowerCase() ) {
								case "css":
									i = i.replace( /\W/gi, "_" ).replace( /^([^a-z])/gi, "_$1" );
									g.className += " " + i;
									i = a( d( g, "color" ) );
									k = a( d( g, "backgroundColor" ) );
									i != 0 || k != 0 ? ( Muse.assets.required.splice( j, 1 ), "undefined" != typeof b[ l ] && ( i != b[ l ] >>> 24 || k != ( b[ l ] & 16777215 ) ) && Muse.assets.outOfDate.push( l ) ) : j++;
									g.className = "version";
									break;
								case "js":
									j++;
									break;
								default:
									throw Error( "Unsupported file type: " + k );
							}
						}
						c ? c().jquery != "1.8.3" && Muse.assets.outOfDate.push( "jquery-1.8.3.min.js" ) : Muse.assets.required.push( "jquery-1.8.3.min.js" );
						g.parentNode.removeChild( g );
						if ( Muse.assets.outOfDate.length || Muse.assets.required.length ) g = "Some files on the server may be missing or incorrect. Clear browser cache and try again. If the problem persists please contact website author.", f && Muse.assets.outOfDate.length && ( g += "\nOut of date: " + Muse.assets.outOfDate.join( "," ) ), f && Muse.assets.required.length && ( g += "\nMissing: " + Muse.assets.required.join( "," ) ), suppressMissingFileError ? ( g += "\nUse SuppressMissingFileError key in AppPrefs.xml to show missing file error pop up.", console.log( g ) ) : alert( g )
					};
				location && location.search && location.search.match && location.search.match( /muse_debug/gi ) ?
					setTimeout( function () {
						f( !0 )
					}, 5E3 ) : f()
			}
		};
		var muse_init = function () {
			require.config( {
				baseUrl: ""
			} );
			require( [ "jquery", "museutils", "whatinput", "webpro", "musewpslideshow", "jquery.museoverlay", "touchswipe", "jquery.musepolyfill.bgsize", "jquery.musemenu", "jquery.watch" ], function ( c ) {
				var $ = c;
				$( document ).ready( function () {
					try {
						window.Muse.assets.check( $ ); /* body */
						Muse.Utils.transformMarkupToFixBrowserProblemsPreInit(); /* body */
						Muse.Utils.prepHyperlinks( true ); /* body */
						Muse.Utils.resizeHeight( '.browser_width' ); /* resize height */
						Muse.Utils.requestAnimationFrame( function () {
							$( 'body' ).addClass( 'initialized' );
						} ); /* mark body as initialized */
						Muse.Utils.makeButtonsVisibleAfterSettingMinWidth(); /* body */
						Muse.Utils.initWidget( '#slideshowu10393', [ '#bp_infinity' ], function ( elem ) {
							var widget = new WebPro.Widget.ContentSlideShow( elem, {
								autoPlay: true,
								displayInterval: 3500,
								slideLinkStopsSlideShow: false,
								transitionStyle: 'fading',
								lightboxEnabled_runtime: false,
								shuffle: false,
								transitionDuration: 500,
								enableSwipe: true,
								elastic: 'fullWidth',
								resumeAutoplay: true,
								resumeAutoplayInterval: 3000,
								playOnce: false,
								autoActivate_runtime: false,
								isResponsive: false
							} );
							$( elem ).data( 'widget', widget );
							return widget;
						} ); /* #slideshowu10393 */
						Muse.Utils.initWidget( '.MenuBar', [ '#bp_infinity' ], function ( elem ) {
							return $( elem ).museMenu();
						} ); /* unifiedNavBar */
						Muse.Utils.fullPage( '#page' ); /* 100% height page */
						Muse.Utils.showWidgetsWhenReady(); /* body */
						Muse.Utils.transformMarkupToFixBrowserProblems(); /* body */
					} catch ( b ) {
						if ( b && "function" == typeof b.notify ? b.notify() : Muse.Assert.fail( "Error calling selector function: " + b ), false ) throw b;
					}
				} )
			} )
		};
	</script>
	<!-- RequireJS script -->
	<script src="scripts/require.js?crc=7928878" type="text/javascript" async data-main="scripts/museconfig.js?crc=310584261" onload="if (requirejs) requirejs.onError = function(requireType, requireModule){ if (requireType && requireType.toString && requireType.toString().indexOf && 0 <= requireType.toString().indexOf('#scripterror')) window.Muse.assets.check(); }" onerror="window.Muse.assets.check();"></script>
	<script>
		var res = <?php echo $_GET['res'];?>;
		switch ( res ) {
			case '0':
				swal( "Xin lỗi!", "Bạn cần đăng nhập để truy cập tính năng này!", "warning" );
				break;
		}
	</script>

	<script>
		function checkemail() {
			var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			var email = $( 'input[name=email]' ).val();
			var k = re.test( String( email ).toLowerCase() );
			if ( !k ) {
				document.getElementById( "email" ).value = "";
				sweetAlert( "Lỗi", "Email không hợp lệ!", "error" );
			}
		}
	</script>
	<script>
		function checkpass() {
			var pas = $( "#pas" ).val();
			var repas = $( "#repas" ).val();
			if ( pas != repas ) {
				document.getElementById( "repas" ).value = "";
				sweetAlert( "Lỗi", "Mật khẩu không khớp!", "error" );
			}
		}
	</script>
	
	<script>
		$( "#dangky" ).submit( function ( event ) {
			event.preventDefault();

			var data = {
				name: $( 'input[name=name]' ).val(),
				email: $( 'input[name=email]' ).val(),
				school: $( 'input[name=school]' ).val(),
				address: $( 'input[name=address]' ).val(),
				password: $( 'input[name=password]' ).val()
			}
			$.post( './function/dangky.php', data, function ( res ) {
				switch ( res ) {
					case '1':
						swal( "Thành công!", "Bạn đã tạo tài khoản thành công! Mời bạn đăng nhập!", "success" );
						document.getElementById( "dangky" ).reset();
						break;
					case '-1':
						sweetAlert( "Lỗi", "Email " + $( 'input[name=email]' ).val() + " đã tồn tại!", "error" );
						break;
					case '0':
					sweetAlert( "Lỗi", "Không thể tạo tài khoản lúc này! Vui lòng quay lại khi khác!", "error" );
					break;
				}
			} )
		} )
	</script>
	
	<script>
		$( "#dangnhap" ).submit( function ( event ) {
			var self = $( this );
			event.preventDefault();
			var data = {
				username: self.find( ( 'input[name=username]' ) ).val(),
				password: self.find( ( 'input[name=password]' ) ).val()
			}
			$.post( './function/dangnhap.php', data, function ( res ) {
				switch ( res ) {
					case '0':
						sweetAlert( "Lỗi", "Tên đăng nhập và mật khẩu chưa chính xác! Bạn vui lòng nhập lại!", "error" );
						break;
					case '1':
						swal( "Thành công!", "Bạn đã đăng nhập thành công!", "success" );
						window.location.href = './home.php';
						break;
					case '2':
						swal( "Thành công!", "Bạn đã đăng nhập thành công!", "success" );
						window.location.href = './admin-panel';
						break;
				}
			} )
		} );
	</script>
</body>
</html>