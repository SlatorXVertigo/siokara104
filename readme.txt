画像掲示板スクリプト

siokara.php Ver1.0.4 及び 1.0.4a 2004/08/01
最新版はとしあき@しおからスクリプト置場<http://siokara.que.jp/>で配布しています。

# このreadmeは萌えスタジオ ひろあきさん作成のimg.phpのreadmeに加筆して作成しました。
# ひでぇ、スクリプトもreadmeも流用かよ!  とか言わないで･･･

出自：
本スクリプトは下記スクリプトを改造したものです。

gazou.php v3.0
最新版はレッツPHP!<http://php.s3.to/>で配布しています。

futaba.php v0.8 lot.031015
最新版は双葉<http://www.2chan.net/script/>で配布しています。

また、以下２品も参考にさせていただきました。

moepic.php Ver 2.06 
最新版は萌え連<http://moepic.dip.jp/gazo/>で配布しています。

img.php & img2.php 2004/07/15
萌えスタジオさん謹製：萌え連投票+しおから合体スクリプト
最新版はとしあき@しおからスクリプト置場<http://siokara.que.jp/>で配布しています。

配布条件はそれぞれのスクリプトの作者様の条件に準じます。
各作者様の条件に合致する場合に限り、改造や再配布を自由に行うことが出来ます。


gif2png<http://www.tuxedo.org/~esr/gif2png/>がある場合は、gifでもサムネイルを作れます。
付属のバイナリはlinux-i386用です。
Win32用gif2png.exeが必要な場合は上記アドレスからWin用を取得してください。
(としあき@しおからさんにもあります。ただし準備板やメールなどで要請求)

設置法：
１、サイトがPHP対応かどうかを調べる。(対応していない場合は設置できません)
２、サイトの設置したい場所にフォルダをつくりパーミッションを777(707)に設定する。
３、siokara.php（メインスクリプト）の設定を編集する。
４、配布されているファイルをサイトに転送する。
５、設置場所内に [src] [thumb] [ref]フォルダを作りパーミッションを777(707)に設定する。
６、siokara.phpをブラウザから読み込むと自動的に必要なファイルが作成されます。

[構成例] ( ) 内は設定する必要があるパーミッション値
[public_html]┐
             ├[siokara]┐                 (777)or(707) (スクリプト置き場所ディレクトリ)
             ｜         ├ [src]         * (777)or(707) (画像保存ディレクトリ)
             │         ├ [thumb]       * (777)or(707) (サムネイル保存ディレクトリ)
             │         ├ [ref]         * (777)or(707) (経由先html格納ディレクトリ)
             │         ├ siokara.php   * (644)or(604) (メインスクリプト) cgiなら(755)
             │         ├ siokara.htm   * (666)or(606) (自動的に作られます)
             │         ├ img.log       * (666)or(606) (自動的に作られます)
             │         ├ tree.log      * (666)or(606) (自動的に作られます)
             │         ├ host.lst      * (666)or(606) (自動的に作られます)
             │         ├ idhost.lst    * (666)or(606) (自動的に作られます)
             │         ├ gif2png         (644)or(604) (変更の必要なし)
             ｜         ├ replace_n.jpg * (777)or(707) (差し替え用サムネイルファイル-1)
             │         ├ replace_g.jpg * (777)or(707) (差し替え用サムネイルファイル-2)
             │         ├ replace_l.jpg * (777)or(707) (差し替え用サムネイルファイル-3)
             │         └ replace_3.jpg * (777)or(707) (差し替え用サムネイルファイル-4)
             │
             └ index.html (トップページ)

設定部の定数を変更することにより(*)印部の名称を変更することが出来ます。
差し替え用サムネファイルは、サムネイル差し替え機能を使用しない場合は不要です。

サーバーにより多少設定が異なる場合があります。
必ず設置方法を記述したページを探し、熟読するようにしてください。

********************************！注意！***************************************
・img.logのファイル名はデフォルトから変えてご使用ください。
　define(LOGFILE, 'img.log');             // ログファイル名
・設置サーバによってはindex.htmが無いと画像掲示板設置フォルダ内が見えてしまう場合があります。
　空のindex.htmを置くか、スクリプトの入り口ファイル名指定をindex.htmに変更してください。
　define(PHP_SELF2, 'siokara.htm');       // 入り口ファイル名
*******************************************************************************

---------<としあき＠しおから改スクリプト説明>----------------------------------

# Ver.1.0.3までの機能
[1] 「レス省略」を表示するレスの数 (OMIT_RES 定数で設定)
    レスしたときの表示数を入力します。'0'ですべて省略。'10'で10件レスを表示します。

[2] GIF表示にサムネイルを使用する (USE_GIF_THUMB 定数で選択)
    サムネイルを使用しない場合、GIFをそのまま表示するため、アニメーションGIFが動きます。

[3] スレ主強制sage機能
    スレ主(新スレを立てる人)が、メール欄に'sage'と入力することで、そのスレが強制sage状態に
    なります。

[4] 強制sageまでの時間 (MAX_PASSED_HOUR 定数で設定)
    時間を指定することによって強制sageが自動でONになります。

[5] 強制sageを告知する (NOTICE_SAGE 定数で選択)
    管理者強制sage処理時に、そのスレの本文に言葉を追加します。
    管理者強制sage処理は ADMIN_SAGE 定数を'1'に設定することで有効になり管理画面から
    sage操作が可能になります。

[6] サムネ差し替えを告知する (NOTICE_THUMB 定数で選択)
    サムネイル差し替え時に、そのスレの本文に言葉を追加します。

[7] ツール避けに画像リンクをhtml経由にする(IMG_REFER 定数で選択)
    画像のリンク先を<META HTTP-EQUIV=\"refresh\" content=\"0;URL=･･･の書かれたhtmlにします。
    有効('1')にするとIMG_REF_DIR 定数で設定されたディレクトリに画像1枚につき1htmlファイルが
    作成されます。

[8] サムネイル差し替え機能
    あらかじめ使用したいサムネイル画像を準備してください。その際「普通用」「グロ用」
    「ロリ用」「三次用」などのように使い分けたい数分だけ準備してください。
    その準備した画像をsiokara.phpと同じディレクトリに配置します。

    準備した画像のファイル名と管理画面に表示させる項目名を決め、siokara.phpの
    R_THUM1〜4、R_TITL1〜4の定数を書き換えます。 R_THUM1〜4 には差し替え画像の
    ファイル名を、R_TITL1〜4 には管理画面で選択するための項目名を記入します。

    あとは、「管理画面」において「サムネイル差し替え」画面で差し替え操作を行います。
    「サムネイル差し替え画面」では上記で設定した項目名が表示されます。
     差し替えたい記事のチェックボックスと差し替え画面の種類をチェックして、
    「差し替え」ボタンのクリックすると差し替えが行われます。

    なお画像がGIFの場合で「GIFをサムネイル化するだけ」がチェックされている場合は、
    GIFサムネ化が優先されます。
    (つまり、差し替え画像のどれを選択しても関係なくGIFサムネに差し替えられます)

    この差し替え画像の数は増減が可能です。
    R_THUM1〜4、R_TITL1〜4の各定数の宣言の下にこのような行があります。
    $rep_thumb = array(R_TITL1=>R_THUM1,R_TITL2=>R_THUM2,R_TITL3=>R_THUM3,R_TITL4=>R_THUM4);
    この行の「R_TITL1=>R_THUM1」の部分を追加したり、削除することで差し替え画像の数を決めら
    れます。
    (ファイル名や項目名を定数にしていますが、実は上の行に直接文字列として設定することも出来
    ます)

[9] [ロGIFアニメ停止]チェックボックス
    投稿欄の[ロ画像なし]チェックボックスの横に[ロGIFアニメ停止]チェックボックスに
    チェックを入れて投稿することで最初からサムネイルで表示するようになります。

    この指定をしたスレは管理画面の「サムネイル差し替え」画面の状態枠に「スレ主」という文字が
    表示されます。
    「スレ主」表示がある場合、サムネイルの差し替えは可能ですが、サムネイル状態を解除すること
    はできません。
    また、「スレ主」表示があるときに「GIFをサムネイル化するだけ」を指定しても、同じサムネに
    差し替えられるだけで意味がありません。
    (まぁ、差し替え告知の表示が出るくらいの違いはありますが)

    なお「GIF表示にサムネイルを使用する」をONにした場合、差し替え機能の「GIFをサムネイル化
    するだけ」が無効、[ロGIFアニメ停止]チェックボックスの機能が無効になります。
    (つまり、GIFはすべてサムネイル化されます)

    また、GIFアニメの動画、静止画の選択は USE_GIF_THUMB 定数の選択によっても変化します。
    USE_GIF_THUMB 定数に'1'を設定した場合、強制的にGIFファイルはサムネイル(静止画)表示と
    なり、上記チェックボックスは表示されません。
    USE_GIF_THUMB 定数に'0'を設定した場合に上記チェックボックスが現れ、動画/静止画を選択
    できるようになります。

# Ver.1.0.3aでの追加機能
[10] レス記事にも画像を添付する機能を追加 (RES_IMG 定数で選択)
     返信画面にも添付ファイルの設定枠を表示して画像付レスが出来るようにしました。
     RES_IMG 定数に'1'を設定すると画像付レスを送信できるようになります。
     <注意>
     本機能はベータ版以前の味見試験的な要素が強いため、十分な検証を行っていません。
     そのため、本機能を使用する場合は動作不具合が発生する可能性が高いことをご承知おきくだ
     さい。

