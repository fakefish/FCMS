<form name="release" method="post" action="release_ok.php">
<textarea placeholder="content" name="content" cols="50" rows="4"></textarea> 
<br>
<select name="type">
    <option value="type1">type1</option>
    <option value="type2">type2</option>
    <option value="type3">type3</option>
</select>
<input type="submit" value="submit">
</form>
<ul>
<?php 
    include("common/conn.php");
	$query = "SELECT P.`content`,P.`create_time`,P.`uid`
                FROM `f_post` P 
                WHERE `uid` 
                IN (
                    SELECT R.`fid` 
                    FROM   `f_user_relation` R
                    WHERE  R.`uid`=".$_SESSION['uid']."
                    )
                ORDER BY P.`create_time` DESC"; 
    if($result=$mysqli->query($query))
    {
        while($row=$result->fetch_object())
        {
            $query_username = "SELECT * FROM `f_user` WHERE `uid`='".$row->uid."'";
            if($result_username=$mysqli->query($query_username))
            {
                while($row_username=$result_username->fetch_object())
                    $username=$row_username->username;
            }
            ?>
            <li>
                <div>
                    <a href=uc.php?uid="<?php echo $row->uid ?>"><?php echo $username ?></a>:
                </div>
                <div>
                    <?php echo $row->content ?>
                </div>
                <div>
                    <?php echo $row->create_time ?>
                </div>
            </li>
            <?php
        }
    }
?>
</ul>