<?php
/**
 * CURL工具类
 */
namespace Common\Service;

class Curl
{
    /**
     * user agent
     *
     * @var string
     */
    protected static $userAgent = 'PHP Http Client';

    /**
     * 发起一个HTTP/HTTPS的请求
     *
     * @param string $method     请求类型    GET | POST...
     * @param string $url        接口的URL
     * @param array  $params     接口参数   array('content'=>'test', 'format'=>'json');
     * @param arrat  $headers    扩展的包头信息
     * @param array  $files      图片信息
     *
     * @return string
     */
    public static function request($method, $url, array $params = array(), array $headers = array(), $files = [])
    {
        if (!function_exists('curl_init')) exit('Need to open the curl extension');
        $method = strtoupper($method);
        $timeout = $files ? 30 : 15;
        $ci = curl_init();
        curl_setopt($ci, CURLOPT_USERAGENT, self::$userAgent);
        curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ci, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ci, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ci, CURLOPT_HEADER, false);
        if (!function_exists('curl_file_create')) {
            function curl_file_create($filename, $mimetype = '', $postname = '') {
                return "@$filename;filename="
                    . ($postname ?: basename($filename))
                    . ($mimetype ? ";type=$mimetype" : '');
            }
        }
        switch ($method) {
            case 'PUT':
            case 'POST':
            case 'PATCH':
                $method == 'POST' || curl_setopt($ci, CURLOPT_CUSTOMREQUEST, $method);
                curl_setopt($ci, CURLOPT_POST, true);
                if (!empty($files)) {
                    foreach($files as $index => $file) {
                        $params[$index] = curl_file_create($file);
                    }
                    if (phpversion() > '5.5') {
                        curl_setopt($ci, CURLOPT_SAFE_UPLOAD, false);
                    }
                    curl_setopt($ci, CURLOPT_POSTFIELDS, $params);
                    $headers[] = 'Expect: ';
                    $headers[] = 'Content-Type: multipart/form-data';
                } else {
                    curl_setopt($ci, CURLOPT_POSTFIELDS, http_build_query($params));
                }
                break;
            case 'GET':
            case 'HEAD':
            case 'DELETE':
            case 'OPTIONS':
                $method == 'GET' || curl_setopt($ci, CURLOPT_CUSTOMREQUEST, $method);
                if (!empty($params)) {
                    $url .= (strpos($url, '?') ? '&' : '?') . http_build_query($params);
                }
                break;
        }
        curl_setopt($ci, CURLINFO_HEADER_OUT, true);
        curl_setopt($ci, CURLOPT_URL, $url);
        if ($headers) {
            curl_setopt($ci, CURLOPT_HTTPHEADER, $headers);
        }
        $response = curl_exec($ci);
        if (curl_errno($ci)) {
            error_log("curl错误：" . curl_errno($ci) . ' : ' . curl_error($ci));
        }
        curl_close($ci);
        return $response;
    }
    /**
     * set user agent
     *
     * @param string $userAgent
     */
    public static function setUserAgent($userAgent)
    {
        self::$userAgent = $userAgent;
    }
    /**
     * static call
     *
     * @param string $method request method.
     * @param array  $args   request params.
     *
     * @return mixed
     */
    public static function __callStatic($method, $args)
    {
        $method = strtoupper($method);
        if (!in_array($method, ['GET','POST', 'DELETE', 'PUT', 'PATCH','HEAD', 'OPTIONS'])) {
            throw new Exception("method $method not support", 400);
        }
        array_unshift($args, $method);
        return call_user_func_array(array(__CLASS__, 'request'), $args);
    }
}
?>