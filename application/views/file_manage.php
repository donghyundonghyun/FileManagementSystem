
<div class="container">
    <div class="pptpanel">
        <span class="pptpanel-title"><?=$filesName?></span>
        <div class="pptpanel-detail-wrapper container">
            <div class="row">
            <div class="col-md-8 pptpanel-left">
                <div class="pptpanel-thumb">
                    <div class="pptpanel-thumb-header">
                        최종 수정 날짜 2017.02.05 작성자 asrht1228
                    </div>
                    <div class="pptpanel-thumb-body">

                        <?php echo form_open_multipart('upload/do_upload/'.$files_id);?>

                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" id="exampleInputFile" name="userfile">
                        </div>

                        <button type="submit" class="btn btn-xs btn-default">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-8 pptpanel-right">
                    <?php
                        foreach($rfiles as $file) {
                            ?>

                            <div class="pptpanel-revision">
                                <a href="#" style="color:black">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </a>
                                <span class="pptpanel-revision-title"><?= $file->user_filename ?></span>
                                <br/>
                                <span class="pptpanel-revision-detail">수정날짜 <?= $file->created_date ?>
                                    파일사이즈 : <?= $file->file_size ?></span>

                            </div>

                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>



