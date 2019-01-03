<?php
require_once ('../../../private/initialize.php');
require_login();
$page_title = h('Engineering - Discipline Page');
include (Shared_Path.'/header.php');

$class_set = find_class();
?>

<ul>
	<li> <a href=" <?php echo url_for('engineering/eng-index.php'); ?>">Main</a> </li>
</ul>

<div id="content">
	<h1>Class Listing</h1>
	<table class="Tableclass">
		<tr class="Tableclass">
			<th class="tablehead">
			<?php while($class = mysqli_fetch_assoc($class_set)) { ?>
			<?php echo $class['code'] . " - " . $class['name'];?> </br>
				<table class="Tableclass">
					<tr class="Tableclass">
						<th class="tablerefhead">Reference</th>
						<th class="tablenamehead">Name</th>
					</tr>
					<?php $code = $class['code']; ?>
					<?php $dwg_set = find_dwg_class($code); ?>
					<?php $mat_set = find_mat_class($code); ?>
					<?php while ($dwg = mysqli_fetch_assoc($dwg_set)) { ?>
					<tr>
						<td><?php echo h($dwg['Dwg_ref']); ?></td>
						<td><?php echo h($dwg['Dwg_name']); ?></td>
					</tr>
					<?php } ?>
					<?php while ($mat = mysqli_fetch_assoc($mat_set)) { ?>
					<tr>
						<td><?php echo h($mat['Mat_ref']); ?></td>
						<td><?php echo h($mat['Mat_name']); ?></td>
					</tr>
					<?php } ?>
				</table>
			<?php } ?>
			</th>
		</tr>
	</table>
</div>


<?php
include (Shared_Path.'/footer.php');
?>
