<?php
defined( '_VALID_TTH' ) or die( 'Direct Access to this location is not allowed.' );
$order = isset($_GET["order"]) ? intval($_GET["order"]) : "0";
if($order == '1'){
	$_SESSION["order"] = " ORDER BY name ASC ";
}
else{
	$_SESSION["order"] = " ORDER BY thu_tu ASC ";
}
$pid=intval($_GET['pid']);
 $sql_list_loc="SELECT * FROM tbl_list_loc WHERE id_catpd='".$pid."'";						 
				$db_list_loc=$DB->query($sql_list_loc);
				$list_ID_sss="";
				$list_ID_fill="";
				while($r_rows=@mysql_fetch_array($db_list_loc)){				 
				  $list_ID_sss=$list_ID_sss.",".$r_rows['id_cat_fill'];
				   $list_ID_fill=$list_ID_fill.",".$r_rows['id_fill'];
				}
				 
			 $list_list_loc= substr($list_ID_sss,1);	
			 $list_list_fill= substr($list_ID_fill,1);	
			  
			if($pid!=0){
				if($list_list_loc!=""){
					$dk_ppp="AND id_catct IN(".$list_list_loc.")";
				}
				 
			}
	 
?>

<style>


#country-list{  text-align:left !important}
  #suggesstion-khachhang{
	  position:relative;
	  z-index:10;
	  top:40px;
	  }
  #country-list{
	  float:left;list-style:none;margin-top:-3px;padding:0;position: absolute; overflow-y:scroll; height:auto; width:300px; z-index:20; height:280px ; background: #FFF;
	  border:1px solid #eee; border-top:none;
	  }
#country-list li{
	padding: 7px;
	border-bottom: #eee 1px solid;
	width:100%;
	float:left;
	text-align:left;
	}
#country-list li:hover{
	background:#ece3d2;cursor: pointer;
	}
#country-list div{width:100%; float:left; padding:10px  }	
#country-list div h1{font-weight:bold; font-size:18px;color:green; border-bottom:1px solid #eee; margin-top:15px; margin-bottom:10px}	
#country-list div  p{
	margin:0
	}
#search-box{
	padding: 0px;border: #a8d4b1 1px solid;border-radius:4px;
	}
</style>
		
 <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.js"></script>
 <?php 
	  
	    $sql_fill_cat="SELECT * FROM tbl_cat_fill WHERE active=1 $dk_ppp ORDER BY thu_tu ASC, id_catct DESC";
  $a_fill_cat=$DB->query($sql_fill_cat);
  while ($b_fill_cat=mysql_fetch_array($a_fill_cat)){
	  
	  $idc=$b_fill_cat['id_catct'];
	  
	  ?>
	 <script>
	 
	 
  $(document).ready(function () {
	  
	 
  var e = document.getElementById('search-product<?=$idc?>');
      e.autocomplete = 'off'; // Maybe should be false
  // thong tin khach hang
      $("#search-product<?=$idc?>").bind('click keyup', function(event) {
		//$("#search-product<?=$idc?>").keyup(function(){			
			$.ajax({
			type: "POST",
			url: "search_opp.php",
			data:'keyword='+$(this).val()+'&pid=<?=$pid?>&cid='+$(this).attr("data-id"),
			beforeSend: function(){
				$("#search-product<?=$idc?>").css("background","#FFF");
			},
			success: function(data){
				$("#suggesstion-khachhang<?=$idc?>").show();
				$("#suggesstion-khachhang<?=$idc?>").html(data);
				$("#search-product<?=$idc?>").css("background","#FFF");
			}
			});
		});
		
		$("#body").click(function(){
        $("#suggesstion-khachhang<?=$idc?>").hide();
        });		
		 
  
  });
  function selectkhachhang<?=$idc?>(name,id) {
	$("#search-product<?=$idc?>").val(name);
	$("#search_cat<?=$idc?>").val(id); 
	$("#suggesstion-khachhang<?=$idc?>").hide();
  }
  
 




 

  </script>
  <?php

  }
?>


<table id="body" border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' width='100%'>
	<tr>
		<td>
			<table cellpadding='0' cellspacing='0' border='0' width='100%'>
				<tr>
					<td width='18'><img src='images/lefttitle.gif'></td>
					<td background='images/bgtitle.gif' align="center"><font class="adminTitle2">Qu&#7843;n l&#253; th&#244;ng tin s&#7843;n ph&#7849;m</font></td>
					<td width='18'><img src='images/righttitle.gif'></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td align="center">
			<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#CCCCCC' width='100%'>
				<tr>
					<td>
					<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#9999FF' width='100%'>
					<tr>
						<td width="10%">
							<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#9999FF' width='100%'>
							<tr>
								<td width="10">&nbsp;</td>
								<td width="10"><img src='images/homeicon.gif' border='0'></td>
								<td width="3">&nbsp;</td>
								<td>
								<?php
								$navigator="<a href='main.php?act=catpd&pid=0'>Root</a> > ";
								$dk=intval($_GET['pid']);
								$ct=new catpd_tree($dk);
								$ct->get_catpd_tree();	
								$ct->get_catpd_string_admin($dk);
								$navigator.=$catpdstring2;								
								echo $navigator;
								
								?>
								</td>
							</tr>
							</table>
						</td>
						<td width="70%" align="right">
							<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#9999FF'>
							<tr>
								<td onmouseover="navBar(this,1,1)" onmouseout="navBar(this,0,1)">
									<table border='0' cellpadding='2' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#9999FF'>
									<tr>
										<td width="10"><a href="main.php?act=catpd&code=30"><img src="images/search.png" border="0"></a></td>
										<td width="80"><a href="main.php?act=catpd&code=30">T&#236;m ki&#7871;m</a></td>
									</tr>
									</table>
								</td>
								<td width="5">&nbsp;</td>				
							
								<td onmouseover="navBar(this,1,1)" onmouseout="navBar(this,0,1)">
									<table border='0' cellpadding='2' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#9999FF'>
									<tr>
										<td width="10"><a href="main.php?act=catpd&code=01&pid=<?=intval($_GET['pid'])?>"><img src="images/new_cat.png" border="0"></a></td>
										<td width="140"><a href="main.php?act=catpd&code=01&pid=<?=intval($_GET['pid'])?>">Thêm chủng loại</a></td>
									</tr>
									</table>
								</td>
								<td width="5">&nbsp;</td>
								<td onmouseover="navBar(this,1,1)" onmouseout="navBar(this,0,1)">
									<table border='0' cellpadding='2' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#9999FF'>
									<tr>
										<td width="10"><a href="main.php?act=catpd&code=21&pid=<?=intval($_GET['pid'])?>"><img src="images/new_news.png" border="0"></a></td>
										<td width="140"><a href="main.php?act=catpd&code=21&pid=<?=intval($_GET['pid'])?>">Thêm mới</a></td>
									</tr>
									</table>
								</td>
							 	<td width="5">&nbsp;</td><td onmouseover="navBar(this,1,1)" onmouseout="navBar(this,0,1)">
									<table border='0' cellpadding='2' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#9999FF'>
									<tr>
										<td >
										  <ul class="breadcrumb">
											<li><span class="divider">  <a href="main.php?act=tbl_hangsx&code=01" class='btn btn-default'> Quản lý Hãng sản xuất</a> </li>
								<li><span class="divider"> <a href="main.php?act=tbl_cat_fill&code=01" class='btn btn-default'> Quản lý danh mục lọc</a> </li>
								<!--<li><span class="divider">  <a href="main.php?act=tbl_list_fill&code=01" class='btn btn-default'> Quản lý danh sách lọc</a> </li>-->
								<li><span class="divider"> <a href="main.php?act=tbl_price&code=01" class='btn btn-default'> Quản lý khoảng giá</a> </li>
								</ul>
								
										</td>
									</tr>
									</table>
								</td> 
								<td width="5">&nbsp;</td>						
							</tr>
							
							</table>
						</td>
					</table>
					
					</td>
				</tr>
				<tr>
					<td align="center">
						<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; color: #000080; font-size: 10pt; font-family: Arial' bordercolor='#9999FF' width='98%'>
							<tr>
								<td>				
<?php
require ("../lib/upload.php");
require ("../lib/imaging.php");
require ("skin/skin_catpd.php");
include_once("../CKeditor/ckeditor.php");

