var app = getApp()

var changeData = null;
var dataArr = ["不限价格"];

Page({
    data : {
        items: [
        {id: "aa",name: '2万以下', value: '过渡型购房',checked: false,disabled:false},
        {id: "bb",name: '2万-3万', value: '改善性购房', checked: false ,disabled:false},
        {id: "cc",name: '3万以上', value: '享受型购房',checked: false ,disabled:false},
        {id: "dd",name: '不限价格', value: '投资型购房',checked: true ,disabled:false},
     ],
     chooseData : null
    },

     checkboxChange : function(e){
        var that = this;
        // console.log(e);
        dataArr = e.detail.value;
        changeData = that.data.items;
       
        if(dataArr.length == 0){
            for(var i=0;i<changeData.length;i++){
                changeData[i].checked = false;
            }
             changeData[3].checked = true; // 都不选时，默认选择最后项
             dataArr.push(changeData[3].name); // 传入默认选项的数据
             changeData[3].disabled = true;
            that.setData({
            items : changeData
         })
        } else {
            if(dataArr[0] == changeData[3].name){
                dataArr.splice(0,1);
                changeData[3].disabled = false;
            };
            var length = dataArr.length; // 长度值不随下面改变
             if(dataArr[length-1] == changeData[3].name){
                for(var l=0;l<length-1 ; l++){
                    dataArr.splice(0,1);
                }
                changeData[3].disabled = true;
            }
             for(var i=0; i<changeData.length; i++){
             for(var j=0; j<dataArr.length; j++){
               if(changeData[i].name == dataArr[j]){
                   changeData[i].checked = true;
                   break;
               } else {
                   changeData[i].checked = false;
               }
             }
         }
        }
        // console.log(dataArr);
        // console.log(changeData);
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