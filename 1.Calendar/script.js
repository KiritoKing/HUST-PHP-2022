(function () {
  // 闭包存储当前时间
  var dateObj = (function () {
    var _date = new Date(); // 默认为当前系统时间

    return {
      getDate: function () {
        return _date;
      },

      setDate: function (date) {
        _date = date;
      },
    };
  })();

  renderHtml(); // 渲染日历
  showCalendarData(); // 表格中显示日期
  bindEvent(); // 绑定事件

  function renderHtml() {
    var calendar = document.getElementById("calendar");
    var titleBox = document.createElement("div"); // 标题盒子 设置上一月 下一月 标题
    var bodyBox = document.createElement("div"); // 表格区 显示数据

    // 设置标题盒子中的html
    titleBox.className = "calendar-title-box";
    titleBox.innerHTML =
      "<span class='prev-month' id='prevMonth'></span>" +
      "<span class='calendar-title' id='calendarTitle'></span>" +
      "<span id='nextMonth' class='next-month'></span>";
    calendar.appendChild(titleBox); // 添加到calendar div中

    // 设置表格区的html结构
    bodyBox.className = "calendar-body-box";
    var _headHtml =
      "<tr>" +
      "<th>日</th>" +
      "<th>一</th>" +
      "<th>二</th>" +
      "<th>三</th>" +
      "<th>四</th>" +
      "<th>五</th>" +
      "<th>六</th>" +
      "</tr>";
    var _bodyHtml = "";

    // 一个月最多31天，所以一个月最多占6行表格
    for (var i = 0; i < 6; i++) {
      _bodyHtml +=
        "<tr>" +
        "<td></td>" +
        "<td></td>" +
        "<td></td>" +
        "<td></td>" +
        "<td></td>" +
        "<td></td>" +
        "<td></td>" +
        "</tr>";
    }

    bodyBox.innerHTML =
      "<table id='calendarTable' class='calendar-table'>" +
      _headHtml +
      _bodyHtml +
      "</table>";

    // 添加到calendar div中

    calendar.appendChild(bodyBox);
  }

  function showCalendarData() {
    var _year = dateObj.getDate().getFullYear();
    var _month = dateObj.getDate().getMonth() + 1;
    var _dateStr = getDateStr(dateObj.getDate());

    // 设置顶部标题栏中的 年、月信息
    var calendarTitle = document.getElementById("calendarTitle");
    var titleStr = _dateStr.substr(0, 4) + "年" + _dateStr.substr(4, 2) + "月";
    calendarTitle.innerText = titleStr;

    // 设置表格中的日期数据
    var _table = document.getElementById("calendarTable");
    var _tds = _table.getElementsByTagName("td");
    var _firstDay = new Date(_year, _month - 1, 1); // 当前月第一天
    for (var i = 0; i < _tds.length; i++) {
      var _thisDay = new Date(_year, _month - 1, i + 1 - _firstDay.getDay());
      var _thisDayStr = getDateStr(_thisDay);
      _tds[i].innerText = _thisDay.getDate();

      _tds[i].setAttribute("data", _thisDayStr);
      if (_thisDayStr == getDateStr(new Date())) {
        _tds[i].className = "currentDay";
      } else if (
        _thisDayStr.substr(0, 6) == getDateStr(_firstDay).substr(0, 6)
      ) {
        _tds[i].className = "currentMonth"; // 当前月
      } else {
        _tds[i].className = "otherMonth";
      }
    }
  }

  function bindEvent() {
    var prevMonth = document.getElementById("prevMonth");
    var nextMonth = document.getElementById("nextMonth");
    prevMonth.addEventListener("click", toPrevMonth);
    nextMonth.addEventListener("click", toNextMonth);
    addEvent(prevMonth, "click", toPrevMonth);
    addEvent(nextMonth, "click", toNextMonth);
  }

  function toPrevMonth() {
    var date = dateObj.getDate();
    dateObj.setDate(new Date(date.getFullYear(), date.getMonth() - 1, 1));
    showCalendarData();
  }

  function toNextMonth() {
    var date = dateObj.getDate();
    dateObj.setDate(new Date(date.getFullYear(), date.getMonth() + 1, 1));
    showCalendarData();
  }

  function getDateStr(date) {
    var _year = date.getFullYear();
    var _month = date.getMonth() + 1; // 月从0开始计数
    var _d = date.getDate();
    _month = _month > 9 ? "" + _month : "0" + _month;
    _d = _d > 9 ? "" + _d : "0" + _d;
    return _year + _month + _d;
  }
})();

var table = document.getElementById("calendarTable");
var tds = table.getElementsByTagName("td");