function showlist()
{
	global $DB,$info,$catpdstring2,$tree,$CONFIG;
	$info['root']="<a href='main.php?act=catpd&pid=0'>Root</a> > ";
	if ($_GET['pid'])
	{
		$dk=intval($_GET['pid']);
		$info['root'].=$catpdstring2;
	}
	else
	{
		$dk=0;
	}
	
	
	$sql="Select * from catpd where parentid=$dk order by thu_tu asc,id_catpd desc";
	$a=$DB->query($sql);
	$info=array();
	if (mysql_num_rows($a))
	{
		show_catpd_list_h();
		while ($b=mysql_fetch_array($a))
		{
			$info['id_catpd']=$b['id_catpd'];
			
			$sql_key="Select * from tbl_key where  id='".$b['id_catpd']."' AND theloai=1";
	        $a_key=$DB->query($sql_key);
			$b_key=mysql_fetch_array($a_key);
			 
			
			
			$info['name']="<a href='main.php?act=catpd&pid=".$info['id_catpd']."'>".$b['name']."</a> <br> <input type='text' value='".$b_key['id_key']."' style='width:100%'>";
			$info['active']=$b['active'];
			if ($info['active'])
				$info['status']="Deactive";
			else
				$info['status']="Active";		
			$info['thu_tu']=$b['thu_tu'];
			show_catpd_cell($info);
		}
		show_catpd_list_f();
	}
	//product
	//Kiem tra dieu kien search va phan trang
	$txtsearch=$_GET['txtsearch'];
	$maxdp=intval($_GET['maxdp']);
	$pid=intval($_GET['pid']);
	if (!$maxdp)
	{
		$maxdp=10;
	}
	$dkproduct="";
	$dkproduct="where id_catpd=".$pid." ";
	if ($txtsearch)
	{
		$dkproduct.=" and product.name like '%".$txtsearch."%'";
	}			
	//Phan trang
	$sql="select count(*) as dem from product $dkproduct order by thu_tu asc,id_product desc";
	$a=mysql_fetch_array($DB->query($sql));
	$dem=$a['dem'];
	$str="";
	if ($dem==0)
	{
		$str="";
	}
	else
	{
		$so_trang=ceil($dem/$maxdp);
		if ($so_trang>1)
		{
			$str="Trang: ";
			for ($i=1;$i<=$so_trang;$i++)
			{
				if ($_GET['p']==$i or (!$_GET['p'] and ($i==1))) 
				{
					$str=$str."&nbsp;<font color='#ff0000'>[<b>".$i."</b>]</font>";
				}
				else
				{
					if ($txtsearch)
						$pagesearch="&txtsearch=".$txtsearch;
					$str.="&nbsp;<a href='main.php?act=catpd&code=00&pid=".intval($_GET['pid'])."&maxdp=".$maxdp.$pagesearch."&p=".$i."'>".$i."</a>";
				}
			}
		}
				
		$page=intval($_GET['p']);
		if ($page>0) $page--;
		$bg=$page*$maxdp;
		$dklimit=" limit ".$bg.",".$maxdp;
	}
	$info['dem']=$dem;
	$info['navpage']=$str;
	$str="";
	//het phan phan trang 
	//Lay hop select cac muc
	$info['showcatpds'] .= '<select name="pid" style="WIDTH: 220px" >';
	$info['showcatpds'] .= '<option value="0">Root</option>';
	if($tree){
		foreach($tree as $k => $v) {
			foreach($v as $i => $j) {
				$selectstr='';
				if (intval($_GET['pid'])==$k)
					$selectstr=" selected ";
				$info['showcatpds'] .= '<option value="' . $k . '"'.$selectstr.'>' . $j . '</option>';
			}
		}
	}
	$info['showcatpds'] .= '</select>';
	
	//Hien thi danh sach
	$sql="Select product.*,users.name as user_name from product left join users on (product.id_user=users.id_users) $dkproduct ".$_SESSION["order"].",id_product desc $dklimit";
	$a=$DB->query($sql);
	$i=0;
	$info['dem_i']=mysql_num_rows($a);
	show_product_list_h($info);
	while ($b=mysql_fetch_array($a))
	{
		$i++;
		$info['i']=$i;
		$info['id_product']=$b['id_product'];
		$info['thu_tu']=$b['thu_tu'];
		if($b['image']!=""){
		$info['hinhanh']="<img src='../upload/images/".$b['image']."' width=50 >";
		}
		$info['active']=$b['active'];
		if ($info['active'])
			$info['status']="Deactive";
		else
			$info['status']="Active";
		
		$sql_key="Select * from tbl_key where  id='".$b['id_product']."' AND theloai=2";
	        $a_key=$DB->query($sql_key);
			$b_key=mysql_fetch_array($a_key);
		
		
		$info['name']=$b['name']."<br> <input type='text' value='".$b_key['id_key']."' style='width:100%'>";
		$info['user_name']=$b['user_name'];
		$info['ngay_dang']=date($CONFIG['date_format'].' '.$CONFIG['time_format'],$b['ngay_dang']);
		
			
		// -- hien tong so binh luan cua tin --
		$sql_com="select * from commentproduct where id_product='".$b['id_product']."' ";
		$a_com=$DB->query($sql_com);
		$b_com=mysql_fetch_array($a_com);
		$dem_bl=mysql_num_rows($a_com);
		$info['binhluan']=$dem_bl;
		//////////////////////////////////////
		
		show_product_cell($info);
	}
	//$info['dem_i']=$i;
	show_product_list_f($info);	
}
function spmoi(){
	global $DB,$tree;
	//Kiem tra dieu kien search va phan trang
	if(isset($_POST["sapxep"]) && isset($_POST["thu_tu2"])){
		foreach($_POST["thu_tu2"] as $key=>$val){
			$str_order = "UPDATE product SET thu_tu2='".$val."' WHERE id_product='".$key."';";
			$DB->query($str_order);
		}
		show_message("Change orders successfully !");
	}
	$txtsearch=$_GET['txtsearch'];
	$maxdp=intval($_GET['maxdp']);
	$pid=intval($_GET['pid']);
	if (!$maxdp)
	{
		$maxdp=10;
	}
	$dkproduct="";
	$dkproduct="where id_catpd=".$pid." ";
	if ($txtsearch)
	{
		$dkproduct.=" and product.name like '%".$txtsearch."%'";
	}			
	//Phan trang
	$sql="select count(*) as dem from product $dkproduct AND home='1' order by thu_tu2 asc,id_product desc";
	$a=mysql_fetch_array($DB->query($sql));
	$dem=$a['dem'];
	$str="";
	if ($dem==0)
	{
		$str="";
	}
	else
	{
		$so_trang=ceil($dem/$maxdp);
		if ($so_trang>1)
		{
			$str="Trang: ";
			for ($i=1;$i<=$so_trang;$i++)
			{
				if ($_GET['p']==$i or (!$_GET['p'] and ($i==1))) 
				{
					$str=$str."&nbsp;<font color='#ff0000'>[<b>".$i."</b>]</font>";
				}
				else
				{
					if ($txtsearch)
						$pagesearch="&txtsearch=".$txtsearch;
					$str.="&nbsp;<a href='main.php?act=catpd&code=40&pid=".intval($_GET['pid'])."&maxdp=".$maxdp.$pagesearch."&p=".$i."'>".$i."</a>";
				}
			}
		}
				
		$page=intval($_GET['p']);
		if ($page>0) $page--;
		$bg=$page*$maxdp;
		$dklimit=" limit ".$bg.",".$maxdp;
	}
	$info['dem']=$dem;
	$info['navpage']=$str;
	$str="";
	//het phan phan trang 
	//Lay hop select cac muc
	$info['showcatpds'] .= '<select name="pid" style="WIDTH: 220px" >';
	$info['showcatpds'] .= '<option value="0">Root</option>';
	if($tree){
		foreach($tree as $k => $v) {
			foreach($v as $i => $j) {
				$selectstr='';
				if (intval($_GET['pid'])==$k)
					$selectstr=" selected ";
				$info['showcatpds'] .= '<option value="' . $k . '"'.$selectstr.'>' . $j . '</option>';
			}
		}
	}
	$info['showcatpds'] .= '</select>';
	//Hien thi danh sach
	$sql="Select product.*,users.name as user_name from product left join users on (product.id_user=users.id_users) $dkproduct AND home='1' ".$_SESSION["order"].",thu_tu2 ASC, id_product desc $dklimit";
	$a=$DB->query($sql);
	$i=0;
	$info['dem_i']=mysql_num_rows($a);
	show_product_list_h2($info);
	while ($b=mysql_fetch_array($a))
	{
		$i++;
		$info['i']=$i;
		$info['id_product']=$b['id_product'];
		$info['thu_tu2']=$b['thu_tu2'];
		$info['active']=$b['active'];
		if ($info['active'])
			$info['status']="Deactive";
		else
			$info['status']="Active";
		
		$info['name']=$b['name'];
		$info['user_name']=$b['user_name'];
		$info['ngay_dang']=date($CONFIG['date_format'].' '.$CONFIG['time_format'],$b['ngay_dang']);
		show_product_cell2($info);
	}
	//$info['dem_i']=$i;
	show_product_list_f2($info);	
}
function sapxep(){
	global $DB;
	foreach($_POST["thu_tu2"] as $key=>$val){
		$str_order = "UPDATE product SET thu_tu2='".$val."' WHERE id_product='".$key."';";
		$DB->query($str_order);
	}
	show_message("Change orders successfully !");
	showlist();
}
function showportal()
{
	global $tree,$info;
	$info['parentid']='';
	//$ct=new catpd_tree;
	//$ct->get_catpd_tree();
	$info['parentid'] .= '<select name="parentid" style="WIDTH: 220px" >';
	$info['parentid'] .= '<option value="0">Root</option>';
	if($tree){
		foreach($tree as $k => $v) {
			foreach($v as $i => $j) {
				$selectstr='';
				if ($_GET['pid']==$k)
					$selectstr=" selected ";
				$info['parentid'] .= '<option value="' . $k . '"'.$selectstr.'>' . $j . '</option>';
			}
		}
	}
	$info['parentid'] .= '</select>';
	show_catpd_post_form();
	showlist();
}	
//FUNCTION FOR SEARCH
function init_search_form()
{
	global $DB,$info,$catpdstring2,$tree,$CONFIG;
	//Kiem tra dieu kien search va phan trang
	$txtsearch=$_GET['txtsearch'];
	$searchgt=$_GET['searchgt'];
	$idcatpd=intval($_GET['idcatpd']);
	$iduser=intval($_GET['iduser']);
	$fd=intval($_GET['fd']);
	$fm=intval($_GET['fm']);
	$fy=intval($_GET['fy']);
	$td=intval($_GET['td']);
	$tm=intval($_GET['tm']);
	$ty=intval($_GET['ty']);	
	if (!$td)
	{
		$td=date("j",time()+$CONFIG['time_offset']);
	}
	if (!$tm)
	{
		$tm=date("n",time()+$CONFIG['time_offset']);
	}
	if (!$ty)
	{
		$ty=date("Y",time()+$CONFIG['time_offset']);
	}	
		
	
	$info['txtsearch']=$txtsearch;
	if ($searchgt)
	{
		$info['check_searchgt']="checked";
	}
	//Lay hop select cac muc
	
	$info['showcatpds'] .= '<select name="idcatpd" style="WIDTH: 220px" >';
	$info['showcatpds'] .= '<option value="-1">T&#7845;t c&#7843; c&#225;c ch&#7911;ng lo&#7841;i</option>';
	$info['showcatpds'] .= '<option value="0">Root</option>';
	if($tree){
		foreach($tree as $k => $v) {
			foreach($v as $i => $j) {
				$selectstr='';
				if ($idcatpd==$k)
					$selectstr=" selected ";
				$info['showcatpds'] .= '<option value="' . $k . '"'.$selectstr.'>' . $j . '</option>';
			}
		}
	}
	$info['showcatpds'] .= '</select>';
	//Users
	$info['showusers']='<select name="iduser" style="WIDTH: 220px" >';
	$info['showusers'] .= '<option value="-1">T&#7845;t c&#7843; ng&#432;&#7901;i &#273;&#259;ng</option>';
	$sql="select * from users order by id_users asc";
	$a=$DB->query($sql);
	while ($b=mysql_fetch_array($a))
	{
		$info['showusers'].="<option value='".$b['id_users']."'";
		if ($iduser==$b['id_users'])
			$info['showusers'].=" selected";
		$info['showusers'].=">".$b['name']."</option>";
	}
	$info['showusers'].="</select>";
	
	
	//From
	$info['showfrom']="";
	$info['showfrom'].="Ng&#224;y: <select name='fd'>";
	for ($i=1;$i<=31;$i++)
	{
		$info['showfrom'].="<option value='".$i."'";
		if ($i==$fd)
			$info['showfrom'].=" selected";
		$info['showfrom'].=">".$i."</option>";
	
	}
	$info['showfrom'].="</select>";
	$info['showfrom'].="&nbsp;Th&#225;ng: <select name='fm'>";
	for ($i=1;$i<=12;$i++)
	{
		$info['showfrom'].="<option value='".$i."'";
		if ($i==$fm)
			$info['showfrom'].=" selected";
		$info['showfrom'].=">".$i."</option>";
	
	}
	$info['showfrom'].="</select>";
	$info['showfrom'].="&nbsp;N&#259;m: <select name='fy'>";
	for ($i=1990;$i<=date("Y",time()+$CONFIG['time_offset']);$i++)
	{
		$info['showfrom'].="<option value='".$i."'";
		if ($i==$fy)
			$info['showfrom'].=" selected";
		$info['showfrom'].=">".$i."</option>";
	
	}
	$info['showfrom'].="</select>";	
	//To
	$info['showto']="";
	$info['showto'].="Ng&#224;y: <select name='td'>";
	for ($i=1;$i<=31;$i++)
	{
		$info['showto'].="<option value='".$i."'";
		if ($i==$td)
			$info['showto'].=" selected";
		$info['showto'].=">".$i."</option>";
	
	}
	$info['showto'].="</select>";
	$info['showto'].="&nbsp;Th&#225;ng: <select name='tm'>";
	for ($i=1;$i<=12;$i++)
	{
		$info['showto'].="<option value='".$i."'";
		if ($i==$tm)
			$info['showto'].=" selected";
		$info['showto'].=">".$i."</option>";
	
	}
	$info['showto'].="</select>";
	$info['showto'].="&nbsp;N&#259;m: <select name='ty'>";
	for ($i=1990;$i<=date("Y",time()+$CONFIG['time_offset']);$i++)
	{
		$info['showto'].="<option value='".$i."'";
		if ($i==$ty)
			$info['showto'].=" selected";
		$info['showto'].=">".$i."</option>";
	
	}
	$info['showfrom'].="</select>";	
	//show form
	showsearchform($info);
	
}
function process_search()
{
	global $DB,$info,$catpdstring2,$tree,$CONFIG;
	//Kiem tra dieu kien search va phan trang
	$txtsearch=$_GET['txtsearch'];
	$searchgt=$_GET['searchgt'];
	$idcatpd=intval($_GET['idcatpd']);
	$iduser=intval($_GET['iduser']);
	$maxdp=intval($_GET['maxdp']);
	$fd=intval($_GET['fd']);
	$fm=intval($_GET['fm']);
	$fy=intval($_GET['fy']);
	$td=intval($_GET['td']);
	$tm=intval($_GET['tm']);
	$ty=intval($_GET['ty']);	
	$timefrom=mktime(0,0,0,$fm,$fd,$fy);
	$timeto=mktime(24,60,60,$tm,$td,$ty);
	
	$dksearch="";
	
	if ($txtsearch)
	{
		if (!$dksearch)
		{
			$dksearch.=" where";
		}
		else
		{
			$dksearch.=" and";
		}
		$dksearch.=" (product.name like '%".$txtsearch."%'";
		if ($searchgt)
		{
			$dksearch.=" or gioi_thieu like '%".$txtsearch."%' or noi_dung like '%".$txtsearch."%'"; 
		}
		$dksearch.=")";
	}
	
	if ($idcatpd>0)
	{
		if (!$dksearch)
		{
			$dksearch.=" where";
		}
		else
		{
			$dksearch.=" and";
		}
	
		$dksearch.=" id_catpd=".$idcatpd;
	}
	if ($iduser>0)
	{
		if (!$dksearch)
		{
			$dksearch.=" where";
		}
		else
		{
			$dksearch.=" and";
		}
	
	
		$dksearch.=" id_user=".$iduser;
	}
	if ($timeto>=$timefrom)
	{
		if (!$dksearch)
		{
			$dksearch.=" where";
		}
		else
		{
			$dksearch.=" and";
		}
	
		$dksearch.=" (ngay_dang>=".$timefrom." and ngay_dang<=".$timeto.")";
	}
		
	
	//Phan trang
	if (!$maxdp)
	{
		$maxdp=10;
	}
	
	$sql="select count(*) as dem from product $dksearch order by thu_tu asc,id_product desc";
	$a=mysql_fetch_array($DB->query($sql));
	$dem=$a['dem'];
	$str="";
	if ($dem==0)
	{
		$str="";
	}
	else
	{
		$so_trang=ceil($dem/$maxdp);
		if ($so_trang>1)
		{
			$str="Trang: ";
			for ($i=1;$i<=$so_trang;$i++)
			{
				if ($_GET['p']==$i or (!$_GET['p'] and ($i==1))) 
				{
					$str=$str."&nbsp;<font color='#ff0000'>[<b>".$i."</b>]</font>";
				}
				else
				{
					if ($txtsearch)
						$pagesearch="&txtsearch=".$txtsearch;
					$str.="&nbsp;<a href='main.php?act=catpd&code=31&txtsearch=".$txtsearch."&searchgt=".$searchgt."&idcatpd=".$idcatpd."&iduser=".$iduser."&fd=".$fd."&fm=".$fm."&fy=".$fy."&td=".$td."&tm=".$tm."&ty=".$ty."&maxdp=".$maxdp.$pagesearch."&p=".$i."'>".$i."</a>";
				}
			}
		}
				
		$page=intval($_GET['p']);
		if ($page>0) $page--;
		$bg=$page*$maxdp;
		$dklimit=" limit ".$bg.",".$maxdp;
	}
	$info['dem']=$dem;
	$info['navpage']=$str;
	$str="";
	//het phan phan trang 
	//Hien thi danh sach
	
	init_search_form();
	
	search_show_product_list_h($info);
	$sql="Select product.*,users.name as user_name from product left join users on (product.id_user=users.id_users) $dksearch order by id_product desc $dklimit";
	$a=$DB->query($sql);
	while ($b=mysql_fetch_array($a))
	{
		$info['id_product']=$b['id_product'];
		$info['id_catpd']=$b['id_catpd'];
		$info['thu_tu']=$b['thu_tu'];
		$info['active']=$b['active'];
		if ($info['active'])
			$info['status']="Deactive";
		else
			$info['status']="Active";
		
		$info['name']=$b['name'];
		$info['user_name']=$b['user_name'];
		$info['ngay_dang']=date($CONFIG['date_format'].' '.$CONFIG['time_format'],$b['ngay_dang']);
		search_show_product_cell($info);
	}
	search_show_product_list_f($info);	
	
}
//END FUNCTION FOR SEARCH => 03
if (($_GET['code']=='00') or !$_GET['code'])
{
	showlist();
}
if ($_GET['code']=='01')
{
	///////////////// them danh sach hang sx : date by hoipro: 8/5/2018
			// lay danh sach
			    $sql_list_price="SELECT * FROM tbl_list_price WHERE id_catpd='".$pid."'";						 
				$db_list_price=$DB->query($sql_list_price);
				$list_ID_sss="";
				while($r_rows=@mysql_fetch_array($db_list_price)){				 
				  $list_ID_sss=$list_ID_sss.",".$r_rows['id_price'];
				   
				}
				 
			 $list_list_price= substr($list_ID_sss,1);	
			if($pid!=0){
				if($list_list_price!=""){
					$dk_khoanggia="AND id_catct IN(".$list_list_price.")";
				}
				}
					/////////////
			/////////////
		
		$sql_options_khoanggia="Select * from tbl_price WHERE active=1 $dk_khoanggia  order by thu_tu asc";
		$c_options_khoanggia=$DB->query($sql_options_khoanggia);
		while($d_options_khoanggia=mysql_fetch_array($c_options_khoanggia)){
		   $info['options_khoanggia'].="<div class='cat-price'><input type='checkbox' value='".$d_options_khoanggia["id_catct"]."' name='modules_khoanggia[]' /> ".$d_options_khoanggia["name"]."</div>";
		}
			/////////////
			/////////////
	
	
	    ///////////////// them danh sach hang sx : date by hoipro: 8/5/2018
			// lay danh sach
			$sql_list_hangsx="SELECT * FROM tbl_list_hangsx WHERE id_catpd='".$pid."'";						 
			$db_list_hangsx=$DB->query($sql_list_hangsx);
			$list_ID_sss="";
			while($r_rows=@mysql_fetch_array($db_list_hangsx)){				 
			  $list_ID_sss=$list_ID_sss.",".$r_rows['id_hangsx'];
			   
			}
				 
			$list_list_hangsx= substr($list_ID_sss,1);	
			if($pid!=0){
				if($list_list_hangsx){
					$dk_ppp="AND id_catct IN(".$list_list_hangsx.")";
				}
				}			 
			/////////////
			/////////////
			/////////////
			/////////////
			/////////////
		
		$sql_hangsanxuat="Select * from tbl_hangsx WHERE active=1 $dk_ppp  order by thu_tu asc";
		$c_hangsanxuat=$DB->query($sql_hangsanxuat);
		while($d_hangsanxuat=mysql_fetch_array($c_hangsanxuat)){
		   $info['hangsanxuat'].="<div class='cat-hangsx'  ><input type='checkbox' value='".$d_hangsanxuat["id_catct"]."' name='modules_hangsanxuat[]' /> ".$d_hangsanxuat["name"]."</div>";
		}
		
	//  quan ly bo loc thuoc tinh hoitv 
		$sql_cat_fill="Select * from tbl_cat_fill WHERE active=1   AND (fil=1 or fil=3)  order by thu_tu asc";
		$c_cat_fill=$DB->query($sql_cat_fill);
		$info['options_fill'].="<div>
		
		
		
		";
		while($d_cat_fill=mysql_fetch_array($c_cat_fill)){
			$info['options_fill'].="
			<script type='text/javascript'>
	function checkAll".$d_cat_fill["id_catct"]."( n ) {
		var f = document.catpd;
		var c = f.toggle".$d_cat_fill["id_catct"].".checked;
		var n2 = 0;
		for (i=1; i <= n; i++) {
			cb".$d_cat_fill["id_catct"]." = eval( 'f.cb".$d_cat_fill["id_catct"]."' + i );
			if (cb".$d_cat_fill["id_catct"].") {
				cb".$d_cat_fill["id_catct"].".checked = c;
				n2++;
			}
		}
		if (c) {
			document.catpd.boxchecked".$d_cat_fill["id_catct"].".value = n2;
		} else {
			document.catpd.boxchecked".$d_cat_fill["id_catct"].".value = 0;
		}
	}
	 
	</script>
	<input type='hidden' name='boxchecked".$d_cat_fill["id_catct"]."' value='0'>
			
			 ";
		   // sub
		    $sql_list_fill="Select * from tbl_list_fill WHERE active=1  AND id_cat_fill=".$d_cat_fill["id_catct"]." AND (fil=1 or fil=3)  order by thu_tu asc";
			$c_list_fill=$DB->query($sql_list_fill);
			$num_fill=mysql_num_rows($c_list_fill);
			////
			$info['options_fill'].="<div style='width:20%; float:left; margin-right:10px; margin-bottom:20px;background-color:#eee' >";
		   $info['options_fill'].="<div class='cat-fill3'  ><input type='checkbox' value='".$d_cat_fill["id_catct"]."' name='toggle".$d_cat_fill["id_catct"]."' onClick='checkAll".$d_cat_fill["id_catct"]."(".$num_fill.");' /> ".$d_cat_fill["name"]."</div>";
			////
			$iii=1;
			while($d_list_fill=mysql_fetch_array($c_list_fill)){
			   $info['options_fill'].="<div style='color:blue;float:left; margin-right:25px; padding:3px;width:100% '><input type='checkbox' value='".$d_list_fill["id_catct"]."' name='modules_list_fill[]'  id='cb".$d_cat_fill["id_catct"]."".$iii."' /> ".$d_list_fill["name"]."</div>";
			   $iii++;
			}
			$info['options_fill'].="</div>";
		}
		$info['options_fill'].="</div>";
// end 

//  quan ly bo loc thuoc tinh hoitv 

	 
		 
// end 
	
	showportal();
}
if ($_GET['code']=='02')
{
	$in_name=stripslashes($_POST['name']);
	if ($in_name)
	{
		$a=array(
					'name'=>$in_name,
				);
				
		if ($_FILES['image']['size'])
		{
			$in_image=get_new_file_name($_FILES['image']['name'],"cproduct_");
			$file_upload=new Upload($CONFIG['root_path'].$CONFIG['upload_image_path'],'jpg,gif,png');
			if ($file_upload->upload_file('image',2,$in_image))
			{
				//Da upload thanh cong
				//Tao thumbnail
				$a['image']=$file_upload->file_name;
			}
			else
			{
				$msg.=$file_upload->get_upload_errors()."<br>";
			}			
		}
 
		
		
		$a['title']=compile_post('title');
		$a['keywords']=compile_post('keywords');
		$a['description']=compile_post('description');
		$a['tailieu']=compile_post('tailieu');
		$a['masanpham']=compile_post('masanpham');
		$a['soluong']=compile_post('soluong');
		$a['thuoctinh1']=compile_post('thuoctinh1');
		$a['thuoctinh2']=compile_post('thuoctinh2');
		$a['thuoctinh3']=compile_post('thuoctinh3');
		$a['thuoctinh4']=compile_post('thuoctinh4');
		$a['thuoctinh5']=compile_post('thuoctinh5');
		$a['thuoctinh6']=compile_post('thuoctinh6');
		$a['thuoctinh7']=compile_post('thuoctinh7');
		$a['thuoctinh8']=compile_post('thuoctinh8');
		$a['mode']=compile_post('mode');
		$a['lienkethang']=compile_post('lienkethang');
		$a['en_name']=compile_post('en_name');
		$a['thu_tu']=compile_post('thu_tu');
		$a['noi_dung']=stripslashes($_POST["noi_dung"]);
		$a['video']=stripslashes($_POST["video"]);
		$a['cam_ket']=stripslashes($_POST["cam_ket"]);
		$a['giay_phep']=stripslashes($_POST["giay_phep"]);
		$a['trang_chu']=intval(compile_post('trang_chu'));
		$a['parentid']=compile_post('parentid');
		$b=$DB->compile_db_insert_string($a);
		$sql="INSERT INTO catpd (".$b['FIELD_NAMES'].") VALUES (".$b['FIELD_VALUES'].")";
		$DB->query($sql);
		
		 //////////////////////////
		 ///////////////////////
		 ///////////////////////
		 ///////////////////////
			 $product_id = mysql_insert_id();
			 $a_key=array();
		
			$id_key=id_key(trim(compile_post('id_key')));	

			$sql_num_folder="Select * from tbl_key where  id_key='".$id_key."' ";
	        $a_num_folder=$DB->query($sql_num_folder);
			$num_r_folder=mysql_num_rows($a_num_folder);

			if($num_r_folder==0){
			 $a_key['id_key'] = $id_key;
			 $a_key['theloai'] = "1";
			 $a_key['id'] = $product_id;
			 
			  
				$b_key=$DB->compile_db_insert_string($a_key);
				$sql_key="INSERT INTO tbl_key (".$b_key['FIELD_NAMES'].") VALUES (".$b_key['FIELD_VALUES'].")";
				$DB->query($sql_key);
			 
			}else{
				
							echo '<script>alert("Key đã được đăng ký");location.href="main.php?act=catpd&code=00"</script>';
						die;
			}
			



		
		show_message("Th&#234;m m&#7899;i Ch&#7911;ng lo&#7841;i th&#224;nh c&#244;ng !");
	}
	else
	{
		show_message("Kh&#244;ng c&#243; d&#7919; li&#7879;u &#273;&#7847;u v&#224;o ! H&#227;y th&#7917; l&#7841;i !");
	}
	showlist();
}
if ($_GET['code']=='03')
{
	$id=intval($_GET['id']);
	if ($id)
	{
		$sql="Select * from catpd where id_catpd=".$id;
		$a=$DB->query($sql);
		if ($b=mysql_fetch_array($a))
		{
			$info['id_catpd']=$id;
			$info['name']=$b['name'];
			$info['en_name']=$b['en_name'];
			$info['image']=$b['image'];
			
			if ($info['image'])
			{
					$info['image']="<img src='../".$CONFIG['upload_image_path'].$info['image']."'><br><input type='checkbox' name='xoa_anh' value='1' class='noborder'>&nbsp;X&#243;a &#7843;nh<br><br>";
			}
			
			$info['title']=$b['title'];
			$info['keywords']=$b['keywords'];
			$info['description']=$b['description'];
			$info['tailieu']=$b['tailieu'];
			$info['masanpham']=$b['masanpham'];
			$info['mode']=$b['mode'];
			$info['lienkethang']=$b['lienkethang'];
			$info['soluong']=$b['soluong'];
			$info['thuoctinh1']=$b['thuoctinh1'];
			$info['thuoctinh2']=$b['thuoctinh2'];
			$info['thuoctinh3']=$b['thuoctinh3'];
			$info['thuoctinh4']=$b['thuoctinh4'];
			$info['thuoctinh5']=$b['thuoctinh5'];
			$info['thuoctinh6']=$b['thuoctinh6'];
			$info['thuoctinh7']=$b['thuoctinh7'];
			$info['thuoctinh8']=$b['thuoctinh8'];
			
			$info['thu_tu']=$b['thu_tu'];
			$info['parentid1']=$b['parentid'];
			$info['noi_dung']=$b["noi_dung"];
			$info['trang_chu']=$b["trang_chu"];
			$info['video']=$b["video"];
			$info['cam_ket']=$b["cam_ket"];
			$info['giay_phep']=$b["giay_phep"];
			
			$sql_key="Select * from tbl_key where  id='".$b['id_catpd']."' AND theloai=1";
	        $a_key=$DB->query($sql_key);
			$b_key=mysql_fetch_array($a_key);
			
			$info['id_key']=$b_key['id_key'];
			
			//$ct=new catpd_tree;
			//$ct->get_catpd_tree();
			$info['parentid'] .= '<select name="parentid" style="WIDTH: 220px" >';
			$info['parentid'] .= '<option value="0">Root</option>';
			if($tree){
				foreach($tree as $k => $v) {
					foreach($v as $i => $j) {
						$selectstr='';
						if ($info['parentid1']==$k)
							$selectstr=" selected ";
						$info['parentid'] .= '<option value="' . $k . '"'.$selectstr.'>' . $j . '</option>';
					}
				}
			}
			$info['parentid'] .= '</select>';
			
			
			///////////////// them danh sach hang sx : date by hoipro: 8/5/2018
			// lay danh sach
			    $sql_list_hangsx="SELECT * FROM tbl_list_hangsx WHERE id_catpd='".$b['parentid']."'";						 
				$db_list_hangsx=$DB->query($sql_list_hangsx);
				$list_ID_sss="";
				while($r_rows=@mysql_fetch_array($db_list_hangsx)){				 
				  $list_ID_sss=$list_ID_sss.",".$r_rows['id_hangsx'];
				   
				}
				 
			 $list_list_hangsx= substr($list_ID_sss,1);	
			if($pid!=0){
					if($list_list_hangsx!=""){
					$dk_ppp="AND id_catct IN(".$list_list_hangsx.")";
					}
				}			 
			/////////////
			/////////////
			/////////////
			/////////////
			/////////////
			
			
	   
	    $sql_hangsanxuat_list="select * from tbl_list_hangsx where id_catpd=".$b['id_catpd'];
		$x_hangsanxuat_list=$DB->query($sql_hangsanxuat_list);
		$i=0;
		$modules_hangsanxuat=array();
		while ($y_hangsanxuat_list=mysql_fetch_array($x_hangsanxuat_list))
		{
			$modules_hangsanxuat[$i]=$y_hangsanxuat_list['id_hangsx'];
			$i++;
		}
	
	
	
		$sql_hangsanxuat="Select * from tbl_hangsx WHERE active=1 $dk_ppp order by thu_tu asc";
		$c_hangsanxuat=$DB->query($sql_hangsanxuat);
		while($d_hangsanxuat=mysql_fetch_array($c_hangsanxuat)){		 
		   $info['hangsanxuat'].="<div class='cat-hangsx' style=''><input type='checkbox' value='".$d_hangsanxuat["id_catct"]."' name='modules_hangsanxuat[]' ";
					   
					   if (in_array($d_hangsanxuat['id_catct'],$modules_hangsanxuat))
						$info['hangsanxuat'].=" checked ";
						$info['hangsanxuat'].=">&nbsp;&nbsp;".$d_hangsanxuat['name']."";
					    $info['hangsanxuat'].="</div>";
		   
		}
	/////////////////
	
	
	// lay danh sach
			    $sql_list_price="SELECT * FROM tbl_list_price WHERE id_catpd='".$b['parentid']."'";						 
				$db_list_price=$DB->query($sql_list_price);
				$list_ID_price="";
				while($r_rows=@mysql_fetch_array($db_list_price)){				 
				  $list_ID_price=$list_ID_price.",".$r_rows['id_price'];
				   
				}
				 
			 $list_list_price= substr($list_ID_price,1);	
			if($pid!=0){
				if($list_list_price!=""){
					$dk_khoanggia="AND id_catct IN(".$list_list_price.")";
				}
				}			 
			/////////////
			/////////////
			/////////////
			/////////////
			/////////////
			
			
	   
	    $sql_khoanggia_list="select * from tbl_list_price where id_catpd=".$b['id_catpd'];
		$x_khoanggia_list=$DB->query($sql_khoanggia_list);
		$i=0;
		$modules_khoanggia=array();
		while ($y_khoanggia_list=mysql_fetch_array($x_khoanggia_list))
		{
			$modules_khoanggia[$i]=$y_khoanggia_list['id_price'];
			$i++;
		}
	
	
	
		$sql_khoanggia="Select * from tbl_price WHERE active=1 $dk_khoanggia order by thu_tu asc";
		$c_khoanggia=$DB->query($sql_khoanggia);
		while($d_khoanggia=mysql_fetch_array($c_khoanggia)){		 
		   $info['options_khoanggia'].="<div  class='cat-price'  style=''><input type='checkbox' value='".$d_khoanggia["id_catct"]."' name='modules_khoanggia[]' ";
					   
					   if (in_array($d_khoanggia['id_catct'],$modules_khoanggia))
						$info['options_khoanggia'].=" checked ";
						$info['options_khoanggia'].=">&nbsp;&nbsp;".$d_khoanggia['name']."";
					    $info['options_khoanggia'].="</div>";
		   
		}
	/////////////////
	
	
		$sql_fill_list="select * from tbl_list_loc where id_catpd=".$b['id_catpd']." ";
		$x_fill_list=$DB->query($sql_fill_list);
		$i=0;
		$modules_fill=array();
		while ($y_fill_list=mysql_fetch_array($x_fill_list))
		{
			$modules_fill[$i]=$y_fill_list['id_fill'];
			$i++;
		}
	
	//  quan ly bo loc thuoc tinh hoitv 
	    $sql_cat_fill="Select * from tbl_cat_fill WHERE active=1  AND (fil=1 or fil=3)  order by thu_tu asc";
		$c_cat_fill=$DB->query($sql_cat_fill);
		$info['options_fill'].="<div>
		
		
		
		";
		while($d_cat_fill=mysql_fetch_array($c_cat_fill)){
			$info['options_fill'].="
			<script type='text/javascript'>
	function checkAll".$d_cat_fill["id_catct"]."( n ) {
		var f = document.catpd;
		var c = f.toggle".$d_cat_fill["id_catct"].".checked;
		var n2 = 0;
		for (i=1; i <= n; i++) {
			cb".$d_cat_fill["id_catct"]." = eval( 'f.cb".$d_cat_fill["id_catct"]."' + i );
			if (cb".$d_cat_fill["id_catct"].") {
				cb".$d_cat_fill["id_catct"].".checked = c;
				n2++;
			}
		}
		if (c) {
			document.catpd.boxchecked".$d_cat_fill["id_catct"].".value = n2;
		} else {
			document.catpd.boxchecked".$d_cat_fill["id_catct"].".value = 0;
		}
	}
	 
	</script>
	<input type='hidden' name='boxchecked".$d_cat_fill["id_catct"]."' value='0'>
			
			 ";
		   // sub
		    $sql_list_fill="Select * from tbl_list_fill WHERE active=1  AND id_cat_fill=".$d_cat_fill["id_catct"]." AND (fil=1 or fil=3) order by thu_tu asc";
			$c_list_fill=$DB->query($sql_list_fill);
			$num_fill=mysql_num_rows($c_list_fill);
			////
			$info['options_fill'].="<div class='cat-fill3-root'   >";
		   $info['options_fill'].="<div class='cat-fill3'  ><input type='checkbox' value='".$d_cat_fill["id_catct"]."' name='toggle".$d_cat_fill["id_catct"]."' onClick='checkAll".$d_cat_fill["id_catct"]."(".$num_fill.");' /> ".$d_cat_fill["name"]."</div>";
			////
			$iii=1;
			while($d_list_fill=mysql_fetch_array($c_list_fill)){
				
			   $info['options_fill'].="<div style='color:blue;float:left; margin-right:25px; padding:3px; '><input type='checkbox' value='".$d_list_fill["id_catct"]."' name='modules_list_fill[]'  id='cb".$d_cat_fill["id_catct"]."".$iii."' ";
						if (in_array($d_list_fill['id_catct'],$modules_fill))
						$info['options_fill'].=" checked ";
						$info['options_fill'].=">&nbsp;&nbsp;".$d_list_fill['name']."";
						$info['options_fill'].="</div>";
			   
			   
			   $iii++;
			}
			$info['options_fill'].="</div>";
		}
		$info['options_fill'].="</div>";
// end 	
	
	
	// lay danh sach
			    $sql_list_tskt="SELECT * FROM tbl_list_tskt WHERE id_catpd='".$b['parentid']."'";						 
				$db_list_tskt=$DB->query($sql_list_tskt);
				$list_ID_sss="";
				while($r_rows=@mysql_fetch_array($db_list_tskt)){				 
				  $list_ID_sss=$list_ID_sss.",".$r_rows['id_cat_fill'];
				   
				}
				 
			 $list_list_tskt= substr($list_ID_sss,1);	
			if($pid!=0){
					if($list_list_tskt!=""){
					$dk_ppp="AND id_catct IN(".$list_list_tskt.")";
					}
				}			 
			/////////////
			/////////////
			/////////////
			/////////////
			/////////////
			
			
	   
	    $sql_tskt_list="select * from tbl_list_tskt where id_catpd=".$b['id_catpd'];
		$x_tskt_list=$DB->query($sql_tskt_list);
		$i=0;
		$modules_tskt=array();
		while ($y_tskt_list=mysql_fetch_array($x_tskt_list))
		{
			$modules_tskt[$i]=$y_tskt_list['id_cat_fill'];
			$i++;
		}
	
	
	
		$sql_tskt="Select * from tbl_cat_fill WHERE active=1 AND (fil=2 or fil=3)  order by thu_tu asc";
		$c_tskt=$DB->query($sql_tskt);
		while($d_tskt=mysql_fetch_array($c_tskt)){		 
		   $info['options_tskt'].="<div class='cat-hangsx' style=''><input type='checkbox' value='".$d_tskt["id_catct"]."' name='modules_tskt[]' ";
					   
					   if (in_array($d_tskt['id_catct'],$modules_tskt))
						$info['options_tskt'].=" checked ";
						$info['options_tskt'].=">&nbsp;&nbsp;".$d_tskt['name']."";
					    $info['options_tskt'].="</div>";
		   
		}
	/////////////////
	
			
			
				if ($b['trang_chu']) $info['trang_chu']="checked";
			show_catpd_update_form($info);
			showlist();
		
		}
	
	}
}
if ($_GET['code']=='04')
{
	$id=intval($_GET['id']);
	if ($id)
	{
		$in_name=stripslashes($_POST['name']);
		if ($in_name)
		{
			$a=array(
						'name'=>$in_name,
					);
					
			if (compile_post('xoa_anh'))
			{
					$sql="select * from catpd where id_catpd=".$id;
					$x=$DB->query($sql);
					if ($y=mysql_fetch_array($x))
					{
						$lastfile=$y['image'];
						if ($lastfile)
						{
							if ($lastfile && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile);
							}
						}					
					}
					$a['image']='';
			
			}		
			
			
			if ($_FILES['image']['size'])
			{
				$in_image=get_new_file_name($_FILES['image']['name'],"product_");
				$file_upload=new Upload($CONFIG['root_path'].$CONFIG['upload_image_path'],'jpg,gif,png');
				if ($file_upload->upload_file('image',2,$in_image))
				{
					//Da upload thanh cong
					//delete old files
					$sql="select * from catpd where id_catpd=".$id;
					$x=$DB->query($sql);
					if ($y=mysql_fetch_array($x))
					{
						$lastfile=$y['image'];
						if ($lastfile)
						{
							if ($lastfile && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile);
							}
						}					
					}
					
					$a['image']=$file_upload->file_name;
				}
				else
				{
					$msg.=$file_upload->get_upload_errors()."<br>";
				}			
			}
			
			 
			 
			 
			//////////////////////////
		 ///////////////////////
		 ///////////////////////
		 ///////////////////////
			
			 $a_key=array();
		
			$id_key=id_key(trim(compile_post('id_key')));	

			$sql_num_folder="Select * from tbl_key where  id_key='".$id_key."' AND id<>".$id." ";
	        $a_num_folder=$DB->query($sql_num_folder);
			$num_r_folder=mysql_num_rows($a_num_folder);
			
			
			$sql_num_folder222="Select * from tbl_key where   id=".$id."  AND theloai=1 ";
	        $a_num_folder222=$DB->query($sql_num_folder222);
			$num_r_folder222=mysql_num_rows($a_num_folder222);

			if($num_r_folder==0){
			 $a_key['id_key'] = $id_key;
			 $a_key['theloai'] = "1";
			 $a_key['id'] = $id;
			 
			  
				 
				
			if($num_r_folder222>0){
			$b_key=$DB->compile_db_update_string($a_key);
			$sql="UPDATE tbl_key SET ".$b_key." WHERE id=".$id."  AND theloai=1";
			$DB->query($sql);
			
			
			
			
			
			//////////////////////////////////////////////////////////////////
			////////Checkbox cap nhat hangsx date by hoipro : 8/5/2018 ////////
			/////////////////////////////////////////////////////////////////////
			
			
		$sql_hangsanxuat="select * from tbl_list_hangsx where id_catpd=".$id;
		$x=$DB->query($sql_hangsanxuat);
		$i=0;
		$modules_hangsanxuat=array();
		while ($y=mysql_fetch_array($x))
		{
			$modules_hangsanxuat[$i]=$y['id_hangsx'];
			$i++;
			
		}				
				
		$sp_id=$id;
		$bbb=array();
		if ($sp_id)
		{
			$bbb['id_catpd']=$sp_id;
			$count=count($_POST['modules_hangsanxuat']);
			if ($count>0)
			{
				for ($i=0;$i<$count;$i++)
				{
					$id_module_search=0;
					$id_module_search=array_search($_POST['modules_hangsanxuat'][$i],$modules_hangsanxuat);
					if (!in_array($_POST['modules_hangsanxuat'][$i],$modules_hangsanxuat))
					{
						$bbb['id_hangsx']=$_POST['modules_hangsanxuat'][$i];
						
						
						
						$b=$DB->compile_db_insert_string($bbb);
						$sql="INSERT INTO tbl_list_hangsx (".$b['FIELD_NAMES'].") VALUES (".$b['FIELD_VALUES'].")";
						$DB->query($sql);
					}
					else
					{
						$modules_hangsanxuat[$id_module_search]=0;
					}
				}
			}
			$count=count($modules_hangsanxuat);
			if ($count>0)
			{
				for ($i=0;$i<$count;$i++)
				{
					if ($modules_hangsanxuat[$i])
					{
						$sql="delete from tbl_list_hangsx where id_catpd=".$id." AND id_hangsx=".$modules_hangsanxuat[$i];
						$DB->query($sql);
					}
				}
			}
			
		}
		
		//////////// khoang gia////////////
		$sql_khoanggia="select * from tbl_list_price where id_catpd=".$id;
		$x=$DB->query($sql_khoanggia);
		$i=0;
		$modules_khoanggia=array();
		while ($y=mysql_fetch_array($x))
		{
			$modules_khoanggia[$i]=$y['id_price'];
			$i++;
			
		}				
				
		$sp_id=$id;
		$ddd=array();
		if ($sp_id)
		{
			$ddd['id_catpd']=$sp_id;
			$count=count($_POST['modules_khoanggia']);
			if ($count>0)
			{
				for ($i=0;$i<$count;$i++)
				{
					$id_module_search=0;
					$id_module_search=array_search($_POST['modules_khoanggia'][$i],$modules_khoanggia);
					if (!in_array($_POST['modules_khoanggia'][$i],$modules_khoanggia))
					{
						$ddd['id_price']=$_POST['modules_khoanggia'][$i];
						
						
						
						$b=$DB->compile_db_insert_string($ddd);
						$sql="INSERT INTO tbl_list_price (".$b['FIELD_NAMES'].") VALUES (".$b['FIELD_VALUES'].")";
						$DB->query($sql);
					}
					else
					{
						$modules_khoanggia[$id_module_search]=0;
					}
				}
			}
			$count=count($modules_khoanggia);
			if ($count>0)
			{
				for ($i=0;$i<$count;$i++)
				{
					if ($modules_khoanggia[$i])
					{
						$sql="delete from tbl_list_price where id_catpd=".$id." AND id_price=".$modules_khoanggia[$i];
						$DB->query($sql);
					}
				}
			}
			
		}
		
		//////////// Checkbox////////////
						
			
		

	/////////////////////////////////////////////////////////////////////
			
			
		$sql_list_loc="select * from tbl_list_loc where id_catpd=".$id;
		$x_list_loc=$DB->query($sql_list_loc);
		$i=0;
		$modules_list_loc=array();
		while ($y_loc=mysql_fetch_array($x_list_loc))
		{
			$modules_list_loc[$i]=$y_loc['id_fill'];
			$i++;
			
		}				
				
		 
		$ccc=array();
		if ($sp_id)
		{
			$ccc['id_catpd']=$sp_id;
			$count333=count($_POST['modules_list_fill']);
			if ($count333>0)
			{
				for ($i=0;$i<$count333;$i++)
				{
					$id_module_sss=0;
					$id_module_sss=array_search($_POST['modules_list_fill'][$i],$modules_list_loc);
					if (!in_array($_POST['modules_list_fill'][$i],$modules_list_loc))
					{
						$ccc['id_fill']=$_POST['modules_list_fill'][$i];
						
						$sql_cat_fill="Select id_catct,id_cat_fill from tbl_list_fill WHERE id_catct=".$ccc['id_fill']."";
								$c_cat_fill=$DB->query($sql_cat_fill);
								$d_cat_fill=mysql_fetch_array($c_cat_fill);
								$ccc['id_cat_fill']=$d_cat_fill['id_cat_fill'];
						
						$b=$DB->compile_db_insert_string($ccc);
						$sql="INSERT INTO tbl_list_loc (".$b['FIELD_NAMES'].") VALUES (".$b['FIELD_VALUES'].")";
						$DB->query($sql);
					}
					else
					{
						$modules_list_loc[$id_module_sss]=0;
					}
				}
			}
			$count222=count($modules_list_loc);
			if ($count222>0)
			{
				for ($i=0;$i<$count222;$i++)
				{
					if ($modules_list_loc[$i])
					{
						$sql="delete from tbl_list_loc where id_catpd=".$id." AND id_fill=".$modules_list_loc[$i];
						$DB->query($sql);
					}
				}
			}
			
		}
		
		//////////// Checkbox////////////
						
			// check thong so ky thuat
			$sql_tskt="select * from tbl_list_tskt where id_catpd=".$id;
		$x=$DB->query($sql_tskt);
		$i=0;
		$modules_tskt=array();
		while ($y=mysql_fetch_array($x))
		{
			$modules_tskt[$i]=$y['id_cat_fill'];
			$i++;
			
		}				
				
		 
		$eee=array();
		if ($sp_id)
		{
			$eee['id_catpd']=$sp_id;
			$count=count($_POST['modules_tskt']);
			if ($count>0)
			{
				for ($i=0;$i<$count;$i++)
				{
					$id_module_search=0;
					$id_module_search=array_search($_POST['modules_tskt'][$i],$modules_tskt);
					if (!in_array($_POST['modules_tskt'][$i],$modules_tskt))
					{
						$eee['id_cat_fill']=$_POST['modules_tskt'][$i];
						
						
						
						$b=$DB->compile_db_insert_string($eee);
						$sql="INSERT INTO tbl_list_tskt (".$b['FIELD_NAMES'].") VALUES (".$b['FIELD_VALUES'].")";
						$DB->query($sql);
					}
					else
					{
						$modules_tskt[$id_module_search]=0;
					}
				}
			}
			$count=count($modules_tskt);
			if ($count>0)
			{
				for ($i=0;$i<$count;$i++)
				{
					if ($modules_tskt[$i])
					{
						$sql="delete from tbl_list_tskt where id_catpd=".$id." AND id_cat_fill=".$modules_tskt[$i];
						$DB->query($sql);
					}
				}
			}
			
		}
			
			
			// end tskt
			
			
			
			
			
			
			
			}else{	
			    $b_key=$DB->compile_db_insert_string($a_key);
				$sql_key="INSERT INTO tbl_key (".$b_key['FIELD_NAMES'].") VALUES (".$b_key['FIELD_VALUES'].")";
				$DB->query($sql_key);
			}
			 
			}else{
				
							echo '<script>alert("Key đã được đăng ký");location.href="main.php?act=catpd&code=00"</script>';
						die;
			}
			///////////////////////
			///////////////////////
			/////////////////////// 
			
			$a['title']=compile_post('title');
			$a['keywords']=compile_post('keywords');
			$a['description']=compile_post('description');
			$a['tailieu']=compile_post('tailieu');
			$a['masanpham']=compile_post('masanpham');	
			$a['soluong']=compile_post('soluong');
			$a['thuoctinh1']=compile_post('thuoctinh1');	
			$a['thuoctinh2']=compile_post('thuoctinh2');	
			$a['thuoctinh3']=compile_post('thuoctinh3');	
			$a['thuoctinh4']=compile_post('thuoctinh4');	
			$a['thuoctinh5']=compile_post('thuoctinh5');	
			$a['thuoctinh6']=compile_post('thuoctinh6');	
			$a['thuoctinh7']=compile_post('thuoctinh7');	
			$a['thuoctinh8']=compile_post('thuoctinh8');
			
			$a['mode']=compile_post('mode');	
			$a['lienkethang']=compile_post('lienkethang');	
			$a['en_name']=compile_post('en_name');		
			$a['parentid']=compile_post('parentid');
			$a['thu_tu']=compile_post('thu_tu');
			$a['noi_dung']=stripslashes($_POST["noi_dung"]);
			$a['trang_chu']=intval(compile_post('trang_chu'));
			$a['video']=stripslashes($_POST["video"]);
			$a['cam_ket']=stripslashes($_POST["cam_ket"]);
			$a['giay_phep']=stripslashes($_POST["giay_phep"]);
			$b=$DB->compile_db_update_string($a);
			$sql="UPDATE catpd SET ".$b." WHERE id_catpd=".$id;
			$DB->query($sql);
			
			
			$list_ID=$id;
			$sql="SELECT * FROM catpd WHERE parentid=".$id." ORDER BY id_catpd DESC";
			$db=$DB->query($sql);
			while($rs=mysql_fetch_array($db)){
			$list_ID .=",".$rs['id_catpd'];
			$sql_2="SELECT * FROM catpd WHERE parentid=".$rs['id_catpd']." ORDER BY id_catpd DESC";
			$db_2=$DB->query($sql_2);
			while($rs_2=mysql_fetch_array($db_2)){
			$list_ID=$list_ID.",".$rs_2['id_catpd'];
			$sql_3="SELECT * FROM catpd WHERE parentid=".$rs_2['id_catpd']."  ORDER BY id_catpd DESC";
			$db_3=$DB->query($sql_3);
			while($rs_3=mysql_fetch_array($db_3)){
			$list_ID=$list_ID.",".$rs_3['id_catpd'];
			}
			}
			}
			$query = "UPDATE product SET phan_tram = ".$a['phan_tram_1']." WHERE id_catpd IN(".$list_ID.")";
			mysql_query($query);
			
			show_message("S&#7917;a th&#244;ng tin Ch&#7911;ng lo&#7841;i th&#224;nh c&#244;ng !");
		}
		else
		{
			show_message("Kh&#244;ng c&#243; d&#7919; li&#7879;u &#273;&#7847;u v&#224;o ! H&#227;y th&#7917; l&#7841;i !");
		}
		showlist();
	}
}
if ($_GET['code']=='05')
{
	$id=intval($_GET['id']);
	if ($id)
	{
		$sql="select count(id_catpd) as dem from catpd where parentid=".$id;
		$x=$DB->query($sql);
		if ($y=mysql_fetch_array($x))
		{
			if ($y['dem'])
			{
				show_message("Hi&#7879;n v&#7851;n c&#242;n <b>".$y['dem']."</b> Ch&#7911;ng lo&#7841;i con tr&#7921;c thu&#7897;c Ch&#7911;ng lo&#7841;i n&#224;y.
				<br>B&#7841;n c&#7847;n x&#243;a c&#225;c Ch&#7911;ng lo&#7841;i con tr&#432;&#7899;c !");
			}
			else
			{
				$sql="select count(id_product) as dem from product where id_catpd=".$id;
				$a=$DB->query($sql);
				if($b=mysql_fetch_array($a))
				{
					if ($b['dem'])
					{
						show_message("Hi&#7879;n v&#7851;n c&#242;n <b>".$b['dem']."</b> s&#7843;n ph&#7849;m tr&#7921;c thu&#7897;c Ch&#7911;ng lo&#7841;i n&#224;y.
						<br>B&#7841;n c&#243; mu&#7889;n x&#243;a Ch&#7911;ng lo&#7841;i n&#224;y v&#224; t&#7845;t c&#7843; s&#7843;n ph&#7849;m tr&#7921;c thu&#7897;c Ch&#7911;ng lo&#7841;i ?
						<br><a href='main.php?act=catpd&code=06&id=".$id."&pid=".intval($_GET['pid'])."'>C&#243;</a>&nbsp;&nbsp;<a href='main.php?act=catpd&code=00&pid=".intval($_GET['pid'])."'>Kh&#244;ng</a>
						
						 ");
					}
					else
					{
						$sql="Delete from catpd where id_catpd=".$id;
						$DB->query($sql);
						
						$sql="Delete from tbl_key where id=".$id." AND theloai=1";
						$DB->query($sql);
						
						
						 
						
						show_message("&#272;&#227; x&#243;a Ch&#7911;ng lo&#7841;i !");
					}
				}
			}
		}
		showlist();
	}
}
if ($_GET['code']=='06')
{
	$id=intval($_GET['id']);
	if ($id)
	{
				$sql="select * from product where id_catpd=".$id;
				$x=$DB->query($sql);
				while ($y=mysql_fetch_array($x))
				{
					$lastfile=$y['image'];
					$lastnormal=$y['normal_image'];
					$lastsmall=$y['small_image'];
					if ($lastfile||$lastnormal||$lastsmall)
					{
						if ($lastfile && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile);
						}
						if ($lastnormal && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal);
						}
						if ($lastsmall && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall);
						}						
					}					
				}
				$sql="delete from product where id_catpd=".$id;
				$DB->query($sql);					
				
		$sql="Delete from catpd where id_catpd=".$id;
		$DB->query($sql);
		show_message("&#272;&#227; x&#243;a Ch&#7911;ng lo&#7841;i !");
		showlist();
	}
}
if ($_GET['code']=='08')
{
	$opt=$_GET['opt'];
	$id=intval($_GET['id']);
	$a=array();
	if ($opt=='Active')
	{
		$a['active']='1';
		$b=$DB->compile_db_update_string($a);
		$sql="UPDATE catpd SET ".$b." WHERE id_catpd=".$id;
		$DB->query($sql);
		show_message("Change active status successfully !");
	}
	if ($opt=='Deactive')
	{
		$a['active']='0';
		$b=$DB->compile_db_update_string($a);
		$sql="UPDATE catpd SET ".$b." WHERE id_catpd=".$id;
		$DB->query($sql);
		show_message("Change active status successfully !");
	}
	showlist();		
}
if ($_GET['code']=='09')
{
	$sql="Select * from catpd where parentid=".intval($_GET['pid'])." order by thu_tu asc,id_catpd desc";
	$c=$DB->query($sql);
	$info=array();
	$i=0;
	$a=array();
	while ($d=mysql_fetch_array($c))
	{
		$thu_tu=compile_post('thu_tu_'.$d['id_catpd']);
		if ($thu_tu!=$d['thu_tu'])
		{
			$a['thu_tu']=$thu_tu;
			$b=$DB->compile_db_update_string($a);
			$sql="UPDATE catpd SET ".$b." WHERE id_catpd=".$d['id_catpd'];
			$DB->query($sql);
		}
	}
	show_message("Change orders successfully !");
	showlist();
}
if ($_GET['code']=='21')
{
	//$ct=new catpd_tree;
	//$ct->get_catpd_tree();
	$info['options_catpd'] .= '<select name="id_catpd" style="WIDTH: 220px" >';
	$info['options_catpd'] .= '<option value="0">Root</option>';
	$ppid=intval($_GET['pid']);
	if($tree){
		foreach($tree as $k => $v) {
			foreach($v as $i => $j) {
				$selectstr='';
				if ($ppid==$k)
					$selectstr=" selected ";
				$info['options_catpd'] .= '<option value="' . $k . '"'.$selectstr.'>' . $j . '</option>';
			}
		}
	}
	$info['options_catpd'] .= '</select>';
	
	//////////////////////////////////
	
	
	//////////////////////////////////
	$list_ID=listIDpro(211);
	$dk_phukien=" AND id_catpd IN(".$list_ID.")";
	$sql_options_phukien="Select * from product WHERE active=1 $dk_phukien  order by id_catpd DESC";
	$c_options_phukien=$DB->query($sql_options_phukien);
	while($d_options_phukien=mysql_fetch_array($c_options_phukien)){
	   $info['options_phukien'].="<div class='cat-price'><input type='checkbox' value='".$d_options_phukien["id_product"]."' name='modules_phukien[]' /> ".$d_options_phukien["name"]."</div>";
	}
	
	
	  ///////////////// them danh sach hang sx : date by hoipro: 8/5/2018
			// lay danh sach
			    $sql_list_hangsx="SELECT * FROM tbl_list_hangsx WHERE id_catpd='".$pid."'";						 
				$db_list_hangsx=$DB->query($sql_list_hangsx);
				$list_ID_sss="";
				while($r_rows=@mysql_fetch_array($db_list_hangsx)){				 
				  $list_ID_sss=$list_ID_sss.",".$r_rows['id_hangsx'];
				   
				}
				 
			 $list_list_hangsx= substr($list_ID_sss,1);	
			if($pid!=0){
				if( $list_list_hangsx!=""){
					$dk_ppp="AND id_catct IN(".$list_list_hangsx.")";
				   }
				}			 
			/////////////
			/////////////
	
	 /////////// Cat loai dat
  $info['options_hangsx'] .= '<select name="id_hangsx" style="WIDTH: 160px" >';
  $info['options_hangsx'] .= '<option value="0">Lựa chọn hãng sản xuất</option>';
   
  $sql_hangsx="SELECT * FROM tbl_hangsx WHERE active=1 $dk_ppp ORDER BY thu_tu ASC, id_catct DESC";
  $a_hangsx=$DB->query($sql_hangsx);
  while ($b_hangsx=mysql_fetch_array($a_hangsx)){
  $info['options_hangsx'] .= '<option value="' . $b_hangsx['id_catct'] . '">' . $b_hangsx['name'] . '</option>';
  }
  $info['options_hangsx'] .= '</select>';
	/////////////////////////////
	 
	
	 /////////// Cat loai dat quan ly thong so loc
	  /////////// Cat loai dat quan ly thong so loc
	   /////////// Cat loai dat quan ly thong so loc
	    /////////// Cat loai dat quan ly thong so loc
		 /////////// Cat loai dat quan ly thong so loc
	 
	            $sql_list_loc="SELECT * FROM tbl_list_loc WHERE id_catpd='".$pid."'";						 
				$db_list_loc=$DB->query($sql_list_loc);
				$list_ID_sss="";
				$list_ID_fill="";
				while($r_rows=@mysql_fetch_array($db_list_loc)){				 
				  $list_ID_sss=$list_ID_sss.",".$r_rows['id_cat_fill'];
				  
				   $list_ID_fill=$list_ID_fill.",".$r_rows['id_fill'];
				   
				}
				 
			 $list_list_loc= substr($list_ID_sss,1);	
			 $list_list_fill= substr($list_ID_fill,1);	
			  
			if($pid!=0){
				if($list_list_loc!=""){
					$dk_ppp="AND id_catct IN(".$list_list_loc.")";
				}
				if($list_list_fill!=""){
					$dk_fill="AND id_catct IN(".$list_list_fill.")";
				}
			}
	 
	 
  $info['options_thuoctinh'] .= '<div>';
  
    
  $sql_fill_cat="SELECT * FROM tbl_cat_fill WHERE active=1  $dk_ppp AND (fil=1 or fil=3) ORDER BY thu_tu ASC, id_catct DESC";
  $a_fill_cat=$DB->query($sql_fill_cat);
  while ($b_fill_cat=mysql_fetch_array($a_fill_cat)){
	  
	   
	  
	   $info['options_thuoctinh'] .= ' <div class="cat-fill" > <p class="pro-fill" style="">'.$b_fill_cat['name'].' <input type="text" id="search-product'.$b_fill_cat['id_catct'].'" data-id="'.$b_fill_cat['id_catct'].'"  autocomplete="off"  placeholder="thuộc tính ..." name="keyword"><input type="hidden" id="search_cat'.$b_fill_cat['id_catct'].'" name="fill'.$b_fill_cat['id_catct'].'" value="">
												<div id="suggesstion-khachhang'.$b_fill_cat['id_catct'].'"></div></p>';
   
   $info['options_thuoctinh'] .= ' </div>';
  }
  $info['options_thuoctinh'] .= '</div>';
	/////////////////////////////
	/////////////////
	/////////////////////////////
	/////////////////
	/////////////////////////////
	/////////////////
	/////////////////////////////
	/////////////////
	/// quan ly thong so ky thuat tu bo loc
	/// quan ly thong so ky thuat tu bo loc
	/// quan ly thong so ky thuat tu bo loc
	/// quan ly thong so ky thuat tu bo loc
	/// quan ly thong so ky thuat tu bo loc
	/// quan ly thong so ky thuat tu bo loc
	/// quan ly thong so ky thuat tu bo loc
	/// quan ly thong so ky thuat tu bo loc
	/// quan ly thong so ky thuat tu bo loc
	
	  
	 
	
	
   
    	  /////////// year//////////
  $info['options_year'] .= '<select name="id_logo"  >';
  $info['options_year'] .= '<option value="0">-----</option>';
  $sql_year="SELECT * FROM logo WHERE active=1 AND id_catlg=79 ORDER BY thu_tu ASC, id_logo DESC";
  $a_year=$DB->query($sql_year);
  while ($b_year=mysql_fetch_array($a_year)){
  $info['options_year'] .= '<option value="' . $b_year['id_logo'] . '">' . $b_year['name'] . '</option>';
  }
  $info['options_year'] .= '</select>';
  /////////////////////////////
	show_product_post_form($info);
}
function khongdau2($str) {
$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
$str = preg_replace("/(đ)/", 'd', $str);
$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'a', $str);
$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'e', $str);
$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'o', $str);
$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'u', $str);
$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'y', $str);
$str = preg_replace("/(Đ)/", 'd', $str);
//$str = str_replace(" ", "-", str_replace("&*#39;","",$str));
$str = str_replace("#", "", str_replace("&*#39;","",$str));
$str = str_replace('"', "", str_replace("&*#39;","",$str));
$str = str_replace(',', "", str_replace("&*#39;","",$str));
$str = str_replace('-', " ", str_replace("&*#39;","",$str));
return $str;
}
if ($_GET['code']=='22')
{
	$msg="";
	$in_name=compile_post('name');
	if ($in_name)
	{
		$a=array(
				'name'=>$in_name
				);
		if ($_FILES['image']['size'])
		{
			
		/* 	$target_dir = $CONFIG['root_path'].$CONFIG['upload_image_path'];
			$target_file = $target_dir . basename($_FILES['image']['name']);
			
			if(file_exists($target_file)){
			   $error = "File bạn chọn đã tồn tại trên hệ thống";
			}
			
			 if(empty($error)){
			 $in_image=$_FILES['image']['name'];
			 }else{
				 $in_image=$_FILES['image']['name']."-".time();
			 } */
			 $in_image=$_FILES['image']['name'];
			//$in_image=get_new_file_name($_FILES['image']['name'],"product_");
			$file_upload=new Upload($CONFIG['root_path'].$CONFIG['upload_image_path'],'jpg,gif,png');
			if ($file_upload->upload_file('image',2,$in_image))
			{
				//Da upload thanh cong
				//Tao thumbnail
				$a['image']=$file_upload->file_name;
				$thumbnail=create_thumb($CONFIG['root_path'].$CONFIG['upload_image_path'], $file_upload->file_name);
				if ($thumbnail)
				{
					$a['small_image']=$thumbnail['thumb'];
					$a['normal_image']=$thumbnail['normal'];
				}
				else
				{
					$msg.="Kh&#244;ng t&#7841;o &#273;&#432;&#7907;c &#7843;nh thumbnail ! Xem l&#7841;i &#273;&#7883;nh d&#7841;ng file !<br>";
				}
			}
			else
			{
				$msg.=$file_upload->get_upload_errors()."<br>";
			}
			  
		}
		

			if ($_FILES['file']['size'])
		{
			$in_file=$_FILES['file']['name']."_".time();
			//$in_file=get_new_file_name($_FILES['file']['name'],"file_");
			$file_upload=new Upload($CONFIG['root_path'].$CONFIG['upload_media_path'],$CONFIG['allowed_mediatypes']);
			if ($file_upload->upload_file('file',2,$in_file))
			{
				//Da upload thanh cong
				$a['file']=$file_upload->file_name;
			}
			else
			{
				$msg.=$file_upload->get_upload_errors()."<br>";
			}			
		}
		else
		{
			//Kiem tra remote url
			$file_url=compile_post('file_url');
			$file_url=trim($file_url);
			if ($file_url!="")
			{
				if (remote_file_exists($file_url))
				{
						$a['file']=$file_url;
				}
				else
				{
					$msg.="??? !<br>";
				}
			}
		}
		
		
		if ($_FILES['anh1']['size'])
		{
			$in_image=get_new_file_name($_FILES['anh1']['name'],"product_");
			$file_upload=new Upload($CONFIG['root_path'].$CONFIG['upload_image_path'],'jpg,gif,png');
			if ($file_upload->upload_file('anh1',2,$in_image))
			{
				//Da upload thanh cong
				//Tao thumbnail
				$a['anh1']=$file_upload->file_name;
				$thumbnail=create_thumb($CONFIG['root_path'].$CONFIG['upload_image_path'], $file_upload->file_name);
				if ($thumbnail)
				{
					$a['small_image']=$thumbnail['thumb'];
					$a['normal_image']=$thumbnail['normal'];
				}
				else
				{
					$msg.="Kh&#244;ng t&#7841;o &#273;&#432;&#7907;c &#7843;nh thumbnail ! Xem l&#7841;i &#273;&#7883;nh d&#7841;ng file !<br>";
				}
			}
			else
			{
				$msg.=$file_upload->get_upload_errors()."<br>";
			}			
		}
		
		
		
		if ($_FILES['anh2']['size'])
		{
			$in_image=get_new_file_name($_FILES['anh2']['name'],"product_");
			$file_upload=new Upload($CONFIG['root_path'].$CONFIG['upload_image_path'],'jpg,gif,png');
			if ($file_upload->upload_file('anh2',2,$in_image))
			{
				//Da upload thanh cong
				//Tao thumbnail
				$a['anh2']=$file_upload->file_name;
				$thumbnail=create_thumb($CONFIG['root_path'].$CONFIG['upload_image_path'], $file_upload->file_name);
				if ($thumbnail)
				{
					$a['small_image']=$thumbnail['thumb'];
					$a['normal_image']=$thumbnail['normal'];
				}
				else
				{
					$msg.="Kh&#244;ng t&#7841;o &#273;&#432;&#7907;c &#7843;nh thumbnail ! Xem l&#7841;i &#273;&#7883;nh d&#7841;ng file !<br>";
				}
			}
			else
			{
				$msg.=$file_upload->get_upload_errors()."<br>";
			}			
		}
		
		
		
		if ($_FILES['anh3']['size'])
		{
			$in_image=get_new_file_name($_FILES['anh3']['name'],"product_");
			$file_upload=new Upload($CONFIG['root_path'].$CONFIG['upload_image_path'],'jpg,gif,png');
			if ($file_upload->upload_file('anh3',2,$in_image))
			{
				//Da upload thanh cong
				//Tao thumbnail
				$a['anh3']=$file_upload->file_name;
				$thumbnail=create_thumb($CONFIG['root_path'].$CONFIG['upload_image_path'], $file_upload->file_name);
				if ($thumbnail)
				{
					$a['small_image']=$thumbnail['thumb'];
					$a['normal_image']=$thumbnail['normal'];
				}
				else
				{
					$msg.="Kh&#244;ng t&#7841;o &#273;&#432;&#7907;c &#7843;nh thumbnail ! Xem l&#7841;i &#273;&#7883;nh d&#7841;ng file !<br>";
				}
			}
			else
			{
				$msg.=$file_upload->get_upload_errors()."<br>";
			}			
		}
		
		if ($_FILES['anh4']['size'])
		{
			$in_image=get_new_file_name($_FILES['anh4']['name'],"product_");
			$file_upload=new Upload($CONFIG['root_path'].$CONFIG['upload_image_path'],'jpg,gif,png');
			if ($file_upload->upload_file('anh4',2,$in_image))
			{
				//Da upload thanh cong
				//Tao thumbnail
				$a['anh4']=$file_upload->file_name;
				$thumbnail=create_thumb($CONFIG['root_path'].$CONFIG['upload_image_path'], $file_upload->file_name);
				if ($thumbnail)
				{
					$a['small_image']=$thumbnail['thumb'];
					$a['normal_image']=$thumbnail['normal'];
				}
				else
				{
					$msg.="Kh&#244;ng t&#7841;o &#273;&#432;&#7907;c &#7843;nh thumbnail ! Xem l&#7841;i &#273;&#7883;nh d&#7841;ng file !<br>";
				}
			}
			else
			{
				$msg.=$file_upload->get_upload_errors()."<br>";
			}			
		}
		
		 
		
		$a['name_khongdau'] = khongdau2(compile_post('name'));
		$a['noi_dung_khongdau'] = khongdau2(compile_post('noi_dung'));
		$a['price']=compile_post('price');
		$a['gia_cu']=compile_post('gia_cu');
		$a['title']=compile_post('title');
		$a['description']=compile_post('description');
		$a['masanpham']=compile_post('masanpham');
		$a['mode']=compile_post('mode');
		$a['lienkethang']=compile_post('lienkethang');
		$a['soluong']=compile_post('soluong');
		$a['thuoctinh1']=compile_post('thuoctinh1');
		$a['thuoctinh2']=compile_post('thuoctinh2');
		$a['thuoctinh3']=compile_post('thuoctinh3');
		$a['thuoctinh4']=compile_post('thuoctinh4');
		$a['thuoctinh5']=compile_post('thuoctinh5');
		$a['thuoctinh6']=compile_post('thuoctinh6');
		$a['thuoctinh7']=compile_post('thuoctinh7');
		$a['thuoctinh8']=compile_post('thuoctinh8');
		$a['keywords']=compile_post('keywords');
		$a['con_hang']=compile_post('con_hang');
		$a['dung_tich']=compile_post('dung_tich');
		$a['vat']=compile_post('vat');
		$a['suc_nang']=compile_post('suc_nang');		
		$a['series']=compile_post('series');
		$a['ma']=compile_post('ma');
		$a['don_vi']=compile_post('don_vi');
		$a['thu_tu']=compile_post('thu_tu');
		$a['gioi_thieu']=stripslashes($_POST["gioi_thieu"]);
		$a['noi_dung']=stripslashes($_POST["noi_dung"]);
		$a['video']=stripslashes($_POST["video"]);
		$a['hinh_anh']=stripslashes($_POST["hinh_anh"]);
		$a['giay_phep']=stripslashes($_POST["giay_phep"]);
		$a['id_catpd']=compile_post('id_catpd');
		$a['active']=intval(compile_post('active'));
		$a['moi']=intval(compile_post('moi'));
		$a['ban_chay']=intval(compile_post('ban_chay'));
		$a['giatot']=intval(compile_post('giatot'));
		$a['noibat']=intval(compile_post('noibat'));
		$a['hang_1']=intval(compile_post('hang_1'));
		$a['id_cat']=compile_post('id_cat');
		$a['tieu_bieu']=intval(compile_post('tieu_bieu'));
		$a['khuyen_mai']=intval(compile_post('khuyen_mai'));
		$a['gia_cu']=compile_post('gia_cu');
		$a['donvi_tinh']=compile_post('donvi_tinh');
		$a['id_news']=compile_post('id_news');
		$a['id_cat']=compile_post('id_cat');
		$a['id_logo']=compile_post('id_logo');
		$a['id_catct']=intval(compile_post('id_catct'));
		$a['ngay_dang']=time()+$CONGIF['time_offset'];
		$a['id_user']=$my['id'];
		
		$a['id_hangsx']=compile_post('id_hangsx');
		$a['id_thuoctinh']=compile_post('id_thuoctinh');
		
		
		if (!$msg)
		{	
			$b=$DB->compile_db_insert_string($a);
			$sql="select * from product where name='".$a['name']."' ";
				$x=$DB->query($sql);
				$num_row=@mysql_num_rows($x);
				
				$sql2="select * from product where ma_sp='".$a['ma_sp']."' ";
				$x2=$DB->query($sql2);
				$num_row2=@mysql_num_rows($x2);
								
				if($num_row == 0 || $num_row2 == 0){
					
			
			$sql="INSERT INTO product (".$b['FIELD_NAMES'].") VALUES (".$b['FIELD_VALUES'].")";
			$DB->query($sql);
			 $product_id = mysql_insert_id();
			
			//////////////////////////
			
			
			
			//////////////////////////////// INSERT PRODUCT IMAGE /////////////////////////////// 		
			 $title_noithat =  isset($_POST['title_noithat']) ? $_POST['title_noithat'] : "";
			 $file_image_noithat_re = isset($_FILES['file_image_noithat']['name']) ? $_FILES['file_image_noithat']['name'] : "";
			 $file_tmp_noithat = $_FILES["file_image_noithat"]['tmp_name'];
		
			$time2 = time()+1;
			foreach($file_tmp_noithat as $key => $value){
				  $insert_img2['product_id'] = $product_id;	
				 $insert_img2['pro_img_name'] =$title_noithat[$key]['name']; 
				  $insert_img2['code_youtube'] =$title_noithat[$key]['code_youtube']; 
				  $img2 = $file_image_noithat_re[$key]['img'];
				  
				  if(!empty($img2)){// neu ton tai Bien img
					
				 $file_tmp_noithat[$key]['img'];
				 $x_big_relate2		 = id_key(compile_post('name'))."-".$time2.substr($img2, strrpos( $img2, '.' ));
				 $insert_img2['pro_img_big'] = $x_big_relate2;
				 $x_icon_relate2	 = id_key(compile_post('name'))."-small-".$time2.substr($img2, strrpos( $img2, '.' ));
				 $insert_img2['pro_img_icon'] = $x_icon_relate2;
					@copy($file_tmp_noithat[$key]['img'],$CONFIG['root_path'].$CONFIG['upload_image_path'].$x_big_relate2) or die("Could not upload file tO 1 ".$CONFIG['root_path'].$CONFIG['upload_image_path']);
					//$thumbnail=create_thumb($CONFIG['root_path'].$CONFIG['upload_image_path'], $file_upload->file_name);
					resize_image2($CONFIG['root_path'].$CONFIG['upload_image_path'].$x_big_relate2,'','','all');
					//copy Small Image
					@copy($file_tmp_noithat[$key]['img'],$CONFIG['root_path'].$CONFIG['upload_image_path'].$x_icon_relate2) or die("Could not upload file to 2". $CONFIG['root_path'].$CONFIG['upload_image_path']);
					resize_image2($CONFIG['root_path'].$CONFIG['upload_image_path'].$x_icon_relate2,'143','','all');
					// copy icon Image
				$b_img2=$DB->compile_db_insert_string($insert_img2);
				$sql_img2="INSERT INTO noithat_image (".$b_img2['FIELD_NAMES'].") VALUES (".$b_img2['FIELD_VALUES'].")";
				
				$DB->query($sql_img2);
				//$DB->insert($DB->prefix."product_image",$insert_img);
				//var_dump($insert_img);
					
				  }
				 
				
				$time2++;
			}
			
			
			///////////////////////
			///////////////////////
			////////////////
		    $ddd=array();
			if ($product_id)
				{
					$ddd['id_product']=$product_id;
					$count=count($_POST['modules_phukien']);
					if ($count>0)
					{
						for ($i=0;$i<$count;$i++)
						{
							$ddd['id_phukien']=$_POST['modules_phukien'][$i];
							$b=$DB->compile_db_insert_string($ddd);
							$sql="INSERT INTO list_id_phukien (".$b['FIELD_NAMES'].") VALUES (".$b['FIELD_VALUES'].")";
							$DB->query($sql);
						}
					}
				}

///////////////////////////	
///////////////////////////	
///////////////////////////	
///////////////////////////	
///////////////////////////	
			
			/////////////////////
			 $sql_list_loc="SELECT * FROM tbl_list_loc WHERE id_catpd='".$pid."'";						 
				$db_list_loc=$DB->query($sql_list_loc);
				$list_ID_sss="";
				$list_ID_fill="";
				while($r_rows=@mysql_fetch_array($db_list_loc)){				 
				  $list_ID_sss=$list_ID_sss.",".$r_rows['id_cat_fill'];
				  
				   $list_ID_fill=$list_ID_fill.",".$r_rows['id_fill'];
				   
				}
				 
			 $list_list_loc= substr($list_ID_sss,1);	
			  $list_list_fill= substr($list_ID_fill,1);	
			  
			if($pid!=0){
				if($list_list_loc!=""){
					$dk_ppp="AND id_catct IN(".$list_list_loc.")";
				}
				if($list_list_fill!=""){
					$dk_fill="AND id_catct IN(".$list_list_fill.")";
				}
				}
				
		$arr_loc=array();		
			  
    $sql_fill_cat="SELECT * FROM tbl_cat_fill WHERE active=1  $dk_ppp ORDER BY thu_tu ASC, id_catct DESC";
  $a_fill_cat=$DB->query($sql_fill_cat);
  while ($b_fill_cat=mysql_fetch_array($a_fill_cat)){
 
 
  if (isset($_POST['fill'.$b_fill_cat['id_catct']]))
				{
					 
					$id_fill=compile_post('fill'.$b_fill_cat['id_catct']);
					 
						$arr_loc['id_fill']=$id_fill;
						$arr_loc['id_cat_fill']=$b_fill_cat['id_catct'];
						$arr_loc['id_product']=$product_id;
						$b_loc=$DB->compile_db_insert_string($arr_loc);
						$sql_loc="INSERT INTO tbl_product_loc (".$b_loc['FIELD_NAMES'].") VALUES (".$b_loc['FIELD_VALUES'].")";
						$DB->query($sql_loc);
					 
				}
  
   
   
  }
  
	/////////////////////////////
	/////////////////
	
	/// add thong so ky thuat
		$arr_tskt=array();		
			  
    $sql_tskt_cat="SELECT * FROM tbl_cat_fill WHERE active=1  $dk_ppp ORDER BY thu_tu ASC, id_catct DESC";
  $a_tskt_cat=$DB->query($sql_tskt_cat);
  while ($b_ftskt_cat=mysql_fetch_array($a_tskt_cat)){
 
 
  if (isset($_POST['tskt'.$b_ftskt_cat['id_catct']]))
				{
					 
					$id_fill=compile_post('tskt'.$b_ftskt_cat['id_catct']);
					 
						$arr_tskt['id_fill']=$id_fill;
						$arr_tskt['id_cat_fill']=$b_ftskt_cat['id_catct'];
						$arr_tskt['id_product']=$product_id;
						$b_tskt=$DB->compile_db_insert_string($arr_tskt);
						$sql_tskt="INSERT INTO tbl_product_tskt (".$b_tskt['FIELD_NAMES'].") VALUES (".$b_tskt['FIELD_VALUES'].")";
						$DB->query($sql_tskt);
					 
				}
  
   
   
  }
  
	/////////////////////////////
	/////////////////
	//
			
		 ///////////////////////
		 ///////////////////////
		 ///////////////////////
			
			 $a_key=array();
		
			$id_key=id_key(trim(compile_post('id_key')));	

			$sql_num_folder="Select * from tbl_key where  id_key='".$id_key."' ";
	        $a_num_folder=$DB->query($sql_num_folder);
			$num_r_folder=mysql_num_rows($a_num_folder);

			if($num_r_folder==0){
			 $a_key['id_key'] = $id_key;
			 $a_key['theloai'] = "2";
			 $a_key['id'] = $product_id;
			 
			  
				$b_key=$DB->compile_db_insert_string($a_key);
				$sql_key="INSERT INTO tbl_key (".$b_key['FIELD_NAMES'].") VALUES (".$b_key['FIELD_VALUES'].")";
				$DB->query($sql_key);
			 
			}else{
				
							echo '<script>alert("Key đã được đăng ký");location.href="main.php?act=catpd&code=00"</script>';
						die;
			}
			///////////////////////
			///////////////////////
			///////////////////////
			
			
			}else{
			echo' <script>alert("Tên đã tồn tại")  </script>';
			}
			
			$product_id = mysql_insert_id();
			//  - -- hien thi id list ---
			$idinsert=mysql_insert_id();
				$a=array();
				if ($idinsert)
				{
					$a['id_product']=$idinsert;
					$count=count($_POST['modules']);
					if ($count>0)
					{
						for ($i=0;$i<$count;$i++)
						{
							$a['id_news']=$_POST['modules'][$i];
							$b=$DB->compile_db_insert_string($a);
							$sql="INSERT INTO list_id (".$b['FIELD_NAMES'].") VALUES (".$b['FIELD_VALUES'].")";
							$DB->query($sql);
						}
					}
				}
						//////////////////////////////////////
			
			show_message("&#272;&#227; th&#234;m m&#7899;i th&#224;nh c&#244;ng !");
		}
		else
		{
			show_message($msg);
		}
	}
	else
	{
		show_message("Kh&#244;ng c&#243; d&#7919; li&#7879;u &#273;&#7847;u v&#224;o ! H&#227;y th&#7917; l&#7841;i !");
	}
	showlist();
}
if ($_GET['code']=='23')
{
	$msg="";
	$id=intval($_GET['id']);
	$ppid=intval($_GET['pid']);
	if ($id)
	{
		$sql="Select * from product where id_product=".$id;
		$a=$DB->query($sql);
		$info=array();
		if ($b=mysql_fetch_array($a))
		{
			$info['id_product']=$id;
			$info['name']=$b['name'];
			$info['image']=$b['image'];
			$info['anh1']=$b['anh1'];
			$info['anh2']=$b['anh2'];
			$info['anh3']=$b['anh3'];
			$info['anh4']=$b['anh4'];
			
			if ($info['image'])
			{
				if (is_remote($info['image']))
				{
					$info['image']="<img src='".$info['image']."'><br><input type='checkbox' name='xoa_anh' value='1' class='noborder'>&nbsp;X&#243;a &#7843;nh<br><br>";
				}
				else
				{
					$info['image']="<img src='../".$CONFIG['upload_image_path'].$info['image']."' width='120'><br><input type='checkbox' name='xoa_anh' value='1' class='noborder'>&nbsp;X&#243;a &#7843;nh<br><br>";
				}
			}
			
			$info['file']=$b['file'];
			if ($info['file'])
			{
				if (is_remote($info['file']))
				{
					$info['file']="<a href='".$info['file']."' target='_blank'>".$b['file']."</a><br><input type='checkbox' name='xoa_file' value='1' class='noborder'>&nbsp;".$lang['lbl_Delete_file']."<br><br>";
				}
				else
				{
					$info['file']="<a href='../".$CONFIG['upload_media_path'].$info['file']."' target='_blank'>".$b['file']."</a><br><input type='checkbox' name='xoa_file' value='1' class='noborder'>&nbsp;".$lang['lbl_Delete_file']."<br><br>";
				}
			}
				
			
			
			if ($info['anh1'])
			{
				if (is_remote($info['anh1']))
				{
					$info['anh1']="<img src='".$info['anh1']."'><br><input type='checkbox' name='xoa_anh1' value='1' class='noborder'>&nbsp;X&#243;a &#7843;nh<br><br>";
				}
				else
				{
					$info['anh1']="<img src='../".$CONFIG['upload_image_path'].$info['anh1']."' width='120'><br><input type='checkbox' name='xoa_anh1' value='1' class='noborder'>&nbsp;X&#243;a &#7843;nh<br><br>";
				}
			}
			
	if ($info['anh2'])
			{
				if (is_remote($info['anh2']))
				{
					$info['anh2']="<img src='".$info['anh2']."'><br><input type='checkbox' name='xoa_anh2' value='1' class='noborder'>&nbsp;X&#243;a &#7843;nh<br><br>";
				}
				else
				{
					$info['anh2']="<img src='../".$CONFIG['upload_image_path'].$info['anh2']."' width='120'><br><input type='checkbox' name='xoa_anh2' value='1' class='noborder'>&nbsp;X&#243;a &#7843;nh<br><br>";
				}
			}
			
		if ($info['anh3'])
			{
				if (is_remote($info['anh3']))
				{
					$info['anh3']="<img src='".$info['anh3']."'><br><input type='checkbox' name='xoa_anh3' value='1' class='noborder'>&nbsp;X&#243;a &#7843;nh<br><br>";
				}
				else
				{
					$info['anh3']="<img src='../".$CONFIG['upload_image_path'].$info['anh3']."' width='120'><br><input type='checkbox' name='xoa_anh3' value='1' class='noborder'>&nbsp;X&#243;a &#7843;nh<br><br>";
				}
			}	
			/////////
			if ($info['anh4'])
			{
				if (is_remote($info['anh4']))
				{
					$info['anh4']="<img src='".$info['anh4']."'><br><input type='checkbox' name='xoa_anh4' value='1' class='noborder'>&nbsp;X&#243;a &#7843;nh<br><br>";
				}
				else
				{
					$info['anh4']="<img src='../".$CONFIG['upload_image_path'].$info['anh4']."' width='120'><br><input type='checkbox' name='xoa_anh4' value='1' class='noborder'>&nbsp;X&#243;a &#7843;nh<br><br>";
				}
			}
		/////////
		
		
		
			//////////////////
									
			// --- hien thi hinh anh kem theo ------------
	$sql_a2="SELECT * FROM ".$DB->prefix."noithat_image WHERE product_id=".$id."";
	$a_a2=$DB->query($sql_a2);
	$img_ed2.=" <table width='100%' border='1' cellspacing='1' cellpadding='1' style='border-collapse:collapse' bordercolor='#FFFFFF' >
		   <tr class='main'>
				<td width='200'></td>				
				 <td ></td>
				  <td ></td>
				 <td width='100'></td>
			</tr>";
		while($rows2 = mysql_fetch_array($a_a2)){
			$img2 ='<img src=../'.$CONFIG['upload_image_path'].$rows2['pro_img_icon'].' border="0" width="100" align="center" />';
			if($rows2["pro_img_icon"]==NULL){
				$img2 ='<img src="upload/images/noimage_icon.jpg" border="0" align="center" width="80" height="60" />';
			}
			$info['pro_img_name']=$rows2['pro_img_name'];
			$info['img']=$img2;
			$info['idp']=$rows2['pro_img_id'];
			
			$img_ed2.="<tr class='title_bold'>
					<td>".$rows2['pro_img_name']."</td>
					<td>".$rows2['code_youtube']."</td>
				<td>
				".$img2."</td>
				<td>
				<input type='checkbox' name='pro_ids2[".$rows2['pro_img_id']."]' value='1' /> </td><td  class='actions'><a href='main.php?act=catpd&code=2552&id=".$id."&pid=".$pid."&img_id=".$rows2['pro_img_id']."' style='color:red'>Xóa ảnh</a></td>
			</tr>";
		}
			
		$img_ed2.="</table>";	
		$info["img_ed2"]=$img_ed2;
		// --- het--	
		
		
		 $sql_phukien_list="select * from list_id_phukien where id_product=".$b['id_product'];
		$x_phukien_list=$DB->query($sql_phukien_list);
		$i=0;
		$modules_phukien=array();
		while ($y_phukien_list=mysql_fetch_array($x_phukien_list))
		{
			$modules_phukien[$i]=$y_phukien_list['id_phukien'];
			$i++;
		}
	
	
	
		$list_ID=listIDpro(211);
		$dk_phukien=" AND id_catpd IN(".$list_ID.")";
		$sql_options_phukien="Select name,id_product,id_catpd from product WHERE active=1 $dk_phukien  order by id_catpd DESC";
		
		$c_options_phukien=$DB->query($sql_options_phukien);
		while($d_options_phukien=mysql_fetch_array($c_options_phukien)){		 
		   $info['options_phukien'].="<div  class='cat-price'  style=''><input type='checkbox' value='".$d_options_phukien["id_product"]."' name='modules_phukien[]' ";
					   
					   if (in_array($d_options_phukien['id_product'],$modules_phukien))
						$info['options_phukien'].=" checked ";
						$info['options_phukien'].=">&nbsp;&nbsp;".$d_options_phukien['name']."";
					    $info['options_phukien'].="</div>";
		   
		}
	/////////////////
		
 ///////////////// them danh sach hang sx : date by hoipro: 8/5/2018
			// lay danh sach
			    $sql_list_hangsx="SELECT * FROM tbl_list_hangsx WHERE id_catpd='".$pid."'";						 
				$db_list_hangsx=$DB->query($sql_list_hangsx);
				$list_ID_sss="";
				while($r_rows=@mysql_fetch_array($db_list_hangsx)){				 
				  $list_ID_sss=$list_ID_sss.",".$r_rows['id_hangsx'];
				   
				}
				 
			 $list_list_hangsx= substr($list_ID_sss,1);	
			if($pid!=0){
				if($list_list_hangsx !=""){
					$dk_ppp="AND id_catct IN(".$list_list_hangsx.")";
				}
				}			 
			/////////////
			/////////////	
	
	 /////////// Cat loai dat
  $info['options_hangsx'] .= '<select name="id_hangsx" style="WIDTH: 250px" >';
  $info['options_hangsx'] .= '<option value="0">Lựa chọn hãng sản xuất</option>';
  
   
  $sql_hangsx="SELECT * FROM tbl_hangsx WHERE active=1 $dk_ppp  ORDER BY thu_tu ASC, id_catct DESC";
  
  $a_hangsx=$DB->query($sql_hangsx);
  while ($b_hangsx=mysql_fetch_array($a_hangsx)){
  
 
  if($b['id_hangsx']==$b_hangsx['id_catct']){
   $selectstr="selected=selected ";
   $info['options_hangsx'] .= '<option value="' . $b_hangsx['id_catct'] . '" '.$selectstr.'>' . $b_hangsx['name'] . '</option>';
  }else{
  $info['options_hangsx'] .= '<option value="' . $b_hangsx['id_catct'] . '" >' . $b_hangsx['name'] . '</option>';
  }
  
  }
  $info['options_hangsx'] .= '</select>';
	/////////////////////////////
	
	
	
	
	
	 /////////// Cat loai dat
	 
	            $sql_list_loc="SELECT * FROM tbl_list_loc WHERE id_catpd='".$pid."'";						 
				$db_list_loc=$DB->query($sql_list_loc);
				$list_ID_sss="";
				$list_ID_fill="";
				while($r_rows=@mysql_fetch_array($db_list_loc)){				 
				  $list_ID_sss=$list_ID_sss.",".$r_rows['id_cat_fill'];
				  
				   $list_ID_fill=$list_ID_fill.",".$r_rows['id_fill'];
				   
				}
				 
			 $list_list_loc= substr($list_ID_sss,1);	
			  $list_list_fill= substr($list_ID_fill,1);	
			  
			if($pid!=0){
				if($list_list_loc!=""){
					$dk_ppp="AND id_catct IN(".$list_list_loc.")";
				}
				if($list_list_fill!=""){
					//$dk_fill="AND id_catct IN(".$list_list_fill.")";
				}
				}
	 
	








      $sql_loc_list="select * from tbl_product_loc where id_product=".$id;
		$x_loc_list=$DB->query($sql_loc_list);
		$i=0;
		$modules_loc=array();
		while ($y_loc_list=mysql_fetch_array($x_loc_list))
		{
			$modules_loc[$i]=$y_loc_list['id_fill'];
			$i++;
		}
	
	
	 




	
  $info['options_thuoctinh'] .= '<div>';  

function name_sss($id){
	global $DB,$modules_loc;
	$ten="";
	  $sql_fill="SELECT * FROM tbl_list_fill WHERE active=1 AND id_cat_fill=".$id." $dk_fill__ AND (fil=1 or fil=3) ORDER BY thu_tu ASC, id_catct DESC";
  $a_fill=$DB->query($sql_fill);
  while ($b_fill=mysql_fetch_array($a_fill)){
	  
	    if (in_array($b_fill['id_catct'],$modules_loc)){
			 
			$ten.=$b_fill['name'];
		 
		}  
	  
  
  }
   
  return $ten;
	
}


function id_sss($id){
	global $DB,$modules_loc;
	$idss="";
	  $sql_fill="SELECT * FROM tbl_list_fill WHERE active=1 AND id_cat_fill=".$id." $dk_fill__ AND (fil=1 or fil=3) ORDER BY thu_tu ASC, id_catct DESC";
  $a_fill=$DB->query($sql_fill);
  while ($b_fill=mysql_fetch_array($a_fill)){
	  
	    if (in_array($b_fill['id_catct'],$modules_loc)){
			 
			 
			$idss.=$b_fill['id_catct'];
		}  
	  
  
  }
   return $idss;
  
	
}

  
   $sql_fill_cat="SELECT * FROM tbl_cat_fill WHERE active=1  $dk_ppp  AND (fil=1 or fil=3) ORDER BY thu_tu ASC, id_catct DESC";
  $a_fill_cat=$DB->query($sql_fill_cat);
  while ($b_fill_cat=mysql_fetch_array($a_fill_cat)){
	  
	  
  
	  
	   $info['options_thuoctinh'] .= ' <div class="cat-fill" > 
	   <p style="font-weight:bold; tex-algin:center; background-color:#ccc">'.$b_fill_cat['name'].'
	   
	  <br> <span style="color:blue">'.name_sss($b_fill_cat['id_catct']).'</span><br>
	   
	   <input type="text" id="search-product'.$b_fill_cat['id_catct'].'" data-id="'.$b_fill_cat['id_catct'].'"  autocomplete="off"  placeholder="thay dổi ..." name="keyword" >
	   <input type="hidden" id="search_cat'.$b_fill_cat['id_catct'].'" name="fill'.$b_fill_cat['id_catct'].'" value="'.id_sss($b_fill_cat['id_catct']).'">
												<div id="suggesstion-khachhang'.$b_fill_cat['id_catct'].'"></div>
	   
	   
	   
	   </p>';
	   
	   
	   
	   
	   
	   
  
   $info['options_thuoctinh'] .= ' </div>';
  }
  $info['options_thuoctinh'] .= '</div>';
	/////////////////////////////
	/////////////////
	 	/////////////////
	/// quan ly thong so ky thuat tu bo loc
	/// quan ly thong so ky thuat tu bo loc
	/// quan ly thong so ky thuat tu bo loc
	/// quan ly thong so ky thuat tu bo loc
	/// quan ly thong so ky thuat tu bo loc
	/// quan ly thong so ky thuat tu bo loc
	/// quan ly thong so ky thuat tu bo loc
	
	    $sql_loc_list_tskt="select * from tbl_product_tskt where id_product=".$id;
		$x_loc_list_tskt=$DB->query($sql_loc_list_tskt);
		$i=0;
		$modules_tskt=array();
		while ($y_loc_list_tskt=mysql_fetch_array($x_loc_list_tskt))
		{
			$modules_tskt[$i]=$y_loc_list_tskt['id_fill'];
			$i++;
		}
	
	
	           
			$sql_list_tskt="SELECT * FROM tbl_list_tskt WHERE id_catpd='".$pid."'";						 
				$db_list_tskt=$DB->query($sql_list_tskt);
				$list_ID_kkk="";
				 
				while($r_rows=@mysql_fetch_array($db_list_tskt)){				 
				  $list_ID_kkk=$list_ID_kkk.",".$r_rows['id_cat_fill'];
				  
				 
				   
				}
				 
			 $list_list_tskt= substr($list_ID_kkk,1);	
			 	
			  
			if($pid!=0){
				if($list_list_tskt!=""){
					$dk_tskt="AND id_catct IN(".$list_list_tskt.")";
				}
				 
				}
	 
	 
	 
  $info['options_thongsokythuat'] .= '<div>';
  
    
  $sql_fill_cat_tskt="SELECT * FROM tbl_cat_fill WHERE active=1  $dk_tskt  AND (fil=2 or fil=3) ORDER BY thu_tu ASC, id_catct DESC";
  $a_fill_cat_tskt=$DB->query($sql_fill_cat_tskt);
  while ($b_fill_cat_tskt=mysql_fetch_array($a_fill_cat_tskt)){
  $info['options_thongsokythuat'] .= ' <div class="cat-fill-tskt" > <p class="pro-fill">'.$b_fill_cat_tskt['name'].'</p>';
    $sql_fill_tskt="SELECT * FROM tbl_list_fill WHERE active=1 AND id_cat_fill=".$b_fill_cat_tskt['id_catct']."  ORDER BY thu_tu ASC, id_catct DESC";
  $a_fill_tskt=$DB->query($sql_fill_tskt);
  while ($b_fill_tskt=mysql_fetch_array($a_fill_tskt)){
	  
	   if (in_array($b_fill_tskt['id_catct'],$modules_tskt)){
			$checked="checked";
		}else{
			$checked="";
		}
	  
  $info['options_thongsokythuat'] .= '<p class="list-lll2"><input type="radio" '.$checked.'  name="tskt'.$b_fill_cat_tskt['id_catct'].'" value="'. $b_fill_tskt['id_catct'] . '">' . $b_fill_tskt['name'] . '</p>';
  }
   $info['options_thongsokythuat'] .= ' </div>';
  }
  $info['options_thongsokythuat'] .= '</div>';
	/////////////////////////////////////////////
	/////////////////////////////////////////////
	/////////////////////////////////////////////
	/////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////
	
	///////////
						
		///////////////////
			$sql="select * from list_id where id_product=".$b['id_product'];
			$x=$DB->query($sql);
			$i=0;
			$modules=array();
			while ($y=mysql_fetch_array($x))
			{
				$modules[$i]=$y['id_news'];
				$i++;
			}
			//$info['id_key']=$b['id_key'];
			
			$sql_key="Select * from tbl_key where  id='".$b['id_product']."' AND theloai=2";
	        $a_key=$DB->query($sql_key);
			$b_key=mysql_fetch_array($a_key);
			
			$info['id_key']=$b_key['id_key'];
			
			
			$info['ma']			=		$b['ma'];
			$info['price']=$b['price'];
			$info['gia_cu']=$b['gia_cu'];
			$info['don_vi']=$b['don_vi'];
				$info['id_cat']=$b['id_cat'];
			//$info['gioi_thieu']=str_replace("<br>","\n",$b['gioi_thieu']);
			$info['gioi_thieu']=$b['gioi_thieu'];
			$info['noi_dung']=$b['noi_dung'];
			$info['video']=$b['video'];
			$info['description']=$b['description'];
			$info['keywords']=$b['keywords'];
			$info['thu_tu']=$b['thu_tu'];
			$info['active']=$b['active'];
			$info['moi']=$b['moi'];
			$info['ban_chay']=$b['ban_chay'];
			$info['noibat']=$b['noibat'];
			$info['giatot']=$b['giatot'];
			$info['title']=$b['title'];
			$info['masanpham']=$b['masanpham'];
			$info['mode']=$b['mode'];
			$info['lienkethang']=$b['lienkethang'];
			$info['soluong']=$b['soluong'];
			$info['thuoctinh1']=$b['thuoctinh1'];
			$info['thuoctinh2']=$b['thuoctinh2'];
			$info['thuoctinh3']=$b['thuoctinh3'];
			$info['thuoctinh4']=$b['thuoctinh4'];
			$info['thuoctinh5']=$b['thuoctinh5'];
			$info['thuoctinh6']=$b['thuoctinh6'];
			$info['thuoctinh7']=$b['thuoctinh7'];
			$info['thuoctinh8']=$b['thuoctinh8'];
			
			$info['id_news']=$b['id_news'];
			$info['id_catct']=$b['id_catct'];
			$info['id_cat']=$b['id_cat'];
			$info['id_logo']=$b['id_logo'];
			$info['hang_1']=$b['hang_1'];
			$info['series']=$b['series'];
			$info['suc_nang']=$b['suc_nang'];
			$info['hinh_anh']=$b['hinh_anh'];
			$info['vat']=$b['vat'];
			$info['tieu_bieu']=$b['tieu_bieu'];
			$info['khuyen_mai']=$b['khuyen_mai'];
			$info['gia_cu']=$b['gia_cu'];
			$info['donvi_tinh']=$b['donvi_tinh'];
			$info['id_catpd']=$b['id_catpd'];
			$info['options_catpd'] .= '<select name="id_catpd" style="WIDTH: 220px" >';
			$info['options_catpd'] .= '<option value="0">Root</option>';
			if($tree){
				foreach($tree as $k => $v) {
					foreach($v as $i => $j) {
						$selectstr='';
						if ($info['id_catpd']==$k)
							$selectstr=" selected ";
						$info['options_catpd'] .= '<option value="' . $k . '"'.$selectstr.'>' . $j . '</option>';
					}
				}
			}
			$info['options_catpd'] .= '</select>';
			
			if ($b['active']) $info['active']="checked";
			if ($b['moi']) $info['moi']="checked";
			if ($b['ban_chay']) $info['ban_chay']="checked";
			if ($b['noibat']) $info['noibat']="checked";
			if ($b['giatot']) $info['giatot']="checked";
			
			if ($b['hang_1']) $info['hang_1']="checked";
			
			
			if ($b['khuyen_mai']) $info['khuyen_mai']="checked";
			if ($b['tieu_bieu']) $info['tieu_bieu']="checked";
			
				/////////////////////////////// hang sx ///////////////////////////
			  $sql_khoanggia="SELECT * FROM phukien WHERE id_news=".$b['id_news']."";
			  $a_khoanggia=$DB->query($sql_khoanggia);
			  $b_khoanggia=mysql_fetch_array($a_khoanggia);	 
			  $info['id_news']=$b['id_news'];
			  $info['options_hang'] .= '<select name="id_news" style="WIDTH: 120px" >';
			  $info['options_hang'] .= '<option value="' . $b_khoanggia['id_news'] . '" selected>' . $b_khoanggia['name'] . '</option>';
			  
			  $sql_khoanggia2="SELECT * FROM phukien WHERE active=1 AND id_cat=1 ORDER BY thu_tu ASC, id_news DESC";
			  $a_khoanggia2=$DB->query($sql_khoanggia2);
			  while ($b_khoanggia2=mysql_fetch_array($a_khoanggia2)){
			  $info['options_hang'] .= '<option value="' . $b_khoanggia2['id_news'] . '">' . $b_khoanggia2['name'] . '</option>';
			  }
			  $info['options_hang'] .= '</select>';
				/////////////////////////////
				/////////////////////////////// xuat xu ///////////////////////////
			  $sql_xuatxu="SELECT * FROM catct WHERE id_catct=".$b['id_catct']."";
			  $a_xuatxu=$DB->query($sql_xuatxu);
			  $b_xuatxu=mysql_fetch_array($a_xuatxu);	 
			  $info['id_catct']=$b['id_catct'];
			  $info['options_xuatxu'] .= '<select name="id_catct" style="WIDTH: 120px" >';
			  $info['options_xuatxu'] .= '<option value="' . $b_xuatxu['id_catct'] . '" selected>' . $b_xuatxu['name'] . '</option>';
			  
			  $sql_xuatxu2="SELECT * FROM catct WHERE active=1 AND parentid=277 ORDER BY thu_tu ASC, id_catct DESC";
			  $a_xuatxu2=$DB->query($sql_xuatxu2);
			  while ($b_xuatxu2=mysql_fetch_array($a_xuatxu2)){
			  $info['options_xuatxu'] .= '<option value="' . $b_xuatxu2['id_catct'] . '">' . $b_xuatxu2['name'] . '</option>';
			  }
			  $info['options_xuatxu'] .= '</select>';
				/////////////////////////////	
	////////////////////////////// model///////////////////////////
			  $sql_model="SELECT * FROM cat WHERE id_cat=".$b['id_cat']."";
			  $a_model=$DB->query($sql_model);
			  $b_model=mysql_fetch_array($a_model);	 
			  $info['id_cat']=$b['id_cat'];
			  $info['options_model'] .= '<select name="id_cat" style="WIDTH: 120px" >';
			  $info['options_model'] .= '<option value="' . $b_model['id_cat'] . '" selected>' . $b_model['name'] . '</option>';
			  
			  $sql_model2="SELECT * FROM cat WHERE active=1 AND parentid=124 ORDER BY thu_tu ASC, id_cat DESC";
			  $a_model2=$DB->query($sql_model2);
			  while ($b_model2=mysql_fetch_array($a_model2)){
			  $info['options_model'] .= '<option value="' . $b_model2['id_cat'] . '">' . $b_model2['name'] . '</option>';
			  }
			  $info['options_model'] .= '</select>';
				/////////////////////////////	
					////////////////////////////// year///////////////////////////
			  $sql_year="SELECT * FROM logo WHERE id_logo=".$b['id_logo']."";
			  $a_year=$DB->query($sql_year);
			  $b_year=mysql_fetch_array($a_year);	 
			  $info['id_logo']=$b['id_logo'];
			  $info['options_year'] .= '<select name="id_logo" style="WIDTH: 120px" >';
			  $info['options_year'] .= '<option value="' . $b_year['id_logo'] . '" selected>' . $b_year['name'] . '</option>';
			  
			  $sql_year2="SELECT * FROM logo WHERE active=1 AND id_catlg=79 ORDER BY thu_tu ASC, id_logo DESC";
			  $a_year2=$DB->query($sql_year2);
			  while ($b_year2=mysql_fetch_array($a_year2)){
			  $info['options_year'] .= '<option value="' . $b_year2['id_logo'] . '">' . $b_year2['name'] . '</option>';
			  }
			  $info['options_year'] .= '</select>';
				/////////////////////////////
			show_product_update_form($info);
		
		}
	
	}
}
if ($_GET['code']=='24')
{
	$id=intval($_GET['id']);
	if ($id)
	{
		$msg="";
		$in_name=compile_post('name');
		if ($in_name)
		{
			$a=array(
						'name'=>$in_name
					);
			
			if (compile_post('xoa_anh'))
			{
					$sql="select * from product where id_product=".$id;
					$x=$DB->query($sql);
					if ($y=mysql_fetch_array($x))
					{
						$lastfile=$y['image'];
						$lastnormal=$y['normal_image'];
						$lastsmall=$y['small_image'];
						if ($lastfile||$lastnormal||$lastsmall)
						{
							if ($lastfile && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile);
							}
							if ($lastnormal && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal);
							}
							if ($lastsmall && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall);
							}						
						}					
					}
					$a['image']='';
					$a['normal_image']='';
					$a['small_image']='';
			}	
