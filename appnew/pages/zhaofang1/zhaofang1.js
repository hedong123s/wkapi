
var app = getApp()
var changeData = null;
var dataArr = ["不重要"];
Page({
    data : {
        items: [
        {id: "aa",name: '天河区', value: '城市中心',checked: false ,disabled: false},
        {id: "bb",name: '黄埔区', value: '科技景绣',checked: false ,disabled: false},
        {id: "cc",name: '荔湾区', value: '古祠流芳',checked: false ,disabled: false},
        {id: "dd",name: '白云区', value: '云山叠翠',checked: false ,disabled: false},
        {id: "ee",name: '南沙区', value: '湿地唱晚' , checked: false ,disabled: false},
        {id: "ff",name: '海珠区', value: '塔耀新城',checked: false ,disabled: false},
        {id: "hh",name: '花都区', value: '交通枢纽',checked: false ,disabled: false},
        {id: "ii",name: '清远市', value: '北江要塞',checked: false ,disabled: false},
        {id: "jj",name: '不重要', value: '地段',checked: true ,disabled: false}
     ]
    },

     checkboxChange : function(e){
        var that = this;
        dataArr = e.detail.value;
        changeData = that.data.items;
        if(dataArr.length == 0){
            for(var i=0;i<changeData.length;i++){
                changeData[i].checked = false;
            }
            changeData[8].checked = true; // 都不选时，默认选择最后项
            dataArr.push(changeData[8].name); // 传入数据
            changeData[8].disabled = true;
            // console.log(dataArr);
            // console.log(changeData);
            that.setData({
            items : changeData
         })
        } else {
            if(dataArr[0] == changeData[8].name){
                dataArr.splice(0,1);
                changeData[8].disabled = false;
            };
            var length = dataArr.length; // 长度值不随下面改变
             if(dataArr[length-1] == changeData[8].name){
                for(var l=0;l<length-1 ; l++){
                    dataArr.splice(0,1);
                }
                changeData[8].disabled = true;
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
        //  console.log(dataArr);
        // console.log(changeData);
        this.setData({
            items : changeData
        });
    },
    nextChoose : function(){
        wx.setStorage({
          key: 'address',
          data: dataArr 
        });
        
        wx.navigateTo({
            url: '../zhaofang2/zhaofang2'
        })
    }
})

