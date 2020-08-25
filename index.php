<?php
include './conf.php';
// $csrf_token = "ランダムな文字列";
// $_SESSION['csrf_token'] = $csrf_token;

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
                    <?php $q = 'question1' ?>
                    <?php foreach ($question1 as $key => $val) : ?>
                        <?php $id = "{$q}-${key}" ?>
                        <span class="form-radio-wrap">
                            <input type="radio" name="<?php echo $q ?>" id="<?php echo $id ?>" value="<?php echo $key ?>" />
                            <label for="<?php echo $id ?>"><?php echo $val ?></label>
                        </span>
                    <?php endforeach; ?>
                </div>

                <div class="form-item">
                    <label class="form-label">設問2<span class="require">(必須)</span></label>
                    <p class="question">ダミーダミーダミーダミーダミーダミーダミー</p>
                    <?php $q = 'question2' ?>
                    <?php foreach ($question1 as $key => $val) : ?>
                        <?php $id = "{$q}-${key}" ?>
                        <span class="form-radio-wrap">
                            <input type="radio" name="<?php echo $q ?>" id="<?php echo $id ?>" value="<?php echo $key ?>" />
                            <label for="<?php echo $id ?>"><?php echo $val ?></label>
                        </span>
                    <?php endforeach; ?>
                </div>

                <div class="form-item">
                    <label class="form-label">設問3<span class="require">(必須)</span></label>
                    <p class="question">ダミーダミーダミーダミーダミーダミーダミー</p>
                    <?php $q = 'question3' ?>
                    <?php foreach ($question1 as $key => $val) : ?>
                        <?php $id = "{$q}-${key}" ?>
                        <span class="form-radio-wrap">
                            <input type="radio" name="<?php echo $q ?>" id="<?php echo $id ?>" value="<?php echo $key ?>" />
                            <label for="<?php echo $id ?>"><?php echo $val ?></label>
                        </span>
                    <?php endforeach; ?>
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
                    <input class="form-input" type="email" name='email' require='true'>
                </div>

                <input type='submit' class="btn" id="submit">送信</a>
            </form>
        </div>
    </main>

    <script src="/js/app.js"></script>
    

</body>


</html>