/// doan xoa anh nhieu
if (compile_post('xoa_anh1'))
			{
					$sql="select * from product where id_product=".$id;
					$x=$DB->query($sql);
					if ($y=mysql_fetch_array($x))
					{
						$lastfile=$y['anh1'];
						$lastnormal=$y['normal_image'];
						$lastsmall=$y['small_image'];
						if ($lastfile||$lastnormal||$lastsmall)
						{
							if ($lastfile && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile);
							}
							if ($lastnormal && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal);
							}
							if ($lastsmall && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall);
							}						
						}					
					}
					$a['anh1']='';
					$a['normal_image']='';
					$a['small_image']='';
			}	
if (compile_post('xoa_anh2'))
			{
					$sql="select * from product where id_product=".$id;
					$x=$DB->query($sql);
					if ($y=mysql_fetch_array($x))
					{
						$lastfile=$y['anh2'];
						$lastnormal=$y['normal_image'];
						$lastsmall=$y['small_image'];
						if ($lastfile||$lastnormal||$lastsmall)
						{
							if ($lastfile && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile);
							}
							if ($lastnormal && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal);
							}
							if ($lastsmall && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall);
							}						
						}					
					}
					$a['anh2']='';
					$a['normal_image']='';
					$a['small_image']='';
			}
