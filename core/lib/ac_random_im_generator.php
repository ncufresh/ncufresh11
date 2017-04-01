<?php
/**
 * ArmoredCore - Random image authorization
 */

// Step1. Generating a 5-digit random code
if(!isset($_SESSION))
{
	session_start();
}

$s_code_processing = array();

for($i=0; $i<5; $i++)
{
	$s_code_processing[$i] = rand(0,9);
}

// Step2. Write the random code into the session
$_SESSION['s_code'] = $s_code_processing[0].$s_code_processing[1].$s_code_processing[2].$s_code_processing[3].$s_code_processing[4];

// Step3. Processing the random image
// Step 3.1. Declare the header and error message
header("Content-type: image/png");

$die_message = "<strong>Armored Core</strong>: ac_random_im_generator: Error occured, or GD library doesn't exist.";

// Step 3.2. Create an image from background and 0 ~ 9
$im_result = @imagecreatefrompng("random_im_generator_images/background.png") or die(print $die_message);
$im_num = array();
for($i=0; $i<5; $i++)
{
	$im_num[$i] = @imagecreatefrompng("random_im_generator_images/".substr($_SESSION['s_code'], $i, 1).".png") or die(print $die_message);
}

// Step 4. Arrange the y-position for each number image
for($i=0; $i<5; $i++)
{
	imagecopymerge($im_result, $im_num[$i], (2 + 21*$i), rand(0,8), 0, 0, 21, 24, 100);
}

imagearc($im_result, rand(10,80), rand(0,20), 109, 32, 60, 10 , imagecolorallocate($im_result, 240, 120, 120));
imagearc($im_result, rand(25,60), rand(10,40), 40, 120, 60, 10 , imagecolorallocate($im_result, 120, 120, 240));
imagearc($im_result, rand(40,110), rand(15,35), 70, 60, 60, 10 , imagecolorallocate($im_result, 120, 240, 120));

// Step 5. Output the final result
imagepng($im_result);


// Step 6. Destroy the result
imagedestroy($im_result);
for($i=0; $i<5; $i++)
{
	imagedestroy($im_num[$i]);
}
?>