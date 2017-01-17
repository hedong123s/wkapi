
var app = getApp()
var changeData = null;
var dataArr = null;
Page({
    data : {
        items: [
        {id: "aa",name: '天河区', checked: false ,disabled: false},
        {id: "bb",name: '黄埔区',checked: false ,disabled: false},
        {id: "cc",name: '荔湾区',checked: false ,disabled: false},
        {id: "dd",name: '白云区',checked: false ,disabled: false},
        {id: "ee",name: '南沙区',checked: false ,disabled: false},
        {id: "ff",name: '海珠区',checked: false ,disabled: false},
        {id: "hh",name: '花都区',checked: false ,disabled: false},
        {id: "ii",name: '清远市',checked: false ,disabled: false},
        {id: "jj",name: '不重要', value: '地段',checked: false ,disabled: false}
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
        console.log(dataArr)
        if(dataArr == null){
            wx.showToast({
                title:'请至少选择一个地区',
                icon: 'fail',
                duration: 2000
            })
        }else{
            wx.setStorage({
                key: 'address',
                data: dataArr 
            });
                
            wx.navigateTo({
                url: '../zhaofang2/zhaofang2'
            })
        }
        
    },

    onShareAppMessage: function () {
        return {
            title: '同享好房',
            desc: '广州万科智能找房软件，轻松帮您推荐心水好房！更有万科三好顾问为您提供全方位购房咨询服务！',
            path: 'pages/zhaofang1/zhaofang1'
        }
    }

    
})