if (compile_post('xoa_anh3'))
			{
					$sql="select * from product where id_product=".$id;
					$x=$DB->query($sql);
					if ($y=mysql_fetch_array($x))
					{
						$lastfile=$y['anh3'];
						$lastnormal=$y['normal_image'];
						$lastsmall=$y['small_image'];
						if ($lastfile||$lastnormal||$lastsmall)
						{
							if ($lastfile && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile);
							}
							if ($lastnormal && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal);
							}
							if ($lastsmall && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall);
							}						
						}					
					}
					$a['anh3']='';
					$a['normal_image']='';
					$a['small_image']='';
			}
if (compile_post('xoa_anh4'))
			{
					$sql="select * from product where id_product=".$id;
					$x=$DB->query($sql);
					if ($y=mysql_fetch_array($x))
					{
						$lastfile=$y['anh4'];
						$lastnormal=$y['normal_image'];
						$lastsmall=$y['small_image'];
						if ($lastfile||$lastnormal||$lastsmall)
						{
							if ($lastfile && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile);
							}
							if ($lastnormal && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal);
							}
							if ($lastsmall && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall);
							}						
						}					
					}
					$a['anh4']='';
					$a['normal_image']='';
					$a['small_image']='';
			}
				
		if ($_FILES['image']['size'])
			{
				 $in_image=$_FILES['image']['name'];
				//$in_image=get_new_file_name($_FILES['image']['name'],"product_");
				$file_upload=new Upload($CONFIG['root_path'].$CONFIG['upload_image_path'],'jpg,gif,png');
				if ($file_upload->upload_file('image',2,$in_image))
				{
					//Da upload thanh cong
					//delete old files
					$sql="select * from product where id_product=".$id;
					$x=$DB->query($sql);
					if ($y=mysql_fetch_array($x))
					{
						$lastfile=$y['image'];
						$lastnormal=$y['normal_image'];
						$lastsmall=$y['small_image'];
						if ($lastfile||$lastnormal||$lastsmall)
						{
							if ($lastfile && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile);
							}
							if ($lastnormal && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal);
							}
							if ($lastsmall && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall);
							}						
						}					
					}
					
					$a['image']=$file_upload->file_name;
					//Tao thumbnail
					$thumbnail=create_thumb($CONFIG['root_path'].$CONFIG['upload_image_path'], $file_upload->file_name);
					if ($thumbnail)
					{
						$a['small_image']=$thumbnail['thumb'];
						$a['normal_image']=$thumbnail['normal'];
					}
					else
					{
						$msg.="Kh&#244;ng t&#7841;o &#273;&#432;&#7907;c &#7843;nh thumbnail ! Xem l&#7841;i &#273;&#7883;nh d&#7841;ng file !<br>";
					}
				}
				else
				{
					$msg.=$file_upload->get_upload_errors()."<br>";
				}			
			}
			
			// anh to
			
			if ($_FILES['anh1']['size'])
			{
			$in_image_to=get_new_file_name($_FILES['anh1']['name'],"product");
			$file_upload=new Upload($CONFIG['root_path'].$CONFIG['upload_image_path'],'jpg,gif,png,bmp');
			if ($file_upload->upload_file('anh1',2,$in_image_to))
			{
				//Da upload thanh cong
				//Tao thumbnail
			$a['anh1']=$file_upload->file_name;
			}
			}
			if ($_FILES['anh2']['size'])
			{
			$in_image_to=get_new_file_name($_FILES['anh2']['name'],"product");
			$file_upload=new Upload($CONFIG['root_path'].$CONFIG['upload_image_path'],'jpg,gif,png,bmp');
			if ($file_upload->upload_file('anh2',2,$in_image_to))
			{
				//Da upload thanh cong
				//Tao thumbnail
			$a['anh2']=$file_upload->file_name;
			}
			}
			
			if ($_FILES['anh3']['size'])
			{
			$in_image_to=get_new_file_name($_FILES['anh3']['name'],"product");
			$file_upload=new Upload($CONFIG['root_path'].$CONFIG['upload_image_path'],'jpg,gif,png,bmp');
			if ($file_upload->upload_file('anh3',2,$in_image_to))
			{
				//Da upload thanh cong
				//Tao thumbnail
			$a['anh3']=$file_upload->file_name;
			}
			}
			
			if ($_FILES['anh4']['size'])
			{
			$in_image_to=get_new_file_name($_FILES['anh4']['name'],"product");
			$file_upload=new Upload($CONFIG['root_path'].$CONFIG['upload_image_path'],'jpg,gif,png,bmp');
			if ($file_upload->upload_file('anh4',2,$in_image_to))
			{
				//Da upload thanh cong
				//Tao thumbnail
			$a['anh4']=$file_upload->file_name;
			}
			}
			
			if ($_FILES['anh5']['size'])
			{
			$in_image_to=get_new_file_name($_FILES['anh5']['name'],"product");
			$file_upload=new Upload($CONFIG['root_path'].$CONFIG['upload_image_path'],'jpg,gif,png,bmp');
			if ($file_upload->upload_file('anh5',2,$in_image_to))
			{
				//Da upload thanh cong
				//Tao thumbnail
			$a['anh5']=$file_upload->file_name;
			}
			}
			
			
			  
			//////////////////////////
		 ///////////////////////
		 ///////////////////////
		 ///////////////////////
		 
		 
			if ($_FILES['file']['size'])
			{
			    $in_file=$_FILES['file']['name']."_".time();
				//$in_file=get_new_file_name($_FILES['file']['name'],"file_");
				$file_upload=new Upload($CONFIG['root_path'].$CONFIG['upload_media_path'],$CONFIG['allowed_mediatypes']);
				if ($file_upload->upload_file('file',2,$in_file))
				{
					//Da upload thanh cong
					//delete old files
					$sql="select * from product where id_product=".$id;
					$x=$DB->query($sql);
					if ($y=mysql_fetch_array($x))
					{
						$lastfile=$y['file'];
						if ($lastfile)
						{
							if ($lastfile && file_exists($CONFIG['root_path'].$CONFIG['upload_media_path'].$lastfile))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_media_path'].$lastfile);
							}
						}					
					}
					
					$a['file']=$file_upload->file_name;
					//Tao thumbnail
				}
				else
				{
					$msg.=$file_upload->get_upload_errors()."<br>";
				}			
			}
			else
			{
				//Kiem tra remote url
				$file_url=compile_post('file_url');
				$file_url=trim($file_url);
				if ($file_url!="")
				{
					$a['file']=$file_url;
				}
			}
			
			/////////////////////
		 
			
			 $a_key=array();
		
			$id_key=id_key(trim(compile_post('id_key')));	

			$sql_num_folder="Select * from tbl_key where  id_key='".$id_key."' AND id<>".$id." ";
	        $a_num_folder=$DB->query($sql_num_folder);
			$num_r_folder=mysql_num_rows($a_num_folder);
			
			
			$sql_num_folder222="Select * from tbl_key where   id=".$id."  AND theloai=2";
	        $a_num_folder222=$DB->query($sql_num_folder222);
			$num_r_folder222=mysql_num_rows($a_num_folder222);

			if($num_r_folder==0){
			 $a_key['id_key'] = $id_key;
			 $a_key['theloai'] = "2";
			 $a_key['id'] = $id;
			 
			  
				 
				
			if($num_r_folder222>0){
			$b_key=$DB->compile_db_update_string($a_key);
			$sql="UPDATE tbl_key SET ".$b_key." WHERE id=".$id."  AND theloai=2";
			$DB->query($sql);
			}else{	
			    $b_key=$DB->compile_db_insert_string($a_key);
				$sql_key="INSERT INTO tbl_key (".$b_key['FIELD_NAMES'].") VALUES (".$b_key['FIELD_VALUES'].")";
				$DB->query($sql_key);
			}
			 
			}else{
				
							echo '<script>alert("Key đã được đăng ký");location.href="main.php?act=catpd&code=00"</script>';
						die;
			}
			///////////////////////
			///////////////////////
			/////////////////////// 
			
			
			$a['name_khongdau'] = khongdau2(compile_post('name'));
			$a['noi_dung_khongdau'] = khongdau2(compile_post('noi_dung'));
			$a['ma']=compile_post('ma');
			$a['price']=compile_post('price');
			$a['gia_cu']=compile_post('gia_cu');
			$a['title']=compile_post('title');
			$a['description']=compile_post('description');
			$a['masanpham']=compile_post('masanpham');
			$a['mode']=compile_post('mode');
			$a['lienkethang']=compile_post('lienkethang');
			$a['soluong']=compile_post('soluong');
			$a['thuoctinh1']=compile_post('thuoctinh1');
			$a['thuoctinh2']=compile_post('thuoctinh2');
			$a['thuoctinh3']=compile_post('thuoctinh3');
			$a['thuoctinh4']=compile_post('thuoctinh4');
			$a['thuoctinh5']=compile_post('thuoctinh5');
			$a['thuoctinh6']=compile_post('thuoctinh6');
			$a['thuoctinh7']=compile_post('thuoctinh7');
			$a['thuoctinh8']=compile_post('thuoctinh8');
			
			$a['keywords']=compile_post('keywords');
			$a['con_hang']=compile_post('con_hang');
			$a['suc_nang']=compile_post('suc_nang');		
			$a['series']=compile_post('series');
			$a['phan_phoi']=compile_post('phan_phoi');
			$a['vat']=compile_post('vat');
			$a['don_vi']=compile_post('don_vi');
			$a['gioi_thieu']=stripslashes($_POST["gioi_thieu"]);
			$a['noi_dung']=stripslashes($_POST["noi_dung"]);
			$a['video']=stripslashes($_POST["video"]);
			$a['hinh_anh']=stripslashes($_POST["hinh_anh"]);
			$a['giay_phep']=stripslashes($_POST["giay_phep"]);
			$a['id_catpd']=compile_post('id_catpd');
			$a['thu_tu']=intval(compile_post('thu_tu'));
			$a['active']=intval(compile_post('active'));
			$a['moi']=intval(compile_post('moi'));
			$a['ban_chay']=intval(compile_post('ban_chay'));
			$a['giatot']=intval(compile_post('giatot'));
			$a['noibat']=intval(compile_post('noibat'));
			$a['hang_1']=intval(compile_post('hang_1'));
			$a['id_cat']=compile_post('id_cat');
			$a['id_news']=compile_post('id_news');
			$a['id_logo']=compile_post('id_logo');
			$a['id_catct']=compile_post('id_catct');
			
			$a['tieu_bieu']=intval(compile_post('tieu_bieu'));
		$a['khuyen_mai']=intval(compile_post('khuyen_mai'));
		$a['gia_cu']=compile_post('gia_cu');
		$a['donvi_tinh']=compile_post('donvi_tinh');
			
			
			$a['id_hangsx']=compile_post('id_hangsx');
		$a['id_thuoctinh']=compile_post('id_thuoctinh');
			
			
			if (!$msg)		
			{
				$b=$DB->compile_db_update_string($a);
			$sql="select * from product where name='".$a['name']."' AND id_product='".$id."' ";
				$x=$DB->query($sql);
				$num_row=@mysql_num_rows($x);
				
				$sql2="select * from product where ma_sp='".$a['ma_sp']."' AND id_product='".$id."'";
				$x2=$DB->query($sql2);
				$num_row2=@mysql_num_rows($x2);
								
				if($num_row == 1 || $num_row2 == 1){
					
			
			$sql="UPDATE product SET ".$b." WHERE id_product=".$id;
				$DB->query($sql);
			}else{
			echo' <script>alert("Tên đã tồn tại")  </script>';
			}
			
			
				
				
				$product_id =$id;
				////////////////////////////////
				
				////////////////////////////////
				//////////////////////////////// INSERT PRODUCT IMAGE /////////////////////////////// 		
			$title_noithat =  isset($_POST['title_noithat']) ? $_POST['title_noithat'] : "";
			$file_image_noithat_re = isset($_FILES['file_image_noithat']['name']) ? $_FILES['file_image_noithat']['name'] : "";
			$file_tmp_noithat = $_FILES["file_image_noithat"]['tmp_name'];
			$time2 = time()+1;
			foreach($file_tmp_noithat as $key => $value){
				  $insert_img2['product_id'] = $id;	
				  $insert_img2['pro_img_name'] =$title_noithat[$key]['name']; 
				    $insert_img2['code_youtube'] =$title_noithat[$key]['code_youtube']; 
					$img2 = $file_image_noithat_re[$key]['img'];
					/* if($img2!=""){
				   $img2 = $file_image_noithat_re[$key]['img'];
					}else{
						$img2="http://kovic.ketnoigiaothuong.com/upload/images/logo_1536242139.png";
					} */
				  
				  if(!empty($img2)){// neu ton tai Bien img
					
				 $file_tmp_noithat[$key]['img'];
				 $x_big_relate2		 = id_key(compile_post('name'))."-".$time2.substr($img2, strrpos( $img2, '.' ));
				 $insert_img2['pro_img_big'] = $x_big_relate2;
				 $x_icon_relate2 = id_key(compile_post('name'))."-small-".$time2.substr($img2, strrpos( $img2, '.' ));
				 $insert_img2['pro_img_icon'] = $x_icon_relate2;
					@copy($file_tmp_noithat[$key]['img'],$CONFIG['root_path'].$CONFIG['upload_image_path'].$x_big_relate2) /* or die("Could not upload file tO 1 ".$CONFIG['root_path'].$CONFIG['upload_image_path']) */;
					//$thumbnail=create_thumb($CONFIG['root_path'].$CONFIG['upload_image_path'], $file_upload->file_name);
					resize_image2($CONFIG['root_path'].$CONFIG['upload_image_path'].$x_big_relate2,'','','all');
					//copy Small Image
					@copy($file_tmp_noithat[$key]['img'],$CONFIG['root_path'].$CONFIG['upload_image_path'].$x_icon_relate2) /* or die("Could not upload file to 2". $CONFIG['root_path'].$CONFIG['upload_image_path']) */;
					resize_image2($CONFIG['root_path'].$CONFIG['upload_image_path'].$x_icon_relate2,'143','','all');
					// copy icon Image
				$b_img2=$DB->compile_db_insert_string($insert_img2);
				$sql_img2="INSERT INTO noithat_image (".$b_img2['FIELD_NAMES'].") VALUES (".$b_img2['FIELD_VALUES'].")";
				
				$DB->query($sql_img2);
				//$DB->insert($DB->prefix."product_image",$insert_img);
				//var_dump($insert_img);
					
				   }
				 
				
				$time2++;
			}
			
			// -- Xoa hinh thuoc tinh loai gia -- 
		
				$pro_ids2	= isset($_POST['pro_ids2']) ? $_POST['pro_ids2'] : '';
				
				//var_dump($pro_ids);
				if (is_array($pro_ids2) ){
					$id_	= intval($id_);
					while ( list($id_ ) = each($pro_ids2) ){
						$id		= intval($id_);
						
						$sql_d="Delete from noithat_image where pro_img_id=".$id_;
				
						
						$DB->query($sql_d);
					}
				}	
				
				/////////////// Hinh nah noi that
				/////////////////////////////////
				
				
				
		//////////// khoang gia////////////
		$sql_phukien="select id_list,id_product,id_phukien from list_id_phukien where id_product=".$id;
		$x=$DB->query($sql_phukien);
		$i=0;
		$modules_phukien=array();
		while ($y=mysql_fetch_array($x))
		{
			$modules_phukien[$i]=$y['id_phukien'];
			$i++;
			
		}				
				
		$sp_id=$id;
		$ddd=array();
		if ($sp_id)
		{
			$ddd['id_product']=$sp_id;
			$count=count($_POST['modules_phukien']);
			if ($count>0)
			{
				for ($i=0;$i<$count;$i++)
				{
					$id_module_search=0;
					$id_module_search=array_search($_POST['modules_phukien'][$i],$modules_phukien);
					if (!in_array($_POST['modules_phukien'][$i],$modules_phukien))
					{
						$ddd['id_phukien']=$_POST['modules_phukien'][$i];
						
						
						
						$b=$DB->compile_db_insert_string($ddd);
						$sql="INSERT INTO list_id_phukien (".$b['FIELD_NAMES'].") VALUES (".$b['FIELD_VALUES'].")";
						$DB->query($sql);
					}
					else
					{
						$modules_phukien[$id_module_search]=0;
					}
				}
			}
			$count=count($modules_phukien);
			if ($count>0)
			{
				for ($i=0;$i<$count;$i++)
				{
					if ($modules_phukien[$i])
					{
						$sql="delete from list_id_phukien where id_product=".$id." AND id_phukien=".$modules_phukien[$i];
						$DB->query($sql);
					}
				}
			}
			
		}
		
		//////////// Checkbox////////////
				
				//////////////////////////////////
				////////////////////////////////
				
				
				
			$sql_list_loc="SELECT * FROM tbl_list_loc WHERE id_catpd='".$pid."'";						 
			$db_list_loc=$DB->query($sql_list_loc);
			$list_ID_sss="";
			$list_ID_fill="";
			while($r_rows=@mysql_fetch_array($db_list_loc)){				 
			  $list_ID_sss=$list_ID_sss.",".$r_rows['id_cat_fill'];
			  
			   $list_ID_fill=$list_ID_fill.",".$r_rows['id_fill'];
			   
			}
				 
			$list_list_loc= substr($list_ID_sss,1);	
			$list_list_fill= substr($list_ID_fill,1);	
			  
			if($pid!=0){
				if($list_list_loc!=""){
					$dk_ppp="AND id_catct IN(".$list_list_loc.")";
				}
				if($list_list_fill!=""){
					$dk_fill="AND id_catct IN(".$list_list_fill.")";
				}
				}
				
	// xoa sach va insert moi vao	
// xoa sach va insert moi vao	
// xoa sach va insert moi vao	
// xoa sach va insert moi vao	
// xoa sach va insert moi vao	
// xoa sach va insert moi vao	
// xoa sach va insert moi vao		
				
    $arr_loc=array();

	$sql_del_loc="Delete from tbl_product_loc where id_product=".$id;
	$DB->query($sql_del_loc);		
			  
    $sql_fill_cat="SELECT * FROM tbl_cat_fill WHERE active=1  $dk_ppp ORDER BY thu_tu ASC, id_catct DESC";
  $a_fill_cat=$DB->query($sql_fill_cat);
  while ($b_fill_cat=mysql_fetch_array($a_fill_cat)){
 
 
  if (isset($_POST['fill'.$b_fill_cat['id_catct']]))
				{
					
			       

					
					$id_fill=compile_post('fill'.$b_fill_cat['id_catct']);
					 
						$arr_loc['id_fill']=$id_fill;
						$arr_loc['id_cat_fill']=$b_fill_cat['id_catct'];
						$arr_loc['id_product']=$product_id;
						if($id_fill!=""){
						$b_loc=$DB->compile_db_insert_string($arr_loc);
						$sql_loc="INSERT INTO tbl_product_loc (".$b_loc['FIELD_NAMES'].") VALUES (".$b_loc['FIELD_VALUES'].")";
						$DB->query($sql_loc);
						}
					 
				}
  
   
   
  }
  
	/////////////////////////////
	
	// xoa sach va insert moi vao	
// xoa sach va insert moi vao	
// xoa sach va insert moi vao	
// xoa sach va insert moi vao	
// xoa sach va insert moi vao	
// xoa sach va insert moi vao	
// xoa sach va insert moi vao	



	           
			$sql_list_tskt="SELECT * FROM tbl_list_tskt WHERE id_catpd='".$pid."'";						 
				$db_list_tskt=$DB->query($sql_list_tskt);
				$list_ID_kkk="";
				 
				while($r_rows=@mysql_fetch_array($db_list_tskt)){				 
				  $list_ID_kkk=$list_ID_kkk.",".$r_rows['id_cat_fill'];
				  
				 
				   
				}
				 
			 $list_list_tskt= substr($list_ID_kkk,1);	
			 	
			  
			if($pid!=0){
				if($list_list_tskt!=""){
					$dk_tskt="AND id_catct IN(".$list_list_tskt.")";
				}
				 
				}
	 
	 
	           	
				
    $arr_tskt=array();

	$sql_del_tskt="Delete from tbl_product_tskt where id_product=".$id;
	$DB->query($sql_del_tskt);		
			  
    $sql_fill_cat_tskt="SELECT * FROM tbl_cat_fill WHERE active=1  $dk_tskt ORDER BY thu_tu ASC, id_catct DESC";
  $a_fill_cat_tskt=$DB->query($sql_fill_cat_tskt);
  while ($b_fill_cat_tskt=mysql_fetch_array($a_fill_cat_tskt)){
 
 
  if (isset($_POST['tskt'.$b_fill_cat_tskt['id_catct']]))
				{
					
			       

					
					$id_fill=compile_post('tskt'.$b_fill_cat_tskt['id_catct']);
					 
						$arr_tskt['id_fill']=$id_fill;
						$arr_tskt['id_cat_fill']=$b_fill_cat_tskt['id_catct'];
						$arr_tskt['id_product']=$product_id;
						$b_tskt=$DB->compile_db_insert_string($arr_tskt);
						$sql_tskt="INSERT INTO tbl_product_tskt (".$b_tskt['FIELD_NAMES'].") VALUES (".$b_tskt['FIELD_VALUES'].")";
						$DB->query($sql_tskt);
					 
				}
  
   
   
  }
  
	/////////////////////////////
	/////////////////////////////
	/////////////////////////////
	/////////////////////////////
	/////////////////////////////
				
				////////Checkbox////////
			$sql="select * from list_id where id_product=".$id;
			$x=$DB->query($sql);
			$i=0;
			$modules=array();
			while ($y=mysql_fetch_array($x))
			{
				$modules[$i]=$y['id_news'];
				$i++;
				
			}				
				
		$idinsert=$id;
		$a=array();
		if ($idinsert)
		{
			$a['id_product']=$idinsert;
			$count=count($_POST['modules']);
			if ($count>0)
			{
				for ($i=0;$i<$count;$i++)
				{
					$id_module_search=0;
					$id_module_search=array_search($_POST['modules'][$i],$modules);
					if (!in_array($_POST['modules'][$i],$modules))
					{
						$a['id_news']=$_POST['modules'][$i];
						$b=$DB->compile_db_insert_string($a);
						$sql="INSERT INTO list_id (".$b['FIELD_NAMES'].") VALUES (".$b['FIELD_VALUES'].")";
						$DB->query($sql);
					}
					else
					{
						$modules[$id_module_search]=0;
					}
				}
			}
			$count=count($modules);
			if ($count>0)
			{
				for ($i=0;$i<$count;$i++)
				{
					if ($modules[$i])
					{
						$sql="delete from list_id where id_product=".$id." and id_news=".$modules[$i];
						$DB->query($sql);
					}
				}
			}
			
		}
		
				show_message("&#272;&#227; s&#7917;a ch&#7919;a th&#224;nh c&#244;ng !");
			}
			else
			{
				show_message($msg);
			}
		}
		else
		{
			show_message("Kh&#244;ng c&#243; d&#7919; li&#7879;u &#273;&#7847;u v&#224;o ! H&#227;y th&#7917; l&#7841;i !");
		}
		showlist();
	}
}
if ($_GET['code']=='2552')
{
	$id=intval($_GET['id']);
	$img_id=intval($_GET['img_id']);
	$pid=intval($_GET['pid']);
	
	$a=array();
	if ($img_id)
	{
		//delete old files
				$sql="select * from noithat_image where pro_img_id=".$img_id;
				$x=$DB->query($sql);
				if ($y=mysql_fetch_array($x))
				{
					$lastfile=$y['pro_img_big'];
					$lastnormal=$y['pro_img_icon'];
					
					if ($lastfile||$lastnormal)
					{
						if ($lastfile && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile);
						}
						if ($lastnormal && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal);
						}
						
					}
					
				}
		$sql="Delete from noithat_image where pro_img_id=".$img_id;
		$DB->query($sql);
		/*echo ("<script>alert('".$lang['msg_suc_delete']."')</script>"); */
		//$GUI->redir("main.php?act=catpd&code=23&id=".$id."&pid=".$pid."");
		echo '<script>alert("Xóa ảnh thành công");location.href="main.php?act=catpd&code=23&id='.$id.'&pid='.$pid.'"</script>';
	}

}

