'use strict'

{
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    // 学習時間
    var data = google.visualization.arrayToDataTable([
      ["Date", "Hour", { role: "style" } ],
      [1, 2, "#0f71bc"],
      [2, 8, "#3ccfff"],
      [3, 1, "#0f71bc"],
      [4, 2, "#3ccfff"],
      [5, 3, "#0f71bc"],
      [6, 4, "#3ccfff"],
      [7, 5, "#0f71bc"],
      [8, 6, "#3ccfff"],
      [9, 7, "#0f71bc"],
      [10, 1, "#3ccfff"],
      [11, 2, "#0f71bc"],
      [12, 3, "#3ccfff"],
      [13, 4, "#0f71bc"],
      [14, 7, "#3ccfff"],
      [15, 2, "#0f71bc"],
      [16, 7, "#3ccfff"],
      [17, 4, "#0f71bc"],
      [18, 3, "#3ccfff"],
      [19, 3.2, "#0f71bc"],
      [20, 3.5, "#3ccfff"],
      [21, 3.2, "#0f71bc"],
      [22, 3.5, "#3ccfff"],
      [23, 3.2, "#0f71bc"],
      [24, 3.5, "#3ccfff"],
      [25, 3.2, "#0f71bc"],
      [26, 3.5, "#3ccfff"],
      [27, 3.2, "#0f71bc"],
      [28, 6.5, "#3ccfff"],
      [29, 8, "#0f71bc"],
      [30, 2, "#3ccfff"],
    ]);
    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
                      { calc: "stringify",
                        type: "string",
                        role: "annotation" },
                      2]);
    var pc_options = {
      width: '100%',
      height: '400',
      bar: {groupWidth: "50%"},
      legend: { position: "none" },
      vAxis:{
        format:'0h',
        gridlines:{
            color:'#ffffff'
        }
      }
    };
    var chart = new google.visualization.ColumnChart(document.getElementById("pc_columnchart_values"));
    chart.draw(view, pc_options);

    var sp_options = {
      width: '100%',
      height: '200',
      bar: {groupWidth: "50%"},
      legend: { position: "none" },
      vAxis:{
        format:'0h',
        gridlines:{
            color:'#ffffff'
        }
      }
    };
    var chart = new google.visualization.ColumnChart(document.getElementById("sp_columnchart_values"));
    chart.draw(view, sp_options);

    // 学習言語
    var data = google.visualization.arrayToDataTable([
      ['Language', 'Hour'],
      ['HTML', 9],
      ['CSS', 2],
      ['JavaScript', 6],
      ['PHP', 2],
      ['Laravel', 7],
      ['SQL', 5],
      ['SHELL', 4],
      ['情報システム基礎知識(その他)', 1],
    ]);

    var options = {
      legend:{
        position:"none",
      },
      pieHole:0.5,
      slices: {
        0: { color: '#2222ff' },
        1: { color: '#3344ff' },
        2: { color: '#4466ff' },
        3: { color: '#5588ff' },
        4: { color: '#6699ff' },
        5: { color: '#77aaff' },
        6: { color: '#88ccff' },
        7: { color: '#99ddff' },
        8: { color: '#aaeeff' },
      },
      chartArea: {
        width: '100%',
        height: '100%'
      }
    };

    var chart = new google.visualization.PieChart(document.getElementById('language_piechart'));
    chart.draw(data, options);

    // 学習コンテンツ
    var data = google.visualization.arrayToDataTable([
      ['Contents', 'Hour'],
      ['ドットインストール', 9],
      ['N予備校', 4],
      ['POSSE課題', 6],
    ]);

    var options = {
      legend:{
        position:"none",
      },
      pieHole:0.5,
      slices: {
        0: { color: '#2222ff' },
        1: { color: '#66aaff' },
        2: { color: '#aaddff' },
      },
      chartArea: {
        width: '100%',
        height: '100%',
      }
    };

    var chart = new google.visualization.PieChart(document.getElementById('contents_piechart'));
    chart.draw(data, options);
  }
}
