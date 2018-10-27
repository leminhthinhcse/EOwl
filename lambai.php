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
			"required": [ "museutils.js", "museconfig.js", "webpro.js", "musewpslideshow.js", "jquery.museoverlay.js", "touchswipe.js", "jquery.musepolyfill.bgsize.js", "jquery.watch.js", "jquery.musemenu.js", "require.js", "lambai.css" ],
			"outOfDate": []
		};
	</script>

	<title>Làm bài</title>
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="css/site_global.css?crc=444006867"/>
	<link rel="stylesheet" type="text/css" href="css/master_a-master.css?crc=107776024"/>
	<link rel="stylesheet" type="text/css" href="css/lambai.css?crc=420830885" id="pagesheet"/>
	<link rel="stylesheet" href="css/style_btradio.css">
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
			<?php 
				$id = $_GET['id'];
				require("./lib/dbcon.php");
				$sql = "select * from exam where exam_id = '$id' ";
				$query = mysqli_query($conn,$sql);
				$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
			?>

			<div class="rounded-corners clearfix colelem" id="u8249">
				<!-- group -->
				<div class="clearfix grpelem" id="u8250-4">
					<!-- content -->
					<p>
						<?php echo $data['exam_name']?> -
						<?php echo $data['subject']?>
					</p>
				</div>
				<div class="clearfix grpelem" id="u8476">
					<!-- group -->
					<div class="rgba-background rounded-corners clearfix grpelem" id="u8473">
						<!-- group -->
						<div class="museBGSize grpelem" id="u8459">
							<!-- content -->
						</div>
						<div class="clearfix grpelem" id="u8470-4">
							<!-- content -->
							<span id="m">
								<?php echo $data['time'] ?>
							</span>:<span id="s">00</span>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix colelem" id="pu8248">
				<!-- group -->
				<div class="rgba-background rounded-corners clearfix grpelem" id="u8248">
					<!-- column -->
					<div class="colelem" id="u13716" style="width:100%;height:520px;overflow:auto">
						<!-- custom html -->
						<?php $i=1; do {
?>
						<div id="rb-<?php echo $i ?>" class="rb">
							<p class = "que"> <?php echo $i ?> </p>
							<div class="rb-tab" data-value="1">
								<div class="rb-spot">
									<span class="rb-txt">A</span>
								</div>
							</div>
							<div class="rb-tab" data-value="2">
								<div class="rb-spot">
									<span class="rb-txt">B</span>
								</div>
							</div>
							<div class="rb-tab" data-value="3">
								<div class="rb-spot">
									<span class="rb-txt">C</span>
								</div>
							</div>
							<div class="rb-tab" data-value="4">
								<div class="rb-spot">
									<span class="rb-txt">D</span>
								</div>
							</div>
							<div class="rb-tab rb-tab-active" data-value="5" style="display: none">
								<div class="rb-spot">
									<span class="rb-txt">E</span>
								</div>
							</div>
						</div>
						<?php $i = $i+1; } while ($i<=50);?>
					</div>
					<!--
					<div class="clearfix colelem" id="u8904-4">
						<p>TRẢ LỜI: 3/50</p>
					</div>
					-->
					<div class="button-box">
						<button class="button trigger">Nộp bài</button>
					</div>
					

					<style>
						.dung {
							color: white;
							background-color: green;
						}
						
						.sai {
							color: white;
							background-color: red;
						}
					</style>

					<script language="javascript">
						//Global:
						var arrAns = []; //Bidimensional array: [ [1,3], [2,4] ]

						//Switcher function:
						$( ".rb-tab" ).click( function () {
							//Spot switcher:
							$( this ).parent().find( ".rb-tab" ).removeClass( "rb-tab-active" );
							$( this ).addClass( "rb-tab-active" );
						} );

						//Save data:
						$( ".trigger" ).click( function () {
							//Empty array:
							arrAns = [];
							//Push data:
							for ( i = 1; i <= $( ".rb" ).length; i++ ) {
								var rb = "rb" + i;
								var rbValue = parseInt( $( "#rb-" + i ).find( ".rb-tab-active" ).attr( "data-value" ) );
								//Bidimensional array push:
								switch ( rbValue ) {
									case 1:
										rbValue = 'A';
										break;
									case 2:
										rbValue = 'B';
										break;
									case 3:
										rbValue = 'C';
										break;
									case 4:
										rbValue = 'D';
										break;
									case 5:
										rbValue = 'E';
										break;
								}
								arrAns.push( rbValue ); //Bidimensional array: [ [1,3], [2,4] ]

							};
							//Debug:
							var data = {
								arrAns
							}
							var point = 0;
							if ( arrAns.length < 50 ) sweetAlert( "Lỗi", "Bạn phải chọn hết các đáp án!", "error" )
							else {
								$.post( './function/checkans.php?id=<?php echo $id?>', data, function ( res ) {
									res = JSON.parse( res );

									if ( !res.code ) {
										var i;
										for ( i = 0; i < 50; i++ ) {
											if ( res.data[ i ] ) {
												$( '#' + i ).addClass( 'dung' );
												point++;
											} else $( '#' + i ).addClass( 'sai' );
										}


									} else {
										sweetAlert( "Lỗi", "Lỗi khi kiểm tra đáp án! Vui lòng báo cho admin!", "error" );
									}

								} );
								swal( "Nộp bài!", "Đang chấm điểm...", "success" );
								window.location.href = './ketqua.php?id=<?php echo $id?>';
							}
						} );




						function checkdapan() {
							var arrAns = $( "form" ).find( "input[type='radio']:checked" ).toArray().map( v => $( v ).val() );
							var data = {
								arrAns
							}
							var point = 0;
							if ( arrAns.length < 50 ) sweetAlert( "Lỗi", "Bạn phải chọn hết các đáp án!", "error" )
							else {
								$.post( './function/checkans.php?id=<?php echo $id?>', data, function ( res ) {
									res = JSON.parse( res );

									if ( !res.code ) {
										var i;
										for ( i = 0; i < 50; i++ ) {
											if ( res.data[ i ] ) {
												$( '#' + i ).addClass( 'dung' );
												point++;
											} else $( '#' + i ).addClass( 'sai' );
										}


									} else {
										sweetAlert( "Lỗi", "Lỗi khi kiểm tra đáp án! Vui lòng báo cho admin!", "error" );
									}

								} );
								swal( "Nộp bài!", "Đang chấm điểm...", "success" );
								window.location.href = './ketqua.php?id=<?php echo $id?>';
							}
						}

						var h = 0; // Giờ
						var m = <?php echo $data['time'] ?>; // Phút
						var s = 0; // Giây

						var timeout = null; // Timeout

						function start() {
							/*BƯỚC 1: LẤY GIÁ TRỊ BAN ĐẦU*/
							if ( m === null ) {
								//h = parseInt(document.getElementById('h_val').value);
								m = parseInt( document.getElementById( 'm_val' ).value );
								s = parseInt( document.getElementById( 's_val' ).value );
							}

							/*BƯỚC 1: CHUYỂN ĐỔI DỮ LIỆU*/
							// Nếu số giây = -1 tức là đã chạy ngược hết số giây, lúc này:
							//  - giảm số phút xuống 1 đơn vị
							//  - thiết lập số giây lại 59
							if ( s === -1 ) {
								m -= 1;
								s = 59;
							}

							// Nếu số phút = -1 tức là đã chạy ngược hết số phút, lúc này:
							//  - giảm số giờ xuống 1 đơn vị
							//  - thiết lập số phút lại 59
							if ( m === -1 ) {
								h -= 1;
								m = 59;
							}

							// Nếu số giờ = -1 tức là đã hết giờ, lúc này:
							//  - Dừng chương trình
							if ( h == -1 ) {
								clearTimeout( timeout );
								alert( 'Hết giờ' );
								checkdapan();
								return false;
							}

							/*BƯỚC 1: HIỂN THỊ ĐỒNG HỒ*/
							//document.getElementById('h').innerText = h.toString();
							document.getElementById( 'm' ).innerText = m.toString();
							document.getElementById( 's' ).innerText = s.toString();

							/*BƯỚC 1: GIẢM PHÚT XUỐNG 1 GIÂY VÀ GỌI LẠI SAU 1 GIÂY */
							timeout = setTimeout( function () {
								s--;
								start();
							}, 1000 );
						}

						function stop() {
							clearTimeout( timeout );
						}
						start();
					</script>
				</div>
				<div class="grpelem" id="u8479">
					<!-- custom html -->
					<iframe src="./admin-panel/pdfOfExam/<?php echo $data['link_de']?>" height=585px width=100%></iframe >
     </div>
    </div>
   </div>
   <div class="verticalspacer" data-offset-top="888" data-content-above-spacer="887" data-content-below-spacer="240"></div>
   <?php include('./temp/footer.php'); ?>
  </div>
  
  <!-- Other scripts -->
  <script type="text/javascript">
   // Decide whether to suppress missing file error or not based on preference setting
