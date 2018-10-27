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
			"required": [ "museutils.js", "museconfig.js", "webpro.js", "musewpslideshow.js", "jquery.museoverlay.js", "touchswipe.js", "jquery.musepolyfill.bgsize.js", "jquery.watch.js", "jquery.musemenu.js", "require.js", "capnhatthongtin.css" ],
			"outOfDate": []
		};
	</script>

	<title>Cập nhật thông tin</title>
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="css/site_global.css?crc=444006867"/>
	<link rel="stylesheet" type="text/css" href="css/master_a-master.css?crc=107776024"/>
	<link rel="stylesheet" type="text/css" href="css/capnhatthongtin.css?crc=157075231" id="pagesheet"/>
	<!-- JS includes -->
	<!--[if lt IE 9]>
  <script src="scripts/html5shiv.js?crc=4241844378" type="text/javascript"></script>
  <![endif]-->
	<!--/*

*/
-->
</head>

<body>

	<div class="clearfix" id="page">
		<!-- group -->
		<div class="clearfix grpelem" id="ppslideshowu3219">
			<!-- column -->
			<?php include('./temp/header.php') ?>

			<div class="PamphletWidget clearfix colelem" id="pamphletu11080">
				<!-- none box -->
				<div class="popup_anchor" id="u11092popup">
					<div class="ContainerGroup clearfix" id="u11092">
						<!-- stack box -->
						<div class="Container rgba-background rounded-corners clearfix grpelem" id="u11103">
							<!-- column -->
							<form action="home.php" method="post" id="doithongtin">
								<div class="position_content" id="u11103_position_content">
									<div class="clearfix colelem" id="pu11008">
										<!-- group -->
										<div class="rounded-corners clearfix grpelem" id="u11008">
											<!-- group -->
											<div class="museBGSize grpelem" id="u11009">
												<!-- simple frame -->
											</div>
											<div class="grpelem" id="u11678">
												<!-- custom html -->
												<input name="name" type="text" placeholder="<?php echo $_SESSION['user_name'] ?>">
											</div>
										</div>
										<div class="rounded-corners clearfix grpelem" id="u11019">
											<!-- group -->
											<div class="museBGSize grpelem" id="u11020">
												<!-- simple frame -->
											</div>
											<div class="grpelem" id="u11683">
												<!-- custom html -->
												<p style="color:#757A7C">
													<?php echo $_SESSION['user_email'] ?>
												</p>
											</div>
										</div>
									</div>

									<div class="clearfix colelem" id="pu11022">
										<!-- group -->
										<div class="rounded-corners clearfix grpelem" id="u11022">
											<!-- group -->
											<div class="museBGSize grpelem" id="u11023">
												<!-- simple frame -->
											</div>
											<div class="grpelem" id="u11688">
												<!-- custom html -->
												<input name="school" type="text" placeholder="<?php echo $_SESSION['user_school'] ?>">
											</div>
										</div>
										<div class="rounded-corners clearfix grpelem" id="u11025">
											<!-- group -->
											<div class="museBGSize grpelem" id="u11026">
												<!-- simple frame -->
											</div>
											<div class="grpelem" id="u11693">
												<!-- custom html -->
												<input name="address" type="text" placeholder="<?php echo $_SESSION['user_address'] ?>">
											</div>
										</div>
									</div>
									<div class="rounded-corners clearfix colelem" id="u14619">
										<!-- group -->
										<div class="clip_frame grpelem" id="u14621">
											<!-- image -->
											<img class="block" id="u14621_img" src="images/file-picture-o-512.png?crc=249962637" alt="" width="35" height="35"/>
										</div>
										<div class="grpelem" id="u14620">
											<input type="file" name="fileUpload" id="fileUpload">
										</div>
									</div>
									<a class="clearfix colelem" id="u14634" href="#">
										<!-- group -->
										<button type="submit" class="rounded-corners clearfix grpelem" id="u11014">
											<!-- group -->
											<img class="grpelem" id="u11015-4" alt="Cập nhật" width="142" height="28" src="images/u11015-4.png?crc=323067353"/>
											<!-- rasterized frame -->
										</button>
									</a>

								</div>
							</form>

							<script>
								$( "#doithongtin" ).submit( function ( event ) {
									event.preventDefault();

									var data = {
										name: $( 'input[name=name]' ).val(),
										school: $( 'input[name=school]' ).val(),
										address: $( 'input[name=address]' ).val()
									}
									$.post( './function/doithongtin.php', data, function ( res ) {
										switch ( res ) {
											case '0':
												swal( "Uhm!", "Bạn chưa nhập thông tin cần thay đổi?", "info" );
												break;
											case '1':
												swal( "Thành công!", "Thông tin đã được cập nhật", "success" );
												
												window.location.href = './home.php';
												break;
											default:
											sweetAlert( "Lỗi", res, "error" );
											break;
										}
									} )
								} )
							</script>
						</div>
						<form action="home.php" method="post" id="doimatkhau">
						<div class="Container invi rgba-background rounded-corners clearfix grpelem" id="u11093">
							<!-- group -->
							<div class="clearfix grpelem" id="pu11173">
								<!-- column -->
								<div class="rounded-corners clearfix colelem" id="u11173">
									<!-- group -->
									<div class="museBGSize grpelem" id="u11174">
										<!-- simple frame -->
									</div>
									<div class="grpelem" id="u11663">
										<!-- custom html -->
										<input name="curpas" type="password" placeholder="Mật khẩu hiện tại" required>
									</div>
								</div>
								<div class="rounded-corners clearfix colelem" id="u11176">
									<!-- group -->
									<div class="museBGSize grpelem" id="u11177">
										<!-- simple frame -->
									</div>
									<div class="grpelem" id="u11668">
										<!-- custom html -->
										<input id="pas" name="newpass" type="password" placeholder="Mật khẩu mới" required>
									</div>
								</div>
							</div>
							<div class="clearfix grpelem" id="pu11191">
								<!-- column -->
								<div class="rounded-corners clearfix colelem" id="u11191">
									<!-- group -->
									<div class="museBGSize grpelem" id="u11197">
										<!-- simple frame -->
									</div>
									<div class="grpelem" id="u11673">
										<!-- custom html -->
										<input onchange="checkpass()" id="repas" name="renewpass" type="password" placeholder="Nhập lại mật khẩu mới" required>
									</div>
								</div>
								<a class="rounded-corners clearfix colelem" id="u11206" href="#">
									<!-- group -->
									<button type="submit" class="clearfix grpelem" id="u11207-4">
										<!-- content -->
										<p>Cập nhật</p>
									</button>
								</a>
							</div>
						</div>
						</form>
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
							$( "#doimatkhau" ).submit( function ( event ) {
									event.preventDefault();

									var data = {
										curpas: $( 'input[name=curpas]' ).val(),
										newpass: $( 'input[name=newpass]' ).val()
									}
									$.post( './function/doimatkhau.php', data, function ( res ) {
										switch ( res ) {
											case '0':
												swal( "Uhm!", "Bạn đã nhập sai mật khẩu hiện tại", "warning" );
												break;
											case '1':
												swal( "Thành công!", "Mật khẩu đã được thay đổi", "success" );
												
												window.location.href = './home.php';
												break;
											default:
											sweetAlert( "Lỗi", res, "error" );
											break;
										}
									} )
								} )
						</script>
					</div>
				</div>
				<div class="ThumbGroup clearfix grpelem" id="u11083">
					<!-- none box -->
					<div class="popup_anchor" id="u11086popup">
						<div class="Thumb popup_element rounded-corners clearfix" id="u11086">
							<!-- group -->
							<img class="grpelem" id="u11087" alt="Đổi thông tin" src="images/blank.gif?crc=4208392903"/>
							<!-- state-based BG images -->
						</div>
					</div>
					<div class="popup_anchor" id="u11088popup">
						<div class="Thumb popup_element rounded-corners clearfix" id="u11088">
							<!-- group -->
							<img class="grpelem" id="u11089" alt="Đổi mật khẩu" src="images/blank.gif?crc=4208392903"/>
							<!-- state-based BG images -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="verticalspacer" data-offset-top="540" data-content-above-spacer="540" data-content-below-spacer="239"></div>
		<?php include('./temp/footer.php'); ?>
	</div>
	<div class="preload_images">
		<img class="preload" src="images/u11087-r.png?crc=4176250077" alt=""/>
		<img class="preload" src="images/u11087-a.png?crc=4137756593" alt=""/>
		<img class="preload" src="images/u11089-r.png?crc=500126687" alt=""/>
		<img class="preload" src="images/u11089-a.png?crc=4123677781" alt=""/>
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
			require( [ "jquery", "museutils", "whatinput", "webpro", "musewpslideshow", "jquery.museoverlay", "touchswipe", "jquery.watch", "jquery.musemenu", "jquery.musepolyfill.bgsize" ], function ( c ) {
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
						Muse.Utils.initWidget( '#slideshowu3219', [ '#bp_infinity' ], function ( elem ) {
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
						} ); /* #slideshowu3219 */
						Muse.Utils.initWidget( '.MenuBar', [ '#bp_infinity' ], function ( elem ) {
							return $( elem ).museMenu();
						} ); /* unifiedNavBar */
						Muse.Utils.initWidget( '#pamphletu11080', [ '#bp_infinity' ], function ( elem ) {
							return new WebPro.Widget.ContentSlideShow( elem, {
								contentLayout_runtime: 'stack',
								event: 'mouseover',
								deactivationEvent: '',
								autoPlay: false,
								displayInterval: 3000,
								transitionStyle: 'fading',
								transitionDuration: 500,
								hideAllContentsFirst: false,
								triggersOnTop: true,
								shuffle: false,
								enableSwipe: true,
								resumeAutoplay: true,
								resumeAutoplayInterval: 3000,
								playOnce: false,
								autoActivate_runtime: false,
								isResponsive: false
							} );
						} ); /* #pamphletu11080 */
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
	<script src="scripts/require.js?crc=7928878" type="text/javascript" async data-main="scripts/museconfig.js?crc=310584261" onload="if (requirejs) requirejs.onError = function(requireType, requireModule) { if (requireType && requireType.toString && requireType.toString().indexOf && 0 <= requireType.toString().indexOf('#scripterror')) window.Muse.assets.check(); }" onerror="window.Muse.assets.check();"></script>
	<script>
		var te = "<?php echo $_SESSION['user_role'];?>";
		if(te!="student"){
			window.location.href = './admin-panel';
		}
	</script>
</body>
</html>