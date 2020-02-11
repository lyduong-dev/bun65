<?php
$err_cnt = 0;

$f_path = "";
$f_nm = "";
$f_type = "";
/**********************************************************************/

/**************************************************************************/
// 区分
//if (isset($_POST['kubun'])) {
//    $KUBUN = $_POST['kubun'];
//} else {
//    $KUBUN = "RA";
//}
//
////echo $KUBUN . "<br />";
//
//// $mnt_flg 0:新規作成
//
//// $mnt_flg 0:新規作成
//if (isset($_POST['mnt_flg']) && is_numeric($_POST['mnt_flg'])) {
//    $mnt_flg = $_POST['mnt_flg'] + 0;
//} else {
//    $mnt_flg = 0;
//}
//
////echo "mnt_flg:" . $mnt_flg . "<br />";
//
//// 作品番号
//if (isset($_POST['rowid'])) {
//    $ROWID = $_POST['rowid'];
//} else {
//    $ROWID = "";
//}
//
//
////echo "ROW " . $ROWID . "<br />";
//
//// 作品文字
//if (isset($_POST['TextArea1'])) {
//    $sakuhin = $_POST['TextArea1'];
//} else {
//    $sakuhin = "";
//}
//
////echo "sakuhin " . $sakuhin . "<br />";
//
//// 作品コメント
//if (isset($_POST['TextArea2'])) {
//    $comment = $_POST['TextArea2'];
//} else {
//    $comment = "";
//}
////echo "com " . $comment . "<br />";
///* //Timecode for thumbnail
//	if(isset($_POST['TextArea21'])){
//		$Timecode = $_POST['TextArea21'];
//	} else {
//		$Timecode = 0;
//	}
//	echo "Timecode  ".$Timecode."<br />";
// */
//// 部門
//if (isset($_POST['Select1'])) {
//    $BUMON = $_POST['Select1'];
//} else {
//    $BUMON = "";
//}
////echo "Bumon " . $BUMON . "<br />";
//
//// 支部名
//if (isset($_POST['Text11'])) {
//    $SIBU = $_POST['Text11'];
//} else {
//    $SIBU = "";
//}
////	echo $SIBU."<br />";
//
//// 名前
//if (isset($_POST['Text12'])) {
//    $USR_NAME = $_POST['Text12'];
//} else {
//    $USR_NAME = "";
//}
////echo $USR_NAME . "<br />";
//
//// 作品タイトル
//if (isset($_POST['Text13'])) {
//    $TITLE = $_POST['Text13'];
//} else {
//    $TITLE = "";
//}
////echo $TITLE . "<br />";
//
//// 作品サイズ縦
//if (isset($_POST['Text14'])) {
//    $SIZE_L = $_POST['Text14'];
//} else {
//    $SIZE_L = "0";
//}
////echo $SIZE_L . "<br />";
//
//// 作品サイズ横
//if (isset($_POST['Text15'])) {
//    $SIZE_B = $_POST['Text15'];
//} else {
//    $SIZE_B = "0";
//}
////echo $SIZE_B . "<br />";
//
//// 作品サイズ幅
//if (isset($_POST['Text16'])) {
//    $SIZE_W = $_POST['Text16'];
//} else {
//    $SIZE_W = "0";
//}
////echo $SIZE_W . "<br />";
//
//// 返送先　郵便番号
//if (isset($_POST['Text17'])) {
//    $R_ZIPCODE = $_POST['Text17'];
//} else {
//    $R_ZIPCODE = "";
//}
////	echo $R_ZIPCODE."<br />";
//
//// 返送先　住所
//if (isset($_POST['Text18'])) {
//    $R_ADDR = $_POST['Text18'];
//} else {
//    $R_ADDR = "";
//}
////echo $R_ADDR . "<br />";
//
//// 返送先　電話番号
//if (isset($_POST['Text19'])) {
//    $R_TEL = $_POST['Text19'];
//} else {
//    $R_TEL = "";
//}
////echo $R_TEL . "<br />";
//
//// 返送先　宛先
//if (isset($_POST['Text20'])) {
//    $R_NAME = $_POST['Text20'];
//} else {
//    $R_NAME = "";
//}
////echo $R_NAME . "<br />";
//
////echo $file['name']."<br />";
//// 画像