var suppressMissingFileError = false
</script>
  <script type="text/javascript">
   window.Muse.assets.check=function(c){if(!window.Muse.assets.checked){window.Muse.assets.checked=!0;var b={},d=function(a,b){if(window.getComputedStyle){var c=window.getComputedStyle(a,null);return c&&c.getPropertyValue(b)||c&&c[b]||""}if(document.documentElement.currentStyle)return(c=a.currentStyle)&&c[b]||a.style&&a.style[b]||"";return""},a=function(a){if(a.match(/^rgb/))return a=a.replace(/\s+/g,"").match(/([\d\,]+)/gi)[0].split(","),(parseInt(a[0])<<16)+(parseInt(a[1])<<8)+parseInt(a[2]);if(a.match(/^\#/))return parseInt(a.substr(1),
16);return 0},f=function(f){for(var g=document.getElementsByTagName("link"),j=0;j<g.length;j++)if("text/css"==g[j].type){var l=(g[j].href||"").match(/\/?css\/([\w\-]+\.css)\?crc=(\d+)/);if(!l||!l[1]||!l[2])break;b[l[1]]=l[2]}g=document.createElement("div");g.className="version";g.style.cssText="display:none; width:1px; height:1px;";document.getElementsByTagName("body")[0].appendChild(g);for(j=0;j<Muse.assets.required.length;){var l=Muse.assets.required[j],k=l.match(/([\w\-\.]+)\.(\w+)$/),i=k&&k[1]?
k[1]:null,k=k&&k[2]?k[2]:null;switch(k.toLowerCase()){case "css":i=i.replace(/\W/gi,"_").replace(/^([^a-z])/gi,"_$1");g.className+=" "+i;i=a(d(g,"color"));k=a(d(g,"backgroundColor"));i!=0||k!=0?(Muse.assets.required.splice(j,1),"undefined"!=typeof b[l]&&(i!=b[l]>>>24||k!=(b[l]&16777215))&&Muse.assets.outOfDate.push(l)):j++;g.className="version";break;case "js":j++;break;default:throw Error("Unsupported file type: "+k);}}c?c().jquery!="1.8.3"&&Muse.assets.outOfDate.push("jquery-1.8.3.min.js"):Muse.assets.required.push("jquery-1.8.3.min.js");
g.parentNode.removeChild(g);if(Muse.assets.outOfDate.length||Muse.assets.required.length)g="Some files on the server may be missing or incorrect. Clear browser cache and try again. If the problem persists please contact website author.",f&&Muse.assets.outOfDate.length&&(g+="\nOut of date: "+Muse.assets.outOfDate.join(",")),f&&Muse.assets.required.length&&(g+="\nMissing: "+Muse.assets.required.join(",")),suppressMissingFileError?(g+="\nUse SuppressMissingFileError key in AppPrefs.xml to show missing file error pop up.",console.log(g)):alert(g)};location&&location.search&&location.search.match&&location.search.match(/muse_debug/gi)?
setTimeout(function(){f(!0)},5E3):f()}};
var muse_init=function(){require.config({baseUrl:""});require(["jquery","museutils","whatinput","webpro","musewpslideshow","jquery.museoverlay","touchswipe","jquery.watch","jquery.musemenu","jquery.musepolyfill.bgsize"],function(c){var $ = c;$(document).ready(function(){try{
window.Muse.assets.check($);/* body */
Muse.Utils.transformMarkupToFixBrowserProblemsPreInit();/* body */
Muse.Utils.prepHyperlinks(true);/* body */
Muse.Utils.resizeHeight('.browser_width');/* resize height */
Muse.Utils.requestAnimationFrame(function() { $('body').addClass('initialized'); });/* mark body as initialized */
Muse.Utils.makeButtonsVisibleAfterSettingMinWidth();/* body */
Muse.Utils.initWidget('#slideshowu3219', ['#bp_infinity'], function(elem) { var widget = new WebPro.Widget.ContentSlideShow(elem, {autoPlay:true,displayInterval:3500,slideLinkStopsSlideShow:false,transitionStyle:'fading',lightboxEnabled_runtime:false,shuffle:false,transitionDuration:500,enableSwipe:true,elastic:'fullWidth',resumeAutoplay:true,resumeAutoplayInterval:3000,playOnce:false,autoActivate_runtime:false,isResponsive:false}); $(elem).data('widget', widget); return widget; });/* #slideshowu3219 */
Muse.Utils.initWidget('.MenuBar', ['#bp_infinity'], function(elem) { return $(elem).museMenu(); });/* unifiedNavBar */
Muse.Utils.fullPage('#page');/* 100% height page */
Muse.Utils.showWidgetsWhenReady();/* body */
Muse.Utils.transformMarkupToFixBrowserProblems();/* body */
}catch(b){if(b&&"function"==typeof b.notify?b.notify():Muse.Assert.fail("Error calling selector function: "+b),false)throw b;}})})};

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