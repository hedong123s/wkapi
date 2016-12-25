var app = getApp()

var changeData = null;
var dataArr = "不限户型";

Page({
    data : {
        items: [
        {id: "aa",name: '最适合单身狗', value: '单间', style: "自在生活",checked: false },
        {id: "bb",name: '适合年轻情侣或', value: '公寓', style: "新婚燕尔你侬我侬",checked: false },
        {id: "cc",name: '适合一家的三口', value: '两房',style: "幸福甜蜜",checked: false },
        {id: "dd",name: '适合一家的三口', value: '三房',style: "与老人其乐融融",checked: false },
        {id: "ee",name: '一家人', value: '四房',style: "各有地盘",checked: false },
        {id: "ff",name: '实现子孙满堂', value: '五房',style: "阖家欢乐",checked: false },
        {id: "hh",name: '反正很大', value: '别墅',style: "上下好几层",checked: false },
        {id: "ii",name: '', value: '不限户型',style: "",checked: true }
     ],
     wrapShow : false,
     address:null,
     price : null,
     size : null ,
     
    },

    onLoad:function(){
        getManager(this);
       wx.setStorage({
          key: 'size',
          data: dataArr, 
        });
    },
    
      radioChange : function(e){
        var that = this;
        dataArr = e.detail.value;
        changeData = that.data.items;
            for(var i=0; i<changeData.length; i++){
            if(changeData[i].value == dataArr){
                changeData[i].checked = true;
            } else {
                changeData[i].checked = false;
            }
        }
         console.log(dataArr);
        wx.setStorage({
          key: 'size',
          data: dataArr, 
        });
        this.setData({
            items : changeData
        });
         
    },

    
     formSubmit:function(e){
            console.log(e.detail.value.name)
            console.log(e.detail.value.tel)
            var name= e.detail.value.name
            var tel = e.detail.value.tel
            if(name == '' || tel == ''){
                wx.showToast({
                    title: '请输入您的姓名和电话',
                    icon: 'fail',
                    duration: 2000
                })
            }else{
                wx.request({
                    //url: 'http://localhost/52php/api/index.php?a=feedback', //仅为示例，并非真实的接口地址
                     url: 'https://www.xiutub.com/index.php?a=feedback',
                    data: {
                        'name': name,
                        'tel': tel
                    },
                    method: 'POST',
                    header: {'content-type':'application/x-www-form-urlencoded'}, // 设置请求的 header
                    success: function(res) {
                        console.log(res.data.error)
                        var err = res.data.error
                        //成功
                        if(err == 0){
                            wx.showToast({
                                title:res.data.msg ,
                                icon: 'fail',
                                duration: 2000
                            })
                        }else{
                            wx.showToast({
                                title:res.data.msg ,
                                icon: 'fail',
                                duration: 2000
                            })
                        }
                    }
                })
            }
    },

    // 选择确认
   modalShow :function(){
       var that = this;
        try {
            var value2 = new Array();
            var value3 = new Array();
            var value1 = wx.getStorageSync('address');
            value2[0] =  wx.getStorageSync('price');
            value3[0] =  wx.getStorageSync('size');
            if (true) {
                that.setData({
                    address : value1,
                    price : value2,
                    size : value3
                })
             }
            } catch (e) {
                console.log("获取数据失败");
            }
            console.log(that.data.address);
            console.log(that.data.price);
            console.log(that.data.size);
            var area = that.data.address;
            var price = that.data.price;
            var huxin = that.data.size;
            request(area,price,huxin,this);

            // 显示弹窗
            that.setData({
                wrapShow : true
            })
   },
   
    // 关闭弹窗
    closeModal : function(){
        this.setData({
            wrapShow : false
        })
    }
})

function request(value,value1,value2,that){
  var str = "";
  var result= "";
  var obj = {'area':value,'price':value1,'huxin':value2};
  str = JSON.stringify(obj);
  loadData(1,str,function(res){ 
      if(res){
        console.log(res.data.res)
        that.setData({resData:res.data.res})   
      }  
  });
}


 //请求数据
 function loadData(page,map,succFun){ 
      console.log('testRequest  page：'+map) 
      wx.request({
        //'url':'http://localhost/52php/api/',
        url: 'https://www.xiutub.com/',
        data: { 
          'page': page,   //第几页 默认为1。(不传type时对新书生效)
          'limit': '10',   //每页返回的数量 (不传type时对新书生效) 
          'map':map
        },
        method: 'POST', // OPTIONS, GET, HEAD, POST, PUT, DELETE, TRACE, CONNECT
        header: { // 设置请求的 header
          'content-type':'application/x-www-form-urlencoded'
        }, 
        success: succFun,
        fail: function() {
          // fail
            wx.showToast({
            title: '失败',
            icon: 'success',
            duration: 2000
          })
        },
        complete: function() {
          // complete
        }
    });
  }

  function getManager(that){
        wx.request({
            //url: 'http://localhost/52php/api/index.php?a=detail',
            url: 'https://www.xiutub.com/index.php?a=manager',
            data: {},
            method: 'POST', // OPTIONS, GET, HEAD, POST, PUT, DELETE, TRACE, CONNECT
            header: {'content-type':'application/x-www-form-urlencoded'}, // 设置请求的 header
            success: function(res){
            // success
            console.log(res.data)
            that.setData({
                managerData:res.data.res
            })
            },
            fail: function() {
            // fail
            },
            complete: function() {
            // complete
            }
        })
    }