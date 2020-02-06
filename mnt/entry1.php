<?php
/*************************************************************************
 * 総合文化展
 *
 *    作品エントリー画面
 *
 *************************************************************************/

//外部スクリプト読み込み
require_once "env.php";

//	echo __FILE__ . '<br />';
//	echo dirname(__FILE__) . '<br />';
$err_cnt = 0;
$err_msg = "";

/*
    Check admin or not
*/
session_start();

$timeout = 600; // Number of seconds until it times out.

// Check if the timeout field exists.
if (isset($_SESSION['timeout'])) {
    // See if the number of seconds since the last
    // visit is larger than the timeout period.
    $duration = time() - (int)$_SESSION['timeout'];
    if ($duration > $timeout) {
        // Destroy the session and restart it.
        session_destroy();
        session_start();
    }
}

// Update the timout field with the current time.
$_SESSION['timeout'] = time();

if (isset($_SESSION['DF_SSN_ADMIN'])) {
    $str_adm = RTrim($_SESSION['DF_SSN_ADMIN']);
} else {
    $str_adm = "";
}
if ($str_adm != "1") {
    header('Location: ' . '/bun65');
}

// chọn loại
// 区分
if (isset($_POST['kubun'])) {
    $KUBUN = $_POST['kubun'];
} else {
    $KUBUN = "RA";
}
//	echo $SIBU."<br />";

// $mnt_flg 0:新規作成
if (isset($_POST['mnt_flg']) && is_numeric($_POST['mnt_flg'])) {
    $mnt_flg = $_POST['mnt_flg'] + 0;
} else {
    $mnt_flg = 0;
}
// echo "mnt_flg:".$mnt_flg."<br />";

// 作品番号
if (isset($_POST['rowid'])) {
    $ROWID = $_POST['rowid'];
} else {
    $ROWID = "";
}
//	echo $ROWID."<br />";
//Timecode for thumbnail
if (isset($_POST['TextArea21'])) {
    $Timecode = $_POST['TextArea21'];
} else {
    $Timecode = 0;
}
// 作

