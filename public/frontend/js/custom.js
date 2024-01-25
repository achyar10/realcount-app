function removePop() {
    document.querySelector(".popup").remove();
  }
  
  function moretag(content_id,index,channel_id) {
      $('.next').hide();
      $('.loading').show();
          $.ajax({
          type:'POST',
          url:'<?php echo base_url()?>tag/more',
          data:'start='+index+'&channel_id='+channel_id,
          success:function(html){
              $('.rm'+content_id).remove();
              $('#more_content').append(html);
          }
      }); 
  }
  
  
  function fb_share(){
      var shareURL    = $("#share-url").attr('data-url');
      var encode_url  = encodeURI(shareURL);
      window.open("https://www.facebook.com/sharer/sharer.php?u=" + encode_url, "myWindow", "width=500, height=500");
  }
  
  function twitter_share(){
      var shareURL    = $("#share-url").attr('data-url');
      var shareText   = $("#share-url").attr('data-text');
      var encode_url  = encodeURI(shareURL);    
      window.open("https://twitter.com/intent/tweet?text=" + encode_url, "myWindow", "width=500, height=500");
  }
  
  function gplus_share(){
      var shareURL    = $("#share-url").attr('data-url');
      var encode_url  = encodeURI(shareURL);
      window.open("https://plus.google.com/share?url=" + encode_url, "myWindow", "width=500, height=500");
  }
  
  function pinterest_share(){
      var img         = $("#share-url").attr('data-img');
      var title       = $("#share-url").attr('data-title');
      var shareURL    = $("#share-url").attr('data-url');
      window.open("https://www.pinterest.com/pin/create/button/?url=" + shareURL + "&description=" + title + "&media=" + img, "myWindow", "width=500, height=500");
  }
  
  function linked_share(){
      var title       = $("#share-url").attr('data-title');
      var shareURL    = $("#share-url").attr('data-url');
      window.open(" https://www.linkedin.com/shareArticle?mini=true&url=" + shareURL + "&title=" + title, "myWindow", "width=500, height=500");
  }
  
  function line_share(){
      var shareURL    = $("#share-url").attr('data-url');
      location.href = 'line://msg/text/?'+shareURL;
  }