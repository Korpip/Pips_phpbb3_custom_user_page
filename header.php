
<?php
$arr = getstreamgodsid();
$streammenu = 'On';
$isannyone;
if (empty($arr)) {$isannyone = "No one is streaming"; }
else { $isannyone = "The Other Streamers!"; }
?> 
	<div style="background-color: #4A4344;" >
		<ul id="menu">
			<li id="streamlist"><a href="#"><?php echo "$isannyone"; ?></a>
				<ul class="sub-menu">
					<?php foreach($arr as $option){	echo "<a href='s.php?u={$option}'><li>{$option}</li></a><br>";}?>
				</ul>
			</li>
			<li><a href="stream.php">Home</a></li>
			<li><a href="s.php?u=acedotcom">Aces Stream</a></li>
			<li><a href="s.php?u=Forum">Forum</a></li>
			<li><a href="s.php?u=streamstart">Get Your Own Page</a></li>
			<li id="clock" ></li>
			<?php userpanel(); ?>
		</ul>
	</div>
