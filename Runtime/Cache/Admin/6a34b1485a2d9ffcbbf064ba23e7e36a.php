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
<script src="<?php echo (ADMIN_JS_URL); ?>jquery.js"></script>
<script src="<?php echo (ADMIN_JS_URL); ?>jquery-ui.min.js"></script>
<script src="<?php echo (ADMIN_JS_URL); ?>pintuer.js"></script>
<script src="<?php echo (ADMIN_LAYUI_URL); ?>lay/dest/layui.all.js"></script>
<link rel="stylesheet" href="<?php echo (ADMIN_LAYUI_URL); ?>css/layui.css">
<link rel="stylesheet" href="<?php echo (ADMIN_CSS_URL); ?>font-awesome.min.css">

<style type="text/css">
	.dialogtable{border-collapse: collapse; width: 100%;padding-top: 12px;}
	.dialogtable th{background-color: #E8E8E8;}
	.dialogtable th,
	.dialogtable td{border: solid 1px #ccc; padding: 8px;valign:middle;}
	.button.border-green{ color:#22CC77;}
	.pagelist span.current{background: #22CC77}

</style>
</head>
<body>
<form method="post" action="/StudentUnion/index.php/Admin/Auth/listRule" id="listform">
  <div class="panel admin-panel">
    <!-- <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div> -->
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="layui-btn layui-btn-primary" onclick="addRule(0)"> <i class="layui-icon">&#xe654;</i>  添加权限</a></li>
      </ul>
    </div>
    <table class="table table-hover">
      <tr>
        <th width="20%">权限名</th>
        <th width="20%">权限</th>
        <th width="40%">操作</th>
      </tr>
    <?php foreach ($data as $k => $v): ?>
        <tr>
          <input type="hidden" name="pid" value="<?php echo $v['pid']; ?>" />
          <?php if($v['level']!==0): ?>
          <td><?php echo str_repeat("　　",2*$v['level'])."└─ ".$v['title']; ?></td>
          <?php else: ?>
          <td><?php echo $v['title']; ?></td>
          <?php endif;?>
          <td style="text-align:center"><?php echo $v['name']; ?></td>
          <td class="text-center"><div class="button-group">
          <a onclick="addChildRule(this)" ruleId="<?php echo ($v['id']); ?>" class="layui-btn layui-btn-primary "><span class="icon-edit"></span> 添加子权限</a>		
          <a class="layui-btn layui-btn-primary " ruleId="<?php echo ($v['id']); ?>" ruleName="<?php echo ($v['name']); ?>" ruleTitle="<?php echo ($v['title']); ?>" onclick="editRule(this)" href="javascript:;"><span class="icon-edit"></span> 修改</a>
          <a class="layui-btn layui-btn-danger " style="cursor:pointer" onclick="del(<?php echo $v['id']; ?>)"><span class="icon-trash-o"></span> 删除</a>
          </div></td>
        </tr>
        
    <?php endforeach; ?>
    </table>
</form>
<!-- 添加权限表单 -->
<div id="ruleForm" style="display: none" class="panel admin-panel">
    <div style="margin-left: 10px" class="body-content">
    <form method="post" class="form-x" action="/StudentUnion/index.php/Admin/Auth/addRule" name="fileUploadForm" enctype="multipart/form-data">
    <input type="hidden" name="pid" value="0">
    <div class="div_tab" style="display:block;">  
      <div class="form-group">
        <div class="label">
          <label>权限名：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="title"  />
          <span style="margin-left: 10px;margin-top: 15px;display:block;" class="tips">　*</span>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>权限：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="name" />
          <span style="margin-left: 10px;margin-top: 10px;display:block;" class="tips">　* 输入模块/控制器/方法即可 例如 Admin/index/index</span>
        </div>
      </div>
     
      </div>
      <!-- 提交 -->
      <div class="form-group" style="margin-left: 265px;">
        <div class="field">
          <button class="layui-btn" type="submit"><i class="fa fa-check" aria-hidden="true"></i> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- 修改权限表单 -->
<div id="editRule" style="display: none" class="panel admin-panel">
    <div style="margin-left: 10px" class="body-content">
    <form method="post" class="form-x" action="/StudentUnion/index.php/Admin/Auth/editRule" name="fileUploadForm" enctype="multipart/form-data">
    <input type="hidden" name="id">
    <div class="div_tab" style="display:block;">  
      <div class="form-group">
        <div class="label">
          <label>权限名：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="title"  />
          <span style="margin-left: 10px;margin-top: 15px;display:block;" class="tips">　*</span>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>权限：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="name" />
          <span style="margin-left: 10px;margin-top: 10px;display:block;" class="tips">　* 输入模块/控制器/方法即可 例如 Admin/index/index</span>
        </div>
      </div>
     
      </div>
      <!-- 提交 -->
      <div class="form-group" style="margin-left: 265px;">
        <div class="field">
          <button class="layui-btn" type="submit"><i class="fa fa-check" aria-hidden="true"></i> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript">

//单个删除
function del(id){
	if(confirm("您确定要删除吗?")){
		window.location="/StudentUnion/index.php/Admin/Auth/delRule/id/"+id;
	}
}

//添加权限
function addRule(pid){
	$("input[name='title'],input[name='name']").val('');
	$("input[name='pid']").val(0);
	layer.open({
        type: 1,
        area: ['650px', '320px'],
        content: $('#ruleForm'),
        //shade:0,
        offset: ['40px', '200px'],
        cancel:function(index, layero){
          $('#ruleForm').css('display','none');
          layer.close(index);
        }
    });	
}

//添加子权限
function addChildRule(obj){
	var ruleId=$(obj).attr('ruleId');
	$("input[name='pid']").val(ruleId);
	$("input[name='title']").val('');
	$("input[name='name']").val('');
	layer.open({
        type: 1,
        area: ['650px', '320px'],
        content: $('#ruleForm'),
        //shade:0,
        offset: ['40px', '200px'],
        cancel:function(index, layero){
          $('#ruleForm').css('display','none');
          layer.close(index);
        }
    });	
}	

// 修改权限
function editRule(obj){
	var ruleId=$(obj).attr('ruleId');
	var ruletitle=$(obj).attr('ruletitle');
	var ruleName=$(obj).attr('ruleName');
	$("input[name='id']").val(ruleId);
	$("input[name='title']").val(ruletitle);
	$("input[name='name']").val(ruleName);
	layer.open({
        type: 1,
        area: ['650px', '320px'],
        content: $('#editRule'),
        //shade:0,
        offset: ['40px', '200px'],
        cancel:function(index, layero){
          $('#ruleForm').css('display','none');
          layer.close(index);
        }
    });	
}

//全选
$("#checkall").click(function(){ 
  $("input[name='hos_id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

//批量删除
function DelSelect(){
	var Checkbox=false;
	 $("input[name='hos_id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false;		
		$("#listform").submit();		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

//批量排序
function sorts(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){	
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		return false;
	}
}


//批量首页显示
function changeishome(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");		
	
		return false;
	}
}

//批量推荐
function changeisvouch(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");	
		
		return false;
	}
}

//批量置顶
function changeistop(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){		
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");		
	
		return false;
	}
}


//批量移动
function changecate(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){		
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		
		return false;
	}
}

//批量复制
function changecopy(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){	
		var i = 0;
	    $("input[name='id[]']").each(function(){
	  		if (this.checked==true) {
				i++;
			}		
	    });
		if(i>1){ 
	    	alert("只能选择一条信息!");
			$(o).find("option:first").prop("selected","selected");
		}else{
		
			$("#listform").submit();		
		}	
	}
	else{
		alert("请选择要复制的内容!");
		$(o).find("option:first").prop("selected","selected");
		return false;
	}
}

</script>
</body>
</html>