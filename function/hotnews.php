<?php
$fi = $_POST['da'];
require( "../lib/dbcon.php" );
$sql = "select * from news ORDER BY `news_posted_day` DESC";
$query = mysqli_query( $conn, $sql );
$news = array();
$i = 0;
while ( $i < 4 ) {
	$data = mysqli_fetch_array( $query, MYSQLI_ASSOC );
	array_push( $news, $data );
	$i++;
}
if (strlen($news[$fi]['news_tittle'])>95) {
		echo substr($news[$fi]['news_tittle'],0,95)."...";
	} else {
		echo "<a class='nonblock nontext clearfix grpelem' href=".$news[$fi]['news_link']." target='_blank'>".$news[$fi]['news_tittle']."</a>";
	}
$conn->close();
?>