<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>POSSE</title>
</head>
<body>
  <header class="header">
    <div class="d-lg-flex header-container mx-auto">
      <div class="d-flex">
        <img src="/img/header-logo.png" class="header-img pr-3">
        <p class="header-text my-auto">{{ $header_week }}th week</p>
      </div>
      <button class="post-btn mr-0 ml-auto my-auto d-none d-lg-block" data-toggle="modal" data-target="#modalPost">記録・投稿</button>
    </div>
  </header>

  <main>
    <div class="main-container mx-auto">
      <div class="cards d-lg-flex justify-content-between">

        <div class="left-cards">
          <div class="time-cards d-flex justify-content-between">
            <div class="card today-card text-center">
              <p class="time-cards-title mt-2 mt-lg-3 mb-0">Today</p>
              <p class="font-weight-bold h2 lg-h1 my-1 my-lg-2">{{ $today_study_hour }}</p>
              <p class="mb-2 mb-lg-3 text-muted hour">hour</p>
            </div>

            <div class="card month-card text-center">
              <p class="time-cards-title mt-2 mt-lg-3 mb-0">Month</p>
              <p class="font-weight-bold h2 lg-h1 my-1 my-lg-2">{{ $month_study_hour }}</p>
              <p class="mb-2 mb-lg-3 text-muted hour">hour</p>
            </div>

            <div class="card total-card text-center">
              <p class="time-cards-title mt-2 mt-lg-3 mb-0">Total</p>
              <p class="font-weight-bold h2 lg-h1 my-1 my-lg-2">{{ $total_study_hour }}</p>
              <p class="mb-2 mb-lg-3 text-muted hour">hour</p>
            </div>
          </div>

          <hr class="d-lg-none">

          <div class="card time-graph-card">
            <div id="pc_columnchart_values" class="d-none d-lg-block"></div>
            <div id="sp_columnchart_values" class="d-block d-lg-none"></div>
          </div>
        </div>

        <div class="right-cards d-flex justify-content-between">
          <div class="card language-card">
            <div class="language-card-container">
              <p class="font-weight-bold pt-4 lg-h5 mb-0">学習言語</p>
              <div id="language_piechart"></div>
              <div class="language-tag">
                @foreach($languages as $language)
                <p>
                  <span class="circle" style="background-color: {{ $language->color_code }}"></span>
                  <span class="text-nowrap mr-2">{{ $language -> language }}</span>
                </p>
                @endforeach
              </div>
            </div>
          </div>
          <div class="card contents-card">
            <div class="contents-card-container">
              <p class="font-weight-bold pt-4 lg-h5 mb-0">学習コンテンツ</p>
              <div id="contents_piechart"></div>
              <p class="contents-tag">
              @foreach($contents as $content)
              <p>
                <span class="circle" style="background-color: {{ $content->color_code }}"></span>
                <span class="text-nowrap mr-2">{{ $content -> content }}</span>
              </p>
              @endforeach
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <footer class="mt-3 mt-lg-4 main-container mx-auto">
    <p class="text-center font-weight-bold"><span class="pr-3" id="prev">&lt;</span><span id="thisMonth"></span><span class="pl-3" id="next">&gt;</span></p>

    <button class="post-btn mx-auto d-block d-lg-none" data-toggle="modal" data-target="#modalPost">記録・投稿</button>
