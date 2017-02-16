

<div class="modal-open">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>개인정보 수정</h4>
            </div>
            <form class="form-horizontal" action="/index.php/authentication/editmyinfo" method="POST" onsubmit="return mypagecheck()">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-xs-4 control-label" for="id">아이디</label>
                        <div class="col-xs-5">
                            <input type="text" id="id" name="id" class="form-control input-xs" value="<?=$this->session->userdata("user_id");?>"  disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4 control-label" for="pass">비밀번호</label>
                        <div class="col-xs-5">
                            <input type="password" id="pass" name="pass" class="form-control input-xs" placeholder="비밀번호">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4 control-label" for="newpass">새 비밀번호</label>
                        <div class="col-xs-5">
                            <input type="password" id="newpass" name="newpass" class="form-control input-xs" placeholder="새 비밀번호">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4 control-label" for="repass">새 비밀번호 확인</label>
                        <div class="col-xs-5">
                            <input type="password" id="repass" name="repass" class="form-control input-xs" placeholder="새 비밀번호 확인">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4 control-label" for="name">이름</label>
                        <div class="col-xs-5">
                            <input type="text" id="name" name="name" class="form-control input-xs" value="<?=$info->name?>" placeholder="이름">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4 control-label" for="email">이메일</label>
                        <div class="col-xs-5">
                            <input type="text" id="email" name="email" class="form-control input-xs" value="<?=$info->email?>" placeholder="E-mail">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4 control-label" for="phone">연락처</label>
                        <div class="col-xs-5">
                            <input type="tel" id="phone" name="phone" class="form-control input-xs" value="<?=$info->phone_number?>" placeholder="연락처">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4 control-label" for="birth">생년월일</label>
                        <div class="col-xs-5">
                            <input type="date" id="birth" name="birth" class="form-control input-xs" value="<?=$info->birthday?>" placeholder="생년월일">
                        </div>
                    </div>


                </div>

                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" class="form-control input-xs" value='수정'>
                </div>
            </form>
        </div>
    </div>
</div>


<script type="text/javascript">

    function mypagecheck() {
        if(pass.value == "" || newpass.value=="" || repass.value == "" || name.value=="" || email.value=="" || phone.value=="" || birth.value==""){
            alert("빈칸을 모두 채워주세요!");
            return false;
        }
        else if(newpass.value != repass.value){
            alert("새 비밀번호가 일치하지 않습니다.");
            return false;
        }
        return true;
    }

</script>