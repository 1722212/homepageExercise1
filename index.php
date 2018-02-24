<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<!--
////////////////////////////////////////////////////////////////////////////////
実装するのは以下
    ・スライダー
    ・カレンダー
    ・アコーディオン
////////////////////////////////////////////////////////////////////////////////
-->


<html>
    <head>
        <meta charset="UTF-8">
        <title>ホームページ</title>
        <!-- ブートストラップ -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- JQuery -->
        <script src="js/jquery-3.3.1.min.js"></script>
        <!-- スライダー -->
        <link rel="stylesheet" href="slick-1.8.0/slick/slick.css">
        <script src="slick-1.8.0/slick/slick.min.js"></script>
        <!-- jquery-ui.min.js -->
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        
        <!-- jquery-ui.css -->
        <script src="css/jquery-ui.min.css"></script>
        <script src="css/jquery-ui.css"></script>
        <script src="css/jquery-ui.structure.css"></script>
        <script src="css/jquery-ui.structure.min.css"></script>
        <script src="css/jquery-ui.theme.css"></script>
        <script src="css/jquery-ui.theme.min.css"></script>
        <script>
            $(function(){
                $('#datepicker').datepicker();
            });
        </script>

    </head>
    <body>
        <div class="slider">
            <div><img src="src/IMG_0929.JPG" alt="">1</div>
            <div><img src="src/IMG_0931.JPG" alt="">2</div>
            <div><img src="src/IMG_0932.PNG" alt="">3</div>
            <div><img src="src/IMG_0933.PNG" alt="">4</div>
        </div>
        <form action="check.php" method="post">
            <!-- IEには対応していない -->
            HTML５によるカレンダ入力：<input type="date" name="calendar" required><br>
            必須入力チェック：<input type="text" name="require" required><br>
            入力パターンの指定：<input type="text" name="pattern" pattern=""><br>
            最長の長さの指定：<input type="text" name="maxlength" maxlength="10"><br>
            <br>
            <input type="submit" value="チェック">
        </form>
        <br>
        
        <!--
        ////////////////////////////////////////////////////////////////////////
            ファイルをダウンロードさせる方法は主に３つ
            １．download属性を用いる
            　⇒　IEは未対応
            ２．target="_blank" を用いる
            　⇒　Chrome、IE、FifeFoxに対応
            ３．Zip形式でダウンロードさせる
        ////////////////////////////////////////////////////////////////////////
        -->
        ファイルをダウンロードさせる<br>
        <a href="file/IMG_0751.JPG" target="_blank">IMG_0751.JPG</a><br>
        <a href="file/イメージ１.jpg" target="_blank">イメージ１.jpg</a><br>
        <a href="file/ポータルサイトのメモ.txt"  target="_blank">ポータルサイトのメモ.txt</a><br>
        <a href="file/日報アプリ.gsheet"  target="_blank">日報アプリ.gsheet</a><br>
        <a href="file/機械学習を用いた画像解析 Webアプリケーション 公開サイトの構築.gdoc"  target="_blank">機械学習を用いた画像解析 Webアプリケーション 公開サイトの構築.gdoc</a><br>
        <a href="file/画面レイアウト1.pdf"  target="_blank">画面レイアウト1.pdf</a><br>
        
        
        
        
        
        <a href="display.php">ウェルカムページへ</a>
        
        
    </body>
    <script type="text/javascript">
        $('.slider').slick();
    </script>
</html>

<!--
////////////////////////////////////////////////////////////////////////////////
バリデーション内容	正規表現（pattern属性）	備考
3文字以上	.{3,}	バイト単位ではなく、半角・全角ともに1文字となる
半角英数字	^[0-9A-Za-z]+$	
半角英数字6文字以上	^([a-zA-Z0-9]{6,})$	
半角英字8文字	[A-Za-z]{8}	
ファイル名チェック	^[-0-9a-zA-Z_.]+$	マルチバイト文字を含むファイル名は非対応
パスワード用	(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}	8文字以上で1文字以上の数字、小文字アルファベット、大文字アルファベットがそれぞれ含まれていること
郵便番号	\d{3}-\d{4}	※1
電話番号	\d{2,4}-\d{3,4}-\d{3,4}	※2
メールアドレス	[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$	※3
URL	https?://.+	※4
全角カタカナ	^[ァ-ンヴー]+$ , [\u30A1-\u30FF]*	出力されるHTMLがUTF-8である必要あり※5
半角カタカナ	[\uFF66-\uFF9D]*	出力されるHTMLがUTF-8である必要あり
全角ひらがな	^[ぁ-ん]+$ , [\u3041-\u309F]*	出力されるHTMLがUTF-8である必要あり※6
全角数字	[\uFF10-\uFF19]*	出力されるHTMLがUTF-8である必要あり
全角アルファベット	[\uFF21-\uFF3A｜\uFF41-\uFF5A]*	パイプ「｜」のところは半角で
半角英数字以外	[^\x20-\x7E]*	
日時（Y-M-d H:i:s)	\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}	※7
正の整数	[1-9][0-9]*	※8
'や"のクォーテーションを許可しない	[^\x22\x27]*	検索フォームのバリデーションに適しているかも
IPアドレス	^\d{1,3}(\.\d{1,3}){3}$	※9
浮動小数点	^-?\d{1,}\.\d*$	
////////////////////////////////////////////////////////////////////////////////
-->