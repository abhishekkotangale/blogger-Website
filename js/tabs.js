$(".draft").hide();
$(".allBlogs").css("color", "rgb(133, 76, 230)");
$(".allBlogs").css("border-bottom", "2px solid rgb(133, 76, 230)");

$(".allDrafts").click(function(){
  $(".blogs").hide();
  $(".draft").show();
  $(".allBlogs").css("color", "#000");
  $(".allDrafts").css("color", "rgb(133, 76, 230)");
  $(".allDrafts").css("border-bottom", "2px solid rgb(133, 76, 230)");
  $(".allBlogs").css("border-bottom", "none");
});

$(".allBlogs").click(function(){
  $(".blogs").show();
  $(".draft").hide();
  $(".allDrafts").css("color", "#000");
  $(".allBlogs").css("color", "rgb(133, 76, 230)");
  $(".allBlogs").css("border-bottom", "2px solid rgb(133, 76, 230)");
  $(".allDrafts").css("border-bottom", "none");
});

$(".btn").click(function(){
  $(".input").val("");
});