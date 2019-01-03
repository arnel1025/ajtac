<?php
require_once ('../../../private/initialize.php');
require_login();
$query_set = find_all_dwg();

$page_title = h('Engineering - Drawings Page');
include (Shared_Path.'/header.php');
?>

<ul>
	<li><a href="<?php echo url_for('engineering/eng-index.php'); ?>" >	Back to Engineering Main Page	</a></li>
</ul>

<div id="content">
	<h1> Drawings Listing</h1>

	<li><a href="<?php echo url_for('engineering/dwg/dwg-new.php'); ?>" >	Create New Entry	</a></li>
	<table class="Tableclass">
		<tr>
			<th>Dwg Discipline</th>
			<th>Dwg Reference</th>
			<th>Dwg Name</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>

		<?php while($dwg = mysqli_fetch_assoc($query_set)) { ?>
		<tr>
			<td class="colid"><?php echo h($dwg['Dwg_disc']); ?></td>
			<td class="colid"><?php echo h($dwg['Dwg_ref']); ?></td>
			<td><?php echo h($dwg['Dwg_name']); ?></td>
			<!--Link that pass the value of ID or any other value to the a second page (two form submission)
			Multiple values are separated by an &-->
			<td><a class="action" href="<?php echo url_for('/engineering/dwg/dwg-info.php?id='.h(u($dwg['id'])).
				   '&Dwg_disc='.h(u($dwg['Dwg_disc'])).
				   '&Dwg_ref='.h(u($dwg['Dwg_ref'])).
				   '&Dwg_name='.h(u($dwg['Dwg_name']))); ?>">View
				 </a>
			</td>
			<td><a class="action" href="<?php echo url_for('engineering/dwg/dwg-edit.php?id='.h(u($dwg['id'])).
				   '&Dwg_disc='.h(u($dwg['Dwg_disc'])).
				   '&Dwg_ref='.h(u($dwg['Dwg_ref'])).
				   '&Dwg_name='.h(u($dwg['Dwg_name']))); ?>">Edit</a></td>
			<td><a class="action" href="<?php echo url_for('engineering/dwg/dwg-delete.php?id='.h(u($dwg['id'])).
				   '&Dwg_disc='.h(u($dwg['Dwg_disc'])).
				   '&Dwg_ref='.h(u($dwg['Dwg_ref'])).
				   '&Dwg_name='.h(u($dwg['Dwg_name']))); ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>

</div>


<?php
mysqli_free_result($query_set);
include (Shared_Path.'/footer.php');
?>
