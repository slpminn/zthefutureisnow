<?php  

echo "<h2>", the_title(), "</h2>";
			
echo "<div class='thumbnail-img'>",the_post_thumbnail('large'),"</div>";
/* Valid values for the_post_thumbnail hook:
 	thumbnail 		(150 x 150 hard cropped)
	medium  		(300 x 300 max height 300px)
	medium_large	(768 x 0 infinite height)
	large 			(1024 x 1024 max height 1024px)
	full 			Full resolution (original size uploaded) */

?>