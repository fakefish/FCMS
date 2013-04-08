<?php include("common/check_login.php");?>
<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<title>Fcms</title>
		<link rel="stylesheet" href="css/base.css">
		<link rel="stylesheet" href="css/index.css">
	</head>
	<body>
		<header>
			<?php include("top.php");?>
		</header>
		<section>
			<article>
				<ul>
				<?php
					include("common/conn.php");
					$type=htmlspecialchars($_GET['type']);
					$content=htmlspecialchars($_GET['content']);
					if(empty($type))
						$query="SELECT * FROM `f_post` WHERE checkstate=1 AND (`content` LIKE '%$content%') LIMIT 10";
					else 
						$query="SELECT * FROM `f_post` WHERE checkstate=1 AND type='$type' AND (content LIKE '%$content%' ) LIMIT 10";
					if($result=$mysqli->query($query))
				    {
				        while($row=$result->fetch_object())
				        {
				            // echo "<li>".$row->create_time."<br>".$row->content."</li>";
				        	?>
				            <li>
				                <div class="user"><a href="uc.php?uid=<?php echo $row->uid ?>"><?php echo $username ?></a>:</div>
				                <div class="content"><?php echo $row->content ?></div>
				                <div class="time"><?php echo date("H:i:s Y-m-d",strtotime($row->create_time)) ?></div>
				                <!-- <a href="" class="commit">commit</a>
				            	<form action="commit.php?id=<?php echo $row->id ?>" id="commit-form">
				            		<textarea placeholder="type something to say" name="commit"></textarea>
				            		<input type="submit" name='submit' value="COMMIT">
				            	</form> -->
				            </li>
					           	
					         <?php
				        }
				    }
					else 
					{
						echo "There is no Result.";
					}
					$mysqli->close();
				?>
				</ul>
			</article>
		</section>
		<footer><?php include("footer.php");?></footer>
		<script src="js/utils.js"></script>
	</body>
</html>