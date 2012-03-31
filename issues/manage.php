<?php
require_once('../inc/common.php');

start('_newabout');
if(isset ($_POST["submit_btn"])){
    $vals = explode("|", $_POST["submit_btn"]);
    $qUpdate = "";
    if($vals[0] == "a"){
        $qUpdate = "UPDATE issues SET approved='1' WHERE issueId='" . mysql_real_escape_string($vals[1]) . "'";
    } else {
        $qUpdate = "DELETE FROM issues WHERE issueId='" . mysql_real_escape_string($vals[1]) . "'";
    }
    mysql_query($qUpdate);
    
}
?>
<div>
    <h2>Manage Issues</h2>
</div>
<div>
    <a href="manage.php?approved=1">Show Approved</a> | <a href="manage.php?approved=0">Show Unapproved</a>
</div>
<form action="manage.php" method="post">
<table cellpadding="5" cellspacing="0">
<?php
    $approved = 0;
    if(isset ($_GET['approved'])){
        $approved = $_GET['approved'];
    }
    $sQuery = "SELECT * FROM issues WHERE approved='" . mysql_real_escape_string($approved) . "'";

    $result = mysql_query($sQuery);
    while ($row = mysql_fetch_array($result,MYSQLI_ASSOC)){
        echo "<tr>";
        echo "<td><b>" . $row['title'] . "</b></td>";
        echo "<td><b>Email:<b/> " . $row['email'] . "</td>";
        echo "<td><b>Status:</b> " . ($row['approved'] == 1 ? "Approved" : "Unapproved") . "</td>";
        echo "<td>" . "<button type='submit' name='submit_btn' value='a|". $row["issueId"]."'>Approve</button>&nbsp;"  . "&nbsp;<button type='submit' name='submit_btn' value='d|". $row["issueId"]."'>Delete</button>" . "</td>";
        echo "</tr>";
        echo "<tr><td colspan='4'>";
        echo $row['description'] . "<br/>";
        $picFile = "";
        if($row['picture'] == 1){
            $picFile = (file_exists("images/" . $row["issueId"] . ".jpg") == true ? "images/" . $row["issueId"] . ".jpg" : "");
            $picFile = (file_exists("images/" . $row["issueId"] . ".gif") == true ? "images/" . $row["issueId"] . ".gif" : "");
            $picFile = (file_exists("images/" . $row["issueId"] . ".png") == true ? "images/" . $row["issueId"] . ".png" : "");
        }
        echo ($row['picture'] == 1 ? "<a href='". $picFile . "'>Click Here For Submitted Screenshot</a>" : "");
        echo "</td></tr>";
        echo "<tr><td colspan='4'><hr/></td></tr>";
    }
?>
</table>
</form>
<?php

  stop('9');
?>