<?php
	require './include/common.inc.php';
	$pagetitle='���֮��';
function morehead(){
	echo <<<HEADHTML
<meta name="description" content="�����ݡ�iCKD.cn�����֮�Ҽ��ɳ����ٵݵ绰�͵��Ų�ѯ��������ͨ��ݡ�˳�ᡢԲͨ���Һ��š��ϴ���졢�ηɺ衢��ͨ��լ���͡��ŷᡢ�°���������ͨ��ƽ�ʰ�����EMS��" />
<meta name="keywords" content="������㡢�۸񡢵绰�����Ų�ѯ" />
  <script language="javascript">
  function submitform(o){
	  var f=o.form;
	  if(f.elements["mailNo"].value){
	  	  var url="http://www.ickd.cn/"+o.id+"-"+f.elements["mailNo"].value+".html";
	  f.action=url;
	  }else{
		  f.elements["mailNo"].focus();
		  return false;
	  }
  }
  </script>

HEADHTML;
	}
	require TW_ROOT.'./template/other_header.php';
?>
  <div class="exp">
    <form method="post" action="">
      <dl>
        <dt>��ͨ���ò�ѯ</dt>
        <dd title="��ͨ��������12λ��������ɣ���ͨ�ͷ��绰��0571-82122222">
          <div class="name">��д��ͨ����</div>
          <input name="mailNo" type="text" maxlength="12" />
          <input type="submit" onclick="return submitform(this)" name="shentong" value="��ѯ" id="shentong" />
        </dd>
      </dl>
    </form>
  </div>
  <div class="exp">
    <form method="post" action="">
      <dl>
        <dt> ˳���ݲ�ѯ</dt>
        <dd title="˳���ݵ�����12λ������ɣ��м��޿ո�Ŀǰ�����Ե绰���ź���λ��ͷ��˳�ṫ˾ȫ��ͳһ�绰��4008111111 ���:00852-27300273 Ͷ�ߣ�0755-83151111">
          <div class="name">˳���ݵ���</div>
          <input name="mailNo" type="text" maxlength="12" />
          <input type="submit" onclick="return submitform(this)" name="shunfeng" value="��ѯ" id="shunfeng" />
        </dd>
      </dl>
    </form>
  </div>
  <div class="exp">
    <form method="post" action="">
      <dl>
        <dt>Բͨ��ݲ�ѯ</dt>
        <dd title="Բͨ��ݵ�����10λ������ɣ�Բͨ��˾�ͻ�����绰��021-69777888 Ͷ�ߣ�021-69777999 ��ʱ����021-69777806/69777807">
          <div class="name">��дԲͨ����</div>
          <input name="mailNo" type="text" maxlength="12" />
          <input type="submit" onclick="return submitform(this)" name="yuantong" value="��ѯ" id="yuantong" />
        </dd>
      </dl>
    </form>
  </div>
  <div class="exp">
    <form method="post" action="">
      <dl>
        <dt> ����EMS��ѯ</dt>
        <dd title="����EMS������13λ��ĸ��������ɣ�һ�㿪ͷ�ͽ�β��λ����ĸ���м������֣�EMS�ͷ��绰��11185">
          <div class="name">��дEMS����</div>
          <input name="mailNo" type="text" maxlength="12" />
          <input type="submit" onclick="return submitform(this)" name="ems" value="��ѯ" id="ems" />
        </dd>
      </dl>
    </form>
  </div>
  <div class="exp">
    <form method="post" action="">
      <dl>
        <dt> ƽ��/�Һ��Ų�ѯ</dt>
        <dd title="�Һ���/�����ĵ�����13λ��ĸ��������ɣ���ͷ��λ����ĸ������ʮһλ��������ɣ������Һ�������ͳһ��ѯ�绰��Ͷ�ߵ绰��010-12305">
          <div class="name">��������Ӧ����</div>
          <input name="mailNo" type="text" maxlength="12" />
          <input type="submit" onclick="return submitform(this)" name="pingyou" value="��ѯ" id="pingyou" />
        </dd>
      </dl>
    </form>
  </div>
  <div class="exp">
    <form method="post" action="">
      <dl>
        <dt> ��ͨ��ݲ�ѯ</dt>
        <dd title="��ͨ������12λ������ɣ�Ŀǰ������01*��2008**��6**�ȿ�ͷ����ͨ�ͷ��绰��021-59130789/59130271 Ͷ�ߣ�021-69974284/69974281">
          <div class="name">��д��ͨ����</div>
          <input name="mailNo" type="text" maxlength="12" />
          <input type="submit" onclick="return submitform(this)" name="zhongtong" value="��ѯ" id="zhongtong" />
        </dd>
      </dl>
    </form>
  </div>
  <div class="exp">
    <form method="post" action="">
      <dl>
        <dt> �ϴ���˲�ѯ</dt>
        <dd title="�ϴﵥ����13λ������ɣ�Ŀǰ������10*��12*�ȿ�ͷ������绰��021-62215588 �г�����021-39296978">
          <div class="name">��д�ϴ��˵���</div>
          <input name="mailNo" type="text" maxlength="12" />
          <input type="submit" onclick="return submitform(this)" name="yunda" value="��ѯ" id="yunda" />
        </dd>
      </dl>
    </form>
  </div>
  <div class="exp">
    <form method="post" action="">
      <dl>
        <dt> ��ͨ���˲�ѯ</dt>
        <dd title="��ͨ������13λ������ɣ�Ŀǰ������00**��02**��B0*�ȿ�ͷ����ͨ�ܲ�����绰��021-59114488  Ͷ�ߣ�021-69117270/69117290">
          <div class="name">��д��ͨ����</div>
          <input name="mailNo" type="text" maxlength="12" />
          <input type="submit" onclick="return submitform(this)" name="huitong" value="��ѯ" id="huitong" />
        </dd>
      </dl>
    </form>
  </div>
  <div class="exp">
    <form method="post" action="">
      <dl>
        <dt> լ���Ϳ���</dt>
        <dd title="լ���͵�����10λ������ɣ�Ŀǰ������7**��6**��5**�ȿ�ͷ��ȫ���ͷ��绰��400-6789-000">
          <div class="name">��дլ���͵���</div>
          <input name="mailNo" type="text" maxlength="12" />
          <input type="submit" onclick="return submitform(this)" name="zhaijisong" value="��ѯ" id="zhaijisong" />
        </dd>
      </dl>
    </form>
  </div>
  <div class="exp">
    <form method="post" action="">
      <dl>
        <dt> �ηɺ��ٵ�</dt>
        <dd title="�ηɺ赥����10λ������ɣ�Ŀǰ������9*��8*��2*�ȿ�ͷ����ѯ�绰 020-61249033(����) 021-39873577(����) 010-85512488(����)">
          <div class="name">�ηɺ��˵���</div>
          <input name="mailNo" type="text" maxlength="12" />
          <input type="submit" onclick="return submitform(this)" name="xinfeihong" value="��ѯ" id="xinfeihong" />
        </dd>
      </dl>
    </form>
  </div>
  <div class="exp">
    <form method="post" action="">
      <dl>
        <dt> �����ݲ�ѯ</dt>
        <dd title="����쵥����14λ������ɣ�Ŀǰ������6**��5*��00*�ȿ�ͷ���ͻ�����绰��021-67662333 �ܲ��绰��021-34627557 Ͷ�ߣ�400-8208198 ȫ��VIP���ߣ�400 8208515">
          <div class="name">��д�����˵���</div>
          <input name="mailNo" type="text" maxlength="12" />
          <input type="submit" onclick="return submitform(this)" name="tiantian" value="��ѯ" id="tiantian" />
        </dd>
      </dl>
    </form>
  </div>
  <div class="exp">
    <form method="post" action="">
      <dl>
        <dt> �����ܴ�׷��</dt>
        <dd title="�����ܴﵥ����10λ��12λ������ɣ�Ŀǰ������8800*��3000*��50*�ȿ�ͷ���ܴ�ͷ��绰��021-60739320��021-60739323">
          <div class="name">���ܴ��˵���</div>
          <input name="mailNo" type="text" maxlength="12" />
          <input type="submit" onclick="return submitform(this)" name="nengda" value="��ѯ" id="nengda" />
        </dd>
      </dl>
    </form>
  </div>
  <div class="exp">
    <form method="post" action="">
      <dl>
        <dt> ȫһ���˸���</dt>
        <dd title="ȫһ����������12λ������ɣ�Ŀǰ������1110*��1100*�ȿ�ͷ���ͻ�����绰��400-6781515/021-52695816 Ͷ�ߣ�021-52695805">
          <div class="name">����ȫһ�˵���</div>
          <input name="mailNo" type="text" maxlength="12" />
          <input type="submit" onclick="return submitform(this)" name="quanyi" value="��ѯ" id="quanyi" />
        </dd>
      </dl>
    </form>
  </div>
  <div class="exp">
    <form method="post" action="">
      <dl>
        <dt> <strong>����������ѯ</strong></dt>
        <dd title="��������������12λ������ɣ�Ŀǰ������666*�ȿ�ͷ��������������绰��400 1111119">
          <div class="name">���ٿ�ݵ���</div>
          <input name="mailNo" type="text" maxlength="12" />
          <input type="submit" onclick="return submitform(this)" name="huitong7" value="��ѯ" id="huitong7" />
        </dd>
      </dl>
    </form>
  </div>
  <div class="exp">
    <form method="post" action="">
      <dl>
        <dt> <strong>�ٶ���ݲ�ѯ</strong></dt>
        <dd title="�ٶ������ͻ�����绰��0769-85010803 Ͷ�߼ල��4008822168">
          <div class="name">�����ٶ��˵���</div>
          <input name="mailNo" type="text" maxlength="12" />
          <input type="submit" onclick="return submitform(this)" name="sure" value="��ѯ" id="sure" />
        </dd>
      </dl>
    </form>
  </div>
  <div class="exp">
    <form method="post" action="">
      <dl>
        <dt> ��������׷��</dt>
        <dd title="�����ݿͷ���0769-85703777/85702777">
          <div class="name">��д�����</div>
          <input name="mailNo" type="text" maxlength="12" />
          <input type="submit" onclick="return submitform(this)" name="longbang" value="��ѯ" id="longbang" />
        </dd>
      </dl>
    </form>
  </div>
  <div class="exp">
    <form method="post" action="">
      <dl>
        <dt> �°�������ѯ</dt>
        <dd title="�°�������ѯ�绰��400 8305555">
          <div class="name">�°������˵���</div>
          <input name="mailNo" type="text" maxlength="12" />
          <input type="submit" onclick="return submitform(this)" name="debang" value="��ѯ" id="debang" />
        </dd>
      </dl>
    </form>
  </div>
  <div class="exp">
    <form method="post" action="">
      <dl>
        <dt> �ŷ�������ѯ</dt>
        <dd title="�ŷ������ͷ����ߣ�4008306333 0769-81518333">
          <div class="name">��д�ŷᵥ��</div>
          <input name="mailNo" type="text" maxlength="12" />
          <input type="submit" onclick="return submitform(this)" name="xinfeng" value="��ѯ" id="xinfeng" />
        </dd>
      </dl>
    </form>
  </div>
  <div class="exp">
    <form method="post" action="">
      <dl>
        <dt> <strong>���ͨ����</strong></dt>
        <dd title="���ͨ�ͻ�����绰��0769-0769-88620000/85116666">
          <div class="name">���ͨ�˵���</div>
          <input name="mailNo" type="text" maxlength="12" />
          <input type="submit" onclick="return submitform(this)" name="lianhaotong" value="��ѯ" id="lianhaotong" />
        </dd>
      </dl>
    </form>
  </div>
  <div class="exp">
    <form method="post" action="">
      <dl>
        <dt> ���Ŵ����</dt>
        <dd title="���Ŵ�ͻ�����010-64008484">
          <div class="name">���밲�Ŵﵥ</div>
          <input name="mailNo" type="text" maxlength="12" />
          <input type="submit" onclick="return submitform(this)" name="anxinda" value="��ѯ" id="anxinda" />
        </dd>
      </dl>
    </form>
  </div>
  <div class="exp">
    <form method="post" action="">
      <dl>
        <dt> ϣ����˹CCES���</dt>
        <dd title="ϣ����˹�ͷ��绰��021-51559603/62967777 4006773777">
          <div class="name">ϣ����˹CCES����</div>
          <input name="mailNo" type="text" maxlength="12" />
          <input type="submit" onclick="return submitform(this)" name="cces" value="��ѯ" id="cces" />
        </dd>
      </dl>
    </form>
  </div>
  <div class="exp">
    <form method="post" action="">
      <dl>
        <dt> ȫ��ͨ�ٵ�</dt>
        <dd title="ȫ��ͨ�����ܲ��绰��020-86298999">
          <div class="name">��дȫ��ͨ�˵���</div>
          <input name="mailNo" type="text" maxlength="12" />
          <input type="submit" onclick="return submitform(this)" name="quanritong" value="��ѯ" id="quanritong" />
        </dd>
      </dl>
    </form>
  </div>
<?php
	require TW_ROOT.'./template/other_footer.php';
?>