if (isset($_POST['kubun'])) {
    $KUBUN = $_POST['kubun'];
} else {
    $KUBUN = "RA";
}
// $mnt_flg 0:新規作成
if (isset($_POST['mnt_flg']) && is_numeric($_POST['mnt_flg'])) {
    $mnt_flg = $_POST['mnt_flg'] + 0;
} else {
    $mnt_flg = 0;
}

// 作品番号
if (isset($_POST['rowid'])) {
    $ROWID = $_POST['rowid'];
} else {
    $ROWID = "";
}

//
if (isset($_POST['INS_DATE'])) {
    $INS_DATE = $_POST['INS_DATE'];
} else {
    $INS_DATE = "";
}

// 作品文字
if (isset($_POST['TANKA_INFO'])) {
    $sakuhin = $_POST['TANKA_INFO'];
} else {
    $sakuhin = "";
}

// 作品コメント
if (isset($_POST['COMMENT'])) {
    $comment = $_POST['COMMENT'];
} else {
    $comment = "";
}

// 部門
if (isset($_POST['BM_CODE'])) {
    $BM_CODE = $_POST['BM_CODE'];
} else {
    $BM_CODE = "";
}

// 区分
if (isset($_POST['KBN_CODE'])) {
    $KBN_CODE = $_POST['KBN_CODE'];
} else {
    $KBN_CODE = "";
}

// 支部名
if (isset($_POST['DIV_NAME'])) {
    $DIV_NAME = $_POST['DIV_NAME'];
} else {
    $DIV_NAME = "";
}
//	echo $DIV_NAME."<br />";

// 名前
if (isset($_POST['USR_NAME'])) {
    $USR_NAME = $_POST['USR_NAME'];
} else {
    $USR_NAME = "";
}

if (isset($_POST['USR_NAME_F'])) {
    $USR_NAME_F = $_POST['USR_NAME_F'];
} else {
    $USR_NAME_F = "";
}

if (isset($_POST['USR_MEMBER_NAME'])) {
    $USR_MEMBER_NAME = $_POST['USR_MEMBER_NAME'];
} else {
    $USR_MEMBER_NAME = "";
}

//echo $USR_NAME . "<br />";

// 作品タイトル
if (isset($_POST['TITLE'])) {
    $TITLE = $_POST['TITLE'];
} else {
    $TITLE = "";
}
//echo $TITLE . "<br />";

// 作品サイズ縦
if (isset($_POST['SIZE_L'])) {
    $SIZE_L = $_POST['SIZE_L'];
} else {
    $SIZE_L = "0";
}
//echo $SIZE_L . "<br />";

// 作品サイズ横
if (isset($_POST['SIZE_B'])) {
    $SIZE_B = $_POST['SIZE_B'];
} else {
    $SIZE_B = "0";
}
//echo $SIZE_B . "<br />";

// 作品サイズ幅
if (isset($_POST['SIZE_W'])) {
    $SIZE_W = $_POST['SIZE_W'];
} else {
    $SIZE_W = "0";
}

// 作品サイズ幅
if (isset($_POST['WEIGHT'])) {
    $WEIGHT = $_POST['WEIGHT'];
} else {
    $WEIGHT = "0";
}

// 返送先　郵便番号
if (isset($_POST['R_ZIPCODE'])) {
    $R_ZIPCODE = $_POST['R_ZIPCODE'];
} else {
    $R_ZIPCODE = "";
}
//	echo $R_ZIPCODE."<br />";

// 返送先　住所
if (isset($_POST['R_Addr'])) {
    $R_ADDR = $_POST['R_Addr'];
} else {
    $R_ADDR = "";
}
//echo $R_ADDR . "<br />";

// 返送先　電話番号
if (isset($_POST['R_TEL'])) {
    $R_TEL = $_POST['R_TEL'];
} else {
    $R_TEL = "";
}
//echo $R_TEL . "<br />";

// 返送先　宛先
if (isset($_POST['R_NAME'])) {
    $R_NAME = $_POST['R_NAME'];
} else {
    $R_NAME = "";
}

