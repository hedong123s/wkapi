var app = getApp()

var changeData = null;
var dataArr = null;

Page({
    data : {
        hasLocation:null,
        code:null
    },

    getLocation: function(e){
        var that = this
          console.log(666)
          wx.getLocation({
              type: 'wgs84',
              success: function(res) {
                console.log(res)
                console.log(that.data.resData)
                var d = that.data.resData
                console.log(d.jingdu + '|' + d.weidu)
                var latitude = Number(d.jingdu)//res.latitude
                var longitude = Number(d.weidu)//res.longitude
                console.log(latitude + longitude)
                wx.openLocation({
                    latitude: latitude,
                    longitude: longitude,
                    scale: 28
                })
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
        wx.login({
            success: function(e) {
                console.log(e)
                //this.code = e.code
                that.setData({
                    code:e.code
                })
            } 
        })
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
        var value1 = wx.getStorageSync('address');
        var value2 =  wx.getStorageSync('price');
        var value3 =  wx.getStorageSync('size');
        that.setData({
            infos : value1 + '|' + value2 + '|' + value3,
           
        })
        
        wx.login({
            success: function(e) {
                console.log(e)
                //this.code = e.code
                    that.setData({
                        code:e.code
                    })
                wx.getUserInfo({
                    success: function(res) {
                        var userInfo = res.userInfo             
                        console.log(userInfo)
                        var encryptedData = res.encryptedData
                        var iv = res.iv
                        console.log(that.data.id + '--------------')
                        console.log(that.data.infos)
                        getUserinfo(encryptedData,iv,that.data.code,userInfo,that.data.id,that.data.infos,that)
                    }
                })
            }
        })

        
  }


  

    

})



function getUserinfo(encryptedData,iv,code,userInfo,id,infos,that){
  userInfo = JSON.stringify(userInfo)
  wx.request({     
    //url: 'http://localhost/wkapi/index.php?a=userinfo',
    url: 'https://www.xiutub.com/index.php?a=userinfo',
    data: {
        'encryptedData':encryptedData,
        'iv':iv,
        'userInfo':userInfo,
        'code':code,
        'id':id,
        'infos':infos
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


    function userlog(){
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
