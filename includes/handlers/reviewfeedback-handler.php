<script>
    $(document).ready(function(){
        $('.feedback-btn').on('click',function(){
            var review_id = $(this).data('id');
            console.log('review: ' + (review_id) + ' clicked');

            $feedback_btn = $(this);
            $feedback_icon = $feedback_btn.children('i.bi');
            $feedback_count = $feedback_btn.children('span.count');
            var count = parseInt($feedback_count.text());

            console.log('count: ' + count);

            if($feedback_icon.hasClass('bi-hand-thumbs-up') || $feedback_icon.hasClass('bi-hand-thumbs-up-fill')){
                action = 'like';
            }else if($feedback_icon.hasClass('bi-hand-thumbs-down') || $feedback_icon.hasClass('bi-hand-thumbs-down-fill')){
                action = 'dislike';
            }

            $.ajax({
                url: $(this).data('product'),
                type: 'post',
                data: {
                    'action': action,
                    'review_id': review_id
                },
                success: function(data){
                    if(action == 'like'){
                        $feedback_icon.removeClass('bi-hand-thumbs-up');
                        $feedback_icon.addClass('bi-hand-thumbs-up-fill');
                        count = count + 1; 
                        $feedback_count.text(count);
                        console.log('feedbackcount add: ' + count);
                    }else if(action == 'dislike'){
                        $feedback_icon.removeClass('bi-hand-thumbs-down');
                        $feedback_icon.addClass('bi-hand-thumbs-down-fill');
                        count = count + 1; 
                        $feedback_count.text(count);
                        console.log('feedbackcount add: ' + count);
                    }
                }
            })

        });
    });

</script>

<?php
    if (isset($_POST['action'])) {
        $review_id = $_POST['review_id'];
        $action = $_POST['action'];

        switch ($action) {
            case 'like':
                $updatefeedback="UPDATE reviews SET likes = likes + 1 WHERE id = '$review_id'";
                break;
            case 'dislike':
                $updatefeedback="UPDATE reviews SET dislikes = likes + 1 WHERE id = '$review_id'";
                break;
            default:
                break;
        }
        
        mysqli_query($connect, $updatefeedback);
        exit(0);
    }
?>