if ($_GET['code']=='25')
{
	$id=intval($_GET['id']);
	if ($id)
	{
		//delete old files
				$sql="select * from product where id_product=".$id;
				$x=$DB->query($sql);
				if ($y=mysql_fetch_array($x))
				{
					$lastfile=$y['image'];
					$lastnormal=$y['normal_image'];
					$lastsmall=$y['small_image'];
					if ($lastfile||$lastnormal||$lastsmall)
					{
						if ($lastfile && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile);
						}
						if ($lastnormal && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal);
						}
						if ($lastsmall && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall);
						}						
					}					
				}
	/// xoa nhieu anh
	if ($y=mysql_fetch_array($x))
				{
					$lastfile=$y['anh1'];
					$lastnormal=$y['normal_image'];
					$lastsmall=$y['small_image'];
					if ($lastfile||$lastnormal||$lastsmall)
					{
						if ($lastfile && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile);
						}
						if ($lastnormal && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal);
						}
						if ($lastsmall && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall);
						}						
					}					
				}
	
		if ($y=mysql_fetch_array($x))
				{
					$lastfile=$y['anh2'];
					$lastnormal=$y['normal_image'];
					$lastsmall=$y['small_image'];
					if ($lastfile||$lastnormal||$lastsmall)
					{
						if ($lastfile && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile);
						}
						if ($lastnormal && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal);
						}
						if ($lastsmall && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall);
						}						
					}					
				}
		if ($y=mysql_fetch_array($x))
				{
					$lastfile=$y['anh3'];
					$lastnormal=$y['normal_image'];
					$lastsmall=$y['small_image'];
					if ($lastfile||$lastnormal||$lastsmall)
					{
						if ($lastfile && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile);
						}
						if ($lastnormal && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal);
						}
						if ($lastsmall && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall);
						}						
					}					
				}
	
		if ($y=mysql_fetch_array($x))
				{
					$lastfile=$y['anh4'];
					$lastnormal=$y['normal_image'];
					$lastsmall=$y['small_image'];
					if ($lastfile||$lastnormal||$lastsmall)
					{
						if ($lastfile && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile);
						}
						if ($lastnormal && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal);
						}
						if ($lastsmall && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall))
						{
							unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall);
						}						
					}					
				}
	
	
	
	
	
				
				
		$sql="Delete from product where id_product=".$id;
		$DB->query($sql);
		
		$sql="Delete from tbl_key where id=".$id." AND theloai=2";
		$DB->query($sql);
		
		show_message("&#272;&#227; x&#243;a th&#224;nh c&#244;ng !");
		showlist();
	}
	else
	{
		if (is_array($_POST['cid']))
		{
			$pid=intval($_GET['pid']);
			$i=0;
				foreach ($_POST['cid'] as $k=>$v)
				{
					$id=intval($_POST['cid'][$k]);
					//delete old files
					$sql="select * from product where id_product=".$id;
					$x=$DB->query($sql);
					if ($y=mysql_fetch_array($x))
					{
						$lastfile=$y['image'];
						$lastnormal=$y['normal_image'];
						$lastsmall=$y['small_image'];
						if ($lastfile||$lastnormal||$lastsmall)
						{
							if ($lastfile && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastfile);
							}
							if ($lastnormal && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastnormal);
							}
							if ($lastsmall && file_exists($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall))
							{
								unlink($CONFIG['root_path'].$CONFIG['upload_image_path'].$lastsmall);
							}						
						}					
					}
					$sql="Delete from product where id_product=".$id;
					$DB->query($sql);
					$i++;
				}
				show_message("&#272;&#227; x&#243;a th&#224;nh c&#244;ng <b>$i</b> s&#7843;n ph&#7849;m !");
				
		}
		showlist();				
	}
}
if ($_GET['code']=='28')
{
	$opt=$_GET['opt'];
	$id=intval($_GET['id']);
	$a=array();
	if ($opt=='Active')
	{
		$a['active']='1';
		$b=$DB->compile_db_update_string($a);
		$sql="UPDATE product SET ".$b." WHERE id_product=".$id;
		$DB->query($sql);
		show_message("Change active status successfully !");
	}
	if ($opt=='Deactive')
	{
		$a['active']='0';
		$b=$DB->compile_db_update_string($a);
		$sql="UPDATE product SET ".$b." WHERE id_product=".$id;
		$DB->query($sql);
		show_message("Change active status successfully !");
	}
	showlist();		
}
if ($_GET['code']=='29')
{
	$txtsearch=$_GET['txtsearch'];
	$maxdp=intval($_GET['maxdp']);
	$pid=intval($_GET['pid']);
	if (!$maxdp)
	{
		$maxdp=10;
	}
	$dkproduct="";
	$dkproduct="where id_catpd=".$pid." ";
	if ($txtsearch)
	{
		$dkproduct.=" and product.name like '%".$txtsearch."%'";
	}			
	//Phan trang
	$sql="select count(*) as dem from product $dkproduct order by thu_tu asc,id_product desc";
	$a=mysql_fetch_array($DB->query($sql));
	$dem=$a['dem'];
	$str="";
	if ($dem==0)
	{
		$str="";
	}
	else
	{
				
		$page=intval($_GET['p']);
		if ($page>0) $page--;
		$bg=$page*$maxdp;
		$dklimit=" limit ".$bg.",".$maxdp;
	}
	//het phan phan trang 
	$sql="Select product.*,users.name as user_name from product left join users on (product.id_user=users.id_users) $dkproduct order by thu_tu asc,id_product desc $dklimit";
	$c=$DB->query($sql);
	$info=array();
	$i=0;
	$a=array();
	/*
	while ($d=mysql_fetch_array($c))
	{
		if (isset($_POST['thu_tu_'.$d['id_product']]))
		{
			//echo $_POST['thu_tu_'.$d['id_product']].$d['name'].$d['id_product']."<br>";
			$thu_tu=compile_post('thu_tu_'.$d['id_product']);
			if ($thu_tu!=$d['thu_tu'])
			{
				$a['thu_tu']=$thu_tu;
				$b=$DB->compile_db_update_string($a);
				$sql="UPDATE product SET ".$b." WHERE id_product=".$d['id_product'];
				$DB->query($sql);
			}
		}
	}
	*/
	$str_order = "";
	foreach($_POST["thu_tu"] as $key=>$val){
		$str_order = "UPDATE product SET thu_tu='".$val."' WHERE id_product='".$key."';";
		$DB->query($str_order);
	}
	show_message("Change orders successfully !");
	showlist();
}
if ($_GET['code']=='30')
{
	init_search_form();
}
if ($_GET['code']=='31')
{
	process_search();
}
if ($_GET['code']=='40')
{
	spmoi();
}
if ($_GET['code']=='41')
{
	sapxep();
}
class catpd_tree{
	var $n;
	var $current_idcatpd;
	function catpd_tree($current_idcatpd=0)
	{
		$this->current_idcatpd=$current_idcatpd;
	}
	function get_catpd_tree($parent = 0)
	{
		global $DB,$tree; // add $catpd_old
		$raw = $DB->query("select * from catpd where parentid='$parent' order by id_catpd asc");
		// add -- if it has childs
		if ($DB->get_affected_rows() > 0) {
			$this->n++;
		} else {
			return;
		} while ($result = mysql_fetch_array($raw)) {
		/*
			if ($result['pcatpdid'] == $childcatpd_old['pcatpdid']) {
				continue; // remove  catpds from list
			}
			*/
			for($i = 0;$i < $this->n;$i++) {
				$tree[$result['id_catpd']]['name'] .= '-- ';
			}
			$tree[$result['id_catpd']]['name'] .= $result['name'];
			$this->get_catpd_tree($result['id_catpd']);
		}
		// all childs listed, remove --
		$this->n--;
	}
	function get_catpd_string($id_catpd)
	{
		global $DB,$catpdstring;
		if ($id_catpd==0)
			return;
		else
		{
			$sql="select * from catpd where id_catpd=".$id_catpd;
			$a=$DB->query($sql);
			if ($b=mysql_fetch_array($a))
			{
				$catpdstring = $b['name']." > ".$catpdstring;
				$this->get_catpd_string($b['parentid']);
			}
		}
	
	}
	function get_catpd_string_admin($id_catpd)
	{
		global $DB,$catpdstring2;
		if ($id_catpd==0)
			return;
		else
		{
			if ($this->current_idcatpd==$id_catpd)
			{
				$showclass="class='currentcat'";
			}
			else
			{
				$showclass="";
			}
			$sql="select * from catpd where id_catpd=".$id_catpd;
			$a=$DB->query($sql);
			if ($b=mysql_fetch_array($a))
			{
				$catpdstring2 = "<a href='main.php?act=catpd&pid=".$id_catpd."' $showclass>".$b['name']."</a> > ".$catpdstring2;
				$this->get_catpd_string_admin($b['parentid']);
			}
		}
	
	}	
}
?>
								<br><br>
								</td>
							</tr>
						</table>		
					</td>
				</tr>
			</table>		
		</td>
	</tr>
</table>
