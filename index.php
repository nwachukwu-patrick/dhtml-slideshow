<?php
/**
* @author Nwachukwu patrick
* @category Dhtml slideshow in php
* @contact Nwachukwupatrick06@gmail.com
* you can make changes on it in order to suit your specific need.
**/
//open the image directory directory
$dh = new DirectoryIterator( "../pics" );
$files = array( );
// cross check the image to ake sure it ends with .jpg
foreach( $dh as $file )
{
 if ( preg_match( "/[.]jpg$/", $file ) ) $files []= "$file";
}
?>
<html>
<head>
<title>Slideshow</title>
<style>
body { background: none; }
#thumbnails { 
     height: 140px;
     width: 100%; 
     overflow: auto;
     border: 2px solid grey;
     background-color: blue;
     padding: 0;
     margin: 0;
   }
#pic { 
    text-align: center; 
    height: 400px; 
    padding: 20px; 
}
</style>
<script>
var image_list = [
<?php $first = true; foreach( $files as $image ) { ?>
<?php echo( $first ? "" : ", " ); ?>"<?php echo( $image ); ?>"
<?php $first = false; } ?>
];
var curimage = 0;
function switchimg( ind )
{
 var image = image_list[ind];
 var obj = document.getElementById( "selimg" );
 obj.src = "scale.php?image="+image+"&y=400";
 curimage = ind;
}
function nextimage( )
{
 curimage++;
 if ( curimage >= image_list.length ) curimage = 0;
 switchimg( curimage );
}
window.setInterval( "nextimage( )", 4000 );
</script>
</head>
<body>
<div id="thumbnails">
<table width="100%">
<tr>
<?php $ind = 0; foreach( $files as $image ) { ?>
<td width="160" nowrap align="center">
<a href="javascript:switchimg( <?php echo($ind); ?> )">
<img height="100" src="scale.php?image=<?php echo($image); ?>&y=100" border="0" /
>
</a>
</td>
<?php $ind++; } ?>
</tr>
</table>
</div>
<div id="pic">
<img id="selimg" height="400" src="scale.php?image=<?php echo($files[0]);
 ?>&y=400" />
</div>
</body>
