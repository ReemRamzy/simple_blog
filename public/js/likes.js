$(".like").on('click' , function(){

    var like_s = $(this).attr('data-like');
    var post_id = $(this).attr('data-postid');
    post_id = post_id.slice(0,-2);
    var token = $('meta[name="csrf-token"]').attr('content');

    alert(post_id);
$.ajax({

    type: 'POST',
    url: url,
    data: {like_s: like_s, post_id: post_id, token: token},
    success: function(data){

        //alert(data.is_like);

       if(data.is_like == 1) {
        $('*[data-postid="'+ post_id +'_L"]').removeClass('btn-secondry').addClass('btn-success');
        $('*[data-postid="'+ post_id +'_D"]').removeClass('btn-danger').addClass('btn-secondry');
        var cu_like = $('*[data-postid="'+ post_id +'_L"]').find('.like_count').text();
        var new_like = parseInt(cu_like) + 1 ;
        $('*[data-postid="'+ post_id +'_L"]').find('.like_count').text(new_like);

        if(data.change_like == 1){
            var cu_dislike = $('*[data-postid="'+ post_id +'_D"]').find('.dislike_count').text();
            var new_dislike = parseInt(cu_dislike) - 1 ;
            $('*[data-postid="'+ post_id +'_D"]').find('.dislike_count').text(new_dislike);
        }


       }

       if(data.is_like == 0) {
        $('*[data-postid="'+ post_id +'_L"]').removeClass('btn-success').addClass('btn-secondry');
        var cu_like = $('*[data-postid="'+ post_id +'_L"]').find('.like_count').text();
        var new_like = parseInt(cu_like) -1 ;
        $('*[data-postid="'+ post_id +'_L"]').find('.like_count').text(new_like);
       }




    }
});



});


$(".dislike").on('click' , function(){

    var like_s = $(this).attr('data-like');
    var post_id = $(this).attr('data-postid');
    post_id = post_id.slice(0,-2);
    var token = $('meta[name="csrf-token"]').attr('content');

    // alert(post_id);
$.ajax({

    type: 'POST',
    url: url_dis,
    data: {like_s: like_s, post_id: post_id, token: token},
    success: function(data){

        //alert(data.is_like);

       if(data.is_dislike == 1) {
        $('*[data-postid="'+ post_id +'_D"]').removeClass('btn-secondry').addClass('btn-danger');
        $('*[data-postid="'+ post_id +'_L"]').removeClass('btn-success').addClass('btn-secondry');

        var cu_dislike = $('*[data-postid="'+ post_id +'_D"]').find('.dislike_count').text();
        var new_like = parseInt(cu_dislike) + 1 ;
        $('*[data-postid="'+ post_id +'_D"]').find('.dislike_count').text(new_like);

        if(data.change_dislike == 1){
            var cu_like = $('*[data-postid="'+ post_id +'_L"]').find('.like_count').text();
            var new_dislike = parseInt(cu_dislike) - 1 ;
            $('*[data-postid="'+ post_id +'_L"]').find('.like_count').text(new_like);
        }

       }

       if(data.is_dislike == 0) {
        $('*[data-postid="'+ post_id +'_D"]').removeClass('btn-danger').addClass('btn-secondry');

        var cu_dislike = $('*[data-postid="'+ post_id +'_D"]').find('.dislike_count').text();
        var new_dislike = parseInt(cu_dislike) - 1 ;
        $('*[data-postid="'+ post_id +'_D"]').find('.dislike_count').text(new_dislike);

       }




    }
});



});
