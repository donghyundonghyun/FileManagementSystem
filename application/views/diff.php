<div class="container">
    <div class="pptpanel">
        <span class="pptpanel-title">소스코드 <i><?=$first?></i> 와 <i><?=$second?></i> 비교</span>
        <div class="pptpanel-detail-wrapper container">
            <div class="row">
                <div class="col-md-12">
                    <pre name="source_code" id="editor"><?=$diff?></pre>
                </div>
            </div>


<script>
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
    var Range = ace.require('ace/range').Range;


    <?php

    for($i=0,$j=0; $j<count($status); $i++){
        if(isset($status[$i])){
            $j++;
    ?>
        editor.session.addMarker(
            new Range("<?=$i?>", 0, <?=$i?>, 0), "<?=$status[$i]?>", "fullLine"
        );
    <?php
        }
    }
    ?>




</script>