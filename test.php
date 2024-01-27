<?

function generate_hot_faces($max_num, $cut_lenght){

global $lang;
global $base_options_row;
$return=array();
	
	$counter=0;
	$sql="SELECT t1.*, t2.folder FROM ".FACES_PREFIX."items AS t1 LEFT JOIN ".PREFIX."pictures AS t2 ON t1.main_picture=t2.id WHERE t1.`status`!='hide' AND t1.show_on_main='1'";
	if(defined("USE_DISJOINED_LANG_VERSIONS") AND USE_DISJOINED_LANG_VERSIONS){
		$sql.=" AND t1.lang_versions LIKE '%-".$lang."-%'";
	};
	$sql.=" ORDER BY RAND() LIMIT 0,".$max_num;
	$result=mysql_query($sql);
	while($element_row=mysql_fetch_array($result)){
		$return[$counter]['id']=$element_row['id'];
		$return[$counter]['title']=$element_row['title_'.$lang];
		if(!empty($element_row['shortitem_'.$lang])){
			$return[$counter]['shortitem']=cut_long_string($element_row['shortitem_'.$lang], $cut_lenght);
		} else {
			$return[$counter]['shortitem']=cut_long_string(strip_tags_smart(decode_special_chars($element_row['fullitem_'.$lang])), $cut_lenght);
		};
		$return[$counter]['datestamp']=$element_row['datestamp'];
		if(!empty($element_row['main_picture'])){
			$return[$counter]['main_picture_folder']=$element_row['folder'];
			$return[$counter]['main_picture_id']=$element_row['main_picture'];
		} else {
			// ����� ��������-��������
			$return[$counter]['main_picture_id']=0;
			$return[$counter]['main_picture_folder']='no_image';
		};
		$counter++;
	};

return $return;
};

function generate_hot_faces_of_show($show, $max_num, $cut_lenght){

global $lang;
global $base_options_row;
$return=array();
	
	$counter=0;
	$sql="SELECT t1.*, t2.folder FROM ".FACES_PREFIX."items AS t1 LEFT JOIN ".PREFIX."pictures AS t2 ON t1.main_picture=t2.id WHERE t1.`status`!='hide' AND shows LIKE '%-".$show."-%'";
	if(defined("USE_DISJOINED_LANG_VERSIONS") AND USE_DISJOINED_LANG_VERSIONS){
		$sql.=" AND t1.lang_versions LIKE '%-".$lang."-%'";
	};
	$sql.=" ORDER BY RAND() LIMIT 0,".$max_num;
	$result=mysql_query($sql);
	while($element_row=mysql_fetch_array($result)){
		$return[$counter]['id']=$element_row['id'];
		$return[$counter]['title']=$element_row['title_'.$lang];
		if(!empty($element_row['shortitem_'.$lang])){
			$return[$counter]['shortitem']=cut_long_string($element_row['shortitem_'.$lang], $cut_lenght);
		} else {
			$return[$counter]['shortitem']=cut_long_string(strip_tags_smart(decode_special_chars($element_row['fullitem_'.$lang])), $cut_lenght);
		};
		$return[$counter]['datestamp']=$element_row['datestamp'];
		if(!empty($element_row['main_picture'])){
			$return[$counter]['main_picture_folder']=$element_row['folder'];
			$return[$counter]['main_picture_id']=$element_row['main_picture'];
		} else {
			// ����� ��������-��������
			$return[$counter]['main_picture_id']=0;
			$return[$counter]['main_picture_folder']='no_image';
		};
		$counter++;
	};

return $return;
};

?>