// $mnt_flg = 8 => edit,  = 0 => add
if ($mnt_flg == 8 AND $ROWID != "") {

    // create a connection
    $link = mysqli_connect($envDbServer, $envDbUser, $envDbUserPass);
    if (!$link) {
        //		die('接続失敗です。'.mysqli_error());
        $err_msg = '接続失敗です。' . mysqli_connect_error();
        $err_cnt = $err_cnt + 1;
    }

    //	print('<p>接続に成功しました。</p>');

    $db_selected = mysqli_select_db($link, $envDbName);
    if (!$db_selected) {
        //	die('データベース選択失敗です。'.mysqli_error());
        $err_msg = 'データベース選択失敗です。' . mysqli_error();
        $err_cnt = $err_cnt + 1;
    }

    //	print('<p>'.$envDbName.'データベースを選択しました。</p>');

    // MySQLに対する処理

    mysqli_set_charset('utf8');

    $sql = "select * from t_entryinfo where E_ROWID='$ROWID' ORDER BY E_ROWID desc; ";

    $result = mysqli_query($link, $sql);

    if (!$result) {
        //	die('SELECTクエリーが失敗しました。'.mysqli_error());
        $err_msg = 'SELECTクエリーが失敗しました。' . mysqli_error();
        $err_cnt = $err_cnt + 1;
    }

    while ($row = mysqli_fetch_assoc($result)) {

        // 作品文字
        $sakuhin = $row['E_TANKA_INFO'];
        // 作品コメント
        $comment = $row['E_COMMENT'];
        // 部門
        $BUMON = $row['E_BM_CODE'];
        // 支部名
        $SIBU = $row['E_DIV_NAME'];
        // 名前
        $SIMEI = $row['E_USR_NAME'];
        // 作品タイトル
        $S_TTL = $row['E_TITLE'];
        // 作品サイズ縦
        $S_TATE = $row['E_SIZE_L'];
        // 作品サイズ幅
        $S_YOKO = $row['E_SIZE_B'];
        // 作品サイズ幅
        $S_HABA = $row['E_SIZE_W'];
        // 返送先　郵便番号
        $R_ZIPCODE = $row['E_R_ZIPCODE'];
        // 返送先　住所
        $R_ADDR = $row['E_R_Addr'];
        // 返送先　電話番号
        $R_TEL = $row['E_R_TEL'];
        // 返送先　宛先
        $R_NAME = $row['E_R_NAME'];

        // ファイル名
        $file_nm = $row['E_FILE_NAME'];
        // ファイルパス
        $path = $envSakuhinFol . $KUBUN . "_" . $BUMON . "/" . $row['E_FILE_NAME'];
    }


    $close_flag = mysqli_close($link);

    if ($close_flag) {
        //	 print('<p>切断に成功しました。</p>');
    }


} else {

    // 作品文字
    if (isset($_POST['TextArea1'])) {
        $sakuhin = $_POST['TextArea1'];
    } else {
        $sakuhin = "";
    }
    //	echo $sakuhin."<br />";

    // 作品コメント
    if (isset($_POST['TextArea2'])) {
        $comment = $_POST['TextArea2'];
    } else {
        $comment = "";
    }
    //	echo $comment."<br />";

    // 部門
    if (isset($_POST['Select1'])) {
        $BUMON = $_POST['Select1'];
    } else {
        $BUMON = "";
    }
    //	echo $BUMON."<br />";

    // 支部名
    if (isset($_POST['Text11'])) {
        $SIBU = $_POST['Text11'];
    } else {
        $SIBU = "";
    }
    //	echo $SIBU."<br />";

    // 名前
    if (isset($_POST['Text12'])) {
        $SIMEI = $_POST['Text12'];
    } else {
        $SIMEI = "";
    }
    //	echo $SIMEI."<br />";

    // 作品タイトル
    if (isset($_POST['Text13'])) {
        $S_TTL = $_POST['Text13'];
    } else {
        $S_TTL = "";
    }
    //	echo $S_TTL."<br />";

    // 作品サイズ縦
    if (isset($_POST['Text14'])) {
        $S_TATE = $_POST['Text14'];
    } else {
        $S_TATE = "";
    }
    //	echo $S_TATE."<br />";

    // 作品サイズ横
    if (isset($_POST['Text15'])) {
        $S_YOKO = $_POST['Text15'];
    } else {
        $S_YOKO = "";
    }
    //	echo $S_YOKO."<br />";

    // 作品サイズ幅
    if (isset($_POST['Text16'])) {
        $S_HABA = $_POST['Text16'];
    } else {
        $S_HABA = "";
    }
    //	echo $S_HABA."<br />";

    // 返送先　郵便番号
    if (isset($_POST['Text17'])) {
        $R_ZIPCODE = $_POST['Text17'];
    } else {
        $R_ZIPCODE = "";
    }
    //	echo $R_ZIPCODE."<br />";

    // 返送先　住所
    if (isset($_POST['Text18'])) {
        $R_ADDR = $_POST['Text18'];
    } else {
        $R_ADDR = "";
    }
    //	echo $R_ADDR."<br />";

    // 返送先　電話番号
    if (isset($_POST['Text19'])) {
        $R_TEL = $_POST['Text19'];
    } else {
        $R_TEL = "";
    }
    //	echo $R_TEL."<br />";

    // 返送先　宛先
    if (isset($_POST['Text20'])) {
        $R_NAME = $_POST['Text20'];
    } else {
        $R_NAME = "";
    }
    //	echo $R_NAME."<br />";

    //Timecode for thumbnail
   /* if (isset($_POST['TextArea21'])) {
        $Timecode = $_POST['TextArea21'];
    } else {
        $Timecode = 0;
    }*/
    // 作
}


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>総合文化展 作品登録</title>
    <!--CSSファイルのみ -->
    <link rel="stylesheet" href="./lightbox281/css/lightbox.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <style type="text/css">
        #test1 {
            display: inline;
            list-style: none;
        }

        #test1 div {
            float: left;
            display: block;
            vertical-align: middle;
            width: 110px;
        }

        body {
            margin: 10px;
        }

        body #title{
            width: 80%;
            text-align: center;
        }

        #footer {
            width: 80%;
            text-align: center;
        }

        body input[type=button] {
            margin: 10px 5px 0px 5px;
        }

        body input[type=text], body textarea{
            width: 80%;
        }
    </style>
