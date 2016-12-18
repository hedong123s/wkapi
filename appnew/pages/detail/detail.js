//index.js
//获取应用实例
var app = getApp()
Page({
  data: {
    motto: '这是用户中心',
    userInfo: {}
  },
  //事件处理函数
  bindViewTap: function() {
    wx.navigateTo({
      url: '../logs/logs'
    })
  },
  
  onLoad: function (options) {
    console.log('onLoad')
    console.log(this.data.motto)
    var that = this
    //调用应用实例的方法获取全局数据
    app.getUserInfo(function(userInfo){
      //更新数据
      that.setData({
        userInfo:userInfo
      })
    })

    that.setData({
      id:options.id
    })
    console.log(this.data.id + "_______________________")
    var id = this.data.id
    getDeatail(id,this)
    //console.log(r)
  }
})

function getDeatail(id,that){
  console.log(id + "_______________________666")
  wx.request({
    url: 'https://www.xiutub.com/api/index.php?a=detail',
    data: {'id':id},
    method: 'POST', // OPTIONS, GET, HEAD, POST, PUT, DELETE, TRACE, CONNECT
    header: {'content-type':'application/x-www-form-urlencoded'}, // 设置请求的 header
    success: function(res){
      // success
      console.log(res.data)
      that.setData({
        resData:res.data.res
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
