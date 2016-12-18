//index.js
//获取应用实例
var app = getApp()
var p = Page({
  data: {
    motto: 'Hello World',
    userInfo: {},
    picker: ['不限','黄浦区', '南沙区', '荔湾区', '白云区','海珠区','天河区','花都区','清城区','新城区'],
    index: 0,
    price: ['不限','30万以下', '30万-50万', '50万-80万', '80万以上'],
    index1: 0,
    huxin: ['不限', '一室', '两室', '三室','四室','四室以上'],
    index2: 0,
    mianji: ['不限','装修房', '学区房', '地铁房', '不限购'],
    index3: 0,
    area1:'区域',
    huxin1:'户型',
    mianji1:'特色',
    price1:'其他'

  },
  //事件处理函数
  bindViewTap: function(e) {
    console.log(e)
    wx.navigateTo({
      url: '../user/user?id=55'
    })
  },
  
  bindKeyInput: function(e) {
    this.setData({
      inputValue: e.detail.value
    })
  },
  
  //关键字查询
  setSearch:function(e){
    var value = this.data.inputValue
    var that = this

    //加载数据
    loadData(1,value,function(res){ 
       that.setData({resData:res.data.res})    
    });
  },
  onLoad: function () {
    /*wx.showToast({
         title: 'aaaaaaaaa',
         icon: 'success',
         duration: 2000
    })*/
    var that = this
    //调用应用实例的方法获取全局数据
    /*app.getUserInfo(function(userInfo){
      //更新数据
      that.setData({
        userInfo:userInfo
      })
    })*/

    wx.getUserInfo({
      success: function(res) {
        var userInfo = res.userInfo
		    var encryptedData = res.signature
        var nickName = userInfo.nickName
        var avatarUrl = userInfo.avatarUrl
        var gender = userInfo.gender //性别 0：未知、1：男、2：女 
        var province = userInfo.province
        var city = userInfo.city
        var country = userInfo.country
        console.log(encryptedData)
        console.log(nickName)
        that.setData({
          userInfo:userInfo
        })
        
      }
    })

    var value = this.data.index //地区
    var value1 = this.data.index1 //价格
    var value2 = this.data.index2 //户型
    var value3 = this.data.index3 //面积 
    //加载数据
    var str = "";
    var obj = {'area':value,'price':value1,'huxin':value2,'mianji':value3};
    str = JSON.stringify(obj);
    console.log(str);
    loadData(10,'',str,function(res){       
      that.setData({resData:res.data.res})  
      console.log(res);
    });  
  },


  bindPickerChange: function(e) {
    console.log(this.data.userInfo)
    this.setData({
      index: e.detail.value,
      area1:this.data.picker[e.detail.value]
    });
    console.log(this.data.picker[0])
     console.log('picker发送选择改变，携带值为'+this.data.index)
     request(this.data.index,this.data.index1,this.data.index2,this.data.index3,this)
  },

  bindPriceChange: function(e) {
    this.setData({
      index1: e.detail.value,
      price1:this.data.price[e.detail.value]
    });
     console.log('price发送选择改变，携带值为',this.data.index1)
     request(this.data.index,this.data.index1,this.data.index2,this.data.index3,this)
  },

  bindHuxinChange: function(e) {
    this.setData({
      index2: e.detail.value,
      huxin1:this.data.huxin[e.detail.value]
    });
      console.log('huxin发送选择改变，携带值为',this.data.index2)
      request(this.data.index,this.data.index1,this.data.index2,this.data.index3,this)
  },

  bindMianjiChange: function(e) {
    this.setData({
      index3: e.detail.value,
      mianji1:this.data.mianji[e.detail.value]
    });
    console.log('mianji发送选择改变，携带值为',this.data.index3)
    request(this.data.index,this.data.index1,this.data.index2,this.data.index3,this)
  }, 
  
})


function request(value,value1,value2,value3,that){
  var str = "";
  var result= "";
  var obj = {'area':value,'price':value1,'huxin':value2,'mianji':value3};
  str = JSON.stringify(obj);
  loadData(1,'万科',str,function(res){ 
      if(res){
        that.setData({resData:res.data.res})   
      }  
  });
}


 //请求数据
 function loadData(page,keyword,map,succFun){ 
      console.log('testRequest  page：'+map) 
      wx.request({
        url: 'https://www.xiutub.com/api/',
        data: { 
          'page': page,   //第几页 默认为1。(不传type时对新书生效)
          'keyword':keyword,
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
