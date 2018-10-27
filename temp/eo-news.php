<div class="clearfix colelem" id="pu2273">
				<!-- group -->
				<div class="clearfix grpelem" id="u2273">
					<!-- group -->
					<div class="clip_frame grpelem" id="u2133">
						<!-- image -->
						<img class="block" id="u2133_img" src="/admin-panel/imagesOfNews/<?php echo $news[3]['news_image'] ?>" alt="" width="261" height="251"/>
					</div>
					<div class="clip_frame grpelem" id="u2126">
						<!-- image -->
						<img class="block" id="u2126_img" src="images/home-rectangle%204c.png?crc=240730431" alt="" width="263" height="253"/>
					</div>
					<a class="nonblock nontext clearfix grpelem" id="u2276-4" href="<?php echo $news[3]['news_link'] ?>" target="_blank">
						<!-- content -->
						<p>
							<?php echo $news[3]['news_posted_day'] ?>
						</p>
					</a>
					<a class="nonblock nontext clearfix grpelem" id="u2277-4" href="<?php echo $news[3]['news_link'] ?>" target="_blank">
						<!-- content -->
						<p>
							<?php 
	if (strlen($news[3]['news_tittle'])>81) {
		echo substr($news[3]['news_tittle'],0,81)."...";
	} else {
		echo $news[3]['news_tittle'];
	}
	?>
						</p>
					</a>
				</div>
				<div class="clearfix grpelem" id="u2285">
					<!-- group -->
					<div class="clip_frame grpelem" id="u2175">
						<!-- image -->
						<img class="block" id="u2175_img" src="/admin-panel/imagesOfNews/<?php echo $news[1]['news_image'] ?>" alt="" width="317" height="202"/>
					</div>
					<div class="clip_frame grpelem" id="u2168">
						<!-- image -->
						<img class="block" id="u2168_img" src="images/home-rectangle%202c.png?crc=34283435" alt="" width="320" height="121"/>
					</div>
					<a class="nonblock nontext clearfix grpelem" id="u2319-4" href="<?php echo $news[1]['news_link'] ?>" target="_blank">
						<!-- content -->
						<p>
							<?php echo $news[1]['news_posted_day'] ?>
						</p>
					</a>
					<a class="nonblock nontext clearfix grpelem" id="u2320-4" href="<?php echo $news[1]['news_link'] ?>" target="_blank">
						<!-- content -->
						<p>
							<?php 
	if (strlen($news[1]['news_tittle'])>75) {
		echo substr($news[1]['news_tittle'],0,75)."...";
	} else {
		echo $news[1]['news_tittle'];
	}
	?>
						</p>
					</a>
				</div>
				<div class="clearfix grpelem" id="u2282">
					<!-- group -->
					<div class="clip_frame grpelem" id="u2154">
						<!-- image -->
						<img class="block" id="u2154_img" src="/admin-panel/imagesOfNews/<?php echo $news[2]['news_image'] ?>" alt="" width="319" height="134"/>
					</div>
					<div class="clip_frame grpelem" id="u2147">
						<!-- image -->
						<img class="block" id="u2147_img" src="images/home-rectangle%203c.png?crc=86971180" alt="" width="319" height="135"/>
					</div>
					<a class="nonblock nontext clearfix grpelem" id="u2325-4" href="<?php echo $news[2]['news_link'] ?>" target="_blank">
						<!-- content -->
						<p>
							<?php echo $news[2]['news_posted_day'] ?>
						</p>
					</a>
					<a class="nonblock nontext clearfix grpelem" id="u2326-4" href="<?php echo $news[2]['news_link'] ?>" target="_blank">
						<!-- content -->
						<p>
							<?php 
	if (strlen($news[2]['news_tittle'])>75) {
		echo substr($news[2]['news_tittle'],0,75)."...";
	} else {
		echo $news[2]['news_tittle'];
	}
	?>
						</p>
					</a>
				</div>
				<div class="clearfix grpelem" id="u2264">
					<!-- group -->
					<div class="clip_frame grpelem" id="u2112">
						<!-- image -->
						<img class="block" id="u2112_img" src="/admin-panel/imagesOfNews/<?php echo $news[0]['news_image'] ?>" alt="" width="289" height="252"/>
					</div>
					<div class="clip_frame grpelem" id="u2105">
						<!-- image -->
						<img class="block" id="u2105_img" src="images/home-rectangle%201c.png?crc=3778831559" alt="" width="291" height="254"/>
					</div>
					<a class="nonblock nontext clearfix grpelem" id="u2267-4" href="<?php echo $news[0]['news_link'] ?>" target="_blank">
						<!-- content -->
						<p>
							<?php echo $news[0]['news_posted_day'] ?>
						</p>
					</a>

					<a class="nonblock nontext clearfix grpelem" id="u2270-4" href="<?php echo $news[0]['news_link'] ?>" target="_blank">
						<!-- content -->

						<p>
							<?php 
	if (strlen($news[0]['news_tittle'])>75) {
	echo substr($news[0]['news_tittle'],0,75)."...";
	} else {
		echo $news[0]['news_tittle'];
	} 
	?>
						</p>
					</a>
				</div>
			</div>