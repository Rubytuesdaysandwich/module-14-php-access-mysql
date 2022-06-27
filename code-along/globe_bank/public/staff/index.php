<?php require_once('../../private/initialize.php');?><!--file path to initialize.php use static string not dynamic data still have to use the dot dots here to access the initialize php-->

<?php $page_title='staff Menu';?><!--Page title-->
<?php include(SHARED_PATH .'/staff_header.php');?><!--file path to private/shared/ staff_header-->

<div id="content">
<div id="main-menu">
    <h2>Main Menu</h2>
    <ul>
        <li>
            <a href="subjects/index.php">subjects</a>
        </li>
    </ul>
</div>
</div>

<?php include(SHARED_PATH .'/staff_footer.php');?><!--file path to private/shared/ staff_header-->