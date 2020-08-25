<?
$error_msgs = [];
validates();

// var_dump($error_msgs);
if (count($error_msgs) > 0) {
    // return error
    // var_dump("input error");
    $res_data = ['errors' => $error_msgs];
    http_response_code(400);
    echo (json_encode($res_data));
    exit;

} else {
    //正常処理
    var_dump("input success");

}

###########################
######## Functions ########
###########################

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