// 返送先　宛先
if (isset($_POST['AGE_KBN'])) {
    $AGE_KBN = $_POST['AGE_KBN'];
} else {
    $AGE_KBN = "";
}

// 返送先　宛先
if (isset($_POST['PAR_KBN'])) {
    $PAR_KBN = $_POST['PAR_KBN'];
} else {
    $PAR_KBN = "";
}

//echo $R_NAME . "<br />";

//echo $file['name']."<br />";
// 画像

$file = $_FILES['FILE_PATH'];


//Log Create
function createLog($msg = "", $type = "DEBUG")
{
    $file = "/var/www/html/public/log/import_video_" . date('Ymd', time()) . ".log";
    $msg = '[' . date('Y-m-d h:m:s', time()) . '][' . $type . '] ' . $msg . "\r\n";
    $logged = error_log($msg, 3, $file);
    if ($logged) {
        return $file;
    } else {
        return "";
    }
}

//***************************************************************************
function generateThumnail($video = "", $image = "")
{
    $ffmpeg = '/var/www/html/public/mnt/ffmpeg/bin/ffmpeg.exe';
    //screenshot size
    $size = '160x160';
    //ffmpeg command
    // $cmd = "$ffmpeg -i $video -deinterlace -an -ss $Timecode -f mjpeg -t 1 -r 1 -y -s $size $image 2>&1";
    // $return = `$cmd`;
}

//***************************************************************************
//If user choose upload video
/**
 *[UPLOAD]
 *Upload VIDEO file
 */
$log_file = createLog('UPLOAD [' . $KBN_CODE . " - " . $file['name'] . ']', 'DEBUG');

if ($KBN_CODE == "FF06") {
    if (isset($file['error']) && is_int($file['error'])) {

        try {

            // $file['error'] の値を確認
            switch ($file['error']) {
                case UPLOAD_ERR_OK: // OK
                    $log_file = createLog('Upload ERROR [' . $file['error'] . ']', 'ERROR');
                    break;
                case UPLOAD_ERR_NO_FILE:   // ファイル未選択
                    $log_file = createLog('No File Input [' . $file['error'] . ']', 'ERROR');

//					throw new RuntimeException('ファイルが選択されていません');
                    $f_flg = 1;
                    break;
                case UPLOAD_ERR_INI_SIZE:  // php.ini定義の最大サイズ超過
                    $log_file = createLog('File Size Error [' . $file['error'] . ']', 'ERROR');
                case UPLOAD_ERR_FORM_SIZE: // フォーム定義の最大サイズ超過
                    $log_file = createLog('File Size Too Big [' . $file['error'] . ']', 'ERROR');
                    throw new RuntimeException('ファイルサイズが大きすぎます');

                default:
                    $log_file = createLog('Reason undefined [' . $file['error'] . ']', 'ERROR');
                    throw new RuntimeException('その他のエラーが発生しました');
            }

            $name = $file['name'];
            $target_dir = "/var/www/html/public/mnt/uploads/";
            $target_file = $target_dir . $file["name"];
            // $file['mime']の値はブラウザ側で偽装可能なので、MIMEタイプを自前でチェックする
            $type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            //echo "type ".$type;

            // Valid file extensions
            $extensions_arr = array("mp4", "avi", "3gp", "mov", "mpeg");

            //if (!in_array($type, [IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG], true)) {
            if (!in_array($type, $extensions_arr, true)) {
                $log_file = createLog('Wrong File Type (' . $type . ')', 'ERROR');
                throw new RuntimeException('画像形式が未対応です');
            }

            // ファイルデータからSHA-1ハッシュを取ってファイル名を決定し、ファイルを保存する
            $f_nm = $name;
            $path = $target_file;
            echo $path . " ";
            echo $f_nm;
            $f_type = $type;
            if (!move_uploaded_file($file['tmp_name'], $path)) {
                $log_file = createLog('Error saving file: ' . $path, 'ERROR');
                throw new RuntimeException('ファイル保存時にエラーが発生しました');
            } else {
                $log_file = createLog('Upload Successful [' . $path . '] [' . $f_nm . '] [' . $type . ']', 'DEBUG');
            }
            chmod($path, 0666);
            //generateThumnail($path,"/var/www/html/public/mnt/uploads/Videos/Thumbnails"$name);

        } catch (RuntimeException $e) {
//			$msg_file = ['red', $e->getMessage()];
            $f_flg = 1;
        }

    }
} /**
 *[UPLOAD]
 *Upload AUDIO file
 */
