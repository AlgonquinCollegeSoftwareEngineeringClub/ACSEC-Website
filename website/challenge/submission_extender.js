$(document).ready(function() {
  var codeCounter = 2;
  $("#add-another-file").click(function() {
    var newFileArea = "<div class=\"form-group\">";
    newFileArea += "<input type=\"text\" class=\"form-control\" name=\"filename" + codeCounter + "\" placeholder=\"filename\">";
    newFileArea += "<textarea name=\"code" + codeCounter + "\" class=\"form-control\" rows=4 placeholder=\"Enter your solution here...\"></textarea>";
    newFileArea += "</div>";
    $("#file-area").append(newFileArea);

    codeCounter++;
  });
});
