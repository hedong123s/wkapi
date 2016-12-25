var app = getApp()

var changeData = null;
var dataArr = "不限价格";

Page({
    data : {
        items: [
        {id: "aa",name: '1万以下', checked: false},
        {id: "bb",name: '1万--1.5万', checked: false},
        {id: "cc",name: '1.5万--2万', checked: false},
        {id: "dd",name: '2万--2.5万', checked: false},
        {id: "ee",name: '2.5万--3万', checked: false},
        {id: "ff",name: '3万--3.5万', checked: false },
        {id: "hh",name: '3.5万--4万',  checked: false },
        {id: "ii",name: '4万以上', checked: false },
        {id: "jj",name: '不限价格', checked: true },
     ],
     chooseData : null
    },

     radioChange : function(e){
        var that = this;
        // console.log(e);
        dataArr = e.detail.value;
        changeData = that.data.items;
            for(var i=0; i<changeData.length; i++){
            if(changeData[i].name == dataArr){
                changeData[i].checked = true;
            } else {
                changeData[i].checked = false;
            }
        }
        
         console.log(dataArr);
         //console.log(changeData);
        this.setData({
            items : changeData
        });
    },
//合并第二次选择的数据

// 精彩继续...
    nextChoose : function(){
    
// 储存数据
       wx.setStorage({
          key: 'price',
          data: dataArr 
        })
        wx.navigateTo({
      url: '../zhaofang3/zhaofang3'
    })
    }
})