</form>
  </footer>

  <!-- modal main -->
  <div class="modal fade" id="modalPost" tab-index="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-container">
          <form id="form1">
            <input id="contents1" type="checkbox" value="1" name="contents[]">
            <input id="contents2" type="checkbox" value="2" name="contents[]">
            <input id="contents3" type="checkbox" value="3" name="contents[]">
            <input id="language1" type="checkbox" value="1" name="languages[]">
            <input id="language2" type="checkbox" value="2" name="languages[]">
            <input id="language3" type="checkbox" value="3" name="languages[]">
            <input id="language4" type="checkbox" value="4" name="languages[]">
            <input id="language5" type="checkbox" value="5" name="languages[]">
            <input id="language6" type="checkbox" value="6" name="languages[]">
            <input id="language7" type="checkbox" value="7" name="languages[]">
            <input id="language8" type="checkbox" value="8" name="languages[]">

            @csrf
            <div class="form-group d-lg-flex justify-content-between">
              <div class="modal-left-parts">
                <div class="modal-date-part">
                  <p class="font-weight-bold modal-title">学習日</p>
                  <input type="text" id="studyDate" data-toggle="modal" data-target="#modalCalendar" name="date" readonly>
                </div>
                <div class="modal-contents-pc-part d-none d-lg-block pt-3">
                  <p class="font-weight-bold modal-title">学習コンテンツ (複数選択可)</p>
                  <input id="contents1" type="checkbox" value="1" name="contents[]">
                  <label for="contents1">ドットインストール</label>
                  
                  <input id="contents2" type="checkbox" value="2" name="contents[]">
                  <label for="contents2">N予備校</label>

                  <input id="contents3" type="checkbox" value="3" name="contents[]">
                  <label for="contents3">POSSE課題</label>
                </div>

                <div class="modal-contents-sp-part d-block d-lg-none pt-3">
                  <p class="font-weight-bold modal-title">学習コンテンツ (複数選択可)</p>
                  <div class="modal-contents-select-box" id="modal-contents-select-box">
                    <select>
                      <option>N予備校</option>
                    </select>
                    <div class="modal-contents-over-select"></div>
                  </div>
                  <div id="modal-contents-check-box">
                    <input type="checkbox" id="contents4" value="1" name="contents[]">
                    <label for="contents4">ドットインストール</label>
                    
                    <input type="checkbox" id="contents5" value="2" name="contents[]">
                    <label for="contents5">N予備校</label>

                    <input type="checkbox" id="contents6" value="3" name="contents[]">
                    <label for="contents6">POSSE課題</label>
                  </div>
                </div>

                <div class="modal-language-pc-part d-none d-lg-block pt-3">
                  <p class="font-weight-bold modal-title">学習言語 (複数選択可)</p>
                  <input id="language1" type="checkbox" value="1" name="languages[]">
                  <label for="language1">HTML</label>

                  <input id="language2" type="checkbox" value="2" name="languages[]">
                  <label for="language2">CSS</label>

                  <input id="language3" type="checkbox" value="3" name="languages[]">
                  <label for="language3">JavaScript</label>

                  <input id="language4" type="checkbox" value="4" name="languages[]">
                  <label for="language4">PHP</label>

                  <input id="language5" type="checkbox" value="5" name="languages[]">
                  <label for="language5">Laravel</label>

                  <input id="language6" type="checkbox" value="6" name="languages[]">
                  <label for="language6">SQL</label>

                  <input id="language7" type="checkbox" value="7" name="languages[]">
                  <label for="language7">SHELL</label>

                  <input id="language8" type="checkbox" value="8" name="languages[]">
                  <label for="language8">情報システム基礎知識(その他)</label>
                </div>

                <div class="modal-language-sp-part d-block d-lg-none pt-3">
                  <p class="font-weight-bold modal-title">学習言語 (複数選択可)</p>
                  <div class="modal-language-select-box" id="modal-language-select-box">
                    <select>
                      <option>HTML</option>
                    </select>
                    <div class="modal-language-over-select"></div>
                  </div>
                  <div id="modal-language-check-box">
                    <input id="language9" type="checkbox" value="1" name="languages[]">
                    <label for="language9">HTML</label>

                    <input id="language10" type="checkbox" value="2" name="languages[]">
                    <label for="language10">CSS</label>

                    <input id="language11" type="checkbox" value="3" name="languages[]">
                    <label for="language11">JavaScript</label>

                    <input id="language12" type="checkbox" value="4" name="languages[]">
                    <label for="language12">PHP</label>

                    <input id="language13" type="checkbox" value="5" name="languages[]">
                    <label for="language13">Laravel</label>

                    <input id="language14" type="checkbox" value="6" name="languages[]">
                    <label for="language14">SQL</label>

                    <input id="language15" type="checkbox" value="7" name="languages[]">
                    <label for="language15">SHELL</label>

                    <input id="language16" type="checkbox" value="8" name="languages[]">
                    <label for="language16">情報システム基礎知識(その他)</label>
                  </div>
                </div>
              </div>
              <div class="modal-right-parts pt-3 pt-lg-0">
                <div class="modal-time-part">
                  <p class="font-weight-bold modal-title">学習時間</p>
                  <input type="text" name="hour">
                </div>
                <div class="modal-twitter-part pt-3">
                  <p class="font-weight-bold modal-title">Twitter用コメント</p>
                  <textarea id="postTwitter" cols="0" rows="9" name="twittertext"></textarea>
                </div>
                <div class="modal-twitter-auto-part pt-1">
                  <input id="twitter" type="checkbox" checked name="twitter"><label for="twitter">Twitterに自動投稿する</label>
                </div>
              </div>
            </div>
            <button type="button" class="post-btn d-block mx-auto mt-3 mb-4" id="button1">記録・投稿</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- modal main -->

  <!-- modal calendar -->
  <div class="modal fade" id="modalCalendar" tab-index="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&larr;</span>
        </button>
        <div class="modal-container">
          <div class="modal-calendar">
            <table>
              <thead>
                <tr>
                  <th id="calendarPrev" colspan="2">&lt;</th>
                  <th id="calendarThisMonth" colspan="3"></th>
                  <th id="calendarNext" colspan="2">&gt;</th>
                </tr>
                <tr class="calendar-day">
                  <th>Sun</th>
                  <th>Mon</th>
                  <th>Tue</th>
                  <th>Wed</th>
                  <th>Thu</th>
                  <th>Fri</th>
                  <th>Sat</th>
                </tr>
              </thead>

              <tbody id="calendar-tbody">
              </tbody>
            </table>
            <button type="button" class="post-btn d-block mx-auto mt-4" id="decideCalendar">決定</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- modal calendar -->

  <!-- modal loading -->
  <div class="modal fade" id="modalLoading" tab-index="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-container">
          <div class="loader-wrap">
            <div class="loader">Loading...</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- modal loading -->

  <!-- modal success -->
  <div class="modal fade" id="modalSuccess" tab-index="-1" aria-hidden="true">
    <div class="modal-dialog modal-success-dialog">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-container text-center">
          <p class="modal-success-color">AWESOME!</p>
          <span class="modal-success-color modal-check-mark"></span>
          <p>記録・投稿<br>完了しました</p>
        </div>
      </div>
    </div>
  </div>
  <!-- modal success -->

    <!-- modal success -->
    <div class="modal fade" id="modalError" tab-index="-1" aria-hidden="true">
    <div class="modal-dialog modal-success-dialog">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-container text-center">
          <p class="modal-success-color">AWESOME!</p>
          <span class="modal-success-color modal-check-mark"></span>
          <p>エラーです</p>
        </div>
      </div>
    </div>
  </div>
  <!-- modal success -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="{{ asset('/js/main.js') }}"></script>
  <script src="{{ asset('/js/calendar.js') }}"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <script>
  $(function(){
    $('#button1').on('click', function(){
      // alert($("#form1").serialize());
      $('#modalPost').modal('hide');
      $('#modalLoading').modal('show');

      $.ajax({
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        type: 'POST',
        url: '/',
        data: $("#form1").serialize()
      }).done(function(data1,textStatus,jqXHR){
        console.log('成功！');
        console.log(data1);
        $('#modalLoading').modal('hide');
        $('#modalSuccess').modal('show');
      }).fail(function(jqXHR, textStatus, errorThrown ){
        $('#modalLoading').modal('hide');
        $('#modalError').modal('show');
      });
    })
  })
  </script>

  <script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    // 学習時間
    var data = google.visualization.arrayToDataTable([
      ["Date", "Hour", { role: "style" } ],
      [2, 0, '#fff'],
      [4, 0, '#fff'],
      [6, 0, '#fff'],
      [8, 0, '#fff'],
      [10, 0, '#fff'],
      [12, 0, '#fff'],
      [14, 0, '#fff'],
      [16, 0, '#fff'],
      [18, 0, '#fff'],
      [20, 0, '#fff'],
      [22, 0, '#fff'],
      [24, 0, '#fff'],
      [26, 0, '#fff'],
      [28, 0, '#fff'],
      [30, 0, '#fff'],
      @php
        echo $columntime;
      @endphp
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
            color:'#ffffff',
        }
      },
      hAxis:{
        gridlines:{
            color:'#ffffff',
        },
        minTextSpacing: 100,
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
      @php
        $user = Auth::user();
        $language_posts = $user->get_language_posts_table;
        $language_hours = [
          'HTML' => 0,
          'CSS' => 0,
          'JavaScript' => 0,
          'PHP' => 0,
          'Laravel' => 0,
          'SQL' => 0,
          'SHELL' => 0,
          '情報システム基礎知識(その他)' => 0,
        ];
        foreach($language_posts as $language_post){
          switch($language_post -> language_id){
            case 1: 
              $language_hours['HTML'] += $language_post -> hour;
              break;
            case 2: 
              $language_hours['CSS'] += $language_post -> hour;
              break;
            case 3: 
              $language_hours['JavaScript'] += $language_post -> hour;
              break;
            case 4: 
              $language_hours['PHP'] += $language_post -> hour;
              break;
            case 5: 
              $language_hours['Laravel'] += $language_post -> hour;
              break;
            case 6: 
              $language_hours['SQL'] += $language_post -> hour;
              break;
            case 7: 
              $language_hours['SHELL'] += $language_post -> hour;
              break;
            case 8: 
              $language_hours['情報システム基礎知識(その他)'] += $language_post -> hour;
              break;
          }
        }
        foreach($language_hours as $language=>$hour){
          echo "[ '" . $language . "', " . $hour . "],";
        }
      @endphp
    ]);
    var options = {
      legend:{
        position:"none",
      },
      pieHole:0.5,
      slices: {
        @php
          foreach($languages as $language){
            echo $language -> id - 1 . ": { color: '" . $language -> color_code . "' },";
          }
        @endphp
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
      @php
        $user = Auth::user();
        $content_posts = $user->get_content_posts_table;
        $content_hours = [
          'ドットインストール' => 0,
          'N予備校' => 0,
          'POSSE課題' => 0,
        ];
        foreach($content_posts as $content_post){
          switch($content_post -> content_id){
            case 1: 
              $content_hours['ドットインストール'] += $content_post -> hour;
              break;
            case 2: 
              $content_hours['N予備校'] += $content_post -> hour;
              break;
            case 3: 
              $content_hours['POSSE課題'] += $content_post -> hour;
              break;
          }
        }
        foreach($content_hours as $content=>$hour){
          echo "[ '" . $content . "', " . $hour . "],";
        }
      @endphp
    ]);
    var options = {
      legend:{
        position:"none",
      },
      pieHole:0.5,
      slices: {
        @php
          foreach($contents as $content){
            echo $content -> id - 1 . ": { color: '" . $content -> color_code . "' },";
          }
        @endphp
      },
      chartArea: {
        width: '100%',
        height: '100%',
      }
    };
    var chart = new google.visualization.PieChart(document.getElementById('contents_piechart'));
    chart.draw(data, options);
  }
  </script>


</body>
</html>