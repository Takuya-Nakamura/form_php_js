<?php
include './conf.php';

?>


<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,viewport-fit=cover">
    <title>コンタクトフォーム</title>
    <link rel="shortcut icon" href="/images/favicon.ico">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/jquery.min.js"></script>
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>

</head>

<body>

    <header class="header">
        <div class="header-logo">
            <img class="header-logo-image" src="/images/logo.png">
        </div>
    </header>

    <main class="main">
        <div class="form">

            <form method="post">
                <div class="form-item">
                    <label class="form-label">Q1: 設問1</label>

                    <?php $q = 'question1' ?>
                    <?php foreach ($question1 as $key => $val) : ?>
                        <?php $id = "{$q}-${key}" ?>
                        <div class="form-radio-wrap">
                            <input type="radio" name="<?php echo $q ?>" id="<?php echo $id ?>" value="<?php echo $key ?>" required />
                            <label for="<?php echo $id ?>"><?php echo $val ?></label>
                        </div>
                    <?php endforeach; ?>
                    <input class="form-input hidden" type="text" name='control_other' placeholder="その他の方は詳細のご記入をお願い致します。">
                </div>

                <!-- <div class="form-item">
                    <label class="form-label">Q2: 設問2</label>
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
                    <label class="form-label">Q3: 設問3</label>
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
                    <label class="form-label">Q4: 設問4</label>                    
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
                    <label class="form-label">Q5: 設問5 </label>
                    <?php $q = 'question5' ?>
                    <?php foreach ($question5 as $key => $val) : ?>
                        <?php $id = "{$q}-${key}" ?>
                        <div class="form-radio-wrap">
                            <input type="radio" name="<?php echo $q ?>" id="<?php echo $id ?>" value="<?php echo $key ?>" required />
                            <label for="<?php echo $id ?>"><?php echo $val ?></label>
                        </div>
                    <?php endforeach; ?>
                </div> -->


                
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

                    <label class="form-label">ご案内などをお受け取りになられることをご希望の場合は”はい”を選択して下さい。<span class="require">＊</span></label>

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

                </div>

                <div class="form-item">
                    <div class="policy-wrapper">
                        <label class="form-label">プライバシーポリシーに同意致します。</label>　

                        <input type="checkbox" name="policy" id="policy" class="checkbox" value="1" required>
                        <p class="policy-note" id="submit-note">
                        </p>
                        </p>
                    </div>
                </div>


                <input type='submit' class="btn" id="submit" value="送信" disabled></a>

                <p class="submit-note" id="submit-note">
                    ※プライバシーポリシーに同意いただかないと送信出来ません。 <br>
                </p>


            </form>


        </div>

    </main>

    <footer>


    </footer>

    <script src="/js/app.js"></script>


</body>


</html>