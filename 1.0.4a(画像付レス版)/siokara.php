<?
/* �摜�f����

futaba.php v0.8 lot.031015
���̃X�N���v�g�̓��b�cPHP!<http://php.s3.to/>��gazou.php�������������̂ł��B
�z�z�����̓��b�cPHP!�ɏ����܂��B�����A�Ĕz�z�͎��R�ɂǂ����B
���̃X�N���v�g�Ɋւ��鎿��̓��b�cPHP!�ɂ��Ȃ��悤�ɂ��肢���܂��B
�ŐV�ł�<http://www.2chan.net/script/>�Ŕz�z���Ă��܂��B
������͏������ӂ���<http://www.2chan.net/junbi/index2.html>�܂łǂ����B

�ݒu�@�F
���]�̃f�B���N�g���̃p�[�~�b�V������777�ɂ��܂��B
src�f�B���N�g����thumb�f�B���N�g�������A�p�[�~�b�V������777�ɂ��܂��B<br>
futaba.php��u���A�u���E�U����ďo���܂�(�K�v�ȃt�@�C���������ݒ肳��܂�)�B
gif2png<http://www.tuxedo.org/~esr/gif2png/>������ꍇ�́A
gif�ł��T���l�C�������܂��B�t���̃o�C�i����linux-i386�p�ł��B

�Ƃ�����������������X�N���v�g
Ver.1.0.0 2004/04/21 ���J�J�n
futaba.php v0.8 lot.031015����̎�ȕύX�_
bmp/swf�̖����I�ȋ֎~�Agif�\�����@�����A�T���l�掿����A�X���勭��sage�@�\�A�ȉ��ȗ��ݒ�
gif2png�̓���Ɗ�{�I�Ȑݒu���@�͏�L�ӂ��Ώ����X���Ɣz�z�����Q�Ƃ̂��ƁB
�m�b�Ə����������Ă��ꂽ�Ƃ������B�ɑ���Ȃ銴�ӂƌ����B
Ver.1.0.1 2004/05/09
�ݒ�\���ڂɒǉ�
�������������N�̉�/���ԕ\���ɕb���܂߂邩/��������sage�}���ŏ펞sage/�ݒ莞�Ԍ�ɋ���sage
�ȉ��ȗ����w��
Ver.1.0.2 2004/05/19
�Ǘ���ʂɃT���l�C�������ւ��@�\��ǉ�/�Ǘ���ʂɋ����X��sage���@�\��ǉ�
Ver.1.0.3 2004/05/22
�����̃T���l�C���摜�I���@�\�ǉ�/�摜�̎擾��html���o�R�@�\�ǉ�/���e���ɃA�jGIF�̃T���l���I���\��
/�����ւ�������ꕔ�C��/�u���X�ȗ��v�̐ݒ�l��萔��
Ver.1.0.3a 2004/05/23
���X�ɉ摜�Y�t�\�o�[�W�����A�J�����x�[�^��
Ver.1.0.4 2004/08/01
����̃z�X�g��o�^����ID(�z�X�g�����Í�������������)�A�܂��̓z�X�g����\������@�\��ǉ�
Ver.1.0.4a 2004/08/01
���X�ɉ摜�Y�t�\�o�[�W������ID�A�z�X�g���\���@�\��ǉ�
���ς�炸�x�[�^�ł̂܂�(����A�x�[�^�ňȑO�ɖ��������ł̊�K�X���)

******************************************�I���ӁI***************************************
�Eimg.log�̃t�@�C�����̓f�t�H���g����ς��Ă��g�p���������B
�@define(LOGFILE, 'img.log'); // ���O�t�@�C����
�E�ݒu�T�[�o�ɂ���Ă�index.htm�������Ɖ摜�f���ݒu�t�H���_���������Ă��܂��ꍇ������܂��B
�@���index.htm��u�����A�X�N���v�g�̓�����t�@�C�����w���index.htm�ɕύX���Ă��������B
�@define("PHP_SELF2", 'siokara.htm'); // ������t�@�C����
*****************************************************************************************
*/

// hage �ȉ�2�s�͒����p���
ignore_user_abort(0);
error_reporting(E_ALL & ~E_NOTICE);
// hage �����p�����܂ť��

extract($_POST);
extract($_GET);
extract($_COOKIE);
$upfile_name=$_FILES["upfile"]["name"];
$upfile=$_FILES["upfile"]["tmp_name"];
// �S�ʐݒ�---------------------------------------------------------------------
define(LOGFILE, 'img.log');             // ���O�t�@�C����
define(TREEFILE, 'tree.log');           // ���O�t�@�C����
define(IMG_DIR, 'src/');                // �摜�ۑ��f�B���N�g���Bsiokara.php���猩��
define(THUMB_DIR,'thumb/');             // �T���l�C���ۑ��f�B���N�g��
define(TITLE, '�摜�f����');            // �^�C�g���i<title>��TOP�j
define(HOME,  '../');                   // �u�z�[���v�ւ̃����N
define(MAX_KB, '500');                  // ���e�e�ʐ��� KB�iphp�̐ݒ�ɂ��2M�܂�
define(MAX_W,  '200');                  // ���e�T�C�Y���i����ȏ��width���k��
define(MAX_H,  '200');                  // ���e�T�C�Y����
define(PAGE_DEF, '5');                  // ��y�[�W�ɕ\������L��
define(FOLL_ADD, '15');                 // �ȉ��ȗ��i��y�[�W�ɕ\������L���~�w��Ő����ݒ萔
define(LOG_MAX,  '500');                // ���O�ő�s��
define(ADMIN_PASS, 'admin_pass');       // �Ǘ��҃p�X
define(RE_COL, '789922');               // �����t�������̐F
define(PHP_SELF, 'siokara.php');        // ���̃X�N���v�g��
define(PHP_SELF2, 'siokara.htm');       // ������t�@�C����
define(PHP_EXT, '.htm');                // 1�y�[�W�ȍ~�̊g���q
define(RENZOKU, '2');                   // �A�����e�b��
define(RENZOKU2, '2');                  // �摜�A�����e�b��
define(MAX_RES, '30');                  // ����sage�ɂȂ郌�X��
define(USE_THUMB, '1');                 // �T���l�C������� ����:1 ���Ȃ�:0
define(PROXY_CHECK, '0');               // proxy�̏����݂𐧌����� y:1 n:0
define(DISP_ID, '0');                   // ID��\������ ����:2 ����:1 ���Ȃ�:0
define(BR_CHECK, '0');                  // ���s��}������s�� ���Ȃ�:0
define(EN_AUTOLINK, '0');               // URL���������N���s�� ����:1 ���Ȃ�:0
define(EN_SEC, '1');                    // ���ԕ\���Ɂu�b�v���܂߂�  �܂߂�:1 �܂߂Ȃ�:0
define(EN_SAGE_START, '1');             // �X���勭��sage�@�\���g�p���� ����:1 ���Ȃ�:0
define(MAX_PASSED_HOUR, '0');           // ����sage�܂ł̎���   0�ŋ���sage�Ȃ�
define(ADMIN_SAGE, '1');                // �Ǘ��ҋ���sage����  ����:1 ���Ȃ�:0
define(NOTICE_SAGE, '0');               // ����sage�����m����  ����:1  ���Ȃ�:0
define(DEF_SUB, '����');                // �ȗ����̑薼
define(DEF_NAME,'������');              // �ȗ����̖��O
define(DEF_COM, '�{������');            // �ȗ����̖{��
define(RES_MARK,  '�c');                // ���X�̓��ɕt���镶����
define(OMIT_RES, '6');                  // �u���X�ȗ��v��\�����郌�X�̐�

// ���X�摜�Y�t�@�\-------------------------------------------------------------
define(RES_IMG, '1');                   // ���X�ɂ��摜��Y�t�ł���悤�ɂ���  �Y�t�\:1 �Y�t�s��:0

// �A�j���[�V�����f�h�e�ݒ�-----------------------------------------------------
// �T���l�C�����g�p���Ȃ��ꍇ�AGIF�����̂܂ܕ\�����邽�߁A �A�j���[�V����GIF�������܂��B
define(USE_GIF_THUMB, '0');             // GIF�\���ɃT���l�C�����g�p����  ����:1  ���Ȃ�:0

// �c�[������html�o�R�֌W-------------------------------------------------------
define(IMG_REFER, '1');                 // �c�[�������ɉ摜�����N��html�o�R�ɂ���  ����:1  ���Ȃ�:0
define(IMG_REF_DIR, 'ref/');            // �o�R��html�i�[�f�B���N�g��

// �T���l�C���Ǘ��ҍ������@�\---------------------------------------------------
// �����ւ��T���l(1)[replace_n.jpg]�L�ō������L���A�����Ŗ���
define(REPLACE_EXT, '.replaced');       // �����ւ��̍ہA���X�̃T���l�C���t�@�C���̂��K�ɕt���镶��
define(NOTICE_THUMB, '1');              // �T���l�����ւ������m����   ����:1  ���Ȃ�:0

// ���ڂ𑝂₷�ꍇ�͒萔�錾�����t�@�C�����A�^�C�g����$rep_thumb�z��ɒǉ����܂��B
// �������萔�錾���Ȃ��Œ��ڔz��ɒǉ����Ă�OK
define(R_THUM1, 'replace_n.jpg');       // �����ւ��T���l(1) �t�@�C����
define(R_TITL1, '�ӂ�');              // �����ւ��T���l(1) �^�C�g��
define(R_THUM2, 'replace_g.jpg');       // �����ւ��T���l(2) �t�@�C����
define(R_TITL2, '����');                // �����ւ��T���l(2) �^�C�g��
define(R_THUM3, 'replace_l.jpg');       // �����ւ��T���l(3) �t�@�C����
define(R_TITL3, '���');                // �����ւ��T���l(3) �^�C�g��
define(R_THUM4, 'replace_3.jpg');       // �����ւ��T���l(4) �t�@�C����
define(R_TITL4, '����');              // �����ւ��T���l(4) �^�C�g��

$rep_thumb = array(R_TITL1=>R_THUM1,R_TITL2=>R_THUM2,R_TITL3=>R_THUM3,R_TITL4=>R_THUM4);
$default_thumb = R_THUM1;               // �f�t�H���g�̃T���l�t�@�C����

// hage �ǉ� 2004.8.1
//�Ԏ��\���@�\�ǉ�------------------------------------------------------------
define(HOSTFILE,'host.lst');            // �N���z�X�g�̋L�^�t�@�C��
define(IDHOSTFILE,'idhost.lst');        // �N��ID�̋L�^�t�@�C��
// hage �ǉ������܂�

//-----------------------------------------------------------------------------
$path = realpath("./").'/'.IMG_DIR;
$badstring = array("dummy_string","dummy_string2","\.ws/","��������","�����摜","�F�B��W");     // ���₷�镶����
$badfile = array("dummy","dummy2");                     // ���₷��t�@�C����md5
$badip = array("addr.dummy.com","addr2.dummy.com");     // ���₷��z�X�g
$addinfo='';

