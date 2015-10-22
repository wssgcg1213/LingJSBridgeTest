LingH5容器为Web提供了各种移动设备的功能支持

这是功能计划表



### 内置功能类

- 解析webp
- 离线包缓存



### 回调函数的参数是一个PlainObject, 里面可能包含一个特殊的字段error，作为api调用的错误码

- 示例
  
  ``` javascript
  {
       error:1,
       errorMessage:'接口不存在'
  }
  ```



### 事件类

#### LingJSBridgeReady

DOMReady之后, 容器初始化，产生一个全局变量LingJSBridge, 然后触发此事件

``` javascript
document.addEventListener('LingJSBridgeReady', function () {
  console.log(LingJSBridge);
}, false);
```



todolist: 

- resume: 当一个webview界面重新回到栈顶时，会触发此事件
- back: 用户点击导航栏左上角返回按钮, 如果在事件的处理函数中调用了event.preventDefault()，容器将忽略backBehaviour，js需要负责回退或做其他操作
- optionMenu: 导航条右上角按钮被点击时触发
- titleClick: 点击标题触发回调



### 通用类

- todo: isInstalledApp (外部应用存在性判断)

``` javascript
LingJSBridge.call('isInstalledApp', {

     scheme: 'alipays://' //目标应用的url scheme
}, function (result) {
     console.log(result.installed);
});

reusult = {
  installed: true//false, 目标应用是否已在用户设备上安装
}
```



### 界面类\*

- titlebar

控制标题栏

``` javascript
// 显示标题栏
LingJSBridge.call("showTitlebar");
// 隐藏标题栏
LingJSBridge.call("hideTitlebar");

// 显示右按钮
LingJSBridge.call("showOptionMenu");

// 隐藏右按钮
LingJSBridge.call("hideOptionMenu");

// 设置标题
LingJSBridge.call("setTitle", {
    title: 'Hello'
});

// 设置右按钮属性
LingJSBridge.call('setOptionMenu', {
     title : '按钮',  // 与icon二选一
     icon : 'http://pic.alipayobjects.com/e/201212/1ntOVeWwtg.png',
});
```



- toast

弱提示

``` javascript
// 显示
LingJSBridge.call('toast', {

     content: 'Toast测试',
     type: 'success',
     duration: 3000
}, function(){

     alert("toast消失后执行");
});
```

| 名称       | 类型     | 描述                            | 可选   | 默认值  | 版本   |
| -------- | ------ | ----------------------------- | ---- | ---- | ---- |
| content  | string | 文字内容                          | N    | ""   |      |
| type     | string | none / success / fail。 icon类型 | Y    | none |      |
| duration | int    | 显示时长，单位为毫秒。                   | Y    | 2000 |      |

- alert

对话框

``` javascript
LingJSBridge.call('alert', {
     title: '亲',
     message: '你好',
     button: '确定'
}, function () {

     console.log('alert dismissed');
});
```

| 名称      | 类型     | 描述       | 可选   | 默认值  |
| ------- | ------ | -------- | ---- | ---- |
| title   | string | alert框标题 | Y    | ""   |
| message | string | alert框文本 | N    |      |
| button  | string | 按钮文字     | Y    | "确定" |

- confirm

选择对话框

``` javascript
LingJSBridge.call('confirm', {
     title: '亲',
     message: '确定要这么干吧',
     okButton: '确定',
     cancelButton: '算了'
}, function (result) {
     console.log(result.ok);
});
```

| 名称           | 类型     | 描述       | 可选   | 默认值  |
| ------------ | ------ | -------- | ---- | ---- |
| title        | string | alert框标题 | Y    | ""   |
| message      | string | alert框文本 | N    |      |
| okButton     | string | "确定"按钮文字 | Y    | "确定" |
| cancelButton | string | "取消"按钮文字 | Y    | "取消" |

- loading

``` javascript
// 显示
LingJSBridge.call('showLoading', {
     text: '加载中'
     detail: "大概要加载很久"
});

// 隐藏
LingJSBridge.call('hideLoading');
```

| 名称     | 类型     | 描述                   | 可选   | 默认值  |
| ------ | ------ | -------------------- | ---- | ---- |
| text   | string | 文本内容；若不指定，则显示为中间大菊花； | Y    | ""   |
| detail | string | 详细信息, 文本内容；          | Y    | ""   |

### 上下文类

- exit 退出容器

``` javascript
LingJSBridge.call('exit');
```



- pushWindow

``` javascript
// 开新窗口
LingJSBridge.call('pushWindow', {
     url: 'http://www.alipay.com/',
     param: {
       readTitle: true,
       defaultTitle: true,
       showToolBar: false
       // ...
     }
});

// 关闭窗口，可传递参数
LingJSBridge.call('popWindow',{

    data: {
    }
});
```



### 扩展类

- getNetworkState

``` javascript
LingJSBridge.call('getNetworkState', function (result) {

     console.log(result);
});
```

- vibrate

振动

``` javascript
LingJSBridge.call('vibrate');
```