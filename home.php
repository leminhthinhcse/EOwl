
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
			"required": [ "museutils.js", "museconfig.js", "webpro.js", "musewpslideshow.js", "jquery.museoverlay.js", "touchswipe.js", "jquery.musepolyfill.bgsize.js", "jquery.watch.js", "jquery.musemenu.js", "require.js", "trang-ch_.css" ],
			"outOfDate": []
		};
	</script>

	<title>Trang chủ</title>
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="css/site_global.css?crc=444006867"/>
	<link rel="stylesheet" type="text/css" href="css/master_a-master.css?crc=107776024"/>
	<link rel="stylesheet" type="text/css" href="css/trang-ch_.css?crc=3792571027" id="pagesheet"/>
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

			<?php include('./temp/eo-news.php') ?>

			<div class="clearfix colelem" id="pu14337">
				<!-- group -->
				<div class="clearfix grpelem" id="u14337">
					<!-- column -->
					<a class="nonblock nontext clip_frame colelem" id="u14276" href="./contest.php?subject=1">
						<!-- image --><img class="block" id="u14276_img" src="images/study-paper-512.png?crc=3947158587" alt="" width="150" height="150"/>
					</a>
					<a class="nonblock nontext clearfix colelem" id="u14286-4" href="./contest.php?subject=1">
						<!-- content -->
						<p>TOÁN</p>
					</a>
				</div>
				<div class="clearfix grpelem" id="u14340">
					<!-- column -->
					<a class="nonblock nontext clip_frame colelem" id="u14301" href="./contest.php?subject=2">
						<!-- image --><img class="block" id="u14301_img" src="images/43-512.png?crc=3772689760" alt="" width="150" height="150"/>
					</a>
					<a class="nonblock nontext clearfix colelem" id="u14311-4" href="./contest.php?subject=2">
						<!-- content -->
						<p>NGOẠI NGỮ</p>
					</a>
				</div>
				
			</div>
			
			<div class="clearfix colelem" id="pu14346">
				<!-- group -->
				<div class="clearfix grpelem" id="u14346">
					<!-- column -->
					<a class="nonblock nontext clip_frame colelem" id="u14324" href="./contest.php?subject=3">
						<!-- image --><img class="block" id="u14324_img" src="images/024-512.png?crc=3996720679" alt="" width="150" height="150"/>
					</a>
					<a class="nonblock nontext clearfix colelem" id="u14334-4" href="./contest.php?subject=3">
						<!-- content -->
						<p>VẬT LÝ</p>
					</a>
				</div>
				<div class="clearfix grpelem" id="u14343">
					<!-- column -->
					<a class="nonblock nontext clip_frame colelem" id="u14263" href="./contest.php?subject=4">
						<!-- image --><img class="block" id="u14263_img" src="images/lab-512.png?crc=198901959" alt="" width="150" height="150"/>
					</a>
					<a class="nonblock nontext clearfix colelem" id="u14273-4" href="./contest.php?subject=4">
						<!-- content -->
						<p>HÓA HỌC</p>
					</a>
				</div>
				<div class="clearfix grpelem" id="u14349">
					<!-- column -->
					<a class="nonblock nontext clip_frame colelem" id="u14350" href="./contest.php?subject=5">
						<!-- image --><img class="block" id="u14350_img" src="images/dna_helix_medicine_hospital_healthcare_health-512.png?crc=4194736473" alt="" width="150" height="150"/>
					</a>
					<a class="nonblock nontext clearfix colelem" id="u14352-4" href="./contest.php?subject=5">
						<!-- content -->
						<p>SINH HỌC</p>
					</a>
				</div>
			</div>
			<div class="clearfix grpelem" id="u14637">
					<!-- column -->
					<div class="rounded-corners clearfix colelem" id="u14174-4">
						<!-- content -->
						<p>BXH THÀNH VIÊN</p>
					</div>
				<?php 
	include('./function/bxh.php');
	//$bxh = $_SESSION['bxhs'];
	for($i=0;$i<5;$i++){ ?>
					<div class="clearfix colelem" id="u14215">
						<!-- group -->
						
						<div class="pointer_cursor clearfix grpelem" id="u14218">
							<!-- group -->
							<a class="block" href="./blank.php?bxhMember=<?php echo $bxh[$i]['user_id'] ?>">
								<!-- Block link tag -->
							</a>
							<a class="nonblock nontext clip_frame grpelem" id="u14216" href="./blank.php?bxhMember=<?php echo $bxh[$i]['user_id'] ?>">
								<!-- image --><img class="block" id="u14216_img" src="./admin-panel/imagesOfUsers/<?php echo $bxh[$i]['user_img'] ?>" alt="" width="73" height="73"/>
							</a>
							<a class="nonblock nontext clearfix grpelem" id="u14219-6" href="./blank.php?bxhMember=<?php echo $bxh[$i]['user_id'] ?>">
								<!-- content -->
								<p id="u14219-2"><?php echo $bxh[$i]['user_name']; ?></p>
								<p id="u14219-4"><?php echo $bxh[$i][0]; ?></p>
							</a>
						</div>
						
					</div>
				<?php }?>
				</div>
		</div>
		<div class="verticalspacer" data-offset-top="955" data-content-above-spacer="955" data-content-below-spacer="240"></div>
		<?php include('./temp/footer.php') ?>
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
			require( [ "jquery", "museutils", "whatinput", "webpro", "musewpslideshow", "jquery.museoverlay", "touchswipe", "jquery.musepolyfill.bgsize", "jquery.watch", "jquery.musemenu" ], function ( c ) {
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
</body>
</html>