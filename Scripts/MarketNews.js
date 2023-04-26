

$(document).ready(function () {
  $.ajax({
    url: "data.json",
    dataType: "json",
    success: function (data) {
      // Fill the MarketNews div with the JSON data
      var newsHtml = "";
      $.each(data['feed'], function (i, newsItem) {
        newsHtml += "<div class='NewsItem'>";
        newsHtml += "<div class = 'NewsDesc'>" + "<h2>" + newsItem.title + "</h2>";
        newsHtml += "<p>" + newsItem.summary + "</p>";
        newsHtml += "<a class = 'NewsURL' href='" + newsItem.url + "'>Read More</a> </div>";
        newsHtml += "<img src = '" + newsItem.banner_image +"' alt = 'News Picture' class = 'NewsPic' \> </div>";
        newsHtml += "</div>";
      });
      $("#MarketNews").html(newsHtml);
    },
  });
});
