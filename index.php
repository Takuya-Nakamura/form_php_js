<?php
include './conf.php';

?>


<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,viewport-fit=cover">
    <title>入力画面</title>
    <link rel="shortcut icon" href="/images/favicon.ico">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/jquery.min.js"></script>
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-177047657-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-177047657-1');
    </script>


</head>

<body>

    <header class="header">
        <div class="header-logo">
            <img class="header-logo-image" src="/images/logo.png">
        </div>
    </header>

    <main class="main">
        <div class="title">
            <h1>第22回日本褥瘡学会学術集会 オンライン展示 特設サイト</h1>
        </div>
        <div class="key-image">
            <img src="./images/foot.jpg" alt="">
        </div>
        <div class="description">
            メンリッケヘルスケア株式会社の特設サイトへようこそ！<br><br>
            メンリッケヘルスケア株式会社では、弊社製品に関しますアンケートをご用意しております。<br><br>
            ご協力頂いた場合、ご希望の方には特製ロゴ入りトートバックをお送り致します。<br>
            （ご発送は9月末予定）
            <br><br><br>
            アンケートはこちらからどうぞ↓
        </div>

        <div class="form">

            <form method="post">


            <div class="form-item">
                    <label class="form-label">Q1:
                        褥瘡を管理するうえで最も重要と考える点は何ですか。
                    </label>

                    <?php $q = 'question1' ?>
                    <?php foreach ($question1 as $key => $val) : ?>
                        <?php $id = "{$q}-${key}" ?>
                        <div class="form-radio-wrap">
                            <input type="radio" name="<?php echo $q ?>" id="<?php echo $id ?>" value="<?php echo $key ?>" required />
                            <label for="<?php echo $id ?>"><?php echo $val ?></label>
                            
                        </div>
                    <?php endforeach; ?>                    
                    <input class="form-input hidden" type="text" name='control_other' placeholder=""その他の方は詳細のご記入をお願い致します。"">
                </div>

                <div class="form-item">
                    <label class="form-label">Q2:
                        皮膚保護を行う際に重視する点を教えてください。
                    </label>
                    <?php $q = 'question2' ?>
                    <?php foreach ($question2 as $key => $val) : ?>
                        <?php $id = "{$q}-${key}" ?>
                        <div class="form-radio-wrap">
                            <input type="radio" name="<?php echo $q ?>" id="<?php echo $id ?>" value="<?php echo $key ?>" required />
                            <label for="<?php echo $id ?>"><?php echo $val ?></label>
                        </div>
                    <?php endforeach; ?>
                    <input class="form-input hidden" type="text" name='protect_other' placeholder="その他の方は詳細のご記入をお願い致します">

                </div>


                <div class="form-item">
                    <label class="form-label">Q3:
                        メピレックスボーダーフレックスに使用しているドレッシング材の柔軟性を向上させる技術の名前は何ですか？
                    </label>
                    <?php $q = 'question3' ?>
                    <?php foreach ($question3 as $key => $val) : ?>
                        <?php $id = "{$q}-${key}" ?>
                        <div class="form-radio-wrap">
                            <input type="radio" name="<?php echo $q ?>" id="<?php echo $id ?>" value="<?php echo $key ?>" required />
                            <label for="<?php echo $id ?>"><?php echo $val ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="form-item">
                    <label class="form-label">Q4: 次の文のOOOOに入る語句を選んでください。</label>
                    <p class="question">[メピレックス ボーダー プロテクトは独自のOOOOによって、摩擦やずれを予防する皮膚保護パッドです。]</p>
                    <?php $q = 'question4' ?>
                    <?php foreach ($question4 as $key => $val) : ?>
                        <?php $id = "{$q}-${key}" ?>
                        <div class="form-radio-wrap">
                            <input type="radio" name="<?php echo $q ?>" id="<?php echo $id ?>" value="<?php echo $key ?>" required />
                            <label for="<?php echo $id ?>"><?php echo $val ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="form-item">
                    <label class="form-label">Q5: メンリッケヘルスケアでは、新しく創傷治療に携わる医療従事者のみなさまを対象としたエデュケーションサイトをオープンさせました。このエデュケーションサイトの名前は？ </label>
                    <?php $q = 'question5' ?>
                    <?php foreach ($question5 as $key => $val) : ?>
                        <?php $id = "{$q}-${key}" ?>
                        <div class="form-radio-wrap">
                            <input type="radio" name="<?php echo $q ?>" id="<?php echo $id ?>" value="<?php echo $key ?>" required />
                            <label for="<?php echo $id ?>"><?php echo $val ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>


                <div class="description">

                    ご協力ありがとうございました。<br><br><br>
                    <div class="key-image">
                        <img src="./images/man.jpg" alt="">
                    </div>

                    特製ロゴ入りトートバッグをご希望の方は、下記にご入力お願い致します。<br>（＊は必須項目です）

                </div>

                <div class="form-item">
                    <label class="form-label">お名前<span class="require">＊</span></label>
                    <input class="form-input" type="text" name='name' required placeholder="お名前＊">
                </div>

                <div class="form-item">
                    <label class="form-label">電子メール<span class="require">＊</span></label>
                    <input class="form-input" type="email" name='email' required placeholder="電子メール＊">
                </div>

                <div class="form-item">
                    <label class="form-label">ご職業<span class="require">＊</span></label>
                    <select name="jobs" class='form-select' placeholder="選択してください" required>
                        <?php foreach ($jobs as $key => $val) : ?>
                            <option value="<?php echo $key ?>"><?php echo $val ?></option>
                        <?php endforeach; ?>
                    </select>

                    <input class="form-input hidden" type="text" name='job_other' placeholder="その他の方は詳細のご記入をお願い致します＊">

                </div>


                <div class="form-item">
                    <label class="form-label">ご住所<span class="require">＊</span></label>
                    <input class="form-input" type='text' maxlength="7" name='zip-code' required placeholder="郵便番号(数字のみでご入力ください)＊" onKeyUp="AjaxZip3.zip2addr(this,'','prefecture','city');">


                    <input class="form-input" type='text' name='prefecture' required placeholder="都道府県＊">
                    <input class="form-input" type='text' name='city' required placeholder="市区町村＊">
                    <input class="form-input" type='text' name='address' required placeholder="番地＊">
                    <input class="form-input" type='text' name='facility' required placeholder="ご所属施設名＊">
                    <input class="form-input" type='text' name='department' required placeholder="ご所属（部門名、病棟など）＊">
                </div>

                <div class="form-item">

                    <label class="form-label">今後メンリッケヘルスケア株式会社からのセミナーや製品についてのご案内などをお受け取りになられることをご希望の場合は”はい”を選択して下さい。<span class="require">＊</span></label>

                    <div class="policy-wrapper">
                        <?php $name = 'notification' ?>
                        <?php foreach ($notification as $key => $val) : ?>
                            <?php $id = "$name-${key}" ?>
                            <span class="form-radio-wrap">
                                <input type="radio" name="<?php echo $name ?>" id="<?php echo $id ?>" value="<?php echo $key ?>" />
                                <label for="<?php echo $id ?>"><?php echo $val ?></label>
                            </span>
                        <?php endforeach; ?>
                    </div>
                    <p class="policy-note" id="submit-note">
                        いいえを選択された場合でも、特製ロゴ入りトートバッグ発送のご連絡のためにE-mailでご連絡申し上げる場合がございます。
                    </p>

                </div>

                <div class="form-item">
                    <div class="policy-wrapper">
                        <label class="form-label">Mölnlyckeの<a href="https://www.molnlycke.com/about-this-site/terms-of-use/" target="_blank">リーガル</a>と<a href="https://www.molnlycke.com/about-this-site/policies/" target="_blank">プライバシーポリシー</a>に同意致します。<span class="require">＊</span></label>　

                        <input type="checkbox" name="policy" id="policy" class="checkbox" value="1" required>
                        <p class="policy-note" id="submit-note">
                            Box 13080, Gamlestadvägen 3C, SE-40252 Göteborg, Sweden. Privacy Policy The Mölnlycke trademark, name and respective logo are registered globally to one or more of the Mölnlycke Health Care Group of Companies. © 2020 Mölnlycke Health Care AB. All rights reserved.
                        </p>
                        </p>
                    </div>
                </div>


                <input type='submit' class="btn" id="submit" value="送信" disabled></a>

                <p class="submit-note" id="submit-note">
                    ※プライバシーポリシーに同意いただかないと送信出来ません。 <br>
                    ※アンケートの回答のみご覧になりたい方は<a href="answer.php">こちら</a>
                </p>
                <div class="key-image">
                    <img src="./images/lady.jpg" alt="">
                </div>

            </form>


        </div>

    </main>

    <footer>
        <div class="footer-info">
            <p class="company">メンリッケヘルスケア株式会社</p>
            <p class="sub-text">東京都新宿区西新宿6-20-7</p>
            <p class="sub-text">コンシェリア西新宿タワーズウエスト</p>
            <p class="sub-text">TEL：03-6914-5004</p>
        </div>

        <div class="footer-logo">
            <img src="./images/logo2.png" alt="">
        </div>

    </footer>

    <script src="/js/app.js"></script>


</body>


</html>