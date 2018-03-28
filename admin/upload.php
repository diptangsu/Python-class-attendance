<!DOCTYPE html>
<html>
<head>
    <title>Upload</title>
</head>
<body>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    <input type="file" name="py"/>
    <input type="submit"/>
</form>

<pre><br>
    <?php
    $id = 17;
    $questionNo = 1;
    $name = "dip";
    if (isset($_FILES['py']))
    {
	    $info = pathinfo($_FILES['py']['name']);
	    $extension = $info['extension'];
	    if($extension == "py")
	    {
		    $newName = "$id"."$name"."$questionNo".".$extension";
		    $target = "uploads/".$newName;
		    move_uploaded_file($_FILES['py']['tmp_name'], $target);

		    print_r($info);
		    echo "MOVED<br>";
	        print_r($_FILES);
	    }
	    else
	    {
	    	echo "Bhai ki file upload korchish?<br>";
	    }
    }
    else
    	echo "Bhai upload kor answer gulo<br>";
    ?>
	</pre>
</body>
</html>