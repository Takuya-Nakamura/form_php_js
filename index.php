<?
$csrf_token = "ランダムな文字列";
$_SESSION['csrf_token'] = $csrf_token;
?>


<html>

<head>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/app.css">

    <script src="/js/jquery.min.js"></script>
</head>

<body>

    <main class="main">
        <div class="logo"></div>
        <div class="title">
            <h1>クイズフォーム</h1>
        </div>
        <div class="description">あいうえかきくけこあいうえかきくけこあいうえかきくけこあいうえかきくけこあいうえかきくけこあいうえかきくけこあいうえかきくけこあいうえかきくけこあいうえかきくけこあいうえかきくけこあいうえかきくけこあいうえかきくけこあいうえかきくけこあいうえかきくけこあいうえかきくけこ</div>

        <div class="form">

            <form action="POST">
                <div class="form-item">
                    <label class="form-label">設問1<span class="require">(必須)</span></label>
                    <p class="question">ダミーダミーダミーダミーダミーダミーダミー</p>
                    <span class="form-radio-wrap"><input type="radio" name="question1" id="question1-1" value="1" /> <label for="question1-1">回答1</label></span>
                    <span class="form-radio-wrap"><input type="radio" name="question1" id="question1-2" value="2" /> <label for="question1-2">回答2</label></span>
                    <span class="form-radio-wrap"><input type="radio" name="question1" id="question1-3" value="3" /> <label for="question1-3">回答3</label></span>
                </div>

                <div class="form-item">
                    <label class="form-label">設問2<span class="require">(必須)</span></label>
                    <p class="question">ダミーダミーダミーダミーダミーダミーダミー</p>
                    <span class="form-radio-wrap"><input type="radio" name="question2" id="question2-1" value="1" /> <label for="question2-1">回答1</label></span>
                    <span class="form-radio-wrap"><input type="radio" name="question2" id="question2-2" value="2" /> <label for="question2-2">回答2</label></span>
                    <span class="form-radio-wrap"><input type="radio" name="question2" id="question2-3" value="3" /> <label for="question2-3">回答3</label></span>
                </div>

                <div class="form-item">
                    <label class="form-label">設問3<span class="require">(必須)</span></label>
                    <p class="question">ダミーダミーダミーダミーダミーダミーダミー</p>
                    <span class="form-radio-wrap"><input type="radio" name="question3" id="question3-1" value="1" /> <label for="question3-1">回答1</label></span>
                    <span class="form-radio-wrap"><input type="radio" name="question3" id="question3-2" value="2" /> <label for="question3-2">回答2</label></span>
                    <span class="form-radio-wrap"><input type="radio" name="question3" id="question3-3" value="3" /> <label for="question3-3">回答3</label></span>
                </div>


                <div class="form-item">
                    <label class="form-label">お名前<span class="require">(必須)</span></label>
                    <input class="form-input" type="text" name='name' require>
                </div>

                <div class="form-item">
                    <label class="form-label">電話番号<span class="require">(必須)</span></label>
                    <input class="form-input" type='tel' name='tel' require>
                </div>

                <div class="form-item">
                    <label class="form-label">メールアドレス<span class="require">(必須)</span></label>
                    <input class="form-input" type="email" name='email' require>
                </div>

                <button class="btn" id="submit">ボタン</button>
            </form>
        </div>
    </main>


    <script>
        // event
        // onload
        $(function() {
            // var res = confirm("本祭とは医療関係者のみが閲覧出来ます。医療関係者の方はOKを押してください。それ以外の方はキャンセルをしてください。")
            // if (!res) location.href = "https://www.yahoo.co.jp/"

        });

        // onSubmit
        $("#submit").click(function() {
            //入力チェック&送信&メッセージ送信
            var data = getFormData()
            if (checkFormData(data)) post(data)
            return false;
        })
    </script>

    <script>
        // functions
        function post(data) {
            console.log("post")
            var hostUrl = '/post.php';
            var param1 = 1;
            var param2 = 10;

            $.ajax({
                url: hostUrl,
                type: 'POST',
                dataType: 'text',
                // dataType: 'json',
                data: data,
            }).done(function(data) {
                console.log("ok");
                console.log(data)
                clearForm()
                alert("ご応募ありがとうございます。確認のメールを送信しました。")

            }).fail(function(error) {
                if (error.status == '400') {
                    var response = JSON.parse(error.responseText)
                    var msgText = "以下のエラーがありました。ご確認ください。\n"
                    response.errors.map((item) => {
                        msgText += item['message']+"\n"
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
            if (!data['question1']) messages.push("設問1")
            if (!data['question2']) messages.push("設問2")
            if (!data['question3']) messages.push("設問3")
            if (!data['name']) messages.push("名前")
            if (!data['tel']) messages.push("電話番号")
            if (!data['email']) messages.push("メールアドレス")

            if (messages.length > 0) {
                var text = "以下の項目が未入力です。ご確認ください。\n"
                text += messages.join('\n')
                alert(text)
            } else {
                return true
            }
        }

        function clearForm() {
            $("form")[0].reset()
        }
    </script>
</body>


</html>
