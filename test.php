<?php
// StupidHarpTab V.1

include 'StupidHarpTab.php'; //include the function file
 ?>

<head>
  <link rel="stylesheet" type="text/css" href="StupidHarpTab.css"> <!--include the CSS -->
</head>
<body>



<?php
StupidHarpTab("scarborough.txt", "div"); //Call function for file scarborough.txt with Style "div"

StupidHarpTab("scarborough.txt", "unicode"); //Call function for file scarborough.txt with Style "unicode"
?>

</body>
