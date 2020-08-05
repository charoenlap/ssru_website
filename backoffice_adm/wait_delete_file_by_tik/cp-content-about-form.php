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
        <div class="tab_container">
            <?php 
                if($count_rows>0){  
                $i=1; 
                $sql_language = $obj_con->getLanguage();
                while($FC=$sql_language->fetch_assoc()){
            ?>
            <div id="tab<?php echo $FC['id'];?>" class="tab_content <?php echo ($i==1?'active':'');?>">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Category title <?php echo $FC['language_name'];?>:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo (isset($input_language[$FC['id']]['name'])?$input_language[$FC['id']]['name']:'');?>" name="name[<?php echo $FC['id'];?>]"/>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="detail" class="col-sm-2 control-label">Category Details <?php echo $FC['language_name'];?>:</label>
                    <div class="col-sm-10">
                      <textarea  class="ckeditor form-control" name="detail[<?php echo $FC['id'];?>]" rows="" cols=""/><?php echo (isset($input_language[$FC['id']]['detail'])?$input_language[$FC['id']]['detail']:'');?></textarea>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="detail_2" class="col-sm-2 control-label">Category Details <?php echo $FC['language_name'];?>:</label>
                    <div class="col-sm-10">
                      <textarea  class="ckeditor form-control" name="detail_2[<?php echo $FC['id'];?>]" rows="" cols=""/><?php echo (isset($input_language[$FC['id']]['detail_2'])?$input_language[$FC['id']]['detail_2']:'');?></textarea>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="detail_3" class="col-sm-2 control-label">Category Details <?php echo $FC['language_name'];?>:</label>
                    <div class="col-sm-10">
                      <textarea  class="ckeditor form-control" name="detail_3[<?php echo $FC['id'];?>]" rows="" cols=""/><?php echo (isset($input_language[$FC['id']]['detail_3'])?$input_language[$FC['id']]['detail_3']:'');?></textarea>
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
            <label for="detail_en" class="col-sm-2 control-label">Image Cover 1:</label>
            <div class="col-sm-10">
                <input type="file" id="file" name="picture1" />
                <?  if($FE['picture1']!=""){ ?>
                <a href="../upload/content/<?=$FE['picture1']?>" target="new">View File</a> <a class="text-danger" href="<?=$para?>&act=delpic1">Del</a>
                <? }?>
            </div>
        </div>
        <div class="form-group">
            <label for="detail_en" class="col-sm-2 control-label">Image Cover 2:</label>
            <div class="col-sm-10">
                <input type="file" id="file" name="picture2" />
                <?  if($FE['picture2']!=""){ ?>
                <a href="../upload/content/<?=$FE['picture2']?>" target="new">View File</a> <a class="text-danger" href="<?=$para?>&act=delpic2">Del</a>
                <? }?>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="cat" value="<?=$cat?>" />