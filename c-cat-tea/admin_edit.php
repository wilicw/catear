<?php
	session_start();
	require('function.php');
	if(isset($_SESSION['user'])){
    }else{
        echo "<meta http-equiv='refresh' content='1;url=login.php'>";
    }
?>
    <?php head(); ?>

    <body style="background-color: rgb(242, 240, 255)">
        <?php if(isset($_SESSION['user'])): ?>
        <script>
            function edit(data) {
                $.post("action.php", {
                        action: "editmember",
                        id: data
                    },
                    function(resp) {
                        $('.modal-body').html(resp);
                    });
            }

            function del_data(data) {
                X = confirm('是否要刪除');
                if (X) {
                    $.post("action.php", {
                            action: "del_data",
                            id: data
                        },
                        function(resp) {
                            $('#intro').append(resp);
                        });
                } else {}
            }
        </script>
        <?php nav(); ?>
        <div id="intro" style="margin-top:55px;">
            <?php echodata(); ?>
        </div>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">編輯</h4>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
            <h1>錯誤</h1>
        <?php endif; ?>
    </body>

    </html>