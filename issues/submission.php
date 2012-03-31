<?php
require_once('../inc/common.php');
    if(isset($_POST['email']) && isset($_POST['title']) && isset($_POST['url']) && isset($_POST['description'])) {
        $baseStr = "INSERT INTO issues (email, createdAt, title, url, description, picture, approved) VALUE ('<%email%>', now(), '<%title%>', '<%url%>', '<%description%>', '<%pic%>', '0')";

        $email = mysql_real_escape_string($_POST["email"]);
        $url = mysql_real_escape_string($_POST["url"]);
        $description = mysql_real_escape_string($_POST["description"]);
        $title = mysql_real_escape_string($_POST["title"]);
        $pic = 0;
        if ((($_FILES["picture"]["type"] == "image/gif") || ($_FILES["picture"]["type"] == "image/jpg") || ($_FILES["picture"]["type"] == "image/png"))
                && ($_FILES["picture"]["size"] < 50000000)) {
            $pic = 1;
        }
        echo $pic;
        $rVal = array("<%email%>","<%title%>","<%url%>", "<%description%>", "<%pic%>");
        $nVal = array($email, $title, $url, $description, $pic);

        $fQuery = str_replace($rVal, $nVal, $baseStr);

        mysql_query($fQuery);
        $newId = mysql_insert_id();

        if($pic == 1) {
            $newLoc = "images/" . $newId . "." . str_replace("image/", "", $_FILES["picture"]["type"]);
            move_uploaded_file($_FILES["picture"]["tmp_name"], $newLoc);
        }
    }
?>

<html>
    <head>
        <title>Bug Submission Form</title>
        <script type="text/javascript" src="/static/js/jquery.js"></script>
        <script type="text/javascript" src="/static/js/jquery.validate.min.js"></script>

        <script type="text/javascript">
            $("document").ready(function() {
                $("#issueForm").validate({
                    rules : {
                        email: {
                            required: true,
                            email: true
                        },
                        title: "required",
                        url: {
                            required: true,
                            url: true
                        },
                        description: "required"
                    }
                });
            });
        </script>

    </head>

    <body>
        <form class="cmxform" id="issueForm" method="post" action="submission.php" enctype="multipart/form-data">
            <fieldset>
                <table cellpadding="5" cellspacing="0">
                    <tr>
                        <td>
                            <b>Email:</b>
                        </td>
                        <td>
                            <input type="textbox" id="email" name="email" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Issue title:</b>
                        </td>
                        <td>
                            <input type="textbox" id="title" name="title" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <b>Url of Issue:</b>
                        </td>
                        <td>
                            <input type="textbox" id="url" name="url"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Issue Description:</b>
                        </td>
                        <td>
                            <textarea id="description" rows="5" cols="50" name="description"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Picture:</b>
                        </td>
                        <td>
                            <input type="file" name="picture" id="picture"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <center><input type="submit" value="Submit Issue" class=""submit" /></center>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </body>
</html>