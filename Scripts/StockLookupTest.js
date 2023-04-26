$(document).ready(function () {
  console.log("hi");
  $.ajax({
    url: "data.json",
    dataType: "json",
    success: function (data) {
      // Fill the MarketNews div with the JSON data
      var newsHtml = "";
      $.each(data, function (key, value) {
        if (key != "Symbol" && key != "Description" && key != "Name") {
          newsHtml += `<tr> <th> ${key}</th> <td>${value}</td> </tr>`;
        }
      });
      $("#CompanyStats").html(newsHtml);
    },
  });
});
