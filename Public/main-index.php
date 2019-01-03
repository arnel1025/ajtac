<?php
require_once ('../private/initialize.php');

unset($_SESSION['uname']);

$project_set = find_project();
$username = '';
$password = '';

include (Shared_Path.'/content.php');
include (Shared_Path.'/navcontent.php');

$page_title = h('Home Page');
include (Shared_Path.'/main-header.php');
?>

<div id="mainpagenav">
	<ul>
		<li><a class="pagenavtext" href="<?php echo url_for('engineering/eng-index.php'); ?>" >	Engineering Area	</a></li>
		<li><a class="pagenavtext" href="<?php echo url_for('Admin/admin-index.php'); ?>" >	Administrator Area	</a></li></br>

		<b class="pagenavtext" style="font-size:25px"> Project List </b> </br>
		</br>
		<?php while($project = mysqli_fetch_assoc($project_set))
		{ ?>
		<li class="pagenavtext" style="font-size:25px"><b> <?php echo $project['name'];?> </b></li>

			<?php $subproject_set = find_subproject($project['code']);
			while( $subproject = mysqli_fetch_assoc($subproject_set))
			{ ?>
			<li style="margin-left:50px;"><a class="pagenavtext" href=""> <?php echo $subproject['name'];?>	</a></li>
			<?php
			} ?>
		<?php
		} ?>
	</ul>
</div>

<div id="mainpagecontent">
	<div id="mall">
		<img class="gallery" src="<?php echo url_for("images/mall/Mall-1.jpg");?>" alt="<?php echo $MI01;?>" onclick="magnify(this);">
		<div id="mall1">
			<span><?php echo $SP01;?></span>
		</div>
		<img class="gallery" src="<?php echo url_for("images/mall/Mall-2.jpg");?>" alt="<?php echo $MI02;?>"  onclick="magnify(this);">
		<div id="mall2">
			<span><?php echo $SP02;?></span>
		</div>
		<img class="gallery" src="<?php echo url_for("images/mall/Mall-3.jpg");?>" alt="<?php echo $MI03;?>"  onclick="magnify(this);">
		<div id="mall3">
			<span><?php echo $SP03;?></span>
		</div>
		<img class="gallery" src="<?php echo url_for("images/mall/Mall-4.jpg");?>" alt="<?php echo $MI04;?>"  onclick="magnify(this);">
		<div id="mall4">
			<span><?php echo $SP04;?></span>
		</div>
	</div>

	<div id="hotel">
		<img class="gallery" src="<?php echo url_for("images/Hotel/Hotel-1.jpg");?>" alt="<?php echo $MI05;?>"   onclick="magnify(this);">
		<div id="hotel1">
			<span><?php echo $SP05;?></span>
		</div>
		<img class="gallery" src="<?php echo url_for("images/Hotel/Hotel-2.jpg");?>" alt="<?php echo $MI06;?>"   onclick="magnify(this);">
		<div id="hotel2">
			<span><?php echo $SP06;?></span>
		</div>
		<img class="gallery" src="<?php echo url_for("images/Hotel/Hotel-3.jpg");?>" alt="<?php echo $MI07;?>"   onclick="magnify(this);">
		<div id="hotel3">
			<span><?php echo $SP07;?></span>
		</div>
		<img class="gallery" src="<?php echo url_for("images/Hotel/Hotel-4.jpg");?>" alt="<?php echo $MI08;?>"   onclick="magnify(this);">
		<div id="hotel4">
			<span><?php echo $SP08;?></span>
		</div>
	</div>

	<div id="resto">
		<img class="gallery" src="<?php echo url_for("images/Resto/Resto-1.jpg");?>" alt="<?php echo $MI09;?>"   onclick="magnify(this);">
		<div id="resto1">
			<span><?php echo $SP09;?></span>
		</div>
		<img class="gallery" src="<?php echo url_for("images/Resto/Resto-2.jpg");?>" alt="<?php echo $MI10;?>"   onclick="magnify(this);">
		<div id="resto2">
			<span><?php echo $SP10;?></span>
		</div>
		<img class="gallery" src="<?php echo url_for("images/Resto/Resto-3.jpg");?>" alt="<?php echo $MI11;?>"   onclick="magnify(this);">
		<div id="resto3">
			<span><?php echo $SP11;?></span>
		</div>
		<img class="gallery" src="<?php echo url_for("images/Resto/Resto-4.jpg");?>" alt="<?php echo $MI12;?>"   onclick="magnify(this);">
		<div id="resto4">
			<span><?php echo $SP12;?></span>
		</div>
	</div>

	<div id="infra">
		<img class="gallery" src="<?php echo url_for("images/Infra/Infra-1.jpg");?>" alt="<?php echo $MI13;?>"   onclick="magnify(this);">
		<div id="infra1">
			<span><?php echo $SP13;?></span>
		</div>
		<img class="gallery" src="<?php echo url_for("images/Infra/Infra-2.jpg");?>" alt="<?php echo $MI14;?>"   onclick="magnify(this);">
		<div id="infra2">
			<span><?php echo $SP14;?></span>
		</div>
		<img class="gallery" src="<?php echo url_for("images/Infra/Infra-3.jpg");?>" alt="<?php echo $MI15;?>"   onclick="magnify(this);">
		<div id="infra3">
			<span><?php echo $SP15;?></span>
		</div>
		<img class="gallery" src="<?php echo url_for("images/Infra/Infra-4.jpg");?>" alt="<?php echo $MI16;?>"   onclick="magnify(this);">
		<div id="infra4">
			<span><?php echo $SP16;?></span>
		</div>
	</div>
</div>

<div id="largeimage">
	<img id="magnifyimage">
	<span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
	<div id="largeimagetext">
	</div>

<!--login form-->
	<?php
	if (is_post_request())
	{
	$user = []	;
	$user['uname'] = $_POST['User'] ;
	$user['pword'] = $_POST['pass'] ;

	$result_set = find_user($user);

	if ($result_set)
		{
		if($user['pword'] === $result_set['pword'])
			{
			enter($user);
			redirect_to(url_for('engineering/eng-index.php'));
			}
		}
	}
	?>

	<div id="lognav">
		<form action"main-index.php" method="post">
			<label class="log"> Username </label>
			<input id="namelogin" required type="text" name="User">
			<label class="log"> Password </label>
			<input id="passlogin" required type="password" name="pass">
			<input id="btnlogin" type="submit" value="Login"> </input>
		</form>
	</div>
<!--login form-->

</div>

<script>
function magnify(img) {
  var magnifyimage = document.getElementById("magnifyimage");
  var largeimagetext = document.getElementById("largeimagetext");
  document.getElementById("largeimage").style.width = "750px";
  magnifyimage.src = img.src;
  largeimagetext.innerHTML = img.alt;
  magnifyimage.parentElement.style.display = "block";
}
</script>

<?php
include (Shared_Path.'/footer.php');
?>
