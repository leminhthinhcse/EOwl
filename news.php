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
			"required": [ "museutils.js", "museconfig.js", "webpro.js", "musewpslideshow.js", "jquery.museoverlay.js", "touchswipe.js", "jquery.musepolyfill.bgsize.js", "jquery.watch.js", "jquery.musemenu.js", "require.js", "tin-t_c.css" ],
			"outOfDate": []
		};
	</script>

	<title>Tin tức</title>
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="css/site_global.css?crc=444006867"/>
	<link rel="stylesheet" type="text/css" href="css/master_a-master.css?crc=107776024"/>
	<link rel="stylesheet" type="text/css" href="css/tin-t_c.css?crc=121899037" id="pagesheet"/>
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
			<?php
			session_start();
if ( isset( $_SESSION[ 'user_name' ] ) ) {
	include( './temp/header1.php' );
} else {
	include( './temp/header2.php' );
}

			require( "./lib/dbcon.php" );

			//TÌM TỔNG SỐ RECORDS
			$result = mysqli_query( $conn, 'select count(news_id) as total from news' );
			$row = mysqli_fetch_assoc( $result );
			$total_records = $row[ 'total' ];

			//TÌM LIMIT VÀ CURRENT_PAGE
			$current_page = isset( $_GET[ 'page' ] ) ? $_GET[ 'page' ] : 1;
			$limit = 10;

			// tổng số trang
			$total_page = ceil( $total_records / $limit );

			// Giới hạn current_page trong khoảng 1 đến total_page
			if ( $current_page > $total_page ) {
				$current_page = $total_page;
			} else if ( $current_page < 1 ) {
				$current_page = 1;
			}

			// Tìm Start
			$start = ( $current_page - 1 ) * $limit;

			// Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
			$result = mysqli_query( $conn, "SELECT * FROM news ORDER BY `news`.`news_id` DESC LIMIT $start, $limit" );
			?>

			<div class="clearfix colelem" id="u14681">
				<!-- group -->
				<table>
					<?php while ($data = mysqli_fetch_assoc($result)){
				?>
					<tr>
						<td style="padding: 8px">
							<div class="clearfix grpelem" id="pu13801">
								<!-- column -->
								<a class="nonblock nontext museBGSize rounded-corners colelem" id="u13801" href="<?php echo $data['news_link']?>" target="_blank" style="background-image: url(./admin-panel/imagesOfNews/<?php echo $data['news_image']?>)">
									<!-- simple frame -->
								</a>
								<a class="nonblock nontext colelem" id="u13822" href="<?php echo $data['news_link']?>" target="_blank">
									<!-- simple frame -->
								</a>
							</div>
							<a class="nonblock nontext clearfix grpelem" id="u13800-6" href="<?php echo $data['news_link']?>" target="_blank">
								<!-- content -->
								<p id="u13800-2"><?php echo $data['news_tittle']?></p>
								<p id="u13800-4"><?php echo $data['news_summarized_content']?></p>
							</a>
						</td>
					</tr>
					<?php }?>
					<tr>
						<td>
							<?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<p>.       </p><a href="news.php?page='.($current_page-1).'">Prev</a> | ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="news.php?page='.$i.'">'.$i.'</a> | ';
                }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="news.php?page='.($current_page+1).'">Next</a> | ';
            }
           ?>
						</td>
					</tr>
				</table>

			</div>
		</div>
		<div class="verticalspacer" data-offset-top="396" data-content-above-spacer="395" data-content-below-spacer="239"></div>
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