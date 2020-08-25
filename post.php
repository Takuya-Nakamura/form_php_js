<?php
include './conf.php';

// mb_email
mb_language("Japanese");
mb_internal_encoding("UTF-8");

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
    send_mail_to_user();
    send_mail_to_corporate();
}

###########################
######## Functions ########
###########################


######## mail送信関連 ########

function send_mail_to_user(){
    $res = mb_send_mail(
        // $_POST['mail'],
        "nakamura0803@gmail.com",  // 送信先メールアドレス
        "【ご回答ありがとうございました】",
        create_body_user_mail(),
        "From: my-mail@example.com\r\n"
    );
    var_dump($res);
}

function create_body_user_mail(){
    global $question1,$question2,$question3;
    return <<<EOD
{$_POST['name']}様
ご応募ありがとうございました。
以下の内容でご回答いただきました。

設問1: {$question1[$_POST['question1']]}
設問2: {$question2[$_POST['question2']]}
設問3: {$question3[$_POST['question3']]}

以上

EOD;   
}

function send_mail_to_corporate(){
    $res = mb_send_mail(
        "nakamura0803+1@gmail.com",  // 送信先メールアドレス
        "【クイズへの回答がありました】",
        create_body_user_mail(),
        "From: my-mail@example.com\r\n"
    );
    var_dump($res);
}

function create_body_corporate_mail(){
    global $question1,$question2,$question3;
    return <<<EOD
以下の内容でクイズへの回答がありました。

設問1: {$question1[$_POST['question1']]}
設問2: {$question2[$_POST['question2']]}
設問3: {$question3[$_POST['question3']]}
名前: {$_POST['name']}
電話番号: {$_POST['tel']}    
メールアドレス: {$_POST['email']}

以上

EOD;   
}

######## validation関連 ########
function validates()
{
    question1Check();
    question2Check();
    question3Check();
    nameCheck();
    telCheck();
    emailCheck();
}

function question1Check()
{
    global $error_msgs;
    if (!$_POST['question1']) {
        $error_msgs[] = ["name" => "question1", "message" => "設問1が未回答です。"];
    }

}

function question2Check()
{
    global $error_msgs;
    if (!$_POST['question2']) {
        $error_msgs[] = ["name" => "question2", "message" => "設問2が未回答です。"];
    }
}

function question3Check()
{
    global $error_msgs;
    if (!$_POST['question3']) {
        $error_msgs[] = ["name" => "question3", "message" => "設問3が未回答です。"];
    }

}

function nameCheck()
{
    global $error_msgs;
    if (!$_POST['name']) {
        $error_msgs[] = ["name" => "name", "message" => "名前が未回答です。"];
    }

}
function telCheck()
{
    global $error_msgs;
    if (!$_POST['tel']) {
        $error_msgs[] = ["name" => "tel", "message" => "電話番号が未回答です。"];
    }

}

function emailCheck()
{
    global $error_msgs;
    if (!$_POST['email']) {
        $error_msgs[] = ["name" => "email", "message" => "メールアドレスが未回答です。"];
    }

}