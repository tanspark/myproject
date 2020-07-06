
UE.getEditor('editor');

window.onload = function() {
	var contentData = document.getElementById("content").value;
	UE.getEditor('editor').setContent(contentData);
}

function readContent() {
	var contentData = document.getElementById("content").value;
	UE.getEditor('editor').setContent(contentData);
}

function onWriteForm() {
	var contentData = UE.getEditor('editor').getContent();
	document.getElementById("content").setAttribute("value",contentData);
}

function Dom() {
	var spanControl = document.createElement("span");
	spanControl.innerHTML  = "上传文件："
	document.getElementById("Show").appendChild(spanControl);
	var inputControl = document.createElement("input");
	inputControl.setAttribute("type","file");
	inputControl.setAttribute("name","file[]");
	inputControl.setAttribute("id","file");
	document.getElementById("Show").appendChild(inputControl);
	var brControl = document.createElement("hr");
	document.getElementById("Show").appendChild(brControl);
}

// 上传图片活动掠影页面
function uploadPic()
{
	var spanControl = document.createElement("span");
	spanControl.innerHTML  = "上传文件：&nbsp;&nbsp;&nbsp;"
	document.getElementById("Show").appendChild(spanControl);

	var inputControl = document.createElement("input");
	inputControl.setAttribute("type","file");
	inputControl.setAttribute("name","file[]");
	inputControl.setAttribute("id","file");
	document.getElementById("Show").appendChild(inputControl);

	var brControl = document.createElement("br");
	document.getElementById("Show").appendChild(brControl);

	var span2Control = document.createElement("span");
	span2Control.innerHTML  = "活动简介：&nbsp;&nbsp;&nbsp;"
	document.getElementById("Show").appendChild(span2Control);

	var input2Cpntrol = document.createElement("input");
	input2Cpntrol.setAttribute("class","span8");
	input2Cpntrol.setAttribute("type","text");
	input2Cpntrol.setAttribute("name","desc[]");
	input2Cpntrol.setAttribute("id","desc");
	document.getElementById("Show").append(input2Cpntrol)

	var hrControl = document.createElement("hr");
	document.getElementById("Show").appendChild(hrControl);
}

//上传团队
function uploadTeam()
{
	var spanControl = document.createElement("span");
	spanControl.innerHTML  = "上传文件："
	document.getElementById("Show").appendChild(spanControl);

	var inputControl = document.createElement("input");
	inputControl.setAttribute("type","file");
	inputControl.setAttribute("name","file[]");
	inputControl.setAttribute("id","file");
	document.getElementById("Show").appendChild(inputControl);

	var brControl = document.createElement("br");
	document.getElementById("Show").appendChild(brControl);

	var span2Control = document.createElement("span");
	span2Control.innerHTML  = "图片简介：&nbsp;&nbsp;"
	document.getElementById("Show").appendChild(span2Control);

	var input2Cpntrol = document.createElement("input");
	input2Cpntrol.setAttribute("class","span8");
	input2Cpntrol.setAttribute("type","text");
	input2Cpntrol.setAttribute("name","desc[]");
	input2Cpntrol.setAttribute("id","desc");
	document.getElementById("Show").append(input2Cpntrol)

	var hrControl = document.createElement("hr");
	document.getElementById("Show").appendChild(hrControl);
}