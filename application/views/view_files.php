
<div class="container">
    <div class="pptpanel">
        <div class="pptpanel-detail-wrapper container">
            <?php foreach($myfiles as $file) {
                ?>
                <a href="/index.php/upload/fileinfo/<?=$file->ID?>" style="color:black"?>
                    <div class="col-md-3 pptpanel-left">
                        <div class="pptpanel-thumb">
                            <div class="pptpanel-thumb-header">
                               <?=$file->filename?>
                            </div>
                            <div class="pptpanel-thumb-body">
                                최종 수정 날짜 : <?=$file->last?>
                            </div>
                        </div>
                    </div>
                </a>


                <?php
            }
            ?>

        </div>
    </div>
</div>


<input type="image" data-toggle="modal" data-target="#addModal"
     style="position: fixed; right:100px; bottom:100px"
     src="https://cdn-images-1.medium.com/max/800/1*smwTYAZ495I4rDbmgfjCJA.png"
     width="100" height="100"/>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="/index.php/upload/addproj">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">관리파일 추가</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="projName" class="control-label">Name :</label>
                        <input type="text" name="projName" class="form-control" id="projName">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Apply</button>
                </div>
            </form>
        </div>
    </div>
</div>

