<?php
$allowedExts = array("gif", "jpeg", "jpg", "png", "ico");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

    function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytesFormat = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytesFormat = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytesFormat = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytesFormat = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytesFormat = $bytes . ' byte';
        }
        else
        {
            $bytesFormat = '0 bytes';
        }

        return $bytesFormat;
}

$echo = '';

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/x-icon"))
&& in_array($extension, $allowedExts)) {
  if ($_FILES["file"]["error"] > 0) {
    $echo .= "Return Code: " . $_FILES["file"]["error"] . "<br>";
  } else {
    $echo .= "Upload: " . $_FILES["file"]["name"] . "<br>";
    $echo .= "Type: " . $_FILES["file"]["type"] . "<br>";
    $echo .= "Size: " . formatSizeUnits($_FILES["file"]["size"]) . "<br>";
    if (file_exists("upload/" . $_FILES["file"]["name"])) {
      $echo .= $_FILES["file"]["name"] . " already exists. ";
    } else {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "media/" . $_FILES["file"]["name"]);
      $echo .= "Stored in: " . "media/" . $_FILES["file"]["name"];
    }
  }
} else {
  $echo .= "Invalid file";
}
?> 

<h1>Doomla upload</h1>
<p><?php echo $echo; ?></p>
<a href="admin.php">Terug naar admin</a>