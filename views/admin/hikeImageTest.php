<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 14.10.2016
 * Time: 09:26
 */

$header = Controller::checkHeader();
include_once $header;


$imageTest = $_SESSION['testImage'];

?>

<div class="container">
    <img alt="Embedded Image" src="data:<?php echo $imageTest['mime']?>;base64,<?php echo base64_encode($imageTest['data']); ?> "/>
</div>

<?php
include_once ROOT_DIR . 'views/footer.inc';
?>

