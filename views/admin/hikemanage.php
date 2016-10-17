<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 14.10.2016
 * Time: 09:26
 */
include_once '/headeradmin.inc';
?>
<script>
    $(document).ready(function () {
        $('#menu_hikemanage').addClass('active');
    });

</script>
<br/>

<table class="responstable">

    <tbody><tr>
        <th>Main driver</th>
        <th data-th="Driver details"><span>First name</span></th>
        <th>Surname</th>
        <th>Date of birth</th>
        <th>Relationship</th>
    </tr>

    <tr>
        <td><input type="radio"></td>
        <td>Steve</td>
        <td>Foo</td>
        <td>01/01/1978</td>
        <td>Policyholder</td>
    </tr>

    <tr>
        <td><input type="radio"></td>
        <td>Steffie</td>
        <td>Foo</td>
        <td>01/01/1978</td>
        <td>Spouse</td>
    </tr>

    <tr>
        <td><input type="radio"></td>
        <td>Stan</td>
        <td>Foo</td>
        <td>01/01/1994</td>
        <td>Son</td>
    </tr>

    <tr>
        <td><input type="radio"></td>
        <td>Stella</td>
        <td>Foo</td>
        <td>01/01/1992</td>
        <td>Daughter</td>
    </tr>

    </tbody>
</table>


<?php
include_once 'footer.inc';
?>