/* �w�b�_ */
function head(&$dat){
  $dat.='<html><head>
<META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=Shift_JIS">
<meta name="Berry" content="no">
<meta HTTP-EQUIV="pragma" CONTENT="no-cache">
<STYLE TYPE="text/css">
<!--
body,tr,td,th { font-size:12pt }
a:hover { color:#DD0000; }
span { font-size:20pt }
small { font-size:10pt }
-->
</STYLE>
<title>'.TITLE.'</title>
<script language="JavaScript"><!--
function l(e){var P=getCookie("pwdc"),N=getCookie("namec"),i;with(document){for(i=0;i<forms.length;i++){if(forms[i].pwd)with(forms[i]){pwd.value=P;}if(forms[i].name)with(forms[i]){name.value=N;}}}};onload=l;function getCookie(key, tmp1, tmp2, xx1, xx2, xx3) {tmp1 = " " + document.cookie + ";";xx1 = xx2 = 0;len = tmp1.length;  while (xx1 < len) {xx2 = tmp1.indexOf(";", xx1);tmp2 = tmp1.substring(xx1 + 1, xx2);xx3 = tmp2.indexOf("=");if (tmp2.substring(0, xx3) == key) {return(unescape(tmp2.substring(xx3 + 1, xx2 - xx1 - 1)));}xx1 = xx2 + 1;}return("");}
//--></script>
</head>
<body bgcolor="#FFFFEE" text="#800000" link="#0000EE" vlink="#0000EE">
<p align=right>
[<a href="'.HOME.'" target="_top">�z�[��</a>]
[<a href="'.PHP_SELF.'?mode=admin">�Ǘ��p</a>]
<p align=center>
<font color="#800000" size=5>
<b><SPAN>'.TITLE.'</SPAN></b></font>
<hr width="90%" size=1>
';
}
/* ���e�t�H�[�� */
function form(&$dat,$resno,$admin=""){
  global $addinfo;
  $maxbyte = MAX_KB * 1024;
  $no=$resno;
  if($resno){
    $msg .= "[<a href=\"".PHP_SELF2."\">�f���ɖ߂�</a>]\n";
    $msg .= "<table width='100%'><tr><th bgcolor=#e04000>\n";
    $msg .= "<font color=#FFFFFF>���X���M���[�h</font>\n";
    $msg .= "</th></tr></table>\n";
  }
  if($admin){
    $hidden = "<input type=hidden name=admin value=\"".ADMIN_PASS."\">";
    $msg = "<h4>�^�O�������܂�</h4>";
  }
  $dat .= $msg.'<center>'.
          '<form action="'.PHP_SELF.'" method="POST" enctype="multipart/form-data">'.
          '<input type=hidden name=mode value="regist">'.$hidden.
          '<input type=hidden name="MAX_FILE_SIZE" value="'.$maxbyte.'">';
  if($no){ $dat .= '<input type=hidden name=resto value="'.$no.'">'; }
  $dat .= '<table cellpadding=1 cellspacing=1>'.
          '<tr><td bgcolor=#eeaa88><b>���Ȃ܂�</b></td><td><input type=text name=name size="28"></td></tr>'.
          '<tr><td bgcolor=#eeaa88><b>E-mail</b></td><td><input type=text name=email size="28"></td></tr>'.
          '<tr><td bgcolor=#eeaa88><b>��@�@��</b></td><td><input type=text name=sub size="35">'.
          '<input type=submit value="���M����"></td></tr>'.
          '<tr><td bgcolor=#eeaa88><b>�R�����g</b></td>'.
          '<td><textarea name=com cols="48" rows="4" wrap=soft></textarea></td></tr>';
  if(!$resno || RES_IMG){
    // hage �ύX 2004.8.1
    // ���e����GIF��~�ł���悤�Ƀ��x����ǉ�(USE_GIF_THUMB�ɂ�锻�ʒǉ�)
    $dat .= '<tr><td bgcolor=#eeaa88><b>�Y�tFile</b></td>'.
            '<td><input type=file name=upfile size="35">';
    if(!USE_GIF_THUMB){
      $dat .= '[<label><input type=checkbox name=noanime value=on checked>GIF�A�j����~</label>]';
    }
    $dat .= '[<label><input type=checkbox name=textonly value=on>�摜�Ȃ�</label>]</td></tr>';
    // hage �ύX�����܂�
  }
  $dat .= '<tr><td bgcolor=#eeaa88><b>�폜�L�[</b></td>'.
          '<td><input type=password name=pwd size=8 maxlength=8 value="">'.
          '<small>(�L���̍폜�p�B�p������8�����ȓ�)</small></td></tr>'.
          '<tr><td colspan=2><small>'.
          '<LI>';
  // hage �ύX 2004.8.1
  if(RES_IMG){
    $dat .= '���X�ɉ摜�Y�t�B';
  }
  $dat .= '�Y�t�\�t�@�C���FGIF, JPG, PNG �u���E�U�ɂ���Ă͐���ɓY�t�ł��Ȃ����Ƃ�����܂��B'.
          '<LI>�摜�͉� '.MAX_W.'�s�N�Z���A�c '.MAX_H.'�s�N�Z���ȏ�͏k���\������܂��B';
  if(!USE_GIF_THUMB){
    $dat .= '<LI>GIF�͓����܂��B�������������͓��e����[GIF�A�j����~]�̃`�F�b�N�������B';
  }
  // hage �ύX�����܂�
  $dat .= '<LI>�ő哊�e�f�[�^�ʂ� '.MAX_KB.' KB �܂łł��Bsage�@�\�t���B�X���傳��ڗ�sage�L���ŋ���sage�B'.
          $addinfo.'</small></td></tr></table></form></center><hr>';
}
/* �L������ */
function updatelog($resno=0){
  global $path;

  // hage �ǉ� 2004.8.1
  $hostdat = array('dummy');
  if(is_file(HOSTFILE)){
    $hostdat = file(HOSTFILE);
    $counthost = count($hostdat);
    for($i=0;$i<$counthost;++$i){ $hostdat[$i] = trim($hostdat[$i],"\n"); }
  }
  $idhostdat = array('dummy');
  if(is_file(IDHOSTFILE)){
    $idhostdat = file(IDHOSTFILE);
    $counthost = count($idhostdat);
    for($i=0;$i<$counthost;++$i){ $idhostdat[$i] = trim($idhostdat[$i],"\n"); }
  }
  // hage �ǉ������܂�

  $tree = file(TREEFILE);
  $find = false;
  if($resno){
    $counttree=count($tree);
    for($i = 0;$i<$counttree;$i++){
      list($artno,)=explode(",",rtrim($tree[$i]));
      if($artno==$resno){$st=$i;$find=true;break;} //���X�挟��
    }
    if(!$find) error("�Y���L�����݂���܂���");
  }
  $line = file(LOGFILE);
  $countline=count($line);
  for($i = 0; $i < $countline; $i++){
    list($no,) = explode(",", $line[$i]);
    $lineindex[$no]=$i + 1; //�t�ϊ��e�[�u���쐬
  }

  $counttree = count($tree);
  for($page=0;$page<$counttree;$page+=PAGE_DEF){
    $dat='';
    head($dat);
    form($dat,$resno);
    if(!$resno){
      $st = $page;
    }
    $dat.='<form action="'.PHP_SELF.'" method=POST>';

  for($i = $st; $i < $st+PAGE_DEF; $i++){
    if($tree[$i]=="") continue;
    $treeline = explode(",", rtrim($tree[$i]));
    $disptree = $treeline[0];
    $j=$lineindex[$disptree] - 1; //�Y���L����T����$j�ɃZ�b�g
    if($line[$j]=="") continue;   //$j���͈͊O�Ȃ玟�̍s
    list($no,$now,$name,$email,$sub,$com,$url,
         $host,$pwd,$ext,$w,$h,$time,$chk) = explode(",", $line[$j]);
    // URL�ƃ��[���Ƀ����N
    if($email) $name = "<a href=\"mailto:$email\">$name</a>";
    $com = auto_link($com);
    $com = eregi_replace("(^|>)(&gt;[^<]*)", "\\1<font color=".RE_COL.">\\2</font>", $com);
    // �摜�t�@�C����
    $img = $path.$time.$ext;
    $src = IMG_DIR.$time.$ext;

    // �o�R��html�t�@�C���쐬
    if (IMG_REFER && is_file($img) && !is_file(IMG_REF_DIR.$time.".htm")){
      $fp=fopen(IMG_REF_DIR.$time.".htm","w");
      flock($fp, 2);
      rewind($fp);
      fputs($fp, "<META HTTP-EQUIV=\"refresh\" content=\"0;URL=../$src\">");
      fclose($fp);
    }

    // <img�^�O�쐬
    $imgsrc = "";
    $dat_img="";
    if($ext && is_file($img)){
      $size = filesize($img);//alt�ɃT�C�Y�\��
      if($w && $h){//�T�C�Y�����鎞
        if(@is_file(THUMB_DIR.$time.'s.jpg') &&
          (USE_GIF_THUMB||$ext!='.gif'||stristr($url,'noanime')||@is_file(THUMB_DIR.$time.'s.jpg'.REPLACE_EXT))){
          $imgsrc = "<small>�T���l�C����\�����Ă��܂�.�N���b�N����ƌ��̃T�C�Y��\�����܂�.</small><br>";
          if (IMG_REFER) {$imgsrc .= "<a href=\"".IMG_REF_DIR.$time.".htm\" target=_blank>";}
          else{$imgsrc .= "<a href=\"".$src."\" target=_blank>";}
          if ( @is_file(THUMB_DIR.$time.'s.jpg'.REPLACE_EXT)){
            $imgsrc .= "<img src=".THUMB_DIR.$time.'s.jpg'.REPLACE_EXT;
          }
          else{
            $imgsrc .= "<img src=".THUMB_DIR.$time.'s.jpg';
          }
          $imgsrc .= " border=0 align=left width=$w height=$h hspace=20 alt=\"".$size." B\"></a>";
        }else{
          if (IMG_REFER) {$imgsrc = "<a href=\"".IMG_REF_DIR.$time.".htm\" target=_blank>";}
          else{$imgsrc = "<a href=\"".$src."\" target=_blank>";}
          $imgsrc .= "<img src=".$src." border=0 align=left width=$w height=$h hspace=20 alt=\"".$size." B\"></a>";
        }
      }else{//����ȊO
        if (IMG_REFER) {$imgsrc = "<a href=\"".IMG_REF_DIR.$time.".htm\" target=_blank>";}
        else{$imgsrc = "<a href=\"".$src."\" target=_blank>";}
        $imgsrc .= "<img src=".$src." border=0 align=left hspace=20 alt=\"".$size." B\"></a>";
      }
      if (IMG_REFER) {
        // �X�����e�[�u���^�ɂ��邽�߂ɉ摜�֌W�^�O��ʕϐ���
        $dat_img="�摜�^�C�g���F<a href=\"".IMG_REF_DIR.$time.".htm\" target=_blank>$time$ext</a>-($size B)<br>$imgsrc";      }else{
        $dat_img="�摜�^�C�g���F<a href=\"$src\" target=_blank>$time$ext</a>-($size B)<br>$imgsrc";
      }
    }
    // ���C���쐬
    $dat .= $dat_img; //�摜�֌W������������Ɉړ�
    $dat .= "<input type=checkbox name=\"$no\" value=delete><font color=#cc1105 size=+1><b>$sub</b></font> \n";
    // hage �ǉ� 2004.8.1
    // $dat .= " <font color=#117743><b>$name</b></font> $now No.$no &nbsp; \n";
    $dat .= " <font color=#117743><b>$name</b></font> $now";
    if(!DISP_ID && in_array($host,$idhostdat) && !stristr($now,"ID:")){
      $idtemp = " ID:".substr(crypt(md5($host),'id'),-8);
      $dat .= $idtemp;
    }
    $dat .= " No.$no &nbsp; \n";
    // hage �ǉ������܂�
    if(!$resno){ $dat.="[<a href=".PHP_SELF."?res=$no>�ԐM</a>]<br>"; }
    // hage �ǉ� 2004.8.1
    // $dat.="\n<blockquote>$com</blockquote>";
    if(in_array($host,$hostdat)){
      $dat .= "\n<blockquote>[<font color=#ff0000>$host</font>]<br>$com</blockquote>";
    }else{
      $dat .= "\n<blockquote>$com</blockquote>";
    }
    // hage �ǉ������܂�

    // ���낻�������B
    if($lineindex[$no]-1 >= LOG_MAX*0.95){
     $dat.="<font color=\"#f00000\"><b>���̃X���͌Â��̂ŁA�������������܂��B</b></font><br>\n";
    }
    // �Ǘ��҃T���l�����ւ����m
    if(NOTICE_THUMB && @is_file(THUMB_DIR.$time.'s.jpg'.REPLACE_EXT)){
      $dat.="<font color=\"#f00000\"><small><b>".
            "���̃X���͊Ǘ��҂ɂ��T���l�C���������ւ����Ă��܂��B���R�͂��@�����������B<br>".
            "�T���l�C�����N���b�N����ƌ��̉摜��\�����܂��B".
            "</b></small></font><br>\n";
    }
    // �Ǘ���sage���m
    if(NOTICE_SAGE && stristr($url,'sage')){
      $dat.="<font color=\"#f00000\"><small><b>".
            "���̃X���͊Ǘ��҂ɂ��sage�w�肳��Ă��܂��B���R�͂��@�����������B".
            "</b></small></font><br>\n";
    }
    //���X�쐬
    if(!$resno){
     $s=count($treeline) - (OMIT_RES-1);
     if($s<1){$s=1;}
     elseif($s>1){
      $dat.="<font color=\"#707070\">���X".
             ($s - 1)."���ȗ��B�S�ēǂނɂ͕ԐM�{�^���������Ă��������B</font><br>\n";
     }
    }else{$s=1;}
    for($k = $s; $k < count($treeline); $k++){
      $disptree = $treeline[$k];
      $j=$lineindex[$disptree] - 1;
      if($line[$j]=="") continue;
      list($no,$now,$name,$email,$sub,$com,$url,
           $host,$pwd,$ext,$w,$h,$time,$chk) = explode(",", $line[$j]);
      // URL�ƃ��[���Ƀ����N
      if($email) $name = "<a href=\"mailto:$email\">$name</a>";
      $com = auto_link($com);
      $com = eregi_replace("(^|>)(&gt;[^<]*)", "\\1<font color=".RE_COL.">\\2</font>", $com);

      // �摜�t�@�C����
      $img = $path.$time.$ext;
      $src = IMG_DIR.$time.$ext;
      // �o�R��html�t�@�C���쐬
      if (IMG_REFER && is_file($img) && !is_file(IMG_REF_DIR.$time.".htm")){
        $fp=fopen(IMG_REF_DIR.$time.".htm","w");
        flock($fp, 2);
        rewind($fp);
        fputs($fp, "<META HTTP-EQUIV=\"refresh\" content=\"0;URL=../$src\">");
        fclose($fp);
      }
      // <img�^�O�쐬
      $imgsrc = "";
      $dat_img="";
      if($ext && is_file($img)){
        $size = filesize($img);//alt�ɃT�C�Y�\��
        if($w && $h){//�T�C�Y�����鎞
          // �X����A�j���[�V������~�w���ǉ�
          if(@is_file(THUMB_DIR.$time.'s.jpg') &&
            (USE_GIF_THUMB||$ext!='.gif'||stristr($url,'noanime')||@is_file(THUMB_DIR.$time.'s.jpg'.REPLACE_EXT))){
            // �c�[������html�Q�Ƃ�ǉ�
            $imgsrc = "<small>�T���l�C����\�����Ă��܂�.�N���b�N����ƌ��̃T�C�Y��\�����܂�.</small><br>";
            if (IMG_REFER) {$imgsrc .= "<a href=\"".IMG_REF_DIR.$time.".htm\" target=_blank>";}
            else{$imgsrc .= "<a href=\"".$src."\" target=_blank>";}
            if ( @is_file(THUMB_DIR.$time.'s.jpg'.REPLACE_EXT)){
              $imgsrc .= "<img src=".THUMB_DIR.$time.'s.jpg'.REPLACE_EXT;
            }
            else{
              $imgsrc .= "<img src=".THUMB_DIR.$time.'s.jpg';
            }
            $imgsrc .= " border=0 align=left width=$w height=$h hspace=20 alt=\"".$size." B\"></a>";
          }else{
            if (IMG_REFER) {$imgsrc = "<a href=\"".IMG_REF_DIR.$time.".htm\" target=_blank>";}
            else{$imgsrc = "<a href=\"".$src."\" target=_blank>";}
            $imgsrc .= "<img src=".$src." border=0 align=left width=$w height=$h hspace=20 alt=\"".$size." B\"></a>";
          }
        }else{//����ȊO
          if (IMG_REFER) {$imgsrc = "<a href=\"".IMG_REF_DIR.$time.".htm\" target=_blank>";}
          else{$imgsrc = "<a href=\"".$src."\" target=_blank>";}
          $imgsrc .= "<img src=".$src." border=0 align=left hspace=20 alt=\"".$size." B\"></a>";
        }
        if (IMG_REFER) {
          $dat_img = "<br>�摜�^�C�g���F<a href=\"".IMG_REF_DIR.$time.
                     ".htm\" target=_blank>$time$ext</a>-($size B)<br>$imgsrc";
        }
        else{
          $dat_img="<br>�摜�^�C�g���F<a href=\"$src\" target=_blank>$time$ext</a>-($size B)<br>$imgsrc";
        }
      }

      // �ʕϐ��ɓ��ꂽ�摜�p�^�O��������e�[�u���̒��ɔz�u
      // ���C���쐬
      $dat.="<table border=0><tr><td nowrap align=right valign=top>".RES_MARK."</td><td bgcolor=#F0E0D6>\n";
      $dat.="<input type=checkbox name=\"$no\" value=delete><font color=#cc1105 size=+1><b>$sub</b></font> \n";
      // hage �ǉ� 2004.8.1
      // $dat.=" <font color=#117743><b><b>$name</b></b></font> $now No.$no &nbsp;";
      $dat .= " <font color=#117743><b>$name</b></font> $now";
      if(!DISP_ID && in_array($host,$idhostdat) && !stristr($now,"ID:")){
        $idtemp = " ID:".substr(crypt(md5($host),'id'),-8);
        $dat .= $idtemp;
      }
      $dat .= " No.$no &nbsp; \n";
      // $dat.="$dat_img<blockquote>$com</blockquote>";
      $dat .= "$dat_img<blockquote>";
      if(in_array($host,$hostdat)){ $dat .= "[<font color=#ff0000>$host</font>]<br>"; }
      $dat .= "$com</blockquote>";
      // hage �ǉ������܂�
      $dat.="</td></tr></table>\n";
    }
    $dat.="<br clear=left><hr>\n";
    clearstatcache();//�t�@�C����stat���N���A
    $p++;
    if($resno){break;} //res����tree1�s����
  }

  $dat .= '<table align=right><tr><td nowrap align=center>'.
          '<input type=hidden name=mode value=usrdel>�y�L���폜�z'.
          '[<input type=checkbox name=onlyimgdel value=on>�摜��������]<br>'.
          '�폜�L�[<input type=password name=pwd size=8 maxlength=8 value="">'.
          '<input type=submit value="�폜"></form></td></tr></table>';

    if(!$resno){ //res���͕\�����Ȃ�
      $prev = $st - PAGE_DEF;
      $next = $st + PAGE_DEF;
    // ���y�[�W����
      $dat.="<table align=left border=1><tr>";
      if($prev >= 0){
        if($prev==0){
          $dat.="<form action=\"".PHP_SELF2."\" method=get><td>";
        }else{
          $dat.="<form action=\"".$prev/PAGE_DEF.PHP_EXT."\" method=get><td>";
        }
        $dat.="<input type=submit value=\"�O�̃y�[�W\">";
        $dat.="</td></form>";
      }else{$dat.="<td>�ŏ��̃y�[�W</td>";}

      $dat.="<td>";
      for($i = 0; $i < count($tree) ; $i+=PAGE_DEF){
        if($i>=FOLL_ADD){$dat.="[�ȉ��ȗ�]";break;}
        if($st==$i){$dat.="[<b>".($i/PAGE_DEF)."</b>] ";}
        else{
          if($i==0){$dat.="[<a href=\"".PHP_SELF2."\">0</a>] ";}
          else{$dat.="[<a href=\"".($i/PAGE_DEF).PHP_EXT."\">".($i/PAGE_DEF)."</a>] ";}
        }
      }
      $dat.="</td>";

      if($p >= PAGE_DEF && count($tree) > $next && $next < FOLL_ADD ){
        $dat.="<form action=\"".$next/PAGE_DEF.PHP_EXT."\" method=get><td>";
        $dat.="<input type=submit value=\"���̃y�[�W\">";
        $dat.="</td></form>";
      }else{$dat.="<td>�Ō�̃y�[�W</td>";}
        $dat.="</tr></table><br clear=all>\n";
    }
    foot($dat);
    if($resno){echo $dat;break;}
    if($page==0){$logfilename=PHP_SELF2;}
        else{$logfilename=$page/PAGE_DEF.PHP_EXT;}
    // hage �ǉ� 2004.8.1
    ignore_user_abort(1);
    // hage �ǉ������܂�
    $fp = fopen($logfilename, "w");
    flock($fp,2);
    set_file_buffer($fp, 0);
    rewind($fp);
    fputs($fp, $dat);
    fclose($fp);
    chmod($logfilename,0666);
    // hage �ǉ� 2004.8.1
    ignore_user_abort(0);
    // hage �ǉ������܂�
    if($page>=FOLL_ADD){ break; }
  }
  if(!$resno&&is_file(($page/PAGE_DEF+1).PHP_EXT)){unlink(($page/PAGE_DEF+1).PHP_EXT);}
}
/* �t�b�^ */
function foot(&$dat){
  $dat.='
<center>
<small><!-- GazouBBS v3.0 --><!-- �ӂ��Ή�0.8 --><!-- ���������1.0.4 -->
- <a href="http://php.s3.to" target=_top>GazouBBS</a> + <a href="http://www.2chan.net/" target=_top>futaba</a> + <a href="http://siokara.que.jp/" target=_top>siokara</a> -
</small>
</center>
</body></html>';
}
/* �I�[�g�����N */
function auto_link($proto){
  if(EN_AUTOLINK){
  $proto = ereg_replace("(https?|ftp|news)(://[[:alnum:]\+\$\;\?\.%,!#~*/:@&=_-]+)","<a href=\"\\1\\2\" target=\"_blank\">\\1\\2</a>",$proto);
  }
  return $proto;
}
/* �G���[��� */
function error($mes,$dest=''){
  global $upfile_name,$path;
  if(is_file($dest)) unlink($dest);
  head($dat);
  echo $dat;
  echo "<br><br><hr size=1><br><br>
        <center><font color=red size=5><b>$mes<br><br><a href=".PHP_SELF2.">�����[�h</a></b></font></center>
        <br><br><hr size=1>";
  die("</body></html>");
}

function  proxy_connect($port) {
  $fp = fsockopen ($_SERVER["REMOTE_ADDR"], $port,$a,$b,2);
  if(!$fp){return 0;}else{return 1;}
}
/* �L���������� */
function regist($name,$email,$sub,$com,$url,$pwd,$upfile,$upfile_name,$resto){
  global $path,$badstring,$badfile,$badip,$pwdc,$textonly;
  global $noanime;

  // ����
  $time = time();
  $tim = $time.substr(microtime(),2,3);

  // �A�b�v���[�h����
  if($upfile&&file_exists($upfile)){
    $dest = $path.$tim.'.tmp';
    move_uploaded_file($upfile, $dest);
    //���ŃG���[�Ȃ火�ɕύX
    //copy($upfile, $dest);
    $upfile_name = CleanStr($upfile_name);
    if(!is_file($dest)) error("�A�b�v���[�h�Ɏ��s���܂���<br>�T�[�o���T�|�[�g���Ă��Ȃ��\��������܂�",$dest);
    $size = getimagesize($dest);
    if(!is_array($size)) error("�A�b�v���[�h�Ɏ��s���܂���<br>�摜�t�@�C���ȊO�͎󂯕t���܂���",$dest);
    $chk = md5_of_file($dest);
    foreach($badfile as $value){if(ereg("^$value",$chk)){
      error("�A�b�v���[�h�Ɏ��s���܂���<br>�����摜������܂���",$dest); //����摜
    }}
    chmod($dest,0666);
    $W = $size[0];
    $H = $size[1];

    switch ($size[2]) {
      case 1 : $ext=".gif";break;
      case 2 : $ext=".jpg";break;
      case 3 : $ext=".png";break;
     default : $ext=".xxx";error("�A�b�v���[�h�Ɏ��s���܂���<br>GIF,JPG,PNG�ȊO�̉摜�t�@�C���͎󂯕t���܂���",$dest);break;
    }

    // �摜�\���k��
    if($W > MAX_W || $H > MAX_H){
      $W2 = MAX_W / $W;
      $H2 = MAX_H / $H;
      ($W2 < $H2) ? $key = $W2 : $key = $H2;
      $W = ceil($W * $key);
      $H = ceil($H * $key);
    }
    $mes = "�摜 $upfile_name �̃A�b�v���[�h���������܂���<br><br>";
  }

  foreach($badstring as $value){if(ereg($value,$com)||ereg($value,$sub)||ereg($value,$name)||ereg($value,$email)){
  error("���₳��܂���(str)",$dest);};}
  if($_SERVER["REQUEST_METHOD"] != "POST") error("�s���ȓ��e�����Ȃ��ŉ�����(post)",$dest);
  // �t�H�[�����e���`�F�b�N
  if(!$name||ereg("^[ |�@|]*$",$name)) $name="";
  if(!$com||ereg("^[ |�@|\t]*$",$com)) $com="";
  if(!$sub||ereg("^[ |�@|]*$",$sub))   $sub=""; 

  if(!$resto&&!$textonly&&!is_file($dest)) error("�摜������܂���",$dest);
  if(!$com&&!is_file($dest)) error("���������ĉ�����",$dest);

  $name=ereg_replace("�Ǘ�","\"�Ǘ�\"",$name);
  $name=ereg_replace("�폜","\"�폜\"",$name);

  if(strlen($com) > 1000) error("�{�����������܂�",$dest);
  if(strlen($name) > 100) error("���O���������܂�",$dest);
  if(strlen($email) > 100) error("���[�������������܂�",$dest);
  if(strlen($sub) > 100) error("�薼���������܂�",$dest);
  if(strlen($resto) > 10) error("���X�ԍ��̎w�肪�������܂�",$dest);
  if(strlen($url) > 100) error("URL�����������܂�",$dest);

  //�z�X�g�擾
  $host = gethostbyaddr($_SERVER["REMOTE_ADDR"]);

  foreach($badip as $value){ //����host
   if(eregi("$value$",$host)){
    error("���₳��܂���(host)",$dest);
  }}
  if(eregi("^mail",$host)
    || eregi("^ns",$host)
    || eregi("^dns",$host)
    || eregi("^ftp",$host)
    || eregi("^prox",$host)
    || eregi("^pc",$host)
    || eregi("^[^\.]\.[^\.]$",$host)){
    $pxck = "on";
  }
  if(eregi("ne\\.jp$",$host)||
    eregi("ad\\.jp$",$host)||
    eregi("bbtec\\.net$",$host)||
    eregi("aol\\.com$",$host)||
    eregi("uu\\.net$",$host)||
    eregi("asahi-net\\.or\\.jp$",$host)||
    eregi("rim\\.or\\.jp$",$host)
    ){$pxck = "off";}
  else{$pxck = "on";}

  if($pxck=="on" && PROXY_CHECK){
    if(proxy_connect('80') == 1){
      error("�d�q�q�n�q�I�@���J�o�q�n�w�x�K�����I�I(80)",$dest);
    } elseif(proxy_connect('8080') == 1){
      error("�d�q�q�n�q�I�@���J�o�q�n�w�x�K�����I�I(8080)",$dest);
    }
  }

  // No.�ƃp�X�Ǝ��Ԃ�URL�t�H�[�}�b�g
  srand((double)microtime()*1000000);
  if($pwd==""){
    if($pwdc==""){
      $pwd=rand();$pwd=substr($pwd,0,8);
    }else{
      $pwd=$pwdc;
    }
  }

  $c_pass = $pwd;
  $pass = ($pwd) ? substr(md5($pwd),2,8) : "*";
  $youbi = array('��','��','��','��','��','��','�y');
  $yd = $youbi[gmdate("w", $time+9*60*60)] ;
  if(EN_SEC){
      $now = gmdate("y/m/d",$time+9*60*60)."(".(string)$yd.")".gmdate("H:i:s",$time+9*60*60);
  }
  else{
    $now = gmdate("y/m/d",$time+9*60*60)."(".(string)$yd.")".gmdate("H:i",$time+9*60*60);
  }

  if(DISP_ID){
    if($email&&DISP_ID==1){
      $now .= " ID:???";
    }else{
      $now.=" ID:".substr(crypt(md5($_SERVER["REMOTE_ADDR"].'id�̎�'.gmdate("Ymd", $time+9*60*60)),'id'),-8);
    }
  }
  //�e�L�X�g���`
  $email= CleanStr($email);  $email=ereg_replace("[\r\n]","",$email);
  $sub  = CleanStr($sub);    $sub  =ereg_replace("[\r\n]","",$sub);
  $url  = CleanStr($url);    $url  =ereg_replace("[\r\n]","",$url);
  $resto= CleanStr($resto);  $resto=ereg_replace("[\r\n]","",$resto);
  $com  = CleanStr($com);
  // ���s�����̓���B 
  $com = str_replace( "\r\n",  "\n", $com); 
  $com = str_replace( "\r",  "\n", $com);
  // �A�������s����s
  $com = ereg_replace("\n((�@| )*\n){3,}","\n",$com);
  if(!BR_CHECK || substr_count($com,"\n")<BR_CHECK){
    $com = nl2br($com);         //���s�����̑O��<br>��������
  }
  $com = str_replace("\n",  "", $com);  //\n�𕶎��񂩂�����B

  $name=ereg_replace("��","��",$name);
  $name=ereg_replace("[\r\n]","",$name);
  $names=$name;
  $name = CleanStr($name);
  if(ereg("(#|��)(.*)",$names,$regs)){
    $cap = $regs[2];
    $cap=strtr($cap,"&amp;", "&");
    $cap=strtr($cap,"&#44;", ",");
    $name=ereg_replace("(#|��)(.*)","",$name);
    $salt=substr($cap."H.",1,2);
    $salt=ereg_replace("[^\.-z]",".",$salt);
    $salt=strtr($salt,":;<=>?@[\\]^_`","ABCDEFGabcdef"); 
    $name.="</b>��".substr(crypt($cap,$salt),-10)."<b>";
  }

  // �G���A����̃X�N���v�g���Q�l�ɁA�ȗ����������萔��
  if(!$name) $name=DEF_NAME;
  if(!$com) $com=DEF_COM;
  if(!$sub) $sub=DEF_SUB;

  // �X����̃A�j���[�V������~�w���ǉ�
  if ($ext=='.gif' && $noanime==on){ $url.='noanime';}

  //���O�ǂݍ���
  $fp=fopen(LOGFILE,"r+");
  flock($fp, 2);
  rewind($fp);
  $buf=fread($fp,1000000);
  if($buf==''){error("error load log",$dest);}
  $line = explode("\n",$buf);
  $countline=count($line);
  for($i = 0; $i < $countline; $i++){
    if($line[$i]!=""){
      list($artno,)=explode(",", rtrim($line[$i]));  //�t�ϊ��e�[�u���쐬
      $lineindex[$artno]=$i+1;
      $line[$i].="\n";
  }}

  // sage����(�X��sage�X�^�[�g�A���Ԍo��sage�A�Ǘ���sage)
  $flgsage=FALSE;
  if($resto){
    list(,,,$chkemail,,,$chkurl,,,,,,$ltime,) = explode(",", rtrim($line[$lineindex[$resto]-1]));
    if(strlen($ltime) > 10) { $ltime=substr($ltime,0,-3); }
    if(EN_SAGE_START && stristr($chkemail,'sage')){$flgsage=TRUE;}
    if(MAX_PASSED_HOUR && (($time - $ltime) >= (MAX_PASSED_HOUR*60*60))) { $flgsage=TRUE; }
    if(ADMIN_SAGE && stristr($chkurl,'sage')){$flgsage=TRUE;}
  }

  // ��d���e�`�F�b�N
  for($i=0;$i<20;$i++){
   list($lastno,,$lname,,,$lcom,,$lhost,$lpwd,,,,$ltime,) = explode(",", $line[$i]);
   if(strlen($ltime)>10){$ltime=substr($ltime,0,-3);}
   if($host==$lhost||substr(md5($pwd),2,8)==$lpwd||substr(md5($pwdc),2,8)==$lpwd){$pchk=1;}else{$pchk=0;}
   if(RENZOKU && $pchk && $time - $ltime < RENZOKU)
    error("�A�����e�͂������΂炭���Ԃ�u���Ă��炨�肢�v���܂�",$dest);
   if(RENZOKU && $pchk && $time - $ltime < RENZOKU2 && $upfile_name)
    error("�摜�A�����e�͂������΂炭���Ԃ�u���Ă��炨�肢�v���܂�",$dest);
   if(RENZOKU && $pchk && $com == $lcom && !$upfile_name)
    error("�A�����e�͂������΂炭���Ԃ�u���Ă��炨�肢�v���܂�",$dest);
  }

  // ���O�s���I�[�o�[
  if(count($line) >= LOG_MAX){
    for($d = count($line)-1; $d >= LOG_MAX-1; $d--){
      list($dno,,,,,,,,,$dext,,,$dtime,) = explode(",", $line[$d]);
      if(is_file($path.$dtime.$dext)) unlink($path.$dtime.$dext);
      if(is_file(THUMB_DIR.$dtime.'s.jpg')) unlink(THUMB_DIR.$dtime.'s.jpg');
      if(is_file(THUMB_DIR.$dtime.'s.jpg'.REPLACE_EXT)) unlink(THUMB_DIR.$dtime.'s.jpg'.REPLACE_EXT);
      // �Q�Ɛ�html�t�@�C�����폜�Ώۂ�
      if(is_file(IMG_REF_DIR.$dtime.'.htm')) unlink(IMG_REF_DIR.$dtime.'.htm');
      $line[$d] = "";
      treedel($dno);
    }
  }
  // �A�b�v���[�h����
  if($dest&&file_exists($dest)){
    for($i=0;$i<200;$i++){ //�摜�d���`�F�b�N
     list(,,,,,,,,,$extp,,,$timep,$chkp,) = explode(",", $line[$i]);
     if($chkp==$chk&&file_exists($path.$timep.$extp)){
      error("�A�b�v���[�h�Ɏ��s���܂���<br>�����摜������܂�",$dest);
    }}
  }
  list($lastno,) = explode(",", $line[0]);
  $no = $lastno + 1;

  $newline = "$no,$now,$name,$email,$sub,$com,$url,$host,$pass,$ext,$W,$H,$tim,$chk,\n";
  $newline.= implode('', $line);
  ftruncate($fp,0);
  set_file_buffer($fp, 0);
  rewind($fp);
  fputs($fp, $newline);

    //�c���[�X�V
  $find = false;
  $newline = '';
  $tp=fopen(TREEFILE,"r+");
  set_file_buffer($tp, 0);
  rewind($tp);
  $buf=fread($tp,1000000);
  if($buf==''){error("error tree update",$dest);}
  $line = explode("\n",$buf);
  $countline=count($line);
  for($i = 0; $i < $countline; $i++){
    if($line[$i]!=""){
      $line[$i].="\n";
      $j=explode(",", rtrim($line[$i]));
      if($lineindex[$j[0]]==0){
        $line[$i]='';
  } } }
  if($resto){
    for($i = 0; $i < $countline; $i++){
      $rtno = explode(",", rtrim($line[$i]));
      if($rtno[0]==$resto){
        $find = TRUE;
        $line[$i]=rtrim($line[$i]).','.$no."\n";
        $j=explode(",", rtrim($line[$i]));
        if(count($j)>MAX_RES || ((EN_SAGE_START || MAX_PASSED_HOUR) && $flgsage)){$email='sage';}
        if(!stristr($email,'sage')){
          $newline=$line[$i];
          $line[$i]='';
        }
        break;
  } } }
  if(!$find){if(!$resto){$newline="$no\n";}else{error("�X���b�h������܂���",$dest);}}
  $newline.=implode('', $line);
  ftruncate($tp,0);
  set_file_buffer($tp, 0);
  rewind($tp);
  fputs($tp, $newline);
  fclose($tp);
  fclose($fp);

    //�N�b�L�[�ۑ�
  setcookie ("pwdc", $c_pass,time()+7*24*3600);  /* 1�T�ԂŊ����؂� */
  if(function_exists("mb_internal_encoding")&&function_exists("mb_convert_encoding")
      &&function_exists("mb_substr")){
    if(ereg("MSIE|Opera",$_SERVER["HTTP_USER_AGENT"])){
      $i=0;$c_name='';
      mb_internal_encoding("SJIS");
      while($j=mb_substr($names,$i,1)){
        $j = mb_convert_encoding($j, "UTF-16", "SJIS");
        $c_name.="%u".bin2hex($j);
        $i++;
      }
      header("Set-Cookie: namec=$c_name; expires=".gmdate("D, d-M-Y H:i:s",time()+7*24*3600)." GMT",false);
    }else{
      $c_name=$names;
      setcookie ("namec", $c_name,time()+7*24*3600);  /* 1�T�ԂŊ����؂� */
    }
  }

  if($dest&&file_exists($dest)){
    rename($dest,$path.$tim.$ext);
    if(USE_THUMB){thumb($path,$tim,$ext);}
  }
  updatelog();

  echo "<html><head><META HTTP-EQUIV=\"refresh\" content=\"1;URL=".PHP_SELF2."\"></head>";
  echo "<body>$mes ��ʂ�؂�ւ��܂�</body></html>";
}

//�T���l�C���쐬
function thumb($path,$tim,$ext){
  if(!function_exists("ImageCreate")||!function_exists("ImageCreateFromJPEG"))return;
  $fname=$path.$tim.$ext;
  $thumb_dir = THUMB_DIR;     //�T���l�C���ۑ��f�B���N�g��
  $width     = MAX_W;            //�o�͉摜��
  $height    = MAX_H;            //�o�͉摜����
  // �摜�̕��ƍ����ƃ^�C�v���擾
  $size = GetImageSize($fname);
  switch ($size[2]) {
    case 1 :
      if(function_exists("ImageCreateFromGIF")){
        $im_in = @ImageCreateFromGIF($fname);
        if($im_in){break;}
      }
      if(!function_exists("ImageCreateFromPNG"))return;
      if(stristr(PHP_OS,"WIN")){
        if(!file_exists(realpath("./gif2png.exe")))return;
        @exec(realpath("./gif2png.exe")." -z $fname",$a);}
      else{
        if(!is_executable(realpath("./gif2png")))return
        @exec(realpath("./gif2png")." $fname",$a);}
      if(!file_exists($path.$tim.'.png'))return;
      $im_in = @ImageCreateFromPNG($path.$tim.'.png');
      unlink($path.$tim.'.png');
      if(!$im_in)return;
      break;
    case 2 : $im_in = @ImageCreateFromJPEG($fname);
      if(!$im_in){return;}
       break;
    case 3 :
      if(!function_exists("ImageCreateFromPNG"))return;
      $im_in = @ImageCreateFromPNG($fname);
      if(!$im_in){return;}
      break;
    default : return;
  }
  // ���T�C�Y
  if ($size[0] > $width || $size[1] >$height) {
    $key_w = $width / $size[0];
    $key_h = $height / $size[1];
    ($key_w < $key_h) ? $keys = $key_w : $keys = $key_h;
    $out_w = ceil($size[0] * $keys);
    $out_h = ceil($size[1] * $keys);
  } else {
    $out_w = $size[0];
    $out_h = $size[1];
  }
  // �o�͉摜�i�T���l�C���j�̃C���[�W���쐬
  if(function_exists("ImageCreateTrueColor")&&get_gd_ver()=="2"){
    $im_out = ImageCreateTrueColor($out_w, $out_h);
  }else{$im_out = ImageCreate($out_w, $out_h);}
  // ���摜���c���Ƃ� �R�s�[���܂��B
  imagecopyresampled($im_out, $im_in, 0, 0, 0, 0, $out_w, $out_h, $size[0], $size[1]);
  // �T���l�C���摜��ۑ�
  ImageJPEG($im_out, $thumb_dir.$tim.'s.jpg',60);
  chmod($thumb_dir.$tim.'s.jpg',0666);
  // �쐬�����C���[�W��j��
  ImageDestroy($im_in);
  ImageDestroy($im_out);
}
//gd�̃o�[�W�����𒲂ׂ�
function get_gd_ver(){
  if(function_exists("gd_info")){
    $gdver=gd_info();
    $phpinfo=$gdver["GD Version"];
  }else{ //php4.3.0�����p
    ob_start();
    phpinfo(8);
    $phpinfo=ob_get_contents();
    ob_end_clean();
    $phpinfo=strip_tags($phpinfo);
    $phpinfo=stristr($phpinfo,"gd version");
    $phpinfo=stristr($phpinfo,"version");
  }
  $end=strpos($phpinfo,".");
  $phpinfo=substr($phpinfo,0,$end);
  $length = strlen($phpinfo)-1;
  $phpinfo=substr($phpinfo,$length);
  return $phpinfo;
}
//�t�@�C��md5�v�Z php4.2.0�����p
function md5_of_file($inFile) {
 if (file_exists($inFile)){
  if(function_exists('md5_file')){
    return md5_file($inFile);
  }else{
    $fd = fopen($inFile, 'r');
    $fileContents = fread($fd, filesize($inFile));
    fclose ($fd);
    return md5($fileContents);
  }
 }else{
  return false;
}}
//�c���[�폜
function treedel($delno){
  $fp=fopen(TREEFILE,"r+");
  set_file_buffer($fp, 0);
  flock($fp, 2);
  rewind($fp);
  $buf=fread($fp,1000000);
  if($buf==''){error("error tree del");}
  $line = explode("\n",$buf);
  $countline=count($line);
  if($countline>2){
    for($i = 0; $i < $countline; $i++){if($line[$i]!=""){$line[$i].="\n";};}
    for($i = 0; $i < $countline; $i++){
      $treeline = explode(",", rtrim($line[$i]));
      $counttreeline=count($treeline);
      for($j = 0; $j < $counttreeline; $j++){
        if($treeline[$j] == $delno){
          $treeline[$j]='';
          if($j==0){$line[$i]='';}
          else{$line[$i]=implode(',', $treeline);
            $line[$i]=ereg_replace(",,",",",$line[$i]);
            $line[$i]=ereg_replace(",$","",$line[$i]);
            $line[$i].="\n";
          }
          break 2;
    } } }
    ftruncate($fp,0);
    set_file_buffer($fp, 0);
    rewind($fp);
    fputs($fp, implode('', $line));
  }
  fclose($fp);
}
/* �e�L�X�g���` */
function CleanStr($str){
  global $admin;
  $str = trim($str);//�擪�Ɩ����̋󔒏���
  if (get_magic_quotes_gpc()) {//�����폜
    $str = stripslashes($str);
  }
  if($admin!=ADMIN_PASS){//�Ǘ��҂̓^�O�\
    $str = htmlspecialchars($str);//�^�O���֎~
    $str = str_replace("&amp;", "&", $str);//���ꕶ��
  }
  return str_replace(",", "&#44;", $str);//�J���}��ϊ�
}
/* ���[�U�[�폜 */
function usrdel($no,$pwd){
  global $path,$pwdc,$onlyimgdel;
  $host = gethostbyaddr($_SERVER["REMOTE_ADDR"]);
  $delno = array(dummy);
  $delflag = FALSE;
  reset($_POST);
    while ($item = each($_POST)){
     if($item[1]=='delete'){array_push($delno,$item[0]);$delflag=TRUE;}
    }
  if($pwd==""&&$pwdc!="") $pwd=$pwdc;
  $fp=fopen(LOGFILE,"r+");
  set_file_buffer($fp, 0);
  flock($fp, 2);
  rewind($fp);
  $buf=fread($fp,1000000);
  fclose($fp);
  if($buf==''){error("error user del");}
  $line = explode("\n",$buf);
  $countline=count($line);
  for($i = 0; $i < $countline; $i++){if($line[$i]!=""){$line[$i].="\n";};}
  $flag = FALSE;
  for($i = 0; $i<count($line); $i++){
    list($dno,,,,,,,$dhost,$pass,$dext,,,$dtim,) = explode(",", $line[$i]);
    if(array_search($dno,$delno) && (substr(md5($pwd),2,8) == $pass || $dhost == $host||ADMIN_PASS==$pwd)){
      $flag = TRUE;
      $line[$i] = "";                   //�p�X���[�h���}�b�`�����s�͋��
      $delfile = $path.$dtim.$dext;     //�폜�t�@�C��
      if(!$onlyimgdel){
        treedel($dno);
      }
      if(is_file($delfile)) unlink($delfile);//�폜
      if(is_file(THUMB_DIR.$dtim.'s.jpg')) unlink(THUMB_DIR.$dtim.'s.jpg');//�폜
      if(is_file(THUMB_DIR.$dtim.'s.jpg'.REPLACE_EXT)) unlink(THUMB_DIR.$dtim.'s.jpg'.REPLACE_EXT);//�폜
      // �Q�Ɛ�html�t�@�C�����폜�Ώۂ�
      if(is_file(IMG_REF_DIR.$dtim.'.htm')) unlink(IMG_REF_DIR.$dtim.'.htm');
    }
  }
  if(!$flag) error("�Y���L����������Ȃ����p�X���[�h���Ԉ���Ă��܂�");
}
/* �p�X�F�� */
function valid($pass){
  global $default_thumb;
  if($pass && $pass != ADMIN_PASS) error("�p�X���[�h���Ⴂ�܂�");

  head($dat);
  echo $dat;
  echo "[<a href=\"".PHP_SELF2."\">�f���ɖ߂�</a>]\n";
  echo "[<a href=\"".PHP_SELF."\">���O���X�V����</a>]\n";
  echo "<table width='100%'><tr><th bgcolor=#E08000>\n";
  echo "<font color=#FFFFFF>�Ǘ����[�h</font>\n";
  echo "</th></tr></table>\n";
  echo "<p><form action=\"".PHP_SELF."\" method=POST>\n";
  // ���O�C���t�H�[��
  if(!$pass){
    echo "<center><table border=0><tr><td>";
    echo "<input type=radio name=admin value=del checked>�L���폜<BR>";
    echo "<input type=radio name=admin value=post>�Ǘ��l���e<BR>";
    if (is_file($default_thumb)) echo "<input type=radio name=admin value=thumb>�T���l�C�������ւ�<BR>";
    if (ADMIN_SAGE) echo "<input type=radio name=admin value=sage>����sage����<br>";
    // hage �ǉ� 2004.8.1
    echo "<input type=radio name=admin value=reghost>�z�X�g/ID�\�����X�g�ɓo�^<br>";
    echo "<input type=radio name=admin value=delhost>�z�X�g/ID�\�����X�g����폜<br>";
    // hage �ǉ������܂�
    echo "<input type=hidden name=mode value=admin>\n";
    echo "</td></tr></TABLE>";
    echo "<input type=password name=pass size=8>";
    echo "<input type=submit value=\" �F�� \"></form></center>\n";
    die("</body></html>");
  }
}
/* �Ǘ��ҍ폜 */
function admindel($pass){
  global $path,$onlyimgdel;
  $delno = array(dummy);
  $delflag = FALSE;
  reset($_POST);
  while ($item = each($_POST)){
   if($item[1]=='delete'){array_push($delno,$item[0]);$delflag=TRUE;}
  }
  if($delflag){
    // hage �ǉ� 2004.8.1
    ignore_user_abort(1);
    // hage �ǉ������܂�
    $fp=fopen(LOGFILE,"r+");
    set_file_buffer($fp, 0);
    flock($fp, 2);
    rewind($fp);
    $buf=fread($fp,1000000);
    if($buf==''){error("error admin del");}
    $line = explode("\n",$buf);
    $countline=count($line);
    for($i = 0; $i < $countline; $i++){if($line[$i]!=""){$line[$i].="\n";};}
    $find = FALSE;
    for($i = 0; $i < $countline; $i++){
      list($no,$now,$name,$email,$sub,$com,$url,$host,$pw,$ext,$w,$h,$tim,$chk) = explode(",",$line[$i]);
      if($onlyimgdel==on){
        if(array_search($no,$delno)){//�摜�����폜
          $delfile = $path.$tim.$ext;   //�폜�t�@�C��
          if(is_file($delfile)) unlink($delfile);//�폜
          if(is_file(THUMB_DIR.$tim.'s.jpg')) unlink(THUMB_DIR.$tim.'s.jpg');//�폜
          if(is_file(THUMB_DIR.$tim.'s.jpg'.REPLACE_EXT)) unlink(THUMB_DIR.$tim.'s.jpg'.REPLACE_EXT);//�폜
          // �Q�Ɛ�html�t�@�C�����폜�Ώۂ�
          if(is_file(IMG_REF_DIR.$tim.'.htm')) unlink(IMG_REF_DIR.$tim.'.htm');
        }
      }else{
        if(array_search($no,$delno)){//�폜�̎��͋��
          $find = TRUE;
          $line[$i] = "";
          $delfile = $path.$tim.$ext;   //�폜�t�@�C��
          if(is_file($delfile)) unlink($delfile);//�폜
          if(is_file(THUMB_DIR.$tim.'s.jpg')) unlink(THUMB_DIR.$tim.'s.jpg');//�폜
          if(is_file(THUMB_DIR.$tim.'s.jpg'.REPLACE_EXT)) unlink(THUMB_DIR.$tim.'s.jpg'.REPLACE_EXT);//�폜
          // �Q�Ɛ�html�t�@�C�����폜�Ώۂ�
          if(is_file(IMG_REF_DIR.$tim.'.htm')) unlink(IMG_REF_DIR.$tim.'.htm');
          treedel($no);
        }
      }
    }
    if($find){//���O�X�V
      ftruncate($fp,0);
      set_file_buffer($fp, 0);
      rewind($fp);
      fputs($fp, implode('', $line));
    }
    fclose($fp);
    // hage �ǉ� 2004.8.1
    ignore_user_abort(0);
    // hage �ǉ������܂�
  }
  // �폜��ʂ�\��
  echo "<input type=hidden name=mode value=admin>\n";
  echo "<input type=hidden name=admin value=del>\n";
  echo "<input type=hidden name=pass value=\"$pass\">\n";
  echo "<center><P>�폜�������L���̃`�F�b�N�{�b�N�X�Ƀ`�F�b�N�����A�폜�{�^���������ĉ������B\n";
  echo "<p><input type=submit value=\"�폜����\">";
  echo "<input type=reset value=\"���Z�b�g\">";
  echo "[<input type=checkbox name=onlyimgdel value=on checked>�摜��������]";
  echo "<P><table border=1 cellspacing=0>\n";
  echo "<tr bgcolor=6080f6><th>�폜</th><th>�L��No</th><th>���e��</th><th>�薼</th>";
  echo "<th>���e��</th><th>�R�����g</th><th>�z�X�g��</th><th>�Y�t<br>(Bytes)</th><th>md5</th>";
  echo "</tr>\n";
  $line = file(LOGFILE);

  for($j = 0; $j < count($line); $j++){
    $img_flag = FALSE;
    list($no,$now,$name,$email,$sub,$com,$url,
         $host,$pw,$ext,$w,$h,$time,$chk) = explode(",",$line[$j]);
    // �t�H�[�}�b�g
    $now=ereg_replace('.{2}/(.*)$','\1',$now);
    $now=ereg_replace('\(.*\)',' ',$now);
    if(strlen($name) > 10) $name = substr($name,0,9).".";
    if(strlen($sub) > 10) $sub = substr($sub,0,9).".";
    if($email) $name="<a href=\"mailto:$email\">$name</a>";
    $com = str_replace("<br />"," ",$com);
    $com = htmlspecialchars($com);
    if(strlen($com) > 20) $com = substr($com,0,18) . ".";
    // �摜������Ƃ��̓����N
    if($ext && is_file($path.$time.$ext)){
      $img_flag = TRUE;
      $clip = "<a href=\"".IMG_DIR.$time.$ext."\" target=_blank>".$time.$ext."</a><br>";
      $size = filesize($path.$time.$ext);
      $all += $size;                    //���v�v�Z
      $chk= substr($chk,0,10);
    }else{
      $clip = "";
      $size = 0;
      $chk= "";
    }
    $bg = ($j % 2) ? "d6d6f6" : "f6f6f6";//�w�i�F

    echo "<tr bgcolor=$bg><th><input type=checkbox name=\"$no\" value=delete></th>";
    echo "<th>$no</th><td><small>$now</small></td><td>$sub</td>";
    echo "<td><b>$name</b></td><td><small>$com</small></td>";
    echo "<td>$host</td><td align=center>$clip($size)</td><td>$chk</td>\n";
    echo "</tr>\n";
  }

  echo "</table><p><input type=submit value=\"�폜����$msg\">";
  echo "<input type=reset value=\"���Z�b�g\"></form>";

  $all = (int)($all / 1024);
  echo "�y �摜�f�[�^���v : <b>$all</b> KB �z";
  die("</center></body></html>");
}

/* �Ǘ��҃T���l�����ւ� */
// �قƂ�ǊǗ��ҍ폜�ƈꏏ����������������ǥ��
function admin_chgthumb($pass){
  global $path,$stillGIF;
  global $rep_thumb,$default_thumb;
  $thum_name = $default_humb;
  foreach($rep_thumb as $chkthumb){
    if (!is_file($chkthumb)){error("��փT���l�C���t�@�C��".$chkthumb."��������܂���");}
  }

  $chgno = array(dummy);
  $chgflag = FALSE;
  reset($_POST);
  while ($item = each($_POST)){
   if($item[1]=='chgthumb'){array_push($chgno,$item[0]);$chgflag=TRUE;}
   // �����ւ��T���l�t�@�C�����擾
   if($item[0]=='thumb'){$thumb_name=$item[1];}
  }
  if($chgflag){
    // hage �ǉ� 2004.8.1
    ignore_user_abort(1);
    // hage �ǉ������܂�
    $fp=fopen(LOGFILE,"r+");
    set_file_buffer($fp, 0);
    flock($fp, 2);
    rewind($fp);
    $buf=fread($fp,1000000);
    if($buf==''){error("error admin change thumbnail");}
    $line = explode("\n",$buf);
    $countline=count($line);
    for($i = 0; $i < $countline; $i++){if($line[$i]!=""){$line[$i].="\n";};}
    $find = FALSE;
    for($i = 0; $i < $countline; $i++){
      list($no,$now,$name,$email,$sub,$com,$url,$host,$pw,$ext,$w,$h,$tim,$chk) = explode(",",$line[$i]);
      if(array_search($no,$chgno)){
        $find = TRUE;
        // �T���l�C�������ւ�
        $tpath = THUMB_DIR.$tim.'s.jpg';
        $tpathorg = $tpath.REPLACE_EXT;
        if (!is_file($tpathorg)){
          if(!is_file($tpath) && is_file($path.$tim.$ext)) {thumb($path,$tim,$ext);} // �T���l���Ȃ�������V�K�쐬
          // �T���l���ύX&�����ւ��d�l�ύX
          if( is_file($thumb_name) && is_file($tpath)){
            if ((!USE_GIF_THUMB && $ext=='.gif' && $stillGIF=='on')) {copy($tpath,$tpathorg);}
            else {copy($thumb_name,$tpathorg);}
            // �T���l�T�C�Y�������ւ���摜�̃T�C�Y�ɂ���
            $tsize = GetImageSize($tpathorg);
            $w = $tsize[0];
            $h = $tsize[1];
          }
        }
        else{
          unlink($tpathorg);
          $tsize = GetImageSize($tpath);
          $w = $tsize[0];
          $h = $tsize[1];
        }
        $line[$i] = "$no,$now,$name,$email,$sub,$com,$url,$host,$pw,$ext,$w,$h,$tim,$chk,\n";
      }
    }
    if($find){//���O�X�V
      ftruncate($fp,0);
      set_file_buffer($fp, 0);
      rewind($fp);
      fputs($fp, implode('', $line));
    }
    fclose($fp);
    updatelog();
    // hage �ǉ� 2004.8.1
    ignore_user_abort(0);
    // hage �ǉ������܂�
  }

  // �����ւ��L���I����ʂ�\��
  echo "<input type=hidden name=mode value=admin>\n";
  echo "<input type=hidden name=admin value=thumb>\n";
  echo "<input type=hidden name=pass value=\"$pass\">\n";
  echo "<center><P>�T���l�C���������ւ������L���̃`�F�b�N�{�b�N�X�Ƀ`�F�b�N�����A�����ւ��{�^���������ĉ������B\n";
  echo "<center>�u���ցv�Ɓu���։����v���؂�ւ��܂��B\n";
  echo "<p><input type=submit value=\"�����ւ�\">";
  echo "<input type=reset value=\"���Z�b�g\">";
  if(!USE_GIF_THUMB){echo "[<input type=checkbox name=stillGIF value=on>GIF���T���l�C�������邾��]";}

  echo "<center><BR>";
  $i=0;
  foreach ($rep_thumb as $rtitl => $rname){
    echo "<input type=radio name=thumb value=$rname ";
    if (!$i++) echo "checked";
    echo ">$rtitl";
  }

  echo "<P><table border=1 cellspacing=0>\n";
  echo "<tr bgcolor=6080f6><th>�I��</th><th>�L��No</th><th>���</th><th>���e��</th><th>�薼</th>";
  echo "<th>���e��</th><th>�R�����g</th><th>�z�X�g��</th><th>�Y�t<br>(Bytes)</th>";
  echo "</tr>\n";

  // ���O�t�@�C���ǂݏo��
  $line = file(LOGFILE);
  $bgcol = 0;
  for($j = 0; $j < count($line); $j++){
    $img_flag = FALSE;
    list($no,$now,$name,$email,$sub,$com,$url,
         $host,$pw,$ext,$w,$h,$time,$chk) = explode(",",$line[$j]);
    if($ext && is_file($path.$time.$ext)){
      // �t�H�[�}�b�g
      $now=ereg_replace('.{2}/(.*)$','\1',$now);
      $now=ereg_replace('\(.*\)',' ',$now);
      if(strlen($name) > 10) $name = substr($name,0,9).".";
      if(strlen($sub) > 10) $sub = substr($sub,0,9).".";
      if($email) $name="<a href=\"mailto:$email\">$name</a>";
      $com = str_replace("<br />"," ",$com);
      $com = htmlspecialchars($com);
      if(strlen($com) > 20) $com = substr($com,0,18) . ".";
      $img_flag = TRUE;
      $clip = "<a href=\"".IMG_DIR.$time.$ext."\" target=_blank>".$time.$ext."</a><br>";
      $size = filesize($path.$time.$ext);
      $all += $size;                       //���v�v�Z
      $chk= substr($chk,0,10);
      $bg = ($bgcol++ % 2) ? "d6d6f6" : "f6f6f6";//�w�i�F

      if (is_file(THUMB_DIR.$time.'s.jpg'.REPLACE_EXT)) {$tstat = "����";}
      else{
        $tstat = (stristr($url,'noanime')) ? "�X����" : "�@";
      }
      echo "<tr bgcolor=$bg><th><input type=checkbox name=\"$no\" value=chgthumb></th>";
      echo "<th>$no</th><th>$tstat</th><td><small>$now</small></td><td>$sub</td>";
      echo "<td><b>$name</b></td><td><small>$com</small></td>";
      echo "<td>$host</td><td align=center>$clip($size)</td>\n";
      echo "</tr>\n";
    }
  }
  echo "</table><p><input type=submit value=\"�����ւ�$msg\">";
  echo "<input type=reset value=\"���Z�b�g\"></form>";

  $all = (int)($all / 1024);
  echo "�y �摜�f�[�^���v : <b>$all</b> KB �z";
  die("</center></body></html>");
}

/* �Ǘ���sage���� */
// �������A�قƂ�ǊǗ��ҍ폜��(ry
function admin_sage($pass){
  global $path;
  $chgno = array(dummy);
  $chgflag = FALSE;
  reset($_POST);
  while ($item = each($_POST)){
    if($item[1]=='sage'){array_push($chgno,$item[0]);$chgflag=TRUE;}
  }
  if($chgflag){
    // hage �ǉ� 2004.8.1
    ignore_user_abort(1);
    // hage �ǉ������܂�
    $fp=fopen(LOGFILE,"r+");
    set_file_buffer($fp, 0);
    flock($fp, 2);
    rewind($fp);
    $buf=fread($fp,1000000);
    if($buf==''){error("error admin sage");}
    $line = explode("\n",$buf);
    $countline=count($line);
    for($i = 0; $i < $countline; $i++){if($line[$i]!=""){$line[$i].="\n";};}
    $find = FALSE;
    for($i = 0; $i < $countline; $i++){
      list($no,$now,$name,$email,$sub,$com,$url,$host,$pw,$ext,$w,$h,$tim,$chk) = explode(",",$line[$i]);
      if(array_search($no,$chgno)){
        $find = TRUE;
        // URI�g��'sage'�����؂�ւ�
    $str = str_replace("&amp;", "&", $str);//���ꕶ��

        if (stristr($url,'sage')) {$url=str_replace('sage','',$url);}
        else { $url .= 'sage'; }
        $line[$i] = "$no,$now,$name,$email,$sub,$com,$url,$host,$pw,$ext,$w,$h,$tim,$chk,\n";
      }
    }
    if($find){//���O�X�V
      ftruncate($fp,0);
      set_file_buffer($fp, 0);
      rewind($fp);
      fputs($fp, implode('', $line));
    }
    fclose($fp);
    updatelog();
    // hage �ǉ� 2004.8.1
    ignore_user_abort(0);
    // hage �ǉ������܂�
  }

  // sage�L���I����ʂ�\��
  echo "<input type=hidden name=mode value=admin>\n";
  echo "<input type=hidden name=admin value=sage>\n";
  echo "<input type=hidden name=pass value=\"$pass\">\n";
  echo "<center><P>sage��Ԃ�ύX�������L���̃`�F�b�N�{�b�N�X�Ƀ`�F�b�N�����A�ύX�{�^���������ĉ������B\n";
  echo "<center>�usage�v�Ɓusage�����v���؂�ւ��܂��B\n";
  echo "<center>�usage�X�^�[�g�v��u���X��sage�v�ɂ��usage�v�͉����ł��܂���B\n";
  echo "<p><input type=submit value=\"�ύX\">";
  echo "<input type=reset value=\"���Z�b�g\">";
  echo "<P><table border=1 cellspacing=0>\n";
  echo "<tr bgcolor=6080f6><th>�I��</th><th>�L��No</th><th>���</th><th>���e��</th><th>�薼</th>";
  echo "<th>���e��</th><th>�R�����g</th><th>�z�X�g��</th><th>�Y�t<br>(Bytes)</th>";
  echo "</tr>\n";

  //�c���[�t�@�C������X�����̋L��No.���擾
  $ttree = file(TREEFILE);
  $tno = array(dummy);
  $tfind = false;
  $tcounttree=count($ttree);
  for($i = 0;$i<$tcounttree;$i++){
    list($tartno,)=explode(",",rtrim($ttree[$i]));
    array_push($tno,$tartno);
  }

  //���O�t�@�C���ǂݏo��
  $line = file(LOGFILE);
  $bgcol = 0;
  for($j = 0; $j < count($line); $j++){
    $img_flag = FALSE;
    list($no,$now,$name,$email,$sub,$com,$url,
         $host,$pw,$ext,$w,$h,$time,$chk) = explode(",",$line[$j]);
    if(array_search($no,$tno)){
      // �t�H�[�}�b�g
      $now=ereg_replace('.{2}/(.*)$','\1',$now);
      $now=ereg_replace('\(.*\)',' ',$now);
      if(strlen($name) > 10) $name = substr($name,0,9).".";
      if(strlen($sub) > 10) $sub = substr($sub,0,9).".";
      if($email) $name="<a href=\"mailto:$email\">$name</a>";
      $com = str_replace("<br />"," ",$com);
      $com = htmlspecialchars($com);
      if(strlen($com) > 20) $com = substr($com,0,18) . ".";
      $url = (stristr($url,'sage')) ? 'sage' : '�@';
      // �摜������Ƃ��̓����N
      if($ext && is_file($path.$time.$ext)){
        $img_flag = TRUE;
        $clip = "<a href=\"".IMG_DIR.$time.$ext."\" target=_blank>".$time.$ext."</a><br>";
        $size = filesize($path.$time.$ext);
        $all += $size;                    //���v�v�Z
        $chk= substr($chk,0,10);
      }else{
        $clip = "";
        $size = 0;
        $chk= "";
      }
      $bg = ($bgcol++ % 2) ? "d6d6f6" : "f6f6f6";//�w�i�F

      echo "<tr bgcolor=$bg><th><input type=checkbox name=\"$no\" value=sage></th>";
      echo "<th>$no</th><th>$url</th><td><small>$now</small></td><td>$sub</td>";
      echo "<td><b>$name</b></td><td><small>$com</small></td>";
      echo "<td>$host</td><td align=center>$clip($size)</td>\n";
      echo "</tr>\n";
    }
  }
  echo "</table><p><input type=submit value=\"�ύX$msg\">";
  echo "<input type=reset value=\"���Z�b�g\"></form>";

  $all = (int)($all / 1024);
  echo "�y �摜�f�[�^���v : <b>$all</b> KB �z";
  die("</center></body></html>");
}

// hage �ǉ� 2004.8.1

/* �Ǘ��ҐԎ��z�X�g�o�^ */
function regist_host($pass){
  global $path;

  // IP�\���I�v�V�����̃`�F�b�N
  $ipflag = (isset($_POST['ipdisp']) && $_POST['ipdisp'] == 'on') ? TRUE : FALSE ;

  // �N���z�X�g���X�g�t�@�C���̎擾
  $hostdat = array('dummy');
  if(is_file(HOSTFILE)){
    $hostdat = file(HOSTFILE);
    $counthost = count($hostdat);
    for($i=0;$i<$counthost;++$i){ $hostdat[$i] = trim($hostdat[$i],"\n"); }
  }
  // �N��ID���X�g�t�@�C���̎擾
  $idhostdat = array('dummy');
  if(is_file(IDHOSTFILE)){
    $idhostdat = file(IDHOSTFILE);
    $counthost = count($idhostdat);
    for($i=0;$i<$counthost;++$i){ $idhostdat[$i] = trim($idhostdat[$i],"\n"); }
  }
  // �`�F�b�N�̕t�����L���ԍ��̎擾
  $chgno = array('dummy');
  $chgflag = FALSE;
  reset($_POST);
  while ($item = each($_POST)){
    if($item[1]=='regist'){array_push($chgno,$item[0]);$chgflag=TRUE;}
  }

  // �`�F�b�N�̕t�������ڂ�����΁A�X�V
  $setflag = FALSE;
  $idsetflag = FALSE;
  if($chgflag){
    $logdat = file(LOGFILE);
    foreach($logdat as $line){
      list($no,,,,,,,$host,,,,,,) = explode(",",$line);
      if(in_array($no,$chgno) && $host){
        if($ipflag){
          if(!in_array($host,$hostdat)){
            $setflag = TRUE;
            array_push($hostdat,$host);
          }
        }else{
          if(!in_array($host,$idhostdat)){
            $idsetflag = TRUE;
            array_push($idhostdat,$host);
          }
        }
      }
    }

    if($setflag){
      $fp=fopen(HOSTFILE,"w");
      set_file_buffer($fp, 0);
      flock($fp, 2);
      fputs($fp, implode("\n", $hostdat));
      fclose($fp);
    }
    if($idsetflag){
      $fp=fopen(IDHOSTFILE,"w");
      set_file_buffer($fp, 0);
      flock($fp, 2);
      fputs($fp, implode("\n", $idhostdat));
      fclose($fp);
    }
    if($setflag || $idsetflag){ updatelog(); }
  }

  // �����L���I����ʂ�\��
  echo "<input type=hidden name=mode value=admin>\n";
  echo "<input type=hidden name=admin value=reghost>\n";
  echo "<input type=hidden name=pass value=\"$pass\">\n";
  echo "<center><P>�Ώۃz�X�g�̋L���`�F�b�N�{�b�N�X�Ƀ`�F�b�N�����A�ύX�{�^���������ĉ������B<br>\n";
  echo "�\���z�X�g�̃��X�g�ɓo�^����܂��B<br>\n";
  echo "[�z�X�g����\��������]�Ƀ`�F�b�N����ƃz�X�g�����A���Ȃ���ID��\�����܂��B<br>\n";
  echo "<p><input type=submit value=\"�ύX\">";
  echo "<input type=reset value=\"���Z�b�g\">";
  echo "<p>[<input type=checkbox name=ipdisp value=on>�z�X�g����\��������]";
  echo "<P><table border=1 cellspacing=0>\n";
  echo "<tr bgcolor=6080f6><th>�I��</th><th>�L��No</th><th>���</th><th>���e��</th><th>�薼</th>";
  echo "<th>���e��</th><th>�R�����g</th><th>�z�X�g��</th>";
  echo "</tr>\n";

  //���O�t�@�C���ǂݏo��
  $line = file(LOGFILE);
  $bgcol = 0;
  for($j = 0; $j < count($line); $j++){
    $img_flag = FALSE;
    list($no,$now,$name,$email,$sub,$com,$url,
         $host,$pw,$ext,$w,$h,$time,$chk) = explode(",",$line[$j]);
    // �t�H�[�}�b�g
    $now=ereg_replace('.{2}/(.*)$','\1',$now);
    $now=ereg_replace('\(.*\)',' ',$now);
    if(strlen($name) > 10) $name = substr($name,0,9).".";
    if(strlen($sub) > 10) $sub = substr($sub,0,9).".";
    if($email) $name="<a href=\"mailto:$email\">$name</a>";
    $com = str_replace("<br />"," ",$com);
    $com = htmlspecialchars($com);
    if(strlen($com) > 20) $com = substr($com,0,18) . ".";
    $url = '�@�@�@';
    if(in_array($host,$idhostdat)){ $url = 'ID'; }
    if(in_array($host,$hostdat)){ $url = '�z�X�g'; }

    $bg = ($bgcol++ % 2) ? "d6d6f6" : "f6f6f6";//�w�i�F

    echo "<tr bgcolor=$bg><th><input type=checkbox name=\"$no\" value=regist></th>";
    echo "<th>$no</th><th>$url</th><td><small>$now</small></td><td>$sub</td>";
    echo "<td><b>$name</b></td><td><small>$com</small></td><td>$host</td>\n";
    echo "</tr>\n";
  }
  echo "</table><p><input type=submit value=\"�ύX\">";
  echo "<input type=reset value=\"���Z�b�g\"></form>";
  die("</center></body></html>");
}

/* �Ǘ��ҐԎ��z�X�g�폜 */
function delete_host($pass){
  global $path;

  // �N���z�X�g���X�g�t�@�C���̎擾
  $hostdat = array('dummy');
  if(is_file(HOSTFILE)){
    $hostdat = file(HOSTFILE);
    $counthost = count($hostdat);
    for($i=0;$i<$counthost;++$i){ $hostdat[$i] = trim($hostdat[$i],"\n"); }
    $temp = array_shift($hostdat);
  }

  // �N��ID���X�g�t�@�C���̎擾
  $idhostdat = array('dummy');
  if(is_file(IDHOSTFILE)){
    $idhostdat = file(IDHOSTFILE);
    $counthost = count($idhostdat);
    for($i=0;$i<$counthost;++$i){ $idhostdat[$i] = trim($idhostdat[$i],"\n"); }
    $temp = array_shift($idhostdat);
  }

  // �`�F�b�N�̕t�����L���ԍ��̎擾
  $chgno = array('dummy');
  $chgflag = FALSE;
  $idchgno = array('dummy');
  $idchgflag = FALSE;
  reset($_POST);
  while ($item = each($_POST)){
    if($item[1]=='delete'){array_push($chgno,$item[0]);$chgflag=TRUE;}
    if($item[1]=='id_delete'){array_push($idchgno,$item[0]);$idchgflag=TRUE;}
  }

  $setflag = FALSE;
  $newdat = array('dummy');
  if($chgflag){
    foreach($hostdat as $line){
      $temp = str_replace('.','_',$line);	// php�ł�POST������"."��"_"�ɕϊ�����̂ť��
      if(in_array($temp,$chgno)){
        $setflag = TRUE;
      }elseif($line != 'dummy'){
        array_push($newdat,$line);
      }
    }
    if($setflag){
      $hostdat = $newdat;
      $fp=fopen(HOSTFILE,"w");
      set_file_buffer($fp, 0);
      flock($fp, 2);
      fputs($fp, implode("\n", $hostdat));
      fclose($fp);
    }
  }
  $idsetflag = FALSE;
  $idnewdat = array('dummy');
  if($idchgflag){
    foreach($idhostdat as $line){
      $temp = str_replace('.','_',$line);	// php�ł�POST������"."��"_"�ɕϊ�����̂ť��
      if(in_array($temp,$idchgno)){
        $idsetflag = TRUE;
      }elseif($line != 'dummy'){
        array_push($idnewdat,$line);
      }
    }
    if($idsetflag){
      $idhostdat = $idnewdat;
      $fp=fopen(IDHOSTFILE,"w");
      set_file_buffer($fp, 0);
      flock($fp, 2);
      fputs($fp, implode("\n", $idhostdat));
      fclose($fp);
    }
  }
  if($setflag || $idsetflag){ updatelog(); }

  // �����L���I����ʂ�\��
  echo "<input type=hidden name=mode value=admin>\n";
  echo "<input type=hidden name=admin value=delhost>\n";
  echo "<input type=hidden name=pass value=\"$pass\">\n";
  echo "<center><P>���X�g����폜�������z�X�g�̃`�F�b�N�{�b�N�X�Ƀ`�F�b�N�����A�ύX�{�^���������ĉ������B<br>\n";
  echo "�\���z�X�g�̃��X�g����폜����܂��B\n";
  echo "<p><input type=submit value=\"�폜\">";
  echo "<input type=reset value=\"���Z�b�g\">";
  echo "<P>�z�X�g�\�����X�g<br><table border=1 cellspacing=0>\n";
  echo "<tr bgcolor=6080f6><th>�I��</th><th>�z�X�g��</th></tr>\n";

  foreach($hostdat as $line){
    if($line != 'dummy'){
      $bg = ($bgcol++ % 2) ? "d6d6f6" : "f6f6f6";//�w�i�F
      echo "<tr bgcolor=$bg><th><input type=checkbox name=\"$line\" value=delete></th>";
      echo "<td>$line</td></tr>\n";
    }
  }
  echo "</table>";
  echo "<P>ID�\�����X�g<br><table border=1 cellspacing=0>\n";
  echo "<tr bgcolor=6080f6><th>�I��</th><th>�z�X�g��</th></tr>\n";

  foreach($idhostdat as $line){
    if($line != 'dummy'){
      $bg = ($bgcol++ % 2) ? "d6d6f6" : "f6f6f6";//�w�i�F
      echo "<tr bgcolor=$bg><th><input type=checkbox name=\"$line\" value=id_delete></th>";
      echo "<td>$line</td></tr>\n";
    }
  }
  echo "</table>";
  echo "<p><input type=submit value=\"�폜\">";
  echo "<input type=reset value=\"���Z�b�g\"></form>";
  die("</center></body></html>");
}

// hage �ǉ������܂�

function init(){
  // hage �ǉ� 2004.8.1
  // $chkfile=array(LOGFILE,TREEFILE);
  $chkfile=array(LOGFILE,TREEFILE,HOSTFILE,IDHOSTFILE);
  // hage �ǉ������܂�
  if(!is_writable(realpath("./")))error("�J�����g�f�B���N�g���ɏ����܂���<br>");
  foreach($chkfile as $value){
    if(!file_exists(realpath($value))){
      $fp = fopen($value, "w");
      set_file_buffer($fp, 0);
      if($value==LOGFILE)fputs($fp,"1,2002/01/01(��) 00:00,������,,����,�{���Ȃ�,,,,,,,,,\n");
      if($value==TREEFILE)fputs($fp,"1\n");
      // hage �ǉ� 2004.8.1
      if($value==HOSTFILE || $value==IDHOSTFILE)fputs($fp,"dummy");
      // hage �ǉ������܂�
      fclose($fp);
      if(file_exists(realpath($value)))@chmod($value,0666);
    }
    if(!is_writable(realpath($value)))$err.=$value."�������܂���<br>";
    if(!is_readable(realpath($value)))$err.=$value."��ǂ߂܂���<br>";
  }
  @mkdir(IMG_DIR,0777);@chmod(IMG_DIR,0777);
  if(!is_dir(realpath(IMG_DIR)))$err.=IMG_DIR."������܂���<br>";
  if(!is_writable(realpath(IMG_DIR)))$err.=IMG_DIR."�������܂���<br>";
  if(!is_readable(realpath(IMG_DIR)))$err.=IMG_DIR."��ǂ߂܂���<br>";
  if(USE_THUMB){
    @mkdir(THUMB_DIR,0777);@chmod(THUMB_DIR,0777);
    if(!is_dir(realpath(IMG_DIR)))$err.=THUMB_DIR."������܂���<br>";
    if(!is_writable(realpath(THUMB_DIR)))$err.=THUMB_DIR."�������܂���<br>";
    if(!is_readable(realpath(THUMB_DIR)))$err.=THUMB_DIR."��ǂ߂܂���<br>";
  }
  @mkdir(IMG_REF_DIR,0777);@chmod(IMG_REF_DIR,0777);
  if(!is_dir(realpath(IMG_REF_DIR)))$err.=IMG_REF_DIR."������܂���<br>";
  if(!is_writable(realpath(IMG_REF_DIR)))$err.=IMG_REF_DIR."�������܂���<br>";
  if(!is_readable(realpath(IMG_REF_DIR)))$err.=IMG_REF_DIR."��ǂ߂܂���<br>";
  if($err)error($err);
}
/*-----------Main-------------*/
// GET ���N�G�X�g���� '/' ���܂܂��ꍇ�͏I������
$reqcheck = substr($_SERVER['REQUEST_URI'], strlen($_SERVER['SCRIPT_NAME']));
if (FALSE !== strpos($reqcheck, '/')) {
die('');
}
$buf='';
init();         //�����������ݒ��͕s�v�Ȃ̂ō폜����
switch($mode){
  case 'regist':
    regist($name,$email,$sub,$com,'',$pwd,$upfile,$upfile_name,$resto);
    break;
  case 'admin':
    valid($pass);
    if($admin=="del") admindel($pass);
    if($admin=="post"){
      echo "</form>";
      form($post,$res,1);
      echo $post;
      die("</body></html>");
    }
    if(is_file($default_thumb) && $admin=="thumb") admin_chgthumb($pass);
    if(ADMIN_SAGE && $admin=="sage") admin_sage($pass);
	// hage �ǉ� 2004.8.1
    if($admin == "reghost") regist_host($pass);
    if($admin == "delhost") delete_host($pass);
	// hage �ǉ������܂�
    break;
  case 'usrdel':
    usrdel($no,$pwd);
  default:
    if($res){
      updatelog($res);
    }else{
      updatelog();
      echo "<META HTTP-EQUIV=\"refresh\" content=\"0;URL=".PHP_SELF2."\">";
    }
}
?>
