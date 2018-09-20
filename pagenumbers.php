

<?php
echo '
<script>
    function append_page(number) {
        var seperator = (window.location.href.indexOf("?") === -1) ? "?" : "&";
		var url = window.location.href.substring(0, window.location.href.indexOf("&page="));
        window.location.href = url + seperator + "page=" + number + "";
    }
</script>';
echo '<div id="pagenumbers">';

if ($pages >= 6) {
	for ($i = 0; $i < ($pages / 6); $i++) {
		echo '<a onclick="append_page('.($i + 1).')">'.($i + 1).'</a>';
		if (($i + 1) < ($pages / 6))
			echo ', ';
	}
} else
	echo '<a onclick="append_page(1)">1</a>';
echo '</div>';
?>
