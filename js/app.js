//////////////////////////////
// event
//////////////////////////////
$(function () {
    // var res = confirm("本祭とは医療関係者のみが閲覧出来ます。医療関係者の方はOKを押してください。それ以外の方はキャンセルをしてください。")
    // if (!res) location.href = "https://www.yahoo.co.jp/"
});

$("#submit").click(function () {

    var data = getFormData()
    if (checkFormData(data)) post(data)
    return false;
})

$("#policy").change(function () {
    console.log("onChange")
    var val = $('#policy:checked').val();
    console.log("val", val)
    if (val) {
        //選択時
        console.log("選択時")
        $("#submit").prop("disabled", false)
    } else {
        //未選択時
        console.log("未選択")
        $("#submit").prop("disabled", true)
    }
})


//////////////////////////////
// functions
//////////////////////////////
function post(data) {
    console.log("post")
    var hostUrl = '/post.php';

    $.ajax({
        url: hostUrl,
        type: 'POST',
        dataType: 'text',
        // dataType: 'json',
        data: data,
    }).done(function (data) {
        console.log("ok");
        console.log(data)
        clearForm()
        alert("ご応募ありがとうございます。確認のメールを送信しました。")

    }).fail(function (error) {
        if (error.status == '400') {
            var response = JSON.parse(error.responseText)
            var msgText = "以下のエラーがありました。ご確認ください。\n"
            response.errors.map((item) => {
                msgText += item['message'] + "\n"
            })
            alert(msgText)
        } else {
            alert("エラーが発生しました。時間をおいて再度お試しください。それでも発生する場合は下記にご連絡ください。")
        }
    })
}

function getFormData() {
    var data = {}
    data['question1'] = $('input[name=question1]:checked').val()
    data['question2'] = $('input[name=question2]:checked').val()
    data['question3'] = $('input[name=question3]:checked').val()
    data['name'] = $('input[name=name]').val()
    data['tel'] = $('input[name=tel]').val()
    data['email'] = $('input[name=email]').val()
    return data

}

function checkFormData(data) {
    var messages = []
    if (!data['question1']) messages.push("設問1が未入力です")
    if (!data['question2']) messages.push("設問2が未入力です")
    if (!data['question3']) messages.push("設問3が未入力です")
    if (!data['name']) messages.push("名前が未入力です")
    if (!data['tel']) messages.push("電話番号が未入力です")
    if (!data['email']) messages.push("メールアドレスが未入力です")
    if (data['email'] && !chekckEmail(data['email'])) {
        messages.push("メールアドレスの形式が不正です")
    }

    console.log("2")
    //メッセージ表示確認
    if (messages.length > 0) {
        var text = "以下のエラーがあります。ご確認ください。\n"
        text += messages.join('\n')
        alert(text)
    } else {
        return true
    }
}

function chekckEmail(email) {
    console.log("chekckEmail")
    var reg = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/;
    return reg.test(email)
}

function clearForm() {
    $("form")[0].reset()
}