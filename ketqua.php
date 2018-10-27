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
			"required": [ "museutils.js", "museconfig.js", "webpro.js", "musewpslideshow.js", "jquery.museoverlay.js", "touchswipe.js", "jquery.musepolyfill.bgsize.js", "jquery.watch.js", "jquery.musemenu.js", "require.js", "ketqua.css" ],
			"outOfDate": []
		};
	</script>

	<title>ketqua</title>
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="css/site_global.css?crc=444006867"/>
	<link rel="stylesheet" type="text/css" href="css/master_a-master.css?crc=107776024"/>
	<link rel="stylesheet" type="text/css" href="css/ketqua.css?crc=4263642631" id="pagesheet"/>
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
			<?php include('./temp/header.php'); ?>
			<?php
			$id = $_GET[ 'id' ];
			require( "./lib/dbcon.php" );
			$sql = "select * from exam where exam_id = '$id' ";
			$query = mysqli_query( $conn, $sql );
			$data = mysqli_fetch_array( $query, MYSQLI_ASSOC );
			?>
			<div class="rounded-corners clearfix colelem" id="u9044">
				<!-- group -->
				<div class="clearfix grpelem" id="u9045-4">
					<!-- content -->
					<p>KẾT QUẢ</p>
				</div>
			</div>
			<div class="rgba-background rounded-corners clearfix colelem" id="u9043">
				<!-- group -->
				<div class="clearfix grpelem" id="ppu9102">
					<!-- column -->
					<div class="clearfix colelem" id="pu9102">
						<!-- group -->
						<div class="clip_frame grpelem" id="u9102">
							<!-- image -->
							<img class="block" id="u9102_img" src="<?php echo $_SESSION['user_img'] ?>" alt="" width="111" height="110"/>
						</div>
						<div class="clearfix grpelem" id="u12993-6">
							<!-- content -->
							<p id="u12993-2"><?php echo $_SESSION['user_name'] ?></p>
							<p id="u12993-4"><?php echo $_SESSION['user_school'] ?> - <?php echo $_SESSION['user_address'] ?></p>
						</div>
					</div>
					<div class="clearfix colelem" id="u9123-4">
						<!-- content -->
						<p><?php echo $_SESSION['point']*10/50 ?>/10</p>
					</div>
					<div class="clearfix colelem" id="pbuttonu9084">
						<!-- group -->
						<a class="Button rounded-corners clearfix grpelem" id="buttonu9084" href="xemdapan.php?id=<?php echo $id?>">
							<!-- container box -->
							<div class="clearfix grpelem" id="u9085-4">
								<!-- content -->
								<p>Xem đáp án</p>
							</div>
						</a>
						<a class="nonblock nontext Button rounded-corners clearfix grpelem" id="buttonu9090" href="thi.php?id=<?php echo $id?>">
							<!-- container box -->
							<div class="clearfix grpelem" id="u9091-4">
								<!-- content -->
								<p>Làm lại</p>
							</div>
						</a>
					</div>
				</div>
				<div class="grpelem" id="u9142">
					<!-- simple frame -->
				</div>
				<div class="clearfix grpelem" id="pu9046-4">
					<!-- column -->
					<div class="clearfix colelem" id="u9046-4">
						<!-- content -->
						<p>MÔN: <?php echo $data['subject']?></p>
					</div>
					<div class="clearfix colelem" id="u9047-4">
						<!-- content -->
						<p><?php echo $data['exam_name'] ?></p>
					</div>
					<div class="clearfix colelem" id="pu9048-6">
						<!-- group -->
						<div class="clearfix grpelem" id="u9048-6">
							<!-- content -->
							<p>Tổng thời gian làm bài:</p>
							<p>Số đáp án đúng : </p>
						</div>
						<div class="clearfix grpelem" id="u9071-6">
							<!-- content -->
							<p><?php echo $data['time']?> phút</p>
							<p><?php echo $_SESSION['point'] ?>/50</p>
						</div>
					</div>
					<?php
					
					$sql = "INSERT INTO `record` (`record_id`, `idStudent`, `idExam`, `key_dalam`, `exam_date`) VALUES (NULL, '".$_SESSION['user_id']."', '".$_GET['id']."', '".$_SESSION['s_ans']."', CURRENT_TIME())";
					$conn->query($sql);					
					?>
					<a class="nonblock nontext museBGSize colelem" id="u9131" href="http://fb.com">
						<!-- content -->
					</a>
				</div>
			</div>
		</div>
		<div class="verticalspacer" data-offset-top="624" data-content-above-spacer="623" data-content-below-spacer="240"></div>
		<?php include('./temp/footer.php'); ?>
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