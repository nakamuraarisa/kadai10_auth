<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="select.php"><button>記録を見る</button></a>　
            
            <?php if($_SESSION["kanri_flg"]=="1"){ ?>
                <a href="user.php"><button>新規ユーザー登録</button></a>　
            <?php } ?>
            
            <a class="navbar-brand" href="logout.php"><button>ログアウト</button></a>
        </div>
    </div>
</nav>