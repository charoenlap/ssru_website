<?php
class master{
	public $db;
	public function __construct($db){
		$this->db = $db;
	}
	function __destruct() {
		@mysqli_close($this->db);
    }
    
    public function listProvince(){
    	$query = $this->db->getdata("province");
    	$found = $query->num_rows;
    	$result = array();
    	if($found>0){
    		$result = $query->rows;
    	}
    	return $result;
    }
    public function listCase(){
        $query = $this->db->getdata("case");
        $found = $query->num_rows;
        $result = array();
        if($found>0){
            $result = $query->rows;
        }
        return $result;
    }
    public function listPolice(){
        $query = $this->db->getdata("police");
        $found = $query->num_rows;
        $result = array();
        if($found>0){
            $result = $query->rows;
        }
        return $result;
    }
    public function listBrand(){
        $query = $this->db->getdata("brand");
        $found = $query->num_rows;
        $result = array();
        if($found>0){
            $result = $query->rows;
        }
        return $result;
    }
    public function getLocation($id){
        $query = $this->db->getdata("content INNER JOIN sl_language_detail ON sl_content.id = sl_language_detail.ref_id","sl_content.id = ".$id." and sl_language_detail.type=1 and language_id=1",PREFIX."content.*,".PREFIX."language_detail.`name` as lang_name,".PREFIX."content.id as id,".PREFIX."language_detail.`detail` as detail");
        $found = $query->num_rows;
        $result = array();
        if($found>0){
            $result = $query->row['lang_name'];
        }
        return $result;
    }
    public function getListLocation(){
        $query = $this->db->getdata("content INNER JOIN sl_language_detail ON sl_content.id = sl_language_detail.ref_id","cat = 3 and sl_language_detail.type=1 and language_id=1  and del<>1",PREFIX."content.*,".PREFIX."language_detail.`name` as lang_name,".PREFIX."content.id as id,".PREFIX."language_detail.`detail` as detail");
        $found = $query->num_rows;
        $result = array();
        if($found>0){
            $result = $query;
        }
        return $result;
    }
    public function getListCategory(){
        $query = $this->db->getdata("content INNER JOIN sl_language_detail ON sl_content.id = sl_language_detail.ref_id","cat = 4 and sl_language_detail.type=1 and language_id=1 and del<>1",PREFIX."content.*,".PREFIX."language_detail.`name` as lang_name,".PREFIX."content.id as id,".PREFIX."language_detail.`detail` as detail");
        $found = $query->num_rows;
        $result = array();
        if($found>0){
            $result = $query;
        }
        return $result;
    }
    public function getListType(){
        $query = $this->db->getdata("content INNER JOIN sl_language_detail ON sl_content.id = sl_language_detail.ref_id","cat = 5 and sl_language_detail.type=1 and language_id=1  and del<>1",PREFIX."content.*,".PREFIX."language_detail.`name` as lang_name,".PREFIX."content.id as id,".PREFIX."language_detail.`detail` as detail");
        $found = $query->num_rows;
        $result = array();
        if($found>0){
            $result = $query;
        }
        return $result;
    }
    public function getListKind(){
        $query = $this->db->getdata("content INNER JOIN sl_language_detail ON sl_content.id = sl_language_detail.ref_id","cat = 6 and sl_language_detail.type=1 and language_id=1  and del<>1",PREFIX."content.*,".PREFIX."language_detail.`name` as lang_name,".PREFIX."content.id as id,".PREFIX."language_detail.`detail` as detail");
        $found = $query->num_rows;
        $result = array();
        if($found>0){
            $result = $query;
        }
        return $result;
    }
    public function getListOptional(){
        $query = $this->db->getdata("content INNER JOIN sl_language_detail ON sl_content.id = sl_language_detail.ref_id","cat = 7 and sl_language_detail.type=1 and language_id=1  and del<>1",PREFIX."content.*,".PREFIX."language_detail.`name` as lang_name,".PREFIX."content.id as id,".PREFIX."language_detail.`detail` as detail");
        $found = $query->num_rows;
        $result = array();
        if($found>0){
            $result = $query;
        }
        return $result;
    }
    public function getListInfrastructure(){
        $query = $this->db->getdata("content INNER JOIN sl_language_detail ON sl_content.id = sl_language_detail.ref_id","cat = 13 and sl_language_detail.type=1 and language_id=1  and del<>1",PREFIX."content.*,".PREFIX."language_detail.`name` as lang_name,".PREFIX."content.id as id,".PREFIX."language_detail.`detail` as detail");
        $found = $query->num_rows;
        $result = array();
        if($found>0){
            $result = $query;
        }
        return $result;
    }
    public function getBannerHome(){
        $query = $this->db->getdata("content_pic",'pid=57');
        $found = $query->num_rows;
        $result = array();
        if($found>0){
            $result = $query;
        }
        return $result;
    }
    public function currency($currency){
        $result = '';
        $result = "฿ ".number_format($currency);
        return $result;
    }
    function get($val=""){
        $result = '';
        if(isset($_GET[$val])){
            $result = $_GET[$val];
        }
        return $result;
    }
    public function getpara($unset=NULL){
        $array_g = $_GET;
        $unset = explode(",",$unset);
        if($unset!=NULL){
            foreach($unset as $val){
                unset($array_g[$val]);
            }
        }
        $i=1;
        $para = '&';
        foreach($array_g as $key=>$val){
            $para .= "$key=$val";
            if($i!=count($array_g)){$para .= "&";}
            $i++;
        }
        return $para;
    }
    public function getPagination($page_total=0,$link,$active=1){
        $result = array();
        $para = $this->getpara('route,page');
        $link = $link.$para;
        if($page_total>0){
            for ($i=1; $i <= $page_total; $i++) { 
                $result_active = "";
                if($active==$i){
                    $result_active = "active";
                }
                $result['page'][] = array(
                    'href'=>$link."&page=".$i,
                    'page'=>$i,
                    'active'=>$result_active
                );
            }
            if($active>1){
                $result['previous'] = array('href'=>$link."&page=".($active-1));
            }
            if($active<$page_total){
                $result['next'] = array('href'=>$link."&page=".($active+1));
            }
        }
        return $result;
    }
    public function getProperties($limit=99,$page=0,$json=false,$agru=array()){
        $sql_page = 0;
        $sql_limit = 0;
        if($limit>0){
            $sql_limit = $limit;
        }
        if($page>0){
            $page = $page-1;
            $sql_page = ($page*$sql_limit);
        }
        $where = "";
        if(get('type') or !empty($agru['type'])){
            $type = get('type');
            if(!empty($agru['type'])){
                $type = $agru['type'];
            }
            $where .= " and sl_content.`type`='".$type."'";
        }
        if(get('location')){
            $where .= " and sl_content.`location`='".get('location')."'";
        }
        if(get('category') or !empty($agru['category'])){
            $category = get('category');
            if(!empty($agru['category'])){
                $category = $agru['category'];
            }
            $where .= " and sl_content.`category`='".$category."'";
        }
        if(get('kind')){
            $where .= " and sl_content.`kind`='".get('kind')."'";
        }
        if(get('room')){
            $where .= " and sl_content.`room`='".get('room')."'";
        }
        if(get('bath')){
            $where .= " and sl_content.`bath`='".get('bath')."'";
        }
        if(get('area')){ 
            $area = explode(' - ',get('area'));
            $areaMin = $area[0];
            $areaMax = $area[1];
            $where .= " and (sl_content.`area` between ".$areaMin." and ".$areaMax.")";
        }
        if(get('price')){ 
            $price = explode(' - ',get('price'));
            $priceMin = $price[0];
            $priceMax = $price[1];
            $where .= " and (sl_content.`price` between ".$priceMin." and ".$priceMax.")";
        }
        if(get('optional')){
            foreach(get('optional') as $value){
                $where .= " and sl_content.`optional` like '%".$value."%'";
            }
        }
        //echo "content INNER JOIN sl_language_detail ON sl_content.id = sl_language_detail.ref_id WHERE cat = 1 and sl_language_detail.type=1 and language_id=1 ".$where." limit ".(int)$sql_page.",".(int)$limit;
        $query = $this->db->getdata("content INNER JOIN sl_language_detail ON sl_content.id = sl_language_detail.ref_id","cat = 1 and sl_language_detail.type=1 and language_id=1 ".$where." limit ".(int)$sql_page.",".(int)$limit,PREFIX."content.*,".PREFIX."language_detail.`name` as lang_name,".PREFIX."content.id as id,".PREFIX."language_detail.`detail` as detail");
        $found = $query->num_rows;
        $result = array();
        if($found>0){
            if($json===true){
                foreach ($query->rows as $key => $value) {
                    $result[] = array(
                        $value['lang_name'],
                        $value['map_longitude'],
                        $value['map_latitude'],
                        $value['map_z'],
                        $value['type'],
                        number_format($value['price']),
                        $value['like'],
                        $value['picture1'],
                        $value['location'],
                        $value['bedroom'],
                        $value['bath'],
                        $value['garage'],
                        $value['gym'],
                        $value['area'],
                        $value['id']
                    );
                }
                $result = json_encode($result);
            }else{
                $result = $query;
            }
        }
        return $result;
    }
    public function getTotalProperties(){
        $sql_page = 0;
        $sql_limit = 0;
        if($limit>0){
            $sql_limit = $limit;
        }
        if($page>0){
            $page = $page-1;
            $sql_page = ($page*$sql_limit);
        }
        $where = "";
        if(get('type')){
            $where .= " and sl_content.`type`='".get('type')."'";
        }
        if(get('location')){
            $where .= " and sl_content.`location`='".get('location')."'";
        }
        if(get('category')){
            $where .= " and sl_content.`category`='".get('category')."'";
        }
        if(get('kind')){
            $where .= " and sl_content.`kind`='".get('kind')."'";
        }
        if(get('room')){
            $where .= " and sl_content.`room`='".get('room')."'";
        }
        if(get('bath')){
            $where .= " and sl_content.`bath`='".get('bath')."'";
        }
        if(get('area')){ 
            $area = explode(' - ',get('area'));
            $areaMin = $area[0];
            $areaMax = $area[1];
            $where .= " and (sl_content.`area` between ".$areaMin." and ".$areaMax.")";
        }
        if(get('price')){ 
            $price = explode(' - ',get('price'));
            $priceMin = $price[0];
            $priceMax = $price[1];
            $where .= " and (sl_content.`price` between ".$priceMin." and ".$priceMax.")";
        }
        if(get('optional')){
            foreach(get('optional') as $value){
                $where .= " and sl_content.`optional` like '%".$value."%'";
            }
        }

        $query = $this->db->getdata("content INNER JOIN sl_language_detail ON sl_content.id = sl_language_detail.ref_id","cat = 1 and sl_language_detail.type=1 and language_id=1 ".$where,PREFIX."content.*,".PREFIX."language_detail.`name` as lang_name,".PREFIX."content.id as id,".PREFIX."language_detail.`detail` as detail");
        $found = $query->num_rows;
        return $found;
    }
    public function getPropertiedetail($id){
        $result = array($id);
         $query = $this->db->getdata("content INNER JOIN sl_language_detail ON sl_content.id = sl_language_detail.ref_id","sl_language_detail.type=1 and language_id=1 and ".PREFIX."content.id=".(int)$id,PREFIX."content.*,".PREFIX."language_detail.`name` as lang_name,".PREFIX."content.id as id,".PREFIX."language_detail.`detail` as detail");
        $found = $query->num_rows;
        $result = array();
        if($found>0){
            $result = $query;
        }
        return $result;
    }
    public function getType($id){
        $result = "";
        if($id==8){
            $result = '<span class="label hot">buy</span>';
        }elseif($id==9){
            $result = '<span class="label sale">sale</span>';
        }elseif($id==10){
            $result = '<span class="label rent">rent</span>';
        }elseif($id==19){
            $result = '<span class="label hot">hot</span>';
        }
        return $result;
    }
    public function getCountKind($kind){
        $query = $this->db->getdata("content",'kind='.(int)$kind,'count(kind) as count_kind');
        $found = $query->num_rows;
        $result = 0;
        if($found>0){
            $result = $query->row['count_kind'];
        }
        return $result;
    }
    public function getBlogs($limit="0,2"){
        $query = $this->db->getdata("content INNER JOIN sl_language_detail ON sl_content.id = sl_language_detail.ref_id","cat = 10 and sl_language_detail.type=1 and language_id=1 order by ".PREFIX."content.id DESC limit ".$limit,PREFIX."content.*,".PREFIX."language_detail.`name` as lang_name,".PREFIX."content.id as id,".PREFIX."language_detail.`detail` as detail,".PREFIX."language_detail.`detail_2` as detail_2");
        $found = $query->num_rows;
        $result = array();
        if($found>0){
            $result = $query;
        }
        return $result;
    }
    public function getBlog($id){
        $query = $this->db->getdata("content INNER JOIN sl_language_detail ON sl_content.id = sl_language_detail.ref_id",PREFIX."content.id = ".$id." and sl_language_detail.type=1 and language_id=1 ",PREFIX."content.*,".PREFIX."language_detail.`name` as lang_name,".PREFIX."content.id as id,".PREFIX."language_detail.`detail` as detail,".PREFIX."language_detail.`detail_2` as detail_2");
        $found = $query->num_rows;
        $result = array();
        if($found>0){
            $result = $query;
        }
        return $result;
    }
    public function getPerson(){
        $query = $this->db->getdata("content INNER JOIN sl_language_detail ON sl_content.id = sl_language_detail.ref_id","cat = 11 and sl_language_detail.type=1 and language_id=1",PREFIX."content.*,".PREFIX."language_detail.`name` as lang_name,".PREFIX."content.id as id,".PREFIX."language_detail.`detail` as detail");
        $found = $query->num_rows;
        $result = array();
        if($found>0){
            $result = $query;
        }
        return $result;
    }
    public function getAbout($id){
        $query = $this->db->getdata("content INNER JOIN sl_language_detail ON sl_content.id = sl_language_detail.ref_id",PREFIX."content.id = ".$id." and sl_language_detail.type=1 and language_id=1",PREFIX."content.*,".PREFIX."language_detail.`name` as lang_name,".PREFIX."content.id as id,".PREFIX."language_detail.`detail` as detail,".PREFIX."language_detail.`detail_2` as detail_2,".PREFIX."language_detail.`detail_3` as detail_3");
        $found = $query->num_rows;
        $result = array();
        if($found>0){
            $result = $query;
        }
        return $result;
    }
    public function getPartner(){
        $query = $this->db->getdata("content_pic",'pid=40');
        $found = $query->num_rows;
        $result = array();
        if($found>0){
            $result = $query;
        }
        return $result;
    }
    public function getAllimg($id,$type=''){
        $query = $this->db->getdata("content_pic",'pid='.(int)$id." and type='".$type."' limit 0,3");
        $found = $query->num_rows;
        $result = array();
        if($found>0){
            $result = $query;
        }
        return $result;
    }
    public function getTypeImage($id,$type=0){
        $query = $this->db->getdata("content_pic",'pid='.(int)$id." and type=".$type." limit 0,3");
        $found = $query->num_rows;
        $result = array();
        $result['num_rows'] = $found;
        if($found>0){
            $result['data'] = $query;
        }
        return $result;
    }
}