$(function(){
  $('#fileinput').on("change", function() {
      // サムネイルアップ処理
      $(this)[0].files[0];

      var reader = new FileReader();
      reader.onload = function (e) {
        $('#falseinput').attr('src', e.target.result);
        // アップした画像をプレビュー表示
        $("#thumbnailPreview").attr("src",e.target.result);
     };
     reader.readAsDataURL($(this)[0].files[0]);
   });

  $(".homeBtn").click(function() {
    window.location.href = '/home';
  }); 
});
