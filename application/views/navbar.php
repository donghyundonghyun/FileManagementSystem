<nav class="navbar-fixed navbar-default" style="background-color: #02B875; border-color: #FFFFFF;">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" style=" color: #ffffff;" href="/index.php/main">Historage</a>
        </div>

        <ul class="nav navbar-nav navbar-right" style="margin-right: 10px">
            <li><a href="/index.php/authentication/logout" style="color: #ffffff;"> LOGOUT
                    <span class="glyphicon glyphicon-log-out" aria-hidden="true">
                </span>
                </a>
            </li>
        </ul>



    </div><!-- /.container-fluid -->
</nav>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-6 col-md-2" style="background: white; min-height:100vh; hight:auto">
            <br>
                  <center>
                        <img src="https://cdn0.iconfinder.com/data/icons/connection/512/icon-16.png" width="100" height="100"></td>
                    </center>
                <br>               
                 <div style="text-align: center;">
                    
                      <b1 class="profile_style">
                        <?=$name?> <a href="/index.php/authentication/mypage" data-toggle="tooltip" data-placement="right" title="개인정보 수정"
                                style="color:black;"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
                      <br />
                        <b1 class="profile_style">
                        <?=$email?>
                    </div>
                    
        </div>
        <div class="col-xs-12 col-md-10" style="background: #eeeeee; min-height:100vh; hight:auto">