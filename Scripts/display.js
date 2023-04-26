//Variable with my chart, this is so I can use it more universially
var myChart;

function display(x, element){
  $('#SideBar li').removeClass('active'); 
  $(element).addClass('active');
  //this is for the resetting of a chart when you click the other buttons
  if(myChart){
    myChart.destroy();
  }
  console.log("Function Called");
  $.ajax({
    type:"GET",
    url: "data.json",
    dataType: "json",
    success: function(responseData, status){
      console.log("File Read Called");
      var dates = [];
      var stats = [];
      var o = 0.0;
      var h = 0.0;
      var l = 0.0;
      var c = 0.0;
      var tot = 0;
      var vol = -5;
      $.each(responseData[x], function(i, item) {
        var relevant_data = (parseInt(item["2. high"]) + parseInt(item["3. low"]))/2;
        tot = tot + 1;
        o += parseInt(item["1. open"]);
        h += parseInt(item["2. high"]);
        l += parseInt(item["3. low"]);
        c += parseInt(item["4. close"]);
        dates.push(i);
        stats.push(relevant_data);
        if(vol == -5) {
          vol = parseInt(item["5. volume"])
        }
      });
      //Google beginners guide to ChartJS for this one, ctx is the context for the chart
      var ctx = document.getElementById('chartStuff').getContext('2d');
      myChart = new Chart(ctx,{
        type: "line",
        data: {
          labels: dates.reverse(),
          datasets: [{
            label: "Average Value",
            data: stats.reverse(),
            borderColor: "orange",
          }],
          reverse: true,
        },
        options: {
          maintainAspectRatio: false
        }
      });
      $('#Name').html(x);
      $('#Open').html(Math.round(o * 100/tot) / 100);
      $('#High').html(Math.round(h * 100/tot) / 100);
      $('#Low').html(Math.round(l * 100/tot) / 100);
      $('#Close').html(Math.round(c * 100/tot) / 100);
      var funny = Math.floor(Math.random() * 253);
      $('#Vol').html(vol);
      $('#Num').html(funny);
      $('#CalcNum').html(stats[stats.length - 1] * funny);
    }
  })
}

function clearChart(){
  $('#SideBar li').removeClass('active'); 
  if(myChart){
    myChart.destroy();
  }
}


$(document).ready(function() {
  console.log("Function Called");
  $.ajax({
    type:"GET",
    url: "data.json",
    dataType: "json",
    success: function(responseData, status){
      let listText = "";
      $.each(responseData, function (key, value) {
        listText += "<li onclick=\"display('" + key + "', this)\">" + key + "</li>";

      });
      listText += "<li onclick=\"clearChart()\">Clear Chart</li>"
      $('#SideBar ul').html(listText);
      let firstChild = $('#SideBar ul li:first-child');
      display(firstChild.text(), firstChild);

    }
  })
})