elseif ($KBN_CODE == "FF05") {

    if (isset($file['error']) && is_int($file['error'])) {
        try {

            // $file['error'] の値を確認
            switch ($file['error']) {
                case UPLOAD_ERR_OK: // OK
                    $log_file = createLog('Upload ERROR [' . $file['error'] . ']', 'ERROR');
                    break;
                case UPLOAD_ERR_NO_FILE:   // ファイル未選択
                    $log_file = createLog('No File Input [' . $file['error'] . ']', 'ERROR');

//					throw new RuntimeException('ファイルが選択されていません');
                    $f_flg = 1;
                    break;
                case UPLOAD_ERR_INI_SIZE:  // php.ini定義の最大サイズ超過
                    $log_file = createLog('File Size Error [' . $file['size'] . ']', 'ERROR');
                case UPLOAD_ERR_FORM_SIZE: // フォーム定義の最大サイズ超過
                    $log_file = createLog('File Size Too Big [' . $file['size'] . ']', 'ERROR');
                    throw new RuntimeException('ファイルサイズが大きすぎます');

                default:
                    $log_file = createLog('Reason undefined [' . $file['error'] . ']', 'ERROR');
                    throw new RuntimeException('その他のエラーが発生しました');
            }

            $name = $file['name'];

            echo "name: " . $name . "<br />";
            $target_dir = "/var/www/html/public/mnt/uploads/";
            $target_file = $target_dir . $file["name"];
            // $file['mime']の値はブラウザ側で偽装可能なので、MIMEタイプを自前でチェックする
            $type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            echo "type " . $type;

            // Valid file extensions
            $extensions_arr = array("mp3", "ogg", "flac");

            //if (!in_array($type, [IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG], true)) {
            if (!in_array($type, $extensions_arr, true)) {
                $log_file = createLog('Wrong File Type (' . $type . ')', 'ERROR');
                throw new RuntimeException('画像形式が未対応です');
            }

            // ファイルデータからSHA-1ハッシュを取ってファイル名を決定し、ファイルを保存する
            $f_nm = $name;
            $path = $target_file;
            echo $path . " ";
            echo $f_nm;
            $f_type = $type;
            if (!move_uploaded_file($file['tmp_name'], $path)) {
                $log_file = createLog('Error saving file: ' . $path, 'ERROR');
                throw new RuntimeException('ファイル保存時にエラーが発生しました');
            } else {
                $log_file = createLog('Upload Successful [' . $path . '] [' . $f_nm . '] [' . $type . ']', 'DEBUG');
            }
            chmod($path, 0666);
            //generateThumnail($path,"/var/www/html/public/mnt/uploads/Videos/Thumbnails"$name);

        } catch (RuntimeException $e) {
//			$msg_file = ['red', $e->getMessage()];
            $f_flg = 1;
        }

    }
}
//UPLOAD IMAGE
//If user choose upload image
else {

    if (isset($file['error']) && is_int($file['error'])) {

        try {

            // $file['error'] の値を確認
            switch ($file['error']) {
                case UPLOAD_ERR_OK: // OK
                    break;
                case UPLOAD_ERR_NO_FILE:   // ファイル未選択
//					throw new RuntimeException('ファイルが選択されていません');
                    $f_flg = 1;
                    break;
                case UPLOAD_ERR_INI_SIZE:  // php.ini定義の最大サイズ超過
                case UPLOAD_ERR_FORM_SIZE: // フォーム定義の最大サイズ超過
                    throw new RuntimeException('ファイルサイズが大きすぎます');
                default:
                    throw new RuntimeException('その他のエラーが発生しました');
            }

            // $file['mime']の値はブラウザ側で偽装可能なので、MIMEタイプを自前でチェックする
            $type = @exif_imagetype($file['tmp_name']);
            echo $type;
//			if (!in_array($type, [IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG], true)) {
            if (!in_array($type, array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG), true)) {
                throw new RuntimeException('画像形式が未対応です');
            }

            // ファイルデータからSHA-1ハッシュを取ってファイル名を決定し、ファイルを保存する
            $f_nm = sprintf('%s%s', sha1_file($file['tmp_name']), image_type_to_extension($type));

            $path = sprintf('./uploads/Image/%s%s', sha1_file($file['tmp_name']), image_type_to_extension($type));


            $f_type = image_type_to_extension($type);
            if (!move_uploaded_file($file['tmp_name'], $path)) {

                throw new RuntimeException('ファイル保存時にエラーが発生しました');
            }
            chmod($path, 0666);


        } catch (RuntimeException $e) {
//			$msg_file = ['red', $e->getMessage()];
            $f_flg = 1;
        }

    }
}

