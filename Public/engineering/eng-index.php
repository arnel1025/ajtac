<?php
require_once ('../../private/initialize.php');

require_login();

$page_title = h('Engineering Page');
include (Shared_Path.'/header.php');
?>


<div id="mainpagenav">
	<ul>
		<li><a class="pagenavtext" href="<?php echo url_for('main-index.php'); ?>" > Home / Log-out </a></li>
		<li><a class="pagenavtext" href="<?php echo url_for('/engineering/dwg/dwg-index.php'); ?>" >	Drawings 	</a></li>
		<li><a class="pagenavtext" href="<?php echo url_for('/engineering/mat/mat-index.php'); ?>" >	Materials	</a></li>
		<li><a class="pagenavtext" href="<?php echo url_for('/engineering/disc/disc-index.php'); ?>" >	Discipline	</a></li>
	</ul>
</div>

<div id="mainpagecontent">

</div>


<?php
include (Shared_Path.'/footer.php');
?>
