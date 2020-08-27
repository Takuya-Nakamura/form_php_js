//////////////////////////////
// event
//////////////////////////////
$(function () {
    var res = confirm("本サイトは医療関係者のみが閲覧出来ます。医療関係者の方はOKを押してください。それ以外の方はキャンセルをしてください。")
    if (!res) location.href = "https://www.molnlycke.jp/"
});

$("#submit").click(function () {
    var data = getFormData()
    if (checkFormData(data)) post(data)
    return false;
})

$("#policy").change(function () {
    var val = $('#policy:checked').val();
    if (val) {
        //選択時
        $("#submit").prop("disabled", false)
    } else {
        //未選択時
        $("#submit").prop("disabled", true)
    }
})

$('select[name=jobs]').change(function () {
    console.log("change", $(this).val())
    if ($(this).val() == 7) {
        $('input[name=job_other]').fadeIn()
    } else {
        $('input[name=job_other]').fadeOut()
        $('input[name=job_other]').val("")
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
        data: data,
    }).done(function (data) {
        console.log("ok");
        console.log(data)
        clearForm()
        location.href = "/answer.php"

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
    data['email'] = $('input[name=email]').val()
    data['jobs'] = $('select[name=jobs]').val()
    data['job_other'] = $('input[name=job_other]').val()
    data['zip-code'] = $('input[name=zip-code]').val()
    data['prefecture'] = $('input[name=prefecture]').val()
    data['city'] = $('input[name=city]').val()
    data['address'] = $('input[name=address]').val()
    data['facility'] = $('input[name=facility]').val()
    data['notification'] = $('input[name=notification]:checked').val()
    data['policy'] = $('input[name=policy]:checked').val()
    console.log("data", data)
    return data

}

function checkFormData(data) {
    var messages = []
    if (!data['question1']) messages.push("Q1が未入力です")
    if (!data['question2']) messages.push("Q2が未入力です")
    if (!data['question3']) messages.push("Q3が未入力です")
    if (!data['name']) messages.push("名前が未入力です")
    if (!data['email']) messages.push("メールアドレスが未入力です")
    if (data['email'] && !chekckEmail(data['email'])) {
        messages.push("メールアドレスの形式が不正です")
    }
    if (!data['jobs']) messages.push("ご職業が未入力です")
    if (data['jobs'] == 7 && !data['job_other']) messages.push("その他ご職業詳細が未入力です")
    if (!data['zip-code']) messages.push("郵便番号が未入力です")
    if (!data['prefecture']) messages.push("都道府県が未入力です")
    if (!data['city']) messages.push("市区町村が未入力です")
    if (!data['address']) messages.push("番地が未入力です")
    if (!data['facility']) messages.push("ご所属施設名が未入力です")
    if (!data['notification']) messages.push("通知の希望が未選択です")
    if (!data['policy']) messages.push("プライバシーポリシーに同意してください。")

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