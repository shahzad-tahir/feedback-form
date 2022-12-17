!function (l) {
    "use strict";
    var o = function () {
        this.$body = l("body")
    };
    o.prototype.createCombineGraph = function (o, t, a, e) {
        var i = [{label: a[0], data: e[0], lines: {show: !0, fill: !0}, points: {show: !0}}, {
            label: a[1],
            data: e[1],
            lines: {show: !0},
            points: {show: !0}
        }, {label: a[2], data: e[2], bars: {show: !0, barWidth: .7}}], r = {
            series: {shadowSize: 0},
            grid: {hoverable: !0, clickable: !0, tickColor: "#f9f9f9", borderWidth: 1, borderColor: "#eeeeee"},
            colors: ["#e3eaef", "#4a81d4", "#1abc9c"],
            tooltip: !0,
            tooltipOpts: {defaultTheme: !1},
            legend: {
                position: "ne",
                margin: [0, -32],
                noColumns: 0,
                labelBoxBorderColor: null,
                labelFormatter: function (o, t) {
                    return o + "&nbsp;&nbsp;"
                },
                width: 30,
                height: 2
            },
            yaxis: {axisLabel: "Point Value (1000)", tickColor: "#f5f5f5", font: {color: "#bdbdbd"}},
            xaxis: {axisLabel: "Daily Hours", ticks: t, tickColor: "#f5f5f5", font: {color: "#bdbdbd"}}
        };
        l.plot(l(o), i, r)
    }, o.prototype.init = function () {
        var o = [[[0, 201], [1, 520], [2, 337], [3, 261], [4, 157], [5, 95], [6, 200], [7, 250], [8, 320], [9, 500], [10, 152], [11, 214], [12, 364], [13, 449], [14, 558], [15, 282], [16, 379], [17, 429], [18, 518], [19, 470], [20, 330], [21, 245], [22, 358], [23, 74]], [[0, 311], [1, 630], [2, 447], [3, 371], [4, 267], [5, 205], [6, 310], [7, 360], [8, 430], [9, 610], [10, 262], [11, 324], [12, 474], [13, 559], [14, 668], [15, 392], [16, 489], [17, 539], [18, 628], [19, 580], [20, 440], [21, 355], [22, 468], [23, 184]], [[23, 727], [22, 128], [21, 110], [20, 92], [19, 172], [18, 63], [17, 150], [16, 592], [15, 12], [14, 246], [13, 52], [12, 149], [11, 123], [10, 2], [9, 325], [8, 10], [7, 15], [6, 89], [5, 65], [4, 77], [3, 600], [2, 200], [1, 385], [0, 200]]];
        this.createCombineGraph("#sales-analytics", [[0, "22h"], [1, ""], [2, "00h"], [3, ""], [4, "02h"], [5, ""], [6, "04h"], [7, ""], [8, "06h"], [9, ""], [10, "08h"], [11, ""], [12, "10h"], [13, ""], [14, "12h"], [15, ""], [16, "14h"], [17, ""], [18, "16h"], [19, ""], [20, "18h"], [21, ""], [22, "20h"], [23, ""]], ["Direct Sales", "Email Marketing", "Marketplaces"], o)
    }, l.Dashboard1 = new o, l.Dashboard1.Constructor = o
}(window.jQuery), function (o) {
    "use strict";
    window.jQuery.Dashboard1.init()
}(), $("#dash-daterange").flatpickr({altInput: !0, altFormat: "F j, Y", dateFormat: "Y-m-d", defaultDate: "today"});