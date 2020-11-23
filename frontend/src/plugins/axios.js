import axios from "axios";
import router from "../router";


axios.interceptors.request.use(
    config => {
        //config.headers["X-Requested-With"] = "XMLHttpRequest";
        config.baseURL = window.AdminDogConfig.apiRoot;
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
                return Promise.reject(data);
            case 301:
                window.location.href = data.data;
                break;
            case 302:
                router.replace(data.data);
                break;
            case 200:
                return data;
        }
        return data;
    },
    ({response}) => {
        //console.log(response.status);
        // 对响应错误做点什么
        switch (response.status) {
            case 404:
                router.replace('/404');
                break;
            case 401:

                location.reload();
                break;
            case 419:

                location.reload();
                break;
            default:
                return Promise.reject(response.data);
        }


    }
);

export default axios;
