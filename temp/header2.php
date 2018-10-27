<?php


require( "./lib/dbcon.php" );
$sql = "select * from news ORDER BY `news_posted_day` DESC";
$query = mysqli_query( $conn, $sql );
$news = array();
$i = 0;
while ( $i < 4 ) {
	$data = mysqli_fetch_array( $query, MYSQLI_ASSOC );
	array_push( $news, $data );
	$i++;
}

$active = "MuseMenuActive";
$active_home = "";
$active_contest = "";
$active_news = "";
$curURL = $_SERVER[ "SCRIPT_NAME" ];

switch ( $curURL ) {
	case "/home.php":
		$active_home = $active;
		break;
	case "/contest.php":
		$active_contest = $active;
		break;
	case "/news.php":
		$active_news = $active;
		break;
}
?>

<div class="clearfix colelem" id="pslideshowu3219">
	<!-- group -->
	
	<script>
		( function () {
			var cx = '010259629408776014477:cyvipjf1fyg';
			var gcse = document.createElement( 'script' );
			gcse.type = 'text/javascript';
			gcse.async = true;
			gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
			var s = document.getElementsByTagName( 'script' )[ 0 ];
			s.parentNode.insertBefore( gcse, s );
		} )();
	</script>

	<div class="SlideShowWidget clearfix HeroFillFrame grpelem" id="slideshowu3219">
		<!-- none box -->
		<div class="popup_anchor" id="u3237popup">
			<div class="SlideShowContentPanel clearfix" id="u3237">
				<!-- stack box -->
				<div class="SSSlide clip_frame grpelem" id="u3238">
					<!-- image -->
					<img class="ImageInclude" id="u3238_img" data-src="images/cactus.jpg?crc=491424337" src="images/blank.gif?crc=4208392903" alt="" data-width="1024" data-height="768"/>
				</div>
				<div class="SSSlide invi clip_frame grpelem" id="u3240">
					<!-- image -->
					<img class="ImageInclude" id="u3240_img" data-src="images/road.jpg?crc=180693847" src="images/blank.gif?crc=4208392903" alt="" data-width="1024" data-height="768"/>
				</div>
				<div class="SSSlide invi clip_frame grpelem" id="u3242">
					<!-- image -->
					<img class="ImageInclude" id="u3242_img" data-src="images/trees.jpg?crc=4071309946" src="images/blank.gif?crc=4208392903" alt="" data-width="1024" data-height="768"/>
				</div>
			</div>
		</div>
	</div>
	<div class="browser_width grpelem" id="u2818-bw">
		<div class="museBGSize" id="u2818">
			<!-- simple frame -->
		</div>
	</div>
	<div class="clip_frame grpelem" id="u2827">
		<!-- image -->
		<img class="block" id="u2827_img" src="images/home-vector%20smart%20objectc.png?crc=4228036174" alt="" width="163" height="157"/>
	</div>
	<div class="clip_frame grpelem" id="u2829">
		<!-- image -->
		<img class="block" id="u2829_img" src="images/home-logo-01c.png?crc=3806784294" alt="" width="75" height="87"/>
	</div>
	<div class="clearfix grpelem" id="u12986">
					<!-- group -->
					<div class="clearfix grpelem" id="u10419">
						<!-- group -->
						<div class="clip_frame grpelem" id="u10434">
							<!-- image -->
							<img class="block" id="u10434_img" src="images/home-vector%20smart%20objectc2.png?crc=420441850" alt="" width="360" height="97">
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

	<nav class="MenuBar clearfix grpelem" id="menuu2845">
		<!-- horizontal box -->
		<div class="MenuItemContainer clearfix grpelem" id="u2860">
			<!-- vertical box -->
			<a class="nonblock nontext MenuItem MenuItemWithSubMenu <?php echo $active_home?> rounded-corners clearfix colelem" id="u2861" href="home.php">
				<!-- horizontal box --><img class="MenuItemLabel NoWrap grpelem" id="u2862" alt="Trang chủ" src="images/blank.gif?crc=4208392903"/>
				<!-- state-based BG images -->
			</a>
		</div>
		<div class="MenuItemContainer clearfix grpelem" id="u2846">
			<!-- vertical box -->
			<a class="nonblock nontext MenuItem MenuItemWithSubMenu <?php echo $active_contest?> rounded-corners clearfix colelem" id="u2847" href="contest.php?subject=0">
				<!-- horizontal box --><img class="MenuItemLabel NoWrap grpelem" id="u2850" alt="Thi thử" src="images/blank.gif?crc=4208392903"/>
				<!-- state-based BG images -->
			</a>
		</div>
		<div class="MenuItemContainer clearfix grpelem" id="u2867">
			<!-- vertical box -->
			<a class="nonblock nontext MenuItem MenuItemWithSubMenu <?php echo $active_news?> rounded-corners clearfix colelem" id="u2868" href="news.php">
				<!-- horizontal box --><img class="MenuItemLabel NoWrap grpelem" id="u2870" alt="Tin tức" src="images/blank.gif?crc=4208392903"/>
				<!-- state-based BG images -->
			</a>
		</div>
	</nav>
</div>
<div class="clearfix colelem" id="u4485">
	<!-- group -->
	<div class="clip_frame grpelem" id="u4486">
		<!-- image -->
		<img class="block" id="u4486_img" src="images/home-vector%20smart%20objectc5.png?crc=3769940376" alt="" width="25" height="26"/>
	</div>
	<div class="clearfix grpelem" id="u4488-4">
		<!-- content -->
		<p id="hotnews">Bỏ thủ tục công nhận bằng, chứng chỉ của các cơ sở giáo dục nghề nghiệp nước ngoài</p>
	</div>
	<script>
		function writeNext( i ) {
			var data = {
				da: i
			}
			$.post( './function/hotnews.php', data, function ( res ) {
				document.getElementById( "hotnews" ).innerHTML = res;
			} )


			if ( i == 3 )
				i = -1;

			setTimeout( function () {
				writeNext( i + 1 );

			}, 5000 );
		}

		writeNext( 0 );
	</script>
</div>