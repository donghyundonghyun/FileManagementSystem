
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
                                <a href="#" class="hover-a" data-title="<?=$file->user_filename?>"
                                   data-toggle="modal" data-target="#contentModal" data-id="<?=$file->ID?>">
                                    <span class="pptpanel-revision-title"><?= $file->user_filename ?></span>
                                </a>
                                <a href="/index.php/upload/deleteFile/<?=$file->ID?>" style="color:black; right:25px; position:absolute">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </a>
                                <br/>
                                <span class="pptpanel-revision-detail">수정날짜 <?= $file->created_date ?><br />
                                    파일사이즈 : <?= $file->file_size ?> KB</span>

                            </div>
                            <br />
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="contentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="profform" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Prof/TA</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <pre name="source_code" id="editor"></pre>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Apply</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="/static/lib/ace/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>

<script>

$('#contentModal').on('show.bs.modal', function (event) {
    var modal = $(this);
    var button = $(event.relatedTarget); // Button that triggered the modal
    var title = button.data('title');
    var fileid = button.data('id');

    modal.find('.modal-title').text(title);



    $.ajax({
        url:'/index.php/upload/viewcontent/'+fileid,
        dataType:'json',
        cache: false,
        crossDomain: true,
        contentType: 'application/json; charset=utf-8',
        success:function(data){
            var editor = ace.edit("editor");
            editor.setTheme("ace/theme/textmate");
            editor.session.setMode("ace/mode/c_cpp");
            editor.setReadOnly(true);
            editor.renderer.$cursorLayer.element.style.display = "none";
            editor.setOptions({
                fontFamily: "Consolas",
                fontSize: "11pt",
                minLines: 20,
                maxLines: Infinity,
                VScroll: true
            });
            editor.setValue(data);
//            modal.find('.modal-body pre').text(data);
        },
        error : function(xhr, status, error) {
            alert("에러가 발생했습니다. 다시시도해주세요");
        }
    });



});

</script>


