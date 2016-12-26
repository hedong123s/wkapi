var app = getApp()

var changeData = null;
var dataArr = null;

Page({
    data : {
        hasLocation:null,
    },

    getLocation: function(e){
          console.log(666)
          wx.getLocation({
              type: 'wgs84',
              success: function(res) {
                console.log(res)
                var latitude = res.latitude
                var longitude = res.longitude
                var speed = res.speed
                var accuracy = res.accuracy
                wx.openLocation({
                    latitude: latitude,
                    longitude: longitude,
                    scale: 28
                })
              }
          })
      },

       calling:function(e){
          console.log(e)
          wx.makePhoneCall({

            phoneNumber: '12345678900', //此号码并非真实电话号码，仅用于测试
            success:function(){
                console.log("拨打电话成功！")
            },
            fail:function(){
                console.log("拨打电话失败！")
            }
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
        var id = this.data.id
        getDeatail(id,this)
        getManager(this)
        
        //console.log(r)

        


        

        
  }
    

})



function getDeatail(id,that){
  wx.request({
    //url: 'http://localhost/52php/api/index.php?a=detail',
    url: 'https://www.xiutub.com/index.php?a=detail',
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
