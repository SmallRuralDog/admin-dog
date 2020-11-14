import axios from "axios";
import router from "../router";


axios.interceptors.request.use(
    config => {
        config.headers["X-Requested-With"] = "XMLHttpRequest";
        return config;
    },
    error => {
        Promise.reject(error);
    }
);
axios.interceptors.response.use(
    ({data}) => {
        // 对响应数据做点什么
        switch (data.code) {
            case 400:

                break;
            case 301:
                try {
                    if (data.data.isVueRoute) {
                        router.replace(data.data.url);
                    } else {
                        window.location.href = data.data.url;
                    }
                } catch (error) {
                    console.error("请返回 Admin::responseRedirect()");
                }
                break;
            case 200:

                break;
        }
        return data;
    },
    ({response}) => {
        //console.log(response.status);
        // 对响应错误做点什么
        switch (response.status) {
            case 404:
                break;
            case 401:

                location.reload();
                break;
            case 419:

                location.reload();
                break;
            default:

                break;
        }

        return Promise.reject(response);
    }
);

export default axios;
