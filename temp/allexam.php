<div class="clearfix colelem" id="pu14651-4">
	<!-- group -->
	<div class="rounded-corners clearfix grpelem" id="u14651-4">
		<!-- content -->
		<p>BXH THÀNH VIÊN</p>
	</div>
	<div class="rounded-corners clearfix grpelem" id="u13685">
		<!-- group -->
		<div class="grpelem" id="u13688">
			<!-- custom html -->
			<input name="name" type="text" placeholder="Tìm kiếm đề thi" required>
		</div>
		<div class="clip_frame grpelem" id="u13706">
			<!-- image -->
			<img class="block" id="u13706_img" src="images/home-vector%20smart%20objectc4.png?crc=3847938173" alt="" width="23" height="23"/>
		</div>
	</div>
</div>
<div class="clearfix colelem" id="ppu14641">
	<!-- group -->
	<div class="clearfix grpelem" id="pu14641">
		<!-- column -->
		<?php
		include( './function/bxh.php' );
		//$bxh = $_SESSION['bxhs'];
		for ( $i = 0; $i < 5; $i++ ) {
			?>
		<div class="clearfix colelem" id="u14646">
			<!-- group -->
			<div class="pointer_cursor clearfix grpelem" id="u14650">
				<!-- group -->
				<a class="block" href="./blank.php?bxhMember=<?php echo $bxh[$i]['user_id'] ?>">
					<!-- Block link tag -->
				</a>
				<a class="nonblock nontext clip_frame grpelem" id="u14647" href="./blank.php?bxhMember=<?php echo $bxh[$i]['user_id'] ?>">
					<!-- image --><img class="block" id="u14647_img" src="./admin-panel/imagesOfUsers/<?php echo $bxh[$i]['user_img'] ?>" alt="" width="73" height="73"/>
				</a>
				<a class="nonblock nontext clearfix grpelem" id="u14649-6" href="./blank.php?bxhMember=<?php echo $bxh[$i]['user_id'] ?>">
					<!-- content -->
					<p id="u14649-2">
						<?php echo $bxh[$i]['user_name']; ?>
					</p>
					<p id="u14649-4">
						<?php echo $bxh[$i][0]; ?>
					</p>
				</a>
			</div>
		</div>
		<?php }?>
	</div>
	<?php

	require( "./lib/dbcon.php" );
	$sql = "select * from exam ORDER BY `exam`.`exam_id` DESC";
	$query = mysqli_query( $conn, $sql );
	$data = mysqli_fetch_array( $query, MYSQLI_ASSOC );

	//TÌM TỔNG SỐ RECORDS
	$result = mysqli_query( $conn, 'select count(exam_id) as total from exam' );
	$row = mysqli_fetch_assoc( $result );
	$total_records = $row[ 'total' ];

	//TÌM LIMIT VÀ CURRENT_PAGE
	$current_page = isset( $_GET[ 'page' ] ) ? $_GET[ 'page' ] : 1;
	$limit = 5;

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
	$result = mysqli_query( $conn, "SELECT * FROM exam ORDER BY `exam`.`exam_id` DESC LIMIT $start, $limit " );
	?>

	<div class="clearfix grpelem" id="u13517">
		<table>
			<?php while ($data = mysqli_fetch_assoc($result)){
						switch ($data['subject']){
							case "Toán học": 
								$mau = "#FF0000";
								break;
							case "Ngoại ngữ":
								$mau = "#0000FF";
								break;
							case "Vật lý":
								$mau = "#EE1289";
								break;
							case "Sinh học":
								$mau = "#228B22";
								break;
							case "Hóa học":
								$mau = "#8B008B";
								break;
							default:
								$mau = "#FF7F00";
						}
				?>
			<tr>
				<td style="padding: 8px">
					<div class="rounded-corners clearfix grpelem" id="u13524" style="border-color: <?php echo $mau?>">
						<!-- column -->
						<div class="clearfix colelem" id="pu13525">
							<!-- group -->
							<div class="clearfix grpelem" id="u13525">
								<!-- group -->
								<div class="rounded-corners grpelem" id="u13526" style="background-color:<?php echo $mau?>">
									<!-- simple frame -->
								</div>
								<div class="clearfix grpelem" id="u13527-4">
									<!-- content -->
									<p>
										<?php echo $data['subject']?>
									</p>
								</div>
							</div>
							<div class="clearfix grpelem" id="u13518-4">
								<!-- content -->
								<p>&nbsp; Năm
									<?php echo $data['year']?> |
									<?php echo $data['time']?> phút</p>
							</div>
						</div>
						<div class="clearfix colelem" id="u13521-4">
							<!-- content -->
							<p>
								<?php echo $data['exam_name']?> -
								<?php echo $data['subject'] ?>
							</p>
						</div>
						<div class="clearfix colelem" id="pbuttonu13522">
							<!-- group -->
							<a class="nonblock nontext Button rounded-corners clearfix grpelem" id="buttonu13522" href="xem-de.php?id=<?php echo $data['exam_id'] ?>">
								<!-- container box -->
								<div class="clearfix grpelem" id="u13523-4">
									<!-- content -->
									<p>Xem đề thi</p>
								</div>
							</a>
							<a class="nonblock nontext Button rounded-corners clearfix grpelem" id="buttonu13519" href="thi.php?id=<?php echo $data['exam_id'] ?>">
								<!-- container box -->
								<div class="clearfix grpelem" id="u13520-4">
									<!-- content -->
									<p>Bắt đầu thi</p>
								</div>
							</a>
						</div>
					</div>
					<p>.</p>
				</td>
			</tr>
			<?php }; ?>
			<tr>
				<td>
					<div class="pagination">
						<?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<p>.</p><a href="contest.php?subject=0&page='.($current_page-1).'">Prev</a> | ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="contest.php?subject=0&page='.$i.'">'.$i.'</a> | ';
                }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="contest.php?subject=0&page='.($current_page+1).'">Next</a> | ';
            }
           ?>
					</div>

				</td>
			</tr>
		</table>
		<!-- group -->

	</div>
</div>