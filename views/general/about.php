<?php
/**
 * Created by PhpStorm.
 * User: sandro
 * Date: 26.09.2016
 * Time: 10:26
 */

include_once ROOT_DIR.'views/header.inc';
?>
<script>
    $(document).ready(function () {
        $('#menu_about').addClass('active');
    });
</script>
<br />

<div class="main">
    <div class="container">
        <div class="about">
            <h4><?php echo $lang['ABOUT_TAG']; ?></h4>
            <div class="about-bottom">

                <table width="1200"  align="center" border="10" cellspacing="10" cellpadding="20" frame="void" rules="rows" >
                    <tr>
                        <th>
                            <h3><?php echo $lang['ABOUT_NAME']; ?></h3>
                        </th>
                        <th>
                            <p><?php echo $lang['ABOUT_NAME_FULL']; ?></p>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <h3><?php echo $lang['ABOUT_FOUNDATION']; ?></h3>
                        </th>
                        <th>
                            <p>1943</p>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <h3><?php echo $lang['ABOUT_BASED']; ?></h3>
                        </th>
                        <th>
                            <p>CH-1951<?php echo $lang['ABOUT_BASED_SION']; ?></p>
                        </th>
                    </tr>

                    <tr>
                        <th>
                            <h3><?php echo $lang['ABOUT_UMBRELLA_GROUP']; ?></h3>
                        </th>
                        <th>
                            <p><?php echo $lang['ABOUT_CH_HIKS']; ?></p>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <h3><?php echo $lang['ABOUT_CERTIFICATION']; ?></h3>
                        </th>
                        <th>
                            <p>ISO 9001 - ISO 14001 - Valais Excellence</p>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <h3><?php echo $lang['ABOUT_OPERATIONS']; ?></h3>
                        </th>
                        <th>
                            <p>
                                <?php echo $lang['ABOUT_OPERATIONS_DESC']; ?>
                            </p>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <h3><?php echo $lang['ABOUT_QUANTITY_MEMBERS']; ?></h3>
                        </th>
                        <th>
                            <p>2000</p>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <h3><?php echo $lang['ABOUT_MEMBER_CONTRIBUTION']; ?></h3>
                        </th>
                        <th>
                            <p><?php echo $lang['ABOUT_MEMBER_CONTRIBUTION_DESC']; ?></p>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <h3><?php echo $lang['ABOUT_MEMBER_ADVANTAGE']; ?></h3>
                        </th>
                        <th>
                            <ul style="list-style-type: disc">
                                <li>
                                    <p><?php echo $lang['ABOUT_MEMBER_ADVANTAGE_1']; ?></p>
                                </li>
                                <li>
                                    <p><?php echo $lang['ABOUT_MEMBER_ADVANTAGE_2']; ?></p>
                                </li>
                                <li>
                                    <p><?php echo $lang['ABOUT_MEMBER_ADVANTAGE_3']; ?></p>
                                </li>
                                <li>
                                    <p><?php echo $lang['ABOUT_MEMBER_ADVANTAGE_4']; ?></p>
                                </li>
                                <li>
                                    <p><?php echo $lang['ABOUT_MEMBER_ADVANTAGE_5']; ?></p>
                                </li>
                            </ul>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <h3><?php echo $lang['ABOUT_CONSTITUTION']; ?></h3>
                        </th>
                        <th>
                            <p><?php echo $lang['ABOUT_CONSTITUTION_DESC']; ?></p>
                        </th>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>


<?php
include_once ROOT_DIR.'views/footer.inc';
?>
