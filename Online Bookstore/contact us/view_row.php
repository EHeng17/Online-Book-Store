<?php
	#Display replyID,reason, question and answer
    function ans_row($rid, $reason, $question, $ans) {
        $element = "

        <div class=\"answer\">
            <img src=\"https://previews.123rf.com/images/dirkercken/dirkercken1405/dirkercken140500032/28400689-find-answers-indicating-way-to-solve-problems-answer-button-answer-icon-search-answer-and-discover-t.jpg\" alt=\"\">
            <div class=\"answer-info\">
                <h2 class=\"answer-reason\">Reason: $reason</h2>
                <p class=\"answer-question\"><b>Question:</b> $question</p>
                <p class=\"answer-reply\"><b>Answer:</b> $ans</p>
                <p class=\"answer-remove\">
                    <i style=\"color: white;\" class=\"fa fa-check-square\" aria-hidden=\"true\"></i>
                    <span class=\"remove\"><a href=\"delete_viewed.php?replyid=$rid\" style=\"text-decoration: none; color: white;\" class=\"remove\" > Viewed</a></span>
                </p>
            </div>
        </div>

        ";

        echo $element;
    }

?>