# Ver.1.0.4、Ver1.0.4aでの追加機能(1.0.4aは画像付レス可能版)
[11] 特定ホストからの投稿記事に対してID、ホスト名を表示する機能を追加
     所謂「赤字」機能の追加です。
     それぞれのファイル名は「HOSTFILE」、「IDHOSTFILE」の定数宣言で設定します。
     HOSTFILE･･･俗称「赤字」を表示するホスト名が記録されるファイル
     IDHOSTFILE･･･投稿日時の後に「ID:○○」と表示するホスト名が記録されるファイル

     どちらも管理画面の「ホスト/ID表示リストに登録」の画面にて、表示させるホストを選択する
     ことで書き換わります。
     単に対象ホスト名を並べてるだけなのでエディタで編集も可能です。
     (ただし改行コードに注意、LF(0x0A)のみです)

     「ホスト/ID表示リストに登録」画面で表示させたいホストの記事を選択して、さらに
     「ホスト名を表示させる」のチェックボックスを選択します。
     チェックを入れると「赤字」リストに追加、チェックしないと「ID」リストに追加されます。

     あるホストを対象から外したいときは「ホスト/ID表示リストから削除」画面で操作します。
     削除したいホストのチェックボックスをチェックして削除ボタンで削除されます。

     ・なぜ登録と削除を別画面にしたのか･･･
     現在のログに残っていないホストも処理対象にできるようにするためです。
     登録の方は今暴れているホストが対象だと思われるので、現在のログを対象に選択しますが、
     削除の方はずっと昔に暴れたために登録されて、そのまま登録され続けたホストに対する操作
     もあると思わるためです。

     ・ID表示がfutaba.php標準のIDと違う･･･
     futaba.php標準のID表示は「IPアドレス+投稿日時」などの文字列を暗号化して生成します。
     そのため、同一ホストからの投稿でも、投稿日時により変化する可能性があります。
     今回の改造でのID表示は同一ホストの判別のためのものなので、「ホスト名」文字列から暗号
     化しています。
     そのため、futaba.phpのIDとは違う文字になるはずです。
     futaba.phpと同一仕様のID表示をさせる場合は、DISP_ID 定数に'1'を設定します。
     ただし、その場合は全記事にIDを付加しますが･･･。
     DISP_ID 定数が有効になっている場合は、本機能のID表示は付加されません。

-------------------------------------------------------------------------------

お約束：
  このスクリプトに関しては、すべて自己責任でお願い致します。
  バグっていてログが�dでも泣かないこと。ｼｮｯﾊﾟｲ 所があるかもしれないのでご注意を。

その他注意：
(1) ImageCopyResampled 関数はPHP 4.0.6で追加され、GD 2.0.1以降を必要とします。
    このスクリプトでは ImageCopyResized 関数を上記のものに書き換えています。

(2) BMP/FLASHを明示的に禁止しています。
    これはとしあき@しおからの仕様に合わせているためです。
    BMP/FLASHその他を有効にするには以下の部分を変更してください。
    変更はregist関数内の以下の部分を差し替えます
    <差替前>
    switch ($size[2]) {
      case 1 : $ext=".gif";break;
      case 2 : $ext=".jpg";break;
      case 3 : $ext=".png";break;
     default : $ext=".xxx";error("アップロードに失敗しました<br>GIF,JPG,PNG以外の画像ファイルは受け付けません",$dest);break;
    }
    <差替後>･･･futaba.phpでの設定
    switch ($size[2]) {
      case 1 : $ext=".gif";break;
      case 2 : $ext=".jpg";break;
      case 3 : $ext=".png";break;
      case 4 : $ext=".swf";break;
      case 5 : $ext=".psd";break;
      case 6 : $ext=".bmp";break;
      case 13 : $ext=".swf";break;
      default : $ext=".xxx";break;
    }

(3) 不具合点、要望点、その他ご意見は「としあき@しおから 準備板」の「画像スクリプト関係」
    スレに投げていただけると何か反応があるかも知れません。

謝辞：
  出自に記載の各作者様、ありがとうございます。これからも参考にさせていただきます。
  特に、萌えスタジオ 管理人 ひろあき さん、img.phpとreadme 使わせていただきました。
  準備板などでもお世話になっています。これからもご指導よろしくお願いします。
  そして、としあき@しおから の管理人 しおからとしあき さん。
  遊び場の提供、スクリプトの公開等々、いつもお世話になっています。ありがとうございます。


2004.8.1 ハゲあき拝
