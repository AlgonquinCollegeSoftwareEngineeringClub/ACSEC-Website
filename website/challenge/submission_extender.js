$(document).ready(function() {
  var codeCounter = 2;
  $("#add-another-file").click(function() {
    var newFileArea = "<div class=\"form-group\">";
    newFileArea += "<label for=\"filename" + codeCounter + "\">Filename " + codeCounter + "</label>";
    newFileArea += "<input type=\"text\" id=\"filename" + codeCounter + "\" class=\"form-control\" name=\"filename" + codeCounter + "\" placeholder=\"filename\">";
    newFileArea += "</div>";
    newFileArea += "<div class=\"form-group\">";
    newFileArea += "<label for=\"code" + codeCounter + "\">Code " + codeCounter + "</label>";
    newFileArea += "<textarea name=\"code" + codeCounter + "\" id=\"filename" + codeCounter + "\" class=\"form-control\" rows=15 placeholder=\"Enter your solution here...\"></textarea>";
    newFileArea += "</div>";
    $("#file-area").append(newFileArea);

    codeCounter++;
  });
});
