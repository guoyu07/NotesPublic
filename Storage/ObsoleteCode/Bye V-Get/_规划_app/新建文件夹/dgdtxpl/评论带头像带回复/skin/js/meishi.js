// JavaScript Document
// End
function doreply(id){
	obj = document.getElementById('reply_'+id);
	if(obj.style.display=='block'){
		document.getElementById('reply_'+id).style.display='none';
	}else{
		document.getElementById('reply_'+id).style.display='block';
		}
}
	function showqqface(){
		obj = document.getElementById('qqface');
		if(obj.style.display=='block'){
			document.getElementById('qqface').style.display='none';
		}else{
			document.getElementById('qqface').style.display='block';
			showali();
			}
	}
	function apdface(num){
		obj = document.getElementById('content');
		f = '';
		switch (num){
			case 0:f='{:0:}';break;
			case 1:f='{:1:}';break;
			case 2:f='{:2:}';break;
			case 3:f='{:3:}';break;
			case 4:f='{:4:}';break;
			case 5:f='{:5:}';break;
			case 6:f='{:6:}';break;
			case 7:f='{:7:}';break;
			case 8:f='{:8:}';break;
			case 9:f='{:9:}';break;
			case 10:f='{:10:}';break;
			case 11:f='{:11:}';break;
			case 12:f='{:12:}';break;
			case 13:f='{:13:}';break;
			case 14:f='{:14:}';break;
			case 15:f='{:15:}';break;
			case 16:f='{:16:}';break;
			case 17:f='{:17:}';break;
			case 18:f='{:18:}';break;
			case 19:f='{:19:}';break;
			case 20:f='{:20:}';break;
			case 21:f='{:21:}';break;
			case 22:f='{:22:}';break;
			case 23:f='{:23:}';break;
			case 24:f='{:24:}';break;
			case 25:f='{:25:}';break;
			case 26:f='{:26:}';break;
			case 27:f='{:27:}';break;
			case 28:f='{:28:}';break;
			case 29:f='{:29:}';break;
			case 30:f='{:30:}';break;
			case 31:f='{:31:}';break;
case 32:f='{:32:}';break;
case 33:f='{:33:}';break;
case 34:f='{:34:}';break;
case 35:f='{:35:}';break;
case 36:f='{:36:}';break;
case 37:f='{:37:}';break;
case 38:f='{:38:}';break;
case 39:f='{:39:}';break;
case 40:f='{:40:}';break;
case 41:f='{:41:}';break;
case 42:f='{:42:}';break;
case 43:f='{:43:}';break;
case 44:f='{:44:}';break;
case 45:f='{:45:}';break;
case 46:f='{:46:}';break;
case 47:f='{:47:}';break;
case 48:f='{:48:}';break;
case 49:f='{:49:}';break;
case 50:f='{:50:}';break;
			}
			obj.value+=f;
			document.getElementById('qqface').style.display='none';
		}
//�ύ����
function plsubmit(){
	if ($("#content").val().length==0) {
		$('#itip').html('��������������!');
		$('#itip').focus();
		return;
	}
	var nomember = ($('#nomember').attr('checked'))?'1':'0';
	
	var str ='nomember='+nomember+'&enews=' + $('#enews').val() + '&content=' +escape($('#content').val() )+ '&id=' + $('#id').val() + '&classid=' + $('#classid').val() + '&repid=' + $('#repid').val();
	$.ajax({
		type: 'post',
		url: '/e/extend/pl/hf.php',
		data: str,
		error: function() {
			alert('error');
		},
		success: function(data) {
		
			switch (data) {
			case 'login':
                               alert(':���ף�����û�е�¼!');
				break;
			case 'kong':
                                alert(':���ף��Ͻ�������������!');
				break;
			case 'PlSizeTobig':
                                alert(':���ף�����������ݹ�����!');
				break;

			case 'Splclosewords':
                $('#itip').html('��,��ϲ����ɹ�!');
				$('#content').val('');
				CommentToPage(0);
				break;
			case 'Success':
				$('#itip').html('��,��ϲ����ɹ�!');
				$('#content').val('');
				CommentToPage(0);
				break;
                        case 'CloseInfoPl':
	                      alert('-_-#�ף����۶��ر��˻������۰���');
								break;
                        case 'CloseInfoPl1':
	                      alert(':-)�ף��Ͻ�������Ļ�Ա����ɣ�');
	                      break;
                        case 'mg':
	                 alert('~~o(>_<)o ~~�ף���������Ҫ�������');
	                     break;
                        case "PlOutTime":
                        alert("-_-#�ף��Ⱥȱ���ɣ�ϵͳ���Ƶ����ۼ���� 20 ��,���Ժ��ٷ�");
                             break;
			default:
				alert('( ��o��?)�ף�������������ۻ�IP�Ƿ�Ŷ��');
				break;
			}
		}
	});
}