if (($file['error'] == UPLOAD_ERR_NO_FILE) && (trim($sakuhin) == "")) {
    echo "作品が登録されていません。";
    $msg = "作品が登録されていません。";
}

$f_path = dirname(__FILE__) . "/uploads/";
$reviewPath = "/mnt/uploads/" . $f_nm;
echo $reviewPath;

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <?php if ($KUBUN == "RA") { ?>
        <title>らくらくエントリーの部　登録用</title>
    <?php } else { ?>
        <title>力作じまんの部　登録用</title>
    <?php } ?>
    <!--CSSファイルのみ -->
    <link rel="stylesheet" href="./lightbox281/css/lightbox.css" type="text/css" media="screen"/>
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
    </style>
</head>
<body>

<form method="post" enctype="multipart/form-data" name="form1">
    <?php if ($KUBUN == "RA") { ?>
        <h2>作品登録　『らくらくエントリーの部』</h2>
    <?php } else { ?>
        <h2>作品登録　『力作じまんの部』</h2>
    <?php } ?>
    <!-- ============================================================= -->
    <hr/>

    <table border="2">
        <!-- ============================================================= -->
        <?php if ($KUBUN == "RA") { ?>

            <tr>
                <th>申込日:</th>
                <td>
                    <?php echo($INS_DATE['year'].'年'.$INS_DATE['month'].'月'.$INS_DATE['day'].'日'); ?>
                </td>
            </tr>

            <tr>
                <th>組合：</th>
                <td>
                    <?php if (trim($DIV_NAME) == "") { ?>
                        <span style="color:red;">必須項目です。入力ください</span>
                        <?php $err_cnt = $err_cnt + 1; ?>
                    <?php } else { ?>
                        <?= htmlspecialchars($DIV_NAME) ?>
                        <input name="DIV_NAME" type="hidden" value="<?= htmlspecialchars($DIV_NAME) ?>"/>
                    <?php } ?>
                </td>
            </tr>

            <tr>
                <th>申込者（作者）氏名：</th>
                <td>
                    <?php if (trim($USR_NAME) == "") { ?>
                        <span style="color:red;">必須項目です。入力ください</span>
                        <?php $err_cnt = $err_cnt + 1; ?>
                    <?php } else { ?>
                        <?= htmlspecialchars($USR_NAME) ?>
                        <input name="USR_NAME" type="hidden" value="<?= htmlspecialchars($USR_NAME) ?>"/>
                    <?php } ?>
                </td>
            </tr>

            <tr>
                <th>申込者（作者）氏名（ふりがな）：</th>
                <td>
                    <?php if (trim($USR_NAME_F) == "") { ?>
                        <span style="color:red;">必須項目です。入力ください</span>
                        <?php $err_cnt = $err_cnt + 1; ?>
                    <?php } else { ?>
                        <?= htmlspecialchars($USR_NAME_F) ?>
                        <input name="USR_NAME_F" type="hidden" value="<?= htmlspecialchars($USR_NAME_F) ?>"/>
                    <?php } ?>
                </td>
            </tr>

            <tr>
                <th>組合員氏名:</th>
                <td>
                    <?php if (trim($USR_MEMBER_NAME) == "" && trim($USR_NAME) != "") { ?>
                        <span style="color:red;">必須項目です。入力ください</span>
                        <?php $err_cnt = $err_cnt + 1; ?>
                    <?php } else { ?>
                        <?= htmlspecialchars($USR_MEMBER_NAME) ?>
                        <input name="USR_MEMBER_NAME" type="hidden" value="<?= htmlspecialchars($USR_MEMBER_NAME) ?>"/>
                    <?php } ?>
                </td>
            </tr>

            <tr>
                <th>参加区分　※応募時：</th>
                <td>
                    <?php if (trim($PAR_KBN) == "") { ?>
                        <span style="color:red;">必須項目です。入力ください</span>
                        <?php $err_cnt = $err_cnt + 1; ?>
                    <?php } else { ?>
                        <?= htmlspecialchars($PAR_KBN) ?>
                        <input name="PAR_KBN" type="hidden" value="<?= htmlspecialchars($PAR_KBN) ?>"/>
                    <?php } ?>
                </td>
            </tr>

            <tr>
                <th>年齢区分　※応募時：</th>
                <td>
                    <?php if (trim($AGE_KBN) == "") { ?>
                        <span style="color:red;">必須項目です。入力ください</span>
                        <?php $err_cnt = $err_cnt + 1; ?>
                    <?php } else { ?>
                        <?= htmlspecialchars($AGE_KBN) ?>
                        <input name="AGE_KBN" type="hidden" value="<?= htmlspecialchars($AGE_KBN) ?>"/>
                    <?php } ?>
                </td>
            </tr>

            <tr>
                <th>部門：</th>
                <td>
                    <?php
                    switch ($BM_CODE) {
                        case 'EE01':
                            $str_bumon = 'エキスパート';
                            break;
                        case 'EE02':
                            $str_bumon = 'キッズ';
                            break;
                        case 'EE03':
                            $str_bumon = 'エンジョイ';
                            break;
                        default:
                            $BM_CODE = '';
                            $str_bumon = '---';
                    }
                    ?>
                    <?= $str_bumon ?>
                    <input type="hidden" name="BM_CODE" value="<?= $BM_CODE ?>">
                </td>
            </tr>

            <tr>
                <th>カテゴリー：</th>
                <td>
                    <?php
                    switch ($KBN_CODE) {
                        case 'FF01':
                            $str_kbn = '絵画';
                            break;
                        case 'FF02':
                            $str_kbn = '書道';
                            break;
                        case 'FF03':
                            $str_kbn = '写真';
                            break;
                        case 'FF04':
                            $str_kbn = '手芸・工芸';
                            break;
                        case 'FF05':
                            $str_kbn = '音楽';
                            break;
                        case 'FF06':
                            $str_kbn = '動画';
                            break;
                        case 'FF07':
                            $str_kbn = '絵';
                            break;
                        default:
                            $KBN_CODE = '';
                            $str_kbn = '---';
                    }
                    ?>
                    <?= $str_kbn ?>
                    <input type="hidden" name="BM_CODE" value="<?= $KBN_CODE ?>">
                </td>
            </tr>

            <tr>
                <th>作品：</th>
                <td>
                    <?php if (isset($f_flg) && trim($sakuhin) == "") { ?>
                        <span style="color:red;">作品が登録されていません</span>
                        <?php $err_cnt = $err_cnt + 1; ?>
                    <?php } else { ?>
                        <?php if (!isset($f_flg)) { ?>
                            <legend>画像ファイル</legend>
                            <a href="<?= $reviewPath ?>" rel="lightbox" title="my caption">
                                <?php if ($KBN_CODE == "FF06") { ?>
                                    <video id="videoPlayer"
                                           class="video-js vjs-default-skin vjs-big-play-centered w160 h160"
                                           controls
                                           preload="none"
                                           width="300"
                                           height="150"
                                           data-setup={}
                                    >
                                        <source src="<?= $reviewPath ?>" type="video/<?= $type ?>"/>
                                    </video>

                                <?php } else { ?>

                                    <img id="imgTEMP" src="<?= $reviewPath ?>" width="150" height="112" alt="" border=0>
                                <?php } ?>
                            </a>
                            <br/>
                            <br/>
                        <?php } ?>
                        <?php if (trim($sakuhin) != "") { ?>
                            <legend>川柳・俳句・短歌作品</legend>
                            <textarea name="TANKA_INFO" cols="50" rows="5" disabled><?= $sakuhin ?></textarea><br>
                        <?php } ?>
                    <?php } ?>
                </td>
            </tr>


            <tr>
                <th>作品タイトル：</th>
                <td>
                    <?php if (trim($TITLE) == "") { ?>
                        <span style="color:red;">作品タイトルが登録されていません</span>
                        <?php $err_cnt = $err_cnt + 1; ?>
                    <?php } else { ?>
                        <?= htmlspecialchars($TITLE) ?>
                        <input name="TITLE" type="hidden" value="<?= htmlspecialchars($TITLE) ?>"/>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <th>作品コメント：</th>
                <td>
                    <textarea name="COMMENT" cols="50" rows="5" disabled><?php if (trim($comment) != "") {
                            echo htmlspecialchars($comment);
                        } ?></textarea><br>
                </td>
            </tr>

            <!-- <tr>
                <th>名前：</th>
                <td>
                    <?php if (trim($USR_NAME) == "") { ?>
                        <span style="color:red;">名前が登録されていません</span>
                        <?php $err_cnt = $err_cnt + 1; ?>
                    <?php } else { ?>
                        <?= htmlspecialchars($USR_NAME) ?>
                    <?php } ?>
                    <input name="Text12" type="hidden" value="<?= htmlspecialchars($USR_NAME) ?>"/>
                </td>
            </tr> -->
            <tr>
                <th>額、表装を含めた作品サイズ</th>
                <td>
                    縦：
                    <?php if (preg_match('/^[0-9]*[.]*[0-9]*$/', $SIZE_L)) { ?>
                        <?= htmlspecialchars($SIZE_L) ?>　cm
                    <?php } else { ?>
                        <?= htmlspecialchars($SIZE_L) ?>　cm
                        <span style="color:red;">　　作品サイズは、整数で登録してください。</span>
                        <?php $err_cnt = $err_cnt + 1; ?>
                    <?php } ?>
                    <input name="SIZE_L" type="hidden" value="<?= $SIZE_L ?>"/>
                    <br/>
                    横：
                    <?php if (preg_match('/^[0-9]*[.]*[0-9]*$/', $SIZE_B)) { ?>
                        <?= htmlspecialchars($SIZE_B) ?>　cm
                    <?php } else { ?>
                        <?= htmlspecialchars($SIZE_B) ?>　cm
                        <span style="color:red;">　　作品サイズは、整数で登録してください。</span>
                        <?php $err_cnt = $err_cnt + 1; ?>
                    <?php } ?>
                    <input name="SIZE_B" type="hidden" value="<?= $SIZE_B ?>"/>
                    <br/>
                    幅・奥行き：
                    <?php if (preg_match('/^[0-9]*[.]*[0-9]*$/', $SIZE_W)) { ?>
                        <?= htmlspecialchars($SIZE_W) ?>　cm
                    <?php } else { ?>
                        <?= htmlspecialchars($SIZE_W) ?>　cm
                        <span style="color:red;">　　作品サイズは、整数で登録してください。</span>
                        <?php $err_cnt = $err_cnt + 1; ?>
                    <?php } ?>
                    <input name="SIZE_W" type="hidden" value="<?= $SIZE_W ?>"/>
                    <br/>
                    重量:
                    <?php if (preg_match('/^[0-9]*[.]*[0-9]*$/', $WEIGHT)) { ?>
                        <?= htmlspecialchars($WEIGHT) ?>　kg
                    <?php } else { ?>
                        <?= htmlspecialchars($WEIGHT) ?>　kg
                        <span style="color:red;">　　作品サイズは、整数で登録してください。</span>
                        <?php $err_cnt = $err_cnt + 1; ?>
                    <?php } ?>
                    <input name="WEIGHT" type="hidden" value="<?= $WEIGHT ?>"/>
                    <br/>
                </td>
            </tr>

            <tr>
                <th rowspan="4">返送先：</th>
                <td>郵便番号:
                    <?php if (preg_match('/^[0-9]{3}-?[0-9]{4}$/', $R_ZIPCODE) || (RTrim($R_ZIPCODE) == "")) { ?>
                        <?= htmlspecialchars($R_ZIPCODE) ?>
                    <?php } else { ?>
                        <?= htmlspecialchars($R_ZIPCODE) ?>
                        <span style="color:red;">　　郵便番号は、xxx-xxxxで登録してください。</span>
                        <?php $err_cnt = $err_cnt + 1; ?>
                    <?php } ?>
                    <input name="R_ZIPCODE" type="hidden" value="<?= $R_ZIPCODE ?>"/>
                </td>
            </tr>

            <tr>
                <td>住所:
                    <?= htmlspecialchars($R_ADDR) ?>
                    <input name="R_ADDR" type="hidden" value="<?= $R_ADDR ?>"/>
                </td>
            </tr>

            <tr>
                <td> 氏名:
                    <?= htmlspecialchars($R_NAME) ?>
                    <input name="R_NAME" type="hidden" value="<?= $R_NAME ?>"/>
                </td>
            </tr>

            <tr>
                <td>電話番号:
                    <?php if (preg_match('/^[0-9]{2,4}-?[0-9]{2,4}-?[0-9]{3,4}$/', $R_TEL) || (RTRIM($R_TEL) == "")) { ?>
                        <?= htmlspecialchars($R_TEL) ?>
                    <?php } else { ?>
                        <?= htmlspecialchars($R_TEL) ?>
                        <span style="color:red;">　　電話番号を、正しく登録してください。</span>
                        <?php $err_cnt = $err_cnt + 1; ?>
                    <?php } ?>
                    <input name="R_TEL" type="hidden" value="<?= $R_TEL ?>"/>
                </td>
            </tr>
            
            <input type="hidden" name="TextArea1" value=""/>
            <input name="Text13" type="hidden" value=""/>
            <input name="Text14" type="hidden" value=""/>
            <input name="Text15" type="hidden" value=""/>
            <input name="Text16" type="hidden" value=""/>
            <input name="Text17" type="hidden" value=""/>
            <input name="Text18" type="hidden" value=""/>
            <input name="Text19" type="hidden" value=""/>
            <input name="Text20" type="hidden" value=""/>

                        
            <input name="INS_DATE" type="hidden" value="<?php echo(date("Y-m-d",strtotime($INS_DATE['year']."-".$INS_DATE['month']."-".$INS_DATE['day'])));?>">

        <?php } ?>
        <!-- ============================================================= -->
    </table>
    
    <p><input id="Button3" type="button" value="修正する"/></p>

    <?php if ($err_cnt == 0) { ?>
        <p><input id="Button2" type="button" value="登録する"/></p>
        <!-- <p><input id="Button3" type="button" value="修正する"/></p> -->
    <?php } ?>
    <input type="hidden" name="mnt_flg" value="<?= $mnt_flg ?>"/>
    <input type="hidden" name="kubun" value="<?= $KUBUN ?>"/>
    <input type="hidden" name="f_path" value="<?= htmlspecialchars($f_path) ?>"/>
    <input type="hidden" name="f_name" value="<?= htmlspecialchars($f_nm) ?>"/>
    <input type="hidden" name="f_type" value="<?= htmlspecialchars($f_type) ?>"/>
    <input type="hidden" name="rowid" value="<?= $ROWID ?>"/>
    <!-- ============================================================= -->
</form>
<iframe name="MNTframe" width="0" height="0" frameborder="0" sandbox="allow-forms allow-scripts allow-top-navigation">
    お使いのブラウザはインライン フレームをサポートしていないか、またはインライン フレームを表示しないように設定されています。
</iframe>

<script src="./js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="./lightbox281/js/lightbox.js"></script>

<script type="text/javascript">
    $(function () {
        $("#Button2").bind("click", function () {
            if (document.form1.TextArea1) {
                document.form1.TextArea1.disabled = false;
            }
            if (document.form1.TextArea2) {
                document.form1.TextArea2.disabled = false;
            }
            document.form1.action = "./mnt1.php";
            document.form1.target = "MNTframe";
            document.form1.submit();
        });

        $("#Button3").bind("click", function () {
            alert("画像ファイルは、再登録してください。");
            if (document.form1.TextArea1) {
                document.form1.TextArea1.disabled = false;
            }
            if (document.form1.TextArea2) {
                document.form1.TextArea2.disabled = false;
            }

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

