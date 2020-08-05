<?php
$user_level_id = $_SESSION['user_level_id'];
$result_page = $obj_db->getdata('user_level_permission','user_level_id='.(int)$user_level_id);
// var_dump($result_page);
$pages = array();
if($result_page->num_rows){
    foreach($result_page->rows as $val){
        $pages[] = $val['page_id'];
    }
}
// print_r($_SESSION);
// echo "string";
if(!check()){
    header('location:login.php');
} ?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="main_cp.php"><?php echo $name_website;?></a>

    </div>
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <!-- <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#edit_home" aria-expanded="true"><i class="fa fa-book"></i> แก้ไขหน้าหลัก<b class="caret"></b></a>
                <ul id="edit_home" class="collapse in" aria-expanded="true" style="">
                    <li>
                        <a href="cp-content-pic.php?pid=121&amp;cat=57">รูปสไลด์</a>
                    </li>
                    <li>
                        <a href="cp-content.php?cat=58">โครงการ</a>
                    </li>
                    <li>
                        <a href="cp-content.php?cat=59">ข่าวประชาสัมพันธ์</a>
                    </li>
                    <li>
                        <a href="cp-content.php?cat=71">ดาวน์โหลดเอกสารและคู่มือ</a>
                    </li>
                    <li>
                        <a href="cp-content.php?cat=72">การประเมินความพึงพอใจ</a>
                    </li>
                </ul>
            </li> -->
            <!-- <li class="main_cp">
                <a href="main_cp.php"><i class="fa fa-fw fa-dashboard"></i>Dashboard</a>
            </li> -->
            <li class="content">
                <a href="cp-content-cat.php"><i class="fa fa-fw fa-dashboard"></i>Content</a>
            <!-- </li>
            <li class="cp_member">
                <a href="cp_member.php"><i class="fa fa-fw fa-dashboard"></i>Member</a>
            </li>
            <li class="cp_member">
                <a href="cp_member.php"><i class="fa fa-fw fa-dashboard"></i>Booking</a>
            </li> -->
            <!--<li class="booking_info">
                <a href="booking_info.php"><i class="fa fa-fw fa-file-text-o"></i> Booking Info</a>
            </li>-->

            <!-- <li class="bank_transfer">
                <a href="cp-bank-transfer.php"><i class="fa fa-fw fa-exchange"></i> Bank Transfer</a>
            </li> -->

            <!-- <li class="promotion_code">
                <a href="cp-promotion-code.php"><i class="fa fa-fw fa-tags"></i> Promotion Code</a>
            </li> -->
            <!-- <li class="setting">
                <a href="cp-setting.php?id=1"><i class="fa fa-fw fa-cog"></i> Setting</a>
            </li> -->
            <?php if(in_array("1", $pages)){ ?><li class="userlevel"><a href="cp-user-group.php"><i class="fa fa-fw fa-cog"></i> กลุ่มผู้ใช้งาน</a></li><?php } ?>
            <!-- <li class="userlevel"><a href="cp-user-group.php"><i class="fa fa-fw fa-cog"></i> กลุ่มผู้ใช้งาน</a></li> -->
            <li class="user">
                <a href="cp-user.php"><i class="fa fa-fw fa-cog"></i> user</a>
            </li>
            <!-- <?php $person_branch = $obj_db->cat('parent = 23'.$hide_del_lan_order);
            foreach ($person_branch->rows as $key => $value) { ?>
                <li class="user">
                    <a href="cp-content-cat.php?cat=<?php echo $value['id']; ?>"><i class="fa fa-fw fa-cog"></i> <?php echo $value['lang_name']; ?></a>
                </li>
            <?php } ?> -->
        </ul>
    </div>
</nav>