function CheckPl() {
    var username, password, key, nomember, saytext, id, classid, enews, repid, ecmsfrom, str;
    username = $("#username").val();
    password = $("#password").val();
    key = $("#key").val();
    if ($("#nomember").attr("checked")) {
        nomember = 1
    } else {
        nomember = 0
		if(username==''){
			alert('�������û���');
			$('#username').focus();
			return false;
		}
		if(password==''){
			alert('�������û�������');
			$('#password').focus();
			return false;
		}
		
		
    };
	
    saytext = $("#noteCon").val();
    id = $("#id").val();
    classid = $("#plclassid").val();
    enews = 'AjaxPl';
    repid = $("#repid").val();
    ecmsfrom = $("#ecmsfrom").val();
    if (key == '') {
        alert('��������֤��');
        return false
    };
    if (saytext == '') {
        alert('����˵��ʲô��!');
        return false
    };
    str = "username=" + escape(username) + "&password=" + escape(password) + "&key=" + key + "&nomember=" + nomember + "&saytext=" + escape(saytext) + "&id=" + id + "&classid=" + classid + "&enews=" + enews + "&repid=" + repid + "&ecmsfrom=" + ecmsfrom;
    $.ajax({
        type: 'post',
        url: '/e/extend/ajaxcomment/ajaxpl.php',
        data: str,
        error: function() {
            alert('dberror')
        },
        success: function(data) {
            switch (data) {
            case "AddPlSuccess":
                alert("�������۳ɹ�!");
                document.getElementById("key").value = "";
                document.getElementById("noteCon").value = "";
                document.getElementById("wyzm").src = "/e/ShowKey/?v=pl&rm=" + Math.random();
                CommentToPage(0);
                break;
            case "FailPassword":
                alert("�����û�������������!");
                break;
            case "ErrorUrl":
                alert("�����Ե����Ӳ�����!");
                break;
            case "EmptyPl":
                alert("��������������!");
                break;
            case "NotLevelToPl":
                alert("�����ڵĻ�Ա�鲻�ܷ�������!");
                break;
            case "GuestNotToPl":
                alert("�οͲ��ܷ�������!");
                break;
            case "FailKey":
                alert("��֤�����!");
                break;
            case "OutKeytime":
                alert("��֤�����!");
                break;
            case "NotCheckedUser":
                alert("�����ʺŻ�δͨ�����");
                break;
            case "PlSizeTobig":
                alert("�����������ݹ���");
                break;
            case "PlOutTime":
                alert("ϵͳ���Ƶķ���ǩ�ռ���� 20 ��,���Ժ��ٷ�");
                break;
            case "CloseInfoPl":
                alert("����Ϣ�ѹر�����");
                break;
            case "DbError":
                alert("dberror");
                break;
            default:
                alert("����δ֪��ʾ,����case����Ӵ���ʾ: " + data)
            }
        }
    });
}











//�ύ�ظ�
function replsubmit(n){
    
        if ($('#re'+n).val() == '' || $('#retxt'+n).val() == '') {
            $('#itip').html('��������������!');
            $('#itip').focus();
            return;
        }
        var str ='enews=ajaxpl&content=' + escape($('#retxt'+n).val()) + '&id=' + $('#id').val() + '&classid=' + $('#classid').val()+'&pid='+$('#re'+n).val();
        $.ajax({
            type: 'post',
            url: '/e/extend/pl/hf.php',
            data: str,
            error: function() {
                alert('error');
            },
            success: function(data) {
                switch (data) {
                case 'login':
                    alert('�ף��Ͻ���¼ϵͳ��!');
                    break;
                case 'kong':
                    alert('�ף��Ͻ������������ݰ�!');
                    break;
                case 'PlSizeTobig':
                    alert('�ף������������Ҳ̫����!');
                    break;
                 case 'mg':
	            alert('�ף������������ַ�����');
	            break;
                case 'Success':
					CommentToPage(0);
                    break;		
                default:
                   case 'login':
                    alert('�ף��Ͻ���¼ϵͳ��!');
                }
            }
        });
}
