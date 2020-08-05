<?php 
    require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'../../required/connect.php'); 
    $mCate = $question->getSubCate($_GET['id_sub']);
    if($mCate->num_rows > 0){
    	?>
    		<select name="sub_cat_id" class="form-control">
    			<?php foreach ($mCate->rows as $key => $value) { ?>
                <option value="<?php echo $value['id'];?>" <?php echo $question_result['sub_cat_id'] == $value['id'] ? "selected" : ""; ?>><?php echo $value['category_title'];?></option>
                <?php } ?>
    		</select>
    	<?
    }else{
    	?>
    		<select name="sub_cat_id" class="form-control">
    			<option value="0"> - </option>
    		</select>
    	<?
    }
?>
