<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($id=="google"){
 ?>
	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1937.801124652582!2d100.5219449!3d13.7425144!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2992eeb095e89%3A0x78bfd0a619b2afc!2s111+Soi+Charat+Mueang%2C+Khwaeng+Rong+Muang%2C+Khet+Pathum+Wan%2C+Krung+Thep+Maha+Nakhon+10330!5e0!3m2!1sen!2sth!4v1523960044322" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> 
<?
}else{
?>
<img src="<?=base_url('img/contact/map.jpg')?>"  width="100%" >
<?
}


?>
