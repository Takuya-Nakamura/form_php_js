<?php
if(empty($_POST)) exit;

include './conf.php';

// mb_email
mb_language("Japanese");
mb_internal_encoding("UTF-8");

$data =[];
$error_msgs = [];
validates();

if (count($error_msgs) > 0) {
    $res_data = ['errors' => $error_msgs];
    http_response_code(400);
    echo (json_encode($res_data));
    exit;

} else {
    //正常処理
    var_dump("input success"); 
    conv_post_data();
    save_to_csv();
    send_mail_to_user();
    send_mail_to_corporate();
}

###########################
######## Functions ########
###########################


function conv_post_data (){
    global $data, $question1, $question2, $question3, $jobs, $notification;
    $data['question1'] =  $question1[$_POST['question1']];
    $data['question2'] = $question2[$_POST['question2']];
    $data['question3'] = $question3[$_POST['question3']];
    $data['name'] = $_POST['name'];
    $data['email'] = $_POST['email'];
    $data['jobs'] = $jobs[$_POST['jobs']];
    $data['job_other'] = $_POST['job_other'];
    $data['zip-code'] = $_POST['zip-code'];
    $data['prefecture'] = $_POST['prefecture'];
    $data['city'] = $_POST['city'];
    $data['address'] = $_POST['address'];
    $data['facility'] = $_POST['facility'];
    $data['notification'] = $notification[$_POST['notification']];


}
######## mail送信関連 ########

function send_mail_to_user()
{
    global $data;
    $res = mb_send_mail(
        $data['email'],
        // "nakamura0803@gmail.com",  // 送信先メールアドレス
        "アンケートにご協力下さいましてありがとうございました",
        create_body_user_mail(),
        "From: no-reply@molnlycke.com\r\n"
    );
}

function create_body_user_mail()
{
    return <<<EOD
この度は、第22回日本褥瘡学会学術集会オンライン展示のアンケートにご協力下さいまして、ありがとうございます。

トートバッグをご希望頂いた皆様へのご発送は9月末を予定しております。

メンリッケヘルスケア株式会社
スタッフ一同

以上

EOD;
}

function send_mail_to_corporate()
{
    $res = mb_send_mail(
        "nakamura0803@gmail.com",  // 送信先メールアドレス
        "第22回日本褥瘡学会学術集会アンケート回答",
        create_body_corporate_mail(),
        "From: no-reply@molnlycke.com\r\n"
    );
}

function create_body_corporate_mail()
{
    global $data, $question1, $question2, $question3, $jobs, $notification;
    return <<<EOD
以下の内容でアンケート回答がありました。

Q1: {$data['question1']}
Q2: {$data['question2']}
Q3: {$data['question3']}
名前: {$data['name']}
電子メール: {$data['email']}
ご職業:{$data['jobs']}
その他詳細:{$data['job_other']}
郵便番号:{$data['zip-code']}
都道府県:{$data['prefecture']}
市区町村:{$data['city']}
番地:{$data['address']}
ご所蔵施設名:{$data['facility']}
通知の同意:{$data['notification']}

以上

EOD;
}


###############################
######## データ保存　　　 ########
###############################
function save_to_csv()  {
    global $data;
    $filename = './save/data.csv';
    $csv = [];
    foreach ($data as $value){
        $csv[] =$value;
    }

    $fp = fopen($filename, 'a');
    fputcsv($fp, $csv);
    fclose($fp);
}


###############################
######## validation関連 ########
###############################
function validates()
{
    question1Check();
    question2Check();
    question3Check();
    nameCheck();
    emailCheck();
    jobsCheck();
    zipCodeCheck();
    prefectureCheck();
    cityCheck();
    addressCheck();
    facilityCheck();
    notificationCheck();
    policyCheck();
}

function question1Check()
{
    global $error_msgs;
    if (!$_POST['question1']) {
        $error_msgs[] = ["name" => "question1", "message" => "Q1が未入力です。"];
    }
}

function question2Check()
{
    global $error_msgs;
    if (!$_POST['question2']) {
        $error_msgs[] = ["name" => "question2", "message" => "Q2が未入力です。"];
    }
}

function question3Check()
{
    global $error_msgs;
    if (!$_POST['question3']) {
        $error_msgs[] = ["name" => "question3", "message" => "Q3が未入力です。"];
    }
}

function nameCheck()
{
    global $error_msgs;
    if (!$_POST['name']) {
        $error_msgs[] = ["name" => "name", "message" => "名前が未入力です。"];
    }
}

function emailCheck()
{
    global $error_msgs;
    if (!$_POST['email']) {
        $error_msgs[] = ["name" => "email", "message" => "メールアドレスが未入力です。"];
    }
}

function jobsCheck()
{
    global $error_msgs;
    $key = "jobs";
    if (!$_POST[$key]) {
        $error_msgs[] = ["name" => $key, "message" => "職業が未入力です。"];
    }
}

function zipCodeCheck()
{
    global $error_msgs;
    $key = "zip-code";
    if (!$_POST[$key]) {
        $error_msgs[] = ["name" => $key, "message" => "郵便番号が未入力です。"];
    }
}

function prefectureCheck()
{
    global $error_msgs;
    $key = "prefecture";
    if (!$_POST[$key]) {
        $error_msgs[] = ["name" => $key, "message" => "都道府県が未入力です。"];
    }
}

function cityCheck()
{
    global $error_msgs;
    $key = "city";
    if (!$_POST[$key]) {
        $error_msgs[] = ["name" => $key, "message" => "市区町村が未入力です。"];
    }
}

function addressCheck()
{
    global $error_msgs;
    $key = "address";
    if (!$_POST[$key]) {
        $error_msgs[] = ["name" => $key, "message" => "番地が未入力です。"];
    }
}

function facilityCheck()
{
    global $error_msgs;
    $key = "facility";
    if (!$_POST[$key]) {
        $error_msgs[] = ["name" => $key, "message" => "ご所属施設名が未入力です。"];
    }
}


function notificationCheck()
{
    global $error_msgs;
    $key = "notification";
    if (!$_POST[$key]) {
        $error_msgs[] = ["name" => $key, "message" => "通知の承諾が未入力です。"];
    }
}

function policyCheck()
{
    global $error_msgs;
    $key = "policy";
    if (!$_POST[$key]) {
        $error_msgs[] = ["name" => $key, "message" => "プライバシーポリシーが未入力です。"];
    }
}
