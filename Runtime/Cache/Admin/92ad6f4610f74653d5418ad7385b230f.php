<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="<?php echo (ADMIN_CSS_URL); ?>pintuer.css">
<link rel="stylesheet" href="<?php echo (ADMIN_CSS_URL); ?>admin.css">
<link rel="stylesheet" href="<?php echo (ADMIN_CSS_URL); ?>jquery-ui.min.css">
<link rel="stylesheet" href="<?php echo (ADMIN_LAYUI_URL); ?>css/layui.css">
<script src="<?php echo (ADMIN_JS_URL); ?>jquery.js"></script>
<script src="<?php echo (ADMIN_JS_URL); ?>jquery-ui.min.js"></script>
<script src="<?php echo (ADMIN_JS_URL); ?>pintuer.js"></script>
<script src="<?php echo (ADMIN_LAYUI_URL); ?>lay/dest/layui.all.js"></script>
<style type="text/css">
	
</style>
</head>
<body>
<form method="post" action="/StudentUnion/index.php/Admin/Auth/listAdmin" id="listform">
  <div class="panel admin-panel">
    <!-- <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div> -->
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="layui-btn layui-btn-primary" href="/StudentUnion/index.php/Admin/Auth/addAdmin"> <i class="layui-icon">&#xe654;</i>  添加管理员</a></li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="30%">管理员名称</th>
        <th width="30%">所属用户组</th>
        <th width="310">操作</th>
      </tr>
    <?php foreach ($data as $k => $v): ?>
        <tr>
          <input type="hidden" name="illness_id" value="<?php echo $v['illness_id']; ?>" />
          <td><?php echo $v['mg_admin']; ?></td>
          <td><?php echo $v['title']; ?></td>
          <td class="text-center"><div class="button-group">
          <a class="layui-btn layui-btn-primary" href="/StudentUnion/index.php/Admin/Auth/editAdmin/mg_id/<?php echo $v['mg_id']; ?>"><span class="icon-edit"></span> 修改</a>
          <a class="layui-btn layui-btn-danger" style="cursor:pointer" onclick="del(<?php echo $v['mg_id']; ?>)"><span class="icon-trash-o"></span> 删除</a>
          </div></td>
        </tr>
        
    <?php endforeach; ?>
      <tr>
      	<td colspan="8">
      	<div class="pagelist">
      		<?php echo ($page); ?>
      		</div>
      	</td>
      </tr>
    </table>
</form>


<script type="text/javascript">

//单个删除
function del(id){
	if(confirm("您确定要删除吗?")){
		window.location="/StudentUnion/index.php/Admin/Auth/delAdmin/mg_id/"+id;
	}
}

//添加管理员
// $('#add').click(function(){
// 	layer.open({
//         type: 1,
//         area: ['500px', '420px'],
//         skin: 'layui-layer-rim', //加上边框
//         content: $('#addForm'),
//         //shade:0,
//         offset: ['60px', '250px'],
//         cancel:function(index, layero){
//           $('#addForm').css('display','none');
//           layer.close(index);
//         }
//     });
// });






</script>
</body>
</html>