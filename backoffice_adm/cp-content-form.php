<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Input</h3>
    </div>
    <div class="panel-body">
        <div class="tabs">
            <?php 
                $sql_language = $obj_con->getLanguage();
                $count_rows = $sql_language->num_rows;
                if($count_rows>0){
                    $i=1;
                    while($FC=$sql_language->fetch_assoc()){ ?>
                    <li><a href="#tab<?php echo $FC['id'];?>" class="btn <?php echo ($i==1?'btn-primary':'');?>" data-tab="tab<?php echo $FC['id'];?>"><?php echo $FC['language_name'];?></a></li>
                    <?php $i++;}
                }
            ?>
        </div>
        <div class="clearfix"></div>
        <hr>
        <!-- <div class="form-group">
            <label for="detail_en" class="col-sm-2 control-label">วันที่ปฏิทิน</label>
            <div class="col-sm-2">
                <label class="control-label"><?php echo get('calendar_day'); ?></label>
                
            </div>
            <div class="col-sm-1">
                <span>ถึง</span>
            </div>
            <div class="col-sm-2">
                <input type="text" name="calendar_day_end" class="form-control" id="">
            </div>
            <div class="col-sm-3">
                <label class="control-label"><?php echo get('calendar_day'); ?></label>
            </div>
            <input type="hidden" name="calendar_day" value="<?php echo get('calendar_day'); ?>">

        </div> -->
        <?php if (!isset($_GET['calendar_day'])) {
            $_GET['calendar_day'] = date('Y-m-d');
        }
        if ($FE['calendar_day'] == "0000-00-00") {
            $FE['calendar_day'] = date('Y-m-d');
        }
        if ($FE['calendar_day_end'] == "0000-00-00") {
            $FE['calendar_day_end'] = date('Y-m-d');
        } ?>

        <?php if (in_array(get('cat'), $check_cat_calendar_arr_cat)) { ?>
            <div class="form-group">
                <label for="detail_en" class="col-sm-2 control-label">วันที่ปฏิทิน</label>
                <div class="col-sm-5">
                    <div class="input-daterange input-group" id="datepicker">
                        <input type="text" class="input-sm form-control datepicker" name="calendar_day" value="<?php echo isset($FE['calendar_day'])?$FE['calendar_day']:get('calendar_day'); ?>" />
                        <span class="input-group-addon">ถึง</span>
                        <input type="text" class="input-sm form-control datepicker" name="calendar_day_end" value="<?php echo $FE['calendar_day_end']; ?>" />
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php 
        // if (in_array(get('cat'), $have_link_url_cat)) { ?>
            <div class="form-group">
                <label for="detail_en" class="col-sm-2 control-label">URL</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="link_url" value="<?php echo $FE['link_url']; ?>" />
                </div>
            </div>
        <?php 
        // } ?>

        


        
        <div class="tab_container">
            <?php 
            if($count_rows>0){  
            $i=1; 
            $sql_language = $obj_con->getLanguage();
            while($FC=$sql_language->fetch_assoc()){
                if (get('pid')) {
                    $result_lang_detail = $obj_db->getdata('language_detail','type=1 and ref_id='.(int)$_GET['pid'].' and language_id='.$FC['id'])->row;
                }
                // print_r($result_lang_detail);
            ?>
                <div id="tab<?php echo $FC['id'];?>" class="tab_content <?php echo ($i==1?'active':'');?>">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Category title <?php echo $FC['language_name'];?>:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="<?php echo (!empty($result_lang_detail['name'])?$result_lang_detail['name']:'');?>" name="name[<?php echo $FC['id'];?>]"/>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="detail" class="col-sm-2 control-label">Category Intro <?php echo $FC['language_name'];?>:</label>
                        <div class="col-sm-10">
                          <textarea  class="ckeditor form-control" name="detail[<?php echo $FC['id'];?>]" rows="" cols=""/><?php echo (!empty($result_lang_detail['detail'])?$result_lang_detail['detail']:'');?></textarea>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="detail_2" class="col-sm-2 control-label">Category Detail <?php echo $FC['language_name'];?>:</label>
                        <div class="col-sm-10">
                          <textarea  class="ckeditor form-control" name="detail_2[<?php echo $FC['id'];?>]" rows="" cols=""/><?php echo (!empty($result_lang_detail['detail_2'])?$result_lang_detail['detail_2']:'');?></textarea>
                        </div>
                    </div>
                </div>
            <?php $i++;} } ?>
        </div>  
        <div class="clearfix"></div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">File upload</h3>
    </div>
    <div class="panel-body">
        <div class="form-group">
                <label for="detail_en" class="col-sm-2 control-label">วันที่ (เฉพาะ Time Line)</label>
                <div class="col-sm-2">
                    <!-- <input type="text" class="form-control" name="date" value="<?php echo $FE['date']; ?>" /> -->
                    <div class="input-daterange input-group" id="datepicker">
                        <input type="text" class="input-sm form-control datepicker" name="date" value="<?php echo isset($FE['date'])?$FE['date']:get('date'); ?>"/>
                    </div>
                </div>
            </div>
        <div class="form-group">
            <label for="detail_en" class="col-sm-2 control-label">ตำแหน่งรูป (เฉพาะ Time Line)</label>
            <div class="col-sm-2">
                <select name="position_img" class="form-control">
                    <option <?php echo $FE['position_img']=="left"?'selected':''; ?>>left</option>
                    <option <?php echo $FE['position_img']=="center"?'selected':''; ?>>center</option>
                    <option <?php echo $FE['position_img']=="right"?'selected':''; ?>>right</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="detail_en" class="col-sm-2 control-label">File 1(รูป cover):</label>
            <div class="col-sm-10">
                <input type="file" id="file" name="picture1" />
                <span> <?php echo $size; ?></span>
                <?  if(!empty($FE['picture1'])){ ?>
                <a href="../upload/content/<?=$FE['picture1']?>" target="new">View File</a> <a class="text-danger" href="<?=$para?>&act=delpic1">Del</a>
                <? }?>
            </div>
        </div>
        <div class="form-group">
            <label for="detail_en" class="col-sm-2 control-label">File 1(รูป cover EN):</label>
            <div class="col-sm-10">
                <input type="file" id="file" name="picture1_en" />
                <span> <?php echo $size; ?></span>
                <?  if(!empty($FE['picture1_en'])){ ?>
                <a href="../upload/content/<?=$FE['picture1_en']?>" target="new">View File</a> <a class="text-danger" href="<?=$para?>&act=delpic1_en">Del</a>
                <? }?>
            </div>
        </div>
        <div class="form-group">
            <label for="detail_en" class="col-sm-2 control-label">File 1(pdf download):</label>
            <div class="col-sm-10">
                <input type="file" id="file" name="picture2" />
                <?  if(!empty($FE['picture2'])){ ?>
                <a href="../upload/content/<?=$FE['picture2']?>" target="new">View File</a> <a class="text-danger" href="<?=$para?>&act=delpic2">Del</a>
                <? }?>
            </div>
        </div>
        <?php if (in_array($cat, $have_share_news_cat) || in_array($cat, $have_share_calendar_cat) || in_array($cat, $have_share_channel_cat)) { ?>
            <div class="form-group">
                <?php 
                $type_name = '';
                if (in_array($cat, $have_share_news_cat)) {
                    $type_name = 'news';
                } else if(in_array($cat, $have_share_calendar_cat)) {
                    $type_name = 'calendar';
                } else if(in_array($cat, $have_share_channel_cat)) {
                    $type_name = 'channel';
                } ?>
                <input type="hidden" name="share_type" value="<?php echo $type_name; ?>" >
                <label for="detail_en" class="col-sm-2 control-label">กำหนดข่าวให้แสดงในหลาย สาขาวิชา</label>
                <div class="col-sm-10">
                    <?php 
                    $result_branch = $obj_db->cat('parent = 0'.$hide_del_lan_order);
                    // $result_branch = $obj_db->query('SELECT
                    //     sl_content_cat.id,
                    //     sl_content_cat.parent,
                    //     sl_content_cat.picture1,
                    //     sl_content_cat.picture2,
                    //     sl_content_cat.picture3,
                    //     sl_content_cat.picture4,
                    //     sl_content_cat.picture5,
                    //     sl_content_cat.picture_thumb,
                    //     sl_content_cat.hide,
                    //     sl_content_cat.del,
                    //     sl_content_cat.seq,
                    //     sl_content_cat.shows,
                    //     sl_content_cat.time,
                    //     sl_content_cat.time_update,
                    //     sl_content_cat.show_menu,
                    //     sl_content_cat.show_sub,
                    //     sl_content_cat.color,
                    //     sl_language_detail.`name` AS lang_name,
                    //     sl_content_cat.id AS id,
                    //     sl_share_content.branch_id
                    //     FROM
                    //     sl_content_cat
                    //     INNER JOIN sl_language_detail ON sl_content_cat.id = sl_language_detail.ref_id
                    //     LEFT JOIN sl_share_content ON sl_content_cat.id = sl_share_content.branch_id
                    //     WHERE
                    //         sl_language_detail.type = 0  and sl_share_content.content_id = 89
                    //     AND parent = 0
                    //     AND hide = 0
                    //     AND del = 0
                    //     AND language_id = 1
                    //     ORDER BY
                    //         seq ASC ');
                    $result_share = $obj_db->getdata('share_content','type_name = "'.$type_name.'" and content_id = '.$pid);
                    $stack = array();
                    foreach ($result_share->rows as $key => $value) {
                        $stack[] = $value['branch_id'];
                    }
                    // print_r($stack);
                    foreach ($result_branch->rows as $key => $value) { 
                        if ($key != 0) {
                        ?>
                        <label for="share_<?php echo $value['id']; ?>"><?php echo $value['lang_name']; ?></label>
                        <input type="checkbox" name="branch_id[]" value="<?php echo $value['id'];?>" <?php echo in_array($value['id'], $stack)?'checked':''; ?> id="share_<?php echo $value['id']; ?>">
                        <?php }
                    } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


<input type="hidden" name="cat" value="<?=$cat?>" />

<script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>