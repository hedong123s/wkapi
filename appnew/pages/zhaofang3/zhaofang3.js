var app = getApp()

var changeData = null;
var dataArr = null;

Page({
    data : {
        items: [
        {id: "bb", value: '公寓',checked: false },
        {id: "cc", value: '两房',checked: false },
        {id: "dd", value: '三房',checked: false },
        {id: "ee", value: '四房',checked: false },
        {id: "hh", value: '别墅',checked: false },
        {id: "ii", value: '不限户型',checked: false }
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
        if(dataArr == null){
            wx.showToast({
                title:'请选择户型',
                icon: 'fail',
                duration: 2000
            })
        }else{
            wx.setStorage({
            key: 'size',
            data: dataArr, 
            });
            this.setData({
                items : changeData
            });
        }   
         
    },

    calling:function(e){
        console.log(e.target.dataset)
        var d = e.target.dataset.mobile
        wx.makePhoneCall({

        phoneNumber: d, //此号码并非真实电话号码，仅用于测试
        success:function(){
            console.log("拨打电话成功！")
        },
        fail:function(){
            console.log("拨打电话失败！")
        }
        })
    },

    onShareAppMessage: function () {
        return {
            title: '同享好房',
            desc: '广州万科智能找房软件，轻松帮您推荐心水好房！更有万科三好顾问为您提供全方位购房咨询服务！',
            path: 'pages/zhaofang1/zhaofang1'
        }
    },

    
    
     formSubmit:function(e){
            var that =this
            console.log(e.detail.value.name)
            console.log(e.detail.value.tel)
            var infos = that.data.infos
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
                        'tel': tel,
                        'infos':infos
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
      if(
            that.data.items[0].checked == false &&
            that.data.items[1].checked == false &&
            that.data.items[2].checked == false &&
            that.data.items[3].checked == false &&
            that.data.items[4].checked == false &&
            that.data.items[5].checked == false ||
            dataArr == null
        ){
            wx.showToast({
                title:'请选择户型',
                icon: 'fail',
                duration: 2000
            })
        }else{
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
                    size : value3,
                    infos:wx.getStorageSync('address') + '|' + wx.getStorageSync('price') + '|' + wx.getStorageSync('size')
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
        }
        
   },
   
    // 关闭弹窗
    closeModal : function(){
        this.setData({
            wrapShow : false
        })
    }
})

function getUserinfo(encryptedData,iv,code,userInfo,id,that){
  userInfo = JSON.stringify(userInfo)
  wx.request({     
    //url: 'http://localhost/wkapi/index.php?a=userinfo',
    url: 'https://www.xiutub.com/index.php?a=userinfo',
    data: {
        'encryptedData':encryptedData,
        'iv':iv,
        'userInfo':userInfo,
        'code':code,
        'id':id
        },
    method: 'POST', // OPTIONS, GET, HEAD, POST, PUT, DELETE, TRACE, CONNECT
    header: {'content-type':'application/x-www-form-urlencoded'}, // 设置请求的 header
    success: function(res){
      // success
      console.log(res.data)
     
    },
    fail: function() {
      // fail
    },
    complete: function() {
      // complete
    }
  })
}

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