</head>
<body>
<section id="title">
    <div style="text-align: left; margin-bottom: 20px">
        <b>
            全富士通労働組合連合会結成50周年記念行事
            <br>
            富士通労働組合単一組織結成70周年記念事業
        </b>
    </div>
    <?php if ($KUBUN == "RA") { ?>
        <h2><b>「総合文化展２０２０」申込書</b></h2>
        <div class="btn-group" role="group" aria-label="Basic example">
            <input id="Button3" type="button" value="登録済み一覧→">
            <input id="reg_btn" type="button" value="ユーザーID管理→">
        </div>
    <?php } elseif ($KUBUN == "RI") { ?>
        <h2>作品登録　『力作じまんの部 』</h2>
        <div class="btn-group" role="group" aria-label="Basic example">
            <input id="Button2" type="button" value="らくらくエントリーの部→">
            <input id="Button3" type="button" value="登録済み一覧→">
            <input id="reg_btn" type="button" value="レジスター→">
        </div>
    <?php } else { ?>
        <h2>ユーザーID管理</h2>
        <div class="btn-group" role="group" aria-label="Basic example">
            <input id="Button2" type="button" value="作品登録→">
            <input id="Button3" type="button" value="登録済み一覧→">
        </div>
    <?php } ?>
</section>

<form method="post" enctype="multipart/form-data" name="form1">


    <!-- ============================================================= -->
    <hr style="width: 80%; float: left"/>
    <table class="table" border="2" style="width:80%;">
        <!-- ============================================================= -->
        <?php if ($KUBUN == "RA") { ?>
            <tr>
                <th>申込日:</th>
                <td>
                    <select id="year" onchange="dateChange()">
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                    </select>
                    年
                    <select id="month" onchange="dateChange()">
                        <?php for ($month = 1; $month <= 12; $month++) {
                            echo '<option value="' . $month . '">' . $month . '</option>';
                        } ?>
                    </select>
                    月
                    <select id="day">
                        <?php for ($day = 1; $day <= 31; $day++) {
                            echo '<option value="' . $day . '">' . $day . '</option>';
                        } ?>
                    </select>
                    日
                </td>
            </tr>

            <tr>
                <th>組合：</th>
                <td>
                    <select>
                        <option>組合名を選択ください。</option>
                        <option>富士通</option>
                        <option>富士通フロンテック</option>
                        <option>新光電気</option>
                        <option>富士通テレコムネットワークス</option>
                        <option>富士通マーケティング</option>
                        <option>しなの富士通</option>
                        <option>ＦＤＫ</option>
                        <option>富士通アイ・ネット</option>
                        <option>扶桑電通</option>
                        <option>ＰＦＵ</option>
                        <option>富士通ワイエフシー</option>
                        <option>富士通エレクトロニクス</option>
                        <option>デンソーテン</option>
                        <option>富士通ゼネラル</option>
                        <option>富士通アイソテック</option>
                        <option>ニフティ</option>
                        <option>ＪＥＭＳ＆ＦＰＥ</option>
                        <option>富士通エフサス</option>
                        <option>富士通インフォテック</option>
                        <option>富士通エフ・アイ・ピー</option>
                        <option>富士通コワーコ</option>
                        <option>富士通ネットワークソリューションズ</option>
                        <option>富士通北陸システムズ</option>
                        <option>富士通九州システムズ</option>
                        <option>富士通ビー・エス・シー</option>
                        <option>沖縄富士通システムエンジニアリング</option>
                        <option>富士通ラーニングメディア</option>
                        <option>富士通ＩＴプロダクツ</option>
                        <option>富士通アドバンストエンジニアリング</option>
                        <option>ＦＪＦＳ</option>
                        <option>富士通パブリックソリューションズ</option>
                        <option>富士通エフ・アイ・ピー・システムズ</option>
                        <option>ＦＳＣＳ</option>
                        <option>サイプレス・イノベイツ</option>
                        <option>会津富士通セミコンダクター</option>
                        <option>三重富士通セミコンダクター</option>
                        <option>ソシオネクスト</option>
                        <option>富士通クラウドテクノロジーズ</option>
                        <option>オン・セミコンダクター会津</option>
                    </select>
                </td>
            </tr>

            <tr>
                <th>(A) 申込者（作者）氏名:</th>
                <td>
                    <input type="text">
                </td>
            </tr>

            <tr>
                <th>申込者（作者）氏名（ふりがな）:</th>
                <td>
                    <input type="text">
                </td>
            </tr>

            <tr>
                <th>組合員氏名:</th>
                <td>
                    <input type="text">
                </td>
            </tr>

            <tr>
                <th>参加区分　※応募時：</th>
                <td>
                    <select>
                        <option value="1">申込者（作者）の参加区分を選択ください。</option>
                        <option value="2">組合員（定年後再雇用者含む）</option>
                        <option value="3">家族</option>
                        <option value="4">組合のOB・OG</option>
                    </select>
                </td>
            </tr>

            <tr>
                <th>年齢区分　※応募時：</th>
                <td>
                    <select>
                        <option value="1">申込者（作者）の年齢区分を選択ください。</option>
                        <option value="2">小学生以下</option>
                        <option value="3">中学生～18歳以下</option>
                        <option value="4">19～59歳以下</option>
                        <option value="5">60歳以上</option>
                    </select>
                </td>
            </tr>

            <!-- <tr>
		<th>部門：</th>
		<td>
			<select name="Select1">
				<option value="B01" >写真</option>
				<option value="B02" <?php if ($BUMON == "B02") {
                echo "selected";
            } ?>>イラスト</option>
				<option value="B03" <?php if ($BUMON == "B03") {
                echo "selected";
            } ?>>川柳</option>
				<option value="B04" <?php if ($BUMON == "B04") {
                echo "selected";
            } ?>>俳句</option>
				<option value="B05" <?php if ($BUMON == "B05") {
                echo "selected";
            } ?>>短歌</option>
			</select>
		</td>
	</tr> -->

            <tr>
                <th>(B) 部門：</th>
                <td>
                    <select id="bumon" onchange="bumonChange()">
                        <option value="">応募部門を選択ください。</option>
                        <option value="B01">エキスパート</option>
                        <option value="B02">エンジョイ</option>
                        <option value="B03">キッズ</option>
                    </select>
                </td>
            </tr>

            <tr>
                <th>(C) カテゴリー：</th>
                <td>
                    <select id="category">
                        <option value="C01">①絵画</option>
                        <option value="C02">②書道</option>
                        <option value="C03">③写真</option>
                        <option value="C04">④手芸・工芸</option>
                        <option value="C05">⑤写真</option>
                        <option value="C06">⑥絵画</
                        >
                        <option value="C07">⑦音楽</
                        >
                        <option value="C08">⑧動画</
                        >
                        <option value="C09">⑨絵</
                        >
                        <option value="C10">⑩書道</
                        >
                    </select>
                </td>
            </tr>

            <tr>
                <th>作品：</th>
                <td>
                    <?php if ($mnt_flg == 8 AND $ROWID != "" AND RTrim($file_nm) != "") { ?>
                        <a href="<?= $path ?>" rel="lightbox" title="my caption">
                            <img id="imgTEMP" src="<?= $path ?>" width="150" height="112" alt="" border=0></a>
                        <br/>
                        <legend>
                            画像またはビデオファイルを選択します<br>（GIF、JPG、PNG、MP4、WEBMのみ）
                        </legend>
                        <input name="File1" type="file" size=55/>
                    <?php } else { ?>
                        <legend>
                            画像またはビデオファイルを選択します<br>（GIF、JPG、PNG、MP4、WEBMのみ）
                        </legend>
                        <input name="File1" type="file" size=55/>
                    <?php } ?>
                    <br/>
                    <hr/>
                    <legend>川柳・俳句・短歌作品</legend>
                    <textarea name="TextArea1" cols="50" rows="5"><?= $sakuhin ?></textarea><br>
                </td>
            </tr>

            <tr>
                <th>作品タイトル：</th>
                <td>
                    <input type="text">
                </td>
            </tr>

            <tr>
                <th>作品コメント(100文字まで)：</th>
                <td>
                    <textarea rows="5"></textarea><br>
                </td>
            </tr>

            <tr>
                <th colspan="2">額、表装を含めた作品サイズ　
                   <br> ※（B)がエキスパート部門、キッズ部門（書道）の場合のみ以下を入力
                </th>
            </tr>

            <tr>
                <th>縦（㎝）:</th>
                <td>
                    <input type="text">
                </td>
            </tr>

            <tr>
                <th>横（㎝）:</th>
                <td>
                    <input type="text">
                </td>
            </tr>

            <tr>
                <th>高さ（㎝）<br>※（C）が手芸・工芸の場合のみ入力:</th>
                <td>
                    <input type="text">
                </td>
            </tr>

            <tr>
                <th>重量（㎏）<br>※（C）が手芸・工芸の場合のみ入力:</th>
                <td>
                    <input type="text">
                </td>
            </tr>

            <!--
	<tr>
		<th>支部名：</th>
		<td><select name="Text11">
				<option value="">
				<?php
            foreach ($envShibu as $val) {
                if ($SIBU == $val) {
                    echo "<option value=\"$val\" selected>$val";
                } else {
                    echo "<option value=\"$val\">$val";
                }
            }
            ?>
			</select>
		</td>
	</tr>
	<tr>
		<th>名前：</th>
		<td>
			<input name="Text12" type="text" value="<?= $SIMEI ?>" /><br />
		</td>
	</tr>

	-->

            <tr >
                <th colspan="2" >作品の返送先、作品は展示期間の終了後に返送します。
                    <br>（B)がエキスパート部門、キッズ部門の場合のみ入力ください。
                </th>
            </tr>

            <tr>
                <th>郵便番号:</th>
                <td>
                    <input type="text">
                </td>
            </tr>

            <tr>
                <th>住所:</th>
                <td>
                    <input type="text">
                </td>
            </tr>

            <tr>
                <th>氏名:</th>
                <td>
                    <input type="text">
                </td>
            </tr>

            <tr>
                <th>電話番号:</th>
                <td>
                    <input type="text">
                </td>
            </tr>


            <input name="Text13" type="hidden" value=""/>
            <input name="Text14" type="hidden" value=""/>
            <input name="Text15" type="hidden" value=""/>
            <input name="Text16" type="hidden" value=""/>
            <input name="Text17" type="hidden" value=""/>
            <input name="Text18" type="hidden" value=""/>
            <input name="Text19" type="hidden" value=""/>
            <input name="Text20" type="hidden" value=""/>
            <!-- ============================================================= -->
        <?php } elseif ($KUBUN == "RI") { ?>
            <tr>
                <th>部門：</th>
                <td>
                    <select id="select1" name="Select1">
                        <option value="P01">絵画</option>
                        <option value="P02" <?php if ($BUMON == "P02") {
                            echo "selected";
                        } ?>>書道
                        </option>
                        <option value="P03" <?php if ($BUMON == "P03") {
                            echo "selected";
                        } ?>>写真
                        </option>
                        <option value="P04" <?php if ($BUMON == "P04") {
                            echo "selected";
                        } ?>>手芸・工芸
                        </option>
                        <option value="C01" <?php if ($BUMON == "C01") {
                            echo "selected";
                        } ?>>絵画（子供の部）
                        </option>
                        <option value="C02" <?php if ($BUMON == "C02") {
                            echo "selected";
                        } ?>>書道（子供の部）
                        </option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>作品：</th>
                <td>
                    <?php if ($mnt_flg == 8 AND $ROWID != "" AND RTrim($file_nm) != "") { ?>
                        <a href="<?= $path ?>" rel="lightbox" title="my caption">
                            <img id="imgTEMP" src="<?= $path ?>" width="150" height="112" alt="" border=0></a>
                        <br/>
                        <legend>画像ファイルを変更(GIF, JPEG, PNGのみ対応)</legend>
                        <input name="File1" type="file" size=55/>
                    <?php } else { ?>
                        <legend>画像ファイルを選択(GIF, JPEG, PNGのみ対応)</legend>
                        <input name="File1" type="file" size=55/>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <th>作品タイトル：</th>
                <td>
                    <input name="Text13" type="text" value="<?= htmlspecialchars($S_TTL) ?>"/><br/>
                </td>
            </tr>
            <tr>
                <th>作品コメント：</th>
                <td>
                    <textarea name="TextArea2" cols="50" rows="5"><?= htmlspecialchars($comment) ?></textarea><br>
                </td>
            </tr>
            <tr>
                <th>支部名：</th>
                <td><select name="Text11">
                        <option value="">
                            <?php
                            foreach ($envShibu as $val) {
                                if ($SIBU == $val) {
                                    echo "<option value=\"$val\" selected>$val";
                                } else {
                                    echo "<option value=\"$val\">$val";
                                }
                            }
                            ?>
                    </select>
                </td>
                </td>
            </tr>
            <tr>
                <th>名前：</th>
                <td>
                    <input name="Text12" type="text" value="<?= $SIMEI ?>"/><br/>
                </td>
            </tr>
            <tr>
                <th>作品サイズ：</th>
                <td>
                    縦：<input name="Text14" type="text" size="5" maxlength="5" value="<?= $S_TATE ?>"/>　cm<br/>
                    横：<input name="Text15" type="text" size="5" maxlength="5" value="<?= $S_YOKO ?>"/>　cm<br/>
                    幅・奥行き：<input name="Text16" type="text" size="5" maxlength="5" value="<?= $S_HABA ?>"/>　cm<br/>
                </td>
            </tr>
            <tr>
                <th rowspan="4">返送先：</th>
                <td>郵便番号:<input name="Text17" type="text" size="8" maxlength="8" value="<?= $R_ZIPCODE ?>"/></td>
            </tr>
            <tr>
                <td>住所:<input name="Text18" type="text" size="50" value="<?= $R_ADDR ?>"/></td>
            </tr>
            <tr>
                <td>電話番号:<input name="Text19" type="text" size="20" value="<?= $R_TEL ?>"/></td>
            </tr>
            <tr>
                <td> 宛先（お名前）:<input name="Text20" type="text" size="30" value="<?= $R_NAME ?>"/></td>
            </tr>
            <input type="hidden" name="TextArea1" value=""/>
        <?php } else { ?>
            <tr>
                <th>
                    CSV ファイル
                </th>
                <td>
                    <input type="file" accept=".csv">
                </td>
            </tr>
        <?php } ?>
        <!-- ============================================================= -->
    </table>
    <div id="footer">
        <?php if ($mnt_flg == 8 AND $ROWID != "") { ?>
            <input id="Button11" type="button" value="内容を変更する"/>
            <input id="Button12" type="button" value="削除する"/>
            <input id="Button13" type="button" value="キャンセル"/>
        <?php } elseif ($KUBUN == "REG") { ?>
            <input id="BTN_REGISTER" type="button" value="登録"/>
        <?php } else { ?>
            <input id="Button1" type="button" value="内容を変更する"/>
        <?php } ?>
        <input type="hidden" name="kubun" value="<?= $KUBUN ?>"/>
        <input type="hidden" name="mnt_flg" value="<?= $mnt_flg ?>"/>
        <input type="hidden" name="rowid" value="<?= $ROWID ?>"/>
        <input type="hidden" name="svBumon" value="<?= $BUMON ?>"/>
        <input type="hidden" name="svFile" value="<?= $path ?>"/>
        <!-- ============================================================= -->
    </div>

</form>
<iframe name="MNTframe" width="0" height="0" frameborder="0" sandbox="allow-forms allow-scripts allow-top-navigation">
    お使いのブラウザはインライン フレームをサポートしていないか、またはインライン フレームを表示しないように設定されています。
</iframe>

<script src="./js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="./lightbox281/js/lightbox.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        bumonChange()
        dateChange()
    })

    const category = {
        'B01': ['C01', 'C02', 'C03', 'C04'],
        'B02': ['C05', 'C06', 'C07', 'C08'],
        'B03': ['C09', 'C10'],
    };

    function bumonChange() {
        let bumons = ['B01','B02','B03'];
        let bumon = $('#bumon').val();
        $('#category option').hide();
        if (bumons.indexOf(bumon) != -1) {
            category[bumon].forEach(function (cat) {
                $("#category option[value='" + cat + "']").show();
            })
            $('#category').val(category[bumon][0]);
        } else {
            $('#category').val("");
        }

    }

    function dateChange() {
        let year = $('#year').val()
        let month = $('#month').val()

        let even = ['4', '6', '9', '11']

        if (month == '2') {
            $('#day option[value=31]').hide()
            $('#day option[value=30]').hide()
            if (year == '2019') {
                $('#day option[value=29]').hide()
            } else {
                $('#day option[value=29]').show()
            }
        } else if (even.indexOf(month) != -1) {
            $('#day option[value=29]').show()
            $('#day option[value=31]').hide()
            $('#day option[value=30]').show()
        } else {
            $('#day option[value=29]').show()
            $('#day option[value=31]').show()
            $('#day option[value=30]').show()
        }
    }
</script>

<script type="text/javascript">
    $(function () {

        $("#Button1").bind("click", function () {
            document.form1.action = "./chk1.php";
            document.form1.target = "_self";
            document.form1.submit();
        });

        $("#Button2").bind("click", function () {
            document.form1.mnt_flg.value = "0";
            if (document.form1.kubun.value == "RA") {
                document.form1.kubun.value = "RI";
            } else {
                document.form1.kubun.value = "RA";
            }

            document.form1.action = "./entry1.php";
            document.form1.target = "_self";
            document.form1.submit();
        });

        $("#Button3").bind("click", function () {
            document.form1.mnt_flg.value = "0";
            document.form1.action = "./lst1.php";
            document.form1.target = "_self";
            document.form1.submit();
        });

        $("#Button4").bind("click", function () {
            document.form1.mnt_flg.value = "0";
            document.form1.action = "./video.php";
            document.form1.target = "_self";
            document.form1.submit();
        });

        $("#Button11").bind("click", function () {
            if (confirm("変更します。\nよろしいですか？")) {
                document.form1.action = "./upt1.php";
                document.form1.target = "MNTframe";
//document.form1.target = "_self";
                document.form1.submit();
            }
        });

        $("#Button12").bind("click", function () {
            if (confirm("削除します。\nよろしいですか？")) {
                document.form1.action = "./del1.php";
                document.form1.target = "MNTframe";
//document.form1.target = "_self";
                document.form1.submit();
            }
        });

        $("#reg_btn").bind("click", function () {
            document.form1.mnt_flg.value = "0";
            document.form1.kubun.value = "REG";
            document.form1.action = "./entry1.php";
            document.form1.target = "_self";
            document.form1.submit();
        });

        $("#Button13").bind("click", function () {
            document.form1.mnt_flg.value = "0";
            document.form1.TextArea1.value = "";
            document.form1.TextArea2.value = "";
            document.form1.Select1.value = "";
            document.form1.Text11.value = "";
            document.form1.Text12.value = "";
            document.form1.Text13.value = "";
            document.form1.Text14.value = "";
            document.form1.Text15.value = "";
            document.form1.Text16.value = "";
            document.form1.Text17.value = "";
            document.form1.Text18.value = "";
            document.form1.Text19.value = "";
            document.form1.Text20.value = "";
            document.form1.action = "./entry1.php";
            document.form1.target = "_self";
            document.form1.submit();
        });
    });
</script>
<!--Lightbox2オプションのカスタマイズ（必要時） -->
<script>
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
    })
</script>

</body>
</html>

