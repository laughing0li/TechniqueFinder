<?php
/**
 * TechniqueFinder - test_index.php
 *
 * Description:
 * Author:           Intersect Australia Ltd
 * Created:          12 Aug 2019
 * Source:           https://github.com/IntersectAustralia/TechniqueFinder
 * License:          Copyright (c) 2019 Intersect Australia - Licensed under Creative Commons
 *                   Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
 *                   https://creativecommons.org/licenses/by-nc-sa/4.0/
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Index Testing</title>
</head>

<?php $this->load->view('layout/header.php');?>

<body>
<p>Testing this index page.</p>
<button class="btn btn-danger">Danger</button>
</body>

<?php $this->load->view('layout/footer.php')?>

</html>
