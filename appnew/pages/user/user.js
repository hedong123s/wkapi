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
  }
})
