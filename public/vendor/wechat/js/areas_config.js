//省市区插件
$('#area').mobiscroll().scroller({
    theme: 'mobiscroll',
    lang: 'zh',
    display: 'bottom',
    fixedWidth: [100, 100, 100],
    onBeforeShow: function (inst) {
        var areaList = new Areas();
        inst.settings.wheels = [[areaList.getData(1), areaList.getData(inst._tempWheelArray[0]), areaList.getData(inst._tempWheelArray[1])]];
    },

    parseValue: function (val) {
        return [110000, 110100, 110101];
    },

    validate: function (html, index, time, dir, inst) {
        var areaList = new Areas();

        if (index == 0) {
            inst.settings.wheels[0][1] = areaList.getData(inst._tempWheelArray[0]);
            inst.changeWheel([1]);

            inst.settings.wheels[0][2] = areaList.getData(inst._tempWheelArray[1]);
            inst.changeWheel([2]);
        }

        if (index == 1) {
            inst.settings.wheels[0][2] = areaList.getData(inst._tempWheelArray[1]);
            inst.changeWheel([2]);
        }
    },

    formatValue: function (data) {
        var areaList = new Areas();
        return areaList.getNameById(data[0]) + ' ' + areaList.getNameById(data[1]) + ' ' + areaList.getNameById(data[2]);